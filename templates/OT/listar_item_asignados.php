<?php 
	include("../../config.ini.php");

	$consulta = mysqli_prepare($connect,"SELECT id_item, estado FROM item_asignado");
	mysqli_stmt_execute($consulta);
	mysqli_stmt_store_result($consulta);
	mysqli_stmt_bind_result($consulta, $id_item, $estado);


	$json = array();

	while($row = mysqli_stmt_fetch($consulta)){
		$json[] = array(
		'id_item'=>$id_item,
		'estado' =>$estado	
		);
	}

	$convert = json_encode($json);

	echo $convert;


	mysqli_stmt_close($connect);

?>