<?php
if(!isset($_SESSION['nome_func'])){
	header('Location: index.php');
		exit();
}
header('Content-Type: text/html; charset=utf-8');
?>