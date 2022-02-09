<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';

include('../../config.ini.php');


$variable_url = $_SERVER['HTTP_HOST'];
$mail = new PHPMailer(true);


$url = "";
$email = "";
$id_persona = "";
$id_documento = "";

$query = mysqli_prepare($connect,"SELECT nombre FROM documentacion WHERE id = ?");
mysqli_stmt_bind_param($query, 'i', $id_documento);
mysqli_stmt_execute($query);
mysqli_stmt_store_result($query);
mysqli_stmt_bind_result($query, $nombre_proceso);
mysqli_stmt_fetch($query);  




if(isset($_POST['id_valida'])){
  
 
  $id_persona = $_POST['id_valida'];
  $id_documento = $_POST['id'];
  $id_usuario = "";

  $query = mysqli_prepare($connect,"SELECT nombre FROM documentacion WHERE id = ?");
  mysqli_stmt_bind_param($query, 'i', $id_documento);
  mysqli_stmt_execute($query);
  mysqli_stmt_store_result($query);
  mysqli_stmt_bind_result($query, $nombre_proceso);
  mysqli_stmt_fetch($query);  

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
$url_cernet="";


if($variable_url == "cercal.net"){
  $host = "mail.cercal.net";
  $Username = "cernet_informa@cercal.net";
  $password = "+AayJrvqUdJk";
  $url = "https://cercal.net/CerNet2.0";
  $url_cernet = "https://cercal.net/CerNet2.0";
 
}else{
  $host = "smtp.gmail.com";
  $Username = "soportecernet@gmail.com";
  $password = "Cercal2021.";
  $url = "https://localhost/CerNet2.0";
  $url_cernet = "https://localhost/CerNet2.0";
}


if(isset($_POST['tipo'])){

  ///////////// CONSULTO DEL DOCUMENTADOR CREADOR DE ESTE DOCUMENTO PARA NOTIFICAR QUE YA SE FIRMO.
  
  $documentador = mysqli_prepare($connect,"SELECT b.email FROM documentacion  as a, persona as b WHERE a.id = ? AND a.id_usuario = b.id_usuario");
  mysqli_stmt_bind_param($documentador,'i', $id_documento);
  mysqli_stmt_execute($documentador);
  mysqli_stmt_store_result($documentador);
  mysqli_stmt_bind_result($documentador, $email_documentador);
  mysqli_stmt_fetch($documentador);
  
  $cuerpo = 
    "<table style='background: #ececec;border-radius: 9px;width: 100%;' >
      <tr>
          <td style='width: 103px;'><img src='https://cercal.net/CerNet2.0/design/assets/images/logo_big.png' style='width: 100%;'></td>
          <td colspan='2'  style='color: #4545fb;font-family: Quincy;text-align: center;font-size: 22px;'>Invitación a proceso documental CerNet2.0</td>
        
      </tr>

      <tr>
          <td colspan='3'><hr></td>
      </tr>

      <tr>
          <td></td>
          <td style='text-align: justify;font-size: 12px; color: #4545fb;font-family: arial;'>
              <p style='font-size: 16px;text-align: center;'>
                  Con la siguiente nos complace informar, que el proceso documental con el nombre <br> 
                  ".$nombre_proceso.", ya se encuentra aprobado en su totalidad, podra validar esta información en el siguiente boton:<br><br>
                  <a href='".$url."'><input type='button' value='Vamos a CerNet2.0' style='background: #0d0d82;color: #eef4f4;font-family: quincy;border-radius: 9px;'></a>
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
    $mail->addAddress($email_documentador);

    //Content
    $mail->isHTML(true);
    $mail->Subject=  utf8_decode('Proceso digital de aprobación');
    $mail->Body =  utf8_decode($cuerpo);

    $mail->send();
  
  }catch (Exception $e){
      echo 'Hubo un error al enviar el mensaje:', $mail->ErrorInfo;
  }
}


