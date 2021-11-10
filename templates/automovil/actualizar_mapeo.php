<?php 

include('../../config.ini.php');

$nombre = $_POST['nombre'];
$fecha_inicio = $_POST['fecha_inicio'];
$hora_inicio_mapeo_automovil = $_POST['hora_inicio'];
$minuto_inicio_mapeo_automovil = $_POST['minuto_inicio'];
$segundo_inicio_mapeo_automovil = $_POST['segundo_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$hora_fin_mapeo_automovil = $_POST['hora_fin'];
$minuto_fin_mapeo_automovil = $_POST['minuto_fin'];
$segundo_fin_mapeo_automovil = $_POST['segundo_fin'];
$intervalo = $_POST['intervalo'];
$valor_seteado = $_POST['valor_seteado'];
$temperatura_minima = $_POST['temperatura_minima'];
$temperatura_maxima = $_POST['temperatura_maxima'];
$id = $_POST['id'];


$hora_inicio = $hora_inicio_mapeo_automovil.":".$minuto_inicio_mapeo_automovil.":".$segundo_inicio_mapeo_automovil;
$hora_fin = $hora_fin_mapeo_automovil.":".$minuto_fin_mapeo_automovil.":".$segundo_fin_mapeo_automovil;

$update = mysqli_prepare($connect,"UPDATE automovil_mapeo SET nombre=?, fecha_inicio=?, hora_inicio=?,fecha_final=?,hora_final=?,intervalo=?,
                                    temperatura_minima=?,temperatura_maxima=?,valor_seteado_temperatura=?  WHERE id_mapeo = ?");
mysqli_stmt_bind_param($update, 'sssssissii', $nombre, $fecha_inicio, $hora_inicio, $fecha_fin, $hora_fin, $intervalo, $temperatura_minima, $temperatura_maxima, $valor_seteado, $id);
mysqli_stmt_execute($update);

if($update){
  echo 1;
}else{
  echo 0;
}

mysqli_close($connect);

?>