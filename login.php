<?php
session_start();
include('conexao.php');
header('Content-Type: text/html; charset=utf-8');

if(empty($_POST['mat_func']) || empty($_POST['senha_func'])) {
	header('Location: index.php');
	exit();
}

$mat_func = mysqli_real_escape_string($conexao, trim($_POST['mat_func']));
$senha_func = mysqli_real_escape_string($conexao, trim($_POST['senha_func']));
$id_tipo_func = mysqli_real_escape_string($conexao, trim($_POST['id_tipo_func']));

//$query = "select nome_func, mat_func from funcionario where mat_func = '{$mat_func}' and senha_func = md5('{$senha_func}')";
$query = "select nome_func, mat_func, id_tipo_func from funcionario where mat_func = '{$mat_func}' and senha_func = md5('{$senha_func}') and id_tipo_func = {$id_tipo_func}";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
//$row2 = mysqli_num_rows($result);

//$sql = "SELECT * FROM tipo_funcionario";
//$res = msqli_query($conexao,$sql);
$matricula_bd = mysqli_fetch_assoc($result);

if(($row == 1) && ($id_tipo_func == 1)){
	$_SESSION['nome_func'] = $matricula_bd['nome_func'];
	$_SESSION['mat_func'] = $matricula_bd['mat_func'];
	$_SESSION['id_tipo_func'] = $matricula_bd['id_tipo_func'];
	header('Location: admin/painel.php');
	exit();
} else if(($row == 1) && ($id_tipo_func == 2 || $id_tipo_func == 3)){
	$_SESSION['nome_func'] = $matricula_bd['nome_func'];
	$_SESSION['mat_func'] = $matricula_bd['mat_func'];
	$_SESSION['id_tipo_func'] = $matricula_bd['id_tipo_func'];
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
?>