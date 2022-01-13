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
	$nombre    			   = $key->nombre;
	$nombre_tipo_item  = $key->nombre_tipo_item;
	$empresa		       = $key->empresa;
	$fabricante		     = $key->fabricante;
	$modelo		         = $key->modelo;
	$valor_seteado     = $key->valor_seteado;
	$valor_maximo 		 = $key->valor_maximo;
	$valor_minimo      = $key->valor_minimo;
	//$descripcion 		 = $key->descripcion_estufa;
	//caracteristicas del equipo
	$ubicacion_en	     =$key->ubicacion;
	$tipo_campana      =$key->tipo_campana;
	$marca   		       =$key->marca;
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
		<th style="font-weight: bold">Tipo de equipo:</th>
		<th>$nombre_tipo_item</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Empresa:</th>
		<th>$empresa</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Ubicación del equipo:</th>
		<th>$ubicacion_en</th>
	</tr>
	<br>
	<tr>
		<th style="font-weight: bold">Marca:</th>
		<th>$marca</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Modelo:</th>
		<th>$modelo</th>
	</tr>
	<tr>
		<th style="font-weight: bold">Valor seteado:</th>
		<th>$valor_seteado</th>
		<th style="width: 125px;"></th>
		<th style="font-weight: bold">Limite Maximo:</th>
		<th>$valor_maximo</th>
	</tr>
  <tr>
		<th style="font-weight: bold">Limite Minimo:</th>
		<th>$valor_minimo</th>
		<th style="width: 125px;"></th>
	</tr>
</table>
<br>




EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$pdf->Output('Algo.pdf', 'I');
?>
