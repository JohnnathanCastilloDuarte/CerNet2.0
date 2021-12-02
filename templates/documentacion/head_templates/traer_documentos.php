<?php 
error_reporting(0);
include('../../../config.ini.php');

$array_documentacion = array();
$estado_ver = $_POST['estado_ver'];
$id_valida = $_POST['id_valida'];
$cuantos_faltan = "";





$consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo, a.estructura, CASE WHEN t.fecha_firma is NULL THEN 'No' ELSE 'Si' END, t.id, t.tipo FROM documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e, participante_documentacion as t WHERE a.id_numot = b.id_numot AND b.id_empresa = c.id_empresa AND a.id_usuario = d.id_usuario AND a.id = e.id_documentacion AND t.id_persona = ? AND t.id_documentacion = a.id");
mysqli_stmt_bind_param($consultando, 'i', $id_valida);
mysqli_stmt_execute($consultando);
mysqli_stmt_store_result($consultando);
mysqli_stmt_bind_result($consultando, $empresa, $archivo, $usuario, $fecha_creacion, $estado, $id_documentacion, $nombre_archivo, $estructura, $ha_firmado, $id_participante, $tipo);


while($row = mysqli_stmt_fetch($consultando)){

  $consultar_quien_falta = mysqli_prepare($connect,"SELECT COUNT(id) FROM participante_documentacion WHERE id_documentacion = ? AND fecha_firma is NULL;");
  mysqli_stmt_bind_param($consultar_quien_falta, 'i', $id_documentacion);
  mysqli_stmt_execute($consultar_quien_falta);
  mysqli_stmt_store_result($consultar_quien_falta);
  mysqli_stmt_bind_result($consultar_quien_falta, $cuantos);
  mysqli_stmt_fetch($consultar_quien_falta);

  

  $cuantos_faltan = $cuantos;

  $array_documentacion[] = array(
    'empresa'=>$empresa,
    'archivo'=>$archivo,
    'usuario'=>$usuario,
    'fecha_creacion'=>$fecha_creacion,
    'estado'=>$estado,
    'id_documentacion'=>$id_documentacion,
    'nombre_archivo'=>$nombre_archivo,
    'rol'=>$rol,
    'estructura'=>$estructura,
    'ha_firmado'=>$ha_firmado,
    'id_participante'=>$id_participante,
    'faltantes'=>$cuantos,
    'tipo_validador'=>$tipo
  );
}

$convert = json_encode($array_documentacion);

echo $convert;




