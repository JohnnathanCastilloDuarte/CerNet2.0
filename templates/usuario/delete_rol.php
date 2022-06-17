<?php 
	require("../../config.ini.php");
	
	$id = $_POST['id'];

	$delete = mysqli_query($connect,"DELETE  FROM rol WHERE id_rol = $id ");

		if($delete){
			echo "si";
		}else{
			echo "no";
		}

?>