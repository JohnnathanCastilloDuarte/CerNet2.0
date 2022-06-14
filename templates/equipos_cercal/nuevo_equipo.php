<?php 
include("../../config.ini.php");

	$nombre_equipo = $_POST['nombre_equipo'];
	$marca_equipo = $_POST['marca_equipo'];
	$n_serie_equipo = $_POST['n_serie_equipo'];
	$modelo_equipo = $_POST['modelo_equipo'];
	$tipo_medicion = $_POST['tipo_medicion'];

	$n_certificado = $_POST['n_certificado'];
	$pais = $_POST['pais'];
	$fecha_emision = $_POST['fecha_emision'];
	$fecha_vencimiento = $_POST['fecha_vencimiento'];
	$estado = 'Vigente';


	$insertar_equipo = mysqli_prepare($connect,'INSERT INTO equipos_cercal (nombre_equipo, marca_equipo, n_serie_equipo, modelo_equipo, tipo_medicion) VALUES (?,?,?,?,?)');
	mysqli_stmt_bind_param($insertar_equipo, 'sssss', $nombre_equipo, $marca_equipo, $n_serie_equipo, $modelo_equipo, $tipo_medicion);
	mysqli_stmt_execute($insertar_equipo);
	$id_equipo = mysqli_stmt_insert_id($insertar_equipo);

	if ($insertar_equipo) {

		$insertar_calibracion = mysqli_prepare($connect,'INSERT INTO certificado_equipo (numero_certificado, pais, fecha_emision, fecha_vencimiento, id_equipo_cercal, estado) VALUES (?,?,?,?,?)');
		mysqli_stmt_bind_param($insertar_calibracion, 'ssssss', $n_certificado, $pais, $fecha_emision, $fecha_vencimiento, $id_equipo, $estado);
		mysqli_stmt_execute($insertar_calibracion);

		if ($insertar_calibracion) {
			echo "Si";
		}
	}else{
		echo "No";
	}

?>