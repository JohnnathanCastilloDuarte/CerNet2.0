<?php 

    include('../../condfig.ini.php');

    $id_departamento = $_POST['id_departamento'];

    $consulta = mysqli_prepare($connect, "SELECT  id_cargo, nombre FROM cargo WHERE id_departamento = ?");
    mysqli_stmt_bind_param($consulta, 'i', $id_departamento);
    mysqli_stmt_execute($consulta);

    mysqli_stmt_store_result($consulta);
    mysqli_stmt_bind_result($consulta, $id_cargo, $nombre);

    while($row = )

?>