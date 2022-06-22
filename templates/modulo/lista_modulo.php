<?php 
	include("../../config.ini.php");
		
	$id_modulo = $_POST['id_modulo'];

	$lista = mysqli_prepare($connect,"SELECT nombre, area FROM modulo WHERE id_modulo = ?");
	mysqli_stmt_bind_param($lista, 'i', $id_modulo);
	mysqli_stmt_execute($lista);
	mysqli_stmt_store_result($lista);
	mysqli_stmt_bind_result($lista, $nombre, $area);
	mysqli_stmt_fetch($lista);

	$json = array();
	
	$json[] = array(
	'nombre'=> $nombre,
	'area'=> $area,
	'id_modulo'=>$id_modulo	
	);


	$convert = json_encode($json[0]);

		echo $convert;

?>