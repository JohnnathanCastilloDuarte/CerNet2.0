<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<?php 

function API_GRAFICOS($id_mapeo, $tipo_grafi){
  include("../../config.ini.php"); 
   ///////////////////////////////////////////// VALIDO LA EXISTENCIA DE LA IMAGEN PARA EVITAR EL APROBAR DEL MISMO
 
  
 $validador = mysqli_prepare($connect,"SELECT a.id_imagen FROM imagenes_general_informe as a, informes_general as b WHERE a.id_informe = b.id_informe AND b.id_mapeo = ? AND a.tipo = 1");
  mysqli_stmt_bind_param($validador, 'i', $id_mapeo);
  mysqli_stmt_execute($validador);
  mysqli_stmt_store_result($validador);
  mysqli_stmt_bind_result($validador, $id_imagen);
  mysqli_stmt_fetch($validador);
  if(mysqli_stmt_num_rows($validador) > 0){
   ?>  
        

</div>
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
  $colum = "";
  $promedio = "";
  $min = "";
  $max = "";
  
  echo "<input type='hidden' value='$id_mapeo' id='id_mapeo'/>";

  $consultar = mysqli_prepare($connect,"SELECT a.nombre, b.id_sensor_mapeo FROM sensores AS a, mapeo_general_sensor AS b  WHERE a.id_sensor = b.id_sensor AND b.id_mapeo = ?");
  mysqli_stmt_bind_param($consultar, 'i', $id_mapeo);  
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $sensor, $id_sensor);
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

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
           
    <?php 
 
      echo "['Time','Promedio', 'Minimo', 'Maximo'";
    /*for($f = 0; $f < $count_sensores; $f++){

         echo "'".$array_sensor[$f][0]."',";
   
     
    }*/
    echo "],";
    
   
      $consultar_data = mysqli_prepare($connect,"SELECT DISTINCT time FROM datos_crudos_general WHERE id_sensor_mapeo = ?");
      mysqli_stmt_bind_param($consultar_data, 'i', $array_id_sensor[0][0]);
      mysqli_stmt_execute($consultar_data);
      mysqli_stmt_store_result($consultar_data);
      mysqli_stmt_bind_result($consultar_data, $time);

      if($tipo_grafi == "TEMP"){
   
         $query_31 = mysqli_prepare($connect,"SELECT a.time,  round(AVG(a.temp),2) AS promedio, MIN(a.temp) as minimo, MAX(a.temp) as maximo FROM datos_crudos_general  as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND  b.id_mapeo = 4 GROUP BY a.time ORDER BY a.time ASC");
        mysqli_stmt_bind_param($query_31, 'i',  $id_mapeo);
        mysqli_stmt_execute($query_31);
        mysqli_stmt_store_result($query_31);
        mysqli_stmt_bind_result($query_31, $time, $promedio, $min, $max);	
        $colum = mysqli_stmt_num_rows($consultar_data);	
        
      }else{
        $query_31 = mysqli_prepare($connect,"SELECT AVG(a.hum) AS promedio, MIN(a.hum) as minimo, MAX(a.hum) as maximo FROM datos_crudos_general  as a, mapeo_general_sensor as b WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND  b.id_mapeo = ? GROUP BY a.time ORDER BY a.time ASC");
        mysqli_stmt_bind_param($query_31, 'i',  $id_mapeo);
        mysqli_stmt_execute($query_31);
        mysqli_stmt_store_result($query_31);
        mysqli_stmt_bind_result($query_31, $promedio, $min, $max);	
        $colum = mysqli_stmt_num_rows($consultar_data);	
      }  
  
      for($j=1;$j<=$count_sensores;$j++){
        mysqli_stmt_fetch($query_31);
        echo "['".$time."',".$promedio.",".$min.",".$max;
        /*
        for($g=1;$g<=;$g++){
          mysqli_stmt_fetch($query_31);
          
            
            if($g == $colum){
              echo $promedio.",".$min.",".$max;
            }else{
              echo $promedio.",".$min.",".$max.",";
            }	*/
        
        //}
        if($j == $count_sensores){
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
      legend: { position: 'bottom' },
      hAxis : { textStyle : { fontSize: 15} }, 
      vAxis : { textStyle : { fontSize: 20}},
      };
    }else{
      var options = {
    curveType: 'function',
    legend: { position: 'bottom' },
    hAxis : { textStyle : { fontSize: 15} }, 
    vAxis : { textStyle : { fontSize: 20},
    viewWindow: {
        min: lim_min,
        max: lim_max
    }, },
    };
    }

   

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    var chart_div = document.getElementById('curve_chart');

    

      // Wait for the chart to finish drawing before calling the getImageURI() method.
      google.visualization.events.addListener(chart, 'ready', function () {
        chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
        console.log(chart_div.innerHTML);
      });
      
  
        
      $(document).ready(function(){
        $("#aqui_algo").hide();
        $("#aqui_algo").html(chart.getImageURI());  
      });  
    
      chart.draw(data, options);
    
    }
    </script>
    <textarea id="aqui_algo"></textarea>
    <h2 style="font-family: Quincy;margin-left: 33%;margin-top: 05%;position: absolute;">Grafico valores promedio, mínima y máxima</h2>
    <div id="curve_chart" style="width: 1000px; height: 700px; margin-left:300px;"></div>
    <br>
    <!--
    <div style="margin-left:700px;">
      <button class="btn btn-success" id="aprobar_grafico_1">
        Aprobar Grafico
      </button>  
    </div>-->
    <script>
      $("#aprobar_grafico_1").click(function(){
        let base_64 = $("#aqui_algo").val();
        let id_mapeo = $("#id_mapeo").val();
        let seleccion = 1;
        const datos = {
          base_64,
          id_mapeo,
          seleccion
        }
        
        $.ajax({
          type:'POST',
          url:'templates/refrigeradores/guardar_grafico_auto1.php',
          data:datos,
          success:function(response){
            alert("Se ha configurado la imagen correctamente");
            //window.close();
          }
        });
      });
    </script>
    <?php  
    
    }////////// FIN DEL IF
  else{
      
    echo '<h5 class="text-danger">No se han cargado datos crudos para este mapeo</h5>';
  }
}/////////CIERRE DE LA FUNCIÓN


  $id_mapeo = $_GET['id_mapeo'];
  $tipo_grafi = $_GET['type'];

  API_GRAFICOS($id_mapeo,$tipo_grafi);



?>

