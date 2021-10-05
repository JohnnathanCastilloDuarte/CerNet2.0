<?php 

	$smarty->display('cliente/historial_cliente_cliente.tpl');

	$query = "SELECT a.id_empresa FROM persona as a, usuario as b WHERE a.id_usuario = ? AND a.id_usuario = b.id_usuario";
	$execute_query = mysqli_prepare($connect,$query);
	mysqli_stmt_bind_param($execute_query, 'i', $mi_id);
	mysqli_stmt_execute($execute_query);
	mysqli_stmt_store_result($execute_query);
	mysqli_stmt_bind_result($execute_query, $id_empresa);
	mysqli_stmt_fetch($execute_query);

	//CONSULTAR HISTORIAL DEL MODULO
	$consultar_historial = mysqli_prepare($connect,"SELECT b.nombre, b.apellido, a.mensaje_historial, a.tipo_historial, a.fecha_registro FROM 
																									persona as b, historial_empresa as a WHERE a.id_usuario = b.id_usuario AND b.id_empresa = 																															$id_empresa");

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




?>