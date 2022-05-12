<?php 
include('../../config.ini.php');
$id_asignado = $_GET['asignado'];

	$buscar_informacion = mysqli_prepare($connect,"SELECT b.id_item, c.presion_sala,c.especificacion_1_temp,c.especificacion_2_temp, c.especificacion_1_hum,c.especificacion_2_hum, c.lux, c.ruido_dba,c.ren_hr, c.cantidad_extracciones, c.cantidad_inyecciones
        FROM item_asignado a, item b, item_sala_limpia c  
        WHERE a.id_item = b.id_item AND b.id_item = c.id_item AND  a.id_asignado = ?");
    mysqli_stmt_bind_param($buscar_informacion, 'i', $id_asignado);
    mysqli_stmt_execute($buscar_informacion);
    mysqli_stmt_store_result($buscar_informacion);
    mysqli_stmt_bind_result($buscar_informacion, $id_item, $presion_sala, $especificacion_1_temp, $especificacion_2_temp,$especificacion_1_hum, $especificacion_2_hum, $lux, $ruido_dba,$ren_hr, $cantidad_extracciones, $cantidad_inyecciones);
    mysqli_stmt_fetch($buscar_informacion);




$smarty->assign("id_asignado_sala_limpia",$id_asignado);
$smarty->assign("presion_sala",$presion_sala);
$smarty->assign("especificacion_1_temp",$especificacion_1_temp);
$smarty->assign("especificacion_2_temp",$especificacion_2_temp);
$smarty->assign("especificacion_1_hum",$especificacion_1_hum);
$smarty->assign("especificacion_2_hum",$especificacion_2_hum);
$smarty->assign("lux",$lux);
$smarty->assign("ruido_dba",$ruido_dba);
$smarty->assign("ren_hr",$ren_hr);
$smarty->assign("cantidad_extracciones",$cantidad_extracciones);
$smarty->assign("cantidad_inyecciones",$cantidad_inyecciones);
$smarty->display("sala_limpia/datos_informe_mapeo.tpl");
?>