<?php 
include('../../config.ini.php');

$orden = $_POST['orden'];


if($orden == 1){
    $id_asignado = $_POST['id_asignado'];
    $array_resultado = array();

    $consultar = mysqli_prepare($connect,"SELECT id_prueba, medida_promedio, desviacion_estandar, maximo, promedios, cumple, categoria FROM salas_limpias_prueba_1 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_prueba, $medida_promedio, $desviacion_estandar, $maximo, $promedios, $cumple, $categoria);

    
    while($row = mysqli_stmt_fetch($consultar)){

        $array_resultado[] = array(
            'id_prueba'=>$id_prueba,
            'medida_promedio'=>$medida_promedio,
            'desviacion_estandar'=>$desviacion_estandar,
            'maximo'=>$maximo,
            'cumple'=>$cumple,
            'promedios'=>$promedios,
            'categoria'=>$categoria
        );
    }

    $convert = json_encode($array_resultado);
    echo $convert;
}


else if($orden == 2){
    $id_asignado = $_POST['id_asignado'];
    $array_resultado = array();

    $consultar = mysqli_prepare($connect,"SELECT id_prueba, medicion_1, medicion_2, medicion_3, medicion_4 FROM salas_limpias_prueba_3 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_prueba, $medicion_1, $medicion_2, $medicion_3, $medicion_4);

    
    while($row = mysqli_stmt_fetch($consultar)){

        $array_resultado[] = array(
            'id_prueba'=>$id_prueba,
            'medicion1'=>$medicion_1,
            'medicion2'=>$medicion_2,
            'medicion3'=>$medicion_3,
            'medicion4'=>$medicion_4
             
        );
    }

    $convert = json_encode($array_resultado);
    echo $convert;
}

else if($orden == 3){
    $id_asignado = $_POST['id_asignado'];
    $array_resultado = array();

    $consultar = mysqli_prepare($connect,"SELECT id_prueba, n1, n2, n3, n4, n5, promedio, cumple, categoria FROM salas_limpias_prueba_4 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_prueba, $n1, $n2, $n3, $n4, $n5, $promedio, $cumple, $categoria);

    
    while($row = mysqli_stmt_fetch($consultar)){

        $array_resultado[] = array(
            'id_prueba'=>$id_prueba,
            'n1'=>$n1,
            'n2'=>$n2,
            'n3'=>$n3,
            'n4'=>$n4,
            'n5'=>$n5,
            'promedio'=>$promedio,
            'cumple'=>$cumple,
            'categoria'=>$categoria
             
        );
    }

    $convert = json_encode($array_resultado);
    echo $convert;
}

else if($orden == 4){
    $id_asignado = $_POST['id_asignado'];
    $array_resultado = array();

    $consultar = mysqli_prepare($connect,"SELECT id_prueba, n1, n2, n3, n4, n5, n6, n7, n8, n9, n10, n11, n12, n13, n14, n15, categoria FROM salas_limpias_prueba_5 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_prueba, $n1, $n2, $n3, $n4, $n5, $n6, $n7, $n8, $n9, $n10, $n11, $n12, $n13, $n14, $n15, $categoria);

    
    while($row = mysqli_stmt_fetch($consultar)){

        $array_resultado[] = array(
            'id_prueba'=>$id_prueba,
            'n1'=>$n1,
            'n2'=>$n2,
            'n3'=>$n3,
            'n4'=>$n4,
            'n5'=>$n5,
            'n6'=>$n6,
            'n7'=>$n7,
            'n8'=>$n8,
            'n9'=>$n9,
            'n10'=>$n10,
            'n11'=>$n11,
            'n12'=>$n12,
            'n13'=>$n13,
            'n14'=>$n14,
            'n15'=>$n15,
            'categoria'=>$categoria
             
        );
    }

    $convert = json_encode($array_resultado);
    echo $convert;
}

else if($orden == 5){
    $id_asignado = $_POST['id_asignado'];
    $array_resultado = array();

    $consultar = mysqli_prepare($connect,"SELECT id_prueba, medicion_1,  medicion_2,  medicion_3, medicion_4 FROM salas_limpias_prueba_6 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_prueba, $medicion_1,  $medicion_2,  $medicion_3, $medicion_4);

    
    while($row = mysqli_stmt_fetch($consultar)){

        $array_resultado[] = array(
            'id_prueba'=>$id_prueba,
           'medicion_1'=>$medicion_1,
           'medicion_2'=>$medicion_2,
           'medicion_3'=>$medicion_3,
           'medicion_4'=>$medicion_4        
        );
    }

    $convert = json_encode($array_resultado);
    echo $convert;
}


///////////////// VALIDACIÓN
else if($orden == 100){

    $id_asignado = $_POST['id_asignado'];
    $categoria_1 = 1;
    $categoria_2 = 2;

    $validador1 = mysqli_prepare($connect,"SELECT id_prueba FROM salas_limpias_prueba_1 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
    mysqli_stmt_execute($validador1);
    mysqli_stmt_store_result($validador1);
    mysqli_stmt_bind_result($validador1, $id_prueba);
    mysqli_stmt_fetch($validador1);

    if(mysqli_stmt_num_rows($validador1) == 0){
        for($i=0;$i<4;$i++){
            if($i <= 1){
                $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_prueba_1 (id_asignado, categoria) VALUES (?, ?)");
                mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria_1);
                mysqli_stmt_execute($creando);
            }else{
                $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_prueba_1 (id_asignado, categoria) VALUES (?, ?)");
                mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria_2);
                mysqli_stmt_execute($creando);
            }
            
        }
       
    }
}


else if($orden == 200){
   
    $id_asignado = $_POST['id_asignado'];

    $validador1 = mysqli_prepare($connect,"SELECT id_prueba FROM salas_limpias_prueba_3 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
    mysqli_stmt_execute($validador1);
    mysqli_stmt_store_result($validador1);
    mysqli_stmt_bind_result($validador1, $id_prueba);
    mysqli_stmt_fetch($validador1);

    if(mysqli_stmt_num_rows($validador1) == 0){

        for($i == 0; $i<6; $i++){
            $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_prueba_3 (id_asignado) VALUES (?)");
            mysqli_stmt_bind_param($creando, 'i', $id_asignado);
            mysqli_stmt_execute($creando);
        }   
        
    }
}

else if($orden == 300){
   
    $id_asignado = $_POST['id_asignado'];
    $categoria_1 = 1;
    $categoria_2 = 2;
    $categoria_3 = 3;
    $categoria_4 = 4;
    


    $validador1 = mysqli_prepare($connect,"SELECT id_prueba FROM salas_limpias_prueba_4 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
    mysqli_stmt_execute($validador1);
    mysqli_stmt_store_result($validador1);
    mysqli_stmt_bind_result($validador1, $id_prueba);
    mysqli_stmt_fetch($validador1);

    if(mysqli_stmt_num_rows($validador1) == 0){

        for($i == 0; $i<4; $i++){
            if($i ==  0){
                $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_prueba_4 (id_asignado, categoria) VALUES (?, ?)");
                mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria_1);
                mysqli_stmt_execute($creando);
            }else if($i == 1){
                $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_prueba_4 (id_asignado, categoria) VALUES (?, ?)");
                mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria_2);
                mysqli_stmt_execute($creando);

            }else if($i == 1){
                $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_prueba_4 (id_asignado, categoria) VALUES (?, ?)");
                mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria_3);
                mysqli_stmt_execute($creando);
            }else{
                $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_prueba_4 (id_asignado, categoria) VALUES (?, ?)");
                mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria_4);
                mysqli_stmt_execute($creando);
            }
            
        }   
        
    }
}

else if($orden == 400){

    $id_asignado = $_POST['id_asignado'];
    $categoria_1 = 1;
    $categoria_2 = 2;
    
    $validador1 = mysqli_prepare($connect,"SELECT id_prueba FROM salas_limpias_prueba_5 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
    mysqli_stmt_execute($validador1);
    mysqli_stmt_store_result($validador1);
    mysqli_stmt_bind_result($validador1, $id_prueba);
    mysqli_stmt_fetch($validador1);

    if(mysqli_stmt_num_rows($validador1) == 0){

        for($i=0;$i<4;$i++){
            $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_prueba_5 (id_asignado, categoria) VALUES (?,?)");
            mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria_1);
            mysqli_stmt_execute($creando);
        }

        for($i=0;$i<4;$i++){
            $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_prueba_5 (id_asignado, categoria) VALUES (?,?)");
            mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria_2);
            mysqli_stmt_execute($creando);
        }
    }

} 

else if($orden == 500){

    $id_asignado = $_POST['id_asignado'];
    
    
    $validador1 = mysqli_prepare($connect,"SELECT id_prueba FROM salas_limpias_prueba_6 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
    mysqli_stmt_execute($validador1);
    mysqli_stmt_store_result($validador1);
    mysqli_stmt_bind_result($validador1, $id_prueba);
    mysqli_stmt_fetch($validador1);

    if(mysqli_stmt_num_rows($validador1) == 0){

       
        $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_prueba_6 (id_asignado) VALUES (?)");
        mysqli_stmt_bind_param($creando, 'i', $id_asignado);
        mysqli_stmt_execute($creando);
        
    }

} 

?>