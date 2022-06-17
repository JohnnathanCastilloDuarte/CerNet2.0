<?php 
	include("../../config.ini.php");

	$id_ot = $_POST['id_ot'];

	$consultar_servicio = mysqli_prepare($connect,"SELECT a.id_servicio, c.servicio, a.asignado FROM servicio as a, servicio_tipo as c WHERE a.id_servicio_tipo = c.id_servicio_tipo AND a.id_numot = ?");
	mysqli_stmt_bind_param($consultar_servicio, 'i', $id_ot);
	mysqli_stmt_execute($consultar_servicio);
	mysqli_stmt_store_result($consultar_servicio);
	mysqli_stmt_bind_result($consultar_servicio, $id_servicio , $servicio, $estado);

	$array_tipo_servicio = array();
	
	while($row = mysqli_stmt_fetch($consultar_servicio)){
		
		$array_tipo_servicio[] = array(
		'id_servicio'=>$id_servicio,
		'servicio'=>$servicio,
		'estado'=>$estado	
		);
		
	}

	$convert = json_encode($array_tipo_servicio);


	echo $convert;




?>