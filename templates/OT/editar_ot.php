<?php 
	include("../../config.ini.php");

$id_numot= $_POST['id_numot'];
$empresa= $_POST['empresa'];
$u_asignado= $_POST['u_asignado'];
$ot = 'OT-'.$_POST['ot'];
$id_valida = $_POST['id_valida'];
		
			$antigua_ot = mysqli_prepare($connect,"SELECT a.numot, b.nombre, c.nombre, c.apellido FROM numot as a, empresa as b, persona as c WHERE 
																						a.id_empresa = b.id_empresa AND a.id_usuario_asignado	= c.id_usuario AND a.id_numot = ?");
			mysqli_stmt_bind_param($antigua_ot, 'i', $id_numot);
			mysqli_stmt_execute($antigua_ot);
			mysqli_stmt_store_result($antigua_ot);
			mysqli_stmt_bind_result($antigua_ot, $numot, $empresa_antigua, $nombres, $apellidos);
			mysqli_stmt_fetch($antigua_ot);
		
		
			$consultar_persona = mysqli_prepare($connect,"SELECT nombre, apellido FROM persona WHERE id_usuario = ?");
			mysqli_stmt_bind_param($consultar_persona, 'i', $u_asignado);
			mysqli_stmt_execute($consultar_persona);
			mysqli_stmt_store_result($consultar_persona);
			mysqli_stmt_bind_result($consultar_persona, $nombre , $apellido);
			mysqli_stmt_fetch($consultar_persona);
				
			$consultar_empresa = mysqli_prepare($connect,"SELECT nombre FROM empresa WHERE id_empresa = ?");
			mysqli_stmt_bind_param($consultar_empresa, 'i', $empresa);
			mysqli_stmt_execute($consultar_empresa);
			mysqli_stmt_store_result($consultar_empresa);
			mysqli_stmt_bind_result($consultar_empresa, $empresa_nueva);
			mysqli_stmt_fetch($consultar_empresa);
			

			$mensaje = "Ha realizado la  modificación de la ot: ".$numot.", para la empresa: ".$empresa_antigua.", asignado a: ".$nombres.' '.$apellidos.' cambiando a ot: '.$ot.', para la empresa:'
									.$empresa_nueva.', asignada a:'.$nombre.' '.$apellido;
			$tipo_historial = 2;
	
			//insertar en el backtraking 
			//1 insertar en la tabla historal_modulo
	
			$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_numot (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
			mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
			mysqli_stmt_execute($insertando_historial);
			mysqli_stmt_store_result($insertando_historial);




		/*$insertar = mysqli_prepare($connect,"INSERT INTO numot (id_empresa, cantidad_informes, fecha_creacion, fecha_asignacion, id_usuario_asignado) VALUES
																				(?, ?, ?, ?, ?) WHERE id_numot = ?");*/
			$update = mysqli_prepare($connect,"UPDATE numot SET numot = ?, id_empresa = ?,  id_usuario_asignado = ? WHERE id_numot = ?");
			mysqli_stmt_bind_param($update, 'siii', $ot, $empresa, $u_asignado, $id_numot);
			mysqli_stmt_execute($update);

		

	if($update){
		echo "modificado";
	}else{
		echo "no modificado";
	}

	

?>