<?php


//CONSULTAR EMPRESAS
$consultar_empresa = mysqli_prepare($connect,"SELECT id_empresa, nombre FROM empresa");
mysqli_stmt_execute($consultar_empresa);
mysqli_stmt_store_result($consultar_empresa);
mysqli_stmt_bind_result($consultar_empresa, $id_empresas, $nombre_empresas);


$array_empresas = array();

while($row = mysqli_stmt_fetch($consultar_empresa)){

	$array_empresas[] = array(
		'id_empresas'=>$id_empresas,
		'nombre_empresas'=>$nombre_empresas	 
	);
}

$smarty->assign("array_empresas",$array_empresas);
$array_freezer = array();


if(isset($_GET['item'])){
	echo "Hola";
 	//RECUPER EL DATO DE LA URL	
	$id_equipo = $_GET['item'];

	//CONSULTO LA INFORMACIÓN DEL EQUIPO
	$freezer = mysqli_prepare($connect,"SELECT a.id_freezer,  a.fabricante, a.modelo, a.n_serie, a.c_interno, a.fecha_fabricacion, a.direccion, a.ubicacion, a.voltaje, 
		a.potencia, a.capacidad, a.peso, a.alto, a.largo, a.ancho, b.nombre, b.descripcion, c.id_empresa, c.nombre,
		a.valor_seteado_hum, a.hum_min, a.hum_max, a.valor_seteado_tem, a.tem_min, a.tem_max FROM item_freezer as a, item as b, empresa as c 
		WHERE b.id_empresa = c.id_empresa AND a.id_item = b.id_item AND a.id_item = $id_equipo");
	mysqli_stmt_execute($freezer);
	mysqli_stmt_store_result($freezer);
	mysqli_stmt_bind_result($freezer, $id_freezer, $fabricante, $modelo, $n_serie, $c_interno, $fecha_fabricacion, $direccion, $ubicacion, $voltaje, $potencia, $capacidad,
		$peso, $alto, $largo, $ancho, $nombre_item, $descripcion_item, $id_empresa, $nombre_empresa, $seteado_hum, $hum_min, $hum_max, 
		$seteado_tem, $tem_min, $tem_max);



	while($row = mysqli_stmt_fetch($freezer)){
		$array_freezer[] = array(
			'id_item'=>$id_equipo,
			'id_freezer'=>$id_freezer,
			'fabricante'=>$fabricante,
			'modelo'=>$modelo,
			'n_serie'=>$n_serie,
			'c_interno'=>$c_interno,
			'fecha_fabricacion'=>$fecha_fabricacion,
			'direccion'=>$direccion,
			'ubicacion'=>$ubicacion,
			'voltaje'=>$voltaje,
			'potencia'=>$potencia,
			'capacidad'=>$capacidad,
			'peso'=>$peso,
			'alto'=>$alto,
			'largo'=>$largo,
			'ancho'=>$ancho,
			'nombre_freezer'=>$nombre_item,
			'descripcion_freezer'=>$descripcion_item,
			'id_empresa'=>$id_empresa,
			'nombre_empresa'=>$nombre_empresa,
			'seteado_hum'=>$seteado_hum,
			'seteado_tem'=>$seteado_tem,
			'hum_min'=>$hum_min,
			'hum_max'=>$hum_max,
			'tem_min'=>$tem_min,
			'tem_max'=>$tem_max
		);	
	}
	$smarty->assign("array_freezer",$array_freezer);
}//////////// FIN DEL IF
else{
	
	$array_freezer[] = array(
		'id_item'=>'',
		'id_freezer'=>'',
		'fabricante'=>'',
		'modelo'=>'',
		'n_serie'=>'',
		'c_interno'=>'',
		'fecha_fabricacion'=>'',
		'direccion'=>'',
		'ubicacion'=>'',
		'voltaje'=>'',
		'potencia'=>'',
		'capacidad'=>'',
		'peso'=>'',
		'alto'=>'',
		'largo'=>'',
		'ancho'=>'',
		'nombre_freezer'=>'',
		'descripcion_freezer'=>'',
		'id_empresa'=>'',
		'nombre_empresa'=>'',
		'seteado_hum'=>'',
		'seteado_tem'=>'',
		'hum_min'=>'',
		'hum_max'=>'',
		'tem_min'=>'',
		'tem_max'=>''
	);
	$smarty->assign("array_freezer",$array_freezer);
}   
$smarty->display("item/update_freezer.tpl");

?>