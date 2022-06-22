<?php
	//consulta para determinar si el email ya existe 
		$query ="SELECT nombre, id_empresa FROM empresa ORDER BY nombre ASC"; 
		$query_execute = mysqli_prepare($connect,$query);
	 	mysqli_stmt_execute($query_execute);
		mysqli_stmt_store_result($query_execute);
		mysqli_stmt_bind_result($query_execute, $nombre, $id_empresa);

			$array_empresa=array();
			while($row = mysqli_stmt_fetch($query_execute)){
				$array_empresa[] = array("nombre"=>$nombre,"id_empresa"=>$id_empresa);	
			}
			$smarty->assign('array_empresa',$array_empresa);	
			

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
	
	$smarty->display("item/nuevo_item.tpl");
?>