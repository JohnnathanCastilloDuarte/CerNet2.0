$(document).ready(function(){

  let id_item = $("#id_item_ultrafreezer").val();
  if(id_item.length == 0){
    $("#btn_crear_item_ultrafreezer").show();
    $("#btn_editar_item_ultrafreezer").hide();
  }else{
   $("#btn_crear_item_ultrafreezer").hide();
   $("#btn_editar_item_ultrafreezer").show();
 }

});


function setear_campos(){
       $("#id_item_ultrafreezer").val('');
       $("#id_item_2_ultrafreezer").val('');
       $("#empresa_ultrafreezer").val(0);
       $("#nombre_ultrafreezer").val('');
       $("#fabricante_ultrafreezer").val('');
       $("#modelo_ultrafreezer").val('');
       $("#desc_ultrafreezer").val('');
       $("#n_serie_ultrafreezer").val('');
       $("#codigo_interno_ultrafreezer").val('');
       $("#fecha_fabricacion_ultrafreezer").val('');
       $("#direccion_ultrafreezer").val('');
       $("#ubicacion_interna_ultrafreezer").val('');
       $("#voltaje_ultrafreezer").val('');
       $("#potencia_ultrafreezer").val('');
       $("#capacidad_ultrafreezer").val('');
       $("#alto_ultrafreezer").val('');
       $("#peso_ultrafreezer").val('');
       $("#largo_ultrafreezer").val('');
       $("#ancho_ultrafreezer").val('');
       $("#valor_seteado_tem_ultrafreezer").val('');
       $("#temperatura_minima_ultrafreezer").val('');
       $("#temperatura_maxima_ultrafreezer").val('');
       $("#valor_seteado_hum_ultrafreezer").val('');
       $("#humedad_minima_ultrafreezer").val('');
       $("#humedad_maxima_ultrafreezer").val('');
       $("#id_valida").val('');
}

