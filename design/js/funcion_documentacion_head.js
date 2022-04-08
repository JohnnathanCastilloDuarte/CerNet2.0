var id_valida = $("#id_valida").val();
$("#row_rechazos").hide();
$("#historial_aprobacion").hide();

//////////////////////// FUNCIONES CREADAS PARA APROBACIONES HEAD/////////////////////////
listar_documentacion_head(0);

$("#TodasHead").click(function(){
  listar_documentacion_head(0);
});
$("#RevisadasHead").click(function(){
  listar_documentacion_head(1);
});
$("#RechazadasHead").click(function(){
  listar_documentacion_head(4);
});


function listar_documentacion_head(estado_ver){
  const datos = {
    estado_ver,
    id_valida
  }
  


  $.ajax({
    type:'POST',
    data:datos,
    url:'templates/documentacion/head_templates/traer_documentos.php',
    success:function(response){
      console.log(response);
     
      let traer = JSON.parse(response);
      let template = "";
      let estado = ""
      let escritura_estado = "";
      let option_estado = "";
      let boton_ver = "";
      let color_fila = "";
      
      traer.forEach((x)=>{

        if(x.estructura == 1){

          
        
          if(x.rol == 'Junior Documentary Analyst' || x.rol == 'Leading Senior Documentary Analyst' || x.rol == 'Senior Documentary Analyst' || x.rol == 'Documentary Analyst'){
            if(x.estado == 0){
              option_estado = `
              <select class="form-control" id="aprobacion_head" data-id='${x.id_documentacion}'>
                <option value="0">Seleccione...</option>
                <option value="Revisado">Aprobado</option>
                <option value="error">Rechazado</option>
              </select>`;
            }else if(x.estado == 1){
              option_estado ='<span class="badge badge-muted">Aprobaste || En espera de informes</span>';
            }else if(x.estado == 2){
              option_estado ='<span class="badge badge-muted">Subiste documentación || En espera de Head</span>';
            }else if(x.estado == 3){
              option_estado ='<span class="badge badge-muted">Rechazaste el documento</span>';
            }else if(x.estado == 4){
              option_estado ='<span class="badge badge-muted">Aprobación Inspector || En Espera de Head</span>';
            }else if(x.estado == 5){
              option_estado ='<span class="badge badge-muted">Rechazado por Inspector</span>';
            }else if(x.estado == 6){
              option_estado ='<span class="badge badge-muted">Aprobadoción HEAD || En Espera de Calidad</span>';
            }else if(x.estado == 7){
              option_estado ='<span class="badge badge-muted">Rechazo por HEAD</span>';
            }else if(x.estado == 8){
              option_estado ='<span class="badge badge-muted">Aprobadoción Calidad || En Espera de Cliente</span>';
            }else if(x.estado == 9){
              option_estado ='<span class="badge badge-muted">Rechazado por calidad</span>';
            }else if(x.estado == 10){
              option_estado ='<span class="badge badge-muted">Aprobación Cliente</span>';
            }else if(x.estado == 11){
              option_estado ='<span class="badge badge-muted">Rechazo Cliente</span>';
            }
          }

          else if(x.rol == 'Inspector Junior' || x.rol == 'Senior Consultant' || x.rol == 'Junior Analyst' || x.rol == 'Consultant' || x.rol == 'Engineer'){
            if(x.estado == 2){
              option_estado = `
              <select class="form-control" id="aprobacion_head" data-id='${x.id_documentacion}'>
                <option value="Seleccione">Seleccione...</option>
                <option value="Revisado">Revisado</option>
                <option value="error">Rechazado</option>
              </select>`;
            }else if(x.estado == 4){
              option_estado ='<span class="badge badge-muted">Aprobaste el documento || En Espera de Head</span>';
            }else if(x.estado == 5){
              option_estado ='<span class="badge badge-muted">Rechazaste</span>';
            }else if(x.estado == 6){
              option_estado ='<span class="badge badge-muted">Aprobadoción HEAD || En Espera de Calidad</span>';
            }else if(x.estado == 7){
              option_estado ='<span class="badge badge-muted">Rechazo por HEAD</span>';
            }else if(x.estado == 8){
              option_estado ='<span class="badge badge-muted">Aprobadoción Calidad || En Espera de Cliente</span>';
            }else if(x.estado == 9){
              option_estado ='<span class="badge badge-muted">Rechazado por Calidad</span>';
            }else if(x.estado == 10){
              option_estado ='<span class="badge badge-muted">Aprobación Cliente</span>';
            }else if(x.estado == 11){
              option_estado ='<span class="badge badge-muted">Rechazo Cliente</span>';
            }
          }  

          else if(x.rol == 'Head' || x.rol == 'Chief Operating Officer'){
            if(x.estado == 4){
              option_estado = `
              <select class="form-control" id="aprobacion_head" data-id='${x.id_documentacion}'>
                <option value="Seleccione">Seleccione...</option>
                <option value="Revisado">Revisado</option>
                <option value="error">Rechazado</option>
              </select>`;
            }else if(x.estado == 6){
              option_estado ='<span class="badge badge-muted">Aprobaste el documento || En Espera de Calidad</span>';
            }else if(x.estado == 7){
              option_estado ='<span class="badge badge-muted">Rechazaste el documento</span>';
            }else if(x.estado == 8){
              option_estado ='<span class="badge badge-muted">Aprobación Calidad || En Espera de Cliente</span>';
            }else if(x.estado == 9){
              option_estado ='<span class="badge badge-muted">Rechazado por Calidad</span>';
            }else if(x.estado == 10){
              option_estado ='<span class="badge badge-muted">Aprobación Cliente</span>';
            }else if(x.estado == 11){
              option_estado ='<span class="badge badge-muted">Rechazo Cliente</span>';
            }
          }

          else if(x.rol == 'Quality Controller'){
            if(x.estado == 6){
              option_estado = `
              <select class="form-control" id="aprobacion_head" data-id='${x.id_documentacion}'>
                <option value="0">Seleccione...</option>
                <option value="Revisado">Revisado</option>
                <option value="error">Rechazado</option>
              </select>`;
            }else if(x.estado == 8){
              option_estado ='<span class="badge badge-muted">Aprobaste el documento || En espera del cliente</span>';
            }else if(x.estado == 9){
              option_estado ='<span class="badge badge-muted">Rechazaste el documento</span>';
            }else if(x.estado == 10){
              option_estado ='<span class="badge badge-muted">Aprobación Cliente</span>';
            }else if(x.estado == 11){
              option_estado ='<span class="badge badge-muted">Rechazo Cliente</span>';
            }
          }
          

          if(x.estado == 0){
            boton_ver = `<a class="btn btn-info" onclick="window.open('https://${x.url}')"><i class="fa fa-eye" aria-hidden="true"></i</a>`;
          }else{
            boton_ver = `<button class="btn btn-info" id="ver_documentacion_aprobacion" data-name="${x.nombre_archivo}"  data-id='${x.id_documentacion}'><i class="fa fa-eye" aria-hidden="true"></i</button>`;
          }


          if(x.estado == 0){
            estado = '<span class="badge badge-primary">Iniciado</span>';
            escritura_estado = "Link de documentación creado";
            
          }else if(x.estado == 1){
            estado = '<span class="badge badge-success">Aprobación Analista Documental</span>';
            escritura_estado = "Aprobacion Analista documental";
            
          }else if(x.estado == 2){
            estado = '<span class="badge badge-danger">Informes cargados</span>';
            escritura_estado = "Informes cargados";
          }
          
          else if(x.estado == 3){
            estado = '<span class="badge badge-danger">Rechazado Analista Documental</span>';
            escritura_estado = "Rechazado Analista Documental";
          }else if(x.estado == 4){
            estado = '<span class="badge badge-success">Aprobado Inspector</span>';
            escritura_estado = "Aprobado Inspector";
          }else if(x.estado == 5){
            estado = '<span class="badge badge-danger">Rechazado Inspector</span>';
            escritura_estado = "Rechazado Inspector";
          }else if(x.estado == 6){
            estado = '<span class="badge badge-success">Aprobado HEAD / COO</span>';
            escritura_estado = "Aprobado HEAD / COO";
          }else if(x.estado == 7){
            estado = '<span class="badge badge-danger">Rechazado HEAD / COO</span>';
            escritura_estado = "Rechazado HEAD / COO";
          }else if(x.estado == 8){
            estado = '<span class="badge badge-success">Aprobado Calidad</span>';
            escritura_estado = "Aprobado Calidad";
          }else if(x.estado == 9){
            estado = '<span class="badge badge-danger">Rechazado Calidad</span>';
            escritura_estado = "Rechazado Calidad";
          }
          else if(x.estado == 10){
            estado = '<span class="badge badge-success">Aprobado Cliente</span>';
            escritura_estado = "Aprobado Cliente";
          }
          else if(x.estado == 11){
            estado = '<span class="badge badge-danger">Rechazado por Cliente</span>';
            escritura_estado = "Rechazado por Cliente";
          }

          
        }///////////// CIERRE DE LA ESTRUCTURA 1 - csv head spot
        else{
         
          if(x.tipo_validador == 0 && x.estado != 4){
            option_estado = `
            <select class="form-control" id="aprobacion_head" data-id='${x.id_documentacion}' data-participante = '${x.id_participante}'>
              <option value="0">Seleccione...</option>
              <option value="Revisado">Aprobado</option>
              <option value="error">Rechazado</option>
            </select>`;
          }else if(x.estado != 4){
            option_estado =`<span class="badge badge-muted">Faltantes aprobación ${x.faltantes}</span>`;
          }else{
            option_estado =`<button class="btn btn-danger" data-id='${x.id_documentacion}' id="ver_rechazos_rechazados"><span class="badge badge-white">Documento rechazado</span></button>`;
          }

          boton_ver = `<button class="btn btn-info" id="ver_documentacion_aprobacion" data-name="${x.nombre_archivo}" data-id="${x.id_documentacion}"><i class="fa fa-eye" aria-hidden="true"></i</button>`;

          if(x.estado == 2){
            estado = '<span class="badge badge-success">En espera de firmas</span>';
            escritura_estado = "En espera de firmas";
          }else if(x.estado == 3){
            estado = '<span class="badge badge-success">Aprobado</span>';
            escritura_estado = "En espera del siguiente aprobador";
          }else if(x.estado == 4){
            estado = '<span class="badge badge-success">Documento Rechazo</span>';
            escritura_estado = "Documento rechazado";
          }

          if(x.estado == 4){
            color_fila = "#ff4036";
          }else{
            if(x.faltantes > 0){
              color_fila = "#eee563";
            }else{
              color_fila = "#94ff94";
            }
          }         
        }  

        console.log(x.estado);
        
        template += 
           `
           <tr style="background: ${color_fila};">
            <td>${x.id_documentacion}</td>
            <td>${x.empresa}</td>
            <td>${x.archivo}</td>
            <td>${x.usuario}</td>  
            <td>${boton_ver}</td>
            <td><button class="btn btn-muted" id="ver_comentarios" data-id="${x.id_documentacion}"><i class="fa fa-book" aria-hidden="true"></i</button></td>
            <td><button class="btn btn-muted" id="ver_cronograma" data-id="${x.id_documentacion}"><i class="fa fa-calendar" aria-hidden="true"></i</button></td>
            
            <td>
              ${option_estado}
            </td>
            <td>${estado}</td>
            <td><button id="ver_historial" class="btn btn-primary" data-id="${x.id_documentacion}" data-estado="${x.estado}">Historial</button></td>
          </tr>
         
         

          `;
      });
      
      $("#traer_documentacion_head").html(template);
    }
  })
  
}


