<?php 

include('../../config.ini.php');


    $nombre_campana            = $_POST['nombre_campana'];
    $empresa_campana           = $_POST['empresa_campana'];
    $ubicacion_campana         = $_POST['ubicacion_campana'];
    $direccion_campana         = $_POST['direccion_campana'];
    $tipo_campana              = $_POST['tipo_campana'];
    $area_interna              = $_POST['area_interna'];
    $marca_campana             = $_POST['marca_campana'];
    $modelo_campana            = $_POST['modelo_campana'];
    $codigo_interno_campana    = $_POST['codigo_interno_campana'];
    $serie_campana             = $_POST['serie_campana'];
    $fecha_fabricacion_campana = $_POST['fecha_fabricacion_campana'];
    $velocidad_aire_campana    = $_POST['velocidad_aire_campana'];
    $id_type_campana           = $_POST['id_type_campana'];
    $id_usuario                = $_POST['id_usuario'];

    if ($fecha_fabricacion_campana == "" || $fecha_fabricacion_campana == NULL) {
        
        $fecha_fabricacion = "NA"; 
    }else{

        $fecha_fabricacion = $_POST['fecha_fabricacion_campana'];
    }
 
    $insertando_item = mysqli_prepare($connect,"INSERT INTO item (id_empresa, id_tipo, nombre,  estado, id_usuario) VALUES (?, ?, ?, 1, ?)");
    mysqli_stmt_bind_param($insertando_item, 'iisi', $empresa_campana, $id_type_campana, $nombre_campana, $id_usuario);
    mysqli_stmt_execute($insertando_item);
    $id_item =  mysqli_stmt_insert_id($insertando_item);
    

    echo mysqli_stmt_error($insertando_item);

    if($insertando_item){

         $insertando_campana = mysqli_prepare($connect,"INSERT INTO item_campana(id_item, tipo, marca, modelo, serie, codigo, ubicacion_interna,area_interna, direccion, requisito_velocidad, fecha_fabricacion) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($insertando_campana, 'issssssssss', $id_item, $tipo_campana, $marca_campana, $modelo_campana, $serie_campana, $codigo_interno_campana, $ubicacion_campana, $area_interna, $direccion_campana, $velocidad_aire_campana, $fecha_fabricacion);
        mysqli_stmt_execute($insertando_campana);
        
       // echo "INSERT INTO item_campana(id_item, tipo, marca, modelo, serie, codigo, ubicacion_interna,area_interna, direccion, requisito_velocidad, fecha_fabricacion) VALUES ($id_item, $tipo_campana, $marca_campana, $modelo_campana, $serie_campana, $codigo_interno_campana, $ubicacion_campana, $area_interna, $direccion_campana, $velocidad_aire_campana, $fecha_fabricacion)";
      
        if($insertando_campana){
            echo "Si";
        }else{
            echo "No";
          echo mysqli_stmt_error($insertando_campana);
        }
    }

mysqli_close($connect);
?>