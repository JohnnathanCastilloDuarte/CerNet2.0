<?php 

include("../../config.ini.php");

$id_asignado = $_POST['id_asignado_freezer'];
$seleccion = $_POST['seleccion'];

$json = array();


if($seleccion == 1){

  //CONSULTAR INFORMES
  $informes = mysqli_prepare($connect,"SELECT a.id_informe_freezer, a.n_increment,  a.nombre, a.tipo, a.id_mapeo, a.id_asignado, a.estado, a.fecha_registro, b.nombre, a.observacion,
  a.comentarios, a.concepto  FROM informe_freezer as a, freezer_mapeo as b WHERE  a.id_asignado = $id_asignado AND a.id_asignado = b.id_asignado AND a.id_mapeo = b.id_mapeo AND a.tipo = 2 ORDER BY tipo DESC ");

  mysqli_stmt_execute($informes);
  mysqli_stmt_store_result($informes);
  mysqli_stmt_bind_result($informes, $id_informe, $n_increment, $nombre, $tipo, $id_mapeo, $id_asignado, $estado, $fecha_registro, $nombre_mapeo, $observacion, $comentarios, $concepto);



  while($row = mysqli_stmt_fetch($informes)){

  $aprobacion = mysqli_prepare($connect,"SELECT id_aprobacion, estado, observacion FROM aprobacion_informes WHERE id_informe = ?");
  mysqli_stmt_bind_param($aprobacion, 'i', $id_informe);
  mysqli_stmt_execute($aprobacion);
  mysqli_stmt_store_result($aprobacion);
  mysqli_stmt_bind_result($aprobacion, $id_aprobacion, $estado_informe, $observaciones_informe);
  mysqli_stmt_fetch($aprobacion);

  $img_posicion = mysqli_prepare($connect, "SELECT ubicacion FROM images_informe_freezer WHERE id_informe = $id_informe AND tipo_imagen = 1");
  mysqli_stmt_execute($img_posicion);
  mysqli_stmt_store_result($img_posicion);
  mysqli_stmt_bind_result($img_posicion, $url);
  mysqli_stmt_fetch($img_posicion);


  $json[] = array(
  'id_informe'=>$id_informe,
  'nombre'=>$nombre,
  'id_mapeo'=>$id_mapeo,
  'nombre_mapeo'=>$nombre_mapeo,
  'estado'=>$estado,
  'fecha_registro'=>$fecha_registro,
  'tipo_informe'=>$tipo,
  'img_posicion'=>$url,	
  'observacion'=>$observacion,
  'comentarios'=>$comentarios,
  'concepto'=>$concepto,  
  'id_aprobacion'=>$id_aprobacion,	
  'estado_aprobacion'=>$estado_informe,
  'observacion_aprobacion'=>$observaciones_informe,
  'n_increment'=>$n_increment
  );
  }

  $convert = json_encode($json);

  echo $convert;
}

else if($seleccion == 2){
  
    $consultar_mapeos = mysqli_prepare($connect,"SELECT id_mapeo, nombre, comentario FROM freezer_mapeo WHERE id_asignado = $id_asignado AND informe_base = 1");
    mysqli_stmt_execute($consultar_mapeos);
    mysqli_stmt_store_result($consultar_mapeos);
    mysqli_stmt_bind_result($consultar_mapeos , $id_mapeo, $nombre_mapeo, $comentarios);
    
    while($row = mysqli_stmt_fetch($consultar_mapeos)){
      
       
      
      $json[] = array(
      'id_mapeo'=>$id_mapeo,
      'nombre_mapeo'=>$nombre_mapeo,
      'comentario'=>$comentarios 
      );
    }
  
    $convert = json_encode($json);
  
    echo $convert;
  
}

else if($seleccion == 3){
  
    $consultar = mysqli_prepare($connect,"SELECT id_informe_freezer FROM informe_freezer WHERE id_asignado = $id_asignado AND tipo = 2");
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_informe);
    mysqli_stmt_fetch($consultar);
  
    
  
    $consultar_2 = mysqli_prepare($connect,"SELECT id_imagen, ubicacion FROM images_informe_freezer WHERE id_informe = $id_informe AND tipo_imagen = 4");
    mysqli_stmt_execute($consultar_2);
    mysqli_stmt_store_result($consultar_2);
    mysqli_stmt_bind_result($consultar_2, $id_imagen, $url);
    
    while($row = mysqli_stmt_fetch($consultar_2)){
      $json[] = array(
       'id_imagen'=>$id_imagen, 
       'ubicacion'=>$url,
       'id_informe'=>$id_informe 
      );
    }
  
    $convert = json_encode($json);
  
    echo $convert;
}

else if($seleccion == 4){
    $consultar = mysqli_prepare($connect,"SELECT id_informe_freezer FROM informe_freezer WHERE id_asignado = $id_asignado AND tipo = 2");
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $id_informe);
    mysqli_stmt_fetch($consultar);
  
    
  
    $consultar_2 = mysqli_prepare($connect,"SELECT id_imagen, ubicacion FROM images_informe_freezer WHERE id_informe = $id_informe AND tipo_imagen = 1");
    mysqli_stmt_execute($consultar_2);
    mysqli_stmt_store_result($consultar_2);
    mysqli_stmt_bind_result($consultar_2, $id_imagen, $url);
    
    while($row = mysqli_stmt_fetch($consultar_2)){
      $json[] = array(
       'id_imagen'=>$id_imagen, 
       'ubicacion'=>$url,
       'id_informe'=>$id_informe 
      );
    }
  
    $convert = json_encode($json);
  
    echo $convert;
}

mysqli_stmt_close($connect);

?>