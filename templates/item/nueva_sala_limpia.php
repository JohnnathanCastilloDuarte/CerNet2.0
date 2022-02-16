<?php

include('../../config.ini.php');

$nombre_sala_limpia = $_POST['nombre_sala_limpia'];
$empresa_sala_limpia = $_POST['empresa_sala_limpia'];
$clasificacion_oms = $_POST['clasificacion_oms'];
$clasificacion_iso = $_POST['clasificacion_iso'];
$direccion_sala_limpia = $_POST['direccion_sala_limpia'];
$ubicacion_interna_sala_limpia = $_POST['ubicacion_interna_sala_limpia'];
$area_interna_sala_limpia = $_POST['area_interna_sala_limpia'];
$area_m2_sala_limpia = $_POST['area_m2_sala_limpia'];
$volumen_m3_sala_limpia = $_POST['volumen_m3_sala_limpia'];
$claudal_m3h = $_POST['claudal_m3h'];
$ren_hr = $_POST['ren_hr'];
$temperatura = $_POST['temperatura'];
$hum_relativa = $_POST['hum_relativa'];
$lux = $_POST['lux']; 
$ruido_dba = $_POST['ruido_dba'];
$presion_sala = $_POST['presion_sala'];
$presion_versus = $_POST['presion_versus'];
$tipo_presion = $_POST['tipo_presion'];
$puntos_muestreo = $_POST['puntos_muestreo'];
$id_valida = $_POST['id_valida'];
$codigo = $_POST['codigo'];                 
$estado_sala = $_POST['estado_sala'];             

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
  $insertando_ultrafreezer = mysqli_prepare($connect,"INSERT INTO item_sala_limpia (
    id_item,
    clasificacion_oms,
    clasificacion_iso, 
    direccion,
    ubicacion_interna, 
    area_interna,
    Area_m2, 
    volumen_m3, 
    claudal_m3h,  
    ren_hr, 
    temperatura, 
    hum_relativa, 
    lux,
    ruido_dba,
    presion_sala,
    presion_versus,
    tipo_presion,
    puntos_muestreo,
    codigo,
    estado_sala
    )
 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insertando_ultrafreezer, 'isssssssssssssssssss', 
    $id_item_insertado, 
    $clasificacion_oms, 
    $clasificacion_oms, 
    $direccion_sala_limpia,
    $ubicacion_interna_sala_limpia,
    $area_interna_sala_limpia,
    $area_m2_sala_limpia,
    $volumen_m3_sala_limpia,
    $claudal_m3h,
    $ren_hr,
    $temperatura,
    $hum_relativa,
    $lux,
    $ruido_dba,
    $presion_sala,
    $presion_versus,
    $tipo_presion,
    $puntos_muestreo,
    $codigo,
    $estado_sala
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