
var id_item_bodega = $("#id_item_bodega").val();
var id_valida = $("#id_valida").val();



$("#si_envia").hide();
$("#step-42").hide();

tipo_producto();

climatizacion();
planos();
conocer_active_boton();















//////////// FUNCION BOTONES

function conocer_active_boton()
{
	if(id_item_bodega.length == 0){
		$("#btn_editar_item_bodega").hide();
		$("#btn_nuevo_item_bodega").show();
	}else{
		$("#btn_editar_item_bodega").show();
		$("#btn_nuevo_item_bodega").hide();
	}

}


//FUNCION QUE APOYA A LAS DEMAS FUNCIONES CUANDO EL DOCUMENTO CARGUE
$(document).ready(function(){
	let otro = $("input:checkbox[name=otros]:checked").val();
	let muro = $("input:checkbox[name=tipo_muro_bodega_5]:checked").val();	
	
	if(muro=="otro muro"){
		$("#otro_tipo_muro_bodega").show();
	}
	
	
});



//FUNCIÓN PARA VALIDAR EL TIPO OTRO DE TIPO DE PRODUCTOS
function tipo_producto(){
	$("input:checkbox[name=otros]").click(function(){
		console.log("click");
		let otro = $("input:checkbox[name=otros]:checked").val();
		
		if(otro == "Otros"){
			$("#otros_productos").show()
		}else{
			$("#otros_productos").hide();
		}
	});
}

//FUNCION SISTEMA DE CLIMATIZACION
function climatizacion(){
	$("input:checkbox[name=otro_climatizacion_4]").click(function(){

		let elemento = $("input:checkbox[name=otro_climatizacion_4]:checked").val();
		console.log(elemento)
		if(elemento == "No climatizacion"){
			
			$("input:checkbox[name=sistema_climatizacion_1]").hide();
			$("input:checkbox[name=sistema_climatizacion_2]").hide();
			$("input:checkbox[name=sistema_climatizacion_3]").hide();
		}else{
			$("input:checkbox[name=sistema_climatizacion_1]").show();
			$("input:checkbox[name=sistema_climatizacion_2]").show();
			$("input:checkbox[name=sistema_climatizacion_3]").show();
		}

	});
}

//FUNCION SISTEMA DE  PLANOS
function planos(){
	$("input:checkbox[name=no_planos]").click(function(){

		let elemento = $("input:checkbox[name=no_planos]:checked").val();
		console.log(elemento)
		if(elemento == "No cuenta con planos"){
			
			$("input:checkbox[name=s_m_t_a]").hide();
		}else{
			$("input:checkbox[name=s_m_t_a]").show();
		}

	});
}

