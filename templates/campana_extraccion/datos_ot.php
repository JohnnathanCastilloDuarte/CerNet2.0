<?php

include('../../config.ini.php');
$array_ot = array();
$id_asignado = $_POST['id_asignado'];

$query1 = mysqli_prepare($connect,"SELECT c.numot, d.nombre, d.direccion, d.sigla_pais FROM item_asignado as a, servicio as b, numot as c, empresa as d 
                               WHERE a.id_asignado = ? AND a.id_servicio = b.id_servicio AND b.id_numot = c.id_numot AND 
                                    c.id_empresa = d.id_empresa");

mysqli_stmt_bind_param($query1, 'i', $id_asignado);
mysqli_stmt_execute($query1);
mysqli_stmt_store_result($query1);
mysqli_stmt_bind_result($query1, $ot, $cliente, $ubicacion, $sigla_pais);
mysqli_stmt_fetch($query1);

$num_ot = substr($ot, 2) ;

$query2 = mysqli_prepare($connect,"SELECT b.nombre
                                  FROM item_asignado as a, item as b, item_campana as c WHERE a.id_asignado = ? AND a.id_item = b.id_item AND b.id_item = c.id_item");
mysqli_stmt_bind_param($query2, 'i', $id_asignado);
mysqli_stmt_execute($query2);
mysqli_stmt_store_result($query2);
mysqli_stmt_bind_result($query2, $filtro);
mysqli_stmt_fetch($query2);

$array_ot[] = array(
'ot'=>$ot,
'cliente'=>$cliente,
'sigla_pais'=>$sigla_pais,
'ubicacion'=>$ubicacion,
'num_ot'=>$num_ot
);

$convert = json_encode($array_ot);

echo $convert;
mysqli_close($connect);
?>