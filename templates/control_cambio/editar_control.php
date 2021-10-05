<?php 
	$id = $_GET['control'];
	$fecha_modificacion = date("Y/m/d H:i:s");

	$smarty->assign("id",$id);
	$smarty->assign("fecha_modificacion",$fecha_modificacion);

	$query = "SELECT a.fecha_cambio, a.fecha_modificacion, a.id_controlcambio, a.tipo_cambio, a.descripcion, a.id_modulo, b.nombre, a.id_usuario, c.nombre, a.tiempo, a.fecha_registro,
						a.archivo
					  FROM ti_controlcambio as a, modulo as b, persona as c WHERE a.id_modulo = b.id_modulo AND  a.id_usuario = c.id_usuario AND a.id_controlcambio = ? ";

	$execute_query = mysqli_prepare($connect,$query);
	mysqli_stmt_bind_param($execute_query, 'i', $id);
	mysqli_stmt_execute($execute_query);
	mysqli_stmt_store_result($execute_query);
	mysqli_stmt_bind_result($execute_query, $fecha_cambio, $fecha_modificacion, $id_controlcambio, $tipo_cambio, $descripcion, $id_modulo, $modulo, $id_usuario, $usuario, $tiempo,
												 									$fecha_registro, $archivo);
	mysqli_stmt_fetch($execute_query);
	$array_control = array();
	
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
		
		$smarty->assign("controls",$array_control);
	
	$query = "SELECT id_modulo, nombre FROM modulo";
	$execute_query = mysqli_prepare($connect,$query);
	mysqli_stmt_execute($execute_query);
	mysqli_stmt_store_result($execute_query);
	mysqli_stmt_bind_result($execute_query, $id_modulo,$nombre_modulo);

$array_modulo=array();
while($row = mysqli_stmt_fetch($execute_query)){
  $array_modulo[]=array("id_modulo"=> $id_modulo,"nombre"=> $nombre_modulo);

}

	$smarty->assign("tipo_cambio",array("Desarrollar","Modificar","Corregir","Eliminar"));

	$smarty->assign("array_modulo",$array_modulo);
	$smarty->display("control_cambio/editar_control.tpl");
?>