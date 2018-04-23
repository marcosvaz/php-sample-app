# Sistemas para Internet - SecDevOps

***nac:*** Criação de uma aplicação no formato "CRUD" executada em containers com base na linguagem "PHP" e no banco de dados "MySQL";

---

## Documentação dos Dockerfiles

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

---

## Execução da aplicação:

***Passo a passo para a execução:***

1. Fazer fork do repositório 'https://github.com/marcosvaz/php-sample-app'

2. Clonar ***o seu*** repositório em sua máquina

3. Iniciar o Docker Quickstart Terminal
> Caso não o tenha, [baixe aqui](https://download.docker.com/win/stable/DockerToolbox.exe)
> Caso seu usuário não tenha permissão de Administrador, clique com o botão direito no Docker Quickstart Terminal, em 'Executar como Administrador', e entre com sua senha da conta de Administrador

* 3.1: Espere a aparição do logo do Docker em código e a geração do IP no Docker Quickstart Terminal

4. Entrar na pasta 'frontend' da aplicação
> Abra o terminal na pasta ou navegue até ela pelo prompt de comando, usando 'cd' e o caminho da pasta, como por exemplo: 'cd C:/Users/SEU_USUARIO/CAMINHO_DA_PASTA/php-sample-app/frontend'

* 4.1 Fazer o build da imagem do [frontend/](https://github.com/marcosvaz/php-sample-app/tree/master/frontend) com:
```sh
docker build . -t frontend:0.0.1
```

5. Entrar na pasta 'backend' da aplicação
> Abra o terminal na pasta ou navegue até ela pelo prompt de comando usando 'cd ../backend'

* 5.1: Fazer o build da imagem do [backend/](https://github.com/marcosvaz/php-sample-app/tree/master/backend) com:
```sh
docker build . -t db:0.0.1
docker run -d -e MYSQL_DATABASE='demo'  -e MYSQL_ALLOW_EMPTY_PASSWORD='yes' --name backend db:0.0.1
```
* 5.2: Espere 30 segundos para a criação do banco

* 5.2: Caso queira testar o banco:
```sh
docker exec -ti backend mysql -u root -p
```

6. Voltar para a pasta 'frontend'

* 6.1: Para rodar as imagens do frontend junto do backend:
```sh
docker run -d -p 80:80 --name php-sample-app --link backend frontend:0.0.1
```
> Abra o terminal na pasta ou navegue até ela pelo prompt de comando, usando 'cd ../frontend'

7. Para ver o container rodando, acesse o IP gerado no Docker Quickstart Terminal pelo navegado
> Caso tenha fechado, normalmente o IP gerado é '192.168.99.100'
