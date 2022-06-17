<?php
error_reporting(0);
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

//buscando empresas

$empresas = mysqli_query($connect,"SELECT * FROM empresa");
$envia = array();
while($resultados = mysqli_fetch_array($empresas)){
	
	$envia[] = $resultados;
	
}

$smarty->assign('empresas',$envia);

	//comienzo de la carga de data 
	/*if(isset($_POST['clave_usuario']) && isset($_POST['re_clave_usuario']) && isset($_POST['usuario']))
	{
	//campos correspondientes a la creación de usuario	
	$usuario = $_POST['usuario'];	
	$pass = $_POST['clave_usuario'];
	$re_pass = $_POST['re_clave_usuario'];

	//campos correspondientes a la creación de la persona
	$nombre_usuario = $_POST['nombre_usuario'];
	$apellido_usuario = $_POST['apellido_usuario'];
	$email_usuario = $_POST['email_usuario'];
	$telefono_usuario=$_POST['telefono_usuario'];
	$numero_identificacion = $_POST['numero_identificacion'];
	$cargo_usuario = $_POST['cargo_usuario'];
	$departamento_usuario = $_POST['departamento_usuario'];
	$pais_usuario = $_POST['pais_usuario'];
	$estado_usuario = $_POST['estado_usuario'];
	$empresa_usuario = $_POST['empresa_usuario'];
		//consulta para determinar si el usuario ya existe 
		$valida_persona = "SELECT usuario  FROM usuario  WHERE usuario = ?";
		$validacion = mysqli_prepare($connect,$valida_persona);
		mysqli_stmt_bind_param($validacion, 's', $usuario);
		mysqli_stmt_execute($validacion);
		mysqli_stmt_store_result($validacion);
		//recuperamos el usuario 
		mysqli_stmt_bind_result($validacion, $usuario_creado);
		mysqli_stmt_fetch($validacion);
	
		//consulta para determinar si el email ya existe 
		$valida_email = "SELECT email  FROM persona  WHERE email = ?";
		$email_validacion = mysqli_prepare($connect,$valida_email);
		mysqli_stmt_bind_param($email_validacion, 's', $email_usuario);
		mysqli_stmt_execute($email_validacion);
		mysqli_stmt_store_result($email_validacion);
		//recuperamos el email 
		mysqli_stmt_bind_result($email_validacion, $email_creado);
		mysqli_stmt_fetch($email_validacion);
		
		
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
		
	
		if(mysqli_stmt_num_rows($validacion)>0)
	{
		$alerta = "<div class='alert alert-warning fade show' role='alert'>El usuario ya existe</div>";
		$smarty->assign("alerta",$alerta);
		$smarty->assign("usuario",$_POST['usuario']);
		$smarty->assign("nombre_usuario",$_POST['nombre_usuario']);
		$smarty->assign("apellido_usuario",$_POST['apellido_usuario']);
		$smarty->assign("email_usuario",$_POST['email_usuario']);
		$smarty->assign("telefono_usuario",$_POST['telefono_usuario']);
		$smarty->assign("numero_identificacion",$_POST['numero_identificacion']);
		$smarty->assign("cargo_usuario",$_POST['cargo_usuario']);
		$smarty->assign("departamento_usuario",$_POST['departamento_usuario']);
		$smarty->assign("pais_usuario",$_POST['pais_usuario']);
		$smarty->assign("estado_usuario",$_POST['estado_usuario']);
	}		
		
		
	if(mysqli_stmt_num_rows($email_validacion)>0)
	{
		$alerta = "<div class='alert alert-warning fade show' role='alert'>El email ya  se encuentra registrado</div>";
		$smarty->assign("alerta",$alerta);
		$smarty->assign("usuario",$_POST['usuario']);
		$smarty->assign("nombre_usuario",$_POST['nombre_usuario']);
		$smarty->assign("apellido_usuario",$_POST['apellido_usuario']);
		$smarty->assign("email_usuario",$_POST['email_usuario']);
		$smarty->assign("telefono_usuario",$_POST['telefono_usuario']);
		$smarty->assign("numero_identificacion",$_POST['numero_identificacion']);
		$smarty->assign("cargo_usuario",$_POST['cargo_usuario']);
		$smarty->assign("departamento_usuario",$_POST['departamento_usuario']);
		$smarty->assign("pais_usuario",$_POST['pais_usuario']);
		$smarty->assign("estado_usuario",$_POST['estado_usuario']);
	}	

	if($pass != $re_pass)
	{
		$alerta = "<div class='alert alert-warning fade show' role='alert'>Las contraseñas no coinciden</div>";
		$smarty->assign("alerta",$alerta);
		$smarty->assign("usuario",$_POST['usuario']);
		$smarty->assign("nombre_usuario",$_POST['nombre_usuario']);
		$smarty->assign("apellido_usuario",$_POST['apellido_usuario']);
		$smarty->assign("email_usuario",$_POST['email_usuario']);
		$smarty->assign("telefono_usuario",$_POST['telefono_usuario']);
		$smarty->assign("numero_identificacion",$_POST['numero_identificacion']);
		$smarty->assign("cargo_usuario",$_POST['cargo_usuario']);
		$smarty->assign("departamento_usuario",$_POST['departamento_usuario']);
		$smarty->assign("pais_usuario",$_POST['pais_usuario']);
		$smarty->assign("estado_usuario",$_POST['estado_usuario']);
		
	}		
	if($pass == $re_pass)
	{	

if(isset($_POST['btn_nuevo_usuario'])){
		$nombre_usuario = $_POST['nombre_usuario'];
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
       	// echo " Este archivo es una imagen - " . $check["mime"] . ".";
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
      // echo " El archivo ". $personalizado. " ha sido cargado.";
    } else {
       //echo " Hubo un error al intentar cargar el archivo.";
    }
}
		}
/*		
		//consulta para insertar un usuario nuevo
		$encriptar = md5($pass);
		$guardar_usuario = mysqli_prepare($connect,"INSERT INTO usuario (usuario, password) VALUES (?, ?)");
		mysqli_stmt_bind_param($guardar_usuario, 'ss', $usuario,$encriptar);
		mysqli_stmt_execute($guardar_usuario);


		//consulta para determinar el id del ultimo usuario ingresado
		$consulta = "SELECT id_usuario FROM usuario WHERE usuario = ? ORDER BY fecha_registro DESC LIMIT 1";
		$ultimo_registro = mysqli_prepare($connect,$consulta);
		mysqli_stmt_bind_param($ultimo_registro, 's', $usuario);
		mysqli_stmt_execute($ultimo_registro);
		mysqli_stmt_store_result($ultimo_registro);
		//recuperamos el id_usuario 
		mysqli_stmt_bind_result($ultimo_registro, $id_usuario_creado);
		mysqli_stmt_fetch($ultimo_registro);
	
	
		//almacenamos la información de la persona con el id_usuario recuperado	
		$guardar_persona = mysqli_prepare($connect, "INSERT INTO persona (id_usuario, nombre, apellido, email, telefono, departamento, cargo, pais, estado, fecha_registro,
																																			numero_identificacion, imagen_usuario, id_empresa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");		
		mysqli_stmt_bind_param($guardar_persona, 'isssssssssssi',  $id_usuario_creado, $nombre_usuario, $apellido_usuario, $email_usuario, $telefono_usuario, $departamento_usuario,
																											$cargo_usuario, $pais_usuario, $estado_usuario, $fecha_registro, $numero_identificacion, $personalizado, $empresa_usuario);
		$fecha_registro = date("Y/m/d H:i:s");
	 		
		mysqli_stmt_execute($guardar_persona);
		
		
		
		if(mysqli_stmt_affected_rows($guardar_usuario)>0 && mysqli_stmt_affected_rows($guardar_persona)>0)
		{
			$alerta = "<div class='alert alert-success fade show' role='alert'>El usuario <strong>$usuario</strong> ha sido creado!</div>";
			$smarty->assign("alerta",$alerta);
			$smarty->assign("usuario",'');	
		}
	}
	}
	else
	{
		$alerta = "";
		$smarty->assign("usuario",'');
		$smarty->assign("alerta",$alerta);	
	}
*/

	$smarty->display("usuario/nuevo_usuario.tpl");
	
	?>