<?php 

include('../../config.ini.php');


$tipo = $_POST['tipo'];


if($tipo == 1){
    $array_documento = array();

    $buscar_doc = mysqli_prepare($connect,"SELECT id_documento, nombre FROM  documentacion_inspector");
    mysqli_stmt_execute($buscar_doc);
    mysqli_stmt_store_result($buscar_doc);
    mysqli_stmt_bind_result($buscar_doc, $id_documento, $nombre);

    while($row = mysqli_stmt_fetch($buscar_doc)){

        $array_documento[]=array(
            'id_documento'=>$id_documento,
            'nombre'=>$nombre
        );
    }

    $convert = json_encode($array_documento);
    echo $convert;

}else if($tipo == 2){
 
    $array_motivos = array();

    $buscar_motivo = mysqli_prepare($connect,"SELECT id, rechazo FROM  motivos_rechazo");
    mysqli_stmt_execute($buscar_motivo);
    mysqli_stmt_store_result($buscar_motivo);
    mysqli_stmt_bind_result($buscar_motivo, $id, $motivo);

    while($row = mysqli_stmt_fetch($buscar_motivo)){

        $array_motivos[]=array(
            'id'=>$id,
            'motivo'=>$motivo
        );
    }

    $convert = json_encode($array_motivos);
    echo $convert;

}else if($tipo == 3){
 
    $documento = $_POST['documento'];
    $motivo = $_POST['motivo'];
    $id_documentacion = $_POST['id_documentacion'];
    $id_valida = $_POST['id_valida'];

    $validando = mysqli_prepare($connect,"SELECT id FROM rechazos_documentacion WHERE id_documentacion = ? AND id_doc_inspector = ? AND id_rechazo = ?");
    mysqli_stmt_bind_param($validando, 'iii', $id_documentacion, $documento, $motivo);
    mysqli_stmt_execute($validando);
    mysqli_stmt_store_result($validando);
    mysqli_stmt_bind_result($validando, $id_existe);
    mysqli_stmt_fetch($validando);
 
    if(mysqli_stmt_num_rows($validando) == 0){

        $insertando = mysqli_prepare($connect,"INSERT INTO rechazos_documentacion (id_documentacion, id_doc_inspector, id_rechazo, id_usuario) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($insertando, 'iiii', $id_documentacion, $documento, $motivo, $id_valida);
        mysqli_stmt_execute($insertando);

        if($insertando){
            echo "Si";
        }else{
            echo "No";
        }
    }else{

        echo "Creado";
    }


    
}else{
    $array_rechazos = array();
    $id_documentacion  = $_POST['id_documentacion'];

    $consultar = mysqli_prepare($connect, "SELECT a.nombre, b.rechazo, d.nombre, d.apellido, e.nombre, c.fecha_registro FROM documentacion_inspector as a, motivos_rechazo as b,rechazos_documentacion as c, persona as d, cargo as e WHERE c.id_documentacion = ? AND c.id_doc_inspector = a.id_documento AND c.id_rechazo = b.id AND c.id_usuario = d.id_usuario AND d.id_cargo = e.id_cargo; ");

    mysqli_stmt_bind_param($consultar, 'i', $id_documentacion);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $documento, $rechazo, $nombres, $apellidos, $cargo, $fecha_rechazo);

    while($row = mysqli_stmt_fetch($consultar)){
        
        $array_rechazos[]=array(
            'documento'=>$documento,
            'rechazo'=>$rechazo,
            'nombres'=>$nombres,
            'apellidos'=>$apellidos,
            'cargo'=>$cargo,
            'fecha_rechazo'=>$fecha_rechazo
        );

        
    }

    $convert = json_encode($array_rechazos);
    echo $convert;
}

mysqli_close($connect);

?>