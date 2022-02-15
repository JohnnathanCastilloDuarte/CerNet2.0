//////OCULTO COSAS
$("#ocultar_2").hide();
$("#ocultar_3").hide();
//$("#traer_imagen").hide();
$("#informacion_de_mas").hide();
$("#listar_subidas").hide();

$(".subir1").hide();
$(".subir").hide();
$("#pdf_grande").hide();
$("#gif_loading").hide();



////VARIABLES CONSTANTES
var id_valida_usuario = $("#id_valida").val();
var id_documentacion = $("#id_documentacion").val();
var id_documentacion_d = $("#id_documentacion_d").val()

saber_que_ver();
listar_firmantes_ok();
listar_firmantes_no();
listar_config_documentacion();
listar_pdf_grande();

//////// LISTAR EMPRESAS 

$("#buscador_empresa").keydown(function(){
	
	let buscar = $(this).val();
  console.log(buscar);
	
	$.ajax({
		type:'POST',
		data:{buscar},
		url:'templates/controlador_buscador_empresa.php',
		success:function(response){
      console.log(response);
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

	$("#buscador_empresa").val(nombre_empresa);
  $("#id_empresa").val(id_empresa);
  $("#ubicacion_filtro").val(direccion);

	$("#aqui_resultados_empresa").hide();

    let id_numot = "";
     $.ajax({
       type:'POST',
       url:'templates/documentacion/traer_ot.php',
       data:{id_empresa, id_valida_usuario},
       success:function(response){
         let traer = JSON.parse(response);
         let template = "";
      
         traer.forEach((x)=>{
           
           id_numot = x.id_numot
           if(x.rol != 3){
             template += 
           `
            <tr>
              <td>${x.numot}</td>
              <td>${x.fecha_registro}</td>
              <td><button class="btn btn-success" data-id="${x.id_numot}"  data-f="${id_empresa}" id="agregar_documentacion">+</button></td>
            </tr>
            `;
           }else{
           template += 
           `
            <tr>
              <td>${x.numot}</td>
              <td>${x.fecha_registro}</td>
            </tr>
            `;
             }
          
          
         });
         
         $("#traer_ot_documentacion").html(template);
         listar_documentacion_activo(id_empresa);  
       }
       
       
     });
  
});

//////BOTON DEL DOCUMENTACIÓN 
$(document).on('click','#agregar_documentacion',function(){
  
  let id_numot = $(this).attr('data-id');
  let id_empresa = $(this).attr('data-f');
  
 

  Swal.fire({
    title:'Advertencia',
    icon:'question',
    text:'Seguro, ¿Deseas documentar está OT?',
    showConfirmButton:true,
    confirmButtonText:'Si!',
    showCancelButton:true,
    cancelButtonText:'No!'
  }).then((result)=>{
    
    if(result.value){


        Swal.fire({
          title: 'SELECCIONE EL DEPARTAMENTO',
          icon:'question',
          input: 'select',
          inputOptions: {
              //CSV: 'CSV',
              //SPOT: 'SPOT',
              //GEP: 'GEP',
              Otro: 'Otro'        
          },
          inputPlaceholder: 'Seleccione el departamento',
          showCancelButton: true,
        }).then((result)=>{
        
          if(result.value){
            let departmento = result.value;

            const datos = {
              id_numot,
              id_valida_usuario,
              departmento 
            } 

            $.ajax({
              type:'POST',
              url:'templates/documentacion/asignar_servicio_documentacion.php',
              data:datos,
              success:function(response){
                         
                if(response == "Si"){
                  Swal.fire({
                    title:'Mensaje',
                    text:'Se ha creado, correctamente el servicio',
                    timer:1700,
                    icon:'success'
                  });
                  
                  listar_documentacion_activo(id_empresa); 
                }


              }
            });

          }

        });
    
    }

  });
});

//////////LISTAR DOCUMENTACIÓN ACTIVOS
function listar_documentacion_activo(id_empresa){
  const datos = {
    id_empresa,
    id_valida_usuario
  }
  $.ajax({
    type:"POST",
    data:datos,
    url:'templates/documentacion/listar_asignados_documentacion.php',
    success:function(response){
      let traer = JSON.parse(response)
      let template = ""
      let estado = ""
      
      traer.forEach((x)=>{
        estado = "";
       
        if(x.estado == 1){
         estado += `
              <select id="pasos_documentacion" data-id="${x.id_documentacion}" class="form-control">
                  <option value="0">Seleccione...</option>
                  <option value="2">Participantes</option>
                  <option value="3">Documentación</option>
                </select>
          `;
        }else if(x.estado == 0 && x.estructura == 1){
          estado += `
                 <input type="text" class="form-control" placeholder="Ingresa aqui la URL de Drive" id="url_inspector"><br>
                 <button id="guarda_link_inspector" data-id="${x.id_documentacion}" class="btn btn-success">Guardar link</button>
           `;
         }else{
          estado += `
              <select id="pasos_documentacion" data-id="${x.id_documentacion}" class="form-control">
                  <option value="0">Seleccione...</option>
                  <option value="2">Participantes</option>
                  <option value="3">Documentación</option>
                </select>
          `;
        }
        
        template +=
          `
           <tr>
            <td>${x.id_documentacion}</td>
            <td>${x.ot}</td>
            <td>${x.fecha_creacion}</td>
            <td>${estado}</td>
           </tr> 
          `;
      });
      
      $("#despues_documentacion").html(template)
    }
  });
}


//////////////////// GUARDA EL LINK DEL INSPECTOR
$(document).on('click','#guarda_link_inspector',function(){

    let url = $('#url_inspector').val();
    let id_documentacion = $(this).attr('data-id');

    const datos = {
      url,
      id_documentacion
    }

    $.ajax({
      type:'POST',
      data:datos,
      url:'templates/documentacion/guarda_link.php',
      success:function(response){
        if(response == "Listo"){
          Swal.fire({
            title:'Mensaje',
            text:'Se ha configurado la URL correctamente',
            icon:'success',
            timer:1700
          });
          listar_documentacion_activo(id_empresa);
        }
        
      }
    })
});


///////// CONTROLA EL SELECT DE PASOS DE DOCUMENTACION
$(document).on('change','#pasos_documentacion',function(){
  let eleccion = $(this).val();
  let clave_valor = $(this).attr('data-id');
  let option = "";
  let link = "";
  
  if(eleccion == 0){
    Swal.fire({
      title:'Advertencia',
      text:'Debes seleccionar una opcion',
      icon:'warning',
      timer:1700
    });
  }else{
    
  if(eleccion == 2){
    option = "para añadir participantes";
    link = 'index.php?clave='+clave_valor+'&parameter='+eleccion;
  }
  else if(eleccion == 3){
    option = "para subir documentación";
    link = 'index.php?clave='+clave_valor+'&parameter='+eleccion;
  }  
   Swal.fire({
    title:'Mensaje',
    text:'Deseas realizar la configuracion '+ option,
    icon:'question',
    showConfirmButton:true,
    confirmButtonText:'Si!',
    showCancelButton:true,
    cancelButtonText:'No!'
    }).then((x)=>{
      if(x.value){
        window.open(link);
      }
    });
    }  
}); 
  

//////////////////////////////////////////////////////////////////////////////////FUNCIONES QUE CONTROLAN EL ARCHIVO AÑADIR_PARTICIPANTES.PHP////////////////////////////////////////////////////////


$("#actualizar_persona_documentacion").hide();
$("#volver_nuevo_participante").hide();


//listar_empresa_participantes();
listar_cercal_participantes();

///////////////////// EVENTO PARA LISTAR LOS USUARIOS ///////////
$("#empresa_participante_documentacion").change(function(){
  
    let id_empresa = $(this).val();
    let selector = 1;
  
    const datos = {
      id_empresa,
      selector
    }
  
    $.ajax({
      type:'POST',
      data: datos,
      url:'templates/documentacion/listar_particiante_x_empresa.php',
      success:function(response){
        
        let traer = JSON.parse(response);
        let template = "";
        let template_2 = "";
        if(response.length != 0){
         
          
        }
        template_2 = "<option value='0'>Generar usuario</option>";
        
        traer.forEach((x)=>
          {

          template +=
            `
              <option value="${x.id_usuario}">${x.usuario}</option> 
            `;
          });
        $("#listar_usuarios_cernet").html(template_2 + template)
      }
    });
  
});


$("#listar_usuarios_cernet").change(function(){
  
  let id_usuario = $(this).val();
  $("#id_usuario_documentacion_hide").val(id_usuario);
  let selector = 2;

  if(id_usuario != 0){
  
    const datos = {
      id_usuario,
      selector
    }
     $.ajax({
        type:'POST',
        data: datos,
        url:'templates/documentacion/listar_particiante_x_empresa.php',
        success:function(response){
          
          let traer = JSON.parse(response);
          let template = ""

          traer.forEach((x)=>{
           $("#ocultar_si_email").hide();
           $("#id_persona_documentacion_oculto").val(x.id_persona); 
           $("#nombres_participante_documentacion").val(x.nombre);
           $("#apellidos_partipante_documentacion").val(x.apellido);
           $("#email_participante_documentacion").val(x.email);
           $("#cargo_participante_documentacion").val(x.cargo);
           $("#departamento_participante_documentacion").val(x.departamento);
          });
        }
     }); 
  }else{
     $("#ocultar_si_email").show();     
     $("#id_usuario_documentacion_hide").val(0);
     $("#nombres_participante_documentacion").val('');
     $("#apellidos_partipante_documentacion").val('');
     $("#email_participante_documentacion").val('');
     $("#cargo_participante_documentacion").val('');
  } 

});


/*
/// LISTAR PARTICIPANTES EMPRESA
function listar_empresa_participantes(){
  let seleccion = 1;
  $.ajax({
    type:'POST',
    url:'templates/documentacion/listar_participantes.php',
    data:{id_documentacion,seleccion},
    success:function(response){
 
      let traer = JSON.parse(response);
      let template = "";
      let rol = "";
      
      traer.forEach((x)=>{
        if(x.rol == 1){
          rol = "Documentador";
        }else if(x.rol == 2){
          rol = "Auditor";
        }else{
          rol = "Aprobador";
        }
        
        template +=
          `
           <tr>
              <td>${x.nombres} ${x.apellidos}</td>
              <td>${x.email}</td>
              <td>${rol}</td>
              <td>${x.empresa}</td>
              <td><button class="btn btn-warning" id="modificar_participante_externo" data-id="${x.id_participante}" ><i class="pe-7s-check"></i></button></td>
              <td><button class="btn btn-danger" id="eliminar_participante_externo" data-id="${x.id_participante}" >X</button></td>
              <td><button class="btn btn-primary" id="email_participante_externo" data-id="${x.id_participante}" ><i class="pe-7s-mail"></i></button></td> 
           </tr>
          `;
      });
     $("#listo_participantes_2").html(template) 
    }
  });
}*/

/// LISTAR PARTICIPANTES CERCAL
function listar_cercal_participantes(){
let seleccion = 2;
  $.ajax({
    type:'POST',
    url:'templates/documentacion/listar_participantes.php',
    data:{id_documentacion,seleccion},
    success:function(response){
     
      let traer = JSON.parse(response);
      let template = "";
      let rol = "";
      
      traer.forEach((x)=>{
        if(x.rol == 1){
          rol = "Elaborador";
        }else if(x.rol == 2){
          rol = "Revisador";
        }else{
          rol = "Aprobador";
        }
        
        template +=
          `
           <tr>
              <td>${x.nombres} ${x.apellidos}</td>
              <td>${x.email}</td>
              <td>${rol}</td>
              <td>${x.empresa}</td>
              <td>
                <select class="form-control" id="orden_firma" data-id="${x.id_participante}">
                  <option value="${x.orden_firma}">${x.orden_firma}</option>
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
                </select>
              </td>
              <td><button class="btn btn-danger" id="eliminar_participante_interno" data-id="${x.id_participante}" data-document = "${id_documentacion}" title="Eliminar">X</button></td>
              <td><button class="btn btn-primary" id="email_participante_interno" data-id="${x.id_participante}" title="Notificar via Email"><i class="pe-7s-mail"></i></button></td>
           </tr>
          `;
      });
     $("#listo_participantes_1").html(template) 
    }
  });  
}


//////////// FUNCIÓN PARA CAMBIAR DE POSICIÓN DE FIRMA
$(document).on('change','#orden_firma',function(){

    let id_participante = $(this).attr('data-id');
    let valor = $(this).val();


    const datos = {
      id_participante,
      valor
    }

    $.ajax({
      type:'POST',
      data:datos,
      url:'templates/documentacion/change_posicion.php',
      success:function(response){
        if(response == "Listo"){
          Swal.fire({
            title:'Mensaje',
            text:'Se ha cambiado el orden correctamente',
            icon:'success',
            timer:1700
          });
        }
        listar_cercal_participantes();
      }
    })

});







//FUNCION PARA SETEAR CAMPOS
function limpiando_creacion(){
  
 $("#nombres_participante_documentacion").val('')
 $("#apellidos_partipante_documentacion").val('')
 $("#rol_participante_documentacion").val('')
 $("#empresa_participante_documentacion").val('')
 $("#email_participante_documentacion").val('')
 $("#email_participante_documentacion_re").val('')
  $("#cargo_participante_documentacion").val('');
}


////CREAR PARTICIPANTES
$("#guardar_persona_documentacion").click(function(){

let nombres = $("#nombres_participante_documentacion").val();
let apellidos = $("#apellidos_partipante_documentacion").val();
let rol = $("#rol_participante_documentacion").val();
let empresa = $("#empresa_participante_documentacion").val();
let email = $("#email_participante_documentacion").val();
let email_re = $("#email_participante_documentacion_re").val();
let id_persona_oculto = $("#id_persona_documentacion_oculto").val();
let cargo = $("#cargo_participante_documentacion").val();
let departamento = $("#departamento_participante_documentacion").val();
let datos = "";
let seleccion = "";
let validar = 0;
  
  
if(id_persona_oculto.length == 0){
  seleccion = 1;
   datos = {
    nombres,
    apellidos,
    rol,
    empresa,
    email,
    cargo,
    id_valida_usuario,
    id_documentacion,
    seleccion,
    departamento
  }
    if(email != email_re){
   
    validar = 1;  
  }else{
    validar = 2;  
  }
  
}else{
  seleccion = 2;
  validar = 2; 
  datos = {
    rol,
    empresa,
    email,
    id_valida_usuario,
    id_documentacion,
    id_persona_oculto,
    seleccion,
    departamento
  }
}
  

if(validar == 2){
  $.ajax({
    type:'POST',
    url:'templates/documentacion/crear_participante.php',
    data: datos,
    success:function(response){
     console.log(response);
      if(response == "Creado"){
        Swal.fire({
          title:'Mensaje',
          text:'El participante ha sido creado con exito',
          icon:'success',
          timer:1800
        });
      }
       
      limpiando_creacion()
      listar_cercal_participantes()
    }
  });
}else{
   Swal.fire({
      title:'Advertencia',
      text:'Los correos no coinciden, para poder continuar debes corregirlos',
      icon:'warning',
      timer:1800
    });
}
});


//// EVENTOS DE LOS BOTONES DE LISTAR PARTICIPANTES EXTERNOS

$(document).on('click','#modificar_participante_externo',function(){
  let id_participante = $(this).attr('data-id');
  
  
  
  $("#actualizar_persona_documentacion").show();
  $("#guardar_persona_documentacion").hide();
  $("#volver_nuevo_participante").show();
  
  $.ajax({
    type:'POST',
    url:'templates/documentacion/traer_modificar_participantes.php',
    data:{id_participante},
    success:function(response){
      
      let traer = JSON.parse(response)
      
      $("#nombres_participante_documentacion").val(traer.nombres);
      $("#apellidos_partipante_documentacion").val(traer.apellidos);
      $("#email_participante_documentacion").val(traer.email);
      $("#email_participante_documentacion_re").val(traer.email);
      $("#id_persona_documentacion_oculto").val(traer.id_persona);
      $("#cargo_participante_documentacion").val(traer.cargo); 
      
      
    }
  });
});

//BOTON QUE CONTROLA EL VOLVER A LA CREACIÓN
$("#volver_nuevo_participante").click(function(){
  
$("#actualizar_persona_documentacion").hide();
$("#guardar_persona_documentacion").show();
$("#volver_nuevo_participante").hide();
limpiando_creacion();  
});

//ACTUALIZE PARTICIPANTE EXTERNO
$("#actualizar_persona_documentacion").click(function(){
  
let nombres = $("#nombres_participante_documentacion").val();
let apellidos = $("#apellidos_partipante_documentacion").val();
let rol = $("#rol_participante_documentacion").val();
let empresa = $("#empresa_participante_documentacion").val();
let email = $("#email_participante_documentacion").val();
let email_re = $("#email_participante_documentacion_re").val();
let cargo =  $("#cargo_participante_documentacion").val();
let id_participante = $("#id_persona_documentacion_oculto").val(); 
  
const datos = {
  nombres,
  apellidos,
  rol,
  empresa,
  email,
  id_participante,
  id_documentacion,
  cargo
}

  $.ajax({
    type:'POST',
    url:'templates/documentacion/actualiza_personal.php',
    data:datos,
    success:function(response){
     
      limpiando_creacion();
      listar_empresa_participantes();
      listar_cercal_participantes();
        Swal.fire({
          title:'Mensaje',
          text:'El participante se actualizado, correctamente',
          icon:'success',
          timer:1800
        });
      
    }
  });
  
});

///////ELIMINAR PARTICIPANTE EXTERNO
$(document).on('click','#eliminar_participante_externo',function(){
  let id_participante = $(this).attr('data-id');
  const datos = {
    id_documentacion,
    id_participante
  }
  
  $("#id_persona_documentacion_oculto").val(''); 
  Swal.fire({
    title:'Advertencia',
    icon:'question',
    text:'¿Seguro, deseas eliminar el participante?',
    showCloseButton: true,
    showCancelButton: true,
    confirmButtonText:'Si',
    cancelButtonText:'No'
  }).then((x)=>{
    if(x.value){
      $.ajax({
        type:'POST',
        url:'templates/documentacion/eliminar_participante.php',
        data:datos,
        success:function(response){
       
          Swal.fire({
            title:'Mensaje',
            text:'El participante se ha eliminado, correctamente',
            icon:'success',
            timer:1800
          });
      
          listar_empresa_participantes();
          listar_cercal_participantes();
        }
      })
    }
  });
});

//////// ENVIAR EMAIL DE AVISO AL PARTICIPANTE (PENDIENTE REVISAR FUNCIONALIDAD)
$(document).on('click','#email_participante_externo',function(){
  let id_participante = $(this).attr('data-id'); 

  $.ajax({
    type:'POST',
    url:'templates/documentacion/validar_correo.php',
    data:{id_participante},
    success:function(email){
      const datos = {
        id_participante,
        email
      }
      
      Swal.fire({
        title:'Mensaje',
        text:'Se enviara la invitación a colaborar al correo '+email,
        icon:'success',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText:'Enviar!',
        cancelButtonText:'Cancelar'
      }).then((x)=>{
        if(x.value){
          $.ajax({
            type:'POST',
            url:'templates/documentacion/enviar_correo.php',
            data:datos,
            success:function(x){
              console.log(x);
            }
          });
        }
      });
    }
  });
});






///////ELIMINAR PARTICIPANTE EXTERNO
$(document).on('click','#eliminar_participante_interno',function(){
  let id_participante = $(this).attr('data-id');
  let id_documentacion = $(this).attr('data-document');
  $("#id_persona_documentacion_oculto").val(''); 
  
  Swal.fire({
    title:'Advertencia',
    icon:'question',
    text:'¿Seguro, deseas eliminar el participante?',
    showCloseButton: true,
    showCancelButton: true,
    confirmButtonText:'Si',
    cancelButtonText:'No'
  }).then((x)=>{
    if(x.value){
      $.ajax({
        type:'POST',
        url:'templates/documentacion/eliminar_participante.php',
        data:{id_participante, id_documentacion},
        success:function(response){
         
          Swal.fire({
            title:'Mensaje',
            text:'El participante se ha eliminado, correctamente',
            icon:'success',
            timer:1800
          });
      
          //listar_empresa_participantes();
          listar_cercal_participantes();
        }
      })
    }
  });
});

//////// ENVIAR EMAIL DE AVISO AL PARTICIPANTE (PENDIENTE REVISAR FUNCIONALIDAD)
$(document).on('click','#email_participante_interno',function(){
  let id_participante = $(this).attr('data-id'); 
  let movimiento = "Notificar";
  $.ajax({
    type:'POST',
    url:'templates/documentacion/validar_correo.php',
    data:{id_participante},
    success:function(email){
      console.log(email);
      Swal.fire({
        title:'Mensaje',
        text:'Se enviara la invitación a colaborar al correo '+email,
        icon:'success',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText:'Enviar!',
        cancelButtonText:'Cancelar'
      }).then((x)=>{
        if(x.value){
          const datos = {
            email,
            id_participante,
            movimiento
          }
          $.ajax({
            type:'POST',
            url:'templates/documentacion/enviar_correo.php',
            data:datos,
            success:function(x){
              console.log(x);
                          }
          });
        }
      });
    }
  });
});


////////////////////////////////////////// EVENTOS PARA MANIPULAR LA IMAGEN////////////////////////

function listar_documentacion_arriba(){
  let id_documentacion = $("#id_documentacion_d").val();
  
  $.ajax({
    type:'POST',
    url:'templates/documentacion/listar_archivos_arriba.php',
    data:{id_documentacion},
    success:function(res){
     
      let traer = JSON.parse(res);
      let template = "";
      let estado = "";
      let firma = "";
      let view = "";
      let template2 = "";
      let contador = 1;
      let firma2 = "";
      let tpo = "";
      
      traer.forEach((x)=>{
       
        if(x.estado == 0){
          estado = "<img src='templates/documentacion/recursos/002-dislike.png' class='btn btn-danger'>";
        }else{
          estado = "<img src='templates/documentacion/recursos/001-like.png' class='btn btn-success'>";
        }
        
     
        template += 
            `
            <tr>
              <td>${estado}</td>
              <td>${x.nombre}</td>
              <td><img src='templates/documentacion/recursos/001-view.png' class='btn btn-primary' id='ver' data-id='${x.url}' data-mas='${x.id}' data-algo = '${x.tipo}'></td>
              <td>${x.pagina}</td>
            </tr>
        
          `;
        
      template2 += 
             `
            <tr>
              <td>${contador}</td>
              <td>${x.fecha_registro}</td>
              <td>${x.nombre}</td>
              <td><span class="text-primary">PAG-${x.pagina}</span><br>
                <select id="pagina_change" data-id="${x.id}">
                    <option value="0">Seleccione...</option>
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
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                    <option value="45">45</option>
                    <option value="46">46</option>
                    <option value="47">47</option>
                    <option value="48">48</option>
                    <option value="49">49</option>
                    <option value="50">50</option>    
                </select>
              </td>        
              <td><button class="btn btn-danger" id="eliminar_documento" data-id="${x.id}" title="Eliminar">X</button></td>
            </tr>
              `;
        contador = contador+1;
      });
      
      $("#traer_documentos").html(template);
      $("#traer_gestor_archivos").html(template2);
    }
  });
}

///////////////////// CAMBIAR PAGINA
$(document).on('change','#pagina_change', function(){
   let valor = $(this).val();
   let id = $(this).attr('data-id');
   const datos = {
     valor,
     id
   }  
  if(valor.length > 0){
     
     $.ajax({
       type:'POST',
       url:'templates/documentacion/update_page.php',
       data: datos,
       success:function(x){
         Swal.fire({
           title:'Mensaje',
           text:'Se ha actualizado, la pagina',
           icon:'success',
           timer:1500
         });
         listar_documentacion_arriba();
       }
     });
     
   }
});




$("#download-image").on('click', function() {
  
  var canvas = document.getElementById('pdf-canvas');
	var dataURL = canvas.toDataURL();
	let id_documentacion_d = $("#id_documentacion_d").val();
  
  const datos = {
    dataURL,
    id_documentacion_d
  }
  
  $.ajax({
  type:'POST',
  url:'templates/documentacion/carga_archivo.php',
  data:datos,
  success:function(x){
    
    if(x == "1"){
      Swal.fire({
        title:'Mensaje',
        text:'Se ha adjuntado un nuevo archivo',
        icon:'success',
        timer:1500
      });
      listar_documentacion_arriba();
    }else{
      Swal.fire({
        title:'Mensaje',
        text:'El archivo ya existe, intenta cargar otro',
        icon:'warning',
        timer:1900
      });
    }
  }
  
});

  /*
  var app = ( function () {
    var canvas = document.getElementById( 'traer_imagen' ),
        context = canvas.getContext( '2d' ),
 
        // API
        public = { };
 
       public.loadPicture = function () {
          var imageObj = new Image();
          imageObj.src = dataURL ;

          imageObj.onload = function () {
              context.drawImage( imageObj, 0, 0 );
          }
      };

     return public;
} () );
  app.loadPicture();
    */
});




////////PRUEBA

$("#subir_img").click(function(){
  

let nombre_imagen_pdf = $("#nombre_imagen_pdf").val();
let documento_firma = $("#documento_firma").val();
let traer_base_64 = $("#traer_base_64").val();
  
const datos = {
  id_documentacion_d,
  nombre_imagen_pdf,
  documento_firma,
  traer_base_64
} 

$.ajax({
  type:'POST',
  url:'templates/documentacion/carga_archivo.php',
  data:datos,
  success:function(x){

    if(x == "01"){
      Swal.fire({
        title:'Mensaje',
        text:'Se ha adjuntado un nuevo archivo',
        icon:'success',
        timer:1500
      });
      $("#informacion_de_mas").hide();
      listar_documentacion_arriba();
      $("#nombre_imagen_pdf").val('');
      $("#documento_firma").val('');
      $("#traer_base_64").val('');
    }else{
      Swal.fire({
        title:'Mensaje',
        text:'El archivo ya existe, intenta cargar otro',
        icon:'warning',
        timer:1900
      });
    }
  }
  
});
});

listar_documentacion_arriba();
/// LISTAR DOCUMENTACIÓN CREADA 


//////////////////////////BORRAR DOCUMENTO
$(document).on('click','#eliminar_documento',function(){
  let id = $(this).attr('data-id');
  
  Swal.fire({
    title:'Advertencia',
    text:'Seguro, ¿Deseas eliminar el archivo?',
    icon:'question',
    showCloseButton: true,
    showCancelButton: true,
    confirmButtonText:'Si',
    cancelButtonText:'No'
  }).then((x)=>{
    if(x.value){
       $.ajax({
        type:'POST',
        url:'templates/documentacion/eliminar_documento.php',
        data:{id},
        success:function(response){
 
          if(response == "Si"){
            Swal.fire({
              title:'Mensaje',
              text:'El archivo ha sido eliminado, correctamente',
              icon:'success',
              timer:1800
            });
            listar_documentacion_arriba();
          }
        }
      });
    }
  });  
});

///////// ENVIAR INFORME 1
$("#correo_informe_1").click(function(){
  let seleccion = 1;
  const datos = {
    seleccion,
    id_documentacion
  }
  $.ajax({
    type:'POST',
    data:datos,
    url:'templates/documentacion/enviar_informe.php',
    success:function(response){
    
      Swal.fire({
        title:'Mensaje',
        text:'Se ha enviado el informe de personas que ya firmaron a los auditores',
        icon:'success',
        timer: 1500
      });
    }
  });
});

///////// ENVIAR INFORME 2
$("#correo_informe_2").click(function(){
  let seleccion = 2;
  const datos = {
    seleccion,
    id_documentacion
  }
  $.ajax({
    type:'POST',
    data:datos,
    url:'templates/documentacion/enviar_informe.php',
    success:function(response){
     
      Swal.fire({
        title:'Mensaje',
        text:'Se ha enviado el informe de personas que faltan por firmar a los auditores',
        icon:'success',
        timer: 1500
      });
    }
  });
});

///////// ENVIAR INFORME 3
$("#correo_informe_3").click(function(){
  let seleccion = 3;
  const datos = {
    seleccion,
    id_documentacion
  }
  $.ajax({
    type:'POST',
    data:datos,
    url:'templates/documentacion/enviar_informe.php',
    success:function(response){
      
      Swal.fire({
        title:'Mensaje',
        text:'Se ha enviado un recordatorio a los colaboradores que faltan por firmar',
        icon:'success',
        timer:2000
      });
    }
  });
});




//////////// PRIVILEGIOS DE QUE PUEDE VER LOS USUARIOS
function saber_que_ver(){

  $.ajax({
    type:'POST',
    url:'templates/documentacion/que_ver.php',
    data:{id_valida_usuario},
    success:function(response){
     
      if(response == "No"){
        $("#subir").hide();
        
        $("#agregar_documentacion").hide();
      }
    }
  });
}



//// AQUI EMPIEZA LA FIRMAAQAAAAAAA
$(document).on("click","#ver",function(){
  $("#ocultar_3").hide();
  $("#ocultar_2").show();
  $("#ocultar_1").hide();
  let url = $(this).attr('data-id');
  let id = $(this).attr('data-mas');
  let tipo = $(this).attr('data-algo');
   let imagen_lograda = "";
  if(tipo == 1){
    imagen_lograda = `<img src="${url}" width="100%" heigth="100%">`;
    var app = ( function () {
    var canvas = document.getElementById( 'imagen_aqui' ),
    context = canvas.getContext( '2d' ),

    // API
    public = { };

    public.loadPicture = function () {
    var imageObj = new Image();
    imageObj.src = url ;

    imageObj.onload = function () {
    context.drawImage( imageObj, 0, 0 );
    }
    };

    return public;
    } () );
    app.loadPicture()
    $("#imagen_pdf_completo").hide();
  }else{
    $("#imagen_aqui").hide()
    imagen_lograda = `<iframe src="${url}" style="width:100%;height:700px"></iframe>`;
    $("#imagen_pdf_completo").html(imagen_lograda);
  }
  
   
  
  
 // $("#imagen_aqui").html(imagen_lograda);
  
});

/*
  var limpiar = document.getElementById("limpiar");
  var canvas = document.getElementById("algo");
	var ctx = canvas.getContext("2d");
	ctx.strokeStyle = "#222222";
	ctx.lineWith = 2;


$(document).on('click','#firmar',function(){
  
  $("#ocultar_3").show();
  $("#ocultar_2").hide();
  $("#ocultar_1").hide();
  let id = $(this).attr('data-id');
  $("#id_oculto_documento").val(id);
  let url = $(this).attr('data-url');
  $("#id_oculto_oculto").val(id);
  $("#url_oculta").val(url);
  
  const img = new Image();
  img.src = url;  
  img.onload = function () {
   canvas.width = img.naturalWidth;
   canvas.height = img.naturalHeight;
   ctx.drawImage(img, 0, 0);
  };
  
  traer_firmantes();

});


$(document).on('click','#limpiar',function(){
  
  let id = $("#id_oculto_oculto").val();
  $("#id_oculto_documento").val(id);
  let url = $("#url_oculta").val();
  const img = new Image();
  img.src = url;  
  img.onload = function () {
   ctx.drawImage(img, 0, 0);
  };

});

	window.requestAnimFrame = (function (callback) {
		return window.requestAnimationFrame || 
					window.webkitRequestAnimationFrame ||
					window.mozRequestAnimationFrame ||
					window.oRequestAnimationFrame ||
					window.msRequestAnimaitonFrame ||
					function (callback) {
					 	window.setTimeout(callback, 1000/60);
					};
	})();

// Set up mouse events for drawing
	var drawing = false;
	var mousePos = { x:0, y:0 };
	var lastPos = mousePos;
	canvas.addEventListener("mousedown", function (e) {
		drawing = true;
		lastPos = getMousePos(canvas, e);
	}, false);
	canvas.addEventListener("mouseup", function (e) {
		drawing = false;
	}, false);
	canvas.addEventListener("mousemove", function (e) {
		mousePos = getMousePos(canvas, e);
	}, false);

	// Set up touch events for mobile, etc
	canvas.addEventListener("touchstart", function (e) {
		mousePos = getTouchPos(canvas, e);
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousedown", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchend", function (e) {
		var mouseEvent = new MouseEvent("mouseup", {});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchmove", function (e) {
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousemove", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);

	// Prevent scrolling when touching the canvas
	document.body.addEventListener("touchstart", function (e) {
		if (e.target == canvas) {
			e.preventDefault();
		}
	}, false);
	document.body.addEventListener("touchend", function (e) {
		if (e.target == canvas) {
			e.preventDefault();
		}
	}, false);
	document.body.addEventListener("touchmove", function (e) {
		if (e.target == canvas) {
			e.preventDefault();
		}
	}, false);

	// Get the position of the mouse relative to the canvas
	function getMousePos(canvasDom, mouseEvent) {
		var rect = canvasDom.getBoundingClientRect();
		return {
			x: mouseEvent.clientX - rect.left,
			y: mouseEvent.clientY - rect.top
		};
	}

	// Get the position of a touch relative to the canvas
	function getTouchPos(canvasDom, touchEvent) {
		var rect = canvasDom.getBoundingClientRect();
		return {
			x: touchEvent.touches[0].clientX - rect.left,
			y: touchEvent.touches[0].clientY - rect.top
		};
	}

	// Draw to the canvas
	function renderCanvas() {
		if (drawing) {
			ctx.moveTo(lastPos.x, lastPos.y);
			ctx.lineTo(mousePos.x, mousePos.y);
			ctx.stroke();
			lastPos = mousePos;
		}
	}

// Allow for animation
	(function drawLoop () {
		requestAnimFrame(drawLoop);
		renderCanvas();
	})();

////// actualizar la data de la imagen
$("#va_parriba").click(function(){
  var canvas = document.getElementById('algo');
	var dataURL = canvas.toDataURL();
  let id = $("#id_oculto_oculto").val();
  
  
  const datos = {
    dataURL,
    id,
    id_valida_usuario
  }
  
  
  $.ajax({
    type:'POST',
    url:'templates/documentacion/update_imagen.php',
    data:datos,
    success:function(response){
    
      if(response == "Si"){
        Swal.fire({
          title:'Mensaje',
          text:'Se ha firmado, correctamente el archivo',
          icon:'success',
          timer:1900
        });
        listar_documentacion_arriba();
        traer_firmantes();
      }
    
    }
  });
  
});


$("#cerrar_hojita").click(function(){
  $("#ocultar_3").hide();
  $("#ocultar_2").hide();
  $("#ocultar_1").show();
});

$("#cerrar_hojita_2").click(function(){
  $("#ocultar_3").hide();
  $("#ocultar_2").hide();
  $("#ocultar_1").show();
});

$("#ocultar_3").click(function(){
  
});
*/
///////////////////TRAER FIRMANTES
function traer_firmantes(){
   let id = $("#id_oculto_oculto").val();
  
  $.ajax({
    type:'POST',
    url:'templates/documentacion/traer_firmantes.php',
    data:{id},
    success:function(response){
      let traer = JSON.parse(response);
      let template = "";
      
      traer.forEach((x)=>{
        template += 
          `
          <tr>
          <td>${x.empresa}</td>
          <td>${x.nombres} ${x.apellidos}</td>
          <td>${x.fecha_registro}</td>
          </tr>  
          `;
      });
      
      $("#traer_quien_firma").html(template);
    }
    
  });
}

///////////////////LISTAR USUARIOS
function listar_usuarios(){
  $.ajax({
    type:'POST',
    url:'templates/documentacion/listar_usuarios.php',
    data:{id_documentacion},
    success:function(response){
     
    }
  });
}

/////// LISTAR PERSONAS QUE YA FIRMARON 
function listar_firmantes_ok(){
  $.ajax({
    type:'POST',
    data:{id_documentacion},
    url:'templates/documentacion/firmantes_ok.php',
    success:function(response){
      
      let traer = JSON.parse(response)
      let template = "";
      let contador = 1;
      
      traer.forEach((x)=>{
        template += `
          <tr>
            <td>${contador}</td>
            <td>${x.nombre} ${x.apellido}</td>
            <td>${x.fecha_firma}</td>
          </tr>

          `;
        contador = contador + 1;
      });
      
      $("#participantes_firmaron_ok").html(template);
    }
  });
}


////// LISTAR PERSONAS QUE NO HAN FIRMADO
function listar_firmantes_no(){
  $.ajax({
    type:'POST',
    data:{id_documentacion},
    url:'templates/documentacion/firmantes_no.php',
    success:function(response){
      
      let traer = JSON.parse(response);
      let template = "";
      let contador = 1;
      
      traer.forEach((x)=>{
        template += `
          <tr>
             <td>${contador}</td>
             <td>${x.nombre} ${x.apellido}</td>
          </tr>
          `;
        
        contador = contador + 1;
      });
      $("#participantes_firmaron_no").html(template);
    }
  });  
}
/////////// GUARDAR LA CONFIGURACIÓN DEL PDF
$("#guardar_config_documentacion").click(function(){
 
   let nombre = $("#nombre_documental").val();
   let tipo =  $("#tipo_documentacional").val();
   
   const datos = {
     nombre,
     tipo,
     id_documentacion_d
   }
   
   Swal.fire({
     title:'Advertencia',
     text:'Al realizar los nuevos cambios, todo la configuración anterior se perdera, ¿Desea continuar?',
     showCloseButton: true,
     showCancelButton: true,
     icon:'danger',
     confirmButtonText:'Si!',
     cancelButtonText:'No!'
   }).then((x)=>{
     if(x.value){
       $.ajax({
        type:'POST',
        data:datos,
        url:'templates/documentacion/guarda_configuracion.php',
        success:function(response){
         
          if(response == 1){
            let informa_documentacion = "si";
            const datos_segundos = {
              id_documentacion_d,
              informa_documentacion 
            }
            
            $.ajax({
              type:'POST',
              url:'templates/documentacion/enviar_correo.php',
              data:datos_segundos,
              success:function(x){
              }
            });  
              
          }
          listar_config_documentacion();
            Swal.fire({
              title:'Mensaje',
              text:'La configuración se ha cargado correctamente',
              icon:'success',
              timer:1500
            });
        }
       });
     }
   })
  });


//////////FORMULARIO DE PDF
$("#formulario_pdf").on("submit", function(e){
  e.preventDefault();
  $("#gif_loading").show();
  var f = $(this);
  var formData = new FormData(document.getElementById("formulario_pdf"));
  
  $.ajax({
    url: "templates/documentacion/procesapdf.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success:function(respuesta){
      
        $("#pdf_grande").show();
        listar_pdf_grande();
        $("#gif_loading").hide();
    }
  });
});


//////// TREAR PDF GRANDE

function listar_pdf_grande(){
  $("#pdf_grande").show();
  $.ajax({
    type:'POST',
    data:{id_documentacion_d},
    url:'templates/documentacion/traer_pdf_grande.php',
    success:function(respuesta){
     
      let template = "";
      if(respuesta != "No"){
        $("#primer_set").hide();
        $("#segundo_set").show();
        template += `<iframe src="${respuesta}" style="width:100%;height:700px"></iframe> <input type="hidden" value="${respuesta}" id="url_a_eliminar">`;
        $("#pdf_grande").html(template);
      }else{
        $("#primer_set").show();
        $("#segundo_set").hide();
        
      }
    }
  });
  
}



//////////// EVENTO PARA ELIMINAR LA DOCUMENTACIÓN
$("#eliminar_documento_cargado").click(function(){
  let url = $("#url_a_eliminar").val();
  
  Swal.fire({
    title:'Mensaje',
    text:'¿Esta seguro de eliminar el documento?',
    icon:'question',
    showCloseButton: true,
    showCancelButton: true,
    confirmButtonText:'Si!',
    cancelButtonText:'No!'
  }).then((x)=>{
    if(x.value){
      $.ajax({
        type:'POST',
        url:'templates/documentacion/eliminar_documento_pdf.php',
        data:{url},
        success:function(response){
          
          if(response=="Eliminado"){
            Swal.fire({
              title:'Mensaje',
              text:'El fichero ha sido eliminado correctamente',
              icon:'success',
              timer:1500
            });
            $("#pdf_grande").hide();
            listar_pdf_grande();
          }
        }
      });
    }
  })

});

/////// LISTAR INFORMACIÓN
function listar_config_documentacion(){
  $.ajax({
    type:'POST',
    data:{id_documentacion_d},
    url:'templates/documentacion/listar_configuracion.php',
    success:function(respuesta){
      
      let traer = JSON.parse(respuesta);
      let template = "";
      let tpo = "";
      traer.forEach((x)=>{
          if(x.tipo == 1){
            tpo = "Hoja x hoja";
            $(".subir1").hide();
            $(".subir").show();
          }else{
            tpo = "Pdf";
            $(".subir").hide();
            $(".subir1").show();
          }
        
          $("#nombre_config").html(x.nombre);
          $("#tipo_config").html(tpo);
      });
    }
  })
}







