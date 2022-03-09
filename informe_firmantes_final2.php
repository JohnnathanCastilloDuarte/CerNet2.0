<?php
error_reporting(0);
include('config.ini.php');
include("design/PDFMerger-master/PDFMerger.php");
//require 'design/PDFMerger-master/tcpdf/tcpdf.php'
require_once('pdf/tcpdf.php');
$key_encritp = $_GET['key'];
$key = base64_decode($key_encritp);

$consultar_quien_falta = mysqli_prepare($connect,"SELECT COUNT(id) FROM participante_documentacion WHERE id_documentacion = ? AND fecha_firma is NULL;");
mysqli_stmt_bind_param($consultar_quien_falta, 'i', $key);
mysqli_stmt_execute($consultar_quien_falta);
mysqli_stmt_store_result($consultar_quien_falta);
mysqli_stmt_bind_result($consultar_quien_falta, $cuantos);
mysqli_stmt_fetch($consultar_quien_falta);

if($cuantos != 0){
    $tipo_originalidad = "<span style='color:red;'>Copia Controlada</span>";
}else{
    $tipo_originalidad = "<span>Documento Original</span>";
}




//CABECERAS PERSONALIZADAS
class MYPDF extends TCPDF 
{
    //Page header
    public function Header() 
	{
    global $key, $tipo_originalidad;
		// Set border style
		$this->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(120, 120, 120)));
        // Logo
		$this->writeHTMLCell(35, 22, 17, 11, '<img src="design/assets/images/logo_big.png"" width="150">', 0, 0, 0, true, 'C', true);
        // Set font
        $this->SetFont('helvetica', 'B', 10);
        // Title
		//$this->writeHTMLCell(50, 20, 15, 7, '', 1, 0, 0, true, 'C', true);
    $this->SetFont('helvetica', 'B', 9);	
	//	$this->MultiCell(60, 20, $a, 1, 'C', 0, 0, 65, 7, true, 0,true, true, 20, 'M');
		$this->SetFont('helvetica', 'B', 10);
	//	$this->writeHTMLCell(70, 15, 125, 7, 'Informe: '.$nombre_informe.' <br>'.$numot.' // REVISION: 0.0.0', 1, 0, 0, true, 'C', true);
		//$this->MultiCell(91, 15, 'Informe:  // REVISION: 0.0.0', 1, 'C', 0, 1, 190, 7, true, 1, true, true, 0, 'M');		
		//$this->writeHTMLCell(70, 5, 125, 22, '<table><tr><td width="120%">Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages().'</td></tr></table>', 1, 1, 0, true, 'C', true);		
   
    
  //$this->MultiCell(120, 16.5,17 '<img src="design/assets/images/logo_big.png"><br><b>Original</b>', 1, 'C', 0, 0, 15, 30, true, 0, false, true, 16, 'M');
		$this->writeHTMLCell(100, 6, 60, 30, '<br>SISTEMA DE GESTIÓN DE CALIDAD', 1, 0, 0, true, 'C', true);
		$this->writeHTMLCell(100, 10.5, 60, 36, 'Sistema de firmas digital<br> Cercal Group', 1, 1, 0, true, 'C', true);
    
		$this->writeHTMLCell(45, 16.5, 15, 30, '<img src="design/assets/images/logo_big.png" width="100"><br><b>'.$tipo_originalidad.'</b>', 1, 1, 0, true, 'C', true);
    $this->writeHTMLCell(37, 16.5, 160, 30, 'Proceso documental # '.$key, 1, 0, 0, true, 'C', true);
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

$query = mysqli_prepare($connect,"SELECT a.nombre, c.nombre, d.url FROM empresa as a, numot as b, documentacion as c, archivos_documentacion as d WHERE a.id_empresa = b.id_empresa AND c.id_numot = b.id_numot AND c.id = ? AND c.id = d.id_documentacion;");
mysqli_stmt_bind_param($query, 'i', $key);
mysqli_stmt_execute($query);
mysqli_stmt_store_result($query);
mysqli_stmt_bind_result($query, $empresa, $proyecto, $url);
mysqli_stmt_fetch($query);

