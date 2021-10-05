<?php 
 	//RECUPER EL DATO DE LA URL	
	$id_equipo = $_GET['item'];

	//CONSULTO LA INFORMACIÓN DEL EQUIPO
	$automovil = mysqli_prepare($connect,"SELECT a.id_automovil,  a.fabricante, a.modelo, a.n_serie, a.placa, a.c_interno, a.fecha_fabricacion, a.direccion, a.ubicacion, a.voltaje, 
	                                        a.potencia, a.capacidad, a.peso, a.alto, a.largo, a.ancho, b.nombre, b.descripcion, c.id_empresa, c.nombre,
                                           a.valor_seteado_tem, a.tem_min, a.tem_max, a.valor_seteado_hum, a.hum_min, a.hum_max FROM item_automovil as a, item as b, empresa as c 
																					WHERE b.id_empresa = c.id_empresa AND a.id_item = b.id_item AND a.id_item = $id_equipo");
	mysqli_stmt_execute($automovil);
	mysqli_stmt_store_result($automovil);
	mysqli_stmt_bind_result($automovil, $id_automovil, $fabricante, $modelo, $n_serie, $c_interno, $placa, $fecha_fabricacion, $direccion, $ubicacion, $voltaje, $potencia, $capacidad,
																				 $peso, $alto, $largo, $ancho, $nombre_item, $descripcion_item, $id_empresa, $nombre_empresa, $seteado_tem, $tem_min, $tem_max, $seteado_hum, $hum_min, $hum_max);

	$array_automovil = array();

	while($row = mysqli_stmt_fetch($automovil)){
		$array_automovil[] = array(
			'id_item'=>$id_equipo,
			'id_automovil'=>$id_automovil,
			'fabricante'=>$fabricante,
			'modelo'=>$modelo,
			'n_serie'=>$n_serie,
			'c_interno'=>$c_interno,
      'placa'=>$placa,
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
			'nombre_estufa'=>$nombre_item,
			'descripcion_automovil'=>$descripcion_item,
			'id_empresa'=>$id_empresa,
			'nombre_empresa'=>$nombre_empresa,
      'seteado_tem'=>$seteado_tem,
      'tem_min'=>$tem_min,
      'tem_max'=>$tem_max,
      'seteado_hum'=>$seteado_hum,
      'hum_min'=>$hum_min,
      'hum_max'=>$hum_max
		);	
	}


  
	$smarty->assign("array_automovil",$array_automovil);

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
$smarty->display('item/update_automovil.tpl');

?>