<?php 

  include("../../config.ini.php");
  //CONSULTAR EMPRESAS
    $consultar_empresa = mysqli_prepare($connect,"SELECT id_empresa, nombre FROM empresa");
    mysqli_stmt_execute($consultar_empresa);
    mysqli_stmt_store_result($consultar_empresa);
    mysqli_stmt_bind_result($consultar_empresa, $id_empresas, $nombre_empresas);


    $array_empresas = array();

    while($row = mysqli_stmt_fetch($consultar_empresa)){

      $array_empresas[] = array(
          'id_empresas'=>$id_empresas,
          'nombre_empresas'=>$nombre_empresas   
      );
  }
  $smarty->assign("array_empresas",$array_empresas);    

if(isset($_GET['item'])){

    //RECUPER EL DATO DE LA URL 
    $id_equipo = $_GET['item'];

    //CONSULTO LA INFORMACIÓN DEL EQUIPO
  $sala_limpia = mysqli_prepare($connect,"SELECT 
   b.id_item,
   a.id, 
   b.nombre, 
   a.Area_m2,
   a.Volumen_m3, 
   c.id_empresa, 
   c.nombre, 
   a.direccion, 
   a.area_interna, 
   d.nombre, 
   a.clasificacion_oms, 
   a.clasificacion_iso, 
   a.ren_hr, 
   a.especificacion_1_temp, 
   a.especificacion_2_temp, 
   a.especificacion_1_hum, 
   a.especificacion_2_hum, 
   a.lux, 
   a.ruido_dba, 
   a.presion_sala, 
   a.presion_versus, 
   a.tipo_presion, 
   a.puntos_muestreo,
   a.fecha_registro,
   a.codigo,
   a.estado_sala,
   a.temp_informativa,
   a.hum_informativa,
   a.cantidad_extracciones,
   a.cantidad_inyecciones

FROM item_sala_limpia a, item b, empresa c, tipo_item d 
WHERE b.id_item = a.id_item AND c.id_empresa = b.id_empresa AND d.id_item = b.id_tipo AND a.id_item =  $id_equipo");
  mysqli_stmt_execute($sala_limpia);
  mysqli_stmt_store_result($sala_limpia);
  mysqli_stmt_bind_result($sala_limpia, 

    
    $id_item, 
    $id_sala_limpia, 
    $nombre_sala_limpia,
    $area_m2, 
    $volumen_m3, 
    $id_empresa, 
    $nombre_empresa, 
    $direccion ,
    $area_interna, 
    $nombre_tipo_item,
    $clasificacion_oms,
    $clasificacion_iso,
    $ren_hr,
    $temperatura_maxima, 
    $temperatura_minima, 
    $humedad_maxima, 
    $humedad_minima, 
    $lux,
    $ruido_dba,
    $presion_sala,
    $presion_versus,
    $tipo_presion,
    $puntos_muestreo,
    $fecha_registro,
    $codigo,
    $estado_sala,
    $temperatura_informativa,
    $humedad_informativa,
    $cantidad_extracciones,
    $cantidad_inyecciones

  );

  $array_sala_limpia = array();

  while($row = mysqli_stmt_fetch($sala_limpia)){
      $array_sala_limpia[] = array( 
        'id_item'=>$id_equipo,
        'id_sala_limpia'=>$id_sala_limpia,
        'nombre_sala_limpia'=>$nombre_sala_limpia,
        'area_m2'=>$area_m2,
        'volumen_m3'=>$volumen_m3,
        'id_empresa' =>$id_empresa,
        'nombre_empresa' =>$nombre_empresa,
        'direccion'=>$direccion,
        'area_interna'=>$area_interna,
        'nombre_tipo_item'=>$nombre_tipo_item,
        'clasificacion_oms'=>$clasificacion_oms,
        'clasificacion_iso'=>$clasificacion_iso,
        'ren_hr'=>$ren_hr,
        'temperatura_maxima'=>$temperatura_maxima, 
        'temperatura_minima'=>$temperatura_minima, 
        'hum_relativa_maxima'=>$humedad_maxima, 
        'hum_relativa_minima'=>$humedad_minima, 
        'lux'=>$lux,
        'ruido_dba'=>$ruido_dba,
        'presion_sala'=>$presion_sala,
        'presion_versus'=>$presion_versus,
        'tipo_presion'=>$tipo_presion,
        'puntos_muestreo'=>$puntos_muestreo,
        'fecha_registro'=>$fecha_registro,
        'codigo_interna'=>$codigo,
        'estado_sala'=>$estado_sala,
        'temperatura_informativa'=>$temperatura_informativa,
        'humedad_informativa'=>$humedad_informativa,
        'cantidad_extracciones'=>$cantidad_extracciones,
        'cantidad_inyecciones'=>$cantidad_inyecciones
        
    );  
  }

  $smarty->assign("array_sala_limpia",$array_sala_limpia);

}/////////// CIERRE DEL IF   
else{
 // $tipo_item = $_GET['type'];


  $array_sala_limpia[] = array(
        'id_item'=>'',
        'id_sala_limpia'=>'',
        'nombre_sala_limpia'=>'',
        'area_m2'=>'',
        'volumen_m3'=>'',
        'id_empresa' =>'',
        'nombre_empresa' =>'',
        'direccion'=>'',
        'ubicacion_interna'=>'',
        'area_interna'=>'',
        'nombre_tipo_item'=>'',
        'clasificacion_oms'=>'',
        'clasificacion_iso'=>'',
        'claudal_m3h'=>'',
        'ren_hr'=>'',
        'temperatura'=>'',
        'hum_relativa'=>'',
        'lux'=>'',
        'ruido_dba'=>'',
        'presion_sala'=>'',
        'presion_versus'=>'',
        'tipo_presion'=>'',
        'puntos_muestreo'=>'',
        'codigo'=>'',
        'estado_sala'=>'',
        'cantidad_extracciones'=>'',
        'cantidad_inyecciones'=>''

);
  $smarty->assign("array_sala_limpia",$array_sala_limpia);
}//////// CIERRE DEL ELSE

//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_sala_limpia);   
$conv = base64_encode($convert);
if ($_GET['pdf'] == 1) {

    header('location: templates/item/pdf/pdf/pdf_item.php?&data='.$conv);

}elseif($_GET['pdf'] == 0){
    $smarty->display("item/update_sala_limpia.tpl");
}elseif($_GET['pdf'] == 2){

  $url = $_SERVER['HTTP_HOST'];
    
  if($url = 'cercal.net') {

    $link2  = 'https://cercal.net/CerNet2.0/templates/item/pdf/pdf/pdf_item.php';
    $correo = $_GET['correo'];
    header('location: ../documentacion/enviarPDF_correo.php?correo='.$correo."&link=".$link2."&conv=".$conv);   
  }else{  
    $link2  = 'https://localhost/CerNet2.0/templates/item/pdf/pdf/pdf_item.php';
    $correo = $_GET['correo'];
    header('location: ../documentacion/enviarPDF_correo.php?correo='.$correo."&link=".$link2."&conv=".$conv);
  }
}


?>