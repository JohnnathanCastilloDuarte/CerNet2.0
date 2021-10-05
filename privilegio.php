<?php 
	include("config.ini.php");

	$id_conectado = $_POST['valida'];

		//query 
		$query = "SELECT id_privilegio FROM usuario WHERE id_usuario = ?";
		$execute_query = mysqli_prepare($connect,$query);
		mysqli_stmt_bind_param($execute_query, 'i', $id_conectado);
		mysqli_stmt_execute($execute_query);
		mysqli_stmt_store_result($execute_query);
		mysqli_stmt_bind_result($execute_query, $id_privilegio);
		mysqli_stmt_fetch($execute_query);
	

      


			$query2 ="SELECT Modulos, Control_cambios, Usuarios, Clientes, Items, Ordenes_trabajo, Servicios, Informes, Documentacion FROM privilegio WHERE id_privilegio = ?";
			$execute_query_2 = mysqli_prepare($connect,$query2);
			mysqli_stmt_bind_param($execute_query_2, 'i', $id_privilegio);
			mysqli_stmt_execute($execute_query_2);
			mysqli_stmt_store_result($execute_query_2);
			mysqli_stmt_bind_result($execute_query_2, $primer_modulo, $segundo_modulo, $tercer_modulo, $cuarto_modulo, $quinto_modulo, $sexto_modulo, $septimo_modulo, $octavo_modulo, $noveno_modulo);
			mysqli_stmt_fetch($execute_query_2);

			$json = array();
					$json[] = array(
					  
            'modulo_1'=>$primer_modulo,
            'modulo_2'=>$segundo_modulo,
            'modulo_3'=>$tercer_modulo,
            'modulo_4'=>$cuarto_modulo,
            'modulo_5'=>$quinto_modulo,
            'modulo_6'=>$sexto_modulo,
            'modulo_7'=>$septimo_modulo,
            'modulo_8'=>$octavo_modulo,
            'modulo_9'=>$noveno_modulo
            
					);
			

				$array_json = json_encode($json);

					echo $array_json;

	

?>