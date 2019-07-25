<?php
session_start();
include('verifica_login.php');
include("conexao.php");
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
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Relatório de Desempenho'),0,0,"C");
$pdf->Image('./img/logo-defensoria.png',10,10,-200);
$pdf->Ln(15);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(190, 8,utf8_decode("Dados de Desempenho do Estagiário"),1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,7,utf8_decode("Matrícula"),1,0,'L');
$pdf->Cell(140,7,utf8_decode($dados['MAT_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(50,7,utf8_decode("Nome"),1,0,'L');
$pdf->Cell(140,7,utf8_decode($dados['NOME_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(50,7,utf8_decode("E-mail"),1,0,'L');
$pdf->Cell(140,7,utf8_decode($dados['EMAIL_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(50,7,utf8_decode("Tipo de Estagio"),1,0,'L');
$pdf->Cell(140,7,utf8_decode($dados['CARGO_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(50,7,utf8_decode("Expediente"),1,0,'L');
$pdf->Cell(140,7,utf8_decode($dados['HORA_EXPEDIENTE_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(50,7,utf8_decode('Instituição de Ensino'),1,0,'L');
$pdf->Cell(140,7,utf8_decode($dados['INSTITUICAO_FUNC']),1,0,'L');
$pdf->Ln();

$pdf->Cell(50,7,utf8_decode("Atendimentos"),1,0,'L');
$pdf->Cell(140,7,utf8_decode($dados1['total']),1,0,'L');
$pdf->Ln();

//while($dados = mysqli_fetch_array($resultado)){
    //$pdf->Cell(20,7,utf8_decode($dados['MAT_FUNC']),1,0,'C');
    //$pdf->Cell(50,7,utf8_decode($dados['NOME_FUNC']),1,0,'C');
    //$pdf->Cell(50,7,utf8_decode($dados['EMAIL_FUNC']),1,0,'C');
    //$pdf->Cell(30,7,utf8_decode($dados['CARGO_FUNC']),1,0,'C');
    //$pdf->Cell(30,7,utf8_decode($dados['HORA_EXPEDIENTE_FUNC']),1,0,'C');
    //$pdf->Cell(40,7,utf8_decode($dados['INSTITUICAO_FUNC']),1,0,'C');
    //$pdf->Cell(20,7,utf8_decode($dados['INSTITUICAO_FUNC']),1,0,'C');
   // $pdf->Cell(50,7,utf8_decode($dados1['total']),1,0,'C');
    $pdf->Ln();
//}
class PDF extends FPDF
{
function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}
ob_clean ();
$pdf->Output();

?>
