<?php 
  include("../../config.ini.php"); 
  
  $id_mapeo = $_POST['id'];
  $selector = $_POST['selector'];


if($selector == 1){
  $array_sensor = array();
  $array_tiempo = array();
  $count_sensores = 0;
  $count_tiempo = 0;
  $array_data = array();
  $contador_sensores = 0;
  $array_id_sensor = array();

  $consultar = mysqli_prepare($connect,"SELECT a.nombre, b.id_automovil_sensor FROM sensores AS a, automovil_sensor AS b  WHERE a.id_sensor = b.id_sensor AND b.id_mapeo = ?");
  mysqli_stmt_bind_param($consultar, 'i', $id_mapeo);  
  mysqli_stmt_execute($consultar);
  mysqli_stmt_store_result($consultar);
  mysqli_stmt_bind_result($consultar, $sensor, $id_sensor);
  
  while($row = mysqli_stmt_fetch($consultar)){  
    $array_sensor[] = array($sensor);
    $array_id_sensor[] = array($id_sensor);
    $count_sensores++;
  } 
  
  ?> 
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
  var data = google.visualization.arrayToDataTable([

  <?php 
 echo "['Time',";
  for($f = 0; $f < $count_sensores; $f++){
    echo "'".$array_sensor[$f][0]."',";
  }
  echo "],";

  $consultar_data = mysqli_prepare($connect,"SELECT DISTINCT time FROM automovil_datos_crudos WHERE id_automovil_sensor = ?");
    mysqli_stmt_bind_param($consultar_data, 'i', $array_id_sensor[0][0]);
    mysqli_stmt_execute($consultar_data);
    mysqli_stmt_store_result($consultar_data);
    mysqli_stmt_bind_result($consultar_data, $time);
  
    $query_31 = mysqli_prepare($connect,"SELECT a.temperatura FROM automovil_datos_crudos  as a, automovil_sensor as b WHERE a.id_automovil_sensor = b.id_automovil_sensor AND  b.id_mapeo = ?   ORDER BY a.time ASC, a.id_automovil_sensor ASC");
    mysqli_stmt_bind_param($query_31, 'i',  $id_mapeo);
    mysqli_stmt_execute($query_31);
    mysqli_stmt_store_result($query_31);
    mysqli_stmt_bind_result($query_31, $datos);	
    $colum = mysqli_stmt_num_rows($consultar_data);	
   
  
    for($j=1;$j<=$colum;$j++){
			mysqli_stmt_fetch($consultar_data);
			echo "['".$time."',";
				
			for($g=1;$g<=$count_sensores;$g++){
				mysqli_stmt_fetch($query_31);
					
          if($g == $count_sensores){
            echo $datos;
          }else{
            echo $datos.",";
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

  var options = {
  title: 'Grafico de todos los sensores',
  curveType: 'function',
  legend: { position: 'bottom' },
  hAxis : { textStyle : { fontSize: 10} }, 
  vAxis : { textStyle : { fontSize: 10} },
  };

  var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
  var chart_div = document.getElementById('curve_chart');
    
  // Wait for the chart to finish drawing before calling the getImageURI() method.
  google.visualization.events.addListener(chart, 'ready', function () {
    chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
    console.log(chart_div.innerHTML);
  });
 
  chart.draw(data, options);
  }
  </script>
  <div id="curve_chart" style="width: 900px; height: 500px"></div>
}
