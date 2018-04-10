# PHP image
FROM php:7.2-apache

# isntall MYSQLI extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# root directory
WORKDIR /var/www/html

# copy ROOT to VAR/WWW/HTML
COPY . WORKDIR

EXPOSE 80

# Prompt de Comando #

# cd ../../Users/'Marcos Vaz'/Desktop/php-sample-app/frontend
# docker-machine start
# docker-machine ip
# docker build . -t front-php:latest
# docker run -d -p 80:80 --rm --name app front-php:latest
# docker ps