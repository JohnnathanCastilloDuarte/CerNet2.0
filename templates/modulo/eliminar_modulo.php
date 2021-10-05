<?php 
include("../../config.ini.php");

	$id_modulo = $_POST['id_modulo'];

	$id_valida = $_POST['id_valida'];
	
	$lista = mysqli_prepare($connect,"SELECT nombre, area FROM modulo WHERE id_modulo = ?");
	mysqli_stmt_bind_param($lista, 'i', $id_modulo);
	mysqli_stmt_execute($lista);
	mysqli_stmt_store_result($lista);
	mysqli_stmt_bind_result($lista, $nombre_m, $area_m);
	mysqli_stmt_fetch($lista);
	

	
	$mensaje = "Ha eliminado del modulo: ".$nombre_m;
	$tipo_historial = 3;
	
	//insertar en el backtraking 
		//1 insertar en la tabla historal_modulo
	
		$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_modulo (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
		mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
		mysqli_stmt_execute($insertando_historial);
		mysqli_stmt_store_result($insertando_historial);

	$eliminar = mysqli_prepare($connect,"DELETE FROM modulo WHERE id_modulo = ?");
	mysqli_stmt_bind_param($eliminar, 'i', $id_modulo);
	mysqli_stmt_execute($eliminar);

	if($eliminar){
		echo "eliminado";
	}else {
		echo "no";
	}

?>