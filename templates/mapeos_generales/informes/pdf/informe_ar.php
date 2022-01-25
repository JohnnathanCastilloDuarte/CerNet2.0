<?php
require('../../../../recursos/encabezadopdf.php');
require('../../../../config.ini.php');
$id_informe = $_GET['informe'];


$informes_generales = mysqli_prepare($connect,"SELECT a.nombre, b.id_mapeo,b.nombre, b.id_asignado,b.fecha_inicio,b.fecha_fin, c.id_servicio as servicio, e.numot, f.id_item, f.nombre, f.descripcion, f.id_tipo, g.nombre, 
g.direccion, a.solicitante
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
mysqli_stmt_bind_result($informes_generales,$nombre_informe_g,$id_mapeo_g,$nombre_mapeo_g,$id_asignado,$fecha_inicio_g,$fecha_fin_g,$c,$num_ot_g,$id_item_g, $nombre_item_g,$descripcion_item,$id_tipo_item_g,
$nombre_empresa_g, $direccion_empresa_g, $solicitante);

mysqli_stmt_fetch($informes_generales);

$nombre_informe = $nombre_informe_g;
$numot = $num_ot_g;
$a = "ANALISIS DE RIESGO";
/*

//CONSULTAS PARA PUNTO 1
$obten_datos_empresa=mysqli_query($connect,"SELECT A.id_empresa, B.nombre_empresa, B.nombre_contacto, B.cargo_contacto, B.direccion, B.ciudad,
                  B.url_logo, B.pais 
								  FROM ordenes_de_trabajo as A, empresas as B 
								  WHERE num_ot='$num_ot' AND A.id_empresa=B.id_empresa");
$a=mysqli_fetch_array($obten_datos_empresa);
$id_empresa=$a['id_empresa'];
$empresa=$a['nombre_empresa'];
$contacto=$a['nombre_contacto'];
$cargo=$a['cargo_contacto'];
$direccion=$a['direccion'];
$ciudad=$a['ciudad'];
$pais=$a['pais'];
$url_logo = "../".$a['url_logo'];

$obten_codigo_informe=mysqli_query($connect,"SELECT  no_reporte, hora_inicio_sensado, hora_fin_sensado, fecha_creacion 
								   FROM reportes WHERE num_ot='$num_ot' 
								   AND id_empresa='$id_empresa' AND equipo_bodega='$no_equipo' AND no_reporte like '%-AR%' AND id_servicio='$servicio'");
$b=mysqli_fetch_array($obten_codigo_informe);
$codigo_informe=$b['no_reporte'];
$creacion=$b['fecha_creacion'];
$emision=substr($creacion,8,2)."-".substr($creacion,5,2)."-".substr($creacion,0,4);
$meses=array("0","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
if(substr($creacion,5,2)>=10){$el_mes=substr($creacion,5,2);}else{$el_mes=substr($creacion,6,1);}
$emision_traducida=substr($creacion,8,2)." de ".$meses[$el_mes]." del ".substr($creacion,0,4);
$start=$b['hora_inicio_sensado'];
$end=$b['hora_fin_sensado'];
$start_corto=substr($start,8,2)."-".substr($start,5,2)."-".substr($start,0,4);
$end_corto=substr($end,8,2)."-".substr($end,5,2)."-".substr($end,0,4);

//CONSULTAS PARA PUNTO 2
$obten_datos_equipo=mysqli_query($connect,"SELECT A.id_equipo_bodega, A.total_horas_sensado, A.intervalo_sensado, B.id_equipo_bodega, B.no_equipo_bodega, 
B.tipo_equipo, B.ubicacion_equipo, B.marca, B.modelo, B.serie_num_interno, B.valor_seteado, B.limite_superior, B.limite_inferior, B.valor_set_hr, 
B.limite_sup_hr, B.limite_inf_hr, B.descrip_producto, A.no_acta
FROM equipos_asignados as A, equipos_bodegas as B 
WHERE A.num_ot='$num_ot' AND A.id_equipo_bodega=B.id_equipo_bodega AND A.id_equipo_bodega='$no_equipo' AND A.id_servicio='$servicio'");
$c=mysqli_fetch_array($obten_datos_equipo);
$numero_equipo=$c['no_equipo_bodega'];
$tipo_equipo=$c['tipo_equipo'];
$ubicacion_equipo=$c['ubicacion_equipo'];
$marca=$c['marca'];
$modelo=$c['modelo'];
$serie=$c['serie_num_interno'];
$set_temp=number_format($c['valor_seteado'],2);
$max_temp=$c['limite_superior'];
$max_temp_num=number_format($c['limite_superior'],2);
$min_temp=$c['limite_inferior'];
$min_temp_num=number_format($c['limite_inferior'],2);
$set_hr=$c['valor_set_hr'];
$max_hr=$c['limite_sup_hr'];
$min_hr=$c['limite_inf_hr'];
$descripcion=$c['descrip_producto'];
$horas=$c['total_horas_sensado'];
$dias=$horas/24;
$intervalo=$c['intervalo_sensado'];
$acta=$c['no_acta'];
$tolerancia_max=$max_temp-2;
$tolerancia_min=$min_temp+2;

//CONSULTAS PARA PUNTO 4

$secciona=explode(";",$descripcion);
$cuenta_materiales=count($secciona);

switch($cuenta_materiales)
{
	CASE 1:
	$descrip_material=$secciona[0];
	break;
	
	CASE 2:
	$descrip_material=$secciona[0]." y ".$secciona[1];
	break;
	
    CASE 3:
	$descrip_material=$secciona[0].", ".$secciona[1]." y ".$secciona[2];
	break;

    CASE 4:
	$descrip_material=$secciona[0].", ".$secciona[1].", ".$secciona[2]." y ".$secciona[3];
	break;

    CASE 5:
	$descrip_material=$secciona[0].", ".$secciona[1].", ".$secciona[2].", ".$secciona[3]." y ".$secciona[4];
	break;

    CASE 6:
	$descrip_material=$secciona[0].", ".$secciona[1].", ".$secciona[2].", ".$secciona[3].", ".$secciona[4]." y ".$secciona[5];
	break;

    CASE 7:
	$descrip_material=$secciona[0].", ".$secciona[1].", ".$secciona[2].", ".$secciona[3].", ".$secciona[4].", ".$secciona[5]." y ".$secciona[6];
	break;

    CASE 8:
	$descrip_material=$secciona[0].", ".$secciona[1].", ".$secciona[2].", ".$secciona[3].", ".$secciona[4].", ".$secciona[5].", ".$secciona[6]." y ".$secciona[7];
	break;
}

$llama_documentos1=mysqli_query($connect,"SELECT no_reporte FROM reportes WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND 
								no_reporte LIKE '%-TEM-%' AND id_servicio='$servicio' ORDER BY no_reporte ASC limit 1");
$process1=mysqli_fetch_array($llama_documentos1);
$primer_temp=$process1['no_reporte'];

$llama_documentos2=mysqli_query($connect,"SELECT no_reporte FROM reportes WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND 
								no_reporte LIKE '%-TEM-%' AND id_servicio='$servicio' ORDER BY no_reporte DESC limit 1");
$process2=mysqli_fetch_array($llama_documentos2);
$ultima_temp=$process2['no_reporte'];

$conclusiones=mysqli_query($connect,"SELECT observacion, conclusion FROM reportes 
WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND no_reporte like '%A1-PS%' AND id_servicio='$servicio'");	
$z=mysqli_fetch_array($conclusiones);
$observacion=$z['observacion'];
$conclusion=$z['conclusion'];

//CABECERAS PERSONALIZADAS
class MYPDF extends TCPDF 
{
    //Page header
    public function Header() 
	{
		global $tipo_equipo, $numero_equipo, $empresa, $codigo_informe, $num_ot;
		// Set border style
		$this->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(120, 120, 120)));
        // Logo
		//$this->writeHTMLCell(35, 22, 17, 11, '<img src="../images/cercal2.jpg" width="150">', 0, 0, 0, true, 'C', true);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        // Title
		//$this->writeHTMLCell(185, 20, 15, '', '', 0, 1, 0, true, 'C', true);	
		//$this->writeHTMLCell(40, 20, 15, '', '', 0, 1, 0, true, 'C', true);		
    $this->MultiCell(120, 12, 'INFORME DE ANÁLISIS DE RIESGO MAPEO TÉRMICO '.$numero_equipo.' - '.$empresa.$txt2, 1, 'C', 0, 0, 15, 30, true, 0, false, true, 12, 'M');
		$this->writeHTMLCell(60, 8, 135, 30, 'Informe: '.$codigo_informe.' <br>'.$num_ot.' // REVISION: 0.0.0', 1, 0, 0, true, 'R', true);
		$this->writeHTMLCell(60, 4, 135, 38, '<table><tr><td width="120%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages().'</td></tr></table>', 1, 1, 0, true, 'C', true);		
    }

    // Page footer
  public function Footer() 
	{
	global $pais_emp;

	}
}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Cercal Group');
$pdf->SetTitle($codigo_informe);
$pdf->SetSubject('Informe');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
//$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 45, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(35);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
$imagen = "<img src='$url_logo'>";

// set font
$pdf->SetFont('freesans', 'R', 8.3);


// add a page
$pdf->AddPage();
$html1 = <<<EOD
<br><br><br><br><br><br><br><br><br><br><br>
<table width="100%"><tr>
  <td  width="21%">
  
  </td>
  <td  width="63%">
  <table border="1" width="100%" style="text-align:center;">
    <tr>
      <td><strong><h1>INFORME DE ANÁLISIS DE RIESGO</strong></h1>
          <h2>MAPEO TÉRMICO DE $numero_equipo  $empresa</h2><br>
          <img src="$url_logo" width="300px">
      </td>
    </tr>
  </table>
  </td>
  
</tr></table>
EOD;
$pdf->writeHTML($html1, true, false, false, false, '');
/*

$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'double', 'color' => array(0, 0, 0)));
$pdf->writeHTMLCell(110, 60, 55, 80, '<strong><h1>INFORME DE ANÁLISIS DE RIESGO</strong></h1>
<h2>MAPEO TÉRMICO de '.$numero_equipo .' - '.$empresa.'</h2><br>'.$imagen, 1, 1, 0, true, 'C', true);
*/
$pdf->AddPage();

$html = <<<EOD

<table><tr><td colspan="3"><H3><strong>ÍNDICE</strong></H3><br></td></tr>
<tr><td width="5%">1.</td> <td width="85%">Objetivos ...............................................................................................................................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.</td> <td width="85%">Procedimiento ......................................................................................................................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.1</td> <td width="85%">Identificación del Riesgo .....................................................................................................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.2</td> <td width="85%">Probabilidad de ocurrencia del Riesgo ............................................................................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.3</td> <td width="85%">Clasificación del Impacto de un Riesgo preidentificado .................................................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.4</td> <td width="85%">Clasificación del Riesgo .....................................................................................................................................................
</td> <td width="10%">3</td></tr>

<tr><td width="5%">2.5</td> <td width="85%">Probabilidad de detección del Riesgo ..............................................................................................................................
</td> <td width="10%">4</td></tr>

<tr><td width="5%">2.6</td> <td width="85%">Prioridad y medidas para mitigar los riesgos ..................................................................................................................
</td> <td width="10%">4</td></tr>

<tr><td width="5%">2.7</td> <td width="85%">Determinación de puntos críticos de calificación - control .............................................................................................
</td> <td width="10%">4</td></tr>

<tr><td width="5%">2.8</td> <td width="85%">Identificación de Riesgo GMP ............................................................................................................................................
</td> <td width="10%">4</td></tr>

<tr><td width="5%">3.</td> <td width="85%">Análisis de Riesgo ...............................................................................................................................................................
</td> <td width="10%">4</td></tr>

</table><br><br>

EOD;

$pdf->writeHTML($html, true, false, false, false, '');

$pdf->AddPage();

$html = <<<EOD

<style>
.justificado
{
  text-align: justify;
}
</style>

<H3><strong>1 Objetivos:</strong></H3>

<label class="justificado">El objetivo del Análisis de Riesgos es evaluar aquellas situaciones con probabilidad de peligro y desarrollar medidas que aseguren su control.
El Análisis de Riesgos se compone de dos documentos:<br>
1. Formulario de Análisis de riesgos Potenciales.<br>
2. Formulario de Evaluación de riesgos.</label><br>

<H3><strong>2 Procedimiento:</strong></H3>

<label class="justificado">El Análisis de Riesgos tiene en cuenta en particular para los sistemas en calificación:<br><br>
• Cumplimiento de instalación y funcionamiento.<br><br>
• Atributos del desempeño de los sistemas con implicancia en la calidad del producto (se evita la contaminación cruzada, falsificación de productos y fallas de almacenamiento).</label><br><br>

<H3><strong>2.1 Identificación del Riesgo:</strong></H3>

<label class="justificado">Se debe identificar el evento o situación específica que puedan causar un riesgo, adjudicándole un número de referencia, tomando en cuenta el efecto y las consecuencias.</label><br><br>

<H3><strong>2.2 Probabilidad de ocurrencia del Riesgo:</strong></H3>

<label class="justificado">Se determina la probabilidad de que un riesgo ocurra, considerando los distintos aspectos que hacen a la instalación, operación y desempeño en la operación farmacéutica de los sistemas bajo estudio, 
así, el riesgo podrá ser:<br>
• Alto (A).<br>
• Medio (M).<br>
• Bajo (B).</label><br> 

<H3><strong>2.3 Clasificación del impacto de un Riesgo Preidentificado:</strong></H3>

<label class="justificado">Los efectos de los riesgos se evalúan a corto, mediano y largo plazo y clasificando el impacto de acuerdo con la siguiente escala:</label><br><br>
<table>
<tr><td width="15%">• Bajo (B): </td><td width="85%">Se espera un impacto negativo menor. No se espera un daño a largo plazo.</td></tr>
<tr><td width="15%">• Medio (M): </td><td width="85%">Se espera tener un impacto moderado.</td></tr>
<tr><td width="15%">• Alto (A): </td><td width="85%">Se espera tener un impacto negativo significante. Se espera que el impacto pueda tener efectos significativos a largo plazo y un efecto de dimensión catastrófica a 
corto plazo.</td></tr>
</table><br>

<H3><strong>2.4 Clasificación del Riesgo (Clase de Riesgo):</strong></H3>

<label class="justificado">Una vez asignado el nivel de probabilidad y de impacto, el riesgo debe ser ubicado y clasificado utilizando la siguiente Matriz de Clasificación de Riesgo.

<table><tr><td width="100%"></td></tr></table>

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
Donde:<br>
Clase 1 significa Riesgo Alto.<br>
Clase 2 significa Riesgo Moderado.<br>
Clase 3 significa Riesgo Bajo.<br>

<H3><strong>2.5 Probabilidad de detección del Riesgo:</strong></H3>


<label class="justificado">Una vez asignado el nivel de probabilidad y de impacto, el riesgo debe ser ubicado y clasificado utilizando la siguiente Matriz de Clasificación de Riesgo.
Se debe identificar la velocidad de respuesta con la que un evento puede ser reconocido o detectado; en otras palabras, se debe identificar el tiempo transcurrido entre un incidente y su detección. 
El detalle de detección se evalúa según:<br>
• Baja (B) La detección de una condición de falla es imposible.<br>
• Medio (M) La detección de una condición de falla se percibe con cierta probabilidad.<br>
• Alta (A) La detección de una condición de falla tiene alta probabilidad.</label><br>

<H3><strong>2.6 Prioridad y medidas para mitigar los riesgos:</strong></H3>
<label class="justificado">
Combinando los datos obtenidos en los dos cuadros anteriores, las condiciones asociadas con cada riesgo deben ser priorizadas en tres categorías, Alta (A), Media (M) y Baja (B) Prioridad.</label>

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
<br>
<H3><strong>2.7 Determinación de puntos críticos de calificación - control:</strong></H3>

<div class="justificado">Una vez realizada la priorización, se deben definir y documentar las medidas necesarias para mitigar los eventos adversos que representan mayor riesgo 
(puntos críticos de control), identificados como prioridad A y M (como pruebas específicas, control del sistema de monitoreo, cambio de almacenamiento, etc.), estas medidas/acciones documentadas en el análisis de riesgo, 
serán consideradas como la base para el desarrollo de la calificación del sistema. Los eventos que resulten con prioridad B no serán incluidos en el desarrollo de la calificación del sistema, y en caso 
de contar con procedimiento que contribuyen al resultado hallado, los mismos se describen.</div>

<H3><strong>2.8 Identificación de Riesgo GMP:</strong></H3>

<div class="justificado">Esta etapa es la de determinación que una función o subfunción del sistema representa un riesgo para la operación farmacéutica.
Sigue a continuación una visión general de los principales puntos que deben ser considerados durante una evaluación:<br>
• Accesos a la bodega de almacenamiento.<br>
• Instalación física y construcción de la bodega.<br>
• Ubicación de equipos productivos cerca de áreas de almacenamiento.<br>
• Sistema de climatización, desempeño y ubicación.<br>
• Cargas Internas: iluminación, equipos y personal.</div>

<H3><strong>3. Análisis de Riesgo:</strong></H3>
A partir del presente momento se procede a realizar el análisis de riesgo correspondiente al presente protocolo.<br>
Nota: según lo identificado en el levamiento de la bodega no aplican los siguientes riesgos:<br>
1- Ventanas: la bodega no cuenta con ventanas en las zonas de almacenamiento.<br>
2- Equipos productivos/ climatización asistida cerca de área de almacenamiento. Ejemplo: calderas, cámaras frías. La bodega no cuenta con equipos productivos instalados al momento de generar el análisis de riesgo.<br>
3- Sistema de Climatización: la bodega no cuenta con HVAC.<br>
4- Personal y maquinaria: la bodega no se encuentra operativa al momento de generar el presente análisis de riesgo.<br>


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
$txt02='Etapa/ subetapa bajo análisis';
$txt03='Relevancia';
$txt04='Descripción del Riesgo Identificado';
$txt05='Probabilidad
(A,M,B)';
$txt06='Impacto
(A,M,B)';
$txt07='Clase';
$txt08='Probabilidad de detección
(A,M,B)';
$txt09='Prioridad
(A,M,B)';
$txt10='Medidas / Acciones a tomar';


$pdf->MultiCell(12, 25, $txt01, 1, 'C', 0, 0, 13, '', true,1,false,true,25,'M');
$pdf->MultiCell(33, 25, $txt02, 1, 'C', 0, 0, 25, '', true,1,false,true,25,'M');
$pdf->MultiCell(12, 25, $txt03, 1, 'C', 0, 0, 58, '', true,1,false,true,25,'M');
$pdf->MultiCell(33, 25, $txt04, 1, 'C', 0, 0, 70, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt05, 1, 'C', 0, 0, 103, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt06, 1, 'C', 0, 0, 116, '', true,1,false,true,25,'M');
$pdf->MultiCell(12, 25, $txt07, 1, 'C', 0, 0, 129, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt08, 1, 'C', 0, 0, 141, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt09, 1, 'C', 0, 0, 154, '', true,1,false,true,25,'M');
$pdf->MultiCell(30, 25, $txt10, 1, 'C', 0, 1, 167, '', true,1,false,true,25,'M');

$trae_riesgos=mysqli_prepare($connect,"SELECT  num_riesgo, etapa, relevancia, descripcion, probabilidad, impacto, clase, deteccion, prioridad, medidas FROM analisis_riesgos WHERE id_informe = ? ORDER BY num_riesgo ASC");
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
$pdf->MultiCell(12, 25, $txt01, 1, 'C', 0, 0, 13, '', true,1,false,true,25,'M');
$pdf->MultiCell(33, 25, $txt02, 1, 'C', 0, 0, 25, '', true,1,false,true,25,'M');
$pdf->MultiCell(12, 25, $txt03, 1, 'C', 0, 0, 58, '', true,1,false,true,25,'M');
$pdf->MultiCell(33, 25, $txt04, 1, 'C', 0, 0, 70, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt05, 1, 'C', 0, 0, 103, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt06, 1, 'C', 0, 0, 116, '', true,1,false,true,25,'M');
$pdf->MultiCell(12, 25, $txt07, 1, 'C', 0, 0, 129, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt08, 1, 'C', 0, 0, 141, '', true,1,false,true,25,'M');
$pdf->MultiCell(13, 25, $txt09, 1, 'C', 0, 0, 154, '', true,1,false,true,25,'M');
$pdf->MultiCell(30, 25, $txt10, 1, 'C', 0, 1, 167, '', true,1,false,true,25,'M');
}
$pdf->MultiCell(12, $altos[$i], $num_riesgo + 1 , 1, 'C', 0, 0, 13, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(33, $altos[$i], $etapa, 1, 'C', 0, 0, 25, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(12, $altos[$i], $relevancia, 1, 'C', 0, 0, 58, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(33, $altos[$i], $descripcion, 1, 'L', 0, 0, 70, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(13, $altos[$i], $probabilidad, 1, 'C', 0, 0, 103, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(13, $altos[$i], $impacto, 1, 'C', 0, 0, 116, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(12, $altos[$i], $clase, 1, 'C', 0, 0, 129, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(13, $altos[$i], $deteccion, 1, 'C', 0, 0, 141, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(13, $altos[$i], $prioridad, 1, 'C', 0, 0, 154, '', true,1,false,true,$altos[$i],'M',true);
$pdf->MultiCell(30, $altos[$i], $medidas, 1, 'L', 0, 1, 167, '', true,1,false,true,$altos[$i],'M',true);

$i++;
}

$pdf->Output($codigo_informe.'.pdf', 'I');
mysqli_close($connect);
?>