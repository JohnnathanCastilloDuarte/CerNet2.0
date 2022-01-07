$(document).ready(function(){

  let id_item = $("#id_item_sala_limpia").val();
  if(id_item.length == 0){
    $("#btn_crear_item_sala_limpia").show();
    $("#btn_editar_item_sala_limpia").hide();
  }else{
   $("#btn_crear_item_sala_limpia").hide();
   $("#btn_editar_item_sala_limpia").show();
 }

});


function setear_campos(){
       $("#id_item_sala_limpia").val('');
       $("#id_item_2_sala_limpia").val('');
       $("#empresa_sala_limpia").val(0);
       $("#nombre_sala_limpia").val('');
       $("#fabricante_sala_limpia").val('');
       $("#modelo_sala_limpia").val('');
       $("#desc_sala_limpia").val('');
       $("#n_serie_sala_limpia").val('');
       $("#codigo_interno_sala_limpia").val('');
       $("#fecha_fabricacion_sala_limpia").val('');
       $("#direccion_sala_limpia").val('');
       $("#ubicacion_interna_sala_limpia").val('');
       $("#voltaje_sala_limpia").val('');
       $("#potencia_sala_limpia").val('');
       $("#capacidad_sala_limpia").val('');
       $("#alto_sala_limpia").val('');
       $("#peso_sala_limpia").val('');
       $("#largo_sala_limpia").val('');
       $("#ancho_sala_limpia").val('');
       $("#valor_seteado_tem_sala_limpia").val('');
       $("#temperatura_minima_sala_limpia").val('');
       $("#temperatura_maxima_sala_limpia").val('');
       $("#valor_seteado_hum_sala_limpia").val('');
       $("#humedad_minima_sala_limpia").val('');
       $("#humedad_maxima_sala_limpia").val('');
       $("#id_valida").val('');
}

(function(){
	
	$("#btn_editar_item_sala_limpia").click(function(){

		
		const datos = {
        nombre_sala_limpia     : $("#nombre_sala_limpia").val(),
        empresa_sala_limpia    : $("#empresa_sala_limpia").val(),
        area_sala_limpia       : $("#area_sala_limpia").val(),
        codigo_sala_limpia     : $("#codigo_sala_limpia").val(),
        area_m2_sala_limpia    : $("#area_m2_sala_limpia").val(),
        volumen_m2_sala_limpia : $("#volumen_m2_sala_limpia").val(),
        estado_sala_limpia     : $("#estado_sala_limpia").val(),
        id_item_sala_limpia    : $("#id_item_sala_limpia").val(),
        id_item_2_sala_limpia  : $("#id_item_2_sala_limpia").val(),

        id_valida              :$("#id_valida").val()
    }

    $.post('templates/item/editar_sala_limpia.php', datos, function(response){
      console.log(response);
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


  $("#btn_crear_item_sala_limpia").click(function(){
    
    let id_empresa_sala_limpia = $("#empresa_sala_limpia").val();
    //validacion de campos ////
    if (id_empresa_sala_limpia == 0){
      Swal.fire({
             title:'Mensaje',
             text:'No se pudo crear el item, revisa que los datos esten correctamente ingresados',
             icon:'error',
           });
    }else{ 
   const datos = {
        nombre_sala_limpia     : $("#nombre_sala_limpia").val(),
        empresa_sala_limpia    : $("#empresa_sala_limpia").val(),
        area_sala_limpia       : $("#area_sala_limpia").val(),
        codigo_sala_limpia     : $("#codigo_sala_limpia").val(),
        area_m2_sala_limpia    : $("#area_m2_sala_limpia").val(),
        volumen_m2_sala_limpia : $("#volumen_m2_sala_limpia").val(),
        estado_sala_limpia     : $("#estado_sala_limpia").val(),

        id_valida              :$("#id_valida").val()
      }

      $.ajax({
       type:'POST',
       url:'templates/item/nueva_sala_limpia.php',
       data:datos,
       success:function(response){
        console.log(response);
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