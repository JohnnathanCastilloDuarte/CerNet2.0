
///////////////////////////
$("#ocultar").hide();
$("#capa_nuevo").hide();


$("#añadir").click(function(){
  $("#añadir").hide();
  $("#capa_nuevo").show();
  $("#capa_rol").hide();
  $("#ocultar").show();
});

$("#ocultar").click(function(){
  $("#añadir").show();
  $("#capa_nuevo").hide();
  $("#capa_rol").show();
  $("#ocultar").hide();
});

traer_privilegios();


/////////////// GUARDANDO EL PRIVILEGIO NUEVO
$("#crear_privilegio").click(function(){

  let nombre_privilegio = $("#nuevo_privilegio").val();

  if(nombre_privilegio.length == 0){
    Swal.fire({
      title:'Mensaje',
      text:'Debes ingresar un nombre en este campo',
      icon:'warning',
      timer:2000
    });
  }else{
    $.ajax({
      type:'POST',
      data:{nombre_privilegio},
      url:'templates/usuario/new_privilegio.php',
      success:function(response){
        if(response == "si"){
          Swal.fire({
            title:'Mensaje',
            text:'EL Rol ha sido creado!',
            icon:'success',
            timer:2000
          });
          traer_privilegios();
        }
      }
    });
  }
});


//////////////////////// CARGAR LOS PRIVILEGIOS
function traer_privilegios(){

  $.ajax({
    url:'templates/usuario/traer_privilegio.php',
    success:function(response){
      let traer = JSON.parse(response);
      let template = "";

      traer.forEach(x=>{
        template += 
        `
          <option value='${x.id_privilegio}'>${x.privilegio}</option>    
        `;
      });

      $("#selecte").html("<option value='0'>Seleccione...</option>"+template);
    }
  })
}


///////// FUNCION PARA TRAER LOS PRIVILEGIOS
function leer_privilegios(id_privilegio){
  $.ajax({
    type:'POST',
    data:{id_privilegio},
    url:'templates/usuario/listar_privilegios.php',
    success:function(response){
      let traer = JSON.parse(response);
      let template = "";
      let modulos = ['Modulos','Usuarios', 'Clientes', 'Items', 'Ordenes trabajo (OT)', 'Servicios', 'Informes', 'Documentación', 'Cargos']
      let f = 0;

      let modulo1 = "";
      let modulo2 = "";
      let modulo3 = "";
      let modulo4 = "";
      let modulo5 = "";
      let modulo6 = "";
      let modulo7 = "";
      let modulo8 = "";
      let modulo9 = "";

      traer.forEach(x=>{

        if(x.modulo == 1){
          modulo1 = `<input type='checkbox' class='form-control' id='modulo1' name="modulo1" checked>`;
        }else{
          modulo1 = `<input type='checkbox' class='form-control' id='modulo1' name="modulo1">`;
        } 

        if(x.usuario == 1){
          modulo2 = `<input type='checkbox' class='form-control' id='modulo2' name="modulo2" checked>`;
        }else{
          modulo2 = `<input type='checkbox' class='form-control' id='modulo2' name="modulo2">`;
        }

        if(x.cliente == 1){
          modulo3 = `<input type='checkbox' class='form-control' id='modulo3' name="modulo3" checked>`;
        }else{
          modulo3 = `<input type='checkbox' class='form-control' id='modulo3' name="modulo3">`;
        }

        if(x.item == 1){
          modulo4 = `<input type='checkbox' class='form-control' id='modulo4' name="modulo4" checked>`;
        }else{
          modulo4 = `<input type='checkbox' class='form-control' id='modulo4' name="modulo4">`;
        }

        if(x.orden_trabajo == 1){
          modulo5 = `<input type='checkbox' class='form-control' id='modulo5' name="modulo5" checked>`;
        }else{
          modulo5 = `<input type='checkbox' class='form-control' id='modulo5' name="modulo5">`;
        }

        if(x.servicio == 1){
          modulo6 = `<input type='checkbox' class='form-control' id='modulo6' name="modulo6" checked>`;
        }else{
          modulo6 = `<input type='checkbox' class='form-control' id='modulo6' name="modulo6">`;
        }

        if(x.informe == 1){
          modulo7 = `<input type='checkbox' class='form-control' id='modulo7' name="modulo7" checked>`;
        }else{
          modulo7 = `<input type='checkbox' class='form-control' id='modulo7' name="modulo7">`;
        }

        if(x.documentacion == 1){
          modulo8 = `<input type='checkbox' class='form-control' id='modulo8' name="modulo8" checked>`;
        }else{
          modulo8 = `<input type='checkbox' class='form-control' id='modulo8' name="modulo8">`;
        }

        if(x.cargo == 1){
          modulo9 = `<input type='checkbox' class='form-control' id='modulo9' name="modulo9" checked>`;
        }else{
          modulo9 = `<input type='checkbox' class='form-control' id='modulo9' name="modulo9">`;
        }





        template += 
        `
          
          <tr>
            <td>${modulos[0]}</td>
            <td>${modulo1}</td>
          </tr>
          <tr>
            <td>${modulos[1]}</td>
            <td>${modulo2}</td>
          </tr>
          <tr>
            <td>${modulos[2]}</td>
            <td>${modulo3}</td>
          </tr>
          <tr>
            <td>${modulos[3]}</td>
            <td>${modulo4}</td>
          </tr>
          <tr>
            <td>${modulos[4]}</td>
            <td>${modulo5}</td>
          </tr>
          <tr>
            <td>${modulos[5]}</td>
            <td>${modulo6}</td>
          </tr>
          <tr>
            <td>${modulos[6]}</td>
            <td>${modulo7}</td>
          </tr>
          <tr>
            <td>${modulos[7]}</td>
            <td>${modulo8}</td>
          </tr>
          <tr>
            <td>${modulos[8]}</td>
            <td>${modulo9}</td>
          </tr>
        
        `;

        f = f+1;

      });



      $("#container").html(template);
    }
  }) 

}


/////////// EVENTO PARA CAMBIAR DE ROLES
$("#selecte").change(function(){

  let id_privilegio = $(this).val();

  $("#id_privilegio").val(id_privilegio);

  leer_privilegios(id_privilegio);

});


///////////////// EVENTO PARA CAMBIAR LOS PRIVILEGIOS
$("#formulario_privilegios").submit(function(e){
    e.preventDefault();
    let id_privilegio =  $("#id_privilegio").val();
    
    $.ajax({
      url: 'templates/usuario/actualizar_privilegio.php',
      type: 'POST',
      dataType: 'html',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(response){		
        
        location.reload();
        /*

        if(response == 'Si'){
          Swal.fire({
            title:'Mensaje',
            text:'Se ha modificado los privilegios, correctamente',
            icon:'success'
          });
          
        }*/
  
      }	
    });

})

		
				





