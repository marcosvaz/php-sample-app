# Aplicação em formato "CRUD" executada em containers com base na linguagem "PHP" e no banco de dados "MySQL";

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
# Recupera a imagem do MySQL na versão 5.7
FROM  mysql:5.7

# Copia o arquivo 'demo.sql' para a pasta '/docker-entrypoint-initdb.d/', para poder rodar o banco
COPY ./demo.sql /docker-entrypoint-initdb.d/
```

---

## Execução da aplicação:

***Passo a passo para a execução:***

#### 1. Fazer fork do repositório 'https://github.com/marcosvaz/php-sample-app'  

#### 2. Clonar ***o seu*** repositório em sua máquina

#### 3. Iniciar o Docker Quickstart Terminal, caso não o tenha, baixe o Docker Toolbox [aqui](https://download.docker.com/win/stable/DockerToolbox.exe)
> Caso seu usuário não tenha permissão de Administrador, clique com o botão direito no Docker Quickstart Terminal, em 'Executar como Administrador', e entre com sua senha da conta de Administrador

* 3.1: Espere a aparição do logo do Docker em código e a geração do IP no Docker Quickstart Terminal

#### 4. Entrar na pasta 'frontend' da aplicação
> Abra o terminal na pasta ou navegue até ela pelo prompt de comando, usando 'cd' e o caminho da pasta, como por exemplo: 'cd C:/Users/SEU_USUARIO/CAMINHO_DA_PASTA/php-sample-app/frontend'

* 4.1 Fazer o build da imagem do [frontend/](https://github.com/marcosvaz/php-sample-app/tree/master/frontend) com:
```sh
docker build . -t frontend:0.0.1
```

#### 5. Entrar na pasta 'backend' da aplicação
> Abra o terminal na pasta ou navegue até ela pelo prompt de comando usando 'cd ../backend'

* 5.1: Fazer o build da imagem do [backend/](https://github.com/marcosvaz/php-sample-app/tree/master/backend) com:
```sh
docker build . -t db:0.0.1
docker run -d -e MYSQL_DATABASE='demo' -e MYSQL_ALLOW_EMPTY_PASSWORD='yes' --rm --name backend db:0.0.1
```
* 5.2: Espere em média um minuto para que o banco seja criado

* 5.3: Caso queira testar o banco, execute:
```sh
docker exec -ti backend mysql -u root -p
```
> Irá aparecer um campo para digitar a senha ('Enter password:'), deixe vazio, apenas dê 'enter'
>
> Você pode visualizar os bancos criados com o comando:
```sh
show databases;
```
>
> Para ver se a tabela 'students' foi criada, execute:
```sh
use demo;  
show tables;
```
> Para sair digite o comando 'exit'

#### 6. Voltar para a pasta 'frontend'
> Abra o terminal na pasta ou navegue até ela pelo prompt de comando, usando 'cd ../frontend'

* 6.1: Para rodar as imagens do frontend junto do backend, execute:
```sh
docker run -d -p 80:80 --rm --name php-sample-app --link backend frontend:0.0.1
```

#### 7. Para ver o container rodando, acesse o IP gerado no Docker Quickstart Terminal através de um navegador
> Caso tenha fechado, normalmente o IP gerado é '192.168.99.100'

---

## Extras
+ Caso queira matar os containers, execute:
```sh
docker kill php-sample-app backend
```

+ Caso queira apagar as imagens, execute:
```sh
docker rmi frontend:0.0.1 db:0.0.1
```
> O comando acima irá apagar apenas as imagens criadas do projeto, mantendo as imagens do php:7.2-apache e do mysql:5.7
>
> Para apagar todas, você pode utilizar o comando 'docker rmi $(docker images -q -a)'
>
> ***Mas atenção:*** isso irá apagar todas as imagens que você tiver no computador, execute o comando 'docker images' e tenha certeza de que deseja apagar todas antes de executar o comando
