<?php
require('../../../../recursos/encabezadopdf.php');
require('../../../../config.ini.php');
$id_informe = $_GET['informe'];

$informes_generales = mysqli_prepare($connect,"SELECT a.nombre,
b.id_mapeo,
b.nombre,
b.id_asignado,
b.fecha_inicio,
b.fecha_fin, 
c.id_servicio as servicio,
e.numot,
f.id_item,
f.nombre,
f.descripcion,
f.id_tipo,
g.nombre, 
g.direccion,
g.pais,
a.solicitante,
b.intervalo,
a.comentario,
a.acta_inspeccion,
f.clasificacion_item
FROM informes_general AS a,mapeo_general AS b,item_asignado AS c, servicio AS d, numot AS e,item AS f,empresa AS g
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
$nombre_empresa_g, $direccion_empresa_g, $pais, $solicitante, $intervalo, $comentario, $acta_inspeccion, $clasificacion_item);


mysqli_stmt_fetch($informes_generales);

$nombre_informe = $nombre_informe_g;
$numot = $num_ot_g;
$a = mb_strtoupper("PRUEBA DE MAPEO TÉRMICO A ".$nombre_mapeo_g)."  ".$nombre_empresa_g;

$query_2 = mysqli_prepare($connect,"SELECT a.id_servicio, a.id_item, b.nombre, b.apellido, c.nombre  FROM item_asignado  as a, persona as b, cargo as c WHERE a.id_asignado = ? AND a.usuario_responsable = b.id_usuario AND b.id_cargo = c.id_cargo");
mysqli_stmt_bind_param($query_2, 'i', $id_asignado);
mysqli_stmt_execute($query_2);
mysqli_stmt_store_result($query_2);
mysqli_stmt_bind_result($query_2, $id_servicio, $id_item, $nombres, $apellidos, $cargo);
mysqli_stmt_fetch($query_2);


