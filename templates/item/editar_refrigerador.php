<?php 
	include("../../config.ini.php");

$id_item_refrigerador = $_POST['id_item_refrigerador'];
$id_item_2 = $_POST['id_item_2'];
$nombre_refrigerador = $_POST['nombre_refrigerador'];
$empresa_refrigerador = $_POST['empresa_refrigerador'];
$fabricante_refrigerador = $_POST['fabricante_refrigerador'];
$modelo_refrigerador = $_POST['modelo_refrigerador'];
$desc_refrigerador = $_POST['desc_refrigerador'];
$n_serie_refrigerador = $_POST['n_serie_refrigerador'];
$codigo_interno_refrigerador = $_POST['codigo_interno_refrigerador'];
$fecha_fabricacion_refrigerador = $_POST['fecha_fabricacion_refrigerador'];
$direccion_refrigerador = $_POST['direccion_refrigerador'];
$ubicacion_interna_refrigerador = $_POST['ubicacion_interna_refrigerador'];
$voltaje_refrigerador = $_POST['voltaje_refrigerador'];
$potencia_refrigerador = $_POST['potencia_refrigerador'];
$capacidad_refrigerador = $_POST['capacidad_refrigerador'];
$alto_refrigerador = $_POST['alto_refrigerador'];
$peso_refrigerador = $_POST['peso_refrigerador'];
$largo_refrigerador = $_POST['largo_refrigerador'];
$ancho_refrigerador = $_POST['ancho_refrigerador'];
$valor_seteado_hum = $_POST['valor_seteado_hum'];
$humedad_minima = $_POST['humedad_minima'];
$humedad_maxima = $_POST['humedad_maxima'];
$valor_seteado_tem = $_POST['valor_seteado_tem'];
$temperatura_minima = $_POST['temperatura_minima'];
$temperatura_maxima = $_POST['temperatura_maxima'];

$id_valida = $_POST['id_valida'];

	$update_refrigerador = mysqli_prepare($connect,"UPDATE item SET id_empresa = ?, nombre = ?, descripcion = ? WHERE id_item = $id_item_2");
	mysqli_stmt_bind_param($update_refrigerador, 'iss', $empresa_refrigerador, $nombre_refrigerador, $desc_refrigerador);
	mysqli_stmt_execute($update_refrigerador);
	
	if($update_refrigerador > 0){
		
		$update_refrigerador_2  = mysqli_prepare($connect,"UPDATE item_refrigerador SET fabricante = ?, modelo = ?, n_serie = ?, c_interno = ?, fecha_fabricacion = ?, direccion = ? ,
		ubicacion = ?, voltaje = ?, potencia = ?, capacidad = ?, peso = ?, alto = ?, largo = ?, ancho = ?, valor_seteado_hum = ?, hum_min = ?, hum_max = ?, valor_seteado_tem = ?, tem_min = ?, tem_max = ?, id_usuario = ?
																											WHERE id_refrigerador = $id_item_refrigerador");
		mysqli_stmt_bind_param($update_refrigerador_2, 'ssssssssssssssssssssi', $fabricante_refrigerador, $modelo_refrigerador, $n_serie_refrigerador, $codigo_interno_refrigerador, $fecha_fabricacion_refrigerador,
																										$direccion_refrigerador, $ubicacion_interna_refrigerador, $voltaje_refrigerador, $potencia_refrigerador, $capacidad_refrigerador, $peso_refrigerador, 
																										 $alto_refrigerador, $largo_refrigerador, $ancho_refrigerador, $valor_seteado_tem, $humedad_minima, $humedad_maxima, $valor_seteado_tem,
                                                     $temperatura_minima, $temperatura_minima, $id_valida);
		
		mysqli_stmt_execute($update_refrigerador_2);
		
		
		if($update_refrigerador_2 > 0)
		{
			echo "Modificado";
		}else{
			echo "error";
		}
		
	}
	
mysqli_stmt_close($connect);
?>