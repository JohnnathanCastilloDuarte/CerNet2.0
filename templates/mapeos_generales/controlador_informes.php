<?php 

include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "Leer"){

    $array_informes = array();

    $id_mapeo = $_POST['id_mapeo'];
    $id_asignado = $_POST['id_asignado'];

    $consultar = mysqli_prepare($connect,"SELECT id_informe, nombre, tipo, fecha_registro FROM informes_general WHERE id_mapeo = ? AND id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'ii', $id_mapeo, $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_informe, $nombre, $tipo, $fecha_registro);

    while($row = mysqli_stmt_fetch($consultar)){

        $array_informes[]=array(
            'id_informe'=>$id_informe,
            'nombre'=>$nombre,
            'tipo'=>$tipo,
            'fecha_registro'=>$fecha_registro
        );
    }

    $convert = json_encode($array_informes);
    echo $convert;
    
}else if($movimiento == "crear_temp"){

    $id_mapeo = $_POST['id_mapeo'];
    $id_asignado = $_POST['id_asignado'];
    $id_usuario = $_POST['id_usuario'];
    $tipo = "TEMP";
    $consecutivo = "";

    $consulta_empresa = mysqli_prepare($connect,"SELECT a.sigla_empresa, a.sigla_pais, b.correlativo FROM empresa as a, item_asignado as b, item as c WHERE a.id_empresa = c.id_empresa AND c.id_item = b.id_item AND b.id_asignado  = ?");
    mysqli_stmt_bind_param($consulta_empresa, 'i', $id_asignado);
    mysqli_stmt_execute($consulta_empresa);
    mysqli_stmt_store_result($consulta_empresa);
    mysqli_stmt_bind_result($consulta_empresa, $sigla_empresa, $sigla_pais, $correlativo);
    mysqli_stmt_fetch($consulta_empresa);

    $consultar_informe = mysqli_prepare($connect, "SELECT id_informe FROM informes_general WHERE id_mapeo = ? AND id_asignado = ? AND tipo = ?");
    mysqli_stmt_bind_param($consultar_informe, 'iis', $id_mapeo, $id_asignado, $tipo);
    mysqli_stmt_execute($consultar_informe);
    mysqli_stmt_store_result($consultar_informe);
    mysqli_stmt_bind_result($consultar_informe, $id_informe);
    mysqli_stmt_fetch($consultar_informe);

    if(mysqli_stmt_num_rows($consultar_informe) > 0){
        echo "Existe";
    }else{

        $consultar_consecutivo = mysqli_prepare($connect, "SELECT temp_hum FROM informes_general WHERE id_asignado = ? AND tipo = ?");
        mysqli_stmt_bind_param($consultar_consecutivo , 'is', $id_asignado, $tipo);
        mysqli_stmt_execute($consultar_consecutivo);
        mysqli_stmt_store_result($consultar_consecutivo);
        mysqli_stmt_bind_result($consultar_consecutivo , $temp_hum);
        mysqli_stmt_fetch($consultar_consecutivo);

        if(mysqli_stmt_num_rows($consultar_consecutivo) == 0){
            $consecutivo = "01";
        }else{
            if($temp_hum <= 9){
                $consecutivo = "0".$temp_hum;
            }else{
                $consecutivo = $temp_hum;
            }
        }
     
        $nombre_informe = $sigla_pais.'-'.$correlativo.'-'.$sigla_empresa.'-2022-TEM-'.$consecutivo;

        $insertando_informe = mysqli_prepare($connect,"INSERT INTO informes_general (nombre, temp_hum, tipo, id_mapeo, id_asignado, id_usuario) VALUES (?,?,?,?,?,?)");
        mysqli_stmt_bind_param($insertando_informe, 'sisiii', $nombre_informe, $consecutivo, $tipo, $id_mapeo, $id_asignado, $id_usuario);
        mysqli_stmt_execute($insertando_informe);

        if($insertando_informe){
            echo "Listo";
        }else{
            echo "No";
        }
    }

    
}else if($movimiento == "crear_hum"){

    $id_mapeo = $_POST['id_mapeo'];
    $id_asignado = $_POST['id_asignado'];
    $id_usuario = $_POST['id_usuario'];
    $tipo = "HUM";
    $consecutivo = "";

    $consulta_empresa = mysqli_prepare($connect,"SELECT a.sigla_empresa, a.sigla_pais, b.correlativo FROM empresa as a, item_asignado as b, item as c WHERE a.id_empresa = c.id_empresa AND c.id_item = b.id_item AND b.id_asignado  = ?");
    mysqli_stmt_bind_param($consulta_empresa, 'i', $id_asignado);
    mysqli_stmt_execute($consulta_empresa);
    mysqli_stmt_store_result($consulta_empresa);
    mysqli_stmt_bind_result($consulta_empresa, $sigla_empresa, $sigla_pais, $correlativo);
    mysqli_stmt_fetch($consulta_empresa);

    $consultar_informe = mysqli_prepare($connect, "SELECT id_informe FROM informes_general WHERE id_mapeo = ? AND id_asignado = ? AND tipo = ?");
    mysqli_stmt_bind_param($consultar_informe, 'iis', $id_mapeo, $id_asignado, $tipo);
    mysqli_stmt_execute($consultar_informe);
    mysqli_stmt_store_result($consultar_informe);
    mysqli_stmt_bind_result($consultar_informe, $id_informe);
    mysqli_stmt_fetch($consultar_informe);

    if(mysqli_stmt_num_rows($consultar_informe) > 0){
        echo "Existe";
    }else{

        $consultar_consecutivo = mysqli_prepare($connect, "SELECT temp_hum FROM informes_general WHERE id_asignado = ? AND tipo = ?");
        mysqli_stmt_bind_param($consultar_consecutivo , 'is', $id_asignado, $tipo);
        mysqli_stmt_execute($consultar_consecutivo);
        mysqli_stmt_store_result($consultar_consecutivo);
        mysqli_stmt_bind_result($consultar_consecutivo , $temp_hum);
        mysqli_stmt_fetch($consultar_consecutivo);

        if(mysqli_stmt_num_rows($consultar_consecutivo) == 0){
            $consecutivo = "01";
        }else{
            if($temp_hum <= 9){
                $consecutivo = "0".$temp_hum;
            }else{
                $consecutivo = $temp_hum;
            }
        }
     
        $nombre_informe = $sigla_pais.'-'.$correlativo.'-'.$sigla_empresa.'-2022-HUM-'.$consecutivo;

        $insertando_informe = mysqli_prepare($connect,"INSERT INTO informes_general (nombre, temp_hum, tipo, id_mapeo, id_asignado, id_usuario) VALUES (?,?,?,?,?,?)");
        mysqli_stmt_bind_param($insertando_informe, 'sisiii', $nombre_informe, $consecutivo, $tipo, $id_mapeo, $id_asignado, $id_usuario);
        mysqli_stmt_execute($insertando_informe);

        if($insertando_informe){
            echo "Listo";
        }else{
            echo "No";
        }
    }
}  
  

else if($movimiento == "crear_base"){

$id_mapeo = $_POST['id_mapeo'];
$id_asignado = $_POST['id_asignado'];
$id_usuario = $_POST['id_usuario'];
$tipo = "BASE";
$consecutivo = "";

$consulta_empresa = mysqli_prepare($connect,"SELECT a.sigla_empresa, a.sigla_pais, b.correlativo FROM empresa as a, item_asignado as b, item as c WHERE a.id_empresa = c.id_empresa AND c.id_item = b.id_item AND b.id_asignado  = ?");
mysqli_stmt_bind_param($consulta_empresa, 'i', $id_asignado);
mysqli_stmt_execute($consulta_empresa);
mysqli_stmt_store_result($consulta_empresa);
mysqli_stmt_bind_result($consulta_empresa, $sigla_empresa, $sigla_pais, $correlativo);
mysqli_stmt_fetch($consulta_empresa);

$consultar_informe = mysqli_prepare($connect, "SELECT id_informe FROM informes_general WHERE id_mapeo = ? AND id_asignado = ? AND tipo = ?");
mysqli_stmt_bind_param($consultar_informe, 'iis', $id_mapeo, $id_asignado, $tipo);
mysqli_stmt_execute($consultar_informe);
mysqli_stmt_store_result($consultar_informe);
mysqli_stmt_bind_result($consultar_informe, $id_informe);
mysqli_stmt_fetch($consultar_informe);

if(mysqli_stmt_num_rows($consultar_informe) > 0){
    echo "Existe";
}else{

    $consultar_consecutivo = mysqli_prepare($connect, "SELECT temp_hum FROM informes_general WHERE id_asignado = ? AND tipo = ?");
    mysqli_stmt_bind_param($consultar_consecutivo , 'is', $id_asignado, $tipo);
    mysqli_stmt_execute($consultar_consecutivo);
    mysqli_stmt_store_result($consultar_consecutivo);
    mysqli_stmt_bind_result($consultar_consecutivo , $temp_hum);
    mysqli_stmt_fetch($consultar_consecutivo);

    if(mysqli_stmt_num_rows($consultar_consecutivo) == 0){
        $consecutivo = "01";
    }else{
        if($temp_hum <= 9){
            $consecutivo = "0".$temp_hum;
        }else{
            $consecutivo = $temp_hum;
        }
    }

    $nombre_informe = $sigla_pais.'-'.$correlativo.'-'.$sigla_empresa.'-2022-HUM-'.$consecutivo;

    $insertando_informe = mysqli_prepare($connect,"INSERT INTO informes_general (nombre, temp_hum, tipo, id_mapeo, id_asignado, id_usuario) VALUES (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($insertando_informe, 'sisiii', $nombre_informe, $consecutivo, $tipo, $id_mapeo, $id_asignado, $id_usuario);
    mysqli_stmt_execute($insertando_informe);

    if($insertando_informe){
        echo "Listo";
    }else{
        echo "No";
    }
}
  
  
    
}else if($movimiento == "crear_ar"){

    $id_mapeo = $_POST['id_mapeo'];
    $id_asignado = $_POST['id_asignado'];
    $id_usuario = $_POST['id_usuario'];
    $tipo = "AR";
    $consecutivo = "";

    $consulta_empresa = mysqli_prepare($connect,"SELECT a.sigla_empresa, a.sigla_pais, b.correlativo FROM empresa as a, item_asignado as b, item as c WHERE a.id_empresa = c.id_empresa AND c.id_item = b.id_item AND b.id_asignado  = ?");
    mysqli_stmt_bind_param($consulta_empresa, 'i', $id_asignado);
    mysqli_stmt_execute($consulta_empresa);
    mysqli_stmt_store_result($consulta_empresa);
    mysqli_stmt_bind_result($consulta_empresa, $sigla_empresa, $sigla_pais, $correlativo);
    mysqli_stmt_fetch($consulta_empresa);

    $consultar_informe = mysqli_prepare($connect, "SELECT id_informe FROM informes_general WHERE id_mapeo = ? AND id_asignado = ? AND tipo = ?");
    mysqli_stmt_bind_param($consultar_informe, 'iis', $id_mapeo, $id_asignado, $tipo);
    mysqli_stmt_execute($consultar_informe);
    mysqli_stmt_store_result($consultar_informe);
    mysqli_stmt_bind_result($consultar_informe, $id_informe);
    mysqli_stmt_fetch($consultar_informe);

    if(mysqli_stmt_num_rows($consultar_informe) > 0){
        echo "Existe";
    }else{

        $consultar_consecutivo = mysqli_prepare($connect, "SELECT temp_hum FROM informes_general WHERE id_asignado = ? AND tipo = ?");
        mysqli_stmt_bind_param($consultar_consecutivo , 'is', $id_asignado, $tipo);
        mysqli_stmt_execute($consultar_consecutivo);
        mysqli_stmt_store_result($consultar_consecutivo);
        mysqli_stmt_bind_result($consultar_consecutivo , $temp_hum);
        mysqli_stmt_fetch($consultar_consecutivo);

        if(mysqli_stmt_num_rows($consultar_consecutivo) == 0){
            $consecutivo = "01";
        }else{
            if($temp_hum <= 9){
                $consecutivo = "0".$temp_hum;
            }else{
                $consecutivo = $temp_hum;
            }
        }
     
        $nombre_informe = $sigla_pais.'-'.$correlativo.'-'.$sigla_empresa.'-2022-AR-'.$consecutivo;

        $insertando_informe = mysqli_prepare($connect,"INSERT INTO informes_general (nombre, temp_hum, tipo, id_mapeo, id_asignado, id_usuario) VALUES (?,?,?,?,?,?)");
        mysqli_stmt_bind_param($insertando_informe, 'sisiii', $nombre_informe, $consecutivo, $tipo, $id_mapeo, $id_asignado, $id_usuario);
        mysqli_stmt_execute($insertando_informe);
        $id_informe = mysqli_stmt_insert_id($insertando_informe);

        if($insertando_informe){
            echo "Listo";
            $array_enunciado_1 = array('ÁREAS DE ACCESO:<br>Control de personas',
                                       'ÁREAS DE ACCESO:<br>Puertas',
                                       'INFRAESTRUCTURA:<br>Revestimiento del Techo',
                                       'INFRAESTRUCTURA:<br>Iluminación de la bodega',
                                       'INFRAESTRUCTURA:<br>Ventanas',
                                       'Equipos productivos/ climatización asistida cerca de área de almacenamiento. Ejemplo: calderas, cámaras frías.', 
                                      'Sistema de Climatización:<br>Interrupción por falla.',
                                       'Sistema de Climatización:<br>Calibración del seteo.',
                                       'Sistema de Climatización:<br>Desgaste y mantención.',
                                       'Personal y maquinaria');
          
            $gmp = "GMP";
            $descrpcion = "Descripción";
            $probabilidad = "NA";
            $impacto = "A";
            $clase = "1";
            $deteccion = "NA";
            $prioridad = "NA";
            $medidas = "Medidas";
            
            for($i = 0; $i <=9; $i++){
              
                  $isertando = mysqli_prepare($connect,"INSERT INTO analisis_riesgos (id_informe, num_riesgo, etapa, relevancia, descripcion, probabilidad, impacto, clase, deteccion, prioridad, medidas) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                  mysqli_stmt_bind_param($isertando, 'issssssssss', $id_informe,$i, $array_enunciado_1[$i], $gmp, $descrpcion, $probabilidad, $impacto, $clase, $deteccion, $prioridad, $medidas);
                  mysqli_stmt_execute($isertando);
            
  
            }
          
    
           
          
        }else{
            echo "No";
        }
    }

    
}else if($movimiento == "eliminar_informe"){

    $id_informe = $_POST['id_informe'];
    $consultando = mysqli_prepare($connect, "SELECT tipo FROM informes_general WHERE id_informe = ?");
    mysqli_stmt_bind_param($consultando, 'i', $id_informe);
    mysqli_stmt_execute($consultando);
    mysqli_stmt_store_result($consultando);
    mysqli_stmt_bind_result($consultando, $tipo);
    mysqli_stmt_fetch($consultando);
  
    if($tipo == "AR"){
        
      $consultando2 = mysqli_prepare($connect, "SELECT id FROM analisis_riesgos  WHERE id_informe = ?");
      mysqli_stmt_bind_param($consultando2, 'i', $id_informe);
      mysqli_stmt_execute($consultando2);
      mysqli_stmt_store_result($consultando2);
      mysqli_stmt_bind_result($consultando2, $id);
      
      while($row = mysqli_stmt_fetch($consultando2)){
        
        $eliminando = mysqli_prepare($connect,"DELETE FROM analisis_riesgos WHERE id = ?");
        mysqli_stmt_bind_param($eliminando, 'i', $id);;
        mysqli_stmt_execute($eliminando);
      }
      
      
      
    }

    $delete = mysqli_prepare($connect,"DELETE FROM informes_general WHERE id_informe = ?");
    mysqli_stmt_bind_param($delete, 'i', $id_informe);
    mysqli_stmt_execute($delete);

    if($delete){
        echo "Si";
    }else{
        echo "No";
    }



}else if($movimiento == "Consultar_temp"){

    $id_informe = $_POST['id_informe'];
    $array_informes=array();

        
    $consultar_informes = mysqli_prepare($connect,"SELECT comentario, observacion, tipo, solicitante FROM informes_general WHERE id_informe = ?");
    mysqli_stmt_bind_param($consultar_informes, 'i', $id_informe);
    mysqli_stmt_execute($consultar_informes);
    mysqli_stmt_store_result($consultar_informes);
    mysqli_stmt_bind_result($consultar_informes, $comentario, $observacion, $tipo, $solicitante);
    mysqli_stmt_fetch($consultar_informes);



    $consultar_imagenes_1 = mysqli_prepare($connect,"SELECT id_imagen, tipo, url FROM imagenes_general_informe WHERE id_informe = ? AND tipo = 1");
    mysqli_stmt_bind_param($consultar_imagenes_1, 'i', $id_informe);
    mysqli_stmt_execute($consultar_imagenes_1);
    mysqli_stmt_store_result($consultar_imagenes_1);
    mysqli_stmt_bind_result($consultar_imagenes_1, $id_imagen1, $tipo1, $url1);
    mysqli_stmt_fetch($consultar_imagenes_1);

    $consultar_imagenes_2 = mysqli_prepare($connect,"SELECT id_imagen, tipo, url FROM imagenes_general_informe WHERE id_informe = ? AND tipo = 2");
    mysqli_stmt_bind_param($consultar_imagenes_2, 'i', $id_informe);
    mysqli_stmt_execute($consultar_imagenes_2);
    mysqli_stmt_store_result($consultar_imagenes_2);
    mysqli_stmt_bind_result($consultar_imagenes_2, $id_imagen2, $tipo2, $url2);
    mysqli_stmt_fetch($consultar_imagenes_2);

    $consultar_imagenes_3 = mysqli_prepare($connect,"SELECT id_imagen, tipo, url FROM imagenes_general_informe WHERE id_informe = ? AND tipo = 3");
    mysqli_stmt_bind_param($consultar_imagenes_3, 'i', $id_informe);
    mysqli_stmt_execute($consultar_imagenes_3);
    mysqli_stmt_store_result($consultar_imagenes_3);
    mysqli_stmt_bind_result($consultar_imagenes_3, $id_imagen3, $tipo3, $url3);
    mysqli_stmt_fetch($consultar_imagenes_3);

    $array_informes[]=array(
        'id_informe'=>$id_informe,
        'comentario'=>$comentario,
        'observacion'=>$observacion,
        'id_imagen1'=>$id_imagen1,
        'tipo1'=>$tipo1,
        'url1'=>$url1,
        'id_imagen2'=>$id_imagen2,
        'tipo2'=>$tipo2,
        'url2'=>$url2, 
        'id_imagen3'=>$id_imagen3,
        'tipo3'=>$tipo3,
        'url3'=>$url3,
        'tipo_informe'=>$tipo,
        'solicitante'=>$solicitante
    );

    $convert = json_encode($array_informes);
    echo $convert;
    
}
else if($movimiento == "Consultar_ar"){
 
    $id_informe = $_POST['id_informe'];
    $array_informes=array();
    $tipo = "AR";
 
    $consultar_ar = mysqli_prepare($connect,"SELECT id, num_riesgo, etapa, relevancia, descripcion, probabilidad, impacto, clase, deteccion, prioridad, medidas FROM analisis_riesgos WHERE id_informe = ?");
    mysqli_stmt_bind_param($consultar_ar, 'i', $id_informe);
    mysqli_stmt_execute($consultar_ar);
    mysqli_stmt_store_result($consultar_ar);
    mysqli_stmt_bind_result($consultar_ar, $id, $num_riesgo, $etapa, $relevancia, $descripcion, $probabilidad, $impacto, $clase, $deteccion, $prioridad, $medidas);
    
    while($row = mysqli_stmt_fetch($consultar_ar)){
      
      $array_informes [] = array(
        'id_riesgo'=>$id,
        'num_riesgo'=>$num_riesgo,
        'etapa'=>$etapa,
        'relevancia'=>$relevancia,
        'descripcion'=>$relevancia,
        'probabilidad'=>$probabilidad,
        'impacto'=>$impacto,
        'clase'=>$clase,
        'deteccion'=>$deteccion,
        'prioridad'=>$prioridad,
        'medidas'=>$medidas,
        'tipo_informe'=>$tipo
      );
    }
  
  $convert = json_encode($array_informes);
  echo $convert;
    
}

else if($movimiento == "Consultar_base"){
 
    $id_informe = $_POST['id_informe'];
    $array_informes=array();
    $tipo = "BASE";
 
    $consultar_base = mysqli_prepare($connect,"SELECT comentario, acta_inspeccion FROM informes_general WHERE id_informe = ? AND tipo = ?");
    mysqli_stmt_bind_param($consultar_base, 'is', $id_informe, $tipo);
    mysqli_stmt_execute($consultar_base);
    mysqli_stmt_store_result($consultar_base);
    mysqli_stmt_bind_result($consultar_base, $comentario, $acta_inspeccion);
    mysqli_stmt_fetch($consultar_base);
  
    $array_informes[]=array('id_informe'=>$id_informe,'comentario'=>$comentario, 'tipo_informe'=>$tipo, 'acta_inspeccion'=>$acta_inspeccion);
    
  
    
    
    $convert = json_encode($array_informes);
    echo $convert;
    
}


else if($movimiento == "redireccion_informes"){

    $id_informe = $_POST['id_informe'];

    $consultar = mysqli_prepare($connect,"SELECT tipo FROM informes_general WHERE id_informe = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_informe);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $tipo);
    mysqli_stmt_fetch($consultar);

    echo $tipo;
    
}else if($movimiento == "mostrar_imagenes"){

    $id_informe = $_POST['id_informe'];
    $array_imagenes = array();
    
    $buscando_imagenes = mysqli_prepare($connect,"SELECT id_imagen, tipo, url FROM imagenes_general_informe WHERE id_informe = ? ORDER BY tipo ASC");
    mysqli_stmt_bind_param($buscando_imagenes, 'i', $id_informe);
    mysqli_stmt_execute($buscando_imagenes);
    mysqli_stmt_store_result($buscando_imagenes);
    mysqli_stmt_bind_result($buscando_imagenes, $id_imagen, $tipo, $url);
    
    while($row = mysqli_stmt_fetch($buscando_imagenes)){

        $array_imagenes[] = array(
            'id_imagen'=>$id_imagen,
            'tipo'=>$tipo,
            'url'=>$url,
            'id_informe'=>$id_informe
        );
    }

    $convert = json_encode($array_imagenes);
    echo $convert;

}

mysqli_close($connect);

?>