<?php

include('../../config.ini.php');
$array_ot = array();
$id_asignado_filtro = $_POST['id_asignado_filtro'];

$query1 = mysqli_prepare($connect,"SELECT c.numot, d.nombre, d.direccion FROM item_asignado as a, servicio as b, numot as c, empresa as d 
                                    WHERE a.id_asignado = ? AND a.id_servicio = b.id_servicio AND b.id_numot = c.id_numot AND 
                                    c.id_empresa = d.id_empresa");

mysqli_stmt_bind_param($query1, 'i', $id_asignado_filtro);
mysqli_stmt_execute($query1);
mysqli_stmt_store_result($query1);
mysqli_stmt_bind_result($query1, $ot, $cliente, $ubicacion);
mysqli_stmt_fetch($query1);

$query2 = mysqli_prepare($connect,"SELECT b.nombre, c.marca, c.modelo, c.serie, c.cantidad_filtro, c.ubicacion, c.ubicado_en, c.filtro_dimension, c.tipo_filtro
                                  FROM item_asignado as a, item as b, item_filtro as c WHERE a.id_asignado = ? AND a.id_item = b.id_item AND b.id_item = c.id_item");
mysqli_stmt_bind_param($query2, 'i', $id_asignado_filtro);
mysqli_stmt_execute($query2);
mysqli_stmt_store_result($query2);
mysqli_stmt_bind_result($query2, $filtro, $marca, $modelo, $serie, $cantidad_filtro, $ubicacion, $ubicado_en, $filtro_dimension, $tipo_filtro);
mysqli_stmt_fetch($query2);

$eficiencia = "99.99% (0.3 um)";
  
if($ubicado_en == "Sala"){
  $eficiencia = "99.97% (0.3 um)";
}  


$array_ot[] = array(
'ot'=>$ot,
'cliente'=>$cliente,
'marca'=>$marca,
'modelo'=>$modelo,
'serie'=>$serie,
'cantidad_filtro'=>$cantidad_filtro,
'ubicacion'=>$ubicacion,
'ubicado_en'=>$ubicado_en,
'filtro_dimension'=>$filtro_dimension,
'tipo_filtro'=>$tipo_filtro,
'filtro'=>$filtro,
'eficiencia'=>$eficiencia  
);

$convert = json_encode($array_ot);

echo $convert;
mysqli_close($connect);
?>