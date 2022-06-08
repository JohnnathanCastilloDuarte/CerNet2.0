var nombre_flujo_laminar = $("#nombre_flujo_laminar").val();
var id_empresa_flujo = $("#id_empresa").val();
var cantidad_filtros = $("#ubicacion_flujo_laminar").val();
var id_item_flujo_laminar = $("#id_item_flujo_laminar").val();
var id_valida = $("#id_valida").val();
	
	console.log(id_item_flujo_laminar.length);

ocultar_botones();

function ocultar_botones(){ 
if (id_item_flujo_laminar.length == 0 ) {
	$("#btn_crear_flujo_laminar").show();
	$("#btn_actualizar_flujo_laminar").hide();
}else{
	$("#btn_crear_flujo_laminar").hide();
	$("#btn_actualizar_flujo_laminar").show();
 }
}


$("#btn_crear_flujo_laminar").click(function(){
	const datos = {
		nombre_flujo     : $("#nombre_flujo_laminar").val(),
		id_empresa_flujo : $("#id_empresa").val(),
		cantidad_filtros : $("#cantidad_filtros").val(),
		clasificacion_oms       : $("#clasificacion_oms").val(),
        clasificacion_iso       : $("#clasificacion_iso").val(),
		direccion_flujo  :  $("#direccion_flujo").val(),
		ubicacion_interna : $("#ubicacion_interna").val(),
		area_interna 	  : $("#area_interna").val(),
		tipo_cabina 	  : $("#tipo_cabina").val(),
		marca 			  : $("#marca").val(),
		modelo 			  : $("#modelo").val(),
		n_serie 		  : $("#n_serie").val(),
		codigo 			  : $("#codigo").val(),
		tipo_dimeciones   : $("#tipo_dimeciones").val(),
		limite_penetracion : $("#limite_penetracion").val(),
		eficiencia 		  : $("#eficiencia").val(),
		id_valida,
	}

	if (campos_vacios(datos) == true){
        console.log("si");
          $.ajax({
			type:'POST',
			data:datos,
			url:'templates/item/nuevo_flujo_laminar.php',
			success:function(response){
				console.log(response);
			if(response == "Listo"){
				 Swal.fire({
                    title:'Mensaje',
                    text:'Se ha creado el flujo laminar correctamente',
                    timer:1500,
                    icon:'success'
                  });
				}else{
				  Swal.fire({
                    title:'Mensaje',
                    text:'Ha ocurrido un problema intente de nuevo o contacte con el administrador ',
                    timer:1500,
                    icon:'success'
                  });	
				}
			}
		});
      }else{
        console.log("no");
      }

	
});

$("#btn_actualizar_flujo_laminar").click(function(){
	const datos = {
		nombre_flujo     : $("#nombre_flujo_laminar").val(),
		id_empresa_flujo : $("#id_empresa").val(),
		cantidad_filtros : $("#cantidad_filtros").val(),
		clasificacion_oms       : $("#clasificacion_oms").val(),
        clasificacion_iso       : $("#clasificacion_iso").val(),
        ubicacion_interna : $("#ubicacion_interna").val(),
		id_item_flujo_laminar : id_item_flujo_laminar,
		tipo_cabina 	  : $("#tipo_cabina").val(),
		marca 			  : $("#marca").val(),
		modelo 			  : $("#modelo").val(),
		n_serie 		  : $("#n_serie").val(),
		codigo 			  : $("#codigo").val(),
		tipo_dimeciones   : $("#tipo_dimeciones").val(),
		limite_penetracion : $("#limite_penetracion").val(),
		eficiencia 		  : $("#eficiencia").val(),
		id_valida : id_valida,
	}

	$.ajax({
			type:'POST',
			data:datos,
			url:'templates/item/editar_flujo_laminar.php',
			success:function(response){
				console.log(response);
			if(response == "Listo"){
				 Swal.fire({
                    title:'Mensaje',
                    text:'Se ha actualizado flujo laminar correctamente',
                    timer:1500,
                    showConfirmButton: false,
                    icon:'success'
                  });
				}else{
				  Swal.fire({
                    title:'Mensaje',
                    text:'Ha ocurrido un problema intente de nuevo o contacte con el administrador ',
                    timer:1500,
                    icon:'success'
                  });	
				}
			}
		});
});


/////// LISTAR EMPRESAS 

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
						<td><button class="btn btn-muted" id="seleccionar_empresa" data-id="${valor.id_empresa}" data-name="${valor.nombre}" data-direccion="${valor.direccion}">${valor.nombre}</button></td>
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
  	let direccion = $(this).attr('data-direccion');
  console.log(direccion);
	$("#buscador_empresa").val(nombre_empresa);
 	$("#id_empresa").val(id_empresa);
    $("#direccion_flujo").val(direccion);

	$("#aqui_resultados_empresa").hide();

})