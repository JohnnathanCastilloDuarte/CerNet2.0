<?php 
include("../../config.ini.php");

$id_item_freezer = $_POST['id_item_freezer'];
$id_item_2 = $_POST['id_item_2'];
$nombre_freezer = $_POST['nombre_freezer'];
$empresa_freezer = $_POST['empresa_freezer'];
$fabricante_freezer = $_POST['fabricante_freezer'];
$modelo_freezer = $_POST['modelo_freezer'];
$desc_freezer = $_POST['desc_freezer'];
$n_serie_freezer = $_POST['n_serie_freezer'];
$codigo_interno_freezer = $_POST['codigo_interno_freezer'];
$fecha_fabricacion_freezer = $_POST['fecha_fabricacion_freezer'];
$direccion_freezer = $_POST['direccion_freezer'];
$ubicacion_interna_freezer = $_POST['ubicacion_interna_freezer'];
$voltaje_freezer = $_POST['voltaje_freezer'];
$potencia_freezer = $_POST['potencia_freezer'];
$capacidad_freezer = $_POST['capacidad_freezer'];
$alto_freezer = $_POST['alto_freezer'];
$peso_freezer = $_POST['peso_freezer'];
$largo_freezer = $_POST['largo_freezer'];
$ancho_freezer = $_POST['ancho_freezer'];
$valor_seteado_hum = $_POST['valor_seteado_hum'];
$humedad_minima = $_POST['humedad_minima'];
$humedad_maxima = $_POST['humedad_maxima'];
$valor_seteado_tem = $_POST['valor_seteado_tem'];
$temperatura_minima = $_POST['temperatura_minima'];
$temperatura_maxima = $_POST['temperatura_maxima'];
$area_interna_freezer = $_POST['area_interna_freezer'];

if($fecha_fabricacion_freezer = "" || $fecha_fabricacion_freezer == NULL) {
   
  $fecha_fabricacion = "NA";
}else{
  $fecha_fabricacion = $_POST['fecha_fabricacion_freezer'];
} 

$id_valida = $_POST['id_valida'];

$update_freezer = mysqli_prepare($connect,"UPDATE item SET id_empresa = ?, nombre = ?, descripcion = ? WHERE id_item = $id_item_2");
mysqli_stmt_bind_param($update_freezer, 'iss', $empresa_freezer, $nombre_freezer, $desc_freezer);
mysqli_stmt_execute($update_freezer);

if($update_freezer){

	$update_freezer_2  = mysqli_prepare($connect,"UPDATE item_freezer SET fabricante = ?, modelo = ?, n_serie = ?,
    c_interno = ?, fecha_fabricacion = ?, direccion = ? ,
		ubicacion = ?, voltaje = ?, potencia = ?, capacidad = ?, peso = ?, alto = ?, largo = ?, ancho = ?,
    valor_seteado_hum = ?, hum_min = ?, hum_max = ?, valor_seteado_tem = ?, tem_min = ?, tem_max = ?, id_usuario = ?, 
    area_interna = ?
		WHERE id_freezer = $id_item_freezer");
	mysqli_stmt_bind_param($update_freezer_2, 'ssssssssssssssssssssis', $fabricante_freezer, $modelo_freezer, $n_serie_freezer,
    $codigo_interno_freezer, $fecha_fabricacion,$direccion_freezer, $ubicacion_interna_freezer, $voltaje_freezer, 
    $potencia_freezer, $capacidad_freezer, $peso_freezer, 
		$alto_freezer, $largo_freezer, $ancho_freezer, $valor_seteado_tem, $humedad_minima, $humedad_maxima, $valor_seteado_tem,
		$temperatura_minima, $temperatura_minima, $id_valida, $area_interna_freezer );

	mysqli_stmt_execute($update_freezer_2);


	if($update_freezer_2)
	{
		echo "Si";
	}else{
		echo "No";
	}

}

//mysqli_stmt_close($connect);
?>