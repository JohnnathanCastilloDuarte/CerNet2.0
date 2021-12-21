<?php 
include('../../config.ini.php');

$id_informe = $_POST['id'];
$url = $_POST['url'];


$consulta_1 = mysqli_prepare($connect,"SELECT id_imagen FROM imagenes_general_informe WHERE id_informe = ? AND url = ?");
mysqli_stmt_bind_param($consulta_1, 'is', $id_informe, $url);
mysqli_stmt_execute($consulta_1);
mysqli_stmt_store_result($consulta_1);
mysqli_stmt_bind_result($consulta_1, $id_imagen);
mysqli_stmt_fetch($consulta_1);

$delete = mysqli_prepare($connect, "DELETE FROM imagenes_general_informe WHERE id_imagen = ?");
mysqli_stmt_bind_param($delete, 'i', $id_imagen);
mysqli_stmt_execute($delete);

if($delete){
    $fh = fopen($url, 'a');
    unlink($url);
}

mysqli_close($connect);

?>