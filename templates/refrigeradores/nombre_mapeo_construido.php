<?php 

  $fecha_inicio_mapeo = $_POST['fecha_inicio_mapeo'];
	$hora_inicio_mapeo = $_POST['hora_inicio_mapeo'];
	$minuto_inicio_mapeo = $_POST['minuto_inicio_mapeo'];
	$segundo_inicio_mapeo = $_POST['segundo_inicio_mapeo'];

	$hora_inicio = $hora_inicio_mapeo.":".$minuto_inicio_mapeo.":".$segundo_inicio_mapeo;

	$fecha_fin_mapeo = $_POST['fecha_fin_mapeo'];
	$hora_fin_mapeo = $_POST['hora_fin_mapeo'];
	$minuto_fin_mapeo = $_POST['minuto_fin_mapeo'];
	$segundo_fin_mapeo = $_POST['segundo_fin_mapeo'];

	$hora_fin = $hora_fin_mapeo.":".$minuto_fin_mapeo.":".$segundo_fin_mapeo;


  $fecha_incial = $fecha_inicio_mapeo.' '.$hora_inicio_mapeo.':'.$minuto_inicio_mapeo.':'.$segundo_inicio_mapeo;

  $fecha_fin = $fecha_fin_mapeo.' '.$hora_fin_mapeo.':'.$minuto_fin_mapeo.':'.$segundo_fin_mapeo;

  $c_dias = number_format(((strtotime($fecha_fin)-strtotime($fecha_incial))/3600)/24,2);
  $c_hora = $c_dias * 24;

 
  echo $fecha_inicio_mapeo;

?>