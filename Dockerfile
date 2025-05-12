FROM php:7.4-apache

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

COPY . /var/www/html/

RUN docker-php-ext-install pdo pdo_mysql

EXPOSE 80

RUN chown -R www-data:www-data /var/www/html
