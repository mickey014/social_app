FROM php:8.1.13-fpm-alpine

# Install dependencies
RUN apk --no-cache add --update \
    libpng-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libwebp-dev  \
    libzip-dev \
    zip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip

# Install GD extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy the application code
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache