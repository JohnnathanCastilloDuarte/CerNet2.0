<?php 
//consultar modulos
$trae_modulos = "SELECT id_modulo, nombre FROM modulo ORDER BY nombre ASC";
$valida_modulos = mysqli_prepare($connect,$trae_modulos);
mysqli_stmt_execute($valida_modulos);
mysqli_stmt_store_result($valida_modulos);
mysqli_stmt_bind_result($valida_modulos, $id_modulo,$nombre_modulo);

$array_modulo=array();
while($row = mysqli_stmt_fetch($valida_modulos)){
  $array_modulo[]=array("id_modulo"=> $id_modulo,"nombre"=> $nombre_modulo);

}
$smarty->assign("array_modulo",$array_modulo);

$smarty->assign("tipo_cambio",array("Desarrollar","Modificar","Corregir","Eliminar"));

$smarty->display("control_cambio/nuevo_control.tpl");
?>