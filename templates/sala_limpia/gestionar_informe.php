<?php 
include('../../config.ini.php');
$tipo_1 = "Certificado inspección de sala limpia";

	

$array_mapeo_sala_limpia = array();

//CONSULTAR INFORMES DE MAPEO
$tipo_informe_1 = mysqli_prepare($connect,"SELECT id_servicio_tipo FROM servicio_tipo WHERE servicio = ?");
mysqli_stmt_bind_param($tipo_informe_1, 's', $tipo_1);
mysqli_stmt_execute($tipo_informe_1);
mysqli_stmt_store_result($tipo_informe_1);
mysqli_stmt_bind_result($tipo_informe_1, $id_servicio_mapeo);
mysqli_stmt_fetch($tipo_informe_1);


$smarty->assign("id_servicio_mapeo",$id_servicio_mapeo);

$mapeo_sala_limpia = mysqli_prepare($connect,"SELECT DISTINCT a.id_asignado, b.numot, f.nombre,  d.nombre,  e.nombre, e.apellido FROM item_asignado as a, numot as b, servicio as c, 
	empresa as d, persona as e, item as f  WHERE c.id_numot = b.id_numot AND a.id_servicio = c.id_servicio AND c.id_servicio_tipo = $id_servicio_mapeo AND f.id_tipo = 8 AND a.id_item = f.id_item AND b.id_empresa = d.id_empresa AND a.id_usuario = e.id_usuario");

mysqli_stmt_execute($mapeo_sala_limpia);
mysqli_stmt_store_result($mapeo_sala_limpia);
mysqli_stmt_bind_result($mapeo_sala_limpia, $id_asignado, $numot, $item, $empresa, $usuario_nombre, $usuario_apellido);


while($row = mysqli_stmt_fetch($mapeo_sala_limpia)){ 
	$array_mapeo_sala_limpia[]=array(
		'id_asignado'=>$id_asignado,
		'numot'=>$numot,
		'item'=>$item,	
		'empresa'=>$empresa,
		'nombre_usuario'=>$usuario_nombre,
		'apellido_usuario'=>$usuario_apellido	
	); 
}

$conteo_informes_mapeo_sala_limpia = count($array_mapeo_sala_limpia);

$smarty->assign("conteo_mapeo_sala_limpia",$conteo_informes_mapeo_sala_limpia);

$smarty->assign("array_mapeo_sala_limpia",$array_mapeo_sala_limpia);

	$smarty->display("sala_limpia/gestionar_informe.tpl");
	//mysqli_stmt_close($connect);	
?>