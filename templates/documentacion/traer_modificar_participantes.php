<?php 
include("../../config.ini.php");

$id_participante = $_POST['id_participante'];


  $json = array();
  
  $consultar = mysqli_prepare($connect,"SELECT b.id_persona, b.nombre, b.apellido, b.email, a.rol, b.cargo FROM participante_documentacion as a, persona as b WHERE a.id= ?  AND a.id_persona = b.id_usuario");
  mysqli_stmt_bind_param($consultar, 'i', $id_participante);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_persona, $nombres, $apellidos, $email, $rol, $cargo);
  
  while($row = mysqli_stmt_fetch($consultar)){
    $json[] = array(
      'id_persona'=>$id_persona,
      'nombres'=>$nombres,
      'apellidos'=>$apellidos,
      'email'=>$email,
      'rol'=>$rol,
      'cargo'=>$cargo
    );
  }
  
  $convert = json_encode($json[0]);
  echo $convert;

mysqli_stmt_close($connect);
?>