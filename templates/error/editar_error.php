<?php 
	$id = $_GET['error'];

	$query = "SELECT a.id_error, a.concepto, a.id_modulo, a.fecha_registro, a.solucion , b.nombre FROM error as a, modulo as b 
					WHERE a.id_modulo = b.id_modulo AND id_error = $id";
	$execute = mysqli_prepare($connect,$query);
	mysqli_stmt_execute($execute);
	mysqli_stmt_store_result($execute);
	mysqli_stmt_bind_result($execute, $id_error, $concepto, $id_modulo, $fecha_registro, $solucion, $modulo);
	mysqli_stmt_fetch($execute);
		
$json = array();

	$json[]=array(
		'id_error'=>$id_error,
		'concepto'=>$concepto,
		'id_modulo'=>$id_modulo,
		'fecha_registro'=>$fecha_registro,
		'solucion'=>$solucion,
		'modulo'=>$modulo
		);

$smarty->assign("array_error",$json);


	$query_2 = "SELECT id_modulo, nombre FROM modulo";
	$execute_query = mysqli_prepare($connect,$query_2);
	mysqli_stmt_execute($execute_query);
	mysqli_stmt_store_result($execute_query);
	mysqli_stmt_bind_result($execute_query, $id_modulo,$nombre_modulo);

	$array_modulo=array();
	while($row = mysqli_stmt_fetch($execute_query)){
  $array_modulo[]=array("id_modulo"=> $id_modulo,"nombre"=> $nombre_modulo);

}
$smarty->assign("array_modulo",$array_modulo);
$smarty->display("error/editar_error.tpl");

?>