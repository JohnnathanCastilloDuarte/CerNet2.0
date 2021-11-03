<?php 
include('../../config.ini.php');

$id_asignado_automovil = $_POST['id_asignado_automovil'];

$consultar = mysqli_prepare($connect,"SELECT correlativo FROM item_asignado WHERE id_asignado = ?");
mysqli_stmt_bind_param($consultar, 'i', $id_asignado_automovil);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $correlativo);
mysqli_stmt_fetch($consultar);

echo $correlativo;

mysqli_close($connect);
?>