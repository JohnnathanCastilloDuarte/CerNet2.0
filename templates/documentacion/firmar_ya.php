<?php 
include('../../config.ini.php');
require "phpqrcode/qrlib.php";

$seleccion = $_POST['seleccion'];
$id_documentacion = $_POST['id_documentacion'];
$id_persona = $_POST['id_persona'];
$id_t_firmantes = $_POST['id_t_firmantes'];

$consultar_link = mysqli_prepare($connect,"SELECT url FROM archivos_documentacion WHERE id_documentacion = ?");
mysqli_stmt_bind_param($consultar_link, 'i', $id_documentacion);
mysqli_stmt_execute($consultar_link);
mysqli_stmt_store_result($consultar_link);
mysqli_stmt_bind_result($consultar_link, $url);
mysqli_stmt_fetch($consultar_link);

$variable_url = $_SERVER['HTTP_HOST'];
$contenido = "";

$fecha_actual = date('y-m-d h:i:s', time());

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

if($variable_url == "cercal.net"){
  $contenido = "https://cercal.net/CerNet2.0/".$url;
}else{
  $contenido = "http://localhost/CerNet2.0/".$url;
}
 //Texto

//Enviamos los parametros a la Función para generar código QR

QRcode::png($contenido, $filename, $level, $tama_o, $framSize); 

if($seleccion == 1){
  $pluma_f = 0;
  $dataURL = $contenido;//$_POST['dataURL'];
  
  /*
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
  */
  
  /*INSERT INTO firmantes_documentacion (id_documento, id_usuario, tipo_firma, firma, qr) VALUES (?,?,?,?,?)*/
  $insertar = mysqli_prepare($connect,"UPDATE firmantes_documentacion SET tipo_firma = ?, firma = ?, qr = ?, fecha_firma = ? WHERE id_documento = ? AND id = ? AND id_usuario = ?");
  mysqli_stmt_bind_param($insertar, 'sissiii',  $dataURL, $pluma_f, $filename, $fecha_actual, $id_documentacion, $id_t_firmantes,  $id_persona);
  mysqli_stmt_execute($insertar);
  if($insertar){
    echo "si";
    /*
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
      
    }*/
    
  }else{
    echo "no";
  }
}else{
  
  $token_f = 1;
  $identificacion = $_POST['identificacion'];
  $token = $_POST['token'];
  $mix = $token.$identificacion;
  $siguiente = "";
  /*INSERT INTO firmantes_documentacion (id_documento, id_usuario, tipo_firma, firma, qr) VALUES (?,?,?,?,?) */
  
  $consulta = mysqli_prepare($connect,"SELECT cargo FROM persona WHERE id_usuario = ?");
  mysqli_stmt_bind_param($consulta, 'i', $id_persona);
  mysqli_stmt_execute($consulta);
  mysqli_stmt_store_result($consulta);
  mysqli_stmt_bind_result($consulta, $cargo);

  if($cargo == "Analista documental"){
    $siguiente = "Head";
  }else if($cargo == "Head"){
    $siguiente = "Calidad";
  }else{
    $siguiente="CEO";
  }


  $consulta1 = mysqli_prepare($connect,"SELECT a.email FROM persona as a, firmantes_documentacion as b WHERE b.id_usuario = a.id_usuario AND b.id_documento = ? AND a.cargo = ?");
  mysqli_stmt_bind_param($consulta1, 'is', $id_documentacion, $siguiente);
  mysqli_stmt_execute($consulta1);
  mysqli_stmt_store_result($consulta1);
  mysqli_stmt_bind_result($consulta1, $email);
  mysqli_stmt_fetch($consulta1);

  echo $email;


  /*$insertar = mysqli_prepare($connect,"UPDATE firmantes_documentacion SET tipo_firma = ?, firma = ?, qr = ?, fecha_firma = ? WHERE id_documento = ? AND id = ? AND id_usuario = ?");
  mysqli_stmt_bind_param($insertar, 'sissiii', $mix, $token_f, $filename, $fecha_actual, $id_documentacion, $id_t_firmantes,  $id_persona);
  mysqli_stmt_execute($insertar);
  echo mysqli_stmt_error($insertar);
  if($insertar){
    echo "si";  
        
  }else{
    echo "no";
  }*/
  
}
?>