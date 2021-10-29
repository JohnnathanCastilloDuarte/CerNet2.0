<?php 
$id_asignado = $_GET['asignado'];
$smarty->assign("id_asignado_filtro",$id_asignado);
$smarty->display("campana_extraccion/datos_informe_mapeo.tpl");
?>