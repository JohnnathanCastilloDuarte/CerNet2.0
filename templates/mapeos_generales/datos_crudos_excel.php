<?php 
include('../../config.ini.php');

$key = $_GET['key'];
$tipo = $_GET['tipo'];
$id_informe = substr($key, 64);






if($tipo == "TEMP"){

  $comparador="";
  $contador_1 = 1;
  $contador_2 = 1;
 
$consulta_1 = mysqli_prepare($connect,"SELECT c.nombre, a.id_sensor_mapeo, LENGTH(a.posicion) as longitud, a.posicion FROM mapeo_general_sensor as a, informes_general as b, 
sensores as c WHERE a.id_mapeo = b.id_mapeo AND b.id_informe = ? AND a.id_sensor = c.id_sensor ORDER BY longitud ASC, a.posicion ASC");
mysqli_stmt_bind_param($consulta_1, 'i', $id_informe);
mysqli_stmt_execute($consulta_1);
mysqli_stmt_store_result($consulta_1);
mysqli_stmt_bind_result($consulta_1, $nombre_sensor, $id_sensor_mapeo, $longitud, $altura);

$cantidad_sensores = mysqli_stmt_num_rows($consulta_1);

  echo "<table style='text-align:center;' width='30%' border='1'>
		<tr>
			<td rowspan='2'>Fecha/Hora</td>
			<td colspan='$cantidad_sensores'>Sensores</td>
		</tr>
		<tr>";
	while($row = mysqli_stmt_fetch($consulta_1)){
    
		echo "<td style='color:red;font-size: 12px;' > $nombre_sensor <br> $altura</td>";
	}
echo "</tr>";
  
  
$traer_data_cruda = mysqli_prepare($connect,"SELECT a.temp, LENGTH(b.posicion) as longitud, b.posicion, a.time  from datos_crudos_general as a, 
mapeo_general_sensor as b, informes_general as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = c.id_mapeo AND c.id_informe = ? 
ORDER BY a.time ASC, longitud ASC, b.posicion ASC");  
mysqli_stmt_bind_param($traer_data_cruda, 'i', $id_informe);
mysqli_stmt_execute($traer_data_cruda);
mysqli_stmt_store_result($traer_data_cruda);
mysqli_stmt_bind_result($traer_data_cruda, $dato, $longitud, $posicion, $fehca);
  
$traer_fechas = mysqli_prepare($connect,"SELECT DISTINCT a.time  FROM datos_crudos_general as a, mapeo_general_sensor as b, informes_general as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo 
AND b.id_mapeo = c.id_mapeo AND c.id_informe = ?  ORDER BY time ASC");
mysqli_stmt_bind_param($traer_fechas, 'i',  $id_informe);
mysqli_stmt_execute($traer_fechas);
mysqli_stmt_store_result($traer_fechas);
mysqli_stmt_bind_result($traer_fechas, $time);
$filas = mysqli_stmt_num_rows($traer_fechas);
  
 
for($g = 0; $g < $filas; $g++){
  mysqli_stmt_fetch($traer_fechas);
  echo "<td>".$time."</td>";
    for($t = 0; $t < $cantidad_sensores; $t++){
        mysqli_stmt_fetch($traer_data_cruda);
        echo "<td>".$dato."</td>";
     }
  echo "</tr>";
}
  
  
/*  
$consulta_2 = mysqli_prepare($connect,"SELECT a.id_sensor_mapeo, a.id_mapeo FROM mapeo_general_sensor as a, informes_general as b, sensores as c, bandeja as d 
WHERE a.id_mapeo = b.id_mapeo AND b.id_informe = ? AND a.id_sensor = c.id_sensor AND a.id_bandeja = d.id_bandeja ORDER BY d.id_bandeja ASC");
mysqli_stmt_bind_param($consulta_2, 'i', $id_informe);
mysqli_stmt_execute($consulta_2);
mysqli_stmt_store_result($consulta_2);
mysqli_stmt_bind_result($consulta_2,  $id_sensor_mapeo, $id_mapeo);
  
while($row2 = mysqli_stmt_fetch($consulta_2)){
   
    $query_3 = mysqli_prepare($connect,"SELECT DISTINCT a.time  FROM datos_crudos_general as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo 
    AND b.id_mapeo = ?  ORDER BY time ASC");
    mysqli_stmt_bind_param($query_3, 'i',  $id_mapeo);
    mysqli_stmt_execute($query_3);
    mysqli_stmt_store_result($query_3);
    mysqli_stmt_bind_result($query_3, $time);
    $filas = mysqli_stmt_num_rows($query_3);
  
    $query_31 = mysqli_prepare($connect,"SELECT a.temp FROM datos_crudos_general  as a WHERE  a.id_sensor_mapeo = ? ORDER BY a.time ASC, a.id_sensor_mapeo ASC");
    mysqli_stmt_bind_param($query_31, 'i', $id_sensor_mapeo);
    mysqli_stmt_execute($query_31);
    mysqli_stmt_store_result($query_31);
    mysqli_stmt_bind_result($query_31, $datos);
    $colum = mysqli_stmt_num_rows($query_31);
    
      
          for($g = 0; $g < $filas; $g++){
             mysqli_stmt_fetch($query_3);
              echo "<td>".$time."</td>";
            for($t = 0; $t < $cantidad_sensores; $t++){
               mysqli_stmt_fetch($query_31);
                echo "<td>".$datos."</td>";
            }
            echo "</tr>";
          }
        
    
     
}*/
     
echo "</table>";
  
 
  
}

else{
  $comparador="";
  $contador_1 = 1;
  $contador_2 = 1;
 

$consulta_1 = mysqli_prepare($connect,"SELECT c.nombre, a.id_sensor_mapeo, d.nombre FROM mapeo_general_sensor as a, informes_general as b, sensores as c, bandeja as d 
WHERE a.id_mapeo = b.id_mapeo AND b.id_informe = ? AND a.id_sensor = c.id_sensor AND a.id_bandeja = d.id_bandeja ORDER BY d.id_bandeja ASC");
mysqli_stmt_bind_param($consulta_1, 'i', $id_informe);
mysqli_stmt_execute($consulta_1);
mysqli_stmt_store_result($consulta_1);
mysqli_stmt_bind_result($consulta_1, $nombre_sensor, $id_sensor_mapeo, $altura);

$cantidad_sensores = mysqli_stmt_num_rows($consulta_1);

  echo "<table style='text-align:center;' width='30%' border='1'>
		<tr>
			<td rowspan='2'>Fecha/Hora</td>
			<td colspan='$cantidad_sensores'>Sensores</td>
		</tr>
		<tr>";
	while($row = mysqli_stmt_fetch($consulta_1)){
    
		echo "<td style='color:red;font-size: 12px;' > $nombre_sensor <br> $altura</td>";
	}
echo "</tr>";
  
  
$consulta_2 = mysqli_prepare($connect,"SELECT a.id_sensor_mapeo, a.id_mapeo FROM mapeo_general_sensor as a, informes_general as b, sensores as c, bandeja as d 
WHERE a.id_mapeo = b.id_mapeo AND b.id_informe = ? AND a.id_sensor = c.id_sensor AND a.id_bandeja = d.id_bandeja ORDER BY d.id_bandeja ASC");
mysqli_stmt_bind_param($consulta_2, 'i', $id_informe);
mysqli_stmt_execute($consulta_2);
mysqli_stmt_store_result($consulta_2);
mysqli_stmt_bind_result($consulta_2,  $id_sensor_mapeo, $id_mapeo);
  
while($row2 = mysqli_stmt_fetch($consulta_2)){
  
    $query_3 = mysqli_prepare($connect,"SELECT DISTINCT a.time  FROM datos_crudos_general as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  ORDER BY time ASC");
    mysqli_stmt_bind_param($query_3, 'i',  $id_mapeo);
    mysqli_stmt_execute($query_3);
    mysqli_stmt_store_result($query_3);
    mysqli_stmt_bind_result($query_3, $time);
    $filas = mysqli_stmt_num_rows($query_3);
  
    $query_31 = mysqli_prepare($connect,"SELECT a.hum FROM datos_crudos_general  as a WHERE  a.id_sensor_mapeo = ? ORDER BY a.time ASC, a.id_sensor_mapeo ASC");
    mysqli_stmt_bind_param($query_31, 'i', $id_sensor_mapeo);
    mysqli_stmt_execute($query_31);
    mysqli_stmt_store_result($query_31);
    mysqli_stmt_bind_result($query_31,  $datos);
    $colum = mysqli_stmt_num_rows($query_31);  
}
  
  for($j=1;$j<=$colum;$j++){
			mysqli_stmt_fetch($query_3);
			echo "<td>$time</td>";
			
			for($g=1;$g<=$cantidad_sensores;$g++){
				mysqli_stmt_fetch($query_31);
					echo "<td>$datos</td>";
      
		}
			echo "</tr>";
			
		}

echo "</table>";
}

?>