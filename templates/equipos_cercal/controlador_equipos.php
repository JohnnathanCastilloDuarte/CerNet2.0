<?php
include('../../config.ini.php');


$proceso = $_POST['proceso'];


if($proceso == 1){

    $nombre_equipo_cercal = $_POST['nombre_equipo_cercal'];
    $marca_equipo_cercal = $_POST['marca_equipo_cercal'];
    $n_serie_equipo_cercal = $_POST['n_serie_equipo_cercal'];
    $modelo_equipo_cercal = $_POST['modelo_equipo_cercal'];
    $certificado_calibracion_equipo_cercal = $_POST['certificado_calibracion_equipo_cercal'];
    $ultima_fecha_calibracion_equipo_cercal = $_POST['ultima_fecha_calibracion_equipo_cercal'];
    $trazabilidad_equipo_cercal = $_POST['trazabilidad_equipo_cercal']; 
    $pais_certificado_equipo_cercal = $_POST['pais_certificado_equipo_cercal']; 
    $fecha_vencimiento = date("Y-m-d",strtotime($ultima_fecha_calibracion_equipo_cercal."+ 1 year"));
    $estado = "Vigente";
    
    $creando_item = mysqli_prepare($connect,"INSERT INTO equipos_cercal (nombre_equipo, marca_equipo, n_serie_equipo, modelo_equipo) VALUES
                                             (?,?,?,?)");
    mysqli_stmt_bind_param($creando_item, 'ssss', $nombre_equipo_cercal, $marca_equipo_cercal, $n_serie_equipo_cercal, $modelo_equipo_cercal);
    mysqli_stmt_execute($creando_item);
    $id_item_insertado = mysqli_stmt_insert_id($creando_item);


    $creando_certificado = mysqli_prepare($connect,"INSERT INTO certificado_equipo (numero_certificado, id_equipo_cercal, fecha_emision, fecha_vencimiento, pais, estado) VALUES
                                                    (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($creando_certificado, 'sissss', $certificado_calibracion_equipo_cercal, $id_item_insertado, $ultima_fecha_calibracion_equipo_cercal, $fecha_vencimiento, $pais_certificado_equipo_cercal, $estado);
    mysqli_stmt_execute($creando_certificado);

    if($creando_certificado){
        echo "Listo";
    }

}else if($proceso == 2){

    $array_equipos = array();
   
    $buscando_item = mysqli_prepare($connect,"SELECT a.id_equipo_cercal, a.nombre_equipo, b.numero_certificado, b.fecha_emision, b.fecha_vencimiento FROM equipos_cercal as a, certificado_equipo as b WHERE a.id_equipo_cercal = b.id_equipo_cercal AND b.estado = 'Vigente'");
    mysqli_stmt_execute($buscando_item);
    mysqli_stmt_store_result($buscando_item);
    mysqli_stmt_bind_result($buscando_item, $id_equipo, $nombre_equipo, $numero_certificado, $fecha_emision, $fecha_vencimiento);
    
    while($row = mysqli_stmt_fetch($buscando_item)){

        $array_equipos[] = array(
            'id_equipo'=>$id_equipo,
            'nombre'=>$nombre_equipo,
            'certificado'=>$numero_certificado,
            'fecha_emision'=>$fecha_emision,
            'fecha_vencimiento'=>$fecha_vencimiento
        );
    }

    $convert = json_encode($array_equipos);

    echo $convert;
}else if($proceso == 3){

    $id_equipo = $_POST['id_equipo'];
    $id_informe = $_POST['id_informe'];


    $validacion1 = mysqli_prepare($connect,"SELECT id_equipo_medicion  FROM equipos_mediciones WHERE id_informe = ? AND id_equipo = ?");
    mysqli_stmt_bind_param($validacion1, 'ii', $id_informe, $id_equipo);
    mysqli_stmt_execute($validacion1);
    mysqli_stmt_store_result($validacion1);
    mysqli_stmt_bind_result($validacion1, $id_equipo_medicion);
    mysqli_stmt_fetch($validacion1);
   
    if (mysqli_stmt_num_rows($validacion1) > 0){
        echo "Existe";
    }else{
        $insertar = mysqli_prepare($connect,"INSERT INTO  equipos_mediciones (id_equipo ,  id_informe ) VALUES (?,?)");
        mysqli_stmt_bind_param($insertar, 'ii', $id_equipo, $id_informe);
        mysqli_stmt_execute($insertar);

        if($insertar){
            echo "Listo";
        }
    }
}else if($proceso == 33){
       
    $id_equipo = $_POST['id_equipo'];
    $tipo_prueba = $_POST['tipo_prueba'];
    $id_asignado_campana = $_POST['id_asignado_campana'];
    $id_informe = $_POST['id_informe'];
    $camara_categoria = 12;

    //buscador de informe
    $validacion1 = mysqli_prepare($connect,"SELECT id_equipo_medicion  FROM equipos_mediciones WHERE id_asignado = ? AND id_equipo = ? AND categoria = ? AND tipo_prueba = ?");
    mysqli_stmt_bind_param($validacion1, 'iiis', $id_asignado_campana, $id_equipo, $camara_categoria, $tipo_prueba);
    mysqli_stmt_execute($validacion1);
    mysqli_stmt_store_result($validacion1);
    mysqli_stmt_bind_result($validacion1, $id_equipo_medicion);
    mysqli_stmt_fetch($validacion1);


    $validacion1 = mysqli_prepare($connect,"SELECT id_equipo_medicion  FROM equipos_mediciones WHERE id_asignado = ? AND id_equipo = ? AND categoria = ? AND tipo_prueba = ?");
    mysqli_stmt_bind_param($validacion1, 'iiis', $id_asignado_campana, $id_equipo, $camara_categoria, $tipo_prueba);
    mysqli_stmt_execute($validacion1);
    mysqli_stmt_store_result($validacion1);
    mysqli_stmt_bind_result($validacion1, $id_equipo_medicion);
    mysqli_stmt_fetch($validacion1);
   
    if (mysqli_stmt_num_rows($validacion1) > 0){
        echo "Existe";
    }else{
        $insertar = mysqli_prepare($connect,"INSERT INTO equipos_mediciones (id_equipo , id_asignado, categoria, tipo_prueba, id_informe) VALUES (?,?,?,?,?)");
        mysqli_stmt_bind_param($insertar, 'iiisi', $id_equipo, $id_asignado_campana, $camara_categoria, $tipo_prueba, $id_informe);
        mysqli_stmt_execute($insertar);

        if($insertar){
            echo "Listo";

        }
    }


}else if($proceso == 333){
       
    $id_equipo = $_POST['id_equipo'];
    $tipo_prueba = $_POST['tipo_prueba'];
    $id_asignado_campana = $_POST['id_asignado_campana'];
    $camara_categoria = 13;


    $validacion1 = mysqli_prepare($connect,"SELECT id_equipo_medicion  FROM equipos_mediciones WHERE id_asignado = ? AND id_equipo = ? AND categoria = ? AND tipo_prueba = ?");
    mysqli_stmt_bind_param($validacion1, 'iiis', $id_asignado_campana, $id_equipo, $camara_categoria, $tipo_prueba);
    mysqli_stmt_execute($validacion1);
    mysqli_stmt_store_result($validacion1);
    mysqli_stmt_bind_result($validacion1, $id_equipo_medicion);
    mysqli_stmt_fetch($validacion1);
   
    if (mysqli_stmt_num_rows($validacion1) > 0){
        echo "Existe";
    }else{
        $insertar = mysqli_prepare($connect,"INSERT INTO equipos_mediciones (id_equipo , id_asignado, categoria, tipo_prueba) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($insertar, 'iiis', $id_equipo, $id_asignado_campana, $camara_categoria, $tipo_prueba);
        mysqli_stmt_execute($insertar);

        if($insertar){
            echo "Listo";
        }
    }
}
else if($proceso == 3333){
       
    $id_equipo = $_POST['id_equipo'];
    $tipo_prueba = $_POST['tipo_prueba'];
    $id_asignado_salas = $_POST['id_asignado_salas_limpias'];
    $camara_categoria = 14;


    $validacion1 = mysqli_prepare($connect,"SELECT id_equipo_medicion  FROM equipos_mediciones WHERE id_asignado = ? AND id_equipo = ? AND categoria = ? AND tipo_prueba = ?");
    mysqli_stmt_bind_param($validacion1, 'iiis', $id_asignado_salas, $id_equipo, $camara_categoria, $tipo_prueba);
    mysqli_stmt_execute($validacion1);
    mysqli_stmt_store_result($validacion1);
    mysqli_stmt_bind_result($validacion1, $id_equipo_medicion);
    mysqli_stmt_fetch($validacion1);
   
    if (mysqli_stmt_num_rows($validacion1) > 0){
        echo "Existe";
    }else{
        $insertar = mysqli_prepare($connect,"INSERT INTO equipos_mediciones (id_equipo , id_asignado, categoria, tipo_prueba) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($insertar, 'iiis', $id_equipo, $id_asignado_salas, $camara_categoria, $tipo_prueba);
        mysqli_stmt_execute($insertar);

        if($insertar){
            echo "Listo";
        }
    }
}

else if($proceso == 4){

    $id_informe = $_POST['id_informe'];
    $array_equipos_medicion = array();

     
    $consultar_equipos = mysqli_prepare($connect,"SELECT b.id_equipo_medicion, a.nombre_equipo, b.tipo_prueba FROM equipos_cercal as a, equipos_mediciones as b WHERE a.id_equipo_cercal = b.id_equipo AND b.id_informe = ?");
    mysqli_stmt_bind_param($consultar_equipos, 'i', $id_informe);
    mysqli_stmt_execute($consultar_equipos);
    mysqli_stmt_store_result($consultar_equipos);
    mysqli_stmt_bind_result($consultar_equipos, $id_equipo_medicion, $nombre_equipo, $tipo_prueba);
    

    while($row = mysqli_stmt_fetch($consultar_equipos)){

        $array_equipos_medicion[] = array(
            'id_medicion'=>$id_equipo_medicion,
            'nombre_equipo'=>$nombre_equipo,
            'tipo_prueba'=>$tipo_prueba
        );
    }

    $convert = json_encode($array_equipos_medicion);
    echo $convert;
    
}
else if($proceso == 44){

    $id_asignado = $_POST['id_asignado'];
    $array_equipos_medicion = array();

     
    $consultar_equipos = mysqli_prepare($connect,"SELECT b.id_equipo_medicion, a.nombre_equipo, b.tipo_prueba FROM equipos_cercal as a, equipos_mediciones as b WHERE a.id_equipo_cercal = b.id_equipo AND b.id_asignado = ?");
    mysqli_stmt_bind_param($consultar_equipos, 'i', $id_asignado);
    mysqli_stmt_execute($consultar_equipos);
    mysqli_stmt_store_result($consultar_equipos);
    mysqli_stmt_bind_result($consultar_equipos, $id_equipo_medicion, $nombre_equipo, $tipo_prueba);
    

    while($row = mysqli_stmt_fetch($consultar_equipos)){

        $array_equipos_medicion[] = array(
            'id_medicion'=>$id_equipo_medicion,
            'nombre_equipo'=>$nombre_equipo,
            'tipo_prueba'=>$tipo_prueba
        );
    }

    $convert = json_encode($array_equipos_medicion);
    echo $convert;
    
}else if($proceso == 5){

    $id_medicion = $_POST['id_medicion'];
    
    $eliminar = mysqli_prepare($connect,"DELETE FROM equipos_mediciones WHERE id_equipo_medicion = ?");
    mysqli_stmt_bind_param($eliminar, 'i', $id_medicion);
    mysqli_stmt_execute($eliminar);

    if($eliminar){
        echo "Listo";
    }
    
}

mysqli_close($connect);




?>