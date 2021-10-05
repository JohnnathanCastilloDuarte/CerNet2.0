<?php 
  include("../../config.ini.php");

   $id_asignado = $_POST['id_asignado_freezer'];
    
    $primero = mysqli_prepare($connect , "SELECT id_asignado FROM freezer_mapeo WHERE id_asignado = ?");
    mysqli_stmt_bind_param($primero, 'i', $id_asignado);
    mysqli_stmt_execute($primero);
    mysqli_stmt_store_result($primero);
    mysqli_stmt_bind_result($primero, $id_asignado_1);
    mysqli_stmt_fetch($primero);

    $cuantos_primero = mysqli_stmt_num_rows($primero);


    $segundo = mysqli_prepare($connect , "SELECT id_asignado FROM informe_freezer WHERE id_asignado = ?");
    mysqli_stmt_bind_param($segundo, 'i', $id_asignado);
    mysqli_stmt_execute($segundo);
    mysqli_stmt_store_result($segundo);
    mysqli_stmt_bind_result($segundo, $id_asignado_2);
    mysqli_stmt_fetch($segundo);

    $cuantos_segundo = mysqli_stmt_num_rows($segundo);

    if ($cuantos_segundo == $cuantos_primero){
      echo "No";
    }else{
      echo "Si";
    }

    

?>