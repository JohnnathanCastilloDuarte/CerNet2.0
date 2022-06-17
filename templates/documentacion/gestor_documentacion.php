<?php 
$clave = $_GET['clave'];

$smarty->assign("id_documentacion_d",$clave);
$smarty->display("documentacion/gestor_documentacion.tpl");

?>