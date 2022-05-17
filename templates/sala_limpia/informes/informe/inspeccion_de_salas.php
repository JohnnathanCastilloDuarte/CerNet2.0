<?php 
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');


$clave = $_GET['clave'];

$id_asignado = substr($clave, 97);


/////// CONSULTA TRAE INFORMACIÓN DEL EQUIPO
$consulta_informacion_informe = mysqli_prepare($connect,"SELECT a.nombre, b.area_interna, b.codigo, 
   b.area_m2, b.volumen_m3, b.estado_sala, b.direccion, b.especificacion_1_temp, 
   b.especificacion_1_hum, b.ruido_dba, b.lux, b.clasificacion_oms, b.clasificacion_iso, b.ren_hr, b.especificacion_2_temp, b.especificacion_2_hum, b.cantidad_extracciones 
   FROM item as a, item_sala_limpia as b, item_asignado as c 
   WHERE c.id_asignado = ? AND c.id_item = a.id_item AND b.id_item = c.id_item");
mysqli_stmt_bind_param($consulta_informacion_informe, 'i', $id_asignado);
mysqli_stmt_execute($consulta_informacion_informe);
mysqli_stmt_store_result($consulta_informacion_informe);
mysqli_stmt_bind_result($consulta_informacion_informe, $nombre_sala, $area_sala, $codigo_sala, 
   $area_m2, $volumen_m3, $estado_sala, $direccion_item, $especificacion_1_temp, 
   $especificacion_1_hum, $ruido_dba_item, $lux_item,$clasificacion_oms, $clasificacion_iso, $ren_hr, $especificacion_2_temp, $especificacion_2_hum, $cantidad_extracciones);
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


//calcular caudal 


$contador = 0;


$query8 = mysqli_prepare($connect,"SELECT replace(n1,0,''),replace(n2,0,''),replace(n3,0,''), replace(n4,0,''),replace(n5,0,''),replace(n6,0,''),replace(n7,0,''),replace(n8,0,''),replace(n9,0,''),replace(n10,0,''),replace(n11,0,''),replace(n12,0,''),replace(n13,0,''),replace(n14,0,''),replace(n15,0,'') FROM salas_limpias_prueba_5 WHERE id_asignado = ? AND categoria = 1");
mysqli_stmt_bind_param($query8, 'i', $id_asignado);
mysqli_stmt_execute($query8);
mysqli_stmt_store_result($query8);
mysqli_stmt_bind_result($query8, $n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12,$n13,$n14,$n15);


$promedio_extraccion = "";


while($row = mysqli_stmt_fetch($query8)){

 /**/

   $contador++;

   if ($contador == 3) {
      $promedio_caudal = $n1+$n2+$n3+$n4+$n5+$n6+$n7+$n8+$n9+$n10+$n11+$n12+$n13+$n14+$n15;
   }
}

$resultado_prom_caudal = round(($promedio_caudal / $volumen_m3),2);


///INFORMACION DE LAS ISO Y OMS 
if ($clasificacion_iso == 5) {
   $particulas05 = 3520;
   $particulas50 = 29;
}elseif($clasificacion_iso == 6) {
   $particulas05 = 35200;
   $particulas50 = 293;
}elseif ($clasificacion_iso == 7) {
   $particulas05 = 352000;
   $particulas50 = 2930;
}elseif ($clasificacion_iso == 8) {
   $particulas05 = 3520000;
   $particulas50 = 29300;
}elseif ($clasificacion_iso == 9) {
   $particulas05 = 35200000;
   $particulas50 = 293000;
}

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
<table>
   <tr>
        <td class="linea" align="center"><h2>CERTIFICADO INSPECCIÓN DE SALA LIMPIA</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

     $pdf->Cell(30,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(55,5,$nombre_informe,1,0,'L',0,'',0);

     $pdf->Cell(18,5,'OT N°:',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);

     $pdf->Cell(32,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(30,5,$fecha_registro,1,0,'C',0,'',0);

     $pdf->ln(6);

     $pdf->Cell(30,5,'Empresa:',0,0,'L',0,'',0);
     $pdf->Cell(88,5,$empresa,1,0,'C',0,'',0);

     $pdf->Cell(32,5,'Solicita:',0,0,'J',0,'',0);
     $pdf->Cell(30,5,$solicita,1,0,'C',0,'',0);

     $pdf->ln(6);

     $pdf->Cell(30,5,'Dirección:',0,0,'J',0,'',0);
     $pdf->Cell(150,5,$direccion_item,1,0,'J',0,'',0);

   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);


///Información del equipo 
$pdf->SetFillColor(221,221,221);


$pdf->Cell(44,5,'Nombre de la Sala',1,0,'C',1,'',0);
$pdf->Cell(48,5,'Área',1,0,'C',1,'',0);
$pdf->Cell(21,5,'Código',1,0,'C',1,'',0);
$pdf->Cell(21,5,'Área m²',1,0,'C',1,'',0);
$pdf->Cell(21,5,'Volumen m³',1,0,'C',1,'',0);
$pdf->Cell(25,5,'Estado de Sala',1,0,'C',1,'',0);
$pdf->ln(5);
$pdf->Cell(44,5,$nombre_sala,1,0,'C',0,'',0);
$pdf->Cell(48,5,$area_sala,1,0,'C',0,'',0);
$pdf->Cell(21,5,$codigo_sala,1,0,'C',0,'',0);
$pdf->Cell(21,5,$area_m2,1,0,'C',0,'',0);
$pdf->Cell(21,5,$volumen_m3,1,0,'C',0,'',0);
$pdf->Cell(25,5,$estado_sala,1,0,'C',0,'',0);

$pdf->ln(10);

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
   text-align:center;
}
</style>
<table>
   <tr>
        <td class="linea" align="center"><h2><b>RESULTADO DE MEDICIONES</b></h2></td>
   </tr>
</table>
<br><br>
<table>
   <tr>
        <td class="linea"><h2>Prueba de Partículas en Suspensión</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$buscar_particulas_05 = mysqli_prepare($connect,"SELECT medida_promedio, desviacion_estandar, maximo, cumple 
   FROM salas_limpias_prueba_1 WHERE id_asignado = ? AND categoria  =1 ORDER BY id_prueba ASC LIMIT 1");
mysqli_stmt_bind_param($buscar_particulas_05, 'i', $id_asignado);
mysqli_stmt_execute($buscar_particulas_05);
mysqli_stmt_store_result($buscar_particulas_05);
mysqli_stmt_bind_result($buscar_particulas_05, $medida_promedio05, $desviacion_estandar05, $maximo05, $cumple05);
mysqli_stmt_fetch($buscar_particulas_05);



$buscar_particulas_50 = mysqli_prepare($connect,"SELECT medida_promedio, desviacion_estandar, maximo, cumple 
   FROM salas_limpias_prueba_1 WHERE id_asignado = ? AND categoria  =1 ORDER BY id_prueba DESC LIMIT 1");
mysqli_stmt_bind_param($buscar_particulas_50, 'i', $id_asignado);
mysqli_stmt_execute($buscar_particulas_50);
mysqli_stmt_store_result($buscar_particulas_50);
mysqli_stmt_bind_result($buscar_particulas_50, $medida_promedio50, $desviacion_estandar50, $maximo50, $cumple50);
mysqli_stmt_fetch($buscar_particulas_50);
//LOGICAS 1
$resultadooms= $medida_promedio05 - $medida_promedio50;

if ($medida_promedio05 <= $particulas05) {
    $estado_particula1 = 'CUMPLE';
}else{
    $estado_particula1 = 'NO CUMPLE';
}

if ($medida_promedio50 <= $particulas50) {
    $estado_particula2 = 'CUMPLE';
}else{
    $estado_particula2 = 'NO CUMPLE';
}

if ($resultadooms < $particulas05) {
    $estado_particula3 = 'CUMPLE';
}else{
    $estado_particula3 = 'NO CUMPLE';
}


//$pdf->writeHTMLCell(45, 5, 15, '', 'Norma de Referencia:' ,0,0, 0, true, 'J', true);
//$pdf->writeHTMLCell(67, 5, 60, '', 'ISO 14644-1:2015 (Promedio)' ,1,0, 0, true, 'C', true);
//$pdf->writeHTMLCell(67, 5, 127, '', 'OMS 45 (Promedio)' ,1,1, 0, true, 'C', true);

$pdf->Cell(31,5,'Norma de Referencia:',0,0,'L',0,'',0);
$pdf->Cell(14,5,'',0,0,'J',0,'',0);
$pdf->Cell(68,5,'ISO 14644-1:2015 (Promedio)',1,0,'C',0,'',0);
$pdf->Cell(67,5,'OMS 45 (Promedio)',1,0,'C',0,'',0);

$pdf->ln(5);

/*$pdf->writeHTMLCell(45, 5, 15, '', 'Tamaño de Partículas:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 60, '', 'Partículas >= 0,5 µm' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 93.5, '', 'Partículas >= 5,0 µm' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 127, '', 'Partículas >= 0,5 µm' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 160.5, '', 'Partículas >= 5,0 µm' ,1,1, 0, true, 'C', true);*/

$pdf->Cell(34,5,'Tamaño de Partículas:',0,0,'L',0,'',0);
$pdf->Cell(11,5,'',0,0,'J',0,'',0);
$pdf->Cell(34,5,'Partículas >= 0,5 µm',1,0,'C',0,'',0);
$pdf->Cell(34,5,'Partículas >= 5,0 µm',1,0,'C',0,'',0);
$pdf->Cell(34,5,'Partículas >= 0,5 µm',1,0,'C',0,'',0);
$pdf->Cell(33,5,'Partículas >= 5,0 µm',1,0,'C',0,'',0);

$pdf->ln(5);

/*$pdf->writeHTMLCell(45, 5, 15, '', 'Resultado:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 60, '', $medida_promedio05,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 93.5, '', $medida_promedio50 ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 127, '', $resultadooms ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 160.5, '', $medida_promedio50 ,1,1, 0, true, 'C', true);*/

$pdf->Cell(34,5,'Resultado:',0,0,'L',0,'',0);
$pdf->Cell(11,5,'',0,0,'J',0,'',0);
$pdf->Cell(34,5,$medida_promedio05,1,0,'C',0,'',0);
$pdf->Cell(34,5,$medida_promedio50,1,0,'C',0,'',0);
$pdf->Cell(34,5,$resultadooms,1,0,'C',0,'',0);
$pdf->Cell(33,5,$medida_promedio50,1,0,'C',0,'',0);

$pdf->ln(5);

/*$pdf->writeHTMLCell(45, 5, 15, '', 'Requisito:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(67, 5, 60, '', 'Clase '.$clasificacion_oms.' (OMS) / ISO '.$clasificacion_iso.' -> 0,5 µm: '.$particulas05.' / 5,0 µm: '.$particulas50 ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(67, 5, 127, '','Clase '.$clasificacion_oms.' (OMS) / ISO '.$clasificacion_iso.' -> 0,5 µm: '.$particulas05.' / 5,0 µm: '.$particulas50  ,1,1, 0, true, 'C', true);*/

$pdf->Cell(31,5,'Requisito:',0,0,'L',0,'',0);
$pdf->Cell(14,5,'',0,0,'J',0,'',0);
$pdf->Cell(68,5,'Clase '.$clasificacion_oms.' (OMS) / ISO '.$clasificacion_iso.' -> 0,5 µm: '.$particulas05.' / 5,0 µm: '.$particulas50,1,0,'C',0,'',0);
$pdf->Cell(67,5,'Clase '.$clasificacion_oms.' (OMS) / ISO '.$clasificacion_iso.' -> 0,5 µm: '.$particulas05.' / 5,0 µm: '.$particulas50,1,0,'C',0,'',0);

$pdf->ln(5);
/*$pdf->writeHTMLCell(45, 5, 15, '', 'Veredicto:' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(33.5, 5, 60, '', $estado_particula1 ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 93.5, '', $estado_particula2 ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 127, '', $estado_particula3 ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(33.5, 5, 160.5, '', $estado_particula2 ,1,1, 0, true, 'C', true);
*/

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
        <td class="linea" align="center"><h2>Prueba de Renovación de Aire</h2></td>
   </tr>
</table>
EOD;  

//$pdf->SetFillColor(255,255,0);
//$pdf->SetTextColor(0,0,255);

if ($resultado_prom_caudal > $ren_hr) {
   $cumple_aire = 'CUMPLE';
}else{
   $cumple_aire = 'NO CUMPLE';
}

$pdf->writeHTML($linea, true, false, false, false, '');

//$pdf->writeHTMLCell(25, 5, 15, '', 'Resultado, Ren/h:' ,0,0, 0, true, 'J', true);
//$pdf->MultiCell(25, 5, 'Resultado', 15, 'C', 1, 0);
//$pdf->writeHTMLCell(33.5, 5, 40, '', $resultado_prom_caudal ,1,0, 0, true, 'C', true);
$pdf->Cell(25,5,'Resultado, Ren/h:',0,0,'L',0,'',0);
$pdf->Cell(35,5,$resultado_prom_caudal,1,0,'C',0,'',0);


//$pdf->writeHTMLCell(25, 5, 78, '', 'Especificado:' ,0,0, 0, true, 'J', true);
//$pdf->writeHTMLCell(33.5, 5, 103, '', $ren_hr ,1,0, 0, true, 'C', true);

$pdf->Cell(25,5,'Especificado:',0,0,'C',0,'',0);
$pdf->Cell(35,5,$ren_hr,1,0,'C',0,'',0);


//$pdf->writeHTMLCell(21, 5, 140, '', 'Cumple:' ,0,0, 0, true, 'J', true);
//$pdf->writeHTMLCell(33.5, 5, 161, '', 'CUMPLE' ,1,1, 0, true, 'C', true);

$pdf->Cell(25,5,'Cumple:',0,0,'C',0,'',0);
$pdf->Cell(35,5,$cumple_aire,1,0,'C',0,'',0);

$pdf->ln(5);

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
      $espaciado = 48;

          //$pdf->writeHTMLCell(40, 5, 15, '', $nombres[0] ,1,0, 0, true, 'J', true);
            $pdf->Cell(33,5,$nombres[0],1,0,'L',0,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', 'VS-'.$array_resultado[$i]['campo_1'],1,0, 0, true, 'C', true); 
           $pdf->Cell(23,5,'VS-'.$array_resultado[$i]['campo_1'],1,0,'C',0,'',0); 
      }
      $pdf->ln(5);
     // $pdf->writeHTMLCell(40, 5, 15, '', $nombres[1] ,1,0, 0, true, 'J', true);
       $pdf->Cell(33,5,$nombres[1],1,0,'L',0,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', 'Bajo la puerta',1,0, 0, true, 'C', true); 
          $pdf->Cell(23,5,'Bajo la puerta',1,0,'C',0,'',0); 
      }
      $pdf->ln(5);
      //$pdf->writeHTMLCell(40, 5, 15, '', $nombres[2] ,1,0, 0, true, 'J', true);
       $pdf->Cell(33,5,$nombres[2],1,0,'L',0,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', $array_resultado[$i]['campo_3'],1,0, 0, true, 'C', true);  
          $pdf->Cell(23,5,$array_resultado[$i]['campo_3'],1,0,'C',0,'',0); 
      }
      $pdf->ln(5);
      //$pdf->writeHTMLCell(40, 5, 15, '', $nombres[3] ,1,0, 0, true, 'J', true);
       $pdf->Cell(33,5,$nombres[3],1,0,'L',0,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', $array_resultado[$i]['campo_4'],1,0, 0, true, 'C', true);  
          $pdf->Cell(23,5,$array_resultado[$i]['campo_4'],1,0,'C',0,'',0);
      }
      $pdf->ln(5);
      //$pdf->writeHTMLCell(40, 5, 15, '', $nombres[4] ,1,0, 0, true, 'J', true);
       $pdf->Cell(33,5,$nombres[4],1,0,'L',0,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
         //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', $array_resultado[$i]['campo_5'],1,0, 0, true, 'C', true); 
         $pdf->Cell(23,5,$array_resultado[$i]['campo_5'],1,0,'C',0,'',0); 
      }
      $pdf->ln(5);
      //$pdf->writeHTMLCell(40, 5, 15, '', $nombres[5] ,1,0, 0, true, 'J', true);
       $pdf->Cell(33,5,$nombres[5],1,0,'L',0,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', $array_resultado[$i]['campo_6'],1,0, 0, true, 'C', true); 
          $pdf->Cell(23,5,$array_resultado[$i]['campo_6'],1,0,'C',0,'',0);  
      }

$pdf->ln(5);


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


$consultar_info_pruebas = mysqli_prepare($connect,"SELECT promedio, categoria
FROM salas_limpias_prueba_4
WHERE id_asignado = ? ");
mysqli_stmt_bind_param($consultar_info_pruebas, 'i', $id_asignado);
mysqli_stmt_execute($consultar_info_pruebas);
mysqli_stmt_store_result($consultar_info_pruebas);
mysqli_stmt_bind_result($consultar_info_pruebas, $promedio ,$categoria);



while ($row = mysqli_stmt_fetch($consultar_info_pruebas)) {
   if ($categoria == 1) {
      
      if ($promedio >= $especificacion_2_temp && $promedio <= $especificacion_1_temp) {
         $estado_temperatura = 'CUMPLE';
      }else{
         $estado_temperatura = 'NO CUMPLE';
      }
      //$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado,°C: ' ,0,0, 0, true, 'C', true);
      //$pdf->writeHTMLCell(30, 5, 45, '', $promedio ,1,0, 0, true, 'C', true);
       $pdf->Cell(30,5,'Resultado,°C: ',1,0,'L',0,'',0); 
       $pdf->Cell(30,5,$promedio,1,0,'C',0,'',0); 

      //$pdf->writeHTMLCell(45, 5, 75, '', 'Especificación Temperatura:' ,1,0, 0, true, 'J', true);
      //$pdf->writeHTMLCell(40, 5, 120, '', 'Entre '.$especificacion_2_temp.'°C y '.$especificacion_1_temp.'°C' ,1,0, 0, true, 'C', true);
       $pdf->Cell(45,5,'Especificación Temperatura:',1,0,'L',0,'',0); 
       $pdf->Cell(40,5,'Entre '.$especificacion_2_temp.'°C y '.$especificacion_1_temp.'°C' ,1,0,'C',0,'',0); 

       //$pdf->writeHTMLCell(35, 5, 160, '', $estado_temperatura ,1,1, 0, true, 'C', true);
       $pdf->Cell(35,5,$estado_temperatura,1,0,'C',0,'',0); 
       $pdf->ln(5);
   }elseif ($categoria == 2) {
      
      if ($promedio >= $especificacion_2_hum AND $promedio <= $especificacion_1_hum) {
         $estado_humedad = 'CUMPLE';
      }else{
         $estado_humedad = 'NO CUMPLE';
      }

      //$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado, HR%: ' ,0,0, 0, true, 'C', true);
      //$pdf->writeHTMLCell(30, 5, 45, '', $promedio ,1,0, 0, true, 'C', true);
       $pdf->Cell(30,5,'Resultado, HR%: ',1,0,'L',0,'',0); 
       $pdf->Cell(30,5,$promedio,1,0,'C',0,'',0); 

      //$pdf->writeHTMLCell(45, 5, 75, '', 'Especificación Humedad:' ,1,0, 0, true, 'J', true);
      //$pdf->writeHTMLCell(40, 5, 120, '', 'entre '.$especificacion_2_hum.'%HR y '.$especificacion_1_hum.'%HR' ,1,0, 0, true, 'C', true);
       $pdf->Cell(45,5,'Especificación Humedad: ',1,0,'L',0,'',0); 
       $pdf->Cell(40,5,'entre '.$especificacion_2_hum.'%HR y '.$especificacion_1_hum.'%HR',1,0,'C',0,'',0); 

      //$pdf->writeHTMLCell(35, 5, 160, '', $estado_humedad ,1,1, 0, true, 'C', true);
       $pdf->Cell(35,5,$estado_humedad,1,0,'C',0,'',0);
       $pdf->ln(5); 
   }
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
        <td class="linea" align="center"><h2>Prueba de Iluminación y Ruid</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$consultar_info_pruebas = mysqli_prepare($connect,"SELECT promedio, categoria
FROM salas_limpias_prueba_4
WHERE id_asignado = ? ");
mysqli_stmt_bind_param($consultar_info_pruebas, 'i', $id_asignado);
mysqli_stmt_execute($consultar_info_pruebas);
mysqli_stmt_store_result($consultar_info_pruebas);
mysqli_stmt_bind_result($consultar_info_pruebas, $promedio ,$categoria);

while ($row = mysqli_stmt_fetch($consultar_info_pruebas)) {
   if ($categoria == 3) {
      if ($promedio >= $lux_item) {
         $estado_lux = 'CUMPLE';
      }else{
         $estado_lux = 'NO CUMPLE';
      }
      //$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado,Lux: ' ,0,0, 0, true, 'C', true);
      //$pdf->writeHTMLCell(30, 5, 45, '', $promedio ,1,0, 0, true, 'C', true);
      $pdf->Cell(30,5,'Resultado,Lux: ',1,0,'L',0,'',0);
      $pdf->Cell(30,5,$promedio,1,0,'C',0,'',0);

      //$pdf->writeHTMLCell(45, 5, 75, '', 'Especificación, Lux:' ,1,0, 0, true, 'J', true);
      //$pdf->writeHTMLCell(40, 5, 120, '', ' > ='.$lux_item ,1,0, 0, true, 'C', true);
      $pdf->Cell(45,5,'Especificación, Lux:',1,0,'L',0,'',0);
      $pdf->Cell(40,5,$lux_item,1,0,'C',0,'',0);

      //$pdf->writeHTMLCell(35, 5, 160, '', $estado_lux ,1,1, 0, true, 'C', true);
      $pdf->Cell(35,5,$lux_item,1,0,'C',0,'',0);
      $pdf->ln(5); 
   }elseif ($categoria == 4) {
      if ($promedio <= $ruido_dba_item) {
         $estado_dba = 'CUMPLE';
      }else{
         $estado_dba = 'NO CUMPLE';
      }
      //$pdf->writeHTMLCell(30, 5, 15, '', 'Resultado, dbA: ' ,0,0, 0, true, 'C', true);
      //$pdf->writeHTMLCell(30, 5, 45, '', $promedio ,1,0, 0, true, 'C', true);
      $pdf->Cell(30,5,'Resultado, dbA:',1,0,'L',0,'',0);
      $pdf->Cell(30,5,$promedio,1,0,'C',0,'',0);

      //$pdf->writeHTMLCell(45, 5, 75, '', 'Especificación, dbA:' ,1,0, 0, true, 'J', true);
      //$pdf->writeHTMLCell(40, 5, 120, '', ' < ='.$ruido_dba_item ,1,0, 0, true, 'C', true);
      $pdf->Cell(45,5,'Especificación, dbA:',1,0,'L',0,'',0);
      $pdf->Cell(40,5,' < ='.$ruido_dba_item,1,0,'C',0,'',0);

      //$pdf->writeHTMLCell(35, 5, 160, '', $estado_dba ,1,1, 0, true, 'C', true);
      $pdf->Cell(35,5,$estado_dba,1,0,'C',0,'',0);
      $pdf->ln(5); 
   }
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
        <td class="linea" align="center"><h2>Conclusión</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(0, 5, 15, '', $conclusion ,0,1, 0, true, 'J', true);

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

$pdf->writeHTMLCell(0, 5, 15, '', 'De acuerdo con la UNE-EN ISO 14644-1 Anexo B, el intervalo de tiempo máximo entre verificaciones es de 12 meses. ' ,0,1, 0, true, 'J', true);


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

$pdf->writeHTMLCell(0,4,25,'','Ing. '.$nombre_responsable.'&nbsp;'. $apellido_responsable,0,1, 0, true, 'C', true);
$pdf->writeHTMLCell(0,4,25,'',$nombre_cargo ,0,1, 0, true, 'C', true);

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
               <td>OMS 45</td>
               <td>$puntos_x_medicion</td>
               <td>1</td>
               <td>28.3</td>
               <td>0.85</td>
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
<table >
   <tr border="0">
        <td class="linea" align="center"><h3>Cálculo de Resultados - Medidos en partículas / m³ - Requisito de Particula 0,5 µm: $particulas05 / 5,0  µm: $particulas50</h3></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

   $pdf->Cell(30,5,'Tamaños (µm)',1,0,'C',1,'',0);
   $pdf->Cell(35,5,'Media de los Promedios',1,0,'C',1,'',0);
   $pdf->Cell(40,5,'Desviación Estandar',1,0,'C',1,'',0);
   $pdf->Cell(40,5,'Maximo',1,0,'C',1,'',0);
   $pdf->Cell(35,5,'Cumple',1,0,'C',1,'',0);
   $pdf->ln(5); 

   $pdf->Cell(30,5,'>=0,5',1,0,'C',0,'',0);
   $pdf->Cell(35,5,$medida_promedio05,1,0,'C',0,'',0);
   $pdf->Cell(40,5,$desviacion_estandar05,1,0,'C',0,'',0);
   $pdf->Cell(40,5,$maximo05,1,0,'C',0,'',0);
   $pdf->Cell(35,5,$estado_particula1,1,0,'C',0,'',0);
   $pdf->ln(5); 

   $pdf->Cell(30,5,'>=5,0',1,0,'C',0,'',0);
   $pdf->Cell(35,5,$medida_promedio50,1,0,'C',0,'',0);
   $pdf->Cell(40,5,$desviacion_estandar50,1,0,'C',0,'',0);
   $pdf->Cell(40,5,$maximo50,1,0,'C',0,'',0);
   $pdf->Cell(35,5,$estado_particula2,1,0,'C',0,'',0);
   $pdf->ln(5);



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
        <td class="linea" align="center"><h3>Cálculo de Resultados Para Informe Técnico N°45 de la OMS - Medidos en Partículas / m³ - Requisito de Partícula 0,5 µm: $particulas05 / 5,0 $particulas50 </h3></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


  $pdf->Cell(63,5,'Tamaños (µm)',1,0,'C',1,'',0);
  $pdf->Cell(63,5,'Promedios',1,0,'C',1,'',0);
  $pdf->Cell(53,5,'Cumple',1,0,'C',1,'',0);
  $pdf->ln(5);

  $pdf->Cell(63,5,'>=0,5',1,0,'C',0,'',0);
  $pdf->Cell(63,5,$medida_promedio05,1,0,'C',0,'',0);
  $pdf->Cell(53,5,$estado_particula1,1,0,'C',0,'',0);
  $pdf->ln(5);

  $pdf->Cell(63,5,'>=5,0',1,0,'C',0,'',0);
  $pdf->Cell(63,5,$medida_promedio50,1,0,'C',0,'',0);
  $pdf->Cell(53,5,$estado_particula2,1,0,'C',0,'',0);
  $pdf->ln(5);

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



 $pdf->Cell(28,5,'Marca',1,0,'C',1,'',0);
 $pdf->Cell(31,5,'Modelo',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'N° Serie',1,0,'C',1,'',0);
 $pdf->Cell(35,5,'Certificado de Calibración',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Última Calibración',1,0,'C',1,'',0);
 $pdf->Cell(26,5,'Trazabilidad',1,0,'C',1,'',0);
 $pdf->ln(5);

$equipo_prueba_1 = "Prueba de conteo de particulas";


$query3 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  
FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c 
WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ? ");

mysqli_stmt_bind_param($query3, 'is', $id_asignado, $equipo_prueba_1);
mysqli_stmt_execute($query3);
mysqli_stmt_store_result($query3);
mysqli_stmt_bind_result($query3, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query3)){

   $pdf->Cell(28,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(31,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n_serie,1,0,'C',0,'',0);
   $pdf->Cell(35,5,$certificado,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$fecha_emision,1,0,'C',0,'',0);
   $pdf->Cell(26,5,'Trazabilidad',1,0,'C',0,'',0);
    $pdf->ln(5);

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

/*$metodo_2 = mysqli_prepare($connect,"SELECT metodo_ensayo, especificacion FROM salas_limpias_metodo_2 WHERE id_asignado = ?");
mysqli_stmt_bind_param($metodo_2, 'i', $id_asignado);
mysqli_stmt_execute($metodo_2);
mysqli_stmt_store_result($metodo_2);
mysqli_stmt_bind_result($metodo_2, $metodo_ensayo, $especificacion);
mysqli_stmt_fetch($metodo_2);*/

//$pdf->writeHTMLCell(30, 5, 15, '', '<strong>Método de ensayo:</strong>' ,0,0, 0, true, 'C', true);
//$pdf->writeHTMLCell(60, 5, 45, '', 'UNE-EN ISO 14.644-3:2006,Punto 4.2.3' ,1,0, 0, true, 'C', true);

$pdf->Cell(30,5,'Método de ensayo:',0,0,'C',0,'',0);
$pdf->Cell(60,5,'UNE-EN ISO 14.644-3:2006,Punto 4.2.3',1,0,'C',0,'',0);

//$pdf->writeHTMLCell(50, 5, 110, '', '<strong>Especificación de la sala:</strong>',0,0, 0, true, 'C', true);
//$pdf->writeHTMLCell(45, 5, 150, '', 'Clase '.$clasificacion_oms.' (OMS) / ISO '.$clasificacion_iso ,1,1  , 0, true, 'C', true);
$pdf->Cell(45,5,'Especificación de la sala:',0,0,'C',0,'',0);
$pdf->Cell(45,5,'Clase '.$clasificacion_oms.' (OMS) / ISO '.$clasificacion_iso,1,0,'C',0,'',0);
$pdf->ln(5);



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
        <td class="linea" align="center"><h2>Imagen de la Medición</h2></td>
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
      $espaciado = 48;

          //$pdf->writeHTMLCell(40, 5, 15, '', $nombres[0] ,1,0, 0, true, 'J', true);
            $pdf->Cell(33,5,$nombres[0],1,0,'L',1,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', 'VS-'.$array_resultado[$i]['campo_1'],1,0, 0, true, 'C', true); 
           $pdf->Cell(23,5,'VS-'.$array_resultado[$i]['campo_1'],1,0,'C',1,'',0); 
      }
      $pdf->ln(5);
     // $pdf->writeHTMLCell(40, 5, 15, '', $nombres[1] ,1,0, 0, true, 'J', true);
       $pdf->Cell(33,5,$nombres[1],1,0,'L',0,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', 'Bajo la puerta',1,0, 0, true, 'C', true); 
          $pdf->Cell(23,5,'Bajo la puerta',1,0,'C',0,'',0); 
      }
      $pdf->ln(5);
      //$pdf->writeHTMLCell(40, 5, 15, '', $nombres[2] ,1,0, 0, true, 'J', true);
       $pdf->Cell(33,5,$nombres[2],1,0,'L',0,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', $array_resultado[$i]['campo_3'],1,0, 0, true, 'C', true);  
          $pdf->Cell(23,5,$array_resultado[$i]['campo_3'],1,0,'C',0,'',0); 
      }
      $pdf->ln(5);
      //$pdf->writeHTMLCell(40, 5, 15, '', $nombres[3] ,1,0, 0, true, 'J', true);
       $pdf->Cell(33,5,$nombres[3],1,0,'L',0,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', $array_resultado[$i]['campo_4'],1,0, 0, true, 'C', true);  
          $pdf->Cell(23,5,$array_resultado[$i]['campo_4'],1,0,'C',0,'',0);
      }
      $pdf->ln(5);
      //$pdf->writeHTMLCell(40, 5, 15, '', $nombres[4] ,1,0, 0, true, 'J', true);
       $pdf->Cell(33,5,$nombres[4],1,0,'L',0,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
         //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', $array_resultado[$i]['campo_5'],1,0, 0, true, 'C', true); 
         $pdf->Cell(23,5,$array_resultado[$i]['campo_5'],1,0,'C',0,'',0); 
      }
      $pdf->ln(5);
      //$pdf->writeHTMLCell(40, 5, 15, '', $nombres[5] ,1,0, 0, true, 'J', true);
       $pdf->Cell(33,5,$nombres[5],1,0,'L',0,'',0);
      for ($i=0; $i < mysqli_stmt_num_rows($query4); $i++) { 
          //$pdf->writeHTMLCell(23, 5, $espaciado+$i*23, '', $array_resultado[$i]['campo_6'],1,0, 0, true, 'C', true); 
          $pdf->Cell(23,5,$array_resultado[$i]['campo_6'],1,0,'C',0,'',0);  
      }

$pdf->ln(5);
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

 $pdf->Cell(28,5,'Marca',1,0,'C',1,'',1);
 $pdf->Cell(31,5,'Modelo',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'N° Serie',1,0,'C',1,'',0);
 $pdf->Cell(35,5,'Certificado de Calibración',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Última Calibración',1,0,'C',1,'',0);
 $pdf->Cell(26,5,'Trazabilidad',1,0,'C',1,'',0);
 $pdf->ln(5);

$equipo_prueba_2 = "Prueba de Presión Diferencial";


$query5 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ? ");
mysqli_stmt_bind_param($query5, 'is', $id_asignado, $equipo_prueba_2);
mysqli_stmt_execute($query5);
mysqli_stmt_store_result($query5);
mysqli_stmt_bind_result($query5, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query5)){

   $pdf->Cell(28,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(31,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n_serie,1,0,'C',0,'',0);
   $pdf->Cell(35,5,$certificado,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$fecha_emision,1,0,'C',0,'',0);
   $pdf->Cell(26,5,'Trazabilidad',1,0,'C',0,'',0);
   $pdf->ln(5);

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
        <td class="linea" align="center"><h2>MEDICIÓN - PRUEBA DE TEMPERATURA Y HUMEDAD</h2></td>
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

//$pdf->writeHTMLCell(30, 5, 15, '', '<strong>Método de ensayo:</strong>' ,0,0, 0, true, 'C', true);
//$pdf->writeHTMLCell(56, 5, 40, '', 'UNE-EN ISO 14.644-3:2006,Punto 4.2.6' ,1,0, 0, true, 'C', true);
//$pdf->writeHTMLCell(25, 5, 105, '', '<strong>N° de muestras:</strong>',0,0, 0, true, 'C', true);
//$pdf->writeHTMLCell(15, 5, 130, '', $n_muestras ,1,0, 0, true, 'C', true);
//$pdf->writeHTMLCell(40, 5, 145, '', '<strong>Altura toma de Muestras:</strong>',0,0, 0, true, 'C', true);
//$pdf->writeHTMLCell(10, 5, 185, '','0.85' ,1,1  , 0, true, 'C', true);

$pdf->Cell(28,5,'Método de ensayo:',0,0,'C',0,'',0);
$pdf->Cell(56,5,'UNE-EN ISO 14.644-3:2006,Punto 4.2.6',1,0,'C',0,'',0);
$pdf->Cell(27,5,'N° de muestras:',0,0,'C',0,'',0);
$pdf->Cell(15,5,$n_muestras,1,0,'C',0,'',0);
$pdf->Cell(40,5,'Altura toma de Muestras:',0,0,'C',0,'',0);
$pdf->Cell(14,5,'0.85',1,0,'C',0,'',0);
$pdf->ln(5);



$buscarimagen3 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_sala_limpia
WHERE id_asignado = ? AND tipo = 3");
mysqli_stmt_bind_param($buscarimagen3, 'i', $id_asignado);
mysqli_stmt_execute($buscarimagen3);
mysqli_stmt_store_result($buscarimagen3);
mysqli_stmt_bind_result($buscarimagen3, $url_imagen3, $nombre_imagen3);
mysqli_stmt_fetch($buscarimagen3);


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
<br><br>
<table border="0">
    <tr>
        <td></td>
        <td>
        <img src="../../$url_imagen3$nombre_imagen3"  style="width: 700px; height: 500px;" ></td>
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



//Validar si cumple o no cu´mple
 if ($promedio >= $especificacion_2_temp && $promedio <= $especificacion_1_temp) {
      $cumple_temp = 'CUMPLE';
   }else{
      $cumple_temp = 'NO CUMPLE';
   }

$pdf->Cell(30,5,'Muestras',1,0,'C',1,'',0);
$pdf->Cell(30,5,'N°1',1,0,'C',1,'',0);
$pdf->Cell(30,5,'N°2',1,0,'C',1,'',0);
$pdf->Cell(30,5,'N°3',1,0,'C',1,'',0);
$pdf->Cell(30,5,'N°4',1,0,'C',1,'',0);
$pdf->Cell(30,5,'N°5',1,0,'C',1,'',0);
$pdf->ln(5);

$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 1");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio, $cumple, $categoria);


while($row = mysqli_stmt_fetch($query6)){

   $pdf->Cell(30,5,'Resultado, °C',1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n1,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n2,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n3,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n4,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n5,1,0,'C',0,'',0);
   $pdf->ln(10);

   $pdf->Cell(30,5,'Promedio, °C:',0,0,'C',0,'',0);
   $pdf->Cell(20,5,$promedio,1,0,'C',0,'',0);

   $pdf->Cell(40,5,'Especificación Cliente ,°C:',0,0,'C',0,'',0);
   $pdf->Cell(30,5,'Entre '.$especificacion_2_temp.' Y '.$especificacion_1_temp,1,0,'C',0,'',0);

   $pdf->Cell(30,5,'Cumple:',0,0,'C',0,'',0);
   $pdf->Cell(30,5,$cumple_temp,1,0,'C',0,'',0);
   $pdf->ln(5);


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


if ($promedio >= $especificacion_2_hum && $promedio <= $especificacion_1_hum) {
      $cumple_hr = 'CUMPLE';
   }else{
      $cumple_hr = 'NO CUMPLE';
   }

   $pdf->Cell(30, 5, 'Muestras:', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°1', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°2', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°3', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°4', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°5', 1, 0, 'C', 1, '', 0);
   $pdf->writeHTMLCell(20, 5, 15, '', '' ,0,1, 0, true, 'J', true);



$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 2");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio, $cumple, $categoria);

while($row = mysqli_stmt_fetch($query6)){

  // $pdf->writeHTMLCell(28, 5, 15, '', 'Resultado, HR%' ,1,0, 0, true, 'J', true);


   $pdf->Cell(30, 5, 'Resultado, HR%', 1, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $n1, 1, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $n2, 1, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $n3, 1, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $n4, 1, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $n5, 1, 0, 'C', 0, '', 0);

   $pdf->ln(10);

   $pdf->Cell(30,5,'Promedio, HR%:',0,0,'C',0,'',0);
   $pdf->Cell(20,5,$promedio,1,0,'C',0,'',0);

   $pdf->Cell(40,5,'Especificación Cliente ,HR%',0,0,'C',0,'',0);
   $pdf->Cell(30,5,'Entre '.$especificacion_2_hum.' Y '.$especificacion_1_hum,1,0,'C',0,'',0);

   $pdf->Cell(30, 5, 'Cumple:', 0, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $cumple_hr, 1, 1, 'C', 0, '', 0);

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


$pdf->Cell(28,5,'Marca',1,0,'C',1,'',0);
 $pdf->Cell(31,5,'Modelo',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'N° Serie',1,0,'C',1,'',0);
 $pdf->Cell(35,5,'Certificado de Calibración',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Última Calibración',1,0,'C',1,'',0);
 $pdf->Cell(26,5,'Trazabilidad',1,0,'C',1,'',0);
 $pdf->ln(5);




$equipo_prueba_4 = "Prueba de temperatura y humedad relativa";


$query7 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ? ");
mysqli_stmt_bind_param($query7, 'is', $id_asignado, $equipo_prueba_4);
mysqli_stmt_execute($query7);
mysqli_stmt_store_result($query7);
mysqli_stmt_bind_result($query7, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query7)){

   /*$pdf->writeHTMLCell(30, 7.2, 15, '', $marca ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 45, '', $modelo ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 75, '', $n_serie ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 105, '', $certificado ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 135, '', $fecha_emision ,1,0, 0, true, 'C', true);
   $pdf->writeHTMLCell(30, 7.2, 165, '', 'Trazabilidad' ,1,1, 0, true, 'C', true);*/


   $pdf->Cell(28,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(31,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n_serie,1,0,'C',0,'',0);
   $pdf->Cell(35,5,$certificado,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$fecha_emision,1,0,'C',0,'',0);
   $pdf->Cell(26,5,'Trazabilidad',1,0,'C',0,'',0);
   $pdf->ln(5);

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
        <td class="linea" align="center"><h2>MEDICIÓN DE ILUMINACIÓN Y RUIDO</h2></td>
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


$pdf->Cell(28,5,'Método de ensayo:',0,0,'C',0,'',0);
$pdf->Cell(56,5,'DS N° 594/1999 MINSAL ',1,0,'C',0,'',0);
$pdf->Cell(27,5,'N° de muestras:',0,0,'C',0,'',0);
$pdf->Cell(15,5,'5',1,0,'C',0,'',0);
$pdf->Cell(40,5,'Altura toma de Muestras:',0,0,'C',0,'',0);
$pdf->Cell(14,5,'0.85',1,0,'C',0,'',0);
$pdf->ln(5);





$buscarimagen4 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_sala_limpia
WHERE id_asignado = ? AND tipo = 4");
mysqli_stmt_bind_param($buscarimagen4, 'i', $id_asignado);
mysqli_stmt_execute($buscarimagen4);
mysqli_stmt_store_result($buscarimagen4);
mysqli_stmt_bind_result($buscarimagen4, $url_imagen4, $nombre_imagen4);
mysqli_stmt_fetch($buscarimagen4);


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
<br><br>
<table border="0">
    <tr>
        <td></td>
        <td>
        <img src="../../$url_imagen4$nombre_imagen4"  style="width: 700px; height: 500px;" ></td>
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
        <td class="linea" align="center"><h2>Prueba de Medición de Iluminancia, Lux</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

   $pdf->Cell(30, 5, 'Muestras:', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°1', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°2', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°3', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°4', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°5', 1, 0, 'C', 1, '', 0);
   $pdf->ln(5);


$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 3");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio_lux, $cumple, $categoria);

if ($promedio_lux >= $lux_item) {
   $cumple_lux = 'CUMPLE';
}else{
   $cumple_lux = 'NO CUMPLE';
}

while($row = mysqli_stmt_fetch($query6)){


   $pdf->Cell(30,5,'Resultado, Lux',1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n1,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n2,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n3,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n4,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n5,1,0,'C',0,'',0);
   $pdf->ln(10);

   $pdf->Cell(30,5,'Promedio, Lux:',0,0,'C',0,'',0);
   $pdf->Cell(20,5,$promedio_lux,1,0,'C',0,'',0);

   $pdf->Cell(40,5,'Especificación Cliente, Lux',0,0,'C',0,'',0);
   $pdf->Cell(30,5,'>=  '.$lux_item,1,0,'C',0,'',0);

   $pdf->Cell(30, 5, 'Cumple:', 0, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $cumple_lux, 1, 1, 'C', 0, '', 0);


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


   $pdf->Cell(30, 5, 'Muestras:', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°1', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°2', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°3', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°4', 1, 0, 'C', 1, '', 0);
   $pdf->Cell(30, 5, 'N°5', 1, 0, 'C', 1, '', 0);
   $pdf->ln(5);

$query6 = mysqli_prepare($connect,"SELECT n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ? AND categoria = 4");
mysqli_stmt_bind_param($query6, 'i', $id_asignado);
mysqli_stmt_execute($query6);
mysqli_stmt_store_result($query6);
mysqli_stmt_bind_result($query6, $n1, $n2, $n3, $n4, $n5, $promedio_dba, $cumple, $categoria);

if ($promedio_dba <= $ruido_dba_item) {
   $cumple_dba = 'CUMPLE';
}else{
   $cumple_dba = 'NO CUMPLE';
}

while($row = mysqli_stmt_fetch($query6)){


   $pdf->Cell(30, 5, 'Resultado, dBA', 1, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $n1, 1, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $n2, 1, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $n3, 1, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $n4, 1, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $n5, 1, 0, 'C', 0, '', 0);
   $pdf->ln(10);

   $pdf->Cell(30,5,'Promedio, dBA:',0,0,'C',0,'',0);
   $pdf->Cell(20,5,$promedio_dba,1,0,'C',0,'',0);

   $pdf->Cell(40,5,'Especificación Cliente, Lux',0,0,'C',0,'',0);
   $pdf->Cell(30,5,'>=  '.$ruido_dba_item,1,0,'C',0,'',0);

   $pdf->Cell(30, 5, 'Cumple:', 0, 0, 'C', 0, '', 0);
   $pdf->Cell(30, 5, $cumple_dba, 1, 1, 'C', 0, '', 0);



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

   $pdf->Cell(28,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(31,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(30,5,'N° Serie',1,0,'C',1,'',0);
   $pdf->Cell(35,5,'Certificado de Calibración',1,0,'C',1,'',0);
   $pdf->Cell(30,5,'Última Calibración',1,0,'C',1,'',0);
   $pdf->Cell(26,5,'Trazabilidad',1,0,'C',1,'',0);
    $pdf->ln(5);

$equipo_prueba_5 = "Prueba Medición de ruido";
$equipo_prueba_6 = "Prueba nivel de iluminación";


$query_71 = mysqli_prepare($connect,"SELECT distinct a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision FROM equipos_cercal as a, certificado_equipo as b, equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_asignado = ? AND a.id_equipo_cercal = c.id_equipo and C.tipo_prueba in( ?, ?)");
mysqli_stmt_bind_param($query_71, 'iss', $id_asignado, $equipo_prueba_5, $equipo_prueba_6);
mysqli_stmt_execute($query_71);
mysqli_stmt_store_result($query_71);
mysqli_stmt_bind_result($query_71, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query_71)){

   $pdf->Cell(28,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(31,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$n_serie,1,0,'C',0,'',0);
   $pdf->Cell(35,5,$certificado,1,0,'C',0,'',0);
   $pdf->Cell(30,5,$fecha_emision,1,0,'C',0,'',0);
   $pdf->Cell(26,5,'Trazabilidad',1,0,'C',0,'',0);
    $pdf->ln(5);
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
        <td class="linea" align="center"><h2>MEDICIÓN DE CAUDAL DE AIRE, CÁLCULO DE RENOVACIÓN AIRE/HORA</h2></td>
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

$pdf->Cell(28,5,'Método de ensayo:',0,0,'C',0,'',0);
$pdf->Cell(54,5,'UNE-EN ISO 14.644-3:2006,Punto 4.2.2',1,0,'C',0,'',0);
$pdf->Cell(37,5,'N° de Rejillas de Inyección:',0,0,'C',0,'',0);
$pdf->Cell(15,5,$n_rejillas,1,0,'C',0,'',0);
$pdf->Cell(32,5,'N° de Extractores:',0,0,'C',0,'',0);
$pdf->Cell(14,5,$cantidad_extracciones,1,0,'C',0,'',0);
$pdf->ln(5);


$buscarimagen5 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_sala_limpia
WHERE id_asignado = ? AND tipo = 5");
mysqli_stmt_bind_param($buscarimagen5, 'i', $id_asignado);
mysqli_stmt_execute($buscarimagen5);
mysqli_stmt_store_result($buscarimagen5);
mysqli_stmt_bind_result($buscarimagen5, $url_imagen5, $nombre_imagen5);
mysqli_stmt_fetch($buscarimagen5);

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
<br><br>
<table border="0">
    <tr>
        <td></td>
        <td>
        <img src="../../$url_imagen5$nombre_imagen5"  style="width: 700px; height: 500px;" ></td>
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
        <td class="linea" align="center"><h2>Resultado - Prueba de Medición de Caudal de Inyección de Aire, m³/h</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->Cell(20,5,'Inyección (m³/h)',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°1',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°2',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°3',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°4',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°5',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°6',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°7',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°8',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°9',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°10',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°11',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°12',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°13',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°14',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°15',1,0,'C',1,'',0);
$pdf->ln(5);


$nombres_p5 = array('N°1','N°2','N°3','Promedio');
$contador = 0;


$query8 = mysqli_prepare($connect,"SELECT replace(n1,0,''),replace(n2,0,''),replace(n3,0,''), replace(n4,0,''),replace(n5,0,''),replace(n6,0,''),replace(n7,0,''),replace(n8,0,''),replace(n9,0,''),replace(n10,0,''),replace(n11,0,''),replace(n12,0,''),replace(n13,0,''),replace(n14,0,''),replace(n15,0,'') FROM salas_limpias_prueba_5 WHERE id_asignado = ? AND categoria = 1");
mysqli_stmt_bind_param($query8, 'i', $id_asignado);
mysqli_stmt_execute($query8);
mysqli_stmt_store_result($query8);
mysqli_stmt_bind_result($query8, $n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12,$n13,$n14,$n15);


$promedio_extraccion = "";


while($row = mysqli_stmt_fetch($query8)){

   if ($n1 == 0) {
      $color = 1;
   }else{
      $color = 0;
   }

    if ($contador == 3) {
      $promedio_caudal = $n1+$n2+$n3+$n4+$n5+$n6+$n7+$n8+$n9+$n10+$n11+$n12+$n13+$n14+$n15;
      
   }

   $pdf->Cell(20,5,$nombres_p5[$contador],1,0,'C',0,'',0);
   $pdf->Cell(10.66,5,$n1,1,0,'C',$color,'',0);
   $pdf->Cell(10.66,5,$n2,1,0,'C',$color,'',0);
   $pdf->Cell(10.66,5,$n3,1,0,'C',$color,'',0);
   $pdf->Cell(10.66,5,$n4,1,0,'C',$color,'',0);
   $pdf->Cell(10.66,5,$n5,1,0,'C',$color,'',0);
   $pdf->Cell(10.66,5,$n6,1,0,'C',$color,'',0);
   $pdf->Cell(10.66,5,$n7,1,0,'C',$color,'',0);
   $pdf->Cell(10.66,5,$n8,1,0,'C',0,'',0);
   $pdf->Cell(10.66,5,$n9,1,0,'C',0,'',0);
   $pdf->Cell(10.66,5,$n10,1,0,'C',0,'',0);
   $pdf->Cell(10.66,5,$n11,1,0,'C',0,'',0);
   $pdf->Cell(10.66,5,$n12,1,0,'C',0,'',0);
   $pdf->Cell(10.66,5,$n13,1,0,'C',0,'',0);
   $pdf->Cell(10.66,5,$n14,1,0,'C',0,'',0);
   $pdf->Cell(10.66,5,$n15,1,0,'C',0,'',0);

   $pdf->ln(5);

   $contador++;

  
}

$resultado_prom_caudal = round(($promedio_caudal / $volumen_m3),2);


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
        <td class="linea" align="center"><h2>Resultado - Prueba de Medición de Caudal de Extracción de Aire, m³/h</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false,'');


$pdf->Cell(20,5,'Extracción (m³/h)',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°1',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°2',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°3',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°4',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°5',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°6',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°7',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°8',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°9',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°10',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°11',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°12',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°13',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°14',1,0,'C',1,'',0);
$pdf->Cell(10.66,5,'N°15',1,0,'C',1,'',0);
$pdf->ln(5);


$nombres_p5 = array('N°1','N°2','N°3','Promedio');
$contador = 0;


$query8 = mysqli_prepare($connect,"SELECT replace(n1,0,''),replace(n2,0,''),replace(n3,0,''), replace(n4,0,''),replace(n5,0,''),replace(n6,0,''),replace(n7,0,''),replace(n8,0,''),replace(n9,0,''),replace(n10,0,''),replace(n11,0,''),replace(n12,0,''),replace(n13,0,''),replace(n14,0,''),replace(n15,0,'') FROM salas_limpias_prueba_5 WHERE id_asignado = ? AND categoria = 2");
mysqli_stmt_bind_param($query8, 'i', $id_asignado);
mysqli_stmt_execute($query8);
mysqli_stmt_store_result($query8);
mysqli_stmt_bind_result($query8, $n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12,$n13,$n14,$n15);

while($row = mysqli_stmt_fetch($query8)){

               $pdf->Cell(20,5,$nombres_p5[$contador],1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n1,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n2,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n3,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n4,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n5,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n6,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n7,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n8,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n9,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n10,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n11,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n12,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n13,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n14,1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n15,1,0,'C',0,'',0);
                 $pdf->ln(5);
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
        <td class="linea" align="center"><h2>Resultado Final - Cálculo de Renovación de Aire/Hora</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false,'');

   $pdf->Cell(50.66,5,'Promedio de Caudal Total Inyectado (m³/h)',1,0,'C',1,'',0);
   $pdf->Cell(50.66,5,'Renovaciones Aire/Hora Obtenidas',1,0,'C',1,'',0);
   $pdf->Cell(47.66,5,'Renovaciones Aire/Hora Especificadas',1,0,'C',1,'',0);
   $pdf->Cell(30.66,5,'Cumple',1,0,'C',1,'',0);
   $pdf->ln(5);

$query9 = mysqli_prepare($connect,"SELECT medicion_1, medicion_2, medicion_3, medicion_4 FROM salas_limpias_prueba_6 WHERE id_asignado = ?");
mysqli_stmt_bind_param($query9, 'i', $id_asignado);
mysqli_stmt_execute($query9);
mysqli_stmt_store_result($query9);
mysqli_stmt_bind_result($query9, $medicion_uno, $medicion_dos, $medicion_tres, $medicion_cuatro);
echo mysqli_stmt_error($query9); 

if ($resultado_prom_caudal > $ren_hr) {
   $estado_caudal = 'CUMPLE';
}else{
   $estado_caudal = 'NO CUMPLE';
}

while($row = mysqli_stmt_fetch($query9)){

   $pdf->Cell(50.66,5,$promedio_caudal,1,0,'C',0,'',0);
   $pdf->Cell(50.66,5,$resultado_prom_caudal,1,0,'C',0,'',0);
   $pdf->Cell(47.66,5,$ren_hr,1,0,'C',0,'',0);
   $pdf->Cell(30.66,5,$estado_caudal,1,0,'C',0,'',0);
   $pdf->ln(5);

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

 $pdf->Cell(28,5,'Marca',1,0,'C',1,'',0);
 $pdf->Cell(31,5,'Modelo',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'N° Serie',1,0,'C',1,'',0);
 $pdf->Cell(35,5,'Certificado de Calibración',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Última Calibración',1,0,'C',1,'',0);
 $pdf->Cell(26,5,'Trazabilidad',1,0,'C',1,'',0);
 $pdf->ln(5);

$equipo_prueba_7 = "Prueba de medición de caudal";

$query72 = mysqli_prepare($connect,"SELECT a.marca_equipo, a.modelo_equipo, a.n_serie_equipo, b.numero_certificado, b.fecha_emision  FROM equipos_cercal as a,  certificado_equipo as b,  equipos_mediciones as c WHERE a.id_equipo_cercal = b.id_equipo_cercal AND c.id_equipo = a.id_equipo_cercal AND c.id_asignado = ? AND c.tipo_prueba = ?");
mysqli_stmt_bind_param($query72, 'is', $id_asignado, $equipo_prueba_7);
mysqli_stmt_execute($query72);
mysqli_stmt_store_result($query72);
mysqli_stmt_bind_result($query72, $marca, $modelo, $n_serie, $certificado, $fecha_emision);

while($row = mysqli_stmt_fetch($query72)){

       $pdf->Cell(28,5,$marca,1,0,'C',0,'',0);
       $pdf->Cell(31,5,$modelo,1,0,'C',0,'',0);
       $pdf->Cell(30,5,$n_serie,1,0,'C',0,'',0);
       $pdf->Cell(35,5,$certificado,1,0,'C',0,'',0);
       $pdf->Cell(30,5,$fecha_emision,1,0,'C',0,'',0);
       $pdf->Cell(26,5,'Trazabilidad',1,0,'C',0,'',0);
       $pdf->ln(5);

}

$pdf->Output($nombre_informe, 'I');
?>


