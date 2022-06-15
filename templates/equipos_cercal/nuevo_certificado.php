<?php 
include("../../config.ini.php");

$id_equipo_certificado = $_POST['id_equipo_certificado'];
$fecha_emision_update = $_POST['fecha_emision_update'];
$numero_certificado_update = $_POST['numero_certificado_update'];
$pais_update = $_POST['pais_update'];
$estado = 'Vigente';
$una_fecha = date("Y-m-d",strtotime($fecha_emision_update."+ 1 year"));


$insertar_calibracion = mysqli_prepare($connect,'INSERT INTO certificado_equipo (numero_certificado, pais, fecha_emision, fecha_vencimiento, id_equipo_cercal, estado) VALUES (?,?,?,?,?,?)');
		mysqli_stmt_bind_param($insertar_calibracion, 'ssssss', $numero_certificado_update, $pais_update, $fecha_emision_update, $una_fecha, $id_equipo_certificado, $estado);
		mysqli_stmt_execute($insertar_calibracion);

		if ($insertar_calibracion) {
			echo "Si";
		
		}else{
			echo "No";
		
		}

 ?>