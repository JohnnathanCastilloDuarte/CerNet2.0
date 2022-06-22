<?php 
	include("../../config.ini.php");

	$id_mapeo = $_POST['id_mapeo'];

	$listar = mysqli_prepare($connect,"SELECT  nombre, fecha_inicio, hora_inicio, fecha_final, hora_final, 
													intervalo, temperatura_minima, temperatura_maxima, valor_seteado_temperatura FROM estufaeincubadora_mapeo WHERE id_mapeo = $id_mapeo");
	mysqli_stmt_execute($listar);
	mysqli_stmt_store_result($listar);
	mysqli_stmt_bind_result($listar,  $nombre, $fecha_inicio, $hora_inicio, $fecha_final, $hora_final, $intervalo, $temperatura_minima, 
																		$temperatura_maxima, $valor_seteado_temperatura);


	$json = array();

	while($row = mysqli_stmt_fetch($listar)){
		
			$explode_hora_inicio = explode(":",$hora_inicio);
			$explode_hora_fin = explode(":",$hora_final);
		
		$json[]=array(
      
      
		'id_mapeo_estufaeincubadora'=>$id_mapeo,	
		'nombre'=>$nombre,
		'fecha_inicio'=>$fecha_inicio,
		'hora_inicio'=>$explode_hora_inicio[0],
		'minuto_inicio'=>$explode_hora_inicio[1],
		'segundo_inicio'=>$explode_hora_inicio[2],	
		'fecha_final'=>$fecha_final,
		'hora_final'=>$explode_hora_fin[0],
		'minuto_final'=>$explode_hora_fin[1],
		'segundo_final'=>$explode_hora_fin[2],	
		'intervalo'=>$intervalo,
		'temperatura_minima'=>$temperatura_minima,
		'temperatura_maxima'=>$temperatura_maxima,
		'valor_seteado_temperatura'=>$valor_seteado_temperatura		
		);
	}

	$convert = json_encode($json[0]);

	echo $convert;



mysqli_stmt_close($connect);

?>