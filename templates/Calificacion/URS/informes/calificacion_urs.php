<?php 
require('../../../../recursos/ursencabezado.php');
require('../../../../config.ini.php');

$a = "REQUERIMIENTOS DE USUARIO (URS)";
$nombre_informe = "COL-URS-BOM-2021-CF-01";

/*Pagina 1 logo y nombre del informe*/
$pdf->AddPage('A4');

$logo = <<<EOD

<style type="text/css">

</style>
<br>
<br>
<br>
<br>
<br>
<table style="width: 100%;" border="0">
	<tr>
		<td style="width: 2%;"></td>
		<td style="width: 96%">
			<table border="2" class="caja1" style="padding: 5px; width: 100%" >
				<tr>
					<td style="height: 400px">			
						<table border="2">
							<tr>
								<td style="height: 399; width: 100%">
									<table border="0" >
										<br><br><br>
										<tr>
											<td style="width: 5%;"></td>
											<td style="text-align: center; justify-content: center;height: 200px;width: 90%"><img src="../../../../recursos/logo_big.png" style="width: 400px;"></td>
											<td style="width: 5%"></td>
										</tr>
										
										<tr>
											<td style="width: 10%"></td>
											<td style="text-align: center; width: 80%"><h1>REQUISITOS DE USUARIO (URS)</h1></td>
											<td style="width: 10%"></td>
										</tr>
										<br>							
										<tr>
											<td style="width: 10%"></td>
											<td style="text-align: center; width: 80%"><h1>CUARTO FRÍO RECEPCIÓN DIAGNÓSTICA</h1></td>
											<td style="width: 10%"></td>
										</tr>
										<br>
										<br>
										<br>						
										<tr>
											<td style="width: 10%"></td>
											<td style="text-align: center; width: 80%"><h1>BOMI GROUP</h1></td>
											<td style="width: 10%"></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
		   </table>
		</td>
		<td style="width: 2%"></td>
	</tr>
	
</table>

EOD;  
$pdf->writeHTML($logo, true, false, false, false, '');

/*Pagina 2 cuadro de firmas*/
$pdf->AddPage('A4');



 $pdf->writeHTMLCell(200, 5, 15, '', '<br><br><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRMAS DE RESPONSABILIDAD</h3>' ,0,0,0, true, 'J', true);

/*aqui van las firmas de responsabilidad */



/*Pagina 3 INDICE*/
$pdf->AddPage('A4');


$array_indice = array(

	'1.','2.','3.','','4.','5.','','','','','','','','','','','','','','','','','','','','','','','','6.','7.','','','','','','','','','','','','','','','','','','','8','','','','','9.','','','','','10'

);

$array_subindice = array(
	'','','',3.1,'','',5.1,5.2,5.3,5.4,5.5,5.6,5.7,5.8,5.9,'5.10',5.11,5.12,5.13,5.14,5.15,5.16,5.17,5.18,5.19,5.20,5.21,5.22,5.23,'','',7.1,7.2,7.3,7.4,7.5,7.6,7.7,7.8,7.9,'7.10',7.11,7.12,7.13,7.14,7.15,7.16,7.17,7.18,'',8.1,8.2,8.3,8.4,'',9.1,9.2,9.3,9.4,''
);

