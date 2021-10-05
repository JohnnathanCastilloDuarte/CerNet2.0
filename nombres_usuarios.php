<?php 

  include("config.ini.php");  

  $usuario_actual = $_POST['usuario_actual'];
   

  $primer_filtro = mysqli_prepare($connect,"SELECT id_persona FROM persona WHERE id_usuario = ?");
  mysqli_stmt_bind_param($primer_filtro, 'i', $usuario_actual);
  mysqli_stmt_execute($primer_filtro);
  mysqli_stmt_store_result($primer_filtro);
  mysqli_stmt_bind_result($primer_filtro, $id_persona);
  mysqli_stmt_fetch($primer_filtro);

  
  if(mysqli_stmt_num_rows($primer_filtro) > 0){
      echo "Si";
  }else{
    echo "No";
  }

?>