<?php
include('../../config.ini.php');

$id_participante = $_POST['id_participante'];


$validar = mysqli_prepare($connect,"SELECT b.email FROM participante_documentacion as a, persona as b WHERE a.id_persona = b.id_usuario AND a.id = ?");
mysqli_stmt_bind_param($validar, 'i', $id_participante);
mysqli_stmt_execute($validar);
mysqli_stmt_store_result($validar);
mysqli_stmt_bind_result($validar, $email);
mysqli_stmt_fetch($validar);

echo $email;

mysqli_stmt_close($validar);
?>