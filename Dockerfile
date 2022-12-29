FROM php:7.4-fpm

RUN apt update && apt install -y libzip-dev
RUN docker-php-ext-install pdo pdo_mysql sockets zip

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .
RUN composer install

COPY .env.local .env
RUN touch database/database.sqlite

RUN php artisan key:generate
RUN php artisan migrate
RUN php artisan --version

RUN ls -l