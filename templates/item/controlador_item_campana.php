<?php 

include('../../config.ini.php');

$tipo_controlador = $_POST['tipo_controlador'];


if($tipo_controlador == "Crear"){
 
  
    $nombre_campana = $_POST['nombre_campana'];
    $empresa_campana = $_POST['empresa_campana'];
    $ubicacion_campana  = $_POST['ubicacion_campana'];
    $direccion_campana = $_POST['direccion_campana'];
    $tipo_campana = $_POST['tipo_campana'];
    $marca_campana = $_POST['marca_campana'];
    $modelo_campana = $_POST['modelo_campana'];
    $codigo_interno_campana = $_POST['codigo_interno_campana'];
    $serie_campana = $_POST['serie_campana'];
    $fecha_fabricacion_campana = $_POST['fecha_fabricacion_campana'];
    $velocidad_aire_campana = $_POST['velocidad_aire_campana'];
    $id_type_campana = $_POST['id_type_campana'];
    $id_usuario = $_POST['id_usuario'];

  
    $insertando_item = mysqli_prepare($connect,"INSERT INTO item (id_empresa, id_tipo, nombre,  estado, id_usuario) VALUES (?, ?, ?, 1, ?)");
    mysqli_stmt_bind_param($insertando_item, 'iisi', $empresa_campana, $id_type_campana, $nombre_campana, $id_usuario);
    mysqli_stmt_execute($insertando_item);
    $id_item =  mysqli_stmt_insert_id($insertando_item);

    if($insertando_item){
        
        $insertando_campana = mysqli_prepare($connect,"INSERT INTO item_campana(id_item, tipo, marca, modelo, serie, codigo, ubicado_en, ubicacion, requisito_velocidad) VALUES (?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($insertando_campana, 'issssssss', $id_item, $tipo_campana, $marca_campana, $modelo_campana, $serie_campana, $codigo_interno_campana, $ubicacion_campana, $direccion_campana, $velocidad_aire_campana);
        mysqli_stmt_execute($insertando_campana);

        if($insertando_campana){
            echo "Si";
        }
    }

}else if($tipo_controlador == "Actualizar"){

    $nombre_campana = $_POST['nombre_campana'];
    $ubicacion_campana  = $_POST['ubicacion_campana'];
    $direccion_campana = $_POST['direccion_campana'];
    $tipo_campana = $_POST['tipo_campana'];
    $marca_campana = $_POST['marca_campana'];
    $modelo_campana = $_POST['modelo_campana'];
    $codigo_interno_campana = $_POST['codigo_interno_campana'];
    $serie_campana = $_POST['serie_campana'];
    $fecha_fabricacion_campana = $_POST['fecha_fabricacion_campana'];
    $velocidad_aire_campana = $_POST['velocidad_aire_campana'];
    $id_item_campana = $_POST['id_item_campana'];

    $array_campana = array();

    $update_item = mysqli_prepare($connect,"UPDATE item SET  nombre=? WHERE id_item = ?");
    mysqli_stmt_bind_param($update_item, 'si', $nombre_campana, $id_item_campana);
    mysqli_stmt_execute($update_item);

    if($update_item){
        $consultar_id_campana = mysqli_prepare($connect,"SELECT id_campana FROM item_campana WHERE id_item = ?");
        mysqli_stmt_bind_param($consultar_id_campana, 'i', $id_item_campana);
        mysqli_stmt_execute($consultar_id_campana);
        mysqli_stmt_store_result($consultar_id_campana);
        mysqli_stmt_bind_result($consultar_id_campana, $id_campana);
        mysqli_stmt_fetch($consultar_id_campana);

        $actualizar_campana = mysqli_prepare($connect, "UPDATE item_campana SET tipo = ?,  marca= ?, modelo=?, serie=?, codigo=?, ubicado_en= ?, ubicacion= ?,requisito_velocidad= ? WHERE id_campana = ?");
        mysqli_stmt_bind_param($actualizar_campana, 'ssssssssi', $tipo_campana, $marca_campana, $modelo_campana, $serie_campana, $codigo_interno_campana, $ubicacion_campana, $direccion_campana, $velocidad_aire_campana, $id_campana);
        mysqli_stmt_execute($actualizar_campana);

        if($actualizar_campana){
            echo "Si";
        }
    }

}else if($tipo_controlador == "Leer"){
  
    $id_item_campana = $_POST['id_item_campana'];

    $leer_campana = mysqli_prepare($connect,"SELECT a.id_empresa, a.nombre, b.nombre, c.tipo,  c.marca, c.modelo, c.serie, c.codigo, c.ubicado_en, c.ubicacion, c.requisito_velocidad 
                                            FROM empresa as a, item as b, item_campana as c WHERE a.id_empresa = b.id_empresa AND b.id_item = c.id_item AND c.id_item = ?");
    mysqli_stmt_bind_param($leer_campana, 'i', $id_item_campana);
    mysqli_stmt_execute($leer_campana);
    mysqli_stmt_store_result($leer_campana);
    mysqli_stmt_bind_result($leer_campana, $id_empresa, $nombre_empresa, $nombre_campana, $tipo, $marca, $modelo, $serie, $codigo, $ubicado_en, $ubicacion, $requisito_velocidad);

    while($row = mysqli_stmt_fetch($leer_campana)){

        $array_campana[] = array(

            'id_empresa'=>$id_empresa,
            'nombre_empresa'=>$nombre_empresa,
            'nombre_campana'=>$nombre_campana,
            'tipo'=>$tipo,
            'marca'=>$marca,
            'modelo'=>$modelo,
            'serie'=>$serie,
            'codigo'=>$codigo,
            'ubicado_en'=>$ubicado_en,
            'ubicacion'=>$ubicacion,
            'requisito_velocidad'=>$requisito_velocidad

        );
    }

    $convert = json_encode($array_campana[0]);

    echo $convert;
}



mysqli_close($connect);
?>