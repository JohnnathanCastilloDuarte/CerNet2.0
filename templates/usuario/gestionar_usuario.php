<?php 

	//consultar usuario con su información en la tabla persona
	$buscando = mysqli_query($connect,"SELECT b.id_usuario, b.id_persona, a.usuario, b.nombre, b.apellido, b.cargo,  b.estado, b.imagen_usuario, b.email FROM usuario as a, persona as b
																			 WHERE a.id_usuario = b.id_usuario");

	
	$array_buscando = array();
	while($fila = mysqli_fetch_array($buscando))
	{
		$array_buscando[]=$fila;
		
	}
	$smarty->assign("array_buscando",$array_buscando);

	$smarty->display("usuario/gestionar_usuario.tpl");
		
	mysqli_stmt_close($connect);
?>