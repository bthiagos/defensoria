<?php
session_start();
include("conexao.php");

$nome_assistido = mysqli_real_escape_string($conexao, trim($_POST['nome_assistido']));
$cpf_assistido = mysqli_real_escape_string($conexao, trim($_POST['cpf_assistido']));
$sexo_assistido = mysqli_real_escape_string($conexao, trim($_POST['sexo_assistido']));
$email_assistido = mysqli_real_escape_string($conexao, trim($_POST['email_assistido']));
$estadocivil_assistido = mysqli_real_escape_string($conexao, trim($_POST['estadocivil_assistido']));
$idareadodireito = mysqli_real_escape_string($conexao, trim($_POST['idareadodireito']));
$idestagiario = mysqli_real_escape_string($conexao, trim($_POST['idestagiario']));

$sql = "select count(*) as total from atendimento where nome_assistido = '$nome_assistido'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['assistido_existe'] = true;
	header('Location: novoAtendimento.php');
	exit;
}

$sql = "INSERT INTO atendimento (nome_assistido, cpf_assistido, sexo_assistido, email_assistido, estadocivil_assistido, idareadodireito, idestagiario) VALUES ('$nome_assistido', '$cpf_assistido', '$sexo_assistido', '$email_assistido', '$estadocivil_assistido', '$idareadodireito', '$idestagiario')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_atendimento'] = true;
}

$conexao->close();

header('Location: novoAtendimento.php');
exit;
?>