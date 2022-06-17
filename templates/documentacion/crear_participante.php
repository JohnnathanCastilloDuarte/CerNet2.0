<?php 
error_reporting(0);  
include("../../config.ini.php");
$seleccion = $_POST['seleccion'];


if($seleccion == 1){

  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $rol = $_POST['rol'];
  $empresa = $_POST['empresa'];
  $email = $_POST['email'];
  $id_valida_usuario = $_POST['id_valida_usuario'];
  $id_documentacion  = $_POST['id_documentacion'];
  $cargo = $_POST['cargo'];
  $departamento = $_POST['departamento'];

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
  $password = md5('C3rC4L_Cl1EnT3');
  
  $insert_1 = mysqli_prepare($connect,"INSERT INTO usuario (usuario, password, id_privilegio, id_rol) VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($insert_1, 'ssii', $usuario, $password, $id_privilegio, $id_rol);
  mysqli_stmt_execute($insert_1);
 
  $conocer_1 = mysqli_prepare($connect,"SELECT id_usuario FROM usuario ORDER BY fecha_registro DESC LIMIT 1");
  mysqli_stmt_execute($conocer_1);
  mysqli_stmt_store_result($conocer_1);
  mysqli_stmt_bind_result($conocer_1, $id);
  mysqli_stmt_fetch($conocer_1);
  
 
  //////////// VALIDACIÓN DEL DEPARTAMENTO 
  $id_departamento = "";
  $consultar_depto = mysqli_prepare($connect,"SELECT id FROM departamento WHERE departamento = ?");
  mysqli_stmt_bind_param($consultar_depto, 's', $departamento);
  mysqli_stmt_execute($consultar_depto);
  mysqli_stmt_store_result($consultar_depto);
  mysqli_stmt_bind_result($consultar_depto, $id_departamento);
  mysqli_stmt_fetch($consultar_depto);
  

  if(mysqli_stmt_num_rows($consultar_depto) == 0){
    $crear_depto = mysqli_prepare($connect,"INSERT INTO departamento (departamento) VALUES (?)");
    mysqli_stmt_bind_param($crear_depto, 's', $departamento);
    mysqli_stmt_execute($crear_depto);
    $id_departamento = mysqli_stmt_insert_id($crear_depto);
  }
  $id_cargo = "";
  $consultar_cargo = mysqli_prepare($connect,"SELECT id_cargo FROM cargo WHERE nombre = ? AND id_departamento = ?");
  mysqli_stmt_bind_param($consultar_cargo, 'si', $cargo, $id_departamento);
  mysqli_stmt_execute($consultar_cargo);
  mysqli_stmt_store_result($consultar_cargo);
  mysqli_stmt_bind_result($consultar_cargo, $id_cargo);
  mysqli_stmt_fetch($consultar_cargo);
  
  if(mysqli_stmt_num_rows($consultar_cargo) == 0){
    
    $creando_cargo = mysqli_prepare($connect,"INSERT INTO cargo (nombre, id_departamento) VALUES (?,?)");
    mysqli_stmt_bind_param($creando_cargo, 'si', $cargo, $id_departamento);
    mysqli_stmt_execute($creando_cargo);
    $id_cargo = mysqli_stmt_insert_id($creando_cargo);
  }
  
  


  $insert_2 = mysqli_prepare($connect, "INSERT INTO persona (id_usuario, nombre, apellido, email, id_empresa, id_cargo) VALUES (?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insert_2, 'isssii', $id, $nombres, $apellidos, $email, $empresa, $id_cargo);
  mysqli_stmt_execute($insert_2);
  
  if($insert_2){
    $creando = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol, id_usuario)
                                      VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($creando, 'iiii', $id, $id_documentacion, $rol, $id_valida_usuario);
    mysqli_stmt_execute($creando);

    if($creando){
      echo "Creado";
    }else{
      echo "Error ".mysqli_stmt_error($creando);
    }
  }else{
    echo "Error ".mysqli_stmt_error($insert_2);
  }
  
  

}else{

  $rol = $_POST['rol'];
  $id_valida_usuario = $_POST['id_valida_usuario'];
  $id_documentacion = $_POST['id_documentacion'];
  $id_persona_oculto = $_POST['id_persona_oculto'];

 $creando = mysqli_prepare($connect,"INSERT INTO participante_documentacion (id_persona, id_documentacion, rol, id_usuario)
                                    VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($creando, 'iiii', $id_persona_oculto, $id_documentacion, $rol, $id_valida_usuario);
  mysqli_stmt_execute($creando);

  if($creando){
    echo "Creado";
  }else{
    echo "Error ".mysqli_stmt_error($creando);
  }
  
  
} 
mysqli_stmt_close($connect); 
?>   