//VARIABLES DEL USO CONSTANTE
var id_valida = $("#id_valida").val();
var id_asignado_freezer = $("#id_asignado_freezer").val();
var id_mapeo_freezer = "";
var id_bandeja = "";
var variable = "asignado";
//ELEMENTOS OCULTOS
$("#btn_actualizar_bandeja_freezer").hide();
$("#cuerpo_mapeo_freezer").hide();
$("#btn_actualizar_mapeo_freezer").hide();
$("#trayendo_resultados").hide();
$("#personal_2_freezer").hide();
$("#editar_personal_freezer").hide();
$("#asignacion_informe_freezer").hide();
$(".mostrar_sensores_contenedor_buscados_freezer").hide();
$(".mostrar_sensores_contenedor_freezer").show();
$("#mostrar_grafica_freezer").hide();
$("#cargar_informes_freezer").hide();
$("#cargar_dc_").hide();
$("#change_mapeo_freezer").hide();
$("#nombre_empresa").hide();
$("#boton_condatos_cargados").hide();
$("#boton_sindatos_cargados").hide();


//////////////////////////////////////////////////////////LOGICA DE FUNCIONES
function setear_campos_freezer() {
  $("#nombre_mapeo_freezer").val(0);
  $("#fecha_inicio_mapeo_freezer").val("");
  $("#hora_inicio_mapeo_freezer").val("00");
  $("#minuto_inicio_mapeo_freezer").val("00");
  $("#segundo_inicio_mapeo_freezer").val("00");
  $("#fecha_fin_mapeo_freezer").val("");
  $("#hora_fin_mapeo_freezer").val("00");
  $("#minuto_fin_mapeo_freezer").val("00");
  $("#segundo_fin_mapeo_freezer").val("00");
  $("#intervalo_freezer").val("");
  $("#temperatura_minima_freezer").val("");
  $("#temperatura_maxima_freezer").val("");
  $("#valor_seteado_temperatura_freezer").val("");
  $("#temperatura_minima_freezer").val("");
  $("#temperatura_maxima_freezer").val("");
  $("#valor_seteado_temperatura_freezer").val("");
  $("#valor_seteado_humedad_freezer").val("");
  $("#humedad_minima_freezer").val("");
  $("#humedad_maxima_freezer").val("");

}


//////////////////////////////////////////////////////////////////////////////CREACIÓN DE BANDEJAS

  $("#btn_nueva_bandeja_freezer").click(function() {
    var bandeja = $("#bandeja_freezer").val();
    const datos = {
      id_asignado_freezer,
      bandeja,
      id_valida
    }

    $.post('templates/freezer/crear_bandeja.php', datos, function(e) {
      if (e == "Si") {
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Bandeja(s) creada(s) con exito',
          timer: 1500
        });
        listar_bandejas_freezer();
        contar_registros_freezer();
      }

    });

  });


//////////////////////////////////////////////////////////////////////////////CONTAR BANDEJAS
function contar_registros_freezer() {
  $.ajax({
    type: 'POST',
    url: 'templates/freezer/contar_bandeja.php',
    data: {
      id_asignado_freezer},
      success: function(e) {

      let x = 0;
      if (e == 0) {
        x = 1;
      } else {
        x = e;
      }

      $("#cuantas_bandeja_freezer").val(x);
      if (e > 0) {
        $("#anuncio_mapeo_1_freezer").hide();
        $("#cuerpo_mapeo_freezer").show();
      } else {
        $("#anuncio_mapeo_1_freezer").show();
        $("#cuerpo_mapeo_freezer").hide();
      }
    }

  });
}
//////////////////////////////////////////////////////////////////////LISTAR BANDEJAS
function listar_bandejas_freezer() {
  $.ajax({
    type: 'POST',
    url: 'templates/freezer/listar_bandeja.php',
    data: {id_asignado_freezer},
      success: function(e) {
      let traer = JSON.parse(e);
      let template = "";
      traer.forEach((result) => {
        template +=
          `
				<tr>
					<td>${result.nombre}</td>
					<td>
						<div style='text-align:center;'>
								<button class="btn btn-success" data-id="${result.id_bandeja}" id="modificar_bandeja_creada_freezer" data-nombre="${result.nombre}"><i class="pe-7s-check">	</i></button>
								<button class="btn btn-danger" data-id="${result.id_bandeja}" id="eliminar_bandeja_creada_freezer">X</button>			
						</div>
					</td>
				</tr>				
				`;
      

      });

      $("#resultados_bandeja_freezer").html(template);
    }
  });
}

///////////////////////////////////////////////////////ELIMINAR BANDEJA
$(function(){
$(document).on('click', '#eliminar_bandeja_creada_freezer', function() {

  let id_bandeja = $(this).attr('data-id');
  $("#id_bandeja_actualizar_freezer").val(id_bandeja);
  let id_bandeja_change = document.getElementById("id_bandeja_actualizar_freezer").value;
  const data = {
    id_bandeja_change,
    id_asignado_freezer,
    id_valida
  }

  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Deseas eliminar la bandeja ?',
    showConfirmButton: true,
    showCancelButton: true,
    confirmButtonText: 'Si!',
    cancelButtonText: 'No!',
  }).then((result) => {
    if (result.value) {

      $.post('templates/freezer/eliminar_bandeja.php', data, function(e) {

        if (e == "Eliminado") {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'La bandeja ha sido eliminada',
            timer: 1500
          });
          listar_bandejas_freezer();
          contar_registros_freezer();
        } else if (e == "No") {
          Swal.fire({

            position: 'center',
            icon: 'error',
            title: 'La bandeja esta asociada a un mapeo y/o sensor, No puede ser eliminada',
            timer: 1600
          });

        }


      });
    }
  });
});

///////////////////////////////////////////////////////////MODIFICAR BANDEJA
$(document).on('click', '#modificar_bandeja_creada_freezer', function() {

  $("#btn_actualizar_bandeja_freezer").show();
  $("#btn_nueva_bandeja_freezer").hide();

  let id_bandeja = $(this).attr('data-id');
  let nombre = $(this).attr('data-nombre');

  $("#bandeja_freezer").val(nombre);
  $("#id_bandeja_actualizar_freezer").val(id_bandeja);

});
}());


$(function() {
  $("#btn_actualizar_bandeja_freezer").click(function() {

    let bandeja_nombre = document.getElementById("bandeja_freezer").value;
    let id_bandeja_change = document.getElementById("id_bandeja_actualizar_freezer").value;


    const datos = {
      id_bandeja_change,
      bandeja_nombre,
      id_asignado_freezer,
      id_valida
    }

    $.post('templates/freezer/actualizar_bandeja.php', datos, function(e) {

      if (e == "Modificado") {
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'La bandeja ha sido modificada',
          timer: 1500,
        });

        $("#bandeja_freezer").val("");
        $("#bandeja_freezer").text("");
        $("#btn_actualizar_bandeja_freezer").hide();
        listar_bandejas_freezer();
        contar_registros_freezer();
      }

    });



  });
}());


//////////////////////////////////////////////////////////////FUNCIONES PARA CORRELATIVO
function mostrar_correlativo(x) {
  
   $.post('templates/freezer/consultar_correlativo_freezer.php',{x}, function(e) {  
        let traer = JSON.parse(e);
        $("#aqui_consecutivo_freezer").text(traer.correlativo);
       
   });
}

function leer_correlativo_freezer(x) {

  $.post('templates/freezer/validar_correlativo.php', {x}, function(response) {
     // console.log(response)
    if (response == "Sin") {
      $("#crear_mapeo_freezer").hide();
      $("#vermapeo").hide();
      $("#vermapeo").hide();
      $("#crear_mapeo_freezer").hide();
      $("#asignacion").hide();
      $("#Complemento").hide();
      $("#informes").hide();
    } else {
      $("#crear_mapeo_freezer").show();
      $("#sin_correlativo_freezer").hide();
			$("#traer_informes_freezer").show();	

    }
  });

}

///////////////////////////////////////////////////////////CAMBIAR CORRELATIVO

$("#cambiando_correlativo_freezer").click(function() {

  let correlativo = $("#correlativo_informe_freezer").val();

  const data_2 = {
    id_asignado_freezer,
     correlativo,
    id_valida
  }

  $.post('templates/freezer/ingresa_correlativo_ultrafreezer.php', data_2, function(e) {
    if (e == "Si") {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Correlativo Creado',
        showConfirmButton: false,
        timer: 1500
      });
      $("#aqui_consecutivo_freezer").text(correlativo);
      setTimeout(recargar_pagina,1500);
    }

    leer_correlativo_freezer(id_asignado_freezer);

  });
});


function recargar_pagina(){
   location.reload();
}

