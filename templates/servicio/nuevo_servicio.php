<?php 
		//CONSULTAR HISTORIAL DEL MODULO
	$consultar_historial = mysqli_prepare($connect,"SELECT b.nombre, b.apellido, a.mensaje_historial, a.tipo_historial, a.fecha_registro FROM 
																									persona as b, historial_servicio_tipo as a WHERE a.id_usuario = b.id_usuario ORDER BY fecha_registro DESC");

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



	$consultar_modulo = mysqli_prepare($connect,"SELECT id_modulo, nombre, area FROM modulo");
	mysqli_stmt_execute($consultar_modulo);
	mysqli_stmt_store_result($consultar_modulo);
	mysqli_stmt_bind_result($consultar_modulo, $id_modulo, $nombre, $area);

	$array_modulo = array();

	while($row = mysqli_stmt_fetch($consultar_modulo)){
		
		$array_modulo[]=array(
		'id_modulo'=>$id_modulo,
		'nombre_modulo'=>$nombre,
		'area'=>$area	
		);
	}

	$smarty->assign("array_modulo",$array_modulo);
	


	$smarty->display("servicio/nuevo_servicio.tpl");
?>