<?php 
include("../../config.ini.php");
     $id_asignado = $_POST['id_asignado'];
     $id_bandeja = $_POST['id_bandeja'];
     $id_mapeo = $_POST['id_mapeo'];

      $si = 0;
   

    $consultar_colum_1 = mysqli_prepare($connect,"SELECT a.id_dato_crudo FROM ultrafreezer_datos_crudos as a, ultrafreezer_sensor as b WHERE b.id_asignado = ? AND b.id_bandeja = ? AND b.id_mapeo = ? AND b.id_ultrafreezer_sensor = a.id_ultrafreezer_sensor");
    mysqli_stmt_bind_param($consultar_colum_1, 'iii', $id_asignado, $id_bandeja, $id_mapeo);
    mysqli_stmt_execute($consultar_colum_1);
    mysqli_stmt_store_result($consultar_colum_1);
    mysqli_stmt_bind_result($consultar_colum_1, $id_dato_crudo);

    while($row = mysqli_stmt_fetch($consultar_colum_1)){
      
      $eliminando = mysqli_prepare($connect,"DELETE FROM ultrafreezer_datos_crudos WHERE id_dato_crudo = ?");
      mysqli_stmt_bind_param($eliminando, 'i', $id_dato_crudo);
      mysqli_stmt_execute($eliminando);
      
      if($eliminando){
        $si = $si + 1;
      }
      
    }

    echo $si;


mysqli_stmt_close($connect);
?>