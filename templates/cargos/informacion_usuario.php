<?php
error_reporting(0);
include('../../config.ini.php');

$id_usuario = $_POST['id_usuario'];
$array = array();


$consultar = mysqli_prepare($connect,"SELECT a.departamento, c.cargo FROM departamento as a, control_departamento as b, persona as c 
                                      WHERE a.id = b.id_departamento AND b.id_usuario = c.id_usuario AND c.id_usuario = ?");
mysqli_stmt_bind_param($consultar, 'i', $id_usuario);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $departamento, $cargo);

while($row = mysqli_stmt_fetch($consultar)){
  
  $array[] = array(
    'departamento'=>$departamento,
    'cargo'=>$cargo
  );
}

$convert = json_encode($array);

echo $convert;

mysqli_stmt_close($convert);

?>