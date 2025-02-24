FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    vim \
    curl \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD ["php-fpm"]
