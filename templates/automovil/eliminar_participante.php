<?php

include('../../config.ini.php');

$id = $_POST['id'];

$eliminar = mysqli_prepare($connect,"DELETE FROM informes_participante WHERE id_informe_participante = ?");
mysqli_stmt_bind_param($eliminar, 'i', $id);
mysqli_stmt_execute($eliminar);

if($eliminar){
  echo 1;
}else{
  echo 0;
}

mysqli_close($connect);
?>