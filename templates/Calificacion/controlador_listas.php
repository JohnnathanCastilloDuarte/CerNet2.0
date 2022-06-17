<?php 
include('../../config.ini.php');

$id_asignado_calificaciones = $_POST['id_asignado_calificaciones'];
$movimiento = $_POST['movimiento'];

if($movimiento == "Listar_informes"){

    $array_informes = array();
    $consultar = mysqli_prepare($connect,"SELECT a.id_informe, a.nombre_informe, a.tipo_informe, a.fecha_registro, d.nombre FROM calificacion_control_informe as a, item_asignado as b, item as c, empresa as d  WHERE a.id_asignado = ? AND a.id_asignado = b.id_asignado AND b.id_item = c.id_item AND c.id_empresa = d.id_empresa");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado_calificaciones);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_informe, $nombre_informe, $tipo_informe, $fecha_registro, $empresa);

    while($row = mysqli_stmt_fetch($consultar)){
        
        $array_informes[] =array(
            'id_informe'=>$id_informe,
            'nombre_informe'=>$nombre_informe,
            'tipo_informe'=>$tipo_informe,
            'fecha_registro'=>$fecha_registro,
            'empresa'=>$empresa
        );
    }

    $convert = json_encode($array_informes);
    echo $convert;

}else if($movimiento == "Eliminar_informe"){

    $id_informe = $_POST['id_informe'];

    $eliminar = mysqli_prepare($connect,"DELETE FROM calificacion_control_informe WHERE id_informe = ?");
    mysqli_stmt_bind_param($eliminar, 'i', $id_informe);
    mysqli_stmt_execute($eliminar);
    if($eliminar){
      
        $consultar_info_tabla_datos = mysqli_prepare($connect,"SELECT id FROM calificacion_dq_datos_1 WHERE id_informe = ?");
        mysqli_stmt_bind_param($consultar_info_tabla_datos, 'i', $id_informe);
        mysqli_stmt_execute($consultar_info_tabla_datos);
        mysqli_stmt_store_result($consultar_info_tabla_datos);
        mysqli_stmt_bind_result($consultar_info_tabla_datos, $id_dato);
        mysqli_stmt_fetch($consultar_info_tabla_datos);

        $eliminar_datos = mysqli_prepare($connect,"DELETE FROM calificacion_dq_datos_1 WHERE id = ?");
        mysqli_stmt_bind_param($eliminar_datos, 'i', $id_dato);
        mysqli_stmt_execute($eliminar_datos);

        if($eliminar_datos){
            echo "Eliminado";
        }

    }else{
        echo "Problemas";
    }
}
?>