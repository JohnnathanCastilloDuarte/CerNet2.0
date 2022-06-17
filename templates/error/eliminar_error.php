<?php 
	include("../../config.ini.php");

	$id_error = $_POST['id_error'];

	$eliminar = "DELETE FROM error WHERE id_error = ?";
	$ejecutar = mysqli_prepare($connect, $eliminar);
	mysqli_stmt_bind_param($ejecutar, 'i', $id_error);
	mysqli_stmt_execute($ejecutar);

	if($eliminar){
		echo "si";
	}else{
		echo "no";
	}

	mysqli_stmt_close($connect);

?>