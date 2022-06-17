<?php 
	require("../../config.ini.php");
	$id = $_POST['id'];	
	$id_valida = $_POST['id_valida'];
	
	//CONSULTAR EMPRESA 
	$consultar_empresa = mysqli_prepare($connect,"SELECT nombre FROM  empresa WHERE id_empresa = ?");
	mysqli_stmt_bind_param($consultar_empresa,'i', $id);
	mysqli_stmt_execute($consultar_empresa);
	mysqli_stmt_store_result($consultar_empresa);
	mysqli_stmt_bind_result($consultar_empresa, $nombre_empresa);
	mysqli_stmt_fetch($consultar_empresa);
		
		$mensaje = "Ha eliminado el cliente: ".$nombre_empresa;
			$tipo_historial = 3;

			//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_empresa (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);
		

	$eliminar = mysqli_query($connect,"DELETE FROM empresa WHERE id_empresa = $id");	
?>