<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

error_reporting(0);
include('../../config.ini.php');


$variable_url = $_SERVER['HTTP_HOST'];
$url = "";
$mail = new PHPMailer(true);
$email = "";
$id_persona = "";
$id_documento = "";


if(isset($_POST['id_valida'])){
 
  $id_persona = $_POST['id_valida'];
  $id_documento = $_POST['id'];
  $id_usuario = "";

  $consultar_email = mysqli_prepare($connect,"SELECT a.email FROM persona as a WHERE a.id_usuario = ?");
  mysqli_stmt_bind_param($consultar_email, 'i', $id_persona);
  mysqli_stmt_execute($consultar_email);
  mysqli_stmt_store_result($consultar_email);
  mysqli_stmt_bind_result($consultar_email, $email);
  mysqli_stmt_fetch($consultar_email); 

}else{
  $email = $_POST['email'];
  $id_persona = $_POST['id_participante'];
  $id_documento = $_POST['id_document'];
}


$key = base64_encode($id_persona);
$document = base64_encode($id_documento);
$rest = substr($email, 0,-10);


if($variable_url == "cercal.net"){
  $host = "mail.cercal.net";
  $Username = "cernet_informa@cercal.net";
  $password = "+AayJrvqUdJk";
  $url = "https://cercal.net/CerNet2.0/templates/documentacion/firmar_documentacion.php?key=".$key."&document=".$document;
 
}else{
  $host = "smtp.gmail.com";
  $Username = "jcastillo@cercal.cl";
  $password = "Panda0497.";
  $url = "http://localhost/CerNet2.0/templates/documentacion/firmar_documentacion.php?key=".$key."&document=".$document;
}
try{

  //Server Setting
  $mail->SMTPDebug = 0;
  //$mail->SMTPDebug = 0;
  $mail->isSMTP();
  $mail->Host =  $host;
  $mail->SMTPAuth = true;
  $mail->Username = $Username;
  $mail->Password = $password;
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  echo $email_enviar;
  // Recipients Enviar correos $mail->addAddress();
  $mail->setFrom('cernet_informa@cercal.net','CerNet');
  $mail->addAddress($email);

  //Content
  $mail->isHTML(true);
  $mail->Subject=  utf8_decode('Proceso digital de aprobación');
  $mail->Body =  utf8_decode('Aprobación del proceso de firmas '.$url);

  $mail->send();
  echo 'envio';

}catch (Exception $e){
    echo 'Hubo un error al enviar el mensaje:', $mail->ErrorInfo;
}
?>