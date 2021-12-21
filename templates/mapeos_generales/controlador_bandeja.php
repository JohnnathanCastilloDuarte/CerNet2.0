<?php 

include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "Crear"){

    $id_asignado = $_POST['id_asignado'];
    $nombre_bandeja = $_POST['nombre_bandeja'];
    $id_usuario = $_POST['id_usuario'];

    $insertando = mysqli_prepare($connect,"INSERT INTO bandeja (id_asignado, nombre, id_usuario) VALUES (?,?,?)");
    mysqli_stmt_bind_param($insertando, 'isi', $id_asignado, $nombre_bandeja, $id_usuario);
    mysqli_stmt_execute($insertando);

    if($insertando){
        echo "Listo";
    }else{
        echo "No";
    }
}else if($movimiento == "Listar"){


    $id_asignado = $_POST['id_asignado'];
    $array_bandeja = array();

    $traer = mysqli_prepare($connect,"SELECT id_bandeja, nombre FROM bandeja WHERE id_asignado = ?");
    mysqli_stmt_bind_param($traer, 'i', $id_asignado);
    mysqli_stmt_execute($traer);
    mysqli_stmt_store_result($traer);
    mysqli_stmt_bind_result($traer, $id_bandeja, $nombre_bandeja);

    while($row = mysqli_stmt_fetch($traer)){

        $array_bandeja[]=array(
            'id_bandeja'=>$id_bandeja,
            'nombre'=>$nombre_bandeja
        );

    }

    $convert = json_encode($array_bandeja);

    echo $convert;


}else if($movimiento == "Eliminar"){
    
    $id_bandeja = $_POST['id_bandeja'];

    $eliminar = mysqli_prepare($connect,"DELETE FROM bandeja WHERE id_bandeja = ?");
    mysqli_stmt_bind_param($eliminar, 'i', $id_bandeja);
    mysqli_stmt_execute($eliminar);

    if($eliminar){
        echo "Si";
    }else{
        echo "No";
    }

}else{
    $id_bandeja = $_POST['id_bandeja'];
    $nombre_nuevo =$_POST['nuevo_nombre'];

    $actualizar = mysqli_prepare($connect,"UPDATE bandeja SET nombre = ? WHERE id_bandeja = ?");
    mysqli_stmt_bind_param($actualizar, 'si', $nombre_nuevo, $id_bandeja);
    mysqli_stmt_execute($actualizar);

    if($actualizar){
        echo "Listo";
    }else{
        echo "No";
    }
}

mysqli_close($connect);
?>