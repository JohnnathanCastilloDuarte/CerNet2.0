<?php 
	require("../../config.ini.php");
	
	$pregunta = $_POST['search'];
	
	$buscar = mysqli_query($connect,"SELECT * FROM persona WHERE nombre LIKE '$pregunta%'");

	if(!$buscar){
		
			die("No hay resultados");
		echo "error";
	}
		$json = array();
		while($row = mysqli_fetch_array($buscar))
		{
				$json[]=array(
					'id'=>$row['id_usuario'],
					'nombre'=>$row['nombre'],
					'apellido'=>$row['apellido'],
					'email'=>$row['email']
				);
		}
			$jasonconvert = json_encode($json);
			echo $jasonconvert;
	
?>