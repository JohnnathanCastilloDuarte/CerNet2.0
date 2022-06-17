<?php 

include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "Leer"){
    $id_asignado = $_POST['id_asignado'];
    $array_imagen = array();

    $consultar = mysqli_prepare($connect,"SELECT id_imagen, url, tipo, nombre FROM image_camara_extraccion WHERE id_asignado  = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_imagen, $url, $tipo, $nombre);

    while($row = mysqli_stmt_fetch($consultar)){

        $array_imagen[]=array(
            'id_imagen'=>$id_imagen,
            'url'=>$url,
            'tipo'=>$tipo,
            'nombre'=>$nombre
        );
    }

    $convert = json_encode($array_imagen);
    echo $convert;
}


mysqli_close($connect);

?>