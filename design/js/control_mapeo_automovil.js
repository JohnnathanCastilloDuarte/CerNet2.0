////////////// VARIABLES GLOBALES A UTILIZAR
var id_asignado_automovil = $("#id_asignado_automovil").val();
var id_valida_automovil = $("#id_valida").val();


////////////// ELEMENTOS A OCULTAR
$("#btn_actualizar_altura_automovil").hide()
$("#btn_nueva_altura_automovil").show();
$("#btn_actualizar_mapeo_automovil").hide();
$("#change_mapeo_automovil").hide();
$("#nombre_eleccion_automovil").hide();
$("#nombre_traido_automovil").hide();
$("#anuncio_traido_mapeo_automovil").hide();
$("#listar_bandejas_creadas_automovil").hide();
$("#carga_up_automovil").hide();
$("#si_existe_dc_autmovil").hide();
$("#personal_1_automovil").hide();
$("#cerrar_crear_personal_automovil").hide();

$("#asignacion_mapeo_automovil").hide();
$("#asignacion_participantes_automovil").hide();
$("#asignacion_informe_automovil").hide();

///////////// FUNCIONES QUE SE EJECUTARAN
listar_alturas();
contar_alturas_automovil();
listar_pruebas_automovil("L");
listar_participantes_automovil();
listar_correlativo_automovil();
listar_firmadores_automovil();
contar_informes();
listar_informes_automovil();



/////LISTAR ALTURAS
function listar_alturas(){
  $.ajax({
    type:'POST',
    url:'templates/automovil/listar_alturas.php',
    data:{id_asignado_automovil},
    success:function(respuesta){
      let traer = JSON.parse(respuesta);
      let template = ""
      let template2 = ""
      
      if (traer.length == 0){
          template += '<tr><td colspan = "3"><h5>No hay alturas actualmente</h5></td></tr>';
      }else{
          traer.forEach((x)=>{
            
            
            template += `
                <tr>
                  <td>${x.nombre}</td>
                  <td>${x.tipo}</td>
                  <td>
                    <div style='text-align:center;'>
                        <button class="btn btn-success" data-id="${x.id}" id="modificar_bandeja_creada_automovil" data-nombre="${x.nombre}"><i class="pe-7s-check">	</i></button>
                        <button class="btn btn-danger" data-id="${x.id}" id="eliminar_bandeja_creada_automovil">X</button>			
                    </div>
                  </td>
                </tr>

              `;
            
            
             template2 += `
                <tr>
                  <td>${x.nombre}</td>
                  <td><button class="btn btn-success" data-id="${x.id}" id="paso_sensores" data-nombre="${x.nombre}"><i class="pe-7s-check">	</i></button></td>
                </tr>

              `;
          });
      } 
      $("#listar_bandejas_creadas_automovil").html(template2);
      $("#resultados_bandeja_automovil").html(template);
    }
  });
}

/////CREAR ALTURAS 
$("#btn_nueva_altura_automovil").click(function(){
  
  let tipo =  $("#tipo_altura_automovil").val();
  let altura = $("#altura_automovil").val();
  
  const datos = {
    tipo,
    altura,
    id_asignado_automovil
  }
  
  if(altura == ''){
    
       Swal.fire({
        title:'Mensaje',
        text:'Debes ingresar un nombre y un tipo de altura',
        icon:'error',
        timer:1500
      });
    
  }else{
  
    $.ajax({
      type:'POST',
      data:datos,
      url:'templates/automovil/crear_altura.php',
      success:function(respuesta){
        if(respuesta == 1){
          Swal.fire({
            title:'Mensaje',
            text:'Se ha creado correctamente la altura',
            icon:'success',
            timer:2000
          }); 
          listar_alturas();
          contar_alturas_automovil();
        }
      }
    });
  }
});

//// EDITAR ALTURAS
$(document).on('click','#modificar_bandeja_creada_automovil',function(){
  

  $("#btn_nueva_altura_automovil").hide();  
  $("#btn_actualizar_altura_automovil").show();
 
  let id_altura  = $(this).attr('data-id');
  $("#id_bandeja_actualizar_ultrafreeze").val(id_altura);
  
  let altura = $(this).attr('data-nombre');
  $("#altura_automovil").val(altura);
  
});


//// BOTON QUE ENVIA LA ACCION PARA EDITAR LA ALTURA
$("#btn_actualizar_altura_automovil").click(function(){
  
  let id_altura =  $("#id_bandeja_actualizar_ultrafreeze").val();
  let altura =  $("#altura_automovil").val();
  let tipo_altura = $("#tipo_altura_automovil").val();
  
  const datos = {
    id_altura,
    altura,
    tipo_altura,
    id_asignado_automovil
  }
  
  
  if (tipo_altura == "sin altura")
  {
    Swal.fire({
      title:'Mensaje',
      text:'Tenes que ingresar un tipo de altura',
      icon:'error',
      timer:2000
    });
  }else{
    $.ajax({
      type:'POST',
      url:'templates/automovil/actualizar_altura.php',
      data: datos,
      success:function(respuesta){
      
        if(respuesta == 1){
          Swal.fire({
            title:'Mensaje',
            text:'Se ha modificado correctamente, la altura',
            icon:'success',
            timer:1500
          });
          listar_alturas();
          $("#btn_actualizar_altura_automovil").hide();
          $("#btn_nueva_altura_automovil").show();  
          setearaltura();

        }
      }
    })
  }
});

function setearaltura(){
  $("#altura_automovil").val('');
  $("#tipo_altura_automovil").val('sin altura')
}

//// BOTON QUE ELIMINARA LA ALTURA:
$(document).on('click','#eliminar_bandeja_creada_automovil',function(){
  
  let id_altura = $(this).attr('data-id');
  
  Swal.fire({
    tile:'Mensaje',
    text:'Estas seguro que ¿ deseas eliminar la altura ?',
    showCancelButton: true,
    confirmButtonText: 'Eliminar',
    icon:'question'
  }).then((x)=>{
    if(x.value){
      $.ajax({
        type:'POST',
        url:'templates/automovil/eliminar_altura.php',
        data:{id_altura},
        success:function(respuesta){
          
          if(respuesta == 1){
            Swal.fire({
              title:'Mensaje',
              text:'La altura ha sido eliminada correctamente',
              timer:1500,
              icon:'success'
            });
            listar_alturas();
            contar_alturas_automovil();
          }
        }
      })
    }
  });
});


