<?php
  error_reporting(0);
  include('../../config.ini.php');

  $id_freezer_sensor = $_POST['id_freezer_sensor'];
  $posicion = $_POST['posicion'];

  $update = mysqli_prepare($connect,"UPDATE freezer_sensor SET posicion = ? WHERE id_freezer_sensor = ?");
  mysqli_stmt_bind_param($update, 'ii', $posicion, $id_freezer_sensor);

  mysqli_stmt_execute($update);

  if($update){
    echo 1;
  }else{
    echo 0;
  }

mysqli_close($update);
?>