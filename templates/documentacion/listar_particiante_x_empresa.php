<?php 
error_reporting(0);
include('../../config.ini.php');

$id_empresa = $_POST['id_empresa'];
$selector = $_POST['selector'];
$json = array();

if($selector == 1){
  
  $consultar = mysqli_prepare($connect,"SELECT a.id_usuario, b.usuario FROM persona as a, usuario as b WHERE a.id_usuario = b.id_usuario AND a.id_empresa = ?");
  mysqli_stmt_bind_param($consultar, 'i', $id_empresa);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_usuario, $usuario);


  while($row = mysqli_stmt_fetch($consultar)){
    $json[]=array(
      'id_usuario'=>$id_usuario,
      'usuario'=>$usuario
    );
  }
  
}else{
  $id_usuario = $_POST['id_usuario'];
  $consultar = mysqli_prepare($connect,"SELECT a.id_usuario, a.nombre, a.apellido, a.email, b.nombre FROM persona as a, cargo as b, usuario as c  WHERE c.id_usuario = ? AND a.id_cargo = b.id_cargo AND c.id_usuario =  a.id_usuario");
  mysqli_stmt_bind_param($consultar, 'i', $id_usuario);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_persona, $nombre, $apellido, $email, $cargo);



  while($row = mysqli_stmt_fetch($consultar)){
    $json[]=array(
      'id_persona'=>$id_persona,
      'nombre'=>$nombre,
      'apellido'=>$apellido,
      'email'=>$email,
      'cargo'=>$cargo
    );
  }
}

$convert = json_encode($json);
echo $convert;
  
mysqli_stmt_close($consultar);
?>