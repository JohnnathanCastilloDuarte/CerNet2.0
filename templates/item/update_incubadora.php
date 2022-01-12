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
$array_incubadora = array();


if(isset($_GET['item'])){
	
	//RECUPER EL DATO DE LA URL	
	$id_equipo = $_GET['item'];

	//CONSULTO LA INFORMACIÓN DEL EQUIPO
	$incubadora = mysqli_prepare($connect,"SELECT a.id_incubadora,a.id_item,a.fabricante,a.modelo,a.n_serie,a.fecha_fabricacion,a.direccion,a.ubicacion_interna,a.area_interna,a.valor_seteado,a.limite_maximo,a.limite_minimo,a.id_usuario, b.nombre, b.descripcion, c.nombre,c.id_empresa
	FROM item_incubadora a, item b, empresa c
	WHERE a.id_item = b.id_item AND c.id_empresa = b.id_empresa AND a.id_item = $id_equipo");
	mysqli_stmt_execute($incubadora);
	mysqli_stmt_store_result($incubadora);
	mysqli_stmt_bind_result($incubadora, $id_incubadora,$id_item,$fabricante,$modelo,$n_serie,$fecha_fabricacion,$direccion,$ubicacion_interna,$area_interna,$valor_seteado,$limite_maximo,$limite_minimo,$id_usuario,$nombre_item,$descripcion,$nombre_empresa,$id_empresa);

	while($row = mysqli_stmt_fetch($incubadora)){
		$array_incubadora[] = array(
			'id_incubadora'=>$id_incubadora,
			'id_item'=>$id_item,
			'fabricante'=>$fabricante,
			'modelo'=>$modelo,
			'n_serie'=>$n_serie,
			'fecha_fabricacion'=>$fecha_fabricacion,
			'direccion'=>$direccion,
			'ubicacion_interna'=>$ubicacion_interna,
			'area_interna'=>$area_interna,
			'valor_seteado'=>$valor_seteado,
			'limite_maximo'=>$limite_maximo,
			'limite_minimo'=>$limite_minimo,
			'id_usuario'=>$id_usuario,
			'nombre_incubadora'=>$nombre_item,
			'descripcion'=>$descripcion,
			'nombre_empresa'=>$nombre_empresa,
			'id_empresa'=>$id_empresa
		);	
	}
	$smarty->assign("array_incubadora",$array_incubadora);
	
}////////// FIN DEL IF PRINCIPAL 
else{
	
	$array_incubadora[] = array(
		'id_incubadoras'=>'',
			'id_item'=>'',
			'fabricante'=>'',
			'modelo'=>'',
			'n_serie'=>'',
			'fecha_fabricacion'=>'',
			'direccion'=>'',
			'ubicacion_interna'=>'',
			'area_interna'=>'',
			'valor_seteado'=>'',
			'limite_maximo'=>'',
			'limite_minimo'=>'',
			'id_usuario'=>'',
			'nombre_item'=>'',
			'descripcion'=>'',
			'nombre_empresa'=>'',
			'id_empresa'=>''
	);	
	
	$smarty->assign("array_incubadora",$array_incubadora);
}

//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_incubadora);   
$conv = base64_encode($convert);
if ($_GET['pdf'] == 1) {

	header('location: templates/item/pdf/pdf/pdf_incubadora.php?&data='.$conv);

}elseif($_GET['pdf'] == 0){
	$smarty->display("item/update_incubadora.tpl");
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