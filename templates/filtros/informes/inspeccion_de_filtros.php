<?php 
require('../../../recursos/encabezadopdf.php');
require('../../../config.ini.php');

$pdf->AddPage('A4');

$primera_parte = <<<EOD

<table border="0" class="tabla_1">
    <tr>
        <td>informe referencia:</td>
        <td border="1">Campo</td>
        <td></td>
        <td>OT:</td>
        <td border="1">Campo</td>
    </tr>    

</table>
EOD;
$pdf->writeHTML($primera_parte, true, false, false, false, '');



///// crea una nueva pagina
$pdf->AddPage('A4');

$array_titulos = array('Velocidad de Aire, 25% Apertura (m/s)', 'Velocidad de Aire, 50% Apertura (m/s)','Velocidad de Aire, 75% Apertura (m/s)');


$pdf->writeHTMLCell(20, 5, 15, '', 'Descripción', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 35, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(20, 5, 55, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 75, '', 'dato', 1, 1, 0, true, 'C', true);


for($i = 0; $i <= 50; $i++){
// Largo o Ancho // Alto   //  posición
    $pdf->writeHTMLCell(20, 5, 15, '', 'Descripción', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(20, 5, 35, '', 'Marca', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(20, 5, 55, '', 'Modelo', 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(60, 5, 75, '', $array_titulos[$i], 1, 1, 0, true, 'C', true);

    if($i == 41){
        $pdf->AddPage('A4');
        $pdf->writeHTMLCell(20, 5, 15, '', 'Descripción', 1, 0, 0, true, 'C', true);
        $pdf->writeHTMLCell(20, 5, 35, '', 'Marca', 1, 0, 0, true, 'C', true);
        $pdf->writeHTMLCell(20, 5, 55, '', 'Modelo', 1, 0, 0, true, 'C', true);
        $pdf->writeHTMLCell(60, 5, 75, '', 'dato', 1, 1, 0, true, 'C', true);
    }
}
/*

$pdf->writeHTMLCell(35, 5, 30, '', 'N° de identificación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(55, 5, 65, '', 'Ubicación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(75, 5, 120, '', 'N° de serie', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(66, 5, 215, '', 'N° Certificado de Calibración', 1, 1, 0, true, 'C', true);*/




$pdf->Output('Algo.pdf', 'I');

?>