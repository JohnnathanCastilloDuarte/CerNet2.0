<?php
include('../../config.ini.php');

$nombre_refrigerador  = $_POST['nombre_refrigerador'];
$empresa_refrigerador  = $_POST['empresa_refrigerador'];
$fabricante_refrigerador = $_POST['fabricante_refrigerador'];
$modelo_refrigerador  = $_POST['modelo_refrigerador'];
$desc_refrigerador  = $_POST['desc_refrigerador'];
$n_serie_refrigerador = $_POST['n_serie_refrigerador'];
$codigo_interno_refrigerador = $_POST['codigo_interno_refrigerador'];
$fecha_fabricacion_refrigerador = $_POST['fecha_fabricacion_refrigerador'];
$direccion_refrigerador = $_POST['direccion_refrigerador'];
$ubicacion_interna_refrigerador = $_POST['ubicacion_interna_refrigerador'];
$voltaje_refrigerador = $_POST['voltaje_refrigerador'];
$potencia_refrigerador = $_POST['potencia_refrigerador'];
$capacidad_refrigerador = $_POST['capacidad_refrigerador'];
$alto_refrigerador = $_POST['alto_refrigerador'];
$peso_refrigerador = $_POST['peso_refrigerador'];
$largo_refrigerador = $_POST['largo_refrigerador'];
$ancho_refrigerador = $_POST['ancho_refrigerador'];
$valor_seteado_hum = $_POST['valor_seteado_hum'];
$humedad_minima = $_POST['humedad_minima'];
$humedad_maxima  = $_POST['humedad_maxima'];
$valor_seteado_tem = $_POST['valor_seteado_tem'];
$temperatura_minima  = $_POST['temperatura_minima'];
$temperatura_maxima = $_POST['temperatura_maxima'];
$id_valida = $_POST['id_valida'];
$area_refrigerador = $_POST['area_refrigerador'];
$tipo_item = 2;
$estado = 0;

if($fecha_fabricacion_refrigerador == "" || $fecha_fabricacion_refrigerador == NULL){
   $fecha_fabricacion = "NA";
}else{
  $fecha_fabricacion = $_POST['fecha_fabricacion_refrigerador'];
}


$insertando_item = mysqli_prepare($connect,'INSERT INTO item (id_empresa, id_tipo, nombre, descripcion, estado, id_usuario) VALUES
  (?,?,?,?,?,?)');
mysqli_stmt_bind_param($insertando_item, 'iissii', $empresa_refrigerador, $tipo_item, $nombre_refrigerador, $desc_refrigerador, $estado, $id_valida);
mysqli_stmt_execute($insertando_item);


$id_item_insertado  =  mysqli_stmt_insert_id($insertando_item);

if($insertando_item){

  $insertando_refrigerador = mysqli_prepare($connect,"INSERT INTO item_refrigerador (
  
   id_item, 
   fabricante, 
   modelo, 
   n_serie, 
   c_interno, 
   fecha_fabricacion, 
   direccion, 
   valor_seteado_hum, 
   hum_min, 
   hum_max, 
   valor_seteado_tem, 
   tem_min, 
   tem_max, 
   ubicacion, 
   voltaje,
   potencia, 
   capacidad, 
   peso, 
   alto, 
   largo, 
   ancho, 
   id_usuario, 
   area_interna) 
   VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insertando_refrigerador, 'issssssssssssssssssssis', $id_item_insertado, 
    $fabricante_refrigerador, $modelo_refrigerador, $n_serie_refrigerador, $codigo_interno_refrigerador,
    $fecha_fabricacion, $direccion_refrigerador, $valor_seteado_hum, $humedad_minima, $humedad_maxima, $valor_seteado_tem, $temperatura_minima, $temperatura_maxima, $ubicacion_interna_refrigerador, $voltaje_refrigerador, $potencia_refrigerador, $capacidad_refrigerador, $peso_refrigerador, $alto_refrigerador, $largo_refrigerador, $ancho_refrigerador, $id_valida, $area_refrigerador);

  
  mysqli_stmt_execute($insertando_refrigerador);
  
  echo mysqli_stmt_error($insertando_refrigerador);
  
  if($insertando_refrigerador){
    echo "Si";
  }
}else{
    echo "No";
}

//mysqli_stmt_close($connect);

?>