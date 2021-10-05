<?php 
	include("../../config.ini.php");

	$nombre = $_POST['nombre'];
	$area = $_POST['area'];
	$id_modulo = $_POST['id_modulo'];
	$id_valida =$_POST['id_valida'];

	$lista = mysqli_prepare($connect,"SELECT nombre, area FROM modulo WHERE id_modulo = ?");
	mysqli_stmt_bind_param($lista, 'i', $id_modulo);
	mysqli_stmt_execute($lista);
	mysqli_stmt_store_result($lista);
	mysqli_stmt_bind_result($lista, $nombre_m, $area_m);
	mysqli_stmt_fetch($lista);
	$json = array();
	
	$json[] = array(
	'nombre'=> $nombre_m,
	'area'=> $area_m
	);


	
	$mensaje = "Ha realizado la  modificación al modulo: ".$json[0].nombre." del area: ".$json[0].area." por el modulo: ".$nombre." del area: ".$area;
	$tipo_historial = 2;
	
	//insertar en el backtraking 
		//1 insertar en la tabla historal_modulo
	
		$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_modulo (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
		mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
		mysqli_stmt_execute($insertando_historial);
		mysqli_stmt_store_result($insertando_historial);


	$actualizar = mysqli_prepare($connect,"UPDATE modulo SET nombre = ?, area = ? WHERE id_modulo = ?");
	mysqli_stmt_bind_param($actualizar, 'ssi', $nombre , $area, $id_modulo);
	mysqli_stmt_execute($actualizar);

	

	if($actualizar){
		echo "modificado";
	}else{
		echo "no";
	}



?>