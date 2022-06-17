<?php 
include('../../config.ini.php');
$tipo_1 = "Inspección flujo laminar";

	//$tipo_2 = "Calificación ultrafreezer";

$array_mapeo_flujo_laminar = array();

//CONSULTAR INFORMES DE MAPEO
$tipo_informe_1 = mysqli_prepare($connect,"SELECT id_servicio_tipo FROM servicio_tipo WHERE servicio = ?");
mysqli_stmt_bind_param($tipo_informe_1, 's', $tipo_1);
mysqli_stmt_execute($tipo_informe_1);
mysqli_stmt_store_result($tipo_informe_1);
mysqli_stmt_bind_result($tipo_informe_1, $id_servicio_mapeo);
mysqli_stmt_fetch($tipo_informe_1);


$smarty->assign("id_servicio_mapeo",$id_servicio_mapeo);

$mapeo_flujo_laminar = mysqli_prepare($connect,"SELECT DISTINCT a.id_asignado, b.numot, f.nombre,  d.nombre,  e.nombre, e.apellido FROM item_asignado as a, numot as b, servicio as c, 
	empresa as d, persona as e, item as f  WHERE c.id_numot = b.id_numot AND a.id_servicio = c.id_servicio AND c.id_servicio_tipo = $id_servicio_mapeo AND f.id_tipo = 13 AND a.id_item = f.id_item AND b.id_empresa = d.id_empresa AND a.id_usuario = e.id_usuario");

mysqli_stmt_execute($mapeo_flujo_laminar);
mysqli_stmt_store_result($mapeo_flujo_laminar);
mysqli_stmt_bind_result($mapeo_flujo_laminar, $id_asignado, $numot, $item, $empresa, $usuario_nombre, $usuario_apellido);


while($row = mysqli_stmt_fetch($mapeo_flujo_laminar)){ 
	$array_mapeo_flujo_laminar[]=array(
		'id_asignado'=>$id_asignado,
		'numot'=>$numot,
		'item'=>$item,	
		'empresa'=>$empresa,
		'nombre_usuario'=>$usuario_nombre,
		'apellido_usuario'=>$usuario_apellido	
	); 
}

$conteo_informes_mapeo_flujo_laminar = count($array_mapeo_flujo_laminar);

$smarty->assign("conteo_mapeo_flujo_laminar",$conteo_informes_mapeo_flujo_laminar);

$smarty->assign("array_mapeo_flujo_laminar",$array_mapeo_flujo_laminar);

	$smarty->display("flujo_laminar/gestionar_informe.tpl");
	//mysqli_stmt_close($connect);	
?>