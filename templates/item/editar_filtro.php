<?php

error_reporting(0);
include('../../config.ini.php');

$nombre_filtro = $_POST['nombre_filtro'];
$empresa_filtro = $_POST['empresa_filtro'];
$marca_filtro = $_POST['marca_filtro'];
$modelo_filtro = $_POST['modelo_filtro'];
$serie_filtro = $_POST['serie_filtro'];
$cantidad_filtros_filtro = $_POST['cantidad_filtros_filtro'];
$ubicacion_filtro = $_POST['ubicacion_filtro'];
$ubicado_en_filtro = $_POST['ubicado_en_filtro'];
$lugar_filtro = $_POST['lugar_filtro'];
$tipo_filtro = $_POST['tipo_filtro'];
$penetracion_filtro = $_POST['penetracion_filtro'];
$id_tipo_filtro = $_POST['id_tipo_filtro'];
$id_usuario = $_POST['id_valida_filtro'];
$id_item = $_POST['id_item_filtro'];
$id_filtro = $_POST['id_filtro'];


$tipo  = substr($nombre_filtro, -3);
//$nombre_filtro = substr($nombre_filtro, 0, -3);


////// ACTUALIZAR ITEM
$actualizar_item = mysqli_prepare($connect,'UPDATE item SET id_empresa = ?, nombre = ? WHERE id_item = ?');
mysqli_stmt_bind_param($actualizar_item, 'isi', $empresa_filtro, $nombre_filtro, $id_item);
mysqli_stmt_execute($actualizar_item);

/////// ACTUALIZAR FILTRO 
$actualiza_filtro = mysqli_prepare($connect,"UPDATE item_filtro SET 
	marca = ?, 
	modelo = ?, 
	serie = ?, 
	cantidad_filtro = ?, 
	ubicacion = ?, 
	ubicado_en = ?, 
	filtro_dimension = ?, 
	tipo_filtro = ?, 
	lugar_filtro = ?, 
	limite_penetracion = ? 
	WHERE id_filtro = ?");

mysqli_stmt_bind_param($actualiza_filtro, 'sssisssssii', 
	$marca_filtro, 
	$modelo_filtro, 
	$serie_filtro, 
	$cantidad_filtros_filtro, 
	$ubicacion_filtro,
	$ubicado_en_filtro, 
	$tipo_filtro, 
	$tipo, 
	$lugar_filtro, 
	$penetracion_filtro,
	$id_filtro);


mysqli_stmt_execute($actualiza_filtro);

if($actualiza_filtro){
	echo "Si";
}else{
	echo "No";
}

mysqli_stmt_close($connect);

?>