<?php
include('../../config.ini.php');

$correlativo = $_POST['correlativo'];
$id_asignado_automovil = $_POST['id_asignado_automovil'];

$update = mysqli_prepare($connect,"UPDATE item_asignado SET correlativo = ? WHERE id_asignado = ?");
mysqli_stmt_bind_param($update, 'si', $correlativo, $id_asignado_automovil);
mysqli_stmt_execute($update);


if($update){
  echo 1;
}else{
  echo 0;
}

mysqli_close($connect);
?>