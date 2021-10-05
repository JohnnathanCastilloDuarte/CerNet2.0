<?php 
	//consutlar_tipo_item
		$query_2 ="SELECT id_item, nombre FROM tipo_item";
		$query_execute_2 = mysqli_prepare($connect,$query_2);
		mysqli_stmt_execute($query_execute_2);
		mysqli_stmt_store_result($query_execute_2);
		mysqli_stmt_bind_result($query_execute_2, $id_item, $nombre_item);

		$array_tipo = array();
		while($fila = mysqli_stmt_fetch($query_execute_2)){
			$array_tipo[] = array("id_tipo"=>$id_item, "nombre"=>$nombre_item);
		}
		$smarty->assign('array_tipo',$array_tipo);

	//consultar id _ empresa
	$query = "SELECT id_empresa FROM persona WHERE id_usuario = ?";
		$execute_query = mysqli_prepare($connect,$query);
		mysqli_stmt_bind_param($execute_query, 'i', $mi_id);
		mysqli_stmt_execute($execute_query);
		mysqli_stmt_store_result($execute_query);
		mysqli_stmt_bind_result($execute_query, $id_empresa);
		mysqli_stmt_fetch($execute_query);

	$smarty->assign("id_empresa",$id_empresa);

	$smarty->display("item/nuevo_item_cliente.tpl");

?>