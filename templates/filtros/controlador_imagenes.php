<?php 
include "../../config.ini.php";

$id_asignado_filtro = $_POST['id_asignado_filtro'];
$enunciado_imagen = $_POST['enunciado_imagen'];

$enunciado_convertido = str_replace(' ','_',$enunciado_imagen);

$id_imagen="";

$query1 = mysqli_prepare($connect,"SELECT id_informe FROM informe_filtro WHERE id_asignado = ?");
mysqli_stmt_bind_param($query1, 'i', $id_asignado_filtro);
mysqli_stmt_execute($query1);
mysqli_stmt_store_result($query1);
mysqli_stmt_bind_result($query1, $id_informe);
mysqli_stmt_fetch($query1);


$validacion_1 = mysqli_prepare($connect,"SELECT id_imagen FROM images_informe_filtro WHERE enunciado = ? AND id_informe = ?");
mysqli_stmt_bind_param($validacion_1, 'si', $enunciado_imagen, $id_informe);
mysqli_stmt_execute($validacion_1);
mysqli_stmt_store_result($validacion_1);
mysqli_stmt_bind_result($validacion_1, $id_imagen_validacion);
mysqli_stmt_fetch($validacion_1);

if(mysqli_stmt_num_rows($validacion_1) == 0){
    $insertar_1 = mysqli_prepare($connect,"INSERT INTO  images_informe_filtro (id_informe, enunciado) VALUES (?,?)");
    mysqli_stmt_bind_param($insertar_1, 'is', $id_informe, $enunciado_imagen);
    mysqli_stmt_execute($insertar_1);
    $id_imagen = mysqli_stmt_insert_id($insertar_1);
}else{
    $id_imagen = $id_imagen_validacion;
}

$var = $_FILES["img_a_subir"]["type"];

if ($var == 'image/png' || $var == 'image/jpg' || $var == 'image/gif' || $var == 'image/jpeg') {
   $pasaimagen = 'SI';
}else{
   $pasaimagen = 'NO';  
}

if ($pasaimagen == 'SI') {
    
        /**LOGICA IMAGEN**/
        $ruta = "imagenes/".$id_informe."/";

        if(is_dir($ruta)===false){
            mkdir($ruta,0777,true);
        }

        $mix_imagen = $ruta.basename($_FILES["img_a_subir"]["name"]);
        $personalizado = $ruta.$id_imagen.$enunciado_convertido.".jpg";


        if (move_uploaded_file($_FILES["img_a_subir"]["tmp_name"], $mix_imagen)){

            rename("$mix_imagen","$personalizado");
            ///////////////////// ACTUALIZAMOS EN LA TABLA DE IMAGENES

            $update_imagen = mysqli_prepare($connect,"UPDATE images_informe_filtro SET url = ? WHERE id_imagen = ?");
            mysqli_stmt_bind_param($update_imagen, 'si', $personalizado, $id_imagen);
            mysqli_stmt_execute($update_imagen);

            if($update_imagen){
                echo "Si";
            }else{
                echo "Error";
            }


            
        }
}else{
    echo "No";
}





?>