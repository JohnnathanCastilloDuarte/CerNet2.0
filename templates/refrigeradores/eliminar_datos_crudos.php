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
  
  $consultar = mysqli_prepare($connect,"SELECT id_dato_crudo FROM refrigerador_datos_crudos WHERE id_refrigerador_sensor = ?");
  mysqli_stmt_bind_param($consultar, "i", $id_refrigerador_sensor);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_dato);
  
    while($f = mysqli_stmt_fetch($consultar) ){
     $eliminando = mysqli_prepare($connect,"DELETE FROM refrigerador_datos_crudos WHERE id_dato_crudo = ?");
     mysqli_stmt_bind_param($eliminando, "i", $id_dato);
     mysqli_stmt_execute($eliminando);
    }
}

  $borrando_ar = mysqli_prepare($connect,"SELECT url, id FROM archivo_dc_refrigerador WHERE id_mapeo = ?");
  mysqli_stmt_bind_param($borrando_ar, "i", $id_mapeo);
  mysqli_stmt_execute($borrando_ar);
  mysqli_stmt_store_result($borrando_ar);
  mysqli_stmt_bind_result($borrando_ar, $url, $id);

  while($fila = mysqli_stmt_fetch($borrando_ar)){
    
      $fh = fopen($url, '2');
      unlink($url);
    
    
      $eliminando = mysqli_prepare($connect,"DELETE FROM archivo_dc_refrigerador WHERE id= ?");
      mysqli_stmt_bind_param($eliminando, "i", $id);
      mysqli_stmt_execute($eliminando);
  }
echo "Listo";


mysqli_stmt_close($consultar);
?>