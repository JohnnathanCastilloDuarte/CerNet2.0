<?php 


$id_tipo = $_GET['type'];
$id_item = $_GET['item'];


echo "<input type='hidden' id='type_campana' value='".$id_tipo."'>";

echo "<input type='hidden' id='id_item_campana' value='".$id_item."'>";

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
	$campana = mysqli_prepare($connect,"SELECT a.id_campana, a.id_item, a.tipo, a.modelo, a.serie, a.codigo, a.ubicado_en, a.ubicacion, a.requisito_velocidad,b.id_empresa,b.id_tipo,b.nombre,b.descripcion,b.estado,b.id_usuario,b.fecha_registro,c.nombre,a.marca,a.fecha_fabricacion 
		FROM item_campana as a, item as b, empresa as c 
		WHERE b.id_empresa = c.id_empresa AND a.id_item = b.id_item AND a.id_item =  $id_item");
	mysqli_stmt_execute($campana);
	mysqli_stmt_store_result($campana);
	mysqli_stmt_bind_result($campana, $id_campana, $id_item_campana, $tipo_campana, $modelo, $n_serie, $codigo,$ubicado_en, $ubicacion, $requisito_velocidad, $id_empresa,$id_tipo_item, $nombre_campana, $descripcion, $estado, $id_usuario, $fecha_registro, $nombre_empresa,$marca,$fecha_fabricacion);	

	while($row = mysqli_stmt_fetch($campana)){
		$array_campana[] = array(
			'id_campana'=>$id_campana,
			'id_item_campana'=>$id_item_campana,
			'tipo_campana'=>$tipo_campana,
			'modelo'=>$modelo,
			'n_serie'=>$n_serie,
			'codigo'=>$codigo,
			'ubicado_en'=>$ubicado_en,
			'ubicacion'=>$ubicacion,
			'requisito_velocidad'=>$requisito_velocidad,
			'id_empresa'=>$id_empresa,
			'id_tipo_item'=>$id_tipo_item,
			'nombre_campana'=>$nombre_campana,
			'descripcion'=>$descripcion,
			'estado'=>$estado,
			'id_usuario'=>$id_usuario,
			'fecha_registro'=>$fecha_registro,
			'nombre_empresa'=>$nombre_empresa,
			'marca'=>$marca,
			'fecha_fabricacion'=>$fecha_fabricacion
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
			'fecha_fabricacion'=>''
		);	

		$smarty->assign("array_campana",$array_campana);
}

$convert = json_encode($array_campana);   
$conv = base64_encode($convert);
if ($_GET['pdf'] == 1) {

	header('location: templates/item/pdf/pdf/pdf_campana.php?&data='.$conv);

}elseif($_GET['pdf'] == 0){
	$smarty->display("item/update_campana_extraccion.tpl");    
}else{
	echo"No hay permisos para acceder contacta con el administrador";  
}





?>