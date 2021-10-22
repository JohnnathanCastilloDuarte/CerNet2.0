<?php 

if(isset($_GET['item'])){

    //RECUPER EL DATO DE LA URL	
    $id_equipo = $_GET['item'];
    

    //CONSULTO LA INFORMACIÓN DEL EQUIPO
    $ultrafreezer = mysqli_prepare($connect,"SELECT a.id_ultrafreezer,  a.fabricante, a.modelo, a.n_serie, a.c_interno, a.fecha_fabricacion, a.direccion, a.ubicacion, a.voltaje, 
        a.potencia, a.capacidad, a.peso, a.alto, a.largo, a.ancho, b.nombre, b.descripcion, c.id_empresa, c.nombre,
        a.valor_seteado_tem, a.tem_min, a.tem_max, a.valor_seteado_hum, a.hum_min, a.hum_max FROM item_ultrafreezer as a, item as b, empresa as c 
        WHERE b.id_empresa = c.id_empresa AND a.id_item = b.id_item AND a.id_item = $id_equipo");
    mysqli_stmt_execute($ultrafreezer);
    mysqli_stmt_store_result($ultrafreezer);
    mysqli_stmt_bind_result($ultrafreezer, $id_ultrafreezer, $fabricante, $modelo, $n_serie, $c_interno, $fecha_fabricacion, $direccion, $ubicacion, $voltaje, $potencia, $capacidad,
     $peso, $alto, $largo, $ancho, $nombre_item, $descripcion_item, $id_empresa, $nombre_empresa, $seteado_tem, $tem_min, $tem_max, $seteado_hum, $hum_min, $hum_max);

    $array_ultrafreezer = array();

    while($row = mysqli_stmt_fetch($ultrafreezer)){
      $array_ultrafreezer[] = array(
        'id_item'=>$id_equipo,
        'id_ultrafreezer'=>$id_ultrafreezer,
        'fabricante'=>$fabricante,
        'modelo'=>$modelo,
        'n_serie'=>$n_serie,
        'c_interno'=>$c_interno,
        'fecha_fabricacion'=>$fecha_fabricacion,
        'direccion'=>$direccion,
        'ubicacion'=>$ubicacion,
        'voltaje'=>$voltaje,
        'potencia'=>$potencia,
        'capacidad'=>$capacidad,
        'peso'=>$peso,
        'alto'=>$alto,
        'largo'=>$largo,
        'ancho'=>$ancho,
        'nombre_ultrafreezer'=>$nombre_item,
        'descripcion_ultrafreezer'=>$descripcion_item,
        'id_empresa'=>$id_empresa,
        'nombre_empresa'=>$nombre_empresa,
        'seteado_tem'=>$seteado_tem,
        'tem_min'=>$tem_min,
        'tem_max'=>$tem_max,
        'seteado_hum'=>$seteado_hum,
        'hum_min'=>$hum_min,
        'hum_max'=>$hum_max,
    );	
  }

  $smarty->assign("array_ultrafreezer",$array_ultrafreezer);

}/////////// CIERRE DEL IF   
else{
 // $tipo_item = $_GET['type'];

  
  $array_ultrafreezer[] = array(
    'id_item'=>'',
    'id_ultrafreezer'=>'',
    'fabricante'=>'',
    'modelo'=>'',
    'n_serie'=>'',
    'c_interno'=>'',
    'fecha_fabricacion'=>'',
    'direccion'=>'',
    'ubicacion'=>'',
    'voltaje'=>'',
    'potencia'=>'',
    'capacidad'=>'',
    'peso'=>'',
    'alto'=>'',
    'largo'=>'',
    'ancho'=>'',
    'nombre_ultrafreezer'=>'',
    'descripcion_ultrafreezer'=>'',
    'id_empresa'=>'',
    'nombre_empresa'=>'',
    'seteado_tem'=>'',
    'tem_min'=>'',
    'tem_max'=>'',
    'seteado_hum'=>'',
    'hum_min'=>'',
    'hum_max'=>'',
);
  $smarty->assign("array_ultrafreezer",$array_ultrafreezer);
}//////// CIERRE DEL ELSE

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



$smarty->display("item/update_ultrafreezer.tpl");


?>