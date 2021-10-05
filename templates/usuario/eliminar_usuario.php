<?php 
	require("../../config.ini.php");
	 $id_usuario = $_POST['id'];
	 $id_valida = $_POST['id_valida'];	
	
	$consultar = mysqli_prepare($connect,"SELECT a.nombre, a.apellido, b.usuario FROM persona as a, usuario as b WHERE a.id_usuario = ? AND a.id_usuario = b.id_usuario ");
	mysqli_stmt_bind_param($consultar, 'i', $id_usuario);
	mysqli_stmt_execute($consultar);
	mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $nombre, $apellido, $usuario);
	mysqli_stmt_fetch($consultar);

	$mensaje = "Ha eliminado al usuario: ".$usuario.", identificado como: ".$nombre." ".$apellido;
		$tipo_historial = 3;

			//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_usuario (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);
	

	$eliminar_1 = mysqli_query($connect,"DELETE FROM persona WHERE id_usuario = $id_usuario");
	$eliminar_2 = mysqli_query($connect,"DELETE FROM usuario WHERE id_usuario = $id_usuario");


mysqli_stmt_close($connect);
	

?>