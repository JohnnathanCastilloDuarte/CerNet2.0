<?php 
include("../../config.ini.php");

$tipo_item = $_GET['type'];


///Consultar empresas//////
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
$array_aire_comprimido = array();
$array_item_aire = array();
//CONSULTO LA INFORMACIÓN DEL EQUIPO
if (isset($_POST['accion']) && $_POST['accion'] == 'mostrar_listado_items') {

	$id_equipo1 = $_POST['item'];
	$equipo_query = mysqli_prepare($connect,"SELECT a.id_aire_comprimido ,  a.nombre_sala, a.direccion, a.area, a.punto_uso_aire_comprimido , a.codigo_punto , a.grado_iso ,
	a.fecha_registro
		FROM item_aire_comprimido as a, item as b, empresa as c, tipo_item as d 
		WHERE b.id_empresa = c.id_empresa AND a.id_item = b.id_item AND d.id_item = b.id_tipo AND b.id_item = $id_equipo1");
	   mysqli_stmt_execute($equipo_query);
	   mysqli_stmt_store_result($equipo_query);
	   mysqli_stmt_bind_result($equipo_query, $id_aire_comprimido, $nombre_sala, $direccion, $area, $punto_uso_aire_comprimido, $codigo_punto, $grado_iso, $fecha_registro);

	while($row = mysqli_stmt_fetch($equipo_query)){

	     	$array_aire_comprimido[] = array(
			'id_aire_comprimido'=>$id_aire_comprimido,
			'nombre_sala' => $nombre_sala,
			'direccion'=>$direccion,
			'area'=>$area,
			'punto_uso_aire_comprimido'=>$punto_uso_aire_comprimido,
			'codigo_punto'=>$codigo_punto,
			'grado_iso'=>$grado_iso,
			'fecha_registro'=>$fecha_registro
		);
		//$smarty->assign("array_aire_comprimido",$array_aire_comprimido);	
	 }
	     	$convert = json_encode($array_aire_comprimido);
			echo $convert;   
}




if (isset($_GET['item'])) {

	$id_equipo = $_GET['item'];

//CONTADOR 
   $contador_query = mysqli_prepare($connect,"SELECT count(id_item)
	FROM item_aire_comprimido
	WHERE id_item = $id_equipo");
   mysqli_stmt_execute($contador_query);
   mysqli_stmt_store_result($contador_query);
   mysqli_stmt_bind_result($contador_query, $contador);
   mysqli_stmt_fetch($contador_query);	
   //contador de items
$smarty->assign("contador",$contador);


//CONSULTAR ITEM
$item = mysqli_prepare($connect,"SELECT b.id_item, b.nombre, b.descripcion, c.id_empresa, c.nombre, d.nombre
	FROM item as b, empresa as c, tipo_item as d 
	WHERE b.id_empresa = c.id_empresa AND d.id_item = b.id_tipo AND b.id_item = $id_equipo");
   mysqli_stmt_execute($item);
   mysqli_stmt_store_result($item);
   mysqli_stmt_bind_result($item,$id_item, $nombre_item, $descripcion, $id_empresa, $nombre_empresa, $nombre_tipo_item);


while ($row1 = mysqli_stmt_fetch($item)) {

	$array_item_aire[] = array(
		'id_item'=>$id_item,
		'nombre_item'=>$nombre_item,
		'descripcion'=>$descripcion,
		'id_empresa'=>$id_empresa,
		'nombre_empresa'=>$nombre_empresa,
		'nombre_tipo_item'=>$nombre_tipo_item
	);

	$smarty->assign("array_item_aire",$array_item_aire);
}

}else{

	$array_item_aire[] = array(
		'nombre_item'=>'',
		'descripcion'=>'',
		'id_empresa'=>'',
		'nombre_empresa'=>'',
		'nombre_tipo_item'=>''
	);
	$smarty->assign("array_item_aire",$array_item_aire);
		

	$array_aire_comprimido[] = array(
		'id_aire_comprimido'=>'',
		'nombre_sala' => '',
		'direccion'=>'',
		'area'=>'',
		'punto_uso_aire_comprimido'=>'',
		'codigo_punto'=>'',
		'grado_iso'=>'',
		'fecha_registro'=>''
	);	
	$smarty->assign("array_aire_comprimido",$array_aire_comprimido);
}


//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_aire_comprimido);   
$conv = base64_encode($convert);
$link = 'templates/item/pdf/pdf/pdf_item.php?&data='.$conv;
//pdf item

if (isset($_GET['pdf'])) {
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
}else{

}


mysqli_stmt_close($connect);	


 ?>