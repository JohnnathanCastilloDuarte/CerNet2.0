///////// VARIABLES GLOBLAES

var id_item_2 = $("#id_item_2_estufa").val();
var id_valida = $("#id_valida").val();

//////// FUNCIONES A EJECUTAR
valida_botones_estufa();


////////////FUNCION QUE VALIDA LOS BOTONES DE LA ESTUFA

function valida_botones_estufa(){
  
  if(id_item_2.length == 0){
    $("#btn_nuevo_item_estufa").show(); 
    $("#btn_editar_item_estufa").hide();
  }else{
    $("#btn_nuevo_item_estufa").hide(); 
    $("#btn_editar_item_estufa").show();
  }
}

function setear_campos(){
      $("#id_item_estufa").val('');
      $("#id_item_2_estufa").val('');
      $("#nombre_estufa").val('');
      $("#empresa_estufa").val('');
      $("#fabricante_estufa").val('');
      $("#modelo_estufa").val('');
      $("#desc_estufa").val('');
      $("#n_serie_estufa").val('');
      $("#codigo_interno_estufa").val('');
      $("#fecha_fabricacion_estufa").val('');
      $("#direccion_estufa").val('');
      $("#ubicacion_interna_estufa").val('');
      $("#voltaje_estufa").val('');
      $("#potencia_estufa").val('');
      $("#capacidad_estufa").val('');
      $("#alto_estufa").val('');
      $("#peso_estufa").val('');
      $("#largo_estufa").val('');
      $("#ancho_estufa").val('');
      $("#valor_seteado_tem_estufa").val('');
      $("#temperatura_minima_estufa").val('');
      $("#temperatura_maxima_estufa").val('');
      $("#area_interna_estufa").val('');
     
}


(function(){

  
	$("#btn_editar_item_estufa").click(function(){

		const datos = {
		 	id_item_estufa : $("#id_item_estufa").val(),
		 	id_item_2,
		 	nombre_estufa : $("#nombre_estufa").val(),
		 	empresa_estufa : $("#id_empresa").val(),
		  fabricante_estufa : $("#fabricante_estufa").val(),
			modelo_estufa : $("#modelo_estufa").val(),
			desc_estufa : $("#desc_estufa").val(),
			n_serie_estufa : $("#n_serie_estufa").val(),
			codigo_interno_estufa : $("#codigo_interno_estufa").val(),
			fecha_fabricacion_estufa : $("#fecha_fabricacion_estufa").val(),
			direccion_estufa : $("#direccion_estufa").val(),
			ubicacion_interna_estufa : $("#ubicacion_interna_estufa").val(),
			voltaje_estufa : $("#voltaje_estufa").val(),
			potencia_estufa : $("#potencia_estufa").val(),
			capacidad_estufa : $("#capacidad_estufa").val(),
			alto_estufa : $("#alto_estufa").val(),
			peso_estufa : $("#peso_estufa").val(),
			largo_estufa : $("#largo_estufa").val(),
			ancho_estufa : $("#ancho_estufa").val(),
      valor_seteado_tem : $("#valor_seteado_tem_estufa").val(),
      temperatura_minima : $("#temperatura_minima_estufa").val(),
      temperatura_maxima : $("#temperatura_maxima_estufa").val(),
      area_interna_estufa : $("#area_interna_estufa").val(),
			id_valida
		}
		
		$.post('templates/item/editar_estufa.php', datos, function(e){
			if(e == "Modificado"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'El item ha sido modificado con exito',
					timer:1500
				});
			}
		});
	});
}())

/////////// CREACIÓN DEL ITEM ESTUFA
$("#btn_nuevo_item_estufa").click(function(){

  
  let id_empresa = $("#id_empresa").val();
  const datos = {
    nombre_aire_comprimido : $("#nombre_aire_comprimido").val(),
    id_empresa : $("#id_empresa").val(),
    fabricante_estufa : $("#fabricante_estufa").val(),
    modelo_estufa : $("#modelo_estufa").val(),
    desc_estufa : $("#desc_estufa").val(),
    n_serie_estufa : $("#n_serie_estufa").val(),
    codigo_interno_estufa : $("#codigo_interno_estufa").val(),
    fecha_fabricacion_estufa : $("#fecha_fabricacion_estufa").val(),
    direccion_estufa : $("#direccion_estufa").val(),
    ubicacion_interna_estufa : $("#ubicacion_interna_estufa").val(),
    voltaje_estufa : $("#voltaje_estufa").val(),
    potencia_estufa : $("#potencia_estufa").val(),
    capacidad_estufa : $("#capacidad_estufa").val(),
    alto_estufa : $("#alto_estufa").val(),
    peso_estufa : $("#peso_estufa").val(),
    largo_estufa : $("#largo_estufa").val(),
    ancho_estufa : $("#ancho_estufa").val(),
    valor_seteado_tem : $("#valor_seteado_tem_estufa").val(),
    temperatura_minima : $("#temperatura_minima_estufa").val(),
    temperatura_maxima : $("#temperatura_maxima_estufa").val(),
    area_interna_estufa : $("#area_interna_estufa").val(),
    id_valida
  }
  
  $.post('templates/item/nueva_estufa.php',datos,function(response){
      console.log(response)
    if(response == "Si"){
      Swal.fire({
        title:'Mensaje',
        text:'Se ha creado la estufa correctamente',
        icon:'success',
        showConfirmButton: false,
        timer:1000
      });
      setear_campos()
    }else{
      Swal.fire({
        title:'Mensaje',
        text:'No se ha creado la estufa',
        icon:'error',
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
  let direccion      = $(this).attr('data-direccion')
  $("#direccion_estufa").val(direccion);
	$("#buscador_empresa").val(nombre_empresa);
  $("#id_empresa").val(id_empresa);

	$("#aqui_resultados_empresa").hide();

})