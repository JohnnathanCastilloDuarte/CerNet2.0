<?php 
include("../../config.ini.php");

$nombre_sala_limpia      = $_POST['nombre_sala_limpia'];
$empresa_sala_limpia     = $_POST['empresa_sala_limpia'];
$area_sala_limpia        = $_POST['area_sala_limpia'];
$codigo_sala_limpia      = $_POST['codigo_sala_limpia'];
$area_m2_sala_limpia     = $_POST['area_m2_sala_limpia'];
$volumen_m3_sala_limpia  = $_POST['volumen_m2_sala_limpia'];
$estado_sala_limpia      = $_POST['estado_sala_limpia'];
$id_item_sala_limpia     = $_POST['id_item_sala_limpia'];
$id_item_2_sala_limpia   = $_POST['id_item_2_sala_limpia'];
$direccion_sala_limpia   = $_POST['direccion_sala_limpia'];
$ubicacion_interna_sala_limpia = $_POST['ubicacion_interna_sala_limpia'];
$area_interna_sala_limpia = $_POST['area_interna_sala_limpia'];
$especificacion_1_temp    = $_POST['especificacion_1_temp'];
$especificacion_2_temp    = $_POST['especificacion_2_temp'];
$especificacion_1_hum     = $_POST['especificacion_1_hum'];
$especificacion_2_hum     = $_POST['especificacion_2_hum'];

$id_valida                = $_POST['id_valida'];



$update_sala_limpia = mysqli_prepare($connect,"UPDATE item SET  nombre = ?, id_empresa = ? WHERE id_item = $id_item_2_sala_limpia");
mysqli_stmt_bind_param($update_sala_limpia, 'si', $nombre_sala_limpia,$empresa_sala_limpia);
mysqli_stmt_execute($update_sala_limpia);

if($update_sala_limpia){

	$update_sala_limpia_2  = mysqli_prepare($connect,"UPDATE item_sala_limpia 
		SET Area_sala_limpia = ?, Codigo = ?, Area_m2 = ?, volumen_m3 = ?, Estado_sala = ?, especificacion_1_temp = ?,especificacion_2_temp = ?, especificacion_1_hum = ?, especificacion_2_hum = ?,direccion = ?, ubicacion_interna = ?, area_interna = ?
		WHERE id = $id_item_sala_limpia");
	mysqli_stmt_bind_param($update_sala_limpia_2, 'ssssssssssss', $area_sala_limpia, $codigo_sala_limpia, $area_m2_sala_limpia, $volumen_m3_sala_limpia, $estado_sala_limpia, $especificacion_1_temp, $especificacion_2_temp, $especificacion_1_hum, $especificacion_2_hum, $direccion_sala_limpia, 
		$ubicacion_interna_sala_limpia, $area_m2_sala_limpia);

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