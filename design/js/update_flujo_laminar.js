var nombre_flujo_laminar = $("#nombre_flujo_laminar").val();
var id_empresa_flujo = $("#empresa_flujo_laminar").val();
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
		id_empresa_flujo : $("#empresa_flujo_laminar").val(),
		cantidad_filtros : $("#cantidad_filtros").val(),
		id_valida,
	}

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
});

$("#btn_actualizar_flujo_laminar").click(function(){
	const datos = {
		nombre_flujo     : $("#nombre_flujo_laminar").val(),
		id_empresa_flujo : $("#empresa_flujo_laminar").val(),
		cantidad_filtros : $("#cantidad_filtros").val(),
		id_item_flujo_laminar : id_item_flujo_laminar,
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