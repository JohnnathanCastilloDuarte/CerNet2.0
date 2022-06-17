<?php 
include('../../config.ini.php');

$id_documentacion = $_POST['id_documentacion'];
$id_persona = $_POST['id_valida'];
$json = array();


$consultar = mysqli_prepare($connect,"SELECT a.fecha_creacion, a.fecha_firma, a.QR, b.nombre, b.apellido, a.id,   d.nombre, c.nombre, a.id_persona FROM participante_documentacion as a, persona as b, empresa as c, documentacion as d WHERE a.id_persona = b.id_usuario  AND a.id_documentacion = ? AND b.id_empresa = c.id_empresa AND a.id_documentacion = d.id");
mysqli_stmt_bind_param($consultar, 'i', $id_documentacion);
mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $fecha_registro, $fecha_firma,  $qr, $nombre, $apellido, $id_participante, $nombre_documentacion, $empresa, $id_usuario );

$fecha_firmantes = "";

  while($row = mysqli_stmt_fetch($consultar)){

    if($qr == ""){
      $buscar_rechazo = mysqli_prepare($connect,"SELECT fecha_registro FROM rechazos_documentacion WHERE id_documentacion = ? AND id_usuario = ?");
      mysqli_stmt_bind_param($buscar_rechazo, 'ii', $id_documentacion, $id_usuario);
      mysqli_stmt_execute($buscar_rechazo);
      mysqli_stmt_store_result($buscar_rechazo);
      mysqli_stmt_bind_result($buscar_rechazo, $fecha_firma_no);
      mysqli_stmt_fetch($buscar_rechazo);
      
      $fecha_firmantes = $fecha_firma_no;

    }else{
      $fecha_firmantes = $fecha_firma;
    }

    $json[] = array(
    'fecha_registro'=>$fecha_registro,
    'nombre'=>$nombre,
    'apellido'=>$apellido,
    'qr'=>$qr,
    'id_t_firmantes'=>$id_participante,
    'nombre_documento'=>$nombre_documentacion,
    'empresa'=>$empresa,
    'fecha_firma'=>$fecha_firmantes
    );
  }  
  $convert = json_encode($json);
  echo $convert;
mysqli_close($consultar);
?>