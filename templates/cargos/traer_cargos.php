<?php
error_reporting(0);
include("../../config.ini.php");

$id_empresa = 1;
$array = array();

$consultar = mysqli_prepare($connect,"SELECT a.id_usuario, a.usuario FROM usuario as a, persona as b  WHERE a.id_usuario = b.id_usuario AND b.id_empresa = ?");
mysqli_stmt_bind_param($consultar , 'i', $id_empresa);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $id_usuario, $usuario);

while($row = mysqli_stmt_fetch($consultar)){
  
  $array[] = array(
    'id_usuario'=>$id_usuario,
    'usuario'=>$usuario
  
  );
}

$convert = json_encode($array);

echo $convert;

mysqli_stmt_close($connect);
?>