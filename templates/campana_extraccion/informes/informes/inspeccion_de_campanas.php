<?php 
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');


$pdf->AddPage('A4');


$clave = $_GET['clave'];

$id_asignado = substr($clave, 97);


/*echo "SELECT a.descripcion, a.nombre, b.tipo, b.marca, b.modelo, b.serie, b.codigo, b.ubicacion_interna,b.direccion, b.requisito_velocidad FROM item as a, item_campana as b, item_asignado as c WHERE c.id_asignado = ? AND c.id_item = b.id_item AND b.id_item = c.id_item AND a.id_tipo = 12;";*/
$consulta_informacion_informe = mysqli_prepare($connect,"SELECT a.descripcion, a.nombre, b.tipo, b.marca, b.modelo,
 b.serie, b.codigo, b.ubicacion_interna,b.direccion, b.requisito_velocidad, b.fecha_registro 
  FROM item as a, item_campana as b, item_asignado as c 
  WHERE c.id_asignado = ? AND c.id_item = b.id_item AND b.id_item = c.id_item AND a.id_tipo = 12");

mysqli_stmt_bind_param($consulta_informacion_informe, 'i', $id_asignado);
mysqli_stmt_execute($consulta_informacion_informe);
mysqli_stmt_store_result($consulta_informacion_informe);
mysqli_stmt_bind_result($consulta_informacion_informe, $descripcion, $nombre_item, $tipo_campana, $marca, $modelo, 
   $serie, $codigo, $ubicacion_interna, $direccion, $requisito_velocidad, $fecha_registro_item);
mysqli_stmt_fetch($consulta_informacion_informe);


$inspeccion_visual = mysqli_prepare($connect,"SELECT insp_1, insp_2, insp_3, insp_4, insp_5
  FROM campana_extraccion_inspeccion
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($inspeccion_visual, 'i', $id_asignado);
mysqli_stmt_execute($inspeccion_visual);
mysqli_stmt_store_result($inspeccion_visual);
mysqli_stmt_bind_result($inspeccion_visual, $insp_1, $insp_2, $insp_3, $insp_4, $insp_5);
mysqli_stmt_fetch($inspeccion_visual);

//info_ informes

$inspeccion_visual = mysqli_prepare($connect,"SELECT conclusion, solicitante, nombre_informe, usuario_responsable,DATE_FORMAT(fecha_registro, '%m/%d/%Y')
  FROM informe_campana
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($inspeccion_visual, 'i', $id_asignado);
mysqli_stmt_execute($inspeccion_visual);
mysqli_stmt_store_result($inspeccion_visual);
mysqli_stmt_bind_result($inspeccion_visual, $conclusion, $solicitante, $nombre_informe, $usuario_responsable, $fecha_registro_informe);
mysqli_stmt_fetch($inspeccion_visual);

//Información de responsable

  $consultar_responsable = mysqli_prepare($connect,"SELECT b.nombre, b.apellido, c.nombre 
  FROM usuario a, persona b, cargo c WHERE a.id_usuario = b.id_usuario AND c.id_cargo = b.id_cargo AND a.usuario = ?");

mysqli_stmt_bind_param($consultar_responsable, 's', $usuario_responsable);
mysqli_stmt_execute($consultar_responsable);
mysqli_stmt_store_result($consultar_responsable);
mysqli_stmt_bind_result($consultar_responsable, $nombre_responsable, $apellido_responsable, $nombre_cargo);
mysqli_stmt_fetch($consultar_responsable);


$infor_numot = mysqli_prepare($connect,"SELECT c.numot, d.nombre, d.direccion, d.sigla_pais 
  FROM item_asignado as a, servicio as b, numot as c, empresa as d 
  WHERE a.id_asignado = ? AND a.id_servicio = b.id_servicio AND b.id_numot = c.id_numot AND c.id_empresa = d.id_empresa");

mysqli_stmt_bind_param($infor_numot, 'i', $id_asignado);
mysqli_stmt_execute($infor_numot);
mysqli_stmt_store_result($infor_numot);
mysqli_stmt_bind_result($infor_numot, $ot, $nombre_empresa, $direccion_empresa, $sigla_pais);
mysqli_stmt_fetch($infor_numot);

$num_ot = substr($ot,2);



/*echo "SELECT id_inspeccion, insp_1, insp_2, insp_3, insp_4, insp_5
  FROM campana_extraccion_inspeccion
  WHERE c.id_asignado = $id_asignado";
*/
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br><br><br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>CERTIFICADO DE INSPECCIÓN EN CAMPANA DE EXTRACCIÓN</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->SetFillColor(221,221,221);
   $pdf->SetDrawColor(202,202,202);

     $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro_informe,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$nombre_empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Tipo Campana',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Código',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$tipo_campana,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$codigo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicacion_interna,1,0,'C',0,'',0);
   $pdf->ln(7);  
   $pdf->Cell(42,5,'Requisito Velocidad de Aire',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,$requisito_velocidad,1,0,'C',0,'',0);

  $pdf->ln(7);

//información del equipo



///// crea una nueva pagina
//$pdf->AddPage('A4');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Inspección Visual</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


     $pdf->Cell(70,5,'Equipo en buenas condiciones de operación:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp_1,1,0,'C',0,'',0);
     $pdf->Cell(10,5,'',0,0,'J',0,'',0);
     $pdf->Cell(70,5,'Equipo Límpio y sin elementos externos:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp_2,1,0,'C',0,'',0);
     $pdf->ln(5);
     $pdf->Cell(70,5,'Conexión eléctrica en buenas condiciones:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp_3,1,0,'C',0,'',0);
     $pdf->Cell(10,5,'',0,0,'J',0,'',0);
     $pdf->Cell(70,5,'Posee identificación:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp_4,1,0,'C',0,'',0);
     $pdf->ln(5);
     $pdf->Cell(70,5,'Presenta todas sus partes y accesorios:',1,0,'L',0,'',0);
     $pdf->Cell(15,5,$insp_5,1,0,'C',0,'',0);
     $pdf->ln(10); 
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Resultados - Norma: 14.644-1:2000 y UNE-EN ISO 14.644-3:2015</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

/// resultados normativas

$inspeccion_visual = mysqli_prepare($connect,"SELECT requisito, valor_obtenido, veredicto
  FROM campana_extraccion_prueba_1
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($inspeccion_visual, 'i', $id_asignado);
mysqli_stmt_execute($inspeccion_visual);
mysqli_stmt_store_result($inspeccion_visual);
mysqli_stmt_bind_result($inspeccion_visual, $requisito, $valor_obtenido, $veredicto);



$array_titulos = array('Velocidad de Aire, 25% Apertura (m/s)', 'Velocidad de Aire, 50% Apertura (m/s)','Velocidad de Aire, 75% Apertura (m/s)','Velocidad de Aire, 100% Apertura (m/s)','Medición de Temperatura','Medición de Humedad Relativa','Presión Sonora Equipo','Presión Sonora Sala','Nivel de Iluminación','Prueba de Humo');



$pdf->Cell(60,5,'Medición',1,0,'C',1,'',0);
$pdf->Cell(40,5,'Requisito',1,0,'C',1,'',0);
$pdf->Cell(40,5,'Valor obtenido',1,0,'C',1,'',0);
$pdf->Cell(40,5,'Veredicto',1,0,'C',1,'',0);
$pdf->ln(5);

$i=0;
  while ($row = mysqli_stmt_fetch($inspeccion_visual)) {
    if ($i < 4) {
      $pdf->Cell(60,5,$array_titulos[$i],1,0,'L',1,'',0);
      $pdf->Cell(40,5,'>='.$requisito.' m/s',1,0,'C',0,'',0);
      $pdf->Cell(40,5,$valor_obtenido,1,0,'C',0,'',0);
      $pdf->Cell(40,5,$veredicto,1,0,'C',0,'',0);
      $pdf->ln(5);
    }else{
      $pdf->Cell(60,5,$array_titulos[$i],1,0,'L',1,'',0);
      $pdf->Cell(40,5,$requisito,1,0,'C',0,'',0);
      $pdf->Cell(40,5,$valor_obtenido,1,0,'C',0,'',0);
      $pdf->Cell(40,5,$veredicto,1,0,'C',0,'',0);
      $pdf->ln(5);
    }

  $i++;

}
$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Conclusión</h2></td>
   </tr>
</table>
<br><br>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$pdf->writeHTMLCell(180, 5, 15, '', $muestra_conclusion, 0, 1, 0, true, 'J', true);

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

//pagina2///////////////////////////////////////////////////

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br><br><br><br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>PRUEBA DE MEDICION DE VELOCIDAD DE AIRE</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


    $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro_informe,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$nombre_empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Tipo Campana',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Código',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$tipo_campana,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$codigo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicacion_interna,1,0,'C',0,'',0);
  $pdf->ln(7);

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Medición de Velocidad de Aire - UNE-EN ISO 14.644-3:2015</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$campana_extraccion_prueba_2 = mysqli_prepare($connect,"SELECT medicion_1, medicion_2, medicion_3, medicion_4, medicion_5, medicion_6
  FROM campana_extraccion_prueba_2
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($campana_extraccion_prueba_2, 'i', $id_asignado);
mysqli_stmt_execute($campana_extraccion_prueba_2);
mysqli_stmt_store_result($campana_extraccion_prueba_2);
mysqli_stmt_bind_result($campana_extraccion_prueba_2, $medicion_1, $medicion_2, $medicion_3, $medicion_4, $medicion_5, $medicion_6);

$array_titulos2 = array('25%', '50%','75%','100%');
$pdf->Cell(27,5,'Apertura en porcentaje',1,0,'C',1,'',0);
$pdf->Cell(25.50,5,'Medición 1 (m/s)',1,0,'C',1,'',0);
$pdf->Cell(25.50,5,'Medición 2 (m/s)',1,0,'C',1,'',0);
$pdf->Cell(25.50,5,'Medición 3 (m/s)',1,0,'C',1,'',0);
$pdf->Cell(25.50,5,'Medición 4 (m/s)',1,0,'C',1,'',0);
$pdf->Cell(25.50,5,'Medición 5 (m/s)',1,0,'C',1,'',0);
$pdf->Cell(25.50,5,'Medición 6 (m/s)',1,0,'C',1,'',0);
$pdf->ln(5);

$i2= 0;
while ($row = mysqli_stmt_fetch($campana_extraccion_prueba_2)) {

$pdf->Cell(27,5,$array_titulos2[$i2],1,0,'C',1,'',0);
$pdf->Cell(25.50,5,$medicion_1,1,0,'C',0,'',0);
$pdf->Cell(25.50,5,$medicion_2,1,0,'C',0,'',0);
$pdf->Cell(25.50,5,$medicion_3,1,0,'C',0,'',0);
$pdf->Cell(25.50,5,$medicion_4,1,0,'C',0,'',0);
$pdf->Cell(25.50,5,$medicion_5,1,0,'C',0,'',0);
$pdf->Cell(25.50,5,$medicion_6,1,0,'C',0,'',0);
$pdf->ln(5);

$i2++;
}

$pdf->ln(5);

$campana_extraccion_prueba_3 = mysqli_prepare($connect,"SELECT medicion_1, medicion_2, medicion_3, medicion_4
  FROM campana_extraccion_prueba_3
  WHERE id_asignado = ? ");

mysqli_stmt_bind_param($campana_extraccion_prueba_3, 'i', $id_asignado);
mysqli_stmt_execute($campana_extraccion_prueba_3);
mysqli_stmt_store_result($campana_extraccion_prueba_3);
mysqli_stmt_bind_result($campana_extraccion_prueba_3, $medicion_1_3, $medicion_2_3, $medicion_3_3, $medicion_4_3);

$pdf->Cell(22,5,'Resumen',1,0,'C',1,'',0);
$pdf->Cell(55,5,'Medida de los Promedios de Velocidad de aire',1,0,'C',1,'',0);
$pdf->Cell(34.37,5,'Máxima velocidad medida',1,0,'C',1,'',0);
$pdf->Cell(34.37,5,'Mínima velocidad medida',1,0,'C',1,'',0);
$pdf->Cell(34.37,5,'Mínima velocidad aceptada',1,0,'C',1,'',0);
$pdf->ln(5);


$i3 = 0;
while ($row = mysqli_stmt_fetch($campana_extraccion_prueba_3)) {

$pdf->Cell(22,5,$array_titulos2[$i3],1,0,'C',1,'',0);
$pdf->Cell(55,5,$medicion_1_3,1,0,'C',0,'',0);
$pdf->Cell(34.37,5,$medicion_2_3,1,0,'C',0,'',0);
$pdf->Cell(34.37,5,$medicion_3_3,1,0,'C',0,'',0);
$pdf->Cell(34.37,5,$medicion_4_3,1,0,'C',0,'',0);

$pdf->ln(5);
  


 $i3++;
}

$imagen1 = <<<EOD
<style>
.linea{
   height: 290px;

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="../../imagenes/img_definidas/caudales-2.jpg"></td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Equipo Utilizado en la Medición</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$campana_extraccion_equipo1 = mysqli_prepare($connect,"SELECT b.marca_equipo, b.modelo_equipo, b.n_serie_equipo, 
  c.numero_certificado, c.fecha_emision 
FROM equipos_mediciones a, equipos_cercal b , certificado_equipo c 
WHERE a.id_equipo = b.id_equipo_cercal AND a.id_asignado = ? AND c.id_equipo_cercal = b.id_equipo_cercal AND a.tipo_prueba = 'Prueba Velocidad Aire'");

mysqli_stmt_bind_param($campana_extraccion_equipo1, 'i', $id_asignado);
mysqli_stmt_execute($campana_extraccion_equipo1);
mysqli_stmt_store_result($campana_extraccion_equipo1);
mysqli_stmt_bind_result($campana_extraccion_equipo1, $marca1, $modelo1, $n_serie1, $numero_certificado, $fecha_emision);


$pdf->writeHTMLCell(30, 8, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 45, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 75, '', 'No° Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 105, '', 'Certificado de Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 135, '', 'Última Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 165, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);
  
 $contador1 = 0; 
while ($row = mysqli_stmt_fetch($campana_extraccion_equipo1)) {

  if ($contador1 > 2) {
    $pdf->AddPage('A4');
  }
  $pdf->writeHTMLCell(30, 5, 15, '', $marca1, 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(30, 5, 45, '', $modelo1, 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(30, 5, 75, '', $n_serie1, 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(30, 5, 105, '', $numero_certificado, 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(30, 5, 135, '', $fecha_emision, 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(30, 5, 165, '', '-', 1, 1, 0, true, 'C', true);
  $contador1++;
}

$pdf->AddPage('A4');
//pagina 3 

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>PRUEBAS DE TEMPERATURA / HUMEDAD RELATIVA Y PRESIÓN SONORA</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

     $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro_informe,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$nombre_empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Tipo Campana',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Código',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$tipo_campana,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$codigo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicacion_interna,1,0,'C',0,'',0);
  $pdf->ln(7);


$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Medición de Velocidad de Aire - UNE-EN ISO 14.644-3:2015</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');



$campana_extraccion_prueba_4 = mysqli_prepare($connect,"SELECT punto_1, punto_2, punto_3, punto_promedio  FROM campana_extraccion_prueba_4
  WHERE id_asignado = ? AND categoria = 1");

mysqli_stmt_bind_param($campana_extraccion_prueba_4, 'i', $id_asignado);
mysqli_stmt_execute($campana_extraccion_prueba_4);
mysqli_stmt_store_result($campana_extraccion_prueba_4);
mysqli_stmt_bind_result($campana_extraccion_prueba_4, $punto_1, $punto_2, $punto_3, $punto_promedio);

$array_titulos3 = array('Temperatura,°C', 'Humedad Relativa, %');

$pdf->Cell(36,5,'punto de muestreo',1,0,'C',1,'',0);
$pdf->Cell(36,5,'1',1,0,'C',1,'',0);
$pdf->Cell(36,5,'2',1,0,'C',1,'',0);
$pdf->Cell(36,5,'3',1,0,'C',1,'',0);
$pdf->Cell(36,5,'Promedio',1,0,'C',1,'',0);
$pdf->ln(5);

$i4 = 0;

while ($row = mysqli_stmt_fetch($campana_extraccion_prueba_4)) {

    $pdf->Cell(36,5,$array_titulos3[$i4],1,0,'C',1,'',0);
    $pdf->Cell(36,5,$punto_1,1,0,'C',0,'',0);
    $pdf->Cell(36,5,$punto_2,1,0,'C',0,'',0);
    $pdf->Cell(36,5,$punto_3,1,0,'C',0,'',0);
    $pdf->Cell(36,5,$punto_promedio,1,0,'C',0,'',0);  
    $pdf->ln(5); 

 $i4++;   
}
$imagen1 = <<<EOD
<style>
.linea{
  

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="../../imagenes/img_definidas/temp_y_hum.jpg"></td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>PRUEBAS DE HUMO Y NIVEL DE ILUMINACIÓN</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$campana_extraccion_prueba_4_1 = mysqli_prepare($connect,"SELECT punto_1, punto_2, punto_3, punto_promedio  FROM campana_extraccion_prueba_4
  WHERE id_asignado = ? AND categoria = 2");

mysqli_stmt_bind_param($campana_extraccion_prueba_4_1, 'i', $id_asignado);
mysqli_stmt_execute($campana_extraccion_prueba_4_1);
mysqli_stmt_store_result($campana_extraccion_prueba_4_1);
mysqli_stmt_bind_result($campana_extraccion_prueba_4_1, $punto_1, $punto_2, $punto_3, $punto_promedio);


$array_titulos4 = array('Equipo (dB-A Lento)', 'Sala (dB-A Lento)');


$pdf->Cell(36,5,'Punto de muestreo',1,0,'C',1,'',0);
$pdf->Cell(36,5,'1',1,0,'C',1,'',0);
$pdf->Cell(36,5,'2',1,0,'C',1,'',0);
$pdf->Cell(36,5,'3',1,0,'C',1,'',0);
$pdf->Cell(36,5,'Promedio',1,0,'C',1,'',0);
$pdf->ln(5);

$i5 = 0;
while ($row = mysqli_stmt_fetch($campana_extraccion_prueba_4_1)) {

    $pdf->Cell(36,5,$array_titulos4[$i5],1,0,'C',1,'',0);
    $pdf->Cell(36,5,$punto_1,1,0,'C',0,'',0);
    $pdf->Cell(36,5,$punto_2,1,0,'C',0,'',0);
    $pdf->Cell(36,5,$punto_3,1,0,'C',0,'',0);
    $pdf->Cell(36,5,$punto_promedio,1,0,'C',0,'',0);
    $pdf->ln(5);


    $i5++;
}

$imagen1 = <<<EOD
<style>
.linea{
  

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="../../imagenes/img_definidas/ruido.jpg"></td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Equipos Utilizados en la Medición</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$campana_extraccion_equipo2 = mysqli_prepare($connect,"SELECT b.marca_equipo, b.modelo_equipo, b.n_serie_equipo, c.numero_certificado, c.fecha_emision 
FROM equipos_mediciones a, equipos_cercal b , certificado_equipo c 
WHERE a.id_equipo = b.id_equipo_cercal AND a.id_asignado = ? AND c.id_equipo_cercal = b.id_equipo_cercal AND  a.tipo_prueba = 'Prueba sonora'");

mysqli_stmt_bind_param($campana_extraccion_equipo2, 'i', $id_asignado);
mysqli_stmt_execute($campana_extraccion_equipo2);
mysqli_stmt_store_result($campana_extraccion_equipo2);
mysqli_stmt_bind_result($campana_extraccion_equipo2, $marca2, $modelo2, $n_serie2,$numero_certificado2, $fecha_emision2);

$pdf->writeHTMLCell(30, 8, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 45, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 75, '', 'No° Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 105, '', 'Certificado de Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 135, '', 'Última Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 165, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);

$e= 2;
$contador2 = 0;
while ($row = mysqli_stmt_fetch($campana_extraccion_equipo2)) {

  if ($contador2 > 15) {
    $pdf->AddPage('A4');
  }
    $pdf->writeHTMLCell(30, 5, 15, '', $marca2, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 45, '', $modelo2, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 75, '', $n_serie2, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 105, '', $numero_certificado2, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 135, '', $fecha_emision2, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 165, '', '-', 1, 1, 0, true, 'C', true); 
    $contador2++;
}


$pdf->AddPage('A4');
/// pagina 4
$linea = <<<EOD

<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>PRUEBAS DE HUMO Y NIVEL DE ILUMINACIÓN</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

    $pdf->Cell(25,5,'Informe referencia:',0,0,'L',0,'',0);
     $pdf->Cell(50,5,$nombre_informe,1,0,'J',0,'',0);
     $pdf->Cell(15,5,'OT N°',0,0,'C',0,'',0);
     $pdf->Cell(15,5,$num_ot,1,0,'C',0,'',0);
     $pdf->Cell(20,5,'',0,0,'C',0,'',0);
     $pdf->Cell(30,5,'Fecha de Emisión:',0,0,'L',0,'',0);
     $pdf->Cell(25,5,$fecha_registro_informe,1,0,'C',0,'',0);

   $pdf->ln(7);   

   $pdf->Cell(25,5,'Empresa:',0,0,'L',0,'',0);
   $pdf->Cell(80,5,$nombre_empresa,1,0,'C',0,'',0);
   $pdf->Cell(20,5,'',0,0,'C',0,'',0);
   $pdf->Cell(20,5,'Solicita:',0,0,'L',0,'',0);
   $pdf->Cell(35,5,$solicitante,1,0,'C',0,'',0);

   $pdf->ln(7);  

   $pdf->Cell(25,5,'Dirección:',0,0,'L',0,'',0);
   $pdf->Cell(155,5,$direccion,1,0,'L',0,'',0);

   $pdf->ln(10);  

   $pdf->Cell(42,5,'Tipo Campana',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Marca',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Modelo',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Serie',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Código',1,0,'C',1,'',0);
   $pdf->Cell(27.6,5,'Ubicado en',1,0,'C',1,'',0);
   $pdf->ln(5); 
   $pdf->Cell(42,5,$tipo_campana,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$marca,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$modelo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$serie,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$codigo,1,0,'C',0,'',0);
   $pdf->Cell(27.6,5,$ubicacion_interna,1,0,'C',0,'',0);
  $pdf->ln(7);

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
        <td class="linea" align="center"><h3>Prueba de Humo - ANSI/ASHRAE 110-1995 Method of Testing Performance of Laboratory Fume Hoods</h3></td>
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
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba N°1: Contención de Aire Externo</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');


$campana_extraccion_prueba_5 = mysqli_prepare($connect,"SELECT resultado, cumple  FROM campana_extraccion_prueba_5
  WHERE id_asignado = ? AND categoria = 1");

mysqli_stmt_bind_param($campana_extraccion_prueba_5, 'i', $id_asignado);
mysqli_stmt_execute($campana_extraccion_prueba_5);
mysqli_stmt_store_result($campana_extraccion_prueba_5);
mysqli_stmt_bind_result($campana_extraccion_prueba_5, $resultado_1, $cumple_1);

$array_titulos5 = array('Ubicación de Prueba', 'Dirección del Flujo Especificado','Visualización de Flujo Reverso','Visualización de Vórtices','Cumple Especificaciones');

/*$pdf->writeHTMLCell(60, 5, 15, '', 'condiciones', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 75, '', 'Resultado', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', 'Cumple', 1, 1, 0, true, 'C', true);*/

$pdf->Cell(60,5,'condiciones',1,0,'C',1,'',0);
$pdf->Cell(60,5,'Resultado',1,0,'C',1,'',0);
$pdf->Cell(60,5,'Cumple',1,0,'C',1,'',0);

$pdf->ln(5);
$i6 = 0;

while ($row = mysqli_stmt_fetch($campana_extraccion_prueba_5)) { 

    if ($i6 < 4) {

       $pdf->Cell(60,5,$array_titulos5[$i6],1,0,'C',1,'',0);
       $pdf->Cell(60,5,$resultado_1,1,0,'C',0,'',0);
       $pdf->Cell(60,5,$cumple_1,1,0,'C',0,'',0);
       $pdf->ln(5);
    }elseif ($i6 > 1) {
       $pdf->Cell(60,5,$array_titulos5[$i6],1,0,'C',1,'',0);
       $pdf->Cell(120,5,$cumple_1,1,0,'C',0,'',0);
       $pdf->ln(5);
   }
   $i6++;
}
$pdf->ln(5);

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba N°2: Unidireccionalidad</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$campana_extraccion_prueba_5_1 = mysqli_prepare($connect,"SELECT resultado, cumple  FROM campana_extraccion_prueba_5
  WHERE id_asignado = ? AND categoria = 2");

mysqli_stmt_bind_param($campana_extraccion_prueba_5_1, 'i', $id_asignado);
mysqli_stmt_execute($campana_extraccion_prueba_5_1);
mysqli_stmt_store_result($campana_extraccion_prueba_5_1);
mysqli_stmt_bind_result($campana_extraccion_prueba_5_1, $resultado_2, $cumple_2);

/*$pdf->writeHTMLCell(60, 5, 15, '', 'Condiciones', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 75, '', 'Resultado', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', 'Cumple', 1, 1, 0, true, 'C', true);*/

$pdf->Cell(60,5,'Condiciones',1,0,'C',1,'',0);
$pdf->Cell(60,5,'Resultado',1,0,'C',1,'',0);
$pdf->Cell(60,5,'Cumple',1,0,'C',1,'',0);
$pdf->ln(5);

$array_titulos6 = array('Ubicación de Prueba', 'Visualización de Flujo Reverso','Visualización de Puntos Muertos','Cumple Especificaciones','Cumple Prueba de Humo');


$i7 = 0;
while ($row = mysqli_stmt_fetch($campana_extraccion_prueba_5_1)) {

    if ($i7 < 3) {
        $pdf->Cell(60,5,$array_titulos5[$i7],1,0,'C',1,'',0);
        $pdf->Cell(60,5,$resultado_2,1,0,'C',0,'',0);
        $pdf->Cell(60,5,$cumple_2,1,0,'C',0,'',0);
        $pdf->ln(5);
        
    }elseif($i7 > 2){

        $pdf->Cell(60,5,$array_titulos6[$i7],1,0,'C',1,'',0);
        $pdf->Cell(120,5,$cumple_2,1,0,'C',0,'',0);
        $pdf->ln(5);

        }
        $i7++;
}

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Prueba de Medición de Nivel de Iluminación - DS N°594</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$campana_extraccion_prueba_4_2 = mysqli_prepare($connect,"SELECT punto_1, punto_2, punto_3, punto_4, punto_5, punto_promedio  FROM campana_extraccion_prueba_4
  WHERE id_asignado = ? AND categoria = 3");

mysqli_stmt_bind_param($campana_extraccion_prueba_4_2, 'i', $id_asignado);
mysqli_stmt_execute($campana_extraccion_prueba_4_2);
mysqli_stmt_store_result($campana_extraccion_prueba_4_2);
mysqli_stmt_bind_result($campana_extraccion_prueba_4_2, $punto_1_2, $punto_2_2, $punto_3_2, $punto_4_2, $punto_5_2, $punto_promedio_2);

  $pdf->Cell(27,5,'Punto de muestro',1,0,'C',1,'',0);
  $pdf->Cell(25,5,'1',1,0,'C',1,'',0);
  $pdf->Cell(25,5,'2',1,0,'C',1,'',0);
  $pdf->Cell(25,5,'3',1,0,'C',1,'',0);
  $pdf->Cell(25,5,'4',1,0,'C',1,'',0);
  $pdf->Cell(25,5,'5',1,0,'C',1,'',0);
  $pdf->Cell(28,5,'Promedio',1,0,'C',1,'',0);
 $pdf->ln(5);  
 $pdf->Cell(27,5,'Lux',1,0,'C',1,'',0);

while ($row = mysqli_stmt_fetch($campana_extraccion_prueba_4_2)) {
 
 $pdf->Cell(25,5,$punto_1_2,1,0,'C',0,'',0);
 $pdf->Cell(25,5,$punto_2_2,1,0,'C',0,'',0);
 $pdf->Cell(25,5,$punto_3_2,1,0,'C',0,'',0);
 $pdf->Cell(25,5,$punto_4_2,1,0,'C',0,'',0);
 $pdf->Cell(25,5,$punto_5_2,1,0,'C',0,'',0);
 $pdf->Cell(28,5,$punto_promedio_2,1,0,'C',0,'',0);
 $pdf->ln(5);

}


$imagen1 = <<<EOD
<style>
.linea{
  

}
</style>

<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><img src="../../imagenes/img_definidas/luz.jpg"></td>  
   </tr>
</table>

EOD;
$pdf->writeHTML($imagen1, true, false, false, false, '');

$linea = <<<EOD
<br><br>
<style>
.linea{
   height: 14px;
   color:white;
   background-color: rgb(0,79,135);
}
</style>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2>Equipos Utilizados en la Medición</h2></td>
   </tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$campana_extraccion_equipo3 = mysqli_prepare($connect,"SELECT b.marca_equipo, b.modelo_equipo, b.n_serie_equipo, c.numero_certificado, c.fecha_emision 
FROM equipos_mediciones a, equipos_cercal b , certificado_equipo c 
WHERE a.id_equipo = b.id_equipo_cercal AND a.id_asignado = ? AND c.id_equipo_cercal = b.id_equipo_cercal AND  a.tipo_prueba = 'Prueba luminosidad'");

mysqli_stmt_bind_param($campana_extraccion_equipo3, 'i', $id_asignado);
mysqli_stmt_execute($campana_extraccion_equipo3);
mysqli_stmt_store_result($campana_extraccion_equipo3);
mysqli_stmt_bind_result($campana_extraccion_equipo3, $marca3, $modelo3, $n_serie3, $numero_certificado3, $fecha_emision3);


$pdf->writeHTMLCell(30, 8, 15, '', 'Marca', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 45, '', 'Modelo', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 75, '', 'No° Serie', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 105, '', 'Certificado de Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 135, '', 'Última Calibración', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(30, 8, 165, '', 'Trazabilidad', 1, 1, 0, true, 'C', true);

$e= 1;
$contador3 = 0;
while ($row = mysqli_stmt_fetch($campana_extraccion_equipo3)) {

    if ($contador3 >7) {
      $pdf->AddPage('A4');
    }
    $pdf->writeHTMLCell(30, 5, 15, '', $marca3, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 45, '', $modelo3, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 75, '', $n_serie3, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 105, '', $numero_certificado3, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 135, '', $fecha_emision3, 1, 0, 0, true, 'C', true);
    $pdf->writeHTMLCell(30, 5, 165, '', '-', 1, 1, 0, true, 'C', true); 
    $contador3++;
}




$pdf->AddPage('A4');
/// pagina 5

$imagenes_campana = mysqli_prepare($connect,"SELECT tipo, url, nombre FROM image_camara_extraccion
  WHERE id_asignado = ? AND tipo = 5");

mysqli_stmt_bind_param($imagenes_campana, 'i', $id_asignado);
mysqli_stmt_execute($imagenes_campana);
mysqli_stmt_store_result($imagenes_campana);
mysqli_stmt_bind_result($imagenes_campana, $tipo, $url, $nombre);
mysqli_stmt_fetch($imagenes_campana);

$imagenes_campana2 = mysqli_prepare($connect,"SELECT tipo, url, nombre FROM image_camara_extraccion
  WHERE id_asignado = ? AND tipo = 6");

mysqli_stmt_bind_param($imagenes_campana2, 'i', $id_asignado);
mysqli_stmt_execute($imagenes_campana2);
mysqli_stmt_store_result($imagenes_campana2);
mysqli_stmt_bind_result($imagenes_campana2, $tipo2, $url2, $nombre2);
mysqli_stmt_fetch($imagenes_campana2);

$imagenes_campana3 = mysqli_prepare($connect,"SELECT tipo, url, nombre FROM image_camara_extraccion
  WHERE id_asignado = ? AND tipo = 7");

mysqli_stmt_bind_param($imagenes_campana3, 'i', $id_asignado);
mysqli_stmt_execute($imagenes_campana3);
mysqli_stmt_store_result($imagenes_campana3);
mysqli_stmt_bind_result($imagenes_campana3, $tipo3, $url3, $nombre3);
mysqli_stmt_fetch($imagenes_campana3);




if ($url == '') {
    $url_1 = '../../../../images/no_imagen.png';    
}else{
     $url_1 = '../../'.$url.'/'.$nombre; 
}

if ($url2 == '') {
    $url_2 = '../../../../images/no_imagen.png';    
}else{
     $url_2 = '../../'.$url2.'/'.$nombre; 
}

if ($url3 == '') {
    $url_3 = '../../../../images/no_imagen.png';    
}else{
     $url_3 = '../../'.$url3.'/'.$nombre; 
}

$linea13 = <<<EOD

<style>
.linea{
   height: 14 px;
   color:#fff;
   background-color: #1a53ff;
}
.imagen{
    height:200px
}
</style>
<br><br>
<table border="0">
   <tr >
        <td class="linea" align="center"><h2><b>Imagen Frontal</b></h2></td>  
        <td class="linea" align="center"><h2><b>Imagen de Placa</b></h2></td>  
   </tr>
   <tr>
        <td class="imagen" border="0"><img src="$url_1"></td>
        <td class="imagen" border="0"><img src="$url_2"></td>
   </tr>
</table>
<br>
<br>
<table border="0">
    <tr>
        <td class="linea" align="center"><b>Imagen Área de Trabajo</b></td> 
    </tr>    
    <tr>
        <td style="width: 70px;"></td>
        <td class="imagen" style="width: 498px;" border="0"><img src="$url_3"></td>
        <td style="width: 70px;"></td>
    </tr>
</table>
EOD;



$pdf->writeHTML($linea13, true, false, false, false, '');











//for($i = 0; $i <= 50; $i++){
// Largo o Ancho // Alto   //  posición
//    $pdf->writeHTMLCell(20, 5, 15, '', 'Descripción', 1, 0, 0, true, 'C', true);
  //  $pdf->writeHTMLCell(20, 5, 35, '', 'Marca', 1, 0, 0, true, 'C', true);
    //$pdf->writeHTMLCell(20, 5, 55, '', 'Modelo', 1, 0, 0, true, 'C', true);
    //$pdf->writeHTMLCell(60, 5, 75, '', $array_titulos[$i], 1, 1, 0, true, 'C', true);

    //if($i == 41){
        //$pdf->AddPage('A4');
      //  $pdf->writeHTMLCell(20, 5, 15, '', 'Descripción', 1, 0, 0, true, 'C', true);
        //$pdf->writeHTMLCell(20, 5, 35, '', 'Marca', 1, 0, 0, true, 'C', true);
        //$pdf->writeHTMLCell(20, 5, 55, '', 'Modelo', 1, 0, 0, true, 'C', true);
        //$pdf->writeHTMLCell(60, 5, 75, '', 'dato', 1, 1, 0, true, 'C', true);
    //}
//}
/*

$pdf->writeHTMLCell(35, 5, 30, '', 'N° de identificación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(55, 5, 65, '', 'Ubicación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(75, 5, 120, '', 'N° de serie', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(66, 5, 215, '', 'N° Certificado de Calibración', 1, 1, 0, true, 'C', true);*/




$pdf->Output($nombre_informe.'.pdf', 'I');

?>