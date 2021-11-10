<?php 
include('../../config.ini.php');
$nombre_prueba = $_POST['nombre_prueba'];
$fecha_inicio_mapeo_automovil = $_POST['fecha_inicio_mapeo_automovil'];
$hora_inicio_mapeo_automovil = $_POST['hora_inicio_mapeo_automovil'];
$minuto_inicio_mapeo_automovil = $_POST['minuto_inicio_mapeo_automovil'];
$segundo_inicio_mapeo_automovil = $_POST['segundo_inicio_mapeo_automovil'];
$fecha_fin_mapeo_automovil = $_POST['fecha_fin_mapeo_automovil'];
$hora_fin_mapeo_automovil = $_POST['hora_fin_mapeo_automovil'];
$minuto_fin_mapeo_automovil = $_POST['minuto_fin_mapeo_automovil'];
$segundo_fin_mapeo_automovil = $_POST['segundo_fin_mapeo_automovil'];
$intervalo_automovil = $_POST['intervalo_automovil'];
$valor_seteado_temperatura_automovil = $_POST['valor_seteado_temperatura_automovil'];
$temperatura_minima_automovil = $_POST['temperatura_minima_automovil'];
$temperatura_maxima_automovil = $_POST['temperatura_maxima_automovil'];
$id_asignado_automovil = $_POST['id_asignado_automovil']; 
$id_valida_automovil = $_POST['id_valida_automovil'];

$hora_inicio = $hora_inicio_mapeo_automovil.":".$minuto_inicio_mapeo_automovil.":".$segundo_inicio_mapeo_automovil;
$hora_fin = $hora_fin_mapeo_automovil.":".$minuto_fin_mapeo_automovil.":".$segundo_fin_mapeo_automovil;

$fecha_incial = $fecha_inicio_mapeo_automovil.' '.$hora_inicio_mapeo_automovil.':'.$minuto_inicio_mapeo_automovil.':'.$segundo_inicio_mapeo_automovil;
$fecha_fin = $fecha_fin_mapeo_automovil.' '.$hora_fin_mapeo_automovil.':'.$minuto_fin_mapeo_automovil.':'.$segundo_fin_mapeo_automovil;


$c_dias = number_format(((strtotime($fecha_fin)-strtotime($fecha_incial))/3600)/24,2);
$c_hora = $c_dias * 24;
$nombre_construido = "MAPEO A ".$c_hora." HORA(s) ".$nombre_prueba;





$insertar = mysqli_prepare($connect,"INSERT INTO automovil_mapeo (id_asignado, nombre, fecha_inicio, hora_inicio, fecha_final, hora_final, intervalo, temperatura_minima,
	temperatura_maxima, valor_seteado_temperatura, id_usuario)
	VALUES (?,?,?,?,?,?,?,?,?,?,?)");
mysqli_stmt_bind_param($insertar, 'isssssissii', $id_asignado_automovil, $nombre_construido, $fecha_inicio_mapeo_automovil, $hora_inicio,  $fecha_fin_mapeo_automovil, $hora_fin,
	$intervalo_automovil, $temperatura_minima_automovil, $temperatura_maxima_automovil, $valor_seteado_temperatura_automovil,
	$id_valida_automovil);
mysqli_stmt_execute($insertar);
//echo mysqli_stmt_error ($insertar);
if($insertar){
	echo 1;
}else{
	echo 0;
}

mysqli_close($connect);
?>