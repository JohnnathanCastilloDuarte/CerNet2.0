<?php

include("../../config.ini.php");
$tipo_item = $_GET['type'];
$smarty->assign("id_tipo_filtro",$tipo_item);
$$array_filtro = array();


   //consultar empresas
  $empresas = mysqli_prepare($connect,"SELECT id_empresa, nombre FROM empresa");
  mysqli_stmt_execute($empresas);
  mysqli_stmt_store_result($empresas);
  mysqli_stmt_bind_result($empresas, $id_empresa, $nombre_empresa);

  $array_empresa = array();

  while($row = mysqli_stmt_fetch($empresas)){

    $array_empresa[]=array(
      'id_empresa'=>$id_empresa,
      'nombre_empresa'=>$nombre_empresa 
    );
  }
  $smarty->assign("array_empresa",$array_empresa);

if(isset($_GET['item'])){




  $id_item = $_GET['item'];
  $smarty->assign("id_item_filtro",$id_item);

  $consultar = mysqli_prepare($connect,"SELECT a.nombre, b.id_filtro, b.marca, b.modelo, b.serie, b.cantidad_filtro, b.ubicacion, b.ubicado_en, b.filtro_dimension, c.nombre, c.id_empresa, b.lugar_filtro, b.limite_penetracion, d.nombre, a.fecha_registro FROM item as a, item_filtro as b, empresa as c, tipo_item as d WHERE a.id_item = ? AND a.id_item = b.id_item AND a.id_tipo = d.id_item  AND a.id_empresa = c.id_empresa");
  
  mysqli_stmt_bind_param($consultar, 'i', $id_item);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $nombre_filtro, $id_filtro, $marca_fitro, $modelo_filtro, $serie_filtro, $cantidad_filtro, $ubicacion_filtro, $ubicado_en_filtro,
    $tipo_filtro, $empresa_filtro, $id_empresa, $lugar_filtro, $penetracion_filtro,$nombre_tipo_item,$fecha_registro);
  
  mysqli_stmt_fetch($consultar);

  $smarty->assign("nombre_item",$nombre_filtro);

  $array_filtro[] = array(
    'nombre_item'=>$nombre_filtro,
    'id_empresa' => $id_empresa,
    'nombre_empresa' => $empresa_filtro,
    'marca' => $marca_fitro,
    'modelo' => $modelo_filtro,
    'serie' => $serie_filtro,
    'cantidad_filtros' => $cantidad_filtro,
    'direccion' => $ubicacion_filtro,
    'ubicacion_interna' => $ubicado_en_filtro,
    'tipo_filtro' => $tipo_filtro,
    'area_interna' => $lugar_filtro,
    'penetracion_filtro' => $penetracion_filtro,
    'id_filtro' => $id_filtro,
    'nombre_tipo_item'=>$nombre_tipo_item,
    'fecha_registro'=>$fecha_registro
  );

  
  $smarty->assign("array_filtro",$array_filtro);

}else{

 $id_item = "";

 $array_filtro[] = array(
  'nombre_filtro'=>"",
  'id_empresa' => "",
  'nombre_empresa' => "",
  'marca' => "",
  'modelo' => "",
  'serie' => "",
  'cantidad_filtros' => "",
  'ubicacion' => "",
  'ubicado_en' => "",
  'tipo' => "",
  'lugar_filtro' => "",
  'penetracion_filtro' => "",
  'id_filtro' => "",
  'nombre_tipo_item'=>""

);

 $smarty->assign("id_item_filtro","");
 $smarty->assign("nombre_item","Filtro Absoluto HEPA-OQ H13");
 $smarty->assign("array_filtro",$array_filtro);
}

//ENCRIPTACION Y ENVIO DE LOS DATOS DEL ITEM PARA GENERAR UN PDF
$convert = json_encode($array_filtro);   
$conv = base64_encode($convert);
if ($_GET['pdf'] == 1) {

  header('location: templates/item/pdf/pdf/pdf_item.php?&data='.$conv);

}elseif($_GET['pdf'] == 0){

  $smarty->display("item/update_filtro.tpl");

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