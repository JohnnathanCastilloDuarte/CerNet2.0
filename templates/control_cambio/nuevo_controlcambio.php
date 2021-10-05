<?php 
	include("../../config.ini.php");
		
			$fecha_realizacion=$_POST['fecha_realizacion'];
			$tiempo_requerido=$_POST['tiempo_requerido'];
			$desc_cambio=$_POST['desc_cambio'];
			$tipo_cambio=$_POST['tipo_cambio'];
			$modulo=$_POST['modulo'];
			$archivo=$_POST['archivo'];
			$usuario=$_POST['usuario'];



			//CONSULTAR MODULO 
			$consultar_modulo = mysqli_prepare($connect,"SELECT nombre FROM modulo WHERE id_modulo = ?");
			mysqli_stmt_bind_param($consultar_modulo, 'i', $modulo);
			mysqli_stmt_execute($consultar_modulo);
			mysqli_stmt_store_result($consultar_modulo);
			mysqli_stmt_bind_result($consultar_modulo, $nombre_modulo);
			 mysqli_stmt_fetch($consultar_modulo);



			$mensaje = "Ha creado un nuevo cambio: ".$desc_cambio.", de tipo: ".$tipo_cambio.", para el modulo: ".$nombre_modulo;
			$tipo_historial = 1;

			//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_controlcambio (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $usuario, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);
	

	$query ="INSERT INTO ti_controlcambio (tipo_cambio, descripcion, id_modulo, id_usuario,
					tiempo, fecha_cambio, archivo) 
					VALUES (?,?,?,?,?,?,?)";

	$insert = mysqli_prepare($connect,$query);
	mysqli_stmt_bind_param($insert, 'ssiisss', $tipo_cambio, $desc_cambio, $modulo, $usuario, $tiempo_requerido, 
												 $fecha_realizacion, $archivo);
	mysqli_stmt_execute($insert);
	mysqli_stmt_store_result($insert);

	if($insert){
		echo "si";
	}else{
		echo "no";
	}

	
	mysqli_stmt_close($connect);	



?>