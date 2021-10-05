<?php 
include('../../config.ini.php');

$url = $_POST['url'];
$resultado = str_replace('templates/documentacion/', '',$url);
unlink($resultado);

if (!file_exists($resultado)) {
   $consultar = mysqli_prepare($connect,"SELECT id FROM archivos_documentacion WHERE url = ?");
  mysqli_stmt_bind_param($consultar, 's', $url);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_eliminar);
  mysqli_stmt_fetch($consultar);

  if(count($id_eliminar) > 0){
    $eliminar = mysqli_prepare($connect, "DELETE FROM archivos_documentacion WHERE id = ?");
    mysqli_stmt_bind_param($eliminar, 'i', $id_eliminar);
    mysqli_stmt_execute($eliminar);

    if($eliminar){
      echo "Eliminado";
    }
 
  }
}


mysqli_stmt_close();
?>