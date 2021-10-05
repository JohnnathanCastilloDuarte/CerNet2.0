<?php 
	include("../../config.ini.php");
		
	$usuario= $_POST['usuario'];
	$clave= md5($_POST['clave']);
	//$file= $_POST['file'];
	$nombre_usuario= $_POST['nombre_usuario'];
	$apellido_usuario= $_POST['apellido_usuario'];
	$email_usuario= $_POST['email_usuario'];
	$telefono_usuario= $_POST['telefono_usuario'];
	$numero_identificacion= $_POST['numero_identificacion'];
	$cargo_usuario= $_POST['cargo_usuario'];
	$departamento_usuario= $_POST['departamento_usuario'];
	$pais_usuario= $_POST['pais_usuario'];
	$empresa_usuario= $_POST['empresa_usuario'];
	$estado_usuario= $_POST['estado_usuario'];

  


	$crear_usuario = mysqli_prepare($connect,"INSERT INTO usuario (usuario, password) VALUES (?, ?)");
	mysqli_stmt_bind_param($crear_usuario, 'ss', $usuario, $clave);
	mysqli_stmt_execute($crear_usuario);
	//mysqli_stmt_store_result($crear_usuario);

	$consultar_usuario = mysqli_prepare($connect,"SELECT id_usuario FROM usuario WHERE usuario = ? ORDER BY fecha_registro DESC limit 1");
	mysqli_stmt_bind_param($consultar_usuario, 's', $usuario);
	mysqli_stmt_execute($consultar_usuario);
	mysqli_stmt_store_result($consultar_usuario);
	mysqli_stmt_bind_result($consultar_usuario, $id_usuario);
	mysqli_stmt_fetch($consultar_usuario);



		$guardar_persona = mysqli_prepare($connect, "INSERT INTO persona (id_usuario, nombre, apellido, email, telefono, departamento, cargo, pais, estado, fecha_registro,
																																			numero_identificacion, imagen_usuario, id_empresa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");		
		mysqli_stmt_bind_param($guardar_persona, 'isssssssssssi',  $id_usuario, $nombre_usuario, $apellido_usuario, $email_usuario, $telefono_usuario, $departamento_usuario,
																											$cargo_usuario, $pais_usuario, $estado_usuario, $fecha_registro, $numero_identificacion, $personalizado, $empresa_usuario);
		$fecha_registro = date("Y/m/d H:i:s");
	 		
		mysqli_stmt_execute($guardar_persona);


/*
		$mensaje = "Ha creado un nuevo usuario, usuario: ".$usuario.", de nombres: ".$nombre_usuario." ".$apellido_usuario.", Numero identificación: "
		.$numero_identificacion.", email: ".$email_usuario.", telefono: ".$telefono_usuario.", cargo: ".$cargo.", departamento: ".$departamento_usuario.
		", pais: ".$pais_usuario;
		$tipo_historial = 1;

			//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_usuario (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $mi_id, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);
	
*/

		if($guardar_persona){
			echo "creado";
		}else{
			echo"no creado";
		}


?>