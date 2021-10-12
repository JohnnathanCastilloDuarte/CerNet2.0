<?php 
error_reporting(0);
include('../../../config.ini.php');

$id_documentacion = $_POST['id_documentacion'];

$array_firmantes = array();

$buscando_firmantes = mysqli_prepare($connect,"SELECT a.usuario, a.id_rol, b.fecha_registro, b.fecha_firma, b.tipo FROM usuario as a, firmantes_documentacion as b WHERE a.id_usuario = b.id_usuario AND b.id_documento = ?");
mysqli_stmt_bind_param($buscando_firmantes, 'i', $id_documentacion);
mysqli_stmt_execute($buscando_firmantes);
mysqli_stmt_store_result($buscando_firmantes);
mysqli_stmt_bind_result($buscando_firmantes, $usuario, $rol,  $fecha_registro, $fecha_firma, $tipo);


while($row = mysqli_stmt_fetch($buscando_firmantes)){

    $array_firmantes[] = array(
        'usuario'=>$usuario,
        'rol'=>$rol,
        'fecha_registro'=>$fecha_registro,
        'fecha_firma'=>$fecha_firma,
        'tipo'=>$tipo
    );

}


$convert = json_encode($array_firmantes);

echo $convert;

?>