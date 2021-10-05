<?php 
include('../../config.ini.php');

$id_valida_usuario = $_POST['id_valida_usuario'];

$consultar_rol = mysqli_prepare($connect,"SELECT id_rol FROM usuario WHERE id_usuario = ?");
mysqli_stmt_bind_param($consultar_rol, 'i', $id_valida_usuario);
mysqli_stmt_execute($consultar_rol);
mysqli_stmt_store_result($consultar_rol);
mysqli_stmt_bind_result($consultar_rol, $rol);
mysqli_stmt_fetch($consultar_rol);


if($rol == 1){
  echo "Si";
}else if($rol == 3){
  echo "Si";
}else{
  echo "No";
}

?>