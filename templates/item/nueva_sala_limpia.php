<?php

include('../../config.ini.php');

$nombre_sala_limpia     =  $_POST['nombre_sala_limpia'];
$empresa_sala_limpia    =  $_POST['empresa_sala_limpia'];
$area_sala_limpia       =  $_POST['area_sala_limpia'];
$codigo_sala_limpia     =  $_POST['codigo_sala_limpia'];
$area_m2_sala_limpia    =  $_POST['area_m2_sala_limpia'];
$volumen_m2_sala_limpia =  $_POST['volumen_m2_sala_limpia'];
$estado_sala_limpia     =  $_POST['estado_sala_limpia'];

$id_valida               = $_POST['id_valida'];


$tipo_item = 8;
$estado = 1;

//// SE INSERTA EN EL ITEM
$insertando_item = mysqli_prepare($connect,'INSERT INTO item (id_empresa, id_tipo, nombre, estado, id_usuario) VALUES (?,?,?,?,?)');

mysqli_stmt_bind_param($insertando_item, 'iissi', $empresa_sala_limpia, $tipo_item, $nombre_sala_limpia,  $estado, $id_valida);
mysqli_stmt_execute($insertando_item);

//SE CAPTURA EL ID DEL ITEM CREADO
$id_item_insertado  =  mysqli_stmt_insert_id($insertando_item);

///SE VALIDA LA CAPTURA DEL ITEM CREADO
if($id_item_insertado > 0){
//INSERTAMOS EN LA TABLA ITEM_FREEZER
  $insertando_ultrafreezer = mysqli_prepare($connect,"INSERT INTO item_sala_limpia (id_item, Area_sala_limpia, Codigo, Area_m2, volumen_m3, Estado_sala)
 VALUES (?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insertando_ultrafreezer, 'isssss', 
    $id_item_insertado, 
    $area_sala_limpia, 
    $codigo_sala_limpia, 
    $area_m2_sala_limpia,
    $volumen_m2_sala_limpia,
    $estado_sala_limpia,
  );
  
  mysqli_stmt_execute($insertando_ultrafreezer);
  
  echo mysqli_stmt_error($insertando_ultrafreezer);
  
  if($insertando_ultrafreezer){
    echo "Si";
  }else{
  echo "No";
  }
 }else{
  echo "error";
 }

//mysqli_stmt_close($connect);

?>