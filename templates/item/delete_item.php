<?php 
	include("../../config.ini.php");

	//eliminar registro
	$id_principal = $_POST['id_principal'];
	$id_valida = $_POST['id_valida'];
	$tipo_item = $_POST['tipo_item'];


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


		 if ($tipo_item == 1) {
		 	$query = "DELETE FROM item_bodega WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);
		 }elseif ($tipo_item == 2) {
		 	$query = "DELETE FROM item_refrigerador WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);
		 }elseif ($tipo_item == 3) {
		 	$query = "DELETE FROM item_freezer WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);
		 }elseif ($tipo_item == 4) {
		 	$query = "DELETE FROM item_ultrafreezer WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);
		 }elseif ($tipo_item == 5) {
		 	$query = "DELETE FROM item_estufa WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);
		 }elseif ($tipo_item == 6) {
		 	$query = "DELETE FROM item_Incubadora WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);
		 }elseif ($tipo_item == 7) {
		 	$query = "DELETE FROM item_automovil WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);
		 }elseif ($tipo_item == 8) {
		 	$query = "DELETE FROM item_salalimpia WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);
		 /*}elseif ($tipo_item == 9) {
		 	$query = "DELETE FROM  WHERE id_item = ?";
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);*/
		 }elseif ($tipo_item == 10) {
		 	$query = "DELETE FROM item_hvac WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2); 	
		 }elseif ($tipo_item == 11) {
		 	$query = "DELETE FROM item_filtro WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);
		 }elseif ($tipo_item == 12) {
		 	$query = "DELETE FROM item_campana WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);
		 }elseif ($tipo_item == 13) {
		 	$query = "DELETE FROM item_flujo WHERE id_item = ?";
		 	$execute_query2 = mysqli_prepare($connect,$query);
		 	mysqli_stmt_bind_param($execute_query2, 'i', $id_principal);
			mysqli_stmt_execute($execute_query2);
		 }

		if($execute_query && $execute_query2){
			echo "si";
		}else{
			echo "no";
		}

		mysqli_stmt_close($connect);
		

?>