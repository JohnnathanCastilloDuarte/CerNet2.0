<?php 

include("../../config.ini.php");

$id_tipo = $_GET['type'];
$id_item = $_GET['item'];

$array_datos = array();


$smarty->assign("id_tipo",$id_tipo);
$smarty->assign("id_item",$id_item);

//echo "<input type='hidden' id='type_campana' value='".$id_tipo."'>";
//echo "<input type='hidden' id='id_item_campana' value='".$id_item."'>";

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
  //CONSULTO LA INFORMACIÓN DEL EQUIPO
	$campana = mysqli_prepare($connect,"SELECT a.id_campana, a.id_item, a.tipo, a.modelo, a.serie, a.codigo, a.ubicacion_interna,a.area_interna, a.direccion, a.requisito_velocidad,b.id_empresa,b.id_tipo,b.nombre,b.descripcion,b.estado,b.id_usuario,b.fecha_registro,c.nombre,a.marca,a.fecha_fabricacion, d.nombre, a.temp_min, a.temp_max, a.hum_min, a.hum_max, a.presion_sonora_equipo, a.presion_sonora_sala, a.nivel_iluminacion, a.prueba_humo,
		FROM item_campana as a, item as b, empresa as c, tipo_item as d
		WHERE b.id_empresa = c.id_empresa AND a.id_item = b.id_item AND d.id_item = b.id_tipo  AND a.id_item = $id_item");
	mysqli_stmt_execute($campana);
	mysqli_stmt_store_result($campana);
	mysqli_stmt_bind_result($campana, $id_campana, $id_item_campana, $tipo_campana, $modelo, $n_serie, $codigo,$ubicacion_interna,$area_interna, $direccion, $requisito_velocidad, $id_empresa,$id_tipo_item, $nombre_campana, $descripcion, $estado, $id_usuario, $fecha_registro, $nombre_empresa,$marca,$fecha_fabricacion,$nombre_tipo_item,$temp_min, $temp_max, $hum_min, $hum_max, $presion_sonora_equipo, $presion_sonora_sala, $nivel_iluminacion, $prueba_humo);	

	while($row = mysqli_stmt_fetch($campana)){
		$array_campana[] = array(
			'id_campana'=>$id_campana,
			'id_item_campana'=>$id_item_campana,
			'tipo_campana'=>$tipo_campana,
			'modelo'=>$modelo,
			'n_serie'=>$n_serie,
			'codigo'=>$codigo,
			'ubicacion_interna'=>$ubicacion_interna,
			'area_interna'=>$area_interna,
			'direccion'=>$direccion,
			'requisito_velocidad'=>$requisito_velocidad,
			'id_empresa'=>$id_empresa,
			'id_tipo_item'=>$id_tipo_item,
			'nombre_item'=>$nombre_campana,
			'descripcion'=>$descripcion,
			'estado'=>$estado,
			'id_usuario'=>$id_usuario,
			'fecha_registro'=>$fecha_registro,
			'nombre_empresa'=>$nombre_empresa,
			'marca'=>$marca,
			'fecha_fabricacion'=>$fecha_fabricacion,
			'nombre_tipo_item'=>$nombre_tipo_item,
			'temp_min'=> $temp_min,
			'temp_max'=> $temp_max,
			'hum_min'=> $hum_min,
			'hum_max'=> $hum_max,
			'presion_sonora_equipo'=> $presion_sonora_equipo,
			'presion_sonora_sala'=> $presion_sonora_sala,
			'nivel_iluminacion'=> $nivel_iluminacion,
			'prueba_humo'=> $prueba_humo
		);	

	}
	$smarty->assign("array_campana",$array_campana);
}else{
	$array_campana[] = array(
		'id_campana'=>'',
		'id_item'=>'',
		'tipo_campana'=>'',
		'modelo'=>'',
		'n_serie'=>'',
		'codigo'=>'',
		'ubicado_en'=>'',
		'ubicacion'=>'',
		'requisito_velocidad'=>'',
		'id_empresa'=>'',
		'id_tipo_item'=>'',
		'nombre_campana'=>'',
		'descripcion'=>'',
		'estado'=>'',
		'id_usuario'=>'',
		'fecha_registro'=>'',
		'nombre_empresa'=>'',
		'marca'=>'',
		'fecha_fabricacion'=>'',
		'nombre_tipo_item'=>''
	);	

	$smarty->assign("array_campana",$array_campana);
}
//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_campana);   
$conv = base64_encode($convert);
$link = 'templates/item/pdf/pdf/pdf_item.php?&data='.$conv;
//pdf item
if ($_GET['pdf'] == 1) {
	
	header('location: '.$link);
//ediitar item
}elseif($_GET['pdf'] == 0){
	$smarty->display("item/update_campana_extraccion.tpl");  
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





?>