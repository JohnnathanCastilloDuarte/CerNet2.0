<?php 
	include("../../config.ini.php");

//PROCESO PARA MOSTRAR LOS ÚLTIMOS 5 CAMBIOS REGISTRADOS EN CERNET
$trae_cambios = "SELECT A.tipo_cambio,A.descripcion,C.nombre,B.nombre,A.fecha_cambio, A.tiempo, A.fecha_registro, A.archivo
                FROM ti_controlcambio AS A, persona AS B, modulo AS C  
                WHERE A.id_usuario=B.id_usuario AND A.id_modulo=C.id_modulo ORDER by A.fecha_registro DESC LIMIT 5";
$valida_cambios = mysqli_prepare($connect,$trae_cambios);
mysqli_stmt_execute($valida_cambios);
mysqli_stmt_store_result($valida_cambios);
mysqli_stmt_bind_result($valida_cambios, $tipo_cambio,$desc_cambio,$modulo,$nombre,$fecha,$tiempo,$fecha_registro,$archivo);

$json=array();
while($row = mysqli_stmt_fetch($valida_cambios)){
  $json[]=array('tipo_cambio'=> $tipo_cambio,
												'desc_cambio'=> $desc_cambio,
											 	'modulo'=>$modulo,
											 	'fecha'=>$fecha,
											 	'tiempo'=>$tiempo,
											 	'fecha_registro'=>$fecha_registro,
											 	'archivo'=>$archivo);
}
	$json_2 = json_encode($json);
	
		echo $json_2;
	
?>