<?php 
include('../../config.ini.php');


////////// PRIMER PRUEBA

$id_prueba_1 = $_POST['id_prueba_1'];
$media_promedios_p1 = $_POST['media_promedios_p1'];
$desviacion_estandar_p1 = $_POST['desviacion_estandar_p1'];
$maximo_p1 = $_POST['maximo_p1'];
$cumple_p1 = $_POST['cumple_p1'];
$promedios_p1 = $_POST['promedios_p1'];
$contador = 0;

 
for($i = 0; $i < count($id_prueba_1); $i++){
    
    if($i > 1){
        
        $actualizando1 = mysqli_prepare($connect,"UPDATE salas_limpias_prueba_1 SET medida_promedio= ?,desviacion_estandar= ?, maximo= ?, promedios= ?,cumple= ? WHERE id_prueba = ?");
        mysqli_stmt_bind_param($actualizando1, 'sssssi', $media_promedios_p1[$i], $desviacion_estandar_p1[$i], $maximo_p1[$i], $promedios_p1[$contador], $cumple_p1[$i], $id_prueba_1[$i]);
        mysqli_stmt_execute($actualizando1);
        $contador++;
    }else{
        
        $actualizando1 = mysqli_prepare($connect,"UPDATE salas_limpias_prueba_1 SET medida_promedio= ?,desviacion_estandar= ?, maximo= ?, cumple= ? WHERE id_prueba = ?");
        mysqli_stmt_bind_param($actualizando1, 'ssssi', $media_promedios_p1[$i], $desviacion_estandar_p1[$i], $maximo_p1[$i], $cumple_p1[$i], $id_prueba_1[$i]);
        mysqli_stmt_execute($actualizando1);
    }
    
}

///////// SEGUNDA PRUEBA
$id_prueba_3 = $_POST['id_prueba_3'];
$medicion_1_p3= $_POST['campo_1'];
$medicion_2_p3= $_POST['campo_2'];
$medicion_3_p3= $_POST['campo_3'];
$medicion_4_p3= $_POST['campo_4'];
$medicion_5_p3= $_POST['campo_5'];
$medicion_6_p3= $_POST['campo_6'];


for($i=0; $i < count($id_prueba_3); $i++){

    if ($medicion_3_p3[$i] >= $medicion_4_p3[$i]) {
        $medicion_3_4 = 'CUMPLE';
    }else{
        $medicion_3_4 = 'NO CUMPLE';
    }

    $actualizando2 = mysqli_prepare($connect,"UPDATE datos_de_prueba_3 SET campo_1= ? ,campo_2= ? ,campo_3= ? ,campo_4= ?, campo_5= ?, campo_6= ? WHERE id = ?");
    mysqli_stmt_bind_param($actualizando2, 'ssssssi', $medicion_1_p3[$i], $medicion_2_p3[$i], $medicion_3_p3[$i], $medicion_4_p3[$i], $medicion_5_p3[$i], $medicion_3_4, $id_prueba_3[$i]);
    mysqli_stmt_execute($actualizando2);
}

///////// TERCERA PRUEBA
$array_ids = array($_POST['id_prueba_4'], $_POST['id_prueba_5'], $_POST['id_prueba_6']);
$array_n1 = array($_POST['n1_p4'], $_POST['n1_p5'], $_POST['n1_p6']);
$array_n2 = array($_POST['n2_p4'], $_POST['n2_p5'], $_POST['n2_p6']);
$array_n3 = array($_POST['n3_p4'], $_POST['n3_p5'], $_POST['n3_p6']);
$array_n4 = array($_POST['n4_p4'], $_POST['n4_p5'], $_POST['n4_p6']);
$array_n5 = array($_POST['n5_p4'], $_POST['n5_p5'], $_POST['n5_p6']);
$array_promedio = array($_POST['promedio_p4'], $_POST['promedio_p5'], $_POST['promedio_p6']);
$array_especificaciones = array($_POST['especificacion_p4'],$_POST['especificacion_p5'],$_POST['especificacion_p6']);
$array_cumple = array($_POST['cumple_p4'],$_POST['cumple_p5'],$_POST['cumple_p6']);