//////// CONTAR ALTURAS
function contar_alturas_automovil(){
  
  $.ajax({
    type:'POST',
    url:'templates/automovil/contar_alturas.php',
    data:{id_asignado_automovil},
    success:function(response){


    
      if(response == 0){
        $("#cuerpo_mapeo_automovil").hide();
        $("#cuerpo_ver_mapeo_automovil").hide();

          
        

      }else{
          $("#cuerpo_mapeo_automovil").show();
          $("#cuerpo_ver_mapeo_automovil").show(); 
      }
    }
  })
  
}

////// FUNCION PARA EL NOMBRE DE LAS PRUEBAS
$("#nombre_mapeo_automovil").change(function(){
  let valor = $(this).val(); 
  
  if(valor == "asignar_nombre_automovil"){
    $("#nombre_eleccion_automovil").show();
  }else{
    $("#nombre_eleccion_automovil").hide();
  }
});


////// FUNCION PARA LISTAR PRUEBAS
function listar_pruebas_automovil(parametro){
    
   const  datos = {
      parametro, 
      id_asignado_automovil
   }

  
  
  $.ajax({
    type:'POST',
    url:'templates/automovil/listar_pruebas.php',
    data:datos,
    success:function(response){
     
      let traer = JSON.parse(response)
      let template = "";
      let template2 = "";
      
      if (response != "[]") {
        traer.forEach((x)=>{
          template +=
            `
              <tr>
                <td>${x.nombre}</td>
                <td>${x.fecha_inicio} ${x.hora_inicio}</td>
                <td>${x.fecha_final} ${x.hora_final}</td>
                <td>${x.intervalo}</td>
                <td>${x.temperatura_minima}</td>
                <td>${x.temperatura_maxima}</td>
                <td>
                  <button class="btn btn-success" data-id="${x.id_mapeo}" id="modificar_mapeo_creada_automovil"><i class="pe-7s-check"></i></button>
                  <button class="btn btn-danger" data-id="${x.id_mapeo}" id="eliminar_mapeo_creada_automovil">X</button>
                </td>
              </tr>
            `
          ;    
          
          
          
          template2 += 
            `
             <tr>
                <td>${x.nombre}</td>
                <td>
                   <button class="btn btn-success" data-id="${x.id_mapeo}" data-nombre = "${x.nombre}" id="paso_alturas"><i class="pe-7s-check"></i></button>
                </td>
             </tr> 
            
            `;
        });
      
      // alert(response)
      $("#listando_mapeos_creados_automovil").html(template2);  
      $("#listando_mapeos_automovil").html(template);

      $("#asignacion_mapeo_automovil").show();
      $("#asignacion_participantes_automovil").show();
      $("#asignacion_informe_automovil").show();
      
     }else{

    

     }

    }
  });
  
}
////// EVENTO PARA EL BOTON DE CREAR PRUEBA
$("#btn_nuevo_mapeo_automovil").click(function(){
  
  let select = $("#nombre_mapeo_automovil").val();
  let nombre_prueba = ""
  
  if(select == "asignar_nombre_automovil"){
    nombre_prueba =  $("#nombre_eleccion_automovil").val();
  }else{
    nombre_prueba = select;
  }
  
 let fecha_inicio_mapeo_automovil = $("#fecha_inicio_mapeo_automovil").val(); 
 let hora_inicio_mapeo_automovil = $("#hora_inicio_mapeo_automovil").val();
 let minuto_inicio_mapeo_automovil = $("#minuto_inicio_mapeo_automovil").val();
 let segundo_inicio_mapeo_automovil = $("#segundo_inicio_mapeo_automovil").val();
 let fecha_fin_mapeo_automovil = $("#fecha_fin_mapeo_automovil").val();
 let hora_fin_mapeo_automovil = $("#hora_fin_mapeo_automovil").val();
 let minuto_fin_mapeo_automovil = $("#minuto_fin_mapeo_automovil").val();
 let segundo_fin_mapeo_automovil = $("#segundo_fin_mapeo_automovil").val();
 let intervalo_automovil = $("#intervalo_automovil").val();
 let valor_seteado_temperatura_automovil = $("#valor_seteado_temperatura_automovil").val();
 let temperatura_minima_automovil = $("#temperatura_minima_automovil").val();
 let temperatura_maxima_automovil = $("#temperatura_maxima_automovil").val();
  
 const datos = {
  nombre_prueba,
  fecha_inicio_mapeo_automovil,
  hora_inicio_mapeo_automovil,
  minuto_inicio_mapeo_automovil,
  segundo_inicio_mapeo_automovil,
  fecha_fin_mapeo_automovil,
  hora_fin_mapeo_automovil,
  minuto_fin_mapeo_automovil,
  segundo_fin_mapeo_automovil,
  intervalo_automovil,
  valor_seteado_temperatura_automovil,
  temperatura_minima_automovil,
  temperatura_maxima_automovil,
  id_asignado_automovil,
  id_valida_automovil
 }
 
 if(nombre_prueba == "Sin_seleccion"){
   Swal.fire({
     title:'Mensaje',
     text:'Debes seleccionar un nombre para la prueba',
     icon:'error',
     timer:1500
   });
 }else{
  $.ajax({
   type:"POST",
   url:"templates/automovil/crear_prueba.php",
   data:datos,
   success:function(response){
     if(response == 1){
       Swal.fire({
         title:'Mensaje',
         text:'Se ha creado la prueba correctamente',
         icon:'success',
         timer:1500
       }); 
       listar_pruebas_automovil("L");
       setear_campos_mapeo();
       crear_informes();
     }
   }
 }); 
 }  
});

//////// MODIFICACIÓN DE PRUEBA 

