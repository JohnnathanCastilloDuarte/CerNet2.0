<?php 
	//CONSULTAR HISTORIAL DEL MODULO
	$consultar_historial = mysqli_prepare($connect,"SELECT b.nombre, b.apellido, a.mensaje_historial, a.tipo_historial, a.fecha_registro FROM 
																									persona as b, historial_item as a WHERE a.id_usuario = b.id_usuario");

	mysqli_stmt_execute($consultar_historial);
	mysqli_stmt_store_result($consultar_historial);
	mysqli_stmt_bind_result($consultar_historial, $nombre, $apellido, $mensaje, $tipo_historial, $fecha_registro);

	$array_historial = array();

	while($row = mysqli_stmt_fetch($consultar_historial)){
		$array_historial[]=array(
			'nombre'=>$nombre,
			'apellido'=>$apellido,
			'mensaje'=>$mensaje,
			'tipo_historial'=>$tipo_historial,
			'fecha_registro'=>$fecha_registro
		);
		
	}

	$smarty->assign("array_historial",$array_historial);

	$smarty->assign("color","");


	$smarty->display("item/historial_item.tpl");


?>