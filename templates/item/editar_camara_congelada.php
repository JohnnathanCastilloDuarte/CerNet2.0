<?php 
include('../../config.ini.php');

$nombre_camara_congelada = $_POST['nombre_camara_congelada'];
$id_empresa = $_POST['id_empresa'];
$marca_camara_congelada = $_POST['marca_camara_congelada'];
$modelo_camara_congelada = $_POST['modelo_camara_congelada'];
$ubicacion_camara_congelada = $_POST['ubicacion_camara_congelada'];
$valor_seteado_camara_congelada = $_POST['valor_seteado_camara_congelada'];
$limite_maximo_camara_congelada = $_POST['limite_maximo_camara_congelada'];
$limite_minimo_camara_congelada = $_POST['limite_minimo_camara_congelada']; 
$id_valida = $_POST['id_valida']; 
$id_item = $_POST['id_item']; 
$id_camara_congelada = $_POST['id_camara_congelada'];


$actualizar_item = mysqli_prepare($connect, "UPDATE item SET nombre = ?, id_empresa = ? WHERE id_item = ?");
mysqli_stmt_bind_param($actualizar_item, 'sii', $nombre_camara_congelada, $id_empresa, $id_item);
mysqli_stmt_execute($actualizar_item);

if($actualizar_item){
    $actualizar_camara_congelada = mysqli_prepare($connect,"UPDATE item_camara_congelada SET marca = ?, modelo = ?, ubicacion = ?, valor_seteado = ?, valor_maximo = ?, valor_minimo = ? WHERE id_item_camara_congelada = ?");
    mysqli_stmt_bind_param($actualizar_camara_congelada, 'ssssssi', $marca_camara_congelada, $modelo_camara_congelada, $ubicacion_camara_congelada, $valor_seteado_camara_congelada, $limite_minimo_camara_congelada, $limite_minimo_camara_congelada, $id_camara_congelada);
    mysqli_stmt_execute($actualizar_camara_congelada);

    if($actualizar_camara_congelada){
        echo "Listo";
    }else{
        echo "error";
    }

}

?>