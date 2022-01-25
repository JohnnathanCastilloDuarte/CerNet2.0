<?php
require('../../../../recursos/encabezadopdf.php');
require('../../../../config.ini.php');
$id_informe = $_GET['informe'];



$informes_generales = mysqli_prepare($connect,"SELECT a.nombre, b.id_mapeo,b.nombre, b.id_asignado,b.fecha_inicio,b.fecha_fin, c.id_servicio as servicio, e.numot, f.id_item, f.nombre, f.descripcion, f.id_tipo, g.nombre, 
g.direccion, a.solicitante
FROM informes_general a,mapeo_general b,item_asignado c, servicio d, numot e,item f,empresa g
WHERE id_informe = ?
AND a.id_mapeo = b.id_mapeo 
AND c.id_asignado = b.id_asignado 
AND c.id_servicio = d.id_servicio
AND d.id_numot = e.id_numot
AND c.id_item = f.id_item
AND f.id_empresa = g.id_empresa");
mysqli_stmt_bind_param($informes_generales, 'i', $id_informe);
mysqli_stmt_execute($informes_generales);
mysqli_stmt_store_result($informes_generales);
mysqli_stmt_bind_result($informes_generales,$nombre_informe_g,$id_mapeo_g,$nombre_mapeo_g,$id_asignado,$fecha_inicio_g,$fecha_fin_g,$c,$num_ot_g,$id_item_g, $nombre_item_g,$descripcion_item,$id_tipo_item_g,
$nombre_empresa_g, $direccion_empresa_g, $solicitante);

mysqli_stmt_fetch($informes_generales);

$nombre_informe = $nombre_informe_g;
$numot = $num_ot_g;
$a = "INFORME DE ANÁLISIS DE RIESGO";


switch ($id_tipo_item_g) {
		//bodega 
		case 1:
      $consultar_item_bodega = mysqli_prepare($connect,"SELECT direccion, codigo_interno, productos_almacena, largo, ancho, superficie, volumen, altura, tipo_muro, tipo_cielo, s_climatizacion, s_monitoreo, s_alarma, planos, analisis_riesgo, ficha_estabilidad, id_usuario, fecha_registro FROM item_bodega WHERE id_item = ?");
      mysqli_stmt_bind_param($consultar_item_bodega, 'i', $id_item_g);
      mysqli_stmt_execute($consultar_item_bodega);
      mysqli_stmt_store_result($consultar_item_bodega);
      mysqli_stmt_bind_result($consultar_item_bodega, $ubicacion_equipo, $codigo_interno, $productos_almacena, $largo, $ancho, $superficie, $volumen, $altura, $tipo_muro, $tipo_cielo, $s_climatizacion, $s_monitoreo, $s_alarma, $planos, 
                             $analisis_riesgo, $ficha_estabilidad, $id_usuario, $fecha_registro);
    
      mysqli_stmt_fetch($consultar_item_bodega);
    	break;

  
}
/*
//CONSULTAS PARA PUNTO 1
$obten_datos_empresa=mysqli_query($connect,"SELECT A.id_empresa, B.nombre_empresa, B.nombre_contacto, B.cargo_contacto, B.direccion, B.ciudad, B.pais 
FROM ordenes_de_trabajo as A, empresas as B 
WHERE num_ot='$num_ot' AND A.id_empresa=B.id_empresa");
$a=mysqli_fetch_array($obten_datos_empresa);
$id_empresa=$a['id_empresa'];
$empresa=$a['nombre_empresa'];
$contacto=$a['nombre_contacto'];
$cargo=$a['cargo_contacto'];
$direccion=$a['direccion'];
$ciudad=$a['ciudad'];
$pais_emp=$a['pais'];

$obten_codigo_informe=mysqli_query($connect,"SELECT no_reporte, hora_inicio_sensado, hora_fin_sensado, fecha_creacion FROM reportes WHERE num_ot='$num_ot' 
AND id_empresa='$id_empresa' AND equipo_bodega='$no_equipo' and no_reporte like'%INB%' AND id_servicio='$servicio'");
$b=mysqli_fetch_array($obten_codigo_informe);
$codigo_informe=$b['no_reporte'];
$creacion=$b['fecha_creacion'];
$emision=substr($creacion,8,2)."-".substr($creacion,5,2)."-".substr($creacion,0,4);

$trae_acta=mysqli_query($connect,"SELECT no_acta FROM equipos_asignados WHERE num_ot='$num_ot' AND id_equipo_bodega=$no_equipo");
$procesa_acta=mysqli_fetch_array($trae_acta);
$no_acta=$procesa_acta['no_acta'];

//CONSTRUYE PUNTOS DEL 1 AL 5
$obten_datos_equipo=mysqli_query($connect,"SELECT A.id_equipo_bodega, A.total_horas_sensado, A.intervalo_sensado, B.id_equipo_bodega, B.no_equipo_bodega,
B.tipo_equipo, B.ubicacion_equipo, B.marca, B.modelo, B.serie_num_interno, B.valor_seteado, B.limite_superior, B.limite_inferior, B.valor_set_hr, 
B.limite_sup_hr, B.limite_inf_hr, B.descrip_producto, B.superficie, B.volume, B.altura, B.infra_tipo_muro, B.infra_tipo_cielo, B.equipos_climatizacion, 
B.monitoreo_temp, B.monitoreo_temp_alarm, B.planos, B.orientacion_bodega, B.orientacion_recepcion, B.orientacion_despacho, B.num_puertas, B.puertas_emergencia, B.ventanas,
B.num_racks, B.racks_altura, B.luminarias, B.analisis_riesgos, B.fichas_estabilidad, B.racks_piso, B.cielo_pasa_luz, B.extractor, A.carga, 
A.fecha_hora_inicio, A.fecha_hora_fin, B.largo, B.ancho, A.info_min_hr, A.info_max_hr
FROM equipos_asignados as A, equipos_bodegas as B 
WHERE A.num_ot='$num_ot' AND A.id_equipo_bodega=B.id_equipo_bodega AND A.id_equipo_bodega='$no_equipo' AND id_servicio='$servicio'");
$c=mysqli_fetch_array($obten_datos_equipo);

$max_hr=$c['limite_sup_hr'];
//$max_hr_num=number_format($c['limite_sup_hr'],2);
$min_hr=$c['limite_inf_hr'];
//$min_hr_num=number_format($c['limite_inf_hr'],2);

$info_min_hr = $c['info_min_hr'];
$info_max_hr = $c['info_max_hr'];
  
if($info_max_hr == "on"){
  $max_hr = "No aplica";
}else{
   $max_hr = number_format($c['limite_sup_hr'],2);
}
if($info_min_hr == "on"){
  $min_hr = "No aplica";
}else{
   $min_hr=number_format($c['limite_inf_hr'],2);
}


$pre_start=$c['fecha_hora_inicio'];
$pre_end=$c['fecha_hora_fin'];

$start=substr($pre_start,8,2)."-".substr($pre_start,5,2)."-".substr($pre_start,0,4)." ".substr($pre_start,11,2).":".substr($pre_start,14,2).":".
substr($pre_start,17,2);

$end=substr($pre_end,8,2)."-".substr($pre_end,5,2)."-".substr($pre_end,0,4)." ".substr($pre_end,11,2).":".substr($pre_end,14,2).":".
substr($pre_end,17,2);

$numero_equipo=$c['no_equipo_bodega'];
$tipo_equipo=$c['tipo_equipo'];
$ubicacion_equipo=$c['ubicacion_equipo'];
$marca=$c['marca'];
$modelo=$c['modelo'];
$serie=$c['serie_num_interno'];
$set_temp=$c['valor_seteado'];
$max_temp=$c['limite_superior'];
$min_temp=$c['limite_inferior'];
$set_hr=$c['valor_set_hr'];
//$max_hr=$c['limite_sup_hr'];
//$min_hr=$c['limite_inf_hr'];
$descripcion=$c['descrip_producto'];
$horas=$c['total_horas_sensado'];
$dias=$horas/24;
$intervalo=$c['intervalo_sensado'];

$superficie=$c['superficie'];
$volume=$c['volume'];
$altura_bod=$c['altura'];
$infra_muro=$c['infra_tipo_muro'];
$infra_cielo=$c['infra_tipo_cielo'];
$climatizacion=$c['equipos_climatizacion'];
$monitoreo=$c['monitoreo_temp'];
$monitoreo_alarma=$c['monitoreo_temp_alarm'];
$planos=$c['planos'];
$orientacion_bodega=$c['orientacion_bodega'];
$orientacion_recep=$c['orientacion_recepcion'];
$orientacion_despacho=$c['orientacion_despacho'];
$num_puertas=$c['num_puertas'];
$puertas_emergencia=$c['puertas_emergencia'];
$ventanas=$c['ventanas'];
$num_racks=$c['num_racks'];
$racks_altura=$c['racks_altura'];
$luminarias=$c['luminarias'];
$analisis_riesgos=$c['analisis_riesgos'];
$fichas_estabilidad=$c['fichas_estabilidad'];
$pisos_rack=$c['racks_piso'];
$pasaluz=$c['cielo_pasa_luz'];
$extractor=$c['extractor'];
$carga_bod=$c['carga'];
$largo_bod=$c['largo'];
$ancho_bod=$c['ancho'];

$hvac=strpos($climatizacion,'HVAC');
if($hvac===false){$sistemahvac="SI: &nbsp;&nbsp;&nbsp; NO:&nbsp;&nbsp;X&nbsp;";}else{$sistemahvac="SI: &nbsp;&nbsp;X&nbsp;&nbsp;&nbsp; NO:&nbsp;";}

if($pasaluz>0){$hay_pasaluz="SI ".$pasaluz." L&iacute;neas";}else{$hay_pasaluz="NO";}

$secciona=explode(";",$descripcion);
$cuenta_materiales=count($secciona);

switch($cuenta_materiales)
{
	CASE 1:
	$descrip_material=$secciona[0];
	break;
	
	CASE 2:
	$descrip_material=$secciona[0]." y ".$secciona[1];
	break;
	
    CASE 3:
	$descrip_material=$secciona[0].", ".$secciona[1]." y ".$secciona[2];
	break;

    CASE 4:
	$descrip_material=$secciona[0].", ".$secciona[1].", ".$secciona[2]." y ".$secciona[3];
	break;

    CASE 5:
	$descrip_material=$secciona[0].", ".$secciona[1].", ".$secciona[2].", ".$secciona[3]." y ".$secciona[4];
	break;

    CASE 6:
	$descrip_material=$secciona[0].", ".$secciona[1].", ".$secciona[2].", ".$secciona[3].", ".$secciona[4]." y ".$secciona[5];
	break;

    CASE 7:
	$descrip_material=$secciona[0].", ".$secciona[1].", ".$secciona[2].", ".$secciona[3].", ".$secciona[4].", ".$secciona[5]." y ".$secciona[6];
	break;

    CASE 8:
	$descrip_material=$secciona[0].", ".$secciona[1].", ".$secciona[2].", ".$secciona[3].", ".$secciona[4].", ".$secciona[5].", ".$secciona[6]." y ".$secciona[7];
	break;
}



$total_alturas=mysqli_query($connect,"SELECT DISTINCT altura FROM parametros_ubicacion_sensor where num_ot='$num_ot' AND id_equipo='$no_equipo' AND altura<>'N/A' AND id_servicio='$servicio'");
$alturas_generales=mysqli_num_rows($total_alturas);

//MANDA A LLAMAR CADA UNO DE LAS ALTURAS DISPONIBLES PARA LA OT Y EQUIPO A EVALUAR
$trae_alturas_b=mysqli_query($connect,"SELECT * FROM parametros_ubicacion_sensor WHERE num_ot='$num_ot' AND id_equipo='$no_equipo' AND posicion='B' AND id_servicio='$servicio' ORDER BY altura DESC");
$alt_b=mysqli_fetch_array($trae_alturas_b);
$zona_alt_b=$alt_b['descripcion'];
$altura_b=$alt_b['altura'];if($altura_b=='N/A'){$zona_alt_b="";}else{$zona_alt_b=" y Zona ".$alt_b['descripcion'];}

$trae_alturas_m=mysqli_query($connect,"SELECT * FROM parametros_ubicacion_sensor WHERE num_ot='$num_ot' AND id_equipo='$no_equipo' AND posicion='M' AND id_servicio='$servicio' ORDER BY altura DESC");
$alt_m=mysqli_fetch_array($trae_alturas_m);
$zona_alt_m=$alt_m['descripcion']; 
$altura_m=$alt_m['altura'];if($altura_m=='N/A'){$zona_alt_m="";}else{$zona_alt_m="Zona ".$alt_m['descripcion'].", ";}

$trae_alturas_m2=mysqli_query($connect,"SELECT * FROM parametros_ubicacion_sensor WHERE num_ot='$num_ot' AND id_equipo='$no_equipo' AND posicion='M2' AND id_servicio='$servicio' ORDER BY altura DESC");
$alt_m2=mysqli_fetch_array($trae_alturas_m2);
$zona_alt_m2=$alt_m2['descripcion'];
$altura_m2=$alt_m2['altura'];if($altura_m2=='N/A'){$zona_alt_m2="";}else{$zona_alt_m2="Zona ".$alt_m2['descripcion'].", ";}

$trae_alturas_m3=mysqli_query($connect,"SELECT * FROM parametros_ubicacion_sensor WHERE num_ot='$num_ot' AND id_equipo='$no_equipo' AND posicion='M3' AND id_servicio='$servicio' ORDER BY altura DESC");
$alt_m3=mysqli_fetch_array($trae_alturas_m3);
$zona_alt_m3=$alt_m3['descripcion'];
$altura_m3=$alt_m3['altura'];if($altura_m3=='N/A'){$zona_alt_m3="";}else{$zona_alt_m3="Zona ".$alt_m3['descripcion'].", ";}

$trae_alturas_m4=mysqli_query($connect,"SELECT * FROM parametros_ubicacion_sensor WHERE num_ot='$num_ot' AND id_equipo='$no_equipo' AND posicion='M4' AND id_servicio='$servicio' ORDER BY altura DESC");
$alt_m4=mysqli_fetch_array($trae_alturas_m4);
$zona_alt_m4=$alt_m4['descripcion'];
$altura_m4=$alt_m4['altura'];if($altura_m4=='N/A'){$zona_alt_m4="";}else{$zona_alt_m4="Zona ".$alt_m4['descripcion'].", ";}

$trae_alturas_m5=mysqli_query($connect,"SELECT * FROM parametros_ubicacion_sensor WHERE num_ot='$num_ot' AND id_equipo='$no_equipo' AND posicion='M5' AND id_servicio='$servicio' ORDER BY altura DESC");
$alt_m5=mysqli_fetch_array($trae_alturas_m5);
$zona_alt_m5=$alt_m5['descripcion']; 
$altura_m5=$alt_m5['altura'];if($altura_m5=='N/A'){$zona_alt_m5="";}else{$zona_alt_m5="Zona ".$alt_m5['descripcion'].", ";}

$trae_alturas_m6=mysqli_query($connect,"SELECT * FROM parametros_ubicacion_sensor WHERE num_ot='$num_ot' AND id_equipo='$no_equipo' AND posicion='M6' AND id_servicio='$servicio' ORDER BY altura DESC");
$alt_m6=mysqli_fetch_array($trae_alturas_m6);
$zona_alt_m6=$alt_m6['descripcion']; 
$altura_m6=$alt_m6['altura'];if($altura_m6=='N/A'){$zona_alt_m6="";}else{$zona_alt_m6="Zona ".$alt_m6['descripcion'].", ";}

$trae_alturas_m7=mysqli_query($connect,"SELECT * FROM parametros_ubicacion_sensor WHERE num_ot='$num_ot' AND id_equipo='$no_equipo' AND posicion='M7' AND id_servicio='$servicio' ORDER BY altura DESC");
$alt_m7=mysqli_fetch_array($trae_alturas_m7);
$zona_alt_m7=$alt_m7['descripcion']; 
$altura_m7=$alt_m7['altura'];if($altura_m7=='N/A'){$zona_alt_m7="";}else{$zona_alt_m7="Zona ".$alt_m7['descripcion'].", ";}

$trae_alturas_a=mysqli_query($connect,"SELECT * FROM parametros_ubicacion_sensor WHERE num_ot='$num_ot' AND id_equipo='$no_equipo' AND posicion='A' AND id_servicio='$servicio' ORDER BY altura DESC");
$alt_a=mysqli_fetch_array($trae_alturas_a);
$zona_alt_a=$alt_a['descripcion']; 
$altura_a=$alt_a['altura'];if($altura_a=='N/A'){$zona_alt_a="";}else{$zona_alt_a="Zona ".$alt_a['descripcion'].", ";}


$contar_sensores=mysqli_query($connect,"SELECT COUNT(sensor) as cuenta_sensor FROM sensores_asignados WHERE numero_ot='$num_ot' AND equipo_bodega='$no_equipo'
 AND id_servicio='$servicio' AND sensor IS NOT NULL");
$contador=mysqli_fetch_array($contar_sensores);
$total_sensores=$contador['cuenta_sensor'];


$obten_mediciones=mysqli_query($connect,"SELECT COUNT(no_ot) as conteo FROM registro_sensores WHERE no_ot='$num_ot' AND no_equipo_bodega='$no_equipo' AND id_servicio='$servicio'");
$obten_divisor=mysqli_query($connect,"SELECT DISTINCT no_sensor FROM registro_sensores WHERE no_ot='$num_ot' AND no_equipo_bodega='$no_equipo' AND id_servicio='$servicio'");
$e=mysqli_fetch_array($obten_mediciones);
$registros=$e['conteo'];
$divisor=mysqli_num_rows($obten_divisor);
$mediciones=$registros/$divisor;


*/
// ---------------------------------------------------------

// set font
$pdf->SetFont('freesans', 'R', 8.2);

// add a page
$pdf->AddPage();

$txt = <<<EOD

<style>
table 
{
  border-collapse: collapse;
  width: 100%;
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
}

tr:nth-child(even) 
{
	background-color: #f2f2f2;
}
</style>

<table>
<tr><td width="13%" align="right">Solicitante:</td><td width="87%" align="left">$nombre_empresa_g</td></tr>
<tr><td width="13%" align="right">Dirección:</td><td width="87%" align="left">$direccion_empresa_g</td></tr>
<tr><td width="13%" align="right">Atención:</td><td width="87%" align="left">$solicitante</td></tr>
<tr><td width="13%" align="right">Fecha Emisión:</td><td width="87%" align="left">$fecha_inicio_g</td></tr>
</table><br><br>

<table><tr><td bgcolor="#DDDDDD"><H3><strong>1.0 ANTECEDENTES DE LA INSPECCION</strong></H3></td></tr></table><br><br>
<table>
<tr><td width="25%" align="right">Lugar:</td><td align="left" width="75%">$ubicacion_equipo</td></tr>
<tr><td width="25%" align="right">Fecha de medición:</td><td align="left" width="75%">$fecha_inicio_g - $fecha_fin_g</td></tr>
<tr><td width="25%" align="right">Acta de inspección:</td><td align="left" width="75%">$no_acta</td></tr>
</table><br><br>

<table><tr><td bgcolor="#DDDDDD"><H3><strong>2.0 IDENTIFICACIÓN DE EQUIPO Y/O ÁREA</strong></H3></td></tr></table><br><br>
<table>
<tr><td width="25%" align="right">Descripción:</td><td align="left" width="75%">$descripcion_item</td></tr>
<tr><td width="25%" align="right">Marca:</td><td align="left" width="75%">$marca</td></tr>
<tr><td width="25%" align="right">Modelo:</td><td align="left" width="75%">$modelo</td></tr>
<tr><td width="25%" align="right">Identificación:</td><td align="left" width="75%">$codigo_interno</td></tr>
</table><br><br>

<table><tr><td bgcolor="#DDDDDD"><H3><strong>3.0 NORMATIVA</strong></H3></td></tr></table><br><br>

<table>
<tr><td width="25%" align="right">Normativa técnica N° 147 del MINSAL:</td>
<td align="left" width="75%">"Buenas Prácticas de almacenamiento y distribución para droguerías y depósitos de productos de uso humano"</td>
</tr>

<tr><td width="25%" align="right">WHO 961-2015:</td>
<td align="left" width="75%">Temperature mapping of storage areas</td></tr>

<tr><td width="25%" align="right">WHO Technical report series 992,2015:</td>
<td align="left" width="75%">Suplemento 8 del anexo 9; "Temperature mapping of storage areas".</td></tr>

<tr><td width="25%" align="right">USP 41 C1079:</td>
<td align="left" width="75%">Good storage and distribution practices for drug products</td></tr>

<tr><td width="25%" align="right">RESOLUCIÓN EXENTA 6590 ISP:</td>
<td align="left" width="75%">"Guía para realizar el mapeo térmico de áreas de almacenamiento" del 14-12-2018</td></tr>
</table><br><br>

<table><tr><td bgcolor="#DDDDDD"><H3><strong>4.0 ANTECEDENTES PROPORCIONADOS POR EL SOLICITANTE</strong></H3></td></tr></table><br><br>
<table>
<tr><td width="25%" align="right">Plano de la Bodega y N° rev.:</td><td align="left" width="75%">$planos</td></tr>

<tr><td width="25%" align="right">Especificación de temperatura:</td>
<td align="left" width="75%">Mínima $min_temp °C- Máxima $max_temp °C</td></tr>

<tr><td width="25%" align="right">Especificación de humedad:</td>
<td align="left" width="75%">Mínima $min_hr % - Máxima $max_hr %</td></tr>

<tr><td width="25%" align="right">Productos que almacenan:</td><td align="left" width="75%">$descrip_material</td></tr>
<tr><td width="25%" align="right">Otros:</td><td align="left" width="75%">-</td></tr>
</table><br><br>

<table><tr><td bgcolor="#DDDDDD"><H3><strong>5.0 ANÁLISIS DE RIESGOS - INFORMACIÓN BASE</strong></H3></td></tr></table><br><br>
<table>
<tr><td width="25%" align="right">Orientación principal de la bodega:</td><td align="left" width="75%">$orientacion_bodega</td></tr>
<tr><td width="25%" align="right">Orientación de recepción:</td><td align="left" width="75%">$orientacion_recep</td></tr>
<tr><td width="25%" align="right">Orientación de despacho:</td><td align="left" width="75%">$orientacion_despacho</td></tr>
<tr><td width="25%" align="right">Número de puertas:</td><td align="left" width="75%">$num_puertas</td></tr>
<tr><td width="25%" align="right">Salidas de emergencia:</td><td align="left" width="75%">$puertas_emergencia</td></tr>
<tr><td width="25%" align="right">Número de ventanas:</td><td align="left" width="75%">$ventanas</td></tr>
<tr><td width="25%" align="right">Cantidad de líneas de rack/estantes:</td><td align="left" width="75%">$num_racks</td></tr>
<tr><td width="25%" align="right">Número de niveles de los estantes:</td><td align="left" width="75%">$pisos_rack</td></tr>
<tr><td width="25%" align="right">Altura máxima de racks:</td><td align="left" width="75%">$racks_altura</td></tr>
<tr><td width="25%" align="right">Cuenta con sistema HVAC:</td><td align="left" width="75%">$sistemahvac</td></tr>
<tr><td width="25%" align="right">Cuenta con sistema de extracción:</td><td align="left" width="75%">$extractor</td></tr>
<tr><td width="25%" align="right">Cuenta con cielo pasa luz:</td><td align="left" width="75%">$hay_pasaluz</td></tr>
<tr><td width="25%" align="right">Cantidad de luminarias:</td><td align="left" width="75%">$luminarias</td></tr>
<tr><td width="25%" align="right">Tipo de pared:</td><td align="left" width="75%">$infra_muro</td></tr>
<tr><td width="25%" align="right">Tipo de cielo:</td><td align="left" width="75%">$infra_cielo</td></tr>
<tr><td width="25%" align="right">Dimensiones de la bodega:</td>
<td align="left" width="75%">Altura $altura_bod mts / Superficie: $superficie m2 / Volumen: $volume m3<br>
														Largo: $largo_bod mts. / Ancho: $ancho_bod mts.</td></tr>
</table><br><br>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');
$pdf->AddPage();
$pdf->SetFont('freesans', 'R', 8.5);
$txt = <<<EOD

<style>
table 
{
  border-collapse: collapse;
  width: 100%;
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
}

tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>6.0 PRUEBA DE MAPEO TÉRMICO</strong></H3></td></tr></TABLE>


<H3>6.1 OBJETIVO</H3>
<SPAN STYLE="text-align: justify;">Comprobar que las temperaturas en la cual se almacenan los productos se mantengan
dentro de los límites establecidos, proporcionando evidencia documental que
demuestre información general para un buen almacenamiento y las prácticas de
distribución, para asegurar que los productos lleguen al usuario final (los
profesionales y los pacientes / consumidores) con calidad intacta.</SPAN>

<H3>6.2 REVISIÓN NORMATIVA</H3>
<SPAN STYLE="text-align: justify;">Según el suplemento técnico OMS Reporte Técnico N°961- anexo 9 “Model guidance for
the storage and transport of time- temperature – sensitive pharmaceutical products”
dentro del punto 5- ubicación de sensores de monitoreo se recomienda según el layout
del área del almacenamiento:</SPAN>

<UL>
<LI CLASS="biglist">Largo y ancho: se recomienda la utilización de una “rejilla” a lo largo y ancho del
plano, para la distribución de los sensores tomando entre 5- 10 metros de distancia
lineal entre cada sensor. Si son bodegas con mayores longitudes de
almacenamiento pueden colocarse los sensores a una distancia lineal de 20 o 30
metros entre ellos.</LI>

<LI CLASS="biglist">Altura: según la altura de la bodega los sensores deben instalarse de la siguiente
manera. Para alturas máximas de 3,6 metros o menos considerar tres alturas, uno
a nivel del suelo, nivel medio a 1,2 metros y nivel alto a 3 metros. Para alturas
superiores a los 3,6 metros considerar un nivel bajo al suelo, nivel medio (múltiplos)
y nivel alto. Por ejemplo, para una bodega de 6 metros se recomienda colocar a
nivel bajo 0,3 metros; nivel medio 1 a 1,8 metros; medio 2 a 3,6 metros; alto a 5,4
metros.</LI>

<LI CLASS="biglist">Los sensores de almacenamiento deben ubicarse donde están almacenados los
productos o donde se planea almacenar.</LI>
</UL>

<SPAN STYLE="text-align: justify;">Según la norma técnica N°147 de Buenas Prácticas de Almacenamiento y Distribución
para droguerías y depósitos de productos de uso humano, se detalla en
el punto 4.17 Condiciones de almacenamiento lo siguiente:</SPAN>


<UL>

<LI CLASS="biglist">“Las condiciones de almacenamiento de materiales y productos
deben estar en conformidad con lo señalado en sus rótulos o etiquetas, que se base
en los resultados de las pruebas de estabilidad y lo aprobado en el respectivo
registro sanitario, según corresponda según lo señalado a continuación:


	<UL>
	<br><br><SPAN STYLE="text-align: justify;">Almacenamiento y condiciones de etiquetado</SPAN>
	<br><SPAN STYLE="text-align: justify;"><STRONG>Condiciones normales de almacenamiento:</STRONG></SPAN>
	
	<LI CLASS="smallist">Los locales de almacenamiento deben estar secos y bien ventilados, a temperatura
	ambiente de 15-25°C, o, dependiendo de las condiciones climáticas, hasta 30°C en
	periodos breves.</LI>
	<LI CLASS="smallist">Se debe evitar los olores extraños, indicios de contaminación y luz intensa.</LI>

	<br><br><SPAN STYLE="text-align: justify;"><STRONG>Instrucciones definidas de almacenamiento:</STRONG></SPAN>
	<LI CLASS="smallist">Los productos deben ser almacenados bajo condiciones definidas
	que requieren aprobadas instrucciones de almacenamiento. A menos que se
	indique lo contrario (por ejemplo, productos que requieren mantener
	almacenamiento continuo de frío, productos refrigerados, etc.). Las desviaciones
	pueden ser toleradas sólo durante interrupciones de corta duración, por ejemplo,
	durante el transporte local, siempre y cuando la estabilidad del producto así lo
	permita.</LI>
	</UL>
</LI>
</UL>


<H3>6.3 METODOLOGÍA</H3>
<SPAN STYLE="text-align: justify;">Proceso:</span>
<UL>
<LI CLASS="biglist">Se realiza una inspección visual de la bodega donde se determinan las áreas
críticas que pueden afectar las temperaturas de los productos almacenados.</LI>

<LI CLASS="biglist">Se realiza análisis de riesgo para determinar áreas críticas.</LI>

<LI CLASS="biglist">La bodega se encuentra al momento de la instalación de sensores con $carga_bod% de
carga aproximadamente.</LI>

<LI CLASS="biglist">Por altura de la bodega y los estantes instalados en ella se consideran $alturas_generales niveles de
ubicación de sensores, a fin de evaluar el gradiente de temperatura, $zona_alt_a $zona_alt_m7 $zona_alt_m6 $zona_alt_m5 $zona_alt_m4 
$zona_alt_m3 $zona_alt_m2 $zona_alt_m $zona_alt_b.</LI>

<LI CLASS="biglist">Se determinan entonces, teniendo en cuenta los puntos más críticos mencionados
anteriormente la instalación de <strong> $total_sensores sensores</strong> ubicados al interior de la $numero_equipo de
almacenamiento de $descrip_material, para evaluar comportamiento bajo criterio de sobrepasar las temperaturas
límite de $min_temp °C a $max_temp °C definidas por el solicitante.</LI>

<LI CLASS="biglist">La posición de los sensores se encuentra registrada en el punto “Descripción de
distribución de sensores”.</LI>

<LI CLASS="biglist">Se verificó el correcto estado de calibración y funcionamiento de los sensores
datalogger del equipo de validación. Los datalogger realizan medición de
temperatura y humedad relativa.</LI>

<LI CLASS="biglist">Las mediciones de Humedad relativa son de carácter informativo.</LI>
</UL>


<H3>6.4 CRITERIO DE ACEPTACIÓN</H3>

<SPAN STYLE="text-align: justify;"><STRONG>WHO 961</STRONG>: Un estudio de mapeo mide las fluctuaciones de temperatura. A partir de estos
datos, el analista puede identificar las temperaturas mínimas y máximas que ocurren en
el mapa del área durante el período de estudio.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">La temperatura mínima se refiere a la temperatura más baja registrada en el espacio
mapeado durante el período de estudio; la temperatura máxima se refiere a la más alta
registrada durante el mismo período. Cualquiera o ambas de estas temperaturas pueden
estar fuera de los criterios de aceptación especificados para la droguería.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">Un punto frío se refiere a las temperaturas más bajas registradas en el área durante el
período de estudio, pero estas temperaturas más bajas se mantienen dentro de lo
especificado en el rango de temperatura de la bodega, con un rango de temperatura
especificado por cliente de +$min_temp °C a +$max_temp °C.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">Un punto caliente se refiere a las temperaturas más altas registradas en el área durante
el período de estudio, pero estas temperaturas más altas permanecen dentro del rango
de temperatura especificado en el rango de temperatura por cliente de +$min_temp °C a +$max_temp °C.
El propósito de determinar los puntos calientes y fríos es identificar las ubicaciones
donde los sensores del sistema de monitoreo deben ubicarse preferentemente. Los
puntos calientes y los puntos fríos deben determinarse estacionalmente, ya que, pueden
ser significativamente diferentes en verano y en invierno.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">Nota: También es importante observar el nivel alto y tendencias bajas en lugar de solo
las temperaturas más altas y bajas. Los valores promedio pueden ser útiles para ayudar
a confirmar verdaderos puntos calientes y fríos.</SPAN >

<SPAN STYLE="text-align: justify;">El resultado final y el propósito de un ejercicio de mapeo es la implementación de las
recomendaciones del informe. Una discusión detallada de la implementación está fuera
del alcance de este documento, pero podría incluir cualquiera de los siguientes
resultados:</SPAN>

<UL>
<LI CLASS="biglist">Un dibujo o diagrama que muestra dónde se pueden almacenar <!--TTSPP-->de forma
segura en el espacio que se ha mapeado: es posible que haya alguna zonificación
involucrada. Por ejemplo, productos que no se ven afectados por congelación podría
asignarse a partes de una cámara frigorífica donde el estudio de mapeo ha mostrado
algún riesgo de congelación.</LI>

<LI CLASS="biglist">Asignación de bahías de pallets a categorías específicas <!--de TTSPP-->en el sistema de
gestión de almacén para controlar dónde existencias están posicionados.
- Reposicionamiento de sensores de monitoreo de temperatura y/o sensores de control
ambiental.</LI>

<LI CLASS="biglist">Ajuste de las salidas de aire para reducir la estratificación de la temperatura y/o
minimice los puntos fríos y calientes.
- Actualización de sistemas mecánicos para mejorar el control de temperatura y
rendimiento.</LI>

<LI CLASS="biglist">Una decisión de usar el espacio para otros fines porque no es adecuado para el
almacenamiento.<!--de TTSPPs.--></LI>
</UL>

<!--<SPAN STYLE="text-align: justify;"><STRONG>Nota: TTSPP</STRONG> - Producto farmacéutico sensible al tiempo y a la temperatura.</SPAN><BR><BR>-->

<SPAN STYLE="text-align: justify;"><STRONG>USP 41 C1079</STRONG>: El proceso de mapeo térmico ayudará a determinar cuándo podrían
ocurrir excursiones y son útiles cuando los fabricantes de productos
desarrollen un plan para tratarlas. Las alarmas deben usarse para revelar excursiones
ambientales durante las operaciones. Puede admitirse excursiones de temperatura por
períodos breves fuera de las condiciones de etiqueta de almacenamiento respectivas
siempre que existan datos de estabilidad y justificación científica / técnica que
demuestren que la calidad del producto no se ve afectada (consulte la GUI 0069 de
Health Canada titulada Guías para el control de temperatura de productos durante almacenamiento y transporte; 2011).</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">El MKT es la temperatura calculada única a la cual la cantidad total de degradación
durante un período particular es igual a la suma de las degradaciones individuales que
ocurrirían a diversas temperaturas. MKT puede considerarse como una temperatura de
almacenamiento isotérmico que simula los efectos no isotérmicos de la variación de la
temperatura de almacenamiento. No es una simple media aritmética. Las temperaturas
usadas para calcular MKT se pueden recoger convenientemente usando dispositivos
electrónicos que miden temperaturas a intervalos frecuentes (por ejemplo, cada 15
minutos).</SPAN><BR><BR>


EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$txt = <<<EOD

<SPAN STYLE="text-align: justify;">La media aritmética de las temperaturas altas y bajas semanales se usan luego en el
cálculo de MKT. MKT se calcula mediante la siguiente ecuación (derivada de la ecuación
de Arrhenius):</SPAN><BR>
<table border="0">
<tr>
  <td width="31%"></td>
  <td width="50%"><div class="centrar"><img src="../images/formula.png" width="400" style="text-align:center;"></div><br></td>
  <td></td>
</tr>
</table>


<SPAN STYLE="text-align: justify;">En el que ΔH es el calor de activación, lo que equivale a 83.144 kJ por mol (a menos
que haya información más precisa disponible de estudios experimentales); R es la
constante universal de los gases, que es igual a 8,3144 × 10-3 kJ por grado por mol; T1
es la temperatura media, en grados Kelvin, durante el primer periodo de tiempo, por
ejemplo, la primera semana; T2 es la temperatura media, en grados Kelvin, durante el
segundo período de tiempo.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">La posesión de un medicamento puede ocurrir como parte de las prácticas de
almacenamiento y distribución. Los productos en la cadena de suministro
de distribución se pueden mantener a temperaturas fuera de los requisitos de
almacenamiento etiquetados según lo determinado por un estudio de estabilidad
apropiado.<SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">Los productos almacenados en condiciones de almacén o en modos de
transporte pueden experimentar excursiones de sus rangos de temperatura aceptables.
Cada excursión de producto debe evaluarse para determinar el efecto final del producto.
Los medios de evaluación deben ser científicamente sólidos, con justificación técnica
documentada de que la integridad del producto farmacéutico no se ha visto afectada. Un
método de análisis para el producto farmacéutico almacenado fuera de sus respectivas
condiciones de almacenamiento de etiquetas es el uso de un cálculo MKT. Debido a que
MKT expresa el estrés térmico acumulado que experimenta un producto farmacéutico, 
se considera una práctica aceptable para el almacenamiento, y se deduce que debe
considerarse para las excursiones de tránsito en el proceso de distribución.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">El cálculo debe justificarse para su uso con excursiones de distribución al confirmar que
la característica de estabilidad de limitación del producto sigue una cinética de primer
orden sobre el rango de temperatura encontrado. Las directrices de prueba de
estabilidad de ICH definen MKT como una temperatura derivada "única" que, si se
mantiene durante un período definido, ofrecerá el mismo desafío térmico a un producto
farmacéutico que se habría experimentado en un rango de temperaturas tanto altas
como bajas para un período definido equivalente.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">El análisis MKT debe basarse en buena ciencia y debe tener en cuenta la integridad del
producto.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">El MKT calculado no es sensible al impacto de las excursiones que pueden ocurrir si la
línea de base es un período de tiempo prolongado, como un segmento de
almacenamiento o toda la vida útil del producto farmacéutico. Para periodos de tiempo
iniciales más cortos, como segmentos de transporte, una excursión puede tener un
impacto significativo en el MKT resultante para ese segmento; sin embargo, esto no
tendría necesariamente un impacto significativo en la calidad del producto.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">El análisis MKT puede usarse para condiciones de almacenamiento que han excedido
los parámetros aceptables para un producto farmacéutico, durante un corto período de
tiempo y no pretende ser una medida para el almacenamiento a largo plazo.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">Conocer el MKT para una excursión es útil para evaluar el impacto potencial en la calidad
del producto. Sin embargo, también es esencial conocer los límites de temperatura
superior e inferior de cualquier excursión. Si estas temperaturas extremas están fuera
de los datos de estabilidad disponibles, puede que no sea posible predecir el impacto de
calidad de la excursión con confianza independientemente del MKT. Aunque a las
temperaturas más altas se les da un mayor peso en el cálculo, el cálculo de MKT para
el producto no congelado que se congela por cualquier período de tiempo puede no dar
como resultado una temperatura aceptable, aunque el producto no esté adulterado.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">A temperaturas más altas, la cinética de degradación puede cambiar o pueden ocurrir
nuevas reacciones de degradación; a temperaturas más bajas (cerca de la congelación)
puede producirse un cambio de fase que se sabe que tiene un impacto negativo en la
calidad de algunos productos farmacológicos (por ejemplo, algunas proteínas y
vacunas).</SPAN><BR><BR>



EOD;

$pdf->writeHTML($txt, true, false, false, false, '');
$pdf->AddPage();

$txt = <<<EOD

<H3>6.5 DESCRIPCIÓN DE DISTRIBUCIÓN DE SENSORES</H3><br>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

////////////////////////////////////////////////////////CICLO DE IMPRESION DE ALTURAS ////////////////////////////////////////////////////////////////////////
$ciclo_alturas=mysqli_query($connect,"SELECT DISTINCT altura, descripcion, CAST(altura AS DECIMAL(4,2)) as alt 
							FROM parametros_ubicacion_sensor WHERE num_ot='$num_ot' AND id_equipo='$no_equipo'
							 AND altura <> 'N/A' AND id_servicio='$servicio' ORDER BY alt DESC");

while($ciclo=mysqli_fetch_array($ciclo_alturas))
{
$alturas_ciclo=$ciclo['altura'];
$descrip_ciclo=$ciclo['descripcion'];
$imagen_alta=mysqli_query($connect,"SELECT DISTINCT A.no_reporte as reporte FROM reportes AS A, parametros_ubicacion_sensor AS B 
WHERE A.num_ot='$num_ot' AND A.num_ot=B.num_ot AND B.id_equipo='$no_equipo' and B.altura='$alturas_ciclo' and A.altura=B.altura 
AND A.no_reporte LIKE '%-TEM-%' AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'");
$exec_imagen=mysqli_fetch_array($imagen_alta);
$nom_imagen="images/".$num_ot."/servicio_".$servicio."/".$exec_imagen['reporte'].".jpg";

$txt = <<<EOD

<style>
table 
{
  border-collapse: collapse;
  width: 100%;
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
}

tr:nth-child(even) 
{
	background-color: #f2f2f2;
}
</style>

<table><tr><td><H4><STRONG>Ubicación de sensores en mapeo de Temperatura (°C) y Humedad Relativa (%Hr) en su Zona $descrip_ciclo</STRONG></H4></td></tr>
 
<tr><td><br><br><img src="$nom_imagen" width="350"><br><br></td></tr></table>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(170, 170, 170)));
//TITULOS
$pdf->writeHTMLCell(18, 5, 15, '', '<strong>Posición</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(36, 5, 33, '', '<strong>N° de identificación</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(45, 5, 69, '', '<strong>Ubicación / Altura</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 5, 114, '', '<strong>N° de serie</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(51, 5, 144, '', '<strong>N° Certificado de Calibración</strong>', 1, 1, 0, true, 'C', true);

$trae_datos=mysqli_query($connect,"SELECT A.sensor AS nosen, A.posicion AS nom_pos, A.altura AS alt, A.numero AS no_pos, B.numero_certificado AS num_cert, B.serie AS serial, 
						CAST(A.altura AS DECIMAL(4,2)) as altu, LENGTH(numero) as largo, B.fecha_certificado FROM sensores_asignados as A, certificacion_sensores as B  
						WHERE A.numero_ot='$num_ot' AND A.equipo_bodega='$no_equipo' AND A.id_empresa='$id_empresa' AND A.sensor=B.numero_sensor AND A.altura='$alturas_ciclo'
						AND A.id_servicio='$servicio' AND B.fecha_certificado<'$pre_end' ORDER BY largo ASC, altu DESC, numero ASC, fecha_certificado DESC");

$anterior="";
while($creame=mysqli_fetch_array($trae_datos))
{
	$ciclo_num=$creame['no_pos'];
	$ciclo_sensor=$creame['nosen'];
	$ciclo_ubic=$creame['nom_pos'];
	$ciclo_alt=$creame['alt'];
	$ciclo_serie=$creame['serial'];	
	$ciclo_cert=$creame['num_cert'];
if($ciclo_sensor<>$anterior)
{
$pdf->writeHTMLCell(18, 5, 15, '', $ciclo_num, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(36, 5, 33, '', $ciclo_sensor, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(45, 5, 69, '', 'Zona '.$ciclo_ubic.', '.$ciclo_alt.' mts.', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 5, 114, '', $ciclo_serie, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(51, 5, 144, '', $ciclo_cert, 1, 1, 0, true, 'C', true);
}
$anterior=$ciclo_sensor;
}
$pdf->AddPage();
}

////////////////////////////////////////////////////////FIN DEL CICLO DE IMPRESION DE ALTURAS //////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////COMPARATIVAS DE TEMPERATURA///////////////////////////////////////////////////////////////////////

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(200, 200, 200)));
//TITULOS
$pdf->writeHTMLCell(70, 5, 15, 45, '<strong>Parámetro</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(110, 5, 85, 45, '<strong>Resultados de Mediciones</strong>', 1, 1, 0, true, 'C', true);


/*TIEMPO DE INICIO DEL PERIODO DE PRUEBA (SEGUN LECTURA DE SENSORES) 
TEMPERATURA PROMEDIO EN BODEGA DURANTE PERIODO DE ESTUDIO*/
$las_alturas=mysqli_query($connect,"SELECT A.altura, A.posicion, AVG(CAST(B.dato as DECIMAL(4,2))) AS promedio, CAST(altura AS DECIMAL(4,2)) as alt FROM sensores_asignados AS A, registro_sensores AS B 
						  WHERE A.numero_ot='$num_ot' AND A.equipo_bodega='$no_equipo' AND A.sensor=B.no_sensor AND A.equipo_bodega=B.no_equipo_bodega 
						  AND A.numero_ot=B.no_ot AND A.id_servicio=B.id_servicio AND B.id_servicio='$servicio' GROUP BY A.altura, A.posicion ORDER BY alt DESC");
						  
$el_promedio_gen=mysqli_query($connect,"SELECT AVG(CAST(B.dato as DECIMAL(4,2))) AS promedio FROM sensores_asignados AS A, registro_sensores AS B 
						  WHERE A.numero_ot='$num_ot' AND A.equipo_bodega='$no_equipo' AND A.sensor=B.no_sensor AND A.equipo_bodega=B.no_equipo_bodega 
						  AND A.numero_ot=B.no_ot AND A.id_servicio=B.id_servicio AND B.id_servicio='$servicio'");
$procesa_prom_gen=mysqli_fetch_array($el_promedio_gen);
$prom_gen=round($procesa_prom_gen['promedio'],2);			  

$alto1=mysqli_num_rows($las_alturas)+1;
$alto2=mysqli_num_rows($las_alturas);

$pdf->writeHTMLCell(70, 13, 15, '', 'Tiempo de inicio del período de pruebas (Según lectura de sensores', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 13, 85, '', 'Hora inicio: <br> Hora término<br> Total: ', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 13, 135, '',' '.$start.' <br> '.$end.'<br>'.$horas, 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(70, 5*$alto1, 15, '', 'Temperatura promedio en Bodega durante período de estudio', 1, 0, 0, true, 'C', false);

while($ls=mysqli_fetch_array($las_alturas))
{
$alturas=$ls['altura'];
$posiciones=$ls['posicion'];
$prom_alt=round($ls['promedio'],2);

$pdf->writeHTMLCell(50, 5, 85, '', 'T° promedio Zona '.$posiciones, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 5, 135, '', $prom_alt.' °C', 1, 1, 0, true, 'C', true);

}

$pdf->writeHTMLCell(50, 5, 85, '', '<strong>T° promedio</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 5, 135, '', $prom_gen.' °C', 1, 1, 0, true, 'C', true);

/*SENSOR CON LA TEMPERATURA PROMEDIO MAS ALTA*/
$pdf->writeHTMLCell(70, 5*$alto2*2, 15, '', 'Sensor con la temperatura promedio más alta', 1, 0, 0, true, 'C', false);

$las_alturas2=mysqli_query($connect,"SELECT A.altura, A.posicion, AVG(CAST(B.dato as DECIMAL(4,2))) AS promedio, CAST(A.altura AS DECIMAL(4,2)) as alt FROM sensores_asignados AS A, registro_sensores AS B 
						  WHERE A.numero_ot='$num_ot' AND A.equipo_bodega='$no_equipo' AND A.sensor=B.no_sensor AND A.equipo_bodega=B.no_equipo_bodega 
						  AND A.numero_ot=B.no_ot AND A.id_servicio=B.id_servicio AND B.id_servicio='$servicio' GROUP BY A.altura, A.posicion ORDER BY alt DESC");
						  
while($ls2=mysqli_fetch_array($las_alturas2))
{
$posiciones2=$ls2['posicion'];
//$numero2=$ls2['numero'];
$altura2=$ls2['altura'];

$los_maximos=mysqli_query($connect,"SELECT DISTINCT A.no_sensor, avg(CAST(A.dato as DECIMAL(4,2))) AS promedio, B.posicion, B.numero, B.altura, CAST(B.altura AS DECIMAL(4,2)) as alt 
						  FROM registro_sensores AS A, sensores_asignados AS B 
						  WHERE no_ot=numero_ot AND no_equipo_bodega=equipo_bodega AND no_ot='$num_ot' AND no_equipo_bodega='$no_equipo'AND no_sensor=sensor AND altura='$altura2' 
						  AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'
						  GROUP BY A.no_sensor, B.posicion, B.numero, B.altura ORDER BY alt DESC, promedio DESC LIMIT 0,1");

while($lm=mysqli_fetch_array($los_maximos))
{
$sensor_ls2=$lm['no_sensor'];
$posicion_ls2=$lm['posicion'];
$numero_ls2=$lm['numero'];
$promedio_ls2=round($lm['promedio'],2);

$pdf->writeHTMLCell(50, 10, 85, '', 'Zona '.$posicion_ls2.' T° Promedio: <br> Sensor N°:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '', $promedio_ls2.' °C <br>'.$sensor_ls2.', Ubicado en: '.$numero_ls2, 1, 1, 0, true, 'C', true);
	
}
}	

/*SENSOR CON LA TEMPERATURA PROMEDIO MAS BAJA*/

$pdf->writeHTMLCell(70, 5*$alto2*2, 15, '', 'Sensor con la temperatura promedio más baja', 1, 0, 0, true, 'C', false);

$las_alturas3=mysqli_query($connect,"SELECT A.altura, A.posicion, AVG(CAST(B.dato as DECIMAL(4,2))) AS promedio, CAST(A.altura AS DECIMAL(4,2)) as alt FROM sensores_asignados AS A, registro_sensores AS B 
						  WHERE A.numero_ot='$num_ot' AND A.equipo_bodega='$no_equipo' AND A.sensor=B.no_sensor AND A.equipo_bodega=B.no_equipo_bodega 
						  AND A.numero_ot=B.no_ot AND A.id_servicio=B.id_servicio AND B.id_servicio='$servicio' GROUP BY A.altura, A.posicion ORDER BY alt DESC");
						  
while($ls3=mysqli_fetch_array($las_alturas3))
{
$posiciones2=$ls3['posicion'];
//$numero2=$ls3['numero'];
$altura2=$ls3['altura'];

$los_maximos=mysqli_query($connect,"SELECT DISTINCT A.no_sensor, avg(CAST(A.dato as DECIMAL(4,2))) AS promedio, B.posicion, B.numero, B.altura, CAST(B.altura AS DECIMAL(4,2)) as alt FROM registro_sensores AS A, sensores_asignados AS B 
						  WHERE no_ot=numero_ot AND no_equipo_bodega=equipo_bodega AND no_ot='$num_ot' AND no_equipo_bodega='$no_equipo'AND no_sensor=sensor AND altura='$altura2' 
						   AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'
						  GROUP BY A.no_sensor, B.posicion, B.numero, B.altura ORDER BY alt DESC, promedio ASC LIMIT 0,1");

while($lmin=mysqli_fetch_array($los_maximos))
{
$sensor_ls3=$lmin['no_sensor'];
$posicion_ls3=$lmin['posicion'];
$numero_ls3=$lmin['numero'];
$promedio_ls3=round($lmin['promedio'],2);

$pdf->writeHTMLCell(50, 10, 85, '', 'Zona '.$posicion_ls3.' T° Promedio: <br> Sensor N°:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '', $promedio_ls3.' °C <br>'.$sensor_ls3.', Ubicado en: '.$numero_ls3, 1, 1, 0, true, 'C', true);
	
}
}

/*NUEVA PAGINA*/
$pdf->AddPage();

/*TITULOS PAGINA 2*/
$pdf->writeHTMLCell(70, 5, 15, 45, '<strong>Parámetro</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(110, 5, 85, 45, '<strong>Resultados de Mediciones</strong>', 1, 1, 0, true, 'C', true);

/* SENSOR CON LA TEMPERATURA MINIMA EN TODA LA PRUEBA */
$el_menor=mysqli_query($connect,"SELECT A.no_sensor, MIN(CAST(A.dato as DECIMAL(4,2))) AS minimo, B.numero, B.posicion FROM registro_sensores as A, sensores_asignados as B 
					   WHERE A.no_ot='$num_ot' AND A.no_equipo_bodega='$no_equipo' AND A.no_ot=B.numero_ot AND A.no_equipo_bodega=B.equipo_bodega AND A.no_sensor=B.sensor 
					    AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'
					   GROUP BY A.no_sensor, B.numero, B.posicion ORDER BY minimo ASC LIMIT 0,1");
$exec_el_menor=mysqli_fetch_array($el_menor);
$tmin=$exec_el_menor['minimo'];
$tnum_min=$exec_el_menor['numero'];
$tpos_min=$exec_el_menor['posicion'];
$tsen_min=$exec_el_menor['no_sensor'];

$pdf->writeHTMLCell(70, 10, 15, '','Sensor con la temperatura mínima en toda la prueba', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 10, 85, '', 'Temperatura: <br> Sensor:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '',$tmin.' °C <br>'.$tsen_min.', ubicado en: '.$tnum_min.' - Zona '.$tpos_min, 1, 1, 0, true, 'C', true);


/* SENSOR CON LA TEMPERATURA MAXIMA EN TODA LA PRUEBA */
$el_mayor=mysqli_query($connect,"SELECT A.no_sensor, MAX(CAST(A.dato as DECIMAL(4,2))) AS maximo, B.numero, B.posicion FROM registro_sensores as A, sensores_asignados as B 
					   WHERE A.no_ot='$num_ot' AND A.no_equipo_bodega='$no_equipo' AND A.no_ot=B.numero_ot AND A.no_equipo_bodega=B.equipo_bodega AND A.no_sensor=B.sensor 
					    AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'
					   GROUP BY A.no_sensor, B.numero, B.posicion ORDER BY maximo DESC LIMIT 0,1");
$exec_el_mayor=mysqli_fetch_array($el_mayor);
$tmax=$exec_el_mayor['maximo'];
$tnum_max=$exec_el_mayor['numero'];
$tpos_max=$exec_el_mayor['posicion'];
$tsen_max=$exec_el_mayor['no_sensor'];

$pdf->writeHTMLCell(70, 10, 15, '','Sensor con la temperatura máxima en toda la prueba', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 10, 85, '', 'Temperatura: <br> Sensor:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '',$tmax.' °C <br>'.$tsen_max.', ubicado en: '.$tnum_max.' - Zona '.$tpos_max, 1, 1, 0, true, 'C', true);

/* SENSOR CON MENOR DESVIACION ESTANDAR */
$la_min_desv=mysqli_query($connect,"SELECT A.no_sensor, STD(CAST(A.dato as DECIMAL(4,2))) AS desv, B.numero, B.posicion FROM registro_sensores as A, sensores_asignados as B 
					   WHERE A.no_ot='$num_ot' AND A.no_equipo_bodega='$no_equipo' AND A.no_ot=B.numero_ot AND A.no_equipo_bodega=B.equipo_bodega AND A.no_sensor=B.sensor 
					    AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'
					   GROUP BY A.no_sensor, B.numero, B.posicion ORDER BY desv ASC LIMIT 0,1");
$exec_min_desv=mysqli_fetch_array($la_min_desv);
$minstd=round($exec_min_desv['desv'],2);
$stdnum_min=$exec_min_desv['numero'];
$stdpos_min=$exec_min_desv['posicion'];
$setdsen_min=$exec_min_desv['no_sensor'];

$pdf->writeHTMLCell(70, 10, 15, '','Sensor con menor desviación estándar', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 10, 85, '', 'Temperatura: <br> Sensor:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '',$minstd.' °C <br>'.$setdsen_min.', ubicado en: '.$stdnum_min.' - Zona '.$stdpos_min, 1, 1, 0, true, 'C', true);

/* SENSOR CON MAYOR DESVIACION ESTANDAR */
$la_max_desv=mysqli_query($connect,"SELECT A.no_sensor, STD(CAST(A.dato as DECIMAL(4,2))) AS desv, B.numero, B.posicion FROM registro_sensores as A, sensores_asignados as B 
					   WHERE A.no_ot='$num_ot' AND A.no_equipo_bodega='$no_equipo' AND A.no_ot=B.numero_ot AND A.no_equipo_bodega=B.equipo_bodega AND A.no_sensor=B.sensor 
					    AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'
					   GROUP BY A.no_sensor, B.numero, B.posicion ORDER BY desv DESC LIMIT 0,1");
$exec_max_desv=mysqli_fetch_array($la_max_desv);
$maxstd=round($exec_max_desv['desv'],2);
$stdnum_max=$exec_max_desv['numero'];
$stdpos_max=$exec_max_desv['posicion'];
$setdsen_max=$exec_max_desv['no_sensor'];

$pdf->writeHTMLCell(70, 10, 15, '','Sensor con mayor desviación estándar', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 10, 85, '', 'Temperatura: <br> Sensor:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '',$maxstd.' °C <br>'.$setdsen_max.', ubicado en: '.$stdnum_max.' - Zona '.$stdpos_max, 1, 1, 0, true, 'C', true);


/*TEMPERATURA CINETICA MEDIA */
$las_alturas4=mysqli_query($connect,"SELECT DISTINCT altura, CAST(altura AS DECIMAL(4,2)) as alt FROM sensores_asignados WHERE numero_ot='$num_ot' AND equipo_bodega='$no_equipo' AND id_servicio='$servicio' ORDER BY alt DESC");
$alto3=mysqli_num_rows($las_alturas4)+1;
$pdf->writeHTMLCell(70, 5*$alto3, 15, '','Temperatura cinética media', 1, 0, 0, true, 'C', false);


		  
while($ls4=mysqli_fetch_array($las_alturas4))
{ 
$altura_mkt=$ls4['altura'];
$mkt_alturas=mysqli_query($connect,"SELECT AVG(EXP(-83.144/(0.0083144*(dato+273.15)))) as valor, posicion, altura, CAST(altura AS DECIMAL(4,2)) as alt FROM registro_sensores, sensores_asignados 
							WHERE no_ot=numero_ot AND no_ot='$num_ot' AND no_equipo_bodega='$no_equipo' AND no_equipo_bodega=equipo_bodega AND altura='$altura_mkt' 
							AND no_sensor=sensor  AND registro_sensores.id_servicio=sensores_asignados.id_servicio AND registro_sensores.id_servicio='$servicio'
							GROUP BY posicion, altura ORDER BY alt DESC");
							
while($procesa_mkt=mysqli_fetch_array($mkt_alturas))
{
$zona_mkt=$procesa_mkt['posicion'];	
$mkt_a=$procesa_mkt['valor'];
$mkt_alt=round(-1*(83.144/0.0083144)/(log($mkt_a))-273.15,2);

$pdf->writeHTMLCell(50, 5, 85, '', 'MKT Zona '.$zona_mkt.':', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 5, 135, '', $mkt_alt.' °C', 1, 1, 0, true, 'C', true);

}
}

$mkt_gen_alt=mysqli_query($connect,"SELECT AVG(EXP(-83.144/(0.0083144*(dato+273.15)))) as valor FROM registro_sensores, sensores_asignados 
							WHERE no_ot=numero_ot AND no_ot='$num_ot' AND no_equipo_bodega='$no_equipo' AND no_equipo_bodega=equipo_bodega 
							AND no_sensor=sensor
							 AND registro_sensores.id_servicio=sensores_asignados.id_servicio AND registro_sensores.id_servicio='$servicio'");
$procesa_mkt_gen=mysqli_fetch_array($mkt_gen_alt);
$mkt_general_alt=$procesa_mkt_gen['valor'];
$mkt_gen_alt=round(-1*(83.144/0.0083144)/(log($mkt_general_alt))-273.15,2);


$pdf->writeHTMLCell(50, 5, 85, '', '<strong>MKT promedio:</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 5, 135, '', $mkt_gen_alt.' °C', 1, 1, 0, true, 'C', true);


/*LLAMAR INFORMES */

$informes_tem=mysqli_query($connect,"SELECT DISTINCT A.no_reporte, A.altura, B.descripcion, CAST(A.altura AS DECIMAL(4,2)) as alt FROM reportes AS A, parametros_ubicacion_sensor AS B 
						   WHERE A.num_ot='$num_ot' AND A.equipo_bodega='$no_equipo' AND A.num_ot=B.num_ot AND A.equipo_bodega=B.id_equipo AND A.altura=B.Altura AND no_reporte 
						   LIKE '%-TEM-%' AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio' ORDER BY alt DESC ");
while($inf=mysqli_fetch_array($informes_tem))
{
$zona_inf=$inf['descripcion'];	
$informe_inf=$inf['no_reporte'];	
$pdf->writeHTMLCell(180, 5, 15, '', 'Zona '.$zona_inf. ': Ver resultados en informe '.$informe_inf, 1, 1, 0, true, 'C', true);
}
/////////////////////////////////////////////////////////////FIN DE COMPARATIVAS DE TEMPERATURA///////////////////////////////////////////////////////////////////////

$pdf->AddPage();
/////////////////////////////////////////////////////////////COMPARATIVAS DE %HR/////////////////////////////////////////////////////////////////////////////////////

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(200, 200, 200)));
//TITULOS
$pdf->writeHTMLCell(70, 5, 15, 45, '<strong>Parámetro</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(110, 5, 85, 45, '<strong>Resultados de Mediciones</strong>', 1, 1, 0, true, 'C', true);


/*TIEMPO DE INICIO DEL PERIODO DE PRUEBA (SEGUN LECTURA DE SENSORES) 
TEMPERATURA PROMEDIO EN BODEGA DURANTE PERIODO DE ESTUDIO*/
$las_alturas=mysqli_query($connect,"SELECT A.altura, A.posicion, AVG(CAST(B.dato_hr as DECIMAL(4,2))) AS promedio, CAST(altura AS DECIMAL(4,2)) as alt FROM sensores_asignados AS A, registro_sensores AS B 
						  WHERE A.numero_ot='$num_ot' AND A.equipo_bodega='$no_equipo' AND A.sensor=B.no_sensor AND A.equipo_bodega=B.no_equipo_bodega 
						  AND A.numero_ot=B.no_ot AND A.id_servicio=B.id_servicio AND B.id_servicio='$servicio' GROUP BY A.altura, A.posicion ORDER BY alt DESC");
						  
$el_promedio_gen=mysqli_query($connect,"SELECT AVG(CAST(B.dato_hr as DECIMAL(4,2))) AS promedio FROM sensores_asignados AS A, registro_sensores AS B 
						  WHERE A.numero_ot='$num_ot' AND A.equipo_bodega='$no_equipo' AND A.sensor=B.no_sensor AND A.equipo_bodega=B.no_equipo_bodega 
						  AND A.numero_ot=B.no_ot AND A.id_servicio=B.id_servicio AND B.id_servicio='$servicio'");
$procesa_prom_gen=mysqli_fetch_array($el_promedio_gen);
$prom_gen=round($procesa_prom_gen['promedio'],2);			  

$alto1=mysqli_num_rows($las_alturas)+1;
$alto2=mysqli_num_rows($las_alturas);

$pdf->writeHTMLCell(70, 13, 15, '', 'Tiempo de inicio del período de pruebas (Según lectura de sensores', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 13, 85, '', 'Hora inicio: <br> Hora término<br> Total: ', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 13, 135, '',' '.$start.' <br> '.$end.'<br>'.$horas, 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(70, 5*$alto1, 15, '','Porcentaje de humedad relativa promedio en Bodega durante período de estudio', 1, 0, 0, true, 'C', false);

while($ls=mysqli_fetch_array($las_alturas))
{
$alturas=$ls['altura'];
$posiciones=$ls['posicion'];
$prom_alt=round($ls['promedio'],2);

$pdf->writeHTMLCell(50, 5, 85, '', '%HR promedio Zona '.$posiciones, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 5, 135, '', $prom_alt.'%', 1, 1, 0, true, 'C', true);

}

$pdf->writeHTMLCell(50, 5, 85, '', '<strong>%HR promedio</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 5, 135, '', $prom_gen.'%', 1, 1, 0, true, 'C', true);

/*SENSOR CON EL %HR PROMEDIO MAS ALTO*/

$pdf->writeHTMLCell(70, 5*$alto2*2, 15, '', 'Sensor con el porcentaje de humedad relativa promedio más alto', 1, 0, 0, true, 'C', false);

$las_alturas2=mysqli_query($connect,"SELECT A.altura, A.posicion, AVG(CAST(B.dato_hr as DECIMAL(4,2))) AS promedio, CAST(A.altura AS DECIMAL(4,2)) as alt FROM sensores_asignados AS A, registro_sensores AS B 
						  WHERE A.numero_ot='$num_ot' AND A.equipo_bodega='$no_equipo' AND A.sensor=B.no_sensor AND A.equipo_bodega=B.no_equipo_bodega 
						  AND A.numero_ot=B.no_ot AND A.id_servicio=B.id_servicio AND B.id_servicio='$servicio' GROUP BY A.altura, A.posicion ORDER BY alt DESC");
						  
while($ls2=mysqli_fetch_array($las_alturas2))
{
$posiciones2=$ls2['posicion'];
//$numero2=$ls2['numero'];
$altura2=$ls2['altura'];

$los_maximos=mysqli_query($connect,"SELECT DISTINCT A.no_sensor, avg(CAST(A.dato_hr as DECIMAL(4,2))) AS promedio, B.posicion, B.numero, B.altura, CAST(B.altura AS DECIMAL(4,2)) as alt FROM registro_sensores AS A, sensores_asignados AS B 
						  WHERE no_ot=numero_ot AND no_equipo_bodega=equipo_bodega AND no_ot='$num_ot' AND no_equipo_bodega='$no_equipo'AND no_sensor=sensor AND altura='$altura2' 
						  AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'
						  GROUP BY A.no_sensor, B.posicion, B.numero, B.altura ORDER BY alt DESC, promedio DESC LIMIT 0,1");

while($lm=mysqli_fetch_array($los_maximos))
{
$sensor_ls2=$lm['no_sensor'];
$posicion_ls2=$lm['posicion'];
$numero_ls2=$lm['numero'];
$promedio_ls2=round($lm['promedio'],2);

$pdf->writeHTMLCell(50, 10, 85, '', 'Zona '.$posicion_ls2.' %HR Promedio: <br> Sensor N°:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '', $promedio_ls2.'% <br>'.$sensor_ls2.', Ubicado en: '.$numero_ls2, 1, 1, 0, true, 'C', true);
	
}
}	

/*SENSOR CON EL %HR PROMEDIO MAS BAJO*/

$pdf->writeHTMLCell(70, 5*$alto2*2, 15, '', 'Sensor con el porcentaje de humedad relativa promedio más bajo', 1, 0, 0, true, 'C', false);

$las_alturas3=mysqli_query($connect,"SELECT A.altura, A.posicion, AVG(CAST(B.dato_hr as DECIMAL(4,2))) AS promedio, CAST(A.altura AS DECIMAL(4,2)) as alt FROM sensores_asignados AS A, registro_sensores AS B 
						  WHERE A.numero_ot='$num_ot' AND A.equipo_bodega='$no_equipo' AND A.sensor=B.no_sensor AND A.equipo_bodega=B.no_equipo_bodega 
						  AND A.numero_ot=B.no_ot AND A.id_servicio=B.id_servicio AND B.id_servicio='$servicio' GROUP BY alt, A.posicion, A.altura ORDER BY altura DESC");
						  
while($ls3=mysqli_fetch_array($las_alturas3))
{
$posiciones2=$ls3['posicion'];
//$numero2=$ls3['numero'];
$altura2=$ls3['altura'];

$los_maximos=mysqli_query($connect,"SELECT DISTINCT A.no_sensor, avg(CAST(A.dato_hr as DECIMAL(4,2))) AS promedio, B.posicion, B.numero, B.altura FROM registro_sensores AS A, sensores_asignados AS B 
						  WHERE no_ot=numero_ot AND no_equipo_bodega=equipo_bodega AND no_ot='$num_ot' AND no_equipo_bodega='$no_equipo'AND no_sensor=sensor AND altura='$altura2' 
						  AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'
						  GROUP BY A.no_sensor, B.posicion, B.numero, B.altura ORDER BY B.altura DESC, promedio ASC LIMIT 0,1");

while($lmin=mysqli_fetch_array($los_maximos))
{
$sensor_ls3=$lmin['no_sensor'];
$posicion_ls3=$lmin['posicion'];
$numero_ls3=$lmin['numero'];
$promedio_ls3=round($lmin['promedio'],2);

$pdf->writeHTMLCell(50, 10, 85, '', 'Zona '.$posicion_ls3.' %HR Promedio: <br> Sensor N°:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '', $promedio_ls3.'% <br>'.$sensor_ls3.', Ubicado en: '.$numero_ls3, 1, 1, 0, true, 'C', true);
	
}
}

/*NUEVA PAGINA*/
$pdf->AddPage();

/*TITULOS PAGINA 2*/
$pdf->writeHTMLCell(70, 5, 15, 45, '<strong>Parámetro</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(110, 5, 85, 45, '<strong>Resultados de Mediciones</strong>', 1, 1, 0, true, 'C', true);

/* SENSOR CON LA TEMPERATURA MINIMA EN TODA LA PRUEBA */
$el_menor=mysqli_query($connect,"SELECT A.no_sensor, MIN(CAST(A.dato_hr as DECIMAL(4,2))) AS minimo, B.numero, B.posicion FROM registro_sensores as A, sensores_asignados as B 
					   WHERE A.no_ot='$num_ot' AND A.no_equipo_bodega='$no_equipo' AND A.no_ot=B.numero_ot AND A.no_equipo_bodega=B.equipo_bodega AND A.no_sensor=B.sensor 
					   AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'
					   GROUP BY A.no_sensor, B.numero, B.posicion ORDER BY minimo ASC LIMIT 0,1");
$exec_el_menor=mysqli_fetch_array($el_menor);
$tmin=$exec_el_menor['minimo'];
$tnum_min=$exec_el_menor['numero'];
$tpos_min=$exec_el_menor['posicion'];
$tsen_min=$exec_el_menor['no_sensor'];

$pdf->writeHTMLCell(70, 10, 15, '','Sensor con el %HR mínimo en toda la prueba', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 10, 85, '', '%HR: <br> Sensor:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '',$tmin.'% <br>'.$tsen_min.', ubicado en: '.$tnum_min.' - Zona '.$tpos_min, 1, 1, 0, true, 'C', true);


/* SENSOR CON LA TEMPERATURA MAXIMA EN TODA LA PRUEBA */
$el_mayor=mysqli_query($connect,"SELECT A.no_sensor, MAX(CAST(A.dato_hr as DECIMAL(4,2))) AS maximo, B.numero, B.posicion FROM registro_sensores as A, sensores_asignados as B 
					   WHERE A.no_ot='$num_ot' AND A.no_equipo_bodega='$no_equipo' AND A.no_ot=B.numero_ot AND A.no_equipo_bodega=B.equipo_bodega AND A.no_sensor=B.sensor 
					   AND A.id_servicio=B.id_servicio AND B.id_servicio='$servicio'
					   GROUP BY A.no_sensor, B.numero, B.posicion ORDER BY maximo DESC LIMIT 0,1");
$exec_el_mayor=mysqli_fetch_array($el_mayor);
$tmax=$exec_el_mayor['maximo'];
$tnum_max=$exec_el_mayor['numero'];
$tpos_max=$exec_el_mayor['posicion'];
$tsen_max=$exec_el_mayor['no_sensor'];

$pdf->writeHTMLCell(70, 10, 15, '','Sensor con el %HR máximo en toda la prueba', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 10, 85, '', '%HR: <br> Sensor:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '',$tmax.'% <br>'.$tsen_max.', ubicado en: '.$tnum_max.' - Zona '.$tpos_max, 1, 1, 0, true, 'C', true);

/* SENSOR CON MENOR DESVIACION ESTANDAR */
$la_min_desv=mysqli_query($connect,"SELECT A.no_sensor, STD(CAST(A.dato_hr as DECIMAL(4,2))) AS desv, B.numero, B.posicion FROM registro_sensores as A, sensores_asignados as B 
					   WHERE A.no_ot='$num_ot' AND A.no_equipo_bodega='$no_equipo' AND A.no_ot=B.numero_ot AND A.no_equipo_bodega=B.equipo_bodega AND A.no_sensor=B.sensor 
					   AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'
					  GROUP BY A.no_sensor, B.numero, B.posicion ORDER BY desv ASC LIMIT 0,1");
$exec_min_desv=mysqli_fetch_array($la_min_desv);
$minstd=round($exec_min_desv['desv'],2);
$stdnum_min=$exec_min_desv['numero'];
$stdpos_min=$exec_min_desv['posicion'];
$setdsen_min=$exec_min_desv['no_sensor'];

$pdf->writeHTMLCell(70, 10, 15, '','Sensor con menor desviación estándar', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 10, 85, '', '%HR: <br> Sensor:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '',$minstd.'% <br>'.$setdsen_min.', ubicado en: '.$stdnum_min.' - Zona '.$stdpos_min, 1, 1, 0, true, 'C', true);

/* SENSOR CON MAYOR DESVIACION ESTANDAR */
$la_max_desv=mysqli_query($connect,"SELECT A.no_sensor, STD(CAST(A.dato_hr as DECIMAL(4,2))) AS desv, B.numero, B.posicion FROM registro_sensores as A, sensores_asignados as B 
					   WHERE A.no_ot='$num_ot' AND A.no_equipo_bodega='$no_equipo' AND A.no_ot=B.numero_ot AND A.no_equipo_bodega=B.equipo_bodega AND A.no_sensor=B.sensor 
					   AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio'
					   GROUP BY A.no_sensor, B.numero, B.posicion ORDER BY desv DESC LIMIT 0,1");
$exec_max_desv=mysqli_fetch_array($la_max_desv);
$maxstd=round($exec_max_desv['desv'],2);
$stdnum_max=$exec_max_desv['numero'];
$stdpos_max=$exec_max_desv['posicion'];
$setdsen_max=$exec_max_desv['no_sensor'];

$pdf->writeHTMLCell(70, 10, 15, '','Sensor con mayor desviación estándar', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 10, 85, '', '%HR: <br> Sensor:', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 10, 135, '',$maxstd.'% <br>'.$setdsen_max.', ubicado en: '.$stdnum_max.' - Zona '.$stdpos_max, 1, 1, 0, true, 'C', true);



/*LLAMAR INFORMES */

$informes_tem=mysqli_query($connect,"SELECT DISTINCT A.no_reporte, A.altura, B.descripcion, CAST(A.altura AS DECIMAL(4,2)) as alt FROM reportes AS A, parametros_ubicacion_sensor AS B 
						   WHERE A.num_ot='$num_ot' AND A.equipo_bodega='$no_equipo' AND A.num_ot=B.num_ot AND A.equipo_bodega=B.id_equipo AND A.altura=B.Altura AND no_reporte 
						   LIKE '%-HR-%' AND A.id_servicio=B.id_servicio AND A.id_servicio='$servicio' ORDER BY alt DESC ");
while($inf=mysqli_fetch_array($informes_tem))
{
$zona_inf=$inf['descripcion'];	
$informe_inf=$inf['no_reporte'];	
$pdf->writeHTMLCell(180, 5, 15, '', 'Zona '.$zona_inf.': Ver resultados en informe '.$informe_inf, 1, 1, 0, true, 'C', true);
}
/////////////////////////////////////////////////////////////FIN COMPARATIVAS DE %HR///////////////////////////////////////////////////////////////////////


$pdf->AddPage();

$txt = <<<EOD

<style>
table 
{
  border-collapse: collapse;
  width: 100%;
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
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>7.0 OBSERVACIONES DEL MAPEO TÉRMICO</strong></H3></td></tr></TABLE>
<br><br>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$select_conclusion=mysqli_query($connect,"SELECT no_reporte, conclusion FROM reportes 
						    WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND no_reporte='$codigo_informe' AND id_servicio='$servicio'");
$p_c=mysqli_fetch_array($select_conclusion);
$conclusion_8_4=$p_c['conclusion'];

$txt = <<<EOD

<style>
table 
{
  border-collapse: collapse;
  width: 100%;
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
  padding: 3px;
  vertical-align: middle;
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}
</style>
<br><br>
<table>
<tr><td width="5%">7.1</td>
<td width="95%" class="justificado">La bodega al momento de la instalación de los sensores de mapeo térmico por
personal de CERCAL INGENIERIA SPA, se encontraba con $carga_bod% de carga
aproximadamente.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">7.2</td>
<td width="95%" class="justificado">Por la altura de la bodega se consideran $alturas_generales niveles de ubicación de sensores, con el
fin de determinar el gradiente de temperatura: $zona_alt_a $zona_alt_m7 $zona_alt_m6 $zona_alt_m5 $zona_alt_m4 
$zona_alt_m3 $zona_alt_m2 $zona_alt_m $zona_alt_b, ubicados en bodega de almacenamiento de $descrip_material.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">7.3</td>
<td width="95%" class="justificado">La propuesta y ubicación de los sensores fue analizada en conjunto con el $cargo.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">7.4</td>
<td width="95%" class="justificado">Es importante destacar que la información de la Humedad Relativa es sólo de carácter
informativo.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">7.5</td>
<td width="95%" class="justificado">El análisis de riesgo que acompaña el presente informe puede ser complementado o
actualizado por parte de $empresa de acuerdo con los resultados obtenidos.</td></tr>
</table>
<br><br>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

/*$select_vacio=mysqli_query($connect,"SELECT no_reporte, observacion FROM reportes 
						    WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND no_reporte='$codigo_informe' AND id_servicio='$servicio'");
$procesa_vacio=mysqli_fetch_array($select_vacio);
$esnull=$procesa_vacio['observacion'];
if(is_null($esnull)===true)
{
	$nulificado="";
}
else
{
	$nulificado= <<<EOD
	<style>
table 
{
  border-collapse: collapse;
  width: 100%;
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
  padding: 3px;
  vertical-align: middle;
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

titlelist
{
 list-style-type: none;
 text-align: justify; 
}
</style>
	<table><tr><td width="5%" class="justificado">7.6</td>
	<td width="95%" class="justificado">$esnull</td></tr>
	</table>
	<br><br>
EOD;

$pdf->writeHTML($nulificado, true, false, false, false, '');
}*/


$txt = <<<EOD

<style>
table 
{
  border-collapse: collapse;
  width: 100%;
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
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>8.0 CONCLUSIONES DEL MAPEO TÉRMICO</strong></H3></td></tr></TABLE>
<br><br>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$txt = <<<EOD

<style>
table 
{
  border-collapse: collapse;
  width: 100%;
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
  padding: 3px;
  vertical-align: middle;
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}
</style>
<br><br>
<table>
<tr><td width="5%">8.1</td>
<td width="95%" class="justificado">Los resultados obtenidos corresponden a la muestra inspeccionada por CERCAL
INGENIERIA SPA al momento de la ejecución del Mapeo Térmico. Cualquier
modificación posterior a la ejecución del mapeo, invalida el presente informe.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">8.2</td>
<td width="95%" class="justificado">Los sensores utilizados en el mapeo térmico fueron calibrados y se ha determinado su
error e incertidumbre asociado.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">8.3</td>
<td width="95%" class="justificado">El análisis de riesgo presentado corresponde al realizado en el presente mapeo
térmico, el cual puede cambiar en la objetividad de la criticidad de los riesgos, de
acuerdo con los cambios que realice el $cargo.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">8.4</td>
<td width="95%" class="justificado">$conclusion_8_4</td></tr>
</table>
<br><br>


EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$pdf->AddPage();

$txt = <<<EOD

<style>
table 
{
  border-collapse: collapse;
  width: 100%;
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
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>9.0 DOCUMENTACIÓN DEL MAPEO TÉRMICO</strong></H3></td></tr></TABLE>
<br><br>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$llama_documentos1=mysqli_query($connect,"SELECT no_reporte FROM reportes WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND 
								no_reporte LIKE '%-TEM-%' AND id_servicio='$servicio' ORDER BY no_reporte ASC limit 1");
$process1=mysqli_fetch_array($llama_documentos1);
$primer_temp=$process1['no_reporte'];

$llama_documentos2=mysqli_query($connect,"SELECT no_reporte FROM reportes WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND 
								no_reporte LIKE '%-TEM-%' AND id_servicio='$servicio' ORDER BY no_reporte DESC limit 1");
$process2=mysqli_fetch_array($llama_documentos2);
$ultima_temp=$process2['no_reporte'];

$llama_documentos3=mysqli_query($connect,"SELECT no_reporte FROM reportes WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND 
								no_reporte LIKE '%-HR-%' AND id_servicio='$servicio' ORDER BY no_reporte ASC limit 1");
$process3=mysqli_fetch_array($llama_documentos3);
$primer_hr=$process3['no_reporte'];

$llama_documentos4=mysqli_query($connect,"SELECT no_reporte FROM reportes WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND 
								no_reporte LIKE '%-HR-%' AND id_servicio='$servicio' ORDER BY no_reporte DESC limit 1");
$process4=mysqli_fetch_array($llama_documentos4);
$ultima_hr=$process4['no_reporte'];

$llama_ar=mysqli_query($connect,"SELECT no_reporte FROM reportes WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND 
								no_reporte LIKE '%-AR%' AND id_servicio='$servicio' ORDER BY no_reporte ASC limit 1");
$process_ar=mysqli_fetch_array($llama_ar);
$el_ar=$process_ar['no_reporte'];

$llama_ps=mysqli_query($connect,"SELECT no_reporte FROM reportes WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND 
								no_reporte LIKE '%-PS%' AND id_servicio='$servicio' ORDER BY no_reporte ASC limit 1");
$process_ps=mysqli_fetch_array($llama_ps);
$el_ps=$process_ps['no_reporte'];

$firma=mysqli_query($connect,"SELECT firma FROM servicios_asignados where id_asignacion=$servicio");
$ax=mysqli_fetch_array($firma);
$firma_final=$ax["firma"];
if(mysqli_num_rows($firma)==0)
{
  $firma_final="Ing. Rául Quevedo Silva<br>COO - Chief Operation Officer - Cercal Group Spa.";  
}

$txt = <<<EOD

<style>
table 
{
  border-collapse: collapse;
  width: 100%;
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
  padding: 3px;
  vertical-align: middle;
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}
</style>
<br><br>
<table>
<tr><td width="5%">9.1</td>
<td width="95%" class="justificado">Informe de Análisis estadístico: $codigo_informe</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.2</td>
<td width="95%" class="justificado">Informes de Mapeos Térmicos del $primer_temp al $ultima_temp</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.3</td>
<td width="95%" class="justificado">Informes de Mapeos de porcentaje de Humedad Relativa del $primer_hr al $ultima_hr</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.4</td>
<td width="95%" class="justificado">Informe de Propuesta de Ubicación de Sensores: N° Informe $el_ps</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.5</td>
<td width="95%" class="justificado">Informe de Análisis de Riesgo: N° Informe $el_ar</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.6</td>
<td width="95%" class="justificado">Datos crudos del Mapeo Térmico</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.7</td>
<td width="95%" class="justificado">Certificados de Calibración de datalogger utilizados en el Mapeo Térmico.</td></tr>
</table>
<br><br><br>

<table>
<tr><td><center><strong>$firma_final <br> CERCAL INGENIERÍA SpA.</center></strong></td></tr></table>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');
$pdf->AddPage();

$ruta="images/";
$foto1="images/".$num_ot."/servicio_".$servicio."/".$codigo_informe."_foto1.jpg";
$foto2="images/".$num_ot."/servicio_".$servicio."/".$codigo_informe."_foto2.jpg";
$foto3="images/".$num_ot."/servicio_".$servicio."/".$codigo_informe."_foto3.jpg";
$foto4="images/".$num_ot."/servicio_".$servicio."/".$codigo_informe."_foto4.jpg";

list($img_ancho1, $img_alto1, $type, $attr) = getimagesize($foto1);
if($img_ancho1>$img_alto1){$img_med1="width=250";}else{$img_med1="height=250";}

list($img_ancho2, $img_alto2, $type, $attr) = getimagesize($foto2);
if($img_ancho2>$img_alto2){$img_med2="width=250";}else{$img_med2="height=250";}

list($img_ancho3, $img_alto3, $type, $attr) = getimagesize($foto3);
if($img_ancho3>$img_alto3){$img_med3="width=250";}else{$img_med3="height=250";}

list($img_ancho4, $img_alto4, $type, $attr) = getimagesize($foto4);
if($img_ancho4>$img_alto4){$img_med4="width=300";}else{$img_med4="height=250";}

/*FOTOS DE LA BODEGA*/
$txt = <<<EOD

<style>
table 
{
  border-collapse: collapse;
  width: 100%;
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
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>Anexo N° 1: FOTOGRAFÍAS DE LA BODEGA</strong></H3></td></tr></TABLE>
<br><br>

<table>
<tr><td width="320"><img src="$foto1" width="250"></td><td width="320"><img src="$foto2" width="250"></td></tr>
<tr><td width="320"><img src="$foto3" width="250"></td><td width="320"><img src="$foto4" width="250"></td></tr>
</table>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');


$pdf->Output($nombre_informe_g.'.pdf', 'I');
mysqli_close($connect);
?>