$array_contenido = array(
	'Objetivo ..............................................................................................................................................................',
	'Introducción .......................................................................................................................................................',
	'Alcance ..............................................................................................................................................................',
		'Descripción del Sistema ..................................................................................................................................',
	'Referencias  .......................................................................................................................................................',
	'Glosario ..............................................................................................................................................................',
		'Mapeos térmicos de temperatura....................................................................................................................',
		'Equipo.................................................................................................................................................................',
		'Instalación...........................................................................................................................................................',
		'Requerimientos de usuario (URS)...................................................................................................................',
		'Requerimientos Funcionales (FRS)................................................................................................................',
		'Requerimientos técnicos (TRS).......................................................................................................................',
		'Proceso de recepción........................................................................................................................................',
		'Proceso de almacenamiento............................................................................................................................',
		'Proceso de dispensación..................................................................................................................................',
		'Proceso de fabricación.....................................................................................................................................',
		'Cuarto frio...........................................................................................................................................................',
		'Cuarto de Congelación.....................................................................................................................................',
		'Precámara de tránsito o Alistamiento ............................................................................................................',
		'Cadena de frio...................................................................................................................................................',
		'Calificación ........................................................................................................................................................',
		'Validación...........................................................................................................................................................',
		'Verificación ........................................................................................................................................................',
		'Sistema internacional de medidas ..................................................................................................................',
		'Documentación As-Built (Documentación fin de obra).................................................................................',
		'P&ID (piping and instrumentation diagram/drawing)....................................................................................',
		'PLC (Programmable Logic Controller)............................................................................................................',
		'Commissioning (Comisionamiento).................................................................................................................',
		'Ciclo de vida.......................................................................................................................................................',
	'Explicación global de los Requerimientos (fuente de requerimientos)........................................................',
	'Requerimientos Operacionales........................................................................................................................',
		'Requerimientos Funcionales............................................................................................................................',
		'Capacidad..........................................................................................................................................................',
		'Condiciones de Trabajo....................................................................................................................................',
		'Montaje del Equipo............................................................................................................................................',
		'Condiciones Back Up........................................................................................................................................',
		'Requerimientos No Funcionales......................................................................................................................',
		'Uso Previsto.......................................................................................................................................................',
		'Requerimientos Técnicos.................................................................................................................................',
		'Requerimientos de Calidad..............................................................................................................................',
		'Requerimientos Ambientales...........................................................................................................................',
		'Requerimientos Seguridad y Salud en el Trabajo.........................................................................................',
		'Requerimientos Seguridad en la cadena de Suministro e integridad de la mercancía.............................',
		'Requerimientos de sistemas de control..........................................................................................................',
		'Requerimientos de sistemas de Alarma.........................................................................................................',
		'Requerimientos de sistemas de detección de condiciones..........................................................................',
		'Requerimientos de sistema de control............................................................................................................',
		'Datos...................................................................................................................................................................',
		'Ambiente.............................................................................................................................................................',
	'Restricciones .....................................................................................................................................................',
		'Hitos y Plazos ....................................................................................................................................................',
		'Disponibilidad del equipo .................................................................................................................................',
		'Restricciones al procedimiento........................................................................................................................',
		'Mantenimiento....................................................................................................................................................',
	'Ciclo de Vida del equipo...................................................................................................................................',
		'Desarrollo............................................................................................................................................................',
		'Pruebas...............................................................................................................................................................',
		'Entrega...................................................................................................................................................................',
		'Soporte técnico..................................................................................................................................................',
	'Archivos adjuntos..............................................................................................................................................'	




);

$array_pagina = array(
	6,6,6,6,6,7,7,7,7,7,7,8,8,8,8,8,8,9,9,9,9,9,9,9,9,10,10,10,10,10,10,11,12,12,12,12,12,12,14,15,14,14,15,15,16,16,16,16,16,17,17,17,17,17,18,18,18,19,19,19


);
$pdf->writeHTMLCell(140, 2, 43, '','<br><h2>INDICE</h2><br>', 0, 1, 0, true, 'C', true);
for ($i=0; $i < count($array_subindice); $i++) { 

	if ($i == 28) {

		$pdf->AddPage('A4');
	}
	
$pdf->writeHTMLCell(6.4, 6, 25, '',$array_indice[$i], 0, 0, 0, true, 'J', true);
$pdf->writeHTMLCell(8.1, 6, 29, '',$array_subindice[$i], 0, 0, 0, true, 'J', true);
$pdf->writeHTMLCell(140, 6, 37, '',$array_contenido[$i], 0, 0, 0, true, 'J', true);
$pdf->writeHTMLCell(10, 6, 175, '',$array_pagina[$i], 0, 1, 0, true, 'J', true);

}


$pdf->AddPage('A4');

$linea = <<<EOD
>
	

<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<h3>1.  Objetivo</h3>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p style="color: red;">
			El presente documento relaciona los requerimientos y necesidades trasmitidas por ((PRODUCTOS
			ROCHE S.A)) a la compañía ((BIOMEDICAL DISTRIBUTION SL LTDA)) para la ejecución de actividades
			de carácter logístico los cuales incluyen procesos y equipos para almacenamiento.</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br><br>
<table border="1">	
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<h3>2.  Introducción</h3>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p style="color: red;">
			Este documento es generado para ((BIOMEDICAL DISTRIBUTION SL LTDA)) con el fin de especificar
			los requisitos de usuario trasmitidos por ((PRODUCTOS ROCHE S.A)) para el ((CUARTO DERECEPCIÓN DIAGNÓSTICA))
			de su Bodega de operación logística ubicada en ((Km 1.5 Vía Siberia - Tenjo Bodegas: B1, B2, B12 y B13. 
			Terminales logísticos de Colombia, en las instalaciones de BOMI
			de uso exclusivo para la operación logística de ROCHE)).
		</p><br>
		<p style="color: blue">La función de ((...))</p><br>
		<p style="color: blue">Realizar recepción de producto tipo dispositivos médicos y reactivos de diagnóstico el cual va a
		  estar en este almacenamiento de forma temporal que requieran una temperatura del rango 2°C a 8°C.</p>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br><br>
