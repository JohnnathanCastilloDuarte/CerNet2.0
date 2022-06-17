<?php 
	include("../../config.ini.php");

	$id_asignado = $_POST['id_asignado_freezer'];

	$listar = mysqli_prepare($connect,"SELECT id_bandeja, nombre FROM bandeja WHERE  id_asignado = $id_asignado");
	mysqli_stmt_execute($listar);
	mysqli_stmt_store_result($listar);
	mysqli_stmt_bind_result($listar, $id_bandeja, $nombre_bandeja);
	

	$json = array();

	while($row = mysqli_stmt_fetch($listar)){
		
		$json[]=array(
		'id_bandeja'=>$id_bandeja,
		'nombre'=>$nombre_bandeja	
		);
	}

	$convert = json_encode($json);
		echo $convert;

	mysqli_stmt_close($connect);
?>