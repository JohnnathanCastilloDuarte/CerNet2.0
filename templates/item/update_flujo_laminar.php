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

	$flujo_laminar = mysqli_prepare($connect,"SELECT a.id, a.id_item,a.cantidad_filtro, b.nombre,b.id_empresa, c.nombre,d.nombre, a.direccion, a.ubicacion_interna, a.area_interna,a.fecha_registro, a.tipo_cabina, a.marca, a.modelo, a.serie, a.codigo, a.tipo_dimenciones, a.limite_penetracion, a.eficiencia
		FROM item_flujo_laminar as a, item as b, empresa as c, tipo_item d
		WHERE b.id_item = a.id_item AND c.id_empresa = b.id_empresa AND a.id_item = $id_item AND d.id_item = b.id_tipo");
	mysqli_stmt_execute($flujo_laminar);
	mysqli_stmt_store_result($flujo_laminar);
	mysqli_stmt_bind_result($flujo_laminar, $id_flujo_laminar, $id_item, $cantidad_filtro, $nombre_item,$id_empresa_flujo, $nombre_empresa_flujo,$nombre_tipo_item, $direccion,$ubicacion_interna,$area_interna,$fecha_registro, $tipo_cabina, $marca, $modelo, $serie, $codigo, $tipo_dimenciones, $limite_penetracion, $eficiencia);	

	while($row = mysqli_stmt_fetch($flujo_laminar)){
		$array_flujo_laminar[] = array(
			'id_flujo_laminar'=>$id_flujo_laminar,
			'id_item' => $id_item,
			'cantidad_filtro'=>$cantidad_filtro,
			'nombre_item'=> $nombre_item,
			'nombre_empresa' => $nombre_empresa_flujo,
			'id_empresa_flujo' => $id_empresa_flujo,
			'nombre_tipo_item' => $nombre_tipo_item,
			'direccion'=> $direccion,
			'ubicacion_interna'=>$ubicacion_interna,
			'area_interna'=>$area_interna,
			'fecha_registro'=>$fecha_registro,
			'tipo_cabina' => $tipo_cabina,
			'marca' => $marca,
			'modelo' => $modelo,
			'serie' => $serie,
			'codigo' => $codigo,
			'tipo_dimenciones' => $tipo_dimenciones,
			'limite_penetracion' => $limite_penetracion,
			'eficiencia' => $eficiencia
		);	

	}
	$smarty->assign("array_flujo_laminar",$array_flujo_laminar);

}else{
	$array_flujo_laminar[] = array(
			'id_flujo_laminar'=>'',
			'id_item' => '',
			'cantidad_filtro'=>'',
			'nombre_item'=> '',
			'nombre_empresa' => '',
			'id_empresa_flujo' => '',
			'nombre_tipo_item' =>'',
			'direccion'=> '',
			'ubicacion_interna'=>'',
			'area_interna'=>'',
			'tipo_cabina' => '',
			'marca' => '',
			'modelo' => '',
			'serie' => '',
			'codigo' => '',
			'tipo_dimenciones' => '',
			'limite_penetracion' => '',
			'eficiencia' => ''
	);	

	$smarty->assign("array_flujo_laminar",$array_flujo_laminar);
}




	//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_flujo_laminar);   
$conv = base64_encode($convert);
if ($_GET['pdf'] == 1) {

	header('location: templates/item/pdf/pdf/pdf_item.php?&data='.$conv);

}elseif($_GET['pdf'] == 0){
	$smarty->display("item/update_flujo_laminar.tpl");  
}elseif($_GET['pdf'] == 2){

	$url = $_SERVER['HTTP_HOST'];
		
	if($url = 'cercal.net') {

		$link2  = 'https://cercal.net/CerNet2.0/templates/item/pdf/pdf/pdf_item.php';
		$correo = $_GET['correo'];
		header('location: ../documentacion/enviarPDF_correo.php?correo='.$correo."&link=".$link2."&conv=".$conv);		
	}else{ 	
		$link2  = 'https://localhost/CerNet2.0/templates/item/pdf/pdf/pdf_item.php';
		$correo = $_GET['correo'];
		header('location: ../documentacion/enviarPDF_correo.php?correo='.$correo."&link=".$link2."&conv=".$conv);
	}
}


 ?>