<?php 
error_reporting(0);
include('../../config.ini.php');

$id_documentacion = $_POST['id_documentacion'];

$consultar = mysqli_prepare($connect,"SELECT a.id, b.nombre, b.apellido, c.fecha_registro FROM participante_documentacion as a, persona as b, firmantes_documentacion as c 
                                      WHERE a.id_documentacion = c.id_documento AND c.id_documento = ? AND a.id_persona = b.id_usuario AND a.id_persona = c.id_usuario");
mysqli_stmt_bind_param($consultar, 'i', $id_documentacion);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $id_asig, $nombre, $apellido, $fecha_firma);

$json = array();

while($row = mysqli_stmt_fetch($consultar)){
  $json[] = array(
    'id_asig'=>$id_asig,
    'nombre'=>$nombre,
    'apellido'=>$apellido,
    'fecha_firma'=>$fecha_firma
  );
}

$convert = json_encode($json);
echo $convert;

mysqli_stmt_close($consultar);
?>