if(isset($_POST['informa_documentacion'])){

  $id_documentacion_d = $_POST['id_documentacion_d'];
  $id_usuario = $_POST['id_valida'];

  $documentador = mysqli_prepare($connect,"SELECT b.email FROM participante_documentacion as a, persona as b WHERE a.id_documentacion = ? AND a.id_persona = b.id_usuario AND a.id_persona != ?  AND a.fecha_firma is NULL ORDER BY a.orden ASC LIMIT 1;");
  mysqli_stmt_bind_param($documentador,'ii', $id_documentacion_d, $id_usuario);
  mysqli_stmt_execute($documentador);
  mysqli_stmt_store_result($documentador);
  mysqli_stmt_bind_result($documentador, $email_documentador);
  mysqli_stmt_fetch($documentador);

  if(mysqli_stmt_num_rows($documentador) > 0){
   
    $cuerpo = 
    "<table style='background: #ececec;border-radius: 9px;width: 100%;' >
      <tr>
          <td style='width: 103px;'><img src='https://cercal.net/CerNet2.0/design/assets/images/logo_big.png' style='width: 100%;'></td>
          <td colspan='2'  style='color: #4545fb;font-family: Quincy;text-align: center;font-size: 22px;'>Invitación a proceso documental CerNet2.0</td>
        
      </tr>

      <tr>
          <td colspan='3'><hr></td>
      </tr>

      <tr>
          <td></td>
          <td style='text-align: justify;font-size: 12px; color: #4545fb;font-family: arial;'>
              <p style='font-size: 16px;text-align: center;'>
                  Con la siguiente nos complace informar, que el proceso documental con el nombre <br> 
                  ".$nombre_proceso.", se encuentra listo para validar su información, podra validar esta información en el siguiente boton:<br><br>
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
                <a href='https://web.facebook.com/cercalingenieria'><img src='".$url_cernet."/templates/design/images/facebook.png'></a>&nbsp;&nbsp;
                <a href='https://api.whatsapp.com/send?phone=56939180548'><img src='".$url_cernet."/templates/design/images/whatsapp.png'></a>&nbsp;&nbsp;
                <a href='https://www.linkedin.com/company/cercal-group'><img src='".$url_cernet."/templates/design/images/linkedin.png'></a>&nbsp;&nbsp;
                <a href='https://www.instagram.com/cercal.group/'><img src='".$url_cernet."/templates/design/images/instagram.png'></a>&nbsp;&nbsp;
                <a href='https://www.youtube.com/channel/UCQhUcOl55_pFVtNeOJwNuXQ'><img src='".$url_cernet."/templates/design/images/youtube.png'></a>
              
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
      $mail->addAddress($email_documentador);

      //Content
      $mail->isHTML(true);
      $mail->Subject=  utf8_decode('Proceso digital de aprobación');
      $mail->Body =  utf8_decode($cuerpo);

      $mail->send();
    
    }catch (Exception $e){
        echo 'Hubo un error al enviar el mensaje:', $mail->ErrorInfo;
    }
  }
  else{
    
    $documentador_full = mysqli_prepare($connect,"SELECT b.email FROM participante_documentacion as a, persona as b WHERE a.id_documentacion = ? AND a.id_persona = b.id_usuario  AND a.fecha_firma is not NULL ORDER BY a.orden ASC");
    mysqli_stmt_bind_param($documentador_full,'i', $id_documentacion_d);
    mysqli_stmt_execute($documentador_full);
    mysqli_stmt_store_result($documentador_full);
    mysqli_stmt_bind_result($documentador_full, $email_documentador_full);
    
    
    while($row = mysqli_stmt_fetch($documentador_full)){
      $cuerpo = 
      "<table style='background: #ececec;border-radius: 9px;width: 100%;' >
        <tr>
            <td style='width: 103px;'><img src='https://cercal.net/CerNet2.0/design/assets/images/logo_big.png' style='width: 100%;'></td>
            <td colspan='2'  style='color: #4545fb;font-family: Quincy;text-align: center;font-size: 22px;'>Invitación a proceso documental CerNet2.0</td>
          
        </tr>
  
        <tr>
            <td colspan='3'><hr></td>
        </tr>
  
        <tr>
            <td></td>
            <td style='text-align: justify;font-size: 12px; color: #4545fb;font-family: arial;'>
                <p style='font-size: 16px;text-align: center;'>
                    Con la siguiente nos complace informar, que el proceso documental con el nombre <br> 
                    ".$nombre_proceso.", Ha sido firmado por los integrantes del mismo, podra validar esta información en el siguiente boton:<br><br>
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
                  <a href='https://web.facebook.com/cercalingenieria'><img src='".$url_cernet."/templates/design/images/facebook.png'></a>&nbsp;&nbsp;
                  <a href='https://api.whatsapp.com/send?phone=56939180548'><img src='".$url_cernet."/templates/design/images/whatsapp.png'></a>&nbsp;&nbsp;
                  <a href='https://www.linkedin.com/company/cercal-group'><img src='".$url_cernet."/templates/design/images/linkedin.png'></a>&nbsp;&nbsp;
                  <a href='https://www.instagram.com/cercal.group/'><img src='".$url_cernet."/templates/design/images/instagram.png'></a>&nbsp;&nbsp;
                  <a href='https://www.youtube.com/channel/UCQhUcOl55_pFVtNeOJwNuXQ'><img src='".$url_cernet."/templates/design/images/youtube.png'></a>
                
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
        $mail->addAddress($email_documentador_full);
  
        //Content
        $mail->isHTML(true);
        $mail->Subject=  utf8_decode('Proceso digital de aprobación');
        $mail->Body =  utf8_decode($cuerpo);
  
        $mail->send();
      
      }catch (Exception $e){
          echo 'Hubo un error al enviar el mensaje:', $mail->ErrorInfo;
      }

    }

  }


}



