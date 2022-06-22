<?php

include 'config.ini.php';
include "PDFMerger.php";
require_once('tcpdf/tcpdf.php');

$nombre_document_all = $_GET['nombre'];
$key_document = $_GET['id'];

echo '<iframe src="templates/documentacion/pdf_final/informe_final$key_document.pdf"></iframe>';
$pdf = new PDFMerger;

$pdf->addPDF('templates/documentacion/pdf_final/informe_final'.$key_document.'.pdf', '1')
    ->addPDF('templates/documentacion/pdf/documentacion_'.$key_document.'/'.$nombre_document_all.'.pdf','all')
    ->merge('browser', 'informe_final.pdf');

?>