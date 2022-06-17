<?php 
	include("config.ini.php");
	
	$id_informe = $_GET['id'];
	$type = $_GET['type'];
	$filas = "";
	$colum = "";
	$de = "";

	$query_1 = mysqli_prepare($connect,"SELECT id_mapeo, id_asignado FROM informe_refrigerador WHERE id_informe_refrigerador  = ?");
	mysqli_stmt_bind_param($query_1, 'i', $id_informe);
	mysqli_stmt_execute($query_1);
	mysqli_stmt_store_result($query_1);
	mysqli_stmt_bind_result($query_1, $id_mapeo, $id_asignado);
	mysqli_stmt_fetch($query_1);
	

	$query_2 = mysqli_prepare($connect,"SELECT  b.nombre, b.id_sensor FROM refrigerador_sensor as a, sensores as b WHERE a.id_mapeo = 	? 		AND a.id_asignado = ? 	AND a.id_sensor = b.id_sensor");
	mysqli_stmt_bind_param($query_2, 'ii', $id_mapeo, $id_asignado);
	mysqli_stmt_execute($query_2);
	mysqli_stmt_store_result($query_2);
	mysqli_stmt_bind_result($query_2,  $nombre_sensor, $id_sensor);
	//$cuantos = mysqli_stmt_num_rows($query_2);

	$query_21 = mysqli_prepare($connect,"SELECT a.id_refrigerador_sensor FROM refrigerador_sensor as a, sensores as b WHERE a.id_mapeo = 	? 	AND a.id_asignado = ? 	AND a.id_sensor = b.id_sensor");
	mysqli_stmt_bind_param($query_21, 'ii', $id_mapeo, $id_asignado);
	mysqli_stmt_execute($query_21);
	mysqli_stmt_store_result($query_21);
	mysqli_stmt_bind_result($query_21, $id_refrigerador_sensor );
	$cuantos = mysqli_stmt_num_rows($query_21) * 3;
	$cuantos_2 = mysqli_stmt_num_rows($query_21);

	echo "<table style='text-align:center;' width='30%' border='1'>
		<tr>
			<td rowspan='2'>Fecha/Hora</td>
			<td colspan='$cuantos'>Sensores</td>
		</tr>
		<tr>";
	while($row = mysqli_stmt_fetch($query_2)){
		echo "<td style='color:red' colspan='3'> $nombre_sensor</td>";
	}
echo "</tr>";

	mysqli_stmt_fetch($query_21);

			if($type == 0){
			$query_3 = mysqli_prepare($connect,"SELECT DISTINCT a.time  FROM refrigerador_datos_crudos as a, refrigerador_sensor as b WHERE b.id_mapeo = ? ORDER 	BY time ASC");
			mysqli_stmt_bind_param($query_3, 'i',  $id_mapeo);
			mysqli_stmt_execute($query_3);
			mysqli_stmt_store_result($query_3);
			mysqli_stmt_bind_result($query_3, $time);
			$filas = mysqli_stmt_num_rows($query_3);	
				
			$query_31 = mysqli_prepare($connect,"SELECT   MAX(a.temperatura), round(AVG(a.temperatura),2), MIN(a.temperatura) FROM refrigerador_datos_crudos  as a, refrigerador_sensor as b WHERE  																										b.id_mapeo = ?  GROUP BY  a.time ASC, a.id_refrigerador_sensor ASC");
			mysqli_stmt_bind_param($query_31, 'i',  $id_mapeo);
			mysqli_stmt_execute($query_31);
			mysqli_stmt_store_result($query_31);
			mysqli_stmt_bind_result($query_31,  $max, $avg, $min);
			$colum = mysqli_stmt_num_rows($query_31);
				
			/*$query_32 = mysqli_prepare($connect,"SELECT  AVG(a.temperatura) FROM refrigerador_datos_crudos  as a, refrigerador_sensor as b WHERE  b.id_mapeo = ?  AND 	a.id_refrigerador_sensor = 															b.id_refrigerador_sensor ORDER BY a.time ASC, a.id_refrigerador_sensor ASC");
			mysqli_stmt_bind_param($query_32, 'i',  $id_mapeo);
			mysqli_stmt_execute($query_32);
			mysqli_stmt_store_result($query_32);
			mysqli_stmt_bind_result($query_32,  $promedio);
				
			$query_33 = mysqli_prepare($connect,"SELECT  MIN(a.temperatura) FROM refrigerador_datos_crudos  as a, refrigerador_sensor as b WHERE  b.id_mapeo = ?  AND 	a.id_refrigerador_sensor = 															b.id_refrigerador_sensor ORDER BY a.time ASC, a.id_refrigerador_sensor ASC");
			mysqli_stmt_bind_param($query_33, 'i',  $id_mapeo);
			mysqli_stmt_execute($query_33);
			mysqli_stmt_store_result($query_33);
			mysqli_stmt_bind_result($query_33,  $min);	*/
			
			
			}//if de la humedad
			else{
			$query_3 = mysqli_prepare($connect,"SELECT DISTINCT a.time  FROM refrigerador_datos_crudos as a, refrigerador_sensor as b WHERE b.id_mapeo = ? ORDER 	BY time ASC");
			mysqli_stmt_bind_param($query_3, 'i',  $id_mapeo);
			mysqli_stmt_execute($query_3);
			mysqli_stmt_store_result($query_3);
			mysqli_stmt_bind_result($query_3, $time);
			$filas = mysqli_stmt_num_rows($query_3);	
			
			$query_31 = mysqli_prepare($connect,"SELECT  MAX(a.humedad), round(AVG(a.humedad),2), MIN(a.humedad) FROM refrigerador_datos_crudos  as a, refrigerador_sensor as b WHERE  																										b.id_mapeo = ?  GROUP BY  a.time ASC, a.id_refrigerador_sensor ASC");
			mysqli_stmt_bind_param($query_31, 'i',  $id_mapeo);
			mysqli_stmt_execute($query_31);
			mysqli_stmt_store_result($query_31);
			mysqli_stmt_bind_result($query_31,  $max, $avg, $min);
			$colum = mysqli_stmt_num_rows($query_31);	
			}
	
		for($j=1;$j<=$filas;$j++){
			mysqli_stmt_fetch($query_3);
			echo "<td>$time</td>";
				
			for($g=1;$g<=$cuantos_2;$g++){
				mysqli_stmt_fetch($query_31);
					echo "<td>$max</td><td>$avg</td><td>$min</td>";
				
			}
			echo "</tr>";
			
		}
				

	echo "<tr></table>";

	mysqli_stmt_close($connect);	

?>