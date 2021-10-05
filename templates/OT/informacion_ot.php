<?php 
	include("../../config.ini.php");

	$id_numot = $_POST['id_ot'];

	
		//COSULTAR DATOS PARA ARMAR LA INFORMACIÓN DE 
		$query_1 = mysqli_prepare($connect,"SELECT  a.fecha_registro, b.nombre,  b.apellido, c.nombre  FROM numot as a, persona as b, empresa as c WHERE a.id_numot = ? AND a.id_usuario_asignado 																				= b.id_usuario AND a.id_empresa = c.id_empresa");

		mysqli_stmt_bind_param($query_1, 'i', $id_numot);
		mysqli_stmt_execute($query_1);
		mysqli_stmt_store_result($query_1);
		mysqli_stmt_bind_result($query_1,  $fecha_ot, $nombre_usuario, $apellido_usuario, $empresa);
		mysqli_stmt_fetch($query_1);
		
		$json_1 = array(
		'fecha_ot' => $fecha_ot,
		'nombre_usuario' => $nombre_usuario,
		'apellido_usuario' => $apellido_usuario,
		'empresa'=>$empresa	
		);



	$convert = json_encode($json_1);

	echo $convert;
	
		
			
		mysqli_stmt_close($connect);

?>