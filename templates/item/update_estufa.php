<?php 

include("../../config.ini.php");
//CONSULTAR EMPRESAS
$consultar_empresa = mysqli_prepare($connect,"SELECT id_empresa, nombre FROM empresa");
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

$smarty->assign("array_empresas",$array_empresas);

$array_estufa = array();

if($_GET['item']){

 	//RECUPER EL DATO DE LA URL	
	$id_equipo = $_GET['item'];

	//CONSULTO LA INFORMACIÓN DEL EQUIPO
	$estufa = mysqli_prepare($connect,"SELECT a.id_estufa,  a.fabricante, a.modelo, a.n_serie, a.c_interno, a.fecha_fabricacion, a.direccion, a.ubicacion, a.voltaje, 
		a.potencia, a.capacidad, a.peso, a.alto, a.largo, a.ancho, b.nombre, b.descripcion, c.id_empresa, c.nombre,
		a.valor_seteado_tem, a.tem_min, a.tem_max,d.nombre, a.area_interna, a.fecha_registro  FROM item_estufa as a, item as b, empresa as c,tipo_item as d
		WHERE b.id_empresa = c.id_empresa AND a.id_item = b.id_item AND b.id_tipo = d.id_item AND a.id_item = $id_equipo");
	mysqli_stmt_execute($estufa);
	mysqli_stmt_store_result($estufa);
	mysqli_stmt_bind_result($estufa, $id_estufa, $fabricante, $modelo, $n_serie, $c_interno, $fecha_fabricacion, $direccion, $ubicacion, $voltaje, $potencia, $capacidad,
		$peso, $alto, $largo, $ancho, $nombre_item, $descripcion_item, $id_empresa, $nombre_empresa, $seteado_tem, $tem_min, $tem_max,$nombre_tipo_item,$area_interna,$fecha_registro);

	

	while($row = mysqli_stmt_fetch($estufa)){
		$array_estufa[] = array(
			'id_item'=>$id_equipo,
			'id_estufa'=>$id_estufa,
			'fabricante'=>$fabricante,
			'modelo'=>$modelo,
			'n_serie'=>$n_serie,
			'c_interno'=>$c_interno,
			'fecha_fabricacion'=>$fecha_fabricacion,
			'direccion'=>$direccion,
			'ubicacion_interna'=>$ubicacion,
			'voltaje'=>$voltaje,
			'potencia'=>$potencia,
			'capacidad'=>$capacidad,
			'peso'=>$peso,
			'alto'=>$alto,
			'largo'=>$largo,
			'ancho'=>$ancho,
			'nombre_item'=>$nombre_item,
			'descripcion'=>$descripcion_item,
			'id_empresa'=>$id_empresa,
			'nombre_empresa'=>$nombre_empresa,
			'seteado_tem'=>$seteado_tem,
			'tem_min'=>$tem_min,
			'tem_max'=>$tem_max,
			'nombre_tipo_item'=>$nombre_tipo_item,
      		'area_interna'=>$area_interna,
      		'fecha_registro'=>$fecha_registro
		);	
	}  
}  ////////////// CIERRE DEL IF PRINCIPAL
else{
	$array_estufa[] = array(
		'id_item'=>'',
		'id_estufa'=>'',
		'fabricante'=>'',
		'modelo'=>'',
		'n_serie'=>'',
		'c_interno'=>'',
		'fecha_fabricacion'=>'',
		'direccion'=>'',
		'ubicacion'=>'',
		'voltaje'=>'',
		'potencia'=>'',
		'capacidad'=>'',
		'peso'=>'',
		'alto'=>'',
		'largo'=>'',
		'ancho'=>'',
		'nombre_estufa'=>'',
		'descripcion_estufa'=>'',
		'id_empresa'=>'',
		'nombre_empresa'=>'',
		'seteado_tem'=>'',
		'tem_min'=>'',
		'tem_max'=>'',
		'nombre_tipo_item'=>'',
  	    'area_interna'=>''
	);

}

$smarty->assign("array_estufa",$array_estufa);


//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_estufa);   
$conv = base64_encode($convert);
if ($_GET['pdf'] == 1) {

	header('location: templates/item/pdf/pdf/pdf_item.php?&data='.$conv);

}elseif($_GET['pdf'] == 0){
    $smarty->display('item/update_estufa.tpl');
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