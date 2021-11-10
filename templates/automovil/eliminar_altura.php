<?php
include('../../config.ini.php');

$id_altura = $_POST['id_altura'];

$eliminar = mysqli_prepare($connect,"DELETE FROM  alturas_automovil WHERE id = ?");
mysqli_stmt_bind_param($eliminar, 'i', $id_altura);
mysqli_stmt_execute($eliminar);

if($eliminar){
  echo 1;
}else{
  echo 0;
}

mysqli_close($connect);
?>
