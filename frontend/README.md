# Frontend

## Documentação

```sh
# Recupera a imagem do php na versão 7.2 com Apache
FROM php:7.2-apache

# Instala o módulo do MySQLi para rodar o banco
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Define a váriavel WORKDIR com o caminho para a raiz do servidor 'var/www/html'
WORKDIR /var/www/html/

# Copia os arquivos da pasta raiz do usuário (no caso 'frontend') para a pasta raiz do servidor ('var/www/html')
COPY . $WORKDIR
```

---

## Execução

Build da imagem do frontend:

```sh
docker build . -t frontend:0.0.1
```
> Esse comando serve para buildar a imagem frontend:0.0.1

Para rodar a imagem:
```sh
docker run -d -p 80:80 --rm --name php-sample-app frontend:0.0.1
```
> Esse comando serve para rodar a imagem frontend:0.0.1 ('run'), em background ('-d'), passando da porta 80 do servidor para a porta 80 da nossa raiz (-p 80:80), com um parâmetro para caso matar o container, ele já remover a imagem ('--rm'), e dando o nome php-sample-app para o container (--name php-sample-app)
