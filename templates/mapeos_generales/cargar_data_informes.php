<?php
include('../../config.ini.php');



if(isset($_POST['AR'])){
  
$valor_etapa = $_POST['valor_etapa'];
$id_informe_actual = $_POST['id_informe_actual'];
$valor_relevancia = $_POST['valor_relevancia'];
$valor_descripcion = $_POST['valor_descripcion'];
$valor_probabilidad = $_POST['valor_probabilidad'];
$valor_impacto = $_POST['valor_impacto'];
$valor_clase = $_POST['valor_clase'];
$valor_deteccion = $_POST['valor_deteccion'];
$valor_prioridad = $_POST['valor_prioridad'];
$valor_medidas = $_POST['valor_medidas'];
$id_informe = $_POST['id_informe'];
  

  for($i = 0; $i<count($id_informe_actual);$i++){
    $actualizar = mysqli_prepare($connect,"UPDATE analisis_riesgos SET etapa= ? ,relevancia= ? ,descripcion= ? ,probabilidad= ? ,impacto= ? ,clase= ? ,deteccion= ? ,prioridad= ? ,medidas= ? 
    WHERE id = ?");
    mysqli_stmt_bind_param($actualizar, 'sssssssssi', $valor_etapa[$i], $valor_relevancia[$i], $valor_descripcion[$i], $valor_probabilidad[$i], $valor_impacto[$i], $valor_clase[$i], $valor_deteccion[$i],
                           $valor_prioridad[$i], $valor_medidas[$i], $id_informe_actual[$i]);
    mysqli_stmt_execute($actualizar);
  }
  
  $array_respuesta = array(
    'id_informe'=>$id_informe,
    'valor'=>'AR');
  
  $convert = json_encode($array_respuesta);
  echo $convert;
  
  
  
}else if(isset($_POST['BASE'])){
  
$id_informe = $_POST['id_informe_actual'];
$conclusiones_informe_base = $_POST['conclusiones_informe_base'];
$observaciones_informe_base = $_POST['observaciones_informe_base'];
$acta_inspeccion = $_POST['acta_inspeccion'];  
$imagen_1 = $_POST['imagen_base_equipo_1'];
$imagen_2 = $_POST['imagen_base_equipo_2'];
$imagen_3 = $_POST['imagen_base_equipo_3'];
$imagen_4 = $_POST['imagen_base_equipo_4'];
 
  echo $acta_inspeccion;
  
  $update_base =  mysqli_prepare($connect,"UPDATE informes_general SET comentario = ?, acta_inspeccion = ?  WHERE id_informe = ?");
  mysqli_stmt_bind_param($update_base, 'ssi', $conclusiones_informe_base, $acta_inspeccion ,$id_informe);
  mysqli_stmt_execute($update_base);
  
  $nueva_observacion = mysqli_prepare($connect,"INSERT INTO observaciones_inb (id_informe, observacion) VALUES (?, ?)");
  mysqli_stmt_bind_param($nueva_observacion, 'is', $id_informe, $observaciones_informe_base);
  mysqli_stmt_execute($nueva_observacion);
  
  
  
  if(!isset($imagen_1)){

      $tipo = 1;

    $target_dir = "informes/evidencia_grafica/equipo".$id_informe."/";
    if(is_dir($target_dir)===false){
      mkdir($target_dir,0777,true);
    }

    $personalizado=$target_dir."equipo1.jpg";

      $target_file = $target_dir . basename($_FILES["imagen_base_equipo_1"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["imagen_base_equipo_1"]["tmp_name"]);
      if($check !== false) {
          //echo " Este archivo es una imagen - " . $check["mime"] . ".";
          $uploadOk = 1;
      }else{
          //echo " Este archivo no es una imagen.";
          $uploadOk = 0;
      }


      // Check file size
      if ($_FILES["imagen_base_equipo_1"]["size"] > 5000000) {
          //echo "Tu archivo es demasiado grande.";
          $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          //echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
          $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
              //echo " Tu archivo no pudo cargarse.";
      // if everything is ok, try to upload file
      }else{
          if (move_uploaded_file($_FILES["imagen_base_equipo_1"]["tmp_name"], $target_file)) {
              rename("$target_file","$personalizado");
              $tipo = 11;
              $creando = mysqli_prepare($connect,"INSERT INTO imagenes_general_informe (id_informe, tipo, url) VALUES (?,?,?)");
              mysqli_stmt_bind_param($creando, 'iis', $id_informe, $tipo, $personalizado);
              mysqli_stmt_execute($creando);
          }else{
                  //echo " Hubo un error al intentar cargar el archivo.";
              } 	
      }
  }////////// CIERRE DEL ISSET DE IMAGEN1 
  

  if(!isset($imagen_2)){

 
    $target_dir = "informes/evidencia_grafica/equipo".$id_informe."/";
    if(is_dir($target_dir)===false){
      mkdir($target_dir,0777,true);
    }


    $personalizado=$target_dir."equipo2.jpg";

      $target_file = $target_dir . basename($_FILES["imagen_base_equipo_2"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["imagen_base_equipo_2"]["tmp_name"]);
      if($check !== false) {
          //echo " Este archivo es una imagen - " . $check["mime"] . ".";
          $uploadOk = 1;
      }else{
          //echo " Este archivo no es una imagen.";
          $uploadOk = 0;
      }


      // Check file size
      if ($_FILES["imagen_base_equipo_2"]["size"] > 5000000) {
          //echo "Tu archivo es demasiado grande.";
          $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          //echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
          $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
              //echo " Tu archivo no pudo cargarse.";
      // if everything is ok, try to upload file
      }else{
          if (move_uploaded_file($_FILES["imagen_base_equipo_2"]["tmp_name"], $target_file)) {
              rename("$target_file","$personalizado");
              $tipo = 22;
              $creando = mysqli_prepare($connect,"INSERT INTO imagenes_general_informe (id_informe, tipo, url) VALUES (?,?,?)");
              mysqli_stmt_bind_param($creando, 'iis', $id_informe, $tipo, $personalizado);
              mysqli_stmt_execute($creando);
          }else{
                  //echo " Hubo un error al intentar cargar el archivo.";
              } 	
      }
  }////////// CIERRE DEL ISSET DE IMAGEN2
  
   if(!isset($imagen_3)){

 
    $target_dir = "informes/evidencia_grafica/equipo".$id_informe."/";
    if(is_dir($target_dir)===false){
      mkdir($target_dir,0777,true);
    }


    $personalizado=$target_dir."equipo3.jpg";

      $target_file = $target_dir . basename($_FILES["imagen_base_equipo_3"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["imagen_base_equipo_3"]["tmp_name"]);
      if($check !== false) {
          //echo " Este archivo es una imagen - " . $check["mime"] . ".";
          $uploadOk = 1;
      }else{
          //echo " Este archivo no es una imagen.";
          $uploadOk = 0;
      }


      // Check file size
      if ($_FILES["imagen_base_equipo_3"]["size"] > 5000000) {
          //echo "Tu archivo es demasiado grande.";
          $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          //echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
          $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
              //echo " Tu archivo no pudo cargarse.";
      // if everything is ok, try to upload file
      }else{
          if (move_uploaded_file($_FILES["imagen_base_equipo_3"]["tmp_name"], $target_file)) {
              rename("$target_file","$personalizado");
              $tipo = 33;
              $creando = mysqli_prepare($connect,"INSERT INTO imagenes_general_informe (id_informe, tipo, url) VALUES (?,?,?)");
              mysqli_stmt_bind_param($creando, 'iis', $id_informe, $tipo, $personalizado);
              mysqli_stmt_execute($creando);
          }else{
                  //echo " Hubo un error al intentar cargar el archivo.";
              } 	
      }
  }////////// CIERRE DEL ISSET DE IMAGEN3

  if(!isset($imagen_4)){

 
    $target_dir = "informes/evidencia_grafica/equipo".$id_informe."/";
    if(is_dir($target_dir)===false){
      mkdir($target_dir,0777,true);
    }


    $personalizado=$target_dir."equipo4.jpg";

      $target_file = $target_dir . basename($_FILES["imagen_base_equipo_4"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["imagen_base_equipo_4"]["tmp_name"]);
      if($check !== false) {
          //echo " Este archivo es una imagen - " . $check["mime"] . ".";
          $uploadOk = 1;
      }else{
          //echo " Este archivo no es una imagen.";
          $uploadOk = 0;
      }


      // Check file size
      if ($_FILES["imagen_base_equipo_4"]["size"] > 5000000) {
          //echo "Tu archivo es demasiado grande.";
          $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          //echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
          $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
              //echo " Tu archivo no pudo cargarse.";
      // if everything is ok, try to upload file
      }else{
          if (move_uploaded_file($_FILES["imagen_base_equipo_4"]["tmp_name"], $target_file)) {
              rename("$target_file","$personalizado");
              $tipo = 44;
              $creando = mysqli_prepare($connect,"INSERT INTO imagenes_general_informe (id_informe, tipo, url) VALUES (?,?,?)");
              mysqli_stmt_bind_param($creando, 'iis', $id_informe, $tipo, $personalizado);
              mysqli_stmt_execute($creando);
          }else{
                  //echo " Hubo un error al intentar cargar el archivo.";
              } 	
      }
  }////////// CIERRE DEL ISSET DE IMAGEN3
  echo $id_informe_actual;


}else{
  
  $comentario_informe_temp = $_POST['comentario_informe_temp'];
  $observacion_informe_temp = $_POST['observacion_informe_temp'];
  $id_informe = $_POST['id_informe_actual'];
  $imagen_1 = $_POST['imagen_tipo_1'];
  $imagen_2 = $_POST['imagen_tipo_2'];
  $imagen_3 = $_POST['imagen_tipo_3'];
  $solicitante = $_POST['solicitante'];

/*
  if(!isset($imagen_1)){

      $tipo = 1;

    $target_dir = "evidencia_grafica/ubicacion_sensores".$id_informe."/";
    if(is_dir($target_dir)===false){
      mkdir($target_dir,0777,true);
    }


    $personalizado=$target_dir."posicion_sensores.jpg";

      $target_file = $target_dir . basename($_FILES["imagen_tipo_1"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["imagen_tipo_1"]["tmp_name"]);
      if($check !== false) {
          //echo " Este archivo es una imagen - " . $check["mime"] . ".";
          $uploadOk = 1;
      }else{
          //echo " Este archivo no es una imagen.";
          $uploadOk = 0;
      }


      // Check file size
      if ($_FILES["imagen_tipo_1"]["size"] > 5000000) {
          //echo "Tu archivo es demasiado grande.";
          $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          //echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
          $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
              //echo " Tu archivo no pudo cargarse.";
      // if everything is ok, try to upload file
      }else{
          if (move_uploaded_file($_FILES["imagen_tipo_1"]["tmp_name"], $target_file)) {
              rename("$target_file","$personalizado");

              $creando = mysqli_prepare($connect,"INSERT INTO imagenes_general_informe (id_informe, tipo, url) VALUES (?,?,?)");
              mysqli_stmt_bind_param($creando, 'iis', $id_informe, $tipo, $personalizado);
              mysqli_stmt_execute($creando);
          }else{
                  //echo " Hubo un error al intentar cargar el archivo.";
              } 	
      }
  }////////// CIERRE DEL ISSET DE IMAGEN1    

  if(!isset($imagen_2)){

      $tipo = 2;

    $target_dir = "evidencia_grafica/valores_promedios".$id_informe."/";
    if(is_dir($target_dir)===false){
      mkdir($target_dir,0777,true);
    }

    $personalizado=$target_dir."promedio_minimo_maximo.jpg";

      $target_file = $target_dir . basename($_FILES["imagen_tipo_2"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["imagen_tipo_2"]["tmp_name"]);
      if($check !== false) {
          //echo " Este archivo es una imagen - " . $check["mime"] . ".";
          $uploadOk = 1;
      }else{
          //echo " Este archivo no es una imagen.";
          $uploadOk = 0;
      }


      // Check file size
      if ($_FILES["imagen_tipo_2"]["size"] > 5000000) {
          //echo "Tu archivo es demasiado grande.";
          $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          //echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
          $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
              //echo " Tu archivo no pudo cargarse.";
      // if everything is ok, try to upload file
      }else{
          if (move_uploaded_file($_FILES["imagen_tipo_2"]["tmp_name"], $target_file)) {
          rename("$target_file","$personalizado");

          $creando = mysqli_prepare($connect,"INSERT INTO imagenes_general_informe (id_informe, tipo, url) VALUES (?,?,?)");
          mysqli_stmt_bind_param($creando, 'iis', $id_informe, $tipo, $personalizado);
          mysqli_stmt_execute($creando);
      }else{
          //echo " Hubo un error al intentar cargar el archivo.";
      } 	
  }
  }////////// CIERRE DEL ISSET DE IMAGEN2 

  if(!isset($imagen_3)){

      $tipo = 3;

    $target_dir = "evidencia_grafica/periodo_representativo".$id_informe."/";
    if(is_dir($target_dir)===false){
      mkdir($target_dir,0777,true);
    }

    $personalizado=$target_dir."periodo_representativo.jpg";

      $target_file = $target_dir . basename($_FILES["imagen_tipo_3"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["imagen_tipo_3"]["tmp_name"]);
      if($check !== false) {
          //echo " Este archivo es una imagen - " . $check["mime"] . ".";
          $uploadOk = 1;
      }else{
          //echo " Este archivo no es una imagen.";
          $uploadOk = 0;
      }


      // Check file size
      if ($_FILES["imagen_tipo_3"]["size"] > 5000000) {
          //echo "Tu archivo es demasiado grande.";
          $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          //echo " Solo se permite cargar imagenes tipo JPG, JPEG, PNG & GIF";
          $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
              //echo " Tu archivo no pudo cargarse.";
      // if everything is ok, try to upload file
      }else{
          if (move_uploaded_file($_FILES["imagen_tipo_3"]["tmp_name"], $target_file)) {
          rename("$target_file","$personalizado");

          $creando = mysqli_prepare($connect,"INSERT INTO imagenes_general_informe (id_informe, tipo, url) VALUES (?,?,?)");
          mysqli_stmt_bind_param($creando, 'iis', $id_informe, $tipo, $personalizado);
          mysqli_stmt_execute($creando);
      }else{
          echo " Hubo un error al intentar cargar el archivo.";
      } 	
  }
  }////////// CIERRE DEL ISSET DE IMAGEN2 

*/
  $actualizando_comentarios = mysqli_prepare($connect,"UPDATE informes_general SET comentario = ? , observacion = ?, solicitante = ? WHERE id_informe = ?");
  mysqli_stmt_bind_param($actualizando_comentarios, 'sssi', $comentario_informe_temp, $observacion_informe_temp, $solicitante, $id_informe);
  mysqli_stmt_execute($actualizando_comentarios);

  if($actualizando_comentarios){
      $array_frio= array('id_informe'=>$id_informe,
                          'valor'=>'TEMP');
      $convert = json_encode($array_frio);
      echo $convert;
    
  }else{
      echo "Error";
  }
}  

mysqli_close($connect);

?>