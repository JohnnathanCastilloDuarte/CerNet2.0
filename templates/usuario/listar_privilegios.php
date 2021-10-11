<?php 

include('../../config.ini.php');

$id_privilegio = $_POST['id_privilegio'];

$traer = mysqli_prepare($connect,"SELECT id_privilegio, perfil, Modulos,     Usuarios, Clientes, Items, Ordenes_trabajo, Servicios, Informes, Documentacion, Cargos FROM privilegio WHERE id_privilegio = ?");
mysqli_stmt_bind_param($traer, 'i', $id_privilegio);
mysqli_stmt_execute($traer);
mysqli_stmt_store_result($traer);
mysqli_stmt_bind_result($traer, $id_privilegio, $perfil, $Modulos, $Usuarios, $Clientes, $Items, $Ordenes_trabajo, $Servicios, $Informes, $Documentacion, $Cargos);


$array_privilegio = array();

while($row = mysqli_stmt_fetch($traer)){
    
    $array_privilegio[] = array(
        'id_privilegio'=>$id_privilegio,
        'perfil'=>$perfil,
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



$json = json_encode($array_privilegio);

echo $json;

?>