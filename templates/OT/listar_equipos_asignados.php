<?php 

	include("../../config.ini.php");

	$ot = $_POST['ot'];
	$id_empresa = $_POST['id_empresa'];
	$id_servicio_trae = $_POST['id_servicio'];


	$consultar = mysqli_prepare($connect,"SELECT a.nombre, b.id_servicio, c.servicio, d.id_asignado, d.fecha_registro, d.estado FROM 
																				item as a, servicio as b, servicio_tipo as c, item_asignado as d, numot as e WHERE d.id_item = a.id_item AND d.id_servicio = b.id_servicio AND
																				b.id_servicio_tipo = c.id_servicio_tipo AND e.id_numot = $ot AND  e.id_empresa = $id_empresa AND d.id_servicio = $id_servicio_trae ");

	mysqli_stmt_execute($consultar);
	mysqli_stmt_store_result($consultar);
	mysqli_stmt_bind_result($consultar, $nombre_item , $id_servicio, $tipo_servicio, $id_asignado, $fecha_registro, $estado);

	$json = array();

	while($row = mysqli_stmt_fetch($consultar)){
		$json[]= array(
		'id_asignado'=>$id_asignado,
		'id_servicio'=>$id_servicio,
		'nombre_item'=>$nombre_item,
		'tipo_servicio'=>$tipo_servicio,
		'fecha_registro'=>$fecha_registro,
		'estado'=>$estado	
		
		);
	}

	$convert = json_encode($json);

	echo $convert;

	mysqli_stmt_close($connect);
?>