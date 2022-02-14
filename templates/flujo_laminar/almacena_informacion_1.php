<?php 
include('../../config.ini.php');

///////PRUEBA 0 

if (isset($_POST['accion'])) {
    
    $id_informe = $_POST['id_informe'];
    $conclusion = $_POST['conclusion'];
    $solicitante = $_POST['solicitante'];
    $nombre_informe = $_POST['nombre_informe'];

    $actualizar0 = mysqli_prepare($connect,"UPDATE informe_flujo_laminar SET conclusion= ?, solicitante= ?, nombre_informe = ? WHERE  id_informe = ?");
    mysqli_stmt_bind_param($actualizar0, 'sssi', $conclusion, $solicitante, $nombre_informe, $id_informe);
    mysqli_stmt_execute($actualizar0);


    if(!$actualizar0){
        echo "Existe un error en la prueba 0 ".$id_informe."-".$conclusion."-".$solicitante."-".$nombre_informe;

    }else{
        'todo_ok';
    }

}else { 


/////// PRUEBA 1

$id_inspeccion = $_POST['id_inspeccion'];
$valor_inspeccion_visual1 = $_POST['valor_inspeccion_visual1'];
$valor_inspeccion_visual2 = $_POST['valor_inspeccion_visual2'];
$valor_inspeccion_visual3 = $_POST['valor_inspeccion_visual3'];
$valor_inspeccion_visual4 = $_POST['valor_inspeccion_visual4'];
$valor_inspeccion_visual5 = $_POST['valor_inspeccion_visual5'];
$valor_inspeccion_visual6 = $_POST['valor_inspeccion_visual6'];



$actualizar1 = mysqli_prepare($connect,"UPDATE flujo_laminar_inspeccion_visual SET insp_1= ? ,insp_2= ?, insp_3 = ? ,insp_4= ?, insp_5= ?, insp_6= ? WHERE  id_inspeccion = ?");
mysqli_stmt_bind_param($actualizar1, 'ssssssi', $valor_inspeccion_visual1, $valor_inspeccion_visual2, $valor_inspeccion_visual3, $valor_inspeccion_visual4, $valor_inspeccion_visual5, $valor_inspeccion_visual6, $id_inspeccion);
mysqli_stmt_execute($actualizar1);



if(!$actualizar1){
    echo "Existe un error en la prueba 1 ".mysqli_stmt_error($actualizar1);
}


////// PRUEBA 2
$id_prueba_1 = $_POST['id_prueba_1'];
$requisito_p1 = $_POST['requisito_p1'];
$valor_obtenido_p1 = $_POST['valor_obtenido_p1'];
$veredicto_p1 = $_POST['veredicto_p1'];


for($i = 0; $i < count($id_prueba_1); $i++){

    $actualizar2 = mysqli_prepare($connect,"UPDATE flujo_laminar_prueba_1 SET requisito=?, valor_obtenido=?, veredicto=?  WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizar2, 'sssi', $requisito_p1[$i], $valor_obtenido_p1[$i], $veredicto_p1[$i], $id_prueba_1[$i]);
    mysqli_stmt_execute($actualizar2);

    if(!$actualizar2){
        echo "Error al actualizar prueba 2 ".mysqli_stmt_error($actualizar2);
    }
}

/////// PRUEBA 3
$id_prueba_2 = $_POST['id_prueba_2'];
$cumplimiento_filtro_a = $_POST['cumplimiento_filtro_a'];
$cumplimiento_filtro_aa = $_POST['cumplimiento_filtro_aa'];
$cumplimiento_filtro_b = $_POST['cumplimiento_filtro_b'];
$cumplimiento_filtro_bb = $_POST['cumplimiento_filtro_bb'];
$cumplimiento_filtro_c =  $_POST['cumplimiento_filtro_c'];
$cumplimiento_filtro_cc = $_POST['cumplimiento_filtro_cc'];
$cumplimiento_filtro_d = $_POST['cumplimiento_filtro_d'];
$cumplimiento_filtro_dd = $_POST['cumplimiento_filtro_dd'];


for($i = 0; $i < count($id_prueba_2); $i++){


 
    $actualizar3 = mysqli_prepare($connect,"UPDATE flujo_laminar_prueba_2 SET zonaA=?, zonaAA=?, zonaB=?, zonaBB=?, zonaC=?, zonaCC=?, zonaD=?, zonaDD = ? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizar3, 'ssssssssi', $cumplimiento_filtro_a[$i], $cumplimiento_filtro_aa[$i], $cumplimiento_filtro_b[$i], $cumplimiento_filtro_bb[$i], $cumplimiento_filtro_c[$i], $cumplimiento_filtro_cc[$i], $cumplimiento_filtro_d[$i], $cumplimiento_filtro_dd[$i], $id_prueba_2[$i]);
    mysqli_stmt_execute($actualizar3);
    
    if(!$actualizar3){
        echo "Existe un error en la prueba 3 ".mysqli_stmt_error($actualizar3);
    }
}




$id_prueba_3 = $_POST['id_prueba_3'];
$medicion1_p3 = $_POST['medicion1_p3'];
$medicion2_p3 = $_POST['medicion2_p3'];
$medicion3_p3 = $_POST['medicion3_p3'];
$medicion4_p3 = $_POST['medicion4_p3'];
$medicion5_p3 = $_POST['medicion5_p3'];
$medicion6_p3 = $_POST['medicion6_p3'];

for($i = 0; $i < count($id_prueba_3); $i++){

    $actualizar4 = mysqli_prepare($connect,"UPDATE flujo_laminar_prueba_3 SET medicion_1= ? ,medicion_2= ? ,medicion_3= ? ,medicion_4= ? ,medicion_5= ? ,medicion_6= ?  WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizar4, 'ssssssi', $medicion1_p3[$i], $medicion2_p3[$i], $medicion3_p3[$i], $medicion4_p3[$i], $medicion5_p3[$i], $medicion6_p3[$i], $id_prueba_3[$i]);
    mysqli_stmt_execute($actualizar4);

    if(!$actualizar4){
        echo "Error al actualizar prueba 4 ".mysqli_stmt_error($actualizar4);
    }

}



///////////7 PRUEBA 4

$id_prueba_4 = $_POST['id_prueba_4'];
$punto_1_p4 = $_POST['punto_1_p4'];
$punto_2_p4 = $_POST['punto_2_p4'];
$punto_3_p4 = $_POST['punto_3_p4'];
$promedio_p4 = $_POST['promedio_p4'];

for($i = 0; $i < count($id_prueba_4); $i++){

    $actualizar5 = mysqli_prepare($connect,"UPDATE flujo_laminar_prueba_4 SET punto_1= ? ,punto_2= ? ,punto_3= ? ,promedio= ? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizar5, 'ssssi', $punto_1_p4[$i], $punto_2_p4[$i], $punto_3_p4[$i], $promedio_p4[$i], $id_prueba_4[$i]);
    mysqli_stmt_execute($actualizar5);

    if(!$actualizar5){
        echo "Existe un error actualizando la prueba 4 ".mysqli_stmt_error($actualizar5);
    }
}



////// PRUEBA 5
$id_prueba_5 = $_POST['id_prueba_5'];
$id_prueba_P5 = $_POST['id_prueba_P5'];
$resultado_P5 = $_POST['resultado_P5'];
$cumple_P5 = $_POST['cumple_P5'];
$cumple_P5a = $_POST['cumple_P5a'];


//$totalFilas = count($id_prueba_5) + count($id_prueba_P5);



for($i = 0; $i < count($id_prueba_5); $i++){

    
    $actualizar6 = mysqli_prepare($connect,"UPDATE flujo_laminar_prueba_5 SET resultado= ?, cumple= ? WHERE  id_prueba = ?");
    mysqli_stmt_bind_param($actualizar6, 'ssi', $resultado_P5[$i], $cumple_P5[$i], $id_prueba_5[$i]);
    mysqli_stmt_execute($actualizar6);
    
    if(!$actualizar6){
        echo "Existe un error actualizando prueba 5 ".mysqli_stmt_error($actualizar6);
    }

   
}

for($i = 0; $i < count($id_prueba_P5); $i++){

     
    $actualizar66 = mysqli_prepare($connect,"UPDATE flujo_laminar_prueba_5 SET  cumple= ? WHERE  id_prueba = ?");
    mysqli_stmt_bind_param($actualizar66, 'si', $cumple_P5a[$i], $id_prueba_P5[$i]);
    mysqli_stmt_execute($actualizar66);
    
    if(!$actualizar66){
        echo "Existe un error actualizando prueba 5 ".mysqli_stmt_error($actualizar6);
    }

    
    //echo $i."-UPDATE flujo_laminar_prueba_5 SET  cumple= $cumple_P5[$i] WHERE  id_prueba = $id_prueba_P5[$i]/";
}



$id_prueba_p6 = $_POST['id_prueba_p6'];
$punto_1_p6 = $_POST['punto_1_p6'];
$punto_2_p6 = $_POST['punto_2_p6'];
$punto_3_p6 = $_POST['punto_3_p6'];
$punto_4_p6 = $_POST['punto_4_p6'];
$punto_5_p6 = $_POST['punto_5_p6'];
$promedio_p6 = $_POST['promedio_p6'];


$actualizar7 = mysqli_prepare($connect,"UPDATE flujo_laminar_prueba_6 SET punto_1= ?,punto_2= ?,punto_3= ?,punto_4= ?,punto_5= ?,promedio= ? WHERE id_prueba = ?");
mysqli_stmt_bind_param($actualizar7, 'ssssssi', $punto_1_p6, $punto_2_p6, $punto_3_p6, $punto_4_p6, $punto_5_p6, $promedio_p6, $id_prueba_p6);
mysqli_stmt_execute($actualizar7);

if(!$actualizar7){
    echo "Existe un error actaliznado prueba 7 ".mysqli_stmt_error($actualizar7);
}


}
?>