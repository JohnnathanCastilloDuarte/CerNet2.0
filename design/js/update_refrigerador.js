
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


////////////// BOTON CREACIÓN DE REFRIGERADOR
(function(){
	
	$("#btn_editar_item_refrigerador").click(function(){
		
		
		const datos = {
		 	id_item_refrigerador : $("#id_item_refrigerador").val(),
		 	id_item,
		 	nombre_refrigerador : $("#nombre_refrigerador").val(),
		 	empresa_refrigerador : $("#empresa_refrigerador").val(),
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
			id_valida
		}
		
		$.post('templates/item/editar_refrigerador.php', datos, function(responsive){
			
      console.log(responsive);
			if(responsive == "Si"){
				Swal.fire({
					position:'center',
					icon:'success',
					title:'El item ha sido modificado con exito',
          showConfirmButton: false,
					timer:1000
				});
			}
		});
	});
	
}())

// crea el item del refrigerador
$("#btn_nuevo_item_refrigerador").click(function(){
   
  const datos = {
    nombre_refrigerador : $("#nombre_refrigerador").val(),
    empresa_refrigerador : $("#empresa_refrigerador").val(),
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
    id_valida
   }
  $.post('templates/item/nuevo_refrigerador.php', datos, function(response){
      
      if(response == "Si"){
         Swal.fire({
           title:'Mensaje',
           text:'Se ha creado un refrigerador',
           icon:'success',
           timer:2000
         });
      }else{
        Swal.fire({
          title:'Mensaje',
          text:'No se ha podido crear, Contacta con el administrador',
          icon:'error',
          
        });
      }
  })
  
})