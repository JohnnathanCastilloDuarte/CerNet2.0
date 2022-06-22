<?php 
include('../../config.ini.php');

$url = $_POST['url'];
$id_documentacion = $_POST['id_documentacion'];

$actualizar = mysqli_prepare($connect,"UPDATE documentacion SET url = ? WHERE id = ?");
mysqli_stmt_bind_param($actualizar, 'si', $url, $id_documentacion);
mysqli_stmt_execute($actualizar);
if($actualizar){
    echo "Listo";
}else{
    echo "No";
}

mysqli_close($connect);

?>