<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require("../../config.ini.php");
  
$variable_url = $_SERVER['HTTP_HOST'];
$url = "";
$mail = new PHPMailer(true);
	





$correo = $_POST['email'];

$consultar = mysqli_prepare($connect,"SELECT nombre, apellido, id_usuario FROM persona WHERE email = ?");
mysqli_stmt_bind_param($consultar, 's', $correo);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $nombre, $apellido, $id_usuario);


if(mysqli_stmt_num_rows($consultar)> 0){
  while($fila = mysqli_stmt_fetch($consultar)){

    
    $id_protegido = md5($id_usuario);
    if($variable_url == "cercal.net"){
      $host = "mail.cercal.net";
      $Username = "cernet_informa@cercal.net";
      $password = "+AayJrvqUdJk";
      $url = "https://cercal.net/CerNet2.0/restablecer_pass.php?key=".$id_protegido;
      $url_cernet = "https://cercal.net/CerNet2.0";
      
    }else{
      $host = "smtp.gmail.com";
      $Username = "soportecernet@gmail.com";
      $password = "Cercal2021.";
      $url = "http://localhost/CerNet2.0/restablecer_pass.php?key=".$id_protegido;
      $url_cernet = "https://localhost/CerNet2.0";
    }

    $cuerpo = 
    "<table style='background: #ececec;border-radius: 9px;width: 100%;' >
      <tr>
          <td style='width: 103px;'><img src='https://cercal.net/CerNet2.0/design/assets/images/logo_big.png' style='width: 100%;'></td>
          <td colspan='2'  style='color: #4545fb;font-family: Quincy;text-align: center;font-size: 22px;'>RESTABLECIMIENTO DE CLAVE</td>
        
      </tr>

      <tr>
          <td colspan='3'><hr></td>
      </tr>

      <tr>
          <td></td>
          <td style='text-align: justify;font-size: 12px; color: #4545fb;font-family: arial;'>
              <p style='font-size: 16px;text-align: center;'>
                  Tu solicitud de cambio de clave, lo podras realizar en el siguiente boton:<br><br>
                  <a href='".$url."'><input type='button' value='Cambiar clave' style='background: #0d0d82;color: #eef4f4;font-family: quincy;border-radius: 9px;'></a>
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
      $mail->addAddress($correo);
  
      //Content
      $mail->isHTML(true);
      $mail->Subject=  utf8_decode('Restablecimiento de clave');
      $mail->Body =  utf8_decode($cuerpo);
  
      $mail->send();
    
    }catch (Exception $e){
        echo 'Hubo un error al enviar el mensaje:', $mail->ErrorInfo;
    }

  }
}//cierre del if que valida si existe el correo
else{	
  echo "no existe";
}
?>