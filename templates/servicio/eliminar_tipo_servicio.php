<?php 

	include("../../config.ini.php");

		$id_servicio = $_POST['id_servicio'];
		$id_valida = $_POST['id_valida'];
	
		
	$consultar_tipo = mysqli_prepare($connect,"SELECT servicio FROM servicio_tipo WHERE id_servicio_tipo = ?");
	mysqli_stmt_bind_param($consultar_tipo, 'i', $id_servicio);
	mysqli_stmt_execute($consultar_tipo);
	mysqli_stmt_store_result($consultar_tipo);
	mysqli_stmt_bind_result($consultar_tipo, $servicio);
	mysqli_stmt_fetch($consultar_tipo);


	$mensaje = "Ha eliminado el tipo de servicio: ".$servicio;
	$tipo_historial = 3;
	
	//insertar en el backtraking 
		//1 insertar en la tabla historal_modulo
	
		$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_servicio_tipo (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
		mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
		mysqli_stmt_execute($insertando_historial);
		mysqli_stmt_store_result($insertando_historial);

	$eliminar = mysqli_prepare($connect, "DELETE FROM servicio_tipo WHERE id_servicio_tipo = ?");
	mysqli_stmt_bind_param($eliminar, 'i' , $id_servicio);
	mysqli_stmt_execute($eliminar);

	if($eliminar){
		echo "Si";
	}else{
		echo "No";
	}

?>