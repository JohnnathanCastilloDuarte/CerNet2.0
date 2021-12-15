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
$array_refrigerador = array();


if(isset($_GET['item'])){
	
   	//RECUPER EL DATO DE LA URL	
	$id_equipo = $_GET['item'];

	//CONSULTO LA INFORMACIÓN DEL EQUIPO
	$refrigerador = mysqli_prepare($connect,"SELECT a.id_refrigerador,  a.fabricante, a.modelo, a.n_serie, a.c_interno, a.fecha_fabricacion, a.direccion, a.ubicacion, a.voltaje, 
		a.potencia, a.capacidad, a.peso, a.alto, a.largo, a.ancho, b.nombre, b.descripcion, c.id_empresa, c.nombre,
		a.valor_seteado_hum, a.hum_min, a.hum_max, a.valor_seteado_tem, a.tem_min, a.tem_max, d.nombre FROM item_refrigerador as a, item as b, empresa as c, tipo_item as d 
		WHERE b.id_empresa = c.id_empresa AND a.id_item = b.id_item AND b.id_tipo = d.id_item AND a.id_item = $id_equipo");
	mysqli_stmt_execute($refrigerador);
	mysqli_stmt_store_result($refrigerador);
	mysqli_stmt_bind_result($refrigerador, $id_refrigerador, $fabricante, $modelo, $n_serie, $c_interno, $fecha_fabricacion, $direccion, $ubicacion, $voltaje, $potencia, $capacidad,
		$peso, $alto, $largo, $ancho, $nombre_item, $descripcion_item, $id_empresa, $nombre_empresa, $seteado_hum, $hum_min, $hum_max, 
		$seteado_tem, $tem_min, $tem_max, $nombre_tipo_item);

	

	while($row = mysqli_stmt_fetch($refrigerador)){
		$array_refrigerador[] = array(
			'id_item'=>$id_equipo,
			'id_refrigerador'=>$id_refrigerador,
			'fabricante'=>$fabricante,
			'modelo'=>$modelo,
			'n_serie'=>$n_serie,
			'c_interno'=>$c_interno,
			'fecha_fabricacion'=>$fecha_fabricacion,
			'direccion'=>$direccion,
			'ubicacion'=>$ubicacion,
			'voltaje'=>$voltaje,
			'potencia'=>$potencia,
			'capacidad'=>$capacidad,
			'peso'=>$peso,
			'alto'=>$alto,
			'largo'=>$largo,
			'ancho'=>$ancho,
			'nombre_refrigerador'=>$nombre_item,
			'descripcion_refrigerador'=>$descripcion_item,
			'id_empresa'=>$id_empresa,
			'nombre_empresa'=>$nombre_empresa,
			'seteado_hum'=>$seteado_hum,
			'seteado_tem'=>$seteado_tem,
			'hum_min'=>$hum_min,
			'hum_max'=>$hum_max,
			'tem_min'=>$tem_min,
			'tem_max'=>$tem_max,
			'nombre_tipo_item'=>$nombre_tipo_item
		);	
	}
	$smarty->assign("array_refrigerador",$array_refrigerador);
	
}////////// FIN DEL IF PRINCIPAL 
else{
	
	$array_refrigerador[] = array(
		'id_item'=>'',
		'id_refrigerador'=>'',
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
		'nombre_refrigerador'=>'',
		'descripcion_refrigerador'=>'',
		'id_empresa'=>'',
		'nombre_empresa'=>'',
		'seteado_hum'=>'',
		'seteado_tem'=>'',
		'hum_min'=>'',
		'hum_max'=>'',
		'tem_min'=>'',
		'tem_max'=>'',
		'nombre_tipo_item'=>''
	);	
	
	$smarty->assign("array_refrigerador",$array_refrigerador);
}

//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_refrigerador);   
$conv = base64_encode($convert);
if ($_GET['pdf'] == 1) {

	header('location: templates/item/pdf/pdf/pdf_refrigerador.php?&data='.$conv);

}elseif($_GET['pdf'] == 0){
	$smarty->display("item/update_refrigerador.tpl");
}elseif($_GET['pdf'] == 2){

	$url = $_SERVER['HTTP_HOST'];
		
	if($url = 'cercal.net') {

		$link2  = 'https://cercal.net/CerNet2.0/templates/item/pdf/pdf/pdf_automovil.php';
		$correo = $_GET['correo'];
		header('location: ../documentacion/enviarPDF_correo.php?correo='.$correo."&link=".$link2."&conv=".$conv);		
	}else{ 	
		$link2  = 'https://localhost/CerNet2.0/templates/item/pdf/pdf/pdf_automovil.php';
		$correo = $_GET['correo'];
		header('location: ../documentacion/enviarPDF_correo.php?correo='.$correo."&link=".$link2."&conv=".$conv);
	}
}




?>