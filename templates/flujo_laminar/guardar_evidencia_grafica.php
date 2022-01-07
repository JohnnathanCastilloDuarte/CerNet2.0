<?php 
include('../../config.ini.php');

$tipo_imagen = $_POST['tipo_imagen'];
$id_asignado = $_POST['id_asignado_graficas'];
$nombre_imagen = $_FILES["imagen"]["name"];
$i = 1;
$ruta = "imagenes/".$tipo_imagen."/";
$id_insertado = "";

do {
    /////////// VALIDACIÓN
    $consultar = mysqli_prepare($connect,"SELECT id_imagen FROM image_flujo_laminar WHERE nombre = ? AND tipo = ? AND id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'sii', $nombre_imagen, $tipo_imagen, $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_imagen);
    mysqli_stmt_fetch($consultar);

    if(mysqli_stmt_num_rows($consultar) > 0){
        $nombre_imagen = $i.$_FILES["imagen"]["name"];
        $i++;
    }else{
        $creando_imagen = mysqli_prepare($connect,"INSERT INTO image_flujo_laminar (id_asignado, url, tipo, nombre) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($creando_imagen, 'isis', $id_asignado, $ruta, $tipo_imagen, $nombre_imagen);
        mysqli_stmt_execute($creando_imagen);
        $id_insertado = mysqli_stmt_insert_id($creando_imagen);
        $i = 0;
    }
     
} while ($i > 0);

/**LOGICA IMAGEN**/


if(is_dir($ruta)===false){
    mkdir($ruta,0777,true);
}

$mix_imagen = $ruta.$nombre_imagen;


if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $mix_imagen)){
    echo "Movido";
}else{
    echo "error";
}


?>