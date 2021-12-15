<?php
require('../../../../recursos/protocoloencabezado.php');
require('../../../../config.ini.php');
$id_informe = $_GET['informe'];
$resultado_corresponde = "";
$posicion_sensores_indicativo = 1;


		/////////////////////////////////////////////////////////PASOS DE CREACIÓN DE PDF///////////////////////////////////////////////////////////

		// 1-CONSULTAR LA INFORMACIÓN LA CUAL SE IMPRIMIRA EN LAS CABECERAS Y EL NOMBRE DEL INFORME


$mostrar_imagen_3 = "";
if($query_35){
	$mostrar_imagen_3 = "<img src='../../$img_sensores_3' width='450px'>";
}




  /////////////////////////////////////////////////////////////INICIO INFORME////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$pdf->AddPage('A4');

$html = <<<EOD
<style>
table 
{
	border-collapse: collapse;
	width: 100%;
	text-align: center;
	vertical-align: center;
}

th 
{
	background-color: #3138AA;
	color: #FFFFFF;
	vertical-align: center;
}

th
{
	border: 1px solid #BBBBBB;
	padding: 3px;
	text-align: center;
	background-color: #a2a2a2;
	height: 20px;
}
td
{
	border: 1px solid #BBBBBB;
	padding: 3px;
	text-align: center;
	height: 55px;
}

tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.enunciado{
	text-align:left;
}
</style>
	<br>
	<br>
	<h3>FIRMAS DE RESPONSABILIDAD</h3>

	<br>
	<br>
	<br>
	<br>
	<p>Se registran en la siguiente tabla todas las personas que han intervenido en este Protocolo de Mapeo
	Térmico a Bodega Robótica (Módulo A12).</p>
	<br>
	<br>
	<table>
		<tr>
			<th>Preparado por:</th>
			<th>Cargo</th>
			<th>Firma</th>
			<th>Fecha</th>
		</tr>
		<tr>
			<td>Ing. Linda Paredes Abreu</td>
			<td>Senior Analyst CERCAL GROUP</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th>Preparado por:</th>
			<th>Cargo</th>
			<th>Firma</th>
			<th>Fecha</th>
		</tr>
		<tr>
			<td>Ing. Jonathan Ferrer</td>
			<td>Head of Technical and Training Solution LATAM CERCAL GROUP</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Juan Ignacio Flores</td>
			<td>Sr. Supervisor QA/RA MEDTRONIC</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th>Preparado por:</th>
			<th>Cargo</th>
			<th>Firma</th>
			<th>Fecha</th>
		</tr>
		<tr>
			<td>Juan Ignacio Flores</td>
			<td>Sr. Supervisor QA/RA MEDTRONIC</td>
			<td></td>
			<td></td>
		</tr>

	</table>
EOD;

$pdf->writeHTML($html, true, false, false, false, '');


$pdf->AddPage('A4');

$html_2 = <<<EOD
	<style></style>
		<style>
table 
{
	border-collapse: collapse;
	width: 100%;
	text-align: center;
	vertical-align: center;
}

th 
{
	background-color: #3138AA;
	color: #FFFFFF;
	vertical-align: center;
}

th
{
	border: 1px solid #BBBBBB;
	padding: 3px;
	text-align: center;
	background-color: #a2a2a2;
	height: 20px;
}
td
{
	border: 1px solid #BBBBBB;
	padding: 3px;
	text-align: center;
	height: 55px;
}

tr:nth-child(even) 
{
	background-color: #f2f2f2;
}

.enunciado{
	text-align:left;
}
</style>
	<br>
	<br>
	<h3 style="text-align: center; padding-bottom: 400px;">HISTÓRICO DE MODIFICACIONES</h3>
	<br>

	<table>
		<tr>
			<th>CÓDIGO DEL DOCUMENTO</th>
			<th>FECHA DE EMISIÓN</th>
			<th>MOTIVO DEL CAMBIO</th>
		</tr>
		<tr>
			<td>SCL-PC-MTR-BD-02</td>
			<td>19/08/2021</td>
			<td>Primera Versión</td>
		</tr>
		<tr>
			<td>SCL-PC-MTR-BD-02</td>
			<td>01/10/2021</td>
			<td>Segunda Versión</td>
		</tr>
	</table>
	<br>
	<br>
	<p>El motivo de segunda versión se debe a:</p><br>
