FROM  mysql:latest

COPY ./demo.sql /docker-entrypoint-initdb.d/

# Doc . do Mysql: https://hub.docker.com/_/mysql/

# Build:
# docker build . -t db:0.0.1

# Run:
# docker run -d -e MYSQL_DATABASE='demo'  -e MYSQL_ALLOW_EMPTY_PASSWORD='yes' --name backend db:0.0.1

# Logs:
# docker logs backend -f

# Testando a conexão no banco:
# docker exec -ti backend mysql -u root -p