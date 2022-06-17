<?php
	$smarty->assign('paises', array('Afganistán','Albania','Alemania','Andorra','Angola','Antigua y Barbuda','Arabia Saudita','Argelia','Argentina','Armenia',
	'Australia','Austria','Azerbaiyán','Bahamas','Bangladés','Barbados','Baréin','Bélgica','Belice','Benín','Bielorrusia','Birmania','Bolivia','Bosnia y Herzegovina',
	'Botsuana','Brasil','Brunéi','Bulgaria','Burkina Faso','Burundi','Bután','Cabo Verde','Camboya','Camerún','Canadá','Catar','Chad','Chile','China','Chipre',
	'Ciudad del Vaticano','Colombia','Comoras','Corea del Norte','Corea del Sur','Costa de Marfil','Costa Rica','Croacia','Cuba','Dinamarca','Dominica','Ecuador',
	'Egipto','El Salvador','Emiratos Árabes Unidos','Eritrea','Eslovaquia','Eslovenia','España','Estados Unidos','Estonia','Etiopía','Filipinas','Finlandia','Fiyi',
	'Francia','Gabón','Gambia','Georgia','Ghana','Granada','Grecia','Guatemala','Guyana','Guinea','Guinea ecuatorial','Guinea-Bisáu','Haití','Honduras','Hungría',
	'India','Indonesia','Irak','Irán','Irlanda','Islandia','Islas Marshall','Islas Salomón','Israel','Italia','Jamaica','Japón','Jordania','Kazajistán','Kenia','Kirguistán',
	'Kiribati','Kuwait','Laos','Lesoto','Letonia','Líbano','Liberia','Libia','Liechtenstein','Lituania','Luxemburgo','Madagascar','Malasia','Malaui','Maldivas','Malí','Malta',
	'Marruecos','Mauricio','Mauritania','México','Micronesia','Moldavia','Mónaco','Mongolia','Montenegro','Mozambique','Namibia','Nauru','Nepal','Nicaragua','Níger','Nigeria',
	'Noruega','Nueva Zelanda','Omán','Países Bajos','Pakistán','Palaos','Panamá','Papúa Nueva Guinea','Paraguay','Perú','Polonia','Portugal','Reino Unido','República Centroafricana',
	'República Checa','República de Macedonia','República del Congo','República Democrática del Congo','República Dominicana','República Sudafricana','Ruanda','Rumanía',
	'Rusia','Samoa','San Cristóbal y Nieves','San Marino','San Vicente y las Granadinas','Santa Lucía','Santo Tomé y Príncipe','Senegal','Serbia','Seychelles',
	'Sierra Leona','Singapur','Siria','Somalia','Sri Lanka','Suazilandia','Sudán','Sudán del Sur','Suecia','Suiza','Surinam','Tailandia','Tanzania','Tayikistán',
	'Timor Oriental','Togo','Tonga','Trinidad y Tobago'	,'Túnez','Turkmenistán','Turquía','Tuvalu','Ucrania','Uganda','Uruguay','Uzbekistán','Vanuatu','Venezuela','Vietnam',
	'Yemen','Yibuti','Zambia','Zimbabue'));
	$user = $_GET['user'];
	$smarty->assign("checked1","");
	$smarty->assign("checked2","");
	$smarty->assign("checked3","");
	$smarty->assign("checked4","");

  //LISTAR PERSONA ANTIGUA
		$encontrar_persona = mysqli_prepare($connect, "SELECT a.nombre, a.apellido, a.email, a.telefono, a.departamento, a.cargo, a.pais, a.estado,	a.numero_identificacion, b.usuario,
																										c.nombre	
																										FROM persona as a, usuario as b, empresa as c WHERE a.id_usuario = b.id_usuario AND a.id_empresa = c.id_empresa AND a.id_usuario = ?");		
		mysqli_stmt_bind_param($encontrar_persona, 'i', $user);	 		
		mysqli_stmt_execute($encontrar_persona);
		mysqli_stmt_store_result($encontrar_persona);
		mysqli_stmt_bind_result($encontrar_persona, $nombre, $apellido, $email, $telefono, $departamento, $cargo, $pais, $estado, $identificacion, $usuario_antes, $empresa);
		mysqli_stmt_fetch($encontrar_persona);

	
		if(isset($_POST['nombre_usuario']) || isset($_POST['apellido_usuario']) || isset($_POST['identificacion_usuario'])
			 || isset($_POST['pais_usuario']))
		{	
			$nombre_usuario = $_POST['nombre_usuario'];
			$apellido_usuario = $_POST['apellido_usuario'];
			$identificacion_usuario = $_POST['identificacion_usuario'];
			$pais_usuario = $_POST['pais_usuario'];
			$email_usuario = $_POST['email_usuario'];
			$telefono_usuario = $_POST['telefono_usuario'];
			$departamento_usuario = $_POST['departamento_usuario'];
			$cargo_usuario = $_POST['cargo_usuario'];

			$usuario = $_POST['usuario'];
			$id_empresa = $_POST['empresa_usuario'];			
				//la variable personalizado contendra la ruta y el nombre de la imagen
	$personalizado = "";
	//proceso de carga de imagen
	$target_dir = "templates/usuario/images/images_profile/";
		if(is_dir($target_dir)===false)	
		{
			mkdir($target_dir,0777,true);
		}
		$personalizado=$target_dir."profile_image".$nombre_usuario.".jpg";
		$target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["profile_image"])) {
    	$check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    		if($check !== false) {
       	 //echo " Este archivo es una imagen - " . $check["mime"] . ".";
        	$uploadOk = 1;
    			} else {
        		//echo " Este archivo no es una imagen.";
        		$uploadOk = 0;
   				}
			}

