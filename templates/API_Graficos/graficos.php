<?php 
include('../../config.ini.php');

$id_mapeo = $_GET['id_mapeo'];
$tipo_grafico = $_GET['type'];
$altura = $_GET['altura'];
echo "<input type='hidden' id='id_mapeo' value='$id_mapeo'>";
echo "<input type='hidden' id='tipo_Grafico' value='$tipo_grafico'>";



$tipo_medicion = "";


if($tipo_grafico == "TEMP"){
    if(isset($_GET['promedio'])){
        $tipo_medicion="Max, Min, Prom Temperatura";
        $traer_data_cruda = mysqli_prepare($connect,"SELECT a.time,  round(AVG(a.temp),2) AS promedio FROM datos_crudos_general  as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND  b.id_mapeo = ? GROUP BY a.time ORDER BY a.time ASC");  
        mysqli_stmt_bind_param($traer_data_cruda, 'i', $id_mapeo);
        mysqli_stmt_execute($traer_data_cruda);
        mysqli_stmt_store_result($traer_data_cruda);
        mysqli_stmt_bind_result($traer_data_cruda, $fecha, $dato_avg);

        $traer_data_cruda2 = mysqli_prepare($connect,"SELECT a.time,  MIN(a.temp) as minimo FROM datos_crudos_general  as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND  b.id_mapeo = ? GROUP BY a.time ORDER BY a.time ASC");  
        mysqli_stmt_bind_param($traer_data_cruda2, 'i', $id_mapeo);
        mysqli_stmt_execute($traer_data_cruda2);
        mysqli_stmt_store_result($traer_data_cruda2);
        mysqli_stmt_bind_result($traer_data_cruda2, $fecha2, $dato_min);

        $traer_data_cruda3 = mysqli_prepare($connect,"SELECT a.time, MAX(a.temp) as maximo FROM datos_crudos_general  as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND  b.id_mapeo = ? GROUP BY a.time ORDER BY a.time ASC");  
        mysqli_stmt_bind_param($traer_data_cruda3, 'i', $id_mapeo);
        mysqli_stmt_execute($traer_data_cruda3);
        mysqli_stmt_store_result($traer_data_cruda3);
        mysqli_stmt_bind_result($traer_data_cruda3, $fecha3, $dato_max);
    }else{
        
        $tipo_medicion="Temperatura";
        if($altura == "todas"){
            $traer_data_cruda = mysqli_prepare($connect,"SELECT a.temp , LENGTH(b.posicion) as longitud, b.posicion from datos_crudos_general as a, mapeo_general_sensor as b, informes_general as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = c.id_mapeo AND b.id_mapeo = ?  ORDER BY longitud ASC, b.posicion ASC");  
            mysqli_stmt_bind_param($traer_data_cruda, 'i', $id_mapeo);
            mysqli_stmt_execute($traer_data_cruda);
            mysqli_stmt_store_result($traer_data_cruda);
            mysqli_stmt_bind_result($traer_data_cruda, $dato, $longitud, $posicion);
          
            $consultar_sensores = mysqli_prepare($connect,"SELECT a.nombre, b.id_sensor_mapeo, c.nombre
            FROM sensores AS a, mapeo_general_sensor AS b, bandeja as c WHERE a.id_sensor = b.id_sensor AND b.id_mapeo = ? AND b.id_bandeja = c.id_bandeja");
            mysqli_stmt_bind_param($consultar_sensores, 'i', $id_mapeo);  
            mysqli_stmt_execute($consultar_sensores);
            mysqli_stmt_store_result($consultar_sensores);
            mysqli_stmt_bind_result($consultar_sensores, $sensor, $id_sensor, $nombre_altura_titulo);
        }else{
            $traer_data_cruda = mysqli_prepare($connect,"SELECT a.temp , LENGTH(b.posicion) as longitud, b.posicion from datos_crudos_general as a, mapeo_general_sensor as b, informes_general as c, bandeja as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = c.id_mapeo AND b.id_mapeo = ? AND b.id_bandeja = d.id_bandeja AND d.id_bandeja = ? ORDER BY longitud ASC, b.posicion ASC");  
            mysqli_stmt_bind_param($traer_data_cruda, 'ii', $id_mapeo, $altura);
            mysqli_stmt_execute($traer_data_cruda);
            mysqli_stmt_store_result($traer_data_cruda);
            mysqli_stmt_bind_result($traer_data_cruda, $dato, $longitud, $posicion);
          
            $consultar_sensores = mysqli_prepare($connect,"SELECT a.nombre, b.id_sensor_mapeo, c.nombre
            FROM sensores AS a, mapeo_general_sensor AS b, bandeja as c WHERE a.id_sensor = b.id_sensor AND b.id_mapeo = ? AND b.id_bandeja = c.id_bandeja AND c.id_bandeja = ?");
            mysqli_stmt_bind_param($consultar_sensores, 'ii', $id_mapeo, $altura);  
            mysqli_stmt_execute($consultar_sensores);
            mysqli_stmt_store_result($consultar_sensores);
            mysqli_stmt_bind_result($consultar_sensores, $sensor, $id_sensor, $nombre_altura_titulo);
        }
       
    }
}else{
    if(isset($_GET['promedio'])){
        $tipo_medicion="Max, Min, Prom Humedad";
        $traer_data_cruda = mysqli_prepare($connect,"SELECT a.time,  round(AVG(a.hum),2) AS promedio FROM datos_crudos_general  as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND  b.id_mapeo = ? GROUP BY a.time ORDER BY a.time ASC");  
        mysqli_stmt_bind_param($traer_data_cruda, 'i', $id_mapeo);
        mysqli_stmt_execute($traer_data_cruda);
        mysqli_stmt_store_result($traer_data_cruda);
        mysqli_stmt_bind_result($traer_data_cruda, $fecha, $dato_avg);

        $traer_data_cruda2 = mysqli_prepare($connect,"SELECT a.time, MIN(a.hum) as minimo FROM datos_crudos_general  as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND  b.id_mapeo = ? GROUP BY a.time ORDER BY a.time ASC");  
        mysqli_stmt_bind_param($traer_data_cruda2, 'i', $id_mapeo);
        mysqli_stmt_execute($traer_data_cruda2);
        mysqli_stmt_store_result($traer_data_cruda2);
        mysqli_stmt_bind_result($traer_data_cruda2, $fecha2, $dato_min);

        $traer_data_cruda3 = mysqli_prepare($connect,"SELECT a.time, MAX(a.hum) as maximo FROM datos_crudos_general  as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND  b.id_mapeo = ? GROUP BY a.time ORDER BY a.time ASC");  
        mysqli_stmt_bind_param($traer_data_cruda3, 'i', $id_mapeo);
        mysqli_stmt_execute($traer_data_cruda3);
        mysqli_stmt_store_result($traer_data_cruda3);
        mysqli_stmt_bind_result($traer_data_cruda3, $fecha3, $dato_max);
    }else{
        $tipo_medicion="Humedad";
        if($altura == "todas"){
            $traer_data_cruda = mysqli_prepare($connect,"SELECT a.temp , LENGTH(b.posicion) as longitud, b.posicion from datos_crudos_general as a, mapeo_general_sensor as b, informes_general as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = c.id_mapeo AND b.id_mapeo = ?  ORDER BY longitud ASC, b.posicion ASC;");  
            mysqli_stmt_bind_param($traer_data_cruda, 'i', $id_mapeo);
            mysqli_stmt_execute($traer_data_cruda);
            mysqli_stmt_store_result($traer_data_cruda);
            mysqli_stmt_bind_result($traer_data_cruda, $dato, $longitud, $posicion);
          
            $consultar_sensores = mysqli_prepare($connect,"SELECT a.nombre, b.id_sensor_mapeo, c.nombre
            FROM sensores AS a, mapeo_general_sensor AS b, bandeja as c WHERE a.id_sensor = b.id_sensor AND b.id_mapeo = ? AND b.id_bandeja = c.id_bandeja");
            mysqli_stmt_bind_param($consultar_sensores, 'i', $id_mapeo);  
            mysqli_stmt_execute($consultar_sensores);
            mysqli_stmt_store_result($consultar_sensores);
            mysqli_stmt_bind_result($consultar_sensores, $sensor, $id_sensor, $nombre_altura_titulo);
        }else{
            $traer_data_cruda = mysqli_prepare($connect,"SELECT a.hum , LENGTH(b.posicion) as longitud, b.posicion from datos_crudos_general as a, mapeo_general_sensor as b, informes_general as c, bandeja as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = c.id_mapeo AND b.id_mapeo = ? AND b.id_bandeja = d.id_bandeja AND d.id_bandeja = ? ORDER BY longitud ASC, b.posicion ASC");  
            mysqli_stmt_bind_param($traer_data_cruda, 'ii', $id_mapeo, $altura);
            mysqli_stmt_execute($traer_data_cruda);
            mysqli_stmt_store_result($traer_data_cruda);
            mysqli_stmt_bind_result($traer_data_cruda, $dato, $longitud, $posicion);
          
            $consultar_sensores = mysqli_prepare($connect,"SELECT a.nombre, b.id_sensor_mapeo, c.nombre
            FROM sensores AS a, mapeo_general_sensor AS b, bandeja as c WHERE a.id_sensor = b.id_sensor AND b.id_mapeo = ? AND b.id_bandeja = c.id_bandeja AND c.id_bandeja = ?");
            mysqli_stmt_bind_param($consultar_sensores, 'ii', $id_mapeo, $altura);  
            mysqli_stmt_execute($consultar_sensores);
            mysqli_stmt_store_result($consultar_sensores);
            mysqli_stmt_bind_result($consultar_sensores, $sensor, $id_sensor, $nombre_altura_titulo);
        }
        
    }
}

$consultar_fechas = mysqli_prepare($connect,"SELECT DISTINCT a.time FROM datos_crudos_general as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?");
mysqli_stmt_bind_param($consultar_fechas, 'i', $id_mapeo);
mysqli_stmt_execute($consultar_fechas);
mysqli_stmt_store_result($consultar_fechas);
mysqli_stmt_bind_result($consultar_fechas, $time);






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graficos CerNet2.0</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../../design/assets/images/logo_pestana.png">
    <script src="highcharts.js"></script>
    <script src="series-label.js"></script>
    <script src="exporting.js"></script>
    <script src="export-data.js"></script>
    <script src="accessibility.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<style>
    .highcharts-figure,
    .highcharts-data-table table {
    min-width: 600px;
    max-width: 800px;
    margin: 1em auto;
    }

    .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
    }

    .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
    }

    .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
    padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
    background: #f1f7ff;
    }
</style>
<hr>
<div class="row">
    <div class="col-sm-12"></div>
</div>
<div class="row">
    <div class="col-sm-2">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <?php 
                    if(!isset($_GET['promedio'])){

                   
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <span class="text-success" id="recordar_altura">Recuerda seleccionar una altura observar la grafica</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                       <label>Alturas disponibles:</label> 
                       <select class="form-control" id="seleccionar_altura">
                            <option>Seleccion altura</option>
                            <option value="todas">Todas las Alturas / Bandejas</option>
                            
                            <?php 
                                $consultar_alturas = mysqli_prepare($connect,"SELECT  DISTINCT  a.nombre, a.id_bandeja FROM bandeja as a, mapeo_general_sensor as b WHERE b.id_bandeja = a.id_bandeja AND b.id_mapeo = ?");
                                mysqli_stmt_bind_param($consultar_alturas, 'i', $id_mapeo);
                                mysqli_stmt_execute($consultar_alturas);
                                mysqli_stmt_store_result($consultar_alturas);
                                mysqli_stmt_bind_result($consultar_alturas, $nombre_altura, $id_altura);
                          
                                while($row = mysqli_stmt_fetch($consultar_alturas)){
                                  
                                  echo "<option value='$id_altura'>$nombre_altura</option>";
                                }
                            ?>
                       </select>
                    </div>
                </div>
                <?php  } ?>
            </div>
        </div>
    </div>

    <div class="col-sm-10">
        <figure class="highcharts-figure" width="100%">
            <div id="container"></div>
        </figure>
    </div>
</div>

    <script>
    $(".highcharts-credits").addClass('display','none');
    $("#seleccionar_altura").change(function(){
    
        
    let altura = $(this).val();
    let id_mapeo = $("#id_mapeo").val();
    let tipo_grafico = $("#tipo_Grafico").val();
    if(altura == "Seleccion altura"){
        alert("Debes seleccionar una altura")
    }else{
        location.href='https://cercal.net/CerNet2.0/templates/API_Graficos/graficos.php?id_mapeo='+id_mapeo+'&type='+tipo_grafico+'&altura='+altura;
    }
  
    });


    <?php
    if(isset($_GET['altura']) or isset($_GET['promedio'])){
    ?>
                    
        Highcharts.setOptions({
            colors: [' #330000', 
                     '#CCCC00', 
                     '#CC9900',
                     '#CC6600',
                     '#CC3300',
                     '#64E572',
                     '#FF9655',
                     '#FFF263',
                     '#6AF9C4',
                     '#CC0000',
                     '#660000',
                     '#669900',
                     '#66CC00',
                     '#66FF00',
                     '#00FF00',
                     '#FF0000',
                     '#009900',
                     '#006600',
                     '#003300',
                     '#990000']
                     
                     
        });
        Highcharts.chart('container', {

            title: {
                text: 'Mapeo Termico'
            },

            subtitle: {
                text: 'Cercal Group'
            },

            yAxis: {
                title: {
                    text: '<?php echo $tipo_medicion; ?>'
                }
            },
            xAxis: {
                categories:[<?php 
                
                    for($i=1;$i<=mysqli_stmt_num_rows($consultar_fechas);$i++){
                        mysqli_stmt_fetch($consultar_fechas);
                        echo "'".$time."',";
                    }    
                ?>],
            labels: {
                style: {
                    fontSize: '7.5px'
                }
            }
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                
            },

            plotOptions: {
                series: 
                [
                    <?php 
                    mysqli_stmt_fetch($consultar_fechas);
                    for($i=1;$i<=mysqli_stmt_num_rows($consultar_fechas);$i++){  
                            echo "'".$time."',"; 
                    } ?>   
                ]

            },


            series: [{
            <?php 
                
                if(!isset($_GET['promedio'])){

                    for($i = 1; $i<=mysqli_stmt_num_rows($consultar_sensores); $i++){
                        mysqli_stmt_fetch($consultar_sensores);
                        if($i==1){
                    ?>
                            name: '<?php echo $sensor;?>',
                    <?php
                        }else{
                    ?>      
                        {name: '<?php echo $sensor; ?>', <?php } ?>
                        data:[<?php
                    
                        for($g = 1; $g<=mysqli_stmt_num_rows($consultar_fechas); $g++){
                            mysqli_stmt_fetch($traer_data_cruda);
                            if($g==mysqli_stmt_num_rows($consultar_fechas)){

                                echo number_format($dato,2);
                            }else{

                                echo number_format($dato,2).",";
                            }

                        }

                        if($i == mysqli_stmt_num_rows($consultar_sensores)){
                        ?>
                            ]}
                        <?php 
                        }else{
                        ?>
                            ]},
                        <?php
                        }          
                    }
                }
                else{
                    $array_titulos = array('Promedio','Maximo','Minimo');
                    for($i = 0; $i<count($array_titulos); $i++){
                    
                        if($i==0){
                    ?>
                            name: '<?php echo $array_titulos[$i];?>',
                    <?php
                        }else{
                    ?>      
                        {name: '<?php echo $array_titulos[$i]; ?>', <?php } ?>
                        data:[<?php
                        switch($i){
                            case 0:
                                for($g = 1; $g<=mysqli_stmt_num_rows($consultar_fechas); $g++){
                                    mysqli_stmt_fetch($traer_data_cruda);
                                    if($g==mysqli_stmt_num_rows($consultar_fechas)){
                                        echo number_format($dato_avg,2);
                                    }else{
                                        echo number_format($dato_avg,2).",";
                                    }
                                }
                                break;

                            case 1:
                                for($g = 1; $g<=mysqli_stmt_num_rows($consultar_fechas); $g++){
                                    mysqli_stmt_fetch($traer_data_cruda3);
                                    if($g==mysqli_stmt_num_rows($consultar_fechas)){
                                        echo number_format($dato_max,2);
                                    }else{
                                        echo number_format($dato_max,2).",";
                                    }
                                }
                                break;   
                            
                            case 2:

                                for($g = 1; $g<=mysqli_stmt_num_rows($consultar_fechas); $g++){
                                    mysqli_stmt_fetch($traer_data_cruda2);
                                    if($g==mysqli_stmt_num_rows($consultar_fechas)){
                                        echo number_format($dato_min,2);
                                    }else{
                                        echo number_format($dato_min,2).",";
                                    }
                                }
                                break;

                                
                        }?>
                        

                        
                        ]},
                            
                <?php }
                }    
                ?> 
            ],

            responsive: {
                rules: [{
                    condition: {
                    maxWidth: 600
                    },
                    chartOptions: {
                         
                         column: { colorByPoint: true },
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
   <?php }  ?>   
    
    </script> 



</body>
</html>