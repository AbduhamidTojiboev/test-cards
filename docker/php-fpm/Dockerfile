FROM php:8.1-fpm-buster

RUN curl -sSLf \
        -o /usr/local/bin/install-php-extensions \
        https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions mbstring pdo pdo_pgsql pgsql zip intl redis gd

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

ENV TZ=Europe/Kiev
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN adduser --disabled-password --gecos "" --no-create-home  --ingroup www-data developer --shell /bin/bash

USER developer

WORKDIR /var/www