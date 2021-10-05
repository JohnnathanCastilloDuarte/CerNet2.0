<?php

$buscar_privilegios = mysqli_query($connect,"SELECT * FROM privilegio");
	
$encontrados = array();

	while($fila = mysqli_fetch_array($buscar_privilegios)){
		
		$encontrados[]=$fila;
	}

	$smarty->assign('encontrados', $encontrados);


$buscar_rol = mysqli_query($connect,"SELECT * FROM rol");
	
$rol_encontrados = array();

	while($fila = mysqli_fetch_array($buscar_rol)){
		
		$rol_encontrados[]=$fila;
	}

	$smarty->assign('rol_encontrados', $rol_encontrados);

	$smarty->display("templates/usuario/privilegio_rol.tpl");

	mysqli_close($connect);
?>