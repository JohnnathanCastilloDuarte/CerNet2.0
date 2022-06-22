<?php 

include("../../config.ini.php");

$id_asignado = $_POST['id_asignado'];
$validador = 0;
$consultar_mapeo = mysqli_prepare($connect,"SELECT id_mapeo FROM refrigerador_mapeo WHERE id_asignado = ?");
mysqli_stmt_bind_param($consultar_mapeo, 'i', $id_asignado);
mysqli_stmt_execute($consultar_mapeo);
mysqli_stmt_store_result($consultar_mapeo);
mysqli_stmt_bind_result($consultar_mapeo, $id_mapeo);
mysqli_stmt_fetch($consultar_mapeo);


if(mysqli_stmt_num_rows($consultar_mapeo) > 0){
	echo "Abrete";
}else{
	echo "No";
}

mysqli_close($connect);
?>