<p>- Eliminación de la definición de productos farmacéuticos en punto (1.3), ya que el cliente
almacena Dispositivos Médicos y Sustancias Peligrosas.</p> <br>
<p>- Incluir productos que almacena el cliente en punto (1.1).</p> <br>
<P>- Indicar en punto (2) el tipo de muro y pared, altura de racks y niveles de almacenamiento.</P> <br>
<P>- Modificación de las tablas en los puntos: (4.1), (4.2), (4.3), (4.4), (4.5).</P> <br>
<P>- Modificación de cantidad de sensores instalados para la prueba de mapeo térmico, de 60 a 48
utilizados en la evaluación. <br></P>

EOD;

$pdf->writeHTML($html_2, true,false,false,false,'');
$pdf->AddPage('A4');


$txt= <<<EOD

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

p{
	text-aling:center;
}
</style>
	<br>
	<br>
	<h3 style="text-align: center;">ÍNDICE</h3>	

<p>
1 GENERALIDADES...........................................................................................................................................................................................5</p>
<p>&nbsp;&nbsp;&nbsp; <b>1.1 Objetivo</b> ...................................................................................................................................................................................................5</p>
<p>&nbsp;&nbsp;&nbsp; <b>1.2 Alcance</b> ....................................................................................................................................................................................................5</p>
<p>&nbsp;&nbsp;&nbsp; <b>1.3 Definiciones</b> ...........................................................................................................................................................................................5</p>
<p>&nbsp;&nbsp;&nbsp; <b>1.4 Normas y/o Especificaciones</b> ...........................................................................................................................................................6</p>
<p>&nbsp;&nbsp;&nbsp; <b>1.5 Responsabilidades</b> ..............................................................................................................................................................................7</p>
<p>2 DESCRIPCIÓN DE LA BODEGA..................................................................................................................................................................8</p>
<p>3 PROCEDIMIENTOS PARA MAPEO TÉRMICO.........................................................................................................................................8</p>
<p>4 DESCRIPCIÓN PARA MAPEO TÉRMICO.................................................................................................................................................9</p>
<p>5 ANEXO.............................................................................................................................................................................................................18</p>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');




$pdf->AddPage('A4');

$txt= <<<EOD


<style type="">
p{
    font-size: 	17px;			
}
</style></style>

<h1>1 GENERALIDADES</h1>
<br>	
<br>	
<h2>1.1 OBJETIVO</h2>
<br>	
<p>Asegurar que la bodega identificada como BODEGA ROBÓTICA (MÓDULO 12), cumple con las
especificaciones térmicas y de humedad relativa de almacenamiento detalladas en la documentación
técnica provista de sus productos (Dispositivo Médicos y Sustancias Peligrosas), entregada por
<b>MEDTRONIC</b>, y declaradas a la Autoridad Regulatoria.</p>
<br>	
<br>	
<br>	
<h2>1.2 ALCANCE</h2>
<br>	
<p>El presente protocolo de bodega “condiciones térmicas y de humedad de almacenamiento” aplica a:</p>
<p>&nbsp;&nbsp;&nbsp;	• Bodega de Dispositivos Médicos y Sustancias Peligrosas.</p>
<p>Ubicado(a) en:</p>
<p>&nbsp;&nbsp;&nbsp;   • Lo Boza N° 107 Módulo A12), Pudahuel.</p>
<br>	
<br>	
<br>	
<h2>1.3 DEFINICIONES</h2>
<br>	
<p><b>Procedimiento Operativo Estándar (SOP):</b> Un conjunto de instrucciones que abarca aquellas
características de las operaciones que se prestan a un procedimiento normalizado definido o sin
pérdida de eficacia. Políticas y procedimientos operativos estándar pueden ser catalizadores eficaces
para impulsar la mejora del rendimiento y mejorar los resultados organizacionales.</p>
<br>	
<p><b>TEMPERATURA CINÉTICA MEDIA (MKT):</b> Mean Kinetic Temperature acrónimo en inglés (MKT) es
una manera teórica de ponderar el efecto de una excursión de temperatura (es decir, una desviación respecto de la temperatura normal de funcionamiento) en un proceso/equipo/sistema. Debido a su
componente matemático, el MKT, es útil para temperaturas por encima de los 0 °C.
</p>

EOD;

