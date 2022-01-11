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
       $("#id_empresa").val('');
       $("#buscador_empresa").val('');
       $("#nombre_sala_limpia").val('');
       $("#area_sala_limpia").val('');
       $("#codigo_sala_limpia").val('');
       $("#area_m2_sala_limpia").val('');
       $("#volumen_m2_sala_limpia").val('');
       $("#estado_sala_limpia").val('');
       $("#direccion_sala_limpia").val('');
       $("#ubicacion_interna_sala_limpia").val('');
       $("#area_interna_incubadora").val('');
       $("#especificacion_1_temp").val('');
       $("#especificacion_2_temp").val('');
       $("#especificacion_1_hum").val('');
       $("#especificacion_2_hum").val('');
}

(function(){
	
	$("#btn_editar_item_sala_limpia").click(function(){

		
		const datos = {
        nombre_sala_limpia      : $("#nombre_sala_limpia").val(),
        empresa_sala_limpia     : $("#id_empresa").val(),
        area_sala_limpia        : $("#area_sala_limpia").val(),
        codigo_sala_limpia      : $("#codigo_sala_limpia").val(),
        area_m2_sala_limpia     : $("#area_m2_sala_limpia").val(),
        volumen_m2_sala_limpia  : $("#volumen_m2_sala_limpia").val(),
        estado_sala_limpia      : $("#estado_sala_limpia").val(),
        id_item_sala_limpia     : $("#id_item_sala_limpia").val(),
        id_item_2_sala_limpia   : $("#id_item_2_sala_limpia").val(),
        direccion_sala_limpia   : $("#direccion_sala_limpia").val(),
        ubicacion_interna_sala_limpia : $("#ubicacion_interna_sala_limpia").val(),
        area_interna_incubadora : $("#area_interna_incubadora").val(),
        especificacion_1_temp   : $("#especificacion_1_temp").val(),
        especificacion_2_temp   : $("#especificacion_2_temp").val(),
        especificacion_1_hum    : $("#especificacion_1_hum").val(),
        especificacion_2_hum    : $("#especificacion_2_hum").val(),

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
  $("#direccion_sala_limpia").val(direccion);
  $("#buscador_empresa").val(nombre_empresa);
  $("#id_empresa").val(id_empresa);

  $("#aqui_resultados_empresa").hide();

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
        nombre_sala_limpia       : $("#nombre_sala_limpia").val(),
        empresa_sala_limpia      : $("#id_empresa").val(),
        area_sala_limpia         : $("#area_sala_limpia").val(),
        codigo_sala_limpia       : $("#codigo_sala_limpia").val(),
        area_m2_sala_limpia      : $("#area_m2_sala_limpia").val(),
        volumen_m2_sala_limpia   : $("#volumen_m2_sala_limpia").val(),
        estado_sala_limpia       : $("#estado_sala_limpia").val(),
        direccion_sala_limpia    : $("#direccion_sala_limpia").val(),
        ubicacion_interna_sala_limpia : $("#ubicacion_interna_sala_limpia").val(),
        area_interna_sala_limpia : $("#area_interna_sala_limpia").val(),
        especificacion_1_temp    : $("#especificacion_1_temp").val(),
        especificacion_2_temp    : $("#especificacion_2_temp").val(),
        especificacion_1_hum     : $("#especificacion_1_hum").val(),
        especificacion_2_hum     : $("#especificacion_2_hum").val(),

        id_valida                :$("#id_valida").val()
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
             text:'Se ha creado una sala limpia correctamente',
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