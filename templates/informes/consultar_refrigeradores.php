<?php 

	include("../../config.ini.php");

	$tipo_1 = "Mapeo termico de refrigeradores";

	$tipo_2 = "Calificación refrigeradores";


		$tipo_informe_1 = mysqli_prepare($connect,"SELECT id_servicio_tipo FROM servicio_tipo WHERE servicio = ?");
		mysqli_stmt_bind_param($tipo_informe_1, 's', $tipo_1);
		mysqli_stmt_execute($tipo_informe_1);
		mysqli_stmt_store_result($tipo_informe_1);
		mysqli_stmt_bind_result($tipo_informe_1, $id_servicio_mapeo);
		mysqli_stmt_fetch($tipo_informe_1);

		$tipo_informe_2 = mysqli_prepare($connect,"SELECT id_servicio_tipo FROM servicio_tipo WHERE servicio = ?");
		mysqli_stmt_bind_param($tipo_informe_2, 's', $tipo_2);
		mysqli_stmt_execute($tipo_informe_2);
		mysqli_stmt_store_result($tipo_informe_2);
		mysqli_stmt_bind_result($tipo_informe_2, $id_servicio_calificacion);
		mysqli_stmt_fetch($tipo_informe_2);

		$mapeo = mysqli_prepare($connect,"SELECT count(a.id_asignado)  FROM item_asignado as a, numot as b, servicio as c WHERE c.id_servicio_tipo =  $id_servicio_mapeo AND b.fecha_fin_informe is NULL");
		mysqli_stmt_execute($mapeo);
		mysqli_stmt_store_result($mapeo);
		mysqli_stmt_bind_result($mapeo, $cantidad_mapeo);
		mysqli_stmt_fetch($mapeo);

		$mapeo_en_proceso = mysqli_prepare($connect,"SELECT count(a.id_asignado)  FROM item_asignado as a, numot as b, servicio as c WHERE c.id_servicio_tipo =  $id_servicio_mapeo AND b.fecha_fin_informe is NULL
																								AND b.fecha_informe is not NULL");
		mysqli_stmt_execute($mapeo_en_proceso);
		mysqli_stmt_store_result($mapeo_en_proceso);
		mysqli_stmt_bind_result($mapeo_en_proceso, $mapeo_progreso);
		mysqli_stmt_fetch($mapeo_en_proceso);


		$mapeo_fin = mysqli_prepare($connect,"SELECT count(a.id_asignado)  FROM item_asignado as a, numot as b, servicio as c WHERE c.id_servicio_tipo =  $id_servicio_mapeo AND b.fecha_fin_informe is NULL
																								AND b.fecha_informe is not NULL AND b.fecha_fin_informe is not NULL");
		mysqli_stmt_execute($mapeo_fin);
		mysqli_stmt_store_result($mapeo_fin);
		mysqli_stmt_bind_result($mapeo_fin, $mapeo_final);
		mysqli_stmt_fetch($mapeo_fin);








		$calificacion = mysqli_prepare($connect,"SELECT count(a.id_asignado)  FROM item_asignado as a, numot as b, servicio as c WHERE c.id_servicio_tipo =  $id_servicio_calificacion AND b.fecha_fin_informe is NULL");
		mysqli_stmt_execute($calificacion);
		mysqli_stmt_store_result($calificacion);
		mysqli_stmt_bind_result($calificacion, $cantidad_calificacion);
		mysqli_stmt_fetch($calificacion);


		$calificacion_progreso = mysqli_prepare($connect,"SELECT count(a.id_asignado)  FROM item_asignado as a, numot as b, servicio as c WHERE c.id_servicio_tipo =  $id_servicio_calificacion AND b.fecha_fin_informe is NULL
																											AND b.fecha_informe is not NULL");
		mysqli_stmt_execute($calificacion_progreso);
		mysqli_stmt_store_result($calificacion_progreso);
		mysqli_stmt_bind_result($calificacion_progreso, $calificacion_en_progreso);
		mysqli_stmt_fetch($calificacion_progreso);


		$calificacion_final = mysqli_prepare($connect,"SELECT count(a.id_asignado)  FROM item_asignado as a, numot as b, servicio as c WHERE c.id_servicio_tipo =  $id_servicio_calificacion AND b.fecha_fin_informe is NULL
																											AND b.fecha_informe is not NULL  AND b.fecha_fin_informe is not NULL");
		mysqli_stmt_execute($calificacion_final);
		mysqli_stmt_store_result($calificacion_final);
		mysqli_stmt_bind_result($calificacion_final, $calificacion_terminada);
		mysqli_stmt_fetch($calificacion_final);

		
		$json[]= array(
		'mapeo'=>$cantidad_mapeo,
		'mapeo_progreso'=>$mapeo_progreso,
		'mapeo_final'=>$mapeo_final,	
		'calificacion'=>$cantidad_calificacion,
		'calificacion_progreso'=>$calificacion_en_progreso,
		'calificacion_final'=>$calificacion_terminada
			
		);


	$convert = json_encode($json);
		
	echo $convert;

		mysqli_stmt_close($connect);
?>