<?php
header('Content-Type: text/html; charset=utf-8');

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'db_defensoria');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
?>