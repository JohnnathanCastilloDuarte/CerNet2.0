<?php 

include('../../config.ini.php');

$id_asignado_automovil = $_POST['id_asignado_automovil'];

$consultar = mysqli_prepare($connect,'SELECT id, nombre, tipo  FROM alturas_automovil WHERE id_asignado = ?');
mysqli_stmt_bind_param($consultar, 'i', $id_asignado_automovil);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $id, $nombre, $tipo);

$json = array();

while($row = mysqli_stmt_fetch($consultar)){
  
    $json[] = array(
      'id'=>$id,
      'nombre'=>$nombre,
      'tipo'=>$tipo
    );
}

$convert = json_encode($json);

echo $convert;


mysqli_stmt_close($connect);
?>