<?php

include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "opcion_1"){

    $id_asignado = $_POST['id_asignado'];
    $array_prueba = array();
  
    $consultar = mysqli_prepare($connect,"SELECT id_inspeccion, insp_1, insp_2, insp_3, insp_4, insp_5, insp_6 FROM flujo_laminar_inspeccion_visual WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_inspeccion, $insp_1, $insp_2, $insp_3, $insp_4, $insp_5, $insp_6);

 
    while($row = mysqli_stmt_fetch($consultar)){
        $array_prueba[]=array(
            'id_inspeccion'=>$id_inspeccion,
            'insp_1'=>$insp_1,
            'insp_2'=>$insp_2,
            'insp_3'=>$insp_3,
            'insp_4'=>$insp_4,
            'insp_5'=>$insp_5,
            'insp_6'=>$insp_6
        );
    }

    $convert = json_encode($array_prueba);
    echo $convert;
}

else if($movimiento == "opcion_2"){

    $id_asignado = $_POST['id_asignado'];
    $array_prueba = array();

    $consultar = mysqli_prepare($connect,"SELECT id_prueba, requisito, valor_obtenido, veredicto FROM flujo_laminar_prueba_1 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_prueba, $requisito, $valor_obtenido, $veredicto);

    while($row = mysqli_stmt_fetch($consultar)){
        $array_prueba[]=array(
            'id_prueba'=>$id_prueba,
            'requisito'=>$requisito,
            'valor_obtenido'=>$valor_obtenido,
            'veredicto'=>$veredicto
        );
    }

    $convert = json_encode($array_prueba);
    echo $convert;
}


else if($movimiento == "opcion_3"){

    $id_asignado = $_POST['id_asignado'];
    $array_prueba = array();

    $consultar = mysqli_prepare($connect,"SELECT id_prueba, zonaA, zonaAA, zonaB, zonaBB, zonaC, zonaCC, zonaD, zonaDD FROM flujo_laminar_prueba_2 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_prueba, $zonaA, $zonaAA, $zonaB, $zonaBB, $zonaC, $zonaCC, $zonaD, $zonaDD);

    while($row = mysqli_stmt_fetch($consultar)){
        $array_prueba[]=array(
            'id_prueba'=>$id_prueba,
            'zonaA'=>$zonaA,
            'zonaAA'=>$zonaAA,
            'zonaB'=>$zonaB,
            'zonaBB'=>$zonaBB,
            'zonaC'=>$zonaC,
            'zonaCC'=>$zonaCC,
            'zonaD'=>$zonaD,
            'zonaDD'=>$zonaDD
        );
    }

    $convert = json_encode($array_prueba);
    echo $convert;
}

else if($movimiento == "opcion_4"){

    $id_asignado = $_POST['id_asignado'];
    $array_prueba = array();

    $consultar = mysqli_prepare($connect,"SELECT id_prueba, medicion_1, medicion_2, medicion_3, medicion_4, medicion_5, medicion_6 FROM flujo_laminar_prueba_3 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_prueba, $medicion_1, $medicion_2, $medicion_3, $medicion_4, $medicion_5, $medicion_6);

    while($row = mysqli_stmt_fetch($consultar)){
        $array_prueba[]=array(
            'id_prueba'=>$id_prueba,
            'medicion_1'=>$medicion_1,
            'medicion_2'=>$medicion_2,
            'medicion_3'=>$medicion_3,
            'medicion_4'=>$medicion_4,
            'medicion_5'=>$medicion_5,
            'medicion_6'=>$medicion_6
        );
    }

    $convert = json_encode($array_prueba);
    echo $convert;
}

else if($movimiento == "opcion_5"){

    $id_asignado = $_POST['id_asignado'];
    $array_prueba = array();

    $consultar = mysqli_prepare($connect,"SELECT id_prueba, punto_1, punto_2, punto_3, promedio, categoria FROM flujo_laminar_prueba_4 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_prueba, $punto_1, $punto_2, $punto_3, $promedio, $categoria);

    while($row = mysqli_stmt_fetch($consultar)){
        $array_prueba[]=array(
            'id_prueba'=>$id_prueba,
            'punto_1'=>$punto_1,
            'punto_2'=>$punto_2,
            'punto_3'=>$punto_3,
            'promedio'=>$promedio,
            'categoria'=>$categoria
        );
    }

    $convert = json_encode($array_prueba);
    echo $convert;
}

else if($movimiento == "opcion_6"){

    $id_asignado = $_POST['id_asignado'];
    $array_prueba = array();

    $consultar = mysqli_prepare($connect,"SELECT id_prueba, resultado, cumple, categoria FROM flujo_laminar_prueba_5 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_prueba, $resultado, $cumple, $categoria);

    while($row = mysqli_stmt_fetch($consultar)){
        $array_prueba[]=array(
            'id_prueba'=>$id_prueba,
            'resultado'=>$resultado,
            'cumple'=>$cumple,
            'categoria'=>$categoria
        );
    }

    $convert = json_encode($array_prueba);
    echo $convert;
}

else if($movimiento == "opcion_7"){

    $id_asignado = $_POST['id_asignado'];
    $array_prueba = array();

    $consultar = mysqli_prepare($connect,"SELECT id_prueba, punto_1, punto_2, punto_3, punto_4, punto_5, promedio FROM flujo_laminar_prueba_6 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_prueba, $punto_1, $punto_2, $punto_3, $punto_4, $punto_5, $promedio);

    while($row = mysqli_stmt_fetch($consultar)){
        $array_prueba[]=array(
            'id_prueba'=>$id_prueba,
            'punto_1'=>$punto_1,
            'punto_2'=>$punto_2,
            'punto_3'=>$punto_3,
            'punto_4'=>$punto_4,
            'punto_5'=>$punto_5,
            'promedio'=>$promedio

        );
    }

    $convert = json_encode($array_prueba);
    echo $convert;
}

else if($movimiento == "opcion_8"){

    $id_asignado = $_POST['id_asignado'];
    $array_prueba = array();

    $consultar = mysqli_prepare($connect,"SELECT id_informe, conclusion, solicitante, nombre_informe, usuario_responsable FROM informe_flujo_laminar WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_informe, $conclusion, $solicitante, $nombre_informe, $usuario_responsable);

    while($row = mysqli_stmt_fetch($consultar)){
        $array_prueba[]=array(
            'id_informe'=>$id_informe,
            'conclusion'=>$conclusion,
            'solicitante'=>$solicitante,
            'nombre_informe'=>$nombre_informe,
            'usuario_responsable'=>$usuario_responsable

        );
    }

    $convert = json_encode($array_prueba);
    echo $convert;
}


else if($movimiento == "opcion_9"){

    $id_asignado = $_POST['id_asignado'];
    $array_prueba = array();

    $consultar = mysqli_prepare($connect,"SELECT  a.id_numot, c.numot, d.nombre, d.sigla_empresa, d.sigla_pais, d.direccion
    FROM servicio a, item_asignado b, numot c, empresa d WHERE b.id_asignado = ? AND b.id_servicio = a.id_servicio AND c.id_numot = a.id_numot AND c.id_empresa = d.id_empresa");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
     mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_numot, $nombre_ot, $nombre_empresa, $sigla_empresa, $sigla_pais, $direccion_empresa);


    while($row = mysqli_stmt_fetch($consultar)){
        $array_prueba[]=array(
            'id_numot' => $id_numot, 
            'nombre_ot' => $nombre_ot, 
            'numero_ot' => substr($nombre_ot,2),
            'nombre_empresa' => $nombre_empresa, 
            'sigla_empresa' => $sigla_empresa, 
            'sigla_pais' => $sigla_pais, 
            'direccion_empresa' => $direccion_empresa

        );
    }

    $convert = json_encode($array_prueba);
    echo $convert;
}

else if($movimiento == "opcion_10"){

    $id_asignado = $_POST['id_asignado'];
    $array_prueba = array();

    $consultar = mysqli_prepare($connect,"SELECT  id, tipo_um, media_promedios, desviacion_estandar, maximo
    FROM flujo_laminar_prueba_7 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
     mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id, $tipo_um, $media_promedios, $desviacion_estandar, $maximo);


    while($row = mysqli_stmt_fetch($consultar)){
        $array_prueba[]=array(
            'id' => $id, 
            'tipo_um' => $tipo_um, 
            'media_promedios' => $media_promedios, 
            'desviacion_estandar' => $desviacion_estandar,
            'maximo' => $maximo

        );
    }

    $convert = json_encode($array_prueba);
    echo $convert;
}

/////////// VALIDADOR
else if($movimiento == "Validador_1"){

    $id_asignado = $_POST['id_asignado'];
    

    $validar1 = mysqli_prepare($connect,"SELECT id_inspeccion FROM flujo_laminar_inspeccion_visual WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validar1, 'i', $id_asignado);
    mysqli_stmt_execute($validar1);
    mysqli_stmt_fetch($validar1);

    if(mysqli_stmt_num_rows($validar1) == 0){
        for($i = 0; $i<1; $i++){
            $creando = mysqli_prepare($connect,"INSERT INTO flujo_laminar_inspeccion_visual (id_asignado) VALUES (?)");
            mysqli_stmt_bind_param($creando, 'i', $id_asignado);
            mysqli_stmt_execute($creando);

        }
    }

    echo "Listo1";
    
}

else if($movimiento == "Validador_2"){

    $id_asignado = $_POST['id_asignado'];

    $validar1 = mysqli_prepare($connect,"SELECT id_prueba FROM flujo_laminar_prueba_1 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validar1, 'i', $id_asignado);
    mysqli_stmt_execute($validar1);
    mysqli_stmt_fetch($validar1);

    if(mysqli_stmt_num_rows($validar1) == 0){
        for($i = 0; $i<6; $i++){
            $creando = mysqli_prepare($connect,"INSERT INTO flujo_laminar_prueba_1 (id_asignado) VALUES (?)");
            mysqli_stmt_bind_param($creando, 'i', $id_asignado);
            mysqli_stmt_execute($creando);
        }
    }

    echo "Listo2";

}

else if($movimiento == "Validador_3"){

    $id_asignado = $_POST['id_asignado'];

    $consultar_cantidad_filtros = mysqli_prepare($connect,"SELECT b.cantidad_filtro FROM item_asignado as a, item_flujo_laminar as b WHERE a.id_item = b.id_item AND a.id_asignado = ?");
    mysqli_stmt_bind_param($consultar_cantidad_filtros, 'i', $id_asignado);
    mysqli_stmt_execute($consultar_cantidad_filtros);
    mysqli_stmt_store_result($consultar_cantidad_filtros);
    mysqli_stmt_bind_result($consultar_cantidad_filtros, $cantidad_filtros);
    mysqli_stmt_fetch($consultar_cantidad_filtros);



    $validar1 = mysqli_prepare($connect,"SELECT id_prueba FROM flujo_laminar_prueba_2 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validar1, 'i', $id_asignado);
    mysqli_stmt_execute($validar1);
    mysqli_stmt_fetch($validar1);

    if(mysqli_stmt_num_rows($validar1) == 0){
        for($i = 0; $i<$cantidad_filtros; $i++){
            $creando = mysqli_prepare($connect,"INSERT INTO flujo_laminar_prueba_2 (id_asignado) VALUES (?)");
            mysqli_stmt_bind_param($creando, 'i', $id_asignado);
            mysqli_stmt_execute($creando);
        }
    }

    echo "Listo3";

}

else if($movimiento == "Validador_4"){

    $id_asignado = $_POST['id_asignado'];

    $consultar_cantidad_filtros = mysqli_prepare($connect,"SELECT b.cantidad_filtro FROM item_asignado as a, item_flujo_laminar as b WHERE a.id_item = b.id_item AND a.id_asignado = ?");
    mysqli_stmt_bind_param($consultar_cantidad_filtros, 'i', $id_asignado);
    mysqli_stmt_execute($consultar_cantidad_filtros);
    mysqli_stmt_store_result($consultar_cantidad_filtros);
    mysqli_stmt_bind_result($consultar_cantidad_filtros, $cantidad_filtros);
    mysqli_stmt_fetch($consultar_cantidad_filtros);



    $validar1 = mysqli_prepare($connect,"SELECT id_prueba FROM flujo_laminar_prueba_3 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validar1, 'i', $id_asignado);
    mysqli_stmt_execute($validar1);
    mysqli_stmt_fetch($validar1);

    if(mysqli_stmt_num_rows($validar1) == 0){
        for($i = 0; $i<$cantidad_filtros; $i++){
            $creando = mysqli_prepare($connect,"INSERT INTO flujo_laminar_prueba_3 (id_asignado) VALUES (?)");
            mysqli_stmt_bind_param($creando, 'i', $id_asignado);
            mysqli_stmt_execute($creando);
        }
    }

    echo "Listo4";

}


else if($movimiento == "Validador_5"){

    $id_asignado = $_POST['id_asignado'];
    $categoria = 1;

    $validar1 = mysqli_prepare($connect,"SELECT id_prueba FROM flujo_laminar_prueba_4 WHERE id_asignado = ? AND categoria = ?");
    mysqli_stmt_bind_param($validar1, 'ii', $id_asignado, $categoria);
    mysqli_stmt_execute($validar1);
    mysqli_stmt_fetch($validar1);

    if(mysqli_stmt_num_rows($validar1) == 0){
        for($i = 0; $i<2; $i++){
            $creando = mysqli_prepare($connect,"INSERT INTO flujo_laminar_prueba_4 (id_asignado, categoria) VALUES (?,?)");
            mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria);
            mysqli_stmt_execute($creando);
        }
    }

    echo "Listo5";

}

else if($movimiento == "Validador_6"){

    $id_asignado = $_POST['id_asignado'];
    $categoria = 2;

    $validar1 = mysqli_prepare($connect,"SELECT id_prueba FROM flujo_laminar_prueba_4 WHERE id_asignado = ? AND categoria = ?");
    mysqli_stmt_bind_param($validar1, 'ii', $id_asignado, $categoria);
    mysqli_stmt_execute($validar1);
    mysqli_stmt_fetch($validar1);

    if(mysqli_stmt_num_rows($validar1) == 0){
        for($i = 0; $i<2; $i++){
            $creando = mysqli_prepare($connect,"INSERT INTO flujo_laminar_prueba_4 (id_asignado, categoria) VALUES (?,?)");
            mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria);
            mysqli_stmt_execute($creando);
        }
    }

    echo "Listo6";

}

else if($movimiento == "Validador_7"){

    $id_asignado = $_POST['id_asignado'];
    $categoria = 1;

    $validar1 = mysqli_prepare($connect,"SELECT id_prueba FROM flujo_laminar_prueba_5 WHERE id_asignado = ? AND categoria = ?");
    mysqli_stmt_bind_param($validar1, 'ii', $id_asignado, $categoria);
    mysqli_stmt_execute($validar1);
    mysqli_stmt_fetch($validar1);

    if(mysqli_stmt_num_rows($validar1) == 0){
        for($i = 0; $i<5; $i++){
            $creando = mysqli_prepare($connect,"INSERT INTO flujo_laminar_prueba_5 (id_asignado, categoria) VALUES (?,?)");
            mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria);
            mysqli_stmt_execute($creando);
        }
    }

    echo "Listo7";

}

else if($movimiento == "Validador_8"){

    $id_asignado = $_POST['id_asignado'];
    $categoria = 2;

    $validar1 = mysqli_prepare($connect,"SELECT id_prueba FROM flujo_laminar_prueba_5 WHERE id_asignado = ? AND categoria = ?");
    mysqli_stmt_bind_param($validar1, 'ii', $id_asignado, $categoria);
    mysqli_stmt_execute($validar1);
    mysqli_stmt_fetch($validar1);

    if(mysqli_stmt_num_rows($validar1) == 0){
        for($i = 0; $i<7; $i++){
            $creando = mysqli_prepare($connect,"INSERT INTO flujo_laminar_prueba_5 (id_asignado, categoria) VALUES (?,?)");
            mysqli_stmt_bind_param($creando, 'ii', $id_asignado, $categoria);
            mysqli_stmt_execute($creando);
        }
    }

    echo "Listo8";

}

else if($movimiento == "Validador_9"){

    $id_asignado = $_POST['id_asignado'];

    $validar1 = mysqli_prepare($connect,"SELECT id_prueba FROM flujo_laminar_prueba_6 WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validar1, 'i', $id_asignado);
    mysqli_stmt_execute($validar1);
    mysqli_stmt_fetch($validar1);

    if(mysqli_stmt_num_rows($validar1) == 0){
        for($i = 0; $i<1; $i++){
            $creando = mysqli_prepare($connect,"INSERT INTO flujo_laminar_prueba_6 (id_asignado) VALUES (?)");
            mysqli_stmt_bind_param($creando, 'i', $id_asignado);
            mysqli_stmt_execute($creando);
        }
    }

    echo "Listo9";

}

else if($movimiento == "Validador_10"){

    $id_asignado = $_POST['id_asignado'];
    $nombre_informe = $_POST['nombre_informe'];
    $solicitante = $_POST['solicitante'];
    $conclusion = $_POST['conclusion'];

    $validar1 = mysqli_prepare($connect,"SELECT id_informe FROM informe_flujo_laminar WHERE id_asignado = ?");
    mysqli_stmt_bind_param($validar1, 'i', $id_asignado);
    mysqli_stmt_execute($validar1);
    mysqli_stmt_fetch($validar1);

    if(mysqli_stmt_num_rows($validar1) == 0){
        for($i = 0; $i<1; $i++){
           
            $creando = mysqli_prepare($connect,"INSERT INTO informe_flujo_laminar (id_asignado, conclusion, solicitante, nombre_informe) VALUES (?,?,?,?)");
            mysqli_stmt_bind_param($creando, 'isss', $id_asignado, $conclusion, $solicitante, $nombre_informe/*, $usuario_responsable*/);
            mysqli_stmt_execute($creando);

            
        }
    }

    echo "Listo10";

}

else if ($movimiento == "Validador_11") {
    
        $id_asignado = $_POST['id_asignado'];
        $validar1 = mysqli_prepare($connect,"SELECT id FROM flujo_laminar_prueba_7 WHERE id_asignado = ?");
        mysqli_stmt_bind_param($validar1, 'i', $id_asignado);
        mysqli_stmt_execute($validar1);
        mysqli_stmt_fetch($validar1);

      if (mysqli_stmt_num_rows($validar1) == 0) {

            for ($i=1; $i < 3; $i++) { 
                 $creando = mysqli_prepare($connect,"INSERT INTO flujo_laminar_prueba_7 (id_asignado,tipo_um) VALUES (?,?)");
                mysqli_stmt_bind_param($creando, 'is', $id_asignado,$i);
                mysqli_stmt_execute($creando);
               
            }
        }  
       echo "Listo11"; 
}


mysqli_close($connect);
?>