<?php
  require('../../config.ini.php');
  
  $nombres  = $_POST['nombres'];
  $apellidos  = $_POST['apellidos'];
  $cargo  = $_POST['cargo'];
  $id_oculto  = $_POST['id_oculto'];


  $query_1 = mysqli_prepare($connect,"UPDATE informes_participante SET nombres = ?, apellido = ?, cargo = ? WHERE id_informe_participante = ?");
  mysqli_stmt_bind_param($query_1, 'sssi', $nombres, $apellidos, $cargo, $id_oculto);
  mysqli_stmt_execute($query_1);

  if($query_1){
    echo "Modificado";
  }else{
    echo "No";
  }

  mysqli_stmt_close($connect);
?>