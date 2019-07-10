<?php
session_start();
include("conexao.php");

$rg_ass = mysqli_real_escape_string($conexao, trim($_POST['rg_ass']));
$prioridade_atendimento = mysqli_real_escape_string($conexao, trim($_POST['prioridade_atendimento']));
$comentario_atendimento = mysqli_real_escape_string($conexao, trim($_POST['comentario_atendimento']));
$id_dir = mysqli_real_escape_string($conexao, trim($_POST['id_dir']));
$mat_func = mysqli_real_escape_string($conexao, trim($_POST['id_func']));

$sql = "select count(*) as total from atendimento where rg_ass = '$rg_ass'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['atendimento_existe'] = true;
	header('Location: novoAtendimento.php');
	exit;
}
$sql = "INSERT INTO atendimento (rg_ass, id_dir, prioridade_atendimento, 
								mat_func, comentario_atendimento) 
								VALUES ('$rg_ass', '$id_dir', '$prioridade_atendimento', 
								'$mat_func', '$comentario_atendimento')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_atendimento'] = true;
}

$conexao->close();

header('Location: novoAtendimento.php');
exit;
?>