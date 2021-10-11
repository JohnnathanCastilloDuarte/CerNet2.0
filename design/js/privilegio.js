
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


$("#selecte").change(function(){

  let id_privilegio = $(this).val();

  $.ajax({
    type:'POST',
    data:{id_privilegio},
    url:'templates/usuario/listar_privilegios.php',
    success:function(response){
      console.log(response);
      let traer = JSON.parse(response);
      let template = "";
      let modulos = ['Modulos','Usuarios', 'Clientes', 'Items', 'Ordenes trabajo (OT)', 'Servicios', 'Informes', 'Documentación', 'Cargos']
      let f = 0;

      traer.forEach(x=>{

        
        template += 
        `
          <tr>
            <td>${modulos[0]}</td>
            <td>${x.modulo}</td>
          </tr>
          <tr>
            <td>${modulos[1]}</td>
            <td>${x.usuario}</td>
          </tr>
          <tr>
            <td>${modulos[2]}</td>
            <td>${x.cliente}</td>
          </tr>
          <tr>
            <td>${modulos[3]}</td>
            <td>${x.item}</td>
          </tr>
          <tr>
            <td>${modulos[4]}</td>
            <td>${x.orden_trabajo}</td>
          </tr>
          <tr>
            <td>${modulos[5]}</td>
            <td>${x.servicio}</td>
          </tr>
          <tr>
            <td>${modulos[6]}</td>
            <td>${x.informe}</td>
          </tr>
          <tr>
            <td>${modulos[7]}</td>
            <td>${x.documentacion}</td>
          </tr>
          <tr>
            <td>${modulos[8]}</td>
            <td>${x.cargo}</td>
          </tr>
        
        
        
        `;

        f = f+1;

      });

      $("#container").html(template);
    }
  })
});



		
				





