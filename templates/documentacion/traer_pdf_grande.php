<?php 
error_reporting(0);
include('../../config.ini.php');

$id_documentacion = $_POST['id_documentacion_d'];

$query = mysqli_prepare($connect,"SELECT url FROM archivos_documentacion WHERE id_documentacion = ?");
mysqli_stmt_bind_param($query, 'i', $id_documentacion);
mysqli_stmt_execute($query);
mysqli_stmt_store_result($query);
mysqli_stmt_bind_result($query, $url);

mysqli_stmt_fetch($query);

if(count($url) != 0){
  echo "templates/documentacion/".$url;
}else{
  echo "No";
}



mysqli_stmt_close($connect);
?>