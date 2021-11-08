<?php 
  include("../../config.ini.php");

   $id = $_POST['id'];
   $id_bandeja = $_POST['id_bandeja'];
   $valor = $_POST['valor'];
   $id_mapeo_f = $_POST['id_mapeo_f'];

    $validar = mysqli_prepare($connect,"SELECT id_estufaeincubadora_sensor FROM estufaeincubadora_sensor WHERE id_bandeja = ? AND id_mapeo = ? AND posicion = ? ");
    mysqli_stmt_bind_param($validar, 'iii', $id_bandeja, $id_mapeo_f, $valor);
    mysqli_stmt_execute($validar);
    mysqli_stmt_store_result($validar);
    mysqli_stmt_bind_result($validar, $id_estufaeincubadora);
    
   if(mysqli_stmt_num_rows($validar)>0){
     echo "No";
   }else{
     $update = mysqli_prepare($connect,"UPDATE estufaeincubadora_sensor SET posicion = ? WHERE id_estufaeincubadora_sensor = ?");
     mysqli_stmt_bind_param($update, 'ii', $valor, $id);
     mysqli_stmt_execute($update);
     
      if($update){
        echo "Si";
      }
   }
mysqli_stmt_close($connect);
?>