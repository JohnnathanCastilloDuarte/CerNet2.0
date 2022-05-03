<?php 
include('../../config.ini.php');

$id_asignado = $_POST['id_asignado'];


$creando = mysqli_prepare($connect,"INSERT INTO datos_de_prueba_3 (id_prueba_3) VALUES (?)");
            mysqli_stmt_bind_param($creando, 'i', $id_item);
            mysqli_stmt_execute($creando);



 if ($creando){
            echo "Si";

}else{
			echo "No";
}           


 ?>