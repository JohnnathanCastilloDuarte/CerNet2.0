<?php
require('../../../../recursos/encabezadopdf.php');
require('../../../../config.ini.php');
//$id_informe = $_GET['informe'];
//$resultado_corresponde = "";
//$posicion_sensores_indicativo = 1;

$data = $_GET['data'];

$datos = base64_decode($data) ;

$oso=json_decode($datos);
foreach ($oso as $key) {
	//información del equipo
	$nombre    			 = $key->nombre_campana;
	$empresa		     = $key->nombre_empresa;
	$fabricante		     = $key->fabricante;
	$modelo		         = $key->modelo;
	$n_serie		     = $key->n_serie;
	$c_interno 		     = $key->codigo;
	$fecha_fabricacion   = $key->fecha_fabricacion;
	//$descripcion 		 = $key->descripcion_estufa;
	//caracteristicas del equipo
	$ubicacion_en	     =$key->ubicado_en;
	$ubicacion 		     =$key->ubicacion;
	$tipo_campana        =$key->tipo_campana;
	$marca   		     =$key->marca;
	$requisito_velocidad =$key->requisito_velocidad;

}

$pdf->AddPage('A4');

$html = <<<EOD

<hr>
<h2>Información del equipo $nombre</h2>
<hr>
<br>
<table border="0" style="padding: 5px 5px 15px 5px;">
	<tr>
		<th style="font-weight: bold">Nombre:</th>
		<th>$nombre</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Empresa:</th>
		<th>$empresa</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Ubicación del equipo:</th>
		<th>$ubicacion_en</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Dirección:</th>
		<th>$ubicacion</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">N° Tipo de campana:</th>
		<th>$tipo_campana</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Marca:</th>
		<th>$marca</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Modelo:</th>
		<th>$modelo</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Codigo interno:</th>
		<th>$c_interno</th>
	</tr>
	<tr>
		<th style="font-weight: bold">Numero de serie:</th>
		<th>$n_serie</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Año de fabricación:</th>
		<th>$fecha_fabricacion</th>
	</tr>
</table>
<table border="0" style="padding: 5px 5px 15px 5px;" >
    <tr>
    	<th style="font-weight: bold; width: 128px">Requisito de velocidad de aire:</th>
    	<th style="padding: 5px 5px 15px 5px;">$requisito_velocidad</th>
		
    </tr>	
   
</table>
<br>




EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$pdf->Output('Algo.pdf', 'I');
?>
