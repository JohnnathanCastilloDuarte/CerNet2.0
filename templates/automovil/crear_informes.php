<?php
include('../../config.ini.php');
$incrementable = "";
$id_asignado_automovil = $_POST['id_asignado_automovil'];


///////// CONSULTAR INFORMACIÓN PARA ARMAR EL NOMBRE DEL INFORME
$primero = mysqli_prepare($connect,"SELECT c.sigla_empresa, c.sigla_pais, b.correlativo FROM item AS a, item_asignado as b, empresa as c WHERE a.id_item = b.id_item AND b.id_asignado = ? AND c.id_empresa = a.id_empresa");
mysqli_stmt_bind_param($primero, 'i', $id_asignado_automovil);
mysqli_stmt_execute($primero);
mysqli_stmt_store_result($primero);
mysqli_stmt_bind_result($primero, $sigla_empresa, $sigla_pais, $correlativo);
mysqli_stmt_fetch($primero);

$cantidad_alturas = mysqli_prepare($connect,"SELECT id FROM alturas_automovil WHERE id_asignado = ?");
mysqli_stmt_bind_param($cantidad_alturas, 'i', $id_asignado_automovil);
mysqli_stmt_execute($cantidad_alturas);
mysqli_stmt_store_result($cantidad_alturas);
mysqli_stmt_bind_result($cantidad_alturas, $id);
mysqli_stmt_fetch($cantidad_alturas);

$cantidad_informes = count($cantidad_alturas);


for($i = 0; $i < $cantidad_informes; $i++){

  /////// CONSULTAR EL ULTIMO MAPEO CREADO
  $segundo = mysqli_prepare($connect, "SELECT id_mapeo  FROM automovil_mapeo  WHERE id_asignado = ? ORDER BY fecha_registro DESC LIMIT 1");
  mysqli_stmt_bind_param($segundo, 'i', $id_asignado_automovil);
  mysqli_stmt_execute($segundo);  
  mysqli_stmt_store_result($segundo);
  mysqli_stmt_bind_result($segundo, $id_mapeo);
  mysqli_stmt_fetch($segundo);
  
  
  ///// CONSULTAR ULTIMO INFOcRME
   $tercero = mysqli_prepare($connect,"SELECT n_increment FROM informes_automovil WHERE id_asignado = ? ORDER BY fecha_registro DESC");
   mysqli_stmt_bind_param($tercero, 'i', $id_asignado_automovil);
   mysqli_stmt_execute($tercero);
   mysqli_stmt_store_result($tercero);
   mysqli_stmt_bind_result($tercero, $n_increment);
   mysqli_stmt_fetch($tercero);

   if(mysqli_stmt_num_rows($tercero) == 0){
     $incrementable = "01";
   }else{
     $incrementable = $n_increment + 1;

     if($incrementable < 10){
        $incrementable = "0".$incrementable;
      }else{
        $incrementable = $incrementable;
      }
   }


  $armar_nombre = $sigla_pais.'-'.$correlativo.'-'.$sigla_empresa.'-2021-TEMP-';
  $insertando = mysqli_prepare($connect,"INSERT INTO informes_automovil (nombre, n_increment, id_mapeo, id_asignado) VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($insertando, 'ssii', $armar_nombre, $incrementable, $id_mapeo, $id_asignado_automovil);
  mysqli_stmt_execute($insertando);

  echo mysqli_stmt_error($insertando);

  if($insertando){
    echo 1;
  }else{
    echo 0;
  }
}///////////////////////// CIERRE DEL CICLO FOR  

?>