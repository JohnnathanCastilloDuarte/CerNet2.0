<?php 
  require('config.ini.php');

  $query_1 = mysqli_prepare($connect,"SELECT a.id_usuario, a.nombre, a.apellido
                                      FROM persona a, cargo b 
                                      WHERE a.id_cargo = b.id_cargo AND (b.nombre = 'Head' OR b.nombre = 'Chief Operating Officer') ");
  mysqli_stmt_execute($query_1);
  mysqli_stmt_store_result($query_1);
  mysqli_stmt_bind_result($query_1, $id_usuario, $nombres, $apellidos);
  
  $json = array();

  while($row = mysqli_stmt_fetch($query_1)){
     
    $json[] = array(
      'id_usuario'=>$id_usuario,
      'nombres'=>$nombres,
      'apellidos'=>$apellidos,

    );
  }

  $convert = json_encode($json);

  echo $convert;
?>