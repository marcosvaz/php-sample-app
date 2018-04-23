# Backend

## Execução

Build da imagem do backend:

```sh
docker build . -t db:0.0.1
```

> Esse comando serve para buildar a imagem do banco 'db:0.0.1'

Para rodar a imagem:
```sh
docker run -d -e MYSQL_DATABASE='demo'  -e MYSQL_ALLOW_EMPTY_PASSWORD='yes' --name backend db:0.0.1
```

> Esse comando serve para rodar a imagem do banco ('db:0.0.1') em background ('-d'), passando os parâmetros ('-e') do nome do banco (MYSQL_DATABASE='demo') e a senha (MYSQL_ALLOW_EMPTY_PASSWORD='yes'), com o nome backend ('--name backend')
