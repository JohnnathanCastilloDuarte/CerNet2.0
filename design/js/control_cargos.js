$("#cargo_cargo").attr('disabled','disabled');
$("#departamento_cargo").attr('disabled','disabled');
$("#asignar_cargo").hide();

////////// FUNCIONES A EJECUTAR
traer_usuarios_cargos();
traer_departamentos_cargo();


////////////////////// LOGICA DE LAS FUNCIONES

function traer_usuarios_cargos(){
  
  $.ajax({
    type:'POST',
    url:'templates/cargos/traer_cargos.php',
    success:function(response){
      let traer = JSON.parse(response);
      let template = "";
      
      traer.forEach((x)=>{
        template+=
          `
          <option value="${x.id_usuario}">${x.usuario}</option>
          `;
      });
      
      $("#traer_empleados_cargos").html(template);
    }
  })
}


/////////// SELECCIONADOR DE USUARIO

$("#traer_empleados_cargos").change(function(){
  let id_usuario = $(this).val();
  $("#id_usuario_cargos").val(id_usuario);
  info_usuario_cargos(id_usuario);
  $("#cargo_cargo").attr('disabled',false);
  $("#departamento_cargo").attr('disabled',false);
  $("#asignar_cargo").show();
});


////////////////// FUNCION PARA TRAER CARGOS
function info_usuario_cargos(id_usuario){
  
  $.ajax({
    type:'POST',
    url:'templates/cargos/informacion_usuario.php',
    data:{id_usuario},
    success:function(response){
      console.log(response);
      let traer = JSON.parse(response);
      let template = "";
      
      if(traer.length != 0){
        traer.forEach((x)=>{
        
        template += `
         <span class="text-muted">Departamento</span><span class="text-primary">${x.departamento}</span><br>
         <span class="text-muted">Cargo</span><span class="text-primary">${x.cargo}</span><br> 
        `;
      })
      }else{
        template += `<span class="text-info">No ha cargado información sobre el cargo</span>`;
      }
      
      
      $("#informacion_cargo").html(template);
    }
  })
}

//////////////// FUNCION PARA TRAER DEPARTAMENTOS
function traer_departamentos_cargo(){
  
  $.ajax({
    type:'POST',
    url:'templates/cargos/traer_departamentos.php',
    success:function(response){
      console.log(response);
      let traer = JSON.parse(response);
      let template = "";
      
      traer.forEach((x)=>{
        template += `
          <option value="${x.id_departamento}">${x.departamento}</option>
          `;
      });
      
      $("#departamento_cargo").html(template);
      
    }
  })
}


$("#asignar_cargo").click(function(){
 
  let usuario = $("#id_usuario_cargos").val();
  let cargo = $("#cargo_cargo").val();
  let departamento = $("#departamento_cargo").val();
  
  const datos = {
    usuario,
    cargo,
    departamento
  }
  
  $.ajax({
    type:'POST',
    data:datos,
    url:'templates/cargos/asignar_cargo.php',
    success:function(response){
     if(response == "Listo"){
       Swal.fire({
         title:'Mensaje',
         text:'Se ha actualizado el cargo',
         icon:'success',
         timer:1500
       });
       info_usuario_cargos(usuario);
     }
    }
  })
})


