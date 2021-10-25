<?php 
	error_reporting(0);
	include("../../config.ini.php");

	$ot = $_POST['ot'];
	$id_empresa = $_POST['id_empresa'];


	$query = mysqli_prepare($connect,"SELECT d.id_item FROM servicio as a, item_asignado as b, item as c, tipo_item as d WHERE a.id_numot = ? AND a.id_servicio = b.id_servicio AND b.id_item = c.id_item AND c.id_tipo = d.id_item; ");
	mysqli_stmt_bind_param($query, 'i', $ot);
	mysqli_stmt_execute($query);
	mysqli_stmt_store_result($query);
	mysqli_stmt_bind_result($query, $tipo_item);
	mysqli_stmt_fetch($query);


	$equipos = mysqli_prepare($connect,"SELECT id_item, nombre, descripcion FROM item  WHERE id_tipo = ?");
	mysqli_stmt_bind_param($equipos, 'i', $tipo_item);
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