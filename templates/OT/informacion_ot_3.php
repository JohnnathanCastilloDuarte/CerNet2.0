<?php 

	include("../../config.ini.php");
	
		$id_numot = $_POST['id_ot'];
		$json = array();


		$query_3 = mysqli_prepare($connect,"SELECT id_servicio FROM servicio  WHERE id_numot = ? ");
		mysqli_stmt_bind_param($query_3, 'i', $id_numot);
		mysqli_stmt_execute($query_3);
		mysqli_stmt_store_result($query_3);
		mysqli_stmt_bind_result($query_3, $id_servicio);
		mysqli_stmt_fetch($query_3);
		
		$query_4 = mysqli_prepare($connect,"SELECT id_asignado FROM item_asignado WHERE id_servicio = ?");
		mysqli_stmt_bind_param($query_4, 'i', $id_servicio);
		mysqli_stmt_execute($query_4);
		mysqli_stmt_store_result($query_4);
		mysqli_stmt_bind_result($query_4, $id_asignado);
		

		while( $row = mysqli_stmt_fetch($query_4) ){
			
		$query_5 = mysqli_prepare($connect,"SELECT a.id_informe_refrigerador, a.nombre, b.nombre, a.estado  FROM informe_refrigerador as a, refrigerador_mapeo as b WHERE 
																				a.id_mapeo = b.id_mapeo AND id_asignado = ?");
		mysqli_stmt_bind_param($query_5, 'i', $id_asignado);
		mysqli_stmt_execute($query_5);
		mysqli_stmt_store_result($query_5);
		mysqli_stmt_bind_result($query_5, $id_informe, $nombre_informe, $nombre_mapeo, $estado);
			
			while( $row = mysqli_stmt_fetch($query_5) ){
				
				$json[] = array(
				'id_informe' => $id_informe,
				'nombre_informe' => $nombre_informe,
				'nombre_mapeo' => $nombre_mapeo,
				'estado' =>	$estado
				);	
			}
			
		}



		$convert = json_encode($json);
		
		echo $convert;

	mysqli_stmt_close($connect);

?>