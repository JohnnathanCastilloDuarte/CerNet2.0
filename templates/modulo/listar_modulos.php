<?php 
	include("../../config.ini.php");
	$listar_modulos = mysqli_prepare($connect,"SELECT id_modulo, nombre, area FROM modulo");
	mysqli_stmt_execute($listar_modulos);
	mysqli_stmt_store_result($listar_modulos);
	mysqli_stmt_bind_result($listar_modulos, $id_modulo, $nombre, $area);
	$json = array();
	while($row = mysqli_stmt_fetch($listar_modulos)){
		$json[] = array(
		'id_modulo'=>$id_modulo,	
		'nombre'=>$nombre,
		'area'=>$area	
		);
	}
	$convert = json_encode($json);

	echo $convert;


	mysqli_close($connect);
?>