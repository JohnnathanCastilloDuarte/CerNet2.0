<?php 
include('../../config.ini.php');
$id_documentacion_d = $_POST['id_documentacion_d'];
$movimiento = $_POST['movimiento'];

if($movimiento == "Leer"){

    $array_informacion = array();

    $consultar = mysqli_prepare($connect,"SELECT  enunciado_1, enunciado_2, protocolo, version, paginacion, leyenda FROM documentacion WHERE id = ? ");
    mysqli_stmt_bind_param($consultar, 'i', $id_documentacion_d);
    mysqli_stmt_execute($consultar);
    mysqli_stmt_store_result($consultar);
    mysqli_stmt_bind_result($consultar, $enunciado_1, $enunciado_2, $protocolo, $version, $paginacion, $leyenda);
    
    while($row = mysqli_stmt_fetch($consultar)){
        $array_informacion[] = array(
            'enunciado1'=>$enunciado_1,
            'enunciado2'=>$enunciado_2,
            'protocolo'=>$protocolo,
            'version'=>$version,
            'paginacion'=>$paginacion,
            'leyenda'=>$leyenda
        );
    }

    $convert = json_encode($array_informacion);
    echo $convert;


}else if($movimiento == "Actualizar"){

    $encabezado1 = $_POST['encabezado1'];
    $encabezado2 = $_POST['encabezado2'];
    $protocolo =  $_POST['protocolo'];
    $version = $_POST['version'];
    $paginacion = $_POST['paginacion'];
    $leyenda = $_POST['leyenda'];

   

    $actualizar = mysqli_prepare($connect,"UPDATE documentacion SET enunciado_1 = ?, enunciado_2 = ?, protocolo = ?, version = ?, paginacion = ?, leyenda = ? WHERE id = ?");
    mysqli_stmt_bind_param($actualizar, 'ssssssi', $encabezado1, $encabezado2, $protocolo, $version, $paginacion, $leyenda,
    $id_documentacion_d);
    mysqli_stmt_execute($actualizar);
    if($actualizar){
        echo "Ok";
    }else{
        echo "Se ha producido un error ".mysqli_stmt_error($actualizar);
    }
}


mysqli_close($connect);

?>