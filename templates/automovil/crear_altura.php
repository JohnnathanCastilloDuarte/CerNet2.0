<?php 
include('../../config.ini.php');

$tipo = $_POST['tipo'];
$altura = $_POST['altura'];
$id_asignado_automovil = $_POST['id_asignado_automovil'];

$insertar = mysqli_prepare($connect,"INSERT INTO alturas_automovil (id_asignado, nombre, tipo) VALUES  (?,?,?)");
mysqli_stmt_bind_param($insertar,'iss',$id_asignado_automovil, $altura, $tipo);
mysqli_stmt_execute($insertar);

if($insertar){
  echo 1;
}else{
  echo 0;
}
mysqli_stmt_close($connect);

?>