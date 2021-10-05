<?php 
	//VARIABLE OT
	$ot = $_POST['id_ot_oculto'];
	$smarty->assign("ot",$ot);

	//CONSULTAR OT Y LOS SERVICIOS ASIGNADOS
	
	$consultar_ot = mysqli_prepare($connect,"SELECT numot, id_empresa FROM numot WHERE id_numot = ?");
	mysqli_stmt_bind_param($consultar_ot, 'i', $ot);
	mysqli_stmt_execute($consultar_ot);
	mysqli_stmt_store_result($consultar_ot);
	mysqli_stmt_bind_result($consultar_ot, $numot, $id_empresa);
	mysqli_stmt_fetch($consultar_ot);

	$smarty->assign("numot",$numot);
$smarty->assign("id_empresa_numot",$id_empresa);









	$consultar_servicio = mysqli_prepare($connect,"SELECT id_servicio_tipo, servicio FROM servicio_tipo ORDER BY fecha_registro DESC");
	mysqli_stmt_execute($consultar_servicio);
	mysqli_stmt_store_result($consultar_servicio);
	mysqli_stmt_bind_result($consultar_servicio, $id_servicio_tipo , $servicio);

	$array_tipo_servicio = array();
	
	while($row = mysqli_stmt_fetch($consultar_servicio)){
		
		$array_tipo_servicio[] = array(
		'id_tipo_servicio'=>$id_servicio_tipo,
		'servicio'=>$servicio	
		);
		
	}

	$smarty->assign("array_tipo_servicio", $array_tipo_servicio);

	$smarty->display("OT/asignar_servicio_ot.tpl");

	mysqli_stmt_close($connect);
?>