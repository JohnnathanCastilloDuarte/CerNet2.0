<?php 
//error_reporting(0);
include('../../../config.ini.php');

/////////// incluyo libreria de QR
require "../phpqrcode/qrlib.php";

$id = $_POST['id'];
$valor = $_POST['valor'];
$id_valida = $_POST['id_valida'];
$valor_insertar = "";
$id_participante = $_POST['id_participante']; 
$estado = "";


$variable_url = $_SERVER['HTTP_HOST'];
$filename = "";
$fecha_firma = "";



if($valor == 'Revisado'){
  $valor_insertar = 1;
  $estado = 3;
  $fecha_firma = date('Y-m-d H:i:s');
  ////////////// CREO LA VARIABLE DE URL DE QR
  $url_qr = "https://".$variable_url."/CerNet2.0/informe_firmantes_final2.php?key=".base64_encode(id);
  //Declaramos una carpeta temporal para guardar la imagenes generadas
  $dir = 'temp/';
  //Si no existe la carpeta la creamos
  if (!file_exists($dir))
  mkdir($dir);
  //Declaramos la ruta y nombre del archivo a generar
  $filename = $dir.$id.$id_valida.'.png';
  //Parametros de Condiguración
  $tama_o = 10; //Tamaño de Pixel
  $level = 'M'; //Precisión Baja
  $framSize = 2; //Tamaño en blanco
  //Enviamos los parametros a la Función para generar código QR
  QRcode::png($url_qr, $filename, $level, $tama_o, $framSize);

}else{
  $valor_insertar = 0;
  $estado = 4;
}


$update = mysqli_prepare($connect,"UPDATE participante_documentacion SET tipo = ?, qr = ?, fecha_firma = ? WHERE id = ?");
mysqli_stmt_bind_param($update, 'issi', $valor_insertar, $filename, $fecha_firma, $id_participante);
mysqli_stmt_execute($update);

if($update){

  $update_documentacion = mysqli_prepare($connect,"UPDATE documentacion SET estado = ? WHERE id = ?");
  mysqli_stmt_bind_param($update_documentacion, 'ii', $estado, $id);
  mysqli_stmt_execute($update_documentacion);

  echo "Si correo";
}




/*
$consultar_rol = mysqli_prepare($connect,"SELECT a.nombre FROM  cargo as a, persona as b WHERE b.id_usuario = ? AND a.id_cargo = b.id_cargo");
mysqli_stmt_bind_param($consultar_rol, 'i', $id_valida);
mysqli_stmt_execute($consultar_rol);
mysqli_stmt_store_result($consultar_rol);
mysqli_stmt_bind_result($consultar_rol, $rol);
mysqli_stmt_fetch($consultar_rol);


if($rol == 'Documentary Analyst' ||  $rol == 'Senior Documentary Analyst' || $rol == 'Leading Senior Documentary Analyst' || $rol == 'Junior Documentary Analyst'){
  if($valor == "Revisado"){
    $valor_insertar = 1;
  }else{
    $valor_insertar = 2;
  }
}else if($rol == 'Engineer' || $rol == 'Consultant' || $rol == 'Junior Analyst' || $rol == 'Inspector Junior' || $rol = 'Senior Consultant' || $rol == 'Senior Analyst'){
  if($valor == "Revisado"){
    $valor_insertar = 3;
  }else{
    $valor_insertar = 4;
  }
}else if($rol == 'Head' || $rol == 'Chief Operating Officer'){
  if($valor == "Revisado"){
    $valor_insertar = 5;
  }else{
    $valor_insertar = 6;
  }
}else if($rol == 'Quality Controller'){
  if($valor == "Revisado"){
    $valor_insertar = 7;
  }else{
    $valor_insertar = 8;
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
/*
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
    if($valor_insertar == 7){
      echo "Si documentador";
    }else if($valor_insertar == 1){
      echo "Si documentacion";
    }
    else{
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
}*/

mysqli_stmt_close($query);
?>