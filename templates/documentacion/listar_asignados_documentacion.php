<?php
error_reporting(0);
include("../../config.ini.php");

$id_empresa = $_POST['id_empresa'];
$id_valida_usuario = $_POST['id_valida_usuario'];

$query = mysqli_prepare($connect, "SELECT a.numot, b.id, c.nombre, b.fecha_creacion, b.estado, b.estructura FROM numot as a, 
documentacion as b, empresa as c WHERE b.id_numot = a.id_numot AND  a.id_empresa = c.id_empresa AND a.id_empresa = ?");
mysqli_stmt_bind_param($query, 'i', $id_empresa);
mysqli_stmt_execute($query);
mysqli_stmt_store_result($query);
mysqli_stmt_bind_result($query, $ot, $id_documentacion, $empresa, $fecha_creacion, $estado, $estructura);

$json = array();

while($row = mysqli_stmt_fetch($query)){
  
  $json[]=array(
    'ot'=>$ot,
    'id_documentacion'=>$id_documentacion,
    'fecha_creacion'=>$fecha_creacion,
    'estado'=>$estado,
    'estructura'=>$estructura
  );
}

$convert = json_encode($json);
echo $convert;
  
mysqli_stmt_close($connect);  
?>