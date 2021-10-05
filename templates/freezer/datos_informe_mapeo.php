<?php 
			
	$id_asignado = $_GET['asignado'];
	$smarty->assign("id_asignado",$id_asignado);

	$smarty->assign("hora",0);
	$smarty->assign("minuto",0);
	$smarty->assign("segundo",0);
	$smarty->display("freezer/datos_informe_mapeo.tpl");

?>