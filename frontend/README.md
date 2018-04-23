# Frontend

## Execução

Para buildar a imagem do frontend:

```sh
docker build . -t frontend:0.0.1
```

Para rodar a imagem:
```sh
docker run -d -p 80:80 --name app frontend:0.0.1
```

> Esse comando serve para rodar a imagem frontend:0.0.1 ('run'), em background ('-d'), na porta 80 (-p 80:80), com o nome app (--name app)