$pdf->writeHTML($txt, true, false, false, false, '');
$pdf->AddPage('A4');
$txt_2= <<<EOD
<style type="">
p{
    font-size: 	17px;			
}
</style>
<br>	
<p><b>Temperatura de Almacenamiento:</b> El rango de temperatura aparece en la etiqueta PFSTT, y dentro
de las presentaciones regulatorias, para almacenamiento a largo plazo.</p>
<br>	
<p><b>Temperatura Controlada:</b> Incluye cualquier entorno en el que la temperatura sea activamente o
pasivamente controlado en un nivel diferente de la del medio ambiente circundante dentro de los
límites predefinidos.</p>
<br>
<p><b>Producto Farmacéutico sensible al tiempo y la temperatura (PFSTT):</b> Cualquier producto que cuando
no se almacenan o transportan dentro de las condiciones ambientales predefinidos y/o dentro de los
límites de tiempo predefinido, se degrada en la medida en que ya no realiza a lo destinado
originalmente.</p>
<br>
<h2>1.4 NORMAS Y/O ESPECIFICACIONES</h2>
<ul>
<li type="square"><p> NORMA TÉCNICA N° 147 DEL MINSAL: “Buenas Prácticas de Almacenamiento y Distribuciónpara Droguerías y Depósitos de Productos Farmacéuticos de Uso Humano”.</p></li>
<li type="square"><p> NORMA TÉCNICA N° 127 DEL MINSAL: “Buenas Prácticas de Manufactura”.</p></li>
<li type="square"><p> WHO Technical Report Series 992, 2015: Suplemento 8 del Anexo 5, “Temperature Mapping of Storage areas”.</p></li>
<li type="square"><p> WHO 961-2015: Temperature Mapping of Storage Areas</p></li>
<li type="square"><p> USP 44 C1079: Good Storage and Distribution Practices for Drug Products</p></li>
<li type="square"><p> USP 44 C659: Packaging and Storage Requirements</p></li>
<li type="square"><p> Resolución Exenta N°6590 de fecha 14/12/2018, Guía para Realizar el Mapeo Térmico de Áreas de Almacenamiento.</p></li>
</ul>

EOD;

$pdf->writeHTML($txt_2, true, false, false, false, '');


$pdf->AddPage('A4');
$txt_3= <<<EOD
<style type="">
p{
    font-size: 	15px;			
}
</style>
<br>
<h2>1.5 RESPONSABILIDADES</h2>
<br>

<p>MEDTRONIC., será responsable junto a CERCAL GROUP, designado en la ejecución del presente
protocolo de mapeo térmico.</p>
<br>
<br>
<p><u>Es responsabilidad de CERCAL GROUP:</u></p>
<p>&nbsp;&nbsp;− La redacción del presente protocolo de mapeo.</p>
<p>&nbsp;&nbsp;− El registro de las pruebas presentes en este protocolo, y su corrección si fuese necesario.</p>
<p>&nbsp;&nbsp;− El registro de las observaciones y cambios detectados durante la ejecución del protocolo.</p>
<p>&nbsp;&nbsp;− La emisión del protocolo final.</p>
<br>

<p><u>Es responsabilidad de MEDTRONIC:</u></p>
<br>
<p>− La revisión del presente protocolo de mapeo térmico y de humedad relativa.</p>
<p>− La entrega de la información técnica correspondiente a la Bodega Robótica (Módulo A12).</p>
<p>− La aprobación final del protocolo de mapeo de bodega.</p>

<p><u>Es responsabilidad del equipo conjunto de MEDTRONIC y CERCAL GROUP:</u></p>

<p>Todas las personas responsables de ejecutar, revisar y aprobar las distintas actividades mencionadas
anteriormente deberán registrarse en el cuadro de firmas de responsabilidad, ubicado en la página 2
del presente documento.</p>


EOD;
$pdf->writeHTML($txt_3, true, false, false, false, '');

$pdf->AddPage('A4');

