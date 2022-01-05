<?php 

include('../../config.ini.php');

$tipo = $_POST['tipo_mostrar'];
if($tipo == 'departamentos'){
  
  
$traer = mysqli_prepare($connect,"SELECT id, departamento FROM departamento");
mysqli_stmt_execute($traer);
mysqli_stmt_store_result($traer);
mysqli_stmt_bind_result($traer, $id_departamento, $nombre_departamento);


$array_departamento = array();

while($row = mysqli_stmt_fetch($traer)){
    
    $array_departamento[] = array(
        'id_departamento'=>$id_departamento,
        'nombre_departamento'=>$nombre_departamento,
    );
}

$json = json_encode($array_departamento);

echo $json;
  
}elseif($tipo == 'cargos'){
  
$id_departamento_cargo = $_POST['id_departamento'];  
$traer = mysqli_prepare($connect,"SELECT id_cargo, nombre FROM cargo WHERE id_departamento = ?");
mysqli_stmt_bind_param($traer, 'i', $id_departamento_cargo);
mysqli_stmt_execute($traer);
mysqli_stmt_store_result($traer);
mysqli_stmt_bind_result($traer, $id_cargo, $nombre_cargo);


$array_cargo = array();

while($row = mysqli_stmt_fetch($traer)){
    
    $array_cargo[] = array(
        'id_cargo'=>$id_cargo,
        'nombre_cargo'=>$nombre_cargo,
    );
}

$json = json_encode($array_cargo);

echo $json;
  
}elseif($tipo == 'privilegios'){
  
$traer = mysqli_prepare($connect,"SELECT id_privilegio, perfil FROM privilegio ");
mysqli_stmt_execute($traer);
mysqli_stmt_store_result($traer);
mysqli_stmt_bind_result($traer, $id_privilegio, $nombre_privilegio);


$array_privilegio = array();

while($row = mysqli_stmt_fetch($traer)){
    
    $array_privilegio[] = array(
        'id_privilegio'=>$id_privilegio,
        'nombre_privilegio'=>$nombre_privilegio,
    );
}

$json = json_encode($array_privilegio);

echo $json;
  
}


else{
  echo"error";
}


?>