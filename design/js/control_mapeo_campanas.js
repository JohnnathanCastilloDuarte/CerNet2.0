var id_asignado = $("#id_asignado_campana").val();
$("#alerta_1").hide();
$("#ir_informe_campanas").click(function(){

  window.open("templates/campana_extraccion/informes/inspeccion_de_campanas.php");
});

//Validar responsable
$("#responsable").blur(function(){
 let usuario = $("#responsable").val();
 $.ajax({
    type:'POST',
    data:{usuario},
    url:'templates/usuario/validar_usuario.php',
    success:function(e){
      console.log(e)
      if(e == 'disponible'){
         $("#responsable").css("border-color", "red");
         $("#alerta_1").show();
       }else{
         $("#alerta_1").hide();
         $("#responsable").css("border-color", "#03cb1b");
       }
     }
   });   
});

consultando_ot();

validador_de_pruebas(1);
validador_de_pruebas(2);
validador_de_pruebas(3);
validador_de_pruebas(4);
validador_de_pruebas(5);
validador_de_pruebas(6);
validador_de_pruebas(7);
validador_de_pruebas(8);


 
function listar_datos_full(numeral){
    let movimiento = "Listar_"+numeral;
    if(numeral == 1){
      $.ajax({
        type:'POST',
        data:{id_asignado,movimiento},
        url:'templates/campana_extraccion/controlador_camara_extraccion.php',
        success:function(response){
          //console.log(response);
          let traer = JSON.parse(response);
          let template = "";
          traer.forEach((valor)=>{
  
             $("#valor_insp_1").val(valor.insp_1);
             $("#valor_insp_1").text(valor.insp_1);
             $("#valor_insp_2").val(valor.insp_2);
             $("#valor_insp_2").text(valor.insp_2);
             $("#valor_insp_3").val(valor.insp_3);
             $("#valor_insp_3").text(valor.insp_3);
             $("#valor_insp_4").val(valor.insp_4);
             $("#valor_insp_4").text(valor.insp_4);
             $("#valor_insp_5").val(valor.insp_5);
             $("#valor_insp_5").text(valor.insp_5);
             $("#id_inspeccion").val(valor.id_inspeccion);
          
            
          });
  
        }
      });
    }else if(numeral == 2){

      let array_pruebas = ['Velocidad de Aire, 25% Apertura (m/s)', 'Velocidad de Aire, 50% Apertura (m/s)', 'Velocidad de Aire, 75% Apertura (m/s)', 'Velocidad de Aire, 100% Apertura (m/s)', 'Medición de Temperatura', 'Medición de Humedad Relativa', 'Presión Sonora Equipo', 'Presión Sonora Sala', 'Nivel de Iluminación', 'Prueba de Humo'];

      $.ajax({
        type:'POST',
        data:{id_asignado,movimiento},
        url:'templates/campana_extraccion/controlador_camara_extraccion.php',
        success:function(response){
          
          let traer = JSON.parse(response);
          let template = "";
          let increment = 0;

          traer.forEach((valor)=>{
            template+=
            `
            <tr>
              <td>${array_pruebas[increment]}</td>
              <input type="hidden" name="id_prueba_1[]" value="${valor.id_prueba}">
              <td><input type="text" name="requisito[]" class="form-control" value="${valor.requisito}"></td>
              <td><input type="text" name="valor_obtenido[]" class="form-control" value="${valor.valor_obtenido}"></td>
              <td><input type="text" name="veredicto[]" class="form-control" value="${valor.veredicto}"></td>
            </tr>
            `;
            increment++;
          });

          $("#resultados_prueba_1").html(template);
         
        }
      });

    }else if(numeral == 3){

      let array_nombres = ['25%','50%','70%','100%'];
  

      $.ajax({
        type:'POST',
        data:{id_asignado,movimiento},
        url:'templates/campana_extraccion/controlador_camara_extraccion.php',
        success:function(response){
         
          let traer = JSON.parse(response);
          let template = "";
          let validador = 0;

          traer.forEach((valor)=>{
            
            template += 
            `
              <tr>
                <td>${array_nombres[validador]}</td>
                <input type="hidden" value="${valor.id_prueba}" name="prueba_3_id[]">
                <td><input type="text" class="form-control" name="prueba_3_medicion_1[]" value="${valor.medicion_1}"></td>
                <td><input type="text" class="form-control" name="prueba_3_medicion_2[]" value="${valor.medicion_2}"></td>
                <td><input type="text" class="form-control" name="prueba_3_medicion_3[]" value="${valor.medicion_3}"></td>
                <td><input type="text" class="form-control" name="prueba_3_medicion_4[]" value="${valor.medicion_4}"></td>
                <td><input type="text" class="form-control" name="prueba_3_medicion_5[]" value="${valor.medicion_5}"></td>
                <td><input type="text" class="form-control" name="prueba_3_medicion_6[]" value="${valor.medicion_6}"</td>
              </tr>
            `;
        
            validador++;
          });
          
          $("#pb_mediciones_aire").html(template);
        }
      });
    
    
    }else if(numeral == 4){

      let array_nombres = ['25%','50%','70%','100%'];
  

      $.ajax({
        type:'POST',
        data:{id_asignado,movimiento},
        url:'templates/campana_extraccion/controlador_camara_extraccion.php',
        success:function(response){
        
          let traer = JSON.parse(response);
          let template = "";
          let validador = 0;

          traer.forEach((valor)=>{
            
            template += 
            `
              <tr>
                <td>${array_nombres[validador]}</td>
                <input type="hidden" value="${valor.id_prueba}" name="prueba_4_id[]">
                <td><input type="text" class="form-control" name="prueba_4_medicion_1[]" value="${valor.medicion_1}"></td>
                <td><input type="text" class="form-control" name="prueba_4_medicion_2[]" value="${valor.medicion_2}"></td>
                <td><input type="text" class="form-control" name="prueba_4_medicion_3[]" value="${valor.medicion_3}"></td>
                <td><input type="text" class="form-control" name="prueba_4_medicion_4[]" value="${valor.medicion_4}"></td>
              </tr>
            `;
            
            validador++;
          });
          
          $("#pb_resumen").html(template);
        }
      });
    }else if(numeral == 5){

      let array_nombres_1 = ['Temperatura,°C','Humedad Relativa, %'];
      let array_nombres_2 = ['Equipo(dB-A Lento)', 'Sala(dB-A Lento)'];
      let array_nombres_3 = ['lux'];
  

      $.ajax({
        type:'POST',
        data:{id_asignado,movimiento},
        url:'templates/campana_extraccion/controlador_camara_extraccion.php',
        success:function(response){
          //console.log(response);
          let traer = JSON.parse(response);
          let template1 = "";
          let template2 = "";
          let template3 = "";
          let validador1 = 0;
          let validador2 = 0;
          let validador3 = 0;


          traer.forEach((valor)=>{

            if(valor.categoria == 1){
              template1+=
              `
              <tr>
                <td>${array_nombres_1[validador1]}</td>
                <input type="hidden" value="${valor.id_prueba}" name="prueba_51_id[]">
                <td><input type="text" class="form-control" name="prueba_51_medicion_1[]" value="${valor.punto_1}"></td>
                <td><input type="text" class="form-control" name="prueba_51_medicion_2[]" value="${valor.punto_2}"></td>
                <td><input type="text" class="form-control" name="prueba_51_medicion_3[]" value="${valor.punto_3}"></td>
                <td><input type="text" class="form-control" name="prueba_51_medicion_4[]" value="${valor.punto_promedio}"></td>
              </tr>
              `;
              validador1++;
            }

            if(valor.categoria == 2){
              template2+=
              `
              <tr>
                <td>${array_nombres_2[validador2]}</td>
                <input type="hidden" value="${valor.id_prueba}" name="prueba_52_id[]">
                <td><input type="text" class="form-control" name="prueba_52_medicion_1[]" value="${valor.punto_1}"></td>
                <td><input type="text" class="form-control" name="prueba_52_medicion_2[]" value="${valor.punto_2}"></td>
                <td><input type="text" class="form-control" name="prueba_52_medicion_3[]" value="${valor.punto_3}"></td>
                <td><input type="text" class="form-control" name="prueba_52_medicion_4[]" value="${valor.punto_promedio}"></td>
              </tr>
              `;
              validador2++;
            }

            if(valor.categoria == 3){
              template3+=
              `
              <tr>
                <td>${array_nombres_3[validador3]}</td>
                <input type="hidden" value="${valor.id_prueba}" name="prueba_53_id[]">
                <td><input type="text" class="form-control" name="prueba_53_medicion_1[]" value="${valor.punto_1}"></td>
                <td><input type="text" class="form-control" name="prueba_53_medicion_2[]" value="${valor.punto_2}"></td>
                <td><input type="text" class="form-control" name="prueba_53_medicion_3[]" value="${valor.punto_3}"></td>
                <td><input type="text" class="form-control" name="prueba_53_medicion_4[]" value="${valor.punto_4}"></td>
                <td><input type="text" class="form-control" name="prueba_53_medicion_5[]" value="${valor.punto_5}"></td>
                <td><input type="text" class="form-control" name="prueba_53_medicion_6[]" value="${valor.punto_promedio}"></td>
              </tr>
              `;
              validador3++;
            }

          });
          
          
          $("#pb_Punto_Muestreo").html(template1);
          $("#pb_resumen_presion_sonora").html(template2);
          $("#pb_dsn594").html(template3);
        }
      });
    
    
    }else if(numeral == 6){
      
      let primer_prueba = ['Ubicación de Prueba', 'Dirección del Flujo Especificado', 'Visualización de Flujo Reverso', 'Visualización de Vórtices', 'Cumple Especificaciones']; 
      let segundo_prueba = ['Ubicación de Prueba', 'Visualización de Flujo Reverso', 'Visualización de Puntos Muertos', 'Cumple Especificaciones', 'Cumple Prueba de Humo'];

      $.ajax({
        type:'POST',
        data:{id_asignado,movimiento},
        url:'templates/campana_extraccion/controlador_camara_extraccion.php',
        success:function(response){
          //console.log(response);
          let traer = JSON.parse(response);
          let template1 = "";
          let template2 = "";
          let contador_1 = 0;
          let contador_2 = 0;


          traer.forEach((valor)=>{

            if(valor.categoria == 1){

              template1 += 
              `
              <tr>
                <td>${primer_prueba[contador_1]}</td>
                <input type="hidden" name="id_prueba_5[]" value="${valor.id_prueba}">
                <td><input type="text" name="resultado_prueba_5[]" class="form-control " placeholder="-" value="${valor.resultado}"></td>
                <td><select name="cumple_prueba_5[]" class="form-control">
                  <option value="${valor.cumple}">${valor.cumple}</option>
                  <option value="NA">NA</option>
                  <option>CUMPLE</option>
                </select></td>
              </tr>
              `;
              contador_1++;
            }

            else if(valor.categoria == 2){

              template2 += 
              `
              <tr>
                <td>${segundo_prueba[contador_2]}</td>
                <input type="hidden" name="id_prueba_5[]" value="${valor.id_prueba}">
                <td><input type="text" name="resultado_prueba_5[]" class="form-control " placeholder="-" value="${valor.resultado}"></td>
                <td><select name="cumple_prueba_5[]" class="form-control">
                <option value="${valor.cumple}">${valor.cumple}</option>
                  <option>NA</option>
                  <option>CUMPLE</option>
                </select></td>
              </tr>
              `;
              contador_2++;
            }


          });

          $("#Contencion_de_Aire_Externo").html(template1);
          $("#Pb_unidireccional").html(template2);
          
      
        }
      });

    }

    else if(numeral == 7){
      
      $.ajax({
        type:'POST',
        data:{id_asignado,movimiento},
        url:'templates/campana_extraccion/controlador_camara_extraccion.php',
        success:function(response){
          console.log(response);
          let traer = JSON.parse(response);
          
          traer.forEach((valor)=>{

           $("#id_informe_campana").val(`${valor.id_informe}`);
           $("#nombre_informe").val(`${valor.nombre_informe}`);
           $("#solicitante").val(`${valor.solicitante}`);
           $("#responsable").val(`${valor.usuario_responsable}`); 
           $("#conclusion").val(`${valor.conclusion}`);


          });
      
        }
      });

     

    }


    
}
/*a
validador_de_pruebas(1);
validador_de_pruebas(2);
validador_de_pruebas(3);
validador_de_pruebas(4);
validador_de_pruebas(5);
validador_de_pruebas(6);
validador_de_pruebas(7);
validador_de_pruebas(8);*/

