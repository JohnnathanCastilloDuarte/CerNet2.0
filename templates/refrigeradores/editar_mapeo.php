<?php 
	include("../../config.ini.php");

	$nombre_mapeo = $_POST['nombre_mapeo'];
	$fecha_inicio_mapeo = $_POST['fecha_inicio_mapeo'];
	$hora_inicio_mapeo = $_POST['hora_inicio_mapeo'];
	$minuto_inicio_mapeo = $_POST['minuto_inicio_mapeo'];
	$segundo_inicio_mapeo = $_POST['segundo_inicio_mapeo'];

	$hora_inicio = $hora_inicio_mapeo.":".$minuto_inicio_mapeo.":".$segundo_inicio_mapeo;

	$fecha_fin_mapeo = $_POST['fecha_fin_mapeo'];
	$hora_fin_mapeo = $_POST['hora_fin_mapeo'];
	$minuto_fin_mapeo = $_POST['minuto_fin_mapeo'];
	$segundo_fin_mapeo = $_POST['segundo_fin_mapeo'];

	$hora_fin = $hora_fin_mapeo.":".$minuto_fin_mapeo.":".$segundo_fin_mapeo;

	$intervalo = $_POST['intervalo'];
	$humendad_minima = $_POST['humendad_minima'];
	$humendad_maxima = $_POST['humendad_maxima'];
	$temperatura_minima = $_POST['temperatura_minima'];
	$temperatura_maxima = $_POST['temperatura_maxima'];
	$valor_seteado_humedad = $_POST['valor_seteado_humedad'];
	$valor_seteado_temperatura = $_POST['valor_seteado_temperatura'];
	$id_mapeo = $_POST['id_mapeo'];
	$id_asignado = $_POST['id_asignado'];
	$id_valida = $_POST['id_valida'];

	/////////////////////////////CONSULTA DE INFORMACIÓN PARA EL BACKTRAKING//////////////////////////////////////////////////////////////////
/*
	$consultar_item = mysqli_prepare($connect,"SELECT a.servicio, d.numot FROM servicio_tipo as a, item_asignado as b, servicio as c, numot as d  WHERE b.id_asignado = $id_asignado AND c.id_servicio = b.id_servicio 																								 AND  c.id_servicio_tipo = 	a.id_servicio_tipo AND c.id_numot = d.id_numot ");
	mysqli_stmt_execute($consultar_item);
	mysqli_stmt_store_result($consultar_item);
	mysqli_stmt_bind_result($consultar_item,  $nombre_servicio, $ot);
	mysqli_stmt_fetch($consultar_item);



	$antiguo_mapeo = mysqli_prepare($connect,"SELECT nombre FROM refrigerador_mapeo WHERE id_mapeo = $id_mapeo");
	mysqli_stmt_execute($antiguo_mapeo);
	mysqli_stmt_store_result($antiguo_mapeo);
	mysqli_stmt_bind_result($antiguo_mapeo, $viejo_mapeo);
	mysqli_stmt_fetch($antiguo_mapeo);

	$mensaje = "Ha modificado el mapeo: ".$viejo_mapeo." cambiado por: ".$nombre_mapeo."para el servicio: ".$nombre_servicio." y la OT: ".$ot;
	$tipo_historial = 2;

	$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_refrigeradores (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
	mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
	mysqli_stmt_execute($insertando_historial); 
*/
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////FIN DE INGRESO DEL BACKTRAKING///////////////////////////////////////////////////////////////////////////////////////////


	$editar = mysqli_prepare($connect,"UPDATE refrigerador_mapeo SET nombre=?,fecha_inicio=?,
																		hora_inicio=?,fecha_final=?,hora_final=?,intervalo=?,humedad_minima=?,
																		humedad_maxima=?,temperatura_minima=?,temperatura_maxima=?,valor_seteado_humedad=?, valor_seteado_temperatura = ?
																		 WHERE id_mapeo = ?");

	mysqli_stmt_bind_param($editar, 'ssssssssssssi', $nombre_mapeo, $fecha_inicio_mapeo, $hora_inicio, $fecha_fin_mapeo, $hora_fin, 
																									$intervalo, $humendad_minima, $humendad_maxima, $temperatura_minima, $temperatura_maxima, $valor_seteado_humedad, $valor_seteado_temperatura, $id_mapeo);

	mysqli_stmt_execute($editar);

  echo mysqli_stmt_error($editar); 

	if($editar){
		echo "Editado";
	}else{
		echo "Error";
	}




	mysqli_stmt_close($connect);

?>