<?php 


$personalizado = $_POST['response'];
$tipo_lectura = $_POST['tipo_lectura'];
$id_valida = $_POST['id_valida'];
$id_asignado = $_POST['id_asignado'];
$id_mapeo = $_POST['id_mapeo'];




////////////// VARIABLES 
$start = "";
$end = "";


if($tipo_lectura == "general"){

    $variable_contador = 0;
    $array_datos_crudos = array();

    $abrir_archivo = fopen($personalizado,'r');

    while(($column=fgetcsv($abrir_archivo,10000,";","\t"))!==false){

        if($variable_contador > 6){

            $fecha_archivo = $column[0]." ".$column[1];
            $fecha_hora_sql = date("Y-m-d H:i:s",strtotime($fecha_archivo));
            
            
            $array_datos_crudos[] = array(
                'fecha'=>$column[0],
                'hora'=>$column[1],
                'v1'=>str_replace(",",".",$column[2]),
                'v2'=>str_replace(",",".",$column[3]),
                'v3'=>str_replace(",",".",$column[4]),
                'v4'=>str_replace(",",".",$column[5]),
                'v5'=>str_replace(",",".",$column[6]),
                'v6'=>str_replace(",",".",$column[7]),
                'v7'=>str_replace(",",".",$column[8]),
                'v8'=>str_replace(",",".",$column[9]),
                'v9'=>str_replace(",",".",$column[10]),
                'v10'=>str_replace(",",".",$column[11])
            );
        }

        $variable_contador++;
    }   

    $convert = json_encode($array_datos_crudos);
    echo $convert;
}




?>