<?php 
//error_reporting(0);
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
$consultar_rol = mysqli_prepare($connect,"SELECT cargo FROM persona WHERE id_usuario = ? ");
mysqli_stmt_bind_param($consultar_rol, 'i', $id_valida);
mysqli_stmt_execute($consultar_rol);
mysqli_stmt_store_result($consultar_rol);
mysqli_stmt_bind_result($consultar_rol, $rol);
mysqli_stmt_fetch($consultar_rol);



if($rol == 'Analista documental'){
  if($valor == "Revisado"){
    $valor_insertar = 1;
  }else{
    $valor_insertar = 5;
  }
}else if($rol == 'Head'){
  if($valor == "Revisado"){
    $valor_insertar = 2;
  }else{
    $valor_insertar = 6;
  }
}else if($rol == 'CEO' || $rol == 'COO'){
  if($valor == "Revisado"){
    $valor_insertar = 4;
  }else{
    $valor_insertar = 8;
  }
}else if($rol == 'Calidad'){
  if($valor == "Revisado"){
    $valor_insertar = 3;
  }else{
    $valor_insertar = 7;
  }
}

/*
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
*/

$actualizar_tipo = mysqli_prepare($connect,"SELECT id FROM firmantes_documentacion WHERE id_documento = ? AND id_usuario = ?");
mysqli_stmt_bind_param($actualizar_tipo, 'ii', $id, $id_valida);
mysqli_stmt_execute($actualizar_tipo);
mysqli_stmt_store_result($actualizar_tipo);
mysqli_stmt_bind_result($actualizar_tipo, $id_firmantes);
mysqli_stmt_fetch($actualizar_tipo);

if($valor == "Revisado"){
  $actualizando = mysqli_prepare($connect,"UPDATE firmantes_documentacion SET tipo = ? WHERE id = ?");
  mysqli_stmt_bind_param($actualizando, 'si', $valor, $id_firmantes);
  mysqli_stmt_execute($actualizando);
}else{
  $DateAndTime = date('y-m-d h:i:s a', time()); 
  $actualizando = mysqli_prepare($connect,"UPDATE firmantes_documentacion SET tipo = ?, fecha_firma = ? WHERE id = ?");
  mysqli_stmt_bind_param($actualizando, 'ssi', $valor, $DateAndTime, $id_firmantes);
  mysqli_stmt_execute($actualizando);
}


$query = mysqli_prepare($connect,'UPDATE documentacion SET estado = ? WHERE id = ?');
mysqli_stmt_bind_param($query, 'ii', $valor_insertar, $id);
mysqli_stmt_execute($query);

if($query){
  if($valor == "Revisado"){
    if($valor_insertar == 4){
      echo "Si documentador";
    }else{
      echo "Si correo";
      
    }

    $movimiento = "Ha aprobado el documento";
    $creando = mysqli_prepare($connect,"INSERT INTO backtrack(persona, movimiento, modulo) VALUES (?,?,?)");
    mysqli_stmt_bind_param($creando, 'iss', $id_valida, $movimiento, $id);
    mysqli_stmt_execute($creando);

    
  }else{
    echo "Si";
    $movimiento = "Ha rechazado el documento";
    $creando = mysqli_prepare($connect,"INSERT INTO backtrack(persona, movimiento, modulo) VALUES (?,?,?)");
    mysqli_stmt_bind_param($creando, 'iss', $id_valida, $movimiento, $id);
    mysqli_stmt_execute($creando);
  }
 
  
}else{
  echo "No";
}

mysqli_stmt_close($query);
?>