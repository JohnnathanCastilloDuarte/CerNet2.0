<?php 
error_reporting(0);
include('../../config.ini.php');

$nombre = $_POST['nombre']; 
$tipo = $_POST['tipo'];
$id_documentacion = $_POST['id_documentacion_d'];

$query = mysqli_prepare($connect,"UPDATE documentacion SET nombre = ? , tipo = ?, estado = 2 WHERE id = ?");
mysqli_stmt_bind_param($query, 'sii', $nombre, $tipo, $id_documentacion);
mysqli_stmt_execute($query);

if($query){

  $query_2 = mysqli_prepare($connect,"SELECT estructura FROM documentacion WHERE id = ?");
  mysqli_stmt_bind_param($query_2, 'i', $id_documentacion);
  mysqli_stmt_execute($query_2);
  mysqli_stmt_store_result($query_2);
  mysqli_stmt_bind_param($query_2, $estructura);
  mysqli_stmt_fetch($query_2);

  if($estructura == 1){
    echo 1;
  }else{
    echo 2;
  }

}else{
  echo 0;
}
mysqli_stmt_close($query);
?>

