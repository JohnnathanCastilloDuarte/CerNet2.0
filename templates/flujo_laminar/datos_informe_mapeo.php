<?php 
$id_asignado = $_GET['asignado'];
$smarty->assign("id_asignado_flujo_laminar",$id_asignado);
$smarty->display("flujo_laminar/datos_informe_mapeo.tpl");
?>