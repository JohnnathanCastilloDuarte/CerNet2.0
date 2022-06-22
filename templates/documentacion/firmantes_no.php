<?php
include('../../config.ini.php');

$id_documentacion = $_POST['id_documentacion'];
$json = array();


$query1 = mysqli_prepare($connect,"SELECT id_persona  FROM participante_documentacion  WHERE id_documentacion = ? AND id_persona NOT IN (SELECT id_usuario FROM firmantes_documentacion)");
mysqli_stmt_bind_param($query1, 'i', $id_documentacion);
mysqli_stmt_execute($query1);
mysqli_stmt_store_result($query1);
mysqli_stmt_bind_result($query1, $id_persona);

while($row = mysqli_stmt_fetch($query1)){
 
  $query2 = mysqli_prepare($connect,"SELECT b.id_usuario, b.nombre, b.apellido FROM persona as b WHERE b.id_usuario = ? ");
  mysqli_stmt_bind_param($query2, 'i', $id_persona);
  mysqli_stmt_execute($query2);
  mysqli_stmt_store_result($query2);
  mysqli_stmt_bind_result($query2, $id_usuario, $nombre, $apellido);
  while($row2 = mysqli_stmt_fetch($query2)){
    
    $json[] = array(
    'id_usuario'=>$id_usuario,
    'nombre'=>$nombre,
    'apellido'=>$apellido  
    );
    
  }
}
$convert = json_encode($json);

echo $convert;

mysqli_stmt_close($query1);

?>