<?php
include('../../config.ini.php');

$nombre_estufa = $_POST['nombre_estufa'];
$empresa_estufa = $_POST['empresa_estufa'];
$fabricante_estufa = $_POST['fabricante_estufa'];
$modelo_estufa = $_POST['modelo_estufa'];
$desc_estufa = $_POST['desc_estufa'];
$n_serie_estufa = $_POST['n_serie_estufa'];
$codigo_interno_estufa = $_POST['codigo_interno_estufa'];
$fecha_fabricacion_estufa = $_POST['fecha_fabricacion_estufa'];
$direccion_estufa = $_POST['direccion_estufa'];
$ubicacion_interna_estufa = $_POST['ubicacion_interna_estufa'];
$voltaje_estufa = $_POST['voltaje_estufa'];
$potencia_estufa = $_POST['potencia_estufa'];
$capacidad_estufa = $_POST['capacidad_estufa'];
$alto_estufa = $_POST['alto_estufa'];
$peso_estufa = $_POST['peso_estufa'];
$largo_estufa = $_POST['largo_estufa'];
$ancho_estufa = $_POST['ancho_estufa'];
$valor_seteado_tem = $_POST['valor_seteado_tem'];
$temperatura_minima = $_POST['temperatura_minima'];
$temperatura_maxima = $_POST['temperatura_maxima'];
$id_valida = $_POST['id_valida'];
$area_interna_estufa = $_POST['area_interna_estufa'];

if($fecha_fabricacion_estufa == "" || $fecha_fabricacion_estufa == NULL){
   $fecha_fabricacion = "NA";
}else{
   $fecha_fabricacion = $_POST['fecha_fabricacion_estufa'];
}

$tipo_item = 5;
$estado = 0;


$insertando_item = mysqli_prepare($connect,'INSERT INTO item (id_empresa, id_tipo, nombre, descripcion, estado, id_usuario) VALUES (?,?,?,?,?,?)');

mysqli_stmt_bind_param($insertando_item, 'iissii', $empresa_estufa, $tipo_item, $nombre_estufa, $desc_estufa, $estado, $id_valida);
mysqli_stmt_execute($insertando_item);


$id_item_insertado  =  mysqli_stmt_insert_id($insertando_item);
echo mysqli_stmt_error($insertando_item);

if($insertando_item){

  $insertando_estufa = mysqli_prepare($connect,"INSERT INTO item_estufa (id_item, fabricante, modelo, n_serie, c_interno, fecha_fabricacion, direccion, 
    valor_seteado_tem, tem_min, tem_max, ubicacion, voltaje, potencia, capacidad, peso, alto, largo, ancho, id_usuario, area_interna) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  
  mysqli_stmt_bind_param($insertando_estufa, 'isssssssssssssssssis', $id_item_insertado, $fabricante_estufa, $modelo_estufa, $n_serie_estufa, $codigo_interno_estufa, $fecha_fabricacion,
   $direccion_estufa, $valor_seteado_tem, $temperatura_maxima, $temperatura_minima, $ubicacion_interna_estufa,
   $voltaje_estufa, $potencia_estufa, $capacidad_estufa, $peso_estufa, $alto_estufa, $largo_estufa, $ancho_estufa, $id_valida, $area_interna_estufa);
  
  mysqli_stmt_execute($insertando_estufa);
  
  echo mysqli_stmt_error($insertando_estufa);
  
  if($insertando_estufa){
    echo "Si";
  }else{
    echo "No estufa";
  } 
}else{
  echo "No item";
}

mysqli_stmt_close($connect);
?>