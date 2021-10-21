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



//recibo al ID de la empresa
$empresa = $_GET['empresa'];

echo "<input value='".$empresa."' id='id_empresa' hidden>";


if(isset($_POST['update'])){

//cargo los datos enviado por metodo post
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
	
	//CONSULTAR EL CLIENTE ANTES DE MODIFICAR
	$consultar = mysqli_prepare($connect,"SELECT nombre FROM empresa WHERE id_empresa = ?");
	mysqli_stmt_bind_param($consultar, 'i', $empresa);
	mysqli_stmt_execute($consultar);
	mysqli_stmt_store_result($consultar);
	mysqli_stmt_bind_result($consultar, $nombre_empresa);
	mysqli_stmt_fetch($consultar);
		
		
	
			$mensaje = "Ha modificado el cliente: ".$nombre_empresa.", cambios realizados cliente: ".$razon_social.", numero tributario: ".$n_tributario." dirección: "
									.$direccion_empresa.", país: ".$pais_empresa.", ciudad: ".$ciudad_empresa.", sigla país: ".$sigla_pais.", sigla empresa: ".$sigla_empresa.
									", sede: ".$tipo_sede.", giro: ".$giro_empresa;
			$tipo_historial = 2;

			//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_empresa (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $mi_id, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);
	
	
	
	

//proceso de actualización
	$actualizar = mysqli_prepare($connect,"UPDATE empresa SET id_vtiger = ?, numero_tributario = ?, nombre = ?, giro = ?, direccion = ?,
																				 ciudad = ?, sigla_empresa = ?, sigla_pais = ?, pais = ?, tipo_sede = ? WHERE id_empresa = ?");

	mysqli_stmt_bind_param($actualizar, 'isssssssssi', $registro_vtiger, $n_tributario, $razon_social, $giro_empresa, $direccion_empresa,
																										$ciudad_empresa, $sigla_empresa, $sigla_pais, $pais_empresa, $tipo_sede, $empresa);

	mysqli_stmt_execute($actualizar);

	if(mysqli_stmt_affected_rows($actualizar) > 0){
		$alerta = "<script>
							Swal.fire({
 							position: 'center',
 							icon: 'success',
  						title: 'El cliente {$razon_social} ha sido modificado!',
  						showConfirmButton: false,
  						timer: 1800
							})
							</script>";
		$smarty->assign("alerta",$alerta);		
	}else{
		$alerta = "<script>
							Swal.fire({
 							position: 'center',
 							icon: 'warning',
  						title: 'El cliente {$razon_social} <strong>NO!</strong> ha sido modificado!',
  						showConfirmButton: false,
  						timer: 1800
							})
							</script>";
		$smarty->assign("alerta",$alerta);
	}
	
}	


$consultando = mysqli_query($connect,"SELECT * FROM empresa WHERE id_empresa = $empresa");
	$empresa_array =array();

	while($fila = mysqli_fetch_array($consultando)){
		
		$empresa_array[] =$fila;
	}

	$smarty->assign('empresa_array',$empresa_array);
	$smarty->display("cliente/editar_cliente.tpl");

?>