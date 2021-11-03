<?php
include('../../config.ini.php');

$consultar = mysqli_prepare($connect,"SELECT id_persona, nombre, apellido FROM persona ORDER BY nombre ASC");
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $id_persona, $nombre, $apellido);

$json = array();

while($row = mysqli_stmt_fetch($consultar)){
  
  $json[] = array(
    'id_persona'=>$id_persona,
    'nombre'=>$nombre,
    'apellido'=>$apellido 
  );
}

$convert = json_encode($json);

echo $convert;

mysqli_close($connect);
?>