FROM php:8.3-fpm-alpine

# Install system packages
RUN apk upgrade --update --no-cache && \
    apk add --no-cache \
        zstd-dev \
        bash

# Install Composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

WORKDIR /app