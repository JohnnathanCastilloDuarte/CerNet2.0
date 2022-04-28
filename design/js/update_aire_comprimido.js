var id_valida = $("#id_valida").val();
var id_item = $("#id_item").val();

$("#asignar_aires").hide();
//////// FUNCIONES A EJECUTAR
valida_botones_aire_comprimido();
validarBotones();
listarItems();

////////////FUNCION QUE VALIDA LOS BOTONES DEL AIRE COMPRIMIDO

function valida_botones_aire_comprimido(){
  
  if(id_item.length == 0){
    $("#btn_nuevo_item_aire_comprimido").show(); 
    $("#btn_editar_item_aire_comprimido").hide();
  }else{
    $("#btn_nuevo_item_aire_comprimido").hide(); 
    $("#btn_editar_item_aire_comprimido").show();
    $("#asignar_aires").show();
  }
}

/////////// CREACIÓN DEL ITEM AIRE COMPRIMIDO
$("#btn_nuevo_item_aire_comprimido").click(function(){
  
  let accion = 'crear_item'; 
  const datos = {
    id_empresa : $("#id_empresa").val(),
    nombre_aire_comprimido : $("#nombre_aire_comprimido").val(),
    accion : accion,
    id_valida : id_valida
  }
  
  $.post('templates/item/nuevo_aire_comprimido.php',datos,function(response){
      console.log(response)

    if(response){
      $("#id_item").val(response);
      Swal.fire({
        title:'Mensaje',
        text:'Se ha creado la el item',
        icon:'success',
        showConfirmButton: false,
        timer:1000
      });
      //UNA VES SE CREE EL ITEM GENERAL SE OCULTA EL BOTON DE CREAR Y SE MUESTRA EL DE EDITAR
       $("#asignar_aires").show();
       $("#btn_nuevo_item_aire_comprimido").hide(); 
       $("#btn_editar_item_aire_comprimido").show();

    }else{
      console.log("error");
    }
  });
});

