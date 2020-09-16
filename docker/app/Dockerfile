FROM php:7.2-apache

MAINTAINER Abel Aguiar <abelaguiarce@gmail.com>

RUN apt update \
    && apt install -y \
        curl \
        git \
        vim \
        openssl \
        libpq-dev \
        libxml2-dev \
        libicu-dev \
        libmcrypt-dev \
        locales \
        libmagickwand-dev --no-install-recommends \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        cron \
    && a2enmod rewrite

RUN docker-php-ext-configure intl \
    && pecl install imagick  \
    && docker-php-ext-enable imagick

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/

RUN docker-php-ext-install -j$(nproc)\
        ctype dom iconv intl json mbstring opcache pdo_mysql mysqli \
        session simplexml tokenizer xml gd zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && echo 'error_reporting = E_ALL' >> /usr/local/etc/php/conf.d/php-error-reporting.conf \
    && echo 'display_errors = On' >> /usr/local/etc/php/conf.d/php-error-reporting.conf

ADD 000-default.conf /etc/apache2/sites-available/000-default.conf
