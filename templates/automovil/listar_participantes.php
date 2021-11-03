<?php 
include('../../config.ini.php');

$id_asignado_automovil = $_POST['id_asignado_automovil'];

$primer = mysqli_prepare($connect,"SELECT id_servicio FROM item_asignado WHERE id_asignado = ?");
mysqli_stmt_bind_param($primer, 'i', $id_asignado_automovil);
mysqli_stmt_execute($primer);
mysqli_stmt_store_result($primer);
mysqli_stmt_bind_result($primer, $id_servicio);
mysqli_stmt_fetch($primer);


$segundo = mysqli_prepare($connect,"SELECT id_numot FROM servicio WHERE id_servicio = ?");
mysqli_stmt_bind_param($segundo , 'i', $id_servicio);
mysqli_stmt_execute($segundo);
mysqli_stmt_store_result($segundo);
mysqli_stmt_bind_result($segundo, $id_numot);
mysqli_stmt_fetch($segundo);


$tercero = mysqli_prepare($connect,"SELECT id_informe_participante, nombres, apellido, cargo FROM informes_participante WHERE id_numot = ?");
mysqli_stmt_bind_param($tercero, 'i', $id_numot);
mysqli_stmt_execute($tercero);
mysqli_stmt_store_result($tercero);
mysqli_stmt_bind_result($tercero, $id_informe_participante, $nombres, $apellidos, $cargo);

$json = array();

while($row = mysqli_stmt_fetch($tercero)){
  
  $json[] = array(
    'id'=>$id_informe_participante,
    'nombres'=>$nombres,
    'apellidos'=>$apellidos,
    'cargo'=>$cargo
  );
}

$convert = json_encode($json);

echo $convert;

mysqli_close($connect);
?>