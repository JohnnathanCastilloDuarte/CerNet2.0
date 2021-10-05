<?php 
	include("../../config.ini.php");

	$id_asignado = $_POST['id_asignado'];

	//CONSULTAR SI EXISTE O NO UN CORRELATIVO
		
		$consult = mysqli_prepare($connect,"SELECT correlativo FROM item_asignado WHERE id_asignado  = $id_asignado");
		mysqli_stmt_execute($consult);
		mysqli_stmt_store_result($consult);
		mysqli_stmt_bind_result($consult, $correlativo);
		mysqli_stmt_fetch($consult);


		if($correlativo == null or $correlativo == ""){
			echo "Sin";
		}else{
			echo "Con";
		}
	

	mysqli_stmt_close($connect);

?>