$(document).on('click','#ver_rechazos_rechazados',function(){
  let id_documentacion = $(this).attr('data-id');
  $("#id_documentacion_rechazos").val(id_documentacion);
  $("#row_rechazos").show();
  $("#enunciado_rechazo").hide();
  $("#guarda_rechazo").hide();
  traer_rechazos()
});

$("#cerrar_tarjeta_rechazos").click(function(){
  $("#row_rechazos").hide();

});




////////// EVENTO PARA GUARDAR COMENTARIO DEL HEAD
$(document).on('submit','#form_head_comentarios',function(e){
						e.preventDefault();
		
	$.ajax({
		url: 'templates/documentacion/head_templates/comentarios_head_documentacion.php',
    type: 'POST',
    dataType: 'html',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
    success:function(response){
      
    }
  
  });
  
});


////////////////////////////////

$(document).on('change','#aprobacion_head',function(){
  
    let id = $(this).attr('data-id');
    let valor = $(this).val();
    let id_participante = $(this).attr('data-participante');
    let informa_documentacion = "";
    $("#id_documentacion_rechazos").val(id);
    var hoy = new Date();
    let date = hoy.getDate();
    let month = hoy.getMonth() + 1;
    let year = hoy.getFullYear();

    if(date < 10){
      date = "0"+date;
    }

    if(month < 10){
      month = "0"+month;
    }
    let fecha = year+"-"+month+"-"+date;

    let hora = hoy.getHours();
    let minuto = hoy.getMinutes();
    let segundo = hoy.getSeconds(); 

    

    if(hora < 10){
      hora = "0"+hora;
    }
    if(minuto < 10){
      minuto = "0"+minuto;
    }
    if(segundo < 10){
      segundo = "0"+segundo;
    }

    let hora_oficial = hora+":"+minuto+":"+segundo;

  
    const datos = {
      id,
      valor,
      id_valida,
      id_participante,
      fecha,
      hora_oficial
    }

    let id_documentacion_d = id;

    const datos_apro = {
      informa_documentacion,
      id_documentacion_d,
      id_valida

    }
  
    if(valor != "error" && valor != 0){
      $("#row_rechazos").hide();
      Swal.fire({
        title:'Mensaje',
        text:'Estas seguro que configurar como '+valor+' ?',
        icon:'question',
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: 'Si!',
        cancelButtonText: 'No!'
      }).then((x)=>{
        if(x.value){
          $.ajax({
            type:'POST',
            url:'templates/documentacion/head_templates/estado_head.php',
            data:datos,
            success:function(response){
              console.log(response);
              
              if(response == "Si"){
                Swal.fire({
                  title:'Mensaje',
                  text:'Se ha modificado correctamente el estado de la documentación',
                  icon:'success',
                  timer:1500
                });
              }else if(response == "Si correo"){
                Swal.fire({
                  title:'Mensaje',
                  text:`Se ha modificado correctamente el estado de la documentación,
                  se ha enviado un correo para firmar la aprobación del documento`,
                  icon:'success',
                  timer:2100
                });
                $.ajax({
                  type:'POST',
                  url:'templates/documentacion/enviar_correo.php',
                  data:datos_apro,
                  success:function(response){
                    console.log(response);
                  }
                });
              }else if(response == "Si documentador"){
               let tipo = "documentador";
               const datos = {
                 id,
                 valor,
                 id_valida,
                 tipo
               }
               $.ajax({
                 type:'POST',
                 url:'templates/documentacion/enviar_correo.php',
                 data:datos,
                 success:function(response){
                  
                 }
               });
             }else if(response == "Si documentacion"){
              Swal.fire({
                title:'Mensaje',
                text:`Se ha modificado correctamente el estado de la documentación,
                Se debe cargar la documentación generada por el departamento documental`,
                icon:'success',
                timer:2100
              });
             }
              listar_documentacion_head(0);
            }
          })
        }
      });
    }else{
      $("#row_rechazos").show();
      traer_rechazos();
    }
 
});


