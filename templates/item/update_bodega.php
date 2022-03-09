 <?php 

 include("../../config.ini.php");
 $id_tipo = $_GET['type'];

 $smarty->assign("id_tipo",$id_tipo);

//consultar empresas
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


 if(isset($_GET['item'])){
 	
 	$id_item = $_GET['item'];
 	$smarty->assign("id_item",$id_item);

	//consultar item
 	$execute = mysqli_prepare($connect,"SELECT d.id_bodega, a.nombre, b.descripcion, b.nombre, c.nombre, c.id_empresa, b.direccion, b.codigo_interno, d.productos_almacena, d.largo, d.ancho, d.superficie, 
 		d.volumen, d.altura, d.tipo_muro, d.tipo_cielo, d.s_climatizacion, d.s_monitoreo, d.s_alarma, d.planos, d.analisis_riesgo, 
    d.ficha_estabilidad , d.marca_bodega, d.modelo_bodega, d.orientacion_principal, d.orientacion_recepcion, d.orientacion_despacho, d.num_puertas, 
    d.salida_emergencia, d.cantidad_rack, d.num_estantes, d.altura_max_rack, d.sistema_extraccion, d.cielo_lus, d.temp_max, d.temp_min, 
    d.cantidad_iluminarias, d.hr_max, d.hr_min, d.cantidad_ventana, d.valor_seteado_temp, d.valor_seteado_hum, b.clasificacion_item, b.estado
    FROM tipo_item as a, item as b, empresa as c, item_bodega as d  
 		WHERE a.id_item = b.id_tipo AND b.id_empresa = c.id_empresa AND d.id_item = b.id_item AND b.id_item  = ?");


 	mysqli_stmt_bind_param($execute, 'i', $id_item);
 	mysqli_stmt_execute($execute);
 	mysqli_stmt_store_result($execute);
 	mysqli_stmt_bind_result($execute, $id_bodega, $nombre_tipo_item, $descripcion_bodega, $nombre_item, $nombre_empresa, $id_empresa, $direccion, $codigo_iterno, $producto, $largo, $ancho, $superficie, $volumen, $altura, $tipo_muro,
 		$tipo_cielo, $climatizacion, $monitoreo, $alarma, $planos, $analisis_riesgo, $ficha_estabilidad, $marca_bodega, $modelo_bodega, 
     $orientacion_principal, $orientacion_recepcion, $orientacion_despacho, $num_puertas, $salida_emergencia, $cantidad_rack, $num_estantes, 
    $altura_max_rack, $sistema_extraccion, $cielo_lus, $temp_max, $temp_min, $cantidad_iluminarias, $hr_max, $hr_min, $cantidad_ventana, $valor_seteado_temp, $valor_seteado_hum, $clasificacion_item, $estado);
 	mysqli_stmt_fetch($execute);	


 	$array_bodega[] = array(
 		'id_bodega'=>$id_bodega,
 		'nombre_tipo_item'=>$nombre_tipo_item,
 		'descripcion_bodega'=>$descripcion_bodega,
 		'nombre_item'=>$nombre_item,
 		'nombre_empresa'=>$nombre_empresa,
 		'id_empresa'=>$id_empresa,
 		'direccion'=>$direccion,
 		'codigo_interno'=>$codigo_iterno,
 		'productos'=>$producto,
 		'largo'=>$largo,
 		'ancho'=>$ancho,
 		'superficie'=>$superficie,
 		'volumen'=>$volumen,
 		'altura'=>$altura,
 		'tipo_muro'=>$tipo_muro,
 		'tipo_cielo'=>$tipo_cielo,
 		'climatizacion'=>$climatizacion,
 		'monitoreo'=>$monitoreo,
 		'alarma'=>$alarma,
 		'planos'=>$planos,
 		'analisis_riesgo'=>$analisis_riesgo,
 		'ficha_estabilidad'=>$ficha_estabilidad,
 		'marca'=>$marca_bodega,
		'modelo'=>$modelo_bodega,
		'orientacion_principal'=>$orientacion_principal,
		'orientacion_recepcion'=>$orientacion_recepcion,
		'orientacion_despacho'=>$orientacion_despacho,
		'num_puertas'=>$num_puertas,
		'salida_emergencia'=>$salida_emergencia,
		'cantidad_rack'=>$cantidad_rack,
		'num_estantes'=>$num_estantes,
		'altura_max_rack'=>$altura_max_rack,
		'sistema_extraccion'=>$sistema_extraccion,
		'cielo_lus'=>$cielo_lus,
		'temp_max'=>$temp_max,
		'temp_min'=>$temp_min,
		'cantidad_iluminarias'=>$cantidad_iluminarias,
		'hr_max'=>$hr_max,
		'hr_min'=>$hr_min,
    	'cantidad_ventana'=>$cantidad_ventana,
    	'valor_seteado_temp'=>$valor_seteado_temp,
    	'valor_seteado_hum'=>$valor_seteado_hum,
    	'clasificacion_item'=>$clasificacion_item,
		'estado'=>$estado
 	);

 	$explode_producto = explode(", ", $producto);
 	$explode_climatizacion = explode(", ",$climatizacion);
 	$explode_muro = explode(", ",$tipo_muro);
 	$explode_cielo = explode(", ",$tipo_cielo);
 	$explode_planos = explode(", ",$planos);

 	$smarty->assign("explode_plano",$explode_planos);
 	$smarty->assign("arquitectura","");
 	$smarty->assign("flujo_procesos","");
 	$smarty->assign("sensores_monitoreo","");
 	$smarty->assign("no_planos","");
 	$smarty->assign("explode_muro", $explode_muro);		
 	$smarty->assign("explode_producto",$explode_producto);
 	$smarty->assign("explode_cielo",$explode_cielo);
 	$smarty->assign("explode_climatizacion", $explode_climatizacion);
 	$smarty->assign("mezclador_aire","");
 	$smarty->assign("sistema_hvac","");
 	$smarty->assign("split","");
 	$smarty->assign("cielo_hormigon","");
 	$smarty->assign("cielo_isopol","");
 	$smarty->assign("cielo_plachas_metalicas","");
 	$smarty->assign("otro_cielo","");
 	$smarty->assign("otro_cielo_e","");
 	$smarty->assign("alimentos","");
 	$smarty->assign("cosmeticos","");
 	$smarty->assign("farmaceutico","");	
 	$smarty->assign("insumos_medicos","");
 	$smarty->assign("materias_primas","");
 	$smarty->assign("sustancias_peligrosas","");
 	$smarty->assign("otros","");
 	$smarty->assign("otros_e","");
 	$smarty->assign("hormigon","");
 	$smarty->assign("isopol","");
 	$smarty->assign("ladrillo","");
 	$smarty->assign("madera","");
 	$smarty->assign("otro_muro","");
 	$smarty->assign("otro_muro_e","");
 	$smarty->assign("monitore_1","");
 	$smarty->assign("monitore_2","");
 	$smarty->assign("alarma_1","");
 	$smarty->assign("alarma_2","");
 	$smarty->assign("ar_1","");
 	$smarty->assign("ar_2","");
 	$smarty->assign("ficha_1","");
 	$smarty->assign("ficha_2","");
 	
 	$smarty->assign("array_bodega",$array_bodega);
}///// CIERRE DEL IF PRINCIPAL
else{
	
	$smarty->assign("explode_plano","");
	$smarty->assign("arquitectura","");
	$smarty->assign("flujo_procesos","");
	$smarty->assign("sensores_monitoreo","");
	$smarty->assign("no_planos","");
	$smarty->assign("explode_muro", "");		
	$smarty->assign("explode_producto","");
	$smarty->assign("explode_cielo","");
	$smarty->assign("explode_climatizacion", "");
	$smarty->assign("mezclador_aire","");
	$smarty->assign("sistema_hvac","");
	$smarty->assign("split","");
	$smarty->assign("cielo_hormigon","");
	$smarty->assign("cielo_isopol","");
	$smarty->assign("cielo_plachas_metalicas","");
	$smarty->assign("otro_cielo","");
	$smarty->assign("otro_cielo_e","");
	$smarty->assign("alimentos","");
	$smarty->assign("cosmeticos","");
	$smarty->assign("farmaceutico","");	
	$smarty->assign("insumos_medicos","");
	$smarty->assign("materias_primas","");
	$smarty->assign("sustancias_peligrosas","");
	$smarty->assign("otros","");
	$smarty->assign("otros_e","");
	$smarty->assign("hormigon","");
	$smarty->assign("isopol","");
	$smarty->assign("ladrillo","");
	$smarty->assign("madera","");
	$smarty->assign("otro_muro","");
	$smarty->assign("otro_muro_e","");
	$smarty->assign("monitore_1","");
	$smarty->assign("monitore_2","");
	$smarty->assign("alarma_1","");
	$smarty->assign("alarma_2","");
	$smarty->assign("ar_1","");
	$smarty->assign("ar_2","");
	$smarty->assign("ficha_1","");
	$smarty->assign("ficha_2","");
	
	
	$array_bodega[] = array(
		'id_bodega'=>"",
		'nombre_tipo_item'=>"",
		'descripcion_bodega'=>"",
		'nombre_item'=>"",
		'nombre_empresa'=>"",
		'id_empresa'=>"",
		'direccion'=>"",
		'codigo_interno'=>"",
		'productos'=>"",
		'largo'=>"",
		'ancho'=>"",
		'superficie'=>"",
		'volumen'=>"",
		'altura'=>"",
		'tipo_muro'=>"",
		'tipo_cielo'=>"",
		'climatizacion'=>"",
		'monitoreo'=>"",
		'alarma'=>"",
		'planos'=>"",
		'analisis_riesgo'=>"",
		'ficha_estabilidad'=>""
	);
	
	$smarty->assign("array_bodega",$array_bodega);
}

//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_bodega);   
$conv = base64_encode($convert);
$link = 'templates/item/pdf/pdf/pdf_bodega.php?&data='.$conv;
//pdf item
if ($_GET['pdf'] == 1) {

	header('location: '.$link);
//ediitar item
}elseif($_GET['pdf'] == 0){
	$smarty->display("item/update_bodega.tpl");
//enviar pdf por correo	  
}elseif($_GET['pdf'] == 2){

	$url = $_SERVER['HTTP_HOST'];
	
	if($url = 'cercal.net') {

		$link2  = 'https://cercal.net/CerNet2.0/templates/item/pdf/pdf/pdf_bodega.php';
		$correo = $_GET['correo'];
		header('location: ../documentacion/enviarPDF_correo.php?correo='.$correo."&link=".$link2."&conv=".$conv);
	}else{ 	
		$link2  = 'https://localhost/CerNet2.0/templates/item/pdf/pdf/pdf_bodega.php';
		$correo = $_GET['correo'];
		header('location: ../documentacion/enviarPDF_correo.php?correo='.$correo."&link=".$link2."&conv=".$conv);
	}
}


?>