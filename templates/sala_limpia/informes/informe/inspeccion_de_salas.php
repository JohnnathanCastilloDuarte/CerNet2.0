<?php 
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');


$clave = $_GET['clave'];

$id_asignado = substr($clave, 97);


/////// CONSULTA TRAE INFORMACIÓN DEL EQUIPO
$consulta_informacion_informe = mysqli_prepare($connect,"SELECT a.nombre, b.area_interna, b.codigo, b.area_m2, b.volumen_m3, b.estado_sala, b.direccion, b.especificacion_1_temp, b.especificacion_1_hum, b.ruido_dba, b.lux FROM item as a, item_sala_limpia as b, item_asignado as c WHERE c.id_asignado = ? AND c.id_item = a.id_item AND b.id_item = c.id_item");
mysqli_stmt_bind_param($consulta_informacion_informe, 'i', $id_asignado);
mysqli_stmt_execute($consulta_informacion_informe);
mysqli_stmt_store_result($consulta_informacion_informe);
mysqli_stmt_bind_result($consulta_informacion_informe, $nombre_sala, $area_sala, $codigo_sala, $area_m2, $volumen_m3, $estado_sala, $direccion_item, $temperatura_item, $hum_relativa_item, $ruido_dba_item, $lux_item);
mysqli_stmt_fetch($consulta_informacion_informe);




/// CONSULTA TRAE INFORMACIÓN DE LA EMPRESA

$consulta_empresa = mysqli_prepare($connect,"SELECT e.nombre_informe, c.numot, DATE_FORMAT(e.fecha_registro, '%m/%d/%Y'), d.nombre, e.solicita, d.direccion, e.conclusion, e.usuario_responsable FROM item_asignado as a, servicio as b, numot as c, empresa as d, salas_limpias_informe as e WHERE a.id_asignado = ? AND a.id_servicio = b.id_servicio AND b.id_numot = c.id_numot AND c.id_empresa = d.id_empresa AND a.id_asignado = e.id_asignado");
mysqli_stmt_bind_param($consulta_empresa, 'i', $id_asignado);
mysqli_stmt_execute($consulta_empresa);
mysqli_stmt_store_result($consulta_empresa);
mysqli_stmt_bind_result($consulta_empresa, $nombre_informe, $numot, $fecha_registro, $empresa, $solicita, $direccion, $conclusion, $usuario_responsable);
mysqli_stmt_fetch($consulta_empresa);

$num_ot = substr($numot, 2);



//consultar informacion del responsable

