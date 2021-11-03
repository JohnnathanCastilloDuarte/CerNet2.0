<?php 
include('../../config.ini.php');

$id_asignado_automovil = $_POST['id_asignado_automovil'];

$consultar1 = mysqli_prepare($connect, "SELECT id_mapeo FROM automovil_mapeo WHERE id_asignado = ?");
mysqli_stmt_bind_param($consultar1,'i', $id_asignado_automovil);
mysqli_stmt_execute($consultar1);
mysqli_stmt_store_result($consultar1);
mysqli_stmt_bind_result($consultar1, $id_mapeo);

$comparador1 = mysqli_stmt_num_rows($consultar1);


$consultar = mysqli_prepare($connect,"SELECT nombre FROM informes_automovil WHERE id_asignado = ?");
mysqli_stmt_bind_param($consultar, 'i', $id_asignado_automovil);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $nombre);
mysqli_stmt_fetch($consultar);

$comparador2 =  mysqli_stmt_num_rows($consultar);


if($comparador1 == $comparador2){
  echo 0;
}else{
  echo 1;
}

mysqli_close($consultar);
?>