<?php 
	include("../../config.ini.php");
	
		$id_informe = $_POST['id_informe'];

		//CONSULTAR LOS VINCULOS PARA ELMINAR TODO RASTRO DE LAS IMAGENES DEL INFORME	
		$consultar = mysqli_prepare($connect,"SELECT ubicacion FROM images_informe_estufaeincubadora WHERE id_informe = ? ");
		mysqli_stmt_bind_param($consultar, 'i', $id_informe);
		mysqli_stmt_execute($consultar);
		mysqli_stmt_store_result($consultar);
		mysqli_stmt_bind_result($consultar, $url);
		
		while($row = mysqli_stmt_fetch($consultar)){
			
			$fh = fopen($url, 'w');
			fclose($fh);

			$eliminando = unlink($url);
		}
	
		$eliminar = mysqli_prepare($connect,"DELETE FROM informe_estufaeincubadora WHERE id_informe_estufaeincubadora = ?");
		mysqli_stmt_bind_param($eliminar, 'i', $id_informe);
		mysqli_stmt_execute($eliminar);

	if($eliminar){
		echo "Si";
	}else{
		echo "No";
	}


	mysqli_stmt_close($connect);
?>