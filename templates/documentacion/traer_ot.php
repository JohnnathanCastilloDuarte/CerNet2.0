<?php 
  include('../../config.ini.php');

  $id_empresa = $_POST['id_empresa'];
  $id_valida_usuario = $_POST['id_valida_usuario'];
  $json = array();

  
  $consultar = mysqli_prepare($connect,"SELECT id_rol FROM usuario WHERE id_usuario = ?");
  mysqli_stmt_bind_param($consultar, 'i', $id_valida_usuario);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $rol);
  mysqli_stmt_fetch($consultar);

 
    $buscando_ot = mysqli_prepare($connect,"SELECT id_numot, numot, fecha_registro FROM numot WHERE id_empresa = ?");
    mysqli_stmt_bind_param($buscando_ot,  'i', $id_empresa);
    mysqli_stmt_execute($buscando_ot);
    mysqli_stmt_store_result($buscando_ot);
    mysqli_stmt_bind_result($buscando_ot, $id_numot, $numot, $fecha_registro);

    while($row = mysqli_stmt_fetch($buscando_ot)){

      $json[]=array(
        'id_numot'=>$id_numot,
        'numot'=>$numot,
        'fecha_registro'=>$fecha_registro,
        'rol'=>$rol
      );
    }

    $convert = json_encode($json);

    echo $convert;
  
  
mysqli_close($connect);
?>