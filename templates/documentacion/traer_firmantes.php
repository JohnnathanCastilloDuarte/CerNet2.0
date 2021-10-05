<?php
include('../../config.ini.php');

$id = $_POST['id'];

$consultar = mysqli_prepare($connect,"SELECT a.fecha_registro, b.nombres, b.apellidos, c.nombre FROM firmantes_documentacion as a, participante_documentacion as b, empresa as c 
                                      WHERE a.id_documento = ? AND a.id_usuario = b.id AND b.id_empresa = c.id_empresa");
mysqli_stmt_bind_param($consultar, 'i', $id);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $fecha_registro, $nombres, $apellidos, $empresa);

$json = array();

while($row = mysqli_stmt_fetch($consultar)){
  $json[]=array(
  "fecha_registro"=>$fecha_registro,
  "nombres"=>$nombres,
  "apellidos"=>$apellidos,
  "empresa"=>$empresa  
  );
}

$convert = json_encode($json);

echo $convert;

mysqli_stmt_close($convert);

?>