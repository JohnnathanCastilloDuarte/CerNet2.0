<?php 
	include("../../config.ini.php");
	
	$id_empresa = $_POST['id_empresa'];
	$n_tributario = $_POST['n_tributario'];
	$razon_social = $_POST['razon_social'];
	$direccion_empresa = $_POST['direccion_empresa'];
	$pais_empresa = $_POST['pais_empresa'];
	$ciudad_empresa = $_POST['ciudad_empresa'];
 	$sigla_pais = $_POST['sigla_pais'];
	$sigla_empresa = $_POST['sigla_empresa'];
	$tipo_sede = $_POST['tipo_sede'];
	$giro_empresa = $_POST['giro_empresa'];

//proceso de actualización
	$actualizar = mysqli_prepare($connect,"UPDATE empresa SET  numero_tributario = ?, nombre = ?, giro = ?, direccion = ?,
																				 ciudad = ?, sigla_empresa = ?, sigla_pais = ?, pais = ?, tipo_sede = ? WHERE id_empresa = ?");

	mysqli_stmt_bind_param($actualizar, 'sssssssssi', $n_tributario, $razon_social, $giro_empresa, $direccion_empresa,
																										$ciudad_empresa, $sigla_empresa, $sigla_pais, $pais_empresa, $tipo_sede, $id_empresa);

	mysqli_stmt_execute($actualizar);

	if(mysqli_stmt_affected_rows($actualizar) > 0){
		echo "si";
	}else 
	{
		echo "no";
	}









mysqli_stmt_close($connect);	
?>