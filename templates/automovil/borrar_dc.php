<?php 
include('../../config.ini.php');

$altura = $_POST['altura'];
$id_asignado = $_POST['id_asignado'];
$eliminator = 0;
$contador = 0;


$obtener = mysqli_prepare($connect,"SELECT id_automovil_sensor, id_mapeo FROM automovil_sensor WHERE id_altura = ? AND id_asignado = ?");
mysqli_stmt_bind_param($obtener, 'ii', $altura, $id_asignado);
mysqli_stmt_execute($obtener);
mysqli_stmt_store_result($obtener);
mysqli_stmt_bind_result($obtener, $id_automovil_sensor, $id_mapeo);

while($row = mysqli_stmt_fetch($obtener)){
 
  if($contador == 0){
    $eliminar_archivo = mysqli_prepare($connect,"SELECT id FROM gestion_dc_automovil WHERE id_mapeo = ?");
    mysqli_stmt_bind_param($eliminar_archivo, 'i', $id_mapeo);
    mysqli_stmt_execute($eliminar_archivo);
    mysqli_stmt_store_result($eliminar_archivo);
    mysqli_stmt_bind_result($eliminar_archivo, $id_archivo);

    while($pre_row = mysqli_stmt_fetch($eliminar_archivo)){

      $eliminar_definitivo = mysqli_prepare($connect,"DELETE FROM gestion_dc_automovil WHERE id = ?");
      mysqli_stmt_bind_param($eliminar_definitivo, 'i', $id_archivo);
      mysqli_stmt_execute($eliminar_definitivo);
    }
  }
  
  
  $pre_eliminar = mysqli_prepare($connect,"SELECT id_dato_crudo FROM automovil_datos_crudos WHERE id_automovil_sensor = ?");
  mysqli_stmt_bind_param($pre_eliminar, 'i', $id_automovil_sensor);
  mysqli_stmt_execute($pre_eliminar);
  mysqli_stmt_store_result($pre_eliminar);
  mysqli_stmt_bind_result($pre_eliminar, $id_dato_crudo);
  
  while($row2 = mysqli_stmt_fetch($pre_eliminar)){
     
    $eliminar = mysqli_prepare($connect, "DELETE FROM automovil_datos_crudos WHERE id_dato_crudo = ?");
    mysqli_stmt_bind_param($eliminar, 'i', $id_dato_crudo);
    mysqli_stmt_execute($eliminar);
    
    if($eliminar){
      $eliminator++;
    }
  } 
  
  $contador++;
}

if($eliminator > 0){
  echo 1;
}else{
  echo 0;
}
mysqli_close($connect);
?>