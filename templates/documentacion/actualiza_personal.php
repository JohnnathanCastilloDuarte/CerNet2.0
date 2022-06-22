<?php   
include("../../config.ini.php");

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$rol = $_POST['rol'];
$empresa = $_POST['empresa'];
$email = $_POST['email'];
$id_participante  = $_POST['id_participante'];
$id_documentacion = $_POST['id_documentacion']; 
$cargo = $_POST['cargo'];

$actualizando = mysqli_prepare($connect,"UPDATE persona SET  nombre = ?, apellido = ?, id_empresa = ?, email = ?, cargo = ?
                                         WHERE id_persona  = ?");
mysqli_stmt_bind_param($actualizando, 'ssissi', $nombres, $apellidos, $empresa, $email, $cargo, $id_participante);
mysqli_stmt_execute($actualizando);
//echo mysqli_stmt_error($actualizando);


$buscar = mysqli_prepare($connect,"SELECT id_usuario FROM persona WHERE id_persona = ?");
mysqli_stmt_bind_param($buscar, 'i', $id_participante);
mysqli_stmt_execute($buscar);
mysqli_stmt_store_result($buscar);
mysqli_stmt_bind_result($buscar, $id_usuario);
mysqli_stmt_fetch($buscar);



if($actualizando){
  $actualizando1 = mysqli_prepare($connect,"UPDATE participante_documentacion SET  rol = ?  WHERE id_persona  = ? AND id_documentacion  = ?");
  mysqli_stmt_bind_param($actualizando1, 'iii', $rol, $id_usuario, $id_documentacion);
  mysqli_stmt_execute($actualizando1);
  
  if($actualizando1){
    echo "Si";
  }else{
    echo "No";
  }
}else{
  echo "No";
}
  
mysqli_stmt_close($connect);    
?>   