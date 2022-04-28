<?php 
include('../../config.ini.php');

$nombre_flujo     = $_POST['nombre_flujo'];
$id_empresa_flujo = $_POST['id_empresa_flujo'];
$cantidad_filtros = $_POST['cantidad_filtros'];
$id_valida        = $_POST['id_valida'];
$direccion_flujo  = $_POST['direccion_flujo'];
$ubicacion_interna  = $_POST['ubicacion_interna'];
$area_interna  = $_POST['area_interna'];

$tipo_cabina = $_POST['tipo_cabina'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$n_serie = $_POST['n_serie'];
$codigo = $_POST['codigo'];
$tipo_dimeciones = $_POST['tipo_dimeciones'];
$limite_penetracion = $_POST['limite_penetracion'];
$eficiencia = $_POST['eficiencia'];

$tipo_item = "13";
$estado = 0;

$insertando_item = mysqli_prepare($connect,'INSERT INTO item (id_empresa, id_tipo, nombre, estado, id_usuario) VALUES (?,?,?,?,?)');

mysqli_stmt_bind_param($insertando_item, 'iisii', $id_empresa_flujo, $tipo_item, $nombre_flujo, $estado, $id_valida);
mysqli_stmt_execute($insertando_item);

$id_item_insertado  =  mysqli_stmt_insert_id($insertando_item);
echo mysqli_stmt_error($insertando_item);

if ($insertando_item) {
	$insertando_flujo_laminar = mysqli_prepare($connect,"INSERT INTO item_flujo_laminar 
		(cantidad_filtro, id_item, direccion, ubicacion_interna, area_interna, tipo_cabina, marca, modelo, serie, codigo, tipo_dimenciones, limite_penetracion, eficiencia) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
  
  mysqli_stmt_bind_param($insertando_flujo_laminar, 'iisssssssssss', $cantidad_filtros, $id_item_insertado, $direccion_flujo,$ubicacion_interna, $area_interna, $tipo_cabina, $marca, $modelo, $n_serie, $codigo, $tipo_dimeciones, $limite_penetracion, $eficiencia);
  mysqli_stmt_execute($insertando_flujo_laminar);
  
  echo mysqli_stmt_error($insertando_flujo_laminar);
  
}

if ($insertando_flujo_laminar) {
	echo "Listo";
}else{
	echo "Error";
}

 ?>
