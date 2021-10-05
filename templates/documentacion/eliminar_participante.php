<?php 
include("../../config.ini.php");

$id_participante = $_POST['id_participante'];
$id_documentacion = $_POST['id_documentacion'];


$eliminando = mysqli_prepare($connect,"DELETE FROM participante_documentacion WHERE id = ? AND id_documentacion = ?");
mysqli_stmt_bind_param($eliminando, 'ii', $id_participante, $id_documentacion);
mysqli_stmt_execute($eliminando);

if($eliminando){
  echo "Si";
}
mysqli_stmt_close($connect);
?>