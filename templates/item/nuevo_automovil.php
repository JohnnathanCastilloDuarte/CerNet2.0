<?php 
	include('../../config.ini.php');

	//error_reporting(0);

	$nombre_automovil = $_POST['nombre_automovil'];
	$id_empresa_automovil = $_POST['id_empresa_automovil'];
	$fabricante_automovil = $_POST['fabricante_automovil'];
	$modelo_automovil = $_POST['modelo_automovil'];
	$desc_automovil = $_POST['desc_automovil'];
	$n_serie_automovil = $_POST['n_serie_automovil'];
	$codigo_interno_automovil = $_POST['codigo_interno_automovil'];
	$fecha_fabricacion_automovil = $_POST['fecha_fabricacion_automovil'];
	$direccion_automovil = $_POST['direccion_automovil'];
	$ubicacion_interna_automovil = $_POST['ubicacion_interna_automovil'];
	$voltaje_automovil = $_POST['voltaje_automovil'];
	$potencia_automovil = $_POST['potencia_automovil'];
	$capacidad_automovil = $_POST['capacidad_automovil'];
	$peso_automovil = $_POST['peso_automovil'];
	$alto_automovil = $_POST['alto_automovil'];
	$largo_automovil = $_POST['largo_automovil'];
	$ancho_automovil = $_POST['ancho_automovil'];
	$valor_seteado_tem_automovil = $_POST['valor_seteado_tem_automovil'];
	$temperatura_minima_automovil = $_POST['temperatura_minima_automovil'];
	$temperatura_maxima_automovil = $_POST['temperatura_maxima_automovil'];
	$placa_automovil = $_POST['placa_automovil'];
  $area_interna_automovil = $_POST['area_interna_automovil'];

  if($fecha_fabricacion_automovil == "" || $fecha_fabricacion_automovil == NULL ){
     $fecha_fabricacion = "NA";
  }else{
    $fecha_fabricacion = $_POST['fecha_fabricacion_automovil'];
  }

	$id_usuario = $_POST['id_valida'];
	$id_tipo_item = 7;

	///////////////// PRIMER INSERT TABLA ITEM

  $insert_item = mysqli_prepare($connect,"INSERT INTO item (id_empresa, id_tipo, nombre, descripcion, id_usuario) VALUES (?,?,?,?,?)");
      mysqli_stmt_bind_param($insert_item, 'iissi', $id_empresa_automovil, $id_tipo_item, $nombre_automovil, $desc_automovil,$id_usuario);
      mysqli_stmt_execute($insert_item);
      echo mysqli_stmt_error($insert_item);

  $id_item = mysqli_stmt_insert_id($insert_item);

  if($insert_item){
    ///////////////////// INSERTANDO EN LA TABLA ITEM_FILTRO


    $insert_automovil = mysqli_prepare($connect,"INSERT INTO item_automovil (id_item, fabricante, modelo, n_serie, c_interno, 
    placa, fecha_fabricacion, direccion, valor_seteado_tem,tem_min,tem_max,ubicacion,voltaje,
    potencia,capacidad,peso,alto,largo,ancho,id_usuario,area_interna) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    
    mysqli_stmt_bind_param($insert_automovil, 'issssssssssssssssssis', 
    	$id_item, 
    	$fabricante_automovil, 
    	$modelo_automovil, 
    	$n_serie_automovil, 
    	$codigo_interno_automovil, 
    	$placa_automovil, 
    	$fecha_fabricacion_automovil, 
    	$direccion_automovil, 
    	$valor_seteado_tem_automovil, 
    	$temperatura_minima_automovil, 
    	$temperatura_maxima_automovil,
    	$ubicacion_interna_automovil,
    	$voltaje_automovil,
    	$potencia_automovil,
    	$capacidad_automovil,
    	$peso_automovil,
    	$alto_automovil,
    	$largo_automovil,
    	$ancho_automovil,
    	$id_usuario,
      $fecha_fabricacion                     
    );
    
    mysqli_stmt_execute($insert_automovil);
    echo mysqli_stmt_error($insert_automovil);

    if($insert_automovil){
      echo "Si";
    }else{
      echo "No";
    }
  }

 ?>