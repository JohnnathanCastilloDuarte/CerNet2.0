<?php 

//error_reporting(0);
include("../../config.ini.php");

$id_numot = $_POST['id_numot'];
$id_valida_usuario = $_POST['id_valida_usuario'];
$departmento = $_POST['departmento'];

$elaborador = 1;
$aprobador = 3;
$revisor = 2;


$creando = mysqli_prepare($connect, "INSERT INTO documentacion (id_numot, id_usuario, departamento) VALUES (?,?,?)");
mysqli_stmt_bind_param($creando, 'iis', $id_numot, $id_valida_usuario, $departmento);
mysqli_stmt_execute($creando);
$id_documentacion = mysqli_stmt_insert_id($creando);

if($creando){
  
  //// INSERTO EL DOCUMENTADOR
  $insertando_documentador = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
  mysqli_stmt_bind_param($insertando_documentador, 'ii', $id_documentacion, $id_valida_usuario);
  mysqli_stmt_execute($insertando_documentador);

  $insertando_documentador_participante = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol,  id_usuario) VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($insertando_documentador_participante, 'iiii', $id_valida_usuario, $id_documentacion, $elaborador, $id_valida_usuario);
  mysqli_stmt_execute($insertando_documentador_participante);


 
  $query_departamento = mysqli_prepare($connect,"SELECT a.id_usuario FROM control_departamento as a, departamento as b, persona as c WHERE a.id_departamento = b.id AND b.departamento = ? AND a.id_usuario = c.id_usuario AND c.cargo = 'Head'");
  mysqli_stmt_bind_param($query_departamento, 's', $departmento);
  mysqli_stmt_execute($query_departamento);
  mysqli_stmt_store_result($query_departamento);
  mysqli_stmt_bind_result($query_departamento, $usuarios);

  while($row = mysqli_stmt_fetch($query_departamento)){

    //// INSERTO EL HEAD
    $insertando_documentador = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
    mysqli_stmt_bind_param($insertando_documentador, 'ii', $id_documentacion, $usuarios);
    mysqli_stmt_execute($insertando_documentador);

    $insertando_head_participante = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol,  id_usuario) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($insertando_head_participante, 'iiii', $usuarios, $id_documentacion, $revisor, $id_valida_usuario);
    mysqli_stmt_execute($insertando_head_participante);
      
  }

 
  //// INSERTO CALIDAD 
  $consultar_calidad = mysqli_prepare($connect,"SELECT a.id_usuario FROM usuario as a, persona as b WHERE a.id_usuario = b.id_usuario AND cargo = 'Calidad' LIMIT 1");
  mysqli_stmt_execute($consultar_calidad);
  mysqli_stmt_store_result($consultar_calidad);
  mysqli_stmt_bind_result($consultar_calidad, $id_calidad);

  while($row = mysqli_stmt_fetch($consultar_calidad)){
    $insertando_gerentes = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
    mysqli_stmt_bind_param($insertando_gerentes, 'ii', $id_documentacion, $id_calidad);
    mysqli_stmt_execute($insertando_gerentes);

    $insertando_calidad_participante = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol,  id_usuario) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($insertando_calidad_participante, 'iiii', $id_calidad, $id_documentacion, $revisor, $id_valida_usuario);
    mysqli_stmt_execute($insertando_calidad_participante);
  }



 //// INSERTO CEO 
 $consultar_gerentes = mysqli_prepare($connect,"SELECT a.id_usuario FROM usuario as a, persona as b WHERE a.id_usuario = b.id_usuario AND cargo = 'CEO'");
 mysqli_stmt_execute($consultar_gerentes);
 mysqli_stmt_store_result($consultar_gerentes);
 mysqli_stmt_bind_result($consultar_gerentes, $id_gerentes);

 while($row = mysqli_stmt_fetch($consultar_gerentes)){
   $insertando_gerentes = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
   mysqli_stmt_bind_param($insertando_gerentes, 'ii', $id_documentacion, $id_gerentes);
   mysqli_stmt_execute($insertando_gerentes);

   $insertando_ceo_participante = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol,  id_usuario) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($insertando_ceo_participante, 'iiii', $id_gerentes, $id_documentacion, $aprobador, $id_valida_usuario);
    mysqli_stmt_execute($insertando_ceo_participante);
 }


  //// INSERTO COO 
  $consultar_gerentes2 = mysqli_prepare($connect,"SELECT a.id_usuario FROM usuario as a, persona as b WHERE a.id_usuario = b.id_usuario AND cargo = 'COO'");
  mysqli_stmt_execute($consultar_gerentes2);
  mysqli_stmt_store_result($consultar_gerentes2);
  mysqli_stmt_bind_result($consultar_gerentes2, $id_gerentes);
 
  while($row = mysqli_stmt_fetch($consultar_gerentes2)){
    $insertando_gerentes = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
    mysqli_stmt_bind_param($insertando_gerentes, 'ii', $id_documentacion, $id_gerentes);
    mysqli_stmt_execute($insertando_gerentes);

    $insertando_ceo_participante = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol,  id_usuario) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($insertando_ceo_participante, 'iiii', $id_gerentes, $id_documentacion, $aprobador, $id_valida_usuario);
    mysqli_stmt_execute($insertando_ceo_participante);
  }
  
} 

echo "Si";

  mysqli_close($connect);
?>