$array_ids_7 = ($_POST['id_prueba_7']);
$array_n1_7 = ($_POST['n1_p7']);
$array_n2_7 = ($_POST['n2_p7']);
$array_n3_7 = ($_POST['n3_p7']);
$array_n4_7 = ($_POST['n4_p7']);
$array_n5_7 = ($_POST['n5_p7']);
$array_promedio_7 = ($_POST['promedio_p7']);
$array_especificaciones_7 = ($_POST['especificacion_p7']);
$array_cumple_7 = ($_POST['cumple_p7']);



for($i=0;$i<count($array_ids);$i++){
  
    $actualizando3 = mysqli_prepare($connect, "UPDATE salas_limpias_prueba_4 SET n1=?, n2=?, n3=?, n4=?, n5=?,promedio=?, cumple=? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizando3,'sssssssi', $array_n1[$i], $array_n2[$i], $array_n3[$i], $array_n4[$i], $array_n5[$i], $array_promedio[$i], $array_cumple[$i], $array_ids[$i]);
    mysqli_stmt_execute($actualizando3);
    echo mysqli_stmt_error($actualizando3);
}


for ($i=0; $i < count($_POST['id_prueba_7']) ; $i++) { 
     $actualizando3 = mysqli_prepare($connect, "UPDATE salas_limpias_prueba_4 SET n1=?, n2=?, n3=?, n4=?, n5=?,promedio=?, cumple=? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizando3,'sssssssi', $array_n1_7[$i], $array_n2_7[$i], $array_n3_7[$i], $array_n4_7[$i], $array_n5_7[$i], $array_promedio_7[$i], $array_cumple_7[$i], $array_ids_7[$i]);
    mysqli_stmt_execute($actualizando3);
    echo mysqli_stmt_error($actualizando3);


}

///////// CUARTO PRUEBA
$id_prueba_8 = $_POST['id_prueba_8'];
$n1 = $_POST['n1'];
$n2 = $_POST['n2'];
$n3 = $_POST['n3'];
$n4 = $_POST['n4'];
$n5 = $_POST['n5'];
$n6 = $_POST['n6'];
$n7 = $_POST['n7'];
$n8 = $_POST['n8'];
$n9 = $_POST['n9'];
$n10 = $_POST['n10'];
$n11 = $_POST['n11'];
$n12 = $_POST['n12'];
$n13 = $_POST['n13'];
$n14 = $_POST['n14'];
$n15 = $_POST['n15'];

//GG ES EL PROMEDIO DE LAS ENTRADAS

$gg11 = round((($n1[0] + $n1[1] + $n1[2])/3),1);
$gg12 = round((($n1[4] + $n1[5] + $n1[6])/3),1);
$gg21 = round((($n2[0] + $n2[1] + $n2[2])/3),1);
$gg22 = round((($n2[4] + $n2[5] + $n2[6])/3),1);
$gg31 = round((($n3[0] + $n3[1] + $n3[2])/3),1);
$gg32 = round((($n3[4] + $n3[5] + $n3[6])/3),1);
$gg41 = round((($n4[0] + $n4[1] + $n4[2])/3),1);
$gg42 = round((($n4[4] + $n4[5] + $n4[6])/3),1);
$gg51 = round((($n5[0] + $n5[1] + $n5[2])/3),1);
$gg52 = round((($n5[4] + $n5[5] + $n5[6])/3),1);
$gg61 = round((($n6[0] + $n6[1] + $n6[2])/3),1);
$gg62 = round((($n6[4] + $n6[5] + $n6[6])/3),1);
$gg71 = round((($n7[0] + $n7[1] + $n7[2])/3),1);
$gg72 = round((($n7[4] + $n7[5] + $n7[6])/3),1);
$gg81 = round((($n8[0] + $n8[1] + $n8[2])/3),1);
$gg82 = round((($n8[4] + $n8[5] + $n8[6])/3),1);
$gg91 = round((($n9[0] + $n9[1] + $n9[2])/3),1);
$gg92 = round((($n9[4] + $n9[5] + $n9[6])/3),1);
$gg101 = round((($n10[0] + $n10[1] + $n10[2])/3),1);
$gg102 = round((($n10[4] + $n10[5] + $n10[6])/3),1);
$gg111 = round((($n11[0] + $n11[1] + $n11[2])/3),1);
$gg112 = round((($n11[4] + $n11[5] + $n11[6])/3),1);
$gg121 = round((($n12[0] + $n12[1] + $n12[2])/3),1);
$gg122 = round((($n12[4] + $n12[5] + $n12[6])/3),1);
$gg131 = round((($n13[0] + $n13[1] + $n13[2])/3),1);
$gg132 = round((($n13[4] + $n13[5] + $n13[6])/3),1);
$gg141 = round((($n14[0] + $n14[1] + $n14[2])/3),1);
$gg142 = round((($n14[4] + $n14[5] + $n14[6])/3),1);
$gg151 = round((($n15[0] + $n15[1] + $n15[2])/3),1);
$gg152 = round((($n15[4] + $n15[5] + $n15[6])/3),1);


print_r($id_prueba_8);
echo $gg1;

for($i=0;$i<count($id_prueba_8);$i++){
    $actualizando4 = mysqli_prepare($connect,"UPDATE salas_limpias_prueba_5 SET n1=?,n2=?,n3=?,n4=?,n5=?,n6=?,n7=?,n8=?,n9=?,n10=?,n11=?,n12=?,n13=?,n14=?,n15=? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizando4, 'sssssssssssssssi', $n1[$i], $n2[$i], $n3[$i], $n4[$i], $n5[$i], $n6[$i], $n7[$i], $n8[$i], $n9[$i], $n10[$i], $n11[$i], $n12[$i], $n13[$i], $n14[$i], $n15[$i], $id_prueba_8[$i]);
    mysqli_stmt_execute($actualizando4);

    if($i == 3) {
       $actualizando4 = mysqli_prepare($connect,"UPDATE salas_limpias_prueba_5 SET n1=?,n2=?,n3=?,n4=?,n5=?,n6=?,n7=?,n8=?,n9=?,n10=?,n11=?,n12=?,n13=?,n14=?,n15=? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizando4, 'sssssssssssssssi', $gg11, $gg21, $gg31, $gg41, $gg51, $gg61, $gg71, $gg81, $gg91, $gg101, $gg111, $gg121, $gg131, $gg141, $gg151, $id_prueba_8[$i]);
    mysqli_stmt_execute($actualizando4);
    }
    if ($i == 7) {
        $actualizando4 = mysqli_prepare($connect,"UPDATE salas_limpias_prueba_5 SET n1=?,n2=?,n3=?,n4=?,n5=?,n6=?,n7=?,n8=?,n9=?,n10=?,n11=?,n12=?,n13=?,n14=?,n15=? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizando4, 'sssssssssssssssi', $gg12, $gg22, $gg32, $gg42, $gg52, $gg62, $gg72, $gg82, $gg92, $gg102, $gg112, $gg122, $gg132, $gg142, $gg152, $id_prueba_8[$i]);
    mysqli_stmt_execute($actualizando4);
    }
}


///QUINTO PRUEBA

$id_prueba_9 = $_POST['id_prueba_9'];
$medicion_1_p9 = $_POST['medicion_1_p9'];
$medicion_2_p9 = $_POST['medicion_2_p9'];
$medicion_3_p9 = $_POST['medicion_3_p9'];
$medicion_4_p9 = $_POST['medicion_4_p9'];

//echo "hola".count($id_prueba_9);

for ($i=0; $i < count($id_prueba_9); $i++) { 

    $actualizando5 = mysqli_prepare($connect,"UPDATE salas_limpias_prueba_6 SET medicion_1=?,medicion_2=?,medicion_3=?,medicion_4=? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizando5, 'ssssi', $medicion_1_p9[$i], $medicion_2_p9[$i], $medicion_3_p9[$i], $medicion_4_p9[$i], $id_prueba_9[$i]);
    mysqli_stmt_execute($actualizando5);
    
    //echo "hola".$id_prueba_9[$i];
}




/////// GUARDA ENSAYOS

$id_ensayo_p11 = $_POST["id_ensayo_p11"];
$ensayo_p11 = $_POST["ensayo_p11"];
$ensayo_p12 = $_POST["ensayo_p12"];
$ensayo_p13 = $_POST["ensayo_p13"];
$ensayo_p14 = $_POST["ensayo_p14"];
$ensayo_p15 = $_POST["ensayo_p15"];



$actualizando6 = mysqli_prepare($connect, "UPDATE salas_limpias_metodo_1 SET metodo_ensayo= ? ,puntos_x_medicion= ? ,muestra_x_punto= ? ,volumen_muestra= ? ,altura_muestra= ? WHERE id_ensayo = ?");
mysqli_stmt_bind_param($actualizando6, 'sssssi', $ensayo_p11, $ensayo_p12, $ensayo_p13, $ensayo_p14, $ensayo_p15, $id_ensayo_p11);
mysqli_stmt_execute($actualizando6);

//echo mysqli_stmt_error($actualizando6);



$id_ensayo_p21 = $_POST["id_ensayo_p21"];
$ensayo_p21 = $_POST["ensayo_p21"];
$ensayo_p22 = $_POST["ensayo_p22"];

$actualizando7 = mysqli_prepare($connect,"UPDATE salas_limpias_metodo_2 SET metodo_ensayo= ?,especificacion= ? WHERE id_ensayo = ?");
mysqli_stmt_bind_param($actualizando7, 'ssi', $ensayo_p21, $ensayo_p22, $id_ensayo_p21);
mysqli_stmt_execute($actualizando7);



$id_ensayo_p31 = $_POST["id_ensayo_p31"];
$ensayo_p31 = $_POST["ensayo_p31"];
$ensayo_p33 = $_POST["ensayo_p33"];

$actualizando8 = mysqli_prepare($connect,"UPDATE salas_limpias_metodo_4 SET metodo_ensayo= ?,altura_muestra= ? WHERE id_ensayo = ?");
mysqli_stmt_bind_param($actualizando8, 'ssi', $ensayo_p31, $ensayo_p33, $id_ensayo_p31);
mysqli_stmt_execute($actualizando8);

//echo mysqli_stmt_error($actualizando8);


$id_ensayo_p41 = $_POST["id_ensayo_p41"];
$ensayo_p41 = $_POST["ensayo_p41"];
$ensayo_p42 = 5;
$ensayo_p43 = $_POST["ensayo_p43"];

$actualizando9 = mysqli_prepare($connect,"UPDATE salas_limpias_metodo_4 SET metodo_ensayo= ?,n_muestras= ?,altura_muestra= ? WHERE id_ensayo = ?");
mysqli_stmt_bind_param($actualizando9, 'sssi', $ensayo_p41, $ensayo_p42, $ensayo_p43, $id_ensayo_p41);
mysqli_stmt_execute($actualizando9);

//echo mysqli_stmt_error($actualizando9);




$id_ensayo_p51 = $_POST["id_ensayo_p51"];
$ensayo_p51 = $_POST["ensayo_p51"];
$ensayo_p52 = $_POST["ensayo_p52"];
$ensayo_p53 = $_POST["ensayo_p53"];

$actualizando10 = mysqli_prepare($connect,"UPDATE salas_limpias_metodo_5 SET metodo_ensayo= ?,n_rejillas= ?,n_extractores= ? WHERE id_ensayo = ?");
mysqli_stmt_bind_param($actualizando10, 'sssi', $ensayo_p51, $ensayo_p52, $ensayo_p53, $id_ensayo_p51);
mysqli_stmt_execute($actualizando10);



$id_informe = $_POST['id_informe'];
$conclusion_informe = $_POST['conclusion_informe'];
$solicitante = $_POST['solicitante'];
$responsable = $_POST['responsable'];
$nombre_informe = $_POST['nombre_informe'];
$fecha_medicion = $_POST['fecha_medicion'];

$actualizando10 = mysqli_prepare($connect,"UPDATE salas_limpias_informe SET nombre_informe= ?, solicita= ?,conclusion= ?, usuario_responsable = ?, fecha_medicion = ? WHERE id_informe = ?");
mysqli_stmt_bind_param($actualizando10, 'sssssi', $nombre_informe, $solicitante, $conclusion_informe, $responsable, $fecha_medicion, $id_informe);

mysqli_stmt_execute($actualizando10);
mysqli_close($connect);
?>