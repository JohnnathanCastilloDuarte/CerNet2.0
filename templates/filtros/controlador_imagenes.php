<?php 


$id_asignado_filtro = $_POST['id_asignado_filtro'];
$enunciado_imagen = $_POST['enunciado_imagen'];

$query1 = mysqli_prepare($connect,"SELECT id_informe FROM informe_filtro WHERE id_asignado = ?");
mysqli_stmt_bind_param($query1, 'i', $id_asignado_filtro);
mysqli_stmt_execute($query1);
mysqli_stmt_store_result($query1);
mysqli_stmt_bind_result($query1, $id_informe);
mysqli_stmt_fetch($query1);

echo $id_informe;

/**LOGICA IMAGEN*
$ruta = "imagenes/".$id_informe."/";

if(is_dir($ruta)===false){
    mkdir($ruta,0777,true);
}

$mix_imagen = $ruta_imagen.basename($_FILES["img_a_subir"]["name"]);

if (move_uploaded_file($_FILES["img_a_subir"]["tmp_name"], $ruta_nombre_imagen)){

    echo "Ya esta arriba";
}
*/


?>