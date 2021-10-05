<?php 
	include("../../config.ini.php");
	
	$id_bandeja = $_POST['id_bandeja'];
	$nombre_bandeja = $_POST['nombre_bandeja'];
	$id_asignado = $_POST['id_asignado'];
	$id_valida = $_POST['id_valida'];



	$consultar_bandeja = mysqli_prepare($connect,"SELECT nombre FROM bandeja WHERE 	id_bandeja = $id_bandeja");
	mysqli_stmt_execute($consultar_bandeja);
	mysqli_stmt_store_result($consultar_bandeja);
	mysqli_stmt_bind_result($consultar_bandeja, $bandeja);
	mysqli_stmt_fetch($consultar_bandeja);
		


	$consultar_item = mysqli_prepare($connect,"SELECT a.servicio, d.numot FROM servicio_tipo as a, item_asignado as b, servicio as c, numot as d  WHERE b.id_asignado = $id_asignado AND c.id_servicio = b.id_servicio AND 		c.id_servicio_tipo = 	a.id_servicio_tipo AND c.id_numot = d.id_numot ");
	mysqli_stmt_execute($consultar_item);
	mysqli_stmt_store_result($consultar_item);
	mysqli_stmt_bind_result($consultar_item,  $nombre_servicio, $ot);
	mysqli_stmt_fetch($consultar_item);




	$mensaje = "Ha modificado la Bandeja: ".$bandeja." y la modifica a: ".$nombre_bandeja." correspondiente al servicio: ".$nombre_servicio." y la OT: ".$ot;
	$tipo_historial = 2;

	$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_refrigeradores (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
	mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
	mysqli_stmt_execute($insertando_historial); 


		

	$editar = mysqli_prepare($connect,"UPDATE bandeja SET nombre = ? WHERE id_bandeja = ?");
	mysqli_stmt_bind_param($editar, 'si', $nombre_bandeja, $id_bandeja);
	mysqli_stmt_execute($editar);
	
		
	if($editar){
		echo "Modificado";
	}else{
		echo "Error";
	}

	mysqli_stmt_close($connect);		
	?>