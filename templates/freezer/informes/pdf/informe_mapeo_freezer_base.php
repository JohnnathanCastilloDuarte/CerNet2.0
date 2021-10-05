<?php 


require('../../../../recursos/encabezadopdf.php');
require('../../../../config.ini.php');
$id_informe = $_GET['informe'];
$resultado_corresponde = "";
$posicion_sensores_indicativo = 1;


 

// 1-CONSULTAR LA INFORMACIÓN LA CUAL SE IMPRIMIRA EN LAS CABECERAS Y EL NOMBRE DEL INFORME

		$query_1 = mysqli_prepare($connect,"SELECT nombre, id_asignado, id_mapeo, concepto, observacion, comentarios, fecha_registro FROM informe_freezer WHERE id_informe_freezer = ?");
		mysqli_stmt_bind_param($query_1, 'i', $id_informe);
		mysqli_stmt_execute($query_1);
		mysqli_stmt_store_result($query_1);
		mysqli_stmt_bind_result($query_1, $dato_1, $id_asignado, $id_mapeo, $concepto, $observacion, $comentarios, $fecha_registro);
		mysqli_stmt_fetch($query_1);
		$nombre_informe = $dato_1;

    


		$query_2 = mysqli_prepare($connect,"SELECT id_servicio, id_item FROM item_asignado WHERE id_asignado = ?");
		mysqli_stmt_bind_param($query_2, 'i', $id_asignado);
		mysqli_stmt_execute($query_2);
		mysqli_stmt_store_result($query_2);
		mysqli_stmt_bind_result($query_2, $id_servicio, $id_item);
		mysqli_stmt_fetch($query_2);
	

		$query_3 = mysqli_prepare($connect,"SELECT  id_numot FROM servicio WHERE id_servicio = ?");
		mysqli_stmt_bind_param($query_3, 'i', $id_servicio);
		mysqli_stmt_execute($query_3);
		mysqli_stmt_store_result($query_3);
		mysqli_stmt_bind_result($query_3, $id_numot);
		mysqli_stmt_fetch($query_3);
		
		$query_4 = mysqli_prepare($connect,"SELECT numot, id_empresa FROM numot WHERE id_numot = ?");
		mysqli_stmt_bind_param($query_4, 'i', $id_numot);
		mysqli_stmt_execute($query_4);
		mysqli_stmt_store_result($query_4);
		mysqli_stmt_bind_result($query_4, $dato_2, $id_empresa);
		mysqli_stmt_fetch($query_4);
		
		$numot = $dato_2;

		$query_5 = mysqli_prepare($connect,"SELECT nombre, direccion FROM empresa WHERE id_empresa = ?");
		mysqli_stmt_bind_param($query_5, 'i', $id_empresa);
		mysqli_stmt_execute($query_5);
		mysqli_stmt_store_result($query_5);
		mysqli_stmt_bind_result($query_5, $nombre_empresa, $direccion_empresa);
		mysqli_stmt_fetch($query_5);

		
    
		// 2-CONSULTAR LA INFORMACIÓN DE IDENTIFICACIÓN DEL EQUIPO
		$query_6 = mysqli_prepare($connect,"SELECT a.nombre, a.descripcion, b.fabricante, b.modelo, b.n_serie, b.c_interno, b.ubicacion, b.tem_min, b.tem_max, b.valor_seteado_tem
																			  FROM item as a, item_freezer as b WHERE a.id_item = b.id_item AND a.id_item = ?");
		mysqli_stmt_bind_param($query_6, 'i', $id_item);
		mysqli_stmt_execute($query_6);
		mysqli_stmt_store_result($query_6);
		mysqli_stmt_bind_result($query_6, $nombre_item, $descripcion_item, $fabricante_item, $modelo_item, $n_serie_item, $c_interno_item, $ubicacion_item, $tem_min_item, $tem_max_item, $valor_seteado_tem);
		mysqli_stmt_fetch($query_6);

    

    $a = "DETERMINACÍON TERMICA PARA ".$nombre_item;


    $tem_min_item_format = number_format($tem_min_item,2);
    $tem_max_item_format = number_format($tem_max_item,2);
    $valor_seteado_tem_format = number_format($valor_seteado_tem,2);


   
     //OBTENER PERIODOS DE MEDICIÓN DE MAPEO//
    $query_7 = mysqli_prepare($connect,"SELECT  valor_seteado_temperatura, temperatura_minima, temperatura_maxima FROM freezer_mapeo WHERE id_mapeo = ?");
    mysqli_stmt_bind_param($query_7, 'i', $id_mapeo);
    mysqli_stmt_execute($query_7);
    mysqli_stmt_store_result($query_7);
    mysqli_stmt_bind_result($query_7,  $valor_seteado_mapeo, $temperatura_minima_mapeo, $temperatura_maxima_mapeo);
    mysqli_stmt_fetch($query_7);




    //OBTENER LA FECHA DE INICIO DE LOS MAPEOS
    $fecha_inicio_mapeo = mysqli_prepare($connect,"SELECT fecha_inicio, hora_inicio FROM freezer_mapeo WHERE  id_asignado = ? ORDER BY fecha_inicio ASC limit 1");
    mysqli_stmt_bind_param($fecha_inicio_mapeo, 'i', $id_asignado);
    mysqli_stmt_execute($fecha_inicio_mapeo);
    mysqli_stmt_store_result($fecha_inicio_mapeo);
    mysqli_stmt_bind_result($fecha_inicio_mapeo, $fecha_inicio_a, $hora_inicio_a);
    mysqli_stmt_fetch($fecha_inicio_mapeo);

    $fecha_original_inicio = $fecha_inicio_a." ".$hora_inicio_a;    

    $fecha_inicio_mapeo_formato= date("d/m/Y", strtotime($fecha_original_inicio));
    //OBTENER LA FECHA DE FIN DE LOS MAPEOS
    $fecha_fin_mapeo = mysqli_prepare($connect,"SELECT fecha_final, hora_final FROM freezer_mapeo WHERE  id_asignado = ? ORDER BY fecha_inicio DESC limit 1");
    mysqli_stmt_bind_param($fecha_fin_mapeo, 'i', $id_asignado);
    mysqli_stmt_execute($fecha_fin_mapeo);
    mysqli_stmt_store_result($fecha_fin_mapeo);
    mysqli_stmt_bind_result($fecha_fin_mapeo, $fecha_fin_a, $hora_fin_a);
    mysqli_stmt_fetch($fecha_fin_mapeo);
    $fecha_emision= date("d/m/Y", strtotime($fecha_registro));

    $fecha_original_fin = $fecha_fin_a." ".$hora_fin_a;    

    $fecha_final_mapeo_formato = date("d/m/Y", strtotime($fecha_original_fin));

    //CONSULTAR PARTICIPANTES

    $participante = mysqli_prepare($connect,"SELECT nombres, apellido, cargo FROM informes_participante WHERE id_numot = ?");
    mysqli_stmt_bind_param($participante, 'i', $id_numot);
    mysqli_stmt_execute($participante);
    mysqli_stmt_store_result($participante);
    mysqli_stmt_bind_result($participante, $nombre_participante, $apellido_participante, $cargo_participante);
    mysqli_stmt_fetch($participante);

    $fecha_emision= date("d/m/Y", strtotime($fecha_registro));

  /////////////////////////////////////////////////////////////INICIO INFORME////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$pdf->AddPage('A4');


$html = <<<EOD

  <h4>Solicitante:&nbsp;&nbsp;$nombre_empresa</h4>
  <h4>Dirección:&nbsp;&nbsp;$direccion_empresa</h4>
  <h4>Atención:&nbsp;&nbsp; $nombre_participante $apellido_participante $cargo_participante</h4>
  <h4>Fecha de emisión:&nbsp;&nbsp; $fecha_emision</h4>
  
EOD;
$pdf->writeHTML($html, true, false, false, false, '');



$html_2 = <<<EOD
<style>
table 
{
border-collapse: collapse;
width: 100%;
text-align: center;
vertical-align: middle;
}

th 
{
background-color: #3138AA;
color: #FFFFFF;
vertical-align: middle;
}

th, td 
{
border: 1px solid #BBBBBB;
padding: 3px;
vertical-align: middle;
}

tr:nth-child(even) 
{
background-color: #f2f2f2;
}

.enunciado{
text-align:left;
}
</style>
<br><br>
<table>
  <tr><td bgcolor="#DDDDDD" class="enunciado"><H4><strong>1.0 ANTECEDENTES DE LA INSPECCIÓN</strong></H4></td></tr>
  <tr><td width="30%" class="enunciado">Lugar</td><td  width="70%">$direccion_empresa</td></tr>
  <tr><td width="30%" class="enunciado">Fecha de medición</td><td width="70%">$fecha_inicio_mapeo_formato al $fecha_final_mapeo_formato</td></tr>
  <tr><td width="30%" class="enunciado">Acta de inspección</td><td width="70%"></td></tr>
</table>
  
EOD;
$pdf->writeHTML($html_2, true, false, false, false, '');



$html_3 = <<<EOD
<style>
table 
{
border-collapse: collapse;
width: 100%;
text-align: center;
vertical-align: middle;
}

th 
{
background-color: #3138AA;
color: #FFFFFF;
vertical-align: middle;
}

th, td 
{
border: 1px solid #BBBBBB;
padding: 3px;
vertical-align: middle;
}

tr:nth-child(even) 
{
background-color: #f2f2f2;
}

.enunciado{
text-align:left;
}
</style>
<br><br>
<table>
  <tr><td bgcolor="#DDDDDD" class="enunciado"><H4><strong>2.0 IDENTIFICACIÓN DEL EQUIPO Y/O AREA</strong></H4></td></tr>
      <tr><td width="30%" class="enunciado">Descripción</td><td  width="70%">$nombre_item</td></tr>
      <tr><td width="30%" class="enunciado">Marca</td><td  width="70%">$fabricante_item</td></tr>
      <tr><td width="30%" class="enunciado">Modelo</td><td  width="70%">$modelo_item</td></tr>
      <tr><td width="30%" class="enunciado">Número de serie</td><td  width="70%">$n_serie_item</td></tr>
      <tr><td width="30%" class="enunciado">Identificación</td><td  width="70%">$c_interno_item</td></tr>
      <tr><td width="30%" class="enunciado">Valor seteado</td><td  width="70%">$valor_seteado_tem_format</td></tr>
      <tr><td width="30%" class="enunciado">Especificación solicitante</td><td width="70%">Minima: $tem_min_item_format C°  Maxima: $tem_max_item_format C°</td></tr>

</table>
  
EOD;
$pdf->writeHTML($html_3, true, false, false, false, '');




$html_4 = <<<EOD
<style>
table 
{
border-collapse: collapse;
width: 100%;
text-align: center;
vertical-align: middle;
}

th 
{
background-color: #3138AA;
color: #FFFFFF;
vertical-align: middle;
}

th, td 
{
border: 1px solid #BBBBBB;
padding: 3px;
vertical-align: middle;
}

tr:nth-child(even) 
{
background-color: #f2f2f2;
}

.enunciado{
text-align:left;
}
</style>
<br><br>
<table>
  <tr><td bgcolor="#DDDDDD" class="enunciado"><H4><strong>3.0 NORMATIVA</strong></H4></td></tr>
      <tr><td width="30%" class="enunciado">O.M.S., informe 37 y 45</td><td  width="70%"><p style="text-align:justify;">Comité de expertos de la organización mundial de la salud, 
      en especificaciones para la preparaciones farmacéuticas, "Buenas prácticas de manufactura vigentes", Seire de informes técnicos de la organización mundial de la salud, Ginebra.</p></td></tr>
      <tr><td width="30%" class="enunciado">PDA Parenteral Drug Association. Reporte técnico No 39</td><td  width="70%" style="text-align:justify;">"Guidance for Temperature-Controlled Medicinal Products: Maintaining the 
      Quality of Temperature-Sensitive Medicinal Products through the Transportation Environment"</td></tr>

</table>
  
EOD;
$pdf->writeHTML($html_4, true, false, false, false, '');

$pdf->SetLineStyle(array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(180, 180, 180)));

