<?php
  include('../../config.ini.php');

  $id_refrigerador_sensor = $_POST['id_refrigerador_sensor'];
  $posicion = $_POST['posicion'];

  $update = mysqli_prepare($connect,"UPDATE refrigerador_sensor SET posicion = ? WHERE id_refrigerador_sensor = ?");
  mysqli_stmt_bind_param($update, 'ii', $posicion, $id_refrigerador_sensor);

  mysqli_stmt_execute($update);

  if($update){
    echo 1;
  }else{
    echo 0;
  }

mysqli_close($update);
?>