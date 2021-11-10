<?php 

include "../../config.ini.php";

$id_imagen = $_POST['id_imagen'];

$consulta = mysqli_prepare($connect,"SELECT url FROM images_informe_filtro WHERE id_imagen = ?");
mysqli_stmt_bind_param($consulta, 'i', $id_imagen);
mysqli_stmt_execute($consulta);
mysqli_stmt_store_result($consulta);
mysqli_stmt_bind_result($consulta, $url);
mysqli_stmt_fetch($consulta);


if(unlink($url)){
    
    $eliminar = mysqli_prepare($connect,"DELETE FROM images_informe_filtro WHERE id_imagen = ?");
    mysqli_stmt_bind_param($eliminar, 'i', $id_imagen);
    mysqli_stmt_execute($eliminar);

    if($eliminar){
        echo "Listo";
    }
}

mysqli_close($connect);

?>