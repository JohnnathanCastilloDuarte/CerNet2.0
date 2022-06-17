<?php
include("../../config.ini.php");
  
$sensores ="SELECT a.nombre FROM sensores as a, ultrafreezer_sensor as c WHERE a.id_sensor = c.id_sensor AND c.id_mapeo = 2";
$result = $con->query($sensores);

$data = array();  
foreach($result as $row){
    $data[] = $row;
}
// Limpiamos memoria consumida al extraer los datos
$result->close();
 
// Cerramos la conexión a la Base de Datos
$con->close();

$convert = json_encode($data);
echo $convert;


  $fechas = SELECT a.time FROM ultrafreezer_datos_crudos as a, ultrafreezer_sensor as c WHERE a.id_ultrafreezer_sensor = c.id_ultrafreezer_sensor  AND c.id_mapeo = 2 AND c.id_sensor = 1  
  $consulta = "SELECT a.nombre,  b.time, b.temperatura FROM sensores as a, ultrafreezer_datos_crudos as b, ultrafreezer_sensor as c WHERE a.id_sensor = c.id_sensor AND b.id_ultrafreezer_sensor = c.id_ultrafreezer_sensor AND c.id_mapeo = 2"
?>