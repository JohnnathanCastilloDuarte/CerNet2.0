<?php 
	include("../../config.ini.php");

	$buscar = $_POST['buscar'];

	$consultar_servicio = mysqli_prepare($connect,"SELECT id_servicio_tipo, servicio FROM servicio_tipo WHERE servicio LIKE  CONCAT('%',?,'%') ORDER BY fecha_registro DESC");
	mysqli_stmt_bind_param($consultar_servicio, 's', $buscar);
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




?>