FROM php:8.2-fpm
RUN apt-get update && apt-get install -y \
    libonig-dev \
    && docker-php-ext-install pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
COPY . .
RUN composer install
RUN chmod -R 777 storage bootstrap/cache
EXPOSE 8000
