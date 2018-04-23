# Frontend

## Execução

Build da imagem do frontend:

```sh
docker build . -t frontend:0.0.1
```

> Esse comando serve para buildar a imagem frontend:0.0.1

Para rodar a imagem:
```sh
docker run -d -p 80:80 --name php-sample-app frontend:0.0.1
```

> Esse comando serve para rodar a imagem frontend:0.0.1 ('run'), em background ('-d'), na porta 80 (-p 80:80), com o nome php-sample-app (--name php-sample-app)
