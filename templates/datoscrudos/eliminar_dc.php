<?php 

include('../../config.ini.php');

$id_registro = $_POST['id_registro'];

$consultar = mysqli_prepare($connect,"SELECT url_archivo FROM registro_dc WHERE id_registro = ?");
mysqli_stmt_bind_param($consultar, 'i', $id_registro);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $url_archivo);
mysqli_stmt_fetch($consultar);

if(unlink($url_archivo)){
    $actualizando = mysqli_prepare($connect,"UPDATE registro_dc SET estado = 3 WHERE id_registro = ?");
    mysqli_stmt_bind_param($actualizando, 'i', $id_registro);
    mysqli_stmt_execute($actualizando);

    if($actualizando){
        echo "Si";
    }
    
}


mysqli_close($connect);

?>