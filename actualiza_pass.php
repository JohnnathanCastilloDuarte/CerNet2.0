<?php 
	
	include("config.ini.php");

	$password = $_POST['password'];
	$id = $_POST['id'];

	$clave_encritada = md5($password);

		$cambiar = mysqli_query($connect,"UPDATE usuario SET password = '$clave_encritada' WHERE id_usuario = $id");

		if($cambiar){
			echo "si";
		}else{
			echo "no";
		}

?>