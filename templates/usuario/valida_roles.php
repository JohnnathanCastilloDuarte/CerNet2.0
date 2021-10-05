<?php 
	require("../../config.ini.php");

	$perfil = $_POST['perfil'];

	$consultar = mysqli_query($connect,"SELECT * FROM rol WHERE rol = '$perfil'");

	$json = array();

	while($fila = mysqli_fetch_array($consultar)){
		
		$json[]=array(
			'id'=>$fila['id_rol'],
			'modulo_usuario'=>$fila['modulo_usuario'],
			'modulo_empresa'=>$fila['modulo_empresa'],
			'modulo_sensor'=>$fila['modulo_sensor'],
			'modulo_informe'=>$fila['modulo_informe'],
			'modulo_documento'=>$fila['modulo_documento'],
			'modulo_persona'=>$fila['modulo_persona'],
			'modulo_item'=>$fila['modulo_item'],
			'modulo_numot'=>$fila['modulo_numot'],
			'modulo_spot_bodega'=>$fila['modulo_spot_bodega'],
			'modulo_gep_bodega'=>$fila['modulo_gep_bodega'],
			'modulo_spot_aire'=>$fila['modulo_spot_aire'],
			'modulo_gep_aire'=>$fila['modulo_gep_aire'],
			'modulo_spot_autoclave'=>$fila['modulo_spot_autoclave'],
			'modulo_gep_autoclave'=>$fila['modulo_gep_autoclave'],
			'modulo_spot_cadenafrio'=>$fila['modulo_spot_cadenafrio'],
			'modulo_gep_cadenafrio'=>$fila['modulo_gep_cadenafrio'],
			'modulo_spot_camaraestabilidad'=>$fila['modulo_spot_camaraestabilidad'],
			'modulo_gep_camaraestabilidad'=>$fila['modulo_gep_camaraestabilidad'],
			'modulo_spot_camarafria'=>$fila['modulo_spot_camarafria'],
			'modulo_gep_camarafria'=>$fila['modulo_gep_camarafria'],
			'modulo_spot_congelador'=>$fila['modulo_spot_congelador'],
			'modulo_gep_congelador'=>$fila['modulo_gep_congelador'],
			'modulo_spot_estufa'=>$fila['modulo_spot_estufa'],
			'modulo_gep_estufa'=>$fila['modulo_gep_estufa'],
			'modulo_spot_gabinete'=>$fila['modulo_spot_gabinete'],
			'modulo_gep_gabinete'=>$fila['modulo_gep_gabinete'],
			'modulo_spot_horno'=>$fila['modulo_spot_horno'],
			'modulo_gep_horno'=>$fila['modulo_gep_horno'],
			'modulo_spot_hvac'=>$fila['modulo_spot_hvac'],
			'modulo_gep_hvac'=>$fila['modulo_spot_hvac'],
			'modulo_spot_refrigerador'=>$fila['modulo_spot_refrigerador'],
			'modulo_gep_refrigerador'=>$fila['modulo_gep_refrigerador'],
			'modulo_spot_ultrafreezer'=>$fila['modulo_spot_ultrafreezer'],
			'modulo_gep_ultrafreezer'=>$fila['modulo_gep_ultrafreezer'],
			'modulo_gep_auditoria'=>$fila['modulo_gep_auditoria'],
			'modulo_csv_hojacalculo'=>$fila['modulo_csv_hojacalculo'],
			'modulo_csv_software'=>$fila['modulo_csv_software'],
			'modulo_gep_kapa'=>$fila['modulo_gep_kapa'],
			'modulo_gep_purificacion'=>$fila['modulo_gep_purificacion'],
			'modulo_ti_controlcambios'=>$fila['modulo_ti_controlcambios'],
			'modulo_ti_usuario'=>$fila['modulo_ti_usuario'],
			'modulo_admin_persona'=>$fila['modulo_admin_persona']
	
		);
	}

	$jsonString = json_encode($json);
	
		echo $jsonString;
?>