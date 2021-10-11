<?php
error_reporting(0);
include('../../../config.ini.php');

$doc = $_POST['doc'];

$array = array();

$consultar = mysqli_prepare($connect, "SELECT a.id_comentario, a.id_documento, a.fecha_comentario, a.comentario, b.usuario, a.id_persona FROM comentarios_documentacion as a,
                                      usuario as b WHERE a.id_documento = ? AND a.id_persona = b.id_usuario");

mysqli_stmt_bind_param($consultar, 'i', $doc);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $id_comentario, $id_documento, $fecha_comentario, $comentario, $usuario, $id_persona);
echo mysqli_stmt_error($consultar);

if(mysqli_stmt_num_rows($consultar) != 0){
  while($row = mysqli_stmt_fetch($consultar)){
      
    $array[] = array(
      'id_comentario'=>$id_comentario,
      'fecha_comentario'=>$fecha_comentario,
      'comentario'=>$comentario,
      'usuario'=>$usuario,
      'id_persona'=>$id_persona
    );  
  }
  
  $convert = json_encode($array);
  
  echo $convert;
}else{
  echo "No";
}

mysqli_stmt_close($connect);

?>