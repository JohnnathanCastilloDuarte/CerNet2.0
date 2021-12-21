<?php 

include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "Traer"){

    $id_asignado = $_POST['id_asignado'];


    $consultar = mysqli_prepare($connect,"SELECT correlativo FROM item_asignado WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $correlativo);
    mysqli_stmt_fetch($consultar);

    echo $correlativo;

}else if($movimiento == "guardar"){

    $id_asignado = $_POST['id_asignado'];
    $correlativo = $_POST['correlativo'];
   
    $actualizar = mysqli_prepare($connect,"UPDATE item_asignado SET correlativo = ? WHERE id_asignado = ?");
    mysqli_stmt_bind_param($actualizar, 'si', $correlativo, $id_asignado);
    mysqli_stmt_execute($actualizar);

    if($actualizar){
        echo "Si";
    }else{
        echo "No";
    }
}

mysqli_close($connect);
?>