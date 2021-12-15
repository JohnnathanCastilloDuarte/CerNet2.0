//Ocultar desviaciones
$("#desviaciones_no").hide();
$("#desviaciones_si").hide();
$("#desviaciones_no2").hide();
$("#desviaciones_si2").hide();
$("#desviaciones_no3").hide();
$("#desviaciones_si3").hide();
$("#desviaciones_no4").hide();
$("#desviaciones_si4").hide();
$("#desviaciones_no5").hide();
$("#desviaciones_si5").hide();
//funcion para crear el protocolo
$("#btn_crear_protocolo").click(function(){ 
//entradas de tabla
$('#especificacion_almacenamiento').val()
$('#especificacion_ubicacion').val()
$('#especificacion_tipo_muro').val()
$('#especificacion_tipo_cielo').val()
$('#espeficicacion_volumen').val()
$('#espeficicacion_superficie').val()
$('#espeficicacion_altura_max').val()
$('#espeficicacion_altura_bodega').val()
//entradas
$('#docum_complementaria1').val()
$('#observaciones1').val()
$('#desviaciones1').val()
$('#desviaciones_no').val()
$('#descripcion_desviacion1').val()
//entradas resultados1
var resultados1 = $('#resultado1').val()
$('#realizado_por_1').val()
$('#verificado_por_1').val()
$('#firma_realiza1').val()
$('#firma_verifica1').val()
$('#fecha_realiza1').val()
$('#fecha_verifica1').val()

console.log(no_cumple1)

////////////////////////////////////////
/////////////protocolo2////////////////
////////////////////////////////////////
//entradas de tabla
$('#nombre_p_arquitectura_especificacion').val()
$('#nombre_p_arquitectura_ubicacion').val()
$('#codigo_p_arquitectura_especificacion').val()
$('#codigo_p_arquitectura_ubicacion').val()

$('#nombre_p_flujo_especificacion').val()
$('#nombre_p_flujo_ubicacion').val()
$('#codigo_p_flujo_especificacion').val()
$('#codigo_p_flujo_ubicacion').val()

$('#nombre_p_ubsensores_especificacion').val()
$('#nombre_p_ubsensores_ubicacion').val()
$('#codigo_p_ubsensores_especificacion').val()
$('#codigo_p_ubsensores_ubicacion').val()
//entradas2
$('#docum_complementaria2').val()
$('#observaciones2').val()
$('#desviaciones2').val()
$('#desviaciones_no2').val()
$('#descripcion_desviacion2').val()
//entradas resultados1
var cumple2 = $('#cumple2').val()
var no_cumple2 = $('#no_cumple2').val()
var no_aplica2 = $('#no_aplica2').val()
$('#realizado_por_2').val()
$('#verificado_por_2').val()
$('#firma_realiza2').val()
$('#firma_verifica2').val()
$('#fecha_realiza2').val()
$('#fecha_verifica2').val()

////////////////////////////////////////
/////////////protocolo3////////////////
////////////////////////////////////////
//entradas de tabla
$('#sensor_temperatura_funcion').val()
$('#sensor_temperatura_sensor').val()
$('#sensor_temperatura_ubicacion').val()
$('#sensor_temperatura_altura').val()

$('#sensor_humedad_funcion').val()
$('#sensor_humedad_sensor').val()
$('#sensor_humedad_ubicacion').val()
$('#sensor_humedad_altura').val()

$('#sensor_humedad_funcion2').val()
$('#sensor_humedad_sensor2').val()
$('#sensor_humedad_ubicacion2').val()
$('#sensor_humedad_altura2').val()
//entradas2
$('#docum_complementaria3').val()
$('#observaciones3').val()
$('#desviaciones3').val()
$('#desviaciones_no3').val()
$('#descripcion_desviacion3').val()
//entradas resultados1
var cumple3 = $('#cumple3').val()
var no_cumple3 = $('#no_cumple3').val()
var no_aplica3 = $('#no_aplica3').val()
$('#realizado_por_3').val()
$('#verificado_por_3').val()
$('#firma_realiza3').val()
$('#firma_verifica3').val()
$('#fecha_realiza3').val()
$('#fecha_verifica3').val()

////////////////////////////////////////
/////////////protocolo4////////////////
////////////////////////////////////////
//entradas de tabla
var climatizacion = $('#climatizacion').val();
var marca = $('#marca').val();
var seteo_temperatura = $('#seteo_temperatura').val();
var doc_calificacion = $('#doc_calificacion').val();
	//se valida que cuando el campo sea nulo se aplique la condicion de no aplica
	alert(marca)
	if (climatizacion.length == 0) {
		var climatizacion = 'No aplica';
	}
	if (marca.length == 0) {
		var marca = 'No aplica';
	}
	if (seteo_temperatura.length == 0) {
		var seteo_temperatura = 'No aplica';
	}
	if (doc_calificacion.length == 0) {
		var doc_calificacion = 'No aplica';
	}
//entradas2
$('#docum_complementaria4').val()
$('#observaciones4').val()
$('#desviaciones4').val()
$('#desviaciones_no4').val()
$('#descripcion_desviacion4').val()
//entradas resultados1
var cumple4 = $('#cumple4').val()
var no_cumple4 = $('#no_cumple4').val()
var no_aplica4 = $('#no_aplica4').val()
$('#realizado_por_4').val()
$('#verificado_por_4').val()
$('#firma_realiza4').val()
$('#firma_verifica4').val()
$('#fecha_realiza4').val()
$('#fecha_verifica4').val()

////////////////////////////////////////
/////////////protocolo5////////////////
////////////////////////////////////////
//entradas de tabla
$('#codigo_analisis').val();
$('#numero_revision').val();
//entradas2
$('#docum_complementaria5').val()
$('#observaciones5').val()
$('#desviaciones5').val()
$('#desviaciones_no5').val()
$('#descripcion_desviacion5').val()
//entradas resultados1
var cumple5 = $('#cumple5').val()
var no_cumple5 = $('#no_cumple5').val()
var no_aplica5 = $('#no_aplica5').val()
$('#realizado_por_5').val()
$('#verificado_por_5').val()
$('#firma_realiza5').val()
$('#firma_verifica5').val()
$('#fecha_realiza5').val()
$('#fecha_verifica5').val()

});
	
