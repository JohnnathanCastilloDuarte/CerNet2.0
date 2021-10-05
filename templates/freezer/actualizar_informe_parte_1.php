<?php 
	include("../../config.ini.php");

		$observacion = $_POST['observacion_freezer'];
		$comentarios = $_POST['comentarios_freezer'];
		$id_informe = $_POST['id_informe_freezer'];
		
	$actualizar = mysqli_prepare($connect,"UPDATE informe_freezer SET observacion = ? , comentarios = ? WHERE id_informe_freezer = ?");
	mysqli_stmt_bind_param($actualizar, 'ssi', $observacion, $comentarios, $id_informe);
	mysqli_stmt_execute($actualizar);
	

	if($actualizar){
		echo "Si";
	}else{
		echo "No";
	}
	mysqli_stmt_close($connect);
?>