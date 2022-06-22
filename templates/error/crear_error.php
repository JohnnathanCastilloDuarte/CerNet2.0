<?php
	include("../../config.ini.php");

	$concepto = $_POST['concepto'];
	$modulo = $_POST['modulo'];
	$solucion = $_POST['solucion'];

	$query = "INSERT INTO error (concepto, id_modulo, solucion) VALUES (?,?,?)";
	$execute = mysqli_prepare($connect,$query);
	mysqli_stmt_bind_param($execute, 'sis', $concepto, $modulo, $solucion);
	mysqli_stmt_execute($execute);
	mysqli_stmt_store_result($execute);
	
		
		if($execute){
			echo "si";
		}else{
			echo "no";
		}
	

	mysqli_stmt_close($connect);
?>