$(document).on('click','#ver_comentarios',function(){
  
    let id_documento = $(this).attr('data-id');
    window.open('templates/documentacion/head_templates/comentarios.php?doc='+id_documento+'&person='+id_valida, 'Comentarios','width=600px,height=450px,top=50px,left=50px');  
});

$(document).on('click','#ver_documentacion_aprobacion',function(){
  
    //$("#aprobacion_head").show();
    let nombre_archivo = $(this).attr('data-name');
    let id_documentacion_ff = $(this).attr('data-id');
    //window.open('informe_firmantes_final2.php?nombre='+nombre_archivo+'&id='+id_documentacion_ff, nombre_archivo); 
    window.open('templates/documentacion/head_templates/visor_archivo.php?nombre='+nombre_archivo, nombre_archivo); 
});
/*
<form id="form_head_comentarios" enctype="multipart/form-data" method="post">  
  <td colspan="8">
    <span class="badge badge-dark">Comentarios:</span>
   <br>
   <input type="hidden" name="id_documentacion" value="${x.id_documentacion}"> 
    <textarea class="form-control" name="comentarios_aprobacion">
    </textarea>
    <br>
    <button class="btn btn-success" id="guarda_comentario_head">Comentar!</button>
  </td>
</form>

*/


/////////////// VER CRONOGRAMA 

