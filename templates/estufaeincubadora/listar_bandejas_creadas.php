<?php 
	include("../../config.ini.php");

	$id_asignado = $_POST['a'];

	
		/*$listar = mysqli_prepare($connect,"SELECT DISTINCT a.id_bandeja, a.nombre FROM bandeja as a, refrigerador_sensor as b WHERE
																			b.id_asignado = $id_asignado AND b.id_mapeo = $id_mapeo AND a.id_asignado = b.id_asignado");*/
	$listar = mysqli_prepare($connect,"SELECT id_bandeja, nombre FROM bandeja WHERE  id_asignado = $id_asignado");
	mysqli_stmt_execute($listar);
	mysqli_stmt_store_result($listar);
	mysqli_stmt_bind_result($listar, $id_bandeja, $nombre);

	$json = array();
	
	while($row = mysqli_stmt_fetch($listar)){
		
		$json[] = array(
		'id_bandeja'=>$id_bandeja,
		'nombre'=>$nombre
		);
	}

	$convert = json_encode($json);

	echo $convert;

	mysqli_stmt_close($connect);
?>