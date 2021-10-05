<?php 
	include("../../config.ini.php");

		$id_item = $_POST['id_item'];
		$id_servicio = $_POST['id_servicio'];
		$id_valida = $_POST['id_valida'];
		$estado = 1;

		
		$validar = mysqli_prepare($connect, "SELECT a.id_item FROM item_asignado as a WHERE a.id_item = $id_item AND estado >= 0 AND a.id_servicio = $id_servicio");
		mysqli_stmt_execute($validar);
		mysqli_stmt_store_result($validar);
		mysqli_stmt_bind_result($validar, $id_validar);
		mysqli_stmt_fetch($validar);

	

	$buscar_item = mysqli_prepare($connect,"SELECT nombre FROM item WHERE id_item = $id_item");
	mysqli_stmt_execute($buscar_item);
	mysqli_stmt_store_result($buscar_item);
	mysqli_stmt_bind_param($buscar_item, $nombre_item);
	mysqli_stmt_fetch($buscar_item);

	
	$servicio_tipo = mysqli_prepare($connect,"SELECT a.servicio FROM servicio_tipo as a, servicio as b WHERE a.id_servicio_tipo = b.id_servicio_tipo AND b.id_servicio = $id_servicio");
	mysqli_stmt_execute($servicio_tipo);
	mysqli_stmt_store_result($servicio_tipo);
	mysqli_stmt_bind_result($servicio_tipo, $nombre_servicio);
	mysqli_stmt_fetch($servicio_tipo);

	$buscando_ot = mysqli_prepare($connect,"SELECT a.numot FROM numot as a, servicio as b WHERE a.id_numot = b.id_numot AND b.id_servicio = $id_servicio");
	mysqli_stmt_execute($buscando_ot);
	mysqli_stmt_store_result($buscando_ot);
	mysqli_stmt_bind_result($buscando_ot, $ot);
	mysqli_stmt_fetch($buscando_ot);



	$mensaje = "Ha agregado un nuevo item: ".$nombre_item." a el servicio: ".$nombre_servicio." para la OT: ".$ot;
	$tipo_historial = 1;

			
			


		if($id_validar != ""){
			echo "Existe";
		}else{
	
		//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_numot (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);
			
			
				$asignar = mysqli_prepare($connect,"INSERT INTO item_asignado (id_item, id_servicio, id_usuario, estado) VALUES (?, ?, ?, ?)");
				mysqli_stmt_bind_param($asignar, 'iiii', $id_item, $id_servicio, $id_valida, $estado);
				mysqli_stmt_execute($asignar);
			
			


	if($asignar){
		echo "Asignado";
	}else{
		echo "error";
	}
			
}


	mysqli_stmt_close($connect);




?>