$(document).on('click','#ver_cronograma',function(){

  
  let id_documento = $(this).attr('data-id');
  window.open('templates/documentacion/head_templates/calendario.php?doc='+id_documento, 'Calendario','width=600px,height=450px,top=50px,left=50px');
    

});


///////////// LISTAR RECHAZOS

/*
function documentacion_inspector(){

  let tipo = 1;

  $.ajax({
    type:'POST',
    data:{tipo},
    url:'templates/documentacion/controla_rechazos.php',
    success:function(response){
      let traer = JSON.parse(response);
      let template = "";

      traer.forEach((valor)=>{
        template +=
        `
          <option value="${valor.id_documento}">${valor.nombre}</option>
        
        `;
      });

      $("#aqui_documentos_inspector").html("<option value='0'>Seleccione</option>"+template);
    }
  })
}*/
/*
function motivos_rechazos(){

  let tipo = 2;

  $.ajax({
    type:'POST',
    data:{tipo},
    url:'templates/documentacion/controla_rechazos.php',
    success:function(response){
      let traer = JSON.parse(response);
      let template = "";

      traer.forEach((valor)=>{
        template += 
        `
          <option value="${valor.id}">${valor.motivo}</option>
        
        `;
      });

      $("#motivo_rechazo").html("<option value='0'>Seleccione</option>"+template);
    }
  })
}*/


