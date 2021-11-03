<?php
include('../../config.ini.php');

$id_asignado_automovil = $_POST['id_asignado_automovil'];

$contar = mysqli_prepare($connect,"SELECT id FROM alturas_automovil WHERE id_asignado = ?");
mysqli_stmt_bind_param($contar, 'i', $id_asignado_automovil);
mysqli_stmt_execute($contar);
mysqli_stmt_store_result($contar);
mysqli_stmt_bind_result($contar, $id);
mysqli_stmt_fetch($contar);

if(mysqli_stmt_num_rows($contar) > 0){
  echo mysqli_stmt_num_rows($contar);
}else{
  echo mysqli_stmt_num_rows($contar);
}
mysqli_close($connect);
?>