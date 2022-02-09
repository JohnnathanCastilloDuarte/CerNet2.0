<?php 
include('../../config.ini.php');


    $id_inspeccion = $_POST['id_inspeccion'];
    $id_asignado_campana = $_POST['id_asignado_campana'];
    $inspeccion_visual_1 = $_POST['inspeccion_visual_1'];
    $inspeccion_visual_2 = $_POST['inspeccion_visual_2'];
    $inspeccion_visual_3 = $_POST['inspeccion_visual_3'];
    $inspeccion_visual_4 = $_POST['inspeccion_visual_4'];
    $inspeccion_visual_5 = $_POST['inspeccion_visual_5'];
    $nombre_informe = $_POST['nombre_informe'];
    $id_prueba_1 = $_POST['id_prueba_1'];
    $requisito = $_POST['requisito'];
    $valor_obtenido = $_POST['valor_obtenido'];
    $veredicto = $_POST['veredicto'];
    $si = 0;


    $consulta = mysqli_prepare($connect,"SELECT id_informe FROM campana_extraccion_inspeccion WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consulta, 's', $tipo_1);
    mysqli_stmt_execute($consulta);
    mysqli_stmt_store_result($consulta);
    mysqli_stmt_bind_result($consulta, $id_informe);
    mysqli_stmt_fetch($consulta);


    if ($id_informe == '') {

     $insert_inspeccion = mysqli_prepare($connect,"INSERT INTO campana_extraccion_inspeccion (id_asignado, insp_1, insp_2, insp_3, insp_4, insp_5) VALUES (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($insert_inspeccion, 'isssss', $id_asignado_campana, $inspeccion_visual_1, $inspeccion_visual_2, $inspeccion_visual_3, $inspeccion_visual_4, $inspeccion_visual_5);
    mysqli_stmt_execute($insert_inspeccion);
  echo mysqli_stmt_error($insert_inspeccion);

  $insert_inspeccion = mysqli_prepare($connect,"INSERT INTO informe_campana ( id_asignado, conclucion, nombre_informe, usuario_responsable) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($insert_inspeccion, 'isss', $id_asignado_campana, $conclucion, $nombre_informe, $usuario_responsable);
    mysqli_stmt_execute($insert_inspeccion);
  echo mysqli_stmt_error($insert_inspeccion);

    }else{
               $insert_inspeccion = mysqli_prepare($connect,"UPDATE campana_extraccion_inspeccion SET insp_1 = ?, insp_2 = ?, insp_3 = ?, insp_4 = ?, insp_5 = ? WHERE id_informe = ?");
    mysqli_stmt_bind_param($insert_inspeccion, 'sssssi', $inspeccion_visual_1, $inspeccion_visual_2, $inspeccion_visual_3, $inspeccion_visual_4, $inspeccion_visual_5, $id_informe);
    mysqli_stmt_execute($insert_inspeccion);
        
    }

    //echo $id_asignado;

    if($insert_inspeccion){
        
            for($i = 0; $i < count($id_prueba_1); $i++){
                
                $actualizar_2 = mysqli_prepare($connect, "UPDATE campana_extraccion_prueba_1 SET requisito = ?, valor_obtenido = ?, veredicto = ? WHERE id_prueba = ?");
                mysqli_stmt_bind_param($actualizar_2, 'sssi', $requisito[$i], $valor_obtenido[$i], $veredicto[$i], $id_prueba_1[$i]);
                mysqli_stmt_execute($actualizar_2);

                if($actualizar_2){
                    $si++;
                }
            }
         
            if($si  == count($id_prueba_1)){
                echo "Listo";
            }else{
                echo "Error interno";
            } 

    }else{
        echo "Error ".$id_inspeccion;
    }


mysqli_close($connect);
?>