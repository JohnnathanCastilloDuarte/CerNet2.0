<?php 
include('../../config.ini.php');

$prueba_3_id = $_POST['prueba_3_id'];
$prueba_3_medicion_1 = $_POST['prueba_3_medicion_1'];
$prueba_3_medicion_2 = $_POST['prueba_3_medicion_2'];
$prueba_3_medicion_3 = $_POST['prueba_3_medicion_3'];
$prueba_3_medicion_4 = $_POST['prueba_3_medicion_4'];
$prueba_3_medicion_5 = $_POST['prueba_3_medicion_5'];
$prueba_3_medicion_6 = $_POST['prueba_3_medicion_6'];


$prueba_4_id = $_POST['prueba_4_id'];
$prueba_4_medicion_1 = $_POST['prueba_4_medicion_1'];
$prueba_4_medicion_2 = $_POST['prueba_4_medicion_2'];
$prueba_4_medicion_3 = $_POST['prueba_4_medicion_3'];
$prueba_4_medicion_4 = $_POST['prueba_4_medicion_4'];


$prueba_51_id = $_POST['prueba_51_id'];
$prueba_51_medicion_1 = $_POST['prueba_51_medicion_1'];
$prueba_51_medicion_2 = $_POST['prueba_51_medicion_2'];
$prueba_51_medicion_3 = $_POST['prueba_51_medicion_3'];
$prueba_51_medicion_4 = $_POST['prueba_51_medicion_4'];

$prueba_52_id = $_POST['prueba_52_id'];
$prueba_52_medicion_1 = $_POST['prueba_52_medicion_1'];
$prueba_52_medicion_2 = $_POST['prueba_52_medicion_2'];
$prueba_52_medicion_3 = $_POST['prueba_52_medicion_3'];
$prueba_51_medicion_4 = $_POST['prueba_51_medicion_4'];

$prueba_53_id = $_POST['prueba_53_id'];
$prueba_53_medicion_1 = $_POST['prueba_53_medicion_1'];
$prueba_53_medicion_2 = $_POST['prueba_53_medicion_2'];
$prueba_53_medicion_3 = $_POST['prueba_53_medicion_3'];
$prueba_53_medicion_4 = $_POST['prueba_53_medicion_4'];


$id_prueba_5 = $_POST['id_prueba_5'];
$resultado_prueba_5 = $_POST['resultado_prueba_5'];
$cumple_prueba_5 = $_POST['cumple_prueba_5'];









$si = 0;

for($i = 0; $i < count($prueba_3_id); $i++){

    $actualizar_1 = mysqli_prepare($connect,"UPDATE campana_extraccion_prueba_2 SET medicion_1 = ?, medicion_2 = ?, medicion_3 = ?, medicion_4 = ?, medicion_5 = ?, medicion_6 = ? WHERE id_prueba = ?");
    mysqli_stmt_bind_param($actualizar_1, 'ssssssi', $prueba_3_medicion_1[$i], $prueba_3_medicion_2[$i], $prueba_3_medicion_3[$i], $prueba_3_medicion_4[$i], $prueba_3_medicion_5[$i], $prueba_3_medicion_6[$i], $prueba_3_id[$i]);
    mysqli_stmt_execute($actualizar_1);

    if($actualizar_1){
        $si++;
    }
}

if($si == count($prueba_3_id)){
    $si = 0;

    for($i = 0; $i < count($prueba_4_id); $i++){

    
        $actualizar_2 = mysqli_prepare($connect,"UPDATE campana_extraccion_prueba_3 SET medicion_1 = ?, medicion_2 = ?, medicion_3 = ?, medicion_4 = ? WHERE id_prueba = ?");
        mysqli_stmt_bind_param($actualizar_2, 'ssssi', $prueba_4_medicion_1[$i], $prueba_4_medicion_2[$i], $prueba_4_medicion_3[$i], $prueba_4_medicion_4[$i], $prueba_4_id[$i]);
        mysqli_stmt_execute($actualizar_2);

        if($actualizar_2){
            $si++;
        }

    }    

    if($i == count($prueba_4_id)){
        $si = 0;
        for($i = 0; $i < count($prueba_51_id); $i++){

            $actualizar_3 = mysqli_prepare($connect,"UPDATE campana_extraccion_prueba_4 SET punto_1 = ?, punto_2 = ?, punto_3 = ?, punto_promedio = ? WHERE id_prueba = ?");
            mysqli_stmt_bind_param($actualizar_3, 'ssssi', $prueba_51_medicion_1[$i], $prueba_51_medicion_2[$i], $prueba_51_medicion_3[$i], $prueba_51_medicion_4[$i], $prueba_51_id[$i]);
            mysqli_stmt_execute($actualizar_3);         

        
            if($actualizar_3){
                $si++;
            }
        }

        if($si == count($prueba_51_id)){

            $si = 0;

            for($i = 0; $i < count($prueba_52_id);$i++){

                $actualizar_4 = mysqli_prepare($connect,"UPDATE campana_extraccion_prueba_4 SET punto_1 = ?, punto_2 = ?, punto_3 = ?, punto_promedio = ? WHERE id_prueba = ?");
                mysqli_stmt_bind_param($actualizar_4, 'ssssi', $prueba_52_medicion_1[$i], $prueba_52_medicion_2[$i], $prueba_52_medicion_3[$i], $prueba_52_medicion_4[$i], $prueba_52_id[$i]);
                mysqli_stmt_execute($actualizar_4);

                if($actualizar_4){
                    $si++;
                }
            }


            if($si == count($prueba_52_id)){
                $si = 0;

                for($i = 0; $i < count($prueba_53_id); $i++){

                    $actualizar_5 = mysqli_prepare($connect,"UPDATE campana_extraccion_prueba_4 SET punto_1 = ?, punto_2 = ?, punto_3 = ?, punto_promedio = ? WHERE id_prueba = ?");
                    mysqli_stmt_bind_param($actualizar_5, 'ssssi', $prueba_53_medicion_1[$i], $prueba_53_medicion_2[$i], $prueba_53_medicion_3[$i], $prueba_53_medicion_4[$i], $prueba_53_id[$i]);
                    mysqli_stmt_execute($actualizar_5);

                    if($actualizar_5){
                        $si++;
                    }
                }
                if($si == count($prueba_53_id)){

                    $si = 0;
                 
                    for($i=0; $i < count($id_prueba_5);$i++){

                        $actualizar_6 = mysqli_prepare($connect,"UPDATE campana_extraccion_prueba_5 SET resultado = ?, cumple = ? WHERE id_prueba = ?");
                        mysqli_stmt_bind_param($actualizar_6, 'ssi', $resultado_prueba_5[$i], $cumple_prueba_5[$i], $id_prueba_5[$i]);
                        mysqli_stmt_execute($actualizar_6);

                        if($actualizar_6){
                            $si++;
                        }
                    }

                    if($si == count($id_prueba_5)){

                        echo "Listo";

                    }else{
                        echo "Error 6".mysqli_stmt_error($actualizar_6);
                    }
                      
                }else{
                    echo "Error 5".mysqli_stmt_error($actualizar_5);
                }
                
            }else{
                echo "Error 4".mysqli_stmt_error($actualizar_4);
            }
  
        }else{
            echo "Error 3".mysqli_stmt_error($actualizar_3);
        }

    }else{
        echo "Error 2".mysqli_stmt_error($actualizar_2);
    }



}else{
    echo "Error 1".mysqli_stmt_error($actualizar_1);
}



?>