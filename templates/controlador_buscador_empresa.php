<?php
include('../config.ini.php');

$buscar = $_POST['buscar'];
$array_empresa = array();

$consultar_empresas = mysqli_prepare($connect,"SELECT id_empresa, nombre FROM empresa WHERE nombre LIKE CONCAT('%',?,'%')");
mysqli_stmt_bind_param($consultar_empresas, 's', $buscar);
mysqli_stmt_execute($consultar_empresas);
mysqli_stmt_store_result($consultar_empresas);
mysqli_stmt_bind_result($consultar_empresas, $id_empresa, $nombre_empresa);

echo mysqli_stmt_error($consultar_empresas);


while($row = mysqli_stmt_fetch($consultar_empresas)){

    $array_empresa[] = array(
        'id_empresa'=>$id_empresa,
        'nombre'=>$nombre_empresa
    );
}


$convert = json_encode($array_empresa);
echo $convert;

mysqli_close($connect);
?>