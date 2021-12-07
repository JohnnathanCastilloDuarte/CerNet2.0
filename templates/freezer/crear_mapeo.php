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
$temperatura_minima = $_POST['temperatura_minima'];
$temperatura_maxima = $_POST['temperatura_maxima'];
$valor_seteado_temperatura = $_POST['valor_seteado_temperatura'];
$humedad_minima = $_POST['humedad_minima'];
$humedad_maxima =  $_POST['humedad_maxima'];
$valor_seteado_humedad = $_POST['valor_seteado_humedad'];

$incluir_inf_base = $_POST['incluir_inf_base'];

$id_asignado = $_POST['id_asignado_freezer'];
$id_valida = $_POST['id_valida'];


$fecha_incial = $fecha_inicio_mapeo.' '.$hora_inicio_mapeo.':'.$minuto_inicio_mapeo.':'.$segundo_inicio_mapeo;

$fecha_fin = $fecha_fin_mapeo.' '.$hora_fin_mapeo.':'.$minuto_fin_mapeo.':'.$segundo_fin_mapeo;

$c_dias = number_format(((strtotime($fecha_fin)-strtotime($fecha_incial))/3600)/24,2);
$c_hora = $c_dias * 24;

$nombre_construido = $nombre_mapeo;




/*
	/////////////////////////////CONSULTA DE INFORMACIÓN PARA EL BACKTRAKING//////////////////////////////////////////////////////////////////
	
	$consultar_item = mysqli_prepare($connect,"SELECT a.servicio, d.numot FROM servicio_tipo as a, item_asignado as b, servicio as c, numot as d  WHERE b.id_asignado = $id_asignado AND c.id_servicio = b.id_servicio 																								 AND  c.id_servicio_tipo = 	a.id_servicio_tipo AND c.id_numot = d.id_numot ");
	mysqli_stmt_execute($consultar_item);
	mysqli_stmt_store_result($consultar_item);
	mysqli_stmt_bind_result($consultar_item,  $nombre_servicio, $ot);
	mysqli_stmt_fetch($consultar_item);


	$mensaje = "Ha creado un nuevo mapeo: ".$nombre_mapeo." para el servicio: ".$nombre_servicio." y la OT: ".$ot;
	$tipo_historial = 1;

	$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_refrigeradores (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
	mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
	mysqli_stmt_execute($insertando_historial); 

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////FIN DE INGRESO DEL BACKTRAKING///////////////////////////////////////////////////////////////////////////////////////////
*/

	$crear = mysqli_prepare($connect,"INSERT INTO freezer_mapeo (id_asignado, nombre, fecha_inicio, hora_inicio, fecha_final, hora_final, 
		intervalo,  temperatura_minima, temperatura_maxima, valor_seteado_temperatura, humedad_minima, humedad_maxima, valor_seteado_humedad, informe_base, id_usuario)
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

	mysqli_stmt_bind_param($crear, 'issssssssssssii', $id_asignado, $nombre_construido, $fecha_inicio_mapeo, $hora_inicio, $fecha_fin_mapeo, $hora_fin,	$intervalo, $temperatura_minima,
		$temperatura_maxima, $valor_seteado_temperatura, $humedad_minima, $humedad_maxima, $valor_seteado_humedad, $incluir_inf_base, $id_valida);

	mysqli_stmt_execute($crear);
	mysqli_stmt_fetch($crear);


	if($crear){
		
		echo "Creado";
	}else{
		echo "error";
	}

	mysqli_stmt_close($connect);

	?>