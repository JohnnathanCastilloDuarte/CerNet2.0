<?php 
include('../../config.ini.php');

$movimiento = $_POST['movimiento'];

if($movimiento == "Crear"){

    $nombre_prueba = $_POST['nombre_prueba'];
    $fecha_inicio_mapeo_general = $_POST['fecha_inicio_mapeo_general'];
    $hora_inicio_mapeo_general = $_POST['hora_inicio_mapeo_general'];
    $minuto_inicio_mapeo_general = $_POST['minuto_inicio_mapeo_general'];
    $segundo_inicio_mapeo_general = $_POST['segundo_inicio_mapeo_general'];
    $fecha_fin_mapeo_general = $_POST['fecha_fin_mapeo_general'];
    $hora_fin_mapeo_general = $_POST['hora_fin_mapeo_general'];
    $minuto_fin_mapeo_general = $_POST['minuto_fin_mapeo_general'];
    $segundo_fin_mapeo_general = $_POST['segundo_fin_mapeo_general'];
    $id_asignado = $_POST['id_asignado'];
    $id_usuario = $_POST['id_usuario'];


    $fecha_inicio_completa = $fecha_inicio_mapeo_general.' '.$hora_inicio_mapeo_general.':'.$minuto_inicio_mapeo_general.':'.$segundo_inicio_mapeo_general;
    $fecha_fin_completa = $fecha_fin_mapeo_general.' '.$hora_fin_mapeo_general.':'.$minuto_fin_mapeo_general.':'.$segundo_fin_mapeo_general;

    
    $insertando = mysqli_prepare($connect,"INSERT INTO mapeo_general (id_asignado, nombre, fecha_inicio, fecha_fin, id_usuario) VALUES (?,?,?,?,?)");
    mysqli_stmt_bind_param($insertando, 'isssi', $id_asignado, $nombre_prueba, $fecha_inicio_completa, $fecha_fin_completa, $id_usuario);
    mysqli_stmt_execute($insertando);
    echo mysqli_stmt_error($insertando);

    if($insertando){
        echo "Listo";
    }else{
        echo "No";
    }


}else if($movimiento == "Leer"){

    $id_asignado = $_POST['id_asignado'];
    $array_mapeos = array();

    $leer = mysqli_prepare($connect,"SELECT id_mapeo, nombre, fecha_inicio, fecha_fin FROM mapeo_general WHERE id_asignado = ?");
    mysqli_stmt_bind_param($leer, 'i', $id_asignado);
    mysqli_stmt_execute($leer);
    mysqli_stmt_store_result($leer);
    mysqli_stmt_bind_result($leer, $id_mapeo, $nombre, $fecha_inicio, $fecha_fin);

    while($row = mysqli_stmt_fetch($leer)){
        $array_mapeos[] = array(
            'id_mapeo'=>$id_mapeo,
            'nombre'=>$nombre,
            'fecha_inicio'=>$fecha_inicio,
            'fecha_fin'=>$fecha_fin
        );
    }

    $convert = json_encode($array_mapeos);

    echo $convert;

}else if($movimiento == "traer"){

    $id_mapeo = $_POST['id_mapeo'];

    $array_mapeos = array();

    $leer = mysqli_prepare($connect,"SELECT nombre, fecha_inicio, fecha_fin FROM mapeo_general WHERE id_mapeo = ?");
    mysqli_stmt_bind_param($leer, 'i', $id_mapeo);
    mysqli_stmt_execute($leer);
    mysqli_stmt_store_result($leer);
    mysqli_stmt_bind_result($leer, $nombre, $fecha_inicio, $fecha_fin);

    while($row = mysqli_stmt_fetch($leer)){

        $construccion_fecha_inicio = explode(" ",$fecha_inicio);
        $fecha_incio_lista =  $construccion_fecha_inicio[0];

        $date_construccion_incio = explode(":",$construccion_fecha_inicio[1]);
        $hora_inicio_lista = $date_construccion_incio[0];
        $minuto_inicio_lista = $date_construccion_incio[1];
        $segundo_inicio_lista = $date_construccion_incio[2];


        $construccion_fecha_fin = explode(" ",$fecha_fin);
        $fecha_fin_lista =  $construccion_fecha_fin[0];

        $date_construccion_fin = explode(":",$construccion_fecha_fin[1]);
        $hora_fin_lista = $date_construccion_fin[0];
        $minuto_fin_lista = $date_construccion_fin[1];
        $segundo_fin_lista = $date_construccion_fin[2];



        $array_mapeos[] = array(
            'id_mapeo'=>$id_mapeo,
            'nombre'=>$nombre,
            'fecha_inicio'=>$fecha_incio_lista,
            'hora_inicio'=>$hora_inicio_lista,
            'minuto_inicio'=>$minuto_inicio_lista,
            'segundo_inicio'=>$segundo_inicio_lista,
            'fecha_fin'=>$fecha_fin_lista,
            'hora_fin'=>$hora_fin_lista,
            'minuto_fin'=>$minuto_fin_lista,
            'segundo_fin'=>$segundo_fin_lista
        );
    }

    $convert = json_encode($array_mapeos[0]);

    echo $convert;

}else if($movimiento == "actualiza"){

    $nombre_prueba = $_POST['nombre_prueba'];
    $fecha_inicio_mapeo_general = $_POST['fecha_inicio_mapeo_general'];
    $hora_inicio_mapeo_general = $_POST['hora_inicio_mapeo_general'];
    $minuto_inicio_mapeo_general = $_POST['minuto_inicio_mapeo_general'];
    $segundo_inicio_mapeo_general = $_POST['segundo_inicio_mapeo_general'];
    $fecha_fin_mapeo_general = $_POST['fecha_fin_mapeo_general'];
    $hora_fin_mapeo_general = $_POST['hora_fin_mapeo_general'];
    $minuto_fin_mapeo_general = $_POST['minuto_fin_mapeo_general'];
    $segundo_fin_mapeo_general = $_POST['segundo_fin_mapeo_general'];
    $id_mapeo = $_POST['id_mapeo'];


    $fecha_inicio_completa = $fecha_inicio_mapeo_general.' '.$hora_inicio_mapeo_general.':'.$minuto_inicio_mapeo_general.':'.$segundo_inicio_mapeo_general;
    $fecha_fin_completa = $fecha_fin_mapeo_general.' '.$hora_fin_mapeo_general.':'.$minuto_fin_mapeo_general.':'.$segundo_fin_mapeo_general;
 

    $actualiza = mysqli_prepare($connect,"UPDATE mapeo_general SET nombre = ? , fecha_inicio = ?, fecha_fin = ? WHERE id_mapeo = ?");
    mysqli_stmt_bind_param($actualiza, 'sssi', $nombre_prueba, $fecha_inicio_completa, $fecha_fin_completa, $id_mapeo);
    mysqli_stmt_execute($actualiza);

    if($actualiza){
        echo "Si";
    }else{
        echo "No ".mysqli_stmt_error($actualiza);
    }

    
}


mysqli_close($connect);
?>