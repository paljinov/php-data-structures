FROM php:7.4-fpm

WORKDIR /var/www
COPY . /var/www

RUN apt-get update && apt-get install -y \
    curl \
    git \
    libxml2-dev \
    unzip \
    zip \
    && pecl install uopz xdebug-2.8.1 \
    && docker-php-ext-install soap

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER 1
