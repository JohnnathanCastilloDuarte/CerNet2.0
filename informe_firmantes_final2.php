<?php
error_reporting(0);
include('config.ini.php');
include("design/PDFMerger-master/PDFMerger.php");
//require 'design/PDFMerger-master/tcpdf/tcpdf.php'
require_once('pdf/tcpdf.php');
$key_encritp = $_GET['key'];
$key = base64_decode($key_encritp);

//CABECERAS PERSONALIZADAS
class MYPDF extends TCPDF 
{
    //Page header
    public function Header() 
	{
+
		$this->writeHTMLCell(35, 22, 17, 11, '<img src="design/assets/images/logo_big.png"><br><b>Original</b>', 0, 0, 0, true, 'C', true);
    
    }
	
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
$pdf->SetFont('freesans', 'R', 9);



$query = mysqli_prepare($connect,"SELECT a.nombre, c.nombre FROM empresa as a, numot as b, documentacion as c WHERE a.id_empresa = b.id_empresa AND c.id_numot = b.id_numot AND c.id = ?");
mysqli_stmt_bind_param($query, 'i', $key);
mysqli_stmt_execute($query);
mysqli_stmt_store_result($query);
mysqli_stmt_bind_result($query, $empresa, $proyecto);
mysqli_stmt_fetch($query);

$pdf->AddPage('A4');
$html = <<<EOD
<h2 style="text-align:center;">DOCUMENTO DE FIRMA ELECTRONICA</h2>
<p style="text-align:justify">El siguiente documento contiene la relación de los participantes, quienes por medio  la misma aceptan y dan por entendido
que lo demostrado en los adjuntos disponibles para <strong>$proyecto</strong>, son veracez y cumplen con el proposito por el cual han sido creados.
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



$que_hace = "";

$consultar_2 = mysqli_prepare($connect,"SELECT  a.firma, a.fecha_firma, b.nombre, b.apellido, b.cargo, a.tipo_firma, c.rol, a.qr FROM
                                        firmantes_documentacion as a, persona as b, participante_documentacion as c WHERE a.id_documento = ?
                                        AND a.id_usuario = b.id_usuario AND a.id_usuario = c.id_persona ORDER BY fecha_firma ASC");
mysqli_stmt_bind_param($consultar_2, 'i', $key);
mysqli_stmt_execute($consultar_2);
mysqli_stmt_store_result($consultar_2);
mysqli_stmt_bind_result($consultar_2,  $firma, $fecha_registro, $nombre, $apellido, $cargo, $tipo_firma, $tipo, $qr);

while($row = mysqli_stmt_fetch($consultar_2)){


    if($tipo == 1){
        $que_hace = "Elaborado por";
    }else if($tipo == 2){
        $que_hace = "Revisado por";
    }else{
        $que_hace = "Aprobado por";
    }

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

      $pdf->writeHTMLCell(60, 30, 140, '', '<br><br><img src="'.$contador.'.png" width="120" height="89"/>', 1, 1, 0, true, 'J', true);


    }else{
      $firma_que = "Token";
      $pdf->writeHTMLCell(60, 30, 10, '', $nombre.' '.$apellido.'<br> Cargo: '.$cargo, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(70,30, 70, '',$fecha_registro, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(60, 30, 140, '', '<img src="templates/documentacion/'.$qr.'" width="120" height="89"/>', 1, 1, 0, true, 'C', true);
    }
  

    if($contador == 4){
        $pdf->AddPage('A4');
    }

    $contador++;
     $sumale++;


}/////// CIERRE DEL WHILE


$pdf->Output('Algo.pdf', 'I');
?>