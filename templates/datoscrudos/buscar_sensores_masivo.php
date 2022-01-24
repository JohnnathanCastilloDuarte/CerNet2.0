<?php 

include('../../config.ini.php');

$id_mapeo = $_POST['id_mapeo'];


$consultar = mysqli_prepare($connect,"SELECT a.nombre, b.id_sensor_mapeo FROM sensores as a, mapeo_general_sensor as b WHERE a.id_sensor = b.id_sensor AND b.id_mapeo = ?");
mysqli_stmt_bind_param()

?>