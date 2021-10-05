<?php 

	include("../../config.ini.php");
	
	$id_mapeo = $_POST['id_mapeo'];
	$id_asignado = $_POST['id_asignado'];
	$id_bandeja = $_POST['id_bandeja'];
	$id_sensor = $_POST['id_sensor'];
	$id_valida = $_POST['id_valida'];

	$primer_filtro = mysqli_prepare($connect,"SELECT id_ultrafreezer_sensor FROM ultrafreezer_sensor WHERE id_sensor = $id_sensor AND id_bandeja = $id_bandeja AND id_asignado = 																								$id_asignado");
	mysqli_stmt_execute($primer_filtro);
	mysqli_stmt_store_result($primer_filtro);
	mysqli_stmt_bind_result($primer_filtro, $id_ultrafreezer_sensor);
	mysqli_stmt_fetch($primer_filtro);


  $segundo_filtro = mysqli_prepare($connect,"SELECT id_ultrafreezer_sensor FROM ultrafreezer_datos_crudos WHERE  id_ultrafreezer_sensor = ?");
  mysqli_stmt_bind_param($segundo_filtro, 'i',$id_ultrafreezer_sensor);
  mysqli_stmt_execute($segundo_filtro);
  mysqli_stmt_store_result($segundo_filtro);
  mysqli_stmt_bind_result($segundo_filtro, $que_trae);

	if(mysqli_stmt_num_rows($segundo_filtro) > 1){
		echo "No";
	}else{
		
/*
	/////////////////////////////CONSULTA DE INFORMACIÓN PARA EL BACKTRAKING//////////////////////////////////////////////////////////////////

	$consultar_item = mysqli_prepare($connect,"SELECT a.servicio, d.numot FROM servicio_tipo as a, item_asignado as b, servicio as c, numot as d  WHERE b.id_asignado = $id_asignado 		AND c.id_servicio = b.id_servicio 	 AND  c.id_servicio_tipo = 	a.id_servicio_tipo AND c.id_numot = d.id_numot ");
	mysqli_stmt_execute($consultar_item);
	mysqli_stmt_store_result($consultar_item);
	mysqli_stmt_bind_result($consultar_item,  $nombre_servicio, $ot);
	mysqli_stmt_fetch($consultar_item);



	$antiguo_mapeo = mysqli_prepare($connect,"SELECT nombre FROM refrigerador_mapeo WHERE id_mapeo = $id_mapeo");
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
			
			
	$mensaje = "Ha des-asignado el sensor: ".$nombre_sensor." de la bandeja: ".$nombre_bandeja." para el servicio: ".$nombre_servicio." y la OT: ".$ot;
	$tipo_historial = 3;

	$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_refrigeradores (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
	mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
	mysqli_stmt_execute($insertando_historial); 

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////FIN DE INGRESO DEL BACKTRAKING///////////////////////////////////////////////////////////////////////////////////////////	
		*/
		
		$quitar = mysqli_prepare($connect,"DELETE FROM ultrafreezer_sensor WHERE id_mapeo = ? AND id_asignado = ? AND id_bandeja = ? AND id_sensor = ?");
		mysqli_stmt_bind_param($quitar , 'iiii', $id_mapeo, $id_asignado, $id_bandeja, $id_sensor);
		mysqli_stmt_execute($quitar);

			if($quitar){
				echo "Des-asignado";
			}else{
				echo "error";
			}
	}
mysqli_stmt_close($connect);	
?>