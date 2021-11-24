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
      

}


(function(){

  
	$("#btn_editar_item_estufa").click(function(){

		const datos = {
		 	id_item_estufa : $("#id_item_estufa").val(),
		 	id_item_2,
		 	nombre_estufa : $("#nombre_estufa").val(),
		 	empresa_estufa : $("#empresa_estufa").val(),
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

  
  let empresa_estufas = $("#empresa_estufa").val();
  const datos = {
    nombre_estufa : $("#nombre_estufa").val(),
    empresa_estufa : $("#empresa_estufa").val(),
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
    id_valida
  }
  
  $.post('templates/item/nueva_estufa.php',datos,function(response){
      
    if(response == "Si"){
      Swal.fire({
        title:'Mensaje',
        text:'Se ha creado la estufa correctamente',
        icon:'success',
        showConfirmButton: false,
        timer:1000
      });
      
    }
  setear_campos()
    
  });
  
});