<?php
session_start();
include("conexao.php");

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

$sql = "select count(*) as total from funcionario where mat_func = '$mat_func'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['matricula_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "INSERT INTO funcionario (mat_func, cpf_func, nome_func, rg_func, endereco_func,
								id_tipo_func, instituicao_func, matricula_inst_func,
								email_func, hora_expediente_func, senha_func, 		
								data_cadastro_func) 
								VALUES('$mat_func', '$cpf_func', '$nome_func','$rg_func',
								'$endereco_func',$id_tipo_func,'$instituicao_func',
								'$matricula_inst_func','$email_func','$hora_expediente_func',
								'$senha_func', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;
?>