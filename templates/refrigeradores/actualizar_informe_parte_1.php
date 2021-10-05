<?php 
	include("../../config.ini.php");

		$observacion = $_POST['observacion'];
		$comentarios = $_POST['comentarios'];
		$id_informe = $_POST['id_informe'];
		
		
	$actualizar = mysqli_prepare($connect,"UPDATE informe_refrigerador SET observacion = ? , comentarios = ? WHERE id_informe_refrigerador = ?");
	mysqli_stmt_bind_param($actualizar, 'ssi', $observacion, $comentarios, $id_informe);
	mysqli_stmt_execute($actualizar);
	

	if($actualizar){
		echo "Si";
	}else{
		echo "No";
	}
	mysqli_stmt_close($connect);
?>