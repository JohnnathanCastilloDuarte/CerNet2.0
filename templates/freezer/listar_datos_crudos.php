<?php 

	include("../../config.ini.php");

	$id_freezer_sensor = $_POST['id_freezer_sensor'];


			
		//CONSULTAR SI EXISTE UN ARCHIVO DE DATOS CRUDOS
		
			$consultar = mysqli_prepare($connect,"SELECT  datos_crudos, id_mapeo FROM freezer_sensor WHERE id_freezer_sensor = ?");
			mysqli_stmt_bind_param($consultar, 'i', $id_freezer_sensor);
			mysqli_stmt_execute($consultar);
			mysqli_stmt_store_result($consultar);
			mysqli_stmt_bind_result($consultar, $datos_crudos, $id_mapeo);
			mysqli_stmt_fetch($consultar);
		
		//BUSCAR FECHAS DE RANGO DE MAPEO
			//Recuperar fechas 
		$fechas = mysqli_prepare($connect,"SELECT fecha_inicio, hora_inicio, fecha_final, hora_final FROM freezer_mapeo WHERE id_mapeo = ?");
		mysqli_stmt_bind_param($fechas, 'i', $id_mapeo);
		mysqli_stmt_execute($fechas);
		mysqli_stmt_store_result($fechas);
		mysqli_stmt_bind_result($fechas, $fecha_inicio, $hora_inicio, $fecha_final, $hora_final);
		mysqli_stmt_fetch($fechas);


		$pre_start = $fecha_inicio." ".$hora_inicio;
		$pre_end = $fecha_final." ".$hora_final;

		$start = date("Y-m-d H:i:s",strtotime($pre_start));
		$end = date("Y-m-d H:i:s",strtotime($pre_end));

				//VERIIFICAR EL ARCHIVO 
						$sin_dato = 0;
						$hr_bajo = 0;
						$hr_alto = 0;
						$error = 0;
						$leidos = 0;
						$json = array();
	
						
					if(file_exists($datos_crudos))
						{
						$abre_archivo=fopen($datos_crudos,'r');
						
							while(($column=fgetcsv($abre_archivo,10000,";","\t"))!==false){
										
							$fecha_hora_sql = date("Y-m-d H:i:s",strtotime($column[1]));
								
							//PROCESO PARA RETIRAR COMAS Y DEJAR VALORES CON PUNTO DECIMAL
							if(strpos($column[2],","))
							{
								$temperatura=str_replace(",",".",$column[2]);
							}
							else
							{
								$temperatura=$column[2];						
							}
								
							if(strpos($column[3],","))
							{
								$humedad=str_replace(",",".",$column[3]);
							}
							else
							{
								$humedad=$column[3];						
							}
								
								
							if($fecha_hora_sql>=$start && $fecha_hora_sql<=$end){
									
						

									if($column[2] == "" || $column[3] == ""){
										$sin_dato++;
									}
									
									if($humedad < 10){
										$hr_bajo++;
									}
									
									if($humedad > 90){
										
										$hr_alto++;
									}
									
									
									if($column[2] == "ERROR" || $column[3] == "ERROR"){
										$error++;
									}
									
								
								$leidos++; 
							}//cierre del if
							
								 
							}//cierre del while
							$json[] = array
								(
									'id_freezer_sensor'=>$id_freezer_sensor,
									'leidos'=>$leidos,
									'sin_datos'=>$sin_dato,
									'hr_bajo'=>$hr_bajo,
									'hr_alto'=>$hr_alto,
									'error'=>$error
								);
								
						$convert = json_encode($json);
							echo $convert;
							}//cierre del if file_existe	
						else{
							echo "No hay registros";
						}
						
			
		

	mysqli_stmt_close($connect);

?>