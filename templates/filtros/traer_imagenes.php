<?php 

    include "../../config.ini.php";

    $id_asignado_filtro = $_POST['id_asignado_filtro'];
   
    $array_img = array();

    $consultando = mysqli_prepare($connect,"SELECT a.id_imagen, a.url, a.enunciado FROM images_informe_filtro as a, informe_filtro as b
    WHERE b.id_asignado = ? AND a.id_informe = b.id_informe");

    mysqli_stmt_bind_param($consultando, 'i', $id_asignado_filtro);
    mysqli_stmt_execute($consultando);
    mysqli_stmt_store_result($consultando);
    mysqli_stmt_bind_result($consultando, $id_imagen, $url, $enunciado);

    while($row = mysqli_stmt_fetch($consultando)){

        $array_img[] = array(
            'id_imagen'=>$id_imagen,
            'url'=>$url,
            'enunciado'=>$enunciado
        );
    }

    $convert = json_encode($array_img);

    echo $convert;

    mysqli_close($connect);
?>