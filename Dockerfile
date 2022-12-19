FROM php:7.4-fpm

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .
RUN composer install --ignore-platform-reqs --no-scripts --no-dev --no-ansi --no-interaction --no-plugins --optimize-autoloader

COPY .env.local .env
RUN php artisan key:generate
RUN php artisan migrate
RUN php artisan --version

RUN ls -l
