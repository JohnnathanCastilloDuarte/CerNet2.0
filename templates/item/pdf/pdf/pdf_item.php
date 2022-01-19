<?php
require('../../../../recursos/itemencabezadopdf.php');
require('../../../../config.ini.php');
//$id_informe = $_GET['informe'];
//$resultado_corresponde = "";
//$posicion_sensores_indicativo = 1;
 
$data = $_GET['data'];

$datos = base64_decode($data) ;

$oso=json_decode($datos);


$tipo = $oso[0]->nombre_tipo_item;

//recorrer variables globales de todos los items
foreach ($oso as $key) {
	//información global item
	$nombre    			 = $key->nombre_item;
	$nombre_tipo_item    = $key->nombre_tipo_item;
	$empresa		     = $key->nombre_empresa;
	$direccion		     = $key->direccion;
	$ubicacion_interna	 = $key->ubicacion_interna;
	$area_interna        = $key->area_interna;
	$fecha_registro	     = $key->fecha_registro;
	$logo 				 = $key->logo;
}

$pdf->AddPage('A4');

$linea = <<<EOD
<style>
.linea{
   height: 14px;
   color:white;
   background-color: #1a53ff;
}
</style>
<br><br><br><br>
<table >
   <tr border="1">
        <td class="linea" align="center"><h2><b>Especificaciones de $nombre_tipo_item - $nombre</b></h2></td>
   </tr>
</table>
EOD;  
$pdf->writeHTML($linea, true, false, false, false, '');

