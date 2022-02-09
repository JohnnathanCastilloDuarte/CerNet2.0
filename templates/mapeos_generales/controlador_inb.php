<?php 
include('../../config.ini.php');
$movimiento = $_POST['movimiento'];


if($movimiento == "Listar_observaciones"){
  
  $array_observaciones = array();
  $id_informe = $_POST['id_informe'];

  $consultar = mysqli_prepare($connect,"SELECT id_observacion, observacion FROM observaciones_inb WHERE id_informe = ? ORDER BY id_observacion ASC");
  mysqli_stmt_bind_param($consultar, 'i', $id_informe);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $id_observacion, $observacion);
   
  
  while($row = mysqli_stmt_fetch($consultar)){
    
    $array_observaciones[]=array(
      'id_observacion'=>$id_observacion,
      'observacion'=>$observacion
    );
  }
  
  $convert = json_encode($array_observaciones);
  echo $convert;
}

else if($movimiento == "Eliminar_observacion"){
  
  $id_observacion = $_POST['id_observacion'];
  
  $eliminar = mysqli_prepare($connect,"DELETE FROM observaciones_inb WHERE id_observacion = ?");
  mysqli_stmt_bind_param($eliminar, 'i', $id_observacion);
  mysqli_stmt_execute($eliminar);
  
  if($eliminar){
    echo "listo";
  }
}

else if($movimiento == "Listar_imagenes"){
  
  $id_informe = $_POST['id_informe'];
  $array_imagenes = array();
  $consultar_imagenes = mysqli_prepare($connect,"SELECT  id_imagen, tipo, url FROM imagenes_general_informe WHERE id_informe = ?");
  mysqli_stmt_bind_param($consultar_imagenes, 'i', $id_informe);
  mysqli_stmt_execute($consultar_imagenes);
  mysqli_stmt_store_result($consultar_imagenes);
  mysqli_Stmt_bind_result($consultar_imagenes, $id_imagen, $tipo, $url);
  
  while($row = mysqli_stmt_fetch($consultar_imagenes)){
      
    $array_imagenes[]=array(
      'id_imagen'=>$id_imagen,
      'tipo'=>$tipo,
      'url'=>$url
    );
  }
  
  $convert = json_encode($array_imagenes);
  echo $convert;
  
}
mysqli_close($connect);
?>