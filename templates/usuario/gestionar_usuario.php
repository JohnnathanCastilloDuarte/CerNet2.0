<?php 
	
	//consultar usuario con su información en la tabla persona
	$buscando = mysqli_query($connect,"SELECT b.id_usuario, b.id_persona, a.usuario, b.nombre, b.apellido, b.id_cargo,  b.estado, b.imagen_usuario, b.email, c.nombre as nombre_cargo 
FROM usuario as a, persona as b, cargo as c
WHERE a.id_usuario = b.id_usuario AND c.id_cargo =b.id_cargo");

	
	$array_buscando = array();
	while($fila = mysqli_fetch_array($buscando))
	{
		$array_buscando[]=$fila;
		
	}
	$smarty->assign("array_buscando",$array_buscando);

	$smarty->display("usuario/gestionar_usuario.tpl");

?>