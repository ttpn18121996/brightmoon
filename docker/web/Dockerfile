FROM php:8.3-apache

ARG WWWGROUP
ARG NODE_VERSION=20
ARG POSTGRES_VERSION=15
ARG APP_HOST=localhost

ENV ENABLE_SSL false
ENV WWWUSER 1000
ENV XDEBUG_MODE off
ENV XDEBUG_CONFIG client_host=host.docker.internal

WORKDIR /var/www/html

# Install packages
RUN apt-get update && apt-get install -y sudo git curl zip unzip supervisor sqlite3 \
    libcap2-bin libpng-dev libpq-dev libzip-dev libxml2-dev vim

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install node
RUN curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && mkdir -p /etc/apt/keyrings/ \
    && apt-get update

# Install the mysql client
RUN apt-get install -y default-mysql-client

# Install xdebug
RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.${XDEBUG_CONFIG}" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.log=/var/www/html/docker/xdebug/xdebug.log" >> /usr/local/etc/php/conf.d/xdebug.ini

# Install the pgsql client
# RUN apt-get update && apt-get install -y lsb-release && apt-get -yqq install wget \
#     && wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | apt-key add - \
#     && echo "deb http://apt.postgresql.org/pub/repos/apt/ `lsb_release -cs`-pgdg main" | tee /etc/apt/sources.list.d/pgdg.list \
#     && apt-get update \
#     && apt-get -y install postgresql-client-$POSTGRES_VERSION \
#     && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

# Cleanup
RUN apt-get clean \
    && rm -rf /var/cache/apk/* /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli pcntl gd zip
# RUN docker-php-ext-install pdo_pgsql pgsql

COPY docker/apache/default.apache.conf /etc/apache2/sites-available/000-default.conf
RUN mkdir -p /var/run/apache2/

# Enable headers/rewrite module for Apache
RUN a2enmod headers rewrite

# Set document root for Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Create new user and group
RUN groupadd --force -g $WWWGROUP --system www-dev
RUN useradd -ms /bin/bash -g $WWWGROUP --system -u $WWWUSER www-dev \
    && echo "www-dev:123456" | chpasswd && adduser www-dev sudo

RUN chown -R www-dev:www-dev /var/www/html

COPY docker/web/start-container /usr/local/bin/start-container
COPY docker/web/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/web/php.ini /usr/local/etc/php/

RUN chmod +x /usr/local/bin/start-container

EXPOSE 80 443 5173

ENTRYPOINT ["start-container"]