listar_datos_full(1);
listar_datos_full(2);
listar_datos_full(3);
listar_datos_full(4);
listar_datos_full(5);
listar_datos_full(6);
listar_datos_full(7);

function validador_de_pruebas(validator){

  let movimiento = "Validador_creator";

  const datos = {
    movimiento,
    id_asignado,
    validator
  }

  $.ajax({
    type:'POST',
    data:datos,
    url:'templates/campana_extraccion/controlador_camara_extraccion.php',
    success:function(response){
     
    }
  })
}

///////////// CONSULTAR DATOS DE LA OT
function consultando_ot(){
  
  $.ajax({
    type:'POST',
    url:'templates/campana_extraccion/datos_ot.php',
    data:{id_asignado},
    success:function(response){
       //console.log(response); 
      let traer = JSON.parse(response);
      
      traer.forEach((x)=>{
        $("#ot_campana_label").text(x.ot);
        $("#cliente_campana_label").text(x.cliente);   

        $("#nombre_informe").val(x.sigla_pais+x.num_ot+"-"+'DOC123-CLI108-CE'); 
      })
          
      
    }
  });
}


////////////////////// EVENTO DEL FORMULARIOS

$("#formulario_1_campana_extraccion").submit(function(e){

    e.preventDefault();
    
    var formData = new FormData(document.getElementById("formulario_1_campana_extraccion"));
    
    $.ajax({
      url: 'templates/campana_extraccion/almacena_informacion_1.php',
      type: 'POST',
      dataType: 'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(response) {
        console.log(response);

        if(response == "Listo"){
          Swal.fire({
            title:'Mensaje',
            text:'Se ha actualizado la información con exito!',
            icon:'success',
            timer:1700
          });
          listar_datos_full(1);
          listar_datos_full(2);
        }
      }
    });  
});


