#!/usr/bin/env bash

docker-compose down \
&& docker container prune \
&& docker image prune \
&& docker-compose up --detach --build
