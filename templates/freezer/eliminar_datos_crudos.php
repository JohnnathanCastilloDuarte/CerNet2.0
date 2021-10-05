<?php 

	include("../../config.ini.php");


		$id_freezer_sensor = $_POST['id'];
		$aprobacion = $_POST['aprobacion'];

			if($aprobacion == 0){
					
					//CONSULTAR SI EXISTEN DATOS CRUDOS INGRESADOS
							
					$buscar = mysqli_prepare($connect,"SELECT id_freezer_sensor FROM freezer_datos_crudos WHERE id_freezer_sensor = $id_freezer_sensor");
					mysqli_stmt_execute($buscar);
					mysqli_stmt_store_result($buscar);
					mysqli_stmt_bind_result($buscar, $id_freezer);
					mysqli_stmt_fetch($buscar);

						
						if($id_freezer_sensor > 0){
							echo "Si";
						}else{
							echo "No";
						}
			}

		else{
				$buscar = mysqli_prepare($connect,"DELETE FROM freezer_datos_crudos WHERE id_freezer_sensor = $id_freezer_sensor");
				mysqli_stmt_execute($buscar);
					
					if($buscar){
			
								$consultar = mysqli_prepare($connect,"SELECT datos_crudos FROM freezer_sensor WHERE id_freezer_sensor = ?");
								mysqli_stmt_bind_param($consultar, 'i', $id_freezer_sensor);
								mysqli_stmt_execute($consultar);
								mysqli_stmt_store_result($consultar);
								mysqli_stmt_bind_result($consultar, $datos_crudos);
								mysqli_stmt_fetch($consultar);


								$fh = fopen($datos_crudos, 'w');
								fclose($fh);


								$eliminando = unlink($datos_crudos);


								if($eliminando){

									$eliminar = mysqli_prepare($connect,"UPDATE freezer_sensor SET datos_crudos = '' WHERE id_freezer_sensor = ?");
									mysqli_stmt_bind_param($eliminar, 'i', $id_freezer_sensor);
									mysqli_stmt_execute($eliminar);

									if($eliminar){
										echo "Completo";
									}else{
										echo "Error interno";
									}
								}else{
									echo "Error externo";
								}
					}
			else{
				echo "Error";
			}
			
		}

		mysqli_stmt_close($connect);

?>