$menor = 'oooooo';
$txt_4= <<<EOD
<style type="">
p{
    font-size: 	15px;			
}
</style>
<h1>2 DESCRIPCIÓN DE LA BODEGA</h1>
<br>
<p>La bodega identificada como Bodega Robótica (Módulo A12), ubicado en Lo Boza N° 107, (Módulo A12)
Pudahuel, almacena: Dispositivos Médicos y Sustancias Peligrosas.</p>
<br>
<p>El almacenamiento al interior de la Bodega Robótica no cuenta con racks de almacenamiento; la
especificación de temperatura de almacenamiento es de 15°C a 30 °C y una especificación de humedad relativa de $menor 95% en general. </p>
<br>
<p>En su totalidad registra un largo de 32.5 m, ancho de 16.3 m, un volumen de 5.300 m3, una superficie
de 530 m2, y una altura de 10 m. La infraestructura de Bodega Robótica está construida con un cielo de planchas metálicas y con muro de hormigón.</p>
<br>
<p>La bodega robótica (módulo A12) no cuenta con sistema de HVAC.</p>
<br>
<h2>3 PROCEDIMIENTOS PARA MAPEO TÉRMICO</h2>
<br>
<p>Encontrándose el protocolo de bodega aprobado, se comenzará con la instalación de sensores para el
mapeo térmico.</p>
<br>
<p>La descripción del mapeo térmico y de humedad relativa para la BODEGA ROBÓTICA (MÓDULO A12).</p>

EOD;

$pdf->writeHTML($txt_4, true, false, false, false, '');



$pdf->AddPage('A4');

$txt_5= <<<EOD
<style>
<style type="">
p{
    font-size: 	15px;			
}
tr,th{
	height: 20px;
}
table{
	text-align: center;
	width: 919.3px;
	padding: 2px 2px 2px 2px;
}
.number{
	width: 25px;
	text-align: center;	
}
b{
	font-size: 15px;
}
.observaciones{
	text-align:left; 
}
.cuadrado {
     width: 100px; 
     height: 100px; 
     background: #428bca;
}
</style>
<br>
<h1>4 DESCRIPCIÓN PARA MAPEO TÉRMICO</h1>
<br>
<p><b>4.1</b> En primera instancia se realizará una inspección visual de la bodega para comprobar que la
información y los documentos internos sean coincidente con los datos obtenidos en el levantamiento
técnico.</p>
<br>
<table border="1">
	<tr>
		<th class="number"><b>N°</b></th>
		<th><b>Datos de identificación</b></th>
		<th><b>Especificación</b></th>
	</tr>
	<tr>
		<td class="number"><p>1</p></td>
		<td><p>Almacenamiento</p></td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td class="number"><p>2</p></td>
		<td><p>Ubicación</p></td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td class="number"><p>3</p></td>
		<td><p>Tipo de muro</p></td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td><p>4</p></td>
		<td><p>Tipo de cielo</p></td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td><p>5</p></td>
		<td><p>Volumen</p></td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td><p>6</p></td>
		<td><p>Superficie</p></td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td><p>7</p></td>
		<td><p>Altura Máx. de Almacenamiento</p></td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td><p>8</p></td>
		<td><p>Altura de la Bodega</p></td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td colspan="3" class="observaciones"><b>Observaciones:{}</b><br>{}</td>
	</tr>
	<tr>
		<td colspan="3" style="height: 60px;text-align: left;">
			<p>Desviaciones:</p>
			<p><b>{}</b></p>
		</td>
	</tr>
	<table border="0" style="border-left: 1px solid #000; border-right: 1.1px solid #000;width:637.9px">
		<tr><td></td></tr>
	 <tr>
		<td style="width: 140.1px;text-align: left"><b>Resultado</b></td>
		<td style="width: 60px;">CUMPLE</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
		<td style="width: 80px;text-align: left;">NO CUMPLE</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
		<td style="width: 80px;text-align: left">NO APLICA</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
	 </tr>
    </table>
    <table border="1" style="text-align: left;">
	<tr>
		<td><b>Realizado por:</b></td>
		<td><b>Verificado por:</b></td>
	</tr>
	<tr>
		<td style="height: 50px;"><p>Firma:</p></td>
		<td style="height: 50px;"><p>Firma:</p></td>
	</tr>
	<tr>
		<td style="height: 50px;"><p>Fecha:</p></td>
		<td style="height: 50px;"><p>Fecha:</p></td>
	</tr>
</table>
    </table>


EOD;
$pdf->writeHTML($txt_5, true, false, false, false, '');

$pdf->AddPage('A4');

$txt_6= <<<EOD
<style type="">
p{
    font-size: 	15px;			
}
tr,th{
	height: 20px;
}
table{
	text-align: center;
	width: 817.3px;
	padding: 2px 2px 2px 2px;
}
.number{
	width: 25px;
	text-align: center;	
}
b{
	font-size: 15px;
}
.observaciones{
	text-align:left; 
}
.cuadrado {
     width: 100px; 
     height: 100px; 
     background: #428bca;
}
.informacion{
	height: 50px;
}
.left{
	text-align: left;
}

