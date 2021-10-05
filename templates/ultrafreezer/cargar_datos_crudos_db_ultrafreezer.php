<?php
    include("../../config.ini.php");

    $id_asignado = $_POST['parametro_a'];
    $id_bandeja = $_POST['parametro_b'];
    $id_mapeo = $_POST['parametro_c'];
    $id_valida = $_POST['parametro_d'];
    $json = array();
    

    $consultar_colum_1 = mysqli_prepare($connect,"SELECT a.id_dato_crudo, a.columna, a.time, a.temperatura FROM ultrafreezer_datos_crudos as a, ultrafreezer_sensor as b WHERE b.id_asignado = ? AND b.id_bandeja = ? AND b.id_mapeo = ? AND b.id_ultrafreezer_sensor = a.id_ultrafreezer_sensor");
    mysqli_stmt_bind_param($consultar_colum_1, 'iii', $id_asignado, $id_bandeja, $id_mapeo);
    mysqli_stmt_execute($consultar_colum_1);
    mysqli_stmt_store_result($consultar_colum_1);
    mysqli_stmt_bind_result($consultar_colum_1, $id_dato_crudo, $columna, $time, $temperatura);
    
    while($row = mysqli_stmt_fetch($consultar_colum_1)){
      $json[] = array(
      'id_dato_crudo'=>$id_dato_crudo,
      'columna'=>$columna,
      'time'=>$time,
      'temperatura'=>$temperatura  
      );
    }

      $convert = json_encode($json);
      echo $convert;
					
  mysqli_stmt_close($connect);
  ?>        