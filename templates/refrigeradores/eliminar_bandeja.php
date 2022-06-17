<?php 
	include("../../config.ini.php");

	$id_bandeja = $_POST['id_bandeja'];
	$id_asignado =$_POST['id_asignado'];
	$id_valida = $_POST['id_valida'];
	

	
	$primer_filtro = mysqli_prepare($connect,"SELECT id_mapeo , id_sensor FROM refrigerador_sensor WHERE id_bandeja = $id_bandeja ");
	mysqli_stmt_execute($primer_filtro);
	mysqli_stmt_store_result($primer_filtro);
	mysqli_stmt_bind_result($primer_filtro, $id_mapeo, $id_sensor);
	mysqli_stmt_fetch($primer_filtro);
				


		if($id_mapeo > 0 or $id_sensor > 0){
			
			echo "No";
		}else{
			
	
			$elimando_bandeja = mysqli_prepare($connect,"DELETE FROM bandeja WHERE id_bandeja = $id_bandeja");
			mysqli_stmt_execute($elimando_bandeja);
			
			if($elimando_bandeja){
				echo "Eliminado";
				
			$consultar_bandeja = mysqli_prepare($connect,"SELECT nombre FROM bandeja WHERE id_bandeja = $id_bandeja");
			mysqli_stmt_execute($consultar_bandeja);
			mysqli_stmt_store_result($consultar_bandeja);
			mysqli_stmt_bind_result($consultar_bandeja, $bandeja);
			mysqli_stmt_fetch($consultar_bandeja);



			$consultar_item = mysqli_prepare($connect,"SELECT a.servicio, d.numot FROM servicio_tipo as a, item_asignado as b, servicio as c, numot as d  WHERE b.id_asignado = 								$id_asignado AND c.id_servicio = b.id_servicio 				AND 		c.id_servicio_tipo = 	a.id_servicio_tipo AND c.id_numot = d.id_numot ");
			mysqli_stmt_execute($consultar_item);
			mysqli_stmt_store_result($consultar_item);
			mysqli_stmt_bind_result($consultar_item,  $nombre_servicio, $ot);
			mysqli_stmt_fetch($consultar_item);


			$mensaje = "Ha eliminado una Bandeja: ".$bandeja." correspondiente al servicio: ".$nombre_servicio." y la OT: ".$ot;
			$tipo_historial = 3;

			$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_refrigeradores (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
			mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
			mysqli_stmt_execute($insertando_historial);
			}else{
				echo "Error interno";
			}
			
		}
	mysqli_stmt_close($connect);

?>