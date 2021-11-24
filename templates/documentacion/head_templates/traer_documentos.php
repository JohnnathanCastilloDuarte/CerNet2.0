<?php 
error_reporting(0);
include('../../../config.ini.php');

$array_documentacion = array();

$estado_ver = $_POST['estado_ver'];
$id_valida = $_POST['id_valida'];



$consultar_cargo = mysqli_prepare($connect,"SELECT a.nombre FROM cargo as a, persona as b WHERE b.id_usuario = ? AND b.id_cargo = a.id_cargo");
mysqli_stmt_bind_param($consultar_cargo, 'i', $id_valida);
mysqli_stmt_execute($consultar_cargo);
mysqli_stmt_store_result($consultar_cargo);
mysqli_stmt_bind_result($consultar_cargo, $rol);
mysqli_stmt_fetch($consultar_cargo);



if($rol == 'CEO' || $rol == 'COO' || $rol == 'Quality Control' || $rol == 'IT Strategic Coordinator'){
  if($estado_ver == 0){
    $consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo FROM
    documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e WHERE a.id_numot = b.id_numot AND b.id_empresa = c.id_empresa 
    AND a.id_usuario = d.id_usuario AND a.id = e.id_documentacion");
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
    $consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo FROM
    documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e WHERE a.id_numot = 
    b.id_numot AND b.id_empresa = c.id_empresa   AND a.id_usuario = d.id_usuario AND a.id = e.id_documentacion");
    mysqli_stmt_execute($consultando);
    mysqli_stmt_store_result($consultando);
    mysqli_stmt_bind_result($consultando, $empresa, $archivo, $usuario, $fecha_creacion, $estado, $id_documentacion, $nombre_archivo );

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
  }else if($estado_ver >= 1 && $estado_ver <= 3){
    $consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo  FROM
    documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e WHERE a.id_numot = b.id_numot AND b.id_empresa = c.id_empresa 
    AND a.id_usuario = d.id_usuario AND a.estado between 1 AND 3 AND a.id_usuario = ? AND a.id = e.id_documentacion");
    mysqli_stmt_bind_param($consultando, 'i', $id_valida);
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
    AND a.id_usuario = d.id_usuario AND a.estado between 4 AND 6 AND a.id_usuario = ? AND a.id = e.id_documentacion");
    mysqli_stmt_bind_param($consultando, 'i', $id_valida);
    mysqli_stmt_execute($consultando);
    mysqli_stmt_store_result($consultando);
    mysqli_stmt_bind_result($consultando, $empresa, $archivo, $usuario, $fecha_creacion, $estado, $id_documentacion, $nombre_archivo );

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
  
  
}//////////// CIERRE ELSE IF DE CARGO
else if($rol == 'Junior Documentary Analyst' || $rol == 'Leading Senior Documentary Analyst' || $rol == 'Senior Documentary Analyst' || $rol == 'Documentary Analyst'){
  
  if($estado_ver == 0){
    $consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo FROM
    documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e WHERE a.id_numot = b.id_numot AND b.id_empresa = c.id_empresa 
    AND a.id_usuario = d.id_usuario AND a.id_usuario = ? AND a.id = e.id_documentacion");
    mysqli_stmt_bind_param($consultando, 'i', $id_valida);
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

/*
if($estado_ver == 0){
$consultando = mysqli_prepare($connect, "SELECT c.nombre, a.nombre, d.usuario, a.fecha_creacion, a.estado, a.id, e.nombre_archivo FROM
documentacion as a, numot as b, empresa as c, usuario as d, archivos_documentacion as e WHERE a.id_numot = b.id_numot AND b.id_empresa = c.id_empresa 
AND a.id_usuario = d.id_usuario AND a.id_usuario = ? AND a.id = e.id_documentacion");
mysqli_stmt_bind_param($consultando, 'i', $id_valida);
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
      'nombre_archivo'=>$nombre_archivo
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
      'nombre_archivo'=>$nombre_archivo
    );
}

}


*/

$convert = json_encode($array_documentacion);

echo $convert;
mysqli_stmt_close($connect);
?>



