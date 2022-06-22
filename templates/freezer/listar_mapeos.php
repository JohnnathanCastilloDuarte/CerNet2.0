<?php 
	include("../../config.ini.php");

	$id_asignado = $_POST['id_asignado_freezer'];
	
	$listar = mysqli_prepare($connect,"SELECT id_asignado, id_mapeo, nombre, fecha_inicio, hora_inicio, fecha_final, hora_final, 
													intervalo, humedad_minima, humedad_maxima, temperatura_minima, temperatura_maxima FROM freezer_mapeo WHERE id_asignado = $id_asignado");

	mysqli_stmt_execute($listar);
	mysqli_stmt_store_result($listar);
	mysqli_stmt_bind_result($listar, $id_asignado, $id_mapeo, $nombre, $fecha_inicio, $hora_inicio, $fecha_final, $hora_final, $intervalo, $humedad_minima, $humedad_maxima, $temperatura_minima, 
																		$temperatura_maxima);


	$json = array();

	while($row = mysqli_stmt_fetch($listar)){
		
		$json[] = array(
     'id_asignado'=>$id_asignado,
		'id_mapeo'=>$id_mapeo,	
		'nombre'=>$nombre,
		'fecha_inicio'=>$fecha_inicio,
		'hora_inicio'=>$hora_inicio,
		'fecha_final'=>$fecha_final,
		'hora_final'=>$hora_final,
		'intervalo'=>$intervalo,
		'humedad_minima'=>$humedad_minima,
		'humedad_maxima'=>$humedad_maxima,
		'temperatura_minima'=>$temperatura_minima,
		'temperatura_maxima'=>$temperatura_maxima
			
		);
	}

	$convert = json_encode($json);

	echo $convert;


	mysqli_stmt_close($connect);		



?>