$consultar_responsable = mysqli_prepare($connect,"SELECT b.nombre, b.apellido, c.nombre 
  FROM usuario a, persona b, cargo c WHERE a.id_usuario = b.id_usuario AND c.id_cargo = b.id_cargo AND a.usuario = ?");

mysqli_stmt_bind_param($consultar_responsable, 's', $usuario_responsable);
mysqli_stmt_execute($consultar_responsable);
mysqli_stmt_store_result($consultar_responsable);
mysqli_stmt_bind_result($consultar_responsable, $nombre_responsable, $apellido_responsable, $nombre_cargo);
mysqli_stmt_fetch($consultar_responsable);

$pdf->AddPage('A4');

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(202, 202, 202)));
$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2> CERTIFICADO INSPECCIÓN DE SALA LIMPIA</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Informe ref:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(50, 5, 40, '', $nombre_informe ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(15, 5, 90, '', '<strong>OT N°:</strong>',0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(13, 5, 105, '', $num_ot ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 140, '', '<strong>Fecha de Emisión:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 175, '', $fecha_registro ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(75, 5, 40, '', $empresa ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 140, '', '<strong>Solicita:</strong>',0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(35, 5, 160, '', $solicita ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(155, 5, 40, '', $direccion_item ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

$info_equipo = <<<EOD
   <style>
   {
   border-collapse: collapse;
   width: 90%;
   text-align: center;
   vertical-align: middle;
   }
   th 
   {
   background-color: #3138AA;
   color: #FFFFFF;
   vertical-align: middle;
   }
   th, td 
   {
   border: 1px solid #BBBBBB;
   padding: 3px;
   vertical-align: middle;
   text-align: center;
   height:15px;
   font-size:11px;
   padding:auto auto auto auto;
   }
   tr:nth-child(even) 
   {
      background-color: #f2f2f2;
   }
   </style>
   <table>
      <tr>
         <table>
            <tr>
               <td bgcolor="#DDDDDD" style="width:25%;"><h5><strong>Nom. de Sala</strong></h5></td>
               <td bgcolor="#DDDDDD" style="width:30%;"><h5><strong>Área</strong></h5></td>
               <td bgcolor="#DDDDDD" style="width:10%;"><h5><strong>Código</strong></h5></td>
               <td bgcolor="#DDDDDD" style="width:10%;"><h5><strong>Área m²</strong></h5></td>
               <td bgcolor="#DDDDDD" style="width:10%;"><h5><strong>Volumen m³ </strong></h5></td>
               <td bgcolor="#DDDDDD" style="width:13%;"><h5><strong>Estado de Sala</strong></h5></td>
            </tr>
            <tr>
               <td style="width:25%;">$nombre_sala</td>
               <td style="width:30%;">$area_sala</td>
               <td style="width:10%;">$codigo_sala</td>
               <td style="width:10%;">$area_m2</td>
               <td style="width:10%;">$volumen_m3</td>
               <td style="width:13%;">$estado_sala</td>
            </tr>
         </table>
      </tr>
   </table>
EOD;  
$pdf->writeHTML($info_equipo, true, false, false, false, '');

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2><b>RESULTADO DE MEDICIONES</b></h2></td>
   </tr>
</table>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Partículas en Suspensión</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(45, 5, 15, '', 'Norma de Referencia:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(67, 5, 60, '', 'ISO 14644-1:2015 (Promedio)' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(67, 5, 127, '', 'ISO 14644-1:2015 (Promedio)' ,1,1, 0, true, 'C', true);

$pdf->writeHTMLCell(45, 5, 15, '', 'Tamaño de Partículas:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 60, '', 'Partículas >= 0,5 µm' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 93.5, '', 'Partículas >= 5,0 µm' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 127, '', 'Partículas >= 0,5 µm' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 160.5, '', 'Partículas >= 5,0 µm' ,1,1, 0, true, 'C', true);


$pdf->writeHTMLCell(45, 5, 15, '', 'Resultado:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 60, '', '177386' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 93.5, '', '177386' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 127, '', '177386' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 160.5, '', '177386' ,1,1, 0, true, 'C', true);

$pdf->writeHTMLCell(45, 5, 15, '', 'Requisito:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(67, 5, 60, '', ' Clase D (OMS) / ISO 8 -> 0,5 µm: 3520000 / 5,0 µm: 29300' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(67, 5, 127, '', 'Clase D (OMS) / ISO 8 -> 0,5 µm: 3520000 / 5,0 µm: 29300' ,1,1, 0, true, 'C', true);

$pdf->writeHTMLCell(45, 5, 15, '', 'Veredicto:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 60, '', ' CUMPLE' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 93.5, '', ' CUMPLE' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 127, '', ' CUMPLE' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 160.5, '', ' CUMPLE' ,1,1, 0, true, 'C', true);

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2> Prueba de Renovación de Aire</h2></td>
   </tr>
</table>
EOD;  

//$pdf->SetFillColor(255,255,0);
//$pdf->SetTextColor(0,0,255);

$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(25, 5, 15, '', 'Resultado, Ren/h:' ,0,0, 0, true, 'J', true);
//$pdf->MultiCell(25, 5, 'Resultado', 15, 'C', 1, 0);
$pdf->writeHTMLCell(33.5, 5, 40, '', '15.9' ,1,0, 0, true, 'C', true);


$pdf->writeHTMLCell(25, 5, 78, '', 'Especificado:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 103, '', '15.9' ,1,0, 0, true, 'C', true);

$pdf->writeHTMLCell(21, 5, 140, '', 'Cumple:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 161, '', 'CUMPLE' ,1,1, 0, true, 'C', true);

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Difencial de Presión</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

/////// Consulta información  de presion 
$consultar_info_presion = mysqli_prepare($connect,"SELECT medicion_1, medicion_2, medicion_3, medicion_4
FROM salas_limpias_prueba_3
WHERE id_asignado = ? ");
mysqli_stmt_bind_param($consultar_info_presion, 'i', $id_asignado);
mysqli_stmt_execute($consultar_info_presion);
mysqli_stmt_store_result($consultar_info_presion);
mysqli_stmt_bind_result($consultar_info_presion, $medicion_1, $medicion_2, $medicion_3, $medicion_4);
//mysqli_stmt_fetch($consultar_info_presion);

$enunciadospresion = array('Lugar de Medición', 'Medición Realizada en', 'Resultado (Pa)', 'Presión especificada (Pa)', 'Tipo de Presión', 'Cumple Especificación');
$contador = 0;
while($row = mysqli_stmt_fetch($consultar_info_presion)){

$pdf->writeHTMLCell(50, 5, 15, '', $enunciadospresion[$contador] ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 65, '', $medicion_1 ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 100, '', $medicion_2 ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 135, '', $medicion_3 ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', $medicion_4 ,1,1, 0, true, 'C', true);

   $contador++;
}


$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Temperatura y Humedad Relativa</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado,°C: ' ,0,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 45, '', 'variable' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 80, '', 'Especificación Temperatura:' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 120, '', 'entre 18°C y 24°C' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 160, '', 'CUMPLE' ,1,1, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado, HR%: ' ,0,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 45, '', 'variable' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 80, '', 'Especificación Humedad:' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 120, '', 'entre 30%HR y 50%HR' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 160, '', 'CUMPLE' ,1,1, 0, true, 'C', true);


$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Iluminación y Ruido</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado,Lux:' ,0,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 45, '', 'variable' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 80, '', 'Resultado,Lux:' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 120, '', '>= 150' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 160, '', 'CUMPLE' ,1,1, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado, dbA:' ,0,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 45, '', 'variable' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 80, '', 'Especificación, dbA:' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 120, '', '< = 85' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 160, '', 'CUMPLE' ,1,1, 0, true, 'C', true);

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Conclusión</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(165, 5, 15, '', $conclusion ,0,1, 0, true, 'J', true);

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Duración de Certificado</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(165, 5, 15, '', 'De acuerdo con la UNE-EN ISO 14644-1 Anexo B, el intervalo de tiempo máximo entre verificaciones es de 12 meses. ' ,0,1, 0, true, 'J', true);


$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Responsable</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(180, 5, 15, '', 'Ing. '.$nombre_responsable.' &nbsp; '. $apellido_responsable.'<br>'.$nombre_cargo ,0,1, 0, true, 'C', true);

$pdf->AddPage('A4');

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>MEDICIÓN DE PARTÍCULAS EN SUSPENSIÓN</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$metodo_1 = mysqli_prepare($connect,"SELECT metodo_ensayo, puntos_x_medicion, muestra_x_punto, volumen_muestra, altura_muestra FROM salas_limpias_metodo_1 WHERE id_asignado = ?");
mysqli_stmt_bind_param($metodo_1, 'i', $id_asignado);
mysqli_stmt_execute($metodo_1);
mysqli_stmt_store_result($metodo_1);
mysqli_stmt_bind_result($metodo_1, $metodo_ensayo, $puntos_x_medicion, $muestra_x_punto, $volumen_muestra, $altura_muestra);
mysqli_stmt_fetch($metodo_1);


$prueba = <<<EOD
   <style>
   {
   border-collapse: collapse;
   width: 90%;
   text-align: center;
   vertical-align: middle;
   }
   th 
   {
   background-color: #3138AA;
   color: #FFFFFF;
   vertical-align: middle;
   }
   th, td 
   {
   border: 1px solid #BBBBBB;
   padding: 3px;
   vertical-align: middle;
   text-align: center;
   height:15px;
   font-size:11px;
   padding:auto auto auto auto;
   }
   tr:nth-child(even) 
   {
      background-color: #f2f2f2;
   }
   </style>
   <table>
      <tr>
         <table>
            <tr>
               <td bgcolor="#DDDDDD"><h5><strong>Método de Ensayo</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>N° Puntos por Medición</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>N° Muestras por Punto</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Volumen por Muestras (L)</strong></h5></td>
               <td bgcolor="#DDDDDD"><h5><strong>Altura toma de Muestras (m)</strong></h5></td>
            </tr>
            <tr>
               <td>$metodo_ensayo</td>
               <td>$puntos_x_medicion</td>
               <td>$muestra_x_punto</td>
               <td>$volumen_muestra</td>
               <td>$altura_muestra</td>
            </tr>
         </table>
      </tr>
   </table>
EOD;  
$pdf->writeHTML($prueba, true, false, false, false, '');

$buscarimagen1 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_sala_limpia
WHERE id_asignado = ? AND tipo = 1");
mysqli_stmt_bind_param($buscarimagen1, 'i', $id_asignado);
mysqli_stmt_execute($buscarimagen1);
mysqli_stmt_store_result($buscarimagen1);
mysqli_stmt_bind_result($buscarimagen1, $url_imagen, $nombre_imagen);
mysqli_stmt_fetch($buscarimagen1);



$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="0">
        <td class="linea" align="center"><h2>Imagen de la Medición y Registro de Conteo de Partículas</h2></td>
   </tr>
</table>
<br><br>
<table border="0">
    <tr>
        <td></td>
        <td>
        <img src="../../$url_imagen$nombre_imagen"  style="width: 700px; height: 500px;" ></td>
        <td></td>
    </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h3>Cálculo de Resultados - Medidos en partículas / m³ - Requisito de Partícula 0,5 µm: 3520000 / 5,0 µm: 29300</h3></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(30, 5, 15, '', 'Tamaños (µm)' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 45, '', 'Media de los Promedios' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 80, '', 'Desviación Estandar' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(40, 5, 120, '', 'Desviación Estandar' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(35, 5, 160, '', 'Cumple' ,1,1, 0, true, 'C', true);

$categoria_1 = 1;
$enunciados1 = array('>=0,5', '>=5,0');
$contador = 0;

$query1 = mysqli_prepare($connect,"SELECT medida_promedio, desviacion_estandar, maximo, cumple FROM salas_limpias_prueba_1 WHERE id_asignado = ? AND categoria  = ?");
mysqli_stmt_bind_param($query1, 'ii', $id_asignado, $categoria_1);
mysqli_stmt_execute($query1);
mysqli_stmt_store_result($query1);
mysqli_stmt_bind_result($query1, $medida_promedio, $desviacion_estandar, $maximo, $cumple);

while($row = mysqli_stmt_fetch($query1)){

   $pdf->writeHTMLCell(30, 5, 15, '', $enunciados1[$contador] ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 45, '', $medida_promedio ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(40, 5, 80, '', $desviacion_estandar ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(40, 5, 120, '', $maximo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(35, 5, 160, '', $cumple ,1,1, 0, true, 'C', true);

   $contador++;
}


$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><b>Cálculo de Resultados para Informe Técnico N°45 de la OMS - Medidos en partículas / m³ - Requisito de Partícula 0,5 µm:3.520.000 / 5,0 µm: 29.000</b></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(63, 5, 15, '', 'Tamaños (µm)' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(63, 5, 78, '', 'Promedios' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(53, 5, 141, '', 'Cumple' ,1,1, 0, true, 'C', true);

$categoria_2 = 2;
$enunciados1 = array('>=0,5', '>=5,0');
$contador = 0;

$query2 = mysqli_prepare($connect,"SELECT promedios, cumple FROM salas_limpias_prueba_1 WHERE id_asignado = ? AND categoria  = ?");
mysqli_stmt_bind_param($query2, 'ii', $id_asignado, $categoria_2);
mysqli_stmt_execute($query2);
mysqli_stmt_store_result($query2);
mysqli_stmt_bind_result($query2, $promedios, $cumple);

while($row = mysqli_stmt_fetch($query2)){

   $pdf->writeHTMLCell(63, 5, 15, '', $enunciados1[$contador] ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(63, 5, 78, '', $promedios ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(53, 5, 141, '', $cumple ,1,1, 0, true, 'C', true);
   $contador++;
}



$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Equipo Utilizado en la Medición</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 7.2, 15, '', '<b>Marca</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 45, '', '<b>Modelo</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 75, '', '<b>N° Serie</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 105, '', '<b>Certificado de Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 135, '', '<b>Última Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 165, '', '<b>Trazabilidad</b>  ' ,1,1, 0, true, 'C', true);

$equipo_prueba_1 = "Prueba de conteo de particulas";


$query3 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  
FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c 
WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ? ");

mysqli_stmt_bind_param($query3, 'is', $id_asignado, $equipo_prueba_1);
mysqli_stmt_execute($query3);
mysqli_stmt_store_result($query3);
mysqli_stmt_bind_result($query3, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query3)){

   $pdf->writeHTMLCell(30, 7.2, 15, '', $marca ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 45, '', $modelo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 75, '', $n_serie ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 105, '', $certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);

}

$pdf->AddPage('A4');

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>MEDICIÓN DE PRESIÓN DIFERENCIAL</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$metodo_2 = mysqli_prepare($connect,"SELECT metodo_ensayo, especificacion FROM salas_limpias_metodo_2 WHERE id_asignado = ?");
mysqli_stmt_bind_param($metodo_2, 'i', $id_asignado);
mysqli_stmt_execute($metodo_2);
mysqli_stmt_store_result($metodo_2);
mysqli_stmt_bind_result($metodo_2, $metodo_ensayo, $especificacion);
mysqli_stmt_fetch($metodo_2);

$pdf->writeHTMLCell(30, 5, 15, '', '<strong>Método de ensayo:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 45, '', $metodo_ensayo ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(40, 5, 110, '', '<strong>Especificación de la sala:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(45, 5, 150, '', $especificacion ,1,1  , 0, true, 'J', true);




$buscarimagen2 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_sala_limpia
WHERE id_asignado = ? AND tipo = 2");
mysqli_stmt_bind_param($buscarimagen2, 'i', $id_asignado);
mysqli_stmt_execute($buscarimagen2);
mysqli_stmt_store_result($buscarimagen2);
mysqli_stmt_bind_result($buscarimagen2, $url_imagen2, $nombre_imagen2);
mysqli_stmt_fetch($buscarimagen2);



$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Imagen de la medición</h2></td>
   </tr>
</table>
<br>
<br>
<table border="0">
   <tr>
       <td></td>
       <td><img src="../../$url_imagen2$nombre_imagen2"  style="width: 700px; height: 500px;" ></td>
       <td></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Medición - Prueba de Presión Diferencial, Pa</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$nombres = array('Lugar de Medición', 'Medición Realizada en', 'Resultado (Pa)', 'Presión especificada (Pa)', 'Tipo de Presión', 'Cumple Especificación');
$contador = 0;

$query4 = mysqli_prepare($connect,"SELECT campo_1, campo_2, campo_3, campo_4, campo_5, campo_6 
   FROM datos_de_prueba_3 a, salas_limpias_prueba_3 b 
   WHERE a.id_prueba_3 = b.id_prueba AND  b.id_asignado = ?");
mysqli_stmt_bind_param($query4, 'i', $id_asignado);
mysqli_stmt_execute($query4);
mysqli_stmt_store_result($query4);
mysqli_stmt_bind_result($query4, $campo_1, $campo_2, $campo_3, $campo_4, $campo_5, $campo_6);

$array_resultado = array();
   while($row = mysqli_stmt_fetch($query4)){

        $array_resultado[] = array(
            'campo_1'=>$campo_1,
            'campo_2'=>$campo_2,
            'campo_3'=>$campo_3,
            'campo_4'=>$campo_4,
            'campo_5'=>$campo_5,
            'campo_6'=>$campo_6
        );
    }
      $espaciado = 55;

          $pdf->writeHTMLCell(40, 6, 15, '', $nombres[0] ,1,0, 0, true, 'J', true);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          $pdf->writeHTMLCell(15, 6, $espaciado+$i*15, '', $array_resultado[$i]['campo_1'],1,0, 0, true, 'C', true);  
      }
      $pdf->ln(6);
      $pdf->writeHTMLCell(40, 6, 15, '', $nombres[1] ,1,0, 0, true, 'J', true);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          $pdf->writeHTMLCell(15, 6, $espaciado+$i*15, '', $array_resultado[$i]['campo_2'],1,0, 0, true, 'C', true);  
      }
      $pdf->ln(6);
      $pdf->writeHTMLCell(40, 6, 15, '', $nombres[2] ,1,0, 0, true, 'J', true);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          $pdf->writeHTMLCell(15, 6, $espaciado+$i*15, '', $array_resultado[$i]['campo_3'],1,0, 0, true, 'C', true);  
      }
      /*$pdf->ln(6);
      $pdf->writeHTMLCell(40, 6, 15, '', $nombres[3] ,1,0, 0, true, 'J', true);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          $pdf->writeHTMLCell(15, 6, $espaciado+$i*15, '', $array_resultado[$i]['campo_4'],1,0, 0, true, 'C', true);  
      }*/
      $pdf->ln(6);
      $pdf->writeHTMLCell(40, 6, 15, '', $nombres[3] ,1,0, 0, true, 'J', true);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          $pdf->writeHTMLCell(15, 6, $espaciado+$i*15, '', $array_resultado[$i]['campo_4'],1,0, 0, true, 'C', true);  
      }
      $pdf->ln(6);
      $pdf->writeHTMLCell(40, 6, 15, '', $nombres[4] ,1,0, 0, true, 'J', true);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          $pdf->writeHTMLCell(15, 6, $espaciado+$i*15, '', $array_resultado[$i]['campo_5'],1,0, 0, true, 'C', true);  
      }
      $pdf->ln(6);
      $pdf->writeHTMLCell(40, 6, 15, '', $nombres[5] ,1,0, 0, true, 'J', true);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          $pdf->writeHTMLCell(15, 6, $espaciado+$i*15, '', $array_resultado[$i]['campo_6'],1,0, 0, true, 'C', true);  
      }

$pdf->ln(10);
$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Equipo Utilizado en la Medición</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 7.2, 15, '', '<b>Marca</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 45, '', '<b>Modelo</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 75, '', '<b>N° Serie</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 105, '', '<b>Certificado de Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 135, '', '<b>Última Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 165, '', '<b>Trazabilidad</b>  ' ,1,1, 0, true, 'C', true);

$equipo_prueba_2 = "Prueba de Presión Diferencial";


$query5 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ? ");
mysqli_stmt_bind_param($query5, 'is', $id_asignado, $equipo_prueba_2);
mysqli_stmt_execute($query5);
mysqli_stmt_store_result($query5);
mysqli_stmt_bind_result($query5, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query5)){

   $pdf->writeHTMLCell(30, 7.2, 15, '', $marca ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 45, '', $modelo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 75, '', $n_serie ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 105, '', $certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);

}



$pdf->AddPage('A4');

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Medición - Prueba de Temperatura y Humedad</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$metodo_3 = mysqli_prepare($connect,"SELECT metodo_ensayo, n_muestras, altura_muestra FROM salas_limpias_metodo_4 WHERE id_asignado = ? AND categoria = 1");
mysqli_stmt_bind_param($metodo_3, 'i', $id_asignado);
mysqli_stmt_execute($metodo_3);
mysqli_stmt_store_result($metodo_3);
mysqli_stmt_bind_result($metodo_3, $metodo_ensayo, $n_muestras, $altura_muestra);
mysqli_stmt_fetch($metodo_3);

$pdf->writeHTMLCell(30, 5, 15, '', '<strong>Método de ensayo:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(50, 5, 45, '', $metodo_ensayo ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(25, 5, 105, '', '<strong>N° de muestras:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(15, 5, 130, '', $n_muestras ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(40, 5, 145, '', '<strong>Altura toma de Muestras:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 185, '',  $altura_muestra ,1,1  , 0, true, 'J', true);

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Imagen de la Médición</h2></td>
   </tr>
</table>
<br>
<table border="0">
   <tr border="0">
        <td></td>
        <td><img src="../imagenes_informe/Segunda_foto.png"></td>
        <td></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Medición de Temperatura °C</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(20, 5, 15, '', '<strong>Muestras</strong>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(32.5, 5, 35, '', '<strong>N°1</strong>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(32.5, 5, 67.5, '', '<strong>N°2</strong>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(32.5, 5,100, '', '<strong>N°3</strong>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(32.5, 5,132.5, '', '<strong>N°4</strong>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', '<strong>N°5</strong>' ,1,1, 0, true, 'C', true);

$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 1");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio, $cumple, $categoria);

while($row = mysqli_stmt_fetch($query6)){

   $pdf->writeHTMLCell(20, 5, 15, '', 'Resultado, °C' ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(32.5, 5, 35, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 67.5, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 100, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 132.5, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 165, '', $n5 ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(20, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Promedio, °C:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 40, '', $promedio ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(40, 5, 65, '', '<strong>Especificación Cliente ,°C:</strong>' ,0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 105, '', $temperatura_item ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(40, 5, 130, '', '<strong>Cumple</strong>' ,0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 170, '', $cumple ,1,1, 0, true, 'C', true);


}


$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Medición de Humedad Relativa, HR%</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(20, 5, 15, '', '<strong>Muestras</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 35, '', '<strong>N°1</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 67.5, '', '<strong>N°2</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,100, '', '<strong>N°3</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,132.5, '', '<strong>N°4</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(30, 5, 165, '', '<strong>N°5</strong>' ,1,1, 0, true, 'J', true);

$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 2");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio, $cumple, $categoria);

while($row = mysqli_stmt_fetch($query6)){

   $pdf->writeHTMLCell(20, 5, 15, '', 'Resultado, HR%' ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(32.5, 5, 35, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 67.5, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 100, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 132.5, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 165, '', $n5 ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(20, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Promedio, HR%:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 40, '', $promedio ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(40, 5, 65, '', '<strong>Especificación Cliente ,HR%:</strong>' ,0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 105, '', $hum_relativa_item ,1,0, 0, true, 'C', true);

   $pdf->writeHTMLCell(40, 5, 130, '', '<strong>Cumple</strong>' ,0,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(20, 5, 170, '', $cumple ,1,1, 0, true, 'C', true);


}



$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Equipo Utilizado en la Medición</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 7.2, 15, '', '<b>Marca</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 45, '', '<b>Modelo</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 75, '', '<b>N° Serie</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 105, '', '<b>Certificado de Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 135, '', '<b>Última Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 165, '', '<b>Trazabilidad</b>  ' ,1,1, 0, true, 'C', true);

$equipo_prueba_4 = "Prueba de temperatura y humedad relativa";


$query7 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ? ");
mysqli_stmt_bind_param($query7, 'is', $id_asignado, $equipo_prueba_4);
mysqli_stmt_execute($query7);
mysqli_stmt_store_result($query7);
mysqli_stmt_bind_result($query7, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query7)){

   $pdf->writeHTMLCell(30, 7.2, 15, '', $marca ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 45, '', $modelo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 75, '', $n_serie ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 105, '', $certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);

}


$pdf->AddPage('A4');

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Medición de iluminación y ruido</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$metodo_4 = mysqli_prepare($connect,"SELECT metodo_ensayo, n_muestras, altura_muestra FROM salas_limpias_metodo_4 WHERE id_asignado = ? AND categoria = 2");
mysqli_stmt_bind_param($metodo_4, 'i', $id_asignado);
mysqli_stmt_execute($metodo_4);
mysqli_stmt_store_result($metodo_4);
mysqli_stmt_bind_result($metodo_4, $metodo_ensayo, $n_muestras, $altura_muestra);
mysqli_stmt_fetch($metodo_4);

$pdf->writeHTMLCell(30, 5, 15, '', '<strong>Método de ensayo:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(50, 5, 45, '',  $metodo_ensayo ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(25, 5, 105, '', '<strong>N° de muestras:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(15, 5, 130, '', $n_muestras ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(40, 5, 145, '', '<strong>Altura toma de Muestras:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 185, '', $altura_muestra ,1,1  , 0, true, 'J', true);

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Imagen de la Medición</h2></td>
   </tr>
</table>
<br>
<table border="0">
   <tr border="0">
        <td></td>
        <td><img src="../imagenes_informe/Tercera_foto.png"></td>
        <td></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Medición de luminancia, Lux</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(20, 5, 15, '', '<strong>Muestras</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 35, '', '<strong>N°1</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 67.5, '', '<strong>N°2</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,100, '', '<strong>N°3</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,132.5, '', '<strong>N°4</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(30, 5, 165, '', '<strong>N°5</strong>' ,1,1, 0, true, 'J', true);

$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 3");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio, $cumple, $categoria);

while($row = mysqli_stmt_fetch($query6)){

   $pdf->writeHTMLCell(20, 5, 15, '', 'Resultado, Lux ' ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(32.5, 5, 35, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 67.5, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 100, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 132.5, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 165, '', $n5 ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(20, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Promedio, Lux:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 40, '', $promedio ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 65, '', '<strong>Especificación Cliente ,Lux:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 105, '', $lux_item ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 130, '', '<strong>Cumple</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 170, '', $cumple ,1,1, 0, true, 'J', true);


}


$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Medición de Ruido, dBA</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(20, 5, 15, '', '<strong>Muestras</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 35, '', '<strong>N°1</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5, 67.5, '', '<strong>N°2</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,100, '', '<strong>N°3</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(32.5, 5,132.5, '', '<strong>N°4</strong>' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(30, 5, 165, '', '<strong>N°5</strong>' ,1,1, 0, true, 'J', true);

$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 4");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio, $cumple, $categoria);

while($row = mysqli_stmt_fetch($query6)){

   $pdf->writeHTMLCell(20, 5, 15, '', 'Resultado, dBA' ,1,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(32.5, 5, 35, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 67.5, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 100, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(32.5, 5, 132.5, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 165, '', $n5 ,1,1, 0, true, 'C', true);

   $pdf->writeHTMLCell(20, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   $pdf->writeHTMLCell(25, 5, 15, '', '<strong>Promedio, dBA:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 40, '', $promedio ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 65, '', '<strong>Especificación Cliente ,dBA:</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 105, '', $ruido_dba_item ,1,0, 0, true, 'J', true);

   $pdf->writeHTMLCell(40, 5, 130, '', '<strong>Cumple</strong>' ,0,0, 0, true, 'J', true);
   $pdf->writeHTMLCell(20, 5, 170, '', $cumple ,1,1, 0, true, 'J', true);
    $pdf->writeHTMLCell(20, 5, 170, '', '' ,0,1, 0, true, 'J', true);


}



$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Equipo Utilizado en la Medición</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 7.2, 15, '', '<b>Marca</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 45, '', '<b>Modelo</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 75, '', '<b>N° Serie</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 105, '', '<b>Certificado de Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 135, '', '<b>Última Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 165, '', '<b>Trazabilidad</b>  ' ,1,1, 0, true, 'C', true);

$equipo_prueba_5 = "Prueba Medición de ruido";
$equipo_prueba_6 = "Prueba nivel de iluminación";


$query7 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ? OR c.tipo_prueba = ?");
mysqli_stmt_bind_param($query7, 'is', $id_asignado, $equipo_prueba_5, $equipo_prueba_6);
mysqli_stmt_execute($query7);
mysqli_stmt_store_result($query7);
mysqli_stmt_bind_result($query7, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query7)){

   $pdf->writeHTMLCell(30, 7.2, 15, '', $marca ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 45, '', $modelo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 75, '', $n_serie ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 105, '', $certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);

}




$pdf->AddPage('A4');

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>MEDICIÓN DE CAUDAL DE AIRE, Cálculo de Renovación Aire/Hora</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$metodo_5 = mysqli_prepare($connect,"SELECT metodo_ensayo, n_rejillas, n_extractores FROM salas_limpias_metodo_5 WHERE id_asignado = ?");
mysqli_stmt_bind_param($metodo_5, 'i', $id_asignado);
mysqli_stmt_execute($metodo_5);
mysqli_stmt_store_result($metodo_5);
mysqli_stmt_bind_result($metodo_5, $metodo_ensayo, $n_rejillas, $n_extractores);
mysqli_stmt_fetch($metodo_5);

$pdf->writeHTMLCell(30, 5, 15, '', '<strong>Método de ensayo:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(50, 5, 45, '', $metodo_ensayo ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(40, 5, 105, '', '<strong>N° de Rejillas de Inyección:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 145, '', $n_rejillas ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(40, 5, 155, '', '<strong>N° de Extractores:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 185, '', $n_extractores ,1,1  , 0, true, 'J', true);








$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Imagen de la Medición</h2></td>
   </tr>
</table>
<table>
   <tr border="">
        <td></td>
        <td><img src="../imagenes_informe/Cuarta_foto.png"></td>
        <td></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Resultado - Prueba de Medición de Caudal de Inyección de Aire, m³/h </h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$pdf->writeHTMLCell(30, 5, 15, '', 'Inyección (m³/h)' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 45, '', 'N°1' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5,55, '', 'N°2' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 65, '', 'N°3' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 75, '', 'N°4' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 85, '', 'N°5' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 95, '', 'N°6' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5,105, '', 'N°7' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 115, '', 'N°8' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 125, '', 'N°9' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 135, '', 'N°10' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 145, '', 'N°11' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 155, '', 'N°12' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 165, '', 'N°13' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 175, '', 'N°14' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 185, '', 'N°15' ,1,1, 0, true, 'J', true);


$nombres_p5 = array('N°1','N°2','N°3','Promedio');
$contador = 0;


$query8 = mysqli_prepare($connect,"SELECT n1,n2,n3,n4,n5,n6,n7,n8,n9,n10,n11,n12,n13,n14,n15 FROM salas_limpias_prueba_5 WHERE id_asignado = ? AND categoria = 1");
mysqli_stmt_bind_param($query8, 'i', $id_asignado);
mysqli_stmt_execute($query8);
mysqli_stmt_store_result($query8);
mysqli_stmt_bind_result($query8, $n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12,$n13,$n14,$n15);

while($row = mysqli_stmt_fetch($query8)){

   $pdf->writeHTMLCell(30, 5, 15, '', $nombres_p5[$contador] ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 45, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5,55, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 65, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 75, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 85, '', $n5 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 95, '', $n6 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5,105, '', $n7 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 115, '', $n8 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 125, '', $n9 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 135, '', $n10 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 145, '', $n11 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 155, '', $n12 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 165, '', $n13 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 175, '', $n14 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 185, '', $n15 ,1,1, 0, true, 'C', true);
   $contador++;

}



$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Resultado - Prueba de Medición de Caudal de Inyección de Aire, m³/h</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false,'');



$pdf->writeHTMLCell(30, 5, 15, '', 'Extracción (m³/h)' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 45, '', 'N°1' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5,55, '', 'N°2' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 65, '', 'N°3' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 75, '', 'N°4' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 85, '', 'N°5' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 95, '', 'N°6' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5,105, '', 'N°7' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 115, '', 'N°8' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 125, '', 'N°9' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 135, '', 'N°10' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 145, '', 'N°11' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 155, '', 'N°12' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 165, '', 'N°13' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 175, '', 'N°14' ,1,0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 5, 185, '', 'N°15' ,1,1, 0, true, 'J', true);


$nombres_p5 = array('N°1','N°2','N°3','Promedio');
$contador = 0;


$query8 = mysqli_prepare($connect,"SELECT n1,n2,n3,n4,n5,n6,n7,n8,n9,n10,n11,n12,n13,n14,n15 FROM salas_limpias_prueba_5 WHERE id_asignado = ? AND categoria = 2");
mysqli_stmt_bind_param($query8, 'i', $id_asignado);
mysqli_stmt_execute($query8);
mysqli_stmt_store_result($query8);
mysqli_stmt_bind_result($query8, $n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12,$n13,$n14,$n15);

while($row = mysqli_stmt_fetch($query8)){

   $pdf->writeHTMLCell(30, 5, 15, '', $nombres_p5[$contador] ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 45, '', $n1 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5,55, '', $n2 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 65, '', $n3 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 75, '', $n4 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 85, '', $n5 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 95, '', $n6 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5,105, '', $n7 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 115, '', $n8 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 125, '', $n9 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 135, '', $n10 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 145, '', $n11 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 155, '', $n12 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 165, '', $n13 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 175, '', $n14 ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(10, 5, 185, '', $n15 ,1,1, 0, true, 'C', true);
   $contador++;

}




$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Resultado Final - Cálculo de Renovación de Aire/Hora
        </h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false,'');


$pdf->writeHTMLCell(50, 5, 15, '', 'Promedio de Caudal Total Inyectado (m³/h)' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 5, 65, '', 'Renovaciones Aire/Hora Obtenidas' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 5, 115, '', 'Renovaciones Aire/Hora Especificadas' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 5, 165, '', 'Cumple' ,1,1, 0, true, 'C', true);

$query9 = mysqli_prepare($connect,"SELECT medicion_1, medicion_2, medicion_3, medicion_4 FROM salas_limpias_prueba_6 WHERE id_asignado = ?");
mysqli_stmt_bind_param($query9, 'i', $id_asignado);
mysqli_stmt_execute($query9);
mysqli_stmt_store_result($query9);
mysqli_stmt_bind_result($query9, $medicion_uno, $medicion_dos, $medicion_tres, $medicion_cuatro);
echo mysqli_stmt_error($query9);

while($row = mysqli_stmt_fetch($query9)){

   $pdf->writeHTMLCell(50, 5, 15, '', $medicion_uno, 1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(50, 5, 65, '', $medicion_dos, 1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(50, 5, 115, '', $medicion_tres, 1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 5, 165, '', $medicion_cuatro, 1,1, 0, true, 'C', true);

}


$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br>
<table>
   <tr border="1">
        <td class="linea" align="center"><h2>Equipo Utilizado en la Medición</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(30, 7.2, 15, '', '<b>Marca</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 45, '', '<b>Modelo</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 75, '', '<b>N° Serie</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 105, '', '<b>Certificado de Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 135, '', '<b>Última Calibración</b>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 7.2, 165, '', '<b>Trazabilidad</b>  ' ,1,1, 0, true, 'C', true);

$equipo_prueba_7 = "Prueba de medición de caudal";


$query7 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ?");
mysqli_stmt_bind_param($query7, 'is', $id_asignado, $equipo_prueba_7);
mysqli_stmt_execute($query7);
mysqli_stmt_store_result($query7);
mysqli_stmt_bind_result($query7, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query7)){

   $pdf->writeHTMLCell(30, 7.2, 15, '', $marca ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 45, '', $modelo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 75, '', $n_serie ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 105, '', $certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);

}


$pdf->Output($nombre_informe, 'I');
?>


