<?php 
	include("../../config.ini.php");

	$id_servicio = $_POST['id_servicio'];

	$listar = mysqli_prepare($connect,"SELECT  a.servicio, b.nombre, a.id_modulo FROM servicio_tipo as a, modulo as b
																			WHERE a.id_modulo = b.id_modulo  AND a.id_servicio_tipo = ?");
	mysqli_stmt_bind_param($listar, 'i', $id_servicio);
	mysqli_stmt_execute($listar);
	mysqli_stmt_store_result($listar);
	mysqli_stmt_bind_result($listar,  $tipo_servicio, $modulo, $id_modulo);	


	$json = array();

	while($row = mysqli_stmt_fetch($listar)){
		$json[] = array(
		'id_servicio'=>$id_servicio,	
		'servicio'=>$tipo_servicio,
		'modulo'=>$modulo,
		'id_modulo'=>$id_modulo	
		);
		
	}

	$convert = json_encode($json[0]);

		echo $convert;
?>