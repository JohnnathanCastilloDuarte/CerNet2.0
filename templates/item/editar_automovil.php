<?php

error_reporting(0);
include('../../config.ini.php');

	$nombre_automovil = $_POST['nombre_automovil'];
	$id_empresa_automovil = $_POST['id_empresa_automovil'];
	$fabricante_automovil = $_POST['fabricante_automovil'];
	$modelo_automovil = $_POST['modelo_automovil'];
	$desc_automovil = $_POST['desc_automovil'];
	$n_serie_automovil = $_POST['n_serie_automovil'];
	$codigo_interno_automovil = $_POST['codigo_interno_automovil'];
	$fecha_fabricacion_automovil = $_POST['fecha_fabricacion_automovil'];
	$direccion_automovil = $_POST['direccion_automovil'];
	$ubicacion_interna_automovil = $_POST['ubicacion_interna_automovil'];
	$voltaje_automovil = $_POST['voltaje_automovil'];
	$potencia_automovil = $_POST['potencia_automovil'];
	$capacidad_automovil = $_POST['capacidad_automovil'];
	$peso_automovil = $_POST['peso_automovil'];
	$alto_automovil = $_POST['alto_automovil'];
	$largo_automovil = $_POST['largo_automovil'];
	$ancho_automovil = $_POST['ancho_automovil'];
	$valor_seteado_tem_automovil = $_POST['valor_seteado_tem_automovil'];
	$temperatura_minima_automovil = $_POST['temperatura_minima_automovil'];
	$temperatura_maxima_automovil = $_POST['temperatura_maxima_automovil'];
	$placa_automovil = $_POST['placa_automovil'];

	$id_usuario = $_POST['id_valida'];
	$id_tipo_item = $_POST['id_tipo_item'];

	$id_item = $_POST['id_item'];
	$id_item_automovil = $_POST['id_item_automovil'];


////// ACTUALIZAR ITEM
$actualizar_item = mysqli_prepare($connect,'UPDATE item SET id_empresa = ?, nombre = ?, descripcion = ? WHERE id_item = ?');
mysqli_stmt_bind_param($actualizar_item, 'issi',$id_empresa_automovil, $nombre_automovil, 
	$desc_automovil, $id_item_automovil);
mysqli_stmt_execute($actualizar_item);

/////// ACTUALIZAR FILTRO 
$acualizar_automovil = mysqli_prepare($connect,"UPDATE item_automovil SET 
	 fabricante = ?,
	 modelo = ?,
	 n_serie = ?,
	 c_interno = ?,
	 placa = ?,
	 fecha_fabricacion = ?,
	 direccion = ?,
	 valor_seteado_tem = ?,
	 tem_min = ?,
	 tem_max = ?,
	 ubicacion = ?,
	 voltaje = ?,
	 potencia = ?,
	 capacidad = ?,
	 peso = ?,
	 alto = ?,
	 largo = ?,
	 ancho = ?
	WHERE id_automovil = ?");

mysqli_stmt_bind_param($acualizar_automovil, 'ssssssssssssssssssi', 
    $fabricante_automovil, 
    $modelo_automovil, 
    $n_serie_automovil, 
    $codigo_interno_automovil, 
    $placa_automovil, 
    $fecha_fabricacion_automovil, 
    $direccion_automovil, 
    $valor_seteado_tem_automovil, 
    $temperatura_minima_automovil, 
    $temperatura_maxima_automovil,
    $ubicacion_interna_automovil,
    $voltaje_automovil,
    $potencia_automovil,
    $capacidad_automovil,
    $peso_automovil,
    $alto_automovil,
    $largo_automovil,
    $ancho_automovil,
    $id_item,
);

mysqli_stmt_execute($acualizar_automovil);

if($acualizar_automovil){
	echo "Si";
}else{
	echo "No".$acualizar_automovil;
}

mysqli_stmt_close($connect);

?>