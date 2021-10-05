<?php 
	require("../../config.ini.php");
	
	$id = $_POST['id'];

	$delete = mysqli_query($connect,"DELETE  FROM privilegio WHERE id_privilegio = $id ");

		if($delete){
			echo "si";
		}else{
			echo "no";
		}

?>