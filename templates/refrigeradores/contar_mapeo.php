<?php 
	include("../../config.ini.php");

	$id_asignda = $_POST['id_asignado'];


	$buscar = mysqli_prepare($connect,"SELECT count(id_mapeo) FROM refrigerador_mapeo WHERE id_asignado = $id_asignda ");
	mysqli_stmt_execute($buscar);
	mysqli_stmt_store_result($buscar);
	mysqli_stmt_bind_result($buscar, $cuantos);
	mysqli_stmt_fetch($buscar);

	echo $cuantos;






	mysqli_stmt_close($connect);


?>