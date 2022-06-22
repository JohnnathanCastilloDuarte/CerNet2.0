<?php 
include("../../config.ini.php");

$id_item_estufa = $_POST['id_item_estufa'];
$id_item_2 = $_POST['id_item_2'];
$nombre_estufa = $_POST['nombre_estufa'];
$empresa_estufa = $_POST['empresa_estufa'];
$fabricante_estufa = $_POST['fabricante_estufa'];
$modelo_estufa = $_POST['modelo_estufa'];
$desc_estufa = $_POST['desc_estufa'];
$n_serie_estufa = $_POST['n_serie_estufa'];
$codigo_interno_estufa = $_POST['codigo_interno_estufa'];
$fecha_fabricacion_estufa = $_POST['fecha_fabricacion_estufa'];
$direccion_estufa = $_POST['direccion_estufa'];
$ubicacion_interna_estufa = $_POST['ubicacion_interna_estufa'];
$voltaje_estufa = $_POST['voltaje_estufa'];
$potencia_estufa = $_POST['potencia_estufa'];
$capacidad_estufa = $_POST['capacidad_estufa'];
$alto_estufa = $_POST['alto_estufa'];
$peso_estufa = $_POST['peso_estufa'];
$largo_estufa = $_POST['largo_estufa'];
$ancho_estufa = $_POST['ancho_estufa'];
$valor_seteado_tem = $_POST['valor_seteado_tem'];
$temperatura_minima = $_POST['temperatura_minima'];
$temperatura_maxima = $_POST['temperatura_maxima'];


$id_valida = $_POST['id_valida'];
$area_interna_estufa = $_POST['area_interna_estufa'];

if($fecha_fabricacion_estufa == "" || $fecha_fabricacion_estufa == NULL){
   $fecha_fabricacion = "NA";
}else{
   $fecha_fabricacion = $_POST['fecha_fabricacion_estufa'];
}

	$update_estufa = mysqli_prepare($connect,"UPDATE item SET id_empresa = ?, nombre = ?, descripcion = ? WHERE id_item = $id_item_2");
	mysqli_stmt_bind_param($update_estufa, 'iss', $empresa_estufa, $nombre_estufa, $desc_estufa);
	mysqli_stmt_execute($update_estufa);

    
	if($update_estufa > 0){
		
		$update_estufa_2  = mysqli_prepare($connect,"UPDATE item_estufa SET fabricante = ?, modelo = ?, n_serie = ?, c_interno = ?, fecha_fabricacion = ?, direccion = ? ,
		ubicacion = ?, voltaje = ?, potencia = ?, capacidad = ?, peso = ?, alto = ?, largo = ?, ancho = ?, valor_seteado_tem = ?, tem_min = ?, tem_max = ?, id_usuario = ?, area_interna = ?
																											WHERE id_estufa = $id_item_estufa");
		mysqli_stmt_bind_param($update_estufa_2, 'sssssssssssssssssis', $fabricante_estufa, $modelo_estufa, $n_serie_estufa, $codigo_interno_estufa, $fecha_fabricacion,
																										$direccion_estufa, $ubicacion_interna_estufa, $voltaje_estufa, $potencia_estufa, $capacidad_estufa, $peso_estufa, 
																										 $alto_estufa, $largo_estufa, $ancho_estufa, $valor_seteado_tem, $temperatura_minima, $temperatura_minima, $id_valida, $area_interna_estufa);
		
		mysqli_stmt_execute($update_estufa_2);
		
		
		if($update_estufa_2 > 0)
		{
			echo "Modificado";
		}else{
			echo "error";
		}
		
	}
	
mysqli_stmt_close($connect);
?>