//detectar si se encontraron desviaciones1
$(document).ready(function(){
	$("select[id=desviaciones1]").change(function(){
			if ($('select[id=desviaciones1]').val() == 1) {
				$("#desviaciones_si").show();
				$("#desviaciones_no").hide();
			}else if ($('select[id=desviaciones1]').val() == 2) {
				$("#desviaciones_no").show();
				$("#desviaciones_si").hide();
			}else{
				$("#desviaciones_no").hide();
				$("#desviaciones_si").hide();
			}
        });
});
//detectar si se encontraron desviaciones2
$(document).ready(function(){
	$("select[id=desviaciones2]").change(function(){
			if ($('select[id=desviaciones2]').val() == 1) {
				$("#desviaciones_si2").show();
				$("#desviaciones_no2").hide();
			}else if ($('select[id=desviaciones2]').val() == 2) {
				$("#desviaciones_no2").show();
				$("#desviaciones_si2").hide();
			}else{
				$("#desviaciones_no2").hide();
				$("#desviaciones_si2").hide();
			}
        });
});
//detectar si se encontraron desviaciones3
$(document).ready(function(){
	$("select[id=desviaciones3]").change(function(){
			if ($('select[id=desviaciones3]').val() == 1) {
				$("#desviaciones_si3").show();
				$("#desviaciones_no3").hide();
			}else if ($('select[id=desviaciones3]').val() == 2) {
				$("#desviaciones_no3").show();
				$("#desviaciones_si3").hide();
			}else{
				$("#desviaciones_no3").hide();
				$("#desviaciones_si3").hide();
			}
        });
});
//detectar si se encontraron desviaciones4
$(document).ready(function(){
	$("select[id=desviaciones4]").change(function(){
			if ($('select[id=desviaciones4]').val() == 1) {
				$("#desviaciones_si4").show();
				$("#desviaciones_no4").hide();
			}else if ($('select[id=desviaciones4]').val() == 2) {
				$("#desviaciones_no4").show();
				$("#desviaciones_si4").hide();
			}else{
				$("#desviaciones_no4").hide();
				$("#desviaciones_si4").hide();
			}
        });
});
//detectar si se encontraron desviaciones5
$(document).ready(function(){
	$("select[id=desviaciones5]").change(function(){
			if ($('select[id=desviaciones5]').val() == 1) {
				$("#desviaciones_si5").show();
				$("#desviaciones_no5").hide();
			}else if ($('select[id=desviaciones5]').val() == 2) {
				$("#desviaciones_no5").show();
				$("#desviaciones_si5").hide();
			}else{
				$("#desviaciones_no5").hide();
				$("#desviaciones_si5").hide();
			}
        });
});



	