<table border="1">	
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<h3>3.  Alcance</h3>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p style="color: red;">
			Este documento aplica para el ((CUARTO DE RECEPCIÓN DIAGNÓSTICA)) de ((BIOMEDICAL
			DISTRIBUTION SL LTDA)) ubicado en ((Km 1.5 Vía Siberia - Tenjo Bodegas: B1, B2, B12 y B13.Terminales logísticos de Colombia, 
			en las instalaciones de BOMI de uso exclusivo para la operación logística de ROCHE.))
		</p><br>
		<p style="color: red">Este cuarto puede ser identificado en el ANEXO 1 Plano de ONE SITE ROCHE con el código CF-01.</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br><br>
<table border="1">	
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<span style="font-size: 14px;"><strong>3.1</strong></span>  <i>Descripción del Sistema</i>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p style="color: red;">
			El Cuarto Frio debe mantener las condiciones adecuadas de los productos terminados que
			requieren almacenarse en una temperatura del rango 2°C a 8°C. Esto se cumplirá a través de un
			sistema de refrigeración donde los componentes principales son el compresor del chiller,
			condensador del chiller, evaporador y sistema de control de temperatura.
			<br><br>
			El sistema de refrigeración operara mediante el agua glicolada y gas refrigerante que llega caliente
			del cuarto frio al intercambiador de placas en donde por medio del compresor del chiller disminuye
			la carga térmica del gas refrigerante y del agua glicolada, posteriormente el agua glicolada es
			bombeada a los evaporadores en donde se realiza la transferencia de calor con el medio ambiente
			del cuarto frio para calentarse de nuevo y se repite el ciclo.
		</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br><br>
<table border="0">	
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<h3>4. Referencias</h3>
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p>
			• Comité de Expertos De La Organización Mundial De La Salud, En Especificaciones Para Las
			Preparaciones Farmacéuticas, “Buenas Prácticas de Manufactura Vigentes”, Serie de Informes
			técnicos de la O.M.S., Informe 37 de la Organización Mundial de la Salud, Ginebra.
		</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->AddPage('A4');

//Resoluciones
   $pdf->writeHTMLCell(30, 5, 28.5, '', '• '.'Ejemplo1' ,0,1, 0, true, 'J', true);
   $pdf->writeHTMLCell(30, 5, 28.5, '', '• '.'Ejemplo2' ,0,1, 0, true, 'J', true);


