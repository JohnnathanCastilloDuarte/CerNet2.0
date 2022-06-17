<?php 
		include("../../config.ini.php");

			$id_mapeo = $_POST['id_mapeo_freezer'];
			$id_asignado  = $_POST['id_asignado_freezer'];
			$id_bandeja = $_POST['id_bandeja'];
			$id_sensor = $_POST['id_sensor'];
			$id_valida = $_POST['id_valida'];


		$consultar = mysqli_prepare($connect,"SELECT id_freezer_sensor FROM freezer_sensor WHERE id_asignado = ? AND id_mapeo =  ? AND id_sensor = ?");
		mysqli_stmt_bind_param($consultar, 'iii', $id_asignado, $id_mapeo,  $id_sensor);
		mysqli_stmt_execute($consultar);
		mysqli_stmt_store_result($consultar);
		mysqli_stmt_bind_result($consultar, $id_freezer_sensor);
		mysqli_stmt_fetch($consultar);



		if($id_freezer_sensor){
			echo "Existe";
			
		}else{
		
				/////////////////////////////CONSULTA DE INFORMACIÓN PARA EL BACKTRAKING//////////////////////////////////////////////////////////////////
/*
	$consultar_item = mysqli_prepare($connect,"SELECT a.servicio, d.numot FROM servicio_tipo as a, item_asignado as b, servicio as c, numot as d  WHERE b.id_asignado = $id_asignado 		AND c.id_servicio = b.id_servicio 	 		AND  c.id_servicio_tipo = 	a.id_servicio_tipo AND c.id_numot = d.id_numot ");
	mysqli_stmt_execute($consultar_item);
	mysqli_stmt_store_result($consultar_item);
	mysqli_stmt_bind_result($consultar_item,  $nombre_servicio, $ot);
	mysqli_stmt_fetch($consultar_item);



	$antiguo_mapeo = mysqli_prepare($connect,"SELECT nombre FROM freezer_mapeo WHERE id_mapeo = $id_mapeo");
	mysqli_stmt_execute($antiguo_mapeo);
	mysqli_stmt_store_result($antiguo_mapeo);
	mysqli_stmt_bind_result($antiguo_mapeo, $viejo_mapeo);
	mysqli_stmt_fetch($antiguo_mapeo);

			
	$consultar_sensor = mysqli_prepare($connect,"SELECT nombre FROM sensores WHERE id_sensor = $id_sensor");
	mysqli_stmt_execute($consultar_sensor);
	mysqli_stmt_store_result($consultar_sensor);
	mysqli_stmt_bind_result($consultar_sensor, $nombre_sensor);
	mysqli_stmt_fetch($consultar_sensor);
			
	
	$consultar_bandeja = mysqli_prepare($connect,"SELECT nombre FROM bandeja WHERE id_bandeja = $id_bandeja");
	mysqli_stmt_execute($consultar_bandeja);
	mysqli_stmt_store_result($consultar_bandeja);
	mysqli_stmt_bind_result($consultar_bandeja, $nombre_bandeja);
	mysqli_stmt_fetch($consultar_bandeja);
			
			
	$mensaje = "Ha asignado el sensor: ".$nombre_sensor." a la bandeja: ".$nombre_bandeja." para el servicio: ".$nombre_servicio." y la OT: ".$ot;
	$tipo_historial = 1;

	$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_refrigeradores (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
	mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
	mysqli_stmt_execute($insertando_historial); 
*/
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////FIN DE INGRESO DEL BACKTRAKING///////////////////////////////////////////////////////////////////////////////////////////	
			
	
			$ingresar = mysqli_prepare($connect,"INSERT INTO freezer_sensor (id_asignado, id_bandeja, id_sensor, id_mapeo, id_usuario)
																						VALUES (?,?,?,?,?) ");
			
			mysqli_stmt_bind_param($ingresar, 'iiiii', $id_asignado, $id_bandeja, $id_sensor, $id_mapeo, $id_valida);
			mysqli_stmt_execute($ingresar);
			
			
			if($ingresar){
				echo "Asignado";
								
			
			}else{
				echo "Error";
			}
				
		}

	mysqli_stmt_close($connect);

?>