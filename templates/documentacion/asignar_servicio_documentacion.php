<?php 

  include("../../config.ini.php");

  $id_numot = $_POST['id_numot'];
  $id_valida_usuario = $_POST['id_valida_usuario'];
  
  
  $creando = mysqli_prepare($connect, "INSERT INTO documentacion (id_numot, id_usuario) VALUES (?,?)");
  mysqli_stmt_bind_param($creando, 'ii', $id_numot, $id_valida_usuario);
  mysqli_stmt_execute($creando);
  echo mysqli_stmt_error($creando); 

  if($creando){
    echo "Si";
  }

  mysqli_stmt_close($connect);
?>