$pdf->writeHTMLCell(25, 5, 140, '', '<strong>Fecha registro:</strong>',0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(30, 5, 165, '', $fecha_registro ,0,1, 0, true, 'C', true);

$pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(35, 5, 20, '', '<strong>Empresa:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 55, '', $empresa ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(35, 5, 125, '', '<strong>Nombre:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 155, '', $nombre ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(35, 5, 20, '', '<strong>Dirección:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 55, '', $direccion ,0,0, 0, true, 'J', true);

$pdf->writeHTMLCell(35, 5, 125, '', '<strong>Ubicación interna:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 155, '', $ubicacion_interna ,0,1, 0, true, 'J', true);

$pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
$pdf->writeHTMLCell(35, 5, 20, '', '<strong>Area interna:</strong>' ,0,0, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, 55, '', $area_interna ,0,0, 0, true, 'J', true);





   switch($nombre_tipo_item){

   	 case 'Bodega':
   	 	# code...
   	 break;
   	 case 'HVAC':
   	 	# code...
   	 break;
   	 case 'Camara Congelada':

   	 		foreach ($oso as $camara) {
   	    	//caracteristicas del equipo filtro

   	 			$marca = $camara->marca;
				$modelo = $camara->modelo;
				$valor_seteado = $camara->valor_seteado;
				$valor_maximo = $camara->valor_maximo;
				$valor_minimo = $camara->valor_minimo;

   			}

        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Modelo: </strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $modelo ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
        	

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Marca:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $marca ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Valor seteado :</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $valor_seteado ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Valor maximo:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $valor_maximo ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Valor minimo:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 156, '', $valor_minimo ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   	 	
   	 break;
   	 case 'Flujo Laminar':
   	 		foreach ($oso as $campana) {
   	    	//caracteristicas del equipo filtro
   	 			$ubicacion_interna = $ubicacion_interna;
				$area_interna = $area_interna;

   			}

        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Ubicación interna: </strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $ubicacion_interna ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
        	

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Área interna:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $area_interna ,0,0, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   	 	
   	 break;
   	 case 'Campana de Extracción':

   	 		foreach ($oso as $campana) {
   	    	//caracteristicas del equipo filtro

	 	     	$tipo_campana = $campana->tipo_campana;
				$modelo = $campana->modelo;
				$n_serie = $campana->n_serie;
				$codigo = $campana->codigo;
				$ubicacion_interna = $campana->ubicacion_interna;
				$area_interna = $campana->area_interna;
				$direccion = $campana->direccion;
				$requisito_velocidad = $campana->requisito_velocidad;
				$descripcion = $campana->descripcion;
				$estado = $campana->estado;
				$fecha_fabricacion = $campana->fecha_fabricacion;
				$marca = $campana->marca;

   			}

        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Modelo: </strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $modelo ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
        	

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Marca:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $marca ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Tipo campana :</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $tipo_campana ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Código interno:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $codigo ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>N° Serie:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 156, '', $n_serie ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Año fabricación:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $fecha_fabricacion ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Requisito velocidad de aire:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 158, '', $requisito_velocidad ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
   	 	
   	 break;
	case 'Filtro':

			 foreach ($oso as $filtro) {
   	    	//caracteristicas del equipo filtro

	 	     	$fabricante = $filtro->fabricante;
				$modelo = $filtro->modelo;
				$serie = $filtro->serie;
				$cantidad_filtros = $filtro->cantidad_filtros;
				$direccion = $filtro->direccion;
				$ubicacion_interna = $filtro->ubicacion_interna;
				$area_interna = $filtro->area_interna;
				$dimenciones = $filtro->tipo_filtro;
				$penetracion_filtro = $filtro->penetracion_filtro;

   			}

        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Modelo/marca: </strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $modelo ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
        	

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>N° Serie:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $serie ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Cantidad de filtros :</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $cantidad_filtros ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Dimenciones:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $dimenciones ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Limite de penetración:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 156, '', $penetracion_filtro ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
	   	 	
     break;
   	 case 'Automovil':

   	 		foreach ($oso as $item) {
   	    	//caracteristicas del equipo sala_limpia
				$fabricante = $item->fabricante;
				$modelo = $item->modelo;
				$n_serie = $item->n_serie;
				$c_interno = $item->c_interno;
				$placa             = $item->placa;
		    $fecha_fabricacion = $item->fecha_fabricacion;
				$voltaje = $item->voltaje;
				$potencia = $item->potencia;
				$capacidad = $item->capacidad;
				$peso = $item->peso;
				$alto = $item->alto;
				$largo = $item->largo;
				$ancho = $item->ancho;
				$descripcion = $item->descripcion;
				$seteado_tem = $item->seteado_tem;
				$tem_min = $item->tem_min;
				$tem_max = $item->tem_max;
				$seteado_hum = $item->seteado_hum;
				$hum_min = $item->hum_min;
				$hum_max = $item->hum_max;
				$area_interna = $item->area_interna;
   			}

   		$pdf->writeHTMLCell(35, 5, 125, '', '<strong>fabricante/marca: </strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $fabricante ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
        	

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Modelo:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $modelo ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>N° Serie :</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $n_serie ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Codigo interno:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $c_interno ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Fecha fabricación:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $fecha_fabricacion ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Voltaje:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $voltaje ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Potencia:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $potencia ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>capacidad:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $capacidad ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Peso:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $peso ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Alto:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $alto ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Largo:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $largo ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Ancho:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $ancho ,0,0, 0, true, 'J', true);
	    $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Valor seteado tempera-tura:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 160, '', $seteado_tem ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Temperatura minima:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $tem_min ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>temperatura maxima:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $seteado_tem ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);


        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Placa / Patente :</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $tem_min ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>temperatura maxima:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $seteado_tem ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>descripción:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $descripcion ,0,0, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

   	 break;
	 case 'Incubadora':

	 	     foreach ($oso as $incubadora) {
   	    	//caracteristicas del equipo incubadora

	 	     	$fabricante = $incubadora->fabricante;
				$modelo = $incubadora->modelo;
				$n_serie = $incubadora->n_serie;
				$fecha_fabricacion = $incubadora->fecha_fabricacion;
				$direccion = $incubadora->direccion;
				$ubicacion_interna = $incubadora->ubicacion_interna;
				$area_interna = $incubadora->area_interna;
				$valor_seteado = $incubadora->valor_seteado;
				$limite_maximo = $incubadora->limite_maximo;
				$limite_minimo = $incubadora->limite_minimo;
				$descripcion = $incubadora->descripcion;
				$fecha_registro = $incubadora->fecha_registro;

   			}

        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>fabricante/marca: </strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $fabricante ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
        	

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Modelo:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $modelo ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>N° Serie :</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $n_serie ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Fecha fabricación:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $fecha_fabricacion ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Valor seteado :</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $valor_seteado ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Limite máximo(°C):</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $limite_maximo ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Limite minimo (°C):</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $limite_minimo ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Descripción:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $descripcion ,0,0, 0, true, 'J', true);
        
   	 break;

     case 'Sala Limpia':

   		    foreach ($oso as $sala) {
   	    	//caracteristicas del equipo sala_limpia
				$area_m2 			 = $sala->area_m2;
				$volumen_m3 		 = $sala->volumen_m3;
				$clasificacion_oms   = $sala->clasificacion_oms;
				$clasificacion_iso   = $sala->clasificacion_iso;
				$claudal_m3h		 = $sala->claudal_m3h;
				$ren_hr 			 = $sala->ren_hr;
				$temperatura 		 = $sala->temperatura;
				$hum_relativa 		 = $sala->hum_relativa;
				$lux 		   		 = $sala->lux;
				$ruido_dba 			 = $sala->ruido_dba;
				$presion_sala 		 = $sala->presion_sala;
				$presion_versus 	 = $sala->presion_versus;
				$tipo_presion 		 = $sala->tipo_presion;
				$puntos_muestreo	 = $sala->puntos_muestreo;
   			}
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>fabricante/marca: </strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $fabricante ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
        	

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Modelo:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $modelo ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>N° Serie :</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $n_serie ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Codigo interno:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $c_interno ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Fecha fabricación:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $fecha_fabricacion ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Voltaje:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $voltaje ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Potencia:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $potencia ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>capacidad:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $capacidad ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Peso:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $peso ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Alto:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $alto ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Largo:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $largo ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Ancho:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $ancho ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Valor seteado humedad:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 160, '', $seteado_hum ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

		$pdf->writeHTMLCell(35, 5, 20, '', '<strong>Humedad minima:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $hum_min ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Humedad maxima:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $hum_max ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Valor seteado tempera-tura:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $seteado_tem ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Temperatura minima:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $hum_max ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>temperatura maxima:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $seteado_tem ,0,0, 0, true, 'J', true);

     break;

     default:
   		//$pdf->writeHTMLCell(35, 5, 20, '', 'Algo salio mal' ,0,0, 0, true, 'J', true);

     	if ($tipo == 'Freezer' || $tipo == 'Estufa' || $tipo == 'Refrigerador' || $tipo == 'Ultrafreezer') {


   	 		foreach ($oso as $item) {
   	    	//caracteristicas del equipo sala_limpia
				$voltaje   = $item->voltaje;
				$potencia  = $item->potencia;
				$capacidad = $item->capacidad;
				$peso 	   = $item->peso;
				$alto 	   = $item->alto;
				$largo 	   = $item->largo;
				$ancho	   = $item->ancho;
				$descripcion = $item->descripcion;
				$seteado_hum = $item->seteado_hum;
				$seteado_tem = $item->seteado_tem;
				$hum_min   = $item->hum_min;
				$hum_max   = $item->hum_max;
				$tem_min   = $item->tem_min;
				$tem_max   = $item->tem_max;
				$fabricante = $item->fabricante;
				$modelo    = $item->modelo;
				$n_serie   = $item->n_serie;
				$c_interno = $item->c_interno;
				$fecha_fabricacion = $item->fecha_fabricacion;
   			}

   		$pdf->writeHTMLCell(35, 5, 125, '', '<strong>fabricante/marca: </strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $fabricante ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
        	

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Modelo:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $modelo ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>N° Serie :</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $n_serie ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Codigo interno:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $c_interno ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Fecha fabricación:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $fecha_fabricacion ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Voltaje:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $voltaje ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Potencia:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $potencia ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
       
        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>capacidad:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $capacidad ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Peso:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $peso ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Alto:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $alto ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Largo:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $largo ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Ancho:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $ancho ,0,0, 0, true, 'J', true);
	    $pdf->writeHTMLCell(35, 5, 125, '', '<strong>Valor seteado tempera-tura:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 160, '', $seteado_tem ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Temperatura minima:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $tem_min ,0,1, 0, true, 'J', true);
        $pdf->writeHTMLCell(35, 5, 125, '', '<strong>temperatura maxima:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 155, '', $seteado_tem ,0,1, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);


        if ($tipo == 'Estufa') {
		    $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Valor seteado humedad:</strong>' ,0,0, 0, true, 'J', true);
		    $pdf->writeHTMLCell(60, 5, 55, '', $seteado_hum ,0,0, 0, true, 'J', true);
			$pdf->writeHTMLCell(35, 5, 125, '', '<strong>Humedad minima:</strong>' ,0,0, 0, true, 'J', true);
		    $pdf->writeHTMLCell(60, 5, 155, '', $hum_min ,0,1, 0, true, 'J', true);

		    $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
	        	
		    $pdf->writeHTMLCell(35, 5, 20, '', '<strong>Humedad maxima:</strong>' ,0,0, 0, true, 'J', true);
		    $pdf->writeHTMLCell(60, 5, 55, '', $hum_max ,0,1, 0, true, 'J', true);

		    $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
        	
        }

        $pdf->writeHTMLCell(35, 5, 20, '', '<strong>descripción:</strong>' ,0,0, 0, true, 'J', true);
        $pdf->writeHTMLCell(60, 5, 55, '', $descripcion ,0,0, 0, true, 'J', true);

        $pdf->writeHTMLCell(25, 5, 15, '', '' ,0,1, 0, true, 'J', true);
	
     	}else{

     		$pdf->writeHTMLCell(35, 5, 20, '', '<strong>error:</strong>' ,0,0, 0, true, 'J', true);
     	
     	}
   	 break;

   }   


$pdf->Output($nombre.'.pdf', 'I');
?>
