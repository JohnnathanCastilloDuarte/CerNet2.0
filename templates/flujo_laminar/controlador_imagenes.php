<?php 

include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "Leer"){
    $id_asignado = $_POST['id_asignado'];
    $array_imagen = array();

    $consultar = mysqli_prepare($connect,"SELECT id_imagen, url, tipo, nombre FROM image_flujo_laminar WHERE id_asignado  = ?");
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

else if($movimiento == "Eliminar"){

    $id_imagen = $_POST['id_imagen'];


    $consultar = mysqli_prepare($connect,"SELECT url, nombre FROM image_flujo_laminar WHERE id_imagen = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_imagen);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $url, $nombre);
    mysqli_stmt_fetch($consultar);

    $eliminar_que = $url.$nombre;

    if(file_exists($eliminar_que)){
        
        unlink($eliminar_que);

        $eliminar = mysqli_prepare($connect, "DELETE FROM image_flujo_laminar WHERE id_imagen = ?");
        mysqli_stmt_bind_param($eliminar, 'i', $id_imagen);
        mysqli_stmt_execute($eliminar);

        if($eliminar){
            echo "listo";
        }

    }
}


mysqli_close($connect);

?>