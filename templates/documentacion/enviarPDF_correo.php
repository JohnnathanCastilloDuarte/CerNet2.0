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

////////////////////////////////

$email  = $_GET['correo'];
$link   = '123';

//echo $variable_url;

$key = base64_encode($id_persona);
$document = base64_encode($id_documento);
$rest = substr($email, 0,-10);
$url_cernet="";


if($variable_url == "cercal.net"){
  $host = "mail.cercal.net";
  $Username = "cernet_informa@cercal.net";
  $password = "+AayJrvqUdJk";
  $url = "https://cercal.net/CerNet2.0/templates/documentacion/firmar_documentacion.php?key=".$key."&document=".$document;
  $url_cernet = "https://cercal.net/CerNet2.0";
 
}else{
  $host = "smtp.gmail.com";
  $Username = "cercalinos1@gmail.com";
  $password = "Cercal2021*";
  //$url = "http://localhost/CerNet2.0/templates/documentacion/firmar_documentacion.php?key=".$key."&document=".$document;
  $url_cernet = "https://localhost/CerNet2.0";
}


if(isset($link)){

  $cuerpo = 
    "??holaa".$link;

  try{

    //Server Setting
    //$mail->SMTPDebug = 0;
    if($variable_url != "cercal.net"){
      $mail->isSMTP(); 
    }
    $mail->Host =  $host;
    $mail->SMTPAuth = true;
    $mail->Username = $Username;
    $mail->Password = $password;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    // Recipients Enviar correos $mail->addAddress();
    $mail->setFrom('cernet_informa@cercal.net','CerNet');
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);
    $mail->Subject=  utf8_decode('PDF DEL EQUIPO');
    $mail->Body =  utf8_decode($cuerpo);

    $mail->send();
  
  }catch (Exception $e){
      echo 'Hubo un error al enviar el mensaje:', $mail->ErrorInfo;
  }
}
?>