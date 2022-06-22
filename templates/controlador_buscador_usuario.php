<?php
include('../config.ini.php');

$buscar = $_POST['buscar'];
$array_usuario = array();

$consultar_usuario = mysqli_prepare($connect,"SELECT id_usuario, nombre, apellido FROM persona WHERE nombre LIKE CONCAT('%',?,'%')");
mysqli_stmt_bind_param($consultar_usuario, 's', $buscar);
mysqli_stmt_execute($consultar_usuario);
mysqli_stmt_store_result($consultar_usuario);
mysqli_stmt_bind_result($consultar_usuario, $id_usuario, $nombre, $apellido);

echo mysqli_stmt_error($consultar_usuario);


while($row = mysqli_stmt_fetch($consultar_usuario)){

    $array_usuario[] = array(
        'id_usuario'=>$id_usuario,
        'nombre'=>$nombre,
        'apellido'=>$apellido
    );
}


$convert = json_encode($array_usuario);
echo $convert;

mysqli_close($connect);
?>