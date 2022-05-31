<?php 

include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "Traer"){

    $id_asignado = $_POST['id_asignado'];


    $consultar = mysqli_prepare($connect,"SELECT a.correlativo, b.usuario FROM item_asignado as a, usuario as b WHERE a.usuario_responsable = b.id_usuario AND a.id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $correlativo, $usuario);
    mysqli_stmt_fetch($consultar);
  
   $consultar1 = mysqli_prepare($connect,"SELECT solicitante, cargo_solicitante FROM informes_general WHERE id_asignado = ?");
    mysqli_stmt_bind_param($consultar1, 'i', $id_asignado);
    mysqli_stmt_execute($consultar1);
    mysqli_stmt_store_result($consultar1);
    mysqli_stmt_bind_result($consultar1, $solicitante, $cargo_solicitante);
    mysqli_stmt_fetch($consultar1);
    
  
    $array_informarcion[]=array('correlativo'=>$correlativo, 'usuario'=>$usuario, 'solicitante'=>$solicitante, 'cargo_solicitante'=>$cargo_solicitante);
    $convert = json_encode($array_informarcion);
    echo $convert;

}else if($movimiento == "guardar"){

    $id_asignado = $_POST['id_asignado'];
    $correlativo = $_POST['correlativo'];
    $responsable = $_POST['responsable'];
    $solicitante = $_POST['solicitante'];
    $cargo_solicitante = $_POST['cargo_solicitante'];
  
   $actualizar1 = mysqli_prepare($connect,"UPDATE informes_general SET solicitante = ?, cargo_solicitante = ? WHERE id_asignado = ?");
    mysqli_stmt_bind_param($actualizar1, 'ssi',$solicitante, $cargo_solicitante, $id_asignado);
    mysqli_stmt_execute($actualizar1);
    
  
    $buscar_usuario = mysqli_prepare($connect,"SELECT id_usuario FROM usuario WHERE usuario = ?");
    mysqli_stmt_bind_param($buscar_usuario, 's', $responsable);
    mysqli_stmt_execute($buscar_usuario);
    mysqli_stmt_store_result($buscar_usuario);
    mysqli_stmt_bind_result($buscar_usuario, $id_usuario);
    mysqli_stmt_fetch($buscar_usuario);
  
    if(mysqli_stmt_num_rows($buscar_usuario) > 0){
        
        $actualizar = mysqli_prepare($connect,"UPDATE item_asignado SET correlativo = ?, usuario_responsable = ? WHERE id_asignado = ?");
        mysqli_stmt_bind_param($actualizar, 'ssi', $correlativo, $id_usuario, $id_asignado);
        mysqli_stmt_execute($actualizar);

        if($actualizar){
            echo "Si";
        }else{
            echo "No";
        }
    }else{
      echo "No existe";
    }
   
   
}

mysqli_close($connect);
?>