(function(){
	
	$("#btn_editar_item_ultrafreezer").click(function(){

		
		const datos = {
      id_item_ultrafreezer : $("#id_item_ultrafreezer").val(),
      id_item_2_ultrafreezer : $("#id_item_2_ultrafreezer").val(),
      empresa_ultrafreezer : $("#id_empresa").val(),
      nombre_ultrafreezer : $("#nombre_ultrafreezer").val(),
      fabricante_ultrafreezer : $("#fabricante_ultrafreezer").val(),
      modelo_ultrafreezer : $("#modelo_ultrafreezer").val(),
      desc_ultrafreezer : $("#desc_ultrafreezer").val(),
      n_serie_ultrafreezer : $("#n_serie_ultrafreezer").val(),
      codigo_interno_ultrafreezer : $("#codigo_interno_ultrafreezer").val(),
      fecha_fabricacion_ultrafreezer : $("#fecha_fabricacion_ultrafreezer").val(),
      direccion_ultrafreezer : $("#direccion_ultrafreezer").val(),
      ubicacion_interna_ultrafreezer : $("#ubicacion_interna_ultrafreezer").val(),
      voltaje_ultrafreezer : $("#voltaje_ultrafreezer").val(),
      potencia_ultrafreezer : $("#potencia_ultrafreezer").val(),
      capacidad_ultrafreezer : $("#capacidad_ultrafreezer").val(),
      alto_ultrafreezer : $("#alto_ultrafreezer").val(),
      peso_ultrafreezer : $("#peso_ultrafreezer").val(),
      largo_ultrafreezer : $("#largo_ultrafreezer").val(),
      ancho_ultrafreezer : $("#ancho_ultrafreezer").val(),
      valor_seteado_tem_ultrafreezer : $("#valor_seteado_tem_ultrafreezer").val(),
      temperatura_minima_ultrafreezer : $("#temperatura_minima_ultrafreezer").val(),
      temperatura_maxima_ultrafreezer : $("#temperatura_maxima_ultrafreezer").val(),
      valor_seteado_hum_ultrafreezer : $("#valor_seteado_hum_ultrafreezer").val(),
      humedad_minima_ultrafreezer : $("#humedad_minima_ultrafreezer").val(),
      humedad_maxima_ultrafreezer : $("#humedad_maxima_ultrafreezer").val(),
      id_valida :$("#id_valida").val()
    }

    $.post('templates/item/editar_ultrafreezer.php', datos, function(response){
     if(response == "Si"){
      Swal.fire({
       position:'center',
       icon:'success',
       title:'El item ha sido modificado con exito',
       showConfirmButton: false,
       timer:1500
     });
    }else{
       Swal.fire({
       position:'center',
       icon:'error',
       title:'Ha ocurrido un error, contacta con el administrador',
       showConfirmButton: false,
       timer:1500
     });
    }
  });


  });
  


$(document).on('click','#seleccionar_empresa',function(){

	let id_empresa = $(this).attr('data-id');
	let nombre_empresa = $(this).attr('data-name');
	$("#buscador_empresa").val(nombre_empresa);
  $("#id_empresa").val(id_empresa);

	$("#aqui_resultados_empresa").hide();

}) 


  $("#btn_crear_item_ultrafreezer").click(function(){
    
    let id_empresa_ultrafreezer = $("#empresa_ultrafreezer").val();
    //validacion de campos ////
    if (id_empresa_ultrafreezer == 0){
      Swal.fire({
             title:'Mensaje',
             text:'No se pudo crear el item, revisa que los datos esten correctamente ingresados',
             icon:'error',
           });
    }else{ 
   const datos = {
        nombre_ultrafreezer : $("#nombre_ultrafreezer").val(),
        empresa_ultrafreezer : $("#id_empresa").val(),
        fabricante_ultrafreezer : $("#fabricante_ultrafreezer").val(),
        modelo_ultrafreezer : $("#modelo_ultrafreezer").val(),
        desc_ultrafreezer : $("#desc_ultrafreezer").val(),
        n_serie_ultrafreezer : $("#n_serie_ultrafreezer").val(),
        codigo_interno_ultrafreezer : $("#codigo_interno_ultrafreezer").val(),
        fecha_fabricacion_ultrafreezer : $("#fecha_fabricacion_ultrafreezer").val(),
        direccion_ultrafreezer : $("#direccion_ultrafreezer").val(),
        ubicacion_interna_ultrafreezer : $("#ubicacion_interna_ultrafreezer").val(),
        voltaje_ultrafreezer : $("#voltaje_ultrafreezer").val(),
        potencia_ultrafreezer : $("#potencia_ultrafreezer").val(),
        capacidad_ultrafreezer : $("#capacidad_ultrafreezer").val(),
        alto_ultrafreezer : $("#alto_ultrafreezer").val(),
        peso_ultrafreezer : $("#peso_ultrafreezer").val(),
        largo_ultrafreezer : $("#largo_ultrafreezer").val(),
        ancho_ultrafreezer : $("#ancho_ultrafreezer").val(),
        valor_seteado_tem_ultrafreezer : $("#valor_seteado_tem_ultrafreezer").val(),
        temperatura_minima_ultrafreezer : $("#temperatura_minima_ultrafreezer").val(),
        temperatura_maxima_ultrafreezer : $("#temperatura_maxima_ultrafreezer").val(),
        valor_seteado_hum_ultrafreezer : $("#valor_seteado_hum_ultrafreezer").val(),
        humedad_minima_ultrafreezer : $("#humedad_minima_ultrafreezer").val(),
        humedad_maxima_ultrafreezer : $("#humedad_maxima_ultrafreezer").val(),
        id_valida :$("#id_valida").val()
      }

      $.ajax({
       type:'POST',
       url:'templates/item/nuevo_ultrafreezer.php',
       data:datos,
       success:function(response){
         if(response == "Si"){
           Swal.fire({
             title:'Mensaje',
             text:'Se ha creado un utrafreezer correctamente',
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
            showConfirmButton: false,
            timer:1500

          });
        }

      }
    });

    }



    });

}())


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