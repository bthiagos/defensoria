<?php
session_start();
include('conexao.php');

if(empty($_POST['mat_func']) || empty($_POST['senha_func'])) {
	header('Location: index.php');
	exit();
}

$mat_func = mysqli_real_escape_string($conexao, trim($_POST['mat_func']));
$senha_func = mysqli_real_escape_string($conexao, trim($_POST['senha_func']));

$query = "select nome_func from funcionario where mat_func = '{$mat_func}' and senha_func = md5('{$senha_func}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$matricula_bd = mysqli_fetch_assoc($result);
	$_SESSION['nome_func'] = $matricula_bd['nome_func'];
	$_SESSION['mat_func'] = $matricula_bd['mat_func'];
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
?>