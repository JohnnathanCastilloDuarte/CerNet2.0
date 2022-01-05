var id_valida = $("#id_valida").val();
var id_item_automovil =  $("#id_item_automovil").val();
var id_item = $("#id_automovil").val();
var id_tipo_item = $("#tipo_item_automovil").val();

valida_botones_automovil()

console.log(id_item);
//funcion para limpiar campos
function limpiar_campos_automovil(){
 
         $("#nombre_automovil").val();
		 $("#id_empresa").val();
		 $("#fabricante_automovil").val();
		 $("#modelo_automovil").val();
         $("#desc_automovil").val();
		 $("#n_serie_automovil").val();
		 $("#codigo_interno_automovil").val();
		 $("#fecha_fabricacion_automovil").val();
		 $("#direccion_automovil").val();
		 $("#ubicacion_interna_automovil").val();
		 $("#voltaje_automovil").val();
		 $("#potencia_automovil").val();
		 $("#capacidad_automovil").val();
		 $("#peso_automovil").val();
		 $("#alto_automovil").val();
	     $("#largo_automovil").val();
		 $("#ancho_automovil").val();
		 $("#placa_automovil").val();
		 $("#id_item_automovil").val();
		 $("#id_item_vehiculo").val();
		 $("#valor_seteado_tem_automovil").val();
		 $("#temperatura_minima_automovil").val();
		 $("#temperatura_maxima_automovil").val();
  
}


//funcion para validar los botones 
function valida_botones_automovil(){
  if(id_item.length == 0){
    $("#btn_nuevo_item_automovil").show();
    $("#btn_editar_item_automovil").hide();
  }else{
    $("#btn_nuevo_item_automovil").hide(); 
    $("#btn_editar_item_automovil").show();
  }
  
}

///funcion editar
$("#btn_editar_item_automovil").click(function(){

	const datos = {
		nombre_automovil            : $("#nombre_automovil").val(),
		id_empresa_automovil        : $("#id_empresa").val(),
		fabricante_automovil        : $("#fabricante_automovil").val(),
		modelo_automovil            : $("#modelo_automovil").val(),
		desc_automovil           	: $("#desc_automovil").val(),
		n_serie_automovil           : $("#n_serie_automovil").val(),
		codigo_interno_automovil    : $("#codigo_interno_automovil").val(),
		fecha_fabricacion_automovil : $("#fecha_fabricacion_automovil").val(),
		direccion_automovil         : $("#direccion_automovil").val(),
		ubicacion_interna_automovil : $("#ubicacion_interna_automovil").val(),
		voltaje_automovil           : $("#voltaje_automovil").val(),
		potencia_automovil          : $("#potencia_automovil").val(),
		capacidad_automovil         : $("#capacidad_automovil").val(),
		peso_automovil              : $("#peso_automovil").val(),
		alto_automovil              : $("#alto_automovil").val(),
		largo_automovil             : $("#largo_automovil").val(),
		ancho_automovil             : $("#ancho_automovil").val(),
		placa_automovil             : $("#placa_automovil").val(),
		valor_seteado_tem_automovil : $("#valor_seteado_tem_automovil").val(),
		temperatura_minima_automovil: $("#temperatura_minima_automovil").val(),
		temperatura_maxima_automovil: $("#temperatura_maxima_automovil").val(),
		id_valida,
		id_tipo_item,

		id_item_automovil,
		id_item
	}


	$.post('templates/item/editar_automovil.php', datos, function(r){
	
      console.log(r);
			if(r == "Si"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'El item ha sido modificado con exito',
                    showConfirmButton: false,
					timer:1000
				});
			}else{
				Swal.fire({
					position:'center',
					icon:'error',
					title:'No se ha podido crear, Contacta con el administrador',
                    showConfirmButton: false,
					timer:1000
				});
			}
		});

});

//funcion para crear el automovil

$("#btn_nuevo_item_automovil").click(function(){

	const datos = {
		nombre_automovil            : $("#nombre_automovil").val(),
		id_empresa_automovil        : $("#id_empresa").val(),
		fabricante_automovil        : $("#fabricante_automovil").val(),
		modelo_automovil            : $("#modelo_automovil").val(),
		desc_automovil           	: $("#desc_automovil").val(),
		n_serie_automovil           : $("#n_serie_automovil").val(),
		codigo_interno_automovil    : $("#codigo_interno_automovil").val(),
		fecha_fabricacion_automovil : $("#fecha_fabricacion_automovil").val(),
		direccion_automovil         : $("#direccion_automovil").val(),
		ubicacion_interna_automovil : $("#ubicacion_interna_automovil").val(),
		voltaje_automovil           : $("#voltaje_automovil").val(),
		potencia_automovil          : $("#potencia_automovil").val(),
		capacidad_automovil         : $("#capacidad_automovil").val(),
		peso_automovil              : $("#peso_automovil").val(),
		alto_automovil              : $("#alto_automovil").val(),
		largo_automovil             : $("#largo_automovil").val(),
		ancho_automovil             : $("#ancho_automovil").val(),
		placa_automovil             : $("#placa_automovil").val(),
		valor_seteado_tem_automovil : $("#valor_seteado_tem_automovil").val(),
		temperatura_minima_automovil: $("#temperatura_minima_automovil").val(),
		temperatura_maxima_automovil: $("#temperatura_maxima_automovil").val(),
		id_valida,
		id_tipo_item

	}
	$.post('templates/item/nuevo_automovil.php', datos, function(r){
	
      console.log(r);
			if(r == "Si"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'El item ha sido creado con exito',
                    showConfirmButton: false,
					timer:1000
				});
			}else{
				Swal.fire({
					position:'center',
					icon:'error',
					title:'No se ha podido crear, Contacta con el administrador',
                    showConfirmButton: false,
					timer:1000
				});
			}
		});

});

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