$pdf->SetFillColor(220, 220, 220);

$pdf->writeHTMLCell(180, 2, 15, '', '<strong>4.0 RESULTADOS</strong>', 1, 1, 1, true, 'L', true);

$pdf->writeHTMLCell(50, 5, 15, '', 'Medición', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(45, 5, 65, '', 'Requisito', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(55, 5, 110, '', 'Valor Obtenido', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 5, 165, '', 'Veredicto', 1, 1, 0, true, 'C', true);


//CONSULTAR MAPEOS 

 $query_8 = mysqli_prepare($connect,"SELECT a.id_mapeo, a.nombre, a.temperatura_maxima, a.temperatura_minima FROM freezer_mapeo as a, freezer_datos_crudos as b, freezer_sensor as c 
                                      WHERE a.tipo_mapeo != 3 AND a.id_asignado = ? AND a.informe_base > 0 AND b.id_freezer_sensor = c.id_freezer_sensor GROUP BY a.id_mapeo, a.nombre, a.temperatura_maxima, a.temperatura_minima ");
 mysqli_stmt_bind_param($query_8, 'i', $id_asignado);
 mysqli_stmt_execute($query_8);
 mysqli_stmt_store_result($query_8);
 mysqli_stmt_bind_result($query_8, $id_mapeos_h, $nombre_mapeos,  $temperatura_maxima_mapeos, $temperatura_minima_mapeos);
 
  $veredicto_01 = "";

  
   
 while($row = mysqli_stmt_fetch($query_8)){
   
  $query_apoyo_0 = mysqli_prepare($connect,"SELECT AVG(CAST(a.temperatura AS DECIMAL(6,2))) as promedio FROM freezer_datos_crudos as a, freezer_sensor as b, sensores as d 
																				WHERE a.id_freezer_sensor = b.id_freezer_sensor AND b.id_mapeo = ? AND b.id_asignado = ?");
	mysqli_stmt_bind_param($query_apoyo_0, 'ii', $id_mapeos_h ,$id_asignado);
	mysqli_stmt_execute($query_apoyo_0);
	mysqli_stmt_store_result($query_apoyo_0);
	mysqli_stmt_bind_result($query_apoyo_0, $d_1);
	mysqli_stmt_fetch($query_apoyo_0);
	$promedio_h = number_format($d_1,2);
   
   
   if($promedio_h < $temperatura_maxima_mapeos && $promedio_h > $temperatura_minima_mapeos){
    $veredicto_01 = "<strong>Cumple</strong>";
  }else{
    $veredicto_01 = "<strong>No cumple</strong>";
  }
   

      
  $pdf->writeHTMLCell(50, 5, 15, '',$nombre_mapeos, 1, 0, 0, true, 'L', true);

  $pdf->writeHTMLCell(45, 5, 65, '',$temperatura_maxima_mapeos.' C° '.$temperatura_minima_mapeos.' C°', 1, 0, 0, true, 'C', true);

  $pdf->writeHTMLCell(55, 5, 110, '',$promedio_h, 1, 0, 0, true, 'C', true);

  $pdf->writeHTMLCell(30, 5, 165, '',$veredicto_01, 1, 1, 0, true, 'C', true);
   
 }  


  $pdf->writeHTMLCell(180, 2, 15, '', '5.0 CONCLUSION', 1, 1, 0, true, 'L', true);
  $pdf->writeHTMLCell(180, 2, 15, '', $observacion, 1, 1, 0, true, 'L', true);



  $pdf->AddPage('A4');

$html_6 = <<<EOD
<style>
table 
{
border-collapse: collapse;
width: 100%;
text-align: center;
vertical-align: middle;
}

th 
{
background-color: #3138AA;
color: #FFFFFF;
vertical-align: middle;
}

th, td 
{
border: 1px solid #BBBBBB;
padding: 3px;
vertical-align: middle;
}

tr:nth-child(even) 
{
background-color: #f2f2f2;
}

.enunciado{
text-align:left;
}
</style>
<br><br>
<table>
  <tr><td bgcolor="#DDDDDD" class="enunciado"><H4><strong>1.0 ANTECEDENTES DE LA INSPECCIÓN</strong></H4></td></tr>
  <tr><td width="30%" class="enunciado">Lugar</td><td  width="70%">$direccion_empresa</td></tr>
  <tr><td width="30%" class="enunciado">Fecha de medición</td><td width="70%">$fecha_inicio_mapeo_formato $hora_inicio_a - $fecha_final_mapeo_formato $hora_fin_a</td></tr>
  <tr><td width="30%" class="enunciado">Acta de inspección</td><td width="70%"></td></tr>
</table>
  
EOD;
$pdf->writeHTML($html_6, true, false, false, false, '');

$html_7 = <<<EOD
<style>
table 
{
border-collapse: collapse;
width: 100%;
text-align: center;
vertical-align: middle;
}

th 
{
background-color: #3138AA;
color: #FFFFFF;
vertical-align: middle;
}

th, td 
{
border: 1px solid #BBBBBB;
padding: 3px;
vertical-align: middle;
}

tr:nth-child(even) 
{
background-color: #f2f2f2;
}

.enunciado{
text-align:left;
}
</style>
<br><br>
<table>
    <tr><td bgcolor="#DDDDDD" class="enunciado"><H4><strong>2.0 IDENTIFICACIÓN DEL EQUIPO Y/O AREA</strong></H4></td></tr>
    <tr><td width="30%" class="enunciado">Descripción</td><td  width="70%">$nombre_item</td></tr>
    <tr><td width="30%" class="enunciado">Marca</td><td  width="70%">$fabricante_item</td></tr>
    <tr><td width="30%" class="enunciado">Modelo</td><td  width="70%">$modelo_item</td></tr>
    <tr><td width="30%" class="enunciado">Número de serie</td><td  width="70%">$n_serie_item</td></tr>
    <tr><td width="30%" class="enunciado">Identificación</td><td  width="70%">$c_interno_item</td></tr>
    <tr><td width="30%" class="enunciado">Valor seteado</td><td  width="70%"> $valor_seteado_tem_format</td></tr>
    <tr><td width="30%" class="enunciado">Especificación solicitante</td><td width="70%">Minima: $tem_min_item_format C°  Maxima: $tem_max_item_format C°</td></tr>
</table>


EOD;
$pdf->writeHTML($html_7, true, false, false, false, '');


$html_8 = <<<EOD
<style>
table 
{
border-collapse: collapse;
width: 100%;
text-align: center;
vertical-align: middle;
}

th 
{
background-color: #3138AA;
color: #FFFFFF;
vertical-align: middle;
}

th, td 
{
border: 1px solid #BBBBBB;
padding: 3px;
vertical-align: middle;
}

tr:nth-child(even) 
{
background-color: #f2f2f2;
}

.enunciado{
text-align:left;
}
</style>

<table><tr><td bgcolor="#DDDDDD" class="enunciado"><H4><strong>3.0 PRUEBA DE MAPEO TERMICO</strong></H4></td></tr></table>
<H3>3.1 OBJETIVO</H3>
  <P>Comprobar que las temperaturas en la cual se almacenan los productos se mantengan dentro de los límites establecidos,
    proporcionando evidencia documental que demuestre información general para un buen almacenamiento y las practicas de distribución,
    para asegurar que los productos farmacéuticos lleguen al usuario final (los profesionales y los pacientes / consumidores) con calidad 
    intacta.</P>
    
 <h3>3.2 METODOLOGIA</h3>
    <p>$comentarios</p>

EOD;
$pdf->writeHTML($html_8, true, false, false, false, '');


$imagen_posicion_sensores = "";

//CONSULTAR IMAGEN DE POSICIÓN DE SENSORES
$query_9 = mysqli_prepare($connect,"SELECT ubicacion FROM images_informe_freezer WHERE id_informe = $id_informe AND tipo_imagen = 1");
mysqli_stmt_execute($query_9);
mysqli_stmt_store_result($query_9);
mysqli_stmt_bind_result($query_9, $ubicacion_img_1);
mysqli_stmt_fetch($query_9);


if(isset($ubicacion_img_1)){
  $imagen_posicion_sensores = '<img src="../../$ubicacion_img_1">';
}else{
  $imagen_posicion_sensores = "<h2>No has cargado la imagen</h2>";
}



$pdf->AddPage('A4');
$html_9 = <<<EOD
<style>
table 
{
  border-collapse: collapse;
  width: 100%;
  height: 500px;
  text-align: center;
  vertical-align: middle;
 
}

th 
{
  background-color: #3138AA;
  color: #FFFFFF;
  vertical-align: middle;
}

th, td 
{
  border: 1px solid #BBBBBB;
  padding: 3px;
  vertical-align: middle;
}

tr:nth-child(even) 
{
	background-color: #f2f2f2;
}


</style>

 
<table><tr><td colspan="8" bgcolor="#DDDDDD"><H3><strong>Ubicación de los Sensores</strong></H3></td></tr>

<tr><td width="100%">Sensores ubicados en Bodega</td></tr>
<tr><td width="100%">$imagen_posicion_sensores</td></tr>
</table>
EOD;
$pdf->writeHTML($html_9, true,false,false,false,'');

$contador_t = 0;
//TITULOS
$pdf->writeHTMLCell(15, 5, 15, '', 'Posición', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(35, 5, 30, '', 'N° de identificación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(55, 5, 65, '', 'Ubicación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(75, 5, 120, '', 'N° de serie', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(66, 5, 215, '', 'N° Certificado de Calibración', 1, 1, 0, true, 'C', true);



$query_9 = mysqli_prepare($connect,"SELECT DISTINCT a.nombre, b.nombre, a.serie, a.id_sensor  FROM sensores as a, bandeja as b, freezer_sensor as c, freezer_mapeo as d 
                                    WHERE c.id_sensor = a.id_sensor AND c.id_mapeo = d.id_mapeo AND b.id_bandeja = c.id_bandeja AND d.informe_base > 0 AND d.id_asignado = ? ORDER BY b.nombre ASC");
mysqli_stmt_bind_param($query_9, 'i', $id_asignado);
mysqli_stmt_execute($query_9);
mysqli_stmt_store_result($query_9);
mysqli_stmt_bind_result($query_9, $nombre_sensor_t, $ubicacion_sensor_t, $serie_sensor_t,  $id_sensor_t);

while($row = mysqli_stmt_fetch($query_9)){
      $contador_t ++;
  $query_10 = mysqli_prepare($connect,'SELECT certificado FROM sensores_certificados WHERE id_sensor = ? ORDER BY fecha_vencimiento DESC LIMIT 1');
  mysqli_stmt_bind_param($query_10, 'i', $id_sensor_t);
  mysqli_stmt_execute($query_10);
  mysqli_stmt_store_result($query_10);
  mysqli_stmt_bind_result($query_10, $certificado_sensor_t);
  mysqli_stmt_fetch($query_10);
  
  if($contador_t == 30 OR $contador_t == 60 ){

       $pdf->AddPage('A4');
       //TITULOS
        $pdf->writeHTMLCell(15, 5, 15, '', 'Posición', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(35, 5, 30, '', 'N° de identificación', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(55, 5, 65, '', 'Ubicación', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(75, 5, 120, '', 'N° de serie', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(66, 5, 215, '', 'N° Certificado de Calibración', 1, 1, 0, true, 'C', true);

     } 
      $pdf->writeHTMLCell(15, 5, 15, '', $contador_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(35, 5, 30, '', $nombre_sensor_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(55, 5, 65, '', $ubicacion_sensor_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(75, 5, 120, '', $serie_sensor_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(66, 5, 215, '', $certificado_sensor_t, 1, 1, 0, true, 'C', true);
  
}


$pdf->AddPage('A4');
$html_10 = <<<EOD
<h3>3.4 RESULTADOS OBTENIDOS</h3>
EOD;
$pdf->writeHTML($html_10, true,false,false,false,'');


 $query_11 = mysqli_prepare($connect,"SELECT a.id_mapeo, a.nombre, a.temperatura_maxima, a.temperatura_minima, a.fecha_inicio, a.hora_inicio,
                                      a.fecha_final, a.hora_final, a.intervalo, AVG(CAST(b.temperatura AS DECIMAL(6,2))) as promedio FROM
                                      freezer_mapeo as a, freezer_datos_crudos as b, freezer_sensor as c WHERE 
                                      a.id_asignado = ? AND a.informe_base > 0 AND b.id_freezer_sensor = c.id_freezer_sensor 
                                      GROUP BY a.id_mapeo, a.nombre, a.temperatura_maxima, a.temperatura_minima, a.fecha_inicio, a.hora_inicio, a.fecha_final, a.hora_final, a.intervalo");
 mysqli_stmt_bind_param($query_11, 'i', $id_asignado);
 mysqli_stmt_execute($query_11);
 mysqli_stmt_store_result($query_11);
 mysqli_stmt_bind_result($query_11, $id_mapeo_mapeos, $nombre_mapeos,  $temperatura_maxima_mapeos, $temperatura_minima_mapeos, $fecha_inicio_base, $hora_incio_base, $fecha_final_base, $hora_final_base, $intervalo_base, $promedio_mapeos);
 $contador_mapeos = 1;





 while($row = mysqli_stmt_fetch($query_11)){
 
$query_11_1 = mysqli_prepare($connect,"SELECT DISTINCT MAX(CAST(a.temperatura AS DECIMAL(6,2))) as maximo, a.time FROM freezer_datos_crudos as a, freezer_sensor as b 
WHERE b.id_asignado = ? AND a.id_freezer_sensor = b.id_freezer_sensor AND b.id_mapeo = ?
GROUP BY a.time");
mysqli_stmt_bind_param($query_11_1, 'ii', $id_asignado, $id_mapeo_mapeos);
mysqli_stmt_execute($query_11_1);
mysqli_stmt_store_result($query_11_1);
mysqli_stmt_bind_result($query_11_1, $x);
mysqli_stmt_fetch($query_11_1);
   
$c_hora=number_format((mysqli_stmt_num_rows($query_11_1)*$intervalo_base)/3600,2);
$fecha_incial = $fecha_inicio_base.' '.$hora_inicio_base;
$fecha_fin = $fecha_final_base.' '.$hora_final_base;
$c_dias = number_format($c_hora/24,2);   

$html_11 = <<<EOD
<h4>3.4.$contador_mapeos  Información general del $nombre_mapeos</h4>
<h5>Prueba inicio: $fecha_inicio_base $hora_incio_base</h5>
<h5>Prueba termino: $fecha_final_base $hora_final_base</h5>
<h5>Tiempo total: $c_hora HORA(S)</h5>
<h5>Cantidad de dias: $c_dias DIA(S)</h5>
<br>
EOD;
$pdf->writeHTML($html_11, true,false,false,false,'');
   
   $contador_mapeos++;
 } 



$html_12 = <<<EOD
<h3>3.4.$contador_mapeos Información general del Mapeo Termico</h3>
<h4>$nombre_item: modelo: $modelo_item ver resultados en informes:</h4>
EOD;
$pdf->writeHTML($html_12, true,false,false,false,'');


$query_12 = mysqli_prepare($connect,"SELECT a.nombre, a.n_increment, b.nombre FROM informe_freezer as a, freezer_mapeo as b WHERE a.id_asignado = ?
                                     AND a.id_mapeo = b.id_mapeo  AND a.tipo !=2 ORDER BY tipo ASC");
mysqli_stmt_bind_param($query_12, 'i', $id_asignado);
mysqli_stmt_execute($query_12);
mysqli_stmt_store_result($query_12);
mysqli_stmt_bind_result($query_12, $nombre_informes, $n_increment, $nombre_mapeoss);

while($row = mysqli_stmt_fetch($query_12)){
  
$html_13 = <<<EOD
<h4>$nombre_informes$n_increment ($nombre_mapeoss)</h4>
EOD;
$pdf->writeHTML($html_13, true,false,false,false,'');
}


//CONSULTA DE LA TABLA REGISTRO DE PARAMETROS

$consulta_tabla = mysqli_prepare($connect,"SELECT a.id_mapeo, a.nombre, a.temperatura_maxima, a.temperatura_minima, a.fecha_inicio, a.hora_inicio,
                                      a.fecha_final, a.hora_final, a.intervalo, a.comentario FROM
                                      freezer_mapeo as a, freezer_datos_crudos as b, freezer_sensor as c WHERE a.id_mapeo != 3 AND
                                      a.id_asignado = ? AND a.informe_base > 0 AND b.id_freezer_sensor = c.id_freezer_sensor 
                                      GROUP BY a.id_mapeo, a.nombre, a.temperatura_maxima, a.temperatura_minima, a.fecha_inicio, a.hora_inicio, a.fecha_final, a.hora_final, a.intervalo, a.comentario");
 mysqli_stmt_bind_param($consulta_tabla, 'i', $id_asignado);
 mysqli_stmt_execute($consulta_tabla);
 mysqli_stmt_store_result($consulta_tabla);
 mysqli_stmt_bind_result($consulta_tabla, $id_mapeo_r, $nombre_mapeos_r,  $temperatura_maxima_mapeos_r, $temperatura_minima_mapeos_r, $fecha_inicio_base_r, $hora_incio_base_r, $fecha_final_base_r, $hora_final_base_r, $intervalo_base_r, $comentario_mapeos_r);

while($row = mysqli_stmt_fetch($consulta_tabla)){

  //QUERYS QUE AYUDAN  A LOS DAATOS  
  	//SENSORES CON PROMEDIO MAS ALTO
  $query_apoyo_0 = mysqli_prepare($connect,"SELECT AVG(CAST(a.temperatura AS DECIMAL(6,2))) as promedio FROM freezer_datos_crudos as a, freezer_sensor as b, sensores as d 
																				WHERE a.id_freezer_sensor = b.id_freezer_sensor AND b.id_mapeo = ? AND b.id_asignado = ?");
	mysqli_stmt_bind_param($query_apoyo_0, 'ii', $id_mapeo_r ,$id_asignado);
	mysqli_stmt_execute($query_apoyo_0);
	mysqli_stmt_store_result($query_apoyo_0);
	mysqli_stmt_bind_result($query_apoyo_0, $d_1);
	mysqli_stmt_fetch($query_apoyo_0);
	$promedio_r = number_format($d_1,2);
  
;
  
	$query_apoyo = mysqli_prepare($connect,"SELECT AVG(CAST(a.temperatura AS DECIMAL(6,2))) as promedio, d.nombre FROM freezer_datos_crudos as a, freezer_sensor as b, sensores as d 
																				WHERE a.id_freezer_sensor = b.id_freezer_sensor AND b.id_mapeo = ? AND b.id_asignado = ? AND  d.id_sensor = b.id_sensor
																				GROUP BY d.nombre order by promedio ASC limit 1");
	mysqli_stmt_bind_param($query_apoyo, 'ii', $id_mapeo_r ,$id_asignado);
	mysqli_stmt_execute($query_apoyo);
	mysqli_stmt_store_result($query_apoyo);
	mysqli_stmt_bind_result($query_apoyo, $d_4,  $min_avg_sensor);
	mysqli_stmt_fetch($query_apoyo);

	$min_avg = number_format($d_4,2);
  
  
  $query_apoyo_2 = mysqli_prepare($connect,"SELECT AVG(CAST(a.temperatura AS DECIMAL(6,2))) as promedio, d.nombre FROM freezer_datos_crudos as a, freezer_sensor as b, sensores as d 
																				WHERE a.id_freezer_sensor = b.id_freezer_sensor AND b.id_mapeo = ? AND b.id_asignado = ? AND  d.id_sensor = b.id_sensor
																				GROUP BY d.nombre order by promedio DESC limit 1 ");
	mysqli_stmt_bind_param($query_apoyo_2, 'ii', $id_mapeo_r ,$id_asignado);
	mysqli_stmt_execute($query_apoyo_2);
	mysqli_stmt_store_result($query_apoyo_2);
	mysqli_stmt_bind_result($query_apoyo_2, $d_5,  $max_avg_sensor);
	mysqli_stmt_fetch($query_apoyo_2);

	$max_avg = number_format($d_5,2);
  
  $query_apoyo_3 = mysqli_prepare($connect,"SELECT MAX(CAST(a.temperatura AS DECIMAL(6,2))) as maximo, d.nombre FROM freezer_datos_crudos as a, freezer_sensor as b, sensores as d 
                                            WHERE a.id_freezer_sensor = b.id_freezer_sensor AND b.id_mapeo = ? AND b.id_asignado = ? AND d.id_sensor = b.id_sensor GROUP BY d.nombre 
                                            order by maximo DESC limit 1 ");
	mysqli_stmt_bind_param($query_apoyo_3, 'ii', $id_mapeo_r ,$id_asignado);
	mysqli_stmt_execute($query_apoyo_3);
	mysqli_stmt_store_result($query_apoyo_3);
	mysqli_stmt_bind_result($query_apoyo_3, $d_6,  $max_sensor);
	mysqli_stmt_fetch($query_apoyo_3);

	$max = number_format($d_6,2);
  
  
  $query_apoyo_4 = mysqli_prepare($connect,"SELECT MIN(CAST(a.temperatura AS DECIMAL(6,2))) as maximo, d.nombre FROM freezer_datos_crudos as a, freezer_sensor as b, sensores as d 
                                            WHERE a.id_freezer_sensor = b.id_freezer_sensor AND b.id_mapeo = ? AND b.id_asignado = ? AND d.id_sensor = b.id_sensor GROUP BY d.nombre 
                                            order by maximo DESC limit 1 ");
	mysqli_stmt_bind_param($query_apoyo_4, 'ii', $id_mapeo_r ,$id_asignado);
	mysqli_stmt_execute($query_apoyo_4);
	mysqli_stmt_store_result($query_apoyo_4);
	mysqli_stmt_bind_result($query_apoyo_4, $d_7,  $m_sensor);
	mysqli_stmt_fetch($query_apoyo_4);

	$min = number_format($d_7,2);
  
  
  
  $query_apoyo_5 = mysqli_prepare($connect,"SELECT STD(CAST(a.temperatura AS DECIMAL(6,2))) as desviacion, d.nombre FROM freezer_datos_crudos as a, freezer_sensor as b, 
                                            bandeja as c, sensores as d WHERE a.id_freezer_sensor = b.id_freezer_sensor AND b.id_mapeo = ? AND b.id_asignado = ?
                                            AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor GROUP BY d.nombre ORDER BY desviacion ASC LIMIT 1  ");
  mysqli_stmt_bind_param($query_apoyo_5, 'ii', $id_mapeo_r, $id_asignado);
  mysqli_stmt_execute($query_apoyo_5);
  mysqli_stmt_store_result($query_apoyo_5);
  mysqli_stmt_bind_result($query_apoyo_5, $d_3, $sensor_desv_min);
  mysqli_stmt_fetch($query_apoyo_5);

  $desviacion_min = number_format($d_3,2);
  
  
  $query_apoyo_6 = mysqli_prepare($connect,"SELECT STD(CAST(a.temperatura AS DECIMAL(6,2))) as desviacion, d.nombre FROM freezer_datos_crudos as a, freezer_sensor as b, 
                                            bandeja as c, sensores as d WHERE a.id_freezer_sensor = b.id_freezer_sensor AND b.id_mapeo = ? AND b.id_asignado = ?
                                            AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor GROUP BY d.nombre ORDER BY desviacion DESC LIMIT 1  ");
  mysqli_stmt_bind_param($query_apoyo_6, 'ii', $id_mapeo_r, $id_asignado);
  mysqli_stmt_execute($query_apoyo_6);
  mysqli_stmt_store_result($query_apoyo_6);
  mysqli_stmt_bind_result($query_apoyo_6, $d_25, $sensor_desv_max);
  mysqli_stmt_fetch($query_apoyo_6);

  $desviacion_max = number_format($d_25,2);

  
  
  
//////////////////calculos////////
$c_hora = number_format((mysqli_stmt_num_rows($query_11_1)*$intervalo_base_r)/3600,2); 


  
////////////  ///////////////////
$pdf->AddPage('A4');

$pdf->writeHTMLCell(180, 5, 15, '', 'Registro de Parámetros de trabajo', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(100, 5, 15, '', 'Parámetro', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(80, 5, 115, '', 'Ubicación', 1, 1, 0, true, 'C', true);



$pdf->writeHTMLCell(100, 15, 15, '', 'Tiempo de inicio del periodo (Según lectura de sensores)', 1, 0, 0, true, 'L', true);

$pdf->writeHTMLCell(80, 15, 115, '', 'Hora de inicio:'.$fecha_inicio_base_r.' '.$hora_incio_base_r.'<br> Hora de termino:'.$fecha_final_base_r.' '.$hora_final_base_r.'<br> Total: '.$c_hora, 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(100, 10, 15, '', 'Temperatura promedio en el '.$nombre_item.' durante el periodo estable', 1, 0, 0, true, 'L', true);

$pdf->writeHTMLCell(80, 10, 115, '', 'T° Promedio: '.$promedio_r, 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(100, 10, 15, '', 'Sensor con la temperatura promedio mas baja', 1, 0, 0, true, 'L', true);
  
$pdf->writeHTMLCell(80, 10, 115, '', 'Sensor N°: '.$min_avg_sensor.'<br> T° Promedio: '.$min_avg, 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(100, 10, 15, '', 'Sensor con la temperatura promedio mas alta', 1, 0, 0, true, 'L', true);

$pdf->writeHTMLCell(80, 10, 115, '', 'Sensor N°: '.$max_avg_sensor.'<br> T° Promedio: '.$max_avg, 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(100, 10, 15, '', 'Sensor con la temperatura minima en toda la prueba', 1, 0, 0, true, 'L', true);

$pdf->writeHTMLCell(80, 10, 115, '', 'Sensor N°: '.$m_sensor.'<br> T°: '.$min, 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(100, 10, 15, '', 'Sensor con la temperatura máxima en toda la prueba', 1, 0, 0, true, 'L', true);

$pdf->writeHTMLCell(80, 10, 115, '', 'Sensor N°: '.$max_sensor.'<br> T°: '.$max, 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(100, 10, 15, '', 'Sensor con menor desviación estándar', 1, 0, 0, true, 'L', true);

$pdf->writeHTMLCell(80, 10, 115, '', 'Sensor N°:'. $sensor_desv_min.'<br> D.E: '.$desviacion_min, 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(100, 10, 15, '', 'Sensor con mayor desviación estándar', 1, 0, 0, true, 'L', true);

$pdf->writeHTMLCell(80, 10, 115, '', 'Sensor N°: '.$sensor_desv_max.'<br> D.E: '.$desviacion_max, 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(180, 10, 15, '', 'Observaciones: <br>'.$comentario_mapeos_r, 1, 1, 0, true, 'L', true);
  
}//cierre del ciclo de tablas 


$ultmo = $contador_mapeos + 1;
$pdf->AddPage('A4');

$html_14 = <<<EOD
<h4> 3.4.$ultmo Fotografias del equipo</h4>
EOD;
$pdf->writeHTML($html_14, true,false,false,false,'');

$query_13 = mysqli_prepare($connect,"SELECT ubicacion FROM images_informe_freezer WHERE id_informe = ? AND tipo_imagen = 4");
mysqli_stmt_bind_param($query_13, 'i', $id_informe);
mysqli_stmt_execute($query_13);
mysqli_stmt_store_result($query_13);
mysqli_stmt_bind_result($query_13, $ubicacion_equipo);

while($row = mysqli_stmt_fetch($query_13)){

 $html_14 = <<<EOD
<style>
table 
{
  border-collapse: collapse;
  width: 100%;
  height: 500px;
  text-align: center;
  vertical-align: middle;
 
}

th 
{
  background-color: #3138AA;
  color: #FFFFFF;
  vertical-align: middle;
}

th, td 
{
  border: 1px solid #BBBBBB;
  padding: 3px;
  vertical-align: middle;
}

tr:nth-child(even) 
{
	background-color: #f2f2f2;
}


</style>


<table>
<tr><td><img src="../../$ubicacion_equipo" width="300" height="300px"></td></tr>
</table>
EOD;
$pdf->writeHTML($html_14, true,false,false,false,'');
  
}

$pdf->AddPage('A4');

  $query_14 = mysqli_prepare($connect,"SELECT id_servicio FROM item_asignado WHERE id_asignado = ?");
  mysqli_stmt_bind_param($query_14, 'i', $id_asignado);
  mysqli_stmt_execute($query_14);
  mysqli_stmt_store_result($query_14);
  mysqli_stmt_bind_result($query_14, $id_servicio);
  mysqli_stmt_fetch($query_14);

  $query_15 = mysqli_prepare($connect,"SELECT id_numot FROM servicio WHERE id_servicio = ?");
  mysqli_stmt_bind_param($query_15, 'i', $id_servicio);
  mysqli_stmt_execute($query_15);
  mysqli_stmt_store_result($query_15);
  mysqli_stmt_bind_result($query_15, $id_numot);
  mysqli_stmt_fetch($query_15);

  $query_16 = mysqli_prepare($connect,"SELECT a.nombre, a.apellido, a.cargo, c.nombre FROM persona as a, numot as b,
  empresa as c WHERE a.id_usuario = b.id_usuario_firma AND b.id_numot = ?  AND a.id_empresa = c.id_empresa");
  mysqli_stmt_bind_param($query_16, 'i',$id_numot);
  mysqli_stmt_execute($query_16);
  mysqli_stmt_store_result($query_16);
  mysqli_stmt_bind_result($query_16, $nombres, $apellidos, $cargo, $empresa);
  mysqli_stmt_fetch($query_16);


$html_15 = <<<EOD

<table><tr><td bgcolor="#DDDDDD" class="enunciado"><H4><strong>4.0 CONCLUSION DEL MAPEO TERMICO</strong></H4></td></tr></table>
<p>4.1 De acuerdo con los resultados obtenidos en las mediciones realizadas en el $nombre_item , $veredicto_01 con sus especificaciones
, obteniendose una temperatura promedio general de $promedio_mapeos_cast</p>
<p>4.2 $concepto</p>
 <br><br><br><br><br>
  <br><br><br><br><br>
  
  <h3 style="text-align:center;"><span>Ing $nombres $apellidos</span></h3>
  <h5 style="text-align:center;">$cargo</h5>
  <h5 style="text-align:center;">$empresa</h5>

EOD;
$pdf->writeHTML($html_15, true, false, false, false, '');





    $pdf->writeHTML($txt, true, false, false, false, '');

		$pdf->Output('Algo.pdf', 'I');

?>