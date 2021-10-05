<?php 
include('../../config.ini.php');

$dataURL = $_POST['dataURL']; 
$id = $_POST['id'];
$id_valida_usuario = $_POST['id_valida_usuario'];


$update = mysqli_prepare($connect,"UPDATE archivos_documentacion SET url = ? WHERE id = ?");
mysqli_stmt_bind_param($update, 'si', $dataURL, $id);
mysqli_stmt_execute($update);
 //echo mysqli_stmt_errno($update);
if($update){
  echo "Si";
  $firmante = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
  mysqli_stmt_bind_param($firmante, 'ii', $id, $id_valida_usuario);
  mysqli_stmt_execute($firmante);

}else{
  echo "No";
}


?>