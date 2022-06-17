<?php
require('../../../../recursos/encabezadopdf.php');
require('../../../../config.ini.php');
$id_informe = $_GET['informe'];


$informes_generales = mysqli_prepare($connect,"SELECT a.tipo_protocolo, a.nombre, b.id_mapeo,b.nombre, b.id_asignado,b.fecha_inicio,b.fecha_fin, c.id_servicio as servicio, e.numot, f.id_item, f.nombre, f.descripcion, f.id_tipo, g.nombre, 
g.direccion, c.solicitante, c.cargo_solicitante, f.clasificacion_item, g.logo
FROM informes_general a,mapeo_general b,item_asignado c, servicio d, numot e,item f,empresa g
WHERE id_informe = ?
AND a.id_mapeo = b.id_mapeo 
AND c.id_asignado = b.id_asignado 
AND c.id_servicio = d.id_servicio
AND d.id_numot = e.id_numot
AND c.id_item = f.id_item
AND f.id_empresa = g.id_empresa");

mysqli_stmt_bind_param($informes_generales, 'i', $id_informe);
mysqli_stmt_execute($informes_generales);
mysqli_stmt_store_result($informes_generales);
mysqli_stmt_bind_result($informes_generales, $tipo_protocolo, $nombre_informe_g,$id_mapeo_g,$nombre_mapeo_g,$id_asignado,$fecha_inicio_g,$fecha_fin_g,$c,$num_ot_g,$id_item_g, $nombre_item_g,$descripcion_item,$id_tipo_item_g,
$nombre_empresa_g, $direccion_empresa_g, $solicitante, $cargo_solicitante, $clasificacion_item, $logo_empresa);

mysqli_stmt_fetch($informes_generales);

$nombre_informe = $nombre_informe_g;
//$nombre_informe = substr($nombre_informe_g, 0, -3);
$numot = $num_ot_g;
$a = "INFORME DE ANÁLISIS DE RIESGO DE ".$nombre_item_g." ".$nombre_empresa_g;
$a_portada = "INFORME DE ANÁLISIS DE RIESGO <br> ".$nombre_item_g."<br>". $nombre_empresa_g;

if($logo_empresa == 'NO' || $logo_empresa == 'design/images/no_imagen.png' || $logo_empresa == ""){
   $logo_a = '../../../../design/images/no_imagen.png';
}else{
   $logo_a = '../../../cliente/'.$logo_empresa;
}

$pdf->AddPage();

  $html = <<<EOD

<style>
.justificado
{
  text-align: justify;
}

}
</style>
<br><br><br><br><br>
<br><br><br><br><br>
<table border="0">
    <tr>
        <td style="width:15%;"></td>
          <td align="center" border="0" style="width:70%; height:200px;">
          <br><br><br>
            <table border="1"  style="width:435px; height:200px;" >
                <tr>
                
                  <td style="height:300px;">
                  <br><br><br><br><br>
                  <img src="$logo_a" style="width:400px;">
                  <strong><h3>$a_portada</h3>
                  
                  </strong></td>
                 
                </tr>
            </table>
          </td>
        <td style="width:15%"></td>
    </tr>
</table>


EOD;
$pdf->writeHTML($html, true, false, false, false, '');

$pdf->AddPage('A4');

$html = <<<EOD

<table><tr><td colspan="3"><H3><strong>ÍNDICE</strong></H3><br></td></tr>
<tr><td width="5%">1.</td> <td width="85%">Objetivos ....................................................................................................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.</td> <td width="85%">Procedimiento ............................................................................................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.1</td> <td width="85%">Identificación del Riesgo ............................................................................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.2</td> <td width="85%">Probabilidad de ocurrencia del Riesgo ......................................................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.3</td> <td width="85%">Clasificación del Impacto de un Riesgo preidentificado .............................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.4</td> <td width="85%">Clasificación del Riesgo .............................................................................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.5</td> <td width="85%">Probabilidad de detección del Riesgo ........................................................................................................
</td> <td width="10%">4</td></tr>

<tr><td width="5%">2.6</td> <td width="85%">Prioridad y medidas para mitigar los riesgos ..............................................................................................
</td> <td width="10%">4</td></tr>

<tr><td width="5%">2.7</td> <td width="85%">Determinación de puntos críticos de calificación - control ..........................................................................
</td> <td width="10%">4</td></tr>

<tr><td width="5%">2.8</td> <td width="85%">Identificación de Riesgo GMP ....................................................................................................................
</td> <td width="10%">4</td></tr>

