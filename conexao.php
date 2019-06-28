<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', 'senha');
define('DB', 'defensoria');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
?>