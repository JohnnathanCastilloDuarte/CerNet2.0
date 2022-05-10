<?php 
include("../../config.ini.php");

$nombre_sala_limpia = $_POST['nombre_sala_limpia'];
$empresa_sala_limpia = $_POST['empresa_sala_limpia'];
$clasificacion_oms = $_POST['clasificacion_oms'];
$clasificacion_iso = $_POST['clasificacion_iso'];
$direccion_sala_limpia = $_POST['direccion_sala_limpia'];
$ubicacion_interna_sala_limpia = $_POST['ubicacion_interna_sala_limpia'];
$codigo_interna_sala_limpia = $_POST['codigo_interna_sala_limpia'];
$area_interna_sala_limpia = $_POST['area_interna_sala_limpia'];
$estado_sala = $_POST['estado_sala'];
$temperatura_minima = $_POST['temperatura_minima'];
$temperatura_maxima = $_POST['temperatura_maxima'];
$temperatura_informativa = $_POST['temperatura_informativa'];
$hum_relativa_minima = $_POST['hum_relativa_minima'];
$hum_relativa_maxima = $_POST['hum_relativa_maxima'];
$humedad_informativa = $_POST['humedad_informativa'];
$area_m2_sala_limpia = $_POST['area_m2_sala_limpia'];
$volumen_m3_sala_limpia = $_POST['volumen_m3_sala_limpia'];
$ren_hr = $_POST['ren_hr'];
$lux = $_POST['lux'];
$ruido_dba = $_POST['ruido_dba'];
$presion_sala = $_POST['presion_sala'];
$presion_versus = $_POST['presion_versus'];
$tipo_presion = $_POST['tipo_presion'];
$puntos_muestreo = $_POST['puntos_muestreo'];
$cantidad_extracciones = $_POST['cantidad_extracciones'];
$cantidad_inyecciones = $_POST['cantidad_inyecciones'];


$id_item_sala_limpia     = $_POST['id_item_sala_limpia'];
$id_item_2_sala_limpia   = $_POST['id_item_2_sala_limpia'];


$update_sala_limpia = mysqli_prepare($connect,"UPDATE item SET  nombre = ?, id_empresa = ? WHERE id_item = $id_item_2_sala_limpia");
mysqli_stmt_bind_param($update_sala_limpia, 'si', $nombre_sala_limpia,$empresa_sala_limpia);
mysqli_stmt_execute($update_sala_limpia);

if($update_sala_limpia){

	$update_sala_limpia_2  = mysqli_prepare($connect,"UPDATE item_sala_limpia 
		SET 
    
       direccion = ?,   
       Area_m2 = ?,
       Volumen_m3 = ?, 
       area_interna = ?,  
       clasificacion_oms = ?, 
       clasificacion_iso = ?, 
       ren_hr = ?, 
       especificacion_1_temp = ?, 
       especificacion_2_temp = ?, 
       especificacion_1_hum = ?, 
       especificacion_2_hum = ?, 
       lux = ?, 
       ruido_dba = ?, 
       presion_sala = ?, 
       presion_versus = ?, 
       tipo_presion = ?, 
       puntos_muestreo = ?,
       codigo = ?,
       estado_sala = ?,
       temp_informativa = ?,
       hum_informativa = ?,
       cantidad_extracciones = ?,
       cantidad_inyecciones = ?

		WHERE id = $id_item_sala_limpia");
	mysqli_stmt_bind_param($update_sala_limpia_2, 'sssssssssssssssssssssss', 
	   $direccion_sala_limpia,   
       $area_m2_sala_limpia,
       $volumen_m3_sala_limpia, 
       $area_interna_sala_limpia,  
       $clasificacion_oms, 
       $clasificacion_iso, 
       $ren_hr, 
       $temperatura_maxima, 
       $temperatura_minima, 
       $hum_relativa_maxima, 
       $hum_relativa_minima, 
       $lux, 
       $ruido_dba, 
       $presion_sala, 
       $presion_versus, 
       $tipo_presion, 
       $puntos_muestreo,
       $codigo_interna_sala_limpia,
       $estado_sala,
       $temperatura_informativa,
       $humedad_informativa,
       $cantidad_extracciones,
       $cantidad_inyecciones
	);
		

	mysqli_stmt_execute($update_sala_limpia_2);
	//echo mysqli_stmt_error($update_sala_limpia_2);

	if($update_sala_limpia_2)
	{
		echo "Si";	
	}else{
		echo "No";
	}

}


//mysqli_stmt_close($connect);
?>