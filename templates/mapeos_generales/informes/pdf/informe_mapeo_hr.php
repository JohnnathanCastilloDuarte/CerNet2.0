<?php
		require('../../../../recursos/encabezadopdf.php');
		require('../../../../config.ini.php');
		$id_informe = $_GET['informe'];

	 
		
		/////////////////////////////////////////////////////////PASOS DE CREACIÓN DE PDF///////////////////////////////////////////////////////////

		// 1-CONSULTAR LA INFORMACIÓN LA CUAL SE IMPRIMIRA EN LAS CABECERAS Y EL NOMBRE DEL INFORME

	$informes_generales = mysqli_prepare($connect,"SELECT a.nombre, b.id_mapeo,b.nombre, b.id_asignado,b.fecha_inicio,b.fecha_fin, c.id_servicio as servicio, e.numot, f.id_item, f.nombre, f.descripcion, f.id_tipo, g.nombre, g.direccion 
		FROM informes_general a,mapeo_general b,item_asignado c, servicio d, numot e,item f,empresa g
		WHERE id_informe = 2
		AND a.id_mapeo = b.id_mapeo 
		AND c.id_asignado = b.id_asignado 
		AND c.id_servicio = d.id_servicio
		AND d.id_numot = e.id_numot
		AND c.id_item = f.id_item
		AND f.id_empresa = g.id_empresa

		");
	mysqli_stmt_bind_param($informes_generales, 'i', $id_informe);
	mysqli_stmt_execute($informes_generales);
	mysqli_stmt_store_result($informes_generales);
	mysqli_stmt_bind_result($informes_generales,$nombre_informe_g,$id_mapeo_g,$nombre_mapeo_g,$b,$fecha_inicio_g,$fecha_fin_g,$c,$num_ot_g,$id_item_g, $nombre_item_g,$descripcion_item,$id_tipo_item_g,$nombre_empresa_g, $direccion_empresa_g,);

	mysqli_stmt_fetch($informes_generales);

	//////////////////////////////////////////////////Cantidad de mediciones

	$cantidad_mediciones = mysqli_prepare($connect,"SELECT COUNT(DISTINCT id_sensor) as x  
		FROM mapeo_general_sensor	
		WHERE id_mapeo =  ?");
	mysqli_stmt_bind_param($cantidad_mediciones, 'i', $id_mapeo_g);
	mysqli_stmt_execute($cantidad_mediciones);
	mysqli_stmt_store_result($cantidad_mediciones);
	mysqli_stmt_bind_result($cantidad_mediciones, $total_mediciones_g);
	mysqli_stmt_fetch($cantidad_mediciones);	 

	$total_mediciones = number_format($total_mediciones_g,2); 

	/////////////////////////////////////////Calcular intervalo de horas

	$intervalo_horas = mysqli_prepare($connect,"SELECT TIMESTAMPDIFF(SECOND,fecha_inicio,fecha_fin) as X 
		FROM mapeo_general");
	mysqli_stmt_bind_param($intervalo_horas, 'i', $id_mapeo_g);
	mysqli_stmt_execute($intervalo_horas);
	mysqli_stmt_store_result($intervalo_horas);
	mysqli_stmt_bind_result($intervalo_horas, $intervalo);
	mysqli_stmt_fetch($intervalo_horas);	 

	$intervalo_horas_g = $intervalo/3600; 

	$x_horas = $intervalo_horas_g/24;

	$intervalo_dias_g = bcdiv($x_horas, '1', 2);


	switch ($id_tipo_item_g) {
		//bodega 
		case 1:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_bodega ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;
		//refrigerador	
		case 2:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_refrigerador ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;
		//freezer
		case 3:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_bodega ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;
		//UltraFreezer
		case 4:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_bodega ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;
		//Estufa	
		case 5:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_bodega ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;
		//Incubadora
		case 6:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_bodega ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;	
		//Automovil					
		case 7:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_bodega ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;
		//Sala Limpia
		case 8:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_bodega ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;
		//HVAC	
		case 10:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_bodega ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;
		//Filtro	
		case 11:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_bodega ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;
		//Campana extracción	
		case 12:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_bodega ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;
		//Flujo Laminar	
		case 13:
			/*$informacion_item = mysqli_prepare($connect,"SELECT * FROM item_bodega ");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_informe);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $$$);

			mysqli_stmt_fetch($informacion_item);*/
			break;
		//Camara Congelada	
		case 14:
			$informacion_item = mysqli_prepare($connect,"SELECT marca,modelo,ubicacion,valor_seteado,valor_maximo,valor_minimo FROM item_camara_congelada WHERE id_item = ?");
			mysqli_stmt_bind_param($informacion_item, 'i', $id_item_g);
			mysqli_stmt_execute($informacion_item);
			mysqli_stmt_store_result($informacion_item);
			mysqli_stmt_bind_result($informacion_item, $marca_item, $modelo_item, $ubicacion_item, $valor_seteado, $valor_maximo, $valor_minimo );

			mysqli_stmt_fetch($informacion_item);
			$n_serie = "N/A";
			break;

		default:
			
			break;
	}

  /////////////////////////////////////////////////////////////INICIO INFORME////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$pdf->AddPage('A4');

$html = <<<EOD

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

.enunciado{
text-align:left;
}
</style>

<table>
	<tr>
      <td bgcolor="#DDDDDD"><H3><strong>INSPECCIÓN DE MAPEO TÉRMICO</strong></H3></td>
   </tr>
</table>
<br><br>
<table>
<tr>
	<td width="15%" ><strong>Informe:</strong></td><td width="45%">$nombre_informe_g</td>
	<td width="15%"><strong>O.T. N°</strong></td><td width="25%">$num_ot_g</td>
</tr>
<tr>
	<td width="15%"><strong>Solicitante:</strong></td>
	<td>$nombre_empresa_g</td>
	<td>Dirección:</td><td>$direccion_empresa_g</td>
</tr>
<tr>
	<td width="15%"><strong>Atención:</strong></td>
	<td>$contacto - $cargo</td>
	<td>Fecha de emisión:</td><td>$emision</td>
</tr>
</table>
<br><br>

<table>
<tr>
	<td colspan="2" bgcolor="#DDDDDD"><H3><strong>1. Identificación del Equipo o Muestra</strong></H3></td>
</tr>
<tr>
	<td width="30%" class="enunciado">Descripción:</td><td width="70%">$nombre_item_g de almacenamiento de $descripcion_item</td>
</tr>
<tr>
	<td width="30%" class="enunciado">Marca:</td><td width="70%">$marca_item</td>
</tr>
<tr>
	<td width="30%" class="enunciado">Modelo:</td><td width="70%">$modelo_item</td>
</tr>
<tr>
	<td width="30%" class="enunciado">N° de serie / Código interno</td>
	<td width="70%">$n_serie</td>
</tr>
<tr>
	<td width="30%" class="enunciado">Ubicación</td><td width="70%">$ubicacion_item</td>
</tr>
<tr>
	<td width="30%" class="enunciado">Valor seteado</td><td width="70%">$valor_seteado</td>
</tr>
<tr>
	<td width="30%" rowspan="2" class="enunciado">Límites (HR%)</td>
	<td width="35%">Máximo</td><td width="35%">Mínimo</td></tr>
<tr>
	<td width="35%">$valor_maximo</td><td width="35%">$valor_minimo</td>
</tr>
</table><br><br>
<table>
<tr>
	<td colspan="2" bgcolor="#DDDDDD"><H3><strong>2. Resumen de las Mediciones</strong></H3></td>
</tr>
<tr>
	<td width="30%" class="enunciado">Resultado corresponde a:</td><td width="70%">$nombre_mapeo_g</td>
</tr>
<tr>
	<td width="30%" class="enunciado">Fecha de inicio</td><td width="70%">$fecha_inicio_g $hora_inicio</td>
</tr>
<tr>
	<td width="30%" class="enunciado">Fecha de término</td><td width="70%">$fecha_fin_g $hora_final</td>
</tr>
		<tr><td width="30%" class="enunciado">Cantidad de mediciones</td><td width="70%">$total_mediciones</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo total de mediciones (Horas)</td><td width="70%">$intervalo_horas_g	</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo total de mediciones (dias)</td><td width="70%">$intervalo_dias_g</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo acumulado superior al límite máximo (hrs.)</td><td width="70%">$registros_over</td></tr>
		<tr><td width="30%" class="enunciado">% Superior al límite máximo</td><td width="70%">$max_percent%</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo acumulado mínimo al límite (hrs.)</td><td width="70%">$registros_under</td></tr>
		<tr><td width="30%" class="enunciado">% inferior a límite mínimo</td><td width="70%">$min_percent%</td></tr>
		</table><br><br>

		<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>3. Resultados de la Medición Obtenida</strong></H3></td></tr>

		<tr><td width="30%" class="enunciado">Promedio General (HR%)</td><td width="70%" colspan="5">$prom_general</td></tr>

		<tr><td width="30%" class="enunciado">Máximo General (HR%)</td><td width="10%">$max_general</td>
		<td width="10%">a las:</td><td width="20%">$max_time_general</td><td width="10%">En:</td><td width="20%">$sensor_max_general, Ubicado en posición: $bandeja_max_general</td></tr>

		<tr><td width="30%" class="enunciado">Mínimo General (HR%)</td><td width="10%">$min_general</td>
		<td width="10%">a las:</td><td width="20%">$min_time_general</td><td width="10%">En:</td><td width="20%">$sensor_min_general, Ubicado en posición: $bandeja_min_general</td></tr>

		<tr><td width="30%" class="enunciado">Desv. Estandar de todos los sensores</td><td width="70%" colspan="3">$desviacion_general</td></tr>

		<tr><td width="30%" class="enunciado">Promedio + 3 Desv. Est. (HR%)</td><td width="20%">$desv_3max_num</td><td width="25%">Cumple Limite Máx.</td><td width="25%">$cumple_max</td></tr>

		<tr><td width="30%" class="enunciado">Promedio - 3 Desv. Est. (HR%)</td><td width="20%">$desv_3min_num</td><td width="25%">Cumple Limite Mín.</td><td width="25%">$cumple_min</td></tr>

		<tr><td width="30%" class="enunciado">MKT General (HR%)*</td><td width="70%">$mkt_gen</td></tr>

		</table>
		* Usa: Energía activación = 83,144 (kj/mol) y Constante universal de gases ideales = 0,0083144 (kj/mol)<br><br>

		<table width="100%"><tr><td colspan="8" bgcolor="#DDDDDD"><H3><strong>4. Análisis de los Resultados</strong></H3></td></tr>

		<tr><td width="30%" class="enunciado">Dif. Máx. entre sensores</td><td width="10%">$dif_max_resta</td><td width="10%">a las:</td>
		<td width="20%" class="enunciado">$dif_max_time</td><td width="7%">entre</td><td width="10%">$dif_max_sensor</td><td width="3%">y</td>
		<td width="10%" class="enunciado">$dif_min_sensor</td></tr>

		<tr><td width="30%" class="enunciado">Dif. Mín. entre sensores</td><td width="10%">$dif_max_resta_2</td><td width="10%">a las:</td>
		<td width="20%" class="enunciado">$dif_max_time_2</td><td width="7%">entre</td><td width="10%">$dif_max_sensor_2</td><td width="3%">y</td>
		<td width="10%" class="enunciado">$dif_min_sensor_2</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con promedio más alto (HR%)</td><td width="10%">$max_avg</td><td width="10%">en:</td><td width="50%">$max_avg_sensor, ubicado en: $max_avg_posicion</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con promedio más bajo (HR%)</td><td width="10%">$min_avg</td><td width="10%">en:</td><td width="50%">$min_avg_sensor, ubicado en: $min_avg_posicion</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con mayor Desv. Est. (HR%)</td><td width="10%">$max_desv</td><td width="10%">en:</td><td width="50%">$max_desv_sensor, ubicado en: $max_desv_posicion</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con menor Desv. Est. (HR%)</td><td width="10%">$min_desv</td><td width="10%">en:</td><td width="50%">$min_desv_sensor, ubicado en: $min_desv_posicion</td></tr>
</table>

<br><br><br><br><br><br>
<br><br>

EOD;

$pdf->writeHTML($html, true, false, false, false, '');


$html_2 = <<<EOD
<style>
table 
{
  border-collapse: collapse;
  width: 100%;
  height: 500px;
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

 
<table><tr><td colspan="8" bgcolor="#DDDDDD"><H3><strong>Ubicación de los Sensores</strong></H3></td></tr>

<tr><td width="100%">Sensores ubicados en Bodega <strong>Zona</strong></td></tr>
<tr><td width="100%"><br> $mostrar_imagen_1 </td></tr>
</table>
EOD;

$pdf->writeHTML($html_2, true,false,false,false,'');
$pdf->AddPage('A4');

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(170, 170, 170)));
//TITULOS
$pdf->writeHTMLCell(15, 5, 15, '', 'Posición', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(35, 5, 30, '', 'N° de identificación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(55, 5, 65, '', 'Ubicación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(75, 5, 120, '', 'N° de serie', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(66, 5, 215, '', 'N° Certificado de Calibración', 1, 1, 0, true, 'C', true);

$contador_t = 0;
//CONSULTA
$query_32 = mysqli_prepare($connect,"SELECT DISTINCT a.nombre, b.nombre, a.serie, a.id_sensor  FROM sensores as a, bandeja as b, refrigerador_sensor as c WHERE c.id_sensor = a.id_sensor AND c.id_mapeo = ? AND b.id_bandeja = c.id_bandeja");
mysqli_stmt_bind_param($query_32, 'i', $id_mapeo);
mysqli_stmt_execute($query_32);
mysqli_stmt_store_result($query_32);
mysqli_stmt_bind_result($query_32, $nombre_sensor_t, $ubicacion_sensor_t, $serie_sensor_t,  $id_sensor_t);

while($row = mysqli_stmt_fetch($query_32)){
      $contador_t ++;
  $query_34 = mysqli_prepare($connect,'SELECT certificado FROM sensores_certificados WHERE id_sensor = ? ORDER BY fecha_vencimiento DESC LIMIT 1');
  mysqli_stmt_bind_param($query_34, 'i', $id_sensor_t);
  mysqli_stmt_execute($query_34);
  mysqli_stmt_store_result($query_34);
  mysqli_stmt_bind_result($query_34, $certificado_sensor_t);
  mysqli_stmt_fetch($query_34);

    if($contador_t == 30 OR $contador_t == 60 ){

       $pdf->AddPage('A4');
       //TITULOS
        $pdf->writeHTMLCell(15, 5, 15, '', 'Posición', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(35, 5, 30, '', 'N° de identificación', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(55, 5, 65, '', 'Ubicación', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(75, 5, 120, '', 'N° de serie', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(66, 5, 215, '', 'N° Certificado de Calibración', 1, 1, 0, true, 'C', true);

     } 
      $pdf->writeHTMLCell(15, 5, 15, '', $contador_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(35, 5, 30, '', $nombre_sensor_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(55, 5, 65, '', $ubicacion_sensor_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(75, 5, 120, '', $serie_sensor_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(66, 5, 215, '', $certificado_sensor_t, 1, 1, 0, true, 'C', true);
  
  }


$pdf->AddPage('A4');


//TITULOS
$pdf->writeHTMLCell(25, 10, 15, '', 'Posición -  N° de ident.', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(15, 10, 40, '', 'Mínimo (HR%)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(15, 10, 55, '', 'Máximo (HR%)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(20, 10, 70, '', 'Promedio (HR%)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(20, 10, 90, '', 'Desv. Estándar', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(15, 10, 110, '', 'MKT (HR%)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(25, 10, 125, '', 'Tiempo sup. al límite (hrs.)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(10, 10, 150, '', '%', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(25, 10, 160, '', 'Tiempo inf. al límite (hrs.)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(10, 10, 185, '', '%', 1, 1, 0, true, 'C', true);


$query_33 = mysqli_prepare($connect,"SELECT DISTINCT a.nombre, MIN(CAST(b.humedad AS DECIMAL(6,2))) as Minimo, 
                                    MAX(CAST(b.humedad AS DECIMAL(6,2))) as Maximo,AVG(CAST(b.humedad AS DECIMAL(6,2))) as Promedio, STD(CAST(b.humedad AS DECIMAL(6,2))) as Desv_Estandar, 
                                    SUM(CASE WHEN CAST(b.humedad AS DECIMAL(6,2))>$humedad_max THEN 1 ELSE 0 END) as tiempo_over, 
                                    SUM(CASE WHEN CAST(b.humedad AS DECIMAL(6,2))<$humedad_min THEN 1 ELSE 0 END) as tiempo_low,
                                    AVG(EXP(-83.144/(0.0083144*(CAST(b.humedad AS DECIMAL(6,2))+273.15)))) as valor FROM sensores as a,
                                    refrigerador_datos_crudos as b, refrigerador_sensor as c WHERE a.id_sensor = c.id_sensor AND c.id_refrigerador_sensor = b.id_refrigerador_sensor AND c.id_mapeo = ? GROUP BY a.nombre");
mysqli_stmt_bind_param($query_33, 'i', $id_mapeo);
mysqli_stmt_execute($query_33);
mysqli_stmt_store_result($query_33);
mysqli_stmt_bind_result($query_33, $nombre_sensor_t_2, $minimo_t, $maximo_t, $promedio_t, $desviacion_t, $tiempo_over_t, $tiempo_low_t, $valor);

while($row = mysqli_stmt_fetch($query_33)){

  
  
$info_max=number_format($maximo_t,2);
$info_min=number_format($minimo_t,2);
$info_prom=number_format($promedio_t,2);
$info_desv=number_format($desviacion_t,2);
$info_over=number_format(($tiempo_over_t*$intervalo)/3600,2);
$info_low=number_format(($tiempo_low_t*$intervalo)/3600,2);
$info_percent_over=number_format(($info_over/$c_hora)*100,2);
$info_percent_low=number_format(($info_low/$c_hora)*100,2);
$valor_mkt=$valor;

if($info_over>$c_hora)
{
$info_over=number_format(($s5['tiempo_over']*$intervalo)/3600,0).".00";
$info_percent_over="100.00";
}

if($info_low>$c_hora)
{
$info_low=number_format(($s5['tiempo_low']*$intervalo)/3600,0).".00";
$info_percent_low="100.00";
}	
$mkt=number_format(-1*(83.144/0.0083144)/(log($valor_mkt))-273.15,2);	
  
$pdf->writeHTMLCell(25, 10, 15, '', $nombre_sensor_t_2, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(15, 10, 40, '', $info_min, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(15, 10, 55, '', $info_max, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(20, 10, 70, '', $info_prom, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(20, 10, 90, '', $info_desv, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(15, 10, 110, '', $mkt, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(25, 10, 125, '', $info_over, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(10, 10, 150, '',  $info_percent_over, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(25, 10, 160, '', $info_low, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(10, 10, 185, '', $info_percent_low, 1, 1, 0, true, 'C', true);    
}



$pdf->AddPage('A4');

$txt= <<<EOD

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
<tr><td bgcolor="#DDDDDD"><strong>Gráficos de Todos los Sensores</strong></td></tr>
<tr><td><br>Valores Promedio, Máximo y Mínimo</td></tr>
<tr><td>$mostrar_imagen_2</td></tr></table><br><br><br>
<table>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');




$pdf->AddPage('A4');

$txt= <<<EOD

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
<tr><td bgcolor="#DDDDDD"><strong>Gráficos de Todos los Sensores</strong></td></tr>
<tr><td><br>Datos de los sensores - Periodo representativo</td></tr>
<tr><td>$mostrar_imagen_3</td></tr></table><br><br><br>
<table>

<tr><td bgcolor="#DDDDDD"><strong>Comentarios</strong></td></tr>
<tr><td>$comentarios</td></tr>
<tr><td bgcolor="#DDDDDD"><strong>Observación</strong></td></tr>
<tr><td>$observacion</td></tr>
</table>
<br><br><br><br><br>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');
$pdf->AddPage('A4');

$txt_2= <<<EOD
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
<tr><td bgcolor="#DDDDDD"><strong>Responsable</strong></td><td bgcolor="#DDDDDD"><strong>Firma</strong></td></tr>
<tr><td height="90"><br><br><br>Ing. Raúl Quevedo Silva<br>COO - Chief Operation Officer - Cercal Group Spa.</td><td height="50"></td></tr>
</table>

EOD;

$pdf->writeHTML($txt_2, true, false, false, false, '');

		$pdf->Output('Algo.pdf', 'I');
?>