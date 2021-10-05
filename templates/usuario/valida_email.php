<?php
	include("../../config.ini.php");

	$email = $_POST['email'];

		$consultar = mysqli_prepare($connect,"SELECT email FROM persona WHERE email = ?");
		mysqli_stmt_bind_param($consultar, 's', $email);
		mysqli_stmt_execute($consultar);
		mysqli_stmt_store_result($consultar);
		mysqli_stmt_bind_result($consultar, $correo);
		mysqli_stmt_fetch($consultar);


		if($correo != ""){
			echo "no disponible";
		}else{
			echo "disponible";
		}



?>