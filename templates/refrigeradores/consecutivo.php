<?php 
include("../../config.ini.php");

$seleccion = $_POST['seleccion'];

switch($seleccion){
  case 1:
      $id_asignado = $_POST['id_asignado'];
      $query1 = mysqli_prepare($connect,'SELECT correlativo FROM item_asignado WHERE id_asignado = ?');
      mysqli_stmt_bind_param($query1, 'i', $id_asignado);
      mysqli_stmt_execute($query1);
      mysqli_stmt_store_result($query1);
      mysqli_stmt_bind_result($query1, $correlativo);
      mysqli_stmt_fetch($query1);
    
      echo $correlativo;
      
    break;
    
  case 2:
      $id_asignado = $_POST['id_asignado'];
      $consecutivo = $_POST['consecutivo'];
      
       $query1 = mysqli_prepare($connect,'UPDATE item_asignado SET correlativo = ? WHERE id_asignado = ?');
       mysqli_stmt_bind_param($query1, 'si', $consecutivo, $id_asignado);
       mysqli_stmt_execute($query1);
    
      if(mysqli_stmt_affected_rows($query1) > 0){
        echo "Si";
      }else{
        echo "No";
      }
      
    
    break;
      
}


?>