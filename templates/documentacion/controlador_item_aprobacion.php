<?php 
include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "Leer_items"){

    $id_documentacion = $_POST['id_documentacion_d'];
    $array_lista_item = array();

    $consultar_lista_equipos = mysqli_prepare($connect, "SELECT a.clasificacion_item, a.nombre, a.id_item, a.fecha_registro, a.estado FROM item as a, documentacion as b, numot as c, empresa as d WHERE b.id = ? AND  b.id_numot = c.id_numot AND c.id_empresa = d.id_empresa AND d.id_empresa = a.id_empresa");
   
    mysqli_stmt_bind_param($consultar_lista_equipos, 'i', $id_documentacion);
    mysqli_stmt_execute($consultar_lista_equipos);
    mysqli_stmt_store_result($consultar_lista_equipos);
    mysqli_stmt_bind_result($consultar_lista_equipos, $clasificacion_item, $nombre, $id_item, $fecha_registro, $estado);

    
    while($row = mysqli_stmt_fetch($consultar_lista_equipos)){

        $array_lista_item[] = array(
            'id_item'=>$id_item,
            'clasificacion'=>$clasificacion_item,
            'nombre'=>$nombre,
            'fecha_registro'=>$fecha_registro,
            'estado'=>$estado
        );
    }

    $convert = json_encode($array_lista_item);
    echo $convert;

  
}else if($movimiento == "Seleccionar"){

    $id_item = $_POST['id_item'];
    $id_documentacion = $_POST['id_documentacion_d'];

    
}

?>