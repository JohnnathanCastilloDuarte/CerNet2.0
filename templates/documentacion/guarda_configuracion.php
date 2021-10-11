<?php 
error_reporting(0);
include('../../config.ini.php');

$nombre = $_POST['nombre']; 
$tipo = $_POST['tipo'];
$id_documentacion = $_POST['id_documentacion_d'];

$eliminar = mysqli_prepare($connect,"DELETE FROM archivos_documentacion WHERE id_documentacion = ?");
mysqli_stmt_bind_param($eliminar, 'i', $id_documentacion);
mysqli_stmt_execute($eliminar);

$query = mysqli_prepare($connect,"UPDATE documentacion SET nombre = ? , tipo = ? WHERE id = ?");
mysqli_stmt_bind_param($query, 'sii', $nombre, $tipo, $id_documentacion);
mysqli_stmt_execute($query);

if($query){
  echo 1;
}else{
  echo 0;
}
mysqli_stmt_close($query);
?>

