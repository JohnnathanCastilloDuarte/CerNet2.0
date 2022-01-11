
var id_valida = $("#id_valida").val();
var id_incubadora = $("#id_incubadora").val();
var id_item = $("#id_item_2").val();

if(id_item.length == 0){
    $("#btn_editar_item_incubadora").hide();
    $("#btn_nuevo_item_incubadora").show();
}else{
    $("#btn_editar_item_incubadora").show();
    $("#btn_nuevo_item_incubadora").hide();
}

function setear_campos(){
     $("#nombre_incubadora").val('');
     $("#id_empresa").val('');
     $("#marca_incubadora").val('');
     $("#modelo_incubadora").val('');
     $("#desc_incubadora").val('');
     $("#n_serie_incubadora").val('');
     $("#fecha_fabricacion_incubadora").val('');
     $("#direccion_incubadora").val('');
     $("#ubicacion_interna_incubadora").val('');
     $("#area_interna_incubadora").val('');
     $("#valor_seteado").val('');
     $("#limite_maximo").val(''); 
     $("#limite_minimo").val('');
}

/////////// EVENTO PARA CREAR CAMARA CONGELADA
$("#btn_nuevo_item_incubadora").click(function(){

    let nombre_incubadora        = $("#nombre_incubadora").val();
    let id_empresa               =  $("#id_empresa").val();
    let marca_incubadora         = $("#marca_incubadora").val();
    let modelo_incubadora        = $("#modelo_incubadora").val();
    let desc_incubadora          = $("#desc_incubadora").val();
    let n_serie_incubadora       = $("#n_serie_incubadora").val();
    let fecha_fabricacion_incubadora     = $("#fecha_fabricacion_incubadora").val();
    let direccion_incubadora             = $("#direccion_incubadora").val();
    let ubicacion_interna_incubadora     = $("#ubicacion_interna_incubadora").val();
    let area_interna_incubadora          = $("#area_interna_incubadora").val();
    let valor_seteado                    = $("#valor_seteado").val();
    let limite_maximo                    = $("#limite_maximo").val(); 
    let limite_minimo                    = $("#limite_minimo").val();

    const datos = {
        nombre_incubadora,
        id_empresa,
        marca_incubadora,
        modelo_incubadora,
        desc_incubadora,
        n_serie_incubadora,
        fecha_fabricacion_incubadora,
        direccion_incubadora,
        ubicacion_interna_incubadora,
        area_interna_incubadora,
        valor_seteado,
        limite_maximo,
        limite_minimo,
        id_valida : $("#id_valida").val()
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/item/nueva_incubadora.php',
        success:function(response){
          console.log(response);
          if (response == "SI") {
             Swal.fire({
               title:'Mensaje',
               text:'Se ha creado la incubadora correctamente',
               icon:'success',
               showConfirmButton: false,
               timer:1500
           });
             setear_campos();
          } else {
             Swal.fire({
               title:'Mensaje',
               text:'Error al crear el item',
               icon:'error',
               showConfirmButton: false,
               timer:1500
           });
          }
          
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
  $("#direccion_incubadora").val(direccion);
  $("#buscador_empresa").val(nombre_empresa);
  $("#id_empresa").val(id_empresa);

  $("#aqui_resultados_empresa").hide();

});



/////// EVENTO PARA ACTUALIZAR CAMARA CONGELADA

$("#btn_editar_item_incubadora").click(function(){

    let nombre_incubadora                = $("#nombre_incubadora").val();
    let id_empresa                       =  $("#id_empresa").val();
    let marca_incubadora                 = $("#marca_incubadora").val();
    let modelo_incubadora                = $("#modelo_incubadora").val();
    let desc_incubadora                  = $("#desc_incubadora").val();
    let n_serie_incubadora               = $("#n_serie_incubadora").val();
    let fecha_fabricacion_incubadora     = $("#fecha_fabricacion_incubadora").val();
    let direccion_incubadora             = $("#direccion_incubadora").val();
    let ubicacion_interna_incubadora     = $("#ubicacion_interna_incubadora").val();
    let area_interna_incubadora          = $("#area_interna_incubadora").val();
    let valor_seteado                    = $("#valor_seteado").val();
    let limite_maximo                    = $("#limite_maximo").val(); 
    let limite_minimo                    = $("#limite_minimo").val();

    const datos = {
        nombre_incubadora,
        id_empresa,
        marca_incubadora,
        modelo_incubadora,
        desc_incubadora,
        n_serie_incubadora,
        fecha_fabricacion_incubadora,
        direccion_incubadora,
        ubicacion_interna_incubadora,
        area_interna_incubadora,
        valor_seteado,
        limite_maximo,
        limite_minimo,
        id_item,
        id_valida : $("#id_valida").val()
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/item/editar_incubadora.php',
        success:function(response){
           console.log(response);
            if(response == "SI"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha editado la incubadora correctamente',
                    icon:'success',
                    showConfirmButton: false,
                    timer:1500
                });
            }else{
              Swal.fire({
                    title:'Mensaje',
                    text:'Error al editar incubadora ',
                    icon:'error',
                    showConfirmButton: false,
                    timer:1500
                });
            }
        }
    });
})  