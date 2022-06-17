<?php 
	include("../../config.ini.php");
	
		$bandeja = $_POST['bandeja'];
		$id_asignado = $_POST['id_asignado'];



		$consultar = mysqli_prepare($connect,"SELECT COUNT(id_bandeja) FROM bandeja WHERE id_asignado = ? AND nombre = ?");
		mysqli_stmt_bind_param($consultar, 'is', $id_asignado, $bandeja);
		mysqli_stmt_execute($consultar);
		mysqli_stmt_store_result($consultar);
		mysqli_stmt_bind_result($consultar, $conteo);

		mysqli_stmt_fetch($consultar);


		if($conteo > 0){
			echo "Existe";
		}else{
			echo "No existe";
		}
mysqli_stmt_close($connect);	
?>