<?php 
include("../../config.ini.php");

$nombre_bodega = $_POST['nombre_bodega'];
$empresa_bodega = $_POST['empresa_bodega'];
$descripcion_bodega = $_POST['descripcion_bodega'];
$direccion_bodega = $_POST['direccion_bodega'];
$codigo_bodega = $_POST['codigo_bodega'];
$array_productos = $_POST['array_productos'];
$combina_productos = $_POST['productos_bodega'];
//$combina_productos = $array_productos.', '.$productos_bodega;
$largo_bodega = $_POST['largo_bodega'];
$ancho_bodega = $_POST['ancho_bodega'];
$superficie_bodega = $_POST['superficie_bodega'];
$volume_bodega = $_POST['volume_bodega'];
$altura_bodega = $_POST['altura_bodega'];
$array_muro = $_POST['tipo_muro'];
$array_cielo = $_POST['tipo_cielo'];
$array_climatizacion = $_POST['array_climatizacion'];
$s_m_t = $_POST['s_m_t'];
$s_m_t_a = $_POST['s_m_t_a'];
$array_planos = $_POST['array_planos'];
$analisis_riesgo = $_POST['analisis_riesgo'];
$fichas_estabilidad = $_POST['fichas_estabilidad'];
$id_item = $_POST['id_item'];
$id_valida = $_POST['id_valida'];
$clasificacion_item = $_POST['clasificacion_item'];

$marca_bodega = $_POST['marca_bodega'];
$modelo_bodega = $_POST['modelo_bodega'];
$orientacion_principal = $_POST['orientacion_principal'];
$orientacion_recepcion = $_POST['orientacion_recepcion'];
$orientacion_despacho = $_POST['orientacion_despacho'];
$num_puertas = $_POST['num_puertas'];
$salida_emergencia = $_POST['salida_emergencia'];
$cantidad_rack = $_POST['cantidad_rack'];
$num_estantes = $_POST['num_estantes'];
$altura_max_rack = $_POST['altura_max_rack'];
$sistema_extraccion = $_POST['sistema_extraccion'];
$cielo_lus = $_POST['cielo_lus'];
$temp_max = $_POST['temp_max'];
$temp_min = $_POST['temp_min'];
$cantidad_iluminarias = $_POST['cantidad_iluminarias'];
$hr_max = $_POST['hr_max'];
$hr_min = $_POST['hr_min'];
$cantidad_ventana = $_POST['cantidad_ventana'];
$valor_seteado_temp = $_POST['valor_seteado_temp']; 
$valor_seteado_hum = $_POST['valor_seteado_hum']; 
$estado_bodega = $_POST['estado_bodega'];


$actualizar = mysqli_prepare($connect, "UPDATE item_bodega SET   productos_almacena = ?, largo = ?, ancho = ?, 
	superficie = ?, volumen = ?, altura = ?, tipo_muro = ?, tipo_cielo = ?, s_climatizacion = ?, s_monitoreo = ?, s_alarma = ?, planos = ?,
	analisis_riesgo = ?, ficha_estabilidad = ?, id_usuario = ?, marca_bodega = ?, modelo_bodega = ?, orientacion_principal = ?, 
  orientacion_recepcion = ?, orientacion_despacho = ?, num_puertas = ?, salida_emergencia = ?, cantidad_rack = ?, num_estantes = ?, 
  altura_max_rack = ?, sistema_extraccion = ?, cielo_lus = ?, temp_max = ?, temp_min = ?, cantidad_iluminarias = ?, hr_max = ?, hr_min = ?, 
  cantidad_ventana = ?, valor_seteado_temp = ?, valor_seteado_hum = ? WHERE id_item = ?");

mysqli_stmt_bind_param($actualizar, 'ssssssssssssssissssssssssssssssssssi', $combina_productos, $largo_bodega, $ancho_bodega, $superficie_bodega, $volume_bodega, $altura_bodega, $array_muro, $array_cielo, $array_climatizacion, $s_m_t, $s_m_t_a, $array_planos, $analisis_riesgo, $fichas_estabilidad, $id_valida, $marca_bodega, $modelo_bodega, $orientacion_principal, $orientacion_recepcion, $orientacion_despacho, $num_puertas, $salida_emergencia, $cantidad_rack, $num_estantes, $altura_max_rack, $sistema_extraccion, $cielo_lus, $temp_max ,$temp_min, $cantidad_iluminarias, 
                       $hr_max, $hr_min, $cantidad_ventana, $valor_seteado_temp, $valor_seteado_hum, $id_item);
mysqli_stmt_execute($actualizar);
 


if($actualizar){

	$actualizar_nombre = mysqli_prepare($connect,"UPDATE item SET id_empresa = ?, nombre = ?, descripcion = ?, clasificacion_item = ?, direccion = ?, codigo_interno = ?, estado = ? WHERE id_item = ?");
	mysqli_stmt_bind_param($actualizar_nombre, 'isssssii', $empresa_bodega, $nombre_bodega, $descripcion_bodega, $clasificacion_item, $direccion_bodega, $codigo_bodega, $estado_bodega, $id_item);
	mysqli_stmt_execute($actualizar_nombre);

	if($actualizar_nombre){
		echo "Si";
	}else{
		echo "no";
		 mysqli_stmt_error($actualizar);

	}

}else{
	echo "No";
}























	/*echo "Nombre bodega: ".$nombre_bodega;
	echo "Empresa: ".$empresa_bodega;
	echo "direccion: ".$direccion_bodega;
	echo "codigo interno: ".$codigo_bodega;
	echo "array productos: ".$combina_productos;
	echo "largo: ".$largo_bodega;
	echo "ancho: ".$ancho_bodega;
	echo "superficie: ".$superficie_bodega;
	echo "volumen: ".$volume_bodega;
	echo "altura: ".$altura_bodega;
	echo "array muro: ".$combina_muro;
	echo "array cielo: ".$array_cielo;
	echo "array cielo: ".$combina_cielo;
	echo "stm: ".$s_m_t;
	echo "stma: ".$s_m_t_a;
	echo "array planos: ".$array_planos;
	echo "analisis riesgo: ".$analisis_riesgo;
	echo "fichas estabilidad: ".$fichas_estabilidad;*/
	



	?>