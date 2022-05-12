<?php

include('../../config.ini.php');

$nombre_sala_limpia = $_POST['nombre_sala_limpia'];
$empresa_sala_limpia = $_POST['empresa_sala_limpia'];
$clasificacion_oms = $_POST['clasificacion_oms'];
$clasificacion_iso = $_POST['clasificacion_iso'];
$direccion_sala_limpia = $_POST['direccion_sala_limpia'];
$codigo_interna_sala_limpia = $_POST['codigo_interna_sala_limpia'];
$area_interna_sala_limpia = $_POST['area_interna_sala_limpia'];
$area_m2_sala_limpia = $_POST['area_m2_sala_limpia'];
$volumen_m3_sala_limpia = $_POST['volumen_m3_sala_limpia'];;
$ren_hr = $_POST['ren_hr'];
$temperatura_maxima = $_POST['temperatura_maxima'];
$hum_relativa_maxima = $_POST['hum_relativa_max'];
$temperatura_minima = $_POST['temperatura_min'];
$hum_relativa_minima = $_POST['hum_relativa_min'];
$lux = $_POST['lux']; 
$ruido_dba = $_POST['ruido_dba'];
$presion_sala = $_POST['presion_sala'];
$presion_versus = $_POST['presion_versus'];
$tipo_presion = $_POST['tipo_presion'];
$puntos_muestreo = $_POST['puntos_muestreo'];
$id_valida = $_POST['id_valida'];                
$estado_sala = $_POST['estado_sala'];             
$temperatura_informativa = $_POST['temperatura_informativa'];
$humedad_informativa = $_POST['humedad_informativa'];
$cantidad_extracciones = $_POST['cantidad_extracciones'];
$cantidad_inyecciones = $_POST['cantidad_inyecciones'];
$tipo_item = 8;
$estado = 0;

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
    area_interna,
    Area_m2, 
    volumen_m3,  
    ren_hr, 
    especificacion_1_temp, 
    especificacion_1_hum, 
    especificacion_2_temp, 
    especificacion_2_hum,
    lux,
    ruido_dba,
    presion_sala,
    presion_versus,
    tipo_presion,
    puntos_muestreo,
    codigo,
    estado_sala,
    temp_informativa,
    hum_informativa,
    cantidad_extracciones,
    cantidad_inyecciones
    )
 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insertando_ultrafreezer, 'isssssssssssssssssssssss', 
    $id_item_insertado, 
    $clasificacion_oms, 
    $clasificacion_iso, 
    $direccion_sala_limpia,
    $area_interna_sala_limpia,
    $area_m2_sala_limpia,
    $volumen_m3_sala_limpia,
    $ren_hr,
    $temperatura_minima,
    $temperatura_maxima,
    $hum_relativa_minima,
    $hum_relativa_maxima,
    $lux,
    $ruido_dba,
    $presion_sala,
    $presion_versus,
    $tipo_presion,
    $puntos_muestreo,
    $codigo_interna_sala_limpia,
    $estado_sala,
    $temperatura_informativa,
    $humedad_informativa,
    $cantidad_extracciones,
    $cantidad_inyecciones
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

mysqli_stmt_close($connect);

?>