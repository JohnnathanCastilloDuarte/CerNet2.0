<?php 
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');



    $hola .= $bMargin = $pdf->getBreakMargin();
    $hola .= $auto_page_break = $pdf->getAutoPageBreak();
    $hola .= $pdf->SetAutoPageBreak(false, 0);
    $hola .= $img_file = '../../../../recursos/image_demo.jpg';
    $hola .= $pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
    $hola .= $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
    $hola .= $pdf->setPageMark();



$clave = $_GET['clave'];

$id_asignado = substr($clave, 97);


/////// CONSULTA TRAE INFORMACIÓN DEL EQUIPO
$consulta_informacion_informe = mysqli_prepare($connect,"SELECT a.nombre, b.area_interna, b.codigo, 
   b.area_m2, b.volumen_m3, b.estado_sala, b.direccion, b.especificacion_1_temp, 
   b.especificacion_1_hum, b.ruido_dba, b.lux, b.clasificacion_oms, b.clasificacion_iso, b.ren_hr, b.especificacion_2_temp, b.especificacion_2_hum, b.cantidad_extracciones, b.cantidad_inyecciones, b.presion_sala
   FROM item as a, item_sala_limpia as b, item_asignado as c 
   WHERE c.id_asignado = ? AND c.id_item = a.id_item AND b.id_item = c.id_item");
mysqli_stmt_bind_param($consulta_informacion_informe, 'i', $id_asignado);
mysqli_stmt_execute($consulta_informacion_informe);
mysqli_stmt_store_result($consulta_informacion_informe);
mysqli_stmt_bind_result($consulta_informacion_informe, $nombre_sala, $area_sala, $codigo_sala, 
   $area_m2, $volumen_m3, $estado_sala, $direccion_item, $especificacion_1_temp, 
   $especificacion_1_hum, $ruido_dba_item, $lux_item,$clasificacion_oms, $clasificacion_iso, $ren_hr, $especificacion_2_temp, $especificacion_2_hum, $cantidad_extracciones, $numero_rejillas, $presion_sala);
mysqli_stmt_fetch($consulta_informacion_informe);




/// CONSULTA TRAE INFORMACIÓN DE LA EMPRESA

$consulta_empresa = mysqli_prepare($connect,"SELECT e.nombre_informe, c.numot, DATE_FORMAT(e.fecha_registro, '%m/%d/%Y'), d.nombre, e.solicita, d.direccion, e.conclusion, e.usuario_responsable,e.fecha_medicion FROM item_asignado as a, servicio as b, numot as c, empresa as d, salas_limpias_informe as e WHERE a.id_asignado = ? AND a.id_servicio = b.id_servicio AND b.id_numot = c.id_numot AND c.id_empresa = d.id_empresa AND a.id_asignado = e.id_asignado");
mysqli_stmt_bind_param($consulta_empresa, 'i', $id_asignado);
mysqli_stmt_execute($consulta_empresa);
mysqli_stmt_store_result($consulta_empresa);
mysqli_stmt_bind_result($consulta_empresa, $nombre_informe, $numot, $fecha_registro, $empresa, $solicita, $direccion, $conclusion, $usuario_responsable, $fecha_medicion);
mysqli_stmt_fetch($consulta_empresa);

$num_ot = substr($numot, 2);

if ($conclusion == 'Informe') {
   
   $muestra_conclusion = 'De acuerdo a los resultados obtenidos a las muestras inspeccionadas, la sala indicada en la ubicación del encabezado, 
CUMPLE con los parámetros establecidos en la normativa vigente.';

}
elseif($conclusion == 'Pre-Informe'){
  $muestra_conclusion = 'Los resultados obtenidos en el presente informe, 
se aplican solo a los elementos ensayados y corresponde a las condiciones encontradas al momento de la inspección';
}

$tipo_info = $conclusion;


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
   $clasifica = "Clase A (OMS) /";
}elseif($clasificacion_iso == 6) {
   $particulas05 = 35200;
   $particulas50 = 293;
   $clasifica = "Clase B (OMS) /";
}elseif ($clasificacion_iso == 7) {
   $particulas05 = 352000;
   $particulas50 = 2930;
   $clasifica = "Clase C (OMS) /";
}elseif ($clasificacion_iso == 8) {
   $particulas05 = 3520000;
   $particulas50 = 29300;
   $clasifica = "Clase D (OMS) /";
}elseif ($clasificacion_iso == 9) {
   $particulas05 = 35200000;
   $particulas50 = 293000;
   $clasifica = "";
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

     $pdf->Cell(30,5,'Dirección:',0,0,'L',0,'',0);
     $pdf->Cell(150,5,$direccion_item,1,0,'L',0,'',0);

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

//conclusión 
if ($conclusion == 'Informe') {
  $conclu = 'para informes con cumplimiento: De acuerdo a los resultados obtenidos a las muestras inspeccionadas, la sala indicada en la ubicación del encabezado, 
CUMPLE con los parámetros establecidos en la normativa vigente.';
}elseif($conclusion == 'Pre-Informe'){
  $conclu = 'Los resultados obtenidos en el presente informe, 
se aplican solo a los elementos ensayados y corresponde a las condiciones encontradas al momento de la inspección';
}


if ($clasificacion_oms == 'No Aplica') {

  //$clasificacion_oms = ' D';

  $pdf->Cell(31,5,'Norma de Referencia:',0,0,'L',0,'',0);
  $pdf->Cell(25,5,'',0,0,'J',0,'',0);
  $pdf->Cell(68,5,'ISO 14644-1:2015 (Promedio)',1,0,'C',0,'',0);

  $pdf->ln(5);

  $pdf->Cell(34,5,'Tamaño de Partículas:',0,0,'L',0,'',0);
  $pdf->Cell(22,5,'',0,0,'J',0,'',0);
  $pdf->Cell(34,5,'Partículas >= 0,5 µm',1,0,'C',0,'',0);
  $pdf->Cell(34,5,'Partículas >= 5,0 µm',1,0,'C',0,'',0);

  $pdf->ln(5);

  $pdf->Cell(34,5,'Resultado:',0,0,'L',0,'',0);
  $pdf->Cell(22,5,'',0,0,'J',0,'',0);
  $pdf->Cell(34,5,$medida_promedio05,1,0,'C',0,'',0);
  $pdf->Cell(34,5,$medida_promedio50,1,0,'C',0,'',0);

  $pdf->ln(5);

  $pdf->Cell(31,5,'Requisito:',0,0,'L',0,'',0);
  $pdf->Cell(25,5,'',0,0,'J',0,'',0);
  $pdf->Cell(68,5,$clasifica.'ISO '.$clasificacion_iso.' -> 0,5 µm: '.$particulas05.' / 5,0 µm: '.$particulas50,1,0,'C',0,'',0);

    if ($medida_promedio05 <= $particulas05) {
      $veredicto_1 = 'CUMPLE';
    }else{
      $veredicto_1 = 'NO CUMPLE';
    }

    if ($medida_promedio50 <= $particulas50) {
      $veredicto_2 = 'CUMPLE';
    }else{
      $veredicto_2 = 'NO CUMPLE';
    }

  $pdf->ln(5);
  $pdf->Cell(34,5,'veredicto',0,0,'L',0,'',0); 
  $pdf->Cell(22,5,'',0,0,'J',0,'',0);
  $pdf->Cell(34,5,$veredicto_1,1,0,'C',0,'',0);
  $pdf->Cell(34,5,$veredicto_2,1,0,'C',0,'',0);
 
}elseif ($clasificacion_iso == 'No Aplica') {
  
}else{
    $pdf->Cell(31,5,'Norma de Referencia:',0,0,'L',0,'',0);
    $pdf->Cell(14,5,'',0,0,'J',0,'',0);
    $pdf->Cell(68,5,'ISO 14644-1:2015 (Promedio)',1,0,'C',0,'',0);
    $pdf->Cell(67,5,'OMS 45 (Promedio)',1,0,'C',0,'',0);

    $pdf->ln(5);


    $pdf->Cell(34,5,'Tamaño de Partículas:',0,0,'L',0,'',0);
    $pdf->Cell(11,5,'',0,0,'J',0,'',0);
    $pdf->Cell(34,5,'Partículas >= 0,5 µm',1,0,'C',0,'',0);
    $pdf->Cell(34,5,'Partículas >= 5,0 µm',1,0,'C',0,'',0);
    $pdf->Cell(34,5,'Partículas >= 0,5 µm',1,0,'C',0,'',0);
    $pdf->Cell(33,5,'Partículas >= 5,0 µm',1,0,'C',0,'',0);

    $pdf->ln(5);



    $pdf->Cell(34,5,'Resultado:',0,0,'L',0,'',0);
    $pdf->Cell(11,5,'',0,0,'J',0,'',0);
    $pdf->Cell(34,5,$medida_promedio05,1,0,'C',0,'',0);
    $pdf->Cell(34,5,$medida_promedio50,1,0,'C',0,'',0);
    $pdf->Cell(34,5,$resultadooms,1,0,'C',0,'',0);
    $pdf->Cell(33,5,$medida_promedio50,1,0,'C',0,'',0);

    $pdf->ln(5);



    $pdf->Cell(31,5,'Requisito:',0,0,'L',0,'',0);
    $pdf->Cell(14,5,'',0,0,'J',0,'',0);
    $pdf->Cell(68,5,'Clase '.$clasificacion_oms.' (OMS) / ISO '.$clasificacion_iso.' -> 0,5 µm: '.$particulas05.' / 5,0 µm: '.$particulas50,1,0,'C',0,'',0);
    $pdf->Cell(67,5,'Clase '.$clasificacion_oms.' (OMS) / ISO '.$clasificacion_iso.' -> 0,5 µm: '.$particulas05.' / 5,0 µm: '.$particulas50,1,0,'C',0,'',0);

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
/*$nombres = array('Lugar de Medición', 'Medición Realizada en', 'Resultado (Pa)', 'Presión especificada (Pa)', 'Tipo de Presión', 'Cumple Especificación');
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

$pdf->ln(5);*/

$contadorcito = 1;
 $pdf->Cell(30,5,'Lugar Medición',1,0,'C',1,'',1);
 $pdf->Cell(30,5,'Medición realizada en',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Resultado (Pa)',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Presión especificada (Pa)',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Tipo presión',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Cumple especificación',1,1,'C',1,'',0);

  $query_extrae_prueba = mysqli_prepare($connect,"SELECT A.dato FROM salas_limpias_datos_de_prueba_3 as A, 
  salas_limpias_prueba_3 as B WHERE A.id_prueba_3 = B.id_prueba AND B.id_asignado = ?");
  mysqli_stmt_bind_param($query_extrae_prueba, 'i', $id_asignado);
  mysqli_stmt_execute($query_extrae_prueba);
  mysqli_stmt_store_result($query_extrae_prueba);
  mysqli_stmt_bind_result($query_extrae_prueba, $dato);



  for($i = 0; $i < mysqli_stmt_num_rows($query_extrae_prueba); $i++){
      mysqli_stmt_fetch($query_extrae_prueba);
    
        
      if($contadorcito == 1){
        $pdf->Cell(30,5,'V/S '.$dato,1,0,'C',0,'',0);
      }else if($contadorcito == 2){
        $pdf->Cell(30,5,$dato,1,0,'C',0,'',0);
     
      }else if($contadorcito == 3){
         $pdf->Cell(30,5,$dato,1,0,'C',0,'',0);
           if($dato < $presion_sala){
          $cumple_presion = "NO CUMPLE";
        }else{
          $cumple_presion = "CUMPLE";
        } 
        $pdf->Cell(30,5,$presion_sala,1,0,'C',0,'',0);
        
      }else{
           $pdf->Cell(30,5,$dato,1,0,'C',0,'',0);
        $pdf->Cell(30,5,$cumple_presion,1,0,'C',0,'',0);
         $contadorcito = 0;
        $pdf->ln(5);
      }
        /*
    else if($contadorcito == 2){
        
      }else if($contadorcito == 3){
      
        if($dato < $presion_sala){
          $cumple_presion = "NO CUMPLE";
        }else{
          $cumple_presion = "CUMPLE";
        } 
        $pdf->Cell(30,5,$presion_sala,1,0,'C',0,'',0);
      }else if($contadorcito == 4){
          $pdf->Cell(30,5,$dato,1,0,'C',0,'',0);
      }else if($contadorcito == 5){
        $pdf->Cell(30,5,$dato,1,0,'C',0,'',0);
      }*/
      
      $contadorcito++;
  }
  
/*
 $pdf->Cell(31,5,'Medición realizada en',1,0,'C',1,'',0);

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
        <td class="linea" align="center"><h2>Prueba de Iluminación y Ruido</h2></td>
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
      $pdf->Cell(30,5,'Resultado,Lux: ',1,0,'L',0,'',0);
      $pdf->Cell(30,5,$promedio,1,0,'C',0,'',0);

      $pdf->Cell(45,5,'Especificación, Lux:',1,0,'L',0,'',0);
      $pdf->Cell(40,5,' > = '.$lux_item,1,0,'C',0,'',0);

      $pdf->Cell(35,5,$estado_lux,1,0,'C',0,'',0);
      $pdf->ln(5); 
   }elseif ($categoria == 4) {
      if ($promedio <= $ruido_dba_item) {
         $estado_dba = 'CUMPLE';
      }else{
         $estado_dba = 'NO CUMPLE';
      }

      $pdf->Cell(30,5,'Resultado, dbA:',1,0,'L',0,'',0);
      $pdf->Cell(30,5,''.$promedio,1,0,'C',0,'',0);

      $pdf->Cell(45,5,'Especificación, dbA:',1,0,'L',0,'',0);
      $pdf->Cell(40,5,' < = '.$ruido_dba_item,1,0,'C',0,'',0);

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

$pdf->writeHTMLCell(0, 10, 15, '', $conclu,0,1, 0, true, 'J', true);

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
  
        <td class="linea" align="center"><h2>Fecha Medición</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->Cell(90,5,'Ing. '.$nombre_responsable.' '. $apellido_responsable,0,0,'C',0,'',0);
$pdf->Cell(90,5,$fecha_medicion,0,0,'C',0,'',0);
$pdf->ln(3);
$pdf->Cell(90,5,$nombre_cargo,0,0,'C',0,'',0);


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
        <td class="linea" align="center"><h2>MEDICIÓN DE PARTICULAS EN SUSPENCIÓN</h2></td>
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

     $pdf->ln(7);


$metodo_1 = mysqli_prepare($connect,"SELECT metodo_ensayo, puntos_x_medicion, muestra_x_punto, volumen_muestra, altura_muestra FROM salas_limpias_metodo_1 WHERE id_asignado = ?");
mysqli_stmt_bind_param($metodo_1, 'i', $id_asignado);
mysqli_stmt_execute($metodo_1);
mysqli_stmt_store_result($metodo_1);
mysqli_stmt_bind_result($metodo_1, $metodo_ensayo, $puntos_x_medicion, $muestra_x_punto, $volumen_muestra, $altura_muestra);
mysqli_stmt_fetch($metodo_1);


$pdf->Cell(36,5,'Método de Ensayo',1,0,'C',1,'',0);
$pdf->Cell(36,5,'N° Puntos por Medición',1,0,'C',1,'',0);
$pdf->Cell(36,5,'N° Muestras por Punto',1,0,'C',1,'',0);
$pdf->Cell(36,5,'Volumen por Muestras (L)',1,0,'C',1,'',0);
$pdf->Cell(36,5,'Altura toma de Muestras (m)',1,0,'C',1,'',0);
$pdf->ln(5);
$pdf->Cell(36,5,'OMS',1,0,'C',0,'',0);
$pdf->Cell(36,5,$puntos_x_medicion,1,0,'C',0,'',0);
$pdf->Cell(36,5,$muestra_x_punto,1,0,'C',0,'',0);
$pdf->Cell(36,5,'28.3',1,0,'C',0,'',0);
$pdf->Cell(36,5,'0.85',1,0,'C',0,'',0);
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
   <tr border="0">
        <td class="linea" align="center"><h2>Imagen de la Medición y Registro de Conteo de Partículas</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');
  
$pdf->ln(2);
$buscarimagen1 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_sala_limpia
WHERE id_asignado = ? AND tipo = 1");
mysqli_stmt_bind_param($buscarimagen1, 'i', $id_asignado);
mysqli_stmt_execute($buscarimagen1);
mysqli_stmt_store_result($buscarimagen1);
mysqli_stmt_bind_result($buscarimagen1, $url_imagen, $nombre_imagen);

    $cont = 1;
    $total_rows = mysqli_stmt_num_rows($buscarimagen1);
    while($row = mysqli_stmt_fetch($buscarimagen1)){

        if ($cont == 1) {
          $pdf->writeHTMLCell(90, 50, 15, '', '<img src="../../'.$url_imagen.$nombre_imagen.'" style="width: 700px; height: 400px;">', 0, 0, 0, true, 'C', true);
        }else if ($cont == 2){
          $pdf->writeHTMLCell(90, 75, 105, '', '<img src="../../'.$url_imagen.$nombre_imagen.'" style="width: 300px; width: 75px;">', 0, 1, 0, true, 'C', true);
        }

        $cont++;

    }



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
        <td class="linea" align="center"><h2>MEDICÓN DE PRESIÓN DIFERENCIAL</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


 $pdf->Cell(24,5,'Informe referencia:',0,0,'L',0,'',0);
 $pdf->Cell(45,5,$nombre_informe,1,0,'L',0,'',0);

 $pdf->Cell(15,5,'OT N°:',0,0,'C',0,'',0);
 $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);

 $pdf->Cell(32,5,'Fecha de Emisión:',0,0,'L',0,'',0);
 $pdf->Cell(49,5,$fecha_registro,1,0,'C',0,'',0);

 $pdf->ln(7);

 $pdf->Cell(24,5,'Método de ensayo:',0,0,'L',0,'',0);
 $pdf->Cell(75,5,'UNE-EN ISO 14.644-3:2006,Punto 4.2.3',1,0,'C',0,'',0);

 if ($clasificacion_oms == 'No Aplica' && $clasificacion_iso == 9) {
    $clasificacion_oms = '';
 }else{
   $clasificacion_oms = 'Clase '.$clasificacion_oms.' (OMS) / ';
 }

 $pdf->Cell(32,5,'Especificación de la sala:',0,0,'L',0,'',0);
 $pdf->Cell(49,5,$clasificacion_oms.'ISO '.$clasificacion_iso,1,0,'C',0,'',0);
 $pdf->ln(5);   


$buscarimagen2 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_sala_limpia
WHERE id_asignado = ? AND tipo = 2");
mysqli_stmt_bind_param($buscarimagen2, 'i', $id_asignado);
mysqli_stmt_execute($buscarimagen2);
mysqli_stmt_store_result($buscarimagen2);
mysqli_stmt_bind_result($buscarimagen2, $url_imagen2, $nombre_imagen2);
//mysqli_stmt_fetch($buscarimagen2);

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
        <td class="linea" align="center"><h2>Imagen de la Medición Presión Diferencial</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');






$cont = 1;
    $total_rows = mysqli_stmt_num_rows($buscarimagen2);
    while($row = mysqli_stmt_fetch($buscarimagen2)){

       /* if ($cont == 1) {*/
          $pdf->writeHTMLCell(90, 50, 60, '', '<img src="../../'.$url_imagen2.$nombre_imagen2.'" style="width: 600px; height: 350px;">', 0, 1, 0, true, 'C', true);
        /*}else if ($cont == 2){*/
          /*$pdf->writeHTMLCell(90, 120, 105, '', '<img src="../../'.$url_imagen2.$nombre_imagen2.'" style="width: 700px; height: 450px;">', 0, 1, 0, true, 'C', true);*/
       /* }*/

        $cont++;

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
        <td class="linea" align="center"><h2>Medición - Prueba de Presión Diferencial, Pa</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$contadorcito = 1;
 $pdf->Cell(30,5,'Lugar Medición',1,0,'C',1,'',1);
 $pdf->Cell(30,5,'Medición realizada en',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Resultado (Pa)',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Presión especificada (Pa)',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Tipo presión',1,0,'C',1,'',0);
 $pdf->Cell(30,5,'Cumple especificación',1,1,'C',1,'',0);

  $query_extrae_prueba = mysqli_prepare($connect,"SELECT A.dato FROM salas_limpias_datos_de_prueba_3 as A, 
  salas_limpias_prueba_3 as B WHERE A.id_prueba_3 = B.id_prueba AND B.id_asignado = ?");
  mysqli_stmt_bind_param($query_extrae_prueba, 'i', $id_asignado);
  mysqli_stmt_execute($query_extrae_prueba);
  mysqli_stmt_store_result($query_extrae_prueba);
  mysqli_stmt_bind_result($query_extrae_prueba, $dato);



  for($i = 0; $i < mysqli_stmt_num_rows($query_extrae_prueba); $i++){
      mysqli_stmt_fetch($query_extrae_prueba);
    
        
      if($contadorcito == 1){
        $pdf->Cell(30,5,'V/S '.$dato,1,0,'C',0,'',0);
      }else if($contadorcito == 2){
        $pdf->Cell(30,5,$dato,1,0,'C',0,'',0);
     
      }else if($contadorcito == 3){
         $pdf->Cell(30,5,$dato,1,0,'C',0,'',0);
           if($dato < $presion_sala){
          $cumple_presion = "NO CUMPLE";
        }else{
          $cumple_presion = "CUMPLE";
        } 
        $pdf->Cell(30,5,$presion_sala,1,0,'C',0,'',0);
        
      }else{
           $pdf->Cell(30,5,$dato,1,0,'C',0,'',0);
        $pdf->Cell(30,5,$cumple_presion,1,0,'C',0,'',0);
         $contadorcito = 0;
        $pdf->ln(5);
      }

      $contadorcito++;
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

 $pdf->Cell(24,5,'Informe referencia:',0,0,'L',0,'',0);
 $pdf->Cell(45,5,$nombre_informe,1,0,'L',0,'',0);

 $pdf->Cell(15,5,'OT N°:',0,0,'C',0,'',0);
 $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);

 $pdf->Cell(32,5,'Fecha de Emisión:',0,0,'C',0,'',0);
 $pdf->Cell(49,5,$fecha_registro,1,0,'C',0,'',0);

 $pdf->ln(7);
$pdf->Cell(24,5,'Método de ensayo:',0,0,'L',0,'',0);
$pdf->Cell(75,5,'UNE-EN ISO 14.644-3:2006,Punto 4.2.6',1,0,'C',0,'',0);
$pdf->Cell(32,5,'N° de muestras:',0,0,'C',0,'',0);
$pdf->Cell(8,5,$n_muestras,1,0,'C',0,'',0);
$pdf->Cell(33,5,'Altura toma de Muestras:',0,0,'R',0,'',0);
$pdf->Cell(8,5,'0.85',1,0,'C',0,'',0);
$pdf->ln(5);

$buscarimagen3 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_sala_limpia
WHERE id_asignado = ? AND tipo = 3");
mysqli_stmt_bind_param($buscarimagen3, 'i', $id_asignado);
mysqli_stmt_execute($buscarimagen3);
mysqli_stmt_store_result($buscarimagen3);
mysqli_stmt_bind_result($buscarimagen3, $url_imagen3, $nombre_imagen3);
//mysqli_stmt_fetch($buscarimagen3);


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
        <td class="linea" align="center"><h2>Imagen de la Medición Prueba Temperatura y Humedad</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

while($row = mysqli_stmt_fetch($buscarimagen3)){

         $pdf->writeHTMLCell(90, 15, 60, '', '<img src="../../'.$url_imagen3.$nombre_imagen3.'" style="width: 550px; height: 350px;">', 0, 1, 0, true, 'C', true); 
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
        <td class="linea" align="center"><h2>Prueba de Medición de Temperatura °C</h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



//Validar si cumple o no cu´mple


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

   if ($promedio >= $especificacion_2_temp && $promedio <= $especificacion_1_temp) {
      $cumple_temp = 'CUMPLE';
   }else{
      $cumple_temp = 'NO CUMPLE';
   }

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
   $pdf->Cell(30,5,'Entre '.$especificacion_2_temp.' y '.$especificacion_1_temp,1,0,'C',0,'',0);

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

  if ($promedio >= $especificacion_2_hum && $promedio <= $especificacion_1_hum) {
      $cumple_hr = 'CUMPLE';
   }else{
      $cumple_hr = 'NO CUMPLE';
   }

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
   $pdf->Cell(30,5,'Entre '.$especificacion_2_hum.' y '.$especificacion_1_hum,1,0,'C',0,'',0);

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

 $pdf->Cell(24,5,'Informe referencia:',0,0,'L',0,'',0);
 $pdf->Cell(45,5,$nombre_informe,1,0,'L',0,'',0);

 $pdf->Cell(15,5,'OT N°:',0,0,'C',0,'',0);
 $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);

 $pdf->Cell(32,5,'Fecha de Emisión:',0,0,'C',0,'',0);
 $pdf->Cell(49,5,$fecha_registro,1,0,'C',0,'',0);

 $pdf->ln(7);
$pdf->Cell(24,5,'Método de ensayo:',0,0,'L',0,'',0);
$pdf->Cell(75,5,'DS N° 594/1999 MINSAL ',1,0,'C',0,'',0);
$pdf->Cell(32,5,'N° de muestras:',0,0,'C',0,'',0);
$pdf->Cell(8,5,'5',1,0,'C',0,'',0);
$pdf->Cell(33,5,'Altura toma de Muestras:',0,0,'R',0,'',0);
$pdf->Cell(8,5,'0.85',1,0,'C',0,'',0);
$pdf->ln(5);

$buscarimagen4 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_sala_limpia
WHERE id_asignado = ? AND tipo = 4");
mysqli_stmt_bind_param($buscarimagen4, 'i', $id_asignado);
mysqli_stmt_execute($buscarimagen4);
mysqli_stmt_store_result($buscarimagen4);
mysqli_stmt_bind_result($buscarimagen4, $url_imagen4, $nombre_imagen4);


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
        <td class="linea" align="center"><h2>Imagen de la Medición de Iluminación y Ruido</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$cont = 1;
$contador = 15;
$contadorpage = 1;

while($row = mysqli_stmt_fetch($buscarimagen4)){

         $pdf->writeHTMLCell(90, 15, 60, '', '<img src="../../'.$url_imagen4.$nombre_imagen4.'" style="width: 550px; height: 350px;">', 0, 1, 0, true, 'C', true); 

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


while($row = mysqli_stmt_fetch($query6)){

if ($promedio_lux >= $lux_item) {
   $cumple_lux = 'CUMPLE';
}else{
   $cumple_lux = 'NO CUMPLE';
}

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


while($row = mysqli_stmt_fetch($query6)){

if ($promedio_dba <= $ruido_dba_item) {
   $cumple_dba = 'CUMPLE';
}else{
   $cumple_dba = 'NO CUMPLE';
}

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
   $pdf->Cell(30,5,' <=  '.$ruido_dba_item,1,0,'C',0,'',0);

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

 $pdf->Cell(24,5,'Informe referencia:',0,0,'L',0,'',0);
 $pdf->Cell(45,5,$nombre_informe,1,0,'L',0,'',0);

 $pdf->Cell(15,5,'OT N°:',0,0,'C',0,'',0);
 $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);

 $pdf->Cell(32,5,'Fecha de Emisión:',0,0,'L',0,'',0);
 $pdf->Cell(49,5,$fecha_registro,1,0,'C',0,'',0);

 $pdf->ln(7);

$pdf->Cell(24,5,'Método de ensayo:',0,0,'L',0,'',0);
$pdf->Cell(75,5,'UNE-EN ISO 14.644-3:2006,Punto 4.2.2',1,0,'C',0,'',0);
$pdf->Cell(32,5,'N° de Rejillas de Inyección:',0,0,'L',0,'',0);
$pdf->Cell(8,5,$n_rejillas,1,0,'C',0,'',0);
$pdf->Cell(33,5,'N° de Extractores:',0,0,'C',0,'',0);
$pdf->Cell(8,5,$cantidad_extracciones,1,0,'C',0,'',0);
$pdf->ln(5);

$buscarimagen5 = mysqli_prepare($connect,"SELECT url, nombre 
FROM image_sala_limpia
WHERE id_asignado = ? AND tipo = 5");
mysqli_stmt_bind_param($buscarimagen5, 'i', $id_asignado);
mysqli_stmt_execute($buscarimagen5);
mysqli_stmt_store_result($buscarimagen5);
mysqli_stmt_bind_result($buscarimagen5, $url_imagen5, $nombre_imagen5);
//mysqli_stmt_fetch($buscarimagen5);

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
        <td class="linea" align="center"><h2>Imagen de la Medición Cálculo de Renovación de Aire/Hora</h2></td>
   </tr>
</table>
<br><br>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


while($row = mysqli_stmt_fetch($buscarimagen5)){

         $pdf->writeHTMLCell(90, 15, 60 , '', '<img src="../../'.$url_imagen5.$nombre_imagen5.'" style="width: 550px; height: 350px;">', 0, 1, 0, true, 'C', true); 
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


$query8 = mysqli_prepare($connect,"SELECT n1,n2,n3,n4,n5,n6,n7,n8,n9,n10,n11,n12,n13,n14,n15 FROM salas_limpias_prueba_5 WHERE id_asignado = ? AND categoria = 1");
mysqli_stmt_bind_param($query8, 'i', $id_asignado);
mysqli_stmt_execute($query8);
mysqli_stmt_store_result($query8);
mysqli_stmt_bind_result($query8, $n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12,$n13,$n14,$n15);


$promedio_extraccion = "";


while($row = mysqli_stmt_fetch($query8)){

   if ($n1 == 0) {
      $color1 = 1;
      $n1 = '';
   }
   if ($n2 == 0) {
      $color2 = 1;
      $n2 = '';
   }
   if ($n3 == 0) {
      $color3 = 1;
      $n3 = '';
   }
   if ($n4 == 0) {
      $color4 = 1;
      $n4 = '';
   }
   if ($n5 == 0) {
      $color5 = 1;
      $n5 = '';
   }
   if ($n6 == 0) {
      $color6 = 1;
      $n6 = '';
   }
   if ($n7 == 0) {
      $color7 = 1;
      $n7 = '';
   }
   if ($n8 == 0) {
      $color8 = 1;
      $n8 = '';
   }
   if ($n9 == 0) {
      $color9 = 1;
      $n9 = '';
   }
   if ($n10 == 0) {
      $color10 = 1;
      $n10 = '';
   }
   if ($n11 == 0) {
      $color11 = 1;
      $n11 = '';
   }
   if ($n12 == 0) {
      $color12 = 1;
      $n12 = '';
   }
   if ($n13 == 0) {
      $color13 = 1;
      $n13 = '';
   }
   if ($n14 == 0) {
      $color14 = 1;
      $n14 = '';
   }
   if ($n15 == 0) {
      $color15 = 1;
      $n15 = '';
   }

    if ($contador == 3) {
      $promedio_caudal = $n1+$n2+$n3+$n4+$n5+$n6+$n7+$n8+$n9+$n10+$n11+$n12+$n13+$n14+$n15;
      
   }

   $pdf->Cell(20,5,$nombres_p5[$contador],1,0,'C',0,'',0);
   $pdf->Cell(10.66,5,$n1,1,0,'C',$color1,'',0);
   $pdf->Cell(10.66,5,$n2,1,0,'C',$color2,'',0);
   $pdf->Cell(10.66,5,$n3,1,0,'C',$color3,'',0);
   $pdf->Cell(10.66,5,$n4,1,0,'C',$color4,'',0);
   $pdf->Cell(10.66,5,$n5,1,0,'C',$color5,'',0);
   $pdf->Cell(10.66,5,$n6,1,0,'C',$color6,'',0);
   $pdf->Cell(10.66,5,$n7,1,0,'C',$color7,'',0);
   $pdf->Cell(10.66,5,$n8,1,0,'C',$color8,'',0);
   $pdf->Cell(10.66,5,$n9,1,0,'C',$color9,'',0);
   $pdf->Cell(10.66,5,$n10,1,0,'C',$color10,'',0);
   $pdf->Cell(10.66,5,$n11,1,0,'C',$color11,'',0);
   $pdf->Cell(10.66,5,$n12,1,0,'C',$color12,'',0);
   $pdf->Cell(10.66,5,$n13,1,0,'C',$color13,'',0);
   $pdf->Cell(10.66,5,$n14,1,0,'C',$color14,'',0);
   $pdf->Cell(10.66,5,$n15,1,0,'C',$color15,'',0);

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


$query8 = mysqli_prepare($connect,"SELECT n1,n2,n3,n4,n5,n6,n7,n8,n9,n10,n11,n12,n13,n14,n15 FROM salas_limpias_prueba_5 WHERE id_asignado = ? AND categoria = 2");
mysqli_stmt_bind_param($query8, 'i', $id_asignado);
mysqli_stmt_execute($query8);
mysqli_stmt_store_result($query8);
mysqli_stmt_bind_result($query8, $n1_,$n2_,$n3_,$n4_,$n5_,$n6_,$n7_,$n8_,$n9_,$n10_,$n11_,$n12_,$n13_,$n14_,$n15_);

while($row = mysqli_stmt_fetch($query8)){

  if ($n1_ == 0) {
      $color1_ = 1;
      $n1_ = '';
   }
   if ($n2_ == 0) {
      $color2_ = 1;
      $n2_ = '';
   }
   if ($n3_ == 0) {
      $color3_ = 1;
      $n3_ = '';
   }
   if ($n4_ == 0) {
      $color4_ = 1;
      $n4_ = '';
   }
   if ($n5_ == 0) {
      $color5_ = 1;
      $n5_ = '';
   }
   if ($n6_ == 0) {
      $color6_ = 1;
      $n6_ = '';
   }
   if ($n7_ == 0) {
      $color7_ = 1;
      $n7_ = '';
   }
   if ($n8_ == 0) {
      $color8_ = 1;
      $n8_ = '';
   }
   if ($n9_ == 0) {
      $color9_ = 1;
      $n9_ = '';
   }
   if ($n10_ == 0) {
      $color10_ = 1;
      $n10_ = '';
   }
   if ($n11_ == 0) {
      $color11_ = 1;
      $n11_ = '';
   }
   if ($n12_ == 0) {
      $color12_ = 1;
      $n12_ = '';
   }
   if ($n13_ == 0) {
      $color13_ = 1;
      $n13_ = '';
   }
   if ($n14_ == 0) {
      $color14_ = 1;
      $n14_ = '';
   }
   if ($n15_ == 0) {
      $color15_ = 1;
      $n15_ = '';
   }

               $pdf->Cell(20,5,$nombres_p5[$contador],1,0,'C',0,'',0);
               $pdf->Cell(10.66,5,$n1_,1,0,'C',$color1_,'',0);
               $pdf->Cell(10.66,5,$n2_,1,0,'C',$color2_,'',0);
               $pdf->Cell(10.66,5,$n3_,1,0,'C',$color3_,'',0);
               $pdf->Cell(10.66,5,$n4_,1,0,'C',$color4_,'',0);
               $pdf->Cell(10.66,5,$n5_,1,0,'C',$color5_,'',0);
               $pdf->Cell(10.66,5,$n6_,1,0,'C',$color6_,'',0);
               $pdf->Cell(10.66,5,$n7_,1,0,'C',$color7_,'',0);
               $pdf->Cell(10.66,5,$n8_,1,0,'C',$color8_,'',0);
               $pdf->Cell(10.66,5,$n9_,1,0,'C',$color9_,'',0);
               $pdf->Cell(10.66,5,$n10_,1,0,'C',$color10_,'',0);
               $pdf->Cell(10.66,5,$n11_,1,0,'C',$color11_,'',0);
               $pdf->Cell(10.66,5,$n12_,1,0,'C',$color12_,'',0);
               $pdf->Cell(10.66,5,$n13_,1,0,'C',$color13_,'',0);
               $pdf->Cell(10.66,5,$n14_,1,0,'C',$color14_,'',0);
               $pdf->Cell(10.66,5,$n15_,1,0,'C',$color15_,'',0);
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


   $pdf->Cell(50.66,5,$promedio_caudal,1,0,'C',0,'',0);
   $pdf->Cell(50.66,5,$resultado_prom_caudal,1,0,'C',0,'',0);
   $pdf->Cell(47.66,5,$ren_hr,1,0,'C',0,'',0);
   $pdf->Cell(30.66,5,$estado_caudal,1,0,'C',0,'',0);
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


