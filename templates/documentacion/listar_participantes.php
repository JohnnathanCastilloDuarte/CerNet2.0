<?php 
error_reporting(0);
include("../../config.ini.php");

$id_documentacion = $_POST['id_documentacion'];
$seleccion = $_POST['seleccion'];


if($seleccion == 1){
  $json = array();
  
  $consultar = mysqli_prepare($connect,"SELECT a.id, b.nombre, b.apellido, b.email, a.rol, c.nombre, b.id_usuario, a.orden FROM participante_documentacion as a, persona as b, empresa as c WHERE b.id_empresa = c.id_empresa AND a.id_documentacion = ? AND a.id_persona = b.id_usuario ORDER BY b.nombre ASC");
  mysqli_stmt_bind_param($consultar, 'i', $id_documentacion);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_participante, $nombres, $apellidos, $email, $rol, $empresa, $id_usuario, $orden);
  
  while($row = mysqli_stmt_fetch($consultar)){
    $json[] = array(
      'id_participante'=>$id_participante,
      'nombres'=>$nombres,
      'apellidos'=>$apellidos,
      'email'=>$email,
      'rol'=>$rol,
      'empresa'=>$empresa,
      'id_usuario'=>$id_usuario,
      'orden_firma'=>$orden
    );
  }
  
  $convert = json_encode($json);
  echo $convert;
}

else if($seleccion == 2){
  $json = array();
  
  $consultar = mysqli_prepare($connect,"SELECT a.id, b.nombre, b.apellido, b.email, a.rol, c.nombre, b.id_usuario, a.orden FROM participante_documentacion as a, persona as b, empresa as c WHERE b.id_empresa = c.id_empresa AND a.id_documentacion = ? AND a.id_persona = b.id_usuario ORDER BY a.orden ASC");
  mysqli_stmt_bind_param($consultar, 'i', $id_documentacion);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_participante, $nombres, $apellidos, $email, $rol, $empresa, $id_usuario, $orden);
  
  while($row = mysqli_stmt_fetch($consultar)){
    $json[] = array(
      'id_participante'=>$id_participante,
      'nombres'=>$nombres,
      'apellidos'=>$apellidos,
      'email'=>$email,
      'rol'=>$rol,
      'empresa'=>$empresa,
      'id_usuario'=>$id_usuario,
      'orden_firma'=>$orden
    );
  }
  
  $convert = json_encode($json);
  echo $convert;
}

mysqli_stmt_close($connect);
?>