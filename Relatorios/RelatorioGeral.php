<?php
$id_cli = $_GET['id_cli'];
date_default_timezone_set('America/Sao_Paulo');
define('FPDF_FONTPATH' , 'font/');
require('../pdf/fpdf.php');
$data = date('d/m/Y H:i:s');
$pdf = new FPDF('p' , 'cm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', '12');
$pdo = new PDO('mysql:host=localhost; dbname=pwii', 'root', '');
$sql = $pdo->prepare("select * from cliente where id = $id_cli");
$sql->execute();
$pdf->cell(18, 1, "Relatorio de Cliente", 1, 1, 'C');
$pdf->cell(18, 1, $data, 1, 2, 'C');
foreach ($sql as $resultado) {
    $pdf->cell(3, 1, "Codigo", 1, 0, 'C');
    $pdf->cell(5, 1, $resultado['id'], 1, 0, 'C');
    $pdf->cell(3, 1, "CPF", 1, 0, 'C');
    $pdf->cell(7, 1, $resultado['cpf'], 1, 1, 'C');
    $pdf->cell(3, 1, "Nome", 1, 0, 'C');
    $pdf->cell(15, 1, utf8_encode($resultado['nome']), 1, 1, 'C');
    $pdf->cell(3, 1, "Email", 1, 0, 'C');
    $pdf->cell(5, 1, utf8_encode($resultado['email']), 1, 0, 'C');
    $pdf->cell(3, 1, "RG", 1, 0, 'C');
    $pdf->cell(7, 1, utf8_encode($resultado['rg']), 1, 1, 'C');
    $pdf->cell(3, 1, utf8_encode("Endereco"), 1, 0, 'C');
    $pdf->cell(5, 1, utf8_encode($resultado['endereco']), 1, 0, 'C');
    $pdf->cell(3, 1, "Complemento", 1, 0, 'C');
    $pdf->cell(7, 1, $resultado['complemento'], 1, 1, 'C');
    $pdf->cell(3, 1, utf8_encode("Bairro"), 1, 0, 'C');
    $pdf->cell(5, 1, utf8_encode($resultado['bairro']), 1, 0, 'C');
    $pdf->cell(3, 1, "Cidade", 1, 0, 'C');
    $pdf->cell(7, 1, $resultado['cidade'], 1, 1, 'C');
    $pdf->cell(3, 1, utf8_encode("Estado"), 1, 0, 'C');
    $pdf->cell(5, 1, utf8_encode($resultado['estado']), 1, 0, 'C');
    $pdf->cell(3, 1, "CEP", 1, 0, 'C');
    $pdf->cell(7, 1, $resultado['cep'], 1, 1, 'C');
}
$pdf->OutPut();


