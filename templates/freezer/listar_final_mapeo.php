<?php 

include("../../config.ini.php");

$id_bandeja = $_POST['id_bandeja'];
$id_mapeo = $_POST['id_mapeo_freezer'];
$id_asignado = $_POST['id_asignado_freezer'];


$listar = mysqli_prepare($connect,"SELECT a.id_freezer_sensor, a.datos_crudos, a.id_sensor,  a.fecha_registro, b.nombre, c.nombre, a.posicion FROM freezer_sensor as a, sensores as b , bandeja as c
	WHERE a.id_mapeo = ? AND a.id_asignado = ? AND a.id_sensor = b.id_sensor AND a.id_bandeja = ? AND a.id_bandeja = c.id_bandeja");

mysqli_stmt_bind_param($listar, 'iii', $id_mapeo, $id_asignado, $id_bandeja);
mysqli_stmt_execute($listar);
mysqli_stmt_store_result($listar);
mysqli_stmt_bind_result($listar, $id_freezer_sensor,$datos_crudos, $id_sensor, $fecha_registro, $nombre_sensor, $nombre_bandeja, $posicion);


$json = array();

while($row = mysqli_stmt_fetch($listar)){

	$json[]=array(
		'id_freezer_sensor'=>$id_freezer_sensor,
		'id_sensor'=>$id_sensor,
		'fecha_registro'=>$fecha_registro,
		'nombre_sensor'=>$nombre_sensor,
		'nombre_bandeja'=>$nombre_bandeja,
		'posicion' => $posicion,
		'datos_crudos'=>$datos_crudos
	);

}

$convert = json_encode($json);

echo $convert;


mysqli_stmt_close($connect);

?>