//////////// evento para guardar el rechazo

$("#guarda_rechazo").click(function(){
    alert("Click");
    //let documento = $("#aqui_documentos_inspector").val();
    let motivo = $("#motivo_rechazo").val();
    let id_documentacion = $("#id_documentacion_rechazos").val();

    let tipo = 3;

    const datos = {
      //documento,
      motivo,
      id_documentacion,
      id_valida,
      tipo
    }

    $.ajax({
      type:'POST',
      data:datos,
      url:'templates/documentacion/controla_rechazos.php',
      success:function(response){
        console.log(response);
        if(response == "Si"){

          Swal.fire({
            title:'Mensaje',
            text:'Se ha guardo el rechazo correctamente',
            icon:'success',
            timer:1700
          });

        }else{
          Swal.fire({
            title:'Mensaje',
            text:'Ya se ha rechazo el documento por ese motivo, selecciona otro motivo',
            icon:'warning',
            timer:1700
          });
        }
        traer_rechazos();
        listar_documentacion_head(0);
      }
      
    });  
  

});


function traer_rechazos(){

  let id_documentacion = $("#id_documentacion_rechazos").val();
  let tipo = 4;

  const datos = {
    id_documentacion,
    tipo
  }

  $.ajax({
    type:'POST',
    data:datos,
    url:'templates/documentacion/controla_rechazos.php',
    success:function(response){
      console.log(response);
      let traer = JSON.parse(response);
      let template = "";

      traer.forEach((valor)=>{

        template += 
        `
          <tr>
            <td>${valor.nombres} ${valor.apellidos} || ${valor.cargo}</td>
            <td>${valor.rechazo}</td>
            <td>${valor.fecha_rechazo}</td>
          </tr>
        `;
      });

      $("#aqui_todos_rechazos").html(template);
    }
  });
}



