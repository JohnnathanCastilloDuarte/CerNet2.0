<?php 

//update informe urs
include('../../config.ini.php');

	$update_datos1  = mysqli_prepare($connect,"UPDATE informe_urs SET nombre_informe = ?
		WHERE id_informe = ?");
	mysqli_stmt_bind_param($update_datos1, 's', $id_informe );

	mysqli_stmt_execute($update_datos1);

	if ($update_datos1) {
		echo "si";
	}else{
		echo "no informe urs";
	}

	$update_datos1  = mysqli_prepare($connect,"UPDATE urs_informacion_1 SET 
		explicacion_global = ?, 
		condicion_trabajo = ?, 
		fuente_electrica = ?,
		montaje_equipo1 = ?, 
		montaje_equipo2 = ?,
		rango_operario = ?,
		norma_sigue = ?,
		soporte_tecnico_post_marcha = ?,
		activacion_respaldo = ?,
		objeto = ?,
		introduccion_funcion = ?

		WHERE id_asignado = ?");
	mysqli_stmt_bind_param($update_datos1, 'sssssssssss', $explicacion_global, $condicion_trabajo, $fuente_electrica, $montaje_equipo1, $montaje_equipo2, $rango_operario, $norma_sigue, $soporte_tecnico_post_marcha, $activacion_respaldo, $objeto, $introduccion_funcion );

	mysqli_stmt_execute($update_datos1);

	if ($update_datos1) {
		echo "si";
	}else{
		echo "no urs informacion 1";
	}

	$update_datos1  = mysqli_prepare($connect,"UPDATE urs_requerimientos_tecnicos SET 
		parametro = ?, 
		especificaciones = ?, 
		categoria = ?,
		categoria_requerimiento = ?, 

		WHERE id_asignado = ?");
	mysqli_stmt_bind_param($update_datos1, 'ssss', $parametro, $especificaciones, $categoria, $categoria_requerimiento  );

	mysqli_stmt_execute($update_datos1);

	if ($update_datos1) {
		echo "si";
	}else{
		echo "no urs requerimientos tecnicos";
	}

 ?>