/*

$consultar_cargo = mysqli_prepare($connect,"SELECT a.nombre, c.departamento FROM cargo as a, persona as b, departamento as c WHERE b.id_usuario = ? AND b.id_cargo = a.id_cargo AND a.id_departamento = c.id");
mysqli_stmt_bind_param($consultar_cargo, 'i', $id_valida);
mysqli_stmt_execute($consultar_cargo);
mysqli_stmt_store_result($consultar_cargo);
mysqli_stmt_bind_result($consultar_cargo, $rol, $departamento);
mysqli_stmt_fetch($consultar_cargo);




if($rol == 'CEO' || $rol == 'COO' || $rol == 'Quality Control' || $rol == 'IT Strategic Coordinator'){
  if($estado_ver == 0){
    $consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo, a.estructura FROM
    documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e WHERE a.id_numot = b.id_numot AND b.id_empresa = c.id_empresa 
    AND a.id_usuario = d.id_usuario AND a.id = e.id_documentacion");
    mysqli_stmt_execute($consultando);
    mysqli_stmt_store_result($consultando);
    mysqli_stmt_bind_result($consultando, $empresa, $archivo, $usuario, $fecha_creacion, $estado, $id_documentacion, $nombre_archivo, $estructura);

    
    while($row = mysqli_stmt_fetch($consultando)){
      
        $array_documentacion[] = array(
          'empresa'=>$empresa,
          'archivo'=>$archivo,
          'usuario'=>$usuario,
          'fecha_creacion'=>$fecha_creacion,
          'estado'=>$estado,
          'id_documentacion'=>$id_documentacion,
          'nombre_archivo'=>$nombre_archivo,
          'rol'=>$rol,
          'estructura'=>$estructura
        );
    }

  }else if($estado_ver >= 1 && $estado_ver <= 3){
    $consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo FROM
    documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e WHERE a.id_numot = b.id_numot AND b.id_empresa = c.id_empresa 
    AND a.id_usuario = d.id_usuario AND a.estado between 1 AND 3 AND a.id = e.id_documentacion");
    mysqli_stmt_bind_param($consultando, 'i', $estado_ver);
    mysqli_stmt_execute($consultando);
    mysqli_stmt_store_result($consultando);
    mysqli_stmt_bind_result($consultando, $empresa, $archivo, $usuario, $fecha_creacion, $estado, $id_documentacion, $nombre_archivo);

    while($row = mysqli_stmt_fetch($consultando)){
        $array_documentacion[] = array(
          'empresa'=>$empresa,
          'archivo'=>$archivo,
          'usuario'=>$usuario,
          'fecha_creacion'=>$fecha_creacion,
          'estado'=>$estado,
          'id_documentacion'=>$id_documentacion,
          'nombre_archivo'=>$nombre_archivo,
          'rol'=>$rol
        );
    }
}else if($estado_ver >= 4 && $estado_ver <= 6){
     $consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo FROM
    documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e WHERE a.id_numot = b.id_numot AND b.id_empresa = c.id_empresa 
    AND a.id_usuario = d.id_usuario AND a.estado between 4 AND 6  AND a.id = e.id_documentacion");
    mysqli_stmt_bind_param($consultando, 'i', $estado_ver);
    mysqli_stmt_execute($consultando);
    mysqli_stmt_store_result($consultando);
    mysqli_stmt_bind_result($consultando, $empresa, $archivo, $usuario, $fecha_creacion, $estado, $id_documentacion, $nombre_archivo);

    while($row = mysqli_stmt_fetch($consultando)){
        $array_documentacion[] = array(
          'empresa'=>$empresa,
          'archivo'=>$archivo,
          'usuario'=>$usuario,
          'fecha_creacion'=>$fecha_creacion,
          'estado'=>$estado,
          'id_documentacion'=>$id_documentacion,
          'nombre_archivo'=>$nombre_archivo,
          'rol'=>$rol
        );
    }
  }
  
}/////// CIERRE IF DE CARGO
else if($rol == 'Head'){
 
  if($estado_ver == 0){
    $consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo, a.estructura FROM
    documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e, flujo_documentacion as f WHERE a.id_numot = 
    b.id_numot AND b.id_empresa = c.id_empresa   AND a.id_usuario = d.id_usuario AND a.id = e.id_documentacion AND a.id_flujo = f.id_flujo AND f.nombre = ?");
    mysqli_stmt_bind_param($consultando, 's', $departamento);
    mysqli_stmt_execute($consultando);
    mysqli_stmt_store_result($consultando);
    mysqli_stmt_bind_result($consultando, $empresa, $archivo, $usuario, $fecha_creacion, $estado, $id_documentacion, $nombre_archivo, $estructura);

    while($row = mysqli_stmt_fetch($consultando)){
        $array_documentacion[] = array(
          'empresa'=>$empresa,
          'archivo'=>$archivo,
          'usuario'=>$usuario,
          'fecha_creacion'=>$fecha_creacion,
          'estado'=>$estado,
          'id_documentacion'=>$id_documentacion,
          'nombre_archivo'=>$nombre_archivo,
          'rol'=>$rol,
          'estructura'=>$estructura
        );
    } 
  }
  
  
}//////////// CIERRE ELSE IF DE CARGO
else if($rol == 'Senior Analyst' || $rol == 'Senior Consultant' || $rol == 'Inspector Junior' || $rol == 'Junior Analyst' 
      || $rol == 'Consultant' || $rol == 'Engineer'){

  if($estado_ver == 0){
    $consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo, a.estructura FROM
    documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e, flujo_documentacion as f WHERE a.id_numot = 
    b.id_numot AND b.id_empresa = c.id_empresa   AND a.id_usuario = d.id_usuario AND a.id = e.id_documentacion AND a.id_flujo = f.id_flujo AND f.nombre = ? AND a.id_usuario = ?");
    mysqli_stmt_bind_param($consultando, 'si', $departamento, $id_valida);
    mysqli_stmt_execute($consultando);
    mysqli_stmt_store_result($consultando);
    mysqli_stmt_bind_result($consultando, $empresa, $archivo, $usuario, $fecha_creacion, $estado, $id_documentacion, $nombre_archivo, $estructura );

    while($row = mysqli_stmt_fetch($consultando)){
        $array_documentacion[] = array(
          'empresa'=>$empresa,
          'archivo'=>$archivo,
          'usuario'=>$usuario,
          'fecha_creacion'=>$fecha_creacion,
          'estado'=>$estado,
          'id_documentacion'=>$id_documentacion,
          'nombre_archivo'=>$nombre_archivo,
          'rol'=>$rol,
          'estructura'=>$estructura
        );
    } 
  }

}else if($rol == 'Junior Documentary Analyst' || $rol == 'Leading Senior Documentary Analyst' || $rol == 'Senior Documentary Analyst' || $rol == 'Documentary Analyst'){
  

  if($estado_ver == 0){
    $consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo, a.url, a.estructura FROM
    documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e WHERE a.id_numot = b.id_numot AND b.id_empresa = c.id_empresa 
    AND a.id_usuario = d.id_usuario AND a.id = e.id_documentacion");
    mysqli_stmt_execute($consultando);
    mysqli_stmt_store_result($consultando);
    mysqli_stmt_bind_result($consultando, $empresa, $archivo, $usuario, $fecha_creacion, $estado, $id_documentacion, $nombre_archivo, $url, $estructura);

    while($row = mysqli_stmt_fetch($consultando)){
        $array_documentacion[] = array(
          'empresa'=>$empresa,
          'archivo'=>$archivo,
          'usuario'=>$usuario,
          'fecha_creacion'=>$fecha_creacion,
          'estado'=>$estado,
          'id_documentacion'=>$id_documentacion,
          'nombre_archivo'=>$nombre_archivo,
          'rol'=>$rol,
          'url'=>$url,
          'estructura'=>$estructura
        );
    } 
  }else{
    $consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo FROM
    documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e WHERE a.id_numot = b.id_numot AND b.id_empresa = c.id_empresa 
    AND a.id_usuario = d.id_usuario AND a.estado = ? AND a.id_usuario = ? AND a.id = e.id_documentacion");
    mysqli_stmt_bind_param($consultando, 'ii', $estado_ver, $id_valida);
    mysqli_stmt_execute($consultando);
    mysqli_stmt_store_result($consultando);
    mysqli_stmt_bind_result($consultando, $empresa, $archivo, $usuario, $fecha_creacion, $estado, $id_documentacion, $nombre_archivo);

    while($row = mysqli_stmt_fetch($consultando)){
        $array_documentacion[] = array(
          'empresa'=>$empresa,
          'archivo'=>$archivo,
          'usuario'=>$usuario,
          'fecha_creacion'=>$fecha_creacion,
          'estado'=>$estado,
          'id_documentacion'=>$id_documentacion,
          'nombre_archivo'=>$nombre_archivo,
          'rol'=>$rol
        );
    }

  }
}//////// CIERRE ELSE DE CARGO


$convert = json_encode($array_documentacion);

echo $convert;
*/
mysqli_stmt_close($connect);
?>