</style>
<br>
<p><b>4.2</b>  Se verifica que la documentación necesaria para el funcionamiento de la bodega esté presente</p>
<br>
<table border="1">
	<tr>
		<th class="number"><b>N°</b></th>
		<th><b>Documentación</b></th>
		<th><b>Especificación</b></th>
		<th><b>Ubicación</b></th>
	</tr>
	<tr>
		<td class="number"><p>1</p></td>
		<td class="informacion"><p>Almacenamiento</p></td>
		<td class="left">
			<p>Nombre: {}</p>
			<p>Código: {}</p>
		</td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td class="number"><p>2</p></td>
		<td class="informacion"><p>Ubicación</p></td>
		<td class="left">
			<p>Nombre: {}</p>
			<p>Código: {}</p>
		</td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td class="number"><p>3</p></td>
		<td class="informacion"><p>Tipo de muro</p></td>
		<td class="left">
			<p>Nombre: {}</p>
			<p>Código: {}</p>
		</td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td colspan="4" class="observaciones"><b>Observaciones:{}</b><br>{}</td>
	</tr>
	<tr>
		<td colspan="4" style="height: 60px;text-align: left;">
			<p>Desviaciones:</p>
			<p><b>{}</b></p>
		</td>
	</tr>
	
	<table border="0" style="border-left: 1px solid #000; border-right: 1.1px solid #000;width:637.9px">
		<tr><td></td></tr>
	 <tr>
		<td style="width: 140.1px;text-align: left"><b>Resultado</b></td>
		<td style="width: 60px;">CUMPLE</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
		<td style="width: 80px;text-align: left;">NO CUMPLE</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
		<td style="width: 80px;text-align: left">NO APLICA</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
	 </tr>
    </table>
    <table border="1" style="text-align: left;">
	<tr>
		<td><b>Realizado por:</b></td>
		<td><b>Verificado por:</b></td>
	</tr>
	<tr>
		<td style="height: 50px;"><p>Firma:</p></td>
		<td style="height: 50px;"><p>Firma:</p></td>
	</tr>
	<tr>
		<td style="height: 50px;"><p>Fecha:</p></td>
		<td style="height: 50px;"><p>Fecha:</p></td>
	</tr>
</table>
    </table>


EOD;
$pdf->writeHTML($txt_6, true, false, false, false, '');

$pdf->AddPage('A4');

$txt_6= <<<EOD
<style type="">
p{
    font-size: 	15px;			
}
tr,th{
	height: 20px;
}
table{
	text-align: center;
	width: 656.3px;
	padding: 2px 2px 2px 2px;
}
.number{
	width: 25px;
	text-align: center;	
}
b{
	font-size: 15px;
}
.observaciones{
	text-align:left; 
}
.cuadrado {
     width: 100px; 
     height: 100px; 
     background: #428bca;
}
.informacion{
	height: 70px;
}
.left{
	text-align: left;
}


