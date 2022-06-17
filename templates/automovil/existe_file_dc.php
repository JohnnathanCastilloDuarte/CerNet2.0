<?php 
include('../../config.ini.php');

$id = $_POST['id'];
$id_asignado_automovil = $_POST['id_asignado_automovil'];


$validar = mysqli_prepare($connect, "SELECT id_mapeo FROM automovil_sensor WHERE id_asignado = ? AND id_altura = ? LIMIT 1");
mysqli_stmt_bind_param($validar, 'ii', $id_asignado_automovil, $id);
mysqli_stmt_execute($validar);
mysqli_stmt_store_result($validar);
mysqli_stmt_bind_result($validar, $id_mapeo);
mysqli_stmt_fetch($validar);

$consultar = mysqli_prepare($connect,"SELECT  id FROM gestion_dc_automovil WHERE id_mapeo = ?");
mysqli_stmt_bind_param($consultar, 'i', $id_mapeo);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $id);
mysqli_stmt_fetch($consultar);

if(mysqli_stmt_num_rows($consultar) > 0){
  echo 1;
}else{
  echo 0;
}

mysqli_close($consultar);
?>