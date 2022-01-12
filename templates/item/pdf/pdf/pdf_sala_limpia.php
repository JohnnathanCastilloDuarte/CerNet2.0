<?php
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');
//$id_informe = $_GET['informe'];
//$resultado_corresponde = "";
//$posicion_sensores_indicativo = 1;

$data = $_GET['data'];

$datos = base64_decode($data) ;

$oso=json_decode($datos);
foreach ($oso as $key) {
	//información del equipo
	$nombre    			 = $key->nombre_sala_limpia;
	$nombre_tipo_item    = $key->nombre_tipo_item;
	$empresa		     = $key->nombre_empresa;
	$direccion		     = $key->direccion;
	$ubicacion_interna	 = $key->ubicacion_interna;
	$area_interna		 = $key->area_interna;
	$c_interno 		     = $key->codigo;
	$fecha_fabricacion   = $key->fecha_fabricacion;
	//$descripcion 		 = $key->descripcion_estufa;
	//caracteristicas del equipo
	$ubicacion_en	     =$key->ubicado_en;
	$ubicacion 		     =$key->ubicacion;
	$tipo_campana        =$key->tipo_campana;
	$marca   		     =$key->marca;
	$requisito_velocidad =$key->requisito_velocidad;

/*

Area_sala_limpia
codigo
area_m2
volumen_m3
estado_sala
id_empresa

direccion
ubicacion_interna
area_interna
especificacion_1_temp
especificacion_2_temp
especificacion_1_hum
especificacion_2_hum
nombre_item
*/

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
		<th style="font-weight: bold">Tipo de equipo:</th>
		<th>$nombre_tipo_item</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Empresa:</th>
		<th>$empresa</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Direcciòn:</th>
		<th>$direccion</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Ubicaciòn interna:</th>
		<th>$ubicacion_interna</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Àrea interna:</th>
		<th>$area_interna</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Area m&sup2;:</th>
		<th>$area_m2</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Volumen m&sup3;:</th>
		<th>$volumen_m3</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Estado sala:</th>
		<th>$marca</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Modelo:</th>
		<th>$modelo</th>
	</tr>
	<tr>
		<th style="font-weight: bold">Codigo interno:</th>
		<th>$c_interno</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Numero de serie:</th>
		<th>$n_serie</th>
	</tr>
</table>
<table border="0" style="padding: 5px 5px 15px 5px;" >
    <tr>
		<th style="font-weight: bold">Año de fabricación:</th>
		<th>$fecha_fabricacion</th>
		<th style="width: 125px;"></th>
    	<th style="font-weight: bold;">Requisito de velocidad de aire:</th>
    	<th style="padding: 5px 5px 15px 5px;">$requisito_velocidad</th>
    </tr>	
   
</table>
<br>




EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$pdf->Output('Algo.pdf', 'I');
?>
