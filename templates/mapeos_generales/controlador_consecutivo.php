<?php 

include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "Traer"){

    $id_asignado = $_POST['id_asignado'];


    $consultar = mysqli_prepare($connect,"SELECT a.correlativo, b.usuario, a.solicitante, a.cargo_solicitante FROM item_asignado as a, usuario as b WHERE a.usuario_responsable = b.id_usuario AND a.id_asignado = ?");
    mysqli_stmt_bind_param($consultar, 'i', $id_asignado);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $correlativo, $usuario,$solicitante, $cargo_solicitante);
    mysqli_stmt_fetch($consultar);
  
   
  
    $array_informarcion[]=array('correlativo'=>$correlativo, 'usuario'=>$usuario, 'solicitante'=>$solicitante, 'cargo_solicitante'=>$cargo_solicitante);
    $convert = json_encode($array_informarcion);
    echo $convert;

}else if($movimiento == "guardar"){

    $id_asignado = $_POST['id_asignado'];
    $correlativo = $_POST['correlativo'];
    $responsable = $_POST['responsable'];
    $solicitante = $_POST['solicitante'];
    $cargo_solicitante = $_POST['cargo_solicitante'];
  
  
    $buscar_usuario = mysqli_prepare($connect,"SELECT id_usuario FROM usuario WHERE usuario = ?");
    mysqli_stmt_bind_param($buscar_usuario, 's', $responsable);
    mysqli_stmt_execute($buscar_usuario);
    mysqli_stmt_store_result($buscar_usuario);
    mysqli_stmt_bind_result($buscar_usuario, $id_usuario);
    mysqli_stmt_fetch($buscar_usuario);
  
    if(mysqli_stmt_num_rows($buscar_usuario) > 0){
        
        $actualizar = mysqli_prepare($connect,"UPDATE item_asignado SET correlativo = ?, usuario_responsable = ?, solicitante = ?, cargo_solicitante = ? WHERE id_asignado = ?");
        mysqli_stmt_bind_param($actualizar, 'ssssi', $correlativo, $id_usuario, $solicitante, $cargo_solicitante, $id_asignado);
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