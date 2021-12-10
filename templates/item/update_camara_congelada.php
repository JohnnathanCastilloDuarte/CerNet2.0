<?php 
include("../../config.ini.php");


if(isset($_GET['item'])){
   
    $id_item = $_GET['item'];
    $smarty->assign("id_item",$id_item);

	//consultar item
	$execute = mysqli_prepare($connect,"SELECT a.nombre, a.id_empresa, b.nombre, c.id_item_camara_congelada, c.marca, c.modelo, c.ubicacion, c.valor_seteado, c.valor_maximo, c.valor_minimo FROM item as a, empresa as b, item_camara_congelada as c   WHERE a.id_empresa = b.id_empresa AND a.id_item = c.id_item AND c.id_item = ?");
	mysqli_stmt_bind_param($execute, 'i', $id_item);
	mysqli_stmt_execute($execute);
	mysqli_stmt_store_result($execute);
	mysqli_stmt_bind_result($execute, $nombre, $id_empresa, $empresa, $id_camara_congelada, $marca, $modelo, $ubicacion, $valor_seteado, $valor_maximo, $valor_minimo);
	mysqli_stmt_fetch($execute);

    $array_camara_congelada[] = array(
        'nombre'=>$nombre,
        'id_empresa'=>$id_empresa,
        'empresa'=>$empresa,
        'id_camara_congelada'=>$id_camara_congelada,
        'marca'=>$marca,
        'modelo'=>$modelo,
        'ubicacion'=>$ubicacion,
        'valor_seteado'=>$valor_seteado,
        'valor_maximo'=>$valor_maximo,
        'valor_minimo'=>$valor_minimo,
        'id_item'=>$id_item
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



$smarty->display("item/update_camara_congelada.tpl");  
?>