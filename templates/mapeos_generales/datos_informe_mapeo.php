<?php 
    $smarty->assign("hora",0);
	$smarty->assign("minuto",0);
	$smarty->assign("segundo",0);
    $id_asignado = $_GET['asignado'];
    $smarty->assign("id_asignado",$id_asignado);
    $smarty->display("mapeos_generales/datos_informe_mapeo.tpl");
?>