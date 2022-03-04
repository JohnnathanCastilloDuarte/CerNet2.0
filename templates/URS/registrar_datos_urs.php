<?php 
include('../../config.ini.php');



//seleccionar informe urs

$array_mapeo1=array();
$datos1 = mysqli_prepare($connect,"SELECT nombre_informe, id_asignado, fecha_registro FROM informe_urs ");
	mysqli_stmt_bind_param($datos1);
	mysqli_stmt_execute($datos1);
	mysqli_stmt_store_result($datos1);
	mysqli_stmt_bind_result($datos1, $nombre_informe, $id_asignado, $fecha_registro,);
	mysqli_stmt_fetch($datos1);


	

	while($row = mysqli_stmt_fetch($datos1)){
	$array_mapeo1[]=array(
		
		'nombre_informe' => $nombre_informe,
		'id_asignado' => $id_asignado,
		'fecha_registro' => $fecha_registro
	); 
  }


//seleccionar informacion 1

$array_mapeo2=array();
$datos2 = mysqli_prepare($connect,"SELECT explicacion_global, condicion_trabajo, fuente_electrica, montaje_equipo_1, montaje_equipo_2, rango_operario, norma_sigue, soporte_tecnico_post_marcha, activacion_respaldo, objetivo, introduccion_funcion FROM urs_informacion_1 ");
	mysqli_stmt_bind_param($datos2);
	mysqli_stmt_execute($datos2);
	mysqli_stmt_store_result($datos2);
	mysqli_stmt_bind_result($datos2, $explicacion_global, $condicion_trabajo, $fuente_electrica, $montaje_equipo_1, $montaje_equipo_2, $rango_operario, $norma_sigue, $soporte_tecnico_post_marcha, $activacion_respaldo, $objetivo, $introduccion_funcion);
	mysqli_stmt_fetch($datos2);


	

	while($row = mysqli_stmt_fetch($datos2)){
	$array_mapeo2[]=array(
		
		'explicacion_global' => $explicacion_global, 
		'condicion_trabajo' => $condicion_trabajo, 
		'fuente_electrica' => $fuente_electrica, 
		'montaje_equipo_1' => $montaje_equipo_1, 
		'montaje_equipo_2' => $montaje_equipo_2, 
		'rango_operario' => $rango_operario, 
		'norma_sigue' => $norma_sigue, 
		'soporte_tecnico_post_marcha' => $soporte_tecnico_post_marcha, 
		'activacion_respaldo' => $activacion_respaldo, 
		'objetivo' => $objetivo, 
		'introduccion_funcion' => $introduccion_funcion	
	); 
  }

  $smarty->display("URS/datos_informe_urs.tpl");

