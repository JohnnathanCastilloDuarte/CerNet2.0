<?php 

error_reporting(0);
include("../../config.ini.php");

$id_numot = $_POST['id_numot'];
$id_valida_usuario = $_POST['id_valida_usuario'];
$departmento = $_POST['departmento'];

$creando = mysqli_prepare($connect, "INSERT INTO documentacion (id_numot, id_usuario, departamento) VALUES (?,?,?)");
mysqli_stmt_bind_param($creando, 'iis', $id_numot, $id_valida_usuario, $departmento);
mysqli_stmt_execute($creando);
$id_documentacion = mysqli_stmt_insert_id($creando);

if($creando){
   /*
  //// INSERTO EL DOCUMENTADOR
  $insertando_documentador = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
  mysqli_stmt_bind_param($insertando_documentador, 'ii', $id_documentacion, $id_valida_usuario);
  mysqli_stmt_execute($insertando_documentador);
 

 
  //// INSERTO HEAD
  $consultar_datos_cronograma  = mysqli_prepare($connect,"SELECT b.id_usuario, c.id_rol FROM departamento as a, control_departamento as b, usuario as c WHERE a.id = b.id_departamento AND a.departamento = ? AND b.id_usuario = c.id_usuario");
  mysqli_stmt_bind_param($consultar_datos_cronograma, 's', $departmento);
  mysqli_stmt_execute($consultar_datos_cronograma);
  mysqli_stmt_store_result($consultar_datos_cronograma);
  mysqli_stmt_bind_result($consultar_datos_cronograma, $usuarios, $rol);

  while($row = mysqli_stmt_fetch($consultar_datos_cronograma)){

      if($rol != 5 || $rol != 3 || $rol != 7){
        $insertando_demas = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
        mysqli_stmt_bind_param($insertando_demas, 'ii', $id_documentacion, $usuarios);
        mysqli_stmt_execute($insertando_demas);  
      }
     

  }

  //// INSERTO CALIDAD 
  $consultar_calidad = mysqli_prepare($connect,"SELECT id_usuario FROM usuario WHERE id_rol = 9 LIMIT 1");
  mysqli_stmt_execute($consultar_calidad);
  mysqli_stmt_store_result($consultar_calidad);
  mysqli_stmt_bind_result($consultar_calidad, $id_calidad);

  while($row = mysqli_stmt_fetch($consultar_calidad)){
    $insertando_gerentes = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
    mysqli_stmt_bind_param($insertando_gerentes, 'ii', $id_documentacion, $id_calidad);
    mysqli_stmt_execute($insertando_gerentes);
  }



  //// INSERTO EL GERENTES
  $consultar_gerentes = mysqli_prepare($connect,"SELECT id_usuario FROM usuario WHERE  id_rol = 10");
  mysqli_stmt_execute($consultar_gerentes);
  mysqli_stmt_store_result($consultar_gerentes);
  mysqli_stmt_bind_result($consultar_gerentes, $id_gerentes);

  while($row = mysqli_stmt_fetch($consultar_gerentes)){
  $insertando_gerentes = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
  mysqli_stmt_bind_param($insertando_gerentes, 'ii', $id_documentacion, $id_gerentes);
  mysqli_stmt_execute($insertando_gerentes);
  }
  */
}  

echo "Si";

  mysqli_close($connect);
?>