<tr><td width="5%">3.</td> <td width="85%">Análisis de Riesgo ......................................................................................................................................
</td> <td width="10%">5</td></tr>

</table><br><br>

EOD;

$pdf->writeHTML($html, true, false, false, false, '');
/*
//array indice numeros
$array_indice = array(
  '1','2','2.1','2.2','2.3','2.4','2.5','2.6','2.7','2.8','3'
);
//array indice contenido
$array_contenido = array(
  'Objetivos ..............................................................................................................................................................',
  'Procedimiento ......................................................................................................................................................',
  'Identificación del Riesgo....................................................................................................................................',
  'Probabilidad de ocurrencia del Riesgo .............................................................................................................',
  'Clasificación del Impacto de un Riesgo preidentificado .................................................................................',
  'Clasificación del Riesgo .....................................................................................................................................',
  'Probabilidad de detección del Riesgo ..............................................................................................................',
  
  
  'Prioridad y medidas para mitigar los riesgos ...................................................................................................',
  'Determinación de puntos críticos de calificación - control .............................................................................',
  'Identificación de Riesgo '.$tipo_protocolo.'...........................................................................................................................',
  'Análisis de Riesgo ...............................................................................................................................................',
  'Tabla de Riesgos asociados ..............................................................................................................................'
  
);

//array indice pagina
$array_pagina = array(
  '3','3','3','3','3','3','4','4','4','4','5','6'
);


$pdf->writeHTMLCell(20, 2, 25, '','<strong><h3>ÍNDICE</h3></strong>', 0, 1, 0, true, 'J', true);

for ($i=0; $i < 12 ; $i++) { 
  
$pdf->writeHTMLCell(8, 2, 25, '',$array_indice[$i], 0, 0, 0, true, 'J', true);
$pdf->writeHTMLCell(142, 2, 33, '',$array_contenido[$i], 0, 0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 2, 175, '',$array_pagina[$i], 0, 1, 0, true, 'J', true);
}
*/

$pdf->AddPage();

$html = <<<EOD

<style>
.justificado
{
  text-align: justify;
 
}
</style>
<table border="0">
    <tr>
      <td style="width: 3%;"></td>
      <td style="width:97%;">
      
      <H3><strong>1 Objetivos:</strong></H3>
<label class="justificado">El objetivo del Análisis de Riesgos es evaluar aquellas situaciones con probabilidad de peligro y desarrollar medidas que aseguren su control.
El Análisis de Riesgos se compone de dos documentos:<br>
1. Formulario de Análisis de riesgos Potenciales.<br>
2. Formulario de Evaluación de riesgos.</label>

<H3><strong>2 Procedimiento:</strong></H3>
<label class="justificado">El Análisis de Riesgos tiene en cuenta en particular para los sistemas en calificación:<br><br>
• Cumplimiento de instalación y funcionamiento.<br><br>
• Atributos del desempeño de los sistemas con implicancia en la calidad del producto (se evita la contaminación cruzada, falsificación de productos y fallas de almacenamiento).</label><br>

<H3><strong>2.1 Identificación del Riesgo:</strong></H3>

<label class="justificado">Se debe identificar el evento o situación específica que puedan causar un riesgo, adjudicándole un numero de referencia, tomando en cuenta el efecto y las consecuencias.</label><br>
<H3><strong>2.2 Probabilidad de ocurrencia del Riesgo:</strong></H3>

<label class="justificado">Se determina la probabilidad de que un riesgo ocurra, considerando los distintos aspectos que hacen a la instalación, operación y desempeño en la operación farmacéutica de los sistemas bajo estudio, 
así, el riesgo podrá ser:<br>
• Alto (A).<br>
• Medio (M).<br>
• Bajo (B).</label><br> 

<H3><strong>2.3 Clasificación del impacto de un Riesgo Preidentificado:</strong></H3>
<label class="justificado">Los efectos de los riesgos se evaluan a corto, mediano y largo plazo y clasificando el impacto de acuerdo con la siguiente escala:</label><br><br>
<table>
<tr><td width="15%">• Bajo (B): </td><td width="85%">Se espera un impacto negativo menor. No se espera un daño a largo plazo.</td></tr>
<tr><td width="15%">• Medio (M): </td><td width="85%">Se espera tener un impacto moderado.</td></tr>
<tr><td width="15%">• Alto (A): </td><td width="85%">Se espera tener un impacto negativo significante. Se espera que el impacto pueda tener efectos significativos a largo plazo y un efecto de dimensión catastrófica a 
corto plazo.</td></tr>
</table><br>



