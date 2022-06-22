<?php 

	$consultar_ot = mysqli_prepare($connect,"SELECT a.id_numot, a.numot, b.nombre, c.nombre, c.apellido FROM numot as a, empresa as b, persona as c 
																					 WHERE a.id_empresa = b.id_empresa AND a.id_usuario_asignado = c.id_usuario");

	mysqli_stmt_execute($consultar_ot);
	mysqli_stmt_store_result($consultar_ot);
	mysqli_stmt_bind_result($consultar_ot, $id_numot, $ot, $empresa, $nombre_usuario, $apellido_usuario);

	$array_numot = array();

	while($row = mysqli_stmt_fetch($consultar_ot)){
		$array_numot[] = array(
			'id_numot'=>$id_numot,
			'ot'=>$ot,
			'empresa'=>$empresa,
			'nombre_usuario'=>$nombre_usuario,
			'apellido_usuario'=>$apellido_usuario
		);
		
	}


	$smarty->assign("array_numot",$array_numot);
	$smarty->assign("contador",0);
	$smarty->display("OT/gestionar_ot.tpl");

?>