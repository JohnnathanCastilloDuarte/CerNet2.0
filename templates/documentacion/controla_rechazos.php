<?php 

include('../../config.ini.php');


$tipo = $_POST['tipo'];

if($tipo == 3){
        
    $motivo = $_POST['motivo'];
    $id_documentacion = $_POST['id_documentacion'];
    $id_valida = $_POST['id_valida'];
    $estado_rechazo = 4;

    $cambiar_estado = mysqli_prepare($connect,"UPDATE documentacion SET estado = ? WHERE id = ?");
    mysqli_stmt_bind_param($cambiar_estado, 'ii', $estado_rechazo, $id_documentacion);
    mysqli_stmt_execute($cambiar_estado);
    if($cambiar_estado){
        $validando = mysqli_prepare($connect,"SELECT id FROM rechazos_documentacion WHERE id_documentacion = ? AND id_usuario = ? ");
        mysqli_stmt_bind_param($validando, 'ii', $id_documentacion, $id_valida);
        mysqli_stmt_execute($validando);
        mysqli_stmt_store_result($validando);
        mysqli_stmt_bind_result($validando, $id_existe);
        mysqli_stmt_fetch($validando);
    
        if(mysqli_stmt_num_rows($validando) == 0){

            $insertando = mysqli_prepare($connect,"INSERT INTO rechazos_documentacion (id_documentacion, rechazo, id_usuario) VALUES (?,?,?)");
            mysqli_stmt_bind_param($insertando, 'isi', $id_documentacion,  $motivo, $id_valida);
            mysqli_stmt_execute($insertando);

            if($insertando){
                echo "Si";
            }else{
                echo "No";
            }
        }else{
            echo "Creado";
        }
    }
    

      
      
}else if($tipo == 4){
  
    $array_rechazos = array();
    $id_documentacion  = $_POST['id_documentacion'];

    $consultar = mysqli_prepare($connect, "SELECT  d.nombre, d.apellido, e.nombre, c.fecha_registro, c.rechazo FROM  rechazos_documentacion as c, persona as d, cargo as e WHERE c.id_documentacion = ?  AND d.id_cargo = e.id_cargo AND c.id_usuario = d.id_usuario");

    mysqli_stmt_bind_param($consultar, 'i', $id_documentacion);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $nombres, $apellidos, $cargo, $fecha_rechazo, $rechazo);

    while($row = mysqli_stmt_fetch($consultar)){
        
        $array_rechazos[]=array(
            'nombres'=>$nombres,
            'apellidos'=>$apellidos,
            'cargo'=>$cargo,
            'fecha_rechazo'=>$fecha_rechazo,
            'rechazo'=>$rechazo
        );

        
    }

    $convert = json_encode($array_rechazos);
    echo $convert;
}

mysqli_close($connect);

?>