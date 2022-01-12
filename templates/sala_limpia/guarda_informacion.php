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
$medicion_1_p3= $_POST['medicion_1_p3'];
$medicion_2_p3= $_POST['medicion_2_p3'];
$medicion_3_p3= $_POST['medicion_3_p3'];
$medicion_4_p3= $_POST['medicion_4_p3'];


for($i=0; $i < count($id_prueba_3); $i++){

    $actualizando2 = mysqli_prepare($connect,"UPDATE salas_limpias_prueba_3 SET medicion_1= ? ,medicion_2= ? ,medicion_3= ? ,medicion_4= ? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizando2, 'ssssi', $medicion_1_p3[$i], $medicion_2_p3[$i], $medicion_3_p3[$i], $medicion_4_p3[$i], $id_prueba_3[$i]);
    mysqli_stmt_execute($actualizando2);
}

///////// TERCERA PRUEBA
$array_ids = array($_POST['id_prueba_4'], $_POST['id_prueba_5'], $_POST['id_prueba_6'], $_POST['id_prueba_7']);
$array_n1 = array($_POST['n1_p4'], $_POST['n1_p5'], $_POST['n1_p6'], $_POST['n1_p7']);
$array_n2 = array($_POST['n2_p4'], $_POST['n2_p5'], $_POST['n2_p6'], $_POST['n2_p7']);
$array_n3 = array($_POST['n3_p4'], $_POST['n3_p5'], $_POST['n3_p6'], $_POST['n3_p7']);
$array_n4 = array($_POST['n4_p4'], $_POST['n4_p5'], $_POST['n4_p6'], $_POST['n4_p7']);
$array_n5 = array($_POST['n5_p4'], $_POST['n5_p5'], $_POST['n5_p6'], $_POST['n5_p7']);
$array_promedio = array($_POST['promedio_p4'], $_POST['promedio_p5'], $_POST['promedio_p6'], $_POST['promedio_p7']);
$array_especificaciones = array($_POST['especificacion_p4'],$_POST['especificacion_p5'],$_POST['especificacion_p6'],$_POST['especificacion_p7']);
$array_cumple = array($_POST['cumple_p4'],$_POST['cumple_p5'],$_POST['cumple_p6'],$_POST['cumple_p7']);



for($i=0;$i<count($array_ids);$i++){
  
    $actualizando3 = mysqli_prepare($connect, "UPDATE salas_limpias_prueba_4 SET n1=?, n2=?, n3=?, n4=?, n5=?,promedio=?, cumple=? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizando3,'sssssssi', $array_n1[$i], $array_n2[$i], $array_n3[$i], $array_n4[$i], $array_n5[$i], $array_promedio[$i], $array_cumple[$i], $array_ids[$i]);
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

for($i=0;$i<count($id_prueba_8);$i++){
    $actualizando4 = mysqli_prepare($connect,"UPDATE salas_limpias_prueba_5 SET n1=?,n2=?,n3=?,n4=?,n5=?,n6=?,n7=?,n8=?,n9=?,n10=?,n11=?,n12=?,n13=?,n14=?,n15=? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizando4, 'sssssssssssssssi', $n1[$i], $n2[$i], $n3[$i], $n4[$i], $n5[$i], $n6[$i], $n7[$i], $n8[$i], $n9[$i], $n10[$i], $n11[$i], $n12[$i], $n13[$i], $n14[$i], $n15[$i], $id_prueba_8[$i]);
    mysqli_stmt_execute($actualizando4);
}



///QUINTO PRUEBA

$id_prueba_9 = $_POST['id_prueba_9'];
$medicion_1_p9 = $_POST['medicion_1_p9'];
$medicion_2_p9 = $_POST['medicion_2_p9'];
$medicion_3_p9 = $_POST['medicion_3_p9'];
$medicion_4_p9 = $_POST['medicion_4_p9'];

$actualizando5 = mysqli_prepare($connect,"UPDATE salas_limpias_prueba_6 SET medicion_1=?,medicion_2=?,medicion_3=?,medicion_4=? WHERE id_prueba = ?");
mysqli_stmt_bind_param($actualizando5, 'ssssi', $medicion_1_p9, $medicion_2_p9, $medicion_3_p9, $medicion_4_p9, $id_prueba_9);
mysqli_stmt_execute($actualizando5);

mysqli_close($connect);
?>