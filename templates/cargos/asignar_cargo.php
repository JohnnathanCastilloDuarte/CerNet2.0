<?php
error_reporting(0);
include('../../config.ini.php');

$usuario = $_POST['usuario'];
$cargo = $_POST['cargo'];
$departamento = $_POST['departamento'];



$consultando = mysqli_prepare($connect,"SELECT id_persona FROM persona WHERE id_usuario = ?");
mysqli_stmt_bind_param($consultando, 'i', $usuario);
mysqli_stmt_execute($consultando);
mysqli_stmt_store_result($consultando);
mysqli_stmt_bind_result($consultando, $id_persona);
mysqli_stmt_fetch($consultando);
echo mysqli_stmt_error($consultando);

$actulizar = mysqli_prepare($connect,"UPDATE persona SET id_cargo = ? WHERE id_persona = ?");
mysqli_stmt_bind_param($actulizar, 'si', $cargo, $id_persona);
mysqli_stmt_execute($actulizar);


if($actulizar){
  echo "Listo";
}
mysqli_stmt_close($connect);
?>