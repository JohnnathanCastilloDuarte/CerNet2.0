<?php 
	include("config.ini.php");
	
	$id_informe = $_GET['id'];
	$type = $_GET['type'];
	$filas = "";
	$colum = "";
	$de = "";

  echo $id_informe;
	$query_1 = mysqli_prepare($connect,"SELECT id_mapeo, id_asignado FROM informe_ultrafreezer WHERE id_informe_ultrafreezer  = ?");
	mysqli_stmt_bind_param($query_1, 'i', $id_informe);
	mysqli_stmt_execute($query_1);
	mysqli_stmt_store_result($query_1);
	mysqli_stmt_bind_result($query_1, $id_mapeo, $id_asignado);
	mysqli_stmt_fetch($query_1);



	$query_2 = mysqli_prepare($connect,"SELECT b.nombre, b.id_sensor, a.id_ultrafreezer_sensor FROM ultrafreezer_sensor as a, sensores as b WHERE a.id_mapeo = ? AND a.id_asignado = ? AND a.id_sensor = b.id_sensor ORDER BY LENGTH(a.posicion) ASC, a.posicion ASC");
	mysqli_stmt_bind_param($query_2, 'ii', $id_mapeo, $id_asignado);
	mysqli_stmt_execute($query_2);
	mysqli_stmt_store_result($query_2);
	mysqli_stmt_bind_result($query_2,  $nombre_sensor, $id_sensor, $id_ultrafreezer_sensor);
	//$cuantos = mysqli_stmt_num_rows($query_2);

 

	$query_21 = mysqli_prepare($connect,"SELECT a.id_ultrafreezer_sensor FROM ultrafreezer_sensor as a, sensores as b WHERE a.id_mapeo = 	? 	AND a.id_asignado = ? 	AND a.id_sensor = b.id_sensor");
	mysqli_stmt_bind_param($query_21, 'ii', $id_mapeo, $id_asignado);
	mysqli_stmt_execute($query_21);
	mysqli_stmt_store_result($query_21);
	mysqli_stmt_bind_result($query_21, $id_ultrafreezer_sensor );
	$cuantos = mysqli_stmt_num_rows($query_21);


	echo "<table style='text-align:center;' width='30%' border='1'>
		<tr>
			<td rowspan='2'>Fecha/Hora</td>
			<td colspan='$cuantos'>Sensores</td>
		</tr>
		<tr>";
	while($row = mysqli_stmt_fetch($query_2)){
    

		echo "<td style='color:red' >$nombre_sensor</td>";
	}
echo "</tr>";

	mysqli_stmt_fetch($query_21);

			
			$query_3 = mysqli_prepare($connect,"SELECT DISTINCT a.time FROM ultrafreezer_datos_crudos as a, ultrafreezer_sensor as b WHERE b.id_mapeo = ? AND a.id_ultrafreezer_sensor = b.id_ultrafreezer_sensor  ORDER BY time ASC");
			mysqli_stmt_bind_param($query_3, 'i',  $id_mapeo);
			mysqli_stmt_execute($query_3);
			mysqli_stmt_store_result($query_3);
			mysqli_stmt_bind_result($query_3, $time);
			$filas = mysqli_stmt_num_rows($query_3);	
      

      $query_31 = mysqli_prepare($connect,"SELECT  a.temperatura FROM ultrafreezer_datos_crudos  as a, ultrafreezer_sensor as b, sensores as c WHERE  a.id_ultrafreezer_sensor = b.id_ultrafreezer_sensor AND b.id_mapeo = ? AND b.id_sensor = c.id_sensor ORDER BY a.time ASC,  LENGTH(b.posicion) ASC, b.posicion ASC");
      mysqli_stmt_bind_param($query_31, 'i', $id_mapeo);
      mysqli_stmt_execute($query_31);
      mysqli_stmt_store_result($query_31);
      mysqli_stmt_bind_result($query_31, $datos);
      $colum = mysqli_stmt_num_rows($query_31);	
     
		for($j=1;$j<=$filas;$j++){
			mysqli_stmt_fetch($query_3);
			echo "<td>$time</td>";
				
			for($g=1;$g<=$cuantos;$g++){
				mysqli_stmt_fetch($query_31);
					echo "<td>$datos</td>";
			}
      
			echo "</tr>";
			
		}
				

	echo "<tr></table>";

	mysqli_stmt_close($connect);	
	?>
