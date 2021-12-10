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
$tipo = 14;


$insertando_item = mysqli_prepare($connect,"INSERT INTO item (id_empresa, id_tipo, nombre, id_usuario ) VALUES (?,?,?,?)");
mysqli_stmt_bind_param($insertando_item, 'iisi', $id_empresa, $tipo, $nombre_camara_congelada, $id_valida);
mysqli_stmt_execute($insertando_item);
$id_item = mysqli_stmt_insert_id($insertando_item);


$insertando_camara_congelada = mysqli_prepare($connect,"INSERT INTO item_camara_congelada (id_item, marca, modelo, ubicacion, valor_seteado, valor_maximo, valor_minimo) VALUES (?,?,?,?,?,?,?)");
mysqli_stmt_bind_param($insertando_camara_congelada, 'issssss', $id_item, $marca_camara_congelada, $modelo_camara_congelada, $ubicacion_camara_congelada, $valor_seteado_camara_congelada, $limite_maximo_camara_congelada, $limite_minimo_camara_congelada);
mysqli_stmt_execute($insertando_camara_congelada);

if($insertando_camara_congelada){
    echo "Hecho";
}else{
    echo "No";
}



mysqli_close($connect);
?>