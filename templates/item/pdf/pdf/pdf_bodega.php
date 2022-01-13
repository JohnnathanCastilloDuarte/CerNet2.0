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
	$nombre_item       = $key->nombre_item;
	$nombre_tipo_item  = $key->nombre_tipo_item;
	$empresa		       = $key->nombre_empresa;
	$modelo		         = $key->modelo;
	$c_interno 		     = $key->codigo_interno;
	$fecha_fabricacion = $key->fecha_fabricacion;
	$descripcion_bodega = $key->descripcion_bodega;

	$direccion 		=$key->direccion;
	$ubicacion 		=$key->ubicacion;
	$superficie   =$key->superficie;
	$volumen  		=$key->volumen;
	$capacidad 		=$key->capacidad;
	$alto 		  	=$key->altura;
	$largo 		  	=$key->largo;
	$ancho 		  	=$key->ancho;
  
  $productos    =$key->productos;
  $tipo_muro    =$key->tipo_muro;
	$tipo_cielo   =$key->tipo_cielo;
  
  $climatizacion=$key->climatizacion;
  $monitoreo    = $key->monitoreo;
	$alarma       = $key->alarma;
	$planos       = $key->planos;
	$analisis_riesgo  = $key->analisis_riesgo;
	$ficha_estabilidad  = $key->ficha_estabilidad;

}

$pdf->AddPage('A4');

$html = <<<EOD

<hr>
<h2>Información del equipo $nombre_item </h2>
<hr>
<br>
<table border="0" style="padding: 5px 5px 15px 5px;">
	<tr>
		<th style="font-weight: bold">Nombre:</th>
		<th>$nombre_item</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Tipo de equipo:</th>
		<th>$nombre_tipo_item</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Dirección de la bodega:</th>
		<th>$direccion</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Codigo interno/ N° serie:</th>
		<th>$c_interno</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Año de fabricación:</th>
		<th>$fecha_fabricacion</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Empresa:</th>
		<th>$empresa</th>
	</tr>
</table>
<table border="0" style="padding: 5px 5px 15px 5px;" >
    <tr>
    	<th style="font-weight: bold">Descripción:</th>
		
    </tr>	
     <tr>
		<th style="width:250px; height: 100px ;" border="1">$descripcion_bodega</th>
    </tr>	
</table>
<br>
<hr>
<h2>Caracteristicas del equipo</h2>
<hr>

<table border="0" style="padding: 5px 5px 5px 5px;">
	<tr>
		<th style="width: 142px; font-weight: bold">Superficie:</th>
		<th style="width: 70px;">$superficie</th>
		<th style="width: 142px; font-weight: bold">Volumen:</th>
		<th style="width: 70px;">$volumen</th>
		
	</tr>
	<tr>
		<th style="width: 142px; font-weight: bold">Alto:</th>
		<th style="width: 70px;">$alto</th>
		<th style="width: 142px; font-weight: bold">Largo:</th>
		<th style="width: 70px;">$largo</th>
		<th style="width: 142px; font-weight: bold">Ancho:</th>
		<th style="width: 70px;">$ancho</th>
	</tr>
	<tr>
		<th style="width: 142px; font-weight: bold">Tipo de muro:</th>
		<th style="width: 70px;">$tipo_muro</th>
		<th style="width: 142px; font-weight: bold">Tipo de cielo:</th>
		<th style="width: 70px;">$tipo_cielo</th>
		<th style="width: 142px; font-weight: bold">Sistema de climatización:</th>
		<th style="width: 70px;">$climatizacion</th>
	</tr>
	<tr>
		<th style="width: 142px; font-weight: bold">Sistema de monitoreo de temperatura - Alarmas:</th>
		<th style="width: 70px;">$alarma</th>
		<th style="width: 142px; font-weight: bold">Cuenta con analisis de riesgo:</th>
		<th style="width: 70px;">$analisis_riesgo</th>
		<th style="width: 142px; font-weight: bold">Sistema de monitoreo de temperatura:</th>
		<th style="width: 70px;">$monitoreo</th>
	</tr>
	<tr>
		<th style="width: 142px; font-weight: bold">Planos:</th>
		<th style="width: 70px;">$planos</th>
		<th style="width: 142px; font-weight: bold">¿Cuenta con fichas de estabilidad de producto?:</th>
		<th style="width: 70px;">$ficha_estabilidad</th>
	</tr>
</table>


EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$pdf->Output('Algo.pdf', 'I');
?>
