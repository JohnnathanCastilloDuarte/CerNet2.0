<?php 

	include("../../config.ini.php");

	$id_informe = $_POST['id_informe']; 
	$id_aprobacion = $_POST['id_aprobacion'];
	$valor_button = $_POST['valor_button'];
	$id_asignado =  $_POST['id_asignado'];


	if($valor_button == 1){
		
		$query_1 = mysqli_prepare($connect,"SELECT id_asignado FROM informe_refrigerador WHERE id_informe_refrigerador = $id_informe");
		mysqli_stmt_execute($query_1);
		mysqli_stmt_store_result($query_1);
		mysqli_stmt_bind_result($query_1, $id_asignado);
		mysqli_stmt_fetch($query_1);
		
		
		$query_2 = mysqli_prepare($connect,"SELECT id_servicio FROM item_asignado WHERE id_asignado = $id_asignado");
		mysqli_stmt_execute($query_2);
		mysqli_stmt_store_result($query_2);
		mysqli_stmt_bind_result($query_2, $id_servicio);
		mysqli_stmt_fetch($query_2);
		
		
		$query_3 = mysqli_prepare($connect,"SELECT id_numot FROM servicio WHERE id_servicio = $id_servicio");
		mysqli_stmt_execute($query_3);
		mysqli_stmt_store_result($query_3);
		mysqli_stmt_bind_result($query_3, $id_numot);
		mysqli_stmt_fetch($query_3);
		
		
		$query_4 = mysqli_prepare($connect,"SELECT id_numot FROM servicio WHERE id_servicio = $id_servicio");
		mysqli_stmt_execute($query_4);
		mysqli_stmt_store_result($query_4);
		mysqli_stmt_bind_result($query_4, $id_numot);
		mysqli_stmt_fetch($query_4);
		
		
		$query_5 = mysqli_prepare($connect,"SELECT id_usuario_asignado FROM numot WHERE id_numot = $id_numot");
		mysqli_stmt_execute($query_5);
		mysqli_stmt_store_result($query_5);
		mysqli_stmt_bind_result($query_5, $id_usuario_asignado);
		mysqli_stmt_fetch($query_5);
		
		if($id_aprobacion != "null"){
		
			$actualizado = mysqli_prepare($connect,"UPDATE aprobacion_informes SET estado = ? WHERE id_informe = ? AND id_aprobacion = ?");
			mysqli_stmt_bind_param($actualizado, 'iii', $valor_button, $id_informe, $id_aprobacion);
			mysqli_stmt_execute($actualizado);
			
			if($actualizado){
				echo "Si";
			}else
				{
					echo "No";
				}
	
		}else{
			
		$insertando = mysqli_prepare($connect,"INSERT INTO aprobacion_informes(id_informe, estado, id_usuario_asignado, id_usuario) VALUES 
																					(?,?,?,?)");
		mysqli_stmt_bind_param($insertando, 'iiii', $id_informe, $valor_button, $id_usuario_asignado, $id_asignado);
		mysqli_stmt_execute($insertando);
		}
		
		if($insertando){
			echo "Si";
		}else
		{
			echo "No";
		}

	}//cierre del if	

	else{
		$actualizado = mysqli_prepare($connect,"UPDATE aprobacion_informes SET estado = ? WHERE id_informe = ? AND id_aprobacion = ?");
		mysqli_stmt_bind_param($actualizado, 'iii', $valor_button, $id_informe, $id_aprobacion);
		mysqli_stmt_execute($actualizado);
		
		if($actualizado){
			echo "Sii";
		}else{
			echo "Noo";
		}
		
	}


	mysqli_stmt_close($connect);
?>