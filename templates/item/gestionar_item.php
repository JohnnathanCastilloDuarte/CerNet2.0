<?php 

	//consultar item
	$query = "SELECT a.id_item, b.nombre, a.nombre, c.nombre, b.id_item FROM item as a,tipo_item as b,empresa as c 
						WHERE c.id_empresa = a.id_empresa AND b.id_item = a.id_tipo";

	$query_execute = mysqli_prepare($connect,$query);
	mysqli_stmt_execute($query_execute);
	mysqli_stmt_store_result($query_execute);
	mysqli_stmt_bind_result($query_execute, $id_item, $nombre_tipo, $nombre_item, $nombre_empresa, $id_tipo);

	$array_gestionar = array();

	while($row = mysqli_stmt_fetch($query_execute)){
		
		$array_gestionar[] = array(
				"id_item"=>$id_item,
				"nombre_tipo"=>$nombre_tipo,
				"nombre_item"=>$nombre_item,
				"nombre_empresa"=>$nombre_empresa,
				"id_tipo"=>$id_tipo);
	}
	
$smarty->assign("array_gestionar",$array_gestionar);
$smarty->display("item/gestionar_item.tpl");
?>