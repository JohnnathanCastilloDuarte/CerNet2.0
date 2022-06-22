<?php
include('../../config.ini.php');

$id_documentacion = $_POST['id_documentacion'];
$seleccion = $_POST['seleccion'];
$rol_verdadero = "";


if($seleccion == 1){
  
  $consultar = mysqli_prepare($connect,"SELECT a.id, b.email FROM participante_documentacion as a, persona as b  WHERE a.id_persona = b.id_usuario AND  a.id_documentacion = ? AND a.rol = 1");
  mysqli_stmt_bind_param($consultar, 'i', $id_documentacion);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_asig, $email);

  $json = array();

  while($row = mysqli_stmt_fetch($consultar)){

    $key = base64_encode($id_asig);  
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "CerNet_Informa@cercal.net";
    $to = $email;
    $subject = "Invitacion a participar en el modulo de documentacion";
    $message = "En el siguiente link podras observar el listado de las personas que han firmado la documentación
              link: https://cercal.net/CERNET/informe_1.php?key=".$key;
    $header = "Enviado desde: ".$from;
    mail($to, $subject, $message, $header);
    
    echo "enviado";
  }
}else if($seleccion == 2){
  $consultar = mysqli_prepare($connect,"SELECT a.id, b.email FROM participante_documentacion as a, persona as b  WHERE a.id_persona = b.id_usuario AND  a.id_documentacion = ? AND a.rol = 1");
  mysqli_stmt_bind_param($consultar, 'i', $id_documentacion);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_asig, $email);

  $json = array();

  while($row = mysqli_stmt_fetch($consultar)){

    $key = base64_encode($id_asig);  
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "CerNet_Informa@cercal.net";
    $to = $email;
    $subject = "Invitacion a participar en el modulo de documentacion";
    $message = "En el siguiente link podras observar el listado de las personas que no han firmado la documentación
              link: https://cercal.net/CERNET/informe_2.php?key=".$key;
    $header = "Enviado desde: ".$from;
    mail($to, $subject, $message, $header);
    
    echo "enviado";
  }
}else{
  $query1 = mysqli_prepare($connect,"SELECT id_persona  FROM participante_documentacion  WHERE id_documentacion = ? AND id_persona NOT IN (SELECT id_usuario FROM firmantes_documentacion)");
  mysqli_stmt_bind_param($query1, 'i', $id_documentacion);
  mysqli_stmt_execute($query1);
  mysqli_stmt_store_result($query1);
  mysqli_stmt_bind_result($query1, $id_persona);

  while($row = mysqli_stmt_fetch($query1)){

    $query2 = mysqli_prepare($connect,"SELECT b.id_persona, b.nombre, b.apellido, b.email, a.rol FROM persona as b, participante_documentacion as a WHERE b.id_usuario = ? AND a.id_persona = b.id_usuario ");
    mysqli_stmt_bind_param($query2, 'i', $id_persona);
    mysqli_stmt_execute($query2);
    mysqli_stmt_store_result($query2);
    mysqli_stmt_bind_result($query2, $id_usuario, $nombre, $apellido, $email, $rol);
    while($row2 = mysqli_stmt_fetch($query2)){

    $key = base64_encode($id_usuario);

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
    $to = $email;

    $subject = "Invitacion a participar en el modulo de documentacion";
    $message = "En el siguiente link podras ingresar a CerNet y participar en calidad  ".$rol_verdadero." de en el proceso de documentacion
                link: https://cercal.net/CERNET/firmar_documentacion.php?key=".$key;
    $header = "Enviado desde: ".$from;

    mail($to, $subject, $message, $header);

    echo "Enviado";

    }
  }
}


?>