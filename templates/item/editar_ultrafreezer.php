<?php 
include("../../config.ini.php");

$id_item_ultrafreezer = $_POST['id_item_ultrafreezer'];
$id_item_2_ultrafreezer = $_POST['id_item_2_ultrafreezer'];
$nombre_ultrafreezer = $_POST['nombre_ultrafreezer'];
$fabricante_ultrafreezer = $_POST['fabricante_ultrafreezer'];
$modelo_ultrafreezer = $_POST['modelo_ultrafreezer'];
$desc_ultrafreezer = $_POST['desc_ultrafreezer'];
$n_serie_ultrafreezer = $_POST['n_serie_ultrafreezer'];
$codigo_interno_ultrafreezer = $_POST['codigo_interno_ultrafreezer'];
$fecha_fabricacion_ultrafreezer = $_POST['fecha_fabricacion_ultrafreezer'];
$direccion_ultrafreezer = $_POST['direccion_ultrafreezer'];
$ubicacion_interna_ultrafreezer = $_POST['ubicacion_interna_ultrafreezer'];
$voltaje_ultrafreezer = $_POST['voltaje_ultrafreezer'];
$potencia_ultrafreezer = $_POST['potencia_ultrafreezer'];
$capacidad_ultrafreezer = $_POST['capacidad_ultrafreezer'];
$alto_ultrafreezer = $_POST['alto_ultrafreezer'];
$peso_ultrafreezer = $_POST['peso_ultrafreezer'];
$largo_ultrafreezer = $_POST['largo_ultrafreezer'];
$ancho_ultrafreezer = $_POST['ancho_ultrafreezer'];
$valor_seteado_tem_ultrafreezer = $_POST['valor_seteado_tem_ultrafreezer'];
$temperatura_minima_ultrafreezer = $_POST['temperatura_minima_ultrafreezer'];
$temperatura_maxima_ultrafreezer = $_POST['temperatura_maxima_ultrafreezer'];
$valor_seteado_hum      = $_POST['valor_seteado_hum_ultrafreezer'];
$humedad_maxima         = $_POST['humedad_minima_ultrafreezer'];
$humedad_minima         = $_POST['humedad_maxima_ultrafreezer'];

$id_valida = $_POST['id_valida'];


$update_ultrafreezer = mysqli_prepare($connect,"UPDATE item SET  nombre = ?, descripcion = ? WHERE id_item = $id_item_2_ultrafreezer");
mysqli_stmt_bind_param($update_ultrafreezer, 'ss', $nombre_ultrafreezer, $desc_ultrafreezer);
mysqli_stmt_execute($update_ultrafreezer);


if($update_ultrafreezer){



	$update_ultrafreezer_2  = mysqli_prepare($connect,"UPDATE item_ultrafreezer SET fabricante = ?, modelo = ?, n_serie = ?, c_interno = ?, fecha_fabricacion = ?, direccion = ? ,
		ubicacion = ?, voltaje = ?, potencia = ?, capacidad = ?, peso = ?, alto = ?, largo = ?, ancho = ?, valor_seteado_tem = ?, tem_min = ?, tem_max = ?, id_usuario = ?, valor_seteado_hum = ?, hum_min = ?, hum_max = ?
		WHERE id_ultrafreezer = $id_item_ultrafreezer");
	mysqli_stmt_bind_param($update_ultrafreezer_2, 'sssssssssssssssssisss', $fabricante_ultrafreezer, $modelo_ultrafreezer, $n_serie_ultrafreezer, $codigo_interno_ultrafreezer, $fecha_fabricacion_ultrafreezer,
		$direccion_ultrafreezer, $ubicacion_interna_ultrafreezer, $voltaje_ultrafreezer, $potencia_ultrafreezer, $capacidad_ultrafreezer, $peso_ultrafreezer, 
		$alto_ultrafreezer, $largo_ultrafreezer, $ancho_ultrafreezer, $valor_seteado_tem_ultrafreezer,
		$temperatura_minima_ultrafreezer, $temperatura_maxima_ultrafreezer, $id_valida,$valor_seteado_hum, $humedad_minima, $humedad_maxima);

	mysqli_stmt_execute($update_ultrafreezer_2);


	if($update_ultrafreezer_2)
	{
		echo "Si";
	}else{
		echo "No";
	}

}


//mysqli_stmt_close($connect);
?>