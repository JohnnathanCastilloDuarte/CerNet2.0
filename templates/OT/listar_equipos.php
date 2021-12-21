<?php 
	
	include("../../config.ini.php");
	error_reporting(0);
	$ot = $_POST['ot'];
	$id_empresa = $_POST['id_empresa'];
	$id_servicio = $_POST['id_servicio'];



	$query = mysqli_prepare($connect,"SELECT id_tipo_item FROM servicio as a, servicio_tipo as b WHERE a.id_servicio = ? AND a.id_servicio_tipo = b.id_servicio_tipo");
	mysqli_stmt_bind_param($query, 'i', $id_servicio);
	mysqli_stmt_execute($query);
	mysqli_stmt_store_result($query);
	mysqli_stmt_bind_result($query, $tipo_item);
	mysqli_stmt_fetch($query);

	$equipos = mysqli_prepare($connect,"SELECT id_item, nombre, descripcion FROM item  WHERE id_tipo = ? AND id_empresa = ?");
	mysqli_stmt_bind_param($equipos, 'ii', $tipo_item, $id_empresa);
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


mysqli_close($connect);

?>