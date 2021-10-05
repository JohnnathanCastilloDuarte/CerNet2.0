<?php 
	include("../../config.ini.php");

	//eliminar registro
	$id_principal = $_POST['id_principal'];
	$id_valida = $_POST['id_valida'];


	$consultar = mysqli_prepare($connect, "SELECT nombre FROM item WHERE  id_item = ?");
	mysqli_stmt_bind_param($consultar, 'i', $id_principal);
	mysqli_stmt_execute($consultar);
	mysqli_stmt_store_result($consultar);
	mysqli_stmt_bind_result($consultar , $nombre_traido);
	mysqli_stmt_fetch($consultar);



	$mensaje = "Ha eliminado el item: ".$nombre_traido;
	$tipo_historial = 3;

			//insertar en el backtraking 
				//1 insertar en la tabla historal_modulo

				$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_item (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
				mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
				mysqli_stmt_execute($insertando_historial);
				mysqli_stmt_store_result($insertando_historial);

	
		$query = "DELETE FROM item WHERE id_item = ? ";
		$execute_query = mysqli_prepare($connect,$query);
		mysqli_stmt_bind_param($execute_query, 'i', $id_principal);
		mysqli_stmt_execute($execute_query);


		if($execute_query){
			echo "si";
		}else{
			echo "no";
		}

	mysqli_stmt_close($connect);
		

?>