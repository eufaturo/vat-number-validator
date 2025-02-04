#!/bin/bash

sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install -y \
    php${PHP_VERSION} \
    php${PHP_VERSION}-cli \
    php${PHP_VERSION}-dev \
    php${PHP_VERSION}-fpm \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-xml
