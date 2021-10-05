<?php
include('../../config.ini.php');

$base_64 = $_POST['base_64'];
$id_mapeo = $_POST['id_mapeo'];
$seleccion = $_POST['seleccion'];

if($seleccion == 0){
  
 
  $consultar_informe = mysqli_prepare($connect, "SELECT id_informe_refrigerador FROM informes_refrigerador WHERE id_mapeo = ?");
  mysqli_stmt_bind_param($consultar_informe, 'i', $id_mapeo);
  mysqli_stmt_execute($consultar_informe);
  mysqli_stmt_store_result($consultar_informe);
  mysqli_stmt_bind_result($consultar_informe, $id_informe_refrigerador);
  mysqli_stmt_fetch($consultar_informe);
  

  
  $validar = mysqli_prepare($connect,"SELECT id_imagen FROM images_informe_refrigeradores WHERE id_informe = ? AND tipo_imagen = ?");
  mysqli_stmt_bind_param($validar, 'ii', $id_informe_refrigerador, $seleccion);
  mysqli_stmt_execute($validar);
  mysqli_stmt_store_result($validar);
  mysqli_stmt_bind_result($validar, $id_imagen);
  mysqli_stmt_fetch($validar);
  
  if(mysqli_stmt_num_rows($validar) > 0){
    echo "Update";
    $update_imagen = mysqli_prepare($connect,"UDPATE images_informe_refrigeradores SET ubicacion = ? WHERE id_imagen = ?");
    mysqli_stmt_bind_param($update_imagen, 'si', $base_64, $id_imagen);
    mysqli_stmt_execute($update_imagen);
    echo mysqli_stmt_error($update_imagen);
    if($update_imagen){
      echo 1;
    }else{
      echo 0;
    }
  }else{
    
    $insertando_imagen = mysqli_prepare($connect,"INSERT INTO images_informe_refrigeradores (id_informe, tipo_imagen, ubicacion) VALUES (?,?,?)");
    mysqli_stmt_bind_param($insertando_imagen, 'iis', $id_informe_refrigerador, $seleccion, $base_64);
    mysqli_stmt_execute($insertando_imagen);
    echo mysqli_stmt_error($insertando_imagen);
    if($insertando_imagen){
      echo 1;
    }else{
      echo 0;
    }
  }
  
}else{
  
  $consultar_informe = mysqli_prepare($connect, "SELECT id_informe_refrigerador FROM informes_refrigerador WHERE id_mapeo = ?");
  mysqli_stmt_bind_param($consultar_informe, 'i', $id_mapeo);
  mysqli_stmt_execute($consultar_informe);
  mysqli_stmt_store_result($consultar_informe);
  mysqli_stmt_bind_result($consultar_informe, $id_informe_refrigerador);
  mysqli_stmt_fetch($consultar_informe);
  

  
  $validar = mysqli_prepare($connect,"SELECT id_imagen FROM images_informe_refrigeradores WHERE id_informe = ? AND tipo_imagen = ?");
  mysqli_stmt_bind_param($validar, 'ii', $id_informe_refrigerador, $seleccion);
  mysqli_stmt_execute($validar);
  mysqli_stmt_store_result($validar);
  mysqli_stmt_bind_result($validar, $id_imagen);
  mysqli_stmt_fetch($validar);
  
  if(mysqli_stmt_num_rows($validar) > 0){
    echo "Update";
    $update_imagen = mysqli_prepare($connect,"UDPATE images_informe_refrigeradores SET ubicacion = ? WHERE id_imagen = ?");
    mysqli_stmt_bind_param($update_imagen, 'si', $base_64, $id_imagen);
    mysqli_stmt_execute($update_imagen);
    echo mysqli_stmt_error($update_imagen);
    if($update_imagen){
      echo 1;
    }else{
      echo 0;
    }
  }else{
    
    $insertando_imagen = mysqli_prepare($connect,"INSERT INTO images_informe_refrigeradores (id_informe, tipo_imagen, ubicacion) VALUES (?,?,?)");
    mysqli_stmt_bind_param($insertando_imagen, 'iis', $id_informe_refrigerador, $seleccion, $base_64);
    mysqli_stmt_execute($insertando_imagen);
    echo mysqli_stmt_error($insertando_imagen);
    if($insertando_imagen){
      echo 1;
    }else{
      echo 0;
    }
  }
}

?>