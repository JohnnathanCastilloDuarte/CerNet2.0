<?php
	include("../../config.ini.php");

	$usuario = $_POST['usuario'];

		$consultar = mysqli_prepare($connect,"SELECT usuario FROM usuario WHERE usuario = ?");
		mysqli_stmt_bind_param($consultar, 's', $usuario);
		mysqli_stmt_execute($consultar);
		mysqli_stmt_store_result($consultar);
		mysqli_stmt_bind_result($consultar, $usuario);
		mysqli_stmt_fetch($consultar);


		if($usuario != ""){
			echo "no disponible";
		}else{
			echo "disponible";
		}

?>