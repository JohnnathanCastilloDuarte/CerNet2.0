<?php 
//error_reporting(0);
include('config.ini.php');

$id_usuario = $_POST['id_valida'];

$buscando_tipo_privilegio = mysqli_prepare($connect,"SELECT id_privilegio FROM usuario WHERE id_usuario = ?");
mysqli_stmt_bind_param($buscando_tipo_privilegio, 'i', $id_usuario);
mysqli_stmt_execute($buscando_tipo_privilegio);
mysqli_stmt_store_result($buscando_tipo_privilegio);
mysqli_stmt_bind_result($buscando_tipo_privilegio, $id_p);
mysqli_stmt_fetch($buscando_tipo_privilegio);


$traer = mysqli_prepare($connect,"SELECT  Modulos, Usuarios, Clientes, Items, Ordenes_trabajo, Servicios, Informes, Documentacion, Cargos FROM privilegio WHERE id_privilegio = ?");
mysqli_stmt_bind_param($traer, 'i', $id_p);
mysqli_stmt_execute($traer);
mysqli_stmt_store_result($traer);
mysqli_stmt_bind_result($traer, $Modulos, $Usuarios, $Clientes, $Items, $Ordenes_trabajo, $Servicios, $Informes, $Documentacion, $Cargos);


$array_p = array();

while($row = mysqli_stmt_fetch($traer)){
    
    $array_p[] = array(
        'modulo'=>$Modulos,
        'usuario'=>$Usuarios,
        'cliente'=>$Clientes,
        'item'=>$Items,
        'orden_trabajo'=>$Ordenes_trabajo,
        'servicio'=>$Servicios,
        'informe'=>$Informes,
        'documentacion'=>$Documentacion,
        'cargo'=>$Cargos
    );
}



$json = json_encode($array_p);

echo $json;                 

?>