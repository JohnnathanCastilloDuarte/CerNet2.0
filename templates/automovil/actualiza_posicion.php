<?php 
include('../../config.ini.php');

$id = $_POST['id'];
$valor = $_POST['valor'];
$update = mysqli_prepare($connect,"UPDATE automovil_sensor SET posicion = ? WHERE id_automovil_sensor = ?");
mysqli_stmt_bind_param($update, 'ii', $valor, $id );
mysqli_stmt_execute($update);

if($update){
  echo 1;
}else{
  echo 0;
}

mysqli_close($connect);

?>