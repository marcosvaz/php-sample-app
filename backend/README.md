# Backend

## Documentação

```sh
# Recupera a imagem do MySQL na versão 5.7
FROM  mysql:5.7

# Copia o arquivo 'demo.sql' para a pasta '/docker-entrypoint-initdb.d/', para poder rodar o banco
COPY ./demo.sql /docker-entrypoint-initdb.d/
```

---

## Execução

Build da imagem do backend:

```sh
docker build . -t db:0.0.1
```
> Esse comando serve para buildar a imagem do banco 'db:0.0.1'

Para rodar a imagem:
```sh
docker run -d -e MYSQL_DATABASE='demo'  -e MYSQL_ALLOW_EMPTY_PASSWORD='yes' --rm --name backend db:0.0.1
```
> Esse comando serve para rodar a imagem do banco ('db:0.0.1') em background ('-d'), passando os parâmetros ('-e') do nome do banco (MYSQL_DATABASE='demo'), indicando que a senha pode ser vazia (MYSQL_ALLOW_EMPTY_PASSWORD='yes'), com um parâmetro para caso matar o container, ele já remover a imagem ('--rm'), e dando o nome backend para o container ('--name backend')