$(document).on("click","#modificar_mapeo_creada_automovil",function(){
  
  let id_mapeo = $(this).attr('data-id');
  $("#id_mapeo_creado_automovil").val(id_mapeo);
  
  Swal.fire({
    title:'Mensaje',
    text:'Revisa la pestaña de mapeo para modificar tu información',
    icon:'success',
    timer:1500
  });
  traer_prueba_automovil("F");
});


/////////// FUNCIÓN PARA TRAER LA INFORMACIÓN A MODIFICAR
function traer_prueba_automovil(parametro){
  
  $("#nombre_mapeo_automovil").hide();
  $("#nombre_traido_automovil").show();
  $("#anuncio_traido_mapeo_automovil").show();
  $("#anuncio_nombre_mapeo_automovil").hide();
  $("#btn_actualizar_mapeo_automovil").show();
  $("#change_mapeo_automovil").show();
  $("#btn_nuevo_mapeo_automovil").hide();
  
  let id_mapeo = $("#id_mapeo_creado_automovil").val();
  const datos = {
    id_mapeo,
    parametro
  } 
  $.ajax({
    type:'POST',
    url:'templates/automovil/listar_pruebas.php',
    data:datos,
    success:function(response){
      
      let traer = JSON.parse(response)

      $("#nombre_traido_automovil").val(traer.nombre);
      $("#fecha_inicio_mapeo_automovil").val(traer.fecha_inicio);
      $("#hora_inicio_mapeo_automovil").val(traer.hora_inicio);
      $("#minuto_inicio_mapeo_automovil").val(traer.minuto_inicio);
      $("#segundo_inicio_mapeo_automovil").val(traer.segundo_inicio);
      $("#fecha_fin_mapeo_automovil").val(traer.fecha_final);
      $("#hora_fin_mapeo_automovil").val(traer.hora_final);
      $("#minuto_fin_mapeo_automovil").val(traer.minuto_final);
      $("#segundo_fin_mapeo_automovil").val(traer.segundo_final);
      $("#intervalo_automovil").val(traer.intervalo);
      $("#valor_seteado_temperatura_automovil").val(traer.valor_seteado);
      $("#temperatura_minima_automovil").val(traer.temperatura_minima);
      $("#temperatura_maxima_automovil").val(traer.temperatura_maxima);
    }
    
  });
}

$("#change_mapeo_automovil").click(function(){
  
  $("#nombre_mapeo_automovil").show();
  $("#nombre_traido_automovil").hide();
  $("#anuncio_traido_mapeo_automovil").hide();
  $("#anuncio_nombre_mapeo_automovil").show();
  $("#btn_actualizar_mapeo_automovil").hide();
  $("#change_mapeo_automovil").hide();
  $("#btn_nuevo_mapeo_automovil").show();
  setear_campos_mapeo()
});

function setear_campos_mapeo(){
  
      $("#nombre_traido_automovil").val('');
      $("#fecha_inicio_mapeo_automovil").val('');
      $("#hora_inicio_mapeo_automovil").val('');
      $("#minuto_inicio_mapeo_automovil").val('');
      $("#segundo_inicio_mapeo_automovil").val('');
      $("#fecha_fin_mapeo_automovil").val('');
      $("#hora_fin_mapeo_automovil").val('');
      $("#minuto_fin_mapeo_automovil").val('');
      $("#segundo_fin_mapeo_automovil").val('');
      $("#intervalo_automovil").val('');
      $("#valor_seteado_temperatura_automovil").val('');
      $("#temperatura_minima_automovil").val('');
      $("#temperatura_maxima_automovil").val('');
}

$("#btn_actualizar_mapeo_automovil").click(function(){
  
      let nombre = $("#nombre_traido_automovil").val();
      let fecha_inicio = $("#fecha_inicio_mapeo_automovil").val();
      let hora_inicio = $("#hora_inicio_mapeo_automovil").val();
      let minuto_inicio = $("#minuto_inicio_mapeo_automovil").val();
      let segundo_inicio = $("#segundo_inicio_mapeo_automovil").val();
      let fecha_fin = $("#fecha_fin_mapeo_automovil").val();
      let hora_fin = $("#hora_fin_mapeo_automovil").val();
      let minuto_fin = $("#minuto_fin_mapeo_automovil").val();
      let segundo_fin = $("#segundo_fin_mapeo_automovil").val();
      let intervalo = $("#intervalo_automovil").val();
      let valor_seteado = $("#valor_seteado_temperatura_automovil").val();
      let temperatura_minima = $("#temperatura_minima_automovil").val();
      let temperatura_maxima = $("#temperatura_maxima_automovil").val();
      let id = $("#id_mapeo_creado_automovil").val();
  
      const datos = {
        nombre,
        fecha_inicio,
        hora_inicio,
        minuto_inicio,
        segundo_inicio,
        fecha_fin,
        hora_fin,
        minuto_fin,
        segundo_fin,
        intervalo,
        valor_seteado,
        temperatura_minima,
        temperatura_maxima,
        id
      }
      
      $.ajax({
        type:'POST',
        url:'templates/automovil/actualizar_mapeo.php',
        data: datos,
        success:function(response){
          
          if(response == 1){
            Swal.fire({
              title:'Mensaje',
              text:'La prueba ha sido actualizada con exito!!',
              icon:'success',
              timer:1500
            });
            listar_pruebas_automovil("L");
            setear_campos_mapeo();
            $("#nombre_mapeo_automovil").show();
            $("#nombre_traido_automovil").hide();
            $("#anuncio_traido_mapeo_automovil").hide();
            $("#anuncio_nombre_mapeo_automovil").show();
            $("#btn_actualizar_mapeo_automovil").hide();
            $("#change_mapeo_automovil").hide();
            $("#btn_nuevo_mapeo_automovil").show();
          }
        }
      })
 });


