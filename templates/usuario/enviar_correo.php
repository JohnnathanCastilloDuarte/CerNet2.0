<?php 

  ini_set('display_errors', 1);
  error_reporting(E_ALL);
	require("../../config.ini.php");
	
	 $correo = $_POST['email'];

  $consultar = mysqli_prepare($connect,"SELECT nombre, apellido, id_usuario FROM persona WHERE email = ?");
  mysqli_stmt_bind_param($consultar, 's', $correo);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $nombre, $apellido, $id_usuario);


if($consultar){
	while($fila = mysqli_stmt_fetch($consultar)){


      $id_protegido = md5($id_usuario);

      $from = "cernet_informa@cercal.net";
      $to = $correo;

      $subject = "Cambio de contraseña";
      $message = "Ingresa al siguiente link para restablecer tu contraseña <a href='http://cercal.net/CERNET/restablecer_pass.php?key=".$id_protegido."'>Aqu&iacute;</a>";
      $header = "Enviado desde: ".$from;

    mail($to, $subject, $message, $header);
  }
}//cierre del if que valida si existe el correo
else{	
  echo "no existe";
}
?>