/////////////////////////////////////////////////////////////////////////////////CREACIÓN DEL MAPEO
$(function() {
  $("#btn_nuevo_mapeo_freezer").click(function() {

   
    let nombre_mapeo = $("#nombre_mapeo_freezer").val();
    let fecha_inicio_mapeo = $("#fecha_inicio_mapeo_freezer").val();
    let hora_inicio_mapeo = $("#hora_inicio_mapeo_freezer").val();
    let minuto_inicio_mapeo = $("#minuto_inicio_mapeo_freezer").val();
    let segundo_inicio_mapeo = $("#segundo_inicio_mapeo_freezer").val();
    let fecha_fin_mapeo = $("#fecha_fin_mapeo_freezer").val();
    let hora_fin_mapeo = $("#hora_fin_mapeo_freezer").val();
    let minuto_fin_mapeo = $("#minuto_fin_mapeo_freezer").val();
    let segundo_fin_mapeo = $("#segundo_fin_mapeo_freezer").val();
    let intervalo = $("#intervalo_freezer").val();
    let temperatura_minima = $("#temperatura_minima_freezer").val();
    let temperatura_maxima = $("#temperatura_maxima_freezer").val();
    let valor_seteado_temperatura = $("#valor_seteado_temperatura_freezer").val();
    let humedad_minima = $("#humedad_minima_freezer").val();
    let humedad_maxima = $("#humedad_maxima_freezer").val();
    let valor_seteado_humedad = $("#valor_seteado_humedad_freezer").val();
    let incluir_inf_base = $("#informe_base_freezer").val();

    const datos = {
      nombre_mapeo,
      fecha_inicio_mapeo,
      hora_inicio_mapeo,
      minuto_inicio_mapeo,
      segundo_inicio_mapeo,
      fecha_fin_mapeo,
      hora_fin_mapeo,
      minuto_fin_mapeo,
      segundo_fin_mapeo,
      intervalo,
      temperatura_minima,
      temperatura_maxima,
      valor_seteado_temperatura,
      humedad_minima,
      humedad_maxima,
      valor_seteado_humedad,
      incluir_inf_base,
      id_asignado_freezer,
      id_valida
    }

    $.post('templates/freezer/crear_mapeo.php', datos, function(e) {
      if (e == "Creado") {
        Swal.fire({
          position: 'center',
          title: 'El mapeo ha sido creado',
          icon: 'success',
          timer: 1500
        });
        listar_mapeos_freezer();
        setear_campos_freezer();
        crear_informes_freezer();
        contar_registro_informes_freezer();
        listar_informes_freezer()
      }else{
        alert("error contacta con el administrador");
      }
    });

  });
}());



/////////////////////LISTAR MAPEO
function listar_mapeos_freezer(){

  $.ajax({
    type: 'POST',
    data: {id_asignado_freezer},
      url: 'templates/freezer/listar_mapeos.php',
    success: function(e) {

      if(e.length == 2){
          $("#asignacion").hide();        
          $("#Complemento").hide();        
          $("#informes").hide();
          $("#vermapeo").hide();
          $("#crear_mapeo").addClass('class="tab-pane tabs-animation fade show active');
      }else{

          $("#asignacion").show();        
          $("#Complemento").show();        
          $("#informes").show();
          $("#asignacion_informe_freezer").show();
          $("#vermapeo").show();



      let traer = JSON.parse(e);
      let template = "";
      let template2 = "";

      traer.forEach((result) => {

        template +=
          `
        <tr>
          <td>${result.nombre}</td>
          <td>${result.fecha_inicio} ${result.hora_inicio}</td>
          <td>${result.fecha_final} ${result.hora_final}</td>
          <td>${result.intervalo}</td>
          <td>${result.humedad_minima}</td>
          <td>${result.humedad_maxima}</td>
          <td>${result.temperatura_minima}</td>
          <td>${result.temperatura_maxima}</td>
          <td>
            <div style="text-align:center;">
              <button class="btn btn-success" data-id="${result.id_mapeo}" id="modificar_mapeo_creada_freezer"><i class="pe-7s-check"></i></button>
              <button class="btn btn-danger" data-id="${result.id_mapeo}" id="eliminar_mapeo_creada_freezer">X</button>
            </div>
          </td>

        </tr>

        `
      });

      traer.forEach((result) => {
        template2 +=
          `
        <tr>
          <td>${result.nombre}</td>
          <td><button class="btn btn-success" id="buscar_bandeja_asignada_freezer" data-id="${result.id_mapeo}"  data-id-2="${result.id_asignado}"="${result.nombre} data-id-3="${result.nombre}" ><i class="lnr-checkmark-circle"></i></button></td>
        </tr>

        `;
      });

      $("#listando_mapeos_creados_freezer").html(template2);
      $("#listando_mapeos_freezer").html(template);
      }

    }
  });
}

///////////////////eliminar MAPEO
$(function(){
$(document).on('click','#eliminar_mapeo_creada_freezer',function(){
    
    Swal.fire({
      position:'center',
      icon:'question',
      title:'Seguro ¿deseas eliminar el mapeo?',
      showConfirmButton:true,
      confirmButtonText:'Si',
      showCancelButton: true,
      cancelButtonText:'No',    
    }).then((result)=>{
      if(result.value){
        
         let id_valida = $("#id_valida").val();
         let id_mapeo = $(this).attr('data-id');

        
        const data = {
          id_mapeo,
          id_asignado_freezer,
          id_valida
        }
        
        $.post('templates/freezer/eliminar_mapeo.php',data, function(e){
              //console.log(e)
            if(e == "No"){
              Swal.fire({
                position:'center',
                icon:'error',
                title:'El mapeo no puede ser eliminado debedio a que contiene información',
                timer:1500
              });
            }
            else if( e == "Eliminado"){
                Swal.fire({
                position:'center',
                icon:'success',
                title:'El mapeo ha sido eliminado correctamente',
                timer:1500
              });
              listar_mapeos_freezer();
            }
        });
      }
    }); 
});

}());


//EVENTOS BOTONS  MODIFICAR MAPEOS
$(function() {
  $(document).on('click', '#modificar_mapeo_creada_freezer', function() {

    $("#btn_actualizar_mapeo_freezer").show();
    $("#btn_nuevo_mapeo_freezer").hide();
    $("#change_mapeo_freezer").show();
    $("#nombre_empresa").show();  


    Swal.fire({
      position: 'center',
      icon: 'info',
      title: 'Revisa la pestaña de Mapeo para modificar los datos',
      timer: 1600
    });

    let id_mapeo = $(this).attr('data-id');
    let mapeo_tipo = "";

    $.ajax({
      type: 'POST',
      data: {
        id_mapeo
      },
      url: 'templates/freezer/llamar_editar_mapeo.php',
      success: function(e) {
        let traer = JSON.parse(e);

        if (traer.informe_base == 1) {
          $("#informe_base_freezer").attr('checked', true);
        } else {
          $("#informe_base_freezer").attr('checked', false);
        }
        
        $("#nombre_mapeo_freezer").val(traer.nombre);
        $("#fecha_inicio_mapeo_freezer").val(traer.fecha_inicio);
        $("#hora_inicio_mapeo_freezer").val(traer.hora_inicio);
        $("#minuto_inicio_mapeo_freezer").val(traer.minuto_inicio);
        $("#segundo_inicio_mapeo_freezer").val(traer.segundo_inicio);
        $("#fecha_fin_mapeo_freezer").val(traer.fecha_final);
        $("#hora_fin_mapeo_freezer").val(traer.hora_final);
        $("#minuto_fin_mapeo_freezer").val(traer.minuto_final);
        $("#segundo_fin_mapeo_freezer").val(traer.segundo_final);
        $("#intervalo_freezer").val(traer.intervalo);
        $("#humedad_minima_freezer").val(traer.humedad_minima);
        $("#humedad_maxima_freezer").val(traer.humedad_maxima);
        $("#temperatura_minima_freezer").val(traer.temperatura_minima);
        $("#temperatura_maxima_freezer").val(traer.temperatura_maxima);
        $("#valor_seteado_humedad_freezer").val(traer.valor_seteado_humedad);
        $("#valor_seteado_temperatura_freezer").val(traer.valor_seteado_temperatura);
        $("#id_mapeo_creado_freezer").val(traer.id_mapeo);
        $("#nombre_freezer").val(traer.nombre);

      }


    });

  });

}());



//EVENTO QUE CONTROLA LA ACTIVACIÓN DEL BOTON EDITAR A NUEVO
$(function() {
  $("#change_mapeo").click(function() {

    $("#btn_actualizar_mapeo").hide();
    $("#btn_nuevo_mapeo").show();
    $("#change_mapeo").hide();
    setear_campos();
  });

}());








//EDITAR MAPEO

