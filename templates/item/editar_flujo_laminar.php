<?php 
    
    include("../../config.ini.php");

  $nombre_flujo          = $_POST['nombre_flujo'];
  $id_item_flujo_laminar = $_POST['id_item_flujo_laminar'];
  $id_empresa_flujo      = $_POST['id_empresa_flujo'];
  $cantidad_filtros      = $_POST['cantidad_filtros'];
  $clasificacion_oms = $_POST['clasificacion_oms'];
 $clasificacion_iso = $_POST['clasificacion_iso'];
  $id_valida             = $_POST['id_valida'];
  $tipo_cabina = $_POST['tipo_cabina'];     
  $marca = $_POST['marca'];         
  $modelo = $_POST['modelo'];        
  $n_serie = $_POST['n_serie'];       
  $codigo = $_POST['codigo'];        
  $tipo_dimeciones = $_POST['tipo_dimeciones'];   
  $limite_penetracion = $_POST['limite_penetracion']; 
  $eficiencia = $_POST['eficiencia'];      



    $update_item = mysqli_prepare($connect,"UPDATE item SET  nombre= ?, id_empresa = ? WHERE id_item = ?");
    mysqli_stmt_bind_param($update_item, 'sii', $nombre_flujo, $id_empresa_flujo, $id_item_flujo_laminar);
    mysqli_stmt_execute($update_item);

    //echo "UPDATE item SET  nombre= $nombre_flujo, id_empresa = $id_empresa_flujo  WHERE id_item = $id_item_flujo_laminar";

    if($update_item){
        $consultar_id_flujo = mysqli_prepare($connect,"SELECT id FROM item_flujo_laminar WHERE id_item = ?");
        mysqli_stmt_bind_param($consultar_id_flujo, 'i', $id_item_flujo_laminar);
        mysqli_stmt_execute($consultar_id_flujo);
        mysqli_stmt_store_result($consultar_id_flujo);
        mysqli_stmt_bind_result($consultar_id_flujo, $id_item_flujo);
        mysqli_stmt_fetch($consultar_id_flujo);

        $actualizar_flujo_laminar = mysqli_prepare($connect, "UPDATE item_flujo_laminar SET cantidad_filtro = ?, tipo_cabina = ?, marca = ?, modelo = ?, serie = ?, codigo = ?, tipo_dimenciones = ?, limite_penetracion = ?, eficiencia = ?, clasificacion_oms = ?, clasificacion_iso = ? WHERE id = ?");
        mysqli_stmt_bind_param($actualizar_flujo_laminar, 'issssssssssi', $cantidad_filtros, $tipo_cabina, $marca, $modelo, $n_serie, $codigo, $tipo_dimeciones, $limite_penetracion, $eficiencia ,$clasificacion_oms, $clasificacion_iso, $id_item_flujo);
        mysqli_stmt_execute($actualizar_flujo_laminar);


        if($actualizar_flujo_laminar){
            echo "Listo";
        }else{
            echo "No";
        }
    }else{
          echo "error";
    }

 ?>