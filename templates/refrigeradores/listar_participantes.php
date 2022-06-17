<?php
error_reporting(0);
 require('../../config.ini.php');

  $id_asignado = $_POST['id_asignado'];

  $query_0 = mysqli_prepare($connect,"SELECT id_servicio FROM item_asignado WHERE id_asignado = ?");
  mysqli_stmt_bind_param($query_0, 'i', $id_asignado);
  mysqli_stmt_execute($query_0);
  mysqli_stmt_store_result($query_0);
  mysqli_stmt_bind_result($query_0, $id_servicio);
  mysqli_stmt_fetch($query_0);
  


  $query_0_1 = mysqli_prepare($connect,"SELECT id_numot FROM servicio WHERE id_servicio = ?");
  mysqli_stmt_bind_param($query_0_1, 'i', $id_servicio);
  mysqli_stmt_execute($query_0_1);
  mysqli_stmt_store_result($query_0_1);
  mysqli_stmt_bind_result($query_0_1, $id_numot);
  mysqli_stmt_fetch($query_0_1);
  

  
  $query_1 = mysqli_prepare($connect,"SELECT id_informe_participante, nombres, apellido, cargo  FROM informes_participante WHERE id_numot = ?");
  mysqli_stmt_bind_param($query_1, 'i', $id_numot);
  mysqli_stmt_execute($query_1);
  mysqli_stmt_store_result($query_1);
  mysqli_stmt_bind_result($query_1, $id_informe_participante, $nombres, $apellidos, $cargo);
 

  $json = array();


  while($row = mysqli_stmt_fetch($query_1)){
    
    $json[] = array(
      'id_informe_participante'=>$id_informe_participante,
      'nombres'=>$nombres,
      'apellidos'=>$apellidos,
      'cargo'=>$cargo
    );    
  }

  $convert = json_encode($json);
  
  echo $convert;

  mysqli_stmt_close($connect);
?>