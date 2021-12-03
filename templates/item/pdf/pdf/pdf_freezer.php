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
	$nombre_freezer      = $key->nombre_freezer;
	$empresa		     = $key->nombre_empresa;
	$fabricante		     = $key->fabricante;
	$modelo		         = $key->modelo;
	$n_serie		     = $key->n_serie;
	$c_interno 		     = $key->c_interno;
	$fecha_fabricacion   = $key->fecha_fabricacion;
	$descripcion_freezer = $key->descripcion_freezer;

	$direccion 		=$key->direccion;
	$ubicacion 		=$key->ubicacion;
	$voltaje 		=$key->voltaje;
	$potencia 		=$key->potencia;
	$capacidad 		=$key->capacidad;
	$peso 		    =$key->peso;
	$alto 			=$key->alto;
	$largo 			=$key->largo;
	$ancho 			=$key->ancho;
	$seteado_hum 	=$key->seteado_hum;
	$seteado_tem 	=$key->seteado_tem;
	$hum_min 		=$key->hum_min;
	$hum_max 		=$key->hum_max;
	$tem_min 		=$key->tem_min;
	$tem_max 		=$key->tem_max;
}

$pdf->AddPage('A4');

$html = <<<EOD

<hr>
<h2>Información del equipo $nombre_freezer</h2>$nombre
<hr>
<br>
<table border="0" style="padding: 5px 5px 15px 5px;">
	<tr>
		<th style="font-weight: bold">Nombre:</th>
		<th>$nombre_freezer</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Empresa:</th>
		<th>$empresa</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Fabricante/marca:</th>
		<th>$fabricante</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Modelo:</th>
		<th>$modelo</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">N° serie:</th>
		<th>$n_serie</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Codigo interno:</th>
		<th>$c_interno</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Año de fabricación:</th>
		<th>$fecha_fabricacion</th>
		<th style="width: 125px;"></th>
	</tr>
</table>
<table border="0" style="padding: 5px 5px 15px 5px;" >
    <tr>
    	<th style="font-weight: bold">Descripción:</th>
		
    </tr>	
     <tr>
		<th style="width:250px; height: 100px ;" border="1">$descripcion_freezer</th>
    </tr>	
</table>
<br>
<hr>
<h2>Caracteristicas del equipo</h2>
<hr>
<table border="0" style="padding: 5px 5px 20px 5px;">
	<tr>
		<th style="width: 90px;font-weight: bold" >Direccion</th>
		<th style="width: 190px;">$direccion</th>
		<th style="width: 76px;"></th>
		<th style="width: 90px;font-weight: bold">Ubicación interna</th>
		<th style="width: 190px;">$ubicacion</th>
	</tr>
</table>

<table border="0" style="padding: 5px 5px 5px 5px;">
	<tr>
		<th style="width: 142px; font-weight: bold">Voltaje:</th>
		<th style="width: 70px;">$voltaje</th>
		<th style="width: 142px; font-weight: bold">Potencia:</th>
		<th style="width: 70px;">$potencia</th>
		<th style="width: 142px; font-weight: bold">Capacidad:</th>
		<th style="width: 70px;">$capacidad</th>
	</tr>
	<tr>
		<th style="width: 142px; font-weight: bold">Alto:</th>
		<th style="width: 70px;">$peso</th>
		<th style="width: 142px; font-weight: bold">Largo:</th>
		<th style="width: 70px;">$largo</th>
		<th style="width: 142px; font-weight: bold">Ancho:</th>
		<th style="width: 70px;">$ancho</th>
	</tr>
	<tr>
		<th style="width: 142px; font-weight: bold">Valor seteado humedad:</th>
		<th style="width: 70px;">$seteado_hum</th>
		<th style="width: 142px; font-weight: bold">Humedad minima:</th>
		<th style="width: 70px;">$hum_min</th>
		<th style="width: 142px; font-weight: bold">Humedad maxima:</th>
		<th style="width: 70px;">$hum_max</th>
	</tr>
	<tr>
		<th style="width: 142px; font-weight: bold">Valor seteado temperatura:</th>
		<th style="width: 70px;">$seteado_tem</th>
		<th style="width: 142px; font-weight: bold">Temperatura minima:</th>
		<th style="width: 70px;">tem_min</th>
		<th style="width: 142px; font-weight: bold">Temperatura maxima:</th>
		<th style="width: 70px;">tem_max</th>
	</tr>
	<tr>
		<th style=" font-weight: bold">peso</th>
		<th>$peso</th>
	</tr>
</table>


EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$pdf->Output('Algo.pdf', 'I');
?>
