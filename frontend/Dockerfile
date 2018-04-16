# PHP image
FROM php:7.2-apache

# isntall MYSQLI extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# root directory
WORKDIR /var/www/html/

# copy ROOT to VAR/WWW/HTML
COPY . .

# Prompt de Comando #

# cd ../../Users/'Marcos Vaz'/Desktop/php-sample-app/frontend
# docker-machine start
# docker-machine ip
# docker build . -t frontend:0.0.1
# docker run -d -p 80:80 --name app frontend:0.0.1
# docker run -d -p 80:80 --name app --link backend frontend:0.0.1 # Para ligar ao backend
# docker ps