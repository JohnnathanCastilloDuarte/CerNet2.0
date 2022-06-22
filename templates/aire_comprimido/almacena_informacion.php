<?php 
include('../../config.ini.php');

$id_asignado = $_POST['id_asignado_aire'];

//Info 1 
$nombre_informe = $_POST['nombre_informe'];
$solicitante = $_POST['solicitante'];
$atencion = $_POST['atencion'];
$n_acta_inspecion = $_POST['n_acta_inspecion'];
$conclusion = $_POST['conclusion'];
$responsable = $_POST['responsable'];

//INFO 2
$id_insp = $_POST['id_inspeccion_visual'];
$insp1 = $_POST['insp1'];
$insp2 = $_POST['insp2'];
$insp3 = $_POST['insp3'];
$insp4 = $_POST['insp4'];
$insp5 = $_POST['insp5'];

//INFO 3
$prueba1   = $_POST['id_item_aire_1'];
$prueba1_1 = $_POST['conteo_particulas_1'];
$prueba1_2 = $_POST['punto_rocio_1'];
$prueba1_3 = $_POST['temperatura_1'];
$prueba1_4 = $_POST['humedad_relativa_1'];
$prueba1_5 = $_POST['presencia_aceite_1'];
$prueba1_6 = $_POST['presencia_agua_1'];
$prueba1_7 = $_POST['clase_iso_1'];

//INFO 4


//actuializar_info 1
 $actualizar_1 = mysqli_prepare($connect,"UPDATE aire_comprimido_informe 
 				 SET nombre_informe = ?, solicitante = ?, usuario_responsable = ?, atencion_a = ?, n_actas = ?, conclusion = ? 
 				 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($actualizar_1, 'ssssssi', $nombre_informe, $solicitante, $responsable, $atencion, $n_acta_inspecion, $conclusion, $id_asignado);
    mysqli_stmt_execute($actualizar_1);

  if ($actualizar_1) {
    	//echo "SI-info1";
    }else{
    	//echo "No-info1";
    }  

//Actualizar informacion 2
$actualizar_2 = mysqli_prepare($connect,"UPDATE aire_comprimido_inspeccion 
 				 SET insp_1 = ?, insp_2 = ?, insp_3 = ?, insp_4 = ?, insp_5 = ?
 				 WHERE id_asignado = ? AND id = ?");
    mysqli_stmt_bind_param($actualizar_2, 'sssssii', $insp1, $insp2, $insp3, $insp4, $insp5, $id_asignado, $id_insp);
    mysqli_stmt_execute($actualizar_2);

  if ($actualizar_1) {
    	//echo "SI-info2";
    }else{
    	//echo "No-info2";
    }  

//Actualizar informacion 3
 for ($i=0; $i < count($prueba1); $i++) { 
 		
 $actualizar_3 = mysqli_prepare($connect,"UPDATE aire_comprimido_prueba_1 
 				 SET conteo_particulas = ?, punto_rocio = ?, temperatura = ?, humedad_relativa = ?, presencia_aceite = ?, presencia_agua = ?, cumple_clases = ?
 				 WHERE id_asignado = ? AND id = ?");
    mysqli_stmt_bind_param($actualizar_3, 'sssssssii', $prueba1_1[$i], $prueba1_2[$i], $prueba1_3[$i], $prueba1_4[$i], $prueba1_5[$i], $prueba1_6[$i], $prueba1_7[$i], $id_asignado, $prueba1[$i]);
    mysqli_stmt_execute($actualizar_3);  

    if ($actualizar_3) {
    	echo "SI-info2";
    }else{
        echo "UPDATE aire_comprimido_prueba_1 SET conteo_particulas = $prueba1_1[$i], punto_rocio = $prueba1_2[$i], temperatura = $prueba1_3[$i], humedad_relativa = $prueba1_4[$i], presencia_aceite = $prueba1_5[$i], presencia_agua = $prueba1_6[$i], cumple_clases = $prueba1_7[$i] WHERE id_asignado = $id_asignado AND id = $prueba1[$i] \n";
    }  
  }  




//echo $_POST;



//Actualizar info2
/*   echo "-".$_POST['nombre_informe'];

 }*/

?>