$("#cargo_cargo").attr('disabled','disabled');
$("#departamento_cargo").attr('disabled','disabled');
$("#asignar_cargo").hide();

////////// FUNCIONES A EJECUTAR

traer_empresas();


////////////////////// LOGICA DE LAS FUNCIONES


/////////////// BUSCAR EMPRESA
function traer_empresas(){

  $.ajax({
    url:'templates/cargos/traer_empresa.php',
    success:function(response){
      console.log(response);
      let traer = JSON.parse(response);
      let template = '';

      traer.forEach((x)=>{
      
        template +=`
            <option value="${x.id_empresa}"">${x.nombre}</option>      
          `;
      });

      $("#empresa_cargo").html("<option value='0'>Selecciona</option>"+template);
    }
  });
}

////// SELECCIONAR EMPRESA 
$("#empresa_cargo").change(function(){
  let id_empresa = $(this).val();
  
  traer_usuarios_cargos(id_empresa);
  
})


function traer_usuarios_cargos(id_empresa){
  
  $.ajax({
    type:'POST',
    data:{id_empresa},
    url:'templates/cargos/traer_cargos.php',
    success:function(response){
      let traer = JSON.parse(response);
      let template = "";
      
      if(traer.length != 0){
        traer.forEach((x)=>{
          template+=
            `
            <option value="${x.id_usuario}">${x.usuario}</option>
            `;
        });
      }else{
        template = "<option value='0'>No existen usuarios</option>";
      }
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
      
      let traer = JSON.parse(response);
      let template = "";
      
      if(traer.length != 0){
        traer.forEach((x)=>{
        
        template += `
         <span class="text-muted">Departamento: </span><span class="text-primary">${x.departamento}</span><br>
         <span class="text-muted">Cargo: </span><span class="text-primary">${x.cargo}</span><br> 
        `;
      })
      }else{
        template += `<span class="text-info">No ha cargado información sobre el cargo</span>`;
      }
      
      
      $("#informacion_cargo").html(template);
    }
  })
}



$("#asignar_cargo").click(function(){
 
  let usuario = $("#id_usuario_cargos").val();
  let cargo = $("#cargo_cargo").val();
  let departamento = $("#departamento_cargo").val();
  let rol_informe = $("#rol_informe").val();
  
  const datos = {
    usuario,
    cargo,
    departamento,
    rol_informe
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
});


///// FUNCION PARA TRAER DEPARTAMENTOS 
traer_departamentos();

function traer_departamentos(){

  $.ajax({
    type:'POST',
    url:'templates/cargos/traer_departamentos.php',
    success:function(response){

      let traer = JSON.parse(response);
      let template = "";

      traer.forEach((valor)=>{

        template +=
        `
          <option value="${valor.id_departamento}">${valor.departamento}</option>
        `;
      });

      $("#departamento_cargo").html('<option value="0">Selecione</option>'+template);

    }
  });
}


/////// BUSCAR CARGOS

$("#departamento_cargo").change(function(){

  let id_departamento = $(this).val();

});


function traer_cargos(id_departamento){

    $.ajax({
      type:'POST',
      data:{id_departamento},
      url:'templates/cargos/traer_cargos_depto.php',
      success:function(response){
        console.log(response);
      }
    })
}




