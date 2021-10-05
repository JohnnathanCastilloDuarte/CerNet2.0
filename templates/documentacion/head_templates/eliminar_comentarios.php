<?php 
include('../../../config.ini.php');

$id = $_POST['id'];

$eliminar = mysqli_prepare($connect, "DELETE FROM comentarios_documentacion WHERE id_comentario = ?");
mysqli_stmt_bind_param($eliminar, 'i', $id);
mysqli_stmt_execute($eliminar);
if($eliminar){
  echo "Si";
}else{
  echo "No";
}

mysqli_stmt_close($eliminar);
?>