//FUNCIÓN PARA EDITAR EL ITEM BODEGA
(function(){
	
	$("#btn_editar_item_bodega").click(function(){

		let nombre_bodega = $("#nombre_bodega").val();
		let empresa_bodega = $("#id_empresa").val();
		let descripcion_bodega = $("#descripcion_item_bodega").val();
		let direccion_bodega = $("#direccion_bodega").val();
		let codigo_bodega = $("#codigo_bodega").val();
		
		let productos_bodega = $("#productos_bodega").val();
		let largo_bodega = $("#largo_bodega").val();
		let ancho_bodega = $("#ancho_bodega").val();
		let superficie_bodega = $("#superficie_bodega").val();
		let volume_bodega = $("#volume_bodega").val();
		let altura_bodega = $("#altura_bodega").val();

    	let clasificacion_item = $("#clasificacion_item").val();
		let marca_bodega = $("#marca_bodega").val();
		let modelo_bodega = $("#modelo_bodega").val();
		let orientacion_principal = $("#orientacion_principal").val();
		let orientacion_recepcion = $("#orientacion_recepcion").val();
		let orientacion_despacho = $("#orientacion_despacho").val();
		let num_puertas = $("#num_puertas").val();
		let salida_emergencia = $("#salida_emergencia").val();
		let cantidad_rack = $("#cantidad_rack").val();
		let num_estantes = $("#num_estantes").val();
		let altura_max_rack = $("#altura_max_rack").val();
		let sistema_extraccion = $("#sistema_extraccion").val();
		let cielo_lus = $("#cielo_lus").val();
		let temp_max = $("#temp_max").val();
		let temp_min = $("#temp_min").val();
		let cantidad_iluminarias = $("#cantidad_iluminarias").val();
		let hr_max = $("#hr_max").val();
		let hr_min = $("#hr_min").val();	
    let cantidad_ventana = $("#cantidad_ventana").val();
    let valor_seteado_temp = $("#valor_seteado_temp").val();
    let valor_seteado_hum = $("#valor_seteado_hum").val();

		let tipo_muro = $("#otro_tipo_muro_bodega").val();
		let tipo_cielo = $("#otro_tipo_cielo_bodega").val();
	
		//let otro_tipo_cielo_bodega = $("#otro_tipo_cielo_bodega").val();
		
		var climatizacion = $("input:checkbox[id=climatizacion]:checked").map(function(){
			return this.value;
		}).get();
		
		var array_climatizacion = climatizacion.join(', ');
		
		let s_m_t = $("input:radio[name=s_m_t]:checked").val();
		let s_m_t_a = $("input:radio[name=s_m_t_a]:checked").val();
		
		var planos = $("input:checkbox[id=planos]:checked").map(function(){
			return this.value;
		}).get();
		
		var array_planos = planos.join(', ');
		
		let analisis_riesgo = $("input:radio[name=analisis_riesgo]:checked").val();
		let fichas_estabilidad = $("input:radio[name=fichas_estabilidad]:checked").val();
		
		let id_item = $("#id_item_bodega").val();
		let id_valida = $("#id_valida").val();

		let estado_bodega = $("input:radio[name=estado_bodega]:checked").val();

		
		const datos = {
			nombre_bodega,
			empresa_bodega,
			descripcion_bodega,
			direccion_bodega,
			codigo_bodega,
			productos_bodega,
			largo_bodega,
			ancho_bodega,
			superficie_bodega,
			volume_bodega,
			altura_bodega,
			tipo_muro,
			tipo_cielo,
			array_climatizacion,
			s_m_t,
			s_m_t_a,
			array_planos,
			analisis_riesgo,
			fichas_estabilidad,
			id_item,
			id_valida,
      		clasificacion_item,
			marca_bodega,
			modelo_bodega,
			orientacion_principal,
			orientacion_recepcion,
			orientacion_despacho,
			num_puertas,
			salida_emergencia,
			cantidad_rack,
			num_estantes,
			altura_max_rack,
			sistema_extraccion,
			cielo_lus,
			temp_max,
			temp_min,
			cantidad_iluminarias,
			hr_max,
			hr_min,
      		cantidad_ventana,
      		valor_seteado_temp,
      		valor_seteado_hum,
			estado_bodega
		}

		campos_vacios(datos);
		if(campos_vacios(datos)){
			$.post('templates/item/editar_bodega.php', datos, function(e){
				console.log(e);
				if(e == "Si"){
					Swal.fire({
						text:'La bodega ha sido actualizada',
						icon:'success',
						title:'Mensaje',
						showConfirmButton: false,
						timer:1500
					});
				}
			});
		}
		
	});
	
}());



/////// FUNCTION PARA CREAR BODEGA 

