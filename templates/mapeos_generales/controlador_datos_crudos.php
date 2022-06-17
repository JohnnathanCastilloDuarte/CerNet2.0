<?php 
include('../../config.ini.php');

$movimiento = $_POST['movimiento'];


if($movimiento == "validar_archivo"){

    $id_mapeo = $_POST['id_mapeo'];

    $validar = mysqli_prepare($connect,"SELECT estado FROM registro_dc WHERE id_mapeo = ?");
    mysqli_stmt_bind_param($validar, 'i', $id_mapeo);
    mysqli_stmt_execute($validar);
    mysqli_stmt_store_result($validar);
    mysqli_stmt_bind_result($validar, $estado);

    mysqli_stmt_fetch($validar);

    if($estado == 1){
        echo "Cargado";
    }else{
        echo "No cargado";
    }


}else if($movimiento == "validar_carga_db"){

    $id_mapeo = $_POST['id_mapeo'];
    $contador = 0;

    $consultar1 = mysqli_prepare($connect,"SELECT id_sensor_mapeo FROM mapeo_general_sensor WHERE id_mapeo = ?");
    mysqli_stmt_bind_param($consultar1, 'i', $id_mapeo);
    mysqli_stmt_execute($consultar1);
    mysqli_stmt_store_result($consultar1);
    mysqli_stmt_bind_result($consultar1, $id_sensor_mapeo);

    while($row = mysqli_stmt_fetch($consultar1)){

        $consultar2 = mysqli_prepare($connect,"SELECT id_dato_crudo FROM datos_crudos_general WHERE id_sensor_mapeo = ?");
        mysqli_stmt_bind_param($consultar2, 'i', $id_sensor_mapeo);
        mysqli_stmt_execute($consultar2);
        mysqli_stmt_store_result($consultar2);
        mysqli_stmt_bind_result($consultar2, $id_dato_crudo);
        mysqli_stmt_fetch($consultar2);

        if(mysqli_stmt_num_rows($consultar2) == 0){
            $contador++;
        }


    }
    echo $contador;

}else if($movimiento == "configurar_datos_crudos"){

    $id_mapeo = $_POST['id_mapeo'];

    $id_valor_sensor = $_POST['id_valor_sensor'];
    $cambiar_posicion_temp = $_POST['cambiar_posicion_temp'];
    $cambiar_posicion_hum = $_POST['cambiar_posicion_hum'];

    $consultar_archivo = mysqli_prepare($connect,"SELECT url_archivo FROM registro_dc WHERE id_mapeo = ? ORDER BY fecha_registro DESC LIMIT 1");
    mysqli_stmt_bind_param($consultar_archivo, 'i', $id_mapeo);
    mysqli_stmt_execute($consultar_archivo);
    mysqli_stmt_store_result($consultar_archivo);
    mysqli_stmt_bind_result($consultar_archivo, $url_archivo);
    mysqli_stmt_fetch($consultar_archivo);

    $ubicacion_archivo = "../datoscrudos/".$url_archivo;

    $consultando_fechas = mysqli_prepare($connect,"SELECT fecha_inicio, fecha_fin, intervalo FROM mapeo_general WHERE id_mapeo = ?");
    mysqli_stmt_bind_param($consultando_fechas, 'i', $id_mapeo);
    mysqli_stmt_execute($consultando_fechas);
    mysqli_stmt_store_result($consultando_fechas);
    mysqli_stmt_bind_result($consultando_fechas, $fecha_incio, $fecha_fin, $intervalo);
    mysqli_stmt_fetch($consultando_fechas);

    $start = date("Y-m-d H:i:s",strtotime($fecha_incio));
    $end = date("Y-m-d H:i:s",strtotime($fecha_fin));

    $abre_archivo= array(fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
    fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
    fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
    fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
    fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
    fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
    fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),
    fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'),fopen($ubicacion_archivo,'r'));
    

    $z = 1;
    $fecha_suma = "";
    $variable_temp = "";
    $variable_hum = "";
    $contador = 0;

    for($i = 0; $i<count($id_valor_sensor); $i++){
        $z=1;
        $contador = 0;
        
        while(($column=fgetcsv($abre_archivo[$i],10000,";","\t"))!==false){

            if($z==1){
                $fecha_suma=$fecha_incio;
            }else{
                $fecha_suma=$fecha_suma;
            }

            if($contador > 6){

                if($cambiar_posicion_temp[$i] != "no aplica"){

                    if(strpos($column[$cambiar_posicion_temp[$i]],","))
                    {
                      $variable_temp=str_replace(",",".",$column[$cambiar_posicion_temp[$i]]);
                    }else
                    {
                      $variable_temp=$column[$cambiar_posicion_temp[$i]];						
                    }
                   
                }else{
                    $variable_temp = "no aplica";
                }

                if($cambiar_posicion_hum[$i] != "no aplica"){
                    if(strpos($column[$cambiar_posicion_hum[$i]],","))
                    {
                      $variable_hum=str_replace(",",".",$column[$cambiar_posicion_hum[$i]]);
                    }else
                    {
                      $variable_hum=$column[$cambiar_posicion_hum[$i]];						
                    }
                    
                }else{
                    $variable_hum = "no aplica";
                }
                
                
               

                if($fecha_suma>=$start && $fecha_suma<=$end){
                    
                    $insertando = mysqli_prepare($connect,"INSERT INTO datos_crudos_general (id_sensor_mapeo, time, temp, hum ) VALUES (?,?,?,?)");
                    mysqli_stmt_bind_param($insertando, 'isss', $id_valor_sensor[$i], $fecha_suma, $variable_temp, $variable_hum);
                    mysqli_stmt_execute($insertando);

                    $fecha_suma=date('Y-m-d H:i:s',strtotime("+$intervalo seconds",strtotime($fecha_suma)));
                    $z = 2;
                }//cierre del if


            }
            $contador++;

        }//// CIERRE DEL CICLO WHILE 
    }
    echo "Terminado";


}else if($movimiento == "Eliminar_dc"){

    $id_mapeo = $_POST['id_mapeo'];

   

    $consultar_1 = mysqli_prepare($connect,"SELECT id_sensor_mapeo FROM mapeo_general_sensor WHERE id_mapeo = ? ");
    mysqli_stmt_bind_param($consultar_1, 'i', $id_mapeo);
    mysqli_stmt_execute($consultar_1);
    mysqli_stmt_store_result($consultar_1);
    mysqli_stmt_bind_result($consultar_1, $id_mapeo_sensor);

    while($row1 = mysqli_stmt_fetch($consultar_1)){

        

        $consultar_2 = mysqli_prepare($connect,"SELECT id_dato_crudo FROM datos_crudos_general WHERE id_sensor_mapeo = ?");
        mysqli_stmt_bind_param($consultar_2, 'i', $id_mapeo_sensor);
        mysqli_stmt_execute($consultar_2);
        mysqli_stmt_store_result($consultar_2);
        mysqli_stmt_bind_result($consultar_2, $id_dato_crudo);

        while($row2 = mysqli_stmt_fetch($consultar_2)){

            $delete = mysqli_prepare($connect,"DELETE FROM datos_crudos_general WHERE id_dato_crudo = ?");
            mysqli_stmt_bind_param($delete, 'i', $id_dato_crudo);
            mysqli_stmt_execute($delete);
        }
    }

    echo "Listo";
}


mysqli_close($connect);
?>