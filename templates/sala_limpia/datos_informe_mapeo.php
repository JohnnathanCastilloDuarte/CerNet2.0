<?php 
$id_asignado = $_GET['asignado'];
$smarty->assign("id_asignado_sala_limpia",$id_asignado);
$smarty->display("sala_limpia/datos_informe_mapeo.tpl");
?>