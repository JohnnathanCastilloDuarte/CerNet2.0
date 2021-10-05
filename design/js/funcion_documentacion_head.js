var id_valida = $("#id_valida").val();

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
      
      traer.forEach((x)=>{
        if(x.estado == 0){
          estado = '<span class="badge badge-primary">Creado</span>';
          escritura_estado = "Sin accion";
        }else if(x.estado == 1){
          estado = '<span class="badge badge-success">Aprobado documental</span>';
          escritura_estado = "Aprobado documental";
        }else if(x.estado == 2){
          estado = '<span class="badge badge-success">Aprobado Head</span>';
          escritura_estado = "Aprobado Head";
        }else if(x.estado == 3){
          estado = '<span class="badge badge-success">Aprobado Gerente</span>';
          escritura_estado = "Aprobado Gerente";
        }else if(x.estado == 4){
          estado = '<span class="badge badge-danger">Error Documental</span>';
          escritura_estado = "Error Documental";
        }else if(x.estado == 5){
          estado = '<span class="badge badge-danger">Error Head</span>';
          escritura_estado = "Error Head";
        }else if(x.estado == 6){
          estado = '<span class="badge badge-danger">Error Gerente</span>';
          escritura_estado = "Error Gerente";
        }
        
        
      
        template += 
           `
          <a>
           <tr>
            <td>${x.id_documentacion}</td>
            <td>${x.empresa}</td>
            <td>${x.archivo}</td>
            <td>${x.usuario}</td>
            <td>${x.fecha_creacion}</td>
            <td>${estado}</td>
            <td><button class="btn btn-info" id="ver_documentacion_aprobacion" data-name="${x.nombre_archivo}"><i class="fa fa-eye" aria-hidden="true"></i</button></td>
            <td><button class="btn btn-muted" id="ver_comentarios" data-id="${x.id_documentacion}"><i class="fa fa-book" aria-hidden="true"></i</button></td>
            <td><select class="form-control" id="aprobacion_head" data-id='${x.id_documentacion}'>
                <option value="${escritura_estado}">${escritura_estado}</option>
                <option value="Revisado">Revisado</option>
                <option value="error">Documento con error</option>
              </select> 
            </td>

          </tr>
         </a> 

          `;
      });
      
      $("#traer_documentacion_head").html(template);
    }
  })
  
}




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
      console.log(response);
    }
  
  });
  
});


////////////////////////////////

$(document).on('change','#aprobacion_head',function(){
  
    let id = $(this).attr('data-id');
    let valor = $(this).val();
  
    const datos = {
      id,
      valor,
      id_valida
    }
  
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
               text:'Se ha modificado correctamente el estado de la documentación, se ha enviado un correo para firmar la aprobación del documento',
               icon:'success',
               timer:2100
             });
             $.ajax({
               type:'POST',
               url:'templates/documentacion/enviar_correo.php',
               data:datos,
               success:function(response){
                 console.log(response);
               }
             })
           }
           listar_documentacion_head(0);
         }
       })
     }
   });
  
});


$(document).on('click','#ver_comentarios',function(){
  
    let id_documento = $(this).attr('data-id');
    window.open('templates/documentacion/head_templates/comentarios.php?doc='+id_documento+'&person='+id_valida, 'Comentarios','width=600px,height=450px,top=50px,left=50px');  
});

$(document).on('click','#ver_documentacion_aprobacion',function(){
    let nombre_archivo = $(this).attr('data-name');
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



