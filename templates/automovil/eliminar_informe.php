<?php 

include('../../config.ini.php');

$id = $_POST['id'];

$consultar_informes = mysqli_prepare($connect,"SELECT id_informe_automovil FROM informes_automovil WHERE id_mapeo = ?");
mysqli_stmt_bind_param($consultar_informes, 'i', $id);
mysqli_stmt_execute($consultar_informes);
mysqli_stmt_store_result($consultar_informes);
mysqli_stmt_bind_result($consultar_informes, $id_informe_automovil);
mysqli_stmt_fetch($consultar_informes);


    $eliminar_informe = mysqli_prepare($connect, "DELETE FROM informes_automovil WHERE id_informe_automovil = ?");
    mysqli_stmt_bind_param($eliminar_informe, 'i', $id_informe_automovil);
    mysqli_stmt_execute($eliminar_informe);

    if ($eliminar_informe) {
    	echo "Si";
    }else{
    	echo "No";
    }


 ?>