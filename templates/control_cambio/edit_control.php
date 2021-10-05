<?php 
	include("../../config.ini.php");
		
	$fecha_registro=$_POST['fecha_registro'];
	$fecha_cambio=$_POST['fecha_cambio'];
	$modulo=$_POST['modulo'];
	$tipo_cambio=$_POST['tipo_cambio'];
	$archivo=$_POST['archivo'];
	$desc_control=$_POST['desc_control'];
	$tiempo=$_POST['tiempo'];
	$id_control=$_POST['id'];
	$usuario = $_POST['usuario'];
	$fecha_modificacion = date("Y/m/d H:i:s");
		
	//CONSULTAR MODULO 
			$consultar_modulo = mysqli_prepare($connect,"SELECT nombre FROM modulo WHERE id_modulo = ?");
			mysqli_stmt_bind_param($consultar_modulo, 'i', $modulo);
			mysqli_stmt_execute($consultar_modulo);
			mysqli_stmt_store_result($consultar_modulo);
			mysqli_stmt_bind_result($consultar_modulo, $nombre_modulo);
			 mysqli_stmt_fetch($consultar_modulo);

	//CONSULTAR LA INFORMACIÓN DEL CONTRL DE CAMBIO ANTERIOR
		$query = "SELECT a.fecha_cambio, a.fecha_modificacion, a.id_controlcambio, a.tipo_cambio, a.descripcion, a.id_modulo, b.nombre, a.id_usuario, c.nombre, a.tiempo, a.fecha_registro,
						a.archivo
					  FROM ti_controlcambio as a, modulo as b, persona as c WHERE a.id_modulo = b.id_modulo AND  a.id_usuario = c.id_usuario AND a.id_controlcambio = ? ";

	$execute_query = mysqli_prepare($connect,$query);
	mysqli_stmt_bind_param($execute_query, 'i', $id_control);
	mysqli_stmt_execute($execute_query);
	mysqli_stmt_store_result($execute_query);
	mysqli_stmt_bind_result($execute_query, $fecha_cambio, $fecha_modificacion, $id_controlcambio, $tipo_cambio, $descripcion, $id_modulo, $modulo, $id_usuario, $usuario, $tiempo,
												 									$fecha_registro, $archivo);
	mysqli_stmt_fetch($execute_query);

	$mensaje = "Ha modificado el control :".$descripcion.", de tipo: ".$tipo_cambio.", para el modulo: ".$modulo.", se cambia por: ".$desc_control.", de tipo: ".$tipo_cambio.", para el modulo: ".$nombre_modulo;
	$tipo_historial = 2;

			//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_controlcambio (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $usuario, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);
	

















	$query = "UPDATE ti_controlcambio SET tipo_cambio = ? , descripcion = ?, id_modulo = ?, id_usuario = ?,
									 tiempo=?,fecha_cambio=?,fecha_registro=?,fecha_modificacion=?,
									 archivo=? WHERE id_controlcambio = ?";

	$execute_query = mysqli_prepare($connect,$query);
	mysqli_stmt_bind_param($execute_query, 'ssiisssssi', $tipo_cambio, $desc_control, $modulo, $usuario, $tiempo, $fecha_cambio, $fecha_registro, $fecha_modificacion,
												 														$archivo,	$id_control);
	
	

	mysqli_stmt_execute($execute_query);


	if($query){
		echo "si";
	}else{
		echo "no";
	}




?>