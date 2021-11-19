<?php 
	include("../../config.ini.php");

	$id_asignado = $_POST['id_asignado_automovil'];
	
	$datos_1 = "";
	

	$json = array();

		//CONSULTAR INFORMES

		$informes = mysqli_prepare($connect,"SELECT a.id_informe_automovil, a.n_increment,  a.nombre, a.id_mapeo, a.id_asignado, a.estado, a.fecha_registro, b.nombre, a.observacion,
			a.comentario  FROM informes_automovil as a, automovil_mapeo as b WHERE  a.id_asignado = $id_asignado AND a.id_asignado = b.id_asignado AND a.id_mapeo = b.id_mapeo ORDER BY a.n_increment ASC ");

		mysqli_stmt_execute($informes);
		mysqli_stmt_store_result($informes);
		mysqli_stmt_bind_result($informes, $id_informe, $n_increment, $nombre, $id_mapeo, $id_asignado, $estado, $fecha_registro, $nombre_mapeo, $observacion, $comentarios);


		
	while($row = mysqli_stmt_fetch($informes)){
		
			/*$aprobacion = mysqli_prepare($connect,"SELECT id_aprobacion, estado, observacion FROM aprobacion_informes WHERE id_informe = ?");
			mysqli_stmt_bind_param($aprobacion, 'i', $id_informe);
			mysqli_stmt_execute($aprobacion);
			mysqli_stmt_store_result($aprobacion);
			mysqli_stmt_bind_result($aprobacion, $id_aprobacion, $estado_informe, $observaciones_informe);
			mysqli_stmt_fetch($aprobacion);*/
		
			$img_posicion = mysqli_prepare($connect, "SELECT id_imagen, ubicacion FROM imagenes_informe_automovil WHERE id_informe = $id_informe AND tipo_imagen = 3");
			mysqli_stmt_execute($img_posicion);
			mysqli_stmt_store_result($img_posicion);
			mysqli_stmt_bind_result($img_posicion, $id_imagen1, $url);
			mysqli_stmt_fetch($img_posicion);
		
			$img_graf_1 = mysqli_prepare($connect, "SELECT id_imagen, ubicacion FROM imagenes_informe_automovil WHERE id_informe = $id_informe AND tipo_imagen = 1");
			mysqli_stmt_execute($img_graf_1);
			mysqli_stmt_store_result($img_graf_1);
			mysqli_stmt_bind_result($img_graf_1, $id_imagen2, $url_grafi_1);
			mysqli_stmt_fetch($img_graf_1);
		
			$img_graf_2 = mysqli_prepare($connect, "SELECT id_imagen,  ubicacion FROM imagenes_informe_automovil WHERE id_informe = $id_informe AND tipo_imagen = 0");
			mysqli_stmt_execute($img_graf_2);
			mysqli_stmt_store_result($img_graf_2);
			mysqli_stmt_bind_result($img_graf_2, $id_imagen3, $url_grafi_2);
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
    'n_increment'=>$n_increment,
    'id_imagen1'=>$id_imagen1,
    'id_imagen2'=>$id_imagen2,
    'id_imagen3'=>$id_imagen3  
		);
		
	}


	$convert = json_encode($json);
	
		echo $convert;

		mysqli_stmt_close($connect);
?>