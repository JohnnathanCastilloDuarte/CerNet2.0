<?php 
include('../../config.ini.php');

$registro_vtiger = $_POST['registro_vtiger'];
$n_tributario = $_POST['n_tributario'];
$razon_social = $_POST['razon_social'];
$direccion_empresa = $_POST['direccion_empresa'];
$pais_empresa = $_POST['pais_empresa'];
$ciudad_empresa = $_POST['ciudad_empresa'];
$sigla_pais = $_POST['sigla_pais'];
$sigla_empresa = $_POST['sigla_empresa'];
$tipo_sede = $_POST['tipo_sede'];
$giro_empresa = $_POST['giro_empresa'];

$crear_empresa = mysqli_prepare($connect,"INSERT INTO empresa (id_vtiger, numero_tributario, nombre, giro, 
																						direccion, ciudad, sigla_pais, sigla_empresa, pais, tipo_sede)
																						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

mysqli_stmt_bind_param($crear_empresa, 'ssssssssss', $registro_vtiger, $n_tributario, $razon_social, $giro_empresa,
																										 $direccion_empresa, $ciudad_empresa, $sigla_pais, $sigla_empresa,
																										 $pais_empresa, $tipo_sede);
mysqli_stmt_execute($crear_empresa);

if($crear_empresa){
  echo "Creado";
}else{
  echo "No creado";
}

mysqli_close($connect);
?>