</style>
<br>
<p><b>4.3</b>Verificar que los sensores de monitoreo se encuentren calibrados o verificados.</p>
<br>
	<table border="1"  >
		<tr>
			<th rowspan="2" class="number">N°</th>
			<th rowspan="2"><b>Instrumento</b></th>
			<th style="width: 175.3;" rowspan="2"><b>Función</b></th>
			<th colspan="3"><b>Especificación</b></th>
		</tr>
		<tr>
			<th style="width: 128.7px;"><b>sensor</b></th>
			<th style="width: 128.7px;"><b>ubicación</b></th>
			<th style="width: 70px;"><b>altura</b></th>
		</tr>
		<tr>
			<td class="informacion"><p>1</p></td>
			<td><p>Sensor de temperatura/alarma</p></td>
			<td><p>{}</p></td>
			<td><p>{}</p></td>
			<td><p>{}</p></td>
			<td><p>{}</p></td>
		</tr>
		<tr>
			<td class="informacion"><p>2</p></td>
			<td><p>Sensor de humedad relativa/alarma</p></td>
			<td><p>{}</p></td>
			<td><p>{}</p></td>
			<td><p>{}</p></td>
			<td><p>{}</p></td>
		</tr>
		<tr>
			<td class="informacion"><p>2</p></td>
			<td><p>Sensor de humedad relativa/alarma</p></td>
			<td><p>{}</p></td>
			<td><p>{}</p></td>
			<td><p>{}</p></td>
			<td><p>{}</p></td>
		</tr>
	<tr>
		<td colspan="6" class="observaciones"><b>Observaciones:{}</b><br>{}</td>
	</tr>
	<tr>
		<td colspan="6" style="height: 60px;text-align: left;">
			<p>Desviaciones:</p>
			<p><b>{}</b></p>
		</td>
	</tr>
	
	<table border="0" style="border-left: 1px solid #000; border-right: 1.1px solid #000;width:637.9px">
		<tr><td></td></tr>
	 <tr>
		<td style="width: 140.1px;text-align: left"><b>Resultado</b></td>
		<td style="width: 60px;">CUMPLE</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
		<td style="width: 80px;text-align: left;">NO CUMPLE</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
		<td style="width: 80px;text-align: left">NO APLICA</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
	 </tr>
    </table>
    <table border="1" style="text-align: left;">
	<tr>
		<td><b>Realizado por:</b></td>
		<td><b>Verificado por:</b></td>
	</tr>
	<tr>
		<td style="height: 50px;"><p>Firma:</p></td>
		<td style="height: 50px;"><p>Firma:</p></td>
	</tr>
	<tr>
		<td style="height: 50px;"><p>Fecha:</p></td>
		<td style="height: 50px;"><p>Fecha:</p></td>
	</tr>
</table>
    </table>


EOD;
$pdf->writeHTML($txt_6, true, false, false, false, '');

$pdf->AddPage('A4');


/////////////
$txt_8= <<<EOD
<style>
<style type="">
p{
    font-size: 	15px;			
}
tr,th{
	height: 20px;
}
table{
	text-align: center;
	width: 638px;
	padding: 2px 2px 2px 2px;
}
b{
	font-size: 15px;
}
.observaciones{
	text-align:left; 
}
.cuadrado {
     width: 100px; 
     height: 100px; 
     background: #428bca;
}
.informacion{
	height: 50px;
}
.left{
	text-align: left;
}
</style>
<br>
<p><b>4.4</b>Verificar los servicios de apoyo – Sistema de Climatización.</p>
<br>
<table class="table" border="1"  >
	<tr>
		<th colspan="2" style="text-align: center;"><p>Servicios de Apoyo – Sistema de Climatización</p></th>
	</tr>
	<tr>
		<td><p>Climatización</p></td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td><p>Marca</p></td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td><p>Seteo de temperatura</p></td>
		<td><p>{}</p></td>
	</tr>
	<tr>
		<td><p>Documentación de Calificación o commissioning</p></td>
		<td><p>{}</p></td>
	</tr>

	<tr>
		<td colspan="4" class="observaciones"><b>Observaciones:{}</b><br>{}</td>
	</tr>
	<tr>
		<td colspan="4" style="height: 60px;text-align: left;">
			<p>Desviaciones:</p>
			<p><b>{}</b></p>
		</td>
	</tr>
	
	<table border="0" style="border-left: 1px solid #000; border-right: 1.1px solid #000;width:637.9px">
		<tr><td></td></tr>
	 <tr>
		<td style="width: 140.1px;text-align: left"><b>Resultado</b></td>
		<td style="width: 60px;">CUMPLE</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
		<td style="width: 80px;text-align: left;">NO CUMPLE</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
		<td style="width: 80px;text-align: left">NO APLICA</td>
		<td style="width: 33.7px;"><div style="width: 5px; height: 3px; border: 1px solid #000;margin: 11px"></div></td>
		<td style="width: 60px;"></td>
	 </tr>
    </table>
    <table border="1" style="text-align: left;">
	<tr>
		<td><b>Realizado por:</b></td>
		<td><b>Verificado por:</b></td>
	</tr>
	<tr>
		<td style="height: 50px;"><p>Firma:</p></td>
		<td style="height: 50px;"><p>Firma:</p></td>
	</tr>
	<tr>
		<td style="height: 50px;"><p>Fecha:</p></td>
		<td style="height: 50px;"><p>Fecha:</p></td>
	</tr>
</table>
    </table>

EOD;
$pdf->writeHTML($txt_8, true, false, false, false, '');


$pdf->Output('Algo.pdf', 'I');
?>