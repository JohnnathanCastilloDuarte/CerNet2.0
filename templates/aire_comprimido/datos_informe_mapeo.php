<?php 
$id_asignado = $_GET['asignado'];
$smarty->assign("id_asignado_aire",$id_asignado);
$smarty->display("aire_comprimido/datos_informe_mapeo.tpl");
?>