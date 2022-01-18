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
  	$logo = $key->logo;
}

$pdf->AddPage('A4');


$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br><br><br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2><b>Especificaciones de $nombre_tipo_item - $nombre</b></h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha registro:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(20, 5, 175, '', '3444' ,0,1, 0, true, 'C', true);

$pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(25, 5, 20, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 45, '', $empresa ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(25, 5, 125, '', '<strong>Nombre:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 150, '', $nombre ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);



   switch($nombre_tipo_item){
     
     case 'Sala Limpia':
       
        $pdf->writeHTMLCell(25, 5, 20, '', '<strong>Area sala limpia:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 45, '', 'Variable' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(25, 5, 125, '', '<strong>Codigo:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 150, '', 'Variable' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(25, 5, 20, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 45, '', 'Variable' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(25, 5, 125, '', '<strong>Ubicación interna:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 150, '', 'Variable' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(25, 5, 20, '', '<strong>Area interna:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 45, '', 'Variable' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(25, 5, 125, '', '<strong>Area m2:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 150, '', 'Variable' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(25, 5, 20, '', '<strong>Volumen m3:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 45, '', 'Variable' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(25, 5, 125, '', '<strong>Estado sala:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 150, '', 'Variable' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(25, 5, 20, '', '<strong>Temperatura °C:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 45, '', 'Variable' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(25, 5, 125, '', '<strong>Humedad:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 150, '', 'Variable' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);


     break;
   }   
  
  
  
  
  
  
  

/*

$html = <<<EOD
<br><br>
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
*/
$pdf->Output($nombre.'.pdf', 'I');
?>
