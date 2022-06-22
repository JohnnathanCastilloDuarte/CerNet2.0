<?php 
include('../../config.ini.php');


  $nuevo_temp = $_POST['nuevo_temp'];
  $id_informe = $_POST['id_informe'];

  $query = mysqli_prepare($connect,"UPDATE informes_automovil SET n_increment = ? WHERE id_informe_automovil = ?");
  mysqli_stmt_bind_param($query, 'si', $nuevo_temp, $id_informe);
  mysqli_stmt_execute($query);

  if($query){
    echo 1;
  }else{
    echo 0;
  }


  mysqli_stmt_close($connect);
?>