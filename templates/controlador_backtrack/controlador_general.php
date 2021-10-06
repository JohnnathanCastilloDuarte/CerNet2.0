<?php
    include("../../config.ini.php");

    $quien = $_POST['quien'];
    $movimiento = $_POST['movimiento'];
    $modulo = $_POST['modulo'];

    /////////// REGISTRANDO EL MOVIMIENTO EN LA DB
    $insertando = mysqli_prepare($connect,"INSERT INTO backtrack (persona, movimiento, modulo) VALUES (?,?,?)");
    mysqli_stmt_bind_param($insertando, 'iss', $quien, $movimiento, $modulo);
    mysqli_stmt_execute($insertando);
    
    if($insertando){
      echo "Listo";
    }else{
      echo "error";
    }

  mysqli_close($connect);
?>