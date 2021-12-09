
var id_valida = $("#id_valida").val();
var id_camara_congelada = $("#id_camara_congelada").val();
var id_item = $("#id_item").val();

if(id_item.length == 0){
    $("#btn_editar_camara_congelada").hide();
    $("#btn_nueva_camara_congelada").show();
}else{
    $("#btn_editar_camara_congelada").show();
    $("#btn_nueva_camara_congelada").hide();
}





/////////// EVENTO PARA CREAR CAMARA CONGELADA
$("#btn_nueva_camara_congelada").click(function(){

    let nombre_camara_congelada = $("#nombre_camara_congelada").val();
    let id_empresa =  $("#id_empresa").val();
    let marca_camara_congelada = $("#marca_camara_congelada").val();
    let modelo_camara_congelada = $("#modelo_camara_congelada").val();
    let ubicacion_camara_congelada = $("#ubicacion_camara_congelada").val();
    let valor_seteado_camara_congelada = $("#valor_seteado_camara_congelada").val();
    let limite_maximo_camara_congelada = $("#limite_maximo_camara_congelada").val();
    let limite_minimo_camara_congelada = $("#limite_maximo_camara_congelada").val();

    const datos = {
        nombre_camara_congelada,
        id_empresa,
        marca_camara_congelada,
        modelo_camara_congelada,
        ubicacion_camara_congelada,
        valor_seteado_camara_congelada,
        limite_maximo_camara_congelada,
        limite_minimo_camara_congelada,
        id_valida
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/item/nueva_camara_congelada.php',
        success:function(response){
           Swal.fire({
               title:'Mensaje',
               text:'Se ha creado la camara fria correctamente',
               icon:'success',
               timer:1700
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

});



/////// EVENTO PARA ACTUALIZAR CAMARA CONGELADA

$("#btn_editar_camara_congelada").click(function(){

    let nombre_camara_congelada = $("#nombre_camara_congelada").val();
    let id_empresa =  $("#id_empresa").val();
    let marca_camara_congelada = $("#marca_camara_congelada").val();
    let modelo_camara_congelada = $("#modelo_camara_congelada").val();
    let ubicacion_camara_congelada = $("#ubicacion_camara_congelada").val();
    let valor_seteado_camara_congelada = $("#valor_seteado_camara_congelada").val();
    let limite_maximo_camara_congelada = $("#limite_maximo_camara_congelada").val();
    let limite_minimo_camara_congelada = $("#limite_maximo_camara_congelada").val();

    const datos = {
        nombre_camara_congelada,
        id_empresa,
        marca_camara_congelada,
        modelo_camara_congelada,
        ubicacion_camara_congelada,
        valor_seteado_camara_congelada,
        limite_maximo_camara_congelada,
        limite_minimo_camara_congelada,
        id_valida,
        id_item,
        id_camara_congelada
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/item/editar_camara_congelada.php',
        success:function(response){
           
            if(response == "Listo"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha editado la camara fria correctamente',
                    icon:'success',
                    timer:1700
                });
            }
        }
    });
})  