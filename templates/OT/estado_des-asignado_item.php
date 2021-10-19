<?php 
	error_reporting(0);
	include("../../config.ini.php");

	$id_asignado = $_POST['id_asignado'];
	$id_valida = $_POST['id_valida'];

	$consultar_item = mysqli_prepare($connect,"SELECT a.nombre, b.servicio, e.numot FROM item as a, servicio_tipo as b, item_asignado as c, servicio as d, numot as e WHERE a.id_item = c.id_item AND 																															b.id_servicio_tipo = d.id_servicio_tipo AND d.id_servicio = c.id_servicio AND c.id_asignado = $id_asignado AND d.id_numot = e.id_numot");
	mysqli_stmt_execute($consultar_item);
	mysqli_stmt_store_result($consultar_item);
	mysqli_stmt_bind_result($consultar_item, $nombre_item, $nombre_servicio, $ot);
	mysqli_stmt_fetch($consultar_item);


	$mensaje = "Ha des-asignado un item: ".$nombre_item." a el servicio: ".$nombre_servicio." de la OT: ".$ot;
	$tipo_historial = 3;


	$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_numot (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
	mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
	mysqli_stmt_execute($insertando_historial);
	mysqli_stmt_store_result($insertando_historial);



	$update = mysqli_prepare($connect,"UPDATE item_asignado SET estado = 0 WHERE id_asignado = $id_asignado");
	mysqli_stmt_execute($update);

	if($update){
		echo "asignado";
	}else{
		echo "error";
	}

	mysqli_close($connect);
?>