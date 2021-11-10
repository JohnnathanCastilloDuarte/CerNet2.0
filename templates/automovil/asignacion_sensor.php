<?php
include('../../config.ini.php');

$id_sensor =$_POST['id_sensor'];
$parametro =$_POST['parametro'];
$id_mapeo =$_POST['id_mapeo'];
$id_altura =$_POST['id_altura'];
$id_asignado_automovil =$_POST['id_asignado_automovil'];
$id_usuario = $_POST['id_valida_automovil'];



$validar = mysqli_prepare($connect,"SELECT id_automovil_sensor FROM automovil_sensor WHERE id_sensor = ? AND id_asignado = ?");
mysqli_stmt_bind_param($validar, 'ii',$id_sensor, $id_asignado_automovil);
mysqli_stmt_execute($validar);
mysqli_stmt_store_result($validar);
mysqli_stmt_bind_result($validar, $f);
mysqli_stmt_fetch($validar);

if(mysqli_stmt_num_rows($validar) > 0){
  echo 0;
}else{

  $insertando = mysqli_prepare($connect,"INSERT INTO automovil_sensor (id_asignado, id_altura, id_sensor, id_mapeo, id_usuario) VALUES (?,?,?,?,?)");
  mysqli_stmt_bind_param($insertando, 'iiiii', $id_asignado_automovil, $id_altura, $id_sensor, $id_mapeo, $id_usuario);
  mysqli_stmt_execute($insertando);
  echo mysqli_stmt_error($insertando);
  
  if($insertando){
    echo 1;
  }else{
    echo 0;
  }
}
mysqli_close($connect);
?>