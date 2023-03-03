FROM php:8.2-apache

ARG WWWGROUP
ARG NODE_VERSION=19
ARG POSTGRES_VERSION=15

# Install packages
RUN apt-get update && apt-get install -y sudo git curl zip unzip supervisor sqlite3 libcap2-bin libpng-dev python2 vim

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && mkdir -p /etc/apt/keyrings/ \
    && apt-get update \
    && apt-get install -y default-mysql-client

# Install the pgsql client
RUN apt-get update && apt-get -yqq install wget \
    && wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | apt-key add - \
    && echo "deb http://apt.postgresql.org/pub/repos/apt/ `lsb_release -cs`-pgdg main" | tee /etc/apt/sources.list.d/pgdg.list \
    && apt-get update \
    && apt-get -y install postgresql-client-$POSTGRES_VERSION \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql pcntl pdo_pgsql pgsql mysqli

COPY apache/default.apache.conf /etc/apache2/sites-available/000-default.conf

# Enable headers/rewrite module for Apache
RUN a2enmod headers rewrite

# Set document root for Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

RUN groupadd --force -g $WWWGROUP phpdocker
RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 phpdocker

COPY start-container /usr/local/bin/start-container
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY php.ini /etc/php/8.2/cli/conf.d/phpdocker.ini

RUN chmod +x /usr/local/bin/start-container

EXPOSE 80 443 5173

ENTRYPOINT ["start-container"]
