<?php
	error_reporting(0);
	include("../../config.ini.php");

	$id_ot = $_POST['id_ot'];

	$consultar_servicio = mysqli_prepare($connect,"SELECT id_servicio_tipo, servicio FROM servicio_tipo ORDER BY fecha_registro DESC");
	mysqli_stmt_execute($consultar_servicio);
	mysqli_stmt_store_result($consultar_servicio);
	mysqli_stmt_bind_result($consultar_servicio, $id_servicio_tipo , $servicio);

	$array_tipo_servicio = array();
	
	while($row = mysqli_stmt_fetch($consultar_servicio)){
		
		$array_tipo_servicio[] = array(
		'id_tipo_servicio'=>$id_servicio_tipo,
		'servicio'=>$servicio	
		);
		
	}

	$convert = json_encode($array_tipo_servicio);


	echo $convert;

mysqli_stmt_close($connect);	


?>