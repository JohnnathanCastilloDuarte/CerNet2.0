<?php 
	include("../../config.ini.php");

	$id_bandeja = $_POST['id_bandeja_change'];
	$id_asignado =$_POST['id_asignado'];
	$id_valida = $_POST['id_valida'];
	
	$primer_filtro = mysqli_prepare($connect,"SELECT id_mapeo , id_sensor FROM ultrafreezer_sensor WHERE id_bandeja = $id_bandeja ");
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

			}else{
				echo "Error interno";
			}
			
		}
	mysqli_stmt_close($connect);

?>