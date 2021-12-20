<?php 

include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "Leer"){

    $array_informes = array();

    $id_mapeo = $_POST['id_mapeo'];
    $id_asignado = $_POST['id_asignado'];

    $consultar = mysqli_prepare($connect,"SELECT id_informe, nombre, tipo, fecha_registro FROM informes_general WHERE id_mapeo = ? AND id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'ii', $id_mapeo, $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_informe, $nombre, $tipo, $fecha_registro);

    while($row = mysqli_stmt_fetch($consultar)){

        $array_informes[]=array(
            'id_informe'=>$id_informe,
            'nombre'=>$nombre,
            'tipo'=>$tipo,
            'fecha_registro'=>$fecha_registro
        );
    }

    $convert = json_encode($array_informes);
    echo $convert;
    
}else if($movimiento == "crear_temp"){

    $id_mapeo = $_POST['id_mapeo'];
    $id_asignado = $_POST['id_asignado'];
    $id_usuario = $_POST['id_usuario'];
    $tipo = "TEMP";
    $consecutivo = "";

    $consulta_empresa = mysqli_prepare($connect,"SELECT a.sigla_empresa, a.sigla_pais, b.correlativo FROM empresa as a, item_asignado as b, item as c WHERE a.id_empresa = c.id_empresa AND c.id_item = b.id_item AND b.id_asignado  = ?");
    mysqli_stmt_bind_param($consulta_empresa, 'i', $id_asignado);
    mysqli_stmt_execute($consulta_empresa);
    mysqli_stmt_store_result($consulta_empresa);
    mysqli_stmt_bind_result($consulta_empresa, $sigla_empresa, $sigla_pais, $correlativo);
    mysqli_stmt_fetch($consulta_empresa);

    $consultar_informe = mysqli_prepare($connect, "SELECT id_informe FROM informes_general WHERE id_mapeo = ? AND id_asignado = ? AND tipo = ?");
    mysqli_stmt_bind_param($consultar_informe, 'iis', $id_mapeo, $id_asignado, $tipo);
    mysqli_stmt_execute($consultar_informe);
    mysqli_stmt_store_result($consultar_informe);
    mysqli_stmt_bind_result($consultar_informe, $id_informe);
    mysqli_stmt_fetch($consultar_informe);

    if(mysqli_stmt_num_rows($consultar_informe) > 0){
        echo "Existe";
    }else{

        $consultar_consecutivo = mysqli_prepare($connect, "SELECT temp_hum FROM informes_general WHERE id_asignado = ? AND tipo = ?");
        mysqli_stmt_bind_param($consultar_consecutivo , 'is', $id_asignado, $tipo);
        mysqli_stmt_execute($consultar_consecutivo);
        mysqli_stmt_store_result($consultar_consecutivo);
        mysqli_stmt_bind_result($consultar_consecutivo , $temp_hum);
        mysqli_stmt_fetch($consultar_consecutivo);

        if(mysqli_stmt_num_rows($consultar_consecutivo) == 0){
            $consecutivo = "01";
        }else{
            if($temp_hum <= 9){
                $consecutivo = "0".$temp_hum;
            }else{
                $consecutivo = $temp_hum;
            }
        }
     
        $nombre_informe = $sigla_pais.'-'.$correlativo.'-'.$sigla_empresa.'-TEM-'.$consecutivo;

        $insertando_informe = mysqli_prepare($connect,"INSERT INTO informes_general (nombre, temp_hum, tipo, id_mapeo, id_asignado, id_usuario) VALUES (?,?,?,?,?,?)");
        mysqli_stmt_bind_param($insertando_informe, 'sisiii', $nombre_informe, $consecutivo, $tipo, $id_mapeo, $id_asignado, $id_usuario);
        mysqli_stmt_execute($insertando_informe);

        if($insertando_informe){
            echo "Listo";
        }else{
            echo "No";
        }
    }

    
}else if($movimiento == "crear_hum"){

    $id_mapeo = $_POST['id_mapeo'];
    $id_asignado = $_POST['id_asignado'];
    $id_usuario = $_POST['id_usuario'];
    $tipo = "HUM";
    $consecutivo = "";

    $consulta_empresa = mysqli_prepare($connect,"SELECT a.sigla_empresa, a.sigla_pais, b.correlativo FROM empresa as a, item_asignado as b, item as c WHERE a.id_empresa = c.id_empresa AND c.id_item = b.id_item AND b.id_asignado  = ?");
    mysqli_stmt_bind_param($consulta_empresa, 'i', $id_asignado);
    mysqli_stmt_execute($consulta_empresa);
    mysqli_stmt_store_result($consulta_empresa);
    mysqli_stmt_bind_result($consulta_empresa, $sigla_empresa, $sigla_pais, $correlativo);
    mysqli_stmt_fetch($consulta_empresa);

    $consultar_informe = mysqli_prepare($connect, "SELECT id_informe FROM informes_general WHERE id_mapeo = ? AND id_asignado = ? AND tipo = ?");
    mysqli_stmt_bind_param($consultar_informe, 'iis', $id_mapeo, $id_asignado, $tipo);
    mysqli_stmt_execute($consultar_informe);
    mysqli_stmt_store_result($consultar_informe);
    mysqli_stmt_bind_result($consultar_informe, $id_informe);
    mysqli_stmt_fetch($consultar_informe);

    if(mysqli_stmt_num_rows($consultar_informe) > 0){
        echo "Existe";
    }else{

        $consultar_consecutivo = mysqli_prepare($connect, "SELECT temp_hum FROM informes_general WHERE id_asignado = ? AND tipo = ?");
        mysqli_stmt_bind_param($consultar_consecutivo , 'is', $id_asignado, $tipo);
        mysqli_stmt_execute($consultar_consecutivo);
        mysqli_stmt_store_result($consultar_consecutivo);
        mysqli_stmt_bind_result($consultar_consecutivo , $temp_hum);
        mysqli_stmt_fetch($consultar_consecutivo);

        if(mysqli_stmt_num_rows($consultar_consecutivo) == 0){
            $consecutivo = "01";
        }else{
            if($temp_hum <= 9){
                $consecutivo = "0".$temp_hum;
            }else{
                $consecutivo = $temp_hum;
            }
        }
     
        $nombre_informe = $sigla_pais.'-'.$correlativo.'-'.$sigla_empresa.'-HUM-'.$consecutivo;

        $insertando_informe = mysqli_prepare($connect,"INSERT INTO informes_general (nombre, temp_hum, tipo, id_mapeo, id_asignado, id_usuario) VALUES (?,?,?,?,?,?)");
        mysqli_stmt_bind_param($insertando_informe, 'sisiii', $nombre_informe, $consecutivo, $tipo, $id_mapeo, $id_asignado, $id_usuario);
        mysqli_stmt_execute($insertando_informe);

        if($insertando_informe){
            echo "Listo";
        }else{
            echo "No";
        }
    }

    
}else if($movimiento == "eliminar_informe"){

    $id_informe = $_POST['id_informe'];

    $delete = mysqli_prepare($connect,"DELETE FROM informes_general WHERE id_informe = ?");
    mysqli_stmt_bind_param($delete, 'i', $id_informe);
    mysqli_stmt_execute($delete);

    if($delete){
        echo "Si";
    }else{
        echo "No";
    }



}else if($movimiento == "Consultar_temp"){

    $id_informe = $_POST['id_informe'];
    $array_informes=array();

        
    $consultar_informes = mysqli_prepare($connect,"SELECT comentario, observacion, tipo FROM informes_general WHERE id_informe = ?");
    mysqli_stmt_bind_param($consultar_informes, 'i', $id_informe);
    mysqli_stmt_execute($consultar_informes);
    mysqli_stmt_store_result($consultar_informes);
    mysqli_stmt_bind_result($consultar_informes, $comentario, $observacion, $tipo);
    mysqli_stmt_fetch($consultar_informes);



    $consultar_imagenes_1 = mysqli_prepare($connect,"SELECT id_imagen, tipo, url FROM imagenes_general_informe WHERE id_informe = ? AND tipo = 1");
    mysqli_stmt_bind_param($consultar_imagenes_1, 'i', $id_informe);
    mysqli_stmt_execute($consultar_imagenes_1);
    mysqli_stmt_store_result($consultar_imagenes_1);
    mysqli_stmt_bind_result($consultar_imagenes_1, $id_imagen1, $tipo1, $url1);
    mysqli_stmt_fetch($consultar_imagenes_1);

    $consultar_imagenes_2 = mysqli_prepare($connect,"SELECT id_imagen, tipo, url FROM imagenes_general_informe WHERE id_informe = ? AND tipo = 1");
    mysqli_stmt_bind_param($consultar_imagenes_2, 'i', $id_informe);
    mysqli_stmt_execute($consultar_imagenes_2);
    mysqli_stmt_store_result($consultar_imagenes_2);
    mysqli_stmt_bind_result($consultar_imagenes_2, $id_imagen2, $tipo2, $url2);
    mysqli_stmt_fetch($consultar_imagenes_2);

    $consultar_imagenes_3 = mysqli_prepare($connect,"SELECT id_imagen, tipo, url FROM imagenes_general_informe WHERE id_informe = ? AND tipo = 1");
    mysqli_stmt_bind_param($consultar_imagenes_3, 'i', $id_informe);
    mysqli_stmt_execute($consultar_imagenes_3);
    mysqli_stmt_store_result($consultar_imagenes_3);
    mysqli_stmt_bind_result($consultar_imagenes_3, $id_imagen3, $tipo3, $url3);
    mysqli_stmt_fetch($consultar_imagenes_3);

    $array_informes[]=array(
        'comentario'=>$comentario,
        'observacion'=>$observacion,
        'id_imagen1'=>$id_imagen1,
        'tipo1'=>$tipo1,
        'url1'=>$url1,
        'id_imagen2'=>$id_imagen2,
        'tipo2'=>$tipo2,
        'url2'=>$url2, 
        'id_imagen3'=>$id_imagen3,
        'tipo3'=>$tipo3,
        'url3'=>$url3,
        'tipo_informe'=>$tipo
    );

    $convert = json_encode($array_informes);
    echo $convert;
    
}

mysqli_close($connect);

?>