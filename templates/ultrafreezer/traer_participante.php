<?php
 require('../../config.ini.php');
    
  $id_participante = $_POST['id_participante'];
  $json = array();

  $query_1 = mysqli_prepare($connect,"SELECT nombres, apellido, cargo, id_numot FROM informes_participante WHERE id_informe_participante = ?");
  mysqli_stmt_bind_param($query_1, 'i', $id_participante);
  mysqli_stmt_execute($query_1);
  mysqli_stmt_store_result($query_1);
  mysqli_stmt_bind_result($query_1, $nombres, $apellidos, $cargo, $id_numot);

  while($row = mysqli_stmt_fetch($query_1)){
    
    $json[]=array(
     'id_participante_oculto'=>$id_participante,
     'nombres'=>$nombres,
     'apellidos'=>$apellidos,
     'cargo'=>$cargo,
     'id_numot'=>$id_numot 
    );
  }

  $convert = json_encode($json[0]);

  echo $convert;
  
  mysqli_stmt_close($connect);
?>