FROM php:8.3-apache

#Instalación de librerías
RUN get-apt update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libxml2-dev \
    libonig-dev \
    zip \
    unzip \
    && docker -php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip xml mbstring

COPY . /var/www/html/

EXPOSE 80
