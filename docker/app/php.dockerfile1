FROM composer as build
COPY . /app/
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction


FROM php:8.1.13-fpm-alpine

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

# Install dependencies
RUN apk --no-cache add \
    libpng-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libwebp-dev

# Install GD extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd
