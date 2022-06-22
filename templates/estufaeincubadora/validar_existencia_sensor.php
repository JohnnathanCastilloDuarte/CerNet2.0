<?php 
	include("../../config.ini.php");

			$id_mapeo = $_POST['id_mapeo_estufaeincubadora'];
			$id_asignado  = $_POST['id_asignado_estufaeincubadora'];
			$id_bandeja = $_POST['id_bandeja_estufaeincubadora'];
			$id_sensor = $_POST['id_sensor'];
			$id_valida = $_POST['id_valida_estufaeincubadora'];

			
			$consultar = mysqli_prepare($connect,"SELECT id_estufaeincubadora_sensor FROM estufaeincubadora_sensor WHERE id_asignado = ?  AND id_sensor = ? AND id_mapeo = ?");
			mysqli_stmt_bind_param($consultar, 'iii', $id_asignado,  $id_sensor, $id_mapeo);
			mysqli_stmt_execute($consultar);
			mysqli_stmt_store_result($consultar);
			mysqli_stmt_bind_result($consultar, $id_estufaeincubadora_sensor);
			$cuantos = mysqli_stmt_num_rows($consultar);


			if($cuantos > 0){
				echo "Existe";
			}else{
				echo "No existe";
			}
			
mysqli_stmt_close($connect);	
?>