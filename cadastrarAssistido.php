<?php
session_start();
include("conexao.php");

$rg_ass = mysqli_real_escape_string($conexao, trim($_POST['rg_ass']));
$nome_ass = mysqli_real_escape_string($conexao, trim($_POST['nome_ass']));
$email_ass = mysqli_real_escape_string($conexao, trim($_POST['email_ass']));
$telefone_ass = mysqli_real_escape_string($conexao, trim($_POST['telefone_ass']));
$sexo_ass = mysqli_real_escape_string($conexao, trim($_POST['sexo_ass']));

$sql = "select count(*) as total from assistido where rg_ass = '$rg_ass'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['rg_assistido_existe'] = true;
	header('Location: cadastroAssistido.php');
	exit;
}

$sql = "INSERT INTO assistido (nome_ass, sexo_ass, rg_ass, telefone_ass, email_ass) 
								VALUES ('$nome_ass','$sexo_ass', '$rg_ass',
										'$telefone_ass', '$email_ass')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastroAssistido'] = true;
}

$conexao->close();

header('Location: cadastroAssistido.php');
exit;
?>