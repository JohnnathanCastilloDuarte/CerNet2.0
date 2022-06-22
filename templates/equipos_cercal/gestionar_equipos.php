<?php 
include("../../config.ini.php");

$mostrar_equipos = mysqli_prepare($connect,"SELECT id_equipo_cercal, nombre_equipo, marca_equipo, n_serie_equipo, modelo_equipo, tipo_medicion 
	FROM equipos_cercal");
    mysqli_stmt_execute($mostrar_equipos);
    mysqli_stmt_store_result($mostrar_equipos);
    mysqli_stmt_bind_result($mostrar_equipos, $id_equipo_cercal, $nombre_equipo, $marca, $n_serie_equipo, $modelo_equipo, $tipo_medicion);


$ahora = date('Y-m-d', time());  

while($row = mysqli_stmt_fetch($mostrar_equipos)){

	$mostrar_certificado = mysqli_prepare($connect,"SELECT numero_certificado, fecha_emision, fecha_vencimiento, pais, estado 
	FROM certificado_equipo WHERE id_equipo_cercal = $id_equipo_cercal ORDER BY fecha_vencimiento DESC LIMIT 1");
    mysqli_stmt_execute($mostrar_certificado);
    mysqli_stmt_store_result($mostrar_certificado);
    mysqli_stmt_bind_result($mostrar_certificado, $numero_certificado, $fecha_emision, $fecha_vencimiento, $pais, $estado);

	    while($row = mysqli_stmt_fetch($mostrar_certificado)){

	    	$diferencia=number_format(((strtotime($fecha_vencimiento)-strtotime($ahora))/3600)/24,0);

				if ($diferencia > 1) {
					$color = 'success';
				}else{
					$color = 'danger';
				}

	    	$array_mostrar_equipo[] = array(
			"id_equipo_cercal"=> $id_equipo_cercal,
			"nombre_equipo"=> $nombre_equipo,
			"marca"=> $marca,
			"n_serie_equipo"=> $n_serie_equipo,
			"modelo_equipo"=> $modelo_equipo,
			"numero_certificado"=> $numero_certificado,
			"fecha_emision"=> $fecha_emision,
			"fecha_vencimiento"=> $fecha_vencimiento,
			"pais"=> $pais,
			"diferencia"=>$diferencia,
			"estado"=> $estado,
			"tipo_medicion"=> $tipo_medicion,
			"color"=>$color
		);


	    }

}		
$smarty->assign("array_mostrar_equipo",$array_mostrar_equipo);
$smarty->display("equipos_cercal/gestionar_equipos.tpl");





 ?>