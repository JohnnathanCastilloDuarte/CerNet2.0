<?php 
error_reporting(0);
include('../../config.ini.php');

$array_empresas = array();


$query = mysqli_prepare($connect,"SELECT id_empresa, nombre FROM empresa");
mysqli_stmt_execute($query);
mysqli_stmt_store_result($query);
mysqli_stmt_bind_result($query, $id_empresa, $nombre);

while($row = mysqli_stmt_fetch($query)){

    $array_empresas[] = array(
        'id_empresa'=>$id_empresa,
        'nombre'=>$nombre
    );
}


$convert = json_encode($array_empresas);

echo $convert;

?>