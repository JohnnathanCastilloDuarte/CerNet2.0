<?php 

include("../../config.ini.php");




$empresas = mysqli_prepare($connect,"SELECT id_empresa, nombre FROM empresa");
mysqli_stmt_execute($empresas);
mysqli_stmt_store_result($empresas);
mysqli_stmt_bind_result($empresas, $id_empresa, $nombre_empresa);

$array_empresa = array();

while($row = mysqli_stmt_fetch($empresas)){

	$array_empresa[]=array(
		'id_empresa'=>$id_empresa,
		'nombre_empresa'=>$nombre_empresa	
	);
}
$smarty->assign("array_empresa",$array_empresa);


if (isset($_GET['item'])) {
	$id_item = $_GET['item'];
  //CONSULTO LA INFORMACIÓN DEL EQUIPO

	$flujo_laminar = mysqli_prepare($connect,"SELECT a.id,a.id_item,a.cantidad_filtro,b.nombre,b.id_empresa,c.nombre
		FROM item_flujo_laminar as a, item as b, empresa as c
		WHERE b.id_item = a.id_item AND c.id_empresa = b.id_empresa AND a.id_item = $id_item");
	mysqli_stmt_execute($flujo_laminar);
	mysqli_stmt_store_result($flujo_laminar);
	mysqli_stmt_bind_result($flujo_laminar, $id_flujo_laminar, $id_item, $cantidad_filtro, $nombre_item,$id_empresa_flujo, $nombre_empresa_flujo);	

	while($row = mysqli_stmt_fetch($flujo_laminar)){
		$array_flujo_laminar[] = array(
			'id_flujo_laminar'=>$id_flujo_laminar,
			'id_item' => $id_item,
			'cantidad_filtro'=>$cantidad_filtro,
			'nombre_item'=> $nombre_item,
			'nombre_empresa_flujo' => $nombre_empresa_flujo,
			'id_empresa_flujo' => $id_empresa_flujo,
		);	

	}
	$smarty->assign("array_flujo_laminar",$array_flujo_laminar);

}else{
	$array_flujo_laminar[] = array(
		'id_flujo_laminar'=>'',
		'cantidad_filtro'=>'',
	);	

	$smarty->assign("array_flujo_laminar",$array_flujo_laminar);
}

$smarty->display("item/update_flujo_laminar.tpl");  
 ?>