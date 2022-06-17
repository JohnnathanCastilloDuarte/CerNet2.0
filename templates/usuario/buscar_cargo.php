<?php 

include('../../config.ini.php');

$array_cargos = array();

$consultar_cargos = mysqli_prepare($connect,"SELECT id_cargo, nombre FROM cargo ORDER BY nombre ASC");
mysqli_stmt_execute($consultar_cargos);
mysqli_stmt_store_result($consultar_cargos);
mysqli_stmt_bind_result($consultar_cargos, $id_cargo, $nombre);

while($row = mysqli_stmt_fetch($consultar_cargos)){

    $array_cargos[] = array(

        'id_cargo'=>$id_cargo,
        'cargo'=>$nombre
    );
}

$convert = json_encode($array_cargos);

echo $convert;

mysqli_close($connect);

?>