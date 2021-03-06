<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php 

function API_GRAFICOS($id_mapeo, $tipo_grafi){

  include("../../config.ini.php"); 
  
  
  
  ///////////////////////////////////////////// VALIDO LA EXISTENCIA DE LA IMAGEN PARA EVITAR EL APROBAR DEL MISMO
 
  $validador = mysqli_prepare($connect,"SELECT a.id_imagen FROM imagenes_general_informe as a, informes_general as b WHERE a.id_informe = b.id_informe AND b.id_mapeo = ? AND a.tipo = 2");
  mysqli_stmt_bind_param($validador, 'i', $id_mapeo);
  mysqli_stmt_execute($validador);
  mysqli_stmt_store_result($validador);
  mysqli_stmt_bind_result($validador, $id_imagen);
  mysqli_stmt_fetch($validador);
  
  if(mysqli_stmt_num_rows($validador) > 0){
   ?>  
      <script>
         $(document).ready(function(){
       $("#aprobar_grafico_1").hide();
    }); 
      </script>
<?php
  }
  
  $array_sensor = array();
  $array_tiempo = array();
  $count_sensores = 0;
  $count_tiempo = 0;
  $array_data = array();
  $contador_sensores = 0;
  $array_id_sensor = array();
  $datos = "";
  $colum = "";
  
 ?> 
<input type='hidden' value='<?php echo $id_mapeo; ?>' id='id_mapeo'/>
<input type="hidden" value='<?php echo $tipo_grafi;?>' id="tipo_Grafico">
<div class="row">
  <div class="col-sm-2" style="text-align: center;">
    <label>Alturas:</label>
    <select class="form-control" id="Seleccionador_de_alturas">
        <option>Seleccione...</option>  
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
<hr>
<script>
  $("#Seleccionador_de_alturas").change(function(){
      let altura = $(this).val();
      let id_mapeo = $("#id_mapeo").val();
      let tipo_grafico = $("#tipo_Grafico").val();
    location.href = 'https://cercal.net/CerNet2.0/templates/mapeos_generales/API_GRAFICOS_TODOS.php?id_mapeo='+id_mapeo+'&type='+tipo_grafico+'&altura='+altura;
  });
</script>
<?php

  
 if(isset($_GET['altura'])){
   
  $altura = $_GET['altura']; 
  

  $consultar = mysqli_prepare($connect,"SELECT a.nombre, b.id_sensor_mapeo, c.nombre
FROM sensores AS a, mapeo_general_sensor AS b, bandeja as c WHERE a.id_sensor = b.id_sensor AND b.id_mapeo = ? AND b.id_bandeja = ? AND b.id_bandeja = c.id_bandeja");
  mysqli_stmt_bind_param($consultar, 'ii', $id_mapeo, $altura);  
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $sensor, $id_sensor, $nombre_altura_titulo);
    
  if(mysqli_stmt_num_rows($consultar) > 0){
    
  
    

    while($row = mysqli_stmt_fetch($consultar)){  
   
      $array_sensor[] = array($sensor);
      $array_id_sensor[] = array($id_sensor);
      $count_sensores++;
    }
 ?> 
 <div class="row"  style="text-align: center;">
  <div class="col-sm-2">
    <div class="card">
      <div class="card-header">Rangos de grafica</div>
      <div class="card-body">
        <div class="row" style="text-align: center;">
     
          <div class="col-sm-12">
            <label>Limite Min. (Ej: 5.00)</label>
            <input type="number" class="form-control"  id="limite_min" name="limite_min">
            <label>Limite Max. (Ej: 50.30)</label>
            <input type="number" class="form-control" id="limite_max" name="limite_max"> 
            <hr>
            <button id="ajustar_limite" class="btn btn-info">Generar</button>
            <button id="reset_limite" class="btn btn-danger">Reset</button>
          </div>
      
        </div>
      </div>
    </div>
  </div>

    <script type="text/javascript">

    $("#ajustar_limite").click(function(){
      location.reload();
    });

    $("#reset_limite").click(function(){
      $("#limite_min").val('');
      $("#limite_max").val(''); 
      location.reload();
    });

    google.charts.load('current', {'packages':['corechart'], 'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([

    <?php 
    

    echo "['Time',";
    for($f = 1; $f<$count_sensores; $f++){
      
            
      if(($f + 1)  == $count_sensores){
       echo "'".$array_sensor[$f][0]."'";
      }else{
        echo "'".$array_sensor[$f][0]."',";
      }
      
    }
    echo "],";
  
      $consultar_data = mysqli_prepare($connect,"SELECT DISTINCT time FROM datos_crudos_general WHERE id_sensor_mapeo = ?");
      mysqli_stmt_bind_param($consultar_data, 'i', $array_id_sensor[0][0]);
      mysqli_stmt_execute($consultar_data);
      mysqli_stmt_store_result($consultar_data);
      mysqli_stmt_bind_result($consultar_data, $time);
    
      

      if($tipo_grafi == "TEMP"){

        $query_31 = mysqli_prepare($connect,"SELECT a.temp, b.posicion, LENGTH(b.posicion) as longitud FROM datos_crudos_general  as a, mapeo_general_sensor as b WHERE
        a.id_sensor_mapeo = b.id_sensor_mapeo AND  b.id_mapeo = ?  AND b.id_bandeja = ? ORDER BY longitud ASC, b.posicion ASC");
        mysqli_stmt_bind_param($query_31, 'ii',  $id_mapeo, $altura);
        mysqli_stmt_execute($query_31);
        mysqli_stmt_store_result($query_31);
        mysqli_stmt_bind_result($query_31, $datos, $posicion, $longitud);	
        $colum = mysqli_stmt_num_rows($consultar_data);	
      }else{
        $query_31 = mysqli_prepare($connect,"SELECT a.hum FROM datos_crudos_general  as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND  b.id_mapeo = ?  AND b.id_bandeja = ?  ORDER BY a.time ASC, a.id_sensor_mapeo ASC");
        mysqli_stmt_bind_param($query_31, 'ii',  $id_mapeo, $altura);
        mysqli_stmt_execute($query_31);
        mysqli_stmt_store_result($query_31);
        mysqli_stmt_bind_result($query_31, $datos);	
        
        $colum = mysqli_stmt_num_rows($consultar_data);	
      }
      

 
      for($j=1;$j<$colum;$j++){
        mysqli_stmt_fetch($query_31);
         echo "['".$time."',";
       
         for($g=1;$g<$count_sensores;$g++){
          
            mysqli_stmt_fetch($consultar_data);
            
           if($g == $count_sensores){
              echo  number_format($datos,2);
            }else{
              echo  number_format($datos,2).",";
            }	
        
        }
        if($j == $colum){
          echo "]";
        }else{
          echo "],";
        } 
      }
    ?>
    ]);

    var lim_min = $("#limite_min").val();
    var lim_max = $("#limite_max").val(); 

   if(lim_min.length == 0){
      var options = {
      curveType: 'function',
      legend: { position: 'rigth' },
      hAxis : { textStyle : { fontSize: 20} }, 
      vAxis : { textStyle : { fontSize: 20}}
      };
    }else{
      var options = {
    animation:{
    duration: 1000,
    easing: 'out',
  },  curveType: 'function'
     , smoothline: 'true'
     , width: 875
     , height: 400
     , legend: {position: 'none'}
    };
    }

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    var chart_div = document.getElementById('curve_chart');

    // Wait for the chart to finish drawing before calling the getImageURI() method.
    google.visualization.events.addListener(chart, 'ready', function () {
      //chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
      console.log(chart_div.innerHTML);
    });
      
    $(document).ready(function(){
      $("#aqui_algo").hide();
      $("#aqui_algo").html(chart.getImageURI());  
    });  
    

    chart.draw(data, options);
    }
    </script>
    <h3 style="font-family: Quincy;margin-left: 35%;margin-top: 05%;position: absolute;">Grafico de todos los sensores para altura <?php echo $nombre_altura_titulo; ?></h3>
    <div id="curve_chart" style="width: 2000px; height: 700px; margin-left:300px;"></div>

    <script>
      $("#aprobar_grafico_1").click(function(){
        let base_64 = $("#aqui_algo").val();
        let id_mapeo = $("#id_mapeo").val();
        let seleccion = 0;
        const datos = {
          base_64,
          id_mapeo,
          seleccion
        }
        
        $.ajax({
          type:'POST',
          url:'guardar_grafico_auto1.php',
          data:datos,
          success:function(response){
            alert(response);
            alert("Se ha configurado la imagen correctamente");
            window.close();
          }
        });
      });
    </script>
    <?php  
    }
    else{
      echo '';
  
    }
    }////////// FIN DEL IF
  else{      
    echo '<h5 class="text-danger">Debes seleccionar una altura para continuar</h5>';
  }
}/////////CIERRE DE LA FUNCI??N



$id_mapeo = $_GET['id_mapeo'];
$tipo_grafi = $_GET['type'];

 API_GRAFICOS($id_mapeo,$tipo_grafi);

?>

