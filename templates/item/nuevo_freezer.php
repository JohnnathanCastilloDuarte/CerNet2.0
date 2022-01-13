<?php
include('../../config.ini.php');

$nombre_freezer = $_POST['nombre_freezer'];
$empresa_freezer = $_POST['empresa_freezer'];
$fabricante_freezer = $_POST['fabricante_freezer'];
$modelo_freezer = $_POST['modelo_freezer'];
$desc_freezer = $_POST['desc_freezer'];
$n_serie_freezer = $_POST['n_serie_freezer'];
$codigo_interno_freezer = $_POST['codigo_interno_freezer'];
$fecha_fabricacion_freezer = $_POST['fecha_fabricacion_freezer'];
$direccion_freezer = $_POST['direccion_freezer'];
$ubicacion_interna_freezer = $_POST['ubicacion_interna_freezer'];
$voltaje_freezer = $_POST['voltaje_freezer'];
$potencia_freezer = $_POST['potencia_freezer'];
$capacidad_freezer = $_POST['capacidad_freezer'];
$alto_freezer = $_POST['alto_freezer'];
$peso_freezer = $_POST['peso_freezer'];
$largo_freezer = $_POST['largo_freezer'];
$ancho_freezer = $_POST['ancho_freezer'];
$valor_seteado_hum = $_POST['valor_seteado_hum'];
$humedad_minima = $_POST['humedad_minima'];
$humedad_maxima = $_POST['humedad_maxima'];
$valor_seteado_tem = $_POST['valor_seteado_tem'];
$temperatura_minima = $_POST['temperatura_minima'];
$temperatura_maxima = $_POST['temperatura_maxima'];
$id_valida  = $_POST['id_valida'];
$area_interna_freezer = $_POST['area_interna_freezer'];
$tipo_item = 3;
$estado = 1;

if($fecha_fabricacion_freezer = "" || $fecha_fabricacion_freezer == NULL) {
   
  $fecha_fabricacion = "NA";
}else{
  $fecha_fabricacion = $_POST['fecha_fabricacion_freezer'];
} 

$insertando_item = mysqli_prepare($connect,'INSERT INTO item (id_empresa, id_tipo, nombre, descripcion, estado, id_usuario) VALUES
  (?,?,?,?,?,?)');
mysqli_stmt_bind_param($insertando_item, 'iissii', $empresa_freezer, $tipo_item, $nombre_freezer, $desc_freezer, $estado, $id_valida);
mysqli_stmt_execute($insertando_item);
$id_item_insertado  =  mysqli_stmt_insert_id($insertando_item);

if($insertando_item){

  $insertando_freezer = mysqli_prepare($connect,"INSERT INTO item_freezer (id_item, fabricante, modelo, n_serie, 
  c_interno, fecha_fabricacion, direccion, valor_seteado_hum, hum_min, hum_max, valor_seteado_tem, 
  tem_min, tem_max, ubicacion, voltaje, potencia, capacidad, peso, alto, largo, ancho, id_usuario, area_interna) VALUES
    (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  
  mysqli_stmt_bind_param($insertando_freezer, 'issssssssssssssssssssis', $id_item_insertado, $fabricante_freezer, 
     $modelo_freezer, $n_serie_freezer, $codigo_interno_freezer, $fecha_fabricacion, $direccion_freezer, $valor_seteado_hum, $humedad_minima, $humedad_maxima, $valor_seteado_tem,
   $humedad_minima, $humedad_maxima, $ubicacion_interna_freezer, $voltaje_freezer, $potencia_freezer, 
   $capacidad_freezer, $peso_freezer, $alto_freezer, $largo_freezer, $ancho_freezer, $id_valida, $area_interna_freezer);
  
  mysqli_stmt_execute($insertando_freezer);
  echo mysqli_stmt_error($insertando_freezer);
  
  if($insertando_freezer){
    echo "Si";
  }else{
    echo "No";
  }
  
}

//mysqli_stmt_cloe($connect);

?>