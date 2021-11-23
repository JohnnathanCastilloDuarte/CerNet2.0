<?php
include('../../config.ini.php');

$id_mapeo = $_POST['id_mapeo'];

$id_asignado = $_POST['id_asignado'];

$consulta = mysqli_prepare($connect,"SELECT id_registro FROM registro_dc WHERE id_mapeo = ? AND id_asignado = ? AND estado = 1");
mysqli_stmt_bind_param($consulta, 'ii', $id_mapeo, $id_asignado);
mysqli_stmt_execute($consulta);
mysqli_stmt_store_result($consulta);
mysqli_stmt_bind_result($consulta, $id_registro);
mysqli_stmt_fetch($consulta);

if(count($id_registro) > 0){
    echo "Existe";
}else{
    echo "No existe";
}

mysqli_close($connect);
?>