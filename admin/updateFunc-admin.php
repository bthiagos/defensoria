<?php
header('Content-Type: text/html; charset=utf-8');
include("../conexao.php");
include('verifica_login-admin.php');

$id = $_SESSION['id'];
//if(isset($_GET['id'])):
	//$id = mysqli_escape_string($conexao, $_GET['id']);
	$mat_func = mysqli_real_escape_string($conexao, trim($_POST['mat_func']));
	$nome_func = mysqli_real_escape_string($conexao, trim($_POST['nome_func']));
	$email_func = mysqli_real_escape_string($conexao, trim($_POST['email_func']));
	$senha_func = mysqli_real_escape_string($conexao, trim(md5($_POST['senha_func'])));
	$cpf_func = mysqli_real_escape_string($conexao, trim($_POST['cpf_func']));
	$rg_func = mysqli_real_escape_string($conexao, trim($_POST['rg_func']));
	$endereco_func = mysqli_real_escape_string($conexao, trim($_POST['endereco_func']));
	$hora_expediente_func = mysqli_real_escape_string($conexao, trim($_POST['hora_expediente_func']));
	$matricula_inst_func = mysqli_real_escape_string($conexao, trim($_POST['matricula_inst_func']));
	$instituicao_func = mysqli_real_escape_string($conexao, trim($_POST['instituicao_func']));
	$id_tipo_func = mysqli_real_escape_string($conexao, trim($_POST['id_tipo_func']));
	$data_cadastro_func = mysqli_real_escape_string($conexao, trim($_POST['data_cadastro_func']));

	$sql = "UPDATE funcionario SET mat_func = '$mat_func',
	cpf_func = '$cpf_func', 
	nome_func = '$nome_func', 
	rg_func = '$rg_func', 
	endereco_func = '$endereco_func',
	id_tipo_func = $id_tipo_func, 
	instituicao_func = '$instituicao_func', 
	matricula_inst_func = '$matricula_inst_func',
	email_func = '$email_func', 
	hora_expediente_func = '$hora_expediente_func', 
	senha_func = '$senha_func', 
	data_cadastro_func = NOW(),
	WHERE mat_func = '$id'";


/*
	$sql = "UPDATE funcionario 
	SET mat_func = '$mat_func',
	cpf_func = '$cpf_func', 
	nome_func = '$nome_func', 
	rg_func = '$rg_func', 
	endereco_func = '$endereco_func',
	id_tipo_func = $id_tipo_func, 
	instituicao_func = '$instituicao_func', 
	matricula_inst_func = '$matricula_inst_func',
	email_func = '$email_func', 
	hora_expediente_func = '$hora_expediente_func', 
	senha_func = '$senha_func', 
	data_cadastro_func = NOW(),
	WHERE mat_func = '$id'";

*/
$affected_rows = mysqli_affected_rows($sql);
if($affected_rows > 0):
	header('Location: listaFuncionarios-admin.php');
endif;

/*
	if($conexao->query($sql) === TRUE) {
		$_SESSION['status_edit'] = true;
	}
	
	$conexao->close();

	header('Location: listaFuncionarios-admin.php');
	exit;
//endif;*/
?>