/////////// EDICIÓN DEL ITEM AIRE COMPRIMIDO
$("#btn_editar_item_aire_comprimido").click(function(){
  
  let accion = 'editar_item'; 
  const datos = {
    accion : accion,
    id_empresa : $("#id_empresa").val(),
    nombre_aire_comprimido : $("#nombre_aire_comprimido").val(),
    id_item : $("#id_item").val()
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

////////AGREGAR ITEM 
$("#crear_aire").click(function(){

  let accion = 'asignar_item'; 
  const datos = {
    accion : accion,
    nombre_sala : $("#nombre_sala").val(),
    id_item : $("#id_item").val(),
    area : $("#area").val(),
    punto_aire_comprimido : $("#punto_aire_comprimido").val(),
    codigo_punto : $("#codigo_punto").val(),
    grado_iso : $("#grado_iso").val(),
    direccion_aire_comprimido : $("#direccion_aire_comprimido").val(),
  }

  if ($("#area").val() == ''){
     Swal.fire({
            title:'Mensaje',
            text:'No se puede crear un item sin campos',
            icon:'error',
            showConfirmButton: false,
            timer:1200
          });

  }else{

      $.post('templates/item/nuevo_aire_comprimido.php',datos,function(response){
          console.log(response)

        if(response == 'si'){
          Swal.fire({
            title:'Mensaje',
            text:'Se ha asignado el item creado',
            icon:'success',
            showConfirmButton: false,
            timer:1000
          });
           listarItems();
           setearCampos();
        }else{
          console.log("error");
        }
      });


  }
  

});
/////////EDITAR ITEM ASIGNADO

$(document).on('click','#btn_editar_item_asignado',function(){



    let accion = 'mostrar_aire_comprimido';
    const datos = {
      accion : accion,
      id_item_aire : $(this).attr('data-id')

    }
    $.post('templates/item/editar_aire_comprimido.php',datos,function(response){
      console.log(response);

      let trear = JSON.parse(response);

      trear.forEach((valor)=>{
          $("#nombre_sala").val(valor.nombre_sala);
          $("#area").val(valor.area);
          $("#punto_aire_comprimido").val(valor.punto_uso_aire_comprimido);
          $("#codigo_punto").val(valor.codigo_punto);
          $("#grado_iso").val(valor.grado_iso);
          $("#id_item_aire_comprimido").val(valor.id_aire_comprimido);
      });
           validarBotones();
  });


});
//Setear campos

function setearCampos(){
        $("#nombre_sala").val('');
        $("#area").val('');
        $("#punto_aire_comprimido").val('');
        $("#codigo_punto").val('');
        $("#grado_iso").val('');
        $("#id_item_aire_comprimido").val('');

        validarBotones();
}
//ESTA FUNCION VALIDA LOS BOTNOES QUE ADMINISTRARAN LOS ITEMS A CREAR
function validarBotones(){
    if($("#id_item_aire_comprimido").val() == ''){
      $("#editar_aire").hide();
      $("#cancelar_aire").hide();
      $("#crear_aire").show();
    }else{
      $("#editar_aire").show();
      $("#cancelar_aire").show();
      $("#crear_aire").hide();
    }
}

///CANCELAR CONFIGURACIÓN DEL ITEM AIRE A ASIGNAR 
 $("#cancelar_aire").click(function(){
        setearCampos();
 });

//ACTUALIZAR EL ITEM DE AIRE ASIGNADO
$("#editar_aire").click(function(){
    let accion = 'editar_aire_comprimido';

    const datos = {
      accion: accion,
      nombre_sala : $("#nombre_sala").val(),
      area : $("#area").val(),
      punto_aire_comprimido : $("#punto_aire_comprimido").val(),
      codigo_punto : $("#codigo_punto").val(),
      grado_iso : $("#grado_iso").val(),
      id_item_aire : $("#id_item_aire_comprimido").val()
    } 

     $.post('templates/item/editar_aire_comprimido.php',datos,function(response){
      console.log(response);
    });

}); 

//LISTAR ITEMS

function listarItems(){
  let accion = 'mostrar_listado_items';
  const datos = {
    accion : accion,
    item : $("#id_item").val()
  }
  $.post('templates/item/update_aire_comprimido.php',datos,function(response){
    console.log(response)

    let trear = JSON.parse(response);
    let template_1 = "";
    $("#tabla_items").show();
    console.log(trear);

        template_1 +=
        ` 
           <tr>
                  <th>Área</th>
                  <th>Punto de uso de Aire Comprimido</th>
                  <th>Nombre sala</th>
                  <th>Código de Punto</th>
                  <th>GRADO ISO 8573-1</th>
                  <th>Acción</th>
            </tr>
        `;
      trear.forEach((valor)=>{

        template_1 +=
        ` 
            <tr>
                  <td>${valor.area}</td>
                  <td>${valor.punto_uso_aire_comprimido}</td>
                  <td>${valor.nombre_sala}</td>
                  <td>${valor.codigo_punto}</td>
                  <td>${valor.grado_iso}</td>
                  <td>
                    <button class="btn btn-danger btn-sm" id="bnt_eliminar_item_asignado" data-id="${valor.id_aire_comprimido}"><i class="lnr-cross btn-icon-wrapper"></i></button>
                    <button class="btn btn-info btn-sm" id="btn_editar_item_asignado" data-id="${valor.id_aire_comprimido}"><i class="lnr-pencil btn-icon-wrapper"></i></button>
                  </td>
            </tr>
        `;
      });

      $("#tabla_items").html(template_1);

  });
}


//ELIMINAR ITEM ASIGNADO 

$(document).on('click', '#bnt_eliminar_item_asignado',function(){


    const datos = {
      id_item_aire : $(this).attr('data-id')
    }

    $.post('templates/item/delete_item_aire_comprimido.php',datos,function(response){
      console.log(response);

      if(response == 'si'){
         Swal.fire({
            title:'Mensaje',
            text:'Item eliminador correctamente',
            icon:'success',
            showConfirmButton: false,
            timer:1000
          });
      }else{
        console.log("ha ocurrido un error");
      }
      listarItems();
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
	});
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