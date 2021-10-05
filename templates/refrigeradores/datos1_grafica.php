<?php 
	include("../../config.ini.php");

	$id_informe = $_POST['id_informe'];
		
	//CONSULTAR ID_MAPEO Y ID_ASIGNADO 
	$consultar_1 = mysqli_prepare($connect,"SELECT id_mapeo, id_asignado, tipo FROM informe_refrigerador WHERE id_informe_refrigerador = $id_informe");
	mysqli_stmt_execute($consultar_1);
	mysqli_stmt_store_result($consultar_1);
	mysqli_stmt_bind_result($consultar_1, $id_mapeo, $id_asignado, $tipo);
	mysqli_stmt_fetch($consultar_1);

	
	//CONSULTAR EL DIRECTORIO PARA ABRIRLO y ID DE REFRIGERAODR SNEOSR
	$consultar_2 = mysqli_prepare($connect,"SELECT datos_crudos, id_refrigerador_sensor FROM refrigerador_sensor WHERE id_mapeo = $id_mapeo AND id_asignado = $id_asignado");
	mysqli_stmt_execute($consultar_2);
	mysqli_stmt_store_result($consultar_2);
	mysqli_stmt_bind_result($consultar_2, $datos_crudos, $id_refrigerador_sensor);
	mysqli_stmt_fetch($consultar_2);

	//CONSULTAR_LISTAS




	if($tipo == 0){


		$consultar_3 = mysqli_prepare($connect,"SELECT a.time,  MIN(a.temperatura) as min, MAX(a.temperatura) as Maxi, AVG(a.temperatura) as promedio FROM refrigerador_datos_crudos as a, refrigerador_sensor as b WHERE b.id_mapeo = ? GROUP BY time DESC");
		mysqli_stmt_bind_param($consultar_3, 'i', $id_mapeo);
		mysqli_stmt_execute($consultar_3);
		mysqli_stmt_store_result($consultar_3);
		mysqli_stmt_bind_result($consultar_3, $time, $min, $max, $promedio);

		$json = array();
		while($row = mysqli_stmt_fetch($consultar_3)){

			$json[] = array(
				'time' => $time,
				'max'=>$max,
				'min'=>$min,
				'promedio'=>$promedio
			); 
		}

		$convert = json_encode($json);
		echo $convert;
	}
	else{
		$consultar_3 = mysqli_prepare($connect,"SELECT a.time, MIN(a.humedad) as min, MAX(a.humedad) as Maxi, AVG(a.humedad) as promedio FROM refrigerador_datos_crudos as a, refrigerador_sensor as b WHERE b.id_mapeo = ? GROUP BY time DESC");
		mysqli_stmt_bind_param($consultar_3, 'i', $id_mapeo);
		mysqli_stmt_execute($consultar_3);
		mysqli_stmt_store_result($consultar_3);
		mysqli_stmt_bind_result($consultar_3, $time, $min, $max, $promedio);

		$json = array();


		while($row = mysqli_stmt_fetch($consultar_3)){

			$json[] = array(
				'time' => $time,
				'min'=>$min,
				'max'=>$max,
				'promedio'=>$promedio
			); 

		}


		$convert = json_encode($json);

		echo $convert;
	}

	mysqli_stmt_close($connect);


?>