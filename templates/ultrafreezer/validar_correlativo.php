<?php 
	include("../../config.ini.php");

	$id_asignado = $_POST['x'];


	//CONSULTAR SI EXISTE O NO UN CORRELATIVO
		
		$consult = mysqli_prepare($connect,"SELECT correlativo FROM item_asignado WHERE id_asignado  = $id_asignado LIMIT 1");
		mysqli_stmt_execute($consult);
		mysqli_stmt_store_result($consult);
		mysqli_stmt_bind_result($consult, $correlativo);
		mysqli_stmt_fetch($consult);


	  echo $correlativo;

    mysqli_stmt_close($connect);

?>