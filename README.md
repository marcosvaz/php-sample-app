# Aplicação em formato "CRUD" executada em containers com base na linguagem "PHP" e no banco de dados "MySQL";

---

## Documentação dos Dockerfiles

***Dockerfile*** na [raiz](https://github.com/marcosvaz/php-sample-app/tree/master/):
```sh
# Recupera a imagem do PHP na versão 7.2 com apache
FROM  php:7.2-apache

# Realiza o comando 'docker-compose up' no prompt para buildar as imagens
CMD ["docker-compose", "up"]
```

***Dockerfile*** no [frontend/](https://github.com/marcosvaz/php-sample-app/tree/master/frontend):
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

***Dockerfile*** no [backend/](https://github.com/marcosvaz/php-sample-app/tree/master/backend):
```sh
# Recupera a imagem do MySQL na versão 5.7
FROM  mysql:5.7

# Copia o arquivo 'demo.sql' para a pasta '/docker-entrypoint-initdb.d/', para poder rodar o banco
COPY ./demo.sql /docker-entrypoint-initdb.d/
```

---

## Execução da aplicação (modo automático):

***Passo a passo para a execução:***

#### 1. Fazer fork do repositório 'https://github.com/marcosvaz/php-sample-app'  

#### 2. Clonar ***o seu*** repositório em sua máquina

#### 3. Iniciar o Docker Quickstart Terminal, caso não o tenha, baixe o Docker Toolbox [aqui](https://download.docker.com/win/stable/DockerToolbox.exe)
> Caso seu usuário não tenha permissão de Administrador, clique com o botão direito no Docker Quickstart Terminal, em 'Executar como Administrador', e entre com sua senha da conta de Administrador

* 3.1: Espere a aparição do logo do Docker em código e a geração do IP no Docker Quickstart Terminal

#### 4. Entrar na pasta raiz da aplicação
> Abra o terminal na pasta ou navegue até ela pelo prompt de comando, usando 'cd' e o caminho da pasta, como por exemplo: 'cd C:/Users/SEU_USUARIO/CAMINHO_DA_PASTA/php-sample-app'

* 4.1 Fazer o build da imagem do [frontend/](https://github.com/marcosvaz/php-sample-app/tree/master/frontend) e do [backend/](https://github.com/marcosvaz/php-sample-app/tree/master/backend) com:
```sh
docker-compose up
```

#### 5. Aguarde o build estar totalmente completo, deve levar em média uns 2 minutos, e acesse a aplicação, usando o IP gerado no Docker Quickstart Terminal, através do navegador
> Caso tenha fechado, geralmente o IP gerado é '192.168.99.100'

---

## Extras (do modo automático)
#### No arquivo docker-compose.yml existem algumas configurações de build, como:
+ Nome do container, para alterar, edite as linhas que contiverem:
```yml
container_name: 'nome_do_container'
```
> Troque 'nome_do_container' para o nome desejado

+ Build, para alterar, edite as linhas que contiverem:
```yml
build: ./caminho_do_Dockerfile
```
> Troque './caminho_do_Dockerfile' pelo caminho do Dockerfile referente ao build daquele container, ou caso não necessite de nada além da imagem, coloque a imagem diretamente, como por exemplo: 'build: mysql:5.7'; 'build: php:7.2-apache'

+ Portas, para alterar, edite as linhas que contiverem:
```yml
ports:
  - "porta_do_servidor":"porta_da_maquina"
```
> Troque as portas para as desejadas, mas mantenha o padrão de liberar a mesma porta exposta no servidor, como por exemplo: "80:80"; "443:443"; "3306:3306";

+ Variáveis de ambiente, para alterar, edite as linhas que contiverem:
```yml
enviroment:
  - variável=valor
```
> No frontend existem as variáveis 'MYSQL_SERVER', 'MYSQL_USER', 'MYSQL_PASS' e 'MYSQL_DATABASE'
>
> Já no backend existem as variáveis 'MYSQL_ROOT_PASSWORD', 'MYSQL_ALLOW_EMPTY_PASSWORD' e 'MYSQL_DATABASE'
>
> Caso você queira adicionar um usuário novo, defina as variáveis 'MYSQL_USER' e 'MYSQL_PASSWORD' no enviroment do backend, como no exemplo abaixo:
```yml
enviroment:
  [...]
  - MYSQL_USER=seu_usuario
  - MYSQL_PASSWORD=sua_senha
```

---

## Execução da aplicação (modo manual):

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
docker run -d -e MYSQL_DATABASE=demo -e MYSQL_ALLOW_EMPTY_PASSWORD=yes -e MYSQL_ROOT_PASSWORD=123456 -e MYSQL_USER=seu_usuario -e MYSQL_PASSWORD=sua_senha --rm --name backend db:0.0.1
```
> Aonde está '-e MYSQL_USER=seu_usuario', troque o nome de usuário para um que você queira, e na senha '-e MYSQL_PASSWORD=sua_senha' também

* 5.2: Espere em média um minuto para que o banco seja criado

* 5.3: Caso queira testar o banco, execute:
```sh
docker exec -ti backend mysql -u root -p
```
> Irá aparecer um campo para digitar a senha ('Enter password:'), digite a senha que está no 'MYSQL_ROOT_PASSWORD' do passo acima, e dê 'enter'
>
> Caso você definiu um usuário e senha para você, aonde está 'root' troque pelo seu usuário, e quando pedir a senha, digite a senha que você definiu
>
> Você pode visualizar os bancos criados com o comando:
```sql
show databases;
```
>
> Para ver se a tabela 'students' foi criada, execute:
```sql
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
> Caso tenha fechado, geralmente o IP gerado é '192.168.99.100'

---

## Extras (do modo manual)
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

---

## O container do backend com o banco, é Statefull, comportando dados
## Enquanto o do frontend é Stateless, podendo ser matado a qualquer hora
