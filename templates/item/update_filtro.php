<?php
$tipo_item = $_GET['type'];
$smarty->assign("id_tipo_filtro",$tipo_item);
$$array_filtro = array();



if(isset($_GET['item'])){
 
   
  $id_item = $_GET['item'];
  $smarty->assign("id_item_filtro",$id_item);

  $consultar = mysqli_prepare($connect,"SELECT a.nombre, b.id_filtro, b.marca, b.modelo, b.serie, b.cantidad_filtro, b.ubicacion, b.ubicado_en, b.filtro_dimension, c.nombre, c.id_empresa, b.lugar_filtro, b.limite_penetracion FROM item as a, item_filtro as b, empresa as c WHERE a.id_item = ? AND a.id_item = b.id_item AND a.id_empresa = c.id_empresa");
  
  mysqli_stmt_bind_param($consultar, 'i', $id_item);
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $nombre_filtro, $id_filtro, $marca_fitro, $modelo_filtro, $serie_filtro, $cantidad_filtro, $ubicacion_filtro, $ubicado_en_filtro,
    $tipo_filtro, $empresa_filtro, $id_empresa, $lugar_filtro, $penetracion_filtro);
  
  mysqli_stmt_fetch($consultar);

  $smarty->assign("nombre_item",$nombre_filtro);

  $array_filtro[] = array(
    'id_empresa' => $id_empresa,
    'nombre_empresa' => $empresa_filtro,
    'marca' => $marca_fitro,
    'modelo' => $modelo_filtro,
    'serie' => $serie_filtro,
    'cantidad_filtros' => $cantidad_filtro,
    'ubicacion' => $ubicacion_filtro,
    'ubicado_en' => $ubicado_en_filtro,
    'tipo' => $tipo_filtro,
    'lugar_filtro' => $lugar_filtro,
    'penetracion_filtro' => $penetracion_filtro,
    'id_filtro' => $id_filtro
  );

  
  $smarty->assign("array_filtro",$array_filtro);

}else{

 $id_item = "";

 $array_filtro[] = array(
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
  'id_filtro' => ""

);

 $smarty->assign("id_item_filtro","");
 $smarty->assign("nombre_item","Filtro Absoluto HEPA-OQ H13");
 $smarty->assign("array_filtro",$array_filtro);
}

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

$smarty->display("item/update_filtro.tpl");
?>