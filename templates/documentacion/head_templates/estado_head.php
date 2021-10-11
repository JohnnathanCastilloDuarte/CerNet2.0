<?php 
error_reporting(0);
include('../../../config.ini.php');

$id = $_POST['id'];
$valor = $_POST['valor'];
$id_valida = $_POST['id_valida'];
$valor_insertar = "";

/*
0-Creado
1-Revisado cualquier cargo != a HEAD o CEO
2-Revisado cargo == HEAD
3-Revisado cargo == TI , CEO, COO
4-Erro documento cargo == Operaciones
5-Error documento cargo == HEAD
6-Error documento cargo == TI, CEO, COO

*/
$consultar_cargo = mysqli_prepare($connect,"SELECT cargo FROM persona WHERE id_usuario = ? ");
mysqli_stmt_bind_param($consultar_cargo, 'i', $id_valida);
mysqli_stmt_execute($consultar_cargo);
mysqli_stmt_store_result($consultar_cargo);
mysqli_stmt_bind_result($consultar_cargo, $cargo);
mysqli_stmt_fetch($consultar_cargo);


if($valor == "Sin accion"){
  $valor_insertar = 0;
}else if($valor == "Revisado"){
  if($cargo == "Ingeniero Validaciones" or $cargo == "Consultor GEP" or $cargo == "Consultor SPOT" or 
     $cargo == "Analista Documental"){
    $valor_insertar = 1;
  }else if($cargo == "Head"){
    $valor_insertar = 2;
  }else{
    $valor_insertar = 3;
  }
  
}else if($valor == "error"){
  if($cargo == "Ingeniero Validaciones" or $cargo == "Consultor GEP" or $cargo == "Consultor SPOT" or 
     $cargo == "Analista Documental"){
    $valor_insertar = 4;
  }else if($cargo == "Head"){
    $valor_insertar = 5;
  }else{
    $valor_insertar = 6;
  }
}

$query = mysqli_prepare($connect,'UPDATE documentacion SET estado = ? WHERE id = ?');
mysqli_stmt_bind_param($query, 'ii', $valor_insertar, $id);
mysqli_stmt_execute($query);

if($query){
  if($valor == "Revisado"){
     echo "Si correo";
  }else{
     echo "Si";
  }
 
}else{
  echo "No";
}

mysqli_stmt_close($query);
?>