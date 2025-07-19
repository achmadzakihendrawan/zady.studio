FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    openssl \
    && docker-php-ext-install pdo pdo_mysql mbstring zip bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

# Buat file .env agar tidak error saat dijalankan nanti
RUN cp .env.example .env

# Laravel akan dijalankan nanti saat container start, sekaligus generate key
CMD php artisan key:generate && php artisan serve --host=0.0.0.0 --port=8000
