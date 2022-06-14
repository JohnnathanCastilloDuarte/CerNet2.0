<?php 
    include('../../config.ini.php');

    $movimiento = $_POST['movimiento'];

    if($movimiento == "Listar_1"){
       
        $id_asignado = $_POST['id_asignado'];
        $array_pruebas = array();
        $array_pruebas2 = array();

        $consultar1 = mysqli_prepare($connect,"SELECT a.id_inspeccion, a.insp_1, a.insp_2, a.insp_3, a.insp_4, a.insp_5, b.id_informe, b.usuario_responsable 
        FROM campana_extraccion_inspeccion a, informe_campana b 
        WHERE a.id_asignado = b.id_asignado AND b.id_asignado = ?");
        mysqli_stmt_bind_param($consultar1, 'i', $id_asignado);
        mysqli_stmt_execute($consultar1);
        mysqli_stmt_store_result($consultar1);
        mysqli_stmt_bind_result($consultar1, $id_inspeccion, $insp_1, $insp_2, $insp_3, $insp_4, $insp_5,$id_informe, $usuario_responsable);


        while($row = mysqli_stmt_fetch($consultar1)){

            $array_pruebas[]=array
            (
                'id_inspeccion'=>$id_inspeccion,
                'insp_1'=>$insp_1,
                'insp_2'=>$insp_2,
                'insp_3'=>$insp_3,
                'insp_4'=>$insp_4,
                'insp_5'=>$insp_5,
                'id_informe'=>$id_informe,
                'usuario_responsable'=>$usuario_responsable

            );
        }

        $convert = json_encode($array_pruebas);

        echo $convert;

   
   
    }else if($movimiento == "Listar_2"){

        $id_asignado = $_POST['id_asignado'];
        $array_pruebas = array();

        $consultar1 = mysqli_prepare($connect,"SELECT id_prueba, requisito, valor_obtenido, veredicto FROM campana_extraccion_prueba_1 WHERE id_asignado = ?");
        mysqli_stmt_bind_param($consultar1, 'i', $id_asignado);
        mysqli_stmt_execute($consultar1);
        mysqli_stmt_store_result($consultar1);
        mysqli_stmt_bind_result($consultar1, $id_prueba, $requisito, $valor_obtenido, $veredicto);

        while($row = mysqli_stmt_fetch($consultar1)){

            $array_pruebas[]=array(
                'id_prueba'=>$id_prueba,
                'requisito'=>$requisito,
                'valor_obtenido'=>$valor_obtenido,
                'veredicto'=>$veredicto
            );
        }

        $convert = json_encode($array_pruebas);
        echo $convert;


    }else if($movimiento == "Listar_3"){

        $id_asignado = $_POST['id_asignado'];
        $array_pruebas = array();

        $consultar1 = mysqli_prepare($connect,"SELECT id_prueba, medicion_1, medicion_2, medicion_3, medicion_4, medicion_5, medicion_6 FROM campana_extraccion_prueba_2 WHERE id_asignado = ?");
        mysqli_stmt_bind_param($consultar1, 'i', $id_asignado);
        mysqli_stmt_execute($consultar1);
        mysqli_stmt_store_result($consultar1);
        mysqli_stmt_bind_result($consultar1, $id_prueba, $medicion_1, $medicion_2, $medicion_3, $medicion_4, $medicion_5, $medicion_6);

        while($row = mysqli_stmt_fetch($consultar1)){
            $array_pruebas[] = array(
                'id_prueba'=>$id_prueba,
                'medicion_1'=>$medicion_1,
                'medicion_2'=>$medicion_2,
                'medicion_3'=>$medicion_3,
                'medicion_4'=>$medicion_4,
                'medicion_5'=>$medicion_5,
                'medicion_6'=>$medicion_6
            );
        }

        $convert = json_encode($array_pruebas);

        echo $convert;




    }else if($movimiento == "Listar_4"){

        $id_asignado = $_POST['id_asignado'];
        $array_pruebas = array();

 
        $consultar1 = mysqli_prepare($connect,"SELECT id_prueba, medicion_1, medicion_2, medicion_3, medicion_4 FROM campana_extraccion_prueba_3 WHERE id_asignado = ?");
        mysqli_stmt_bind_param($consultar1, 'i', $id_asignado);
        mysqli_stmt_execute($consultar1);
        mysqli_stmt_store_result($consultar1);
        mysqli_stmt_bind_result($consultar1, $id_prueba, $medicion_1, $medicion_2, $medicion_3, $medicion_4);

        while($row = mysqli_stmt_fetch($consultar1)){
            $array_pruebas[] = array(
                'id_prueba'=>$id_prueba,
                'medicion_1'=>$medicion_1,
                'medicion_2'=>$medicion_2,
                'medicion_3'=>$medicion_3,
                'medicion_4'=>$medicion_4
            );
        }

        $convert = json_encode($array_pruebas);

        echo $convert;




    }else if($movimiento == "Listar_5"){

        $id_asignado = $_POST['id_asignado'];
        $array_pruebas = array();

 
        $consultar1 = mysqli_prepare($connect,"SELECT id_prueba, punto_1, punto_2, punto_3, punto_4, punto_5, punto_promedio, categoria FROM campana_extraccion_prueba_4 WHERE id_asignado = ?");
        mysqli_stmt_bind_param($consultar1, 'i', $id_asignado);
        mysqli_stmt_execute($consultar1);
        mysqli_stmt_store_result($consultar1);
        mysqli_stmt_bind_result($consultar1, $id_prueba, $punto_1, $punto_2, $punto_3, $punto_4, $punto_5, $punto_promedio, $categoria);

        while($row = mysqli_stmt_fetch($consultar1)){
            $array_pruebas[] = array(
                'id_prueba'=>$id_prueba,
                'punto_1'=>$punto_1,
                'punto_2'=>$punto_2,
                'punto_3'=>$punto_3,
                'punto_4'=>$punto_4,
                'punto_5'=>$punto_5,
                'punto_promedio'=>$punto_promedio,
                'categoria'=>$categoria
            );
        }

        $convert = json_encode($array_pruebas);

        echo $convert;




    }else if($movimiento == "Listar_6"){

        $id_asignado = $_POST['id_asignado'];
        $array_pruebas = array();
        $categoria_1 = 1;

 
        $consultar1 = mysqli_prepare($connect,"SELECT id_prueba, resultado, cumple, categoria FROM campana_extraccion_prueba_5 WHERE id_asignado = ?");
        mysqli_stmt_bind_param($consultar1, 'i', $id_asignado);
        mysqli_stmt_execute($consultar1);
        mysqli_stmt_store_result($consultar1);
        mysqli_stmt_bind_result($consultar1, $id_prueba, $resultado, $cumple, $categoria);

        while($row = mysqli_stmt_fetch($consultar1)){
            $array_pruebas[] = array(
                'id_prueba'=>$id_prueba,
                'resultado'=>$resultado,
                'cumple'=>$cumple,
                'categoria'=>$categoria
            );
        }

        $convert = json_encode($array_pruebas);

        echo $convert;




    }else if($movimiento == "Listar_7"){

        $id_asignado = $_POST['id_asignado'];
        $array_pruebas = array();

       $consultar1 = mysqli_prepare($connect,"SELECT id_informe, conclusion, solicitante, nombre_informe, usuario_responsable FROM informe_campana WHERE id_asignado = ?");
        mysqli_stmt_bind_param($consultar1, 'i', $id_asignado);
        mysqli_stmt_execute($consultar1);
        mysqli_stmt_store_result($consultar1);
        mysqli_stmt_bind_result($consultar1, $id_informe, $conclusion, $solicitante, $nombre_informe, $usuario_responsable);

        while($row = mysqli_stmt_fetch($consultar1)){
            $array_pruebas[] = array(
                'id_informe'=>$id_informe,
                'conclusion'=>$conclusion,
                'solicitante'=>$solicitante,
                'nombre_informe'=>$nombre_informe,
                'usuario_responsable'=>$usuario_responsable
            );
        }

        $convert = json_encode($array_pruebas);

        echo $convert;


    }





    else if($movimiento == "Validador_creator"){

        $id_asignado = $_POST['id_asignado'];
        $validator = $_POST['validator'];

        if($validator == 1){

            $consultar1 = mysqli_prepare($connect, "SELECT id_prueba FROM campana_extraccion_prueba_1 WHERE id_asignado = ?");
            mysqli_stmt_bind_param($consultar1, 'i', $id_asignado);
            mysqli_stmt_execute($consultar1);
            mysqli_stmt_store_result($consultar1);
            mysqli_stmt_bind_result($consultar1, $id_prueba);
            
            if(mysqli_stmt_num_rows($consultar1) > 0){
                echo "Ok";
            }else{
                for($i == 1; $i < 10; $i++){

                    $creando = mysqli_prepare($connect,"INSERT INTO campana_extraccion_prueba_1 (id_asignado) VALUES (?)");
                    mysqli_stmt_bind_param($creando, 'i', $id_asignado);
                    mysqli_stmt_execute($creando);

                    if($creando){
                        $exito++;
                    }
                }

                if($exito == 10){
                    echo "Exito";
                }
            }

        }else if($validator == 2){

            $consultar2 = mysqli_prepare($connect,"SELECT id_prueba  FROM campana_extraccion_prueba_2 WHERE id_asignado = ?");
            mysqli_stmt_bind_param($consultar2, 'i', $id_asignado);
            mysqli_stmt_execute($consultar2);
            mysqli_stmt_store_result($consultar2);
            mysqli_stmt_bind_result($consultar2, $id_prueba_2);
            mysqli_stmt_fetch($consultar2);


                
            if(mysqli_stmt_num_rows($consultar2) > 0){
                echo "Ok pruebas_2_1";
            }else{
                for($i == 1; $i < 4; $i++){
                    $insertando = mysqli_prepare($connect,"INSERT INTO campana_extraccion_prueba_2 (id_asignado) VALUES (?)");
                    mysqli_stmt_bind_param($insertando, 'i', $id_asignado);
                    mysqli_stmt_execute($insertando);
                }
            }

        }else if($validator == 3){

            $consultar3 = mysqli_prepare($connect,"SELECT id_prueba  FROM campana_extraccion_prueba_3 WHERE id_asignado = ?");
            mysqli_stmt_bind_param($consultar3, 'i', $id_asignado);
            mysqli_stmt_execute($consultar3);
            mysqli_stmt_store_result($consultar3);
            mysqli_stmt_bind_result($consultar3, $id_prueba_3);
            mysqli_stmt_fetch($consultar3);
    
    
                
            if(mysqli_stmt_num_rows($consultar3) > 0){
                echo "Ok pruebas_3";
            }else{
                for($i == 1; $i < 4; $i++){
                    $insertando = mysqli_prepare($connect,"INSERT INTO campana_extraccion_prueba_3 (id_asignado) VALUES (?)");
                    mysqli_stmt_bind_param($insertando, 'i', $id_asignado);
                    mysqli_stmt_execute($insertando);
                }
            }

        }else if($validator == 4){

            $categoria_1 = 1;

            $consultar4 = mysqli_prepare($connect,"SELECT id_prueba  FROM campana_extraccion_prueba_4 WHERE id_asignado = ? AND categoria = ?");
            mysqli_stmt_bind_param($consultar4, 'ii', $id_asignado, $categoria_1);
            mysqli_stmt_execute($consultar4);
            mysqli_stmt_store_result($consultar4);
            mysqli_stmt_bind_result($consultar4, $id_prueba_4);
            mysqli_stmt_fetch($consultar4);


                
            if(mysqli_stmt_num_rows($consultar4) > 0){
                echo "Ok pruebas_4_1";
            }else{
                for($i == 1; $i < 2; $i++){
                    $insertando = mysqli_prepare($connect,"INSERT INTO campana_extraccion_prueba_4 (id_asignado, categoria) VALUES (?,?)");
                    mysqli_stmt_bind_param($insertando, 'ii', $id_asignado, $categoria_1);
                    mysqli_stmt_execute($insertando);
                }
            }

        }else if($validator == 5){

            $categoria_2 = 2;

            $consultar5 = mysqli_prepare($connect,"SELECT id_prueba  FROM campana_extraccion_prueba_4 WHERE id_asignado = ? AND categoria = ?");
            mysqli_stmt_bind_param($consultar5, 'ii', $id_asignado, $categoria_2);
            mysqli_stmt_execute($consultar5);
            mysqli_stmt_store_result($consultar5);
            mysqli_stmt_bind_result($consultar5, $id_prueba_5);
            mysqli_stmt_fetch($consultar5);


                
            if(mysqli_stmt_num_rows($consultar5) > 0){
                echo "Ok pruebas_4_2";
            }else{
                for($i == 1; $i < 2; $i++){
                    $insertando = mysqli_prepare($connect,"INSERT INTO campana_extraccion_prueba_4 (id_asignado, categoria) VALUES (?,?)");
                    mysqli_stmt_bind_param($insertando, 'ii', $id_asignado, $categoria_2);
                    mysqli_stmt_execute($insertando);
                }
            }

        }else if($validator == 6){

            $categoria_3 = 3;

            $consultar6 = mysqli_prepare($connect,"SELECT id_prueba  FROM campana_extraccion_prueba_4 WHERE id_asignado = ? AND categoria = ?");
            mysqli_stmt_bind_param($consultar6, 'ii', $id_asignado, $categoria_3);
            mysqli_stmt_execute($consultar6);
            mysqli_stmt_store_result($consultar6);
            mysqli_stmt_bind_result($consultar6, $id_prueba_6);
            mysqli_stmt_fetch($consultar6);
    
    
                
            if(mysqli_stmt_num_rows($consultar6) > 0){
                echo "Ok pruebas_4_4";
            }else{
                $valor= 'valor';
                for($i == 1; $i < 1; $i++){
                    $insertando = mysqli_prepare($connect,"INSERT INTO campana_extraccion_prueba_4 (id_asignado, categoria, punto_4, punto_5) VALUES (?,?,?,?)");
                    mysqli_stmt_bind_param($insertando, 'iiss', $id_asignado, $categoria_3, $valor, $valor);
                    mysqli_stmt_execute($insertando);
                }
            }

        }else if($validator == 7){

            $categoria_1 = 1;

            $consultar = mysqli_prepare($connect,"SELECT id_prueba  FROM campana_extraccion_prueba_5 WHERE id_asignado = ? AND categoria = ?");
            mysqli_stmt_bind_param($consultar, 'ii', $id_asignado, $categoria_1);
            mysqli_stmt_execute($consultar);
            mysqli_stmt_store_result($consultar);
            mysqli_stmt_bind_result($consultar, $id_prueba);
            mysqli_stmt_fetch($consultar);
    
    
                
            if(mysqli_stmt_num_rows($consultar) > 0){
                echo "Ok";
            }else{
                for($i == 1; $i < 5; $i++){
                    $insertando = mysqli_prepare($connect,"INSERT INTO campana_extraccion_prueba_5 (id_asignado, categoria) VALUES (?,?)");
                    mysqli_stmt_bind_param($insertando, 'ii', $id_asignado, $categoria_1);
                    mysqli_stmt_execute($insertando);
                }
            }

        }else if($validator == 8){

            $categoria_2 = 2;

            $consultar = mysqli_prepare($connect,"SELECT id_prueba  FROM campana_extraccion_prueba_5 WHERE id_asignado = ? AND categoria = ?");
            mysqli_stmt_bind_param($consultar, 'ii', $id_asignado, $categoria_2);
            mysqli_stmt_execute($consultar);
            mysqli_stmt_store_result($consultar);
            mysqli_stmt_bind_result($consultar, $id_prueba);
            mysqli_stmt_fetch($consultar);
    
    
                
            if(mysqli_stmt_num_rows($consultar) > 0){
                echo "Ok";
            }else{
                for($i == 1; $i < 5; $i++){
                    $insertando = mysqli_prepare($connect,"INSERT INTO campana_extraccion_prueba_5 (id_asignado, categoria) VALUES (?,?)");
                    mysqli_stmt_bind_param($insertando, 'ii', $id_asignado, $categoria_2);
                    mysqli_stmt_execute($insertando);
                }
            }

        }

        else if($validator == 9){

            $consultar = mysqli_prepare($connect,"SELECT id_informe  FROM informe_campana WHERE id_asignado = ? ");
            mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
            mysqli_stmt_execute($consultar);
            mysqli_stmt_store_result($consultar);
            mysqli_stmt_bind_result($consultar, $id_prueba);
            mysqli_stmt_fetch($consultar);


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


            $validador3 = mysqli_prepare($connect,"SELECT num_consecutivo FROM campana_extracción_informe_consecutivo ORDER BY id DESC LIMIT 1;");
            mysqli_stmt_execute($validador3);
            mysqli_stmt_store_result($validador3);
            mysqli_stmt_bind_result($validador3, $num_consecutivo);
            mysqli_stmt_fetch($validador3);

                if ($num_consecutivo == 0 || $num_consecutivo == '') {
                    $num_consecutivo = 3210;
                }

                $nuevo_consecutivo = $num_consecutivo + 1;
                $nombre_informe = 'SCL'.$num_ot.'-DOC'.$nuevo_consecutivo.'-CLI'.$id_empresa.'-CE';

    
    
                
            if(mysqli_stmt_num_rows($consultar) > 0){
                echo "Ok";
            }else{
                if(mysqli_stmt_num_rows($validador1) == 0){

                    $creando1 = mysqli_prepare($connect,"INSERT INTO campana_extracción_informe_consecutivo (num_consecutivo, id_asignado) VALUES (?,?)");
                    mysqli_stmt_bind_param($creando1, 'ii', $nuevo_consecutivo, $id_asignado);
                    mysqli_stmt_execute($creando1);

                    $creando = mysqli_prepare($connect,"INSERT INTO informe_campana (id_asignado, nombre_informe) VALUES (?,?)");
                    mysqli_stmt_bind_param($creando, 'is', $id_asignado, $nombre_informe);
                    mysqli_stmt_execute($creando);
                    
                }
            }

        }
       
            
    }

mysqli_close($connect);
?>