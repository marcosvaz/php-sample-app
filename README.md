# Sistemas para Internet - SecDevOps

***nac:*** Criação de uma aplicação no formato "CRUD" executada em containers com base na linguagem "PHP" e no banco de dados "MySQL";

---

***Dockerfile*** no [frontend/](https://github.com/marcosvaz/php-sample-app/tree/master/frontend):
```sh
# Recupera a imagem do php na versão 7.2 com Apache
FROM php:7.2-apache

# Instala o módulo do MySQLi
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copia os arquivos da pasta raiz do usuário (no caso 'frontend') para a pasta raiz do servidor
COPY . .
```

***Dockerfile*** no [backend/](https://github.com/marcosvaz/php-sample-app/tree/master/backend):
```sh
# Recupera a imagem do MySQL
FROM  mysql:latest

# Copia o arquivo 'demo.sql' para a pasta '/docker-entrypoint-initdb.d/', para poder rodar o banco
COPY ./demo.sql /docker-entrypoint-initdb.d/
```

***Para executar a aplicação:***

1. Fazer o build da imagem do [frontend/](https://github.com/marcosvaz/php-sample-app/tree/master/frontend) com:
```sh
docker build . -t frontend:0.0.1
```

2. Fazer o build da imagem do [backend/](https://github.com/marcosvaz/php-sample-app/tree/master/backend) com:
```sh
docker build . -t db:0.0.1
docker run -d -e MYSQL_DATABASE='demo'  -e MYSQL_ALLOW_EMPTY_PASSWORD='yes' --name backend db:0.0.1
```

* 2.1: Caso queira testar o banco:
```sh
docker exec -ti backend mysql -u root -p
```

3. Para rodar as imagens do frontend e do backend juntas:
```sh
docker run -d -p 80:80 --name php-sample-app --link backend frontend:0.0.1
```
