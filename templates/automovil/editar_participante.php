<?php 
include('../../config.ini.php');

$nombres =  $_POST['nombres'];
$apellidos =  $_POST['apellidos'];
$cargo =  $_POST['cargo'];
$id  = $_POST['id'];


$creando = mysqli_prepare($connect,"UPDATE informes_participante SET nombres = ? , apellido = ?, cargo = ? WHERE id_informe_participante = ?");
mysqli_stmt_bind_param($creando, 'sssi', $nombres, $apellidos, $cargo, $id);
mysqli_stmt_execute($creando);

if($creando){
  echo 1;
}else{
  echo 0;
}

mysqli_close($connect);
?>