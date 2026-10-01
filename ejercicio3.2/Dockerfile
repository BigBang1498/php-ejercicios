FROM php:8.2-apache

#Instalación de librerías y extensiones de php (GD)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd
COPY . /var/www/html/

EXPOSE 80