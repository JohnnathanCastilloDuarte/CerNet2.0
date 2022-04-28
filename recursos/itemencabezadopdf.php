<?php
require_once('../../../../pdf/tcpdf.php');

$logo = "";
//CABECERAS PERSONALIZADAS
class MYPDF extends TCPDF 
{
    //Page header
    public function Header() 
	{
      global $logo;
      
      if($logo == ""){
        $logo = "recursos/logo_big.png";
      }

      /*
		
		// Set border style
		$this->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(120, 120, 120)));
        // Logo
		$this->writeHTMLCell(35, 22, 17, 11, '<img src="design/images/cercal2.jpg" width="150">', 0, 0, 0, true, 'C', true);
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
   
     */
    // Logo
   
	    $this->writeHTMLCell(35, 22, 17, 11, '<img src="../../../../recursos/logo_big.png" width="500">', 0, 0, 0, true, 'C', true);
      $this->writeHTMLCell(35, 22, 155, 11, '<img src="../../../../'.$logo.'" width="250">', 0, 0, 0, true, 'C', true);
	//$this->writeHTMLCell(60, 12, 135, 30, 'Informe: Item PDF <br>'.$numot.' // REVISION: 0.0.0', 1, 0, 0, true, 'C', true);
	//$this->writeHTMLCell(60, 4, 135, 42, '<table><tr><td width="120%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages().'</td></tr></table>', 1, 1, 0, true, 'C', true);
   
    }
	
    // Page footer
   public function Footer() 
	{
		$this->SetFont('helvetica', '', 7);		
		$this->writeHTMLCell(45, 15, 150, 280, 'Página '.$this->getAliasNumPage(), 0, 1, 0, true, 'C', true);
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
$pdf->SetMargins(PDF_MARGIN_LEFT, 25, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(15);
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
$pdf->SetFont('freesans', 'R', 7);

?>