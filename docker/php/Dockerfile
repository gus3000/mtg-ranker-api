FROM php:fpm

ADD composer_install.sh /tmp/

RUN apt-get update
RUN apt-get install -y unzip \
    libpq-dev \
    libzip-dev
RUN docker-php-ext-install pgsql pdo_pgsql zip

RUN /tmp/composer_install.sh
RUN mv composer.phar /usr/bin/composer