<?php 
	include("../../config.ini.php");

	$listar = mysqli_prepare($connect,"SELECT a.id_servicio_tipo, a.servicio, b.nombre, a.fecha_registro, c.nombre, c.apellido FROM servicio_tipo as a, modulo as b, persona as c
																			WHERE a.id_modulo = b.id_modulo AND a.id_usuario = c.id_usuario ");
	mysqli_stmt_execute($listar);
	mysqli_stmt_store_result($listar);
	mysqli_stmt_bind_result($listar, $id_servicio, $tipo_servicio, $modulo, $fecha_registro, $nombre_usuario, $apellido_usuario);

	$json = array();

	while($row = mysqli_stmt_fetch($listar)){
		
		$json[] = array(
		'id_servicio'=>$id_servicio,
		'servicio'=>$tipo_servicio,	
		'nombre_modulo'=>$modulo,
		'fecha_registro'=>$fecha_registro,
		'nombre_usuario'=>$nombre_usuario,
		'apellido_usuario'=>$apellido_usuario	
		);
	}

	$convert = json_encode($json);

	echo $convert;

?>