<?php
include('../../config.ini.php');
$buscar_privilegios = mysqli_query($connect,"SELECT * FROM privilegio");
	
$encontrados = array();

	while($fila = mysqli_fetch_array($buscar_privilegios)){
		
		$encontrados[]=$fila;
	}

	$smarty->assign('encontrados', $encontrados);


	$smarty->display("templates/usuario/privilegio_rol.tpl");

	
?>