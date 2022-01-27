<?php
include('../../config.ini.php');

$nombre = $_POST['nombre_bodega'];
$id_empresa = $_POST['empresa_bodega'];
$descripcion_item_bodega = $_POST['descripcion_item_bodega'];
$direccion_bodega = $_POST['direccion_bodega'];
$codigo_bodega = $_POST['codigo_bodega'];
$productos = $_POST['productos'];
$id_tipo = $_POST['id_tipo'];
$id_usuario = $_POST['id_valida'];

$largo_bodega = $_POST['largo_bodega'];
$ancho_bodega = $_POST['ancho_bodega'];
$superficie_bodega = $_POST['superficie_bodega'];
$volume_bodega = $_POST['volume_bodega'];
$altura_bodega = $_POST['altura_bodega'];
$tipo_muro = $_POST['tipo_muro'];
$tipo_cielo = $_POST['tipo_cielo'];

$climatizacion = $_POST['climatizacion'];
$s_m_t = $_POST['s_m_t'];
$s_m_t_a = $_POST['s_m_t_a'];
$planos = $_POST['planos'];
$analisis_riesgo = $_POST['analisis_riesgo'];
$fichas_estabilidad = $_POST['fichas_estabilidad'];

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
$id_bodega = NULL;
$fecha_registro = NULL;
$estado = 1;



///Insertamos en la tabla de item para crear un id
	$crear = mysqli_prepare($connect,"INSERT INTO item (id_empresa, id_tipo, nombre, descripcion, estado, id_usuario) VALUES (?, ?, ?, ?, ?, ?)");

		mysqli_stmt_bind_param($crear, 'iissii', $id_empresa, $id_tipo, $nombre, $descripcion_item_bodega, $estado, $id_usuario);
		mysqli_stmt_execute($crear);
		mysqli_stmt_error($crear);
//recuperamos el id de la tambla item que acabamos de crear
	$recupera = mysqli_stmt_insert_id($crear);

///inseta los demas datos en la tabla de item_bodega para 
	$insertar = mysqli_prepare($connect, "INSERT INTO item_bodega VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

		mysqli_stmt_bind_param($insertar, 'iisssiiiiissssssssisssssssssssssssssssss', 
			$id_bodega, 
			$recupera, 
			$direccion_bodega, 
			$codigo_bodega, 
			$productos, 
			$largo_bodega, 
			$ancho_bodega,
			$superficie_bodega,
			$volume_bodega,
			$altura_bodega,
			$tipo_muro,
			$tipo_cielo,
			$climatizacion,
			$s_m_t,
			$s_m_t_a,
			$planos,
			$analisis_riesgo,
			$fichas_estabilidad,
			$id_usuario,

			$marca_bodega,
			$modelo_bodega,
			$orientacion_principal,
			$orientacion_recepcion,
			$orientacion_despacho,
			$num_puertas,
			$salida_emergencia,
			$cantidad_rack,
			$num_estantes,
			$altura_max_rack,
			$sistema_extraccion,
			$cielo_lus,
			$temp_max,
			$temp_min,
			$cantidad_iluminarias,
			$hr_max,
			$hr_min,
      $valor_seteado_temp,
      $valor_seteado_hum,                     
      $cantidad_ventana,

			$fecha_registro);
		mysqli_stmt_execute($insertar);
		mysqli_stmt_error($insertar);	

echo("Todo salio bien ");


?>