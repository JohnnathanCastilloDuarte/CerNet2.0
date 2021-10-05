<?php 
	require("../../config.ini.php");

	$nombre = $_POST['nuevo'];
	$crear = mysqli_query($connect,"INSERT INTO privilegio (perfil) VALUES	('$nombre')");

	if($crear){
		echo "si";
	}else{
		echo "no";
	}
?>