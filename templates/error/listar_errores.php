<?php 
include("../../config.ini.php");
	
$query = "SELECT a.id_error, a.concepto, a.id_modulo, a.fecha_registro, a.solucion , b.nombre FROM error as a, modulo as b 
					WHERE a.id_modulo = b.id_modulo ORDER BY fecha_registro ASC LIMIT 5";
	$execute = mysqli_prepare($connect,$query);
	mysqli_stmt_execute($execute);
	mysqli_stmt_store_result($execute);
	mysqli_stmt_bind_result($execute, $id_error, $concepto, $id_modulo, $fecha_registro, $solucion, $modulo);
	
		
$json = array();

while($row=mysqli_stmt_fetch($execute)){
	$json[]=array(
		'id_error'=>$id_error,
		'concepto'=>$concepto,
		'id_modulo'=>$id_modulo,
		'fecha_registro'=>$fecha_registro,
		'solucion'=>$solucion,
		'modulo'=>$modulo
		);
}
	
	$convertir = json_encode($json);
	
	echo $convertir;

?>