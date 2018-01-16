FROM php:7.0-fpm

RUN apt-get update -y
RUN apt-get install -y git unzip zlib1g-dev
RUN docker-php-ext-install bcmath zip


RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

COPY index.php /var/www/html