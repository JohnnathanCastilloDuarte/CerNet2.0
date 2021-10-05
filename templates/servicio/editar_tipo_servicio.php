<?php 
	include("../../config.ini.php");

	$servicio = $_POST['servicio'];
	$id_servicio = $_POST['id_servicio'];
	$modulo = $_POST['modulo'];
	$id_valida = $_POST['id_valida'];


	$listar = mysqli_prepare($connect,"SELECT  a.servicio, b.nombre, a.id_modulo FROM servicio_tipo as a, modulo as b
																			WHERE a.id_modulo = b.id_modulo  AND a.id_servicio_tipo = ?");
	mysqli_stmt_bind_param($listar, 'i', $id_servicio);
	mysqli_stmt_execute($listar);
	mysqli_stmt_store_result($listar);
	mysqli_stmt_bind_result($listar,  $tipo_servicio, $modulo_nombre, $id_modulo);	
	mysqli_stmt_fetch($listar);
		
	$mensaje = "Ha realizado la  modificación del tipo de servicio: ".$tipo_servicio.", del modulo: ".$modulo_nombre;
	$tipo_historial = 2;
	
	//insertar en el backtraking 
		//1 insertar en la tabla historal_modulo
	
		$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_servicio_tipo (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
		mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
		mysqli_stmt_execute($insertando_historial);
		mysqli_stmt_store_result($insertando_historial);

	$editar = mysqli_prepare($connect,"UPDATE servicio_tipo SET servicio = ?, id_modulo = ? WHERE id_servicio_tipo = ?");
	mysqli_stmt_bind_param($editar, 'sii', $servicio, $modulo, $id_servicio);
	mysqli_stmt_execute($editar);

	if($editar){
		echo "Si";
	}else{
		echo "No";
	}


?>