$("#btn_actualizar_mapeo_freezer").click(function() {

    //carga si se cambio el nombre del mapeo
    let nombre_mapeo = $("#nombre_mapeo_freezer").val(); 
    //carga si se mantiene el nombre del mapeo
    let nombre_mapeo_establecido = $("#nombre_freezer").val();

    let fecha_inicio_mapeo = $("#fecha_inicio_mapeo_freezer").val();
    let hora_inicio_mapeo = $("#hora_inicio_mapeo_freezer").val();
    let minuto_inicio_mapeo = $("#minuto_inicio_mapeo_freezer").val();
    let segundo_inicio_mapeo = $("#segundo_inicio_mapeo_freezer").val();
    let fecha_fin_mapeo = $("#fecha_fin_mapeo_freezer").val();
    let hora_fin_mapeo = $("#hora_fin_mapeo_freezer").val();
    let minuto_fin_mapeo = $("#minuto_fin_mapeo_freezer").val();
    let segundo_fin_mapeo = $("#segundo_fin_mapeo_freezer").val();
    let intervalo = $("#intervalo_freezer").val();
    let temperatura_minima = $("#temperatura_minima_freezer").val();
    let temperatura_maxima = $("#temperatura_maxima_freezer").val();
    let valor_seteado_temperatura = $("#valor_seteado_temperatura_freezer").val();
    let humedad_minima = $("#humedad_minima_freezer").val();
    let humedad_maxima = $("#humedad_maxima_freezer").val();
    let valor_seteado_humedad = $("#valor_seteado_humedad_freezer").val();
    let incluir_inf_base = $("#informe_base_freezer").is(":checked");
    let id_mapeo = $("#id_mapeo_creado_freezer").val();
    let id_valida = $("#id_valida").val();
    let tipo_mapeo = $("#tipo_de_mapeo").val();
    let if_incluir = "";

   // alert(nombre_mapeo_)

    //consulta el nombre del mapeo


  if (incluir_inf_base == true) {
    if_incluir = 1;
  } else {
    if_incluir = 0;
  }

  const datos = {
    nombre_mapeo,
    fecha_inicio_mapeo,
    hora_inicio_mapeo,
    minuto_inicio_mapeo,
    segundo_inicio_mapeo,
    fecha_fin_mapeo,
    hora_fin_mapeo,
    minuto_fin_mapeo,
    segundo_fin_mapeo,
    intervalo,
    humedad_minima,
    humedad_maxima,
    temperatura_minima,
    temperatura_maxima,
    valor_seteado_humedad,
    valor_seteado_temperatura,
    id_mapeo,
    id_asignado_freezer,
    id_valida,
    tipo_mapeo,
    if_incluir
  }

  $.post('templates/freezer/editar_mapeo.php', datos, function(e) {
    if (e == "Editado") {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'El registro ha sido editado correctamente',
        showConfirmButton: false,
        timer: 1500
      });
      listar_mapeos_freezer();
      setear_campos_freezer();

      $('#btn_actualizar_mapeo_freezer').hide();
      $('#change_mapeo_freezer').hide();
      $('#btn_nuevo_mapeo_freezer').show();

    }

  });

});


//FUNCION PARA CREAR INFORMES
function crear_informes_freezer(){

	let id_valida = $('#id_valida').val();
	const data = 
			{id_asignado_freezer,
       id_valida}	
		$.post('templates/freezer/informe_freezer.php', data , function(response){

      
		});
}


