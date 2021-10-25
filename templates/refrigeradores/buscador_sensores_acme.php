<?php 

  error_reporting(0);
  include("../../config.ini.php");

  $tecleado = $_POST['tecleado'];
  $buscar = mysqli_prepare($connect,"SELECT id_sensor, nombre, tipo FROM sensores WHERE nombre LIKE CONCAT('%',?,'%') AND estado = 'Vigente' ORDER BY id_sensor ASC");
  mysqli_stmt_bind_param($buscar, 's', $tecleado);
  mysqli_stmt_execute($buscar);
  mysqli_stmt_store_result($buscar);
  mysqli_stmt_bind_result($buscar, $id_sensor, $nombre, $tipo);
  
  $json = array();

   while($row = mysqli_stmt_fetch($buscar)){
     
      $json[] = array(
        'id_sensor'=>$id_sensor,
        'nombre'=>$nombre,
        'tipo'=>$tipo
      
      );
   }

  $convert = json_encode($json);

  echo $convert;


  mysqli_close($connect);

?>