<?php 
include("../../config.ini.php");

$id_item_aire = $_POST['id_item_aire'];

$eliminar_item_asignado = mysqli_prepare($connect, "DELETE FROM item_aire_comprimido WHERE id_aire_comprimido = ?");
mysqli_stmt_bind_param($eliminar_item_asignado, 'i', $id_item_aire);
mysqli_stmt_execute($eliminar_item_asignado);

if ($eliminar_item_asignado) {
	echo "si";
}else{
	echo "no- DELETE item_aire_comprimido WHERE id_aire_comprimido = $id_item_aire";
}


 ?>