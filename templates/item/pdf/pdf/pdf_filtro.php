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
	$nombre    			 = $key->nombre_filtro;
	$empresa		     = $key->nombre_empresa;
	$modelo		         = $key->modelo;
	$n_serie		     = $key->serie;
	$cantidad_filtros    = $key->cantidad_filtros;
	$fecha_fabricacion   = $key->fecha_fabricacion;
	$lugar_filtro        = $key->lugar_filtro;
	//caracteristicas del equipo
	$ubicacion_en	     =$key->ubicado_en;
	$ubicacion 		     =$key->ubicacion;
	$tipo_filtro         =$key->tipo_filtro;
	$marca   		     =$key->marca;
	$penetracion_filtro  =$key->penetracion_filtro ;

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
		<th style="font-weight: bold">Dirección:</th>
		<th>$ubicacion</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Ubicación del equipo:</th>
		<th>$ubicacion_en</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Lugar:</th>
		<th>$lugar_filtro</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Marca:</th>
		<th>$marca</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Modelo:</th>
		<th>$modelo</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Cantidad de filtros</th>
		<th>$cantidad_filtros</th>
	</tr>
	<tr>
		<th style="font-weight: bold">Numero de serie:</th>
		<th>$n_serie</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Dimensiones:</th>
		<th>$tipo_filtro</th>
	</tr>
</table>
<table border="0" style="padding: 5px 5px 15px 5px;" >
    <tr>
    	<th style="font-weight: bold; width: 128px">limite de penetración:</th>
    	<th style="padding: 5px 5px 15px 5px;">$penetracion_filtro </th>
		
    </tr>	
   
</table>
<br>




EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$pdf->Output('Algo.pdf', 'I');
?>
