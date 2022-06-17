<?php
require_once('pdf/tcpdf.php');
include('config.ini.php');
$key = $_GET['key'];
$id_documentacion = base64_decode($key);


//CABECERAS PERSONALIZADAS
class MYPDF extends TCPDF 
{
    //Page header
    public function Header() 
	{}
	
    // Page footer
   public function Footer() 
	{
		 /*
	global $pais_emp;
	switch($pais_emp)
	{
		CASE 'Chile':
		$this->SetFont('helvetica', '', 6);		
		$this->Line(10, 279, 195, 279);
		$image_file = K_PATH_IMAGES.'../../../images/cercal_pie_pag.jpg';
        $this->Image($image_file, 17, 282, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->writeHTMLCell(45, 15, 15, 280, '', 0, 0, 0, true, 'C', true);	
		$this->writeHTMLCell(90, 15, 60, 280, '<strong>Cercal Chile</strong><br>Cercal Ingeniería SpA.<br>
							Monseñor Sotero Sanz N° 100, Piso 9, Of. 902, Providencia, Santiago de Chile<br>Télefono:
							 +56 2 28 11 8824 / Correo: clientes@cercal.cl / capacitaciones@cercal.cl', 0, 0, 0, true, 'L', true);	
		$image_file2 = K_PATH_IMAGES.'../../../images/parte3.jpg';							 
        $this->Image($image_file2, 160, 285, 35, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);		
		$this->writeHTMLCell(45, 15, 150, 280, '', 0, 1, 0, true, 'C', true);	
		break;
		
		CASE 'Colombia':
		$this->SetFont('helvetica', '', 6);		
		$this->Line(10, 279, 195, 279);
		$image_file = K_PATH_IMAGES.'../../../images/cercal_pie_pag.jpg';
        $this->Image($image_file, 17, 282, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->writeHTMLCell(45, 15, 15, 280, '', 0, 0, 0, true, 'C', true);	
		$this->writeHTMLCell(90, 15, 60, 280, '<strong>Cercal Colombia</strong><br>Cercal Ingeniería SpA<br>Avenida El Dorado No. 68 c.1, Of. 204, Bogotá, Colombia<br>Teléfono: +57 1 4322795 / Correo: contacto@cercal.cl', 0, 0, 0, true, 'L', true);							 
 		$image_file2 = K_PATH_IMAGES.'../../../images/parte3.jpg';	      
	    $this->Image($image_file2, 160, 285, 35, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);		
		$this->writeHTMLCell(45, 15, 150, 280, '', 0, 1, 0, true, 'C', true);	
		break;	
		
		DEFAULT:
		$this->SetFont('helvetica', '', 6);		
		$this->Line(10, 279, 195, 279);
		$image_file = K_PATH_IMAGES.'../../../images/cercal_pie_pag.jpg';
        $this->Image($image_file, 17, 282, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->writeHTMLCell(45, 15, 15, 280, '', 0, 0, 0, true, 'C', true);	
		$this->writeHTMLCell(90, 15, 60, 280, '<strong>Cercal Chile</strong><br>Cercal Ingeniería SpA.<br>
							Monseñor Sotero Sanz N° 100, Piso 9, Of. 902, Providencia, Santiago de Chile<br>Télefono:
							 +56 2 28 11 8824 / Correo: clientes@cercal.cl / capacitaciones@cercal.cl', 0, 0, 0, true, 'L', true);	
		$image_file2 = K_PATH_IMAGES.'../../../images/parte3.jpg';							 
        $this->Image($image_file2, 160, 285, 35, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);		
		$this->writeHTMLCell(45, 15, 150, 280, '', 0, 1, 0, true, 'C', true);	
		break;		
	}
	}
	
		 
		$this->SetFont('helvetica', '', 6);		
		$this->Line(10, 279, 195, 279);
		$image_file = K_PATH_IMAGES.'../../../design/images/cercal_pie_pag.jpg';
        $this->Image($image_file, 17, 282, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->writeHTMLCell(45, 15, 15, 280, '', 0, 0, 0, true, 'C', true);	
		$this->writeHTMLCell(90, 15, 60, 280, '<strong>Cercal Chile</strong><br>Cercal Ingeniería SpA.<br>
							Monseñor Sotero Sanz N° 100, Piso 9, Of. 902, Providencia, Santiago de Chile<br>Télefono:
							 +56 2 28 11 8824 / Correo: clientes@cercal.cl / capacitaciones@cercal.cl', 0, 0, 0, true, 'L', true);	
		$image_file2 = K_PATH_IMAGES.'../../../design/images/parte3.jpg';							 
        $this->Image($image_file2, 160, 285, 35, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);		
		$this->writeHTMLCell(45, 15, 150, 280, '', 0, 1, 0, true, 'C', true);*/
}
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

$contador = 1;

$pdf->AddPage('A4');


$pdf->writeHTMLCell(190, 5, 10, '', '<span>PERSONAS QUE NO HAN FIRMADO</span>', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 5, 10, '', '#', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(100, 5, 40, '', 'NOMBRES', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 5, 140, '', 'FECHA FIRMA', 1, 1, 0, true, 'C', true);



$query1 = mysqli_prepare($connect,"SELECT id_persona  FROM participante_documentacion  WHERE id_documentacion = ? AND id_persona NOT IN (SELECT id_usuario FROM firmantes_documentacion)");
mysqli_stmt_bind_param($query1, 'i', $id_documentacion);
mysqli_stmt_execute($query1);
mysqli_stmt_store_result($query1);
mysqli_stmt_bind_result($query1, $id_persona);

while($row = mysqli_stmt_fetch($query1)){
 
  $query2 = mysqli_prepare($connect,"SELECT b.id_usuario, b.nombre, b.apellido FROM persona as b WHERE b.id_persona = ? ");
  mysqli_stmt_bind_param($query2, 'i', $id_persona);
  mysqli_stmt_execute($query2);
  mysqli_stmt_store_result($query2);
  mysqli_stmt_bind_result($query2, $id_usuario, $nombre, $apellido);
  while($row2 = mysqli_stmt_fetch($query2)){

     
      $pdf->writeHTMLCell(30, 5, 10, '', $contador, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(100, 5, 40, '', $nombre.' '.$apellido, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(60, 5, 140, '', 'En espera', 1, 1, 0, true, 'C', true); 

      $contador ++;  
    
  }
}


$pdf->Output('Quienes no han firmado.pdf', 'I');

?>