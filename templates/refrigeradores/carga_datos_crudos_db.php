<?php 
	error_reporting(0);
	include("../../config.ini.php");

		$id_refrigerador_sensor = $_POST['id'];
		$id_valida = $_POST['id_valida'];
		$id_asignado = $_POST['id_asignado'];
		$id_mapeo = $_POST['id_mapeo'];

		//VALIDAR SI EXISTE EL CAMPO PARA INGRESAR LA INFORMACIÒN

			$validar = mysqli_prepare($connect,"SELECT id_refrigerador_sensor FROM refrigerador_datos_crudos WHERE id_refrigerador_sensor = $id_refrigerador_sensor");
			mysqli_stmt_execute($validar);
			mysqli_stmt_store_result($validar);
			mysqli_stmt_bind_result($validar, $id_validador);
			mysqli_stmt_fetch($validar);

			if($id_validador > 0){
				echo "Ya";
				
			}else{
					

		//CONSULTAR SI EXISTE UN ARCHIVO DE DATOS CRUDOS
		$consultar = mysqli_prepare($connect,"SELECT  datos_crudos, id_mapeo FROM refrigerador_sensor WHERE id_refrigerador_sensor = ?");
		mysqli_stmt_bind_param($consultar, 'i', $id_refrigerador_sensor);
		mysqli_stmt_execute($consultar);
		mysqli_stmt_store_result($consultar);
		mysqli_stmt_bind_result($consultar, $datos_crudos, $id_mapeo);
		mysqli_stmt_fetch($consultar);
		
		//BUSCAR FECHAS DE RANGO DE MAPEO
			//Recuperar fechas 
		$fechas = mysqli_prepare($connect,"SELECT fecha_inicio, hora_inicio, fecha_final, hora_final, intervalo FROM refrigerador_mapeo WHERE id_mapeo = ?");
		mysqli_stmt_bind_param($fechas, 'i', $id_mapeo);
		mysqli_stmt_execute($fechas);
		mysqli_stmt_store_result($fechas);
		mysqli_stmt_bind_result($fechas, $fecha_inicio, $hora_inicio, $fecha_final, $hora_final, $intervalo);
		mysqli_stmt_fetch($fechas);


		$pre_start = $fecha_inicio." ".$hora_inicio;
		$pre_end = $fecha_final." ".$hora_final;

		$start = date("Y-m-d H:i:s",strtotime($pre_start));
		$end = date("Y-m-d H:i:s",strtotime($pre_end));		

		$z = 1;

			if(file_exists($datos_crudos))
						{
						$abre_archivo=fopen($datos_crudos,'r');
						
							while(($column=fgetcsv($abre_archivo,10000,";","\t"))!==false){
										
							$fecha_hora_sql = date("Y-m-d H:i:s",strtotime($column[1]));
								
								
								if($z==1)
									{
										$fecha_suma=$start;
									}
									else
									{
										$fecha_suma=$fecha_suma;
									}
								
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
								
								
							if($fecha_hora_sql>=$start && $fecha_hora_sql<=$end && $fecha_hora_sql <> ""){
									
									//INSERTANDO LOS DATOS	
								$insertar = mysqli_prepare($connect,"INSERT INTO refrigerador_datos_crudos (id_refrigerador_sensor, time, temperatura,humedad, id_usuario) VALUES (?,?,?,?,?)");
								mysqli_stmt_bind_param($insertar, 'isssi', $id_refrigerador_sensor, $fecha_suma, $temperatura, $humedad, $id_valida);
								mysqli_stmt_execute($insertar);
									
								$fecha_suma=date('Y-m-d H:i:s',strtotime("+$intervalo seconds",strtotime($fecha_suma)));
								$z = 2;
							}//cierre del if
							
								 
							}//cierre del while
				
					/////////////////////////////CONSULTA DE INFORMACIÓN PARA EL BACKTRAKING//////////////////////////////////////////////////////////////////

	$consultar_item = mysqli_prepare($connect,"SELECT a.servicio, d.numot FROM servicio_tipo as a, item_asignado as b, servicio as c, numot as d  WHERE b.id_asignado = $id_asignado 		AND c.id_servicio = b.id_servicio 	 AND  c.id_servicio_tipo = 	a.id_servicio_tipo AND c.id_numot = d.id_numot ");
	mysqli_stmt_execute($consultar_item);
	mysqli_stmt_store_result($consultar_item);
	mysqli_stmt_bind_result($consultar_item,  $nombre_servicio, $ot);
	mysqli_stmt_fetch($consultar_item);



	$antiguo_mapeo = mysqli_prepare($connect,"SELECT nombre FROM refrigerador_mapeo WHERE id_mapeo = $id_mapeo");
	mysqli_stmt_execute($antiguo_mapeo);
	mysqli_stmt_store_result($antiguo_mapeo);
	mysqli_stmt_bind_result($antiguo_mapeo, $viejo_mapeo);
	mysqli_stmt_fetch($antiguo_mapeo);

				
	$buscar_datos = mysqli_prepare($connect,"SELECT id_sensor, id_bandeja FROM refrigerador_sensor WHERE id_refrigerador_sensor = $id_refrigerador_sensor");
	mysqli_stmt_execute($buscar_datos);
	mysqli_stmt_store_result($buscar_datos);
	mysqli_stmt_bind_result($buscar_datos, $id_sensor, $id_bandeja);
	mysqli_stmt_fetch($buscar_datos);
				
				
			
	$consultar_sensor = mysqli_prepare($connect,"SELECT nombre FROM sensores WHERE id_sensor = $id_sensor");
	mysqli_stmt_execute($consultar_sensor);
	mysqli_stmt_store_result($consultar_sensor);
	mysqli_stmt_bind_result($consultar_sensor, $nombre_sensor);
	mysqli_stmt_fetch($consultar_sensor);
			
	
	$consultar_bandeja = mysqli_prepare($connect,"SELECT nombre FROM bandeja WHERE id_bandeja = $id_bandeja");
	mysqli_stmt_execute($consultar_bandeja);
	mysqli_stmt_store_result($consultar_bandeja);
	mysqli_stmt_bind_result($consultar_bandeja, $nombre_bandeja);
	mysqli_stmt_fetch($consultar_bandeja);
			
			
	$mensaje = "Ha subido los datos crudos: ".$datos_crudos." para el sensor: ".$nombre_sensor." de la bandeja: ".$nombre_bandeja." para el servicio: ".$nombre_servicio." y la OT: 	".$ot;
	$tipo_historial = 1;

	$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_refrigeradores (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
	mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
	mysqli_stmt_execute($insertando_historial); 

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////FIN DE INGRESO DEL BACKTRAKING///////////////////////////////////////////////////////////////////////////////////////////	

			}

				

		}//CIERRE DEL ELSE PRINCIPAL 

		mysqli_stmt_close($connect);

?>