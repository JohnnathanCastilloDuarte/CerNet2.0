<?php 
   error_reporting(0);
   require('../../config.ini.php');

   $id_asignado = $_POST['id_asignado'];
   $nombres_personal = $_POST['nombres_personal'];
   $apellidos_personal = $_POST['apellidos_personal'];
   $cargo_personal = $_POST['cargo_personal'];


   $consultar_id_ot = mysqli_prepare($connect,"SELECT id_servicio FROM item_asignado WHERE id_asignado = ?");
   mysqli_stmt_bind_param($consultar_id_ot, 'i', $id_asignado);
   mysqli_stmt_execute($consultar_id_ot);
   mysqli_stmt_store_result($consultar_id_ot);
   mysqli_stmt_bind_result($consultar_id_ot, $id_servicio);
   mysqli_stmt_fetch($consultar_id_ot);


   $numot = mysqli_prepare($connect,"SELECT id_numot FROM servicio WHERE id_servicio = ? ");
   mysqli_stmt_bind_param($numot, 'i', $id_servicio);
   mysqli_stmt_execute($numot);
   mysqli_stmt_store_result($numot);
   mysqli_stmt_bind_result($numot, $id_numot);
   mysqli_stmt_fetch($numot);


 

   $insertando = mysqli_prepare($connect,"INSERT INTO informes_participante (nombres, apellido, cargo, id_numot) VALUES (?,?,?,?)");
   mysqli_stmt_bind_param($insertando, 'sssi', $nombres_personal, $apellidos_personal, $cargo_personal, $id_numot);
   mysqli_stmt_execute($insertando);


    if($insertando){
      echo "Creado";
    }else{
      echo "Error";
    }



?>