<?php
include('../../config.ini.php');

$array = array();

$consultar = mysqli_prepare($connect,"SELECT id, departamento FROM departamento");
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $id_departamento, $departamento);

while($row = mysqli_stmt_fetch($consultar)){
  $array[] = array(
    'id_departamento'=>$id_departamento,
    'departamento'=>$departamento
  );
}

$convert = json_encode($array);
echo $convert;

mysqli_stmt_close($connect);
?>