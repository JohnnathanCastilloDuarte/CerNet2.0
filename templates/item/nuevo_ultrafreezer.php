<?php

//MODULO PARA CREAR ITEM DE ULTRAFREEZER
include('../../config.ini.php');

$nombre                 = $_POST['nombre_ultrafreezer'];
$id_empresa             = $_POST['empresa_ultrafreezer'];
$id_valida              = $_POST['id_valida'];
$descripcion            = $_POST['desc_ultrafreezer'];

$fabricante             = $_POST['fabricante_ultrafreezer'];
$modelo                 = $_POST['modelo_ultrafreezer'];
$n_serie                = $_POST['n_serie_ultrafreezer'];
$codigo_interno         = $_POST['codigo_interno_ultrafreezer'];
$fecha_fabricacion      = $_POST['fecha_fabricacion_ultrafreezer'];
$direccion              = $_POST['direccion_ultrafreezer'];
$valor_seteado_hum      = $_POST['valor_seteado_hum_ultrafreezer'];
$humedad_maxima         = $_POST['humedad_minima_ultrafreezer'];
$humedad_minima         = $_POST['humedad_maxima_ultrafreezer'];
$valor_seteado_tem     = $_POST['valor_seteado_tem_ultrafreezer'];
$temperatura_minima     = $_POST['temperatura_minima_ultrafreezer'];
$temperatura_maxima     = $_POST['temperatura_maxima_ultrafreezer'];
$ubicacion_interna      = $_POST['ubicacion_interna_ultrafreezer'];
$voltaje_ultrafreezer   = $_POST['voltaje_ultrafreezer'];
$potencia_ultrafreezer  = $_POST['potencia_ultrafreezer'];
$capacidad_ultrafreezer = $_POST['capacidad_ultrafreezer'];
$alto_ultrafreezer      = $_POST['alto_ultrafreezer'];
$peso_ultrafreezer      = $_POST['peso_ultrafreezer'];
$largo_ultrafreezer     = $_POST['largo_ultrafreezer'];
$ancho_ultrafreezer     = $_POST['ancho_ultrafreezer'];
$area_interna_ultrafreezer = $_POST['area_interna_ultrafreezer'];

if( $fecha_fabricacion == "" || $fecha_fabricacion ==NULL){
    $fecha_fabricacion_ultrafreezer = "NA";
}else{
    $fecha_fabricacion_ultrafreezer = $_POST['fecha_fabricacion_ultrafreezer'];
}

$tipo_item = 4;
$estado = 0;
$id = NULL;
$fecha_registro = NULL;

//// SE INSERTA EN EL ITEM
$insertando_item = mysqli_prepare($connect,'INSERT INTO item (id_empresa, id_tipo, nombre, descripcion, estado, id_usuario) 
                                            VALUES (?,?,?,?,?,?)');

mysqli_stmt_bind_param($insertando_item, 'iissii', $id_empresa, $tipo_item, $nombre, $descripcion, $estado, $id_valida);
mysqli_stmt_execute($insertando_item);

//SE CAPTURA EL ID DEL ITEM CREADO
$id_item_insertado  =  mysqli_stmt_insert_id($insertando_item);

///SE VALIDA LA CAPTURA DEL ITEM CREADO
if($id_item_insertado > 0){
//INSERTAMOS EN LA TABLA ITEM_FREEZER
  $insertando_ultrafreezer = mysqli_prepare($connect,"INSERT INTO item_ultrafreezer 
                                                      VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insertando_ultrafreezer, 'iisssssssssssssssssssssis', 
    $id, 
    $id_item_insertado, 
    $fabricante, 
    $modelo, 
    $n_serie, 
    $codigo_interno, 
    $fecha_fabricacion_ultrafreezer, 
    $direccion,
    $area_interna_ultrafreezer,                     
    $valor_seteado_hum,
    $humedad_minima, 
    $humedad_maxima, 
    $valor_seteado_tem, 
    $temperatura_minima, 
    $temperatura_maxima,
    $ubicacion_interna, 
    $voltaje_ultrafreezer, 
    $potencia_ultrafreezer, 
    $capacidad_ultrafreezer, 
    $peso_ultrafreezer, 
    $alto_ultrafreezer, 
    $largo_ultrafreezer, 
    $ancho_ultrafreezer,
    $id_valida,
    $fecha_registro
  );
  
  mysqli_stmt_execute($insertando_ultrafreezer);
  
  echo mysqli_stmt_error($insertando_ultrafreezer);
  
  if($insertando_ultrafreezer){
    echo "Si";
  }else{
  echo "No";
  }
 }

//mysqli_stmt_close($connect);

?>