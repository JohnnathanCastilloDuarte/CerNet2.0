<?php 
include("../../config.ini.php");

$tipo_item = $_GET['type'];


///Consultar empresas//////7777
$consultar_empresa = mysqli_prepare($connect, "SELECT id_empresa, nombre FROM empresa");
mysqli_stmt_execute($consultar_empresa);
mysqli_stmt_store_result($consultar_empresa);
mysqli_stmt_bind_result($consultar_empresa, $id_empresas, $nombre_empresas);

$array_empresas = array();

while($row = mysqli_stmt_fetch($consultar_empresa)){
	$array_empresas[] = array(
		'id_empresas'=>$id_empresas,
		'nombre_empresas'=>$nombre_empresas	
	);
}


$smarty->display("item/update_aire_comprimido.tpl");


$array_aire_comprimido = array();
if (isset($_GET['item'])) {

	$id_equipo = $_GET['item'];
	
//CONSULTO LA INFORMACIÓN DEL EQUIPO
$automovil = mysqli_prepare($connect,"SELECT a.id_aire_comprimido ,  a.nombre_sala, a.direccion, a.area, a.punto_uso_aire_comprimido , a.codigo_punto , a.grado_iso ,
a.fecha_registro ,b.nombre, b.descripcion, c.id_empresa, c.nombre, d.nombre, a.id_item 
	FROM item_aire_comprimido as a, item as b, empresa as c, tipo_item as d 
	WHERE b.id_empresa = c.id_empresa AND a.id_item = b.id_item AND d.id_item = b.id_tipo AND a.id_item = $id_equipo");
   mysqli_stmt_execute($automovil);
   mysqli_stmt_store_result($automovil);
   mysqli_stmt_bind_result($automovil, $id_aire_comprimido, $nombre_sala, $direccion, $area, $punto_uso_aire_comprimido, $codigo_punto, $grado_iso, $fecha_registro, $nombre_item, $descripcion, $id_empresa, $nombre_empresa, $nombre_tipo_item, $id_item);


while($row = mysqli_stmt_fetch($automovil)){

     	$array_aire_comprimido[] = array(
		'id_aire_comprimido'=>$id_aire_comprimido,
		'nombre_sala' => $nombre_sala,
		'direccion'=>$direccion,
		'area'=>$area,
		'punto_uso_aire_comprimido'=>$punto_uso_aire_comprimido,
		'codigo_punto'=>$codigo_punto,
		'grado_iso'=>$grado_iso,
		'fecha_registro'=>$fecha_registro,
		'nombre_item'=>$nombre_item,
		'descripcion'=>$descripcion,
		'id_empresa'=>$id_empresa,
		'nombre_empresa'=>$nombre_empresa,
		'id_item'=>$id_item,
		'nombre_tipo_item'=>$nombre_tipo_item  
	);
	$smarty->assign("array_aire_comprimido",$array_aire_comprimido);	
 }
}else{
		
	$array_aire_comprimido[] = array(
		'id_aire_comprimido'=>'',
		'nombre_sala' => '',
		'direccion'=>'',
		'area'=>'',
		'punto_uso_aire_comprimido'=>'',
		'codigo_punto'=>'',
		'grado_iso'=>'',
		'fecha_registro'=>'',
		'nombre_item'=>'',
		'descripcion'=>'',
		'id_empresa'=>'',
		'nombre_empresa'=>'',
		'id_item'=>'',
		'nombre_tipo_item'=>''  
	);

	$smarty->assign("array_aire_comprimido",$array_aire_comprimido);
}

//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_aire_comprimido);   
$conv = base64_encode($convert);
$link = 'templates/item/pdf/pdf/pdf_item.php?&data='.$conv;
//pdf item
if ($_GET['pdf'] == 1) {

	header('location: '.$link);
//ediitar item
}elseif($_GET['pdf'] == 0){	
	$smarty->display("item/update_aire_comprimido.tpl");
//enviar pdf por correo	  
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



mysqli_stmt_close($connect);	


 ?>