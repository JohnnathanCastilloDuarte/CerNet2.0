<?php 

$id_informe_get = $_GET['id_informe'];
$id_informe_limpio = substr($id_informe_get, 37, 100);

echo "<input type='hidden' id='id_informe_calificacion' value='$id_informe_limpio'>";
$smarty->display("Calificacion/URS/index.tpl");

?>