$("#btn_nuevo_item_bodega").click(function(){

	
	let nombre_bodega = $("#nombre_bodega").val();
	let empresa_bodega = $("#id_empresa").val();
	let descripcion_item_bodega = $("#descripcion_item_bodega").val();
	let direccion_bodega = $("#direccion_bodega").val();
	let codigo_bodega = $("#codigo_bodega").val();
	let productos = $("#productos_bodega").val();
	let id_tipo = $("#id_tipo").val();
  	let clasificacion_item = $("#clasificacion_item").val();
	let marca_bodega = $("#marca_bodega").val();
	let modelo_bodega = $("#modelo_bodega").val();
	let orientacion_principal = $("#orientacion_principal").val();
	let orientacion_recepcion = $("#orientacion_recepcion").val();
	let orientacion_despacho = $("#orientacion_despacho").val();
	let num_puertas = $("#num_puertas").val();
	let salida_emergencia = $("#salida_emergencia").val();
	let cantidad_rack = $("#cantidad_rack").val();
	let num_estantes = $("#num_estantes").val();
	let altura_max_rack = $("#altura_max_rack").val();
	let sistema_extraccion = $("#sistema_extraccion").val();
	let cielo_lus = $("#cielo_lus").val();
	let temp_max = $("#temp_max").val();
	let temp_min = $("#temp_min").val();
	let cantidad_iluminarias = $("#cantidad_iluminarias").val();
	let hr_max = $("#hr_max").val();
	let hr_min = $("#hr_min").val();
  	let cantidad_ventana = $("#cantidad_ventana").val();
  	let valor_seteado_temp = $("#valor_seteado_temp").val();
  	let valor_seteado_hum = $("#valor_seteado_hum").val();
	let largo_bodega = $("#largo_bodega").val();
	let ancho_bodega = $("#ancho_bodega").val();
	let superficie_bodega = $("#superficie_bodega").val();
	let volume_bodega = $("#volume_bodega").val();
	let altura_bodega = $("#altura_bodega").val();
	let tipo_muro = $("#otro_tipo_muro_bodega").val();
	let tipo_cielo = $("#otro_tipo_cielo_bodega").val();

		
	let climatizacion = $("#climatizacion").val();
	let s_m_t = $("#s_m_t").val();
	let s_m_t_a = $("#s_m_t_a").val();
	let planos = $("#planos").val();
	let analisis_riesgo = $("#analisis_riesgo").val();
	let fichas_estabilidad  = $("#fichas_estabilidad").val(); 

	const datos = {
		nombre_bodega,
		empresa_bodega,
		descripcion_item_bodega,
		direccion_bodega,
		codigo_bodega,
		productos,
		largo_bodega,
		ancho_bodega,
		superficie_bodega,
		volume_bodega,
		altura_bodega,
		tipo_muro,
		tipo_cielo,
		climatizacion,
		s_m_t,
		s_m_t_a,
		planos,
		analisis_riesgo,
		fichas_estabilidad,
		id_tipo,
		id_valida,
		marca_bodega,
		modelo_bodega,
		orientacion_principal,
		orientacion_recepcion,
		orientacion_despacho,
		num_puertas,
		salida_emergencia,
		cantidad_rack,
		num_estantes,
		altura_max_rack,
		sistema_extraccion,
		cielo_lus,
		temp_max,
		temp_min,
		cantidad_iluminarias,
		hr_max,
		hr_min,
    	cantidad_ventana,
    	valor_seteado_temp,
    	valor_seteado_hum,
		clasificacion_item
	}  

	campos_vacios(datos);

	if(campos_vacios(datos)){

		$.ajax({
			type:'POST',
			url:'templates/item/nueva_bodega.php',
			data: datos,
			success:function(response){
			console.log(response);
				Swal.fire({
					title:'Mensaje',
					icon :'success',			
					text: 'Bodega creada correctamente!',
					confirmButtonText: 'Ok!'
				}).then((result) => {
					if(result.value){
						location.reload();
					}

				});
			
			}
		});		
	}

});

//FUNCTION GENERAR PDF 
(function(){
	
	$("#enviar_item_bodega").click(function(){
		
		let id_item = $("#id_item").val();
		$("#si_envia").show();
		$("#step-42").show();
		
		$("#cuerpo_interno_correo").load('templates/pdf/pdf_bodega/modelo.php');
		
	/*	$.ajax({
			type: 'POST',
			data: {id_item},
			url: 'templates/pdf/pdf_bodega/modelo.php',
			success:function(e){
				console.log(e);
			}
		})*/
		
	});
}());


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
			console.log(trear);
			trear.forEach((valor)=>{
				template +=
				`	
					<tr>
						<td><button class="btn btn-muted" id="seleccionar_empresa" data-id="${valor.id_empresa}" data-direccion="${valor.direccion}" data-name="${valor.nombre}">${valor.nombre}</button></td>
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
	$("#buscador_empresa").val(nombre_empresa);
  	$("#id_empresa").val(id_empresa);
  	$("#direccion_bodega").val(direccion);
	$("#aqui_resultados_empresa").hide();

})



