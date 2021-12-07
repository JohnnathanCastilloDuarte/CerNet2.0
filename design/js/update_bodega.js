var id_item_bodega = $("#id_item_bodega").val();
var id_valida = $("#id_valida").val();


$("#otro_tipo_muro_bodega").hide();
$("#otros_productos").hide();
$("#otro_tipo_cielo_bodega").hide();
$("#si_envia").hide();
$("#step-42").hide();
tipo_muro();
tipo_producto();
tipo_cielo();
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
	
	if(otro=="Otros"){
		$("#otros_productos").show();
	}
	
	if(muro=="otro muro"){
		$("#otro_tipo_muro_bodega").show();
	}
	
	
});

//FUNCIÓN PARA VALIDAR EL TIPO OTRO DE TIPO DE MURO
function tipo_muro(){
	$("input:checkbox[name=tipo_muro_bodega_5]").click(function(){
		let otro = $("input:checkbox[name=tipo_muro_bodega_5]:checked").val();
		
		if(otro == "otro muro"){
			$("#otro_tipo_muro_bodega").show()
		}else{
			$("#otro_tipo_muro_bodega").hide();
		}
	});
}

//FUNCIÓN PARA VALIDAR EL TIPO OTRO DE TIPO DE CIELO
function tipo_cielo(){
	$("input:checkbox[name=tipo_cielo_bodega_4]").click(function(){
		
		let otro = $("input:checkbox[name=tipo_cielo_bodega_4]:checked").val();
		
		if(otro == "otro cielo"){
			$("#otro_tipo_cielo_bodega").show()
		}else{
			$("#otro_tipo_cielo_bodega").hide();
		}
	});
}

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
		let empresa_bodega = $("#empresa_bodega").val();
		let descripcion_bodega = $("#descripcion_item_bodega").val();
		let direccion_bodega = $("#direccion_bodega").val();
		let codigo_bodega = $("#codigo_bodega").val();
		var productos = $('input:checkbox[id=productos]:checked').map(function(){
			return this.value;
		}).get();
		var array_productos = productos.join(', ');
		
		let productos_bodega = $("#productos_bodega").val();
		let largo_bodega = $("#largo_bodega").val();
		let ancho_bodega = $("#ancho_bodega").val();
		let superficie_bodega = $("#superficie_bodega").val();
		let volume_bodega = $("#volume_bodega").val();
		let altura_bodega = $("#altura_bodega").val();
		var muro = $("input:checkbox[id=tipo_muro]:checked").map(function(){
			return this.value;
		}).get();
		var array_muro = muro.join(', ');
		
		let otro_tipo_muro_bodega = $("#otro_tipo_muro_bodega").val();
		
		var cielo = $("input:checkbox[id=tipo_cielo]:checked").map(function(){
			return this.value;
		}).get();
		var array_cielo = cielo.join(', ');
		
		let otro_tipo_cielo_bodega = $("#otro_tipo_cielo_bodega").val();
		
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
		
		const datos = {
			nombre_bodega,
			empresa_bodega,
			descripcion_bodega,
			direccion_bodega,
			codigo_bodega,
			array_productos,
			productos_bodega,
			largo_bodega,
			ancho_bodega,
			superficie_bodega,
			volume_bodega,
			altura_bodega,
			array_muro,
			otro_tipo_muro_bodega,
			array_cielo,
			otro_tipo_cielo_bodega,
			array_climatizacion,
			s_m_t,
			s_m_t_a,
			array_planos,
			analisis_riesgo,
			fichas_estabilidad,
			id_item,
			id_valida
		}
		
		$.post('templates/item/editar_bodega.php', datos, function(e){
			if(e == "Si"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'La bodega ha sido actualizada',
					showConfirmButton: false,
					timer:1000
				});
			}
		});
		
	});
	
}());


/////// FUNCTION PARA CREAR BODEGA 

$("#btn_nuevo_item_bodega").click(function(){

	let nombre_bodega = $("#nombre_bodega").val();
	let empresa_bodega = $("#empresa_bodega").val();
	let descripcion_item_bodega = $("#descripcion_item_bodega").val();
	let direccion_bodega = $("#direccion_bodega").val();
	let codigo_bodega = $("#codigo_bodega").val();
	let productos = $("#productos").val();
	let id_tipo = $("#id_tipo").val();

	if(productos == "Otros"){
		productos = $("#productos_bodega").val();
	}  


	let largo_bodega = $("#largo_bodega").val();
	let ancho_bodega = $("#ancho_bodega").val();
	let superficie_bodega = $("#superficie_bodega").val();
	let volume_bodega = $("#volume_bodega").val();
	let altura_bodega = $("#altura_bodega").val();
	let tipo_muro = $("#tipo_muro").val();

	if(tipo_muro == "otro_muro"){
		tipo_muro = $("#otro_tipo_muro_bodega").val();
	}

	let tipo_cielo = $("#tipo_cielo").val();

	if(tipo_cielo == "otro_cielo"){
		tipo_cielo = $("#otro_tipo_muro_bodega").val();
	} 

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
		id_valida
	}  

	$.ajax({
		type:'POST',
		url:'templates/item/nueva_bodega.php',
		data: datos,
		success:function(response){
			Swal.fire({
				icon :'success',			
				text: 'Bodega creada correctamente!',
				confirmButtonText: 'Ok!'
			}).then((result) => {
				if(result.value){
					location.reload();
				}

			});
			console.log(response);

		}
	})

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

	$("#aqui_resultados_empresa").hide();

})