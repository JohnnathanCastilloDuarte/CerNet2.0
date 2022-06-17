<?php 
require('../../../../../recursos/itemencabezadopdf.php');
require('../../../../../config.ini.php');


$pdf->AddPage('A4');







$pdf->Output('pdf', 'I');

?>