<?php
/* Credenciais de comunicação com o banco. */
define('DB_SERVER', $_ENV['MYSQL_SERVER']); // Para alterar o database atentar-se para o campo "--link" usado para conexão com o banco;
define('DB_USERNAME', $_ENV['MYSQL_USER']); // Se possivel evitar o uso do usuário root trocando por um usuário personaliado;
define('DB_PASSWORD', $_ENV['MYSQL_PASS']); // Adicionar também uma senha ao SGBD para o usuário personalisado;
define('DB_NAME', 'demo');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>
