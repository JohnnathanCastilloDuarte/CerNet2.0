<?php
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');
//$id_informe = $_GET['informe'];
//$resultado_corresponde = "";
//$posicion_sensores_indicativo = 1;
 
$data = $_GET['data'];

$data = substr($data, 70, 100);

// consultar especificaciones del item + especificaciones.
$consultando_informacion_item = mysqli_prepare($connect,"SELECT B.id_item, B.nombre, B.descripcion, B.codigo_interno, B.direccion, B.estado, 
C.nombre, d.nombre, B.ubicacion_interna FROM archivos_documentacion as A, item as B, empresa as C, tipo_item as D WHERE A.nombre_archivo = B.id_item 
AND B.id_empresa = C.id_empresa  AND B.id_tipo = D.id_item AND A.id_documentacion = ?");
mysqli_stmt_bind_param($consultando_informacion_item, 'i', $data);
mysqli_stmt_execute($consultando_informacion_item);
mysqli_stmt_store_result($consultando_informacion_item);
mysqli_stmt_bind_result($consultando_informacion_item, $id_item, $nombre_item, $descripcion_item, $codigo_interno_item,   $direccion_item, $estado_item, $nombre_empresa, $tipo_item, $ubicacion_interna);
mysqli_stmt_fetch($consultando_informacion_item);


//// consultando información por tipo de item
switch ($tipo_item) {
   case 'Bodega':
      # code...
      $consultando_item = mysqli_prepare($connect,"SELECT productos_almacena, largo, ancho, superficie, volumen, altura, tipo_muro, tipo_cielo, s_climatizacion, s_monitoreo, s_alarma, planos, analisis_riesgo, ficha_estabilidad, id_usuario, marca_bodega, modelo_bodega, orientacion_principal, orientacion_recepcion, orientacion_despacho, num_puertas, salida_emergencia, cantidad_rack, num_estantes, altura_max_rack, sistema_extraccion, cielo_lus, temp_max, temp_min, cantidad_iluminarias, hr_max, hr_min, valor_seteado_temp, valor_seteado_hum, cantidad_ventana, fecha_registro FROM item_bodega WHERE id_item = ?");
      mysqli_stmt_bind_param($consultando_item, 'i', $id_item);
      mysqli_stmt_execute($consultando_item);
      mysqli_stmt_store_result($consultando_item);
      mysqli_stmt_bind_result($consultando_item, $productos_almacena, $largo, $ancho, $superficie, $volumen, $altura, $tipo_muro, $tipo_cielo, $s_climatizacion, $s_monitoreo, $s_alarma, $planos, $analisis_riesgo, $ficha_estabilidad, $id_usuario, $marca_bodega, $modelo_bodega, $orientacion_principal, $orientacion_recepcion, $orientacion_despacho, $num_puertas, $salida_emergencia, $cantidad_rack, $num_estantes, $altura_max_rack, $sistema_extraccion, $cielo_lus, $temp_max, $temp_min, $cantidad_iluminarias, $hr_max, $hr_min, $valor_seteado_temp, $valor_seteado_hum, $cantidad_ventana, $fecha_registro);
      mysqli_stmt_fetch($consultando_item);

      break;
   
   default:
      # code...
      break;
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
        <td class="linea" align="center"><h2><b>IDENTIFICACIÓN</b></h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(25, 5, 140, '', '<strong>FECHA REGISTRO:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(30, 5, 165, '', $fecha_registro ,0,1, 0, true, 'C', true);

$pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(35, 5, 20, '', '<strong>EMPRESA:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 55, '', $nombre_empresa ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(35, 5, 125, '', '<strong>NOMBRE:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 155, '', $nombre_item ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(35, 5, 20, '', '<strong>DIRECCION:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 55, '', $direccion_item ,0,0, 0, true, 'J', true);

$pdf->writeHTMLCell(35, 5, 125, '', '<strong>UBICACIÓN INTERNA:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 155, '', ($ubicacion_interna != "") ? $ubicacion_interna : "N/A" ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);


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
        <td class="linea" align="center"><h2><b>ESPECIFICACIONES</b></h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(35, 5, 20, '', '<strong>TEMP MAX:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 55, '', $temp_max.' C°',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(35, 5, 125, '', '<strong>TEMP MIN:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 155, '', $temp_min.' C°',0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(35, 5, 20, '', '<strong>HUM MAX:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 55, '', $hr_max.' %Hr',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(35, 5, 125, '', '<strong>HUM MIN:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 155, '', $hr_min.' %Hr' ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(35, 5, 20, '', '<strong>VALOR SETEADO TEMP:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 55, '', $valor_seteado_temp.' C°',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(35, 5, 125, '', '<strong>VALOR SETEADO HUM:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 155, '', $valor_seteado_hum.' %Hr' ,0,1, 0, true, 'J', true);



$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>

<table >
   <tr border="1">
        <td class="linea" align="center"><h2><b>INFRAESTRUCTURA</b></h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


/////////// realizo un switch para implementar la infraestructura dependiendo el tipo de equipo

switch ($tipo_item) {
   case 'Bodega':



      $pdf->writeHTMLCell(35, 5, 20, '', '<strong>LARGO:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 55, '',($largo != "") ? $largo : "N/A" ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(35, 5, 125, '', '<strong>ANCHO:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 155, '',($ancho != "") ? $ancho : "N/A",0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(35, 5, 20, '', '<strong>SUPERFICIE:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 55, '',($superficie != "") ? $superficie : "N/A",0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(35, 5, 125, '', '<strong>VOLUMEN:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 155, '',($volumen != "") ? $volumen: "N/A" ,0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(35, 5, 20, '', '<strong>MARCA:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 55, '',($marca_bodega != "") ? $marca_bodega : "N/A",0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(35, 5, 125, '', '<strong>MODELO:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 155, '',($modelo_bodega != "") ? $modelo_bodega : "N/A",0,1, 0, true, 'J', true);


      $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(35, 5, 20, '', '<strong>ALTURA:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 55, '',($altura != "") ? $altura : "N/A",0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(35, 5, 125, '', '<strong>TIPO MURO:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 155, '',($tipo_muro != "") ? $tipo_muro : "N/A",0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(35, 5, 20, '', '<strong>TIPO CIELO:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 55, '',($tipo_cielo != "") ? $tipo_cielo : "N/A",0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(35, 5, 125, '', '<strong>NUMERO PUERTAS:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 155, '',($num_puertas != "") ? $num_puertas : "N/A",0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(35, 5, 20, '', '<strong>ORIENTACION PRINCIPAL:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 55, '',($orientacion_principal != "") ? $orientacion_principal : "N/A",0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(35, 5, 125, '', '<strong>ORIENTACION RECEPCION:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 155, '',($orientacion_recepcion != "") ? $orientacion_recepcion : "N/A",0,1, 0, true, 'J', true);


      $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(35, 5, 20, '', '<strong>CANTIDAD RACK:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 55, '',($cantidad_rack != "") ? $cantidad_rack : "N/A",0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(35, 5, 125, '', '<strong>NUMERO ESTANTES:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 155, '',($num_estantes != "") ? $num_estantes : "N/A",0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(35, 5, 20, '', '<strong>ALTURA RACK:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 55, '',($altura_max_rack != "") ? $altura_max_rack : "N/A",0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(35, 5, 125, '', '<strong>CANTIDAD VENTANA:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 155, '',($cantidad_ventana != "") ? $cantidad_ventana : "N/A",0,1, 0, true, 'J', true);


      $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

      $pdf->writeHTMLCell(35, 5, 20, '', '<strong>NUMERO PUERTAS:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 55, '',($num_puertas != "") ? $num_puertas : "N/A",0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(35, 5, 125, '', '<strong>SALIDA EMERGENCIA:</strong>' ,0,0, 0, true, 'J', true);
      $pdf->writeHTMLCell(60, 5, 155, '',($salida_emergencia != "") ? $salida_emergencia : "N/A",0,1, 0, true, 'J', true);




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
                  <td class="linea" align="center"><h2><b>EQUIPOS</b></h2></td>
               </tr>
            </table>
         EOD;  
         $pdf->writeHTML($linea, true, false, false, false, '');
         
         $pdf->writeHTMLCell(35, 5, 20, '', '<strong>SISTEMA DE CLIMATIZACIÓN:</strong>' ,0,0, 0, true, 'J', true);
         $pdf->writeHTMLCell(60, 5, 55, '',($s_climatizacion != "") ? $s_climatizacion : "N/A",0,0, 0, true, 'J', true);
         $pdf->writeHTMLCell(35, 5, 125, '', '<strong>SISTEMA DE MONITOREO DE TEMPERATURA:</strong>' ,0,0, 0, true, 'J', true);
         $pdf->writeHTMLCell(60, 5, 160, '',($s_monitoreo != "") ? $s_monitoreo : "N/A",0,1, 0, true, 'J', true);

         $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
         
         $pdf->writeHTMLCell(35, 5, 20, '', '<strong>SISTEMA DE MONITOREO DE TEMPERATURA-ALARMAS:</strong>' ,0,0, 0, true, 'J', true);
         $pdf->writeHTMLCell(60, 5, 55, '',($s_alarma != "") ? $s_alarma : "N/A",0,0, 0, true, 'J', true);
         $pdf->writeHTMLCell(35, 5, 125, '', '<strong>PLANOS:</strong>' ,0,0, 0, true, 'J', true);
         $pdf->writeHTMLCell(60, 5, 155, '',($planos != "") ? $planos : "N/A",0,1, 0, true, 'J', true);


         $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
         
         $pdf->writeHTMLCell(35, 5, 20, '', '<strong>ANALISIS DE RIESGO:</strong>' ,0,0, 0, true, 'J', true);
         $pdf->writeHTMLCell(60, 5, 55, '',($analisis_riesgo != "") ? $analisis_riesgo : "N/A",0,0, 0, true, 'J', true);
         $pdf->writeHTMLCell(35, 5, 125, '', '<strong>FICHAS DE ESTABILIDAD DEL PRODUCTO:</strong>' ,0,0, 0, true, 'J', true);
         $pdf->writeHTMLCell(60, 5, 160, '',($ficha_estabilidad != "") ? $ficha_estabilidad : "N/A",0,1, 0, true, 'J', true);

      break;
      
   
   default:
      # code...
      break;
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
         <td class="linea" align="center"><h2><b>Historico de aprobación</b></h2></td>
      </tr>
   </table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(60, 4, 17, '', '<strong>PARTICIPANTE</strong>' ,0,0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 4, 77, '', '<strong>EMPRESA</strong>' ,0,0, 0, true, 'C', true);
$pdf->writeHTMLCell(58, 4, 137, '', '<strong>FECHA</strong>' ,0,1, 0, true, 'C', true);


$consultar_participantes = mysqli_prepare($connect,"SELECT a.nombre, a.apellido, b.nombre, c.fecha_firma, d.nombre, c.base_64_firma FROM
 persona as a, empresa as b, participante_documentacion as c, cargo as d WHERE a.id_usuario = c.id_persona AND c.id_documentacion = ?
  AND a.id_empresa = b.id_empresa AND a.id_cargo = d.id_cargo");


mysqli_stmt_bind_param($consultar_participantes, 'i', $data);
mysqli_stmt_execute($consultar_participantes);
mysqli_stmt_store_result($consultar_participantes);
mysqli_stmt_bind_result($consultar_participantes, $nombres, $apellidos, $empresa_firmantes, $fecha_firma, $cargo, $base_64_firma);

while($row = mysqli_stmt_fetch($consultar_participantes)){
   
  

   $imageContent = file_get_contents($base_64_firma);
   $path = tempnam(sys_get_temp_dir(), 'prefix');
   file_put_contents ($path, $imageContent);
   
   if($path!=""){
      $img '<h2>Si firma</h2>';
   }

   $img = '<img src="' . $path . '" >';


   $pdf->writeHTMLCell(60, 11, 17, '', '<br>'.$nombres.' '.$apellidos.' - '.$cargo ,0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(60,11, 77, '', $empresa_firmantes ,0,0,0, true, 'C', true);
   $pdf->writeHTMLCell(58,11, 137, '', $fecha_firma ,0,1,0, true, 'C', true);
   $pdf->writeHTMLCell(180, 6, 17, '', '<br><img src="'.$path.'" border="3" height="50px" width="auto" align="top">',0,1, 0, true, 'C', true);
   $pdf->writeHTMLCell(180, 6, 17, '', '<hr>',0,1, 0, true, 'C', true);
}

$pdf->Output($nombre.'.pdf', 'I');
?>
