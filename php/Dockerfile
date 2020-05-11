FROM php:7.2.7-fpm-alpine3.7
RUN apk update; \
    apk upgrade;
RUN docker-php-ext-install mysqli
RUN curl -sS https://getcomposer.org/installer | php
COPY ./composer.json /var/www/html/
RUN php composer.phar install