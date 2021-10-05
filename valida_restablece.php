<?php 
	include("config.ini.php");
	
	$usuario = $_POST['usuario'];
	$id_protegido = $_POST['id_protegido'];

	$consultar = mysqli_query($connect,"SELECT id_usuario FROM usuario WHERE usuario = '$usuario'");
		
		$id = ""; 
			while($fila = mysqli_fetch_array($consultar))
			{
					$id = $fila['id_usuario'];
			}
	
			$proteger =md5($id);

			if($id_protegido == $proteger)
			{
					echo $id;			
			}



	
	
?>