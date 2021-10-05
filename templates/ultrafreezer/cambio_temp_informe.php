<?php 
  include('../../config.ini.php');

  $cambio_a = $_POST['cambio_a'];
  $id_informe = $_POST['id_informe'];

  $actualizar = mysqli_prepare($connect,"UPDATE  informe_ultrafreezer SET n_increment  = ? WHERE id_informe_ultrafreezer = ?");
  mysqli_stmt_bind_param($actualizar, 'si', $cambio_a, $id_informe);
  mysqli_stmt_execute($actualizar);

  if($actualizar){
    echo "Si";
  }else{
    echo "No";
  }
?>