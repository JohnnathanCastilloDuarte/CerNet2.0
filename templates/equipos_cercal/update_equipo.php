<?php 
 //RECUPER EL DATO DE LA URL	
include("../../config.ini.php");


$array_equipos = array();
if (isset($_GET['equipo'])) {

	$id_equipo = $_GET['equipo'];
	
//CONSULTO LA INFORMACIÓN DEL EQUIPO
$equipo = mysqli_prepare($connect,"SELECT id_equipo_cercal, nombre_equipo, marca_equipo, n_serie_equipo, modelo_equipo, tipo_medicion
	FROM equipos_cercal 
	WHERE id_equipo_cercal = $id_equipo");
   mysqli_stmt_execute($equipo);
   mysqli_stmt_store_result($equipo);
   mysqli_stmt_bind_result($equipo, $id_equipo_cercal, $nombre_equipo, $marca_equipo, $n_serie_equipo, $modelo_equipo, $tipo_medicion);

while($row = mysqli_stmt_fetch($equipo)){

     	$array_equipos[] = array(
     		'id_equipo_cercal'=>$id_equipo_cercal,
			'nombre_equipo'=> $nombre_equipo,
			'marca_equipo'=> $marca_equipo,
			'n_serie_equipo'=> $n_serie_equipo,
			'modelo_equipo'=> $modelo_equipo,
			'tipo_medicion'=> $tipo_medicion  
	);

	$smarty->assign("array_equipos",$array_equipos);	
 }
}else{
		
	$array_equipos[] = array(
		'id_equipo_cercal'=>$id_equipo_cercal,
			'nombre_equipo'=> '',
			'marca_equipo'=> '',
			'n_serie_equipo'=> '',
			'modelo_equipo'=> '',
			'tipo_medicion'=> ''  
	);

	$smarty->assign("array_equipos",$array_equipos);
}

$smarty->display("equipos_cercal/update_equipo.tpl");

//ENCRIPTACION Y ENVIO DE LOS DATOS PARA GENERAR UN PDF
//$convert = json_encode($array_equipos);   
//$conv = base64_encode($convert);




?>