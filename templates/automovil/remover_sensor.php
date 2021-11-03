<?php 
include('../../config.ini.php');

$id = $_POST['id'];


$validar = mysqli_prepare($connect,"SELECT b.id FROM automovil_sensor as a, gestion_dc_automovil as b WHERE a.id_sensor = ? AND a.id_mapeo = b.id_mapeo");
mysqli_stmt_bind_param($validar, 'i', $id);
mysqli_stmt_execute($validar);
mysqli_stmt_store_result($validar);
mysqli_stmt_bind_result($validar);

if(mysqli_stmt_num_rows($validar) > 0){
  echo 0;
}else{
  
  $eliminar = mysqli_prepare($connect,"DELETE FROM automovil_sensor WHERE id_automovil_sensor = ?");
  mysqli_stmt_bind_param($eliminar, 'i', $id);
  mysqli_stmt_execute($eliminar);
  
  if($eliminar){
    echo 1;
  }else{
    echo 0;
  }
}

mysqli_close($connect);
?>