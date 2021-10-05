<?php 
	include("../../config.ini.php");


	$listar_modulos = mysqli_prepare($connect,"SELECT id_modulo, nombre, area FROM modulo");
	mysqli_stmt_execute($listar_modulos);
	mysqli_stmt_store_result($listar);
	mysqli_stmt_bind_result($listar_modulos, $id_modulo, $nombre, $area);
	
	$jason = array();
	
	while($row = mysqli_stmt_fetch($listar_modulos)){
		$jason[] = array(
		'id_modulo'=>$id_modulo,
		'nombre'=>$nombre,
		'area'=>$area	
		);
	}

	$convert = json_encode($jason);

	echo $convert;



?>