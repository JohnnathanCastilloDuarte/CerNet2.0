/////////// CAMPOS A OCULTAR
$("#btn_editar_item_filtro").hide()
$("#btn_crear_item_filtro").hide()


//////////////// VARIABLES GLOBALES
var id_item_filtro = $("#id_item_filtro").val();
var id_valida_filtro = $("#id_valida").val();
var id_filtro  = $("#id_filtro").val();

//////////// VALIDADOR DE LOS BOTONES DE CREACIÓN // ACTUALIZACIÓN
$(document).ready(function(){
  
  if(id_item_filtro.length == 0){
    $("#btn_crear_item_filtro").show()
  }else{
    $("#btn_editar_item_filtro").show()
  }
  
})


///////////////////////////////////// FUNCTIONS

function limpiar_campos_filtro(){
 
  $("#empresa_filtro").val('');
  $("#marca_filtro").val('');
  $("#modelo_filtro").val('');
  $("#serie_filtro").val('');
  $("#cantidad_filtros_filtro").val('');
  $("#ubicacion_filtro").val('');
  $("#ubicado_en_filtro").val('');
  $("#tipo_filtro").val('');
  $("#lugar_filtro").val('');
  $("#penetracion_filtro").val('');   
}

$("#btn_crear_item_filtro").click(function(){
  
  let nombre_filtro = $("#nombre_filtro").val();
  let empresa_filtro = $("#empresa_filtro").val();
  let marca_filtro = $("#marca_filtro").val();
  let modelo_filtro = $("#modelo_filtro").val();
  let serie_filtro = $("#serie_filtro").val();
  let cantidad_filtros_filtro = $("#cantidad_filtros_filtro").val();
  let ubicacion_filtro = $("#ubicacion_filtro").val();//es la dirección
  let ubicado_en_filtro = $("#ubicado_en_filtro").val();
  let lugar_filtro = $("#lugar_filtro").val();
  let tipo_filtro = $("#tipo_filtro").val();
  let penetracion_filtro = $("#penetracion_filtro").val();
  let id_tipo_filtro = $("#id_tipo_filtro").val();
  
  const datos = {
    nombre_filtro,
    empresa_filtro,
    marca_filtro,
    modelo_filtro,
    serie_filtro,
    cantidad_filtros_filtro,
    ubicacion_filtro,
    ubicado_en_filtro,
    lugar_filtro,
    tipo_filtro,
    penetracion_filtro,
    id_tipo_filtro,
    id_valida_filtro
  }
  
  $.ajax({
    type:'POST',
    url:'templates/item/nuevo_filtro.php',
    data:datos,
    success:function(response){
      if(response == "Si"){
        
        Swal.fire({
          title:'Mensaje',
          text:'Se ha creado el filtro, correctamente!',
          icon:'success',
          showConfirmButton: false,
          timer:1500
        });
        
        limpiar_campos_filtro();
      }else{
        Swal.fire({
          title:'Mensaje',
          text:'Ha ocurrido un error, contacta con el administrador ',
          icon:'danger',
          showConfirmButton: false,
          timer:1500
        });
      }
    }
  })
  
});



/////////////////////// EDICIÓN DE FILTRAR 
$("#btn_editar_item_filtro").click(function(){
  
  let nombre_filtro = $("#nombre_filtro").val();
  let empresa_filtro = $("#empresa_filtro").val();
  let marca_filtro = $("#marca_filtro").val();
  let modelo_filtro = $("#modelo_filtro").val();
  let serie_filtro = $("#serie_filtro").val();
  let cantidad_filtros_filtro = $("#cantidad_filtros_filtro").val();
  let ubicacion_filtro = $("#ubicacion_filtro").val();//es la dirección
  let ubicado_en_filtro = $("#ubicado_en_filtro").val();
  let lugar_filtro = $("#lugar_filtro").val();
  let tipo_filtro = $("#tipo_filtro").val();
  let penetracion_filtro = $("#penetracion_filtro").val();
  let id_tipo_filtro = $("#id_tipo_filtro").val();

  const datos = {
    nombre_filtro,
    empresa_filtro,
    marca_filtro,
    modelo_filtro,
    serie_filtro,
    cantidad_filtros_filtro,
    ubicacion_filtro,
    ubicado_en_filtro,
    lugar_filtro,
    tipo_filtro,
    penetracion_filtro,
    id_tipo_filtro,
    id_valida_filtro,
    id_item_filtro,
    id_filtro
  }
  
  
  $.ajax({
    type:'POST',
    url:'templates/item/editar_filtro.php',
    data:datos,
    success:function(response){
      if(response == "Si"){   
        Swal.fire({
          title:'Mensaje',
          text:'¡Se ha Actualizado el filtro, correctamente!',
          icon:'success',
          showConfirmButton: false,
          timer:1000,
          
        });
      }else{
        Swal.fire({
          title:'Mensaje',
          text:'Ha ocurrido un error, contacta con el administrador ',
          icon:'danger',
          showConfirmButton: false,
          timer:1500
        });
      }
    }
  })
  
});