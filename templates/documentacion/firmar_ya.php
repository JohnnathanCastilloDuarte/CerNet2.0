<?php 
include('../../config.ini.php');
require "phpqrcode/qrlib.php";

$seleccion = $_POST['seleccion'];
$id_documentacion = $_POST['id_documentacion'];
$id_persona = $_POST['id_persona'];

//Declaramos una carpeta temporal para guardar la imagenes generadas
$dir = 'temp/';

//Si no existe la carpeta la creamos
if (!file_exists($dir))
mkdir($dir);

//Declaramos la ruta y nombre del archivo a generar
$filename = $dir.$id_documentacion.$id_persona.'.png';

//Parametros de Condiguración

$tama_o = 10; //Tamaño de Pixel
$level = 'M'; //Precisión Baja
$framSize = 2; //Tamaño en blanco
$contenido = "https://cercal.net/CERNET/informe_firmantes_final.php?key=".$id_documentacion; //Texto

//Enviamos los parametros a la Función para generar código QR

QRcode::png($contenido, $filename, $level, $tama_o, $framSize); 

if($seleccion == 1){
  $pluma_f = 0;

  
  $dataURL = $_POST['dataURL'];
  
  $consultar = mysqli_prepare($connect,"SELECT email FROM persona WHERE id_usuario = ?");
  mysqli_stmt_bind_param($consultar, 'i', $id_persona);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $email_1);
  mysqli_stmt_fetch($consultar);
  
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  $from = "cernet_informa@cercal.net";
  $to = $email_1;

  $subject = "Notificacion Firma";
  $message = "CerNet informa que  has firmado con pluma un documento";
  $header = "Enviado desde: ".$from;

  mail($to, $subject, $message, $header);
  
  
  $insertar = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario, tipo_firma, firma, qr) VALUES (?,?,?,?,?)");
  mysqli_stmt_bind_param($insertar, 'iisis', $id_documentacion, $id_persona, $dataURL, $pluma_f, $filename);
  mysqli_stmt_execute($insertar);
  if($insertar){
    echo "si";
    
    $enviar_masivo = mysqli_prepare($connect,"SELECT a.email, a.nombre, a.apellido FROM persona as a, participante_documentacion as b WHERE b.id_persona = a.id_usuario AND b.id_documentacion = ?  AND b.rol != 3");
    mysqli_stmt_bind_param($enviar_masivo, 'i', $id_documentacion);
    mysqli_stmt_execute($enviar_masivo);
    mysqli_stmt_store_result($enviar_masivo);
    mysqli_stmt_bind_result($enviar_masivo, $email, $nombre, $apellido);
    while($row = mysqli_stmt_fetch($enviar_masivo)){
      
      ini_set('display_errors', 1);
      error_reporting(E_ALL);

      $from = "cernet_informa@cercal.net";
      $to = $email;

      $subject = "Notificacion Firma";
      $message = "CerNet informa que ".$nombre." ".$apellido."realizado la firma del documento";
      $header = "Enviado desde: ".$from;

      mail($to, $subject, $message, $header);
      
    }
    
  }else{
    echo "no";
  }
}else{
  $token_f = 1;
  $identificacion = $_POST['identificacion'];
  $token = $_POST['token'];
  $mix = $token.$identificacion;
  $insertar = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario, tipo_firma, firma, qr) VALUES (?,?,?,?,?)");
  mysqli_stmt_bind_param($insertar, 'iisis', $id_documentacion, $id_persona, $mix, $token_f, $filename);
  mysqli_stmt_execute($insertar);
  if($insertar){
    echo "si";
    
$rest = substr($email, 0,-10);
$consultar_rol = mysqli_prepare($connect,"SELECT a.rol, b.email FROM participante_documentacion as a, persona as b WHERE a.id_persona = ? AND a.id_persona = b.id_usuario");
mysqli_stmt_bind_param($consultar_rol, 'i', $id_persona);
mysqli_stmt_execute($consultar_rol);
mysqli_stmt_store_result($consultar_rol);
mysqli_stmt_bind_result($consultar_rol, $rol, $email_1);
mysqli_stmt_fetch($consultar_rol);


if($rol == 1){
$rol_verdadero = "Documentador";
}else if($rol == 2){
$rol_verdadero = "Auditor";
}else{
$rol_verdadero = "Aprobador";
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

$from = "CerNet_Informa@cercal.net";
$to = $email_1;

$subject = "Token de seguridad";
$message = "CerNet informa que has realizado la firma con el siguiente token ".$mix;
$header = "Enviado desde: ".$from;

mail($to, $subject, $message, $header);
 
    $enviar_masivo = mysqli_prepare($connect,"SELECT a.email, a.nombre, a.apellido FROM persona as a, participante_documentacion as b WHERE b.id_persona = a.id_usuario AND b.id_documentacion = ?  AND b.rol != 3");
    mysqli_stmt_bind_param($enviar_masivo, 'i', $id_documentacion);
    mysqli_stmt_execute($enviar_masivo);
    mysqli_stmt_store_result($enviar_masivo);
    mysqli_stmt_bind_result($enviar_masivo, $email, $nombre, $apellido);
    while($row = mysqli_stmt_fetch($enviar_masivo)){
      
      ini_set('display_errors', 1);
      error_reporting(E_ALL);

      $from = "cernet_informa@cercal.net";
      $to = $email;

      $subject = "Token de seguridad";
      $message = "CerNet informa que ".$nombre." ".$apellido."realizado la firma del documento con el siguiente token ".$mix;
      $header = "Enviado desde: ".$from;

      mail($to, $subject, $message, $header);
      
    }    
    
  }else{
    echo "no";
  }
  
}
?>