var doc = $("#doc").val();
var person = $("#person").val();


////// FUNCIONES A EJECUTAR
traer_comentarios();

function traer_comentarios(){
  
  
  $.ajax({
    type:'POST',
    url:'traer_comentarios.php',
    data:{doc},
    success:function(response){
      console.log(response)
      let template = ""
      if(response == "No"){
        template = "<span class='badge badge-success'>No hay comentarios actualmente</span>";
      }else{
        let traer = JSON.parse(response);
        let eliminar = "";
        
        traer.forEach((x)=>{
          
          if(x.id_persona == person){
            eliminar = `<a class="badge badge-danger" id="eliminar_comentario" data-id="${x.id_comentario}">Eliminar</a>`;
          }
          template += `
            <tr>
              <td>
                <span class="badge badge-secondary">${x.fecha_comentario}</span><br>
                ${x.comentario}<br>
                <span class="badge badge-light">${x.usuario}</span><br><br>
                ${eliminar}
              </td>
            </tr>
          `;
        });
      }
      $("#traer_comentarios").html(template);
      $("#comentario_actual").text('');
    }
    
  })
}


$("#click_comentario").click(function(){
  let comentario = $("#comentario_actual").val();
  
  const datos = {
    person,
    comentario,
    doc
  }
  
  $.ajax({
    type:'POST',
    url:'crear_comentario.php',
    data:datos,
    success:function(response){
      console.log(response);
      if(response == "Si"){
        traer_comentarios();
      }
    }
  })
});


$(document).on('click','#eliminar_comentario',function(){
  let id = $(this).attr('data-id');
  Swal.fire({
		position:'center',
		icon:'error',
		title:'Deseas eliminar el comentario ?',
		showConfirmButton:true,
		showCancelButton:true,
		confirmButtonText:'Si!',
		cancelButtonText:'No!',
	}).then((result)=>{
    if(result.value){
      $.ajax({
      type:'POST',
      url:'eliminar_comentarios.php',
      data:{id},
      success:function(response){
        console.log(response);
        if(response == "Si"){
          Swal.fire({
            title:'Mensaje',
            text:'Se ha eliminado correctamente',
            icon:'success',
            timer:1500
          });
          traer_comentarios();
        }
      }
      });
    }
  });
});