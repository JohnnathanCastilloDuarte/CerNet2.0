var id_valida = $("#id_valida").val();
var id_aire_comprimido = $("#id_aire_comprimido").val();

//////// FUNCIONES A EJECUTAR
valida_botones_aire_comprimido();

////////////FUNCION QUE VALIDA LOS BOTONES DEL AIRE COMPRIMIDO

function valida_botones_aire_comprimido(){
  
  if(id_aire_comprimido.length == 0){
    $("#btn_nuevo_item_aire_comprimido").show(); 
    $("#btn_editar_item_aire_comprimido").hide();
  }else{
    $("#btn_nuevo_item_aire_comprimido").hide(); 
    $("#btn_editar_item_aire_comprimido").show();
  }
}

/////////// CREACIÓN DEL ITEM ESTUFA
$("#btn_nuevo_item_aire_comprimido").click(function(){
  
  //let empresa_aire_comprimido = 
  const datos = {
    id_empresa : $("#id_empresa").val(),
    nombre_aire_comprimido : $("#nombre_aire_comprimido").val(),
    nombre_sala : $("#nombre_sala").val(),
	area : $("#area").val(),
	punto_aire_comprimido : $("#punto_aire_comprimido").val(),
	codigo_punto : $("#codigo_punto").val(),
	grado_iso : $("#grado_iso").val(),
	direccion_aire_comprimido : $("#direccion_aire_comprimido").val(),
	id_valida : id_valida
  }
  
  $.post('templates/item/nuevo_aire_comprimido.php',datos,function(response){
      console.log(response)
    if(response == "si"){
      Swal.fire({
        title:'Mensaje',
        text:'Se ha creado la el item',
        icon:'success',
        showConfirmButton: false,
        timer:1000
      });
      setear_campos()
    }else{
      Swal.fire({
        title:'Mensaje',
        text:'No se ha creado el item',
        icon:'error',
        showConfirmButton: false,
        timer:1000
      });
    }
  
    
  });
  
});


/////////// EDICIÓN DEL ITEM ESTUFA
$("#btn_editar_item_aire_comprimido").click(function(){
  
  //let empresa_aire_comprimido = 
  const datos = {
    id_empresa : $("#id_empresa").val(),
    nombre_aire_comprimido : $("#nombre_aire_comprimido").val(),
    nombre_sala : $("#nombre_sala").val(),
	area : $("#area").val(),
	punto_aire_comprimido : $("#punto_aire_comprimido").val(),
	codigo_punto : $("#codigo_punto").val(),
	grado_iso : $("#grado_iso").val(),
	direccion_aire_comprimido : $("#direccion_aire_comprimido").val(),
	id_aire_comprimido : $("#id_aire_comprimido").val(),
	id_item : $("#id_item").val(),
  }
  
  $.post('templates/item/editar_aire_comprimido.php',datos,function(response){
      console.log(response)
    if(response == "si"){
      Swal.fire({
        title:'Mensaje',
        text:'Se ha modificado el item',
        icon:'success',
        showConfirmButton: false,
        timer:1000
      });
      setear_campos()
    }else{
      Swal.fire({
        title:'Mensaje',
        text:'No se ha modificado el item',
        icon:'error',
        showConfirmButton: false,
        timer:1000
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
  //console.log(direccion);
	$("#buscador_empresa").val(nombre_empresa);
  $("#id_empresa").val(id_empresa);
  $("#direccion_aire_comprimido").val(direccion);
  $("#aqui_resultados_empresa").hide();

})