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
	  
$user = $_GET['user'];


//consultar usuario
$id_empresa = "";
$persona = mysqli_query($connect,"SELECT *,a.nombre as nombre_persona, c.nombre as nombre_cargo, d.departamento as nombre_departamento, a.estado as estado_persona 
FROM persona as a , usuario as b, cargo as c, departamento as d
WHERE a.id_usuario = b.id_usuario AND c.id_cargo = a.id_cargo AND d.id=c.id_departamento AND a.id_usuario = $user");
$array_persona=array();	
while($fila = mysqli_fetch_array($persona))
{
  $id_empresa = $fila['id_empresa'];
  $id_departamento = $fila['id_departamemnto'];
  $id_cargo = $fila['id_cargo'];
  $nombre_cargo = $fila['nombre_cargo'];
  $nombre_departamento = $fila['nombre_departamento'];
  $estado_persona = $fila['estado_persona'];
  $nombre_persona = $fila['nombre_persona'];
  $array_persona[]=$fila;
}
//consultar empresa 
$empresas = mysqli_query($connect, "SELECT * FROM empresa ORDER BY nombre ASC");
$array_empresa = array();
while($row = mysqli_fetch_array($empresas)){
    $array_empresa[] = $row;
}
//consultar la empresa
$nombre_empresa = array(); 
$empresa = mysqli_query($connect, "SELECT * FROM empresa WHERE id_empresa = $id_empresa");

  while($fila = mysqli_fetch_array($empresa)){
    $nombre_empresa[]=$fila;
  }

$smarty->assign("nombre_empresa",$nombre_empresa);
$smarty->assign("array_empresa",$array_empresa);
$smarty->assign("array_persona",$array_persona);
$smarty->assign("id_usuario",$user);
$smarty->display("usuario/editar_usuario.tpl");
 
?>