<?php 
include('../../config.ini.php');

$id_documentacion = $_POST['id_documentacion_d'];


$query = mysqli_prepare($connect,"SELECT nombre, tipo FROM documentacion WHERE id = ?");
mysqli_stmt_bind_param($query, 'i', $id_documentacion);
mysqli_stmt_execute($query);
mysqli_stmt_store_result($query);
mysqli_stmt_bind_result($query, $nombre, $tipo);

$json = array();

while($row = mysqli_stmt_fetch($query)){
  
  $json[] = array(
    'nombre'=>$nombre,
    'tipo'=>$tipo
  );
}

$convert = json_encode($json);

echo $convert;

mysqli_stmt_close($connect);
?>