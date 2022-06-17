<?php 


require('../../../../recursos/encabezadopdf.php');
require('../../../../config.ini.php');

    $pdf->writeHTML($txt, true, false, false, false, '');

		$pdf->Output('Algo.pdf', 'I');

?>