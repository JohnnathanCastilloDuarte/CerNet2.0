<?php 
include("../../config.ini.php");

$nombre_sala_limpia = $_POST['nombre_sala_limpia'];
$empresa_sala_limpia = $_POST['empresa_sala_limpia'];
$clasificacion_oms = $_POST['clasificacion_oms'];
$clasificacion_iso = $_POST['clasificacion_iso'];
$direccion_sala_limpia = $_POST['direccion_sala_limpia'];
$ubicacion_interna_sala_limpia = $_POST['ubicacion_interna_sala_limpia'];
$area_interna_incubadora = $_POST['area_interna_incubadora'];
$area_m2_sala_limpia = $_POST['area_m2_sala_limpia'];
$volumen_m3_sala_limpia = $_POST['volumen_m3_sala_limpia'];
$claudal_m3h = $_POST['claudal_m3h'];
$ren_hr = $_POST['ren_hr'];
$temperatura = $_POST['temperatura'];
$hum_relativa = $_POST['hum_relativa'];
$lux = $_POST['lux'];
$ruido_dba = $_POST['ruido_dba'];
$presion_sala = $_POST['presion_sala'];
$presion_versus = $_POST['presion_versus'];
$tipo_presion = $_POST['tipo_presion'];
$puntos_muestreo = $_POST['puntos_muestreo'];
$codigo = $_POST['codigo'];
$estado_sala = $_POST['estado_sala'];

$id_item_sala_limpia     = $_POST['id_item_sala_limpia'];
$id_item_2_sala_limpia   = $_POST['id_item_2_sala_limpia'];


$update_sala_limpia = mysqli_prepare($connect,"UPDATE item SET  nombre = ?, id_empresa = ? WHERE id_item = $id_item_2_sala_limpia");
mysqli_stmt_bind_param($update_sala_limpia, 'si', $nombre_sala_limpia,$empresa_sala_limpia);
mysqli_stmt_execute($update_sala_limpia);

if($update_sala_limpia){

	$update_sala_limpia_2  = mysqli_prepare($connect,"UPDATE item_sala_limpia 
		SET 
		Area_m2 = ?, 
		volumen_m3 = ?, 
		direccion = ?, 
		ubicacion_interna = ?, 
		area_interna = ?, 
		clasificacion_oms = ?,
		clasificacion_iso = ?,
		claudal_m3h = ?,
		ren_hr = ?,
		temperatura = ?,
		hum_relativa = ?,
		lux = ?,
		ruido_dba = ?,
		presion_sala = ?,
		presion_versus = ?,
		tipo_presion = ?,
		puntos_muestreo = ?,
		codigo = ?,
		estado_sala = ?


		WHERE id = $id_item_sala_limpia");
	mysqli_stmt_bind_param($update_sala_limpia_2, 'sssssssssssssssssss', 
		$area_m2_sala_limpia, 
		$volumen_m3_sala_limpia, 
		$direccion_sala_limpia, 
		$ubicacion_interna_sala_limpia, 
		$area_m2_sala_limpia,
		$clasificacion_oms,
		$clasificacion_iso,
		$claudal_m3h,
		$ren_hr,
		$temperatura,
		$hum_relativa,
		$lux,
		$ruido_dba,
		$presion_sala,
		$presion_versus,
		$tipo_presion,
		$puntos_muestreo,
		$codigo,
		$estado_sala
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