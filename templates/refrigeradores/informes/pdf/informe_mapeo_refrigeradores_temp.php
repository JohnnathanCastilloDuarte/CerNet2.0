<?php
		require('../../../../recursos/encabezadopdf.php');
		require('../../../../config.ini.php');
		$id_informe = $_GET['informe'];
		$resultado_corresponde = "";
    $posicion_sensores_indicativo = 1;
	 
		
		/////////////////////////////////////////////////////////PASOS DE CREACIÓN DE PDF///////////////////////////////////////////////////////////

		// 1-CONSULTAR LA INFORMACIÓN LA CUAL SE IMPRIMIRA EN LAS CABECERAS Y EL NOMBRE DEL INFORME

		$query_1 = mysqli_prepare($connect,"SELECT nombre, id_asignado, id_mapeo, concepto, observacion, comentarios FROM informe_refrigerador WHERE id_informe_refrigerador = ?");
		mysqli_stmt_bind_param($query_1, 'i', $id_informe);
		mysqli_stmt_execute($query_1);
		mysqli_stmt_store_result($query_1);
		mysqli_stmt_bind_result($query_1, $dato_1, $id_asignado, $id_mapeo, $concepto, $observacion, $comentarios);
		mysqli_stmt_fetch($query_1);
		$nombre_informe = $dato_1;


		$query_2 = mysqli_prepare($connect,"SELECT id_servicio, id_item FROM item_asignado WHERE id_asignado = ?");
		mysqli_stmt_bind_param($query_2, 'i', $id_asignado);
		mysqli_stmt_execute($query_2);
		mysqli_stmt_store_result($query_2);
		mysqli_stmt_bind_result($query_2, $id_servicio, $id_item);
		mysqli_stmt_fetch($query_2);
	

		$query_3 = mysqli_prepare($connect,"SELECT  id_numot FROM servicio WHERE id_servicio = ?");
		mysqli_stmt_bind_param($query_3, 'i', $id_servicio);
		mysqli_stmt_execute($query_3);
		mysqli_stmt_store_result($query_3);
		mysqli_stmt_bind_result($query_3, $id_numot);
		mysqli_stmt_fetch($query_3);
		
		$query_4 = mysqli_prepare($connect,"SELECT numot, id_empresa FROM numot WHERE id_numot = ?");
		mysqli_stmt_bind_param($query_4, 'i', $id_numot);
		mysqli_stmt_execute($query_4);
		mysqli_stmt_store_result($query_4);
		mysqli_stmt_bind_result($query_4, $dato_2, $id_empresa);
		mysqli_stmt_fetch($query_4);
		
		$numot = $dato_2;

		$query_5 = mysqli_prepare($connect,"SELECT nombre, direccion FROM empresa WHERE id_empresa = ?");
		mysqli_stmt_bind_param($query_5, 'i', $id_empresa);
		mysqli_stmt_execute($query_5);
		mysqli_stmt_store_result($query_5);
		mysqli_stmt_bind_result($query_5, $nombre_empresa, $direccion_empresa);
		mysqli_stmt_fetch($query_5);
	
		$a = "MAPEO TERMICO TEMPERATURA";

		// 2-CONSULTAR LA INFORMACIÓN DE IDENTIFICACIÓN DEL EQUIPO
		$query_6 = mysqli_prepare($connect,"SELECT a.nombre, a.descripcion, b.fabricante, b.modelo, b.n_serie, b.c_interno, b.ubicacion 
																			  FROM item as a, item_refrigerador as b WHERE a.id_item = b.id_item AND a.id_item = ?");
		mysqli_stmt_bind_param($query_6, 'i', $id_item);
		mysqli_stmt_execute($query_6);
		mysqli_stmt_store_result($query_6);
		mysqli_stmt_bind_result($query_6, $nombre_item, $descripcion_item, $fabricante_item, $modelo_item, $n_serie_item, $c_interno_item, $ubicacion_item);
		mysqli_stmt_fetch($query_6);


		//3-CONSULTAR INFORMACIÓN DE MAPEO DEL EQUIPO
		$query_7 = mysqli_prepare($connect,"SELECT valor_seteado_temperatura, temperatura_minima, temperatura_maxima, fecha_inicio, hora_inicio,
																				fecha_final, hora_final,intervalo	FROM refrigerador_mapeo WHERE id_asignado = ? AND id_mapeo = ?");
		mysqli_stmt_bind_param($query_7, 'ii', $id_asignado, $id_mapeo);
		mysqli_stmt_execute($query_7);
		mysqli_stmt_store_result($query_7);
		mysqli_stmt_bind_result($query_7, $valor_seteado, $temperatura_min, $temperatura_max, $fecha_inicio, $hora_inicio, $fecha_final, $hora_final, $intervalo);
		mysqli_stmt_fetch($query_7);
		
			$fecha_incial = $fecha_inicio.' '.$hora_inicio;
			$fecha_fin = $fecha_final.' '.$hora_final;

			$c_dias = number_format(((strtotime($fecha_fin)-strtotime($fecha_incial))/3600)/24,2);
			//$c_hora = $c_dias * 24;
			
			

			
		$query_8 = mysqli_prepare($connect,"SELECT COUNT(a.temperatura) / COUNT(DISTINCT b.id_sensor) as x  FROM refrigerador_datos_crudos as a , refrigerador_sensor as b 
																				WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_asignado = ? AND b.id_mapeo = ?");
		mysqli_stmt_bind_param($query_8, 'ii', $id_asignado, $id_mapeo);
		mysqli_stmt_execute($query_8);
		mysqli_stmt_store_result($query_8);
		mysqli_stmt_bind_result($query_8, $d_1);
		mysqli_stmt_fetch($query_8);

	 	$total_mediciones = number_format($d_1,2); 

		

		//4-CALCULO DE TIEMPO ACUMULADO AL LIMITE MAXIMO 
		$query_9 = mysqli_prepare($connect,"SELECT DISTINCT MAX(CAST(a.temperatura AS DECIMAL(6,2))) as maximo, a.time FROM refrigerador_datos_crudos as a, refrigerador_sensor as b 
																				WHERE CAST(a.temperatura AS DECIMAL(6,2)) >= ? AND b.id_asignado = ? AND a.id_refrigerador_sensor = b.id_refrigerador_sensor 
																				GROUP BY a.time");
		mysqli_stmt_bind_param($query_9, 'ii', $temperatura_max, $id_asignado);
		mysqli_stmt_execute($query_9);
		mysqli_stmt_store_result($query_9);
		mysqli_stmt_bind_result($query_9, $maximo);
		mysqli_stmt_fetch($query_9);
		

		$query_10 = mysqli_prepare($connect,"SELECT DISTINCT MAX(CAST(a.temperatura AS DECIMAL(6,2))) as maximo, a.time FROM refrigerador_datos_crudos as a, refrigerador_sensor as b 
																				WHERE b.id_asignado = ? AND a.id_refrigerador_sensor = b.id_refrigerador_sensor 
																				GROUP BY a.time");
		mysqli_stmt_bind_param($query_10, 'i', $id_asignado);
		mysqli_stmt_execute($query_10);
		mysqli_stmt_store_result($query_10);
		mysqli_stmt_bind_result($query_10, $x);
		mysqli_stmt_fetch($query_10);

		
		$query_11 = mysqli_prepare($connect,"SELECT DISTINCT MIN(CAST(a.temperatura AS DECIMAL(6,2))) as minimo, a.time FROM refrigerador_datos_crudos as a, refrigerador_sensor as b 
																				WHERE CAST(a.temperatura AS DECIMAL(6,2)) <= ? AND b.id_asignado = ? AND a.id_refrigerador_sensor = b.id_refrigerador_sensor 
																				GROUP BY a.time");
		mysqli_stmt_bind_param($query_11, 'ii', $temperatura_min, $id_asignado);
		mysqli_stmt_execute($query_11);
		mysqli_stmt_store_result($query_11);
		mysqli_stmt_bind_result($query_11, $minimo);
		mysqli_stmt_fetch($query_11);

		$c_hora=number_format((mysqli_stmt_num_rows($query_10)*$intervalo)/3600,2);

		$registros_under=number_format((mysqli_stmt_num_rows($query_11)*$intervalo)/3600,2);
		$min_percent=number_format(($registros_under/$c_hora)*100,2);

		$registros_over=number_format((mysqli_stmt_num_rows($query_9)*$intervalo)/3600,2);
		$max_percent=number_format(($registros_over/$c_hora)*100,2);
	


		////////////VALIDO EL NOMBRE DEL MAPEO
		$query_12 = mysqli_prepare($connect,"SELECT nombre FROM refrigerador_mapeo WHERE id_mapeo = ?");
		mysqli_stmt_bind_param($query_12, 'i', $id_mapeo);
		mysqli_stmt_execute($query_12);
		mysqli_stmt_store_result($query_12);
		mysqli_stmt_bind_result($query_12, $nombre_mapeo);
		mysqli_stmt_fetch($query_12);
		

		//valido la existencia de un concepto ingresado en el informe
		if( $concepto == "concepto"){
			$resultado_corresponde = $nombre_mapeo." de Temperatura de ".$nombre_item." modelo: ".$modelo_item." por un periodo de ".$c_hora ."hora(s).";	
		}else{
			$resultado_corresponde = $concepto;
		}


	
		//////////CONSULTAR EL PROMEDIO GENERAL
		$query_13 = mysqli_prepare($connect,"SELECT AVG(CAST(a.temperatura AS DECIMAL(6,2))) as promedio FROM refrigerador_datos_crudos as a, refrigerador_sensor as b 
																					WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ? AND b.id_asignado = ? ");
		mysqli_stmt_bind_param($query_13, 'ii', $id_mapeo, $id_asignado);
		mysqli_stmt_execute($query_13);
		mysqli_stmt_store_result($query_13);
		mysqli_stmt_bind_result($query_13, $d_2);
		mysqli_stmt_fetch($query_13);
		
		$prom_general = number_format($d_2,2);


		$query_14 = mysqli_prepare($connect,"SELECT MAX(CAST(a.temperatura AS DECIMAL(6,2))) as maximo, a.time, c.nombre, d.nombre FROM refrigerador_datos_crudos as a,
																					refrigerador_sensor as b, bandeja as c, sensores as d WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ? 
																					AND b.id_asignado = ?
																					AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor GROUP BY a.time, c.nombre, d.nombre ORDER BY maximo DESC LIMIT 1  ");
		mysqli_stmt_bind_param($query_14, 'ii', $id_mapeo, $id_asignado);
		mysqli_stmt_execute($query_14);
		mysqli_stmt_store_result($query_14);
		mysqli_stmt_bind_result($query_14, $max_general, $max_time_general, $bandeja_max_general, $sensor_max_general);
		mysqli_stmt_fetch($query_14);	
	
		//CALCULO DEL MINIMO GENERAL

		$query_15 = mysqli_prepare($connect,"SELECT MIN(CAST(a.temperatura AS DECIMAL(6,2))) as minimo, a.time, c.nombre, d.nombre FROM refrigerador_datos_crudos as a,
																					refrigerador_sensor as b, bandeja as c, sensores as d WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ? 
																					AND b.id_asignado = ?
																					AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor GROUP BY a.time, c.nombre, d.nombre ORDER BY minimo ASC LIMIT 1  ");
		mysqli_stmt_bind_param($query_15, 'ii', $id_mapeo, $id_asignado);
		mysqli_stmt_execute($query_15);
		mysqli_stmt_store_result($query_15);
		mysqli_stmt_bind_result($query_15, $min_general, $min_time_general, $bandeja_min_general, $sensor_min_general);
		mysqli_stmt_fetch($query_15);

		//CALCULO DE LA DESVIACIÓN ESTANDAR		

		$query_16 = mysqli_prepare($connect,"SELECT STD(CAST(a.temperatura AS DECIMAL(6,2))) as desviacion FROM refrigerador_datos_crudos as a, refrigerador_sensor as b, 
																					bandeja as c, sensores as d WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ? AND b.id_asignado = ?
																					AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor  ");
		mysqli_stmt_bind_param($query_16, 'ii', $id_mapeo, $id_asignado);
		mysqli_stmt_execute($query_16);
		mysqli_stmt_store_result($query_16);
		mysqli_stmt_bind_result($query_16, $d_3);
		mysqli_stmt_fetch($query_16);

		$desviacion_general = number_format($d_3);
		
		$desv_3max_num=number_format($prom_general+(3*$desviacion_general),2);
		if($desv_3max_num<$temperatura_max)
		{
		$cumple_max="Si cumple";
		}
			else
			{
			$cumple_max="No cumple";	
			}
		
		$desv_3min_num=number_format($prom_general-(3*$desviacion_general),2);
		if($desv_3min_num>$temperatura_min)
		{
		$cumple_min="Si cumple";
		}
			else
			{
			$cumple_min="No cumple";	
			}



	//CALCULAR MKT 

	$query_17 = mysqli_prepare($connect,"SELECT AVG(EXP(-83.144/(0.0083144*(CAST(temperatura AS DECIMAL(6,2))+273.15)))) as valor FROM refrigerador_datos_crudos as a, refrigerador_sensor as b, 
																					bandeja as c, sensores as d WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ? AND b.id_asignado = ?
																					AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor  ");
	mysqli_stmt_bind_param($query_17, 'ii', $id_mapeo, $id_asignado);
	mysqli_stmt_execute($query_17);
	mysqli_stmt_store_result($query_17);
	mysqli_stmt_bind_result($query_17, $mkt_g);
	mysqli_stmt_fetch($query_17);

	$mkt_gen=number_format(-1*(83.144/0.0083144)/(log($mkt_g))-273.15,2);


	//CALCULO DE LA DIFERENCIA MAXIMA 
	$query_18 = mysqli_prepare($connect,"SELECT MAX(CAST(temperatura AS DECIMAL(6,2))) AS maximo, MIN(CAST(temperatura AS DECIMAL(6,2))) as minimo, MAX(CAST(temperatura AS DECIMAL(6,2))) - MIN(CAST(temperatura AS DECIMAL(6,2))) AS resta,
																				a.time FROM refrigerador_datos_crudos as a,
																					refrigerador_sensor as b, bandeja as c, sensores as d WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ?
																					AND b.id_asignado = ?
																					AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor GROUP BY a.time  ORDER BY resta DESC LIMIT 1  ");
	mysqli_stmt_bind_param($query_18, 'ii', $id_mapeo, $id_asignado);
	mysqli_stmt_execute($query_18);
	mysqli_stmt_store_result($query_18);
	mysqli_stmt_bind_result($query_18, $dif_maxi, $dif_min, $dif_max_resta, $dif_max_time);
	mysqli_stmt_fetch($query_18);

	$query_19 = mysqli_prepare($connect,"SELECT a.nombre FROM sensores as a, refrigerador_sensor as b, refrigerador_datos_crudos as c WHERE a.id_sensor = b.id_sensor AND b.id_refrigerador_sensor = c.id_refrigerador_sensor 
																			 AND c.temperatura = ? AND c.time = ? AND b.id_asignado = ? AND b.id_mapeo = ? ");
	mysqli_stmt_bind_param($query_19, 'isii', $dif_maxi, $dif_max_time, $id_asignado, $id_mapeo);
	mysqli_stmt_execute($query_19);
	mysqli_stmt_store_result($query_19);
	mysqli_stmt_bind_result($query_19, $dif_max_sensor);
	mysqli_stmt_fetch($query_19);


	$query_20 = mysqli_prepare($connect,"SELECT a.nombre FROM sensores as a, refrigerador_sensor as b, refrigerador_datos_crudos as c WHERE a.id_sensor = b.id_sensor AND b.id_refrigerador_sensor = c.id_refrigerador_sensor 
																			 AND c.temperatura = ? AND c.time = ? AND b.id_asignado = ? AND b.id_mapeo = ? ");
	mysqli_stmt_bind_param($query_20, 'isii', $dif_min, $dif_max_time, $id_asignado, $id_mapeo);
	mysqli_stmt_execute($query_20);
	mysqli_stmt_store_result($query_20);
	mysqli_stmt_bind_result($query_20, $dif_min_sensor);
	mysqli_stmt_fetch($query_20);



	//CALCULO DE LA DIFERENCIA MAXIMA 
	$query_21 = mysqli_prepare($connect,"SELECT MAX(CAST(temperatura AS DECIMAL(6,2))) AS maximo, MIN(CAST(temperatura AS DECIMAL(6,2))) as minimo, MAX(CAST(temperatura AS DECIMAL(6,2))) - MIN(CAST(temperatura AS DECIMAL(6,2))) AS resta,
																				a.time FROM refrigerador_datos_crudos as a,
																					refrigerador_sensor as b, bandeja as c, sensores as d WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ?
																					AND b.id_asignado = ?
																					AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor GROUP BY a.time  ORDER BY resta ASC LIMIT 1  ");
	mysqli_stmt_bind_param($query_21, 'ii', $id_mapeo, $id_asignado);
	mysqli_stmt_execute($query_21);
	mysqli_stmt_store_result($query_21);
	mysqli_stmt_bind_result($query_21, $dif_maxi, $dif_min, $dif_max_resta, $dif_max_time);
	mysqli_stmt_fetch($query_21);

	$query_22 = mysqli_prepare($connect,"SELECT a.nombre FROM sensores as a, refrigerador_sensor as b, refrigerador_datos_crudos as c WHERE a.id_sensor = b.id_sensor AND b.id_refrigerador_sensor = c.id_refrigerador_sensor 
																			 AND c.temperatura = ? AND c.time = ? AND b.id_asignado = ? AND b.id_mapeo = ? ");
	mysqli_stmt_bind_param($query_22, 'isii', $dif_maxi, $dif_max_time, $id_asignado, $id_mapeo);
	mysqli_stmt_execute($query_22);
	mysqli_stmt_store_result($query_22);
	mysqli_stmt_bind_result($query_22, $dif_max_sensor);
	mysqli_stmt_fetch($query_22);


	$query_23 = mysqli_prepare($connect,"SELECT a.nombre FROM sensores as a, refrigerador_sensor as b, refrigerador_datos_crudos as c WHERE a.id_sensor = b.id_sensor AND b.id_refrigerador_sensor = c.id_refrigerador_sensor 
																			 AND c.temperatura = ? AND c.time = ? AND b.id_asignado = ? AND b.id_mapeo = ? ");
	mysqli_stmt_bind_param($query_23, 'isii', $dif_min, $dif_max_time, $id_asignado, $id_mapeo);
	mysqli_stmt_execute($query_23);
	mysqli_stmt_store_result($query_23);
	mysqli_stmt_bind_result($query_23, $dif_min_sensor);
	mysqli_stmt_fetch($query_23);



	//CALCULO DE LA DIFERENCIA MINIMA
	$query_24 = mysqli_prepare($connect,"SELECT MIN(CAST(temperatura AS DECIMAL(6,2))) AS maximo, MIN(CAST(temperatura AS DECIMAL(6,2))) as minimo, MAX(CAST(temperatura AS DECIMAL(6,2))) - MIN(CAST(temperatura AS DECIMAL(6,2))) AS resta,
																				a.time FROM refrigerador_datos_crudos as a,
																					refrigerador_sensor as b, bandeja as c, sensores as d WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ?
																					AND b.id_asignado = ?
																					AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor GROUP BY a.time  ORDER BY resta DESC LIMIT 1  ");
	mysqli_stmt_bind_param($query_24, 'ii', $id_mapeo, $id_asignado);
	mysqli_stmt_execute($query_24);
	mysqli_stmt_store_result($query_24);
	mysqli_stmt_bind_result($query_24, $dif_maxi_2, $dif_min_2, $dif_max_resta_2, $dif_max_time_2);
	mysqli_stmt_fetch($query_24);

  
	$query_25 = mysqli_prepare($connect,"SELECT a.nombre FROM sensores as a, refrigerador_sensor as b, refrigerador_datos_crudos as c WHERE a.id_sensor = b.id_sensor AND b.id_refrigerador_sensor = c.id_refrigerador_sensor 
																			 AND c.temperatura = ? AND c.time = ? AND b.id_asignado = ? AND b.id_mapeo = ? ");
	mysqli_stmt_bind_param($query_25, 'isii', $dif_maxi_2, $dif_max_time_2, $id_asignado, $id_mapeo);
	mysqli_stmt_execute($query_25);
	mysqli_stmt_store_result($query_25);
	mysqli_stmt_bind_result($query_25, $dif_max_sensor_2);
	mysqli_stmt_fetch($query_25);
		
  

	$query_26 = mysqli_prepare($connect,"SELECT a.nombre FROM sensores as a, refrigerador_sensor as b, refrigerador_datos_crudos as c WHERE a.id_sensor = b.id_sensor AND b.id_refrigerador_sensor = c.id_refrigerador_sensor 
																			 AND c.temperatura = ? AND c.time = ? AND b.id_asignado = ? AND b.id_mapeo = ? ");
	mysqli_stmt_bind_param($query_26, 'isii', $dif_min_2, $dif_max_time_2, $id_asignado, $id_mapeo);
	mysqli_stmt_execute($query_26);
	mysqli_stmt_store_result($query_26);
	mysqli_stmt_bind_result($query_26, $dif_min_sensor_2);
	mysqli_stmt_fetch($query_26);

	//SENSORES CON PROMEDIO MAS ALTO
	$query_27 = mysqli_prepare($connect,"SELECT AVG(CAST(a.temperatura AS DECIMAL(6,2))) as promedio, c.nombre, d.nombre FROM refrigerador_datos_crudos as a, refrigerador_sensor as b, bandeja as c, sensores as d 
																				WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ? AND b.id_asignado = ? AND c.id_bandeja = b.id_bandeja AND d.id_sensor = b.id_sensor
																				GROUP BY c.nombre ,d.nombre order by promedio desc limit 1 ");
	mysqli_stmt_bind_param($query_27, 'ii', $id_mapeo ,$id_asignado);
	mysqli_stmt_execute($query_27);
	mysqli_stmt_store_result($query_27);
	mysqli_stmt_bind_result($query_27, $d_4, $max_avg_posicion, $max_avg_sensor);
	mysqli_stmt_fetch($query_27);

	$max_avg = number_format($d_4,2);

	//SENSORES CON PROMEDIO MAS BAJO 
	$query_28 = mysqli_prepare($connect,"SELECT AVG(CAST(a.temperatura AS DECIMAL(6,2))) as promedio, c.nombre, d.nombre FROM refrigerador_datos_crudos as a, refrigerador_sensor as b, bandeja as c, sensores as d 
																				WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ? AND b.id_asignado = ? AND c.id_bandeja = b.id_bandeja AND d.id_sensor = b.id_sensor
																				GROUP BY c.nombre ,d.nombre order by promedio ASC limit 1 ");
	mysqli_stmt_bind_param($query_28, 'ii', $id_mapeo ,$id_asignado);
	mysqli_stmt_execute($query_28);
	mysqli_stmt_store_result($query_28);
	mysqli_stmt_bind_result($query_28, $d_5, $min_avg_posicion, $min_avg_sensor);
	mysqli_stmt_fetch($query_28);
	
	$min_avg = number_format($d_5,2);

	//SENSOR CON MAYOR DESVIACION
	$query_29 = mysqli_prepare($connect,"SELECT std(CAST(a.temperatura AS DECIMAL(6,2))) as promedio, c.nombre, d.nombre FROM refrigerador_datos_crudos as a, refrigerador_sensor as b, bandeja as c, sensores as d 
																				WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ? AND b.id_asignado = ? AND c.id_bandeja = b.id_bandeja AND d.id_sensor = b.id_sensor
																				GROUP BY c.nombre ,d.nombre order by promedio DESC limit 1 ");
	mysqli_stmt_bind_param($query_29, 'ii', $id_mapeo ,$id_asignado);
	mysqli_stmt_execute($query_29);
	mysqli_stmt_store_result($query_29);
	mysqli_stmt_bind_result($query_29, $d_6, $max_desv_posicion, $max_desv_sensor);
	mysqli_stmt_fetch($query_29);

	$max_desv = number_format($d_6,2);
	
	//SENSOR CON MENOR DESVIACION
	$query_30 = mysqli_prepare($connect,"SELECT std(CAST(a.temperatura AS DECIMAL(6,2))) as promedio, c.nombre, d.nombre FROM refrigerador_datos_crudos as a, refrigerador_sensor as b, bandeja as c, sensores as d 
																				WHERE a.id_refrigerador_sensor = b.id_refrigerador_sensor AND b.id_mapeo = ? AND b.id_asignado = ? AND c.id_bandeja = b.id_bandeja AND d.id_sensor = b.id_sensor
																				GROUP BY c.nombre ,d.nombre order by promedio ASC limit 1 ");
	mysqli_stmt_bind_param($query_30, 'ii', $id_mapeo ,$id_asignado);
	mysqli_stmt_execute($query_30);
	mysqli_stmt_store_result($query_30);
	mysqli_stmt_bind_result($query_30, $d_7, $min_desv_posicion, $min_desv_sensor);
	mysqli_stmt_fetch($query_30);

	$min_desv = number_format($d_7,2);




  //OBTENER UBICACIÓN DE SENSORES Y SUS IMAGENES 
   
  $query_31 = mysqli_prepare($connect,"SELECT ubicacion FROM images_informe_refrigeradores WHERE id_informe = ? AND tipo_imagen = ?");
  mysqli_stmt_bind_param($query_31, 'ii', $id_informe, $posicion_sensores_indicativo);
  mysqli_stmt_execute($query_31);
  mysqli_stmt_store_result($query_31);
  mysqli_stmt_bind_result($query_31, $ubicacion_posicion_sensores);
  mysqli_stmt_fetch($query_31);



  $query_34 = mysqli_prepare($connect,"SELECT ubicacion FROM images_informe_refrigeradores WHERE id_informe = ? AND tipo_imagen = 2");
  mysqli_stmt_bind_param($query_34, 'i', $id_informe);
  mysqli_stmt_execute($query_34);
  mysqli_stmt_store_result($query_34);
  mysqli_stmt_bind_result($query_34, $img_sensores_2);
  mysqli_stmt_fetch($query_34);

  $query_35 = mysqli_prepare($connect,"SELECT ubicacion FROM images_informe_refrigeradores WHERE id_informe = ? AND tipo_imagen = 3");
  mysqli_stmt_bind_param($query_35, 'i', $id_informe);
  mysqli_stmt_execute($query_35);
  mysqli_stmt_store_result($query_35);
  mysqli_stmt_bind_result($query_35, $img_sensores_3);
  mysqli_stmt_fetch($query_35);
  
  

		
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

<table><tr><td bgcolor="#DDDDDD"><H3><strong>INSPECCIÓN DE MAPEO TÉRMICO</strong></H3></td></tr></table><br><br>
<table>
<tr><td width="15%" ><strong>Informe:</strong></td><td width="45%">$nombre_informe</td>
<td width="15%"><strong>O.T. N°</strong></td><td width="25%">$numot</td></tr>
<tr><td width="15%"><strong>Solicitante:</strong></td><td>$nombre_empresa</td>
		<td>Dirección:</td><td>$direccion_empresa</td></tr>

		<tr><td width="15%"><strong>Atención:</strong></td><td>$contacto - $cargo</td>
		<td>Fecha de emisión:</td><td>$emision</td></tr>
		</table><br><br>

		<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>1. Identificación del Equipo o Muestra</strong></H3></td></tr>

		<tr><td width="30%" class="enunciado">Descripción:</td><td width="70%">$nombre_item de almacenamiento de	$descripcion_item</td></tr>
		<tr><td width="30%" class="enunciado">Marca:</td><td width="70%">$fabricante_item</td></tr>
		<tr><td width="30%" class="enunciado">Modelo:</td><td width="70%">$modelo_item</td></tr>
		<tr><td width="30%" class="enunciado">N° de serie / Código interno</td><td width="70%">$n_serie_item</td></tr>
		<tr><td width="30%" class="enunciado">Ubicación</td><td width="70%">$ubicacion_item</td></tr>
		<tr><td width="30%" class="enunciado">Valor seteado</td><td width="70%">$valor_seteado</td></tr>
		<tr><td width="30%" rowspan="2" class="enunciado">Límites (°C)</td>

		<td width="35%">Máximo</td><td width="35%">Mínimo</td></tr>
		<tr><td width="35%">$temperatura_max</td><td width="35%">$temperatura_min</td></tr>
		</table><br><br>

		<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>2. Resumen de las Mediciones</strong></H3></td></tr>

		<tr><td width="30%" class="enunciado">Resultado corresponde a:</td><td width="70%">$resultado_corresponde</td></tr>
		<tr><td width="30%" class="enunciado">Fecha de inicio</td><td width="70%">$fecha_inicio $hora_inicio</td></tr>
		<tr><td width="30%" class="enunciado">Fecha de término</td><td width="70%">$fecha_final $hora_final</td></tr>
		<tr><td width="30%" class="enunciado">Cantidad de mediciones</td><td width="70%">$total_mediciones</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo total de mediciones (Horas)</td><td width="70%">$c_hora</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo total de mediciones (dias)</td><td width="70%">$c_dias</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo acumulado superior al límite máximo (hrs.)</td><td width="70%">$registros_over</td></tr>
		<tr><td width="30%" class="enunciado">% Superior al límite máximo</td><td width="70%">$max_percent%</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo acumulado mínimo al límite (hrs.)</td><td width="70%">$registros_under</td></tr>
		<tr><td width="30%" class="enunciado">% inferior a límite mínimo</td><td width="70%">$min_percent%</td></tr>
		</table><br><br>

		<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>3. Resultados de la Medición Obtenida</strong></H3></td></tr>

		<tr><td width="30%" class="enunciado">Promedio General (°C)</td><td width="70%" colspan="5">$prom_general</td></tr>

		<tr><td width="30%" class="enunciado">Máximo General (°C)</td><td width="10%">$max_general</td>
		<td width="10%">a las:</td><td width="20%">$max_time_general</td><td width="10%">En:</td><td width="20%">$sensor_max_general, Ubicado en posición: $bandeja_max_general</td></tr>

		<tr><td width="30%" class="enunciado">Mínimo General (°C)</td><td width="10%">$min_general</td>
		<td width="10%">a las:</td><td width="20%">$min_time_general</td><td width="10%">En:</td><td width="20%">$sensor_min_general, Ubicado en posición: $bandeja_min_general</td></tr>

		<tr><td width="30%" class="enunciado">Desv. Estandar de todos los sensores</td><td width="70%" colspan="3">$desviacion_general</td></tr>

		<tr><td width="30%" class="enunciado">Promedio + 3 Desv. Est. (°C)</td><td width="20%">$desv_3max_num</td><td width="25%">Cumple Limite Máx.</td><td width="25%">$cumple_max</td></tr>

		<tr><td width="30%" class="enunciado">Promedio - 3 Desv. Est. (°C)</td><td width="20%">$desv_3min_num</td><td width="25%">Cumple Limite Mín.</td><td width="25%">$cumple_min</td></tr>

		<tr><td width="30%" class="enunciado">MKT General (°C)*</td><td width="70%">$mkt_gen</td></tr>

		</table>
		* Usa: Energía activación = 83,144 (kj/mol) y Constante universal de gases ideales = 0,0083144 (kj/mol)<br><br>

		<table width="100%"><tr><td colspan="8" bgcolor="#DDDDDD"><H3><strong>4. Análisis de los Resultados</strong></H3></td></tr>

		<tr><td width="30%" class="enunciado">Dif. Máx. entre sensores</td><td width="10%">$dif_max_resta</td><td width="10%">a las:</td>
		<td width="20%" class="enunciado">$dif_max_time</td><td width="7%">entre</td><td width="10%">$dif_max_sensor</td><td width="3%">y</td>
		<td width="10%" class="enunciado">$dif_min_sensor</td></tr>

		<tr><td width="30%" class="enunciado">Dif. Mín. entre sensores</td><td width="10%">$dif_max_resta_2</td><td width="10%">a las:</td>
		<td width="20%" class="enunciado">$dif_max_time_2</td><td width="7%">entre</td><td width="10%">$dif_max_sensor_2</td><td width="3%">y</td>
		<td width="10%" class="enunciado">$dif_min_sensor_2</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con promedio más alto (°C)</td><td width="10%">$max_avg</td><td width="10%">en:</td><td width="50%">$max_avg_sensor, ubicado en: $max_avg_posicion</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con promedio más bajo (°C)</td><td width="10%">$min_avg</td><td width="10%">en:</td><td width="50%">$min_avg_sensor, ubicado en: $min_avg_posicion</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con mayor Desv. Est. (°C)</td><td width="10%">$max_desv</td><td width="10%">en:</td><td width="50%">$max_desv_sensor, ubicado en: $max_desv_posicion</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con menor Desv. Est. (°C)</td><td width="10%">$min_desv</td><td width="10%">en:</td><td width="50%">$min_desv_sensor, ubicado en: $min_desv_posicion</td></tr>
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

 
<table>
<tr><td bgcolor="#DDDDDD"><strong>Ubicación de los Sensores</strong></td></tr>
<tr><td><br><br><img src="../../$ubicacion_posicion_sensores"></td></tr></table><br><br><br>
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

$pdf->writeHTMLCell(15, 10, 40, '', 'Mínimo (°C)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(15, 10, 55, '', 'Máximo (°C)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(20, 10, 70, '', 'Promedio (°C)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(20, 10, 90, '', 'Desv. Estándar', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(15, 10, 110, '', 'MKT (°C)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(25, 10, 125, '', 'Tiempo sup. al límite (hrs.)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(10, 10, 150, '', '%', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(25, 10, 160, '', 'Tiempo inf. al límite (hrs.)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(10, 10, 185, '', '%', 1, 1, 0, true, 'C', true);


$query_33 = mysqli_prepare($connect,"SELECT DISTINCT a.nombre, MIN(CAST(b.temperatura AS DECIMAL(6,2))) as Minimo, 
                                    MAX(CAST(b.temperatura AS DECIMAL(6,2))) as Maximo,AVG(CAST(b.temperatura AS DECIMAL(6,2))) as Promedio, STD(CAST(b.temperatura AS DECIMAL(6,2))) as Desv_Estandar, 
                                    SUM(CASE WHEN CAST(b.temperatura AS DECIMAL(6,2))>$temperatura_max THEN 1 ELSE 0 END) as tiempo_over, 
                                    SUM(CASE WHEN CAST(b.temperatura AS DECIMAL(6,2))<$temperatura_min THEN 1 ELSE 0 END) as tiempo_low,
                                    AVG(EXP(-83.144/(0.0083144*(CAST(b.temperatura AS DECIMAL(6,2))+273.15)))) as valor FROM sensores as a,
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
<tr><td><br><br><img src="../../$img_sensores_2" width="450px"></td></tr></table><br><br><br>
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
<tr><td><br><br><img src="../../$img_sensores_3" width="450px"></td></tr></table><br><br><br>
<table>

<tr><td bgcolor="#DDDDDD"><strong>Comentarios</strong></td></tr>
<tr><td>$comentarios</td></tr>
<tr><td bgcolor="#DDDDDD"><strong>Observación</strong></td></tr>
<tr><td>$observacion</td></tr>
</table>
<br><br><br><br><br>
<table>
<tr><td bgcolor="#DDDDDD"><strong>Responsable</strong></td><td bgcolor="#DDDDDD"><strong>Firma</strong></td></tr>
<tr><td height="90"><br><br><br>Ing. Raúl Quevedo Silva<br>COO - Chief Operation Officer - Cercal Group Spa.</td><td height="50"></td></tr>
</table>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

		$pdf->Output('Algo.pdf', 'I');
?>