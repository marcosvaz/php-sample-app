# Sistemas para Internet - SecDevOps

***nac:*** Criação de uma aplicação no formato "CRUD" executada em containers com base na linguagem "PHP" e no banco de dados "MySQL";

---

***Para executar a aplicação:***

1. Fazer o build da imagem do [backend/](https://github.com/marcosvaz/php-sample-app/tree/master/backend) com:
```sh
docker build . -t db:0.0.1
docker run -d -e MYSQL_DATABASE='demo'  -e MYSQL_ALLOW_EMPTY_PASSWORD='yes' --name backend db:0.0.1
```

2. Fazer o build da imagem do [frontend/](https://github.com/marcosvaz/php-sample-app/tree/master/frontend) com:
```sh
docker build . -t frontend:0.0.1
```

3. Para rodar as imagens do frontend e do backend juntas:
```sh
docker run -d -p 80:80 --name php-sample-app --link backend frontend:0.0.1
```
