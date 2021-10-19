<?php 
	error_reporting(0);
	include("../../config.ini.php");

	$ot = $_POST['ot'];
	$id_empresa = $_POST['id_empresa'];

	$equipos = mysqli_prepare($connect,"SELECT id_item, nombre, descripcion FROM item");
	mysqli_stmt_execute($equipos);
	mysqli_stmt_store_result($equipos);
	mysqli_stmt_bind_result($equipos, $id_item, $nombre_item, $desc_item);
	
	$json = array();

	while($row = mysqli_stmt_fetch($equipos)){
		
		$json[] = array(
		'id_item'=>$id_item,
		'nombre_item'=>$nombre_item,
		'desc_item'=>$desc_item	
		
		);
	}

	$convert = json_encode($json);

	echo $convert;


mysqli_stmt_close($connect);

?>