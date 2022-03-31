<?php 
include('../../config.ini.php');


$nombre_aire_comprimido = $_POST['nombre_aire_comprimido'];
$id_empresa = $_POST['id_empresa'];
$nombre_sala = $_POST['nombre_sala'];
$area = $_POST['area'];
$punto_aire_comprimido = $_POST['punto_aire_comprimido'];
$codigo_punto = $_POST['codigo_punto'];
$grado_iso = $_POST['grado_iso'];
$direccion_aire_comprimido = $_POST['direccion_aire_comprimido'];
$id_valida = $_POST['id_valida'];

$tipo_item = 15;
$estado = 1;

$insertar_item = mysqli_prepare($connect,'INSERT INTO item (id_empresa, id_tipo, nombre, estado, id_usuario) VALUES (?,?,?,?,?)');
mysqli_stmt_bind_param($insertar_item, 'iissi', $id_empresa, $tipo_item, $nombre_aire_comprimido, $estado, $id_valida);
mysqli_stmt_execute($insertar_item);


//SE CAPTURA EL ID DEL ITEM CREADO
$id_item_insertado  =  mysqli_stmt_insert_id($insertar_item);

if ($id_item_insertado > 0) {
	
	$insertando_aire_comprimido = mysqli_prepare($connect,"INSERT INTO item_aire_comprimido(
    id_item,
    nombre_sala,
    direccion, 
    area,
    punto_uso_aire_comprimido, 
    codigo_punto,
    grado_iso 
    )
 VALUES (?,?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insertando_aire_comprimido, 'issssss', 
    $id_item_insertado, 
    $nombre_sala, 
    $direccion_aire_comprimido,
    $area,
    $punto_aire_comprimido,
    $codigo_punto,
    $grado_iso
  );
  mysqli_stmt_execute($insertando_aire_comprimido);

  if ($insertando_aire_comprimido) {
  	echo "si";
  }else{
  	echo "no";
  }

}


mysqli_stmt_close($connect);  
 ?>