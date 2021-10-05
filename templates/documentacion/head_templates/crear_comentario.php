<?php
include('../../../config.ini.php');

$person = $_POST['person'];
$comentario = $_POST['comentario'];
$doc = $_POST['doc'];

$crear = mysqli_prepare($connect,"INSERT INTO comentarios_documentacion (id_documento, id_persona, comentario) VALUES (?,?,?)");
mysqli_stmt_bind_param($crear, 'iis', $doc, $person, $comentario);
mysqli_stmt_execute($crear);
echo mysqli_stmt_error($crear);
if($crear){
  echo "Si";
}else{
  echo "No";
}
mysqli_stmt_close($connect);
?>