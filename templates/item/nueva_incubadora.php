<?php
include('../../config.ini.php');

$nombre_incubadora            = $_POST['nombre_incubadora'];
$id_empresa                   = $_POST['id_empresa'];
$marca_incubadora             = $_POST['marca_incubadora'];
$modelo_incubadora            = $_POST['modelo_incubadora'];
$desc_incubadora              = $_POST['desc_incubadora'];
$n_serie_incubadora           = $_POST['n_serie_incubadora'];
$fecha_fabricacion_incubadora = $_POST['fecha_fabricacion_incubadora'];
$direccion_incubadora         = $_POST['direccion_incubadora'];
$ubicacion_interna_incubadora = $_POST['ubicacion_interna_incubadora'];
$area_interna_incubadora      = $_POST['area_interna_incubadora'];
$valor_seteado                = $_POST['valor_seteado'];
$limite_maximo                = $_POST['limite_maximo'];
$limite_minimo                = $_POST['limite_minimo'];
$id_valida                    = $_POST['id_valida'];

if ($fecha_fabricacion_incubadora == "" || $fecha_fabricacion_incubadora == NULL) {
  $fecha_fabricacion = "NA";
}else{
  $fecha_fabricacion = $_POST['fecha_fabricacion_incubadora'];
}

$tipo_item = 6;
$estado = 1;


$insertando_item = mysqli_prepare($connect,'INSERT INTO item (id_empresa, id_tipo, nombre, descripcion, estado, id_usuario) VALUES (?,?,?,?,?,?)');

mysqli_stmt_bind_param($insertando_item, 'iissii', $id_empresa, $tipo_item, $nombre_incubadora, $desc_incubadora, $estado, $id_valida);
mysqli_stmt_execute($insertando_item);


$id_item_insertado  =  mysqli_stmt_insert_id($insertando_item);
echo mysqli_stmt_error($insertando_item);

if($insertando_item){

  $insertando_incubadora = mysqli_prepare($connect,"INSERT INTO item_incubadora (id_item, fabricante, modelo, n_serie, fecha_fabricacion, direccion, ubicacion_interna, area_interna, valor_seteado, limite_maximo , limite_minimo, id_usuario) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
  
  mysqli_stmt_bind_param($insertando_incubadora, 'issssssssssi', $id_item_insertado, $marca_incubadora, $modelo_incubadora, $n_serie_incubadora, $fecha_fabricacion, $direccion_incubadora,
    $ubicacion_interna_incubadora, $area_interna_incubadora, $valor_seteado, $limite_maximo, $limite_minimo, $id_valida );

/*  echo "INSERT INTO item_incubadora (id_item, fabricante, modelo, n_serie, fecha_fabricacion, direccion, ubicacion_interna, area_interna, valor_seteado, limite_maximo , limite_minimo, id_usuario) VALUES ($id_item_insertado,$marca_incubadora,$modelo_incubadora, $n_serie_incubadora,$fecha_fabricacion,$direccion_incubadora,$ubicacion_interna_incubadora,$area_interna_incubadora,$valor_seteado,$limite_maximo,$limite_minimo,$id_valida)";*/
  
  mysqli_stmt_execute($insertando_incubadora);
  
  echo mysqli_stmt_error($insertando_incubadora);
  
  if($insertando_incubadora){
    echo "SI";
  }else{
    echo "No incubadora";
  } 
}else{
  echo "No item";
}

mysqli_stmt_close($connect);
?>