<H3><strong>2.4 Clasificación del Riesgo (Clase de Riesgo):</strong></H3>
<label class="justificado">Una vez asignado el nivel de probabilidad y de impacto, el riesgo debe ser ubicado y clasificado utilizando la siguiente Matriz de Clasificación de Riesgo.</label>
      
      
      
      </td>
    </tr>

</table>


EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->writeHTMLCell(25, 15, 60, '','<br><br><strong>IMPACTO</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(10, 5, 85, '','<strong>A</strong>', 1, 0, 0, true, 'C', true);

$pdf->SetFillColor(255, 255, 0);
$pdf->writeHTMLCell(10, 5, 95, '','2', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(255, 140, 0);
$pdf->writeHTMLCell(10, 5, 105, '','1', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(255, 140, 0);
$pdf->writeHTMLCell(10, 5, 115, '','1', 1, 1, 1, true, 'C', true);

$pdf->writeHTMLCell(10, 5, 85, '','<strong>M</strong>', 1, 0, 0, true, 'C', true);

$pdf->SetFillColor(154, 205, 50);
$pdf->writeHTMLCell(10, 5, 95, '','3', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(255, 255, 0);
$pdf->writeHTMLCell(10, 5, 105, '','2', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(255, 140, 0);
$pdf->writeHTMLCell(10, 5, 115, '','1', 1, 1, 1, true, 'C', true);

$pdf->writeHTMLCell(10, 5, 85, '','<strong>B</strong>', 1, 0, 0, true, 'C', true);

$pdf->SetFillColor(154, 205, 50);
$pdf->writeHTMLCell(10, 5, 95, '','3', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(154, 205, 50);
$pdf->writeHTMLCell(10, 5, 105, '','3', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(255, 255, 0);
$pdf->writeHTMLCell(10, 5, 115, '','2', 1, 1, 1, true, 'C', true);

$pdf->writeHTMLCell(25, 15, 60, '','', 0, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(10, 5, 95, '','<strong>B</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(10, 5, 105, '','<strong>M</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(10, 5, 115, '','<strong>A</strong>', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(30, 10, 95, '','<strong>PROBABILIDAD DE OCURRENCIA</strong>', 1, 1, 0, true, 'C', true);

$pdf->AddPage();

$pdf->SetLineStyle(array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(200, 200, 200)));

$html = <<<EOD

<style>
.justificado
{
  text-align: justify;
}
</style>
<table border="0">
    <tr>
      <td style="width: 3%;"></td>
      <td style="width:97%;">
Donde:<br>
Clase 1 significa Riesgo Alto.<br>
Clase 2 significa Riesgo Moderado.<br>
Clase 3 significa Riesgo Bajo.<br>

<H3><strong>2.5 Probabilidad de detección del Riesgo:</strong></H3>


<label class="justificado">Una vez asignado el nivel de probabilidad y de impacto, el riesgo debe ser ubicado y clasificado utilizando la siguiente Matriz de Clasificación de Riesgo.
Se debe identificar la velocidad de respuesta con la que un evento puede ser reconocido o detectado; en otras palabras, se debe identificar el tiempo transcurrido entre un incidente y su detección. 
El detalle de detección se evalua segun:<br>
• Baja (B) La detección de una condición de falla es imposible.<br>
• Medio (M) La detección de una condición de falla se percibe con cierta probabilidad.<br>
• Alta (A) La detección de una condición de falla tiene alta probabilidad.</label><br>

<H3><strong>2.6 Prioridad y medidas para mitigar los riesgos:</strong></H3>
<label class="justificado">
Combinando los datos obtenidos en los dos cuadros anteriores, las condiciones asociadas con cada riesgo deben ser priorizadas en tres categorías, Alta (A), Media (M) y Baja (B) Prioridad.</label>


      
      
      </td>
    </tr>

</table>


<table><tr><td width="100%"></td></tr></table>

EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->writeHTMLCell(30, 15, 60, '','<br><br><strong>CLASIFICACIÓN DE RIESGO</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(12, 5, 90, '','<strong>1</strong>', 1, 0, 0, true, 'C', true);

$pdf->SetFillColor(255, 140, 0);
$pdf->writeHTMLCell(12, 5, 102, '','A', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(255, 140, 0);
$pdf->writeHTMLCell(12, 5, 114, '','A', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(255, 255, 0);
$pdf->writeHTMLCell(12, 5, 126, '','M', 1, 1, 1, true, 'C', true);

$pdf->writeHTMLCell(12, 5, 90, '','<strong>2</strong>', 1, 0, 0, true, 'C', true);

$pdf->SetFillColor(255, 140, 0);
$pdf->writeHTMLCell(12, 5, 102, '','A', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(255, 255, 0);
$pdf->writeHTMLCell(12, 5, 114, '','M', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(154, 205, 50);
$pdf->writeHTMLCell(12, 5, 126, '','B', 1, 1, 1, true, 'C', true);

$pdf->writeHTMLCell(12, 5, 90, '','<strong>3</strong>', 1, 0, 0, true, 'C', true);

$pdf->SetFillColor(255, 255, 0);
$pdf->writeHTMLCell(12, 5, 102, '','M', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(154, 205, 50);
$pdf->writeHTMLCell(12, 5, 114, '','B', 1, 0, 1, true, 'C', true);

$pdf->SetFillColor(154, 205, 50);
$pdf->writeHTMLCell(12, 5, 126, '','B', 1, 1, 1, true, 'C', true);

$pdf->writeHTMLCell(30, 15, 60, '','', 0, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(12, 5, 102, '','<strong>B</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(12, 5, 114, '','<strong>M</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(12, 5, 126, '','<strong>A</strong>', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(36, 10, 102, '','<strong>PROBABILIDAD DE DETECTABILIDAD</strong>', 1, 1, 0, true, 'C', true);

$html = <<<EOD

<style>
.justificado
{
  text-align: justify;
}
</style>

<table border="0">
    <tr>
      <td style="width: 3%;"></td>
      <td style="width:97%;">
        
<H3><strong>2.7 Determinación de puntos críticos de calificación - control:</strong></H3>

<div class="justificado">Una vez realizada la priorización, se deben definir y documentar las medidas necesarias para mitigar los eventos adversos que representan mayor riesgo 
(puntos críticos de control), identificados como prioridad A y M (como pruebas específicas, control del sistema de monitoreo, cambio de almacenamiento, etc.), estas medidas/acciones documentadas en el análisis de riesgo, 
serán consideradas como la base para el desarrollo de la calificación del sistema. Los eventos que resulten con prioridad B no serán incluidos en el desarrollo de la calificación del sistema, y en caso 
de contar con procedimiento que contribuyen al resultado hallado, los mismos se describen.</div>

<H3><strong>2.8 Identificación de Riesgo $tipo_protocolo:</strong></H3>

<div class="justificado">Esta etapa es la de determinación que una función o subfunción del sistema representa un riesgo para la operación farmacéutica.
Sigue a continuación una visión general de los principales puntos que deben ser considerados durante una evaluación:<br>
• Accesos a la $clasificacion_item de almacenamiento.<br>
• Instalación física y construcción de la $clasificacion_item.<br>
• Ubicación de equipos productivos cerca de áreas de almacenamiento.<br>
• Sistema de climatización, desempeño y ubicación.<br>
• Cargas Internas: iluminación, equipos y personal.</div>
        


      </td>
    </tr>

</table>
<br>


EOD;

$pdf->writeHTML($html, true, false, false, false, '');
$pdf->AddPage('P', 'A4');
$html = <<<EOD

<style>
.justificado
{
  text-align: justify;
}
</style>

<table border="0">
    <tr>
      <td style="width: 3%;"></td>
      <td style="width:97%;">
        
  <H3><strong>3. Análisis de Riesgo:</strong></H3>
        A partir del presente momento se procede a realizar el análisis de riesgo correspondiente al presente mapeo térmico.<br>
        Nota: segun lo identificado en el levamiento de la $clasificacion_item no aplican los siguientes riesgos:<br>
        1- Ventanas: la $clasificacion_item no cuenta con ventanas en las zonas de almacenamiento.<br>
        2- Equipos productivos/ climatización asistida cerca de área de almacenamiento. Ejemplo: calderas, cámaras frías. La $clasificacion_item no cuenta con equipos productivos instalados al momento de generar el análisis de riesgo.<br>
        3- Sistema de Climatización: la $clasificacion_item no cuenta con HVAC.<br>
        4- Personal y maquinaria: la $clasificacion_item no se encuentra operativa al momento de generar el presente análisis de riesgo.<br>
      </td>
    </tr>

</table>

EOD;
$pdf->writeHTML($html, true, false, false, false, '');

$pdf->AddPage('P', 'A4');


// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

$pdf->SetFillColor(255, 255, 255);

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
//TITULOS

$txt01='No. Referencia del Riesgo';
$txt02='Etapa/ subetapa bajo aná lisis';
$txt03='Relevancia';
$txt04='Descripción del Riesgo Identificado';
$txt05='Probabilidad
(A,M,B)';
$txt06='Impacto
(A,M,B)';
$txt07='Clase';
$txt08='Probabilidad de detencción
(A,M,B)';
$txt09='Prioridad
(A,M,B)';
$txt10='Medidas / Acciones a tomar';


$pdf->MultiCell(12, 26, $txt01, 1, 'C', 0, 0, 17, '', true,1,false,true,25,'M');
$pdf->MultiCell(33, 26, $txt02, 1, 'C', 0, 0, 29, '', true,1,false,true,25,'M');
$pdf->MultiCell(12, 26, $txt03, 1, 'C', 0, 0, 62, '', true,1,false,true,25,'M');
$pdf->MultiCell(33, 26, $txt04, 1, 'C', 0, 0, 74, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 26, $txt05, 1, 'C', 0, 0, 107, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 26, $txt06, 1, 'C', 0, 0, 120, '', true,1,false,true,25,'M');
$pdf->MultiCell(12, 26, $txt07, 1, 'C', 0, 0, 133, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 26, $txt08, 1, 'C', 0, 0, 145, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 26, $txt09, 1, 'C', 0, 0, 158, '', true,1,false,true,25,'M');
$pdf->MultiCell(25, 26, $txt10, 1, 'C', 0, 1, 171, '', true,1,false,true,25,'M');

$trae_riesgos=mysqli_prepare($connect,"SELECT  num_riesgo, etapa, relevancia, descripcion, probabilidad, impacto, clase, deteccion, prioridad, medidas
FROM analisis_riesgos WHERE id_informe = ? ORDER BY num_riesgo ASC");
mysqli_stmt_bind_param($trae_riesgos, 'i', $id_informe);
mysqli_stmt_execute($trae_riesgos);
mysqli_stmt_store_result($trae_riesgos);
mysqli_stmt_bind_result($trae_riesgos, $num_riesgo, $etapa, $relevancia, $descripcion, $probabilidad, $impacto, $clase, $deteccion, $prioridad, $medidas);
$i=1;
$altos=array('',40,55,40,40,35,40,60,55,60,50);
while($x=mysqli_stmt_fetch($trae_riesgos))
{

if($i==5||$i==9)
{
$pdf->AddPage('P', 'A4');
$pdf->MultiCell(12, 25, $txt01, 1, 'C', 0, 0, 17, '', true,1,false,true,25,'M');
$pdf->MultiCell(33, 25, $txt02, 1, 'C', 0, 0, 29, '', true,1,false,true,25,'M');
$pdf->MultiCell(12, 25, $txt03, 1, 'C', 0, 0, 62, '', true,1,false,true,25,'M');
$pdf->MultiCell(33, 25, $txt04, 1, 'C', 0, 0, 74, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt05, 1, 'C', 0, 0, 107, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt06, 1, 'C', 0, 0, 120, '', true,1,false,true,25,'M');
$pdf->MultiCell(12, 25, $txt07, 1, 'C', 0, 0, 133, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt08, 1, 'C', 0, 0, 145, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt09, 1, 'C', 0, 0, 158, '', true,1,false,true,25,'M');
$pdf->MultiCell(25, 25, $txt10, 1, 'C', 0, 1, 171, '', true,1,false,true,25,'M');
}
$pdf->MultiCell(12, $altos[$i], $num_riesgo + 1 , 1, 'C', 0, 0, 17, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(33, $altos[$i], $etapa, 1, 'C', 0, 0, 29, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(12, $altos[$i], $relevancia, 1, 'C', 0, 0, 62, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(33, $altos[$i], $descripcion, 1, 'C', 0, 0, 74, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(13, $altos[$i], $probabilidad, 1, 'C', 0, 0, 107, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(13, $altos[$i], $impacto, 1, 'C', 0, 0, 120, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(12, $altos[$i], $clase, 1, 'C', 0, 0, 133, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(13, $altos[$i], $deteccion, 1, 'C', 0, 0, 145, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(13, $altos[$i], $prioridad, 1, 'C', 0, 0, 158, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(25, $altos[$i], $medidas, 1, 'L', 0, 1, 171, '', true,1,false,true,$altos[$i],'M',true);

$i++;
}

$pdf->Output($nombre_informe.'.pdf', 'I');
mysqli_close($connect);
?>