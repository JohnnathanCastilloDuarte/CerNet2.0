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
    $n_prueba = $_POST['n_prueba'];
  
  
    $consultar = mysqli_prepare($connect,"SELECT b.id_prueba, a.dato, a.id_prueba_3, a.id  
        FROM salas_limpias_datos_de_prueba_3 a, salas_limpias_prueba_3 b
        WHERE a.id_prueba_3=b.id_prueba AND  b.id_asignado = ? ");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id, $dato, $id_prueba_3, $id_prueba_3_individual);
    
    while($row = mysqli_stmt_fetch($consultar)){

        $array_resultado[] = array(
            'id'=>$id,
            'campo_1'=>$dato,
            'id_prueba_3'=>$id_prueba_3,
            'id_prueba_3_individual'=>$id_prueba_3_individual
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

else if($orden == 6){
    $id_asignado = $_POST['id_asignado'];
    $array_resultado = array();
    $consultar = mysqli_prepare($connect,"SELECT id_ensayo, metodo_ensayo, puntos_x_medicion, muestra_x_punto, volumen_muestra, altura_muestra FROM salas_limpias_metodo_1 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_ensayo, $metodo_ensayo, $puntos_x_medicion, $muestra_x_punto, $volumen_muestra, $altura_muestras);

    
    while($row = mysqli_stmt_fetch($consultar)){

        $array_resultado[] = array(
           'id_ensayo'=>$id_ensayo,
           'metodo_ensayo'=>$metodo_ensayo,
           'puntos_x_medicion'=>$puntos_x_medicion,
           'muestra_x_punto'=>$muestra_x_punto,
           'volumen_muestra'=>$volumen_muestra,
           'altura_muestras'=>$altura_muestras       
        );
    }

    $convert = json_encode($array_resultado);
    echo $convert;
}

else if($orden == 7){
    $id_asignado = $_POST['id_asignado'];
    $array_resultado = array();
    $consultar = mysqli_prepare($connect,"SELECT id_ensayo, metodo_ensayo, especificacion FROM salas_limpias_metodo_2 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_ensayo, $metodo_ensayo, $especificacion);

    
    while($row = mysqli_stmt_fetch($consultar)){

        $array_resultado[] = array(
           'id_ensayo'=>$id_ensayo,
           'metodo_ensayo'=>$metodo_ensayo,
           'especificacion'=>$especificacion
        );
    }

    $convert = json_encode($array_resultado);
    echo $convert;
}


else if($orden == 8){
    $id_asignado = $_POST['id_asignado'];
    $array_resultado = array();
    $consultar = mysqli_prepare($connect,"SELECT id_ensayo, metodo_ensayo, n_muestras, altura_muestra, categoria FROM salas_limpias_metodo_4 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_ensayo, $metodo_ensayo, $n_muestras, $altura_muestra, $categoria);

    
    while($row = mysqli_stmt_fetch($consultar)){

        $array_resultado[] = array(
           'id_ensayo'=>$id_ensayo,
           'metodo_ensayo'=>$metodo_ensayo,
           'n_muestras'=>$n_muestras,
           'altura_muestra'=>$altura_muestra,
           'categoria'=>$categoria
        );
    }

    $convert = json_encode($array_resultado);
    echo $convert;
}

else if($orden == 9){
    $id_asignado = $_POST['id_asignado'];
    $array_resultado = array();
    $consultar = mysqli_prepare($connect,"SELECT id_ensayo, metodo_ensayo, n_rejillas, n_extractores FROM salas_limpias_metodo_5 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_ensayo, $metodo_ensayo,  $n_rejillas, $n_extractores);

    
    while($row = mysqli_stmt_fetch($consultar)){

        $array_resultado[] = array(
           'id_ensayo'=>$id_ensayo,
           'metodo_ensayo'=>$metodo_ensayo,
           'n_rejillas'=>$n_rejillas,
           'n_extractores'=>$n_extractores
        );
    }

    $convert = json_encode($array_resultado);
    echo $convert;
}


else if($orden == 10){
    $id_asignado = $_POST['id_asignado'];
    $array_resultado = array();
    $consultar = mysqli_prepare($connect,"SELECT id_informe, nombre_informe, solicita, conclusion, usuario_responsable, fecha_medicion FROM salas_limpias_informe WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_informe, $nombre_informe,  $solicitante, $conclusion, $usuario_responsable, $fecha_medicion);

    
    while($row = mysqli_stmt_fetch($consultar)){

        $array_resultado[] = array(
           'id_informe'=>$id_informe,
           'nombre_informe'=>$nombre_informe,
           'solicitante'=>$solicitante,
           'conclusion'=>$conclusion,
           'responsable'=>$usuario_responsable,
           'fecha_medicion'=>$fecha_medicion
        );
    }

    $convert = json_encode($array_resultado);
    echo $convert;
}


///////////////// VALIDACI???N
else if($orden == 100){

    $id_asignado = $_POST['id_asignado'];
    $categoria_1 = 1;
    $categoria_2 = 2;
    $array_resultado = array();

    $validador1 = mysqli_prepare($connect,"SELECT id_prueba FROM salas_limpias_prueba_1 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
    mysqli_stmt_execute($validador1);
    mysqli_stmt_store_result($validador1);
    mysqli_stmt_bind_result($validador1, $id_prueba);
   // mysqli_stmt_fetch($validador1);

       

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
   // mysqli_stmt_fetch($validador1);

     while($row = mysqli_stmt_fetch($validador1)){

            $array_resultado[] = array(
               'id_prueba'=>$id_prueba,
            );
        }

    if(mysqli_stmt_num_rows($validador1) == 0 || isset($_POST['accion']) AND $_POST['accion'] =='agregar'){
            
        
            $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_prueba_3 (id_asignado) VALUES (?)");
            mysqli_stmt_bind_param($creando, 'i', $id_asignado);
            mysqli_stmt_execute($creando);
            $id_item = mysqli_stmt_insert_id($creando);
      

            
            
            for($i = 0; $i<4; $i++){
                $creando2 = mysqli_prepare($connect,"INSERT INTO salas_limpias_datos_de_prueba_3 (id_prueba_3) VALUES (?)");
                mysqli_stmt_bind_param($creando2, 'i', $id_item);
                mysqli_stmt_execute($creando2);
            }
 
       
            

    }else if (isset($_POST['accion']) && $_POST['accion'] == 'borrar'){

         $id_prueba_3 = $_POST['id_prueba_3']; 
         $id_prueba_padre = $_POST['id_prueba_padre'];
         $contador_eliminaciones = 1;
      
        $consultar_salas = mysqli_prepare($connect, "SELECT id FROM salas_limpias_datos_de_prueba_3 WHERE id_prueba_3 = ?");
        mysqli_stmt_bind_param($consultar_salas, 'i', $id_prueba_padre);
        mysqli_stmt_execute($consultar_salas);
        mysqli_stmt_store_result($consultar_salas);
        mysqli_stmt_bind_result($consultar_salas, $id_eliminar);
        
        while(mysqli_stmt_fetch($consultar_salas)){
          
          $eliminar_masivos_prueba = mysqli_prepare($connect,"DELETE FROM salas_limpias_datos_de_prueba_3 WHERE id = ?");
          mysqli_stmt_bind_param($eliminar_masivos_prueba, 'i', $id_eliminar);
          mysqli_stmt_execute($eliminar_masivos_prueba);
          if($eliminar_masivos_prueba){
            $contador_eliminaciones++;
          }
        }
      
        if($eliminar_masivos_prueba == mysqli_stmt_num_rows($consultar_salas)){
            $query2 = "DELETE FROM salas_limpias_prueba_3 WHERE id_prueba = ? ";
             $execute_query_2 = mysqli_prepare($connect,$query);
             mysqli_stmt_bind_param($execute_query_2, 'i', $id_prueba_3);
             mysqli_stmt_execute($execute_query_2);
          
            if($execute_query_2){
              echo "Listo";
            }
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

            }else if($i == 2){
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


else if($orden == 600){

    $id_asignado = $_POST['id_asignado'];
    
    
    $validador1 = mysqli_prepare($connect,"SELECT id_ensayo FROM salas_limpias_metodo_1 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
    mysqli_stmt_execute($validador1);
    mysqli_stmt_store_result($validador1);
    mysqli_stmt_bind_result($validador1, $id_prueba);
    mysqli_stmt_fetch($validador1);

    if(mysqli_stmt_num_rows($validador1) == 0){

       
        $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_metodo_1 (id_asignado) VALUES (?)");
        mysqli_stmt_bind_param($creando, 'i', $id_asignado);
        mysqli_stmt_execute($creando);
        
    }

}

else if($orden == 700){

    $id_asignado = $_POST['id_asignado'];
    
    
    $validador1 = mysqli_prepare($connect,"SELECT id_ensayo FROM salas_limpias_metodo_2 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
    mysqli_stmt_execute($validador1);
    mysqli_stmt_store_result($validador1);
    mysqli_stmt_bind_result($validador1, $id_prueba);
    mysqli_stmt_fetch($validador1);

    if(mysqli_stmt_num_rows($validador1) == 0){

       
        $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_metodo_2 (id_asignado) VALUES (?)");
        mysqli_stmt_bind_param($creando, 'i', $id_asignado);
        mysqli_stmt_execute($creando);
        
    }

}

else if($orden == 800){

    $id_asignado = $_POST['id_asignado'];
    $categoria_1 = 1;
    $categoria_2 = 2;
    
    $validador1 = mysqli_prepare($connect,"SELECT id_ensayo FROM salas_limpias_metodo_4 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
    mysqli_stmt_execute($validador1);
    mysqli_stmt_store_result($validador1);
    mysqli_stmt_bind_result($validador1, $id_prueba);
    mysqli_stmt_fetch($validador1);

    if(mysqli_stmt_num_rows($validador1) == 0){

       
        $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_metodo_4 (id_asignado, categoria) VALUES (?,?)");
        mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria_1);
        mysqli_stmt_execute($creando);
        $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_metodo_4 (id_asignado, categoria) VALUES (?,?)");
        mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria_2);
        mysqli_stmt_execute($creando);
        
    }

}

else if($orden == 900){

    $id_asignado = $_POST['id_asignado'];
    
    $validador1 = mysqli_prepare($connect,"SELECT id_ensayo FROM salas_limpias_metodo_5 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
    mysqli_stmt_execute($validador1);
    mysqli_stmt_store_result($validador1);
    mysqli_stmt_bind_result($validador1, $id_prueba);
    mysqli_stmt_fetch($validador1);

    if(mysqli_stmt_num_rows($validador1) == 0){

        $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_metodo_5 (id_asignado) VALUES (?)");
        mysqli_stmt_bind_param($creando, 'i', $id_asignado);
        mysqli_stmt_execute($creando);
        
    }

}


else if($orden == 1000){

    $id_asignado = $_POST['id_asignado'];
      
    $validador1 = mysqli_prepare($connect,"SELECT id_informe FROM salas_limpias_informe WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validador1, 'i', $id_asignado);
    mysqli_stmt_execute($validador1);
    mysqli_stmt_store_result($validador1);
    mysqli_stmt_bind_result($validador1, $id_prueba);
    mysqli_stmt_fetch($validador1);


    $validador2 = mysqli_prepare($connect,"SELECT REPLACE(c.numot, 'OT','') as ot, e.id_empresa FROM servicio a, item_asignado b, numot c, empresa e  
                                            WHERE a.id_servicio = b.id_servicio 
                                            AND  a.id_numot = c.id_numot 
                                            AND  c.id_empresa = e.id_empresa 
                                            AND b.id_asignado = ?");
    mysqli_stmt_bind_param($validador2, 'i', $id_asignado);
    mysqli_stmt_execute($validador2);
    mysqli_stmt_store_result($validador2);
    mysqli_stmt_bind_result($validador2, $num_ot, $id_empresa);
    mysqli_stmt_fetch($validador2);


    $validador3 = mysqli_prepare($connect,"SELECT num_consecutivo FROM sala_limpia_informe_consecutivo ORDER BY id DESC LIMIT 1;");
    mysqli_stmt_execute($validador3);
    mysqli_stmt_store_result($validador3);
    mysqli_stmt_bind_result($validador3, $num_consecutivo);
    mysqli_stmt_fetch($validador3);

    if ($num_consecutivo == 0 || $num_consecutivo == '') {
        $num_consecutivo = 3210;
    }

    $nuevo_consecutivo = $num_consecutivo + 1;
    $nombre_informe = 'SCL'.$num_ot.'-DOC'.$nuevo_consecutivo.'-CLI'.$id_empresa.'-SLA';

    if(mysqli_stmt_num_rows($validador1) == 0){

        $creando1 = mysqli_prepare($connect,"INSERT INTO sala_limpia_informe_consecutivo (num_consecutivo, id_asignado) VALUES (?,?)");
        mysqli_stmt_bind_param($creando1, 'ii', $nuevo_consecutivo, $id_asignado);
        mysqli_stmt_execute($creando1);

        $creando = mysqli_prepare($connect,"INSERT INTO salas_limpias_informe (id_asignado, nombre_informe) VALUES (?,?)");
        mysqli_stmt_bind_param($creando, 'is', $id_asignado, $nombre_informe);
        mysqli_stmt_execute($creando);
        
    }

}



?>