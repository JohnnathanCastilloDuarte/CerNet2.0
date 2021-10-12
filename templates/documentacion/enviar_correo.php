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
$email_enviar = "";

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



  /*
  $conocer_proximo_envio = mysqli_prepare($connect,"SELECT estado, departamento FROM documentacion WHERE id = ?");
  mysqli_stmt_bind_param($conocer_proximo_envio, 'i', $id_documento);
  mysqli_stmt_execute($conocer_proximo_envio);
  mysqli_stmt_store_result($conocer_proximo_envio);
  mysqli_stmt_bind_result($conocer_proximo_envio, $estado, $departamento);
  mysqli_stmt_fetch($conocer_proximo_envio);

  if($estado == 1){

    if($departamento == "GEP"){
      $consultar_email = mysqli_prepare($connect,"SELECT a.email, d.id_usuario FROM persona as a, departamento as b, control_departamento as c, usuario as d WHERE a.id_usuario = c.id_usuario AND c.id_departamento = b.id AND b.departamento = ? AND a.id_usuario = d.id_usuario  AND d.id_rol = 4");
      mysqli_stmt_bind_param($consultar_email, 's', $departamento);
      mysqli_stmt_execute($consultar_email);
      mysqli_stmt_store_result($consultar_email);
      mysqli_stmt_bind_result($consultar_email, $email, $usuario);
      mysqli_stmt_fetch($consultar_email); 
      $email_enviar = $email;
      $id_usuario = $usuario;
    }
    

  }
*/


  $key = base64_encode($id_persona);
  $document = base64_encode($id_documento);
  $rest = substr($email, 0,-10);

  if($variable_url == "cercal.net"){
    $host = "mail.cercal.net";
    $Username = "cernet_informa@cercal.net";
    $password = "+AayJrvqUdJk";
    $url = "https://cercal.net/CERNET/templates/documentacion/firmar_documentacion.php?key=".$key."&document=".$document;
   
  }else{
    $host = "smtp.gmail.com";
    $Username = "jcastillo@cercal.cl";
    $password = "Panda0497";
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
} 
?>