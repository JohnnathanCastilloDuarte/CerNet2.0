<?php 
include("../../config.ini.php");


$id_empresa = $_POST['id_empresa'];
$nombre_aire_comprimido = $_POST['nombre_aire_comprimido'];
$nombre_sala = $_POST['nombre_sala'];
$area = $_POST['area'];
$punto_aire_comprimido = $_POST['punto_aire_comprimido'];
$codigo_punto = $_POST['codigo_punto'];
$grado_iso = $_POST['grado_iso'];
$direccion_aire_comprimido = $_POST['direccion_aire_comprimido'];
$id_aire_comprimido = $_POST['id_aire_comprimido'];
$id_item = $_POST['id_item'];



$actualizar = mysqli_prepare($connect, "UPDATE item SET nombre = ? , id_empresa = ? WHERE id_item = ?");

mysqli_stmt_bind_param($actualizar, 'sii', $nombre_aire_comprimido, $id_empresa, $id_item);
mysqli_stmt_execute($actualizar);

if ($actualizar) {
	
	$actualizar_aire_comprimido = mysqli_prepare($connect, "UPDATE item_aire_comprimido SET nombre_sala = ? , direccion = ?, area = ?, punto_uso_aire_comprimido = ?, codigo_punto = ?, grado_iso = ? WHERE id_aire_comprimido = ?");
	mysqli_stmt_bind_param($actualizar_aire_comprimido, 'ssssssi', $nombre_sala, $direccion_aire_comprimido, $area, $punto_aire_comprimido, $codigo_punto, $grado_iso, $id_aire_comprimido);
	mysqli_stmt_execute($actualizar_aire_comprimido);

	if ($actualizar_aire_comprimido) {
		echo "si";
	}else{
		echo "no";
	}
}

mysqli_stmt_close($connect);	

 ?>