<?php 
include("../../config.ini.php");

$id_participante = $_POST['id_participante'];
$valor = $_POST['valor'];


$change = mysqli_prepare($connect,"UPDATE participante_documentacion SET orden = ? WHERE id = ?");
mysqli_stmt_bind_param($change, 'ii', $valor, $id_participante);
mysqli_stmt_execute($change);

if($change){
    echo "Listo";
}else{
    echo "Error";
}


mysqli_close($connect);
?>