$("#formulario_2_campana_extraccion").submit(function(e){

  e.preventDefault();

  var formData = new FormData(document.getElementById("formulario_2_campana_extraccion"));
    
  $.ajax({
    url: 'templates/campana_extraccion/almacena_informacion_2.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success:function(response) {
      //console.log(response);

      if(response == "Listo"){
        Swal.fire({
          title:'Mensaje',
          text:'Se ha actualizado la información con exito!',
          icon:'success',
          timer:1700
        });
        listar_datos_full(3);
        listar_datos_full(4);
        listar_datos_full(5);
        listar_datos_full(6);
      }
    }
  }); 
});


///////////////// CONTROLA EVIDENCIAS TECNICAS
listar_imagenes();

function listar_imagenes(){

  let movimiento = "Leer";

  $.ajax({
    type:'POST',
    data:{id_asignado, movimiento},
    url:'templates/campana_extraccion/controlador_imagenes.php',
    success:function(response){
      //console.log(response);

      let traer = JSON.parse(response);
      let template1 = "";
      let template2 = "";
      let template3 = "";
      let template4 = "";
      let template5 = "";
      let template6 = "";
      let template7 = "";

      traer.forEach((valor)=>{

        if(valor.tipo == 1){

          template1 += 
          `
            <div class="col-sm-4">
              <a class="btn btn-danger" id="eliminar_imagen" value="${valor.id_imagen}" style="color: white;margin-left: 106%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/campana_extraccion/${valor.url}${valor.nombre}">
            </div>
          `;
        }
        else if(valor.tipo == 2){

          template2 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" value="${valor.id_imagen}" style="color: white;margin-left: 106%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/campana_extraccion/${valor.url}${valor.nombre}">
            </div>
          `;
        }
        else if(valor.tipo == 3){

          template3 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" value="${valor.id_imagen}" style="color: white;margin-left: 106%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/campana_extraccion/${valor.url}${valor.nombre}">
            </div>
          `;
        }
        else if(valor.tipo == 4){

          template4 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" value="${valor.id_imagen}" style="color: white;margin-left: 106%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/campana_extraccion/${valor.url}${valor.nombre}">
            </div>
          `;
        }
        else if(valor.tipo == 5){

          template5 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" value="${valor.id_imagen}" style="color: white;margin-left: 106%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/campana_extraccion/${valor.url}${valor.nombre}">
            </div>
          `;
        }
        else if(valor.tipo == 6){

          template6 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" value="${valor.id_imagen}" style="color: white;margin-left: 106%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/campana_extraccion/${valor.url}${valor.nombre}">
            </div>
          `;
        }
        else{

          template7 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" value="${valor.id_imagen}" style="color: white;margin-left: 106%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/campana_extraccion/${valor.url}${valor.nombre}">
            </div>
          `;
        }
      });

      $("#Listar_img_c1").html(template1);
      $("#Listar_img_c2").html(template2);
      $("#Listar_img_c3").html(template3);
      $("#Listar_img_c4").html(template4);
      $("#Listar_img_c5").html(template5);
      $("#Listar_img_c6").html(template6);
      $("#Listar_img_c7").html(template7);

    }

  });
}



$("#formulario_evidencias_graficas_campana").submit(function(e){

  e.preventDefault();
  var formData = new FormData(document.getElementById("formulario_evidencias_graficas_campana"));

  $.ajax({
    url: 'templates/campana_extraccion/guardar_evidencia_grafica.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success:function(response) {
      //console.log(response);
      if(response == "Movido"){
        Swal.fire({
          title:'Mensaje',
          text:'Se ha configurado la imagen correctamente',
          icon:'success',
          timer:1700
        });
        listar_imagenes();
      }
    }
  }); 
});


$("#abrir_informe").click(function(){
  
   let encrypt = "LF456DS4G5DS4F5SD21G4DFSGF14DS2vDF2bfg56f1d56sf15ds6f4g534G564g56f4g56df4g561G6F4D5G6DF4G564FG5DG"+id_asignado;
   //window.open("templates/filtros/informes/informe/inspeccion_de_filtros.php");
    window.open('templates/campana_extraccion/informes/informes/inspeccion_de_campanas.php?clave='+encrypt);
   

});
