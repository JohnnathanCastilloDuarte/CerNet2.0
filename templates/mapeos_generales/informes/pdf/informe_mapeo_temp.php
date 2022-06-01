<?php
	require('../../../../recursos/encabezadopdf.php');
	require('../../../../config.ini.php');
	$id_informe = $_GET['informe'];
	$resultado_corresponde = "";
	$posicion_sensores_indicativo = 1;

		/////////////////////////////////////////////////////////PASOS DE CREACIÓN DE PDF///////////////////////////////////////////////////////////

		// 1-CONSULTAR LA INFORMACIÓN LA CUAL SE IMPRIMIRA EN LAS CABECERAS Y EL NOMBRE DEL INFORME

		$query_1 = mysqli_prepare($connect,"SELECT nombre, id_asignado, id_mapeo, observacion, comentario, corresponde_a,  fecha_registro FROM informes_general WHERE id_informe = ?");
		mysqli_stmt_bind_param($query_1, 'i', $id_informe);
		mysqli_stmt_execute($query_1);
		mysqli_stmt_store_result($query_1);
		mysqli_stmt_bind_result($query_1, $dato_1, $id_asignado, $id_mapeo, $observacion, $comentarios, $concepto, $fecha_registro);
		mysqli_stmt_fetch($query_1);

		$nombre_informe = $dato_1;


		$query_2 = mysqli_prepare($connect,"SELECT a.id_servicio, a.id_item, b.nombre, b.apellido, c.nombre, a.solicitante, a.cargo_solicitante  FROM item_asignado  as a, persona as b, cargo as c WHERE a.id_asignado = ? AND a.usuario_responsable = b.id_usuario AND b.id_cargo = c.id_cargo");
		mysqli_stmt_bind_param($query_2, 'i', $id_asignado);
		mysqli_stmt_execute($query_2);
		mysqli_stmt_store_result($query_2);
		mysqli_stmt_bind_result($query_2, $id_servicio, $id_item, $nombres, $apellidos, $cargo,$solicitante, $cargo_solicitante);
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

		// 2-CONSULTAR LA INFORMACIÓN DE IDENTIFICACIÓN DEL EQUIPO

		$nombre_item = "";
		$descripcion_item = "";
		

		$query_6 = mysqli_prepare($connect,"SELECT a.nombre, a.descripcion, a.id_tipo FROM item as a WHERE a.id_item = ?");
		mysqli_stmt_bind_param($query_6, 'i', $id_item);
		mysqli_stmt_execute($query_6);
		mysqli_stmt_store_result($query_6);
		mysqli_stmt_bind_result($query_6, $nombre_item, $descripcion_item, $tipo_item);
		mysqli_stmt_fetch($query_6);

		if(count($nombre_item) == 0){
			$nombre_item = "No asignado";
		}

		if(count($descripcion_item) == 0){
			$descripcion_item = "No asignado";
		}


		///////////////// VALIDO EL TIPO DE ITEM Y POR ENDE QUE TABLA CONSULTAR

		$traer_tipo_item = mysqli_prepare($connect,"SELECT nombre FROM tipo_item WHERE id_item = ?");
		mysqli_stmt_bind_param($traer_tipo_item, 'i', $tipo_item);
		mysqli_stmt_execute($traer_tipo_item);
		mysqli_stmt_store_result($traer_tipo_item);
		mysqli_stmt_bind_result($traer_tipo_item, $nombre_tipo_item);
		mysqli_stmt_fetch($traer_tipo_item);

		$marca_item = "";
		$modelo_item = "";
		$ubicacion_item = "";
		$valor_seteado_item = "";
		$valor_maximo_item = "";
		$valor_minimo_item = "";
		$codigo_interno_item = "";

    
		switch ($nombre_tipo_item) {
        
      case 'Bodega':

      $consultar_item_bodega = mysqli_prepare($connect,"SELECT b.direccion, b.codigo_interno, a.productos_almacena, a.largo, a.ancho, a.superficie, a.volumen, a.altura, a.tipo_muro, a.tipo_cielo, a.s_climatizacion, a.s_monitoreo, a.s_alarma, a.planos, a.analisis_riesgo, a.ficha_estabilidad, a.id_usuario, a.fecha_registro, a.marca_bodega, a.modelo_bodega, a.temp_max, 
      a.temp_min, a.hr_max, a.hr_min, a.orientacion_principal, a.orientacion_recepcion, a.orientacion_despacho, a.num_puertas, a.salida_emergencia, a.cantidad_rack, a.num_estantes,
      a.altura_max_rack, a.sistema_extraccion, a.cielo_lus, a.cantidad_iluminarias, a.valor_seteado_temp 
      FROM item_bodega a, item b 
      WHERE b.id_item =  ? AND a.id_item = b.id_item");
      mysqli_stmt_bind_param($consultar_item_bodega, 'i', $id_item);
      mysqli_stmt_execute($consultar_item_bodega);
      mysqli_stmt_store_result($consultar_item_bodega);
      mysqli_stmt_bind_result($consultar_item_bodega, $ubicacion, $codigo_interno, $productos_almacena, $largo, $ancho, $superficie, $volumen, $altura, $tipo_muro, 
                          $tipo_cielo, $s_climatizacion, $s_monitoreo, $s_alarma, $planos, $analisis_riesgo, $ficha_estabilidad, $id_usuario, $fecha_registro, 
                          $marca, $modelo, $max_temp, $min_temp, $max_hr, $min_hr, $orientacion_principal, $orientacion_rececpion, $orientacion_despacho, $num_puertas,
                          $salida_emergencia, $cantidad_rack, $num_estantes, $altura_max_rack, $sistema_extraccion,  $cielo_lus, $cantidad_luminarias, $valor_seteado_temp);

      mysqli_stmt_fetch($consultar_item_bodega);

      break;
        
			case 'Camara Congelada':
			
					$consulta_info = mysqli_prepare($connect,"SELECT marca, modelo, ubicacion, valor_seteado, valor_maximo, valor_minimo FROM item_camara_congelada WHERE id_item = ?");
					mysqli_stmt_bind_param($consulta_info, 'i', $id_item);
					mysqli_stmt_execute($consulta_info);
					mysqli_stmt_store_result($consulta_info);
					mysqli_stmt_bind_result($consulta_info, $marca, $modelo, $ubicacion, $valor_seteado, $valor_maximo, $valor_minimo);
					mysqli_stmt_fetch($consulta_info);


				break;
			
			default:
				# code...
				break;
		} 


		$fechas_mapeo = mysqli_prepare($connect,"SELECT nombre, fecha_inicio, fecha_fin, intervalo FROM mapeo_general WHERE id_mapeo = ? ");
		mysqli_stmt_bind_param($fechas_mapeo, 'i', $id_mapeo);
		mysqli_stmt_execute($fechas_mapeo);
		mysqli_stmt_store_result($fechas_mapeo);
		mysqli_stmt_bind_result($fechas_mapeo, $nombre_prueba, $fecha_inicio, $fecha_fin, $intervalo);
		mysqli_stmt_fetch($fechas_mapeo);

   $a = mb_strtoupper( "PRUEBA DE MAPEO TÉRMICO A ".$nombre_empresa);

	
    $mediciones = mysqli_prepare($connect,"SELECT DATEDIFF(fecha_fin, fecha_inicio) FROM mapeo_general WHERE id_mapeo = ?");
    mysqli_stmt_bind_param($mediciones, 'i',  $id_mapeo);
    mysqli_stmt_execute($mediciones);
    mysqli_stmt_store_result($mediciones);
    mysqli_stmt_bind_result($mediciones, $c_dia);
    mysqli_stmt_fetch($mediciones);
    $c_hora = number_format(($c_dia * 24),0);
  

		//CALCULO DE TIEMPO ACUMULADO AL LIMITE MAXIMO 
		$limite_maximo = mysqli_prepare($connect,"SELECT DISTINCT MAX(CAST(a.temp AS DECIMAL(6,2))) as maximo, a.time FROM datos_crudos_general as a, mapeo_general_sensor as b 
																				WHERE CAST(a.temp AS DECIMAL(6,2)) > ? AND a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? GROUP BY a.time");
		mysqli_stmt_bind_param($limite_maximo, 'ii', $max_temp, $id_mapeo);
		mysqli_stmt_execute($limite_maximo);
		mysqli_stmt_store_result($limite_maximo);
		mysqli_stmt_bind_result($limite_maximo, $maximo, $tiempo_limite_maximo);
		mysqli_stmt_fetch($limite_maximo);

		$registros_over=number_format((mysqli_stmt_num_rows($limite_maximo)*$intervalo)/3600,2);
		$max_percent=number_format(($registros_over/$c_hora)*100,2);
  
    

		//CALCULO DE TIEMPO ACUMULADO AL LIMITE MINIMO 
		$limite_minimo = mysqli_prepare($connect,"SELECT DISTINCT MIN(CAST(a.temp AS DECIMAL(6,2))) as minimo, a.time FROM datos_crudos_general as a, mapeo_general_sensor as b 
																				WHERE CAST(a.temp AS DECIMAL(6,2)) < ? AND a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?	GROUP BY a.time");
		mysqli_stmt_bind_param($limite_minimo, 'ii', $min_temp, $id_mapeo);
		mysqli_stmt_execute($limite_minimo);
		mysqli_stmt_store_result($limite_minimo);
		mysqli_stmt_bind_result($limite_minimo, $minimo);
		mysqli_stmt_fetch($limite_minimo);

		$registros_under=number_format((mysqli_stmt_num_rows($limite_minimo)*$intervalo)/3600,2);
		$min_percent=number_format(($registros_under/$c_hora)*100,2);
 

		//////////CONSULTAR EL PROMEDIO GENERAL
		$query_13 = mysqli_prepare($connect,"SELECT AVG(CAST(a.temp AS DECIMAL(6,2))) as promedio FROM datos_crudos_general as a, mapeo_general_sensor as b 
																					WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?");
		mysqli_stmt_bind_param($query_13, 'i', $id_mapeo);
		mysqli_stmt_execute($query_13);
		mysqli_stmt_store_result($query_13);
		mysqli_stmt_bind_result($query_13, $d_2);
		mysqli_stmt_fetch($query_13);
		
		$prom_general = number_format($d_2,2);

		$query_14 = mysqli_prepare($connect,"SELECT MAX(CAST(a.temp AS DECIMAL(6,2))) as maximo, a.time, c.nombre, d.nombre, b.posicion FROM datos_crudos_general as a,
																					mapeo_general_sensor as b, bandeja as c, sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? 
																					AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor GROUP BY a.time, c.nombre, d.nombre, b.posicion ORDER BY maximo DESC LIMIT 1  ");
		mysqli_stmt_bind_param($query_14, 'i', $id_mapeo);
		mysqli_stmt_execute($query_14);
		mysqli_stmt_store_result($query_14);
		mysqli_stmt_bind_result($query_14, $max_general, $max_time_general, $bandeja_max_general, $sensor_max_general, $posicion_max_general);
		mysqli_stmt_fetch($query_14);

    if($posicion_max_general == 0){
      $posicion_max_general = "SA";
    }    

		//CALCULO DEL MINIMO GENERAL

		$query_15 = mysqli_prepare($connect,"SELECT MIN(CAST(a.temp AS DECIMAL(6,2))) as minimo, a.time, c.nombre, d.nombre, b.posicion FROM datos_crudos_general as a,
																					mapeo_general_sensor as b, bandeja as c, sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? 
																					AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor GROUP BY a.time, c.nombre, d.nombre, b.posicion ORDER BY minimo ASC LIMIT 1");
		mysqli_stmt_bind_param($query_15, 'i', $id_mapeo);
		mysqli_stmt_execute($query_15);
		mysqli_stmt_store_result($query_15);
		mysqli_stmt_bind_result($query_15, $min_general, $min_time_general, $bandeja_min_general, $sensor_min_general, $posicion_min_general);
		mysqli_stmt_fetch($query_15);

     if($posicion_min_general == 0){
      $posicion_min_general = "SA";
    } 
		//CALCULO DE LA DESVIACIÓN ESTANDAR		

		$query_16 = mysqli_prepare($connect,"SELECT STD(CAST(a.temp AS DECIMAL(6,2))) as desviacion FROM datos_crudos_general as a, mapeo_general_sensor as b, 
																					bandeja as c, sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? 
																					AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor");
		mysqli_stmt_bind_param($query_16, 'i', $id_mapeo);
		mysqli_stmt_execute($query_16);
		mysqli_stmt_store_result($query_16);
		mysqli_stmt_bind_result($query_16, $d_3);
		mysqli_stmt_fetch($query_16);

		$desviacion_general = number_format($d_3,2);

 
		$desv_3max_num=number_format($prom_general+(3*$desviacion_general),2);
		if($desv_3max_num<$temperatura_max){
			$cumple_max="Si cumple";
		}else{
			$cumple_max="No cumple";	
		}
		
		$desv_3min_num=number_format($prom_general-(3*$desviacion_general),2);
		if($desv_3min_num>$temperatura_min){
			$cumple_min="Si cumple";
		}else{
			$cumple_min="No cumple";	
		}


	//CALCULAR MKT 

	$query_17 = mysqli_prepare($connect,"SELECT AVG(EXP(-83.144/(0.0083144*(CAST(temp AS DECIMAL(6,2))+273.15)))) as valor FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c, sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? 	AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor  ");
	mysqli_stmt_bind_param($query_17, 'i', $id_mapeo);
	mysqli_stmt_execute($query_17);
	mysqli_stmt_store_result($query_17);
	mysqli_stmt_bind_result($query_17, $mkt_g);
	mysqli_stmt_fetch($query_17);

	$mkt_gen=number_format(-1*(83.144/0.0083144)/(log($mkt_g))-273.15,2);


	//CALCULO DE LA DIFERENCIA MAXIMA 

	$query_21 = mysqli_prepare($connect,"SELECT MAX(CAST(temp AS DECIMAL(6,1))) AS maximo, MIN(CAST(temp AS DECIMAL(6,1))) as minimo, 
  MAX(CAST(temp AS DECIMAL(6,1))) - MIN(CAST(temp AS DECIMAL(6,1))) AS resta, a.time FROM datos_crudos_general as a, mapeo_general_sensor as b, 
  bandeja as c, sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor 
  GROUP BY a.time ORDER BY maximo ASC LIMIT 1 ");
	mysqli_stmt_bind_param($query_21, 'i', $id_mapeo);
	mysqli_stmt_execute($query_21);
	mysqli_stmt_store_result($query_21);
	mysqli_stmt_bind_result($query_21, $dif_maxi, $dif_min, $dif_max_resta, $dif_max_time);
	mysqli_stmt_fetch($query_21);

  $dif_max_resta = number_format($dif_max_resta, 2);

	$query_22 = mysqli_prepare($connect,"SELECT a.nombre FROM sensores as a, mapeo_general_sensor as b, datos_crudos_general as c 
  WHERE a.id_sensor = b.id_sensor AND b.id_sensor_mapeo = c.id_sensor_mapeo AND c.temp = $dif_maxi AND c.time = '$dif_max_time' AND b.id_mapeo = $id_mapeo ");
	//mysqli_stmt_bind_param($query_22, 'ssi', $dif_maxi, $dif_max_time, $id_mapeo);
	mysqli_stmt_execute($query_22);
	mysqli_stmt_store_result($query_22);
	mysqli_stmt_bind_result($query_22, $dif_max_sensor);
	mysqli_stmt_fetch($query_22);


 

	$query_20 = mysqli_prepare($connect,"SELECT a.nombre FROM sensores as a, mapeo_general_sensor as b, datos_crudos_general as c WHERE a.id_sensor = b.id_sensor
  AND b.id_sensor_mapeo = c.id_sensor_mapeo AND c.temp = $dif_min AND c.time = '$dif_max_time' AND b.id_mapeo = $id_mapeo");
	//mysqli_stmt_bind_param($query_20, 'ssi', $dif_min, $dif_max_time, $id_mapeo);
	mysqli_stmt_execute($query_20);
	mysqli_stmt_store_result($query_20);
	mysqli_stmt_bind_result($query_20, $dif_min_sensor);
	mysqli_stmt_fetch($query_20);
  
  

	//CALCULO DE LA DIFERENCIA MINIMA
	$query_24 = mysqli_prepare($connect,"SELECT MIN(CAST(temp AS DECIMAL(6,1))) AS maximo, MIN(CAST(temp AS DECIMAL(6,1))) as minimo, 
  MAX(CAST(temp AS DECIMAL(6,1))) - MIN(CAST(temp AS DECIMAL(6,1))) AS resta, a.time FROM datos_crudos_general as a, mapeo_general_sensor as b, 
  bandeja as c, sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor 
  GROUP BY a.time  ORDER BY minimo DESC LIMIT 1");
	mysqli_stmt_bind_param($query_24, 'i', $id_mapeo);
	mysqli_stmt_execute($query_24);
	mysqli_stmt_store_result($query_24);
	mysqli_stmt_bind_result($query_24, $dif_maxi_2, $dif_min_2, $dif_max_resta_2, $dif_max_time_2);
	mysqli_stmt_fetch($query_24);
	  
  $dif_max_resta_2 = number_format($dif_max_resta_2, 2);
  
 

	$query_25 = mysqli_prepare($connect,"SELECT a.nombre FROM sensores as a, mapeo_general_sensor as b, datos_crudos_general as c WHERE a.id_sensor = b.id_sensor 
  AND b.id_sensor_mapeo = c.id_sensor_mapeo AND c.temp =$dif_maxi_2 AND c.time ='$dif_max_time_2' AND b.id_mapeo = $id_mapeo");
	//mysqli_stmt_bind_param($query_25, 'ssi', $dif_maxi_2, $dif_max_time_2, $id_mapeo);
	mysqli_stmt_execute($query_25);
	mysqli_stmt_store_result($query_25);
	mysqli_stmt_bind_result($query_25, $dif_max_sensor_2);
	mysqli_stmt_fetch($query_25);

  

	$query_26 = mysqli_prepare($connect,"SELECT a.nombre FROM sensores as a, mapeo_general_sensor as b, datos_crudos_general as c WHERE a.id_sensor = b.id_sensor
  AND b.id_sensor_mapeo = c.id_sensor_mapeo AND c.temp =  $dif_min_2 AND c.time = '$dif_max_time_2' AND b.id_mapeo = $id_mapeo");
	mysqli_stmt_execute($query_26);
	mysqli_stmt_store_result($query_26);
	mysqli_stmt_bind_result($query_26, $dif_min_sensor_2);
	mysqli_stmt_fetch($query_26);



	//SENSORES CON PROMEDIO MAS ALTO
	$query_27 = mysqli_prepare($connect,"SELECT AVG(CAST(a.temp AS DECIMAL(6,2))) as promedio, c.nombre, d.nombre FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c, sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? AND c.id_bandeja = b.id_bandeja AND d.id_sensor = b.id_sensor GROUP BY c.nombre ,d.nombre order by promedio desc limit 1 ");
	mysqli_stmt_bind_param($query_27, 'i', $id_mapeo);
	mysqli_stmt_execute($query_27);
	mysqli_stmt_store_result($query_27);
	mysqli_stmt_bind_result($query_27, $d_4, $max_avg_posicion, $max_avg_sensor);
	mysqli_stmt_fetch($query_27);

	$max_avg = number_format($d_4,2);


	//SENSORES CON PROMEDIO MAS BAJO 
	$query_28 = mysqli_prepare($connect,"SELECT AVG(CAST(a.temp AS DECIMAL(6,2))) as promedio, c.nombre, d.nombre FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c, sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? AND c.id_bandeja = b.id_bandeja AND d.id_sensor = b.id_sensor
	GROUP BY c.nombre ,d.nombre order by promedio ASC limit 1 ");
	mysqli_stmt_bind_param($query_28, 'i', $id_mapeo);
	mysqli_stmt_execute($query_28);
	mysqli_stmt_store_result($query_28);
	mysqli_stmt_bind_result($query_28, $d_5, $min_avg_posicion, $min_avg_sensor);
	mysqli_stmt_fetch($query_28);

	$min_avg = number_format($d_5,2);


	//SENSOR CON MAYOR DESVIACION
	$query_29 = mysqli_prepare($connect,"SELECT std(CAST(a.temp AS DECIMAL(6,2))) as promedio, c.nombre, d.nombre FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c, sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? AND c.id_bandeja = b.id_bandeja AND d.id_sensor = b.id_sensor					GROUP BY c.nombre ,d.nombre order by promedio DESC limit 1 ");
	mysqli_stmt_bind_param($query_29, 'i', $id_mapeo);
	mysqli_stmt_execute($query_29);
	mysqli_stmt_store_result($query_29);
	mysqli_stmt_bind_result($query_29, $d_6, $max_desv_posicion, $max_desv_sensor);
	mysqli_stmt_fetch($query_29);

	$max_desv = number_format($d_6,2);


	//SENSOR CON MENOR DESVIACION
	$query_30 = mysqli_prepare($connect,"SELECT std(CAST(a.temp AS DECIMAL(6,2))) as promedio, c.nombre, d.nombre FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c, sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? AND c.id_bandeja = b.id_bandeja AND d.id_sensor = b.id_sensor	GROUP BY c.nombre ,d.nombre order by promedio ASC limit 1 ");
	mysqli_stmt_bind_param($query_30, 'i', $id_mapeo);
	mysqli_stmt_execute($query_30);
	mysqli_stmt_store_result($query_30);
	mysqli_stmt_bind_result($query_30, $d_7, $min_desv_posicion, $min_desv_sensor);
	mysqli_stmt_fetch($query_30);

	$min_desv = number_format($d_7,2);


  $query_8 = mysqli_prepare($connect,"SELECT  
  ((DATEDIFF(a.fecha_fin,a.fecha_inicio) * 1440) / (a.intervalo / 60)) as cantidad_mediciones  
  FROM mapeo_general AS a,  mapeo_general_sensor AS b WHERE a.id_mapeo = b.id_mapeo AND b.id_sensor_mapeo = ?");
  mysqli_stmt_bind_param($query_8, 'i', $id_mapeo);
  mysqli_stmt_execute($query_8);
  mysqli_stmt_store_result($query_8);
  mysqli_stmt_bind_result($query_8, $d_1);
  mysqli_stmt_fetch($query_8);

  $total_mediciones = $d_1;

  //OBTENER UBICACIÓN DE SENSORES Y SUS IMAGENES 
  $tipo_imagen_1 = 1;
  $img_1 = "";
  $url_imagen_1 = "";

  $tipo_imagen_2 = 2;
  $img_2 = "";
  $url_imagen_2 = "";

  $tipo_imagen_3 = 3;
  $img_3 = "";
  $url_imagen_3 = "";

  $query_31 = mysqli_prepare($connect,"SELECT url FROM imagenes_general_informe WHERE id_informe = ? AND tipo = ?");
  mysqli_stmt_bind_param($query_31, 'ii', $id_informe, $tipo_imagen_1);
  mysqli_stmt_execute($query_31);
  mysqli_stmt_store_result($query_31);
  mysqli_stmt_bind_result($query_31, $url_imagen_1);
  mysqli_stmt_fetch($query_31);
	
  if(mysqli_stmt_num_rows($query_31) > 0){
	  $img_1 = '<img src="../../'.$url_imagen_1.'" width="220px">';
  }else{
	  $img_1 = '<img src="../../../design/images/no_imagen.png">';
  }

  $num_ot = substr($numot,2);

  $query_34 = mysqli_prepare($connect,"SELECT url FROM imagenes_general_informe WHERE id_informe = ? AND tipo = ?");
  mysqli_stmt_bind_param($query_34, 'ii', $id_informe, $tipo_imagen_2);
  mysqli_stmt_execute($query_34);
  mysqli_stmt_store_result($query_34);
  mysqli_stmt_bind_result($query_34, $url_imagen_2);
  mysqli_stmt_fetch($query_34);

  	if(mysqli_stmt_num_rows($query_34) > 0){
		$img_2 = '<img src="../../'.$url_imagen_2.'"  width="600px">';
	}else{
		$img_2 = '<img src="../../../design/images/no_imagen.png">';
	}


  $query_35 = mysqli_prepare($connect,"SELECT url FROM imagenes_general_informe WHERE id_informe = ? AND tipo = ?");
  mysqli_stmt_bind_param($query_35, 'ii', $id_informe, $tipo_imagen_3);
  mysqli_stmt_execute($query_35);
  mysqli_stmt_store_result($query_35);
  mysqli_stmt_bind_result($query_35, $url_imagen_3);
 
  
//nombre prueba minuscula

$nombre_prueba_minuscula = mb_strtolower($nombre_prueba) ;


//Fecha emición
$fecha_emicion = substr($fecha_registro,0, -8);
		
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

<table><tr><td bgcolor="#DDDDDD"><H3><strong>PRUEBA DE TEMPERATURA</strong></H3></td></tr></table><br><br>
<table>
<tr><td width="15%" ><strong>Informe:</strong></td><td width="45%">$nombre_informe</td>
<td width="15%"><strong>O.T. N°</strong></td><td width="25%">$num_ot</td></tr>
<tr><td width="15%"><strong>Solicitante:</strong></td><td>$nombre_empresa</td>
		<td>Dirección:</td><td>$direccion_empresa</td></tr>

		<tr><td width="15%"><strong>Atención:</strong></td><td>$solicitante - $cargo_solicitante</td>
		<td>Fecha de emisión:</td><td>$fecha_emicion</td></tr>
		</table><br><br>

		<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>1. Identificación del Equipo o Muestra</strong></H3></td></tr>

		<tr><td width="30%" class="enunciado">Descripción:</td><td width="70%">$descripcion_item</td></tr>
		<tr><td width="30%" class="enunciado">Marca:</td><td width="70%">$marca</td></tr>
		<tr><td width="30%" class="enunciado">Modelo:</td><td width="70%">$modelo</td></tr>
		<tr><td width="30%" class="enunciado">N° de serie / Código interno</td><td width="70%">$codigo_interno</td></tr>
		<tr><td width="30%" class="enunciado">Ubicación</td><td width="70%">$direccion_empresa</td></tr>
		<tr><td width="30%" class="enunciado">Valor seteado (°C)</td><td width="70%">$valor_seteado_temp</td></tr>
		<tr><td width="30%" rowspan="2" class="enunciado">Límites (°C)</td>

		<td width="35%">Máximo</td><td width="35%">Mínimo</td></tr>
		<tr><td width="35%">$max_temp</td><td width="35%">$min_temp</td></tr>
		</table><br><br>

		<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>2. Resumen de las Mediciones</strong></H3></td></tr>

		<tr><td width="30%" class="enunciado">Resultado corresponde a:</td><td width="70%">Prueba de Mapeo Térmico $nombre_prueba_minuscula por un período de $c_hora horas durante $c_dia Dias</td></tr>
		<tr><td width="30%" class="enunciado">Fecha de inicio</td><td width="70%">$fecha_inicio</td></tr>
		<tr><td width="30%" class="enunciado">Fecha de término</td><td width="70%">$fecha_fin</td></tr>
		<tr><td width="30%" class="enunciado">Cantidad de mediciones</td><td width="70%">$total_mediciones</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo total de mediciones (hrs.)</td><td width="70%">$c_hora</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo total de mediciones (días)</td><td width="70%">$c_dia</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo acumulado superior al límite máximo (hrs.)</td><td width="70%">$registros_over</td></tr>
		<tr><td width="30%" class="enunciado">Superior al límite máximo (%)</td><td width="70%">$max_percent</td></tr>
		<tr><td width="30%" class="enunciado">Tiempo acumulado mínimo al límite (hrs.)</td><td width="70%">$registros_under</td></tr>
		<tr><td width="30%" class="enunciado">Inferior al límite mínimo (%)</td><td width="70%">$min_percent</td></tr>
		</table><br>

		<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>3. Resultados de la Medición Obtenida</strong></H3></td></tr>

		<tr><td width="30%" class="enunciado">Promedio General (°C)</td><td width="70%" colspan="5">$prom_general</td></tr>

		<tr><td width="30%" class="enunciado">Máximo General (°C)</td><td width="10%">$max_general</td>
		<td width="10%">a las:</td><td width="20%">$max_time_general</td><td width="10%">En:</td><td width="20%">$sensor_max_general, Ubicado en posición $posicion_max_general: $bandeja_max_general</td></tr>

		<tr><td width="30%" class="enunciado">Mínimo General (°C)</td><td width="10%">$min_general</td>
		<td width="10%">a las:</td><td width="20%">$min_time_general</td><td width="10%">En:</td><td width="20%">$sensor_min_general, Ubicado en posición $posicion_min_general: $bandeja_min_general</td></tr>

		<tr><td width="30%" class="enunciado">Desv. Estándar de todos los sensores (°C)</td><td width="70%" colspan="3">$desviacion_general</td></tr>

		<tr><td width="30%" class="enunciado">Promedio + 3 Desv. Est. (°C)</td><td width="20%">$desv_3max_num</td><td width="25%">Cumple Limite Máx.</td><td width="25%">Informativo</td></tr>

		<tr><td width="30%" class="enunciado">Promedio - 3 Desv. Est. (°C)</td><td width="20%">$desv_3min_num</td><td width="25%">Cumple Limite Mín.</td><td width="25%">Informativo</td></tr>

		<tr><td width="30%" class="enunciado">MKT General (°C)*</td><td width="70%">$mkt_gen</td></tr>

		</table>
		* Usa: Energía activación = 83,144 (kJ/mol) y Constante universal de gases ideales = 0,0083144 (kJ/mol)<br><br>

		<table width="100%"><tr><td colspan="8" bgcolor="#DDDDDD"><H3><strong>4. Análisis de los Resultados</strong></H3></td></tr>

		<tr><td width="30%" class="enunciado">Dif. Máx. entre sensores (°C)</td><td width="10%"> $dif_max_resta</td><td width="10%">a las:</td>
		<td width="20%" class="enunciado">$dif_max_time</td><td width="7%">entre</td><td width="10%">$dif_max_sensor</td><td width="3%">y</td>
		<td width="10%" class="enunciado">$dif_min_sensor</td></tr>

		<tr><td width="30%" class="enunciado">Dif. Mín. entre sensores (°C)</td><td width="10%">$dif_max_resta_2</td><td width="10%">a las:</td>
		<td width="20%" class="enunciado">$dif_max_time_2</td><td width="7%">entre</td><td width="10%">$dif_max_sensor_2</td><td width="3%">y</td>
		<td width="10%" class="enunciado">$dif_min_sensor_2</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con promedio más alto (°C)</td><td width="10%">$max_avg</td><td width="10%">en:</td><td width="50%">$max_avg_sensor, ubicado en: $max_avg_posicion</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con promedio más bajo (°C)</td><td width="10%">$min_avg</td><td width="10%">en:</td><td width="50%">$min_avg_sensor, ubicado en: $min_avg_posicion</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con mayor Desv. Est. (°C)</td><td width="10%">$max_desv</td><td width="10%">en:</td><td width="50%">$max_desv_sensor, ubicado en: $max_desv_posicion</td></tr>

		<tr><td width="30%" class="enunciado">Sensor con menor Desv. Est. (°C)</td><td width="10%">$min_desv</td><td width="10%">en:</td><td width="50%">$min_desv_sensor, ubicado en: $min_desv_posicion</td></tr>
</table>

<br>
<br>

EOD;

$pdf->writeHTML($html, true, false, false, false, '');
$pdf->AddPage('A4');
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
<tr><td><br><br>$img_1 </td></tr></table><br><br><br>
EOD;

$pdf->writeHTML($html_2, true,false,false,false,'');

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(170, 170, 170)));
//TITULOS
$pdf->writeHTMLCell(15, 8, 15, '', 'Posición', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(28, 8, 30, '', 'N° de identificación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(55, 8, 58, '', 'Ubicación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(28, 8, 113, '', 'N° de serie', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(54, 8, 141, '', 'N° Certificado de Calibración', 1, 1, 0, true, 'C', true);

$contador_t = 0;
//CONSULTA
$query_32 = mysqli_prepare($connect,"SELECT DISTINCT a.nombre, b.nombre, a.serie, a.id_sensor, b.id_bandeja, c.posicion FROM sensores as a, bandeja as b, mapeo_general_sensor as c 
WHERE c.id_sensor = a.id_sensor AND c.id_mapeo = ? AND b.id_bandeja = c.id_bandeja ORDER BY b.id_bandeja ASC, c.posicion ASC ");
mysqli_stmt_bind_param($query_32, 'i', $id_mapeo);
mysqli_stmt_execute($query_32);
mysqli_stmt_store_result($query_32);
mysqli_stmt_bind_result($query_32, $nombre_sensor_t, $ubicacion_sensor_t, $serie_sensor_t,  $id_sensor_t, $id_bandeja, $posicion);

while($row = mysqli_stmt_fetch($query_32)){
  
    if($posicion == 0){
      $posicion = "SA";
    }
  
      $contador_t ++;
  $query_34 = mysqli_prepare($connect,'SELECT certificado FROM sensores_certificados WHERE id_sensor = ? ORDER BY fecha_vencimiento DESC LIMIT 1');
  mysqli_stmt_bind_param($query_34, 'i', $id_sensor_t);
  mysqli_stmt_execute($query_34);
  mysqli_stmt_store_result($query_34);
  mysqli_stmt_bind_result($query_34, $certificado_sensor_t);
  mysqli_stmt_fetch($query_34);

    if($contador_t == 30 OR $contador_t == 70 OR $contador_t == 110){

       $pdf->AddPage('A4');
       //TITULOS
       $pdf->writeHTMLCell(15, 8, 15, '', 'Posición', 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(28, 8, 30, '', 'N° de identificación', 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(55, 8, 58, '', 'Ubicación', 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(28, 8, 113, '', 'N° de serie', 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(54, 8, 141, '', 'N° Certificado de Calibración', 1, 1, 0, true, 'C', true);

     } 
      $pdf->writeHTMLCell(15, 5, 15, '', $posicion, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(28, 5, 30, '', $nombre_sensor_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(55, 5, 58, '', $ubicacion_sensor_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(28, 5, 113, '', $serie_sensor_t, 1, 0, 0, true, 'C', true);

       $pdf->writeHTMLCell(54, 5, 141, '', $certificado_sensor_t, 1, 1, 0, true, 'C', true);
  
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
<tr><td bgcolor="#DDDDDD"><h3><strong>Datos obtenidos por Sensores</strong></h3></td></tr>
</table>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$variable_utilizada_saltos="";
       
$consultar_1 = mysqli_prepare($connect, "SELECT DISTINCT a.nombre, a.id_bandeja FROM bandeja as a, mapeo_general_sensor as b 
WHERE a.id_bandeja = b.id_bandeja and b.id_mapeo  = ?  ORDER BY a.id_bandeja ASC");
mysqli_stmt_bind_param($consultar_1, 'i', $id_mapeo);
mysqli_stmt_execute($consultar_1);
mysqli_stmt_store_result($consultar_1);
mysqli_stmt_bind_result($consultar_1 ,  $nombre_zona, $id_zona);

for($i = 0; $i< mysqli_stmt_num_rows($consultar_1); $i++){
  mysqli_stmt_fetch($consultar_1);
   if($i==0){
    $variable_utilizada_saltos = $nombre_zona;
  }else{
  if($variable_utilizada_saltos != $nombre_zona){
    $pdf->AddPage('A4');
    $variable_utilizada_saltos = $nombre_zona;
   }
  }
  $pdf->ln(5);
  $pdf->writeHTMLCell(180, 10, 15, '', $nombre_zona , 0, 1, 0, true, 'C', true);
  

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


/*
 SUM(CASE WHEN CAST(b.temp AS DECIMAL(6,2))>$valor_maximo_item THEN 1 ELSE 0 END) as tiempo_over, 
                                    SUM(CASE WHEN CAST(b.temp AS DECIMAL(6,2))<$valor_maximo_item THEN 1 ELSE 0 END) as tiempo_low,
*/
 $contador_for_table = 1;
$query_33 = mysqli_prepare($connect,"SELECT DISTINCT a.nombre, MIN(CAST(b.temp AS DECIMAL(6,2))) as Minimo, MAX(CAST(b.temp AS DECIMAL(6,2))) as Maximo,
AVG(CAST(b.temp AS DECIMAL(6,2))) as Promedio, STD(CAST(b.temp AS DECIMAL(6,2))) as Desv_Estandar, 
SUM(CASE WHEN CAST(b.temp AS DECIMAL(4,2))>? THEN 1 ELSE 0 END) as tiempo_over,
SUM(CASE WHEN CAST(b.temp AS DECIMAL(4,2))<? THEN 1 ELSE 0 END) as tiempo_low,
AVG(EXP(-83.144/(0.0083144*(CAST(b.temp AS DECIMAL(6,2))+273.15)))) as valor, c.posicion 
FROM sensores as a, datos_crudos_general as b, mapeo_general_sensor as c, bandeja as g WHERE 
a.id_sensor = c.id_sensor AND c.id_sensor_mapeo = b.id_sensor_mapeo AND c.id_mapeo = ? AND c.id_bandeja = g.id_bandeja 
AND g.id_bandeja = ? GROUP BY a.nombre, c.posicion ORDER BY c.posicion ASC");

    
mysqli_stmt_bind_param($query_33, 'ssii', $max_temp, $min_temp, $id_mapeo, $id_zona);
mysqli_stmt_execute($query_33);
mysqli_stmt_store_result($query_33);
mysqli_stmt_bind_result($query_33, $nombre_sensor_t_2, $minimo_t, $maximo_t, $promedio_t, $desviacion_t, $tiempo_over_t, $tiempo_low_t, $valor, $posicion);

while($row = mysqli_stmt_fetch($query_33)){

  
  if($posicion == 0){
    $posicion = "SA";
  }
  
  
$info_max=number_format($maximo_t,2);
$info_min=number_format($minimo_t,2);
$info_prom=number_format($promedio_t,2);
$info_desv=number_format($desviacion_t,2);
$info_over=number_format(($tiempo_over_t*$intervalo)/3600,2);
$info_low=number_format(($tiempo_low_t*$intervalo)/3600,2);
$info_percent_over=number_format(($info_over/$c_hora)*100,2);
$info_percent_low=number_format(($info_low/$c_hora)*100,2);
$valor_mkt=$valor;


$mkt=number_format(-1*(83.144/0.0083144)/(log($valor_mkt))-273.15,2);	
  
if($contador_for_table == 31 || $contador_for_table == 40){
  $pdf->AddPage('A4');
  
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
}  
  
  
  
$pdf->writeHTMLCell(25, 6, 15, '', $posicion.'-'.$nombre_sensor_t_2, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(15, 6, 40, '', $info_min, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(15, 6, 55, '', $info_max, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(20, 6, 70, '', $info_prom, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(20, 6, 90, '', $info_desv, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(15, 6, 110, '', $mkt, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(25, 6, 125, '', $info_over, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(10, 6, 150, '',  $info_percent_over, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(25, 6, 160, '', $info_low, 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(10, 6, 185, '', $info_percent_low, 1, 1, 0, true, 'C', true); 
  
  
  
  $contador_for_table++;
}
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
<tr><td><br><br>$img_2</td></tr></table><br><br><br>
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
<tr><td><br>Datos de los sensores - Periodo representativo</td></tr></table>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');


$otro_contador = 0;
for($i = 0; $i<mysqli_stmt_num_rows($query_35);$i++){
mysqli_stmt_fetch($query_35);
if($url_imagen_3 != ""){
  $img_3 = '<img src="../../'.$url_imagen_3.'"  width="600px">';
}else{
  $img_3 = '<img src="../../../../design/images/no_imagen.png" width="250px">';
}  
  
if($otro_contador == 1 ){
  $pdf->AddPage('A4');
  $otro_contador = -1;
}  
$otro_contador++;  
  
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
  <tr><td><br><br><br>$img_3</td></tr>
</table>
<hr>
EOD;
$pdf->writeHTML($txt, true, false, false, false, '');
}

$pdf->AddPage();

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
<tr><td bgcolor="#DDDDDD"><strong>Comentarios</strong></td></tr>
<tr><td>$comentarios</td></tr>
<tr><td bgcolor="#DDDDDD"><strong>Observación</strong></td></tr>
<tr><td>$observacion</td></tr>
</table>
<br><br><br>
<table>
<tr><td bgcolor="#DDDDDD"><strong>Responsable</strong></td><td bgcolor="#DDDDDD"><strong>Firma</strong></td></tr>
<tr><td height="90"><br><br><br>$nombres $apellidos<br> $cargo - Cercal Group Spa.</td><td height="50"></td></tr>
</table>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

		$pdf->Output($nombre_informe.'.pdf', 'I');
?>