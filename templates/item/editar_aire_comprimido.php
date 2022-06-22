<?php 
include("../../config.ini.php");


$id_empresa = $_POST['id_empresa'];
$nombre_aire_comprimido = $_POST['nombre_aire_comprimido'];
$nombre_sala = $_POST['nombre_sala'];
$area = $_POST['area'];
$punto_aire_comprimido = $_POST['punto_aire_comprimido'];
$codigo_punto = $_POST['codigo_punto'];
$grado_iso = $_POST['grado_iso'];
$direccion_aire_comprimido = $_POST['direccion_aire_comprimido'];
$id_aire_comprimido = $_POST['id_item_aire'];
$id_item = $_POST['id_item'];



$array_aire_comprimido_editar = array();

///FUNCION PARA MOSTRAR LA INFORMACIÓN QUE QUEREMOS EDITAR 
if ($_POST['accion'] == 'mostrar_aire_comprimido') {

 $mostrar_por_id = mysqli_prepare($connect, "SELECT a.id_aire_comprimido ,  a.nombre_sala, a.direccion, a.area, a.punto_uso_aire_comprimido , 
 				 a.codigo_punto , a.grado_iso , a.fecha_registro
				 FROM item_aire_comprimido as a, item as b, empresa as c, tipo_item as d 
				 WHERE b.id_empresa = c.id_empresa AND a.id_item = b.id_item AND d.id_item = b.id_tipo AND A.id_aire_comprimido = $id_aire_comprimido");
 mysqli_stmt_execute($mostrar_por_id);
 mysqli_stmt_store_result($mostrar_por_id);
 mysqli_stmt_bind_result($mostrar_por_id, $id_aire_comprimido, $nombre_sala, $direccion, $area, $punto_uso_aire_comprimido, $codigo_punto, $grado_iso, $fecha_registro);

 while($row = mysqli_stmt_fetch($mostrar_por_id)){

     	$array_aire_comprimido_editar[] = array(
		'id_aire_comprimido'=>$id_aire_comprimido,
		'nombre_sala' => $nombre_sala,
		'direccion'=>$direccion,
		'area'=>$area,
		'punto_uso_aire_comprimido'=>$punto_uso_aire_comprimido,
		'codigo_punto'=>$codigo_punto,
		'grado_iso'=>$grado_iso,
		'fecha_registro'=>$fecha_registro
	);
	$smarty->assign("array_aire_comprimido_editar",$array_aire_comprimido_editar);	

	$convert = json_encode($array_aire_comprimido_editar);

	echo $convert;   

 }

///FUNCIÓN PARA EDITAR EL ITEM DE AIRE COMPRIMIDO 
}elseif ($_POST['accion'] == 'editar_aire_comprimido') {

$actualizar_aire_comprimido = mysqli_prepare($connect, "UPDATE item_aire_comprimido SET nombre_sala = ? , direccion = ?, area = ?, punto_uso_aire_comprimido = ?, codigo_punto = ?, grado_iso = ? WHERE id_aire_comprimido = ?");
	mysqli_stmt_bind_param($actualizar_aire_comprimido, 'ssssssi', $nombre_sala, $direccion_aire_comprimido, $area, $punto_aire_comprimido, $codigo_punto, $grado_iso, $id_aire_comprimido);
	mysqli_stmt_execute($actualizar_aire_comprimido);

	if ($actualizar_aire_comprimido) {
		echo "si";
	}else{
		echo "no";
	}

}elseif ($_POST['accion'] == 'editar_item') {
	
$actualizar = mysqli_prepare($connect, "UPDATE item SET nombre = ? , id_empresa = ? WHERE id_item = ?");
mysqli_stmt_bind_param($actualizar, 'sii', $nombre_aire_comprimido, $id_empresa, $id_item);
mysqli_stmt_execute($actualizar);
	if ($actualizar) {
		echo "si";
	}else{
		echo "no";
	}

}else{
	echo "error";
}


mysqli_stmt_close($connect);	

 ?>