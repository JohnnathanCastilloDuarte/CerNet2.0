<?php 
	
	$query = "SELECT a.fecha_cambio, a.fecha_modificacion, a.id_controlcambio, a.tipo_cambio, a.descripcion, a.id_modulo, b.nombre, a.id_usuario, c.nombre, a.tiempo, a.fecha_registro,
						a.archivo
					  FROM ti_controlcambio as a, modulo as b, persona as c WHERE a.id_modulo = b.id_modulo AND  a.id_usuario = c.id_usuario ";

	$execute_query = mysqli_prepare($connect,$query);
	mysqli_stmt_execute($execute_query);
	mysqli_stmt_store_result($execute_query);
	mysqli_stmt_bind_result($execute_query, $fecha_cambio, $fecha_modificacion, $id_controlcambio, $tipo_cambio, $descripcion, $id_modulo, $modulo, $id_usuario, $usuario, $tiempo,
												 									$fecha_registro, $archivo);

	$array_control = array();

	while($row = mysqli_stmt_fetch($execute_query)){
		
		$array_control[]=array(
			'fecha_modificacion'=> $fecha_modificacion,
			'fecha_cambio'=> $fecha_cambio,
			'id_controlcambio'=>$id_controlcambio,
			'tipo_cambio'=> $tipo_cambio,
			'descripcion'=> $descripcion,
			'id_modulo'=> $id_modulo,
			'modulo'=> $modulo,
			'id_usuario'=> $id_usuario,
			'usuario'=> $usuario,
			'tiempo'=> $tiempo,
			'fecha_registro'=> $fecha_registro,
			'archivo'=> $archivo

		);
	}
	
	$smarty->assign("array_control",$array_control);


$query_2 = "SELECT a.id_error, a.concepto, a.id_modulo, a.fecha_registro, a.solucion , b.nombre FROM error as a, modulo as b 
					WHERE a.id_modulo = b.id_modulo ";
	$execute = mysqli_prepare($connect,$query_2);
	mysqli_stmt_execute($execute);
	mysqli_stmt_store_result($execute);
	mysqli_stmt_bind_result($execute, $id_error, $concepto, $id_modulo, $fecha_registro, $solucion, $modulo);
	
		
$array_errores = array();

while($row=mysqli_stmt_fetch($execute)){
	$array_errores[]=array(
		'id_error'=>$id_error,
		'concepto'=>$concepto,
		'id_modulo'=>$id_modulo,
		'fecha_registro'=>$fecha_registro,
		'solucion'=>$solucion,
		'modulo'=>$modulo
		);
}
		
	$smarty->assign("array_errores",$array_errores);
	$smarty->display("control_cambio/gestionar_control.tpl");

?>