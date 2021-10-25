<?php

	include("../../config.ini.php");
	error_reporting(0);
	$id_tipo_servicio= $_POST['id_tipo_servicio'];
	$id_ot= $_POST['id_ot'];
	$id_valida= $_POST['id_valida'];
	$asigna = 1;


	$consultar_item = mysqli_prepare($connect,"SELECT  b.servicio, e.numot FROM item as a, servicio_tipo as b, item_asignado as c, servicio as d, numot as e WHERE a.id_item = c.id_item AND 																															b.id_servicio_tipo = d.id_servicio_tipo AND d.id_servicio = c.id_servicio AND e.id_numot = $id_ot AND d.id_numot = e.id_numot");
	mysqli_stmt_execute($consultar_item);
	mysqli_stmt_store_result($consultar_item);
	mysqli_stmt_bind_result($consultar_item,  $nombre_servicio, $ot);
	mysqli_stmt_fetch($consultar_item);


	$mensaje = "Ha asignado un nuevo servicio: ".$nombre_servicio." de la OT: ".$ot;
	$tipo_historial = 1;


	$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_numot (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
	mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
	mysqli_stmt_execute($insertando_historial);
	mysqli_stmt_store_result($insertando_historial);




	$crear = mysqli_prepare($connect,"INSERT INTO servicio (id_numot, id_servicio_tipo, id_usuario, asignado) VALUES (?, ?, ?, ?)");
	mysqli_stmt_bind_param($crear, 'iiii', $id_ot, $id_tipo_servicio, $id_valida, $asigna);
	mysqli_stmt_execute($crear);


	if($crear){
		echo "Asignado";
	}else{
		echo "Error";
	}


?>