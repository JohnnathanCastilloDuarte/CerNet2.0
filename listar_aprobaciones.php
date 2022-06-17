<?php 
	include("config.ini.php");

	$query_1 = mysqli_prepare($connect,"SELECT b.nombre, a.id_aprobacion, a.estado, a.observacion FROM aprobacion_informes as a, informe_refrigerador as b WHERE a.estado != 3 ORDER BY a.fecha_registro ASC");
	mysqli_stmt_execute($query_1);
	mysqli_stmt_store_result($query_1);
	mysqli_stmt_bind_result($query_1, $nombre, $id_aprobacion, $estado, $observacion);

	$json = array();

	while($row = mysqli_stmt_fetch($query_1)){
		$json[]=array(
		"nombre"=>$nombre,
		"id_aprobacion"=>$id_aprobacion,
		"estado"=>$estado,
		"observacion"=>$observacion	
		);
	}
	

	$convert = json_encode($json);

	echo $convert;

	mysqli_stmt_close($connect);
?>