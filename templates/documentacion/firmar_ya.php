<?php 
error_reporting(0);
include('../../config.ini.php');
require "phpqrcode/qrlib.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

$seleccion = $_POST['seleccion'];
$id_documentacion = $_POST['id_documentacion'];
$id_persona = $_POST['id_persona'];
$id_t_firmantes = $_POST['id_t_firmantes'];
$variable_url = $_SERVER['HTTP_HOST'];
$contenido = "";

$key1 = base64_encode($id_persona);
$key2 = base64_encode($id_documentacion);

$url_qr = "http://".$variable_url."/CerNet2.0/templates/documentacion/firmar_documentacion.php?key=".$key1."&document=".$key2;


$consultar_link = mysqli_prepare($connect,"SELECT a.url, b.nombre FROM archivos_documentacion as a, documentacion as b WHERE a.id_documentacion = ? AND a.id_documentacion = b.id");
mysqli_stmt_bind_param($consultar_link, 'i', $id_documentacion);
mysqli_stmt_execute($consultar_link);
mysqli_stmt_store_result($consultar_link);
mysqli_stmt_bind_result($consultar_link, $url, $nombre_proceso);
mysqli_stmt_fetch($consultar_link);



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

QRcode::png($url_qr, $filename, $level, $tama_o, $framSize); 

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
  mysqli_stmt_fetch($consulta);  

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


$url = "";
$mail = new PHPMailer(true);



$key = base64_encode($id_persona);
$document = base64_encode($id_documentacion);
$url_cernet = "";


if($variable_url == "cercal.net"){
  $host = "mail.cercal.net";
  $Username = "cernet_informa@cercal.net";
  $password = "+AayJrvqUdJk";
  $url = "https://cercal.net/CerNet2.0/templates/documentacion/firmar_documentacion.php?key=".$key."&document=".$document;
  $url_cernet = "https://cercal.net/CerNet2.0";
 
}else{
  $host = "smtp.gmail.com";
  $Username = "pruebascernet@gmail.com";
  $password = "Cercal2021.";
  $url = "http://localhost/CerNet2.0/templates/documentacion/firmar_documentacion.php?key=".$key."&document=".$document;
  $url_cernet = "https://localhost/CerNet2.0";
}

$cuerpo = 
"<table style='background: #ececec;border-radius: 9px;width: 100%;' >
  <tr>
      <td style='width: 103px;'><img src='".$url_cernet."/design/assets/images/logo_big.png' style='width: 100%;'></td>
      <td colspan='2'  style='color: #4545fb;font-family: Quincy;text-align: center;font-size: 22px;'>Invitación a proceso documental CerNet2.0</td>
    
  </tr>

  <tr>
      <td colspan='3'><hr></td>
  </tr>

  <tr>
      <td></td>
      <td style='text-align: justify;font-size: 12px; color: #4545fb;font-family: arial;'>
          <p style='font-size: 16px;text-align: center;'>
              Con la siguiente nos complace a invitarlo, al proceso documental con el nombre <br> 
              ".$nombre_proceso.", de la cual podra acceder e inspeccionar en el siguiente botón:<br><br>
              <a href='".$url_cernet."'><input type='button' value='Vamos a CerNet2.0' style='background: #0d0d82;color: #eef4f4;font-family: quincy;border-radius: 9px;'></a>
              <br>
          </p>

          
          <p>
             <strong> Confidencialidad</strong><br>
              Este mensaje como sus documentos adjuntos están siendo enviados por o a nombre de Cercal Ingeniería SpA,
              y está destinado exclusivamente a la persona o empresa a quien se dirigió, por lo que puede contener información
              privilegiada o confidencial o cuya difusión se encuentre legalmente prohibida.
              Si usted no es el destinatario, no está autorizado para leer, imprimir, usar, copiar, distribuir,
              modificar los documentos adjuntos ni este mensaje o cualquier parte del mismo.
              El contenido de la empresa que se encuentra publicado en el sitio web www.cercal.cl ,
              como también todo tipo de documentación existente en forma material o digital que sea creada por Cercal Ingeniería SpA
              o por sus dependientes con ocasión del desempeño de sus funciones, es de exclusiva creación de la empresa,
              por lo cual su titularidad le pertenece en forma exclusiva a Cercal Ingeniería SpA. Lo anterior obliga a los, lectores, destinatarios, o usuarios de la misma a no reproducirla, copiarla, utilizarla, modificarla, para su beneficio o el de un tercero, sin autorización expresa de Cercal Ingeniería SpA. 
              Si ha recibido este mensaje por error, por favor notifique de inmediato por correo electrónico al remitente, borre el mensaje de sus archivos y elimine todas las copias del mismo que haya hecho'.

              <strong> Confidentiality</strong><br>
              This message as the documents attached herewith are sent by or on behalf of Cercal Ingeniería SpA and are exclusively intended for the company or person to whom it has been addressed, therefore they may contain privileged or confidential information of which disclosure is prohibited by law. If you are not the addressee, you are not authorized to read, neither print, use, copy, distribute nor modify the documents attached herewith, neither this message nor any part thereof. The content of the company that is published on the website www.cercal.cl, as well as any type of existing physical or digital documentation, created by Cercal Ingeniería SpA or by its dependents, regarding the performance of the functions of the company, is an exclusive creation of the company, therefore its ownership belongs only and exclusively to Cercal Ingeniería SpA. The hereinabove mentioned obliges the readers, addressees or users hereof not to reproduce, neither copy, use nor modify it for their own or a third party benefit, if Cercal Ingeniería SpA has not explicitly authorized it. 
              If you have received this message in error, please immediately notify the sender by email, delete the message from your files and remove any copy you have made of it.
          </p>
          <br><br>
            <a href='https://web.facebook.com/cercalingenieria'><img src='".$url_cernet."/design/images/facebook.png'></a>&nbsp;&nbsp;
            <a href='https://api.whatsapp.com/send?phone=56939180548'><img src='".$url_cernet."/design/images/whatsapp.png'></a>&nbsp;&nbsp;
            <a href='https://www.linkedin.com/company/cercal-group'><img src='".$url_cernet."/design/images/linkedin.png'></a>&nbsp;&nbsp;
            <a href='https://www.instagram.com/cercal.group/'><img src='".$url_cernet."/design/images/instagram.png'></a>&nbsp;&nbsp;
            <a href='https://www.youtube.com/channel/UCQhUcOl55_pFVtNeOJwNuXQ'><img src='".$url_cernet."/design/images/youtube.png'></a>
          
      </td>
      <td style='width: 50px;'></td>
  </tr>
  <tr>
      <td colspan='3'><hr></td>
  </tr>
</table>";
try{

  //Server Setting
 
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
  $mail->Subject=  utf8_decode('PROCESO DE APROBACIÓN DIGITAL '.$nombre_proceso);
  $mail->Body =  utf8_decode($cuerpo);

  $mail->send();
  //echo 'envio';

}catch (Exception $e){
    echo 'Hubo un error al enviar el mensaje:', $mail->ErrorInfo;
}


  $insertar = mysqli_prepare($connect,"UPDATE firmantes_documentacion SET tipo_firma = ?, firma = ?, qr = ?, fecha_firma = ? WHERE id_documento = ? AND id = ? AND id_usuario = ?");
  mysqli_stmt_bind_param($insertar, 'sissiii', $mix, $token_f, $filename, $fecha_actual, $id_documentacion, $id_t_firmantes,  $id_persona);
  mysqli_stmt_execute($insertar);
  echo mysqli_stmt_error($insertar);
  if($insertar){
    echo "si";  
        
  }else{
    echo "no";
  }
  
}
?>