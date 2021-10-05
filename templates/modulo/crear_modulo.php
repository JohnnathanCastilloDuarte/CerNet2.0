<?php 
	include("../../config.ini.php");

	$nombre = $_POST['nombre'];
	$area = $_POST['area'];
	$id_valida = $_POST['id_valida'];
	$mensaje = "Ha creado un nuevo modulo con el nombre de: ".$nombre;
	$tipo_historial = 1;

		$insertar = mysqli_prepare($connect,"INSERT INTO modulo (nombre, area, id_usuario) VALUES (?, ?, ?)");
		mysqli_stmt_bind_param($insertar, 'ssi', $nombre, $area, $id_valida);
		mysqli_stmt_execute($insertar);
		mysqli_stmt_store_result($insertar);


	//insertar en el backtraking 
		//1 insertar en la tabla historal_modulo
	
		$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_modulo (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
		mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
		mysqli_stmt_execute($insertando_historial);
		mysqli_stmt_store_result($insertando_historial);
	



	if($insertar){
		echo "creado";
	}else{
		echo "no creado";
	}

?>