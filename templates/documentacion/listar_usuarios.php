<?php 
include('../../config.ini.php');

$id_documentacion = $_POST['id_documentacion'];

$consultar_usuarios = mysqli_prepare($connect,"SELECT a.id_usuario, a.usuario, b.nombre, b.apellido, b.email FROM usuario as a, persona as b   WHERE a.id_usuario = b.id_usuario ORDER BY a.usuario ASC");
mysqli_stmt_execute($consultar_usuarios);
mysqli_stmt_store_result($consultar_usuarios);
mysqli_stmt_bind_result($consultar_usuarios, $id_usuario, $usuario, $nombre, $apellido, $email);

$json = array();

while($row = mysqli_stmt_fetch($consultar_usuarios)){
  
  $json[] = array(
    'id_usaurio'=>$id_usuario,
    'usuario'=>$usuario,
    'nombre'=>$nombre,
    'apellido'=>$
  );
}


?>