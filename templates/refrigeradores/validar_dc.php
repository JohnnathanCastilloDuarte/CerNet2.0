<?php
error_reporting(0);
include('../../config.ini.php');

$id_mapeo = $_POST['id_mapeo'];
$no_hay = 0;

$validar = mysqli_prepare($connect,"SELECT id_refrigerador_sensor FROM refrigerador_sensor WHERE id_mapeo = ?");
mysqli_stmt_bind_param($validar, "i", $id_mapeo);
mysqli_stmt_execute($validar);
mysqli_stmt_store_result($validar);
mysqli_stmt_bind_result($validar, $id_refrigerador_sensor);

while($fila = mysqli_stmt_fetch($validar)){
  
  $consultar = mysqli_prepare($connect,"SELECT COUNT(id_refrigerador_sensor) FROM refrigerador_datos_crudos WHERE id_refrigerador_sensor = ?");
  mysqli_stmt_bind_param($consultar, "i", $id_refrigerador_sensor);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_dato);
  mysqli_stmt_fetch($consultar);
  if( $id_dato == 0){
    $no_hay = 0;
  }else{
  	$no_hay = 1;
  }
}

echo $no_hay;

mysqli_stmt_close($consultar);
?>