switch ($id_tipo_item_g) {
		//bodega 
		case 1:
   
      $consultar_item_bodega = mysqli_prepare($connect,"SELECT b.direccion, b.codigo_interno, a.productos_almacena, a.largo, a.ancho, a.superficie, a.volumen, a.altura, a.tipo_muro, a.tipo_cielo, a.s_climatizacion, a.s_monitoreo, a.s_alarma, a.planos, a.analisis_riesgo, a.ficha_estabilidad, a.id_usuario, a.fecha_registro, a.marca_bodega, a.modelo_bodega, a.temp_max, a.temp_min, a.hr_max, a.hr_min, a.orientacion_principal, a.orientacion_recepcion, a.orientacion_despacho, a.num_puertas, a.salida_emergencia, a.cantidad_rack, a.num_estantes, a.altura_max_rack, a.sistema_extraccion, a.cielo_lus, a.cantidad_iluminarias 
      , a.cantidad_ventana FROM item_bodega a, item b WHERE a.id_item = ? AND b.id_item = a.id_item ");
      mysqli_stmt_bind_param($consultar_item_bodega, 'i', $id_item_g);
      mysqli_stmt_execute($consultar_item_bodega);
      mysqli_stmt_store_result($consultar_item_bodega);
      mysqli_stmt_bind_result($consultar_item_bodega, $ubicacion_equipo, $codigo_interno, $productos_almacena, $largo, $ancho, $superficie, $volumen, $altura, $tipo_muro, 
                              $tipo_cielo, $s_climatizacion, $s_monitoreo, $s_alarma, $planos, $analisis_riesgo, $ficha_estabilidad, $id_usuario, $fecha_registro, 
                              $marca, $modelo, $max_temp, $min_temp, $max_hr, $min_hr, $orientacion_principal, $orientacion_rececpion, $orientacion_despacho, $num_puertas,
                              $salida_emergencia, $cantidad_rack, $num_estantes, $altura_max_rack, $sistema_extraccion,  $cielo_lus, $cantidad_luminarias, $cantidad_ventana);
      
   
      mysqli_stmt_fetch($consultar_item_bodega);
    	break;
  
}
//quitarle la hora  a la fecha 
$fecha_inicio_g_sin_hora = date("d-m-Y", strtotime($fecha_inicio_g));
$fecha_fin_g_sin_hora = date("d-m-Y", strtotime($fecha_fin_g));
                                  
//Validar si es chile
// echo $ciudad_g;

if($pais == 'Chile'){
  
  $info1 = '<tr>
  <td width="25%" align="right">Normativa técnica N° 147 del MINSAL:</td>
  <td align="left" width="75%">"Buenas Prácticas de almacenamiento y distribución para droguerías y depósitos de productos de uso humano"</td>
    </tr>'; 
  
  $info2 = '<tr>
  <td width="25%" align="right">RESOLUCIÓN EXENTA 6590 ISP:</td>
  <td align="left" width="75%">"Guía para realizar el mapeo térmico de áreas de almacenamiento" del 14-12-2018</td>
   </tr>';
  
  $info3 = '<SPAN STYLE="text-align: justify;">Según la norma técnica N°147 de Buenas Prácticas de Almacenamiento y Distribución
para droguerías y depósitos de productos de uso humano, se detalla en
el punto 4.17 Condiciones de almacenamiento lo siguiente:</SPAN>


<UL>

<LI CLASS="biglist">“Las condiciones de almacenamiento de materiales y productos
deben estar en conformidad con lo señalado en sus rótulos o etiquetas, que se base
en los resultados de las pruebas de estabilidad y lo aprobado en el respectivo
registro sanitario, según corresponda según lo señalado a continuación:


	<UL>
	<br><br><SPAN STYLE="text-align: justify;">Almacenamiento y condiciones de etiquetado</SPAN>
	<br><SPAN STYLE="text-align: justify;"><STRONG>Condiciones normales de almacenamiento:</STRONG></SPAN>
	
	<LI CLASS="smallist">Los locales de almacenamiento deben estar secos y bien ventilados, a temperatura
	ambiente de 15-25°C, o, dependiendo de las condiciones climáticas, hasta 30°C en
	periodos breves.</LI>
	<LI CLASS="smallist">Se debe evitar los olores extraños, indicios de contaminación y luz intensa.</LI>

	<br><br><SPAN STYLE="text-align: justify;"><STRONG>Instrucciones definidas de almacenamiento:</STRONG></SPAN>
	<LI CLASS="smallist">Los productos deben ser almacenados bajo condiciones definidas
	que requieren aprobadas instrucciones de almacenamiento. A menos que se
	indique lo contrario (por ejemplo, productos que requieren mantener
	almacenamiento continuo de frío, productos refrigerados, etc.). Las desviaciones
	pueden ser toleradas ólo durante interrupciones de corta duración, por ejemplo,
	durante el transporte local, siempre y cuando la estabilidad del producto así lo
	permita.</LI>
	</UL>
</LI>
</UL>';
  
}else{
  
}                                  


// add a page
$pdf->AddPage();

$txt = <<<EOD

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
</style>
<table>
<tr><td width="13%" align="right">Solicitante:</td><td width="87%" align="left"> $nombre_empresa_g $ajuste</td></tr>
<tr><td width="13%" align="right">Direccón:</td><td width="87%" align="left">$direccion_empresa_g</td></tr>
<tr><td width="13%" align="right">Atencicón:</td><td width="87%" align="left">$solicitante</td></tr>
<tr><td width="13%" align="right">Fecha Emisón:</td><td width="87%" align="left">$fecha_inicio_g_sin_hora</td></tr>
</table><br><br>

<table><tr><td bgcolor="#DDDDDD"><H3><strong>1.0 ANTECEDENTES DE LA INSPECCION</strong></H3></td></tr></table><br><br>
<table>
<tr><td width="25%" align="right">Lugar:</td><td align="left" width="75%">$ubicacion_equipo</td></tr>
<tr><td width="25%" align="right">Fecha de medición:</td><td align="left" width="75%">$fecha_inicio_g_sin_hora a $fecha_fin_g_sin_hora</td></tr>
<tr><td width="25%" align="right">Acta de inspección:</td><td align="left" width="75%">$acta_inspeccion</td></tr>
</table><br><br>

<table><tr><td bgcolor="#DDDDDD"><H3><strong>2.0 IDENTIFICACIÓN DE EQUIPO Y/O ÁREA</strong></H3></td></tr></table><br><br>
<table>
<tr><td width="25%" align="right">Descripción:</td><td align="left" width="75%">$descripcion_item</td></tr>
<tr><td width="25%" align="right">Marca:</td><td align="left" width="75%">$marca</td></tr>
<tr><td width="25%" align="right">Modelo:</td><td align="left" width="75%">$modelo</td></tr>
<tr><td width="25%" align="right">Identificacón:</td><td align="left" width="75%">$codigo_interno</td></tr>
</table><br><br>

<table><tr><td bgcolor="#DDDDDD"><H3><strong>3.0 NORMATIVA</strong></H3></td></tr></table><br><br>

<table>

$info1

<tr><td width="25%" align="right">WHO 961-2015:</td>
<td align="left" width="75%">Temperature mapping of storage areas</td></tr>

<tr><td width="25%" align="right">WHO Technical report series 961,2015:</td>
<td align="left" width="75%">Suplemento 8 del anexo 9; "Temperature mapping of storage areas".</td></tr>

<tr><td width="25%" align="right">USP 44 C1079:</td>
<td align="left" width="75%">Good storage and distribution practices for drug products</td></tr>

$info2

</table><br><br>

<table><tr><td bgcolor="#DDDDDD"><H3><strong>4.0 ANTECEDENTES PROPORCIONADOS POR EL SOLICITANTE</strong></H3></td></tr></table><br><br>
<table>
<tr><td width="25%" align="right">Plano de la $clasificacion_item y N° rev.:</td><td align="left" width="75%">$planos</td></tr>

<tr><td width="25%" align="right">Especificación de temperatura:</td>
<td align="left" width="75%">Mínima $min_temp °C- Máxima $max_temp °C</td></tr>

<tr><td width="25%" align="right">Especificación de humedad:</td>
<td align="left" width="75%">Mínima $min_hr % - Máxima $max_hr %</td></tr>

<tr><td width="25%" align="right">Productos que almacenan:</td><td align="left" width="75%">$productos_almacena</td></tr>
<tr><td width="25%" align="right">Otros:</td><td align="left" width="75%">-</td></tr>
</table><br><br>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');
$pdf->AddPage();
$txt = <<<EOD

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
</style>
<br><br>
<table><tr><td bgcolor="#DDDDDD"><H3><strong>5.0 ANÁLISIS DE RIESGOS - INFORMACIÓN BASE</strong></H3></td></tr></table><br><br>
<table>

<tr><td width="25%" align="right">Orientación principal de la $clasificacion_item:</td><td align="left" width="75%">$orientacion_principal</td></tr>
<tr><td width="25%" align="right">Orientación de recepción:</td><td align="left" width="75%">$orientacion_rececpion</td></tr>
<tr><td width="25%" align="right">Orientación de despacho:</td><td align="left" width="75%">$orientacion_despacho</td></tr>
<tr><td width="25%" align="right">Número de puertas:</td><td align="left" width="75%">$num_puertas</td></tr>
<tr><td width="25%" align="right">Salidas de emergencia:</td><td align="left" width="75%">$salida_emergencia</td></tr>
<tr><td width="25%" align="right">Número de ventanas:</td><td align="left" width="75%"> $cantidad_ventana</td></tr>
<tr><td width="25%" align="right">Cantidad de líneas de rack/estantes:</td><td align="left" width="75%">$cantidad_rack</td></tr>
<tr><td width="25%" align="right">Número de niveles de los estantes:</td><td align="left" width="75%">$num_estantes</td></tr>
<tr><td width="25%" align="right">Altura máxima de racks:</td><td align="left" width="75%">$altura_max_rack</td></tr>
<tr><td width="25%" align="right">Cuenta con sistema HVAC:</td><td align="left" width="75%">$s_climatizacion</td></tr>
<tr><td width="25%" align="right">Cuenta con sistema de extracción:</td><td align="left" width="75%">$sistema_extraccion</td></tr>
<tr><td width="25%" align="right">Cuenta con cielo pasa luz:</td><td align="left" width="75%">$cielo_lus</td></tr>
<tr><td width="25%" align="right">Cantidad de luminarias:</td><td align="left" width="75%">$cantidad_luminarias</td></tr>
<tr><td width="25%" align="right">Tipo de pared:</td><td align="left" width="75%">$tipo_muro</td></tr>
<tr><td width="25%" align="right">Tipo de cielo:</td><td align="left" width="75%">$tipo_cielo</td></tr>
<tr><td width="25%" align="right">Dimensiones de la $clasificacion_item:</td>
<td align="left" width="75%">Altura $altura m / Superficie: $superficie m2 / Volumen: $volumen m3<br>
														Largo: $largo m. / Ancho: $ancho m.</td></tr>
</table><br><br>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$pdf->AddPage();

$txt = <<<EOD

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

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>6.0 PRUEBA DE MAPEO TÉRMICO</strong></H3></td></tr></TABLE>


<H3>6.1 OBJETIVO</H3>
<SPAN STYLE="text-align: justify;">Comprobar que las temperaturas en la cual se almacenan los productos se mantengan
dentro de los límites establecidos, proporcionando evidencia documental que
demuestre información general para un buen almacenamiento y las prácticas de
distribución, para asegurar que los productos lleguen al usuario final (los
profesionales y los pacientes / consumidores) con calidad intacta.</SPAN>

<H3>6.2 REVISIÓN NORMATIVA</H3>
<SPAN STYLE="text-align: justify;">Según el suplemento técnico OMS Reporte Técnico N°961- anexo 9 “Model guidance for
the storage and transport of time- temperature – sensitive pharmaceutical products”
dentro del punto 5- ubicación de sensores de monitoreo se recomienda según el layout
del área del almacenamiento:</SPAN>

<UL>
<LI CLASS="biglist">Largo y ancho: se recomienda la utilización de una “rejilla” a lo largo y ancho del
plano, para la distribución de los sensores tomando entre 5-10 metros de distancia
lineal entre cada sensor. Si son $clasificacion_item con mayores longitudes de
almacenamiento pueden colocarse los sensores a una distancia lineal de 20 o 30
metros entre ellos.</LI>

<LI CLASS="biglist">Altura: según la altura de la $clasificacion_item los sensores deben instalarse de la siguiente
manera. Para alturas máximas de 3,6 metros o menos considerar tres alturas, uno
a nivel del suelo, nivel medio a 1,2 metros y nivel alto a 3 metros. Para alturas
superiores a los 3,6 metros considerar un nivel bajo al suelo, nivel medio (múltiplos)
y nivel alto. Por ejemplo, para una $clasificacion_item de 6 metros se recomienda colocar a
nivel bajo 0,3 metros; nivel medio 1 a 1,8 metros; medio 2 a 3,6 metros; alto a 5,4
metros.</LI>

<LI CLASS="biglist">Los sensores de almacenamiento deben ubicarse donde están almacenados los
productos o donde se planea almacenar.</LI>
</UL>

$info3

EOD;
$pdf->writeHTML($txt, true, false, false, false, '');
$pdf->AddPage();

$txt = <<<EOD

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

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<H3>6.3 METODOLOGÍA</H3>
<SPAN STYLE="text-align: justify;">Proceso:</span>
<UL>
<LI CLASS="biglist">Se realiza una inspección visual de la $clasificacion_item donde se determinan las áreas
críticas que pueden afectar las temperaturas de los productos almacenados.</LI>

<LI CLASS="biglist">Se realiza análisis de riesgo para determinar áreas críticas.</LI>

<LI CLASS="biglist">La $clasificacion_item se encuentra al momento de la instalación de sensores con $carga_bod% de
carga aproximadamente.</LI>

<LI CLASS="biglist">Por altura de la $clasificacion_item y los estantes instalados en ella se consideran $alturas_generales niveles de
ubicación de sensores, a fin de evaluar el gradiente de temperatura, $zona_alt_a $zona_alt_m7 $zona_alt_m6 $zona_alt_m5 $zona_alt_m4 
$zona_alt_m3 $zona_alt_m2 $zona_alt_m $zona_alt_b.</LI>

<LI CLASS="biglist">Se determinan entonces, teniendo en cuenta los puntos más críticos mencionados
anteriormente la instalación de <strong> $total_sensores sensores</strong> ubicados al interior de la $numero_equipo de
almacenamiento de $descrip_material, para evaluar comportamiento bajo criterio de sobrepasar las temperaturas
límite de $min_temp °C a $max_temp °C definidas por el solicitante.</LI>

<LI CLASS="biglist">La posición de los sensores se encuentra registrada en el punto “Descripción de
distribución de sensores”.</LI>

<LI CLASS="biglist">Se verificó el correcto estado de calibración y funcionamiento de los sensores
datalogger del equipo de validación. Los datalogger realizan medición de
temperatura y humedad relativa.</LI>

<LI CLASS="biglist">Las mediciones de Humedad relativa son de carácter informativo.</LI>
</UL>


<H3>6.4 CRITERIO DE ACEPTACIÓN</H3>

<SPAN STYLE="text-align: justify;"><STRONG>WHO 961</STRONG>: Un estudio de mapeo mide las fluctuaciones de temperatura. A partir de estos
datos, el analista puede identificar las temperaturas mínimas y máximas que ocurren en
el mapa del área durante el período de estudio.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">La temperatura mínima se refiere a la temperatura más baja registrada en el espacio
mapeado durante el período de estudio; la temperatura máxima se refiere a la más alta
registrada durante el mismo período. Cualquiera o ambas de estas temperaturas pueden
estar fuera de los criterios de aceptación especificados para la droguería.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">Un punto frío se refiere a las temperaturas más bajas registradas en el área durante el
período de estudio, pero estas temperaturas más bajas se mantienen dentro de lo
especificado en el rango de temperatura de la $clasificacion_item, con un rango de temperatura
especificado por cliente de +$min_temp °C a +$max_temp °C.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">Un punto caliente se refiere a las temperaturas más altas registradas en el área durante
el período de estudio, pero estas temperaturas más altas permanecen dentro del rango
de temperatura especificado en el rango de temperatura por cliente de +$min_temp °C a +$max_temp °C.
El propósito de determinar los puntos calientes y fríos es identificar las ubicaciones
donde los sensores del sistema de monitoreo deben ubicarse preferentemente. Los
puntos calientes y los puntos fríos deben determinarse estacionalmente, ya que, pueden
ser significativamente diferentes en verano y en invierno.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">Nota: También es importante observar el nivel alto y tendencias bajas en lugar de solo
las temperaturas más altas y bajas. Los valores promedio pueden ser útiles para ayudar
a confirmar verdaderos puntos calientes y fríos.</SPAN >

<SPAN STYLE="text-align: justify;">El resultado final y el propósito de un ejercicio de mapeo es la implementación de las
recomendaciones del informe. Una discusión detallada de la implementación está fuera
del alcance de este documento, pero podría incluir cualquiera de los siguientes
resultados:</SPAN>

<UL>
<LI CLASS="biglist">Un dibujo o diagrama que muestra dónde se pueden almacenar <!--TTSPP-->de forma
segura en el espacio que se ha mapeado: es posible que haya alguna zonificación
involucrada. Por ejemplo, productos que no se ven afectados por congelación podría
asignarse a partes de una cámara frigorífica donde el estudio de mapeo ha mostrado
algún riesgo de congelación.</LI>

<LI CLASS="biglist">Asignación de bahías de pallets a categorías específicas <!--de TTSPP-->en el sistema de
gestión de almacén para controlar dónde existencias están posicionados.
- Reposicionamiento de sensores de monitoreo de temperatura y/o sensores de control
ambiental.</LI>

<LI CLASS="biglist">Ajuste de las salidas de aire para reducir la estratificación de la temperatura y/o
minimice los puntos fríos y calientes.</LI>

<LI CLASS="biglist">Actualización de sistemas mecánicos para mejorar el control de temperatura y
rendimiento.</LI>

<LI CLASS="biglist">Una decisión de usar el espacio para otros fines porque no es adecuado para el
almacenamiento.<!--de TTSPPs.--></LI>
</UL>

<!--<SPAN STYLE="text-align: justify;"><STRONG>Nota: TTSPP</STRONG> - Producto farmacéutico sensible al tiempo y a la temperatura.</SPAN><BR><BR>-->

<SPAN STYLE="text-align: justify;"><STRONG>USP 44 C1079</STRONG>: El proceso de mapeo térmico ayudará a determinar cuándo podrían
ocurrir excursiones y son útiles cuando los fabricantes de productos
desarrollen un plan para tratarlas. Las alarmas deben usarse para revelar excursiones
ambientales durante las operaciones. Puede admitirse excursiones de temperatura por
períodos breves fuera de las condiciones de etiqueta de almacenamiento respectivas
siempre que existan datos de estabilidad y justificación científica / técnica que
demuestren que la calidad del producto no se ve afectada (consulte la GUI 0069 de
Health Canada titulada Guías para el control de temperatura de productos durante almacenamiento y transporte; 2011).</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">El MKT es la temperatura calculada única a la cual la cantidad total de degradación
durante un período particular es igual a la suma de las degradaciones individuales que
ocurrirían a diversas temperaturas. MKT puede considerarse como una temperatura de
almacenamiento isotérmico que simula los efectos no isotérmicos de la variación de la
temperatura de almacenamiento. No es una simple media aritmética. Las temperaturas
usadas para calcular MKT se pueden recoger convenientemente usando dispositivos
electrónicos que miden temperaturas a intervalos frecuentes (por ejemplo, cada 15
minutos).</SPAN><BR><BR>


EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$txt = <<<EOD

<SPAN STYLE="text-align: justify;">La media aritmética de las temperaturas altas y bajas semanales se usan luego en el
cálculo de MKT. MKT se calcula mediante la siguiente ecuación (derivada de la ecuación
de Arrhenius):</SPAN><BR>
<table border="0">
<tr>
  <td width="31%"></td>
  <td width="50%"><div class="centrar"><img src="../imagenes_internas/calculo.png" width="400" style="text-align:center;"></div><br></td>
  <td></td>
</tr>
</table>


<SPAN STYLE="text-align: justify;">En el que Delta de H es el calor de activación, lo que equivale a 83.144 kJ por mol (a menos
que haya información más precisa disponible de estudios experimentales); R es la
constante universal de los gases, que es igual a 8,3144 × 10-3 kJ por grado por mol; T1
es la temperatura media, en grados Kelvin, durante el primer periodo de tiempo, por
ejemplo, la primera semana; T2 es la temperatura media, en grados Kelvin, durante el
segundo período de tiempo.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">La posesión de un medicamento puede ocurrir como parte de las prácticas de
almacenamiento y distribución. Los productos en la cadena de suministro
de distribución se pueden mantener a temperaturas fuera de los requisitos de
almacenamiento etiquetados según lo determinado por un estudio de estabilidad
apropiado.<SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">Los productos almacenados en condiciones de almacén o en modos de
transporte pueden experimentar excursiones de sus rangos de temperatura aceptables.
Cada excursión de producto debe evaluarse para determinar el efecto final del producto.
Los medios de evaluación deben ser científicamente sólidos, con justificación técnica
documentada de que la integridad del producto farmacéutico no se ha visto afectada. Un
método de análisis para el producto farmacéutico almacenado fuera de sus respectivas
condiciones de almacenamiento de etiquetas es el uso de un cálculo MKT. Debido a que
MKT expresa el estrés térmico acumulado que experimenta un producto farmacéutico, 
se considera una práctica aceptable para el almacenamiento, y se deduce que debe
considerarse para las excursiones de tránsito en el proceso de distribución.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">El cálculo debe justificarse para su uso con excursiones de distribución al confirmar que
la característica de estabilidad de limitación del producto sigue una cinética de primer
orden sobre el rango de temperatura encontrado. Las directrices de prueba de
estabilidad de ICH definen MKT como una temperatura derivada "única" que, si se
mantiene durante un período definido, ofrecerá el mismo desafío térmico a un producto
farmacéutico que se habría experimentado en un rango de temperaturas tanto altas
como bajas para un período definido equivalente.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">El análisis MKT debe basarse en buena ciencia y debe tener en cuenta la integridad del
producto.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">El MKT calculado no es sensible al impacto de las excursiones que pueden ocurrir si la
línea de base es un período de tiempo prolongado, como un segmento de
almacenamiento o toda la vida útil del producto farmacéutico. Para periodos de tiempo
iniciales más cortos, como segmentos de transporte, una excursión puede tener un
impacto significativo en el MKT resultante para ese segmento; sin embargo, esto no
tendría necesariamente un impacto significativo en la calidad del producto.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">El análisis MKT puede usarse para condiciones de almacenamiento que han excedido
los parámetros aceptables para un producto farmacéutico, durante un corto período de
tiempo y no pretende ser una medida para el almacenamiento a largo plazo.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">Conocer el MKT para una excursión es útil para evaluar el impacto potencial en la calidad
del producto. Sin embargo, también es esencial conocer los límites de temperatura
superior e inferior de cualquier excursión. Si estas temperaturas extremas están fuera
de los datos de estabilidad disponibles, puede que no sea posible predecir el impacto de
calidad de la excursión con confianza independientemente del MKT. Aunque a las
temperaturas más altas se les da un mayor peso en el cálculo, el cálculo de MKT para
el producto no congelado que se congela por cualquier período de tiempo puede no dar
como resultado una temperatura aceptable, aunque el producto no esté adulterado.</SPAN><BR><BR>

<SPAN STYLE="text-align: justify;">A temperaturas más altas, la cinética de degradación puede cambiar o pueden ocurrir
nuevas reacciones de degradación; a temperaturas más bajas (cerca de la congelación)
puede producirse un cambio de fase que se sabe que tiene un impacto negativo en la
calidad de algunos productos farmacológicos (por ejemplo, algunas proteínas y
vacunas).</SPAN><BR><BR>



EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$pdf->AddPage();
$txt = <<<EOD

<H3>6.5 DESCRIPCIÓN DE DISTRIBUCIÓN DE SENSORES</H3><br>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

////////////////////////////////////////////////////////CICLO DE IMPRESION DE ALTURAS ////////////////////////////////////////////////////////////////////////

//TEMPORALMENTE CLONÉ UNA IMAGEN DE OTRO INFORME Y LA INYECTÉ A LA DB RELACIONANDOLA CON EL ID DE ESTE INFORME, HAY QUE VER LA MANERA DE QUE QUEDE AUTOMATICO
$query_img = mysqli_prepare($connect,"SELECT url FROM imagenes_general_informe as a, informes_general as b WHERE b.id_mapeo = ? AND a.tipo = 1 AND 
a.id_informe = b.id_informe AND b.tipo = 'TEMP'");
mysqli_stmt_bind_param($query_img, 'i', $id_mapeo_g);
mysqli_stmt_execute($query_img);
mysqli_stmt_store_result($query_img);
mysqli_stmt_bind_result($query_img, $url_imagen_1);
mysqli_stmt_fetch($query_img);
 
if(mysqli_stmt_num_rows($query_img) > 0){
	$img_pos = '<img src="../../'.$url_imagen_1.'" width="420px">';
}else{
	$img_pos = '<img src="../../../design/images/no_imagen.png">';
}

$txt=<<< EOD
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

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}
</style>

<table>
<tr>
<td width="100%"><br><br><br>$img_pos<br></td>
</tr>
</table>
EOD;
$pdf->writeHTML($txt, true, false, false, false, '');

$pdf->writeHTMLCell(15, 9, 15, '', 'Posición', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(28, 9, 30, '', 'N° de identificación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(55, 9, 58, '', 'Ubicación', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(28, 9, 113, '', 'N° de serie', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(54, 9, 141, '', 'N° Certificado de Calibración', 1, 1, 0, true, 'C', true);

$contador_t = 0;

//CONSULTA
//MIGUEL: SE REMOVIO EL DISTINCT DE ESTA QUERY, SE AÑADIO LA POSICION Y SE ORDENA LA IMPRESION DE LA TABLA POR ID_BANDEJA Y POSICION
$query_32 = mysqli_prepare($connect,"SELECT a.nombre, b.nombre, a.serie, a.id_sensor, c.posicion  FROM sensores as a, bandeja as b, mapeo_general_sensor  as c 
WHERE c.id_sensor = a.id_sensor AND c.id_mapeo = ? AND b.id_bandeja = c.id_bandeja ORDER BY c.id_bandeja ASC, c.posicion ASC");
mysqli_stmt_bind_param($query_32, 'i', $id_mapeo_g);
mysqli_stmt_execute($query_32);
mysqli_stmt_store_result($query_32);
mysqli_stmt_bind_result($query_32, $nombre_sensor_t, $ubicacion_sensor_t, $serie_sensor_t,  $id_sensor_t, $posicion_t);

while($row = mysqli_stmt_fetch($query_32)){
      $contador_t ++;
  $query_34 = mysqli_prepare($connect,'SELECT certificado FROM sensores_certificados WHERE id_sensor = ? ORDER BY fecha_vencimiento DESC LIMIT 1');
  mysqli_stmt_bind_param($query_34, 'i', $id_sensor_t);
  mysqli_stmt_execute($query_34);
  mysqli_stmt_store_result($query_34);
  mysqli_stmt_bind_result($query_34, $certificado_sensor_t);
  mysqli_stmt_fetch($query_34);

    if($contador_t == 21 OR $contador_t == 61 ){

       $pdf->AddPage('A4');
       //TITULOS
        $pdf->writeHTMLCell(15, 9, 15, '', 'Posición', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(28, 9, 30, '', 'N° de identificación', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(55, 9, 58, '', 'Ubicación', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(28, 9, 113, '', 'N° de serie', 1, 0, 0, true, 'C', true);

        $pdf->writeHTMLCell(54, 9, 141, '', 'N° Certificado de Calibración', 1, 1, 0, true, 'C', true);

     } 
      $pdf->writeHTMLCell(15, 5, 15, '', $posicion_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(28, 5, 30, '', $nombre_sensor_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(55, 5, 58, '', $ubicacion_sensor_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(28, 5, 113, '', $serie_sensor_t, 1, 0, 0, true, 'C', true);

      $pdf->writeHTMLCell(54, 5, 141, '', $certificado_sensor_t, 1, 1, 0, true, 'C', true);
  
 }

////////////////////////////////////////////////////////FIN DEL CICLO DE IMPRESION DE ALTURAS //////////////////////////////////////////////////////////////////
$pdf->AddPage();

/////////////////////////////////////////////////////////////COMPARATIVAS DE TEMPERATURA///////////////////////////////////////////////////////////////////////

$mediciones = mysqli_prepare($connect,"SELECT DATEDIFF(fecha_fin, fecha_inicio) FROM mapeo_general WHERE id_mapeo = ?");
mysqli_stmt_bind_param($mediciones, 'i',  $id_mapeo_g);
mysqli_stmt_execute($mediciones);
mysqli_stmt_store_result($mediciones);
mysqli_stmt_bind_result($mediciones, $d_1);
mysqli_stmt_fetch($mediciones);
$c_hora = number_format(($d_1 * 24),2);

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(200, 200, 200)));
//TITULOS

$pdf->writeHTMLCell(70, 5, 15, '', '<strong>Parámetro</strong>', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(110, 5, 85, '', '<strong>Resultados de Mediciones</strong>', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(70, 13, 15, '', 'Tiempo de inicio del período de pruebas (Según lectura de sensores', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 13, 85, '', 'Hora inicio: <br> Hora término<br> Total: ', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 13, 135, '',' '.$fecha_inicio_g.' <br> '.$fecha_fin_g.'<br>'.$c_hora, 1, 1, 0, true, 'C', true);


$query_promedios = mysqli_prepare($connect,"SELECT c.nombre,  round(AVG(a.temp),2) AS promedio, MIN(a.temp) as minimo, MAX(a.temp) as maximo FROM datos_crudos_general as a, mapeo_general_sensor as b,
bandeja as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja  GROUP BY c.nombre ORDER BY c.nombre ASC");
mysqli_stmt_bind_param($query_promedios, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_promedios);
mysqli_stmt_store_result($query_promedios);
mysqli_stmt_bind_result($query_promedios, $posiciones, $promedio, $minimo_temperatura, $max_temperatura);	

$query_promedios_general = mysqli_prepare($connect,"SELECT round(AVG(a.temp),2) AS promedio FROM datos_crudos_general as a, mapeo_general_sensor as b
WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?");
mysqli_stmt_bind_param($query_promedios_general, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_promedios_general);
mysqli_stmt_store_result($query_promedios_general);
mysqli_stmt_bind_result($query_promedios_general, $promedio_general_t);	
mysqli_stmt_fetch($query_promedios_general);

$colum = mysqli_stmt_num_rows($query_promedios);

$pdf->writeHTMLCell(70, 7.25*($colum+1), 15, '', 'Temperatura promedio en '.$clasificacion_item. ' durante período de estudio', 1, 0, 0, true, 'C', false);

while($row = mysqli_stmt_fetch($query_promedios)){
  $pdf->writeHTMLCell(50, 8, 85, '', 'T° promedio '.$posiciones, 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(60, 8, 135, '', $promedio.'°C', 1, 1, 0, true, 'C', true);
}
$pdf->writeHTMLCell(50, 5, 85, '', '<strong>T° promedio</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', $promedio_general_t.' °C', 1, 1, 0, true, 'C', true);

////////////////////////////////////
$query_temperatura = mysqli_prepare($connect,"SELECT c.nombre,  MIN(a.temp) as minimo FROM datos_crudos_general as a, mapeo_general_sensor as b,
bandeja as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja  GROUP BY c.nombre ORDER BY c.nombre ASC");
mysqli_stmt_bind_param($query_temperatura, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_temperatura);
mysqli_stmt_store_result($query_temperatura);
mysqli_stmt_bind_result($query_temperatura, $posiciones, $minimo_temperatura);	

$query_temperatura_general = mysqli_prepare($connect,"SELECT MIN(a.temp) as minimo FROM datos_crudos_general as a, mapeo_general_sensor as b
WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?");
mysqli_stmt_bind_param($query_promedios_general, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_promedios_general);
mysqli_stmt_store_result($query_promedios_general);
mysqli_stmt_bind_result($query_promedios_general, $temperatura_general_t);	
mysqli_stmt_fetch($query_promedios_general);

$pdf->writeHTMLCell(70, 7.25*($colum+1), 15, '', 'Sensor con la temperatura promedio más baja', 1, 0, 0, true, 'C', false);
while($row = mysqli_stmt_fetch($query_temperatura)){
  $pdf->writeHTMLCell(50, 8, 85, '', 'T° promedio '.$posiciones, 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(60, 8, 135, '', $minimo_temperatura.'°C', 1, 1, 0, true, 'C', true);
}
$pdf->writeHTMLCell(50, 5, 85, '', '<strong>T° promedio</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', $temperatura_general_t.' °C', 1, 1, 0, true, 'C', true);
//////////////////////////////////////

$query_temperatura_2 = mysqli_prepare($connect,"SELECT c.nombre,  MAX(a.temp) as maximo FROM datos_crudos_general as a, mapeo_general_sensor as b,
bandeja as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja  GROUP BY c.nombre ORDER BY c.nombre ASC");
mysqli_stmt_bind_param($query_temperatura_2, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_temperatura_2);
mysqli_stmt_store_result($query_temperatura_2);
mysqli_stmt_bind_result($query_temperatura_2, $posiciones, $maximo_temperatura);	

$query_temperatura_2_general = mysqli_prepare($connect,"SELECT MAX(a.temp) as maximo FROM datos_crudos_general as a, mapeo_general_sensor as b
WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?");
mysqli_stmt_bind_param($query_promedios_general, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_promedios_general);
mysqli_stmt_store_result($query_promedios_general);
mysqli_stmt_bind_result($query_promedios_general, $temperatura_general_t2);	
mysqli_stmt_fetch($query_promedios_general);

$pdf->writeHTMLCell(70, 7.25*($colum+1), 15, '', 'Sensor con la temperatura promedio más alta', 1, 0, 0, true, 'C', false);
while($row = mysqli_stmt_fetch($query_temperatura_2)){
  $pdf->writeHTMLCell(50, 8, 85, '', 'T° promedio '.$posiciones, 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(60, 8, 135, '', $maximo_temperatura.'°C', 1, 1, 0, true, 'C', true);
}
$pdf->writeHTMLCell(50, 5, 85, '', '<strong>T° promedio</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', $temperatura_general_t2.' °C', 1, 1, 0, true, 'C', true);
  

$pdf->AddPage();

$pdf->writeHTMLCell(70, 5, 15, '', '<strong>Parámetro</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(110, 5, 85, '', '<strong>Resultados de Mediciones</strong>', 1, 1, 0, true, 'C', true);

$sensor_min_full = mysqli_prepare($connect,"SELECT  d.nombre, c.nombre, MIN(a.temp) as maximo FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c,
sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor 
GROUP BY c.nombre, d.nombre ORDER BY maximo ASC limit 1");
mysqli_stmt_bind_param($sensor_min_full, 'i',  $id_mapeo_g);
mysqli_stmt_execute($sensor_min_full);
mysqli_stmt_store_result($sensor_min_full);
mysqli_stmt_bind_result($sensor_min_full, $nombre_sensor_min_full, $nombre_altura_min_full, $temp_min_full);	
mysqli_stmt_fetch($sensor_min_full);


$pdf->writeHTMLCell(70, 13, 15, '', 'Sensor con la temperatura mínima en toda la prueba', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 13, 85, '', 'Temperatura: <br>Sensor:<br> ', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 13, 135, '',' '.$temp_min_full.'°C <br> '.$nombre_sensor_min_full.'<br> Ubicado en :'.$nombre_altura_min_full, 1, 1, 0, true, 'C', true);

/////////////////////////////////////////////

$sensor_max_full = mysqli_prepare($connect,"SELECT  d.nombre, c.nombre, MAX(a.temp) as maximo FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c,
sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor 
GROUP BY c.nombre, d.nombre ORDER BY maximo dESC limit 1");
mysqli_stmt_bind_param($sensor_max_full, 'i',  $id_mapeo_g);
mysqli_stmt_execute($sensor_max_full);
mysqli_stmt_store_result($sensor_max_full);
mysqli_stmt_bind_result($sensor_max_full, $nombre_sensor_max_full, $nombre_altura_max_full, $temp_max_full);	
mysqli_stmt_fetch($sensor_max_full);


$pdf->writeHTMLCell(70, 13, 15, '', 'Sensor con la temperatura máxima en toda la prueba', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 13, 85, '', 'Temperatura: <br>Sensor:<br> ', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 13, 135, '',' '.$temp_max_full.'°C <br> '.$nombre_sensor_max_full.'<br> Ubicado en :'.$nombre_altura_max_full, 1, 1, 0, true, 'C', true);

//////////////////////////////77


$sensor_desv_min_full = mysqli_prepare($connect,"SELECT  d.nombre, c.nombre,STD(CAST(a.temp as DECIMAL(4,2))) AS desv  FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c,
sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor 
GROUP BY c.nombre, d.nombre ORDER BY desv ASC limit 1");
mysqli_stmt_bind_param($sensor_desv_min_full, 'i',  $id_mapeo_g);
mysqli_stmt_execute($sensor_desv_min_full);
mysqli_stmt_store_result($sensor_desv_min_full);
mysqli_stmt_bind_result($sensor_desv_min_full, $nombre_sensor_desv_min_full, $nombre_altura_desv_min_full, $desc_min_full);	
mysqli_stmt_fetch($sensor_desv_min_full);

$minstd=round($desc_min_full,2);

$pdf->writeHTMLCell(70, 13, 15, '', 'Sensor con menor desviación estándar', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 13, 85, '', 'Temperatura: <br>Sensor:<br> ', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 13, 135, '',' '.$minstd.'°C <br> '.$nombre_sensor_desv_min_full.'<br> Ubicado en :'.$nombre_altura_desv_min_full, 1, 1, 0, true, 'C', true);


/////////////////////////////////////

$sensor_desv_max_full = mysqli_prepare($connect,"SELECT  d.nombre, c.nombre,STD(CAST(a.temp as DECIMAL(4,2))) AS desv  FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c,
sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor 
GROUP BY c.nombre, d.nombre ORDER BY desv DESC limit 1");
mysqli_stmt_bind_param($sensor_desv_max_full, 'i',  $id_mapeo_g);
mysqli_stmt_execute($sensor_desv_max_full);
mysqli_stmt_store_result($sensor_desv_max_full);
mysqli_stmt_bind_result($sensor_desv_max_full, $nombre_sensor_desv_max_full, $nombre_altura_desv_max_full, $desc_max_full);	
mysqli_stmt_fetch($sensor_desv_max_full);

$maxstd=round($desc_max_full,2);

$pdf->writeHTMLCell(70, 13, 15, '', 'Sensor con mayor desviación estándar', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 13, 85, '', 'Temperatura: <br>Sensor:<br> ', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 13, 135, '',' '.$maxstd.'°C <br> '.$nombre_sensor_desv_max_full.'<br> Ubicado en :'.$nombre_altura_desv_max_full, 1, 1, 0, true, 'C', true);



//////////////////////////////////////////////////////////

$query_promedios = mysqli_prepare($connect,"SELECT c.nombre,  AVG(EXP(-83.144/(0.0083144*(a.temp+273.15)))) as valor FROM datos_crudos_general as a, mapeo_general_sensor as b,
bandeja as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja  GROUP BY c.nombre ORDER BY c.nombre ASC");
mysqli_stmt_bind_param($query_promedios, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_promedios);
mysqli_stmt_store_result($query_promedios);
mysqli_stmt_bind_result($query_promedios, $posiciones, $mkt);	

$query_mkt_promedio = mysqli_prepare($connect,"SELECT  AVG(EXP(-83.144/(0.0083144*(temp+273.15)))) as valor FROM datos_crudos_general as a, mapeo_general_sensor as b 
WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?");
mysqli_stmt_bind_param($query_mkt_promedio, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_mkt_promedio);
mysqli_stmt_store_result($query_mkt_promedio);
mysqli_stmt_bind_result($query_mkt_promedio, $mkt_general_alt);
mysqli_stmt_fetch($query_mkt_promedio);
  $mkt_gen_alt=round(-1*(83.144/0.0083144)/(log($mkt_general_alt))-273.15,2);


$pdf->writeHTMLCell(70, 5*($colum+1), 15, '', 'Temperatura cinética media', 1, 0, 0, true, 'C', false);

while($row = mysqli_stmt_fetch($query_promedios)){
  $mkt_alt=round(-1*(83.144/0.0083144)/(log($mkt))-273.15,2);
  

  $pdf->writeHTMLCell(50, 5, 85, '', 'MKT Zona'.$posiciones.':', 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(60, 5, 135, '', $mkt_alt.' °C', 1, 1, 0, true, 'C', true);
}

$pdf->writeHTMLCell(50, 5, 85, '', '<strong>MKT promedio</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', $mkt_gen_alt.' °C', 1, 1, 0, true, 'C', true);


$buscar_informes_final = mysqli_prepare($connect,"SELECT c.nombre, d.nombre FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c, informes_general AS d
WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? AND b.id_bandeja = c.id_bandeja AND b.id_mapeo = d.id_mapeo AND tipo = 'TEMP' 
GROUP BY c.nombre, d.nombre, c.id_bandeja ORDER BY c.id_bandeja ASC limit 1");
mysqli_stmt_bind_param($buscar_informes_final, 'i',  $id_mapeo_g);
mysqli_stmt_execute($buscar_informes_final);
mysqli_stmt_store_result($buscar_informes_final);
mysqli_stmt_bind_result($buscar_informes_final, $posiciones, $informed);

while($row = mysqli_stmt_fetch($buscar_informes_final)){
    $pdf->writeHTMLCell(180, 5, 15, '', 'Resultado de todas las alturas en el informe: '.$informed, 1, 1, 0, true, 'C', true);
}

$pdf->AddPage();



/////////////////////////////////////////////////////////////COMPARATIVAS DE HUMEDAD///////////////////////////////////////////////////////////////////////

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(200, 200, 200)));
//TITULOS

$pdf->writeHTMLCell(70, 5, 15, '', '<strong>Parámetro</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(110, 5, 85, '', '<strong>Resultados de Mediciones</strong>', 1, 1, 0, true, 'C', true);

$pdf->writeHTMLCell(70, 13, 15, '', 'Tiempo de inicio del período de pruebas (Según lectura de sensores)', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(50, 13, 85, '', 'Hora inicio: <br> Hora término<br> Total: ', 1, 0, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 13, 135, '',' '.$fecha_inicio_g.' <br> '.$fecha_fin_g.'<br>'.$c_hora, 1, 1, 0, true, 'C', true);


$query_promedios_h = mysqli_prepare($connect,"SELECT c.nombre,  round(AVG(a.hum),2) AS promedio, MIN(a.hum) as minimo, MAX(a.hum) as maximo FROM datos_crudos_general as a, mapeo_general_sensor as b,
bandeja as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja  GROUP BY c.nombre ORDER BY c.nombre ASC");
mysqli_stmt_bind_param($query_promedios_h, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_promedios_h);
mysqli_stmt_store_result($query_promedios_h);
mysqli_stmt_bind_result($query_promedios_h, $posiciones_h, $promedio_h, $minimo_humedad, $max_humedad);	

$query_promedios_general_h = mysqli_prepare($connect,"SELECT round(AVG(a.hum),2) AS promedio FROM datos_crudos_general as a, mapeo_general_sensor as b
WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?");
mysqli_stmt_bind_param($query_promedios_general_h, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_promedios_general_h);
mysqli_stmt_store_result($query_promedios_general_h);
mysqli_stmt_bind_result($query_promedios_general_h, $promedio_general_hh);	
mysqli_stmt_fetch($query_promedios_general_h);

$columh = mysqli_stmt_num_rows($query_promedios_h);

$pdf->writeHTMLCell(70, 7.25*($columh+1), 15, '', 'Porcentaje de Humedad Relativa promedio durante período de estudio', 1, 0, 0, true, 'C', false);

while($row = mysqli_stmt_fetch($query_promedios_h)){
  $pdf->writeHTMLCell(50, 8, 85, '', ' promedio '.$posiciones_h, 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(60, 8, 135, '', $promedio_h.'%HR', 1, 1, 0, true, 'C', true);
}
$pdf->writeHTMLCell(50, 5, 85, '', '<strong> promedio</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', $promedio_general_hh.' %HR', 1, 1, 0, true, 'C', true);

////////////////////////////////////
$query_humedad = mysqli_prepare($connect,"SELECT c.nombre,  MIN(a.hum) as minimo FROM datos_crudos_general as a, mapeo_general_sensor as b,
bandeja as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja  GROUP BY c.nombre ORDER BY c.nombre ASC");
mysqli_stmt_bind_param($query_humedad, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_humedad);
mysqli_stmt_store_result($query_humedad);
mysqli_stmt_bind_result($query_humedad, $posiciones_h, $minimo_humedad);	

$query_humedad_general = mysqli_prepare($connect,"SELECT MIN(a.hum) as minimo FROM datos_crudos_general as a, mapeo_general_sensor as b
WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?");
mysqli_stmt_bind_param($query_humedad_general, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_humedad_general);
mysqli_stmt_store_result($query_humedad_general);
mysqli_stmt_bind_result($query_humedad_general, $humedad_general_t);	
mysqli_stmt_fetch($query_humedad_general);

$pdf->writeHTMLCell(70, 7.25*($columh+1), 15, '', 'Sensor con la humedad promedio más baja', 1, 0, 0, true, 'C', false);
while($row = mysqli_stmt_fetch($query_humedad)){
  $pdf->writeHTMLCell(50, 8, 85, '', ' promedio '.$posiciones_h, 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(60, 8, 135, '', $minimo_humedad.'%HR', 1, 1, 0, true, 'C', true);
}
$pdf->writeHTMLCell(50, 5, 85, '', '<strong> promedio</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', $humedad_general_t.' %HR', 1, 1, 0, true, 'C', true);
//////////////////////////////////////

$query_humedad_2 = mysqli_prepare($connect,"SELECT c.nombre,  MAX(a.hum) as maximo FROM datos_crudos_general as a, mapeo_general_sensor as b,
bandeja as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja  GROUP BY c.nombre ORDER BY c.nombre ASC");
mysqli_stmt_bind_param($query_humedad_2, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_humedad_2);
mysqli_stmt_store_result($query_humedad_2);
mysqli_stmt_bind_result($query_humedad_2, $posiciones, $maximo_humedad);	

$query_humedad_2_general = mysqli_prepare($connect,"SELECT MAX(a.hum) as maximo FROM datos_crudos_general as a, mapeo_general_sensor as b
WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?");
mysqli_stmt_bind_param($query_humedad_2_general, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_humedad_2_general);
mysqli_stmt_store_result($query_humedad_2_general);
mysqli_stmt_bind_result($query_humedad_2_general, $humedad_general_t2);	
mysqli_stmt_fetch($query_humedad_2_general);

$pdf->writeHTMLCell(70, 7.25*($columh+1), 15, '', 'Sensor con la humedad promedio más alta', 1, 0, 0, true, 'C', false);
while($row = mysqli_stmt_fetch($query_humedad_2)){
  $pdf->writeHTMLCell(50, 8, 85, '', ' promedio '.$posiciones, 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(60, 8, 135, '', $maximo_humedad.'%HR', 1, 1, 0, true, 'C', true);
}
$pdf->writeHTMLCell(50, 5, 85, '', '<strong> promedio</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', $humedad_general_t2.' %HR', 1, 1, 0, true, 'C', true);
  

$pdf->AddPage();

$pdf->writeHTMLCell(70, 5, 15, '', '<strong>Parámetro</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(110, 5, 85, '', '<strong>Resultados de Mediciones</strong>', 1, 1, 0, true, 'C', true);

$sensor_min_full_h = mysqli_prepare($connect,"SELECT  d.nombre, c.nombre, MIN(a.hum) as maximo FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c,
sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor 
GROUP BY c.nombre, d.nombre ORDER BY maximo ASC limit 1");
mysqli_stmt_bind_param($sensor_min_full_h, 'i',  $id_mapeo_g);
mysqli_stmt_execute($sensor_min_full_h);
mysqli_stmt_store_result($sensor_min_full_h);
mysqli_stmt_bind_result($sensor_min_full_h, $nombre_sensor_min_full_h, $nombre_altura_min_full_h, $hum_min_full);	
mysqli_stmt_fetch($sensor_min_full_h);


$pdf->writeHTMLCell(70, 13, 15, '', 'Sensor con la humedad mínima en toda la prueba', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 13, 85, '', 'Humedad: <br>Sensor:<br> ', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 13, 135, '',' '.$hum_min_full.' %HR <br> '.$nombre_sensor_min_full_h.'<br> Ubicado en :'.$nombre_altura_min_full_H, 1, 1, 0, true, 'C', true);

/////////////////////////////////////////////

$sensor_max_full_h = mysqli_prepare($connect,"SELECT  d.nombre, c.nombre, MAX(a.hum) as maximo FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c,
sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor 
GROUP BY c.nombre, d.nombre ORDER BY maximo dESC limit 1");
mysqli_stmt_bind_param($sensor_max_full_h, 'i',  $id_mapeo_g);
mysqli_stmt_execute($sensor_max_full_h);
mysqli_stmt_store_result($sensor_max_full_h);
mysqli_stmt_bind_result($sensor_max_full_h, $nombre_sensor_max_full_h, $nombre_altura_max_full_h, $hum_max_full);	
mysqli_stmt_fetch($sensor_max_full_h);


$pdf->writeHTMLCell(70, 13, 15, '', 'Sensor con la humedad máxima en toda la prueba', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 13, 85, '', 'Temperatura: <br>Sensor:<br> ', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 13, 135, '',' '.$temp_max_full_h.' %HR <br> '.$nombre_sensor_max_full_h.'<br> Ubicado en :'.$nombre_altura_max_full_h, 1, 1, 0, true, 'C', true);

//////////////////////////////77


$sensor_desv_min_full_h = mysqli_prepare($connect,"SELECT  d.nombre, c.nombre,STD(CAST(a.hum as DECIMAL(4,2))) AS desv  FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c,
sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor 
GROUP BY c.nombre, d.nombre ORDER BY desv ASC limit 1");
mysqli_stmt_bind_param($sensor_desv_min_full_h, 'i',  $id_mapeo_g);
mysqli_stmt_execute($sensor_desv_min_full_h);
mysqli_stmt_store_result($sensor_desv_min_full_h);
mysqli_stmt_bind_result($sensor_desv_min_full_h, $nombre_sensor_desv_min_full_h, $nombre_altura_desv_min_full_h, $desc_min_full_h);	
mysqli_stmt_fetch($sensor_desv_min_full_h);

$minstd_h=round($desc_min_full_h,2);

$pdf->writeHTMLCell(70, 13, 15, '', 'Sensor con menor desviación estándar', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 13, 85, '', 'Humedad: <br>Sensor:<br> ', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 13, 135, '',' '.$minstd_h.' %HR <br> '.$nombre_sensor_desv_min_full_h.'<br> Ubicado en :'.$nombre_altura_desv_min_full_h, 1, 1, 0, true, 'C', true);


/////////////////////////////////////

$sensor_desv_max_full_h = mysqli_prepare($connect,"SELECT  d.nombre, c.nombre,STD(CAST(a.hum as DECIMAL(4,2))) AS desv  FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c,
sensores as d WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja AND b.id_sensor = d.id_sensor 
GROUP BY c.nombre, d.nombre ORDER BY desv DESC limit 1");
mysqli_stmt_bind_param($sensor_desv_max_full_h, 'i',  $id_mapeo_g);
mysqli_stmt_execute($sensor_desv_max_full_h);
mysqli_stmt_store_result($sensor_desv_max_full_h);
mysqli_stmt_bind_result($sensor_desv_max_full_h, $nombre_sensor_desv_max_full_h, $nombre_altura_desv_max_full_h, $desc_max_full_h);	
mysqli_stmt_fetch($sensor_desv_max_full_h);

$maxstd_h=round($desc_max_full,2);

$pdf->writeHTMLCell(70, 13, 15, '', 'Sensor con mayor desviación estándar', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 13, 85, '', 'Humedad: <br>Sensor:<br> ', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 13, 135, '',' '.$maxstd_h.'%HR <br> '.$nombre_sensor_desv_max_full_h.'<br> Ubicado en :'.$nombre_altura_desv_max_full_h, 1, 1, 0, true, 'C', true);



//////////////////////////////////////////////////////////

$query_promedios_hh = mysqli_prepare($connect,"SELECT c.nombre,  AVG(EXP(-83.144/(0.0083144*(a.hum+273.15)))) as valor FROM datos_crudos_general as a, mapeo_general_sensor as b,
bandeja as c WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?  AND b.id_bandeja = c.id_bandeja  GROUP BY c.nombre ORDER BY c.nombre ASC");
mysqli_stmt_bind_param($query_promedios_hh, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_promedios_hh);
mysqli_stmt_store_result($query_promedios_hh);
mysqli_stmt_bind_result($query_promedios_hh, $posiciones, $mkt);	

$query_mkt_promedio_h = mysqli_prepare($connect,"SELECT  AVG(EXP(-83.144/(0.0083144*(hum+273.15)))) as valor FROM datos_crudos_general as a, mapeo_general_sensor as b 
WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ?");
mysqli_stmt_bind_param($query_mkt_promedio_h, 'i',  $id_mapeo_g);
mysqli_stmt_execute($query_mkt_promedio_h);
mysqli_stmt_store_result($query_mkt_promedio_h);
mysqli_stmt_bind_result($query_mkt_promedio_h, $mkt_general_alt_h);
mysqli_stmt_fetch($query_mkt_promedio_h);
  $mkt_gen_alt_h=round(-1*(83.144/0.0083144)/(log($mkt_general_alt_h))-273.15,2);


$pdf->writeHTMLCell(70, 5*($colum+1), 15, '', 'Humedad cinética media', 1, 0, 0, true, 'C', false);

while($row = mysqli_stmt_fetch($query_promedios_hh)){
  $mkt_alt_h=round(-1*(83.144/0.0083144)/(log($mkt))-273.15,2);
  

  $pdf->writeHTMLCell(50, 5, 85, '', 'Zona '.$posiciones.':', 1, 0, 0, true, 'C', true);
  $pdf->writeHTMLCell(60, 5, 135, '', $mkt_alt_h.' %HR', 1, 1, 0, true, 'C', true);
}

$pdf->writeHTMLCell(50, 5, 85, '', '<strong>promedio</strong>', 1, 0, 0, true, 'C', true);
$pdf->writeHTMLCell(60, 5, 135, '', $mkt_gen_alt_h.' %HR', 1, 1, 0, true, 'C', true);


$buscar_informes_final_h = mysqli_prepare($connect,"SELECT c.nombre, d.nombre FROM datos_crudos_general as a, mapeo_general_sensor as b, bandeja as c, informes_general AS d
WHERE a.id_sensor_mapeo = b.id_sensor_mapeo AND b.id_mapeo = ? AND b.id_bandeja = c.id_bandeja AND b.id_mapeo = d.id_mapeo AND tipo = 'HUM' 
GROUP BY c.nombre, d.nombre, c.id_bandeja ORDER BY c.id_bandeja ASC limit 1");
mysqli_stmt_bind_param($buscar_informes_final_h, 'i',  $id_mapeo_g);
mysqli_stmt_execute($buscar_informes_final_h);
mysqli_stmt_store_result($buscar_informes_final_h);
mysqli_stmt_bind_result($buscar_informes_final_h, $posiciones, $informed_h);

while($row = mysqli_stmt_fetch($buscar_informes_final_h)){
    $pdf->writeHTMLCell(180, 5, 15, '', 'Resultado de todas las alturas en el informe: '.$informed_h, 1, 1, 0, true, 'C', true);
}

$pdf->AddPage();

$txt = <<<EOD

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
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>7.0 OBSERVACIONES DEL MAPEO TÉRMICO</strong></H3></td></tr></TABLE>
<br><br>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$select_conclusion=mysqli_query($connect,"SELECT no_reporte, conclusion FROM reportes 
						    WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND no_reporte='$codigo_informe' AND id_servicio='$servicio'");
$p_c=mysqli_fetch_array($select_conclusion);
$conclusion_8_4=$p_c['conclusion'];

$txt = <<<EOD

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
  padding: 3px;
  vertical-align: middle;
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}
</style>
<br><br>
<table>
<tr><td width="5%">7.1</td>
<td width="95%" class="justificado">La $clasificacion_item al momento de la instalación de los sensores de mapeo térmico por
personal de CERCAL INGENIERIA SPA, se encontraba con $carga_bod% de carga
aproximadamente.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">7.2</td>
<td width="95%" class="justificado">Por la altura de la $clasificacion_item se consideran $alturas_generales niveles de ubicación de sensores, con el
fin de determinar el gradiente de temperatura: $zona_alt_a $zona_alt_m7 $zona_alt_m6 $zona_alt_m5 $zona_alt_m4 
$zona_alt_m3 $zona_alt_m2 $zona_alt_m $zona_alt_b, ubicados en $clasificacion_item de almacenamiento de $descrip_material.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">7.3</td>
<td width="95%" class="justificado">La propuesta y ubicación de los sensores fue analizada en conjunto con el $cargo.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">7.4</td>
<td width="95%" class="justificado">Es importante destacar que la información de la Humedad Relativa es sólo de carácter
informativo.</td></tr>
</table>
<br><br>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$listar_observaciones = mysqli_prepare($connect,"SELECT  observacion  FROM `observaciones_inb` WHERE id_informe = ?");
mysqli_stmt_bind_param($listar_observaciones, 'i',  $id_informe);
mysqli_stmt_execute($listar_observaciones);
mysqli_stmt_store_result($listar_observaciones);
mysqli_stmt_bind_result($listar_observaciones, $observacion);

$cont = 5;
while($row = mysqli_stmt_fetch($listar_observaciones)){
   
$txt = <<<EOD
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
  padding: 3px;
  vertical-align: middle;
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}
</style>

<table>
<tr><td width="5%">7.$cont</td>
<td width="95%" class="justificado">$observacion.</td></tr>
</table>
<br><br>

EOD;
$pdf->writeHTML($txt, true, false, false, false, '');  
  $cont++;
}


/*$select_vacio=mysqli_query($connect,"SELECT no_reporte, observacion FROM reportes 
						    WHERE num_ot='$num_ot' AND equipo_bodega='$no_equipo' AND no_reporte='$codigo_informe' AND id_servicio='$servicio'");
$procesa_vacio=mysqli_fetch_array($select_vacio);
$esnull=$procesa_vacio['observacion'];
if(is_null($esnull)===true)
{
	$nulificado="";
}
else
{
	$nulificado= <<<EOD
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
  padding: 3px;
  vertical-align: middle;
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

titlelist
{
 list-style-type: none;
 text-align: justify; 
}
</style>
	<table><tr><td width="5%" class="justificado">7.6</td>
	<td width="95%" class="justificado">$esnull</td></tr>
	</table>
	<br><br>
EOD;

$pdf->writeHTML($nulificado, true, false, false, false, '');
}*/


$txt = <<<EOD

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
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>8.0 CONCLUSIONES DEL MAPEO TÉRMICO</strong></H3></td></tr></TABLE>
<br><br>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$txt = <<<EOD

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
  padding: 3px;
  vertical-align: middle;
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}
</style>
<br><br>
<table>
<tr><td width="5%">8.1</td>
<td width="95%" class="justificado">Los resultados obtenidos corresponden a la muestra inspeccionada por CERCAL
INGENIERIA SPA al momento de la ejecución del Mapeo Térmico. Cualquier
modificación posterior a la ejecución del mapeo, invalida el presente informe.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">8.2</td>
<td width="95%" class="justificado">Los sensores utilizados en el mapeo térmico fueron calibrados y se ha determinado su
error e incertidumbre asociado.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">8.3</td>
<td width="95%" class="justificado">El análisis de riesgo presentado corresponde al realizado en el presente mapeo
térmico, el cual puede cambiar en la objetividad de la criticidad de los riesgos, de
acuerdo con los cambios que realice el $cargo.</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">8.4</td>
<td width="95%" class="justificado">$comentario</td></tr>
</table>
<br><br>


EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$pdf->AddPage();

$txt = <<<EOD

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
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>9.0 DOCUMENTACIÓN DEL MAPEO TÉRMICO</strong></H3></td></tr></TABLE>
<br><br>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$consultar_informes1 = mysqli_prepare($connect,"SELECT a.nombre FROM informes_general as a WHERE a.id_mapeo = ? AND tipo = 'TEMP'");
mysqli_stmt_bind_param($consultar_informes1, 'i', $id_mapeo_g);
mysqli_stmt_execute($consultar_informes1);
mysqli_stmt_store_result($consultar_informes1);
mysqli_stmt_bind_result($consultar_informes1, $info_temp);
mysqli_stmt_fetch($consultar_informes1);

$consultar_informes2 = mysqli_prepare($connect,"SELECT a.nombre FROM informes_general as a WHERE a.id_mapeo = ? AND tipo = 'HUM'");
mysqli_stmt_bind_param($consultar_informes2, 'i', $id_mapeo_g);
mysqli_stmt_execute($consultar_informes2);
mysqli_stmt_store_result($consultar_informes2);
mysqli_stmt_bind_result($consultar_informes2, $info_hum);
mysqli_stmt_fetch($consultar_informes2);


$consultar_informes3 = mysqli_prepare($connect,"SELECT a.nombre FROM informes_general as a WHERE a.id_mapeo = ? AND tipo = 'AR'");
mysqli_stmt_bind_param($consultar_informes3, 'i', $id_mapeo_g);
mysqli_stmt_execute($consultar_informes3);
mysqli_stmt_store_result($consultar_informes3);
mysqli_stmt_bind_result($consultar_informes3, $info_AR);
mysqli_stmt_fetch($consultar_informes3);



$firma=mysqli_query($connect,"SELECT firma FROM servicios_asignados where id_asignacion=$servicio");
$ax=mysqli_fetch_array($firma);
$firma_final=$ax["firma"];
if(mysqli_num_rows($firma)==0)
{
  $firma_final="Ing. $nombres $apellidos<br> $cargo - Cercal Group Spa.";  
}

$txt = <<<EOD

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
  padding: 3px;
  vertical-align: middle;
}
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}
</style>
<br><br>
<table>
<tr><td width="5%">9.1</td>
<td width="95%" class="justificado">Informe de Análisis estadístico: $codigo_informe</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.2</td>
<td width="95%" class="justificado">Informe de Mapeo térmico: $info_temp</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.3</td>
<td width="95%" class="justificado">Informes de Mapeo de porcentaje de Humedad Relativa $info_hum</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.4</td>
<td width="95%" class="justificado">Informe de Propuesta de Ubicación de Sensores</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.5</td>
<td width="95%" class="justificado">Informe de Análisis de Riesgo: N° Informe $info_AR</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.6</td>
<td width="95%" class="justificado">Datos crudos del Mapeo Térmico</td></tr>
</table>
<br><br>
<table>
<tr><td width="5%">9.7</td>
<td width="95%" class="justificado">Certificados de Calibración de datalogger utilizados en el Mapeo Térmico.</td></tr>
</table>
<br><br><br>

<table>
<tr><td><center><strong>$firma_final <br> CERCAL INGENIERÍA SpA.</center></strong></td></tr></table>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');
$pdf->AddPage();

$ruta="images/";
$foto1="images/".$num_ot."/servicio_".$servicio."/".$codigo_informe."_foto1.jpg";
$foto2="images/".$num_ot."/servicio_".$servicio."/".$codigo_informe."_foto2.jpg";
$foto3="images/".$num_ot."/servicio_".$servicio."/".$codigo_informe."_foto3.jpg";
$foto4="images/".$num_ot."/servicio_".$servicio."/".$codigo_informe."_foto4.jpg";

list($img_ancho1, $img_alto1, $type, $attr) = getimagesize($foto1);
if($img_ancho1>$img_alto1){$img_med1="width=250";}else{$img_med1="height=250";}

list($img_ancho2, $img_alto2, $type, $attr) = getimagesize($foto2);
if($img_ancho2>$img_alto2){$img_med2="width=250";}else{$img_med2="height=250";}

list($img_ancho3, $img_alto3, $type, $attr) = getimagesize($foto3);
if($img_ancho3>$img_alto3){$img_med3="width=250";}else{$img_med3="height=250";}

list($img_ancho4, $img_alto4, $type, $attr) = getimagesize($foto4);
if($img_ancho4>$img_alto4){$img_med4="width=300";}else{$img_med4="height=250";}

/*FOTOS DE LA BODEGA*/

$clasificacion_item_mayus = mb_strtoupper($clasificacion_item);
$txt = <<<EOD

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
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<table><tr><td colspan="2" bgcolor="#DDDDDD"><H3><strong>Anexo N° 1: FOTOGRAFÍAS DE LA $clasificacion_item_mayus</strong></H3></td></tr></TABLE>
<br><br>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$imagenes_informes = mysqli_prepare($connect,"SELECT  url  FROM imagenes_general_informe WHERE id_informe = ? AND tipo = 11");
mysqli_stmt_bind_param($imagenes_informes, 'i',  $id_informe);
mysqli_stmt_execute($imagenes_informes);
mysqli_stmt_store_result($imagenes_informes);
mysqli_stmt_bind_result($imagenes_informes, $url1);
mysqli_stmt_fetch($imagenes_informes);

if(mysqli_stmt_num_rows($imagenes_informes) > 0){
  $img_1 = '<img src="../../'.$url1.'" width="250px">';
}else{
  $img_1 = '<img src="../../../../design/images/no_imagen.png" width="200px">';
}

$imagenes_informes2 = mysqli_prepare($connect,"SELECT  url  FROM imagenes_general_informe WHERE id_informe = ? AND tipo = 22");
mysqli_stmt_bind_param($imagenes_informes2, 'i',  $id_informe);
mysqli_stmt_execute($imagenes_informes2);
mysqli_stmt_store_result($imagenes_informes2);
mysqli_stmt_bind_result($imagenes_informes2, $url2);
mysqli_stmt_fetch($imagenes_informes2);

if(mysqli_stmt_num_rows($imagenes_informes2) > 0){
  $img_2 = '<img src="../../'.$url2.'" width="250px">';
}else{
  $img_2 = '<img src="../../../../design/images/no_imagen.png" width="200px">';
}

$imagenes_informe3 = mysqli_prepare($connect,"SELECT  url  FROM imagenes_general_informe WHERE id_informe = ? AND tipo = 33");
mysqli_stmt_bind_param($imagenes_informe3, 'i',  $id_informe);
mysqli_stmt_execute($imagenes_informe3);
mysqli_stmt_store_result($imagenes_informe3);
mysqli_stmt_bind_result($imagenes_informe3, $url3);
mysqli_stmt_fetch($imagenes_informe3);

if(mysqli_stmt_num_rows($imagenes_informe3) > 0){
  $img_3 = '<img src="../../'.$url3.'" width="250px" >';
}else{
  $img_3 = '<img src="../../../../design/images/no_imagen.png" width="200px">';
}

$imagenes_informe4 = mysqli_prepare($connect,"SELECT  url  FROM imagenes_general_informe WHERE id_informe = ? AND tipo = 44");
mysqli_stmt_bind_param($imagenes_informe4, 'i',  $id_informe);
mysqli_stmt_execute($imagenes_informe4);
mysqli_stmt_store_result($imagenes_informe4);
mysqli_stmt_bind_result($imagenes_informe4, $url4);
mysqli_stmt_fetch($imagenes_informe4);

if(mysqli_stmt_num_rows($imagenes_informe4) > 0){
  $img_4 = '<img src="../../'.$url4.'" width="250px">';
}else{
  $img_4 = '<img src="../../../../design/images/no_imagen.png" width="200px">';
}


$txt = <<<EOD

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
.justificado
{
  text-align: justify;	
}
tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.biglist
{
 list-style-type: disc;
 text-align: justify;
}

.smallist
{
 list-style-type: circle;
 text-align: justify; 
}

.titlelist
{
 list-style-type: none;
 text-align: justify; 
}


</style>

<table>
<tr>
    <td width="320"><br><br>$img_1</td>
    <td width="320"><br>$img_2</td>
</tr>
<br>
<tr>
    <td width="320">$img_3</td>
    <td width="320">$img_4</td>
</tr>

</table>

EOD;
$pdf->writeHTML($txt, true, false, false, false, '');



  


$pdf->Output($nombre_informe_g.'.pdf', 'I');
mysqli_close($connect);
?>