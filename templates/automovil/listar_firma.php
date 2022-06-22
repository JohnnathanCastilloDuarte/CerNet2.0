
<?php 
  require('../../config.ini.php');
  $id_asignado = $_POST['id_asignado_automovil'];
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


  $query_3 = mysqli_prepare($connect,"SELECT a.nombre, a.apellido FROM persona as a, numot as b WHERE a.id_persona = b.id_usuario_firma AND b.id_numot = ? ");
  mysqli_stmt_bind_param($query_3, 'i',$id_numot);
  mysqli_stmt_execute($query_3);
  mysqli_stmt_store_result($query_3);
  mysqli_stmt_bind_result($query_3, $nombres, $apellidos);
  

  while($row = mysqli_stmt_fetch($query_3)){
    $json[] = array(
    'nombres'=>$nombres,
    'apellidos'=>$apellidos  
    );
  }
  
  $convert = json_encode($json);
  echo $convert;

  mysqli_stmt_close($connect);
?>