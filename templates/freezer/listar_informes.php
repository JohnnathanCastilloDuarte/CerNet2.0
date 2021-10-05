<?php 
	include("../../config.ini.php");

	$id_asignado = $_POST['id_asignado_freezer'];
	
	$datos_1 = "";
	

	$json = array();

		//CONSULTAR INFORMES

		$informes = mysqli_prepare($connect,"SELECT a.id_informe_freezer, a.n_increment,  a.nombre, a.tipo, a.id_mapeo, a.id_asignado, a.estado, a.fecha_registro, b.nombre, a.observacion,
			a.comentarios  FROM informe_freezer as a, freezer_mapeo as b WHERE  a.id_asignado = $id_asignado AND a.id_asignado = b.id_asignado AND a.id_mapeo = b.id_mapeo ORDER BY tipo DESC ");

		mysqli_stmt_execute($informes);
		mysqli_stmt_store_result($informes);
		mysqli_stmt_bind_result($informes, $id_informe, $n_increment, $nombre, $tipo, $id_mapeo, $id_asignado, $estado, $fecha_registro, $nombre_mapeo, $observacion, $comentarios);


		
	while($row = mysqli_stmt_fetch($informes)){
		
			$aprobacion = mysqli_prepare($connect,"SELECT id_aprobacion, estado, observacion FROM aprobacion_informes WHERE id_informe = ?");
			mysqli_stmt_bind_param($aprobacion, 'i', $id_informe);
			mysqli_stmt_execute($aprobacion);
			mysqli_stmt_store_result($aprobacion);
			mysqli_stmt_bind_result($aprobacion, $id_aprobacion, $estado_informe, $observaciones_informe);
			mysqli_stmt_fetch($aprobacion);
		
			$img_posicion = mysqli_prepare($connect, "SELECT ubicacion FROM images_informe_freezer WHERE id_informe = $id_informe AND tipo_imagen = 1");
			mysqli_stmt_execute($img_posicion);
			mysqli_stmt_store_result($img_posicion);
			mysqli_stmt_bind_result($img_posicion, $url);
			mysqli_stmt_fetch($img_posicion);
		
			$img_graf_1 = mysqli_prepare($connect, "SELECT ubicacion FROM images_informe_freezer WHERE id_informe = $id_informe AND tipo_imagen = 2");
			mysqli_stmt_execute($img_graf_1);
			mysqli_stmt_store_result($img_graf_1);
			mysqli_stmt_bind_result($img_graf_1, $url_grafi_1);
			mysqli_stmt_fetch($img_graf_1);
		
			$img_graf_2 = mysqli_prepare($connect, "SELECT ubicacion FROM images_informe_freezer WHERE id_informe = $id_informe AND tipo_imagen = 3");
			mysqli_stmt_execute($img_graf_2);
			mysqli_stmt_store_result($img_graf_2);
			mysqli_stmt_bind_result($img_graf_2, $url_grafi_2);
			mysqli_stmt_fetch($img_graf_2);
			

		
		$json[] = array(
		'id_informe'=>$id_informe,
		'nombre'=>$nombre,
		'id_mapeo'=>$id_mapeo,
		'nombre_mapeo'=>$nombre_mapeo,
		'estado'=>$estado,
		'fecha_registro'=>$fecha_registro,
		'tipo_informe'=>$tipo,
		'img_posicion'=>$url,
		'grafica_1'=>$url_grafi_1,
		'grafica_2'=>$url_grafi_2,	
		'observacion'=>$observacion,
		'comentarios'=>$comentarios,
		'id_aprobacion'=>$id_aprobacion,	
		'estado_aprobacion'=>$estado_informe,
		'observacion_aprobacion'=>$observaciones_informe,
    'n_increment'=>$n_increment
		);
		
	}


	$convert = json_encode($json);
	
		echo $convert;

		mysqli_stmt_close($connect);
?>