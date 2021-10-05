<?php
include("../../config.ini.php");

$id_documentacion = $_POST['id_documentacion_d'];
$dataURL = $_POST['dataURL'];
$name_page = "pagina";

  
$consultar = mysqli_prepare($connect,"SELECT pagina FROM archivos_documentacion WHERE id_documentacion = ?  ORDER BY fecha_registro ASC LIMIT 1");
mysqli_stmt_bind_param($consultar, 'i', $id_documentacion);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $pagina);
mysqli_stmt_fetch($consultar);

$nueva_page = $pagina + 1;

  $insertando = mysqli_prepare($connect,"INSERT INTO archivos_documentacion (id_documentacion, url, nombre_archivo, pagina) VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($insertando, 'issi', $id_documentacion, $dataURL, $name_page, $nueva_page);
  mysqli_stmt_execute($insertando);
 // echo mysqli_stmt_errno($insertando);

  if($insertando){
    echo 1;
  }else{
    echo 0;
  }

mysqli_stmt_close($insertando);
?>