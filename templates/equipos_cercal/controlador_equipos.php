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
}

mysqli_close($connect);




?>