//////// ELIMINAR LA PRUEBA 
$(document).on('click','#eliminar_mapeo_creada_automovil',function(){
   
  let id = $(this).attr('data-id');
  
  Swal.fire({
    title:'Mensaje',
    text:'Seguro ¿deseas eliminar esta prueba?',
    icon:'question',
    showCancelButton: true,
    confirmButtonText: `Eliminar!`
  }).then((x)=>{
    if(x.value){
     $.ajax({
       type:'POST',
       url:'templates/automovil/eliminar_prueba.php',
       data:{id},
       success:function(response){
         if(response == 1){
           
           Swal.fire({
             title:'Mensaje',
             text:'La prueba ha sido eliminado correctamente',
             icon:'success',
             timer:1500
           });
           listar_pruebas_automovil("L");
         }else if(response == "NO"){
           Swal.fire({
             title:'Mensaje',
             text:'La prueba NO ha sido eliminada, Todavia tienes informes asociados',
             icon:'error',
             timer:2000
           });
         }
       }
     }) 
    }
  });
});


////////// FUNCION PARA LISTAR SENSORES ASIGNADOS
function listar_sensores_asignados_automovil(){
 
  let id_mapeo =  $("#reposa_id_mapeo_automovil").val();
  let id_altura = $("#reposa_id_altura_automovil").val();
 
  
  const datos = {
    id_mapeo,
    id_altura,
    id_asignado_automovil
  }
  
  $.ajax({
    type:'POST',
    url:'templates/automovil/sensores_asignados.php',
    data:datos,
    success:function(response){
     
     let traer  = JSON.parse(response);
     let template1 = "";
     let template2 = "";
     let contador = 0 
      
     traer.forEach((x)=>{
       
       template1 += 
         `  
          <tr>
            <td>${x.nombre_altura} ${x.tipo_altura}</td>
            <td>${x.nombre_sensor} </td>
            <td>${x.fecha_registro}</td>
            <td><select id="posicion_sensor_automovil" class="form-control" data-id="${x.id_automovil_sensor}">
              <option value = "${x.posicion}">${x.posicion}</option>
              <option value = "1">1</option>
              <option value = "2">2</option>
              <option value = "3">3</option>
              <option value = "4">4</option>
              <option value = "5">5</option>
              <option value = "6">6</option>
              <option value = "7">7</option>
              <option value = "8">8</option>
              <option value = "9">9</option>
              <option value = "10">10</option>
              <option value = "11">11</option>
              <option value = "12">12</option>
              <option value = "13">13</option>
              <option value = "14">14</option>
              <option value = "15">15</option>
              </select> 
            </td>
            <td><button class="btn btn-danger" id="quitar_sensor_automovil" data-id="${x.id_automovil_sensor}" data-atributo = "-">X</button></td>
          </tr>

          `;
       
       
        template2 += 
          `
           <tr>
            <td>
              <select name="columna_excel_automovil${contador}" class="form-control">
                <option value = "2">1</option>
                <option value = "3">2</option>
                <option value = "4">3</option>
                <option value = "5">4</option>
                <option value = "6">5</option>
                <option value = "7">6</option>
                <option value = "8">7</option>
                <option value = "9">8</option>
                <option value = "10">9</option>
                <option value = "11">10</option>
                <option value = "12">11</option>
                <option value = "13">12</option>
                <option value = "14">13</option>
                <option value = "15">14</option>
                <option value = "16">15</option>
              </select>
            </td>
            <td>${x.nombre_sensor}<input type="hidden" name="id_sensor_automovil_super${contador}" value="${x.id_automovil_sensor}"></td>
           <tr>  
          `;
       
       contador = contador + 1
     });
      
      $("#mapeos_listos_automovil").html(template1);
      $("#dc_automovil_seleccionador").html(template2);
    }
  });
  
  
}


///////// PASO ALTURAS CREADAS
$(document).on('click','#paso_alturas',function(){
  
  let id = $(this).attr('data-id');
  let nombre = $(this).attr('data-nombre');  
  $("#mapeo_actual_automovil").html(nombre);
  $("#mapeo_actual_automovil_2").html(nombre);
  $("#mapeo_actual_automovil_3").html(nombre);
  $("#listar_bandejas_creadas_automovil").show();
  $("#reposa_id_mapeo_automovil").val(id); 
  $("#id_mapeo_automovil").val(id);
   $("#id_asignado_automovil2").val(id_asignado_automovil);
 

});


/////////// PASO A SENSORES
$(document).on('click','#paso_sensores', function(){
   
    let id = $(this).attr('data-id');
    let nombre = $(this).attr('data-nombre');
    $("#reposa_id_altura_automovil").val(id);
    listar_sensores_automovil();
    listar_sensores_asignados_automovil();
    ya_cargue_dc(id, id_asignado_automovil);
});






/////////////// CONFIGURACIÓN DE SENSORES

$(".mostrar_sensores_contenedor_buscados").hide();
$(".mostrar_sensores_contenedor").show();

