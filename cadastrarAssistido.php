<?php
session_start();
include("conexao.php");

$nome_assistido = mysqli_real_escape_string($conexao, trim($_POST['nome_assistido']));
$sexo_assistido = mysqli_real_escape_string($conexao, trim($_POST['sexo_assistido']));
$cpf_assistido = mysqli_real_escape_string($conexao, trim($_POST['cpf_assistido']));
$estadocivil_assistido = mysqli_real_escape_string($conexao, trim($_POST['estadocivil_assistido']));
$email_assistido = mysqli_real_escape_string($conexao, trim($_POST['email_assistido']));

$sql = "select count(*) as total from assistido where idassistido = '$cpf_assistido'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['cpf_assistido_existe'] = true;
	header('Location: cadastroAssistido.php');
	exit;
}

$sql = "INSERT INTO assistido (nome_assistido,sexo_assistido, cpf_assistido, estadocivil_assistido, email_assistido, data_cadastro) VALUES ('$nome_assistido','$sexo_assistido', '$cpf_assistido', '$estadocivil_assistido', '$email_assistido', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastroAssistido'] = true;
}

$conexao->close();

header('Location: cadastroAssistido.php');
exit;
?>