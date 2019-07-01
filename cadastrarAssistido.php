<?php
session_start();
include("conexao.php");

$matricula = mysqli_real_escape_string($conexao, trim($_POST['matricula']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$tipo_estagiario = mysqli_real_escape_string($conexao, trim($_POST['tipo_estagiario']));
$hora_estagiario = mysqli_real_escape_string($conexao, trim($_POST['hora_estagiario']));

$sql = "select count(*) as total from usuario where matricula = '$matricula'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['matricula_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "INSERT INTO usuario (matricula, nome, email, senha, tipo_estagiario, hora_estagiario, data_cadastro) VALUES ('$matricula', '$nome', '$email', '$senha', '$tipo_estagiario', '$hora_estagiario', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;
?>