if(isset($_POST['movimiento'])){
  
  $email = $_POST['email'];
  $id_participante = $_POST['id_participante'];
  
  $consultar_usuario_password = mysqli_prepare($connect,"SELECT a.usuario, a.password, c.id_empresa FROM usuario as a,  participante_documentacion as b, persona as c WHERE a.id_usuario = b.id_persona AND b.id = ? AND a.id_usuario = c.id_usuario");
  mysqli_stmt_bind_param($consultar_usuario_password, 'i', $id_participante);
  mysqli_stmt_execute($consultar_usuario_password);
  mysqli_stmt_store_result($consultar_usuario_password);
  mysqli_stmt_bind_result($consultar_usuario_password, $usuario, $password, $empresa);
  mysqli_stmt_fetch($consultar_usuario_password);
  
  if($empresa != 97){
    $clave = "C3rC4L_Cl1EnT3";
  }else{
    $clave = "***********";
  }
    
 
 
    $cuerpo = 
      "<table style='background: #ececec;border-radius: 9px;width: 100%;' >
        <tr>
            <td style='width: 103px;'><img src='data:image/png;base64,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' style='width: 100%;'></td>
            <td colspan='2'  style='color: #4545fb;font-family: Quincy;text-align: center;font-size: 22px;'>Invitación a proceso documental CerNet2.0</td>

        </tr>

        <tr>
            <td colspan='3'><hr></td>
        </tr>

        <tr>
            <td></td>
            <td style='text-align: justify;font-size: 12px; color: #4545fb;font-family: arial;'>
                <p style='font-size: 16px;text-align: center;'>
                    Con la siguiente nos complace informar, que el proceso documental con el nombre <br> 
                    ".$nombre_proceso.", Se encuentra disponible para su aprobación, podra consultarlo dando clic en el siguiente boton:<br><br>
                    <a href='".$url."'><input type='button' value='Vamos a CerNet2.0' style='background: #0d0d82;color: #eef4f4;font-family: quincy;border-radius: 9px;'></a>
                    <br>
                </p>

                 <p style='font-size: 16px;text-align: center;'>
                    Usuario:".$usuario."<br>
                    Contraseña:".$clave."
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
                  <a href='https://web.facebook.com/cercalingenieria'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAABgAAAAYADwa0LPAAAAB3RJTUUH5QoWAwkqvaD8tQAAAXdJREFUSMftlL9LQlEcxT/36U2DIBJampwtcihpaghfEm0NDhlia0OD0ZYQhFFb0OAfIBgiBe2PcLAlyAiHhgRxsB+bkNGQ+m6Ti694PRJcOsuFew/nnu+53++FIUP8VUDuQOQuGGQcTG12ljSo1uioeAZtu1j8nATjvlodtG/hvoJwK5uVEnRdqf7VfQThj2TSTsnt9GrXFuj66qpYAdbi8R+JfuCo27XT05wa0DKgjFDIcmCAuI7F2m3weHy+zjp0DjKZgSfAGXDt9Vr256GzW6kAGOlmE/hVh9kmMCJhWY9GpYRw6faWJxBviUQ/Tz2CSxYKPZ4rD8upSOTPCZgbYJ74/SIHIjk3x973PLEAlAIBAFEC7QKYmJqyawLbBMQmaKFGA0Dtl8scAsnXV0sCN8Diw0OPZ0ZAzby82D+CQ8gchEvHx5bxe4el1PS0Uz3HUzBo/BsYugHnH9ElaKf5PIC5X6sxBuJcqfYYuKP1OgDpYZflAF/+bnPztTvS3QAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyMS0xMC0yMlQwMzowOTo0MiswMDowMH9F1AcAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMjEtMTAtMjJUMDM6MDk6NDIrMDA6MDAOGGy7AAAAAElFTkSuQmCC'></a>&nbsp;&nbsp;
                  <a href='https://api.whatsapp.com/send?phone=56939180548'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAABgAAAAYADwa0LPAAAAB3RJTUUH5QoWAwcXe0udKgAABCFJREFUSMeVlX1IXWUcxz/P8Zxr6gSdmGtYK1265dtwiyWSqefcDZt3MZmsWqMN8qXaKMMYQlEIG2XhVLZEBmG4WbB0im8t7xVzWVEOpg6uOXTs6ohyyJhOt3uv5+kPu76MrenvnwcefnzP5/k+399zBI8orQkMPSGBKuCpvDz5JfC0rov3geYNG3x9sgJ45fp18THwmt3OcRCzp097kqAz6cqVh+krD9rM3WuxaLFgXDh1SjpBtrS1yVjgMZdLmQQ5smePpwdCo9au9a1KD8xF5eTIcJD3xsdlM8h7HR3aFtA/PHnSp/u/p83a6O+vvQP6BYdDbQSj8cwZgOy+wMBHOfWgyu4LDFS/BcM4e1b7AIxwu/2hINrjoF+urlb7wOirrZ3fFQLgJamqfhJ0mZ4O8MJYQMDqUIRYAFniyPyHKyDzt8REtRr0H69du//E6gEw3mhqUi+CPup0qiYYjZcuzYOFhKzakVIwfh8b06Yh46O4OIVaEA35+XhADFVWArRum5mx5MOO/E2beBcYjInxvgjeZxISOA4yfGRENUCzFhauBqB128wMoyADqqo4BEpoXp4ivwaxJiPDrwz8ylpbfc1zfmCORkfzHeByOtUQsISnpmKC8E9JUbJh7s3z51ebC2UUxNXWVlkCYtpqRUsDI3l6eumdA1jSwGjcvNlnvW8cVQcYjqEhgE+koqwWAP4L+8tg9Ny+vUwgN3dR0N0D9hynkyQQMXfvmhNA2vr1ogGk98YNrR9+vl5a6gPxXZmaCnpLSclKM6LIMmDO5bJMwK2rUVH3N8hgkJ6iIjELhNbUyFIQW48epQb4MyVF/QF6jzidZiSYb3V2kgniueRk1QTtvMMBy6fGsg7cf0VHyzJgrculiiKQnQ6HaYAsttkAuFxevpAFAQ7R3a2FgvHesWPSA7za0GBuBLIKCpQnQOSNj8tyQA8L894C90Rvr7oDVDE46CchKHL79jkB0N1tPg/iD5tNlAFbOjuF1g/W/vh42Q7ms+3t3hLwBsw78ZPweu93xPceiCkQ2okT/AIUBgbSCxQNDLALyImL84XXWwGeyX37ACwD/v5qKch7Q0PKVyAzdu4EIDUsOFg7CPrFyUmArcmattJA+cJqqQDj5u7dlgrIqIuNXd4lhFoL+nB9vZYJxqGqqkWBerD222xaExjG4hguBVkN0NKy9gcFqe2gf1ZX97CnWGi7wBiurCQU+DQxkb3AP3fucA7ISk2V8SDfnpriJihBlZVKFpgHWlrcBni/GR0FSMc0Lfnwa0FMjOmGuSM2Gwkgig4fFm3Ak83Nni4InSouBjj3vdu9AOAbGxECInbdOrEfxKzd7n4dZjK7u/0jYU1ARIR5ELxfFBbyORCZns5+gKgoLgIRQUGyA4gYHhZFIP7u6lrp7/hfCs+XGOUPU80AAAAldEVYdGRhdGU6Y3JlYXRlADIwMjEtMTAtMjJUMDM6MDc6MjMrMDA6MDABlOaHAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIxLTEwLTIyVDAzOjA3OjIzKzAwOjAwcMleOwAAAABJRU5ErkJggg=='></a>&nbsp;&nbsp;
                  <a href='https://www.linkedin.com/company/cercal-group'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAABgAAAAYADwa0LPAAAAB3RJTUUH5QoWAwgNAbF4nwAAAfFJREFUSMftlE1IVFEUx3/3+e40pEOEJqgkBA2ujQa1dPVuMi3EXbSoZbhsE0zjYKO7aRG0ahFBEILgqi+ogcmFLsSRFsEY40cubDcjFaIP6817t4W+l460cqZa9F+de+655/zOvYcL/5rMAlhPY7FQClTT8DBAWhvGHyssT4G16LpSglJam5fBepVM1q2ubxg5EENtbdoGrv/qWHhAT3t7vQAafMN9Czfvr64aXfA54jjiBLC4vOwsQejBxATA2hfbrtsNAOSjUhqzIJqmpwPnGTC6KhUA1iCcAWV1dmoNetw0vydBy50dgIGectk8B/MX+vuNs+CNtbRwD/TzQuGHgnfPVlZ+SyL7wCp1d/tvH8zAEKiPiURA/ARUeH09iMuA9T6bladB3c7nq8/Lk6Aynie3wbq7d5MHdfzpHgORGBxkG1iKxY7sO0BOCKIgPo2OAlz50NpaOwAJKK29R8BAPO44EM40NuoXoNXkZBC3CXw1zdBD0B29vTUD0DPAVLHo3oJcOpsFeH3Rto1vYFw9MEt+/BvgZXNzzQDENdBTW1vVfvcSwN5wHtIM6KiUNQM4rv4DBB+RMw/c2diQEnR6ZMT3iyg07C4sBOvzIEilALx0JCLiwI1SiceHE4d2QXcUixWq8vWBKM/NMfu3W9/XT/97q1028sx8AAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIxLTEwLTIyVDAzOjA4OjEzKzAwOjAwfhC66QAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMS0xMC0yMlQwMzowODoxMyswMDowMA9NAlUAAAAASUVORK5CYII='></a>&nbsp;&nbsp;
                  <a href='https://www.instagram.com/cercal.group/'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAABgAAAAYADwa0LPAAAAB3RJTUUH5QoWAwgxLt4EGAAAAv5JREFUSMellVtIVFsYgL81rtUk0U4rDErIaKDzEqcLBKlRzN5TDT2IQVYvJ+LUg4TQQxe6jA/dZLqBVscO9lC9jBUO9hARaCCmURQzhxM9hA+TitBNc6YM29rqoZZdcNeU/8uCzeL/vv2vf/1L8FU49rRp6iDobZGIngKUVVSIdhAP8vIoAC1GRsg2noPQUmobODQwIIaB1NWr7n5QHD4McLMrnR4Dy5dgNyeTajnYz8+cmRyEYN7cuVkDPcLkUQvAuXXunOEAhAOWJdRBsGMnT9IK2H6/exdaC6qqJgqetB5CNeXlejboREMDD0GfjcXoB5Hw+dgC7BgakqbUMhf07BUr3J8kzg3ASl1YOHIbZLykhOkg7mktF4Eb7ex81wVtorf3w37QobIysQ10f2Mja4FnGzf6aiBn9bJlo6dhtKitTSgHnH2ZjNsCLTVTp44HXbpEKRWE/D9PndKrgMrycmYBi+/cGdv0DEiUlop7QF48LjLAo/PnP/wDenDPHl8MRFVz8/uj0PLm+nXDRZWB7Q4Oev2xCoKzta5O7gQnv6kJoGTG+KLhgGXJSrCb4nG1DpwntbWeeQ3XS8CUWh4C535Pz4/A44pEwIn09uYegOBfc+Z4Cfi8kowkQe0tLv661B2vMplsBG52pdMUAtXt7aPHIaevuNhrry+bhL8Vw0C9ED/b5ilguto0lyltNuxwwLJ4AbwoLc35H3RjR8cvC5jrZLpaVsL76MWLPxIJByxL/g3uhUuXxFMgeu3auz+gZWZfn7fAWxDVPk8R9wYMbNq1S3SDWNjTIyPgbn78WP4LjhuLja2fvwsXWJ1KuZfBHd6927NMhitrwB7q7s529JqunqQg5GzYYFavbv8+/BrW6KIiWQdOXSqFOgZO4MQJM6uzOeOJhCoAO1lfrxogND8a/XJ25jH6LGJMJwr0t0Hov3nzDFimwZGJBHyaK99ck3DAstQxcIlEtB8oqqgQrUB1fv5vP8drgWR/v8gFUXvlirsdhl4fOQKf5spHusg3MgUjaPYAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjEtMTAtMjJUMDM6MDg6NDkrMDA6MDCSgOvDAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIxLTEwLTIyVDAzOjA4OjQ5KzAwOjAw491TfwAAAABJRU5ErkJggg=='></a>&nbsp;&nbsp;
                  <a href='https://www.youtube.com/channel/UCQhUcOl55_pFVtNeOJwNuXQ'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAABgAAAAYADwa0LPAAAAB3RJTUUH5QoWAwkWks+AMgAAAgBJREFUSMftkE9Ik3EYxz+/993eEia9BY5NzMF2cQedJx1EhDQmniSkDskYSR2KPAwhwWSHrQ56DAJPiorZpaCguixEimBM3Z+Lh2kRy7bL8AURc2v+OlTQxdpG7OTn8pw+z/f7PALAm2tqMm+BJTIxQQDkw74+eRvEqN0u3gOvdJ2PwKimsQokLBaO4xowYBicBeKVirwAXDEMsQzyaGeHF8D1lZWygP0vU1PCvAW+W9EobuDT5CSNIgc8jUZVNQPOc5EIOYD29oYVSAOaoiiyH+RLh6NaLxAIBv1+6Ozs6nI668+XfuCJw6GIZRChlpZqxd5er9fthkQimZyZgbm5hYXxcbBarVZdr76AmAdcVqvCZ5A3Na3WCxRFUYSA4eFAwOeDTGZzc3YWPJ7ubperigW/chXOgEhVKvW+cmNjfT2bhaGhwcFwGNLpVGp7uwqxFcTVctnEXaC1WOQ+gM32L69QyOeLRRgZCQanp2FpaXExFgMppZSyhuY3gMe7u8JsA9+HeJwiEO7pqfcTNWMH+SgeV9gH0Z9MNiz4N3kQ79Jp9agE5w/X1tTXoJo6OsiCvNfWxlcQz8zm/xboAe4cHPAAGIvFys+hfDEUEn9zLkldPyXhNLou38L3oKbJAVALzc3HOeINVGx7e+IymOZLpUMB3zAMgFXxc55wwp/8AJDcqo9Qui1XAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIxLTEwLTIyVDAzOjA5OjIyKzAwOjAwuSrdgAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMS0xMC0yMlQwMzowOToyMiswMDowMMh3ZTwAAAAASUVORK5CYII='></a>

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
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);
    $mail->Subject=  utf8_decode('Proceso digital de aprobación');
    $mail->Body =  utf8_decode($cuerpo);

    $mail->send();
  
  }catch (Exception $e){
      echo 'Hubo un error al enviar el mensaje:', $mail->ErrorInfo;
  }
  
}
?>