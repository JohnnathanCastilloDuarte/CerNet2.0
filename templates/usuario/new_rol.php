<?php 
	require("../../config.ini.php");

	$nombre = $_POST['nuevo'];
	$crear = mysqli_query($connect,"INSERT INTO rol (rol) VALUES	('$nombre')");

	if($crear){
		echo "si";
	}else{
		echo "no";
	}
?>