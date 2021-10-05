<?php 
  ob_start();
	$id_item = $_GET['type'];
	
	//consultar item
	$execute = mysqli_prepare($connect,"SELECT nombre, descripcion, estado FROM item  WHERE id_item = ?");
	mysqli_stmt_bind_param($execute, 'i', $id_item);
	mysqli_stmt_execute($execute);
	mysqli_stmt_store_result($execute);
	mysqli_stmt_bind_result($execute, $nombre, $descripcion, $estado);
	mysqli_stmt_fetch($execute);

	$array_item = array();

	$array_item[] = array(
		'nombre'=>$nombre,
		'descripcion'=>$descripcion,
		'estado'=>$estado
		);

	$smarty->assign("array_item",$array_item);

	$smarty->display("item/update_bodega_cliente.tpl");
  ob_end_flush();
?>