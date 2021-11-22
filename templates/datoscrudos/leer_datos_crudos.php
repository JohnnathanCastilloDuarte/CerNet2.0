<?php 

include("../../config.ini.php");

$id_asignado = $_POST['id_asignado'];
$id_mapeo = $_POST['id_mapeo'];
$array_historial = array();


$consultando = mysqli_prepare($connect,"SELECT a.id_registro, a.url_archivo, a.url_error, a.estado, b.nombre, b.apellido, a.fecha_registro FROM registro_dc as a, persona as b WHERE a.id_usuario = b.id_usuario AND a.id_mapeo = ?  AND a.id_asignado =  ? ORDER BY a.fecha_registro ASC");

mysqli_stmt_bind_param($consultando, 'ii' , $id_mapeo, $id_asignado);
mysqli_stmt_execute($consultando);
mysqli_stmt_store_result($consultando);
mysqli_stmt_bind_result($consultando, $id_registro, $url_archivo, $url_error, $estado, $nombres, $apellidos, $fecha_registro);

while($row = mysqli_stmt_fetch($consultando)){

    $array_historial[]= array(
        'id_registro'=>$id_registro,
        'url_archivo'=>$url_archivo,
        'url_error'=>$url_error,
        'estado'=>$estado,
        'nombres'=>$nombres,
        'apellidos'=>$apellidos,
        'fecha_registro'=>$fecha_registro
    );
}

$convert = json_encode($array_historial);

echo $convert;

mysqli_close($connect);
?>