<?php 
include('../../config.ini.php');

$id_documentacion = $_POST['id_documentacion'];
$id_persona = $_POST['id_persona'];
$json = array();


$consultar = mysqli_prepare($connect,"SELECT a.fecha_registro, a.qr, b.nombre, b.apellido, a.id FROM firmantes_documentacion as a, persona as b WHERE a.id_documento = ? AND a.id_usuario = ? AND a.id_usuario = b.id_usuario");
mysqli_stmt_bind_param($consultar, 'ii', $id_documentacion, $id_persona);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $fecha_registro, $qr, $nombre, $apellido, $id_firma);

  while($row = mysqli_stmt_fetch($consultar)){
    $json[] = array(
    'fecha_registro'=>$fecha_registro,
    'nombre'=>$nombre,
    'apellido'=>$apellido,
    'qr'=>$qr,
    'id_t_firmantes'=>$id_firma 
    );
  }  
  $convert = json_encode($json[0]);
  echo $convert;
mysqli_stmt_close($consultar);
?>