(function(){
    
 $("#buscar_sensores_automovil").keydown(function(){
   
   let tecleado = $("#buscar_sensores_automovil").val();
   
   if(tecleado.length > 1){
     $(".mostrar_sensores_contenedor_buscados").show();
     $(".mostrar_sensores_contenedor").hide();
     
     $.ajax({
       type:'POST',
       url:'templates/automovil/buscador_sensores_acme.php',
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
								<button class="btn btn-success" id="agregar_sensor_automovil"  data-id="${result.id_sensor}" data-atributo = "+">+</button>
						</td>				
					</tr>
					`;

					
					
				});
			$("#sensores_encontrados_automovil").html(template);
         
       }
       
     });
   }else{
     $(".mostrar_sensores_contenedor_buscados").hide();
     $(".mostrar_sensores_contenedor").show();
   }
 })
}());


/////// LSITAR SENSORES

function listar_sensores_automovil(){
  
  $.ajax({
    type:'POST',
    url:'templates/automovil/listar_sensores.php',
    success:function(response){
      
      let traer = JSON.parse(response)
      let template = ""
      
      traer.forEach((x)=>{
        
          template +=
             `
              <tr>
                <td>${x.sensor}</td>
                <td>${x.tipo}</td>
                <td>
								  <button class="btn btn-success" id="agregar_sensor_automovil" data-id="${x.id_sensor}" data-atributo = "+">+</button>
						    </td>	
              </tr>
              `;
      });
      
      $("#sensores_resultado_automovil").html(template);
    }    
  });
}


/////////////// AGREGAR SENSOR
$(document).on('click','#agregar_sensor_automovil',function(){  
  let id_sensor = $(this).attr('data-id');
  let parametro = $(this).attr('data-atributo')
  let id_mapeo = $("#reposa_id_mapeo_automovil").val();
  let id_altura = $("#reposa_id_altura_automovil").val();
   
  sensores_funcion(id_sensor, parametro, id_mapeo, id_altura);
});


//////// FUNCION PARA CREACIÓN DE SENSORES

function sensores_funcion(id_sensor, parametro, id_mapeo, id_altura){
  
  
  const datos = {
    id_sensor,
    parametro,
    id_mapeo,
    id_altura,
    id_asignado_automovil,
    id_valida_automovil
  }
  
 
  
  Swal.fire({
    title:'Mensaje',
    text:'Seguro deseas asignar ese sensor?',
    showCancelButton: true,
    confirmButtonText:'Asignar',
    icon:'question'
  }).then((x)=>{
    
    if(x.value){
      //validamos que el sensor no este asignado
      $.ajax({
        type:'POST',
        url:'templates/automovil/asignacion_sensor.php',
        data:datos,
        success:function(response){
          
          if(response == 1){
            Swal.fire({
              title:'Mensaje',
              text:'EL sensor se ha asignado correctamente',
              icon:'success',
              timer:1500
            });
            listar_sensores_asignados_automovil();
          }/// CIERRE DEL IF 
           else{
              Swal.fire({
                title:'Mensaje',
                text:'El sensor ya ha sido asignado',
                icon:'error',
                timer:2000
              });
            }
        }
      })  
    }    
  });
}


////// REMOVER SENSOR 
$(document).on("click","#quitar_sensor_automovil",function(){
  
  let id = $(this).attr('data-id');
  
  Swal.fire({
    title:'Mensaje',
    text:'Seguro, ¿Desea eliminar el sensor?',
    showCancelButton: true,
    confirmButtonText: 'Si',
    icon:'question'
  }).then((x)=>{
    
        if(x.value){
           $.ajax({
          type:'POST',
          url:'templates/automovil/remover_sensor.php',
          data:{id},
          success:function(response){
            if(response == 1){
             Swal.fire({
               title:'Mensaje',
               text:'El sensor ha sido eliminado, correctamente',
               icon:'success',
               timer:2000
             }); 
              listar_sensores_asignados_automovil()
            }else{
              Swal.fire({
               title:'Mensaje',
               text:'El sensor contiene información, elimina la información he intenta de nuevo',
               icon:'error',
               timer:2000
             });
            }
          }
      }); 
    }
  });
});

/////// CHANGE POSICIÓN SENSORES
$(document).on('change','#posicion_sensor_automovil',function(){
  
  let id = $(this).attr('data-id');
  let valor = $(this).val();
    
  const datos = {
    id,
    valor
  }
  
  $.ajax({
    type:'POST',
    url:'templates/automovil/actualiza_posicion.php',
    data:datos,
    success:function(response){
      if(response == 1){
            Swal.fire({
            title:'Mensaje',
            text:'Se ha modificado correctamente la posición',
            icon:'success',
            timer:1500
          });
          listar_sensores_asignados_automovil();
        }
      }//// cierre del if       
  });
});

///// FUNCION PARA DETERMINAR

$("#form_automovil").submit(function(e){
      e.preventDefault();
  $("#botoncito_automovil_dc").hide();
  $("#carga_up_automovil").show();
  let id_altura = $("#reposa_id_altura_automovil").val();
  
  $.ajax({
		url: 'templates/automovil/precarga_dc.php',
    type: 'POST',
    dataType: 'html',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
    success:function(response){
   
      if(response == "Error001"){
        Swal.fire({
          title:'Mensaje',
          text:'No puedes asignar la misma columna a varios sensores',
          icon:'warning',
          timer:2000
        });
        $("#botoncito_automovil_dc").show();
        $("#carga_up_automovil").hide();
      }else{
        Swal.fire({
          title:'Mensaje',
          text:'Carga completa',
          icon:'success',
          timer:2000
        });
        $("#botoncito_automovil_dc").hide();
        $("#carga_up_automovil").hide();
        ya_cargue_dc(id_altura, id_asignado_automovil)
      }
    }
  });
  
});

/////////// FUNCIÓN PARA VALIDAR CUANDO EXISTEN LOS DATOS CRUDOS
function ya_cargue_dc(id, id_asignado_automovil){

  const datos = {
    id,
    id_asignado_automovil
  }
  
  $.ajax({
    type:'POST',
    data:datos,
    url:'templates/automovil/existe_file_dc.php',
    success:function(response){
      
      if(response == 1){
        $("#botoncito_automovil_dc").hide();
        $("#carga_up_automovil").hide();
        $("#file_automovil").hide();
        $("#si_existe_dc_autmovil").show();
        let template = ""
        
        template+=
        `
        <label class="text-danger">Archivo Cargado</label>
        <br>
        <button class="btn btn-danger" id="eliminar_dc_automovil" data-id1 = "${id}" data-id2="${id_asignado_automovil}">Eliminar DC</button>  
        `;
        
        $("#si_existe_dc_autmovil").html(template);
        
      }
    }
  })
}


////////// ELIMINAR DATOS CRUDIS
$(document).on('click','#eliminar_dc_automovil',function(){
  let altura = $(this).attr('data-id1');
  let id_asignado = $(this).attr('data-id2');
  
  const datos = {
    altura,
    id_asignado
  }
  
  Swal.fire({
    title:'Mensaje',
    text:'Seguro, ¿Desea eliminar los datos crudos?',
    icon:'question',
    showCancelButton: true,
    confirmButtonText: 'Si'
  }).then((x)=>{
    if(x.value){
      $.ajax({
        type:'POST',
        url:'templates/automovil/borrar_dc.php',
        data:datos,
        success:function(response){
          
          $("#carga_up_automovil").show();
          if(response == 1){
            Swal.fire({
              title:'Mensaje',
              mensaje:'Los datos crudos se han eliminado correctamente',
              icon:'success',
              timer:2000
            });
            $("#botoncito_automovil_dc").show();
            $("#carga_up_automovil").hide();
            $("#file_automovil").show();
            $("#si_existe_dc_autmovil").hide();
            
          }
        }
      })
    }
  })
});


/////// BOTONES PARA PARTICIPANTES 

$("#crear_personal_empresa_automovil").click(function(){
  
   $("#personal_1_automovil").show();
   $("#cerrar_crear_personal_automovil").show();
   $("#personal_2_automovil").hide();
   $("#crear_personal_empresa_automovil").hide();
   $("#editar_personal_automovil").hide();
});



$("#cerrar_crear_personal_automovil").click(function(){
   $("#personal_1_automovil").hide();
   $("#cerrar_crear_personal_automovil").hide();
   $("#personal_2_automovil").show();
   $("#crear_personal_empresa_automovil").show();
});


$("#guardar_personal_automovil").click(function(){
  
  let nombres  = $("#nombres_personal_automovil").val();
  let apellidos  = $("#apellidos_personal_automovil").val();
  let cargo  = $("#cargo_personal_automovil").val();
  
  const datos = {
    nombres,
    apellidos,
    cargo,
    id_asignado_automovil
  }
  $.ajax({
    type:'POST',
    url:'templates/automovil/crear_participante.php',
    data:datos,
    success:function(response){
      
      if(response == 1){
        Swal.fire({
          title:'Mensaje',
          text:'El participante ha sido creado!',
          timer:2000,
          icon:'success'
        });
        $("#personal_1_automovil").hide();
       $("#cerrar_crear_personal_automovil").hide();
       $("#personal_2_automovil").show();
       $("#crear_personal_empresa_automovil").show();
        listar_participantes_automovil();
      }
    }
  })
});


////// MODIFICAR PARTICIPANTE
$(document).on('click','#modificar_participante_automovil',function(){
  
  let nombre = $(this).attr('data-nombre');
  let apellido = $(this).attr('data-apellido');
  let cargo = $(this).attr('data-cargo');
  let id = $(this).attr('data-id');
  
 $("#personal_1_automovil").show();
 $("#cerrar_crear_personal_automovil").show();
 $("#personal_2_automovil").hide();
 $("#crear_personal_empresa_automovil").hide();
 $("#nombres_personal_automovil").val(nombre);
 $("#apellidos_personal_automovil").val(apellido);
 $("#cargo_personal_automovil").val(cargo); 
 $("#id_oculto_personal_automovil").val(id);
 $("#guardar_personal_automovil").hide();
 $("#editar_personal_automovil").show();
});


///////// EDITAR
$("#editar_personal_automovil").click(function(){
  
   let nombres = $("#nombres_personal_automovil").val();
   let apellidos = $("#apellidos_personal_automovil").val();
   let cargo = $("#cargo_personal_automovil").val(); 
   let id = $("#id_oculto_personal_automovil").val();
    
   const datos = {
    nombres,
    apellidos,
    cargo,
    id
   }
   
   $.ajax({
     type:'POST',
     url:'templates/automovil/editar_participante.php',
     data: datos,
     success:function(response){
      
            if(response == 1){
              Swal.fire({
                title:'Mensaje',
                text:'El participante se ha modificado, exitosamente!',
                icon:'success',
                timer:2000
              });
              $("#personal_1_automovil").hide();
             $("#cerrar_crear_personal_automovil").hide();
             $("#personal_2_automovil").show();
             $("#crear_personal_empresa_automovil").show();
             listar_participantes_automovil();
            }
          }
   });
  
});

//////////// FUNCIÓN PARA LISTAR 
function listar_participantes_automovil(){
  
  $.ajax({
    type:'POST',
    url:'templates/automovil/listar_participantes.php',
    data:{id_asignado_automovil},
    success:function(response){
     
      
      let traer = JSON.parse(response);
      let template = "";
      
      traer.forEach((x)=>{
        
        template +=
          
           `
          <tr>
            <td>${x.nombres} ${x.apellidos}</td>
            <td>${x.cargo}</td>
            <td><button class="btn btn-success" id="modificar_participante_automovil" data-nombre="${x.nombres}" data-apellido="${x.apellidos}" data-cargo = "${x.cargo}" data-id="${x.id}">Modificar</button>
                <button class="btn btn-danger" id="eliminar_participante_automovil" data-id="${x.id}">Borrar</button>  
            </td>
          </tr>
          `;
      });
      
      $("#resultados_personal_automovil").html(template);
    }
  })
}


$(document).on('click','#eliminar_participante_automovil',function(){
  
   let id = $(this).attr('data-id');
    Swal.fire({
      title:'Mensaje',
      text:'Seguro, ¿Deseas eliminar este registro?',
      icon:'question',
      showCancelButton: true,
      confirmButtonText: 'Si'
    }).then((x)=>{
      if(x.value){
        $.ajax({
        type:'POST',
        url:'templates/automovil/eliminar_participante.php',
        data:{id},
        success:function(response){
         
          if(response == 1){
            Swal.fire({
              title:'Mensaje',
              text:'Se ha eliminado con exito el registro!!',
              timer:2000,
              icon:'success'
            });
            listar_participantes_automovil();
          }
        }
      });
      }
    });
});



///////// LISTAR CORRELATIVO
function listar_correlativo_automovil(){
  
  $.ajax({
    type:'POST',
    url:'templates/automovil/listar_correlativo.php',
    data:{id_asignado_automovil},
    success:function(response){
     
      if(response != ""){
        $("#aqui_consecutivo_automovil").html(response);
       
        $("#cuerpo_mapeo_automovil").show();
        $("#cuerpo_ver_mapeo_automovil").show();
      }else{
       
        $("#cuerpo_mapeo_automovil").hide();
        $("#cuerpo_ver_mapeo_automovil").hide();
        $("#aqui_consecutivo_automovil").html("<span class='text-danger'>Sin correlativo</span>");
      } 
    }
  })
}


/////// CREAR CORRELATIVO
$("#cambiando_correlativo_automovil").click(function(){
  
  let correlativo = $("#correlativo_informe_automovil").val();
  
  const datos = {
    correlativo,
    id_asignado_automovil
  }
  
  $.ajax({
    type:'POST',
    url:'templates/automovil/crear_correlativo.php',
    data: datos,
    success:function(response){
     
      if(response){
        Swal.fire({
          title:'Mensaje',
          text:'Se ha creado correctamente el correlativo',
          icon:'success',
          timer:2000
        });
        listar_correlativo_automovil();
      }
    }
  })
  
});

/////// LISTAR FIRMADORES
function listar_firmadores_automovil(){
  
  $.ajax({
    type:'POST',
    url:'templates/automovil/traer_firmadores.php',
    success:function(response){
  
      let traer = JSON.parse(response);
      let template = "";
      
      traer.forEach((x)=>{
        
        template += 
          
          `
          <option value = "${x.id_persona}">${x.nombre} ${x.apellido}</option>
          `;
        
      });
      
      $("#quien_firma_automovil").html(template);
    }
  });
}



//////// EVENTO PARA ASIGNAR QUIEN FIRMA
(function(){
  
  $("#quien_firma_automovil").change(function(){
    
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
            data:{id_usuario, id_asignado_automovil},
            url:'templates/automovil/cambiar_firmante.php',
            success:function(response){
              
              if(response == "Actualizado"){
                Swal.fire({
                  position:'center',
                  title:'Asignado',
                  icon:'success',
                  timer:1500        
                });
                listar_firmador_automovil();
              }
              
            }
          });
      }
      
    });
  });
  
}());


listar_firmador_automovil();
//función para listar quien firma el documento
function listar_firmador_automovil(){

  $.ajax({
    type:'POST',
    data:{id_asignado_automovil},
    url:'templates/automovil/listar_firma.php',
    success:function(response){
     
        let traer = JSON.parse(response);

        traer.forEach((x)=>{
          $("#persona_firma_automovil").text(x.nombres +' '+ x.apellidos);
        });



    }
  });
}




/////// FUNCTION PARA CREAR INFORMES 
function crear_informes(){
  
  $.ajax({
    type:'POST',
    url:'templates/automovil/crear_informes.php',
    data:{id_asignado_automovil},
    success:function(response){
           //// RESPUESTA CUANDO SE CREE
    }
  });
}


////// FUNCION PARA CONTAR INFORMES
function contar_informes(){
  
  $.ajax({
    type:'POST',
    url:'templates/automovil/contar_informes.php',
    data:{id_asignado_automovil},
    success:function(response){
       if(response == 1){
         $("#cargar_informes_automovil").show();
       }else{
         $("#cargar_informes_automovil").hide();
       }
    }
  });
}

///// CREACIÓN DE INFORMES

$("#cargar_informes_automovil").click(function(){
 
  $.ajax({
    type:'POST',
    url:'templates/automovil/re_creacion_informes.php',
    data:{id_asignado_automovil},
    success:function(response){
      
      if(response){
        Swal.fire({
          title:'Mensaje',
          text:'Se han sincronizado los informes',
          timer:2000,
          icon:'success'
        });
        contar_informes();
        
      }
    }
  });
  
});


function listar_informes_automovil(){

	$.ajax({
		type : 'POST',
		data : {id_asignado_automovil},
		url: 'templates/automovil/listar_informes.php',
		success:function(e){
				
			$("#carga").show();
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
				/*if(result.estado_aprobacion === null  || result.estado_aprobacion == 0){
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
				}*/
							
				//logica para el estado
				/*if(result.estado == 0){
					estado = "No terminado";
					contador = 30;
				}else if(result.estado == 1){
					estado = "Terminado";
					contador = 50;
				}else{
					estado = "Entregado a cliente";
					contador = 100;
				}*/
				
				//VALIDAR IMAGES
				if(result.img_posicion){
						img_1 =`<img src="templates/automovil/${result.img_posicion}"  width="250px"/>`;
				}else{
						img_1 =`<span class="text-danger">Sin imagen</span>`;
				}
				
				if(result.grafica_1){
					img_2 =`<img src="${result.grafica_1}"  width="250px"/>`;
				}else{
					img_2 =`<span class="text-danger">Sin imagen</span>`;
				}
				
				if(result.grafica_2){
					img_3 =`<img src="${result.grafica_2}"  width="250px"/>`;
				}else{
					img_3 =`<span class="text-danger">Sin imagen</span>`;
				}
        
        if(result.n_increment == null){
          mas_nombre = "";
        }else{
          mas_nombre = result.n_increment;
        }
				
              template +=
                `
                <div id="accordion">
                <div class="card">
                  <div class="card-header" >
                      <a  data-toggle="collapse" data-target="#collapseOne${contador_acordeon}"  aria-controls="collapseOne">
                           <h5><strong>Nombre Informe:</strong> ${result.nombre}
                         </a> 
                                <select id="change_temp_automoviles" data-id="${result.id_informe}">
                                    <option value = "${mas_nombre}">${mas_nombre}</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
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
                            </h5>
                              <h5><strong> &nbsp;&nbsp;Mapeo:</strong> ${result.nombre_mapeo} </h5>
                           

                  <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm nav btn-group">
                    ${aprobacion_leyenda} &nbsp;&nbsp;  ${aprobacion_estado} 
                    </div>
                  </div>	

                  </div>
                  <div data-parent="#accordion" id="collapseOne${contador_acordeon}" aria-labelledby="headingOne" class="collapse">  
                  <div class="card-body" id="cuerpo_informe">

                    <form id="form_2_automovil" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id_informe" value="${result.id_informe}">
                    <div class="row">
                      <div class="col-sm-6">
                        <label>Observacion:</label>
                        <textarea class="form-control" name="observacion"  id="observacion"  value="${result.observacion}">${result.observacion}</textarea>
                      </div>
                      <div class="col-sm-6">
                        <label>Comentarios:</label>
                        <textarea class="form-control" name="comentarios"  id="comentarios" value="${result.comentarios}">${result.comentarios}</textarea>
                      </div>
                    </div>

                    <br>

                    <div class="row">
                      <div class="col-sm-12" style="text-align:center;">
                        <button  type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info"  data-id = "${result.id_informe}" 		id="cargar_imagen_1">Actualizar</button>
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

                    <div class="row">
                      <div class="col-sm-6" style="text-align:center;">
                        <a  class="btn btn-primary text-white" id="Generar_datos_crudos_automovil" data-id = "${result.id_informe}"  	type="${result.tipo_informe}">Validación datos crudos</a>
                      </div>
                      <div class="col-sm-6" style="text-align:center;">
                        <a  class="btn btn-primary text-white" id="Generar_datos_crudos_automovil_2" data-id = "${result.id_informe}"  	type="${result.tipo_informe}">Datos crudos</a>
                      </div>
                    </div>

                    <br>

                    <form id="form_1_automovil" enctype="multipart/form-data" method="post">
                      <input type="hidden" name="tipo_image_2" value="${result.tipo_informe}">
                      <input type="hidden" name="id_informe" value="${result.id_informe}">
                      <div class="row">
                        <div class="col-sm-4" style="text-align:center;">
                          <label>Posición Sensores</label>
        
                          <br>
                          <input type="file" name="imagen_1" id="image_1" class="form-control">
                        </div>

                        <div class="col-sm-4" style="text-align:center;">
                          <label>Imagen Grafica Valores Promedio, Mínimo, Maximo </label>
                          <a class="btn btn-success" data-id="${result.id_mapeo}" id="grafico_2_automovil" style="width:100%;">Grafico CERNET</a>
                          <input type="file" name="imagen_2" class="form-control">
                        </div>

                        <div class="col-sm-4">
                            <label>Datos de todos los sensores en periodo representativo </label><br>
                            <a class="btn btn-success" data-id="${result.id_mapeo}" id="grafico_1_automovil" style="width:100%;">Grafico CERNET</a>
                            <input type="file" name="imagen_3" class="form-control">
                        </div>
                      </div>

                      <br>

                      <div class="row">
                        <div class="col-sm-4" style="text-align:center;">
                          <a data-toggle="tab" class="btn-shadow  btn btn-danger text-white" style="width:30px;" id="eliminar_imagen_automovil" data-nombre="${result.img_posicion}" 
                            data-id="${result.id_imagen1}">X</a>
                          <br>
                          ${img_1}
                        </div>
                        <div class="col-sm-4" style="text-align:center;">
                          <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen_automovil" data-nombre = "${result.grafica_1}" data-id="${result.id_imagen2}">X</a>
                          <br>
                          ${img_2}
                        </div>
                        <div class="col-sm-4" style="text-align:center;">
                          <a data-toggle="tab" class="btn-shadow active btn btn-danger" id="eliminar_imagen_automovil" data-nombre = "${result.grafica_2}"	data-id="${result.id_imagen3}">X</a>
                          <br>
                          ${img_3}
                        </div>
                      </div>

                      <br>

                      <div class="row">
                        <div class="col-sm-12" style="text-align:center">
                          <button  type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info"  data-id = "${result.id_informe}" id="cargar_imagen_1">Cargar imagenes</button>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12" style="text-align:center">
                          <a class='btn btn-ligth'  data-id = "${result.id_informe}" id="pdf_automovil" data-nombre="${result.tipo_informe}"><img src="design/images/pdf.png" width="50px"/></a>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12" style="text-align:right">
                          <a class='btn btn-ligth'  data-id = "${result.id_informe}" data-nombre="${result.nombre}" id="eliminar_informe_automovil">
                            <span class="text-danger"><h4>Eliminar informe</h4></span></a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                </div>
                </div>
                <br><br>`;

              contador_acordeon = contador_acordeon +1;
            });
			$("#traer_informes_automovil").html(template);			
		}	
	});
}


$(document).on('submit','#form_2_automovil',function(e){
            e.preventDefault();
    
  $.ajax({
    url: 'templates/automovil/actualizar_informe_parte_1.php',
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
          listar_informes_automovil();
        }else{
          alert("Algo salio mal, contacta con el administrador"+response);
        }

    } 
  });   
  });   




$(document).on("click","#eliminar_informe_automovil",function(){  
   

   let id = $(this).attr('data-id');
  
  Swal.fire({
    title:'Mensaje',
    text:'Seguro ¿deseas eliminar este informe?',
    icon:'question',
    showCancelButton: true,
    confirmButtonText: `Eliminar!`
  }).then((x)=>{
    if(x.value){
     $.ajax({
       type:'POST',
       url:'templates/automovil/eliminar_informe.php',
       data:{id},
       success:function(response){
         if(response == "Si"){
           
           Swal.fire({
             title:'Mensaje',
             text:'El infome ha sido eliminado correctamente',
             icon:'success',
             timer:1500
           });
           listar_pruebas_automovil("L");
         }else if(response == "NO"){
           Swal.fire({
             title:'Mensaje',
             text:'El informe NO ha sido eliminado.',
             icon:'error',
             timer:2000
           });
         }
       }
     }) 
    }
  });


});


$(document).on("click","#grafico_1_automovil",function(){  
   let id = $(this).attr('data-id'); 
  window.open('https://cercal.net/Pruebas_Desarrollo/API_GRAFICOS_TODOS.php?id_mapeo='+id);
  setTimeout(listar_informes_automovil,10000);
});

$(document).on("click","#grafico_2_automovil", function(){
  let id = $(this).attr('data-id'); 
  window.open('https://cercal.net/Pruebas_Desarrollo/API_GRAFICOS_PROMEDIOS.php?id_mapeo='+id);
  setTimeout(listar_informes_automovil,10000);
});


//////////////// BORRAR LAS IMAGENES

$(document).on('click','#eliminar_imagen_automovil',function(){
  
  let id_informe = $(this).attr('data-id');

});


//////////////// EVENTO PARA CAMBIAR DE TEMP
$(document).on('change','#change_temp_automoviles',function(){
  
  let nuevo_temp = $(this).val();
  let id_informe = $(this).attr('data-id');
  
  const datos = {
    
    nuevo_temp,
    id_informe
    
  }
  
  $.ajax({
    
    type:'POST',
    url:'templates/automovil/actualizar_temp.php',
    data:datos,
    success:function(response){
      
      if(response == 1){
        
        Swal.fire({
          title:'Mensaje',
          text:'Se ha configurando correctamente',
          icon:'success',
          timer:1500
        });
        listar_informes_automovil();        
      }
    }
  });
  
});




