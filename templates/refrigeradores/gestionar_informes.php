<?php 

	$tipo_1 = "Mapeo termico de refrigeradores";

	$tipo_2 = "Calificación refrigeradores";

  $array_mapeo=array();

	//CONSULTAR INFORMES DE MAPEO
	$tipo_informe_1 = mysqli_prepare($connect,"SELECT id_servicio_tipo FROM servicio_tipo WHERE servicio = ?");
	mysqli_stmt_bind_param($tipo_informe_1, 's', $tipo_1);
	mysqli_stmt_execute($tipo_informe_1);
	mysqli_stmt_store_result($tipo_informe_1);
	mysqli_stmt_bind_result($tipo_informe_1, $id_servicio_mapeo);
	mysqli_stmt_fetch($tipo_informe_1);



	$smarty->assign("id_servicio_mapeo",$id_servicio_mapeo);

	$mapeo = mysqli_prepare($connect,"SELECT a.id_asignado, b.numot, f.nombre,  d.nombre,  e.nombre, e.apellido  
																		FROM item_asignado as a, numot as b, servicio as c, empresa as d, persona as e, item as f 
																		WHERE c.id_servicio_tipo =  $id_servicio_mapeo AND  c.id_numot = b.id_numot AND  a.id_item = f.id_item  AND b.id_empresa = d.id_empresa AND a.id_usuario = e.id_usuario AND f.id_tipo = 2");
	mysqli_stmt_execute($mapeo);
	mysqli_stmt_store_result($mapeo);
	mysqli_stmt_bind_result($mapeo, $id_asignado, $numot, $item, $empresa, $usuario_nombre, $usuario_apellido);
	
	
  while($row = mysqli_stmt_fetch($mapeo)){
	$array_mapeo[]=array(
	  'id_asignado'=>$id_asignado,
	  'numot'=>$numot,
	  'item'=>$item,	
	  'empresa'=>$empresa,
	  'nombre_usuario'=>$usuario_nombre,
	  'apellido_usuario'=>$usuario_apellido	
	  ); 
  }  

	$conteo_informes_mapeo = count($array_mapeo);

	$smarty->assign("conteo_mapeo",$conteo_informes_mapeo);

	$smarty->assign("array_mapeo",$array_mapeo);


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
		
	$smarty->display("refrigeradores/gestionar_informes.tpl");
mysqli_stmt_close($connect);	
?>