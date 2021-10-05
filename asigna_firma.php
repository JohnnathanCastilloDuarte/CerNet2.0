<?php 
  require('config.ini.php');

  $id_usuario = $_POST['id_usuario'];
  $id_asignado = $_POST['id_asignado'];
  $json = array();



  $query_1 = mysqli_prepare($connect,"SELECT id_servicio FROM item_asignado WHERE id_asignado = ?");
  mysqli_stmt_bind_param($query_1, 'i', $id_asignado);
  mysqli_stmt_execute($query_1);
  mysqli_stmt_store_result($query_1);
  mysqli_stmt_bind_result($query_1, $id_servicio);
  mysqli_stmt_fetch($query_1);

  $query_2 = mysqli_prepare($connect,"SELECT id_numot FROM servicio WHERE id_servicio = ?");
  mysqli_stmt_bind_param($query_2, 'i', $id_servicio);
  mysqli_stmt_execute($query_2);
  mysqli_stmt_store_result($query_2);
  mysqli_stmt_bind_result($query_2, $id_numot);
  mysqli_stmt_fetch($query_2);

  $query_3 = mysqli_prepare($connect,"UPDATE numot SET id_usuario_firma = ? WHERE id_numot = ?");
  mysqli_stmt_bind_param($query_3, 'ii', $id_usuario, $id_numot);
  mysqli_stmt_execute($query_3);
  
  if($query_3){
    echo "Actualizado";
  }
   



?>