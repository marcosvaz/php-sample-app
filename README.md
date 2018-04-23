# Sistemas para Internet - SecDevOps

***nac:*** Criação de uma aplicação no formato "CRUD" executada em containers com base na linguagem "PHP" e no banco de dados "MySQL";

---

***Para executar a aplicação:***

1. Fazer o build da imagem do [frontend/](https://github.com/marcosvaz/php-sample-app/tree/master/frontend);
```sh
  docker build . -t frontend:0.0.1
  docker run -d -p 80:80 --name php-sample-app frontend:0.0.1
```
