<?php 
	include("../../config.ini.php");

	$id_conectado = $_POST['valida'];

	//query 
		$query = "SELECT  id_rol FROM usuario WHERE id_usuario = ?";
		$execute_query = mysqli_prepare($connect,$query);
		mysqli_stmt_bind_param($execute_query, 'i', $id_conectado);
		mysqli_stmt_execute($execute_query);
		mysqli_stmt_store_result($execute_query);
		mysqli_stmt_bind_result($execute_query,  $id_rol);
		mysqli_stmt_fetch($execute_query);

		echo $id_rol;

|
		$query2 ="SELECT id_rol, rol FROM rol WHERE id_rol = ?";
		$execute_query_2 = mysqli_prepare($connect,$query2);
		mysqli_stmt_bind_param($execute_query_2, 'i', $id_rol);
		mysqli_stmt_execute($execute_query_2);
		mysqli_stmt_store_result($execute_query_2);
		mysqli_stmt_bind_result($execute_query_2, $rol);
		mysqli_stmt_fetch($execute_query_2);


		$json = array();
					$json[] = array(
						'modulo_persona'=>$modulo_persona,
						'modulo_empresa'=>$modulo_empresa,
						'modulo_item'=>$modulo_item
					);

			$array_json = json_encode($json);

					echo $array_json;

?>