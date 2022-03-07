<?php 
$id_asignado = $_GET['asignado'];
echo "<input type='hidden' id='id_asignado_calificacion' value='$id_asignado'>";
$smarty->assign("id_asignado_calificacion",$id_asignado);
$smarty->display("Calificacion/datos_calificacion.tpl");
?>