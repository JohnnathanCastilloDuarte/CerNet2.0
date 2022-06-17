<?php 

	include("../../config.ini.php");
	
		$id_numot = $_POST['id_ot'];

		$query_1 = mysqli_prepare($connect,"SELECT a.id_servicio_tipo, b.id_servicio FROM servicio as a, item_asignado as b WHERE a.id_servicio = b.id_servicio AND a.id_numot 																				 = $id_numot ");
		mysqli_stmt_execute($query_1);
		mysqli_stmt_store_result($query_1);
		mysqli_stmt_bind_result($query_1, $type, $id_asignado);
		mysqli_stmt_fetch($query_1);
		

		$query_2 = mysqli_prepare($connect,"SELECT a.servicio ,b.fecha_registro, b.asignado FROM servicio_tipo as a, servicio as b WHERE a.id_servicio_tipo = 															b.id_servicio_tipo AND 	b.id_numot = ? ");
		mysqli_stmt_bind_param($query_2, 'i', $id_numot);
		mysqli_stmt_execute($query_2);
		mysqli_stmt_store_result($query_2);
		mysqli_stmt_bind_result($query_2, $servicio, $fecha_registro, $asignado);
		
		$json_2 = array();

		while($row = mysqli_stmt_fetch($query_2)){
			
			$json_2[] = array(
			
			'servicio' => $servicio,
			'fecha_servicio' => $fecha_registro,
			'asignado' => $asignado,
			'type' => $type,
			'id_asignado'=>$id_asignado	
			);
			
		}

		$convert = json_encode($json_2);
		
		echo $convert;

	mysqli_stmt_close($connect);

?>