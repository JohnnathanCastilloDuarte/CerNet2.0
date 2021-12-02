<?php 
error_reporting(0);
include('../../../config.ini.php');

$id_documentacion = $_POST['id_documentacion'];

$array_firmantes = array();

$buscando_firmantes = mysqli_prepare($connect,"SELECT a.usuario, d.nombre, b.fecha_creacion, b.fecha_firma, CASE WHEN b.tipo = 1 THEN 'Aprobado' ELSE 'Rechazado' END FROM usuario as a, participante_documentacion as b, persona as c, cargo as d WHERE a.id_usuario = b.id_persona AND b.id_documentacion = ? AND a.id_usuario = c.id_usuario AND c.id_cargo = d.id_cargo ORDER BY b.orden ASC;");
mysqli_stmt_bind_param($buscando_firmantes, 'i', $id_documentacion);
mysqli_stmt_execute($buscando_firmantes);
mysqli_stmt_store_result($buscando_firmantes);
mysqli_stmt_bind_result($buscando_firmantes, $usuario, $rol,  $fecha_registro, $fecha_firma, $tipo);


while($row = mysqli_stmt_fetch($buscando_firmantes)){

    $fecha_inicio = date("d-m-Y",strtotime($fecha_registro));
    $fecha_actual = date("d-m-Y");
    $tiempo_departamento = $fecha_actual-$fecha_inicio;

  
    
    $array_firmantes[] = array(
        'usuario'=>$usuario,
        'rol'=>$rol,
        'fecha_registro'=>$fecha_registro,
        'fecha_firma'=>$fecha_firma,
        'tipo'=>$tipo,
        'diferencia'=>$tiempo_departamento
    );

}


$convert = json_encode($array_firmantes);

echo $convert;

?>