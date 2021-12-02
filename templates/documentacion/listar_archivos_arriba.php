<?php 
error_reporting(0);
include('../../config.ini.php');

$id = $_POST['id_documentacion'];

$json = array();

$url_enviar = "";


$consultar_estado = mysqli_prepare($connect,"SELECT estado, url FROM documentacion WHERE id = ?");
mysqli_stmt_bind_param($consultar_estado, 'i', $id);
mysqli_stmt_execute($consultar_estado);
mysqli_stmt_store_result($consultar_estado);
mysqli_stmt_bind_result($consultar_estado, $estado, $url_estado);
mysqli_stmt_fetch($consultar_estado);

if($estado != 1){

  $consultar = mysqli_prepare($connect,"SELECT a.id, replace(a.url, 'templates','..'), a.nombre_archivo, a.pagina, a.fecha_registro, b.tipo FROM archivos_documentacion as a , documentacion as b WHERE a.id_documentacion = ? AND a.id_documentacion = b.id  ORDER BY a.pagina ASC");
  mysqli_stmt_bind_param($consultar, 'i', $id);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_a, $url, $nombre, $pagina, $fecha_registro, $tipo);




  while($row = mysqli_stmt_fetch($consultar)){
    $json[]=array(
      'id'=>$id_a,
      'url'=>$url_enviar,
      'nombre'=>$nombre,
      'pagina'=>$pagina,
      'fecha_registro'=>$fecha_registro,
      'tipo'=>$tipo
    );
  }

  $convert = json_encode($json);

  echo $convert;
}else{
  echo "No existe";
}
mysqli_close($consultar);
?>