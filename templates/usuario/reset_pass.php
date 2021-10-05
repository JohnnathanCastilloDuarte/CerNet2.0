<?php 
	require("../../config.ini.php");
				
			$nueva = md5("123");
			
			$resetear = mysqli_query($connect,"UPDATE usuario SET  password = '$nueva'");

			if($resetear){
				echo "exito";
			}

?>