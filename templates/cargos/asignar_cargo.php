<?php
error_reporting(0);
include('../../config.ini.php');

$usuario = $_POST['usuario'];
$cargo = $_POST['cargo'];
$departamento = $_POST['departamento'];
$rol_informe = $_POST['rol_informe'];



$ingresando = mysqli_prepare($connect,"SELECT id FROM control_departamento WHERE id_usuario = ?");
mysqli_stmt_bind_param($ingresando, 'i', $usuario);
mysqli_stmt_execute($ingresando);
mysqli_stmt_store_result($ingresando);
mysqli_stmt_bind_result($ingresando, $id_depto_control);
echo mysqli_stmt_error($ingresando);

$consultando = mysqli_prepare($connect,"SELECT id_persona FROM persona WHERE id_usuario = ?");
mysqli_stmt_bind_param($consultando, 'i', $usuario);
mysqli_stmt_execute($consultando);
mysqli_stmt_store_result($consultando);
mysqli_stmt_bind_result($consultando, $id_persona);
mysqli_stmt_fetch($consultando);
echo mysqli_stmt_error($consultando);

$actulizar = mysqli_prepare($connect,"UPDATE persona SET cargo = ? WHERE id_persona = ?");
mysqli_stmt_bind_param($actulizar, 'si', $cargo, $id_persona);
mysqli_stmt_execute($actulizar);

$actualizar_usuario  = mysqli_prepare($connect,"UPDATE usuario SET rol_informes = ? WHERE id_usuario = ?");
mysqli_stmt_bind_param($actualizar_usuario, 'si', $rol_informe, $usuario);
mysqli_stmt_execute($actualizar_usuario);

if($actulizar){
  if(mysqli_stmt_num_rows($ingresando) != 0){
    
      $actulizando = mysqli_prepare($connect,"UPDATE control_departamento SET id_departamento = ? WHERE id = ?");
      mysqli_stmt_bind_param($actulizando, 'ii', $departamento, $id_depto_control);
      mysqli_stmt_execute($actulizando);
      echo mysqli_stmt_error($actulizando);
      if($actulizando){
        echo "Listo";
      }
  }else{
    $creando = mysqli_prepare($connect,"INSERT INTO control_departamento (id_departamento, id_usuario) VALUES (?,?)");
    mysqli_stmt_bind_param($creando, 'ii', $departamento, $usuario);
    mysqli_stmt_execute($creando);
    echo mysqli_stmt_error($ingresando);
    
    if($creando){
      echo "listo";
    }
  }  
}
mysqli_stmt_close($connect);
?>