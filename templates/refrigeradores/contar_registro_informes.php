<?php 
	include("../../config.ini.php");

	$id_asignado = $_POST['id_asignado'];
	$validador = 0;



	$pregunta = mysqli_prepare($connect,"SELECT id_mapeo FROM refrigerador_sensor WHERE id_asignado = $id_asignado ");
	mysqli_stmt_execute($pregunta);
	mysqli_stmt_store_result($pregunta);
	mysqli_stmt_bind_result($pregunta, $id_mapeo);
	
	
	while($row = mysqli_stmt_fetch($pregunta)){
	
		$comparar = mysqli_prepare($connect,"SELECT id_informe_refrigerador FROM informe_refrigerador WHERE id_mapeo = $id_mapeo");
		mysqli_stmt_execute($comparar);
		mysqli_stmt_store_result($comparar);
		mysqli_stmt_bind_result($comparar , $id_informe);
		mysqli_stmt_fetch($comparar);
		
		
		if($comparar){
		$validador++;
		}
		
	}

	if($validador > 0){
		echo "Abrete";
	}else{
		echo "No";
	}



	mysqli_stmt_close($connect);
?>