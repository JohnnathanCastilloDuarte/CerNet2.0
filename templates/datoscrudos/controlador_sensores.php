<?php 

include ("../../config.ini.php");

$id_mapeo = $_POST['id_mapeo'];
$id_asignado = $_POST['id_asignado'];
$valor = $_POST['valor'];
$array_sensores = array();




if($valor == 1){

    $query1 = mysqli_prepare($connect,"SELECT c.nombre FROM item_asignado as a, item as b, tipo_item as c WHERE a.id_asignado = ? AND 
    a.id_item = b.id_item AND b.id_tipo = c.id_item");
    mysqli_stmt_bind_param($query1, 'i', $id_asignado);
    mysqli_stmt_execute($query1);
    mysqli_stmt_store_result($query1);
    mysqli_stmt_bind_result($query1, $nombre);
    mysqli_stmt_fetch($query1);

    switch ($nombre) {
        case 'UltraFreezer':

            $estado = "";
          
            $query_sensor = mysqli_prepare($connect,"SELECT a.nombre, b.id_ultrafreezer_sensor, b.datos_crudos  FROM sensores as a, ultrafreezer_sensor as b 
            WHERE a.id_sensor = b.id_sensor AND b.id_mapeo = ? AND id_asignado = ?");
            mysqli_stmt_bind_param($query_sensor, 'ii', $id_mapeo, $id_asignado);
            mysqli_stmt_execute($query_sensor);
            mysqli_stmt_store_result($query_sensor);
            mysqli_stmt_bind_result($query_sensor, $nombre_sensor, $id_sensor, $datos_crudos);

            while($row = mysqli_stmt_fetch($query_sensor)){
                

                

                $array_sensores[] = array(
                    'id_sensor'=>$id_sensor,
                    'nombre'=>$nombre_sensor
                );
            }

            $convert = json_encode($array_sensores);
            echo $convert;
            
            break;

    }



}

?>