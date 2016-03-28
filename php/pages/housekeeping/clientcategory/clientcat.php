<?php
header("Content-Type: application/pdf");
header('Content-Disposition:inline; filename="testing.pdf"'); 
include($_SERVER['DOCUMENT_ROOT'].'/php/pages/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
?> 