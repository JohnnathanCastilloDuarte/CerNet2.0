<?php 
  require('config.ini.php');

  $query_1 = mysqli_prepare($connect,"SELECT id_usuario, nombre, apellido FROM persona WHERE id_empresa = 1 ");
  mysqli_stmt_execute($query_1);
  mysqli_stmt_store_result($query_1);
  mysqli_stmt_bind_result($query_1, $id_usuario, $nombres, $apellidos);
  
  $json = array();

  while($row = mysqli_stmt_fetch($query_1)){
     
    $json[] = array(
      'id_usuario'=>$id_usuario,
      'nombres'=>$nombres,
      'apellidos'=>$apellidos
    );
  }

  $convert = json_encode($json);

  echo $convert;
?>