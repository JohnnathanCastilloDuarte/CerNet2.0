 <?php 
  
  $id_tipo = $_GET['type'];

echo "<input value='".$id_tipo."' id='id_tipo' hidden>";

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
	$execute = mysqli_prepare($connect,"SELECT d.id_bodega, a.nombre, b.descripcion, b.nombre, c.nombre, c.id_empresa, d.direccion, d.codigo_interno, d.productos_almacena, d.largo, d.ancho, d.superficie, 
																			d.volumen, d.altura, d.tipo_muro, d.tipo_cielo, d.s_climatizacion, d.s_monitoreo, d.s_alarma, d.planos, d.analisis_riesgo, 
																			d.ficha_estabilidad FROM tipo_item as a, item as b, empresa as c, item_bodega as d  
																			WHERE a.id_item = b.id_tipo AND b.id_empresa = c.id_empresa AND d.id_item = b.id_item AND b.id_item  = ?");
	mysqli_stmt_bind_param($execute, 'i', $id_item);
	mysqli_stmt_execute($execute);
	mysqli_stmt_store_result($execute);
	mysqli_stmt_bind_result($execute, $id_bodega, $nombre_tipo_item, $descripcion_bodega, $nombre_item, $nombre_empresa, $id_empresa, $direccion, $codigo_iterno, $producto, $largo, $ancho, $superficie, $volumen, $altura, $tipo_muro,
												 						$tipo_cielo, $climatizacion, $monitoreo, $alarma, $planos, $analisis_riesgo, $ficha_estabilidad);
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
		'ficha_estabilidad'=>$ficha_estabilidad
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

$smarty->display("item/update_bodega.tpl");

  
?>