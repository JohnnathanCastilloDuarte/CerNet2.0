<?php 

	include("../../config.ini.php");

	$ot = $_POST['ot'];

	$consulta  = mysqli_prepare($connect,"SELECT a.id_servicio, b.servicio  FROM  servicio as a , servicio_tipo as b WHERE a.id_servicio_tipo = b.id_servicio_tipo AND a.id_numot = ? 
																				AND a.asignado = 1 ");
	mysqli_stmt_bind_param($consulta, 'i', $ot);
	mysqli_stmt_execute($consulta);
	mysqli_stmt_store_result($consulta);
	mysqli_stmt_bind_result($consulta, $id_servicio , $tipo_servicio);


	$json = array();

	while($row = mysqli_stmt_fetch($consulta)){
		$json[]=array(
		'id_servicio'=>$id_servicio,
		'tipo_servicio'=>$tipo_servicio	
		);
	}

	$convert = json_encode($json);

	echo $convert;


?>