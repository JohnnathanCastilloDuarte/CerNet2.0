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

//// FUNCION PARA EDITAR EL FREEZER
(function(){
	
	$("#btn_editar_item_freezer").click(function(){
		
		
		const datos = {
		 	id_item_freezer : $("#id_item_freezer").val(),
		 	id_item_2,
		 	nombre_freezer : $("#nombre_freezer").val(),
		 	empresa_freezer : $("#empresa_freezer").val(),
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
      valor_seteado_hum : $("#valor_seteado_hum").val(),
      humedad_minima : $("#humedad_minima").val(),
      humedad_maxima : $("#humedad_maxima").val(),
      valor_seteado_tem : $("#valor_seteado_tem").val(),
      temperatura_minima : $("#temperatura_minima").val(),
      temperatura_maxima : $("#temperatura_maxima").val(),
			id_valida 
		}
		
		$.post('templates/item/editar_freezer.php', datos, function(e){
			
    
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

$("#btn_nuevo_item_freezer").click(function(){
  
    const datos = {
			nombre_freezer : $("#nombre_freezer").val(),
		 	empresa_freezer : $("#empresa_freezer").val(),
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
              timer:2000
            });
          }else{
            Swal.fire({
              title:'Mensaje',
              text:'No ha se podido crear el registro, contacta al administrador',
              icon:'success',
              timer:2000
            });
          }
      
    });
    
})