/////////// VARIABLES GLOBALES
var id_valida = $("#id_valida").val();
var id_item_2 = $("#id_item_2").val();

/////////// FUNCIONES A EJECUTAR

validar_botones_freezer()


///// FUNCION PARA VALIDAR BOTONES

function validar_botones_freezer(){

	if(id_item_2.length == 0){
		$("#btn_nuevo_item_freezer").show();
		$("#btn_editar_item_freezer").hide();
	}else{
		$("#btn_nuevo_item_freezer").hide();
		$("#btn_editar_item_freezer").show();
	}
}
/////SETEAR CAMPOS////////
function setear_campos(){
			$("#id_item_freezer").val('');
			$("#id_item_2").val('');
			$("#nombre_freezer").val('');
			$("#empresa_freezer").val('');
			$("#fabricante_freezer").val('');
			$("#modelo_freezer").val('');
		    $("#desc_freezer").val('');
			$("#n_serie_freezer").val('');
		    $("#codigo_interno_freezer").val('');
			$("#fecha_fabricacion_freezer").val('');
			$("#direccion_freezer").val('');
			$("#ubicacion_interna_freezer").val('');
			$("#voltaje_freezer").val('');
			$("#potencia_freezer").val('');
			$("#capacidad_freezer").val('');
		    $("#alto_freezer").val('');
		    $("#peso_freezer").val('');
			$("#largo_freezer").val('');
			$("#ancho_freezer").val('');
			$("#valor_seteado_hum_freezer").val('');
			$("#humedad_minima_freezer").val('');
			$("#humedad_maxima_freezer").val('');
			$("#valor_seteado_tem_freezer").val('');
			$("#temperatura_minima_freezer").val('');
			$("#temperatura_maxima_freezer").val('');
}

//// FUNCION PARA EDITAR EL FREEZER
(function(){

	$("#btn_editar_item_freezer").click(function(){

		let quien = id_valida;
		let movimiento = "Edita en el modulo";
		let modulo = "Item y freezer";

		const data = {
			quien,
			movimiento,
			modulo
		}

		const datos = {
			id_item_freezer : $("#id_item_freezer").val(),
			id_item_2,
			nombre_freezer : $("#nombre_freezer").val(),
			empresa_freezer : $("#id_empresa").val(),
			fabricante_freezer : $("#fabricante_freezer").val(),
			modelo_freezer : $("#modelo_freezer").val(),
			desc_freezer : $("#desc_freezer").val(),
			n_serie_freezer : $("#n_serie_freezer").val(),
			codigo_interno_freezer : $("#codigo_interno_freezer").val(),
			fecha_fabricacion_freezer : $("#fecha_fabricacion_freezer").val(),
			direccion_freezer : $("#direccion_freezer").val(),
			ubicacion_interna_freezer : $("#ubicacion_interna_freezer").val(),
			voltaje_freezer : $("#voltaje_freezer").val(),
			potencia_freezer : $("#potencia_freezer").val(),
			capacidad_freezer : $("#capacidad_freezer").val(),
			alto_freezer : $("#alto_freezer").val(),
			peso_freezer : $("#peso_freezer").val(),
			largo_freezer : $("#largo_freezer").val(),
			ancho_freezer : $("#ancho_freezer").val(),
			valor_seteado_hum : $("#valor_seteado_hum_freezer").val(),
			humedad_minima : $("#humedad_minima_freezer").val(),
			humedad_maxima : $("#humedad_maxima_freezer").val(),
			valor_seteado_tem : $("#valor_seteado_tem_freezer").val(),
			temperatura_minima : $("#temperatura_minima_freezer").val(),
			temperatura_maxima : $("#temperatura_maxima_freezer").val(),
			id_valida 
		}
		
		$.post('templates/item/editar_freezer.php', datos, function(response){
			
			if(response == "Si"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'El freezer ha sido modificado con exito',
					showConfirmButton: false,
					timer:1500
				});
			}

			$.ajax({
				type:'POST',
				data:datos,
				url:'templates/controlador_backtrack/controlador_general.php',
				success:function(response){
					if(response == "Listo"){

					}
				}
			});

		});
	});
}())

/////////Funcion apra crear freezer
$("#btn_nuevo_item_freezer").click(function(){

	let id_empresa_freezer = $("#id_empresa").val();

	if (id_empresa_freezer == 0) {
		   Swal.fire({
             title:'Mensaje',
             text:'No se pudo crear el item, revisa que los datos esten correctamente ingresados',
             icon:'error',
           });
	}else{

	const datos = {
		nombre_freezer : $("#nombre_freezer").val(),
		empresa_freezer : $("#id_empresa").val(),
		fabricante_freezer : $("#fabricante_freezer").val(),
		modelo_freezer : $("#modelo_freezer").val(),
		desc_freezer : $("#desc_freezer").val(),
		n_serie_freezer : $("#n_serie_freezer").val(),
		codigo_interno_freezer : $("#codigo_interno_freezer").val(),
		fecha_fabricacion_freezer : $("#fecha_fabricacion_freezer").val(),
		direccion_freezer : $("#direccion_freezer").val(),
		ubicacion_interna_freezer : $("#ubicacion_interna_freezer").val(),
		voltaje_freezer : $("#voltaje_freezer").val(),
		potencia_freezer : $("#potencia_freezer").val(),
		capacidad_freezer : $("#capacidad_freezer").val(),
		alto_freezer : $("#alto_freezer").val(),
		peso_freezer : $("#peso_freezer").val(),
		largo_freezer : $("#largo_freezer").val(),
		ancho_freezer : $("#ancho_freezer").val(),
		valor_seteado_hum : $("#valor_seteado_hum_freezer").val(),
		humedad_minima : $("#humedad_minima_freezer").val(),
		humedad_maxima : $("#humedad_maxima_freezer").val(),
		valor_seteado_tem : $("#valor_seteado_tem_freezer").val(),
		temperatura_minima : $("#temperatura_minima_freezer").val(),
		temperatura_maxima : $("#temperatura_maxima_freezer").val(),
		id_valida 
	}

	$.post('templates/item/nuevo_freezer.php',datos,function(response){
		if(response == "Si"){

			Swal.fire({
				title:'Mensaje',
				text:'Se ha creado el freezer correctamente',
				icon:'success',
				showConfirmButton: false,
				timer:1500
			});
			setear_campos();
		}else{
			Swal.fire({
				title:'Mensaje',
				text:'No ha se podido crear el registro, contacta al administrador',
				icon:'success',
				showConfirmButton: false,
				timer:1500
			});
		}

	});
 }

})

//////// LISTAR EMPRESAS 

$("#buscador_empresa").keydown(function(){
	
	let buscar = $(this).val();

	
	$.ajax({
		type:'POST',
		data:{buscar},
		url:'templates/controlador_buscador_empresa.php',
		success:function(response){
			let trear = JSON.parse(response);
			let template = "";
			$("#aqui_resultados_empresa").show();

			trear.forEach((valor)=>{
				template +=
				`	
					<tr>
						<td><button class="btn btn-muted" id="seleccionar_empresa" data-id="${valor.id_empresa}" data-name="${valor.nombre}">${valor.nombre}</button></td>
					</tr>
					
				`;
			});

			$("#aqui_resultados_empresa").html(template);

		}
	})
});

///////////////// EVENTO EMPRESA 

$(document).on('click','#seleccionar_empresa',function(){

	let id_empresa = $(this).attr('data-id');
	let nombre_empresa = $(this).attr('data-name');
	$("#buscador_empresa").val(nombre_empresa);
  $("#id_empresa").val(id_empresa);

	$("#aqui_resultados_empresa").hide();

})