<?php 
include('../../../config.ini.php');

$movimiento = $_POST['movimiento'];
$id_informe = $_POST['id_informe'];

if($movimiento == "listar_datos_1"){

    $array_informacion = array();

    $consultar = mysqli_prepare($connect,"SELECT a.id, a.anexo_planos, d.funcion_item, d.id_item FROM calificacion_dq_datos_1 as a, calificacion_control_informe  as b, item_asignado as c, item as d WHERE a.id_informe = ? AND a.id_informe = b.id_informe AND b.id_asignado = c.id_asignado AND c.id_item = d.id_item");
    mysqli_stmt_bind_param($consultar, 'i', $id_informe);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id, $anexo_planos, $funcion_item, $id_item);

    while($row = mysqli_stmt_fetch($consultar)){

        $array_informacion[]=array(
            'id'=>$id,
            'anexo_planos'=>$anexo_planos,
            'funcion_item'=>$funcion_item,
            'id_item'=>$id_item
        );
    }

    $convert = json_encode($array_informacion);

    echo $convert;

}else if($movimiento == "Crear_sistema"){
    $nombre_sistema = $_POST['nombre_sistema'];
    $descripcion = $_POST['descripcion'];

    $validar = mysqli_prepare($connect,"SELECT id_sistema FROM sistema_apoyo WHERE nombre = ? AND descripcion = ?");
    mysqli_stmt_bind_param($validar, 'ss', $nombre_sistema, $descripcion);
    mysqli_stmt_execute($validar);
    mysqli_stmt_store_result($validar);
    mysqli_stmt_bind_result($validar, $id_sistema);
    mysqli_stmt_fetch($validar);

    if(mysqli_stmt_num_rows($validar) > 0){
        echo "Existe";
    }else{
        $insertar = mysqli_prepare($connect,"INSERT INTO sistema_apoyo (nombre, descripcion) VALUES (?,?)");
        mysqli_stmt_bind_param($insertar, 'ss', $nombre_sistema, $descripcion);
        mysqli_stmt_execute($insertar);
        if($insertar){
            echo "Insertado";
        }
    }


}else if($movimiento == "Listar_equipos_apoyo"){

    $array_informacion = array();

    $buscando = mysqli_prepare($connect,"SELECT id_sistema, nombre, descripcion FROM sistema_apoyo ORDER BY nombre ASC");
    mysqli_stmt_execute($buscando);
    mysqli_stmt_store_result($buscando);
    mysqli_stmt_bind_result($buscando, $id_sistema, $nombre, $descripcion);

    while($row = mysqli_stmt_fetch($buscando)){

        $array_informacion[] = array(
            'id_sistema'=>$id_sistema,
            'nombre'=>$nombre,
            'descripcion'=>$descripcion
        );

    }

    $convert = json_encode($array_informacion);
    echo $convert;

}else if($movimiento == "seleccionar_sistema"){

    $id_dato = $_POST['id_dato'];
    $id_sistema = $_POST['id_sistema'];

    $validar = mysqli_prepare($connect,"SELECT id_relacion FROM sistema_apoyo_relacion WHERE id_sistema = ? AND id_dato = ?");
    mysqli_stmt_bind_param($validar, 'ii', $id_sistema, $id_dato);
    mysqli_stmt_execute($validar);
    mysqli_stmt_store_result($validar);
    mysqli_stmt_bind_result($validar, $id_relacion);
    mysqli_stmt_fetch($validar);

    if(mysqli_stmt_num_rows($validar) > 0){
        echo "Existe";
    }else{
        $insertar = mysqli_prepare($connect,"INSERT INTO sistema_apoyo_relacion (id_sistema, id_dato) VALUES (?, ?)");
        mysqli_stmt_bind_param($insertar, 'ii', $id_sistema, $id_dato);
        mysqli_stmt_execute($insertar);

        if($insertar){
            echo "Listo";
        }
    }

}else if($movimiento == "Listar_asignados_apoyo"){

    $id_dato = $_POST['id_dato'];
    $array_informacion = array();

    $consultar = mysqli_prepare($connect,"SELECT a.id_relacion, b.nombre FROM sistema_apoyo_relacion as a, sistema_apoyo as b WHERE a.id_dato = ? AND a.id_sistema = b.id_sistema");
    mysqli_stmt_bind_param($consultar, 'i', $id_dato);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_relacion, $nombre_sistema);
    
    while($row = mysqli_stmt_fetch($consultar)){
        $array_informacion[] = array(
            'id_relacion'=>$id_relacion,
            'nombre_sistema'=>$nombre_sistema
        );
    }

    $convert = json_encode($array_informacion);
    echo $convert;


}else if($movimiento == "eliminar_sistema_asignado"){

    $id_sistema_asignado = $_POST['id_sistema_asignado'];

    $eliminar = mysqli_prepare($connect,"DELETE FROM sistema_apoyo_relacion WHERE id_relacion = ?");
    mysqli_stmt_bind_param($eliminar, 'i', $id_sistema_asignado);
    mysqli_stmt_execute($eliminar);

    if($eliminar){
        echo "Listo";
    }
    
}else if($movimiento == "Eliminar_sistema"){

    $id_sistema = $_POST['id_sistema'];

    $consultar_asociados = mysqli_prepare($connect,"SELECT id_relacion FROM sistema_apoyo_relacion WHERE id_sistema = ?");
    mysqli_stmt_bind_param($consultar_asociados, 'i', $id_sistema);
    mysqli_stmt_execute($consultar_asociados);
    mysqli_stmt_store_result($consultar_asociados);
    mysqli_stmt_bind_result($consultar_asociados, $id_relacion);
   
    while($row = mysqli_stmt_fetch($consultar_asociados)){

        $eliminar = mysqli_prepare($connect,"DELETE FROM sistema_apoyo_relacion WHERE id_relacion = ?");
        mysqli_stmt_bind_param($eliminar, 'i', $id_relacion);
        mysqli_stmt_execute($eliminar);
    }

    $eliminar_sistema = mysqli_prepare($connect,"DELETE FROM sistema_apoyo WHERE id_sistema = ?");
    mysqli_stmt_bind_param($eliminar_sistema, 'i', $id_sistema);
    mysqli_stmt_execute($eliminar_sistema);

    if($eliminar_sistema){
        echo "listo";
    }


}else if($movimiento == "actualizar_informacion_datos_1"){
        
        $funcion_dq = $_POST['funcion_dq'];
        $anexo_alcance = $_POST['anexo_alcance'];
        $anexo_leyenda = $_POST['anexo_leyenda'];
        $id_datos_1 = $_POST['id_datos_1'];

        $capturando_id_item = mysqli_prepare($connect,"SELECT b.id_item FROM calificacion_control_informe as a, item_asignado as b WHERE a.id_informe = ? AND a.id_asignado = b.id_asignado");
        mysqli_stmt_bind_param($capturando_id_item, 'i', $id_informe);
        mysqli_stmt_execute($capturando_id_item);
        mysqli_stmt_store_result($capturando_id_item);
        mysqli_stmt_bind_result($capturando_id_item, $id_item);
        mysqli_stmt_fetch($capturando_id_item);
      
        $modificar_item = mysqli_prepare($connect,"UPDATE item SET funcion_item = ? WHERE id_item = ?");
        mysqli_stmt_bind_param($modificar_item, 'si', $funcion_dq, $id_item);
        mysqli_stmt_execute($modificar_item);
        
        if($modificar_item){
            $modificar_informe_dato = mysqli_prepare($connect,"UPDATE calificacion_dq_datos_1 SET anexo_planos = ? WHERE id = ?");
            mysqli_stmt_bind_param($modificar_informe_dato, 'si', $anexo_leyenda, $id_datos_1);
            mysqli_stmt_execute($modificar_informe_dato);
            if($modificar_informe_dato){
                echo "Listo";
            }else{
                echo "Error dato";
            }
        }else{
            echo "Error item";
        }

        

}




mysqli_close($connect);
?>