$pdf->AddPage('A4');
$html = <<<EOD
<br><br>
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
$qr_imagen = "";
$fecha_firma = "";

$consultar_2 = mysqli_prepare($connect,"SELECT   a.fecha_firma, b.nombre, b.apellido, d.nombre, a.rol, a.qr, a.id_persona FROM
participante_documentacion as a, persona as b, cargo as d WHERE a.id_documentacion = ?
AND a.id_persona = b.id_usuario AND b.id_cargo = d.id_cargo  ORDER BY fecha_firma ASC;");
mysqli_stmt_bind_param($consultar_2, 'i', $key);
mysqli_stmt_execute($consultar_2);
mysqli_stmt_store_result($consultar_2);
mysqli_stmt_bind_result($consultar_2,  $fecha_registro, $nombre, $apellido, $cargo, $tipo, $qr, $id_usuario);

while($row = mysqli_stmt_fetch($consultar_2)){



    if($tipo == 1){     
        $que_hace = "Elaborado por";
    }else if($tipo == 2){
        $que_hace = "Revisado por";
    }else{
        $que_hace = "Aprobado por";
    }

    if($fecha_registro != ""){
        $qr_imagen='<p><img src="templates/documentacion/head_templates/'.$qr.'" border="0" height="80" width="80" align="middle" /></p>';
        $fecha_firma = $fecha_registro;
    }else{
        $qr_imagen = "Rechazo documento";
        $buscar_rechazo = mysqli_prepare($connect,"SELECT fecha_registro FROM rechazos_documentacion WHERE id_documentacion = ? AND id_usuario = ?");
        mysqli_stmt_bind_param($buscar_rechazo, 'ii', $key, $id_usuario);
        mysqli_stmt_execute($buscar_rechazo);
        mysqli_stmt_store_result($buscar_rechazo);
        mysqli_stmt_bind_result($buscar_rechazo, $fecha_firma_no);
        mysqli_stmt_fetch($buscar_rechazo);
        $fecha_firma = $fecha_firma_no;
    }

  /*
    if($contador == 4){
        $pdf->AddPage('A4');

    }*/
     

      $pdf->writeHTMLCell(60, 5, 10, '', '<srtong>'.$que_hace.'</srtong>', 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(70, 5, 70, '', '<srtong>Fecha</srtong>', 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(60, 5, 140, '', '<srtong>Firma</srtong>', 1, 1, 0, true, 'C', true);


      $firma_que = "Token";
      $pdf->writeHTMLCell(60, 30, 10, '', $nombre.' '.$apellido.'<br> Cargo: '.$cargo, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(70,30, 70, '',$fecha_firma, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(60, 30, 140, '', $qr_imagen, 1, 1, 0, true, 'C', true);
      
    

      if($contador == 3)
        
      {
        $pdf->AddPage('A4');
          
      }
   
    $contador++;
     $sumale++;

}/////// CIERRE DEL WHILE
/*

*/

function numeroPaginasPdf($archivoPDF)

{

	$stream = fopen($archivoPDF, "r");

	$content = fread ($stream, filesize($archivoPDF));

 

	if(!$stream || !$content)

		return 0;

 

	$count = 0;

 

	$regex  = "/\/Count\s+(\d+)/";

	$regex2 = "/\/Page\W*(\d+)/";

	$regex3 = "/\/N\s+(\d+)/";

 

	if(preg_match_all($regex, $content, $matches))

		$count = max($matches);

 

	return $count[0];

}

 

$cantidad =  numeroPaginasPdf('templates/documentacion/pdf_final/informe_final'.$key.'.pdf');



$filename = $_SERVER['DOCUMENT_ROOT'].'CerNet2.0/templates/documentacion/pdf_final/informe_final'.$key.'.pdf';
$pdf->Output($filename, 'f');
$pdf = new PDFMerger;
$pdf->addPDF('templates/documentacion/pdf_final/informe_final'.$key.'.pdf', '1-'.$cantidad)
    ->addPDF('templates/documentacion/'.$url,'all')
    ->merge('browser', 'informe_final.pdf');
?>