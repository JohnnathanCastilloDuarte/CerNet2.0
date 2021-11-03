<?php
 include('../../config.ini.php');

$id_mapeo = $_POST['id_mapeo'];  
$id_altura = $_POST['id_altura'];
$id_asignado_automovil = $_POST['id_asignado_automovil'];

$json = array();

$consultar = mysqli_prepare($connect,"SELECT a.id_automovil_sensor, b.nombre, b.tipo, c.nombre, a.fecha_registro, a.posicion  FROM  automovil_sensor as a, alturas_automovil as b,
                                      sensores as c
                                      WHERE a.id_altura = b.id AND a.id_altura = ? AND a.id_sensor = c.id_sensor  AND a.id_asignado = ? AND a.id_mapeo = ?");

mysqli_stmt_bind_param($consultar, 'iii', $id_altura, $id_asignado_automovil, $id_mapeo);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $id_automovil_sensor, $nombre_altura, $tipo_altura, $nombre_sensor, $fecha_registro, $posicion);

while($row = mysqli_stmt_fetch($consultar)){
  
  $json[] = array(
    'id_automovil_sensor'=>$id_automovil_sensor,
    'nombre_altura'=>$nombre_altura,
    'tipo_altura'=>$tipo_altura,
    'nombre_sensor'=>$nombre_sensor,
    'fecha_registro'=>$fecha_registro,
    'posicion'=>$posicion
  );
}

$convert = json_encode($json);

echo $convert;
mysqli_close($connect);
?>