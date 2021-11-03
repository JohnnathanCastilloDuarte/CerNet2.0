<?php 
include('../../config.ini.php');

$id_asignado_automovil = $_POST['id_asignado_automovil'];
$parametro = $_POST['parametro'];
$consultar = "";


if($parametro == "L"){
  $consultar = mysqli_prepare($connect,"SELECT id_mapeo, nombre, fecha_inicio, hora_inicio, fecha_final, hora_final, intervalo, temperatura_minima, temperatura_maxima, valor_seteado_temperatura
                                      FROM automovil_mapeo WHERE id_asignado = ?");
  mysqli_stmt_bind_param($consultar, 'i', $id_asignado_automovil);

}else{
  
$id_mapeo = $_POST['id_mapeo'];
$consultar = mysqli_prepare($connect,"SELECT id_mapeo, nombre, fecha_inicio, hora_inicio, fecha_final, hora_final, intervalo, temperatura_minima, temperatura_maxima, valor_seteado_temperatura
                                    FROM automovil_mapeo WHERE  id_mapeo = ?");
mysqli_stmt_bind_param($consultar, 'i', $id_mapeo);
}


mysqli_stmt_execute($consultar);
mysqli_stmt_store_result($consultar);
mysqli_stmt_bind_result($consultar, $id_mapeo, $nombre, $fecha_inicio, $hora_inicio, $fecha_final, $hora_final, $intervalo, $temperatura_minima, $temperatura_maxima, $valor_seteado_temperatura);

$json = array();



if($parametro == "L"){
    while($row = mysqli_stmt_fetch($consultar)){

    $json[] = array(
    'id_mapeo'=>$id_mapeo,
    'nombre'=>$nombre,
    'fecha_inicio'=>$fecha_inicio,
    'hora_inicio'=>$hora_inicio,
    'fecha_final'=>$fecha_final,
    'hora_final'=>$hora_final,
    'intervalo'=>$intervalo,
    'temperatura_minima'=>$temperatura_minima,
    'temperatura_maxima'=>$temperatura_maxima
      
    );
  }
}else{
   while($row = mysqli_stmt_fetch($consultar)){
    
    $explode_hora_inicio = explode(":",$hora_inicio);
		$explode_hora_fin = explode(":",$hora_final);
     
    $json[] = array(
    'id_mapeo'=>$id_mapeo,
    'nombre'=>$nombre,
    'fecha_inicio'=>$fecha_inicio,
    'hora_inicio'=>$explode_hora_inicio[0],
    'minuto_inicio'=>$explode_hora_inicio[1],
    'segundo_inicio'=>$explode_hora_inicio[2], 
    'fecha_final'=>$fecha_final,
    'hora_final'=>$explode_hora_fin[0],
     'minuto_final'=>$explode_hora_fin[1],
     'segundo_final'=>$explode_hora_fin[2],
    'intervalo'=>$intervalo,
    'temperatura_minima'=>$temperatura_minima,
    'temperatura_maxima'=>$temperatura_maxima,
    'valor_seteado'=>$valor_seteado_temperatura 
    );
  }
}

$convert = "";

if($parametro == "L"){
  $convert = json_encode($json);
}else{
  $convert = json_encode($json[0]); 
}


echo $convert;

mysqli_close($connect);
?>