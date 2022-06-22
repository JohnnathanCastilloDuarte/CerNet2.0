<?php 
include('../../config.ini.php');

$tipo_1 = "Distribución termica de camara congelada";
$tipo_2 = "Mapeo termico de bodega";

$array_mapeo=array();



	//CONSULTAR INFORMES DE MAPEO
/*
$tipo_informe_1 = mysqli_prepare($connect,"SELECT id_servicio_tipo FROM servicio_tipo WHERE servicio in (?,?)");
mysqli_stmt_bind_param($tipo_informe_1, 'ss',  $tipo_1,$tipo_2);
mysqli_stmt_execute($tipo_informe_1);
mysqli_stmt_store_result($tipo_informe_1);
mysqli_stmt_bind_result($tipo_informe_1, $id_servicio_mapeo);
mysqli_stmt_fetch($tipo_informe_1);
*/

$mapeo = mysqli_prepare($connect,"SELECT a.id_asignado, c.numot, d.nombre,  e.nombre,  f.nombre, f.apellido, d.id_tipo
FROM item_asignado as a, servicio  as b, numot as c, item as d, empresa as e, persona as f WHERE a.id_servicio = b.id_servicio 
AND b.id_numot = c.id_numot AND a.id_item = d.id_item AND c.id_empresa = e.id_empresa  AND d.id_tipo in(1,14) 
AND f.id_usuario = a.id_usuario");
mysqli_stmt_execute($mapeo);
mysqli_stmt_store_result($mapeo);
mysqli_stmt_bind_result($mapeo, $id_asignado, $numot, $item, $empresa, $usuario_nombre, $usuario_apellido, $id_servicio_mapeo);


while($row = mysqli_stmt_fetch($mapeo)){
	$array_mapeo[]=array(
		'id_asignado'=>$id_asignado,
		'numot'=>$numot,
		'item'=>$item,	
		'empresa'=>$empresa,
		'nombre_usuario'=>$usuario_nombre,
		'apellido_usuario'=>$usuario_apellido,
    'id_servicio_mapeo'=>$id_servicio_mapeo
	); 
}  

$conteo_informes_mapeo = count($array_mapeo);

$smarty->assign("conteo_mapeo",$conteo_informes_mapeo);

$smarty->assign("array_mapeo",$array_mapeo);

$smarty->display("mapeos_generales/gestionar_informes.tpl");
?>