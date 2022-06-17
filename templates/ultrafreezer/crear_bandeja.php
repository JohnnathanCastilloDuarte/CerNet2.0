<?php 
	include("../../config.ini.php");

	$id_asignado = $_POST['id_asignado'];
	$bandeja = $_POST['bandeja'];
	$id_valida = $_POST['id_valida'];


	/*$consultar_item = mysqli_prepare($connect,"SELECT a.servicio, d.numot FROM servicio_tipo as a, item_asignado as b, servicio as c, numot as d  WHERE b.id_asignado = $id_asignado AND  																											c.id_servicio = b.id_servicio AND c.id_servicio_tipo = 	a.id_servicio_tipo AND c.id_numot = d.id_numot ");
	mysqli_stmt_execute($consultar_item);
	mysqli_stmt_store_result($consultar_item);
	mysqli_stmt_bind_result($consultar_item,  $nombre_servicio, $ot);
	mysqli_stmt_fetch($consultar_item);


	$mensaje = "Ha creado una nueva Bandeja: ".$bandeja." correspondiente al servicio: ".$nombre_servicio." y la OT: ".$ot;
	$tipo_historial = 1;

	$insertando_historial = mysqli_prepare($connect,"INSERT INTO historial_ultrafreezer (id_usuario, mensaje_historial, tipo_historial) VALUES ( ?, ?, ?)");
	mysqli_stmt_bind_param($insertando_historial, 'isi', $id_valida, $mensaje, $tipo_historial);
	mysqli_stmt_execute($insertando_historial);*/



  $crear_bandeja = mysqli_prepare($connect,"INSERT INTO bandeja (id_asignado, nombre, id_usuario) VALUES (?,?,?)");
  mysqli_stmt_bind_param($crear_bandeja, 'isi', $id_asignado, $bandeja, $id_valida);
  mysqli_stmt_execute($crear_bandeja);
		

	if($crear_bandeja){
		echo "creado";
		
	}else{
		echo "error";
	}

	mysqli_stmt_close($connect);	

?>