<?php 
include('../../config.ini.php');

$id_altura = $_POST['id_altura'];
$altura = $_POST['altura'];
$tipo_altura = $_POST['tipo_altura'];
$id_asignado_automovil = $_POST['id_asignado_automovil'];


$update = mysqli_prepare($connect,"UPDATE alturas_automovil SET nombre = ? , tipo = ? WHERE id = ? AND id_asignado = ?");
mysqli_stmt_bind_param($update, 'ssii', $altura, $tipo_altura, $id_altura, $id_asignado_automovil);
mysqli_stmt_execute($update);

if($update){
  echo 1;
}else{
  echo 0;
}
mysqli_close($connect);
?>