<?php 

include('../../config.ini.php');

$traer = mysqli_prepare($connect,"SELECT id_privilegio, perfil FROM privilegio");
mysqli_stmt_execute($traer);
mysqli_stmt_store_result($traer);
mysqli_stmt_bind_result($traer, $id_privilegio, $perfil);

$json = array();

while($row = mysqli_stmt_fetch($traer)){

    $json[]=array(
        'id_privilegio'=>$id_privilegio,
        'privilegio'=>$perfil
    );
}

    $json_encode = json_encode($json);

    echo $json_encode;

?>