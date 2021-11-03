<?php 
	include("../../config.ini.php");

	$listar = mysqli_prepare($connect,"SELECT a.id_sensor, a.nombre, a.serie, a.tipo, a.pais, a.estado FROM sensores as a");

	mysqli_stmt_execute($listar);
	mysqli_stmt_store_result($listar);
	mysqli_stmt_bind_result($listar, $id_sensor, $sensor, $serie, $tipo, $pais, $estado);

	$json = array();
	
	while($row = mysqli_stmt_fetch($listar)){
		
		$json[] = array(
		'id_sensor'=>$id_sensor,
		'sensor'=>$sensor,
		'serie'=>$serie,
		'tipo'=>$tipo,
		'pais'=>$pais,
		'estado'=>$estado	
		);
	}

	$convert = json_encode($json);

	echo $convert;

	mysqli_stmt_close($connect);
?>