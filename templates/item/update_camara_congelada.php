<?php 
include("../../config.ini.php");


if(isset($_GET['item'])){
   
    $id_item = $_GET['item'];
    $smarty->assign("id_item",$id_item);

	//consultar item
	$execute = mysqli_prepare($connect,"SELECT a.nombre, a.id_empresa, b.nombre, c.id_item_camara_congelada, c.marca, c.modelo, c.ubicacion, c.valor_seteado, c.valor_maximo, c.valor_minimo,d.nombre,c.fecha_registro,c.direccion,c.area_interna FROM item as a, empresa as b, item_camara_congelada as c, tipo_item as d   WHERE a.id_empresa = b.id_empresa AND d.id_item = a.id_tipo AND a.id_item = c.id_item AND c.id_item = ?");
	mysqli_stmt_bind_param($execute, 'i', $id_item);
	mysqli_stmt_execute($execute);
	mysqli_stmt_store_result($execute);
	mysqli_stmt_bind_result($execute, $nombre, $id_empresa, $empresa, $id_camara_congelada, $marca, $modelo, $ubicacion, $valor_seteado, $valor_maximo, $valor_minimo, $nombre_tipo_item,$fecha_registro,$direccion,$area_interna);
	mysqli_stmt_fetch($execute);



    $array_camara_congelada[] = array(
        'nombre_item'=>$nombre,
        'id_empresa'=>$id_empresa,
        'nombre_empresa'=>$empresa,
        'id_camara_congelada'=>$id_camara_congelada,
        'marca'=>$marca,
        'modelo'=>$modelo,
        'ubicacion_interna'=>$ubicacion,
        'valor_seteado'=>$valor_seteado,
        'valor_maximo'=>$valor_maximo,
        'valor_minimo'=>$valor_minimo,
        'nombre_tipo_item'=> $nombre_tipo_item,
        'id_item'=>$id_item,
        'fecha_registro'=>$fecha_registro,
        'direccion'=>$direccion,
        'area_interna'=>$area_interna
        
    );
   
    $smarty->assign("array_camara_congelada",$array_camara_congelada);
    
}else{

    $array_camara_congelada[] = array(
        'nombre'=>"",
        'id_empresa'=>"",
        'empresa'=>"",
        'id_camara_congelada'=>"",
        'marca'=>"",
        'modelo'=>"",
        'ubicacion'=>"",
        'valor_seteado'=>"",
        'valor_maximo'=>"",
        'valor_minimo'=>"",
        'id_item'=>""
    );
    

    $smarty->assign("array_camara_congelada",$array_camara_congelada);
}
//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_camara_congelada);   
$conv = base64_encode($convert);
$link = 'templates/item/pdf/pdf/pdf_item.php?&data='.$conv;
//pdf item
if ($_GET['pdf'] == 1) {

	header('location: '.$link);
//ediitar item
}elseif($_GET['pdf'] == 0){
  $smarty->display("item/update_camara_congelada.tpl");  
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