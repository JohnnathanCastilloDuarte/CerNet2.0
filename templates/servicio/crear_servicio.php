<?php 
	include("../../config.ini.php");

	$servicio_nuevo = $_POST['servicio_nuevo'];
	$modulo_tipo_servicio = $_POST['modulo_tipo_servicio'];
	$id_valida = $_POST['id_valida'];

	$consultar_modulo = mysqli_prepare($connect,"SELECT nombre FROM modulo WHERE id_modulo = ?");
	mysqli_stmt_bind_param($consultar_modulo, 'i', $modulo_tipo_servicio);
	mysqli_stmt_execute($consultar_modulo);
	mysqli_stmt_store_result($consultar_modulo);
	mysqli_stmt_bind_result($consultar_modulo, $nombre_modulo);
	mysqli_stmt_fetch($consultar_modulo);



	$mensaje = "Ha creado un nuevo tipo de servicio: ".$servicio_nuevo.", para el modulo: ".$nombre_modulo;
			$tipo_historial = 1;

			//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_servicio_tipo (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);	




	

	$crear = mysqli_prepare($connect,"INSERT INTO servicio_tipo (servicio, id_modulo, id_usuario) VALUES (?, ?, ?)");
	mysqli_stmt_bind_param($crear, 'sii', $servicio_nuevo, $modulo_tipo_servicio, $id_valida);
	mysqli_stmt_execute($crear);

	if($crear){
		echo "Si";
	}else{
		echo "no";
	}

?>