//FUNCION PARA LISTAR LOS INFORMES
function listar_informes_freezer(){

	$.ajax({
		type : 'POST',
		data : {id_asignado_freezer},
		url: 'templates/freezer/listar_informes.php',
		success:function(e){
				
			$("#carga").hide();
			let traer = JSON.parse(e);
			let template = "";
			let estado = "";
			let contador = 0;
			let img_1 = "";
			let img_2 = "";
			let img_3 = "";
			let aprobacion_estado = "";
			let aprobacion_leyenda = "";
      let mas_nombre = "";
      let contador_acordeon = 2;
			
			traer.forEach((result)=>{
		
				//validar estado de la aprobacion del informe
				if(result.estado_aprobacion === null  || result.estado_aprobacion == 0){
					aprobacion_estado = `<button class="btn btn-primary" data-id="${result.id_informe}" id="aprobar" id-approb = "${result.id_aprobacion}" 	value="1">Solicitar</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Solicitar aprobación</span>";
				}else if(result.estado_aprobacion == 1){
					aprobacion_estado = `<button class="btn btn-warning" data-id="${result.id_informe}" id="aprobar" id-approb="${result.id_aprobacion}" 	value="0">Anular</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Aprobación en curso</span>";
				}else if(result.estado_aprobacion == 2){
					aprobacion_estado = `<button class="btn btn-success" data-id="${result.id_informe}" id="aprobar" disable id-approb = "${result.id_aprobacion}" disabled="disabled">Aprobado</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Aprobado</span>";
				}else if(result.estado_aprobacion == 3){
					aprobacion_estado = `<button class="btn btn-danger" data-id="${result.id_informe}" id="aprobar" disable id-approb ="${result.id_aprobacion}" 	value="1">Solicitar</button>`;
					aprobacion_leyenda = `<span class='text-primary' id='vercorrecciones'>${result.observacion_aprobacion}</span>`;
				}
							
				//logica para el estado
				if(result.estado == 0){
					estado = "No terminado";
					contador = 30;
				}else if(result.estado == 1){
					estado = "Terminado";
					contador = 50;
				}else{
					estado = "Entregado a cliente";
					contador = 100;
				}
				
				//VALIDAR IMAGES
				if(result.img_posicion){
						img_1 =`<img src="templates/freezer/${result.img_posicion}"  width="100px"/>`;
				}else{
						img_1 =`<span class="text-danger">Sin imagen</span>`;
				}
				
				if(result.grafica_1){
					img_2 =`<img src="templates/freezer/${result.grafica_1}"  width="100px"/>`;
				}else{
					img_2 =`<span class="text-danger">Sin imagen</span>`;
				}
				
				if(result.grafica_2){
					img_3 =`<img src="templates/freezer/${result.grafica_2}"  width="100px"/>`;
				}else{
					img_3 =`<span class="text-danger">Sin imagen</span>`;
				}
        
        if(result.n_increment == null){
          mas_nombre = "";
        }else{
          mas_nombre = result.n_increment;
        }
				
			   if(result.tipo_informe < 2){
                  template +=

                    `
                    <div id="accordion">
                    <div class="card">
                      <div class="card-header">
                          <a  data-toggle="collapse" data-target="#collapseOne${contador_acordeon}"  aria-controls="collapseOne">
                               <h5><strong>Nombre Informe:</strong> ${result.nombre}${mas_nombre}</h5>
                                  <h5><strong> &nbsp;&nbsp;Mapeo:</strong> ${result.nombre_mapeo} </h5>
                             </a>    
                                 
                                  <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm nav btn-group">
                                    ${aprobacion_leyenda} &nbsp;&nbsp;  ${aprobacion_estado} 
                                    </div>
                                  </div>	
                       
                      </div>
                      <div data-parent="#accordion" id="collapseOne${contador_acordeon}" aria-labelledby="headingOne" class="collapse">  
                      <div class="card-body" id="cuerpo_informe">
 
                        <form id="form_2_freezer" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_informe_freezer" value="${result.id_informe}">
                        <div class="row">
                          <div class="col-sm-6">
                            <label>Observacion:</label>
                            <textarea class="form-control" name="observacion_freezer"  id="observacion_freezer"  value="${result.observacion}">${result.observacion}</textarea>
                          </div>
                          <div class="col-sm-6">
                            <label>Comentarios:</label>
                            <textarea class="form-control" name="comentarios_freezer"  id="comentarios_freezer" value="${result.comentarios}">${result.comentarios}</textarea>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-sm-12" style="text-align:center;">
                            <button  type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info"  data-id = "${result.id_informe}" 	id="cargar_imagen_1_freezer">Actualizar</button>
                          </div>
                        </div>
                        </form>
                        <br>

                        <div class="row">
                          <div class="col-sm-12" style="text-align:center;">
                            <h4>Evidencia Grafica</h4>
                          </div>									
                        </div>

                    
                        <br>

                        <form id="form_1_freezer" enctype="multipart/form-data" method="post">
                          <input type="hidden" name="tipo_image_2_freezer" value="${result.tipo_informe}">
                          <input type="hidden" name="id_informe_freezer" value="${result.id_informe}">
                          <div class="row">
                            <div class="col-sm-4" style="text-align:center;">
                              <label>Posición Sensores</label>
                              <input type="file" name="imagen_1_freezer" id="image_1_freezer" class="form-control">
                            </div>

                            <div class="col-sm-4" style="text-align:center;">
                              <label>Imagen Grafica Valores Promedio, Mínimo, Maximo </label> 
                              <input type="file" name="imagen_2_freezer" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Datos de todos los sensores en periodo representativo </label>
                                <input type="file" name="imagen_3_freezer" class="form-control">
                            </div>
                          </div>

                          <br>

                          <div class="row">
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow  btn btn-danger text-white" style="width:30px;" id="eliminar_imagen_freezer" data-nombre = "${result.img_posicion}" 
                                data-id="${result.id_informe}">X</a>
                              <br>
                              ${img_1}
                            </div>
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen_freezer" data-nombre = "${result.grafica_1}" data-id="${result.id_informe}">X</a>
                              <br>
                              ${img_2}
                            </div>
                            <div class="col-sm-4" style="text-align:center;">
                              <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen_freezer" data-nombre = "${result.grafica_2}"	data-id="${result.id_informe}">X</a>
                              <br>
                              ${img_3}
                            </div>
                          </div>

                          <br>

                          <div class="row">
                            <div class="col-sm-12" style="text-align:center">
                              <button  type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info"  data-id = "${result.id_informe}" id="cargar_imagen_1_freezer">Cargar imagenes</button>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-12" style="text-align:center">
                              <a class='btn btn-ligth'  data-id = "${result.id_informe}" id="pdf_freezer" data-nombre="${result.tipo_informe}"><img src="design/images/pdf.png" width="50px"/></a>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-12" style="text-align:right">
                              <a class='btn btn-ligth'  data-id = "${result.id_informe}" data-nombre="${result.nombre}" id="eliminar_informe_freezer">
                                <span class="text-danger"><h4>Eliminar informe</h4></span></a>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    </div>
                    </div>
                    <br><br>`;
                  }
                  contador_acordeon = contador_acordeon +1;
                });
    
			$("#traer_informes_freezer").html(template);			
		}
		
	});
}




/////////////////////////////FUNCION CREADA PARA BUSCAR SENSORES////////////////////
(function(){   
 $("#buscar_sensores_freezer").keydown(function(){
   
   let tecleado = $("#buscar_sensores_freezer").val();
   
   if(tecleado.length > 1){
     $(".mostrar_sensores_contenedor_buscados_freezer").show();
     $(".mostrar_sensores_contenedor_freezer").hide();
     
     $.ajax({
       type:'POST',
       url:'templates/freezer/buscar_sensores_acme.php',
       data: {tecleado},
       success:function(e){
         let traer = JSON.parse(e);
			   let template = "";
			
				traer.forEach((result)=>{
					template += 
					`
					<tr data-id="${result.id_sensor}">
						<td>${result.nombre}</td>
						<td>${result.tipo}</td>
						<td>
								<button class="btn btn-success" id="agregar_sensor_freezer">+</button>
								<button class="btn btn-danger" id="quitar_sensor_freezer">X</button>
						</td>				
					</tr>
					`;
				});
			$("#sensores_encontrados_freezer").html(template);
         
       }
       
     });
   }else{
     $(".mostrar_sensores_contenedor_buscados_freezer").hide();
     $(".mostrar_sensores_contenedor_freezer").show();
   }
 })

}());

//GESTIONAR LOS BOTONES PARA ASIGNAR SENSORES
(function(){
	
	$(document).on('click','#buscar_bandeja_asignada_freezer', function(){
		
		id_mapeo_freezer = $(this).attr('data-id');
		let id_asignado = $(this).attr('data-id-2');
		let nombre = $(this).attr('data-id-3');
	
		listar_bandejas_freezer_c(id_asignado_freezer);
		  $("#nombre_mapeo_freezer_dc").text(" "+nombre)
			$("#mapeo_actual").text("--"+nombre);
	});
	
}());

//LISTAR SOLO BANDEJAS NO REGISTRADAS A LA TABLA REFRIGERADORES _ SENSORES
function listar_bandejas_freezer_c(a){
	
	$.ajax({
		type:'POST',
		data: {a},
		url:'templates/freezer/listar_bandejas_creadas.php',
		success:function(e){
		
				let traer = JSON.parse(e);
				let template = "";
			
			traer.forEach((result)=>{
				
				template+=
					`
					<tr>
						<td>${result.nombre}</td>
						<td><button class="btn btn-success" id="buscar_sensores_asignada_freezer" data-id="${result.id_bandeja}"><i class="lnr-checkmark-circle"></i></button></td>
					</tr>
					`;
				
			});
			
			$("#listar_bandejas_creadas_freezer").html(template);
		
		}
	});
}


(function(){
	$(document).on("click","#buscar_sensores_asignada_freezer", function(){
			
		
				  id_bandeja = $(this).attr('data-id');
					listar_sensores_freezer();
					listar_freezer_sensores(id_bandeja, id_mapeo_freezer);
          $("#cargar_dc_").show();

			});
}());

//LISTAR REFRIGERADORES_SENSORES
function listar_freezer_sensores(id_bandeja, id_mapeo_freezer){
  
  
		const datos = {
			id_bandeja,
			id_mapeo_freezer,
			id_asignado_freezer
		}
		
		$.post('templates/freezer/listar_final_mapeo.php', datos , function(e){
				
			let traer = JSON.parse(e);
			let template = "";
      let template3 = "";
			let a = 1;
			let button = "";
			

        let carguecrudos = e;
        
			traer.forEach((result)=>{
				

				template +=`
					
					<tr>
								${result.datos_crudos}
						<td>${result.nombre_bandeja}</td>
						<td>${result.nombre_sensor}</td>
            <td>
              <select class="form-control" data-id="${result.id_freezer_sensor}" id="change_posicion_sensor_freezer">
                <option value="${result.posicion}">${result.posicion}</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
              </select>
           </td>
						<td>${result.fecha_registro}</td>
					</tr>
				`;  
        template3 += `
          
          <tr>
           
            <td>
              <input type="hidden" value="${result.id_bandeja}" name="bandejas">
            <select class="form-control" id="columna_dc${a}" name="columna_dc${a}">
             <option value="0">Seleccione...</option>  
             <option value="2">Columna 1</option>
             <option value="3">Columna 2</option>
             <option value="4">Columna 3</option>
             <option value="5">Columna 4</option>
             <option value="6">Columna 5</option>
             <option value="7">Columna 6</option>
             <option value="8">Columna 7</option>
             <option value="9">Columna 8</option>
             <option value="10">Columna 9</option>
             <option value="11">Columna 10</option>
             <option value="12">Columna 11</option>
             <option value="13">Columna 12</option>
          </select></td> 
            
         <td>
         <input type="hidden" value="${id_valida}" id="id_valida" name="id_valida">
         <input type="hidden" value="${result.id_freezer_sensor}" id="id_sensor_freezer_dc${a}" name="id_sensor_freezer_dc${a}">
         ${result.nombre_sensor}
        </td>
                
    </tr>

      `;

			});

      traer.forEach((response)=>{
        if (response.datos_crudos == null) {
        $("#boton_sindatos_cargados").show();
        $("#boton_condatos_cargados").hide();
        }else{
        $("#boton_condatos_cargados").show();
        $("#boton_sindatos_cargados").hide();
        }
      })

			$("#mapeos_listos_freezer").html(template);
      $("#dc_freezer_seleccionador").html(template3);
			
			
		});
	
}

//ACTUALIZAR LA POSICION DE MAPEOS
$(document).on('change','#change_posicion_sensor_freezer',function(){

  let id_freezer_sensor = $(this).attr('data-id');
  let posicion = $(this).val();

  const datos = {
    id_freezer_sensor,
    posicion
  }

  $.ajax({
    type:'POST',
    url:'templates/freezer/cambiar_posicion_sensor.php',
    data:datos,
    success:function(response){
      if(response == 1){
        Swal.fire({
          title:'Mensaje',
          text:'Sensor cambiado de posicion corrrectamente',
          icon:'success',
          timer:1500
        });
        listar_freezer_sensores(id_bandeja, id_mapeo);
      }
    }
  });
});

//LISTAR SOLO SENSORES NO REGISTRADOS EN LA TABLA REFRIGERADORES _ SENSORES
function listar_sensores_freezer(a){
		
	$.ajax({
		type:'POST',
		data: {a},
		url:'templates/freezer/listar_sensores.php',
		success:function(e){
			
			let traer = JSON.parse(e);
			let template = "";
			
				traer.forEach((result)=>{
									
					template += 
					`
					<tr data-id="${result.id_sensor}">
						<td>${result.sensor}</td>
						<td>${result.tipo}</td>
						<td>
								<button class="btn btn-success" id="agregar_sensor_freezer">+</button>
								<button class="btn btn-danger" id="quitar_sensor_freezer">X</button>
						</td>				
					</tr>
					`;
				});
			$("#sensores_resultado_freezer").html(template);
			
		}
	});
	
}


//AGREGAR SENSOR 
(function(){
	
	$(document).on("click","#agregar_sensor_freezer", function(){
				
				let elemento = $(this)[0].parentElement.parentElement;
				let id_sensor = $(elemento).attr('data-id');
		
					const datos = {
						id_mapeo_freezer,
						id_asignado_freezer,
						id_bandeja,
						id_sensor,
						id_valida : $("#id_valida").val()
					}
							$.post('templates/freezer/agregar_sensor_mapeo.php', datos, function(e){
								if(e=="Asignado"){
									Swal.fire({
										position:'center',
										icon:'success',
										title:'Sensor asignado correctamente',
										timer:1500
									});
									listar_freezer_sensores(id_bandeja, id_mapeo_freezer);
								}
								else if(e=="Existe"){
									Swal.fire({
										position:'center',
										icon:'error',
										title:'Sensor se encuentra asignado',
										timer:1500
									});
								}
							});	
							});			
				
}());

//FUNCION PARA QUITAR EL SENSOR 
(function(){
	
	$(document).on('click','#quitar_sensor_freezer',function(){
		
			let elemento = $(this)[0].parentElement.parentElement;
				let id_sensor = $(elemento).attr('data-id');
	
					const datos = {
						id_mapeo_freezer,
						id_asignado_freezer,
						id_bandeja,
						id_sensor,
						id_valida : $("#id_valida").val()
					}
				
		
		$.post('templates/freezer/validar_existencia_sensor.php',datos,function(e){
			
			if(e == "Existe"){
				
				Swal.fire({
			position:'center',
			icon:'question',
			title:'Seguro ¿Deseas des asignar el sensor?',
			showConfirmButton:true,
			confirmButtonText:'Si!',
			showCancelButton:true,
			cancelButtonText:'No!'		
		}).then((result)=>{
			if(result.value){
				$.post('templates/freezer/des-asignar_sensor.php', datos, function(e){
			
					if(e=="Des-asignado"){
								Swal.fire({
									 position:'center',
									 icon:'success',
									 title:'El sensor ha sido des - asignado',
									 timer: 1500
								 });
						listar_freezer_sensores(id_bandeja, id_mapeo_freezer);
						}
							 });
					
			}	
			});
				
			}
			else if(e == "No existe"){
				Swal.fire({
					position:'center',
					icon:'error',
					title:'El sensor no ha sido asignado',
					timer: 1500
				});
			}
			
		});
		
	
		
	});
	
}());



//BOTON PARA CARGAR DATOS EN LA CARD/////////////////////////////7
(function(){
	
	$(document).on('click','#btn_cargar_datos_crudos_freezer',function(){
		
			$('#fechas').hide();
			let bandeja = $(this).attr('bandeja');
			let sensor = $(this).attr('sensor');
			let id_freezer_sensor = $(this).attr('data-id');		
			
		
		
			$("#nombre_bandeja_freezer").text(bandeja);
			$("#nombre_sensor_freezer").text(sensor);
			$("#id_mapeo_freezer").val(id_mapeo_freezer);
			$("#id_freezer_sensor").val(id_freezer_sensor);
			$("#id_asignado_form_freezer").val(id_asignado_freezer);
		
		
		
			//CODIGO PARA CARGAR LA INFORMACIÓN DE LOS DATOS CRUDOS
		
			$.ajax({
				type:'POST',
				data: {id_freezer_sensor},
				url : 'templates/freezer/listar_datos_crudos.php',
				success : function(response){
					$('#fechas').show();
					let template = "";
					
					let msj = "";
					let boton_agregar = "";
					let boton_eliminar = "";
						
						if(response == "No hay registros"){
								template = `<span class='badge badge-warning'>Actualmente no has cargado ningun archivo al sensor ${sensor}</span>`;
						}else{
							let traer = JSON.parse(response);
					traer.forEach((result)=>{
					
					if(result.sin_datos == 0 && result.hr_bajo == 0 && result.hr_alto == 0 && result.error == 0 ){
						
						msj = "<span class='badge badge-success'>Puedes cargar la información</span><br>";
						boton_agregar = `<button class="btn btn-success" id="aprobar_carga_datos_crudos_freezer" data-id="${result.id_freezer_sensor}"><i class="lnr-checkmark-circle">																		</i></button>`;
						boton_eliminar = `<button class="btn btn-danger" id="eliminar_datos_crudos_freezer" data-id="${result.id_freezer_sensor}">X</button>`;
						
					}else{
						msj = "<span class='badge badge-danger'>Corrige los errores y	vuelve a cargar el archivo</span><br>"+
										"<span class='badge badge-danger'>para poder continuar</span><br>";
						boton_eliminar = `<button class="btn btn-danger" id="eliminar_datos_crudos_freezer" data-id="${result.id_freezer_sensor}">X</button>`;
					}
					
					
					template +=
						`
							<span class='text-success'><h6>Se han leido en total ${result.leidos} registros</h6></span><br>
							<span class='text-danger'><h6>Errores de datos vacios = ${result.sin_datos} </h6></span><br>
							<span class='text-danger'><h6>Errores de % Hr < 10 = ${result.hr_bajo} </h6></span><br>
							<span class='text-danger'><h6>Errores de % Hr > 90 = ${result.hr_alto} </h6></span><br>
							<span class='text-danger'><h6>Datos con texto error = ${result.error} </h6></span><br>
							${msj}
							<br>
							${boton_agregar}
							${boton_eliminar}
					`;
				});
						}
					
					$("#fechas_freezer").html(template);
				}
			});
	});
	
}());

 $("#form_freezer").on('submit', function(e){
		e.preventDefault();
		$('#fechas_freezer').show();
	 var formData = new FormData(document.getElementById("form_freezer"));


	$.ajax({
		url: 'templates/freezer/carga_datos_crudos.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success:function(response) {
			let traer = JSON.parse(response);
			let template = "";
			let msj = "";
			let button = "";
			let boton_agregar = "";
			let boton_eliminar = "";
			
				traer.forEach((result)=>{
					
					id_freezer_sensor = result.id_freezer_sensor;
					
					if(result.sin_datos == 0 && result.hr_bajo == 0 && result.hr_alto == 0 && result.error == 0 ){
						
						msj = "<span class='badge badge-success'>Puedes cargar la información</span><br>";
						boton_agregar = `<button class="btn btn-success" id="aprobar_carga_datos_crudos_freezer" data-id="${result.id_freezer_sensor}"><i	class="lnr-checkmark-circle">																													</i></button>`;
						boton_eliminar = `<button class="btn btn-danger" id="eliminar_datos_crudos_freezer" data-id="${result.id_freezer_sensor}">X</button>`;
					}else{
						msj = "<span class='badge badge-danger'>Corrige los errores y	vuelve a cargar el archivo</span><br>"+
										"<span class='badge badge-danger'>para poder continuar</span><br>";
						boton_eliminar = `<button class="btn btn-danger" id="eliminar_datos_crudos_freezer" data-id="${result.id_freezer_sensor}">X</button>`;
					}
					
					
					template +=
						`
							<span class='text-success'><h6>Se han leido en total ${result.leidos} registros</h6></span><br>
							<span class='text-danger'><h6>Errores de datos vacios = ${result.sin_datos} </h6></span><br>
							<span class='text-danger'><h6>Errores de % Hr < 10 = ${result.hr_bajo} </h6></span><br>
							<span class='text-danger'><h6>Errores de % Hr > 90 = ${result.hr_alto} </h6></span><br>
							<span class='text-danger'><h6>Datos con texto error = ${result.error} </h6></span><br>
							${msj}
							<br>
						
							${boton_agregar}
							${boton_eliminar}
							

					`;
				});
			
		
				$("#fechas_freezer").html(template);
				
		
			listar_freezer_sensores(id_bandeja, id_mapeo_freezer);
								}
		 });

 });


//FUNCIÓN PARA ELIMINAR LOS DATOS CRUDOS
(function(){
	$(document).on('click','#eliminar_datos_crudos_freezer',function(){
			
		let id = $(this).attr('data-id');
		let aprobacion = 0;
		
		Swal.fire({
			position:'center',
			icon:'question',
			title:'Seguro ¿deseas eliminar los datos crudos ?',
			showConfirmButton : true,
			showCancelButton : true,
			confirmButtonText : 'Si',
			cancelButtonText : 'No'
		}).then((result)=>{
			if(result.value){
				$.ajax({
				type:'POST',
				data:{id, aprobacion},
				url:'templates/freezer/eliminar_datos_crudos.php',
				success:function(e){
						if(e == "Si"){
							Swal.fire({
							position:'center',
							icon:'question',
							title:'Ya existen datos crudos en la base de datos, ¿Deseas borrarlos?',
							showConfirmButton:true,
							confirmButtonText:'Si',
							showCancelButton:true,
							cancelButtonText:'No'	
						}).then((result)=>{
								if(result.value){
									aprobacion = 1;
									$.ajax({
										type:'POST',
										data:{id, aprobacion},
										url:'templates/freezer/eliminar_datos_crudos.php',
										success:function(e){
											if(e == "Completo"){
						
												Swal.fire({
													position:'center',
													icon:'success',
													title:'Datos crudos eliminados',
													timer:1500
												});
												$('#fechas').hide();
											}
					
											listar_freezer_sensores(id_bandeja, id_mapeo_freezer);
											contar_registro_informes_freezer();
											
										}
									});
								}
							});
						}
				}	
			});
				
			}
			
		});
			
	});
}());	


	//APROBAR CARGA DE DATOS CRUDOS
(function(){
		$(document).on('click','#aprobar_carga_datos_crudos_freezer',function(){

				let id = $(this).attr('data-id');
				let id_valida = $("#id_valida").val();

				const data = {
					id,
					id_valida,
					id_asignado_freezer,
					id_mapeo_freezer
				}

			$.post('templates/freezer/carga_datos_crudos_db.php', data, function(e){

			if(e == "Ya"){
				Swal.fire({
					position:'center',
					icon:'error',
					title:'Ya se encuentran cargados datos crudos en la base de datos',
					timer:1600
				});
			}else{

					Swal.fire({
						position:'center',
						icon:'success',
						title:'Se ha cargado correctamente los datos crudos',
						timer:1600
					});		
				contar_registro_informes_freezer();


			}

				});
		});
		}());


//FUNCION PARA CONTAR REGISTRO DE LOS INFORMES
function contar_registro_informes_freezer(){
	
		$.ajax({
			
			type:'POST',
			data:{id_asignado_freezer, id_mapeo_freezer},
			url: 'templates/freezer/contar_registro_informes.php',
			success:function(e){
				if(e == "Abrete"){
						$("#asignacion_informe_freezer").show();
				}else{
					$("#asignacion_informe_freezer").show();
				}
				
			}
			
		});
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////CONTROLA EL AGREGAR PERSONAL//////////////////////////////////////////////////





$("#cerrar_crear_personal_freezer").click(function(){ 
  $("#personal_2_freezer").show();
  $("#personal_1_freezer").hide();
  $("#cerrar_crear_personal_freezer").hide();
  $("#editar_personal_freezer").hide();
  $("#guardar_personal_freezer").show();

});


$("#crear_personal_empresa_freezer").click(function(){
  
  $("#personal_2_freezer").hide();
  $("#personal_1_freezer").show();
  $("#cerrar_crear_personal_freezer").show();
  $("#apellidos_personal_freezer").val("");
  $("#cargo_personal_freezer").val("");
  
});




$("#guardar_personal_freezer").click(function(){
  
   let nombres_personal = $("#nombres_personal_freezer").val(); 
   let apellidos_personal =  $("#apellidos_personal_freezer").val();
   let cargo_personal = $("#cargo_personal_freezer").val();
  
    if(nombres_personal == "" || apellidos_personal == "" || cargo_personal == ""){
      Swal.fire({
        position:'center',
        title:'Debes ingresar todos los campos para continuar',
        icon:'error',
        timer: 1500
      });
    }else{
      const datos = {
       id_asignado_freezer,
       nombres_personal,
       apellidos_personal,
       cargo_personal   
      }
   
     $.ajax({
       type:'POST',
       data: datos,
       url:'templates/freezer/agrega_personal.php',
       success:function(response){

        if(response == "Creado"){
           Swal.fire({
             position:'center',
             icon:'success',
             title:'Se ha creado el participante',
             timer:1500
           });
           $("#personal_1_freezer").hide();
           listar_participantes_freezer();
           $("#personal_2_freezer").show();
           $("#cerrar_crear_personal_freezer").hide();
           $("#nombres_personal_freezer").val('');
           $("#apellidos_personal_freezer").val('');
           $("#cargo_personal_freezer").val('');
         } 
       }
     });
    }

});


function listar_participantes_freezer(){
 
  
  $.ajax({
    type:'POST',
    data:{id_asignado_freezer},
    url:'templates/freezer/listar_participantes.php',
    success:function(response){
      
      let traer = JSON.parse(response);
      let template = "";
      traer.forEach((x)=>{
        
        template +=`
          <tr>
            <td>${x.nombres} ${x.apellidos}</td>
            <td>${x.cargo}</td>
            <td><button class="btn btn-danger" id="eliminar_participante_freezer" data-id="${x.id_informe_participante}">Eliminar</button></td>
            <td><button class="btn btn-primary" id="editar_participante_freezer" data-id="${x.id_informe_participante}">Editar</button></td>  
          </tr>
          `;
      });
      
      $("#resultados_personal_freezer").html(template);
    }
    
    
  });
  
}
 
$(document).on('click','#eliminar_participante_freezer', function(){

  let id_participante = $(this).attr('data-id');
  
    Swal.fire({

      position:'center',
      title:'¿Seguro deseas eliminar al participante?',
      icon:'question',
      showButtonConfirm:true,
      confirmButtonText:'Si',
      showButtonCancel:true,
      cancelButtonText:'No'
    }).then((x)=>{
      if(x.value){
        $.ajax({
        type:'POST',
        url:'templates/freezer/eliminar_participante.php',
        data: {id_participante},
        success:function(response){
    
          if(response == "Si"){
              
            Swal.fire({
              position:'center',
              icon:'success',
              title:'Eliminado',
              timer:1500
            });
            
            listar_participantes_freezer();
          }  
      }
    });
      }
    });
    
  
  
});
 
$(document).on('click','#editar_participante_freezer', function(){
  
    let id_participante = $(this).attr('data-id');
    $("#personal_1_freezer").show();
    $("#personal_2_freezer").hide();
    $("#cerrar_crear_personal_freezer").show();
    $("#guardar_personal_freezer").hide();
    $("#editar_personal_freezer").show();
    
    $.ajax({
      type:'POST',
      url:'templates/freezer/traer_participante.php',
      data:{id_participante},
      success:function(response){
          
        let traer = JSON.parse(response);
        
        
      
          
          $("#nombres_personal_freezer").val(traer.nombres);
          $("#apellidos_personal_freezer").val(traer.apellidos);
          $("#cargo_personal_freezer").val(traer.cargo);
          $("#id_oculto_personal_freezer").val(traer.id_participante_oculto);
         

       
      }
    })
     
});


$(document).on('click','#editar_personal_freezer',function(){
  
         let nombres = $("#nombres_personal_freezer").val();
         let apellidos = $("#apellidos_personal_freezer").val();
         let cargo = $("#cargo_persona_freezerl").val();
         let id_oculto = $("#id_oculto_personal_freezer").val();
  
         const datos = {
          nombres,
          apellidos,
          cargo,
          id_oculto
         }
         
         $.ajax({
           type:'POST',
           url:'templates/freezer/editar_personal.php',
           data: datos,
           success:function(response){
        
             if(response == "Modificado"){
               Swal.fire({
                 position:'center',
                 title:'Editado',
                 icon:'success',
                 timer:1500
               });
               listar_participantes_freezer();
               $("#personal_2_freezer").show();
                $("#personal_1_freezer").hide();
                $("#cerrar_crear_personal_freezer").show();
                $("#apellidos_personal_freezer").val("");
                $("#cargo_personal_freezer").val("");
               
             }
           }
         });
  
});
firma_usuario_freezer();

/////////////////////////////////CONTROLA QUIEN FIRMA EL USUARIO///////////////////////////////////////	
function firma_usuario_freezer(){  
    $.ajax({
      url:'listar_jefes_operaciones.php',
      success:function(response){
        let traer = JSON.parse(response);
        let template = "";
        let template_2 = "<option value='0'>Seleccione</option>";
        
        traer.forEach((x)=>{
          template +=
             `
                <option value="${x.id_usuario}" data-nombre = "${x.nombres}">${x.nombres} ${x.apellidos}</option>
             `;
          
        });
        $("#quien_firma_freezer").html(template_2+template);
      }
    });
  
}

(function(){
  
  $("#quien_firma_freezer").change(function(){
    
    let id_usuario = $(this).val();
   

    
    Swal.fire({
      position:'center',
      title:'Asignar para responsable del informe',
      icon:'question',
      showButtonConfirm:true,
      confirmButtonText:'Si!',
      showButtonCancel:true,
      cancelButtonText:'No!'
    }).then((result)=>{
      
      if(result.value){
        
          $.ajax({
            type:'POST',
            data:{id_usuario, id_asignado_freezer},
            url:'templates/freezer/asigna_firma.php',
            success:function(response){
              
              if(response == "Actualizado"){
                Swal.fire({
                  position:'center',
                  title:'Asignado',
                  icon:'success',
                  timer:1500        
                });
                listar_firmador_freezer();
              }
              
            }
          });
      }
      
    });
  });
  
}());

listar_firmador_freezer();
//función para listar quien firma el documento
function listar_firmador_freezer(){
  
  $.ajax({
    type:'POST',
    data:{id_asignado_freezer},
    url:'templates/freezer/listar_firma.php',
    success:function(response){
        let traer = JSON.parse(response);
        traer.forEach((x)=>{
          $("#persona_firma_freezer").text(x.nombres +' '+ x.apellidos);
        });

    }
  });
}

//FUNCION PARA LISTAR LOS INFORMES BASE
function listar_inf_base_freezer(){
  
   let seleccion = 1;
   
  
    const data_1 = {
      seleccion,
      id_asignado_freezer
    }

    let template = "";
    let template_1 = ""
    let template_2  = "";
    let aprobacion_estado = "";
		let aprobacion_leyenda = "";
    $.ajax({
      type : 'POST',
      data : data_1,
      url: 'templates/freezer/listar_informe_base.php',
      success:function(e){
         
        if(e.length == 2){
          $("#informe_base_mostrar_freezer").hide();
        }else{
          $('#informe_base_no_freezer').hide();
          $("#informe_base_mostrar_freezer").show();
        }

        let traer = JSON.parse(e);
        let i = 0;
       traer.forEach((x)=>{
         
         //cargar  valores a los comentarios del informe base
         $("#conclusion_informe_base_freezer").val(x.observacion);
         $("#metodologia_informe_base_freezer").val(x.comentarios);
         $("#conclusion_final_informe_base_freezer").val(x.concepto);
         
         
         
         
         //validar estado de la aprobacion del informe
				if(x.estado_aprobacion === null  || x.estado_aprobacion == 0){
					aprobacion_estado = `<button class="btn btn-primary" data-id="${x.id_informe}" id="aprobar_freezer" id-approb = "${x.id_aprobacion}" 	value="1">Solicitar</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Solicitar aprobación</span>";
				}else if(x.estado_aprobacion == 1){
					aprobacion_estado = `<button class="btn btn-warning" data-id="${x.id_informe}" id="aprobar_freezer" id-approb="${x.id_aprobacion}" 	value="0">Anular</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Aprobación en curso</span>";
				}else if(x.estado_aprobacion == 2){
					aprobacion_estado = `<button class="btn btn-success" data-id="${x.id_informe}" id="aprobar_freezer" disable id-approb = "${x.id_aprobacion}" disabled="disabled">Aprobado</button>`;
					aprobacion_leyenda = "<span class='text-primary'>Aprobado</span>";
				}else if(x.estado_aprobacion == 3){
					aprobacion_estado = `<button class="btn btn-danger" data-id="${x.id_informe}" id="aprobar_freezer" disable id-approb ="${x.id_aprobacion}" 	value="1">Solicitar</button>`;
					aprobacion_leyenda = `<span class='text-primary' id='vercorrecciones'>${x.observacion_aprobacion}</span>`;
				}
       $('#nombre_infome_freezer').text(x.nombre);
      
          template_1 = `
               <div class="col-sm-10"></div>
            <div class="col-sm-2">
              <div class="btn-actions-pane-right">
                <div role="group" class="btn-group-sm nav btn-group">
                ${aprobacion_leyenda} &nbsp;&nbsp;  ${aprobacion_estado} 
                </div>
              </div>
            </div>
              `;   
         
         
           template+= 
           `
           
            <div class="col-sm-12">
              <form id="form_4_freezer" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id_informe_freezer" value="${x.id_informe}">
               <div class="row" style="text-align:center;">
                  <div class="col-sm-6">
                  <label>Imagenes posicion sensor</label>
                  <input type="file" name="imagen_1_freezer" id="image_1" class="form-control">
                  </div>
                  <div class="col-sm-6">
                  <label>Imagenes equipo</label>
                  <input type="file" name="imagen_2_freezer" id="image_2" class="form-control">
                  </div>
              </div>
               <br>
               <div class="row">
                <div class="col-sm-12" style="text-align:center">
                  <button  type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info"  data-id = "${x.id_informe}" id="cargar_imagen_1_freezer">Cargar imagenes</button>
                </div>
              </div>
              </form>
            </div>
         
            `;
         
         
         template_2+=
           `
            <div class="row">
              <div class="col-sm-12" style="text-align:center;">
                <button  type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info"  data-id = "${x.id_informe}" id="cargar_inf_base_freezer">Actualizar</button>
              </div>
            </div>
            <div class="row" style="text-align:center;">
              <div class="col-sm-12" style="text-align:center">
                <a class='btn btn-ligth'  data-id = "${x.id_informe}" id="pdf_freezer" data-nombre="${x.tipo_informe}"><img src="design/images/pdf.png" width="50px"/></a>
              </div>
            </div>

            <div class="row" style="text-align:center;">
              <div class="col-sm-12" style="text-align:right">
                <a class='btn btn-ligth'  data-id = "${x.id_informe}" data-nombre="${x.nombre}" id="eliminar_informe_freezer">
                  <span class="text-danger"><h4>Eliminar informe</h4></span></a>
              </div>
          `;
      
         
       });
        
        $("#traer_imagenes_base_freezer").html(template);
        $("#final_inf_base_freezer").html(template_2);
        $("#solicitar_aprobacion_freezer").html(template_1);
        

      }
    });
}

//LISTAR IMAGENES BASE
function imagenes_equipo_base_freezer(){
  let seleccion = 3;
  const data_3 = {
    seleccion,
    id_asignado_freezer
  }
  
    let template_2  = "";
    $.ajax({
      type : 'POST',
      data : data_3,
      url: 'templates/freezer/listar_informe_base.php',
      success:function(e){
        let traer = JSON.parse(e);
        traer.forEach((x)=>{
        template_2 += 
         `   <div class="col-sm-4" style="text-align:center;">
                <label>Imagenes equipo</label>
                <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen_freezer" data-nombre = "${x.ubicacion}"	data-id="${x.id_informe}" data-otro="${x.id_imagen}">X</a>
                <br>
                <img src="templates/freezer/${x.ubicacion}" width="100px"> 
              </div>
            `;
        });

        $("#traer_otras_imagenes_base_freezer").html(template_2);
      }
    });
  
}

//LISTAR IMAGENES SENSORES INFORME BASE
function imagenes_equipo_base_sensores_freezer(){
  let seleccion = 4;
  const data_3 = {
    seleccion,
    id_asignado_freezer
  }
  
    let template_2  = "";
    $.ajax({
      type : 'POST',
      data : data_3,
      url: 'templates/freezer/listar_informe_base.php',
      success:function(e){
        
        let traer = JSON.parse(e);
        traer.forEach((x)=>{
        template_2 += 
           `
            <div class="col-sm-4" style="text-align:center;">
                <label>Imagenes sensor</label>
                <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen_freezer" data-nombre = "${x.ubicacion}"	data-id="${x.id_informe}" data-otro="${x.id_imagen}">X</a>
                <br>
                <img src="templates/freezer/${x.ubicacion}" width="100px"> 
              </div>
            `;
        });

        $("#traer_otras_imagenes_base_2_freezer").html(template_2);
      }
    });
  
}




//FUNCION PARA CONTROLAR EL BOTTON DE EVIDENCIAS GRAFICAS
(function(){
	
		$(document).on('submit','#form_4_freezer',function(e){
							e.preventDefault();
      
		$.ajax({
			url: 'templates/freezer/cargar_evidencias_graficas_inf_base.php',
			type: 'POST',
			dataType: 'html',
			data: new FormData(this),
			cache: false,
			contentType: false,
			processData: false,
			success:function(response){	
        
        
        
        Swal.fire({
          position:'center',
          title:'Imagen guardada',
          icon:'success',
          timer:1500
        });
        $("#image_1").val('')
        $("#image_2").val('')
				imagenes_equipo_base_freezer();
        imagenes_equipo_base_sensores_freezer();
					}	

		});

		});		
	
}());

//LISTAR MAPEOS BASE
function listar_mapeos_inf_base_freezer(){
    let seleccion = 2;
  
    const data_2 = {
      seleccion,
      id_asignado_freezer
    }
  
    $.ajax({
      type : 'POST',
      data : data_2,
      url: 'templates/freezer/listar_informe_base.php',
      success:function(e){
       
         let traer = JSON.parse(e);
         let template = ""; 
          traer.forEach((x)=>{
            template += `
              <div class="col-sm-4">
                 <label>Observaciones para el ${x.nombre_mapeo}</label>
                <textarea class="form-control"  name="comentario_mapeo_freezer[]">${x.comentario}</textarea>
                <input type="hidden" name="id_mapeos_freezer[]" value="${x.id_mapeo}">
              </div>
            `;
            
            
          });
        
        
          $("#traer_mapeos_base_freezer").html(template);
          
        
      }
    });
}


///////////////////////////ALMACENAR INFORME BASE 
 $(document).on('click','#cargar_inf_base_freezer',function(){
     Swal.fire({
          position:'center',
          title:'Información actualizada',
          icon:'success',
          timer:1500
        });
    let conclusion_informe_base = $("#conclusion_informe_base_freezer").val();
    let metodologia_informe_base = $("#metodologia_informe_base_freezer").val();
    let conclusion_final_informe_base = $("#conclusion_final_informe_base_freezer").val();
    let id_informe_mapeos = $(this).attr('data-id');
    var comentario_x_mapeo_base = [];
    var id_mapeo_comentario = [];
    var incCount = document.getElementsByName("comentario_mapeo_freezer[]").length;
    for(i=0;i<incCount;i++){
        comentario_x_mapeo_base[i] = document.getElementsByName("comentario_mapeo_freezer[]")[i].value;
        id_mapeo_comentario[i] = document.getElementsByName("id_mapeos_freezer[]")[i].value;
    }
    
    const data = {
      conclusion_informe_base,
      metodologia_informe_base,
      conclusion_final_informe_base,
      comentario_x_mapeo_base,
      id_mapeo_comentario,
      id_informe_mapeos
    }
  
      $.ajax({
        type:'POST',
        url: 'templates/freezer/almacenar_informe_base.php',
        data: data,
        success:function(response){
         
        }
      });
     });

//FUNCION PARA ELIMINAR IMAGENES
(function(){
	
	$(document).on('click','#eliminar_imagen_freezer',function(){
		
		let id_informe = $(this).attr('data-id');
		let url = $(this).attr('data-nombre');
    let id_imagen = $(this).attr('data-otro');
		
		Swal.fire({
			position:'center',
			title:'Seguro ¿Desea eliminar la imagen?',
			showCancelButton:true,
			cancelButtonText:'No',
			showConfirmButton:true,
			confirmButtonText:'Si',
			icon:'queston'
		}).then((result)=>{	
			
			if(result.value){
				$.ajax({
					type:'POST',
					data: {id_informe, url, id_imagen},
					url:'templates/freezer/eliminar_image.php',
					success:function(response){
						if(response == "Si"){
							Swal.fire({
								position:'center',
								title:'Se ha eliminado correctamente la imagen',
								icon: 'success',
								timer:1500
							});
							listar_informes_freezer();
              imagenes_equipo_base_freezer();
              imagenes_equipo_base_sensores_freezer();
						}
					}
				});
			}	
		});
	});
}());


//FUNCTION QUE CONTROLA EL EVENTO DE ACTUALIZAR OBSERVACIONES Y COMENTARIOS

	
	$(document).on('submit','#form_2_freezer',function(e){
						e.preventDefault();
		
	$.ajax({
		url: 'templates/freezer/actualizar_informe_parte_1.php',
    type: 'POST',
    dataType: 'html',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
    success:function(response){		
      
			 if(response == "Si"){
					Swal.fire({
						position:'center',
						title:'Ha sido actualizado correctamente',
						icon:'success',
						timer:1500
					});
					listar_informes_freezer();
				}

		}	
	});		
	});		



//FUNCION PARA VALIDAR PDF
(function(){
	$(document).on('click','#pdf_freezer',function(){
	let id_informe = $(this).attr("data-id");
  let tipo = $(this).attr("data-nombre");
  

			$.ajax({
				type : 'POST',
				data : {id_informe},
				url : 'templates/freezer/pre_pdf.php',
				success: function(response){
					if(response == "Ver"){
            if(tipo==0){
              window.open('templates/freezer/informes/pdf/informe_mapeo_freezer_temp.php?informe='+id_informe);
                
              
            }else if(tipo == 1){
              window.open('templates/freezer/informes/pdf/informe_mapeo_freezer_hum.php?informe='+id_informe);
            }else if(tipo == 2){
              window.open('templates/freezer/informes/pdf/informe_mapeo_freezer_base.php?informe='+id_informe);
            }
						
					}else if(response == "No"){
						Swal.fire({
							position:'center',
							icon:'error',
							title:'Recuerda que es importante la aprobación del informe por parte del HEAD',
              showConfirmButton:true,
              showCancelButton:false,
              confirmButtonText:"Si"
						}).then((respuesta)=>{
              if(respuesta.value){
               if(tipo==0){
                  window.open('templates/freezer/informes/pdf/informe_mapeo_freezer_temp.php?informe='+id_informe);
                }else if(tipo == 1){
                  window.open('templates/freezer/informes/pdf/informe_mapeo_freezer_hum.php?informe='+id_informe);
                }else if(tipo == 2){
                  window.open('templates/freezer/informes/pdf/informe_mapeo_freezer_base.php?informe='+id_informe);
                }else{
                  window.open('templates/ultrafreezer/informes/pdf/informe_mapeo_ultrafreezer_temp.php?informe='+id_informe);
                }
              }
            })
					}
          else if(response == "NoXimg"){
            Swal.fire({
              position:'center',
              icon:'error',
              title:'Debes cargar las imagenes para ver el pdf',
              timer:1700
            });
          
          }
				}
			
			});
	});
}());


////////////////////////////VALIDAR GENERAR INFORMES//////////


function validar_generar_informes_freezer(){
  
    $.ajax({
      type:'POST',
      data:{id_asignado_freezer},
      url:'templates/freezer/validar_informes.php',
      success:function(response){
        
        if(response == "Si"){
          $("#cargar_informes_freezer").show();
        }else{
           $("#cargar_informes_freezer").hide();
        }
      }
    });
}
$("#cargar_informes_freezer").click(function(){
    
    $.ajax({
      type:'POST',
      data:{id_asignado_freezer, id_valida},
      url:'templates/freezer/crear_informes_after.php',
      success:function(response){
        //nsole.log(response)
       
          Swal.fire({
            title:'Generación de informes',
            text:'Los informes han sido generados',
            icon:'success',
            timer:1700
          });
          validar_generar_informes_freezer();
          contar_registro_informes_freezer();
          listar_informes_freezer();
          listar_inf_base_freezer();
      
      }
    });
});

//FUNCION PARA ELIMINAR INFORME
(function(){
	$(document).on('click','#eliminar_informe_freezer',function(){
		
		let id_informe = $(this).attr('data-id');
		let nombre = $(this).attr('data-nombre');
		
		Swal.fire({
			position:'center',
			title:'Seguro ¿Deseas eliminar el informe '+nombre+'?',
			icon:'question',
			showCancelButton:true,
			cancelButtonText:'No',
			showConfirmButton:true,
			confirmButtonText:'Si'
		}).then((result)=>{
			if(result.value){
				
				$.ajax({
					type:'POST',
					data:{id_informe},
					url:'templates/freezer/eliminar_informe.php',
					success:function(response){
						
						if(response == "Si"){
							Swal.fire({
								position:'center',
								title:'Informe eliminado correctamente',
								icon:'success',
								timer:1500							
							});
							listar_informes_freezer();
              validar_generar_informes_freezer();
             
						}
					}
				});
			}
			
		});
		
	});
	
}());

$("#change_mapeo_freezer").click(function(){

  $("#change_mapeo_freezer").hide();
    listar_mapeos_freezer();
    setear_campos_freezer();
   $("#btn_actualizar_mapeo_freezer").hide();
   $("#btn_nuevo_mapeo_freezer").show();

})


$(document).on('click','#boton_condatos_cargados',function(){

  var URLactual = $("#es_local").val();
 
  if(URLactual == "Si"){
    window.open(`https://localhost/CerNet2.0/templates/datoscrudos/vistadatoscrudos.php?id_valida=${id_valida}&id_asignado=${id_asignado}&id_mapeo=${id_mapeo}`, "Datos Crudos", "width=1693px, height=1693px");
  }else{
    window.open(`https://cercal.net/CerNet2.0/templates/datoscrudos/vistadatoscrudos.php?id_valida=${id_valida}&id_asignado=${id_asignado}&id_mapeo=${id_mapeo}`, "Datos Crudos", "width=1693px, height=1693px");
  }

});
$(document).on('click','#boton_sindatos_cargados',function(){

  var URLactual = $("#es_local").val();
 
  if(URLactual == "Si"){
    window.open(`https://localhost/CerNet2.0/templates/datoscrudos/vistadatoscrudos.php?id_valida=${id_valida}&id_asignado=${id_asignado_freezer}&id_mapeo=${id_mapeo_freezer}`, "Datos Crudos", "width=1693px, height=1693px")
  
  
  }else{
    window.open(`https://cercal.net/CerNet2.0/templates/datoscrudos/vistadatoscrudos.php?id_valida=${id_valida}&id_asignado=${id_asignado_freezer}&id_mapeo=${id_mapeo_freezer}`, "Datos Crudos", "width=1693px, height=1693px");
  }

});






//LLAMAR FUNCIONES
listar_informes_freezer();
contar_registros_freezer();
listar_bandejas_freezer();
listar_mapeos_freezer();
mostrar_correlativo(id_asignado_freezer);
leer_correlativo_freezer(id_asignado_freezer);
contar_registro_informes_freezer();
listar_participantes_freezer();
listar_inf_base_freezer();
listar_mapeos_inf_base_freezer();
imagenes_equipo_base_freezer();
imagenes_equipo_base_sensores_freezer();
validar_generar_informes_freezer();	 