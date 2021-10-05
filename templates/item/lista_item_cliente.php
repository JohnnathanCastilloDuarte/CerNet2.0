<?php 
	include("../../config.ini.php");

	$id_empresa = $_POST['id_empresa'];

	$query = "SELECT a.id_item, a.id_tipo, b.nombre, a.nombre, a.descripcion, a.fecha_registro FROM item as a, tipo_item as b WHERE a.id_empresa = ? AND a.id_tipo = b.id_item";
		$execute_query = mysqli_prepare($connect,$query);
		mysqli_stmt_bind_param($execute_query, 'i', $id_empresa);
		mysqli_stmt_execute($execute_query);
		mysqli_stmt_store_result($execute_query);
		mysqli_stmt_bind_result($execute_query, $id_item, $id_tipo,  $item, $tipo,  $descripcion, $fecha_registro);
		

	$json = array();

	while($row = mysqli_stmt_fetch($execute_query)){
		
		$json[] = array(
		'id_item'=>$id_item,
		'id_tipo'=>$id_tipo,	
		'item'=>$item,
		'tipo'=>$tipo,
		'descripcion'=>$descripcion,
		'fecha_registro'=>$fecha_registro	
		);
	}
	
	$convert = json_encode($json);
	
	echo $convert;

mysqli_stmt_close($connect);
?>