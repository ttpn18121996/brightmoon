#!/usr/bin/env bash

docker-compose down \
&& docker container prune -f \
&& docker image prune -f \
&& docker-compose up --detach --build