$linea = <<<EOD
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<h3>5.  Glosario</h3>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br><br>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');
//lISTADO DEL GLOSARIO
for ($i=1; $i < 5; $i++) { 
	
$pdf->writeHTMLCell(150, 5, 28.5, '', '5.'.$i.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ejemplo'.$i ,1,1, 0, true, 'J', true);
}

$linea = <<<EOD
<br><br>
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<h3>6.  Explicación global de los Requerimientos (fuente de requerimientos)</h3>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p style="color:red">
			PRODUCTOS ROCHE S.A en el año 2020 abrió proceso de licitación para la prestación de los
			servicios logísticos el cual incluye el manejo de productos de temperatura controlada en el
			almacenamiento y se describió en el documento RFP (Anexo: Archivos adjuntos) de la licitación
			algunos requerimientos relacionados con el proceso logístico y el manejo de cadena de frio de estos
			productos.
			Para la licitación se presentó BIOMEDICAL DITRIBUTION SL LTDA a quien se le adjudico la
			licitación de PRODUCTOS ROCHE S.A y se establecieron los seguimientos adicionales relacionados
			con la operación logística mediante las políticas K del cliente ROCHE.
			Adicionalmente algunos de los requerimientos de este documento son generados por estándares
			globales de BIOMEDICAL DISTRIBUTION SL LTDA plasmados dentro de sus procedimientos
			internos.</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br><br>
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<h3>7.  Requerimientos Operacionales</h3>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p style="color:red">
			Indica los requerimientos operativos: funciones del sistema, datos e interfaces. También definirá
			el entorno en el que debe operar el sistema. Los requerimientos críticos se identificarán
			específicamente como tales. Se pueden incluir descripciones de proceso o diagramas de flujo según
			corresponda.</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br><br>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->AddPage('A4');

$linea = <<<EOD
<br><br>
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<i><span style="font-size: 14px;"><strong>7.1</strong></span>  Requerimientos Funcionales</i>		
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p><i>7.1.1 &nbsp;Modos de funcionamiento</i></p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p>	
			 Un operador realizará el seguimiento y mantenimiento de los parámetros del equipo durante las
			 operaciones normales. Los empleados deben ser capacitados regularmente.
			 Se espera que el sistema de refrigeración del equipo opere tanto de forma automática como manual
			 para su funcionamiento diario (operación normal) o para arranque del equipo (modo partida) o
			 cuando se detecten aumentos o disminución según los parámetros del equipo (modo de detección).
			 Los requisitos de funcionalidad operativa que debe cumplir el sistema son:
			 Temperatura de operación:
			 Los equipos de refrigeración deben ser capaces de mantener todo el volumen de la cámara en una
			 temperatura del rango ((2°C a 8°C, durante las 24 horas del día los 7 días a la semana sin
			 interrupción.))</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br><br>
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p><i>7.1.2 &nbsp;Modos de funcionamiento</i></p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p style="color:red">
			 En el caso de una falla eléctrica, el equipo y la operación debe dar como prioridad la protección del
			 producto, es importante tomar las precauciones para hacer un almacenamiento correcto y que
			 proporcione los cuidados necesarios, para esto el cuarto debe estar construido de materiales
			 adecuados para mitigar la perdida de frio según el tiempo determinado en la calificación PQ para
		  	 corte de energía, así como tener sistemas de back up de la siguiente manera:</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

//LISTADO DE LOS BAKUPS
  $pdf->writeHTMLCell(140, 5, 40, '', '• '.'➢ El sistema de refrigeración debe permitir la continuidad del sistema de refrigeración
si falla alguna de las partes criticas como condensadores, evaporadores y compresores.' ,0,1, 0, true, 'J', true);

$linea = <<<EOD
<br><br>
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p><i>7.1.3 &nbsp;Seguridad y enclavamiento:</i></p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p>Deben encontrarse dispositivos de seguridad para controlar la operación según lo especifique el proveedor.</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br><br>
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p><i>7.1.4 &nbsp;Ahorro energético</i></p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p>Toda la cámara deberá estar aislada térmicamente.
			</p> <br>
		<p>Los aspectos de ahorro energético respecto a los componentes del sistema de refrigeración serán
			 definidos en el P&ID final, el cual deberá ser aprobado por el usuario.</p>
			 
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br><br>
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p><i>7.1.5 &nbsp;Alarmas y mensajes informativos</i></p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
			<p> El plan de acción para "alarma crítica" se presenta a continuación.</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->AddPage('A4');
//LISTADO DE ALARMAS
 $pdf->writeHTMLCell(140, 5, 35, '', '• '.'"Alarmas críticas"- Se apaga el sistema y se notifica al operador. Se requiere de una acción
para reinicializar y volver a su estado normal.' ,0,1, 0, true, 'J', true);

$linea = <<<EOD
<br><br>
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		El proveedor deberá instalar un sistema de alarmas que indique cuando los parámetros de
		operación se encuentren fuera de especificaciones, teniendo en cuenta la tabla en el numeral 7.5
		de “Requerimientos técnicos”.<br>
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<i><span style="font-size: 14px;"><strong>7.2 </strong></span> Capacidad</i>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p style="color: red;">
			El equipo deberá ser capaz de funcionar ((24 horas al día dentro del rango 2°C a 8°C.))
			El Sistema eléctrico o sistema de respaldo debe activarse como máximo a los 3 minutos después
			de la falla eléctrica para mantener el equipo en funcionamiento.
			Los intercambios entre el sistema eléctrico y el sistema de respaldo deben ser realizados de forma
			automática.</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>

</table>
<br><br>
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<i><span style="font-size: 14px;"><strong>7.3</strong></span>Condiciones de Trabajo</i>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p>
			La cámara debe ser de fácil acceso, y debe disponer de un espacio en el que se puedan llevar a cabo
			las actividades de almacenamiento y despacho de los productos de ((PRODUCTOS ROCHE S.A.)) así
			como del tránsito del personal.</p>
			<p style="color:red;">
			((Debe estar provista de luces externas de seguridad y de alarmas sonoras, para asegurar que nadie
			pueda quedarse encerrado en el interior de la cámara. La señal de Alarma debe ser percibida desde
			el exterior y ser claramente interpretable, esta alarma puede ser compartida entre diferentes
			cuartos.
			Deberá existir un sistema de control de temperatura, que permita conocer con exactitud las
			oscilaciones que ocurren al interior de la cámara, además de contar con una alarma visual, sonora
			y de llamada telefónica que avise de las posibles excursiones.
			Este cuarto deberá contar con almacenamiento de producto en estibas a piso con almacenamiento
			en un solo nivel, así mismo se puede realizar uso de mesas o plataformas móviles en el área.))</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br>

EOD;  
$pdf->writeHTML($linea, true, false, false, false, ''); 


$linea = <<<EOD
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<i><span style="font-size: 14px;"><strong>7.4</strong></span>Montaje del Equipo</i>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p>
			El área del suelo debe estar nivelado desde el punto más alto, para que el cuarto frio quede
			correctamente montado y garantizar su estanqueidad, así como el correcto cierre de puerta.
		</p>
		<p>
			El material de los paneles debe ser impermeable, fácil de limpiar y con buen aislamiento térmico y
			se debe verificar que todas las junturas internas queden selladas.
		</p>	
		<p style="color:red;">	
			((En cuanto a las puertas, deben cumplir con el mismo estándar de los paneles respecto a
			hermeticidad, asepsia y aislamiento. Las puertas deberán permitir su apertura desde el interior o
			exterior del cuarto frio, se deben abrir y cerrar de manera suave y sin roces.

			El sistema de refrigeración deberá contar con un sistema de refrigeración adicional como respaldo
			en caso de falla de los equipos.))
		</p>
		<p>
			La sala de máquinas deberá contar con la iluminación adecuada, y un techo para poder protegerlas
			de las inclemencias del tiempo (radiación y lluvia).
		</p>
		<p style="color:red;">
			Se debe proveer el apoyo adecuado para soportar el peso de los evaporadores, y proporcionar el
			espacio suficiente entre la parte posterior del evaporador y la pared para permitir el libre retorno
			de aire. Además, se debe asegurar que la dispersión del aire pueda cubrir completamente la cámara.
		</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br><br>
<table border="1">

	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%;">
		<p>
		El equipo deberá disponer de un sensor anclado al controlador de temperatura que será
		programado a la temperatura requerida para que el equipo funcione del rango ((2°C y 8°C)), contar
		con un panel de control que permita modificar estos parámetros definiendo el límite inferior y
		superior. La modificación de parámetros o cambios en la configuración debe ser controlada, para
		esto debe estar con limitaciones de acceso solo a personal autorizado.</p>
		<p>
		Se debe conectar directamente a la red eléctrica y a un grupo electrógeno o sistema de respaldo
		eléctrico. Especificación de la fuente eléctrica ((110V a 440V /60 HZ))</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, ''); 

//tabla  requerimientos tecnicos 
$pdf->AddPage('A4');

$linea = <<<EOD
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<i><span style="font-size: 14px;"><strong>7.5 </strong></span> Requerimientos Técnicos</i>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, ''); 


$pdf->writeHTMLCell(77, 5, 29, '', '<h3>Parámetro</h3>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(77, 5, 106, '', '<h3>Especificaciones</h3>' ,1,0, 0, true, 'C', true);

//Requerimientos estructurales
$pdf->AddPage('A4');

$linea = <<<EOD
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<i><span style="font-size: 14px;"><strong>7.6 </strong></span> Requerimientos Estructurales</i>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, ''); 


$pdf->writeHTMLCell(77, 5, 29, '', '<h3>Parámetro</h3>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(77, 5, 106, '', '<h3>Especificaciones</h3>' ,1,1, 0, true, 'C', true);

$linea = <<<EOD

<br><br>
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<i><span style="font-size: 14px;"><strong>7.7 </strong></span> Requerimientos de sistemas de control</i>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, ''); 

$pdf->writeHTMLCell(77, 5, 29, '', '<h3>Parámetro</h3>' ,1,0, 0, true, 'C', true);
$pdf->writeHTMLCell(77, 5, 106, '', '<h3>Especificaciones</h3>' ,1,0, 0, true, 'C', true);

$pdf->AddPage('A4');

$linea = <<<EOD

<br><br>	
<table border="1">
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<i><span style="font-size: 14px;"><strong>7.8 </strong></span>Requerimientos no funcionales</i>	
		</td>
		<td style="width: 8%;"></td>
	</tr>
	<tr>
		<td style="width: 8%;"></td>
		<td style="width: 84%">
		<p>
		Se deberá entregar la documentación asociada a instrumentos y equipos de automatización,
		diagramas P&ID, de control y automatización.</p>
		</td>
		<td style="width: 8%;"></td>
	</tr>
</table>
<br>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, ''); 




$pdf->Output('pdf', 'I');

?>