// Check file size
if ($_FILES["profile_image"]["size"] > 5000000) {
    //echo "Tu archivo es demasiado grande.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  //echo " Tu archivo no pudo cargarse.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
		rename("$target_file","$personalizado");
       //echo " El archivo ". $personalizado. " ha sido cargado.";
    } else {
       //echo " Hubo un error al intentar cargar el archivo.";
    }
}
	
	
      
			
		$mensaje = "Ha modificado el usuario: ".$usuario_antes.", registrado como: nombres: ".$nombre." ".$apellido.", Numero identificación: "
		.$identificacion.", email: ".$email.", telefono: ".$telefono.", cargo: ".$cargo.", departamento: ".$departamento.
		", pais: ".$pais." Actualizando la información: nombres: ".$nombre_usuario." ".$apellido_usuario.", Numero identificación: "
		.$numero_identificacion.", email: ".$email_usuario.", telefono: ".$telefono_usuario.", cargo: ".$cargo.", departamento: ".$departamento_usuario.
		", pais: ".$pais_usuario;
		$tipo_historial = 2;

			//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_usuario (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $mi_id, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);	
			
			
//actualizar usuario
	$actualizar_usuario = mysqli_prepare($connect,"UPDATE usuario SET usuario = ? WHERE id_usuario = $user");
	mysqli_stmt_bind_param($actualizar_usuario, 's', $usuario);
	mysqli_stmt_execute($actualizar_usuario);
		if(!mysqli_stmt_affected_rows($actualizar_usuario)){
			$alerta_1 = "<div class='alert alert-danger fade show' role='alert'><strong>$usuario</strong> !No¡ ha 
							Actualizado(a)</div>";
			$smarty->assign("alerta",$alerta_1);
		}
      
  if(mysqli_stmt_num_rows($encontrar_persona)>0){
    //actualizamos la información del usuario
	$actualiza_persona = mysqli_prepare($connect,"UPDATE persona SET nombre = ?, apellido = ?, numero_identificacion = ?,
																								pais = ?, email = ?, telefono = ?, departamento = ?, cargo = ?, estado = ?, imagen_usuario = ?, id_empresa = ? WHERE id_usuario = $user");

	mysqli_stmt_bind_param($actualiza_persona, 'ssssssssssi', $nombre_usuario, $apellido_usuario, $identificacion_usuario, $pais_usuario, $email_usuario,
																													$telefono_usuario, $departamento_usuario, $cargo_usuario, $estado_usuario, $personalizado, $id_empresa);
	mysqli_stmt_execute($actualiza_persona);
			
	if(mysqli_stmt_affected_rows($actualiza_persona)>0)
	{
		$alerta = "<div class='alert alert-success fade show' role='alert'><strong>$nombre_usuario $apellido_usuario</strong> ha sido 
							Actualizado(a) correctamente!</div>";
		$smarty->assign("alerta",$alerta);
	}elseif(mysqli_stmt_affected_rows($actualiza_persona)==0)
		{
			$alerta = "<div class='alert alert-danger fade show' role='alert'><strong>$nombre_usuario $apellido_usuario</strong> !No¡ ha 
							Actualizado(a) correctamente!</div>";
			$smarty->assign("alerta",$alerta);
		}else
			{
				$alerta = "";
				$smarty->assign("alerta",$alerta);
			}
  }else{
    $actualiza_persona = mysqli_prepare($connect,"INSERT INTO persona (nombre, apellido, numero_identificacion, pais, email, telefono, departamento, cargo, imagen_usuario, id_empresa, id_usuario)
                                                    VALUES (?,?,?,?,?,?,?,?,?,?,?)");

	mysqli_stmt_bind_param($actualiza_persona, 'ssssssssssi', $nombre_usuario, $apellido_usuario, $identificacion_usuario, $pais_usuario, $email_usuario,
																													$telefono_usuario, $departamento_usuario, $cargo_usuario, $personalizado, $id_empresa, $user);
	mysqli_stmt_execute($actualiza_persona);
			
	if($actualiza_persona)
	{
		$alerta = "<div class='alert alert-success fade show' role='alert'><strong>$nombre_usuario $apellido_usuario</strong> ha sido 
							Creado(a) correctamente!</div>";
		$smarty->assign("alerta",$alerta);
	}elseif(mysqli_stmt_affected_rows($actualiza_persona)==0)
		{
			$alerta = "<div class='alert alert-danger fade show' role='alert'><strong>$nombre_usuario $apellido_usuario</strong> !No¡ ha 
							Creado(a) correctamente!</div>";
			$smarty->assign("alerta",$alerta);
		}else
			{
				$alerta = "";
				$smarty->assign("alerta",$alerta);
			}
    
  }    
      
      
      
      
      
      

		}//cierre del else principal	
//consultar usuario
			$id_empresa = "";
	  	$persona = mysqli_query($connect,"SELECT * FROM persona as a , usuario as b  WHERE a.id_usuario = b.id_usuario AND a.id_usuario = $user");
			$array_persona=array();	
			while($fila = mysqli_fetch_array($persona))
			{
				$id_empresa = $fila['id_empresa'];
				$array_persona[]=$fila;
			}
//consultar empresa 
			$empresas = mysqli_query($connect, "SELECT * FROM empresa");
			$array_empresa = array();
			while($row = mysqli_fetch_array($empresas)){
					$array_empresa[] = $row;
			}
//consultar la empresa
			$nombre_empresa = array(); 
			$empresa = mysqli_query($connect, "SELECT * FROM empresa WHERE id_empresa = $id_empresa ");
		
				while($fila = mysqli_fetch_array($empresa)){
					$nombre_empresa[]=$fila;
				}

			$smarty->assign("nombre_empresa",$nombre_empresa);
			$smarty->assign("array_empresa",$array_empresa);
			$smarty->assign("array_persona",$array_persona);

 
      if(mysqli_stmt_num_rows($encontrar_persona)>0){
        $smarty->display("usuario/nombres_usuarios.tpl");  
      }else{
      
        $smarty->display("usuario/nombres_usuarios_v.tpl");
      }
		
?>