<?php 
	include("../../config.ini.php");
	
	$id_error = $_POST['id_error'];
	$concepto = $_POST['concepto'];
	$id_modulo = $_POST['id_modulo'];
	$solucion = $_POST['solucion'];

	$actualizar = "UPDATE error SET concepto = ?, id_modulo = ?, solucion = ? WHERE id_error = ?";
	$ejecutar = mysqli_prepare($connect, $actualizar);
	mysqli_stmt_bind_param($ejecutar, 'sisi', $concepto, $id_modulo, $solucion, $id_error);
	mysqli_stmt_execute($ejecutar);

	if($ejecutar){
		echo "si";
		
	}else{
		echo "no";
	}

	
?>