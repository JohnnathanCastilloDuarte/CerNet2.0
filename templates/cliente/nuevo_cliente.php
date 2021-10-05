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


if(isset($_POST['razon_social']) && isset($_POST['pais_empresa'])){

	$registro_vtiger = $_POST['registro_vtiger'];
	$n_tributario = $_POST['n_tributario'];
	$razon_social = $_POST['razon_social'];
	$direccion_empresa = $_POST['direccion_empresa'];
	$pais_empresa = $_POST['pais_empresa'];
	$ciudad_empresa = $_POST['ciudad_empresa'];
 	$sigla_pais = $_POST['sigla_pais'];
	$sigla_empresa = $_POST['sigla_empresa'];
	$tipo_sede = $_POST['tipo_sede'];
	$giro_empresa = $_POST['giro_empresa'];
	
	
			$mensaje = "Ha creado un nuevo cliente: ".$razon_social;
			$tipo_historial = 1;

			//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_empresa (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $mi_id, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);
	
	
	
	
	$crear_empresa = mysqli_prepare($connect,"INSERT INTO empresa (id_vtiger, numero_tributario, nombre, giro, 
																						direccion, ciudad, sigla_pais, sigla_empresa, pais, tipo_sede)
																						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	mysqli_stmt_bind_param($crear_empresa, 'ssssssssss', $registro_vtiger, $n_tributario, $razon_social, $giro_empresa,
																										 $direccion_empresa, $ciudad_empresa, $sigla_pais, $sigla_empresa,
																										 $pais_empresa, $tipo_sede);
	mysqli_stmt_execute($crear_empresa);

	if(mysqli_stmt_affected_rows($crear_empresa) > 0){
		$alerta = "<div class='alert alert-success fade show' role='alert'>El cliente <strong>$razon_social</strong> ha sido creado!</div>";
			$smarty->assign("alerta",$alerta);	
	}else{
		$alerta = "<div class='alert alert-warning fade show' role='alert'>$razon_social No! pudo ser creado, Revisa la información</div>";
		$smarty->assign("alerta",$alerta);
		$smarty->assign("registro_vtiger",$registro_vtiger);
		$smarty->assign("n_tributario",$n_tributario);
		$smarty->assign("razon_social",$razon_social);
		$smarty->assign("direccion_empresa",$direccion_empresa);
		$smarty->assign("pais_empresa",$pais_empresa);
		$smarty->assign("ciudad_empresa",$ciudad_empresa);
		$smarty->assign("sigla_pais",$sigla_pais);
		$smarty->assign("sigla_empresa",$sigla_empresa);
		$smarty->assign("tipo_sede",$tipo_sede);
		$smarty->assign("giro_empresa",$giro_empresa);
	}
}//cierre del if isset principal	
	
$smarty->display("cliente/nuevo_cliente.tpl");
?>