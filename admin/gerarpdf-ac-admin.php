<?php
header('Content-Type: text/html; charset=utf-8');
include("../conexao.php");
include('verifica_login-admin.php');
include('./fpdf/fpdf.php');
define('FPDF_FONTPATH','font/');

if(isset($_GET['id'])):
    $id = mysqli_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM atendimento 
    INNER JOIN funcionario ON funcionario.MAT_FUNC = atendimento.MAT_FUNC
    INNER JOIN assistido ON assistido.RG_ASS = atendimento.RG_ASS
    INNER JOIN area_do_direito ON area_do_direito.ID_DIREITO = atendimento.ID_DIREITO
    INNER JOIN tipo_funcionario ON tipo_funcionario.ID_TIPO_FUNC = funcionario.ID_TIPO_FUNC
    WHERE funcionario.MAT_FUNC = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados =  mysqli_fetch_array($resultado);
endif;  

//SELECT
if(isset($_GET['id'])):
    $id = mysqli_escape_string($conexao, $_GET['id']);
    $sql = "SELECT count(*) as total from atendimento where MAT_FUNC = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados1 =  mysqli_fetch_array($resultado);
endif; 

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Ln(5);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(220,10,utf8_decode('Relatório de Atividade Complementar'),0,0,"C");
$pdf->Image('./img/logo-defensoria.png',10,15,-180);
$pdf->Ln(21);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(190, 10,utf8_decode("Dados das Atividades Complementares do Estagiário"),1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,7,utf8_decode("Matrícula"),1,0,'L');
$pdf->Cell(130,7,utf8_decode($dados['MAT_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(60,7,utf8_decode("Nome"),1,0,'L');
$pdf->Cell(130,7,utf8_decode($dados['NOME_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(60,7,utf8_decode("E-mail"),1,0,'L');
$pdf->Cell(130,7,utf8_decode($dados['EMAIL_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(60,7,utf8_decode("Tipo de Estagio"),1,0,'L');
$pdf->Cell(130,7,utf8_decode($dados['CARGO_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(60,7,utf8_decode("Expediente"),1,0,'L');
$pdf->Cell(130,7,utf8_decode($dados['HORA_EXPEDIENTE_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(60,7,utf8_decode('Instituição de Ensino'),1,0,'L');
$pdf->Cell(130,7,utf8_decode($dados['INSTITUICAO_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(60,7,utf8_decode('Matrícula da Instituição de Ensino'),1,0,'L');
$pdf->Cell(130,7,utf8_decode($dados['MATRICULA_INST_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(60,7,utf8_decode("Tipo de Atividade"),1,0,'L');
$pdf->Cell(130,7,utf8_decode("Acompanhamento dos assistidos oriundos da triagem."),1,0,'L');
$pdf->Ln();


ob_clean ();
$pdf->Output();

?>
