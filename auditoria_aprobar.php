<?php 
	include('config.ini.php');

$id_oculto_aprobacion = $_POST['id_oculto_aprobacion'];
$observacion_aprobacion = $_POST['observacion_aprobacion'];
$estado_aprobacion = $_POST['estado_aprobacion'];
$id_valida = $_POST['id_valida'];
	
	$query_1 = mysqli_prepare($connect,"UPDATE aprobacion_informes SET estado = ?, observacion = ?, id_usuario_aprueba = ? WHERE id_aprobacion = ?");
	mysqli_stmt_bind_param($query_1, 'isii', $estado_aprobacion, $observacion_aprobacion, $id_valida, $id_oculto_aprobacion);
	mysqli_stmt_execute($query_1);

	if($query_1){
		echo "Hecho";
	}else{
		echo "No";
	}


	mysqli_stmt_close();
?>