<?php 
include("../../config.ini.php");

$nombre_incubadora            = $_POST['nombre_incubadora'];
$id_empresa                   = $_POST['id_empresa'];
$marca_incubadora             = $_POST['marca_incubadora'];
$modelo_incubadora            = $_POST['modelo_incubadora'];
$desc_incubadora              = $_POST['desc_incubadora'];
$n_serie_incubadora           = $_POST['n_serie_incubadora'];
$fecha_fabricacion_incubadora = $_POST['fecha_fabricacion_incubadora'];
$direccion_incubadora         = $_POST['direccion_incubadora'];
$ubicacion_interna_incubadora = $_POST['ubicacion_interna_incubadora'];
$area_interna_incubadora      = $_POST['area_interna_incubadora'];
$valor_seteado                = $_POST['valor_seteado'];
$limite_maximo                = $_POST['limite_maximo'];
$limite_minimo                = $_POST['limite_minimo'];
$id_valida                    = $_POST['id_valida'];
$id_item_2 = $_POST['id_item'];

if ($fecha_fabricacion_incubadora == "" || $fecha_fabricacion_incubadora == NULL ) {
	$fecha_fabricacion = "NA";
}else{
	$fecha_fabricacion = $_POST['fecha_fabricacion_incubadora'];
}

$update_incubadora = mysqli_prepare($connect,"UPDATE item SET id_empresa = ?, nombre = ?, descripcion = ? WHERE id_item = $id_item_2");
mysqli_stmt_bind_param($update_incubadora, 'iss', $id_empresa, $nombre_incubadora, $desc_incubadora);
mysqli_stmt_execute($update_incubadora);

if($update_incubadora){

	$update_incubadora_2  = mysqli_prepare($connect,"UPDATE item_incubadora SET 
		fabricante = ?, 
		modelo = ?, 
		n_serie = ?,
		fecha_fabricacion = ?, 
		direccion = ? , 
		ubicacion_interna = ?, 
		area_interna = ?, 
		valor_seteado = ?, 
		limite_maximo = ?, 
		limite_minimo = ?
		WHERE id_item = $id_item_2");
	mysqli_stmt_bind_param($update_incubadora_2, 'ssssssssss', $marca_incubadora, $modelo_incubadora, $n_serie_incubadora, $fecha_fabricacion,$direccion_incubadora, $ubicacion_interna_incubadora, $area_interna_incubadora, $valor_seteado, $limite_maximo, $limite_minimo);

	mysqli_stmt_execute($update_incubadora_2);

	/*echo "UPDATE item_incubadora SET 
		fabricante = $marca_incubadora, 
		modelo = $modelo_incubadora, 
		n_serie = $n_serie_incubadora,
		fecha_fabricacion = $fecha_fabricacion, 
		direccion = $direccion_incubadora, 
		ubicacion_interna = $ubicacion_interna_incubadora, 
		area_interna = $area_interna_incubadora, 
		valor_seteado = $valor_seteado, 
		limite_maximo = $limite_maximo, 
		limite_minimo = $limite_minimo
		WHERE id_incubadora = $id_item_2";*/

	if($update_incubadora_2)
	{
		echo "SI";
	}else{
		echo "No";
	}

}

//mysqli_stmt_close($connect);
?>