$(document).on('click','#ver_historial',function(){

  let id_documentacion = $(this).attr('data-id');
  let id_estado = $(this).attr('data-estado');

  $("#historial_aprobacion").show();  
  ya_firmo(id_documentacion, id_valida);

});


function ya_firmo(id_documentacion, id_valida) {
  const datos = {
    id_documentacion,
    id_valida
  }

  $.ajax({
    type: 'POST',
    data: datos,
    url: 'templates/documentacion/yafirmo.php',
    success: function(response) {

      console.log(response);
      let traer = JSON.parse(response);
      let msj = "";
          
        traer.forEach((valor)=>{

          if(valor.fecha_firma != null && valor.qr == ""){
            qr="<span class='text-danger' style='font-size: 22px;'>Usuario rechazo proceso</span>";
            firma = "<span class='text-danger'>Rechazó</span>";
             msj += `
            <div class="col-sm-4" style="text-align:center;">
              <span class='text-muted' style='text-align:center;'>${valor.nombre} ${valor.apellido} ${firma}:<br>
              Nombre proceso documental: ${valor.nombre_documento}.<br>
              Empresas: Cercal Group - ${valor.empresa}.<br>
              El dia ${valor.fecha_firma}</span><br>${qr}       
             </div>               
            `;
          }else if(valor.fecha_firma != " " && valor.qr != ""){
            qr = `<img src="templates/documentacion/head_templates/${valor.qr}" style="margin-left:0px" width="300px"/>`;
            firma = "<span class='text-success'>Ya ha firmado</span>";
            msj += `
            <div class="col-sm-4" style="text-align:center;">
              <span class='text-muted' style='text-align:center;'>${valor.nombre} ${valor.apellido} ${firma}:<br>
              Nombre proceso documental: ${valor.nombre_documento}.<br>
              Empresas: Cercal Group - ${valor.empresa}.<br>
              El dia ${valor.fecha_firma}</span><br>${qr}       
             </div>               
            `;
          }else{
            qr="<span class='text-muted' style='font-size: 22px;'>Los usuarios no han firmado</span>";
            firma = "<span class='text-muted'>Sin revisión </span>";
            msj += `
            <div class="col-sm-12" style="text-align:center;">
              ${qr}<br>
              ${firma}   
             </div>               
            `;
          }
         
           
          
           
        });
        
        $("#m").html(msj);
        $("#aqui_pdf_bton").html(`<br><button class="btn btn-danger" data-id="${id_documentacion}" id="descarga_datos_informe">Generar PDF <i class="fas fa-file-pdf"></i></button>`);

    }
  });
}


//////////// btn que controla la targeta de historial 

$("#cerrar_historial").click(function(){
  $("#historial_aprobacion").hide();
})


///////////// informe de documentacion 
$(document).on('click', '#descarga_datos_informe', function(){
  let id_documentacion = $(this).attr('data-id');

  $.ajax({
    type:'POST',
    data:{id_documentacion},
    url:'templates/documentacion/creador_md5.php',
    success:function(response){
      console.log(response);
      let id_documentacion_d = response;
      if(es_local == "No"){
        window.open('https://cercal.net/CerNet2.0/informe_firmantes_final2.php?key=' + id_documentacion_d);  
    }else{
      window.open('https://localhost/CerNet2.0/informe_firmantes_final2.php?key=' + id_documentacion_d);  
    }
    }
  })
 
})
