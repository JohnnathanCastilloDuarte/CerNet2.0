<?php 
include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "buscar"){

    $buscar = $_POST['buscar'];
    $array_sensores = array();


    $buscando = mysqli_prepare($connect, "SELECT a.id_sensor, a.nombre, b.certificado FROM sensores as a, sensores_certificados as b WHERE a.id_sensor = b.id_sensor AND a.nombre  LIKE  CONCAT('%',?,'%')");
    mysqli_stmt_bind_param($buscando, 's', $buscar);
    mysqli_stmt_execute($buscando);
    mysqli_stmt_store_result($buscando);
    mysqli_stmt_bind_result($buscando, $id_sensor, $nombre, $certificado);

    while($row = mysqli_stmt_fetch($buscando)){

        $array_sensores[] = array(
            'id_sensor'=>$id_sensor,
            'nombre'=>$nombre,
            'certificado'=>$certificado
        );
    }

    $convert = json_encode($array_sensores);
    echo $convert;

}else if($movimiento == "agregar"){


    $id_sensor = $_POST['id_sensor'];
    $id_mapeo_actual = $_POST['id_mapeo_actual'];
    $id_bandeja_actual = $_POST['id_bandeja_actual'];

  
    $validando_sensor = mysqli_prepare($connect,"SELECT id_sensor_mapeo FROM mapeo_general_sensor WHERE id_mapeo = ? AND id_bandeja = ? AND id_sensor = ?");
    mysqli_stmt_bind_param($validando_sensor, 'iii', $id_mapeo_actual, $id_bandeja_actual, $id_sensor);
    mysqli_stmt_execute($validando_sensor);
    mysqli_stmt_store_result($validando_sensor);
	mysqli_stmt_bind_result($validando_sensor, $id_sensor_mapeo);
    mysqli_stmt_fetch($validando_sensor);
    if(mysqli_stmt_num_rows($validando_sensor) != 0){
        echo "Existe";
    }else{
 
        $insertando = mysqli_prepare($connect,"INSERT INTO mapeo_general_sensor (id_sensor, id_mapeo, id_bandeja) VALUES (?,?,?)");
        mysqli_stmt_bind_param($insertando, 'iii', $id_sensor, $id_mapeo_actual, $id_bandeja_actual);
        mysqli_stmt_execute($insertando);
    
        if($insertando){
            echo "Si";
        }else{
            echo "Error";
        }
    }

}else if($movimiento == "Listar_asignados"){

    $id_mapeo = $_POST['id_mapeo'];
    $id_bandeja = $_POST['id_bandeja'];

    $array_sensores = array();


    $buscando = mysqli_prepare($connect, "SELECT c.id_sensor_mapeo, c.posicion, a.nombre, c.posicion_tem, c.posicion_hum FROM sensores as a, mapeo_general_sensor c WHERE c.id_sensor = a.id_sensor AND c.id_mapeo = ? AND c.id_bandeja = ?  ORDER BY  c.posicion ASC");
    mysqli_stmt_bind_param($buscando, 'ii', $id_mapeo, $id_bandeja);
    mysqli_stmt_execute($buscando);
    mysqli_stmt_store_result($buscando);
    mysqli_stmt_bind_result($buscando, $id_sensor_mapeo, $posicion, $nombre, $posicion_tem, $posicion_hum);

    while($row = mysqli_stmt_fetch($buscando)){

        $array_sensores[] = array(
            'id_sensor_mapeo'=>$id_sensor_mapeo,
            'nombre'=>$nombre,
            'posicion'=>$posicion,
            'posicion_tem'=>$posicion_tem,
            'posicion_hum'=>$posicion_hum

        );
    }

    $convert = json_encode($array_sensores);
    echo $convert;

}else if($movimiento == "cambiar_posicion"){

    $id_mapeo = $_POST['id_mapeo'];
    $posicion = $_POST['posicion'];

   
    $cambiar_de_posicion = mysqli_prepare($connect,"UPDATE mapeo_general_sensor SET posicion = ? WHERE id_sensor_mapeo = ?");
    mysqli_stmt_bind_param($cambiar_de_posicion, 'ii', $posicion, $id_mapeo);
    mysqli_stmt_execute($cambiar_de_posicion);

    if($cambiar_de_posicion){
        echo "Si";
    }else{
        echo "No";
    }

}else if($movimiento == "remover"){

    $id_mapeo = $_POST['id_mapeo'];

    $remover = mysqli_prepare($connect,"DELETE FROM mapeo_general_sensor WHERE id_sensor_mapeo = ?");
    mysqli_stmt_bind_param($remover, 'i', $id_mapeo);
    mysqli_stmt_execute($remover);

    if($remover){
        echo "Si";
    }else{
        echo "No";
    }

}else if($movimiento == "posicion_tem"){

    $id_sensor_mapeo = $_POST['id_sensor_mapeo'];
    $col = $_POST['col'];


    $actualizar = mysqli_prepare($connect,"UPDATE mapeo_general_sensor SET posicion_tem = ? WHERE id_sensor_mapeo = ?");
    mysqli_stmt_bind_param($actualizar, 'si', $col, $id_sensor_mapeo);
    mysqli_stmt_execute($actualizar);

    if($actualizar){
        echo "Si";
    }else{
        echo "No";
    }
}else if($movimiento == "posicion_hum"){

    $id_sensor_mapeo = $_POST['id_sensor_mapeo'];
    $col = $_POST['col'];


    $actualizar = mysqli_prepare($connect,"UPDATE mapeo_general_sensor SET posicion_hum = ? WHERE id_sensor_mapeo = ?");
    mysqli_stmt_bind_param($actualizar, 'si', $col, $id_sensor_mapeo);
    mysqli_stmt_execute($actualizar);

    if($actualizar){
        echo "Si";
    }else{
        echo "No";
    }
}

mysqli_close($connect);
?>