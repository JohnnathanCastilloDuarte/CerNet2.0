<?php 
include("../../config.ini.php");

if (isset($_POST['id_equipo_cercal'])) {
	$id_equipo_cercal = $_POST['id_equipo_cercal'];
	$nombre_equipo = $_POST['nombre_equipo'];
	$marca_equipo = $_POST['marca_equipo'];
	$n_serie_equipo = $_POST['n_serie_equipo'];
	$modelo_equipo = $_POST['modelo_equipo'];
	$tipo_medicion = $_POST['tipo_medicion'];
	$modelo_estufa = $_POST['modelo_estufa'];
	
	$update_equipo = mysqli_prepare($connect,"UPDATE equipos_cercal  SET nombre_equipo = ?, marca_equipo = ?, n_serie_equipo = ?, modelo_equipo = ?, tipo_medicion = ?  WHERE id_equipo_cercal = ?");
	mysqli_stmt_bind_param($update_equipo, 'sssssi', $nombre_equipo, $marca_equipo, $n_serie_equipo, $modelo_equipo, $tipo_medicion, $id_equipo_cercal);
	mysqli_stmt_execute($update_equipo);

	if ($update_equipo) {
		echo "Si";
	}else{
		echo "No";
	}

}



 ?>