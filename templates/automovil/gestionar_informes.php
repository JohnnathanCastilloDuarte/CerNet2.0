<?php 

	$tipo_1 = "Distribución termica de automovil";

	//$tipo_2 = "Calificación ultrafreezer";

  $array_mapeo_automovil = array();

//CONSULTAR INFORMES DE MAPEO
	$tipo_informe_1 = mysqli_prepare($connect,"SELECT id_servicio_tipo FROM servicio_tipo WHERE servicio = ?");
	mysqli_stmt_bind_param($tipo_informe_1, 's', $tipo_1);
	mysqli_stmt_execute($tipo_informe_1);
	mysqli_stmt_store_result($tipo_informe_1);
	mysqli_stmt_bind_result($tipo_informe_1, $id_servicio_mapeo);
	mysqli_stmt_fetch($tipo_informe_1);



	$smarty->assign("id_servicio_mapeo",$id_servicio_mapeo);

	$mapeo_automovil = mysqli_prepare($connect,"SELECT DISTINCT a.id_asignado, b.numot, f.nombre,  d.nombre,  e.nombre, e.apellido FROM item_asignado as a, numot as b, servicio as c, empresa as d, persona as e, item as f  WHERE c.id_numot = b.id_numot AND a.id_servicio = c.id_servicio AND c.id_servicio_tipo = $id_servicio_mapeo AND f.id_tipo = 7 AND a.id_item = f.id_item AND b.id_empresa = d.id_empresa AND a.id_usuario = e.id_usuario");
	mysqli_stmt_execute($mapeo_automovil);
	mysqli_stmt_store_result($mapeo_automovil);
	mysqli_stmt_bind_result($mapeo_automovil, $id_asignado, $numot, $item, $empresa, $usuario_nombre, $usuario_apellido);
	
	
  while($row = mysqli_stmt_fetch($mapeo_automovil)){ 
    $array_mapeo_automovil[]=array(
    'id_asignado'=>$id_asignado,
    'numot'=>$numot,
    'item'=>$item,	
    'empresa'=>$empresa,
    'nombre_usuario'=>$usuario_nombre,
    'apellido_usuario'=>$usuario_apellido	
    ); 
  }

  $conteo_informes_mapeo_automovil = count($array_mapeo_automovil);

	$smarty->assign("conteo_mapeo_automovil",$conteo_informes_mapeo_automovil);

	$smarty->assign("array_mapeo_automovil",$array_mapeo_automovil);

/*
//CONSULTAR INFORMES DE CALIFICACIÓN
	$tipo_informe_2 = mysqli_prepare($connect,"SELECT id_servicio_tipo FROM servicio_tipo WHERE servicio = ?");
	mysqli_stmt_bind_param($tipo_informe_2, 's', $tipo_2);
	mysqli_stmt_execute($tipo_informe_2);
	mysqli_stmt_store_result($tipo_informe_2);
	mysqli_stmt_bind_result($tipo_informe_2, $id_servicio_calificacion);
	mysqli_stmt_fetch($tipo_informe_2);

	$calificacion = mysqli_prepare($connect,"SELECT a.id_asignado, b.numot, f.nombre,  d.nombre,  e.nombre, e.apellido  
																		FROM item_asignado as a, numot as b, servicio as c, empresa as d, persona as e, item as f 
																		WHERE c.id_servicio_tipo =  $id_servicio_calificacion AND  c.id_numot = b.id_numot AND  a.id_item = f.id_item  AND b.id_empresa = d.id_empresa AND a.id_usuario = e.id_usuario ");
	mysqli_stmt_execute($calificacion);
	mysqli_stmt_store_result($calificacion);
	mysqli_stmt_bind_result($calificacion, $id_asignado_c, $numot_c, $item_c, $empresa_c, $usuario_nombre_c, $usuario_apellido_c);
	mysqli_stmt_fetch($calificacion);


	$array_calificacion[]=array(
	'id_asignado'=>$id_asignado_c,
	'numot'=>$numot_c,
	'item'=>$item_c,
	'empresa'=>$empresa_c,
	'nombre_usuario'=>$usuario_nombre_c,
	'apellido_usuario'=>$usuario_apellido_c
	); 


	$smarty->assign("array_calificacion",$array_calificacion);
  */
		
	$smarty->display("automovil/gestionar_informes.tpl");
mysqli_stmt_close($connect);	
?>