<?php
session_start();
include("conexao.php");
header('Content-Type: text/html; charset=utf-8');


echo $_SESSION['mat_func'];
echo $_SESSION['nome_func'];
echo $_SESSION['maxmat'];

?>