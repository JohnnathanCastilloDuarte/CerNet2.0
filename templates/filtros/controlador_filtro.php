<?php
include('../../config.ini.php');


  $tipo = $_POST['tipo'];
  $id_asignado_filtro = $_POST['id_asignado_filtro'];





  if($tipo == "Guardar"){

    $inpeccion_visual_array = $_POST['inpeccion_visual_array'];
    $detalles_mediciones_array_a = $_POST['detalles_mediciones_array_a'];
    $detalles_mediciones_array_aa = $_POST['detalles_mediciones_array_aa'];
    $detalles_mediciones_array_b = $_POST['detalles_mediciones_array_b'];
    $detalles_mediciones_array_bb = $_POST['detalles_mediciones_array_bb'];
    $detalles_mediciones_array_c = $_POST['detalles_mediciones_array_c'];
    $detalles_mediciones_array_cc = $_POST['detalles_mediciones_array_cc'];
    $detalles_mediciones_array_d = $_POST['detalles_mediciones_array_d'];
    $detalles_mediciones_array_dd = $_POST['detalles_mediciones_array_dd'];
    $valor_obtenido_filtros = $_POST['valor_obtenido_filtros'];
    $veredicto = "";


       /*
        $insertar_primera_parte = mysqli_prepare($connect,"INSERT INTO informe_filtro(insp1, insp2, insp3, insp4, insp5, insp6, id_asignado) VALUES
                                                     (?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($insertar_primera_parte, 'ssssssi', $inspeccion_visual_array[0], $inspeccion_visual_array[1], $inspeccion_visual_array[2],
                                                                   $inspeccion_visual_array[3], $inspeccion_visual_array[4], $inspeccion_visual_array[5], $id_asignado_filtro);
        mysqli_stmt_execute($insertar_primera_parte);

        $id_informe = mysqli_stmt_insert_id($insertar_primera_parte);
      */


        $buscando_dato = mysqli_prepare($connect,"SELECT limite_penetracion FROM item_asignado as a, item_filtro as b WHERE a.id_asignado = ? AND a.id_item = b.id_item");
        mysqli_stmt_bind_param($buscando_dato, 'i', $id_asignado_filtro);
        mysqli_stmt_execute($buscando_dato);
        mysqli_stmt_store_result($buscando_dato);
        mysqli_stmt_bind_result($buscando_dato, $penetracion);
        mysqli_stmt_fetch($buscando_dato);


       
        for($i = 0; $i  < count($valor_obtenido_filtros); $i++){
          $limite =  str_replace(',','.',$penetracion);
          $recibe =  str_replace(',','.',$valor_obtenido_filtros[$i]);

          
          $limite_convert =  (float)$limite;  
          $recibe_convert =  (float)$recibe; 

          if($recibe_convert <= $limite_convert){
              $veredicto = "Cumple";
          }else{
              $veredicto = "No cumple";
          }

          $recibe_inserta = strval($recibe_convert);

          $nombre_filtro = "Filtro #".$i;
          
          $insertar_segunda_parte = mysqli_prepare($connect,"INSERT INTO  filtro_mediciones_1 (valor_obtenido ,  veredicto ,  nombre_filtro ,  id_informe) VALUES
          (?,?,?,?)");
          mysqli_stmt_bind_param($insertar_segunda_parte, 'sssi', $recibe_inserta, $veredicto, $nombre_filtro, $id_informe)

        }

        
        /*
       
        */





  }

?>