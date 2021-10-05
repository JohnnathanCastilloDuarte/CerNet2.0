<?php 
	include("../../config.ini.php");

		$id_asignado = $_POST['id_asignado_freezer'];
		$correlativo = $_POST['correlativo'];

		//INGRESANDO CORRELATIVO 
		$ingresar = mysqli_prepare($connect,"UPDATE item_asignado SET correlativo =  '$correlativo' WHERE id_asignado = $id_asignado");
		mysqli_stmt_execute($ingresar);
		

		if($ingresar){
			echo "Si";
		}else{
			echo "No";
		}
		
	mysqli_stmt_close($connect);
?>