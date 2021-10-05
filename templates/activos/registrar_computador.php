<?php 

	include("../../config.ini.php");

	$ubicacion_computador = $_POST['ubicacion_computado'];
	$marca_computador = $_POST['marca_computador'];
	$serial_computador = $_POST['serial_computador'];
	$modelo_computador = $_POST['modelo_computador'];
	$SO_computador = $_POST['SO_computador'];
	$disco_duro_computador = $_POST['disco_duro_computador'];
	$ram_computador = $_POST['ram_computador'];
	$procesador_computador = $_POST['procesador_computador'];
	$observaciones_computador = $_POST['observaciones_computador'];
	$id_valida = $_POST['id_valida'];





	mysqli_stmt_close($connect);



?>