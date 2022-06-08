<?php 
    
    include("../../config.ini.php");

    $nombre_campana = $_POST['nombre_campana'];
    $id_empresa = $_POST['empresa_campana'];
    $ubicacion_campana  = $_POST['ubicacion_campana'];
    $direccion_campana = $_POST['direccion_campana'];
    $tipo_campana = $_POST['tipo_campana'];
    $marca_campana = $_POST['marca_campana'];
    $area_interna = $_POST['area_interna'];
    $modelo_campana = $_POST['modelo_campana'];
    $codigo_interno_campana = $_POST['codigo_interno_campana'];
    $serie_campana = $_POST['serie_campana'];
    $fecha_fabricacion_campana = $_POST['fecha_fabricacion_campana'];
    $velocidad_aire_campana = $_POST['velocidad_aire_campana'];
    $id_item_campana = $_POST['id_item_campana'];
    $tem_min = $_POST['tem_min'];
    $tem_max = $_POST['tem_max'];
    $hum_min = $_POST['hum_min'];
    $hum_max = $_POST['hum_max'];
    $presion_sonora_equipo = $_POST['presion_sonora_equipo'];
    $presion_sonora_sala = $_POST['presion_sonora_sala'];
    $nivel_iluminacion = $_POST['nivel_iluminacion'];
    $prueba_humo = $_POST['#prueba_humo'];

     if ($fecha_fabricacion_campana == "" || $fecha_fabricacion_campana == NULL) {
        
        $fecha_fabricacion = "NA"; 
    }else{

        $fecha_fabricacion = $_POST['fecha_fabricacion_campana'];
    }

    $array_campana = array();

    $update_item = mysqli_prepare($connect,"UPDATE item SET  nombre=?, id_empresa = ? WHERE id_item = ?");
    mysqli_stmt_bind_param($update_item, 'sii', $nombre_campana, $id_empresa, $id_item_campana);
    mysqli_stmt_execute($update_item);


    if($update_item){
        $consultar_id_campana = mysqli_prepare($connect,"SELECT id_campana FROM item_campana WHERE id_item = ?");
        mysqli_stmt_bind_param($consultar_id_campana, 'i', $id_item_campana);
        mysqli_stmt_execute($consultar_id_campana);
        mysqli_stmt_store_result($consultar_id_campana);
        mysqli_stmt_bind_result($consultar_id_campana, $id_campana);
        mysqli_stmt_fetch($consultar_id_campana);

        $actualizar_campana = mysqli_prepare($connect, "UPDATE item_campana SET tipo = ?,  marca =?, modelo=?, serie=?, codigo=?, ubicacion_interna= ?, area_interna = ?, direccion= ?,requisito_velocidad= ?,fecha_fabricacion = ?, tem_min = ?, tem_max = ?, hum_min = ?, hum_max = ?, presion_sonora_equipo = ?, presion_sonora_sala = ?, nivel_iluminacion = ?, prueba_humo = ? WHERE id_campana = ?");
        mysqli_stmt_bind_param($actualizar_campana, 'ssssssssssssssssssi', $tipo_campana, $marca_campana, $modelo_campana, $serie_campana, $codigo_interno_campana, $ubicacion_campana, $area_interna ,$direccion_campana, $velocidad_aire_campana, $fecha_fabricacion, $tem_min, $tem_max, $hum_min, $hum_max, $presion_sonora_equipo, $presion_sonora_sala, $nivel_iluminacion, $prueba_humo, $id_campana);
        mysqli_stmt_execute($actualizar_campana);

        if($actualizar_campana){
            echo "Si";
        }else{
            echo "No";
        }
    }else{
          echo "error";
    }

 ?>