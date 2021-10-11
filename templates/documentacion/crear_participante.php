<?php 
error_reporting(0);  
include("../../config.ini.php");
$seleccion = $_POST['seleccion'];

echo $seleccion;

if($seleccion == 1){
 
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $rol = $_POST['rol'];
  $empresa = $_POST['empresa'];
  $email = $_POST['email'];
  $id_valida_usuario = $_POST['id_valida_usuario'];
  $id_documentacion  = $_POST['id_documentacion'];
  $cargo = $_POST['cargo'];

  $inicial_usuario = substr($nombres,0,1);
  $final_usuario = "";
  $n = strpos($apellidos," "); 
 
  
  if($n != ""){
     $final_usuario = substr($apellidos,0, $n);
  }else{
    $final_usuario = $apellidos;
  }
  $usuario = $inicial_usuario.$final_usuario;  
  
  
  $i = 1;
  $contador = 1;

  for($i = 1; $i > $j; $i++){
      $validar = mysqli_prepare($connect, "SELECT id_usuario FROM usuario WHERE usuario = ?");
      mysqli_stmt_bind_param($validar, 's', $usuario);
      mysqli_stmt_execute($validar);
      mysqli_stmt_store_result($validar);
      mysqli_stmt_bind_result($validar, $id_f);
      mysqli_stmt_fetch($validar); 
        if(mysqli_stmt_num_rows($validar) == 1){
          $usuario = $usuario.$i;
        }else{   
          break;
       }
  }
  

  
  $id_privilegio = 6;
  $id_rol = 5;
  $password = md5(123);
  
  $insert_1 = mysqli_prepare($connect,"INSERT INTO usuario (usuario, password, id_privilegio, id_rol) VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($insert_1, 'ssii', $usuario, $password, $id_privilegio, $id_rol);
  mysqli_stmt_execute($insert_1);
 
  $conocer_1 = mysqli_prepare($connect,"SELECT id_usuario FROM usuario ORDER BY fecha_registro DESC LIMIT 1");
  mysqli_stmt_execute($conocer_1);
  mysqli_stmt_store_result($conocer_1);
  mysqli_stmt_bind_result($conocer_1, $id);
  mysqli_stmt_fetch($conocer_1);
  
 

  $insert_2 = mysqli_prepare($connect, "INSERT INTO persona (id_usuario, nombre, apellido, email, id_empresa, cargo) VALUES (?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insert_2, 'isssis', $id, $nombres, $apellidos, $email, $empresa, $cargo);
  mysqli_stmt_execute($insert_2);
  
  $creando = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol, id_usuario)
                                    VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($creando, 'iiii', $id, $id_documentacion, $rol, $id_valida_usuario);
  mysqli_stmt_execute($creando);

}else{
    $rol = $_POST['rol'];
    $id_valida_usuario = $_POST['id_valida_usuario'];
    $id_documentacion = $_POST['id_documentacion'];
    $id_persona_oculto = $_POST['id_persona_oculto'];
  
 $consultar = mysqli_prepare($connect,"SELECT id_usuario FROM persona WHERE id_persona = ?");
 mysqli_stmt_bind_param($consultar, 'i', $id_persona_oculto);
 mysqli_stmt_execute($consultar);
 mysqli_stmt_store_result($consultar);
 mysqli_stmt_bind_result($consultar, $id_usuario);
 mysqli_stmt_fetch($consultar); 
 echo mysqli_stmt_error($consultar);
  
 $creando = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol, id_usuario)
                                    VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($creando, 'iiii', $id_usuario, $id_documentacion, $rol, $id_valida_usuario);
  mysqli_stmt_execute($creando);
  echo mysqli_stmt_error($creando);
  
  
} 
mysqli_stmt_close($connect); 
?>   