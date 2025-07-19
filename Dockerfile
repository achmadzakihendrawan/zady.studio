FROM php:8.2-cli

# Install dependencies
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

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working dir
WORKDIR /var/www

# Copy project files
COPY . .

# Install dependencies dan buat .env
RUN composer install
RUN cp .env.example .env

# Generate Laravel app key
RUN php artisan key:generate

# Jalankan Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
