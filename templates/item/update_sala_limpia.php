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
  $sala_limpia = mysqli_prepare($connect,"SELECT b.id_item, a.id, b.nombre, a.Area_sala_limpia, a.Codigo, a.Area_m2, a.Volumen_m3, a.Estado_sala, c.id_empresa, c.nombre, a.direccion, a.ubicacion_interna, a.area_interna, a.especificacion_1_temp, a.especificacion_2_temp, a.especificacion_1_hum, a.especificacion_2_hum
    FROM item_sala_limpia a, item b, empresa c 
    WHERE b.id_item = a.id_item AND c.id_empresa = b.id_empresa AND a.id_item = $id_equipo");
  mysqli_stmt_execute($sala_limpia);
  mysqli_stmt_store_result($sala_limpia);
  mysqli_stmt_bind_result($sala_limpia, $id_item, $id_sala_limpia, $nombre_sala_limpia,
    $Area_sala_limpia, $codigo,$area_m2, $volumen_m3, $estado_sala, $id_empresa, $nombre_empresa, $direccion ,$ubicacion_interna, $area_interna, $especificacion_1_temp, $especificacion_2_temp, $especificacion_1_hum, $especificacion_2_hum, );

  $array_sala_limpia = array();

  while($row = mysqli_stmt_fetch($sala_limpia)){
      $array_sala_limpia[] = array(
        'id_item'=>$id_equipo,
        'id_sala_limpia'=>$id_sala_limpia,
        'nombre_sala_limpia'=>$nombre_sala_limpia,
        'Area_sala_limpia'=>$Area_sala_limpia,
        'codigo'=>$codigo,
        'area_m2'=>$area_m2,
        'volumen_m3'=>$volumen_m3,
        'estado_sala'=>$estado_sala,
        'id_empresa' =>$id_empresa,
        'nombre_empresa' =>$nombre_empresa,
        'direccion'=>$direccion,
        'ubicacion_interna'=>$ubicacion_interna,
        'area_interna'=>$area_interna,
        'especificacion_1_temp'=>$especificacion_1_temp,
        'especificacion_2_temp'=>$especificacion_2_temp,
        'especificacion_1_hum'=>$especificacion_1_hum,
        'especificacion_2_hum'=>$especificacion_1_hum
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
        'Area_sala _limpia'=>'',
        'codigo'=>'',
        'area_m2'=>'',
        'volumen_m3'=>'',
        'estado_sala'=>''
);
  $smarty->assign("array_sala_limpia",$array_sala_limpia);
}//////// CIERRE DEL ELSE


//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_sala_limpia);   
$conv = base64_encode($convert);
if ($_GET['pdf'] == 1) {

    header('location: templates/item/pdf/pdf/pdf_sala_limpia.php?&data='.$conv);

}elseif($_GET['pdf'] == 0){
    $smarty->display("item/update_sala_limpia.tpl");
}elseif($_GET['pdf'] == 2){

  $url = $_SERVER['HTTP_HOST'];
    
  if($url = 'cercal.net') {

    $link2  = 'https://cercal.net/CerNet2.0/templates/item/pdf/pdf/pdf_sala_limpia.php';
    $correo = $_GET['correo'];
    header('location: ../documentacion/enviarPDF_correo.php?correo='.$correo."&link=".$link2."&conv=".$conv);   
  }else{  
    $link2  = 'https://localhost/CerNet2.0/templates/item/pdf/pdf/pdf_sala_limpia.php';
    $correo = $_GET['correo'];
    header('location: ../documentacion/enviarPDF_correo.php?correo='.$correo."&link=".$link2."&conv=".$conv);
  }
}


?>