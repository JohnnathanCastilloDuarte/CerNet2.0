<?php 
include('../../config.ini.php');

if(isset($_POST['id_valida'])){
  
  $id_persona = $_POST['id_valida'];
  $id_documento = $_POST['id'];
  
  $consultar_email = mysqli_prepare($connect,"SELECT email FROM persona WHERE id_usuario = ?");
  mysqli_stmt_bind_param($consultar_email, 'i', $id_persona);
  mysqli_stmt_execute($consultar_email);
  mysqli_stmt_store_result($consultar_email);
  mysqli_stmt_bind_result($consultar_email, $email);
  mysqli_stmt_fetch($consultar_email);

  $key = base64_encode($id_persona);
  $rest = substr($email, 0,-10);
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  $from = "cernet_informa@cercal.net";
  $to = $email;

  $subject = "Proceso documental";
  $message = "En el siguiente link podras ingresar a CerNet y participar de  el proceso de documentacion
              link: https://cercal.net/CERNET/templates/documentacion/firmar_documentacion.php?key=".$key."&key2=".$id_documento;
  $header = "Enviado desde: ".$from;

  mail($to, $subject, $message, $header);

}else{
  /*
  $email = $_POST['email'];
  $id_participante = $_POST['id_participante'];
  $rest = substr($email, 0,-10);
  $key = base64_encode($id_participante);
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  $from = "cernet_informa@cercal.net";
  $to = $email;

  $subject = "Proceso documental";
  $message = "En el siguiente link podras ingresar a CerNet y participar de  el proceso de documentacion
              link: https://cercal.net/CERNET/templates/documentacion/firmar_documentacion.php?key=".$key;
  $header = "Enviado desde: ".$from;

  mail($to, $subject, $message, $header);
  */
  $para  = 'jcastillo@cercal.cl';

// título
$título = 'Recordatorio de cumpleaños para Agosto';

// mensaje
$mensaje = '
<html>
<head>
  <title>Recordatorio de cumpleaños para Agosto</title>
</head>
<body>
  <p>¡Estos son los cumpleaños para Agosto!</p>
  <table>
    <tr>
      <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
    </tr>
    <tr>
      <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Enviarlo
mail($para, $título, $mensaje, $cabeceras);
}
echo "Enviado";
?>