//Seleccionar urs alarma informe      
 	$array_mapeo3=array();
	$datos3 = mysqli_prepare($connect,"SELECT id_alarma, fecha_registro FROM urs_alarma_informe ");
	mysqli_stmt_bind_param($datos3);
	mysqli_stmt_execute($datos3);
	mysqli_stmt_store_result($datos3);
	mysqli_stmt_bind_result($datos3, $id_alarma, $fecha_registro,);
	mysqli_stmt_fetch($datos3);

	while($row = mysqli_stmt_fetch($datos3)){
	$array_mapeo3[]=array(
		
		'id_alarma' => $id_alarma,
		'fecha_registro' => $fecha_registro
	); 
  }

  //Seleccionar urs alarma informe      
 	$array_mapeo4=array();
	$datos4 = mysqli_prepare($connect,"SELECT id_backup, fecha_registro FROM urs_backup_informe ");
	mysqli_stmt_bind_param($datos4);
	mysqli_stmt_execute($datos4);
	mysqli_stmt_store_result($datos4);
	mysqli_stmt_bind_result($datos4, $id_backup, $fecha_registro,);
	mysqli_stmt_fetch($datos4);

	while($row = mysqli_stmt_fetch($datos4)){
	$array_mapeo4[]=array(
		
		'id_backup' => $id_alarma,
		'fecha_registro' => $fecha_registro
	); 
  }


   //Seleccionar urs alarma informe      
 	$array_mapeo5=array();
	$datos5 = mysqli_prepare($connect,"SELECT id_backup, fecha_registro FROM urs_backup_informe ");
	mysqli_stmt_bind_param($datos5);
	mysqli_stmt_execute($datos5);
	mysqli_stmt_store_result($datos5);
	mysqli_stmt_bind_result($datos5, $id_backup, $fecha_registro,);
	mysqli_stmt_fetch($datos5);

	while($row = mysqli_stmt_fetch($mapeo)){
	$array_mapeo5[]=array(
		
		'id_backup' => $id_backup,
		'fecha_registro' => $fecha_registro
	); 
  }

  //Seleccionar urs alarma informe      
 	$array_mapeo6=array();
	$datos6 = mysqli_prepare($connect,"SELECT id_glosario, fecha_registro FROM urs_glosario ");
	mysqli_stmt_bind_param($datos6);
	mysqli_stmt_execute($datos6);
	mysqli_stmt_store_result($datos6);
	mysqli_stmt_bind_result($datos6, $id_glosario, $fecha_registro,);
	mysqli_stmt_fetch($datos6);

	while($row = mysqli_stmt_fetch($mapeo)){
	$array_mapeo6[]=array(
		
		'id_glosario' => $id_glosario,
		'fecha_registro' => $fecha_registro
	); 
  }


  //Seleccionar urs requerimientos 
 	$array_mapeo7=array();
	$datos7 = mysqli_prepare($connect,"SELECT parametro, especificaciones, categoria, categoria_requerimiento, fecha_registro FROM urs_requerimientos_tecnicos ");
	mysqli_stmt_bind_param($datos7);
	mysqli_stmt_execute($datos7);
	mysqli_stmt_store_result($datos7);
	mysqli_stmt_bind_result($datos7, $parametro, $especificaciones, $categoria, $categoria_requerimiento, $fecha_registro,);
	mysqli_stmt_fetch($datos7);

	while($row = mysqli_stmt_fetch($mapeo)){
	$array_mapeo7[]=array(
		
		'parametro' => $parametro,
		'especificaciones' => $especificaciones,
		'categoria' => $categoria, 
		'categoria_requerimiento' => $categoria_requerimiento, 
		'fecha_registro' => $fecha_registro
	); 
  }

  //Seleccionar urs requerimientos 
 	$array_mapeo7=array();
	$datos7 = mysqli_prepare($connect,"SELECT parametro, especificaciones, categoria, categoria_requerimiento, fecha_registro FROM urs_requerimientos_tecnicos ");
	mysqli_stmt_bind_param($datos7);
	mysqli_stmt_execute($datos7);
	mysqli_stmt_store_result($datos7);
	mysqli_stmt_bind_result($datos7, $parametro, $especificaciones, $categoria, $categoria_requerimiento, $fecha_registro,);
	mysqli_stmt_fetch($datos7);

	while($row = mysqli_stmt_fetch($mapeo)){
	$array_mapeo7[]=array(
		
		'parametro' => $parametro,
		'especificaciones' => $especificaciones,
		'categoria' => $categoria, 
		'categoria_requerimiento' => $categoria_requerimiento, 
		'fecha_registro' => $fecha_registro
	); 
  }


  //Seleccionar urs Resoluciones      
 	$array_mapeo6=array();
	$datos6 = mysqli_prepare($connect,"SELECT id_resolucion, fecha_registro FROM urs_glosario ");
	mysqli_stmt_bind_param($datos6);
	mysqli_stmt_execute($datos6);
	mysqli_stmt_store_result($datos6);
	mysqli_stmt_bind_result($datos6, $id_resolucion, $fecha_registro,);
	mysqli_stmt_fetch($datos6);

	while($row = mysqli_stmt_fetch($mapeo)){
	$array_mapeo6[]=array(
		
		'id_resolucion' => $id_resolucion,
		'fecha_registro' => $fecha_registro
	); 
  }

	

?>