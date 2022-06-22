<?php 
	require("../../config.ini.php");


	$nombre_privilegio = $_POST['nombre_privilegio'];
	$crear = mysqli_prepare($connect,"INSERT INTO privilegio (perfil) VALUES (?)");
	mysqli_stmt_bind_param($crear, 's', $nombre_privilegio);
	mysqli_stmt_execute($crear);
	if($crear){
		echo "si";
	}else{
		echo "no";
	}
?>