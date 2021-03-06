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
      $("#nombre_sala_limpia").val('')
      $("#id_empresa").val('')
      $("#clasificacion_oms").val('')
      $("#clasificacion_iso").val('')
      $("#direccion_sala_limpia").val('')
      $("#ubicacion_interna_sala_limpia").val('')
      $("#area_interna_sala_limpia").val('')
      $("#area_m2_sala_limpia").val('')
      $("#volumen_m3_sala_limpia").val('')
      $("#claudal_m3h").val('')
      $("#ren_hr").val('')
      $("#temperatura").val('')
      $("#hum_relativa").val('')
      $("#lux").val('')
      $("#ruido_dba").val('')
      $("#presion_sala").val('')
      $("#presion_versus").val('')
      $("#tipo_presion").val('')
      $("#puntos_muestreo").val('')
      $("#buscador_empresa").val('')
      $("#codigo").val('')
      $("#estado_sala").val('')
}

(function(){
  
  $("#btn_editar_item_sala_limpia").click(function(){

    
    const datos = {
        nombre_sala_limpia      : $("#nombre_sala_limpia").val(),
        empresa_sala_limpia     : $("#id_empresa").val(),
        clasificacion_oms       : $("#clasificacion_oms").val(),
        clasificacion_iso       : $("#clasificacion_iso").val(),
        direccion_sala_limpia   : $("#direccion_sala_limpia").val(),
        area_interna_sala_limpia: $("#area_interna_sala_limpia").val(),
        ubicacion_interna_sala_limpia : $("#ubicacion_interna_sala_limpia").val(),
        codigo_interna_sala_limpia : $("#codigo_interna_sala_limpia").val(),
        estado_sala             : $("#estado_sala").val(),
      
        temperatura_minima      : $("#temperatura_minima").val(),
        temperatura_maxima      : $("#temperatura_maxima").val(),
        temperatura_informativa : $("#temperatura_informativa").val(),
        hum_relativa_minima     : $("#hum_relativa_minima").val(),
        hum_relativa_maxima     : $("#hum_relativa_maxima").val(),
        humedad_informativa     : $("#temperatura_informativa").val(),
      
        area_m2_sala_limpia     : $("#area_m2_sala_limpia").val(),
        volumen_m3_sala_limpia  : $("#volumen_m3_sala_limpia").val(),
        ren_hr                  : $("#ren_hr").val(),
        lux                     : $("#lux").val(),
        ruido_dba               : $("#ruido_dba").val(),
        presion_sala            : $("#presion_sala").val(),
        presion_versus          : $("#presion_versus").val(),
        tipo_presion            : $("#tipo_presion").val(),
        puntos_muestreo         : $("#puntos_muestreo").val(),
        cantidad_extracciones   : $("#cantidad_extracciones").val(),
        cantidad_inyecciones    : $("#cantidad_inyecciones").val(),


        id_item_sala_limpia     : $("#id_item_sala_limpia").val(),
        id_item_2_sala_limpia   : $("#id_item_2_sala_limpia").val(),
    }
    
    if (campos_vacios(datos) == true){
        console.log("si");
          $.ajax({
           type:'POST',
           url:'templates/item/editar_sala_limpia.php',
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
      }else{
        console.log("no");
      }


    //campos_vacios(datos);

      

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
        nombre_sala_limpia      : $("#nombre_sala_limpia").val(),
        empresa_sala_limpia     : $("#id_empresa").val(),
        clasificacion_oms       : $("#clasificacion_oms").val(),
        clasificacion_iso       : $("#clasificacion_iso").val(),
        direccion_sala_limpia   : $("#direccion_sala_limpia").val(),
        codigo_interna_sala_limpia : $("#codigo_interna_sala_limpia").val(),
        area_interna_sala_limpia: $("#area_interna_sala_limpia").val(),
        area_m2_sala_limpia     : $("#area_m2_sala_limpia").val(),
        volumen_m3_sala_limpia  : $("#volumen_m3_sala_limpia").val(),
        ren_hr                  : $("#ren_hr").val(),
        temperatura_min             : $("#temperatura_minima").val(),
        hum_relativa_min            : $("#hum_relativa_minima").val(),
        temperatura_max             : $("#temperatura_maxima").val(),
        hum_relativa_max            : $("#hum_relativa_maxima").val(),
        lux                     : $("#lux").val(),
        ruido_dba               : $("#ruido_dba").val(),
        presion_sala            : $("#presion_sala").val(),
        presion_versus          : $("#presion_versus").val(),
        tipo_presion            : $("#tipo_presion").val(),
        puntos_muestreo         : $("#puntos_muestreo").val(),
        estado_sala             : $("#estado_sala").val(),
        id_valida                :$("#id_valida").val(),
        temperatura_informativa : $("#temperatura_informativa").val(),
        humedad_informativa : $("#humedad_informativa").val(),
        cantidad_extracciones : $("#cantidad_extracciones").val(),
        cantidad_inyecciones : $("#cantidad_inyecciones").val()
      }

      if (campos_vacios(datos) == true){
        console.log("si");
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
      }else{
        console.log("no");
      }




     

    }



    });

}())