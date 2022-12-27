FROM php:7.4-fpm

RUN apt update && apt install -y libzip-dev
RUN docker-php-ext-install pdo pdo_mysql sockets zip
RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .
RUN composer install

COPY .env.local .env
RUN touch database/database.sqlite

RUN php artisan key:generate
RUN php artisan migrate
RUN php artisan --version

RUN ls -l