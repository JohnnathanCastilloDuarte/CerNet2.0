<?php
include('../../config.ini.php');

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cargo = $_POST['cargo'];
$id_asignado_automovil = $_POST['id_asignado_automovil'];


$primer = mysqli_prepare($connect,"SELECT id_servicio FROM item_asignado WHERE id_asignado = ?");
mysqli_stmt_bind_param($primer, 'i', $id_asignado_automovil);
mysqli_stmt_execute($primer);
mysqli_stmt_store_result($primer);
mysqli_stmt_bind_result($primer, $id_servicio);
mysqli_stmt_fetch($primer);


$segundo = mysqli_prepare($connect,"SELECT id_numot FROM servicio WHERE id_servicio = ?");
mysqli_stmt_bind_param($segundo , 'i', $id_servicio);
mysqli_stmt_execute($segundo);
mysqli_stmt_store_result($segundo);
mysqli_stmt_bind_result($segundo, $id_numot);
mysqli_stmt_fetch($segundo);


$insertando = mysqli_prepare($connect,"INSERT INTO informes_participante (nombres, apellido, cargo, id_numot) VALUES (?,?,?,?)");
mysqli_stmt_bind_param($insertando, 'sssi', $nombres, $apellidos, $cargo, $id_numot);
mysqli_stmt_execute($insertando);

if($insertando){
  echo 1;
}else{
  echo 0;
}

mysqli_close($connect);

?>