var id_item_campana = $("#id_item_campana").val();
var id_type_campana = $("#type_campana").val();
var id_usuario = $("#id_valida").val();

$(document).ready(function(){

    if(id_item_campana.length == 0){
        $("#btn_nuevo_item_campana").show();
        $("#btn_editar_item_campana").hide();
        $("#text_enunciado_campana").html('Creación nueva campana');
    }else{
        $("#btn_nuevo_item_campana").hide();
        $("#btn_editar_item_campana").show();
        $("#text_enunciado_campana").html('Editar campana');
     //   $("#empresa_campana").hide();
        $("#empresa_label").hide();
        traer_datos_campana(id_item_campana);
    }
  
   
});

function setear_campos(){
   let nombre_campana =  $("#nombre_campana").val('');
   let empresa_campana = $("#empresa_campana").val(0);
   let ubicacion_campana = $("#ubicacion_campana").val('');
   let direccion_campana = $("#direccion_campana").val('');
   let tipo_campana = $("#tipo_campana").val('');
   let marca_campana = $("#marca_campana").val('');
   let modelo_campana = $("#modelo_campana").val('');
   let codigo_interno_campana = $("#codigo_interno_campana").val('');
   let serie_campana = $("#serie_campana").val('');
   let fecha_fabricacion_campana = $("#fecha_fabricacion_campana").val('');
   let velocidad_aire_campana = $("#velocidad_aire_campana").val('');
}


///// BOTON PARA CREAR CAMPANA
$("#btn_nuevo_item_campana").click(function(){

   let nombre_campana =  $("#nombre_campana").val();
   let empresa_campana = $("#id_empresa").val();
   let ubicacion_campana = $("#ubicacion_campana").val();
   let direccion_campana = $("#direccion_campana").val();
   let tipo_campana = $("#tipo_campana").val();
   let marca_campana = $("#marca_campana").val();
   let modelo_campana = $("#modelo_campana").val();
   let codigo_interno_campana = $("#codigo_interno_campana").val();
   let serie_campana = $("#serie_campana").val();
   let fecha_fabricacion_campana = $("#fecha_fabricacion_campana").val();
   let velocidad_aire_campana = $("#velocidad_aire_campana").val();
   let tipo_controlador = "Crear";

   const datos = {
    nombre_campana,
    empresa_campana,
    ubicacion_campana,
    direccion_campana,
    tipo_campana,
    marca_campana,
    modelo_campana,
    codigo_interno_campana,
    serie_campana,
    fecha_fabricacion_campana,
    velocidad_aire_campana,
    tipo_controlador,
    id_type_campana,
    id_usuario
   }
   $.ajax({
       type:"POST",
       data:datos,
       url:'templates/item/controlador_item_campana.php',
       success:function(response){
              if (response == "Si") { 
             Swal.fire({
                title:'Mensaje',
                text:'Se ha creado con exito la campana',
                icon:'success',
                showConfirmButton: false,
                timer:1500
            });
            setear_campos();
          }else{
            alert("error contacta con el administrador");
          }
      }
   })




});



//// BOTON PARA ACTUALIZAR CAMPANA
$("#btn_editar_item_campana").click(function(){

   let nombre_campana =  $("#nombre_campana").val();
   let empresa_campana = $("#id_empresa").val();
   let ubicacion_campana = $("#ubicacion_campana").val();
   let direccion_campana = $("#direccion_campana").val();
   let tipo_campana = $("#tipo_campana").val();
   let marca_campana = $("#marca_campana").val();
   let modelo_campana = $("#modelo_campana").val();
   let codigo_interno_campana = $("#codigo_interno_campana").val();
   let serie_campana = $("#serie_campana").val();
   let fecha_fabricacion_campana = $("#fecha_fabricacion_campana").val();
   let velocidad_aire_campana = $("#velocidad_aire_campana").val();
   //let tipo_controlador = "Actualizar";
   
   const datos = {
    nombre_campana,
    empresa_campana,
    ubicacion_campana,
    direccion_campana,
    tipo_campana,
    marca_campana,
    modelo_campana,
    codigo_interno_campana,
    serie_campana,
    fecha_fabricacion_campana,
    velocidad_aire_campana,
    id_item_campana
   }


   $.ajax({
    type:"POST",
    data:datos,
    url:'templates/item/editar_campana.php',
    success:function(response){
        console.log(response)
         Swal.fire({
             title:'Mensaje',
             text:'Se ha actualizado con exito la campana',
             icon:'success',
             showConfirmButton: false,
             timer:1500
         });
           
    }
})

});


/////// FUNCIÓN PARA TRAER DATOS
function traer_datos_campana(id_item_campana){

    let tipo_controlador = "Leer";

    const datos = {
        id_item_campana,
        tipo_controlador
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/item/controlador_item_campana.php',
        success:function(response){

            let traer = JSON.parse(response);

            $("#nombre_campana").val(traer.nombre_campana);
            $("#ubicacion_campana").val(traer.ubicado_en);
            $("#direccion_campana").val(traer.ubicacion);
            $("#tipo_campana").val(traer.tipo);
            $("#marca_campana").val(traer.marca);
            $("#modelo_campana").val(traer.modelo);
            $("#codigo_interno_campana").val(traer.codigo);
            $("#serie_campana").val(traer.serie);
            $("#fecha_fabricacion_campana").val();
            $("#velocidad_aire_campana").val(traer.requisito_velocidad);
           
        }

    })
}
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

$(document).on('click','#seleccionar_empresa',function(){

	let id_empresa = $(this).attr('data-id');
	let nombre_empresa = $(this).attr('data-name');
	$("#buscador_empresa").val(nombre_empresa);
  $("#id_empresa").val(id_empresa);

	$("#aqui_resultados_empresa").hide();

})

