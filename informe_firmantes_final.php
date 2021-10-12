<?php
error_reporting(0);
include('config.ini.php');
include("design/PDFMerger-master/PDFMerger.php");
//require 'design/PDFMerger-master/tcpdf/tcpdf.php'
require_once('pdf/tcpdf.php');
$key_encritp = $_GET['key'];
$key = base64_decode($key_encritp);


$cantidad = mysqli_prepare($connect,"SELECT url FROM archivos_documentacion WHERE id_documentacion = ?");
mysqli_stmt_bind_param($cantidad, 'i', $key);
mysqli_stmt_execute($cantidad);
mysqli_stmt_store_result($cantidad);
mysqli_stmt_bind_result($cantidad,  $pdf_completar);
mysqli_stmt_fetch($cantidad);

$nombre_pdf = str_replace('templates/documentacion/pdf/', '', $pdf_completar);

function count_pdf_pages($pdfname) {
  $pdftext = file_get_contents($pdfname);
  $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
  return $num;
}
$pdfname = $pdf_completar; // Put your PDF path
$pages = count_pdf_pages($pdfname);
  
//CABECERAS PERSONALIZADAS
class MYPDF extends TCPDF 
{
    //Page header
    public function Header() 
	{}
	
    // Page footer
   public function Footer() 
	{}
}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle("");
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 49, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(35);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('freesans', 'R', 11);

/*
$consultar = mysqli_prepare($connect,"SELECT url FROM archivos_documentacion WHERE id_documentacion = ? ORDER BY pagina ASC");
mysqli_stmt_bind_param($consultar, 'i', $key);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $url);

while($row = mysqli_stmt_fetch($consultar)){
$pdf->AddPage('A4');
$img = base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $url));
 $pdf->Image("@".$img, 15, 0, 0, 0);

}*/


$query = mysqli_prepare($connect,"SELECT a.nombre, c.nombre FROM empresa as a, numot as b, documentacion as c WHERE a.id_empresa = b.id_empresa AND c.id_numot = b.id_numot AND c.id = ?");
mysqli_stmt_bind_param($query, 'i', $key);
mysqli_stmt_execute($query);
mysqli_stmt_store_result($query);
mysqli_stmt_bind_result($query, $empresa, $proyecto);
mysqli_stmt_fetch($query);

$pdf->AddPage('A4');
$html = <<<EOD
<h2 style="text-align:center;">DOCUMENTO DE FIRMA ELECTRONICA</h2>
<p>El siguiente documento contiene la relación de los participantes, quienes por medio  la misma aceptan y dan por entendido
que lo demostrado en los adjuntos disponibles para <strong>$proyecto</strong>, son verecez y cumplen con el proposito por el cual han sido creados.
<br>
Por lo consiguiente se acepta que el siguiente proceso es de firma electronica, y cumple con lo estipulado en la <strong>CFR 21 (parte 11).</strong>
Por ende se busca  promover la integridad de datos del uso de los registros y firmas electrónicas de manera que los datos no se distorsionen, eliminen
o manipulen de ninguna manera que pueda comprometer la prestación de servicios. 
</p>
<br>
<p>Empresas participantes:</p>
<br>
<p style="text-align:center;">Cercal Group</p>
<p style="text-align:center;">$empresa</p>
<br>
EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$enunciados = array('Preparado por:','Revisado por:', 'Aprobado por:');
$sumale = 0;
$que_hace = "";


$participantes = mysqli_prepare($connect,"SELECT rol FROM participante_documentacion WHERE id_documentacion = ? order by tipo ASC");
mysqli_stmt_bind_param($participantes, 'i', $key);
mysqli_stmt_execute($participantes);
mysqli_stmt_store_result($participantes);
mysqli_stmt_bind_result($participantes, $tipo);

while($row = mysqli_stmt_fetch($participantes)){
  
  if($tipo == 1){
    $que_hace = "Elaborado por";
  }else if($tipo == 2){
    $que_hace = "Revisado por";
  }else{
    $que_hace = "Aprobado por";
  }
  

  $contador = 1;
  $firma_que = "";
  $consultar_2 = mysqli_prepare($connect,"SELECT  a.firma, a.fecha_registro, b.nombre, b.apellido, b.cargo,  CASE  WHEN a.tipo_firma =  '' THEN 'Sin firma registada'  ELSE a.tipo_firma END as tipo_firma FROM firmantes_documentacion as a, persona as b WHERE a.id_documento = ? AND a.id_usuario = b.id_usuario ORDER BY fecha_registro ASC ");
  mysqli_stmt_bind_param($consultar_2, 'i', $key);
  mysqli_stmt_execute($consultar_2);
  mysqli_stmt_store_result($consultar_2);
  mysqli_stmt_bind_result($consultar_2,  $firma, $fecha_registro, $nombre, $apellido, $cargo, $tipo_firma);

  while($row = mysqli_stmt_fetch($consultar_2)){
    
    $pdf->writeHTMLCell(60, 5, 10, '', '<srtong>'.$que_hace.'</srtong>', 1, 0, 0, true, 'C', true);

    $pdf->writeHTMLCell(70, 5, 70, '', '<srtong>Fecha</srtong>', 1, 0, 0, true, 'C', true);

    $pdf->writeHTMLCell(60, 5, 140, '', '<srtong>Firma</srtong>', 1, 1, 0, true, 'C', true);

    if($firma == 0){
      $firma_que = "Pluma";
      $img = base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $tipo_firma));

      $rutaImagenSalida = __DIR__ . "/".$contador.".png";
      $imagenBinaria = base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $tipo_firma));
      $bytes = file_put_contents($rutaImagenSalida, $imagenBinaria);


      $pdf->writeHTMLCell(60, 30, 10, '','<br> '. $nombre.' '.$apellido.'<br> Cargo: '.$cargo, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(70,30, 70, '',$fecha_registro, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(60, 30, 140, '', '<br><img src="'.$contador.'.png" width="120" height="89"/>', 1, 1, 0, true, 'J', true);


    }else{
      $firma_que = "Token";
      $pdf->writeHTMLCell(60, 30, 10, '', $nombre.' '.$apellido.'<br> Cargo: '.$cargo, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(70,30, 70, '',$fecha_registro, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(60, 30, 140, '', $tipo_firma, 1, 1, 0, true, 'C', true);
    }
    $contador++;
     $sumale++;
  }
}


$variable_url = $_SERVER['HTTP_HOST'];
$donde = "";
if($variable_url == "cercal.net"){
  $donde = "CERNET";
}else{
  $donde = "CerNet2.0";
}

$pdf->Output($_SERVER['DOCUMENT_ROOT'].$donde.'/templates/documentacion/pdf_final/informe_final'.$key.'.pdf', 'F');


/////////////////////////////CONTEO DE LAS PAGES

$pdf = new PDFMerger;

$pdf->addPDF($pdf_completar, "1")
->addPDF('templates/documentacion/pdf_final/informe_final'.$key.'.pdf', "1")
->addPDF($pdf_completar, "1-".$pages)
->merge("browser", $nombre_pdf);
?>