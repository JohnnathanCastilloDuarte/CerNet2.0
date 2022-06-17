
////////////  VARIABLES GLOBALES

var id_valida = $("#id_valida").val();
var id_item =  $("#id_item_2").val();


///////// FUNCIONES A EJECUTAR

valida_botones_refrigerador()


////////// FUNCION DE INTERCAMBIO DE BOTONES
function valida_botones_refrigerador(){
  
  if(id_item.length == 0){
    $("#btn_nuevo_item_refrigerador").show();
    $("#btn_editar_item_refrigerador").hide();
  }else{
    $("#btn_nuevo_item_refrigerador").hide(); 
    $("#btn_editar_item_refrigerador").show();
  }
  
}
/////////////RESETEAR CAMPOS DE REFRIGERADOR
function setear_campos(){
      $("#id_item_refrigerador").val('');
      $("#id_item_2").val('');
      $("#nombre_refrigerador").val('');
      $("#empresa_refrigerador").val(0);
      $("#fabricante_refrigerador").val('');
      $("#modelo_refrigerador").val('');
      $("#desc_refrigerador").val('');
      $("#n_serie_refrigerador").val('');
      $("#codigo_interno_refrigerador").val('');
      $("#fecha_fabricacion_refrigerador").val('');
      $("#direccion_refrigerador").val('');
      $("#ubicacion_interna_refrigerador").val('');
      $("#voltaje_refrigerador").val('');
      $("#potencia_refrigerador").val('');
      $("#capacidad_refrigerador").val('');
      $("#alto_refrigerador").val('');
      $("#peso_refrigerador").val('');
      $("#largo_refrigerador").val('');
      $("#ancho_refrigerador").val('');
      $("#valor_seteado_hum").val('');
      $("#humedad_minima").val('');
      $("#humedad_maxima").val('');
      $("#valor_seteado_tem").val('');
      $("#temperatura_minima").val('');
      $("#temperatura_maxima").val('');
      $("#area_refrigerador").val('');

}


////////////// BOTON CREACIÓN DE REFRIGERADOR

	
	$("#btn_editar_item_refrigerador").click(function(){
		
	  	const datos = {
		 	id_item_refrigerador : $("#id_item_refrigerador").val(),
		 	id_item,
		 	nombre_refrigerador : $("#nombre_refrigerador").val(),
		 	empresa_refrigerador : $("#id_empresa").val(),
		  fabricante_refrigerador : $("#fabricante_refrigerador").val(),
			modelo_refrigerador : $("#modelo_refrigerador").val(),
			desc_refrigerador : $("#desc_refrigerador").val(),
			n_serie_refrigerador : $("#n_serie_refrigerador").val(),
			codigo_interno_refrigerador : $("#codigo_interno_refrigerador").val(),
			fecha_fabricacion_refrigerador : $("#fecha_fabricacion_refrigerador").val(),
			direccion_refrigerador : $("#direccion_refrigerador").val(),
			ubicacion_interna_refrigerador : $("#ubicacion_interna_refrigerador").val(),
			voltaje_refrigerador : $("#voltaje_refrigerador").val(),
			potencia_refrigerador : $("#potencia_refrigerador").val(),
			capacidad_refrigerador : $("#capacidad_refrigerador").val(),
			alto_refrigerador : $("#alto_refrigerador").val(),
			peso_refrigerador : $("#peso_refrigerador").val(),
			largo_refrigerador : $("#largo_refrigerador").val(),
			ancho_refrigerador : $("#ancho_refrigerador").val(),
      valor_seteado_hum : $("#valor_seteado_hum").val(),
      humedad_minima : $("#humedad_minima").val(),
      humedad_maxima : $("#humedad_maxima").val(),
      valor_seteado_tem : $("#valor_seteado_tem").val(),
      temperatura_minima : $("#temperatura_minima").val(),
      temperatura_maxima : $("#temperatura_maxima").val(),
      area_refrigerador  : $("#area_refrigerador").val(),
		}

    //alert($("#valor_seteado_hum").val());
		
  	$.post('templates/item/editar_refrigerador.php', datos, function(responsive){
			
			if(responsive == "Si"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'El item ha sido modificado con exito',
          showConfirmButton: false,
					timer:1500
				});
			}
		});
     
  

	});
	

// crea el item del refrigerador
$("#btn_nuevo_item_refrigerador").click(function(){

  let id_empresa_refrigerador = $("#id_empresa").val();

    if (id_empresa_refrigerador == 0) {
      Swal.fire({
             title:'Mensaje',
             text:'No se pudo crear el item, revisa que los datos esten correctamente ingresados',
             icon:'error',
           });
    }else{ 
   
  const datos = {
    nombre_refrigerador : $("#nombre_refrigerador").val(),
    empresa_refrigerador : $("#id_empresa").val(),
    fabricante_refrigerador : $("#fabricante_refrigerador").val(),
    modelo_refrigerador : $("#modelo_refrigerador").val(),
    desc_refrigerador : $("#desc_refrigerador").val(),
    n_serie_refrigerador : $("#n_serie_refrigerador").val(),
    codigo_interno_refrigerador : $("#codigo_interno_refrigerador").val(),
    fecha_fabricacion_refrigerador : $("#fecha_fabricacion_refrigerador").val(),
    direccion_refrigerador : $("#direccion_refrigerador").val(),
    ubicacion_interna_refrigerador : $("#ubicacion_interna_refrigerador").val(),
    voltaje_refrigerador : $("#voltaje_refrigerador").val(),
    potencia_refrigerador : $("#potencia_refrigerador").val(),
    capacidad_refrigerador : $("#capacidad_refrigerador").val(),
    alto_refrigerador : $("#alto_refrigerador").val(),
    peso_refrigerador : $("#peso_refrigerador").val(),
    largo_refrigerador : $("#largo_refrigerador").val(),
    ancho_refrigerador : $("#ancho_refrigerador").val(),
    valor_seteado_hum : $("#valor_seteado_hum").val(),
    humedad_minima : $("#humedad_minima").val(),
    humedad_maxima : $("#humedad_maxima").val(),
    valor_seteado_tem : $("#valor_seteado_tem").val(),
    temperatura_minima : $("#temperatura_minima").val(),
    temperatura_maxima : $("#temperatura_maxima").val(),
    area_refrigerador  : $("#area_refrigerador").val(),
    id_valida : $("#id_valida").val()
   }
   $.post('templates/item/nuevo_refrigerador.php', datos, function(response){
      console.log(response);
      if(response == "Si"){
         Swal.fire({
           title:'Mensaje',
           text:'Se ha creado un refrigerador',
           icon:'success',
           showConfirmButton: false,
           timer:1500
         });
         setear_campos();
      }else{
        Swal.fire({
          title:'Mensaje',
          text:'No se ha podido crear, Contacta con el administrador',
          icon:'error',
          timer:1500
        });
      }
  });
 
}
  
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
  let direccion = $(this).attr('data-direccion');
	$("#buscador_empresa").val(nombre_empresa);
  $("#id_empresa").val(id_empresa);
  $("#direccion_refrigerador").val(direccion);
	$("#aqui_resultados_empresa").hide();

})
