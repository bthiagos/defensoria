<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
if(!isset($_SESSION['nome_func']) && !isset($_SESSION['mat_func'])){
		header('Location: ../index.php');
		exit();
}

if($_SESSION['id_tipo_func'] != 1){
	session_destroy();
}

?>