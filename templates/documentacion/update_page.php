<?php
include('../../config.ini.php');
$valor = $_POST['valor'];
$id = $_POST['id'];


$update = mysqli_prepare($connect,"UPDATE archivos_documentacion SET pagina = ? WHERE id = ?");
mysqli_stmt_bind_param($update, 'ii', $valor, $id);
mysqli_stmt_execute($update);

mysqli_stmt_close($update);
?>