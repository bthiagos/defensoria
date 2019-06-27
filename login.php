<?php
session_start();
include('conexao.php');

if(empty($_POST['matricula']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$matricula = mysqli_real_escape_string($conexao, trim($_POST['matricula']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

$query = "select nome from usuario where matricula = '{$matricula}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$matricula_bd = mysqli_fetch_assoc($result);
	$_SESSION['nome'] = $matricula_bd['nome'];
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
?>