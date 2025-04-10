FROM php:8.1-fpm-alpine

# تثبيت المكتبات المطلوبة
RUN apk add --no-cache \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    icu-dev

# تثبيت إضافات PHP
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    gd \
    zip \
    intl

# إعداد Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html