# PHP image
FROM php:7.2-apache

# Install MySQLi extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Root directory
WORKDIR /var/www/html/

# Copy ROOT to VAR/WWW/HTML
COPY . $WORKDIR
