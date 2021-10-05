<?php
 require('../../config.ini.php');

  $id_participante = $_POST['id_participante'];


  $query_eliminar = mysqli_prepare($connect,"DELETE FROM informes_participante WHERE id_informe_participante = ?");
  mysqli_stmt_bind_param($query_eliminar, 'i', $id_participante);
  mysqli_stmt_execute($query_eliminar);


  if($query_eliminar){
    echo "Si";
  }else{
    echo "No";
  }

  mysqli_stmt_close($connect);
?>