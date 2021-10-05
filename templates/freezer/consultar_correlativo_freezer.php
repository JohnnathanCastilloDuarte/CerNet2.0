<?php 
	include("../../config.ini.php");

   $x = $_POST['x'];


   $consultar = mysqli_prepare($connect,"SELECT correlativo FROM item_asignado WHERE id_asignado = ?");
   mysqli_stmt_bind_param($consultar, 'i', $x);
   mysqli_stmt_execute($consultar);
   mysqli_stmt_store_result($consultar);
   mysqli_stmt_bind_result($consultar, $correlativo);

    
   $json = array();


    while($row = mysqli_stmt_fetch($consultar)){
      
      $json[] = array(
      
        'correlativo' => $correlativo
      );
    }

    $convert = json_encode($json[0]);

    echo $convert;

  mysqli_close($connect);
?>