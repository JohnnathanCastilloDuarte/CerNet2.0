<?php
    include('../../config.ini.php');

    error_reporting(0);

    $nombre_filtro = $_POST['nombre_filtro'];
    $empresa_filtro = $_POST['empresa_filtro'];
    $marca_filtro = $_POST['marca_filtro'];
    $modelo_filtro = $_POST['modelo_filtro'];
    $serie_filtro = $_POST['serie_filtro'];
    $cantidad_filtros_filtro = $_POST['cantidad_filtros_filtro'];
    $ubicacion_filtro = $_POST['ubicacion_filtro'];
    $ubicado_en_filtro = $_POST['ubicado_en_filtro'];
    $lugar_filtro = $_POST['lugar_filtro'];
    $tipo_filtro = $_POST['tipo_filtro'];
    $penetracion_filtro = $_POST['penetracion_filtro'];
    $id_tipo_filtro = $_POST['id_tipo_filtro'];
    $id_usuario = $_POST['id_valida_filtro'];
    $eficiencia = $_POST['eficiencia'];


    $tipo  = substr($nombre_filtro, -3);
    $nombre_filtro = substr($nombre_filtro, 0, -3);  



///////////////// PRIMER INSERT TABLA ITEM

  $insert_item = mysqli_prepare($connect,"INSERT INTO item (id_empresa, id_tipo, nombre, descripcion, id_usuario) VALUES (?,?,?,?,?)");
  mysqli_stmt_bind_param($insert_item, 'iissi', $empresa_filtro, $id_tipo_filtro, $nombre_filtro, $nombre_filtro,$id_usuario);
  mysqli_stmt_execute($insert_item);
  echo mysqli_stmt_error($insert_item);

  $id_item = mysqli_stmt_insert_id($insert_item);

  if($insert_item){
    ///////////////////// INSERTANDO EN LA TABLA ITEM_FILTRO


    $insert_filtro = mysqli_prepare($connect,"INSERT INTO item_filtro (id_item, marca, modelo, serie, cantidad_filtro, ubicacion, ubicado_en, filtro_dimension, tipo_filtro, lugar_filtro, limite_penetracion, eficiencia) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
    
    mysqli_stmt_bind_param($insert_filtro, 'isssisssssss', $id_item, $marca_filtro, $modelo_filtro, $serie_filtro, $cantidad_filtros_filtro, $ubicacion_filtro, $ubicado_en_filtro, $tipo_filtro, $tipo, $lugar_filtro, $penetracion_filtro, $eficiencia);
    
    mysqli_stmt_execute($insert_filtro);
    echo mysqli_stmt_error($insert_filtro);
    
    
    if($insert_filtro){
      echo "Si";
    }else{
      echo "No";
    }
  }else{
    echo "No";
  }
    

    mysqli_close($connect);
?>