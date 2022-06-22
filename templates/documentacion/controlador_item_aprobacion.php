<?php 
include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "Leer_items"){

    $id_documentacion = $_POST['id_documentacion_d'];
    $array_lista_item = array();
    $indicador = 0;

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
    $url = "item/pdf/pdf/pdf_item.php";


    // valido que no exista el mismo item para validar
    $validando  = mysqli_prepare($connect, 'SELECT id FROM archivos_documentacion WHERE id_documentacion = ?');
    mysqli_stmt_bind_param($validando, 'i', $id_documentacion);
    mysqli_stmt_execute($validando);
    mysqli_stmt_store_result($validando);
    mysqli_stmt_bind_result($validando, $id);
    mysqli_stmt_fetch($validando);

    if(mysqli_stmt_num_rows($validando)>0){
        echo "Existe";
    }else{
        $insertando = mysqli_prepare($connect, "INSERT INTO archivos_documentacion (id_documentacion, url, nombre_archivo) VALUES (?,?,?)");
        mysqli_stmt_bind_param($insertando, 'iss', $id_documentacion, $url, $id_item);
        mysqli_stmt_execute($insertando);
        if($insertando){
            //// Actualizo el estado del ITEM 
            $estado = 2;
            $update_estado = mysqli_prepare($connect,"UPDATE item SET estado = ? WHERE id_item = ?");
            mysqli_stmt_bind_param($update_estado, 'ii', $estado, $id_item);
            mysqli_stmt_execute($update_estado);

            if($update_estado){
                echo "Listo";
            }
        }
    }

    
}

else if($movimiento == "Cancelar_aprobacion"){  

    $id_item = $_POST['id_item'];
    $id_documentacion = $_POST['id_documentacion_d'];


    $consultar_document = mysqli_prepare($connect,"SELECT id FROM archivos_documentacion WHERE id_documentacion = ? AND nombre_archivo = ?");
    mysqli_stmt_bind_param($consultar_document, 'is', $id_documentacion, $id_item);
    mysqli_stmt_execute($consultar_document);
    mysqli_stmt_store_result($consultar_document);
    mysqli_stmt_bind_result($consultar_document, $id);
    mysqli_stmt_fetch($consultar_document);

    $eliminar_document = mysqli_prepare($connect,"DELETE FROM archivos_documentacion WHERE id = ?");
    mysqli_stmt_bind_param($eliminar_document, 'i', $id);
    mysqli_stmt_execute($eliminar_document);

    if($eliminar_document){
        $estado = 0;
        $update_estado = mysqli_prepare($connect,"UPDATE item SET estado = ? WHERE id_item = ?");
        mysqli_stmt_bind_param($update_estado, 'ii', $estado, $id_item);
        mysqli_stmt_execute($update_estado);

        if($update_estado){
            echo "Listo";
        }
    }


}

?>