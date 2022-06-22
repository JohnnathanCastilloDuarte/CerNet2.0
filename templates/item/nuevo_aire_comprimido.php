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
$accion = $_POST['accion'];

$tipo_item = 15;
$estado = 1;

if ($accion == 'crear_item') {
  
$insertar_item = mysqli_prepare($connect,'INSERT INTO item (id_empresa, id_tipo, nombre, estado, id_usuario) VALUES (?,?,?,?,?)');
mysqli_stmt_bind_param($insertar_item, 'iissi', $id_empresa, $tipo_item, $nombre_aire_comprimido, $estado, $id_valida);
mysqli_stmt_execute($insertar_item);

//SE CAPTURA EL ID DEL ITEM CREADO
$id_item_insertado  =  mysqli_stmt_insert_id($insertar_item);
//SE ENVIA EL ID DEL ITEM CREADO
echo $id_item_insertado;


}else if($accion == 'asignar_item'){
    //Se captuta el id que viene de la vista 
     $id_item = $_POST['id_item'];

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
        $id_item, 
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
}else{
  echo "error";
}



mysqli_stmt_close($connect);  
 ?>