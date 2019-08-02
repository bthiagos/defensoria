<?php
session_start();
include("conexao.php");
header('Content-Type: text/html; charset=utf-8');

$rg_ass = mysqli_real_escape_string($conexao, trim($_POST['RG_ASS']));
$prioridade_atendimento = mysqli_real_escape_string($conexao, trim($_POST['PRIORIDADE_ATENDIMENTO']));
$comentario_atendimento = mysqli_real_escape_string($conexao, trim($_POST['COMENTARIO_ATENDIMENTO']));
$id_direito = mysqli_real_escape_string($conexao, trim($_POST['ID_DIREITO']));
$mat_func = mysqli_real_escape_string($conexao, trim($_POST['MAT_FUNC']));


$sql = "select count(*) as total from atendimento where RG_ASS = '$rg_ass'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

/*if($row['total'] == 1) {
	$_SESSION['atendimento_existe'] = true;
	header('Location: novoAtendimento.php');
	exit;
}*/

$sql = "INSERT INTO atendimento (RG_ASS, ID_DIREITO, PRIORIDADE_ATENDIMENTO, 
								MAT_FUNC, COMENTARIO_ATENDIMENTO, HORA_ATENDIMENTO) 
								VALUES ('$rg_ass', '$id_direito', '$prioridade_atendimento', 
								'$mat_func', '$comentario_atendimento', NOW())";


if($conexao->query($sql) === TRUE) {
	$_SESSION['status_atendimento'] = true;
}

$conexao->close();



header('Location: novoAtendimento.php');
exit;
?>