
var id_asignado = $("#id_asignado_sala_limpia").val();


validacion_salas_limpias(100);
validacion_salas_limpias(200);
validacion_salas_limpias(300);
validacion_salas_limpias(400);
validacion_salas_limpias(500);
validacion_salas_limpias(500);
validacion_salas_limpias(600);
validacion_salas_limpias(700);
validacion_salas_limpias(800);
validacion_salas_limpias(900);
validacion_salas_limpias(1000);

function listar_resultados_prueba(orden){

    if(orden == 1){

        let array_nombres = ['>=0,5', '>=5,0', '>=0,5', '>=5,0'];

        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                
                let traer = JSON.parse(response);
                let template1 = "";
                let template2 = "";
                let contador = 0;

                traer.forEach((valor)=>{
                  if(valor.categoria == 1){
                      template1 += 
                      `
                        <tr>
                            <td>${array_nombres[contador]}<input type="hidden" name="id_prueba_1[]" value="${valor.id_prueba}"></td>
                            <td><input type="text" name="media_promedios_p1[]" value="${valor.medida_promedio}" class="form-control"></td>
                            <td><input type="text" name="desviacion_estandar_p1[]" value="${valor.desviacion_estandar}" class="form-control"></td>
                            <td><input type="text" name="maximo_p1[]" value="${valor.maximo}" class="form-control"></td>
                            <td><input type="text" name="cumple_p1[]" value="${valor.cumple}" class="form-control"></td>
                        </tr>
                      
                      `;
                  }else{
                      template2 += 
                      `
                      <tr>
                        <td>${array_nombres[contador]}<input type="hidden" name="id_prueba_1[]" value="${valor.id_prueba}"></td>
                        <td><input type="text" name="promedios_p1[]" value="${valor.promedios}" class="form-control"></td>
                        <td><input type="text" name="cumple_p1[]" value="${valor.cumple}" class="form-control"></td>
                      </tr>
                      `;
                  }
                  contador++;
                });

                $("#listar_p1").html(template1);
                $("#listar_p2").html(template2);
            }
        })
    }

    else if(orden == 2){

        let array_nombres = ['Lugar de Medición', 'Medición Realizada en', 'Resultado (Pa)', 'Presión especificada (Pa)', 'Tipo de Presión', 'Cumple Especificación'];

        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
           
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;
                
                traer.forEach((valor)=>{
                  template +=
                  ` 
                    <tr>
                        
                        <td>${array_nombres[contador]}<input type="hidden" name="id_prueba_3[]" value="${valor.id_prueba}"></td>
                        <td><input type="text" class="form-control" name="medicion_1_p3[]" value="${valor.medicion1}"></td>
                        <td><input type="text" class="form-control" name="medicion_2_p3[]" value="${valor.medicion2}"></td>
                        <td><input type="text" class="form-control" name="medicion_3_p3[]" value="${valor.medicion3}"></td>
                        <td><input type="text" class="form-control" name="medicion_4_p3[]" value="${valor.medicion4}"></td>
                    <tr>
                  `;
                  contador++;
                });

                $("#tabla_prueba_3").html(template);
                
            }
        })
    }

    else if(orden == 3){

       

        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
               
                let traer = JSON.parse(response);
                let template1 = "";
                let template2 = "";
                let template3 = "";
                let template4 = "";
                let contador = 0;


                traer.forEach((valor)=>{
                    
                    if(valor.categoria == 1){
                        template1+=
                        `
                            <div class="col-sm-12">
                                <table class="table">
                                    <thead>
                                        <th>Muestras</th>
                                        <th>N°1</th>
                                        <th>N°2</th>
                                        <th>N°3</th>
                                        <th>N°4</th>
                                        <th>N°5</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Resultado, °C <input type="hidden" name="id_prueba_4" value="${valor.id_prueba}"></td>
                                            <td><input type="text" name="n1_p4" class="form-control" value="${valor.n1}"></td>
                                            <td><input type="text" name="n2_p4" class="form-control" value="${valor.n2}"></td>
                                            <td><input type="text" name="n3_p4" class="form-control" value="${valor.n3}"></td>
                                            <td><input type="text" name="n4_p4" class="form-control" value="${valor.n4}"></td>
                                            <td><input type="text" name="n5_p4" class="form-control" value="${valor.n5}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <div class="row" style="text-align:center;">
                                        <div class="col-sm-4">
                                            <label>Promedio, C°: <input type="text" name="promedio_p4" class="form-control" value="${valor.promedio}"></label>  
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Especificación Cliente ,°C: <input type="text" name="especificacion_p4" class="form-control" value=""></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Cumple: <input type="text" name="cumple_p4" class="form-control" value="${valor.cumple}"></label>
                                        </div>
                                    </div>
                            </div>

                        `;
                    }
                    else if(valor.categoria == 2){
                        template2+=
                        `
                            <div class="col-sm-12">
                                <table class="table">
                                    <thead>
                                        <th>Muestras</th>
                                        <th>N°1</th>
                                        <th>N°2</th>
                                        <th>N°3</th>
                                        <th>N°4</th>
                                        <th>N°5</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Resultado, HR%<input type="hidden" name="id_prueba_5" value="${valor.id_prueba}"></td>
                                            <td><input type="text" name="n1_p5" class="form-control" value="${valor.n1}"></td>
                                            <td><input type="text" name="n2_p5" class="form-control" value="${valor.n2}"></td>
                                            <td><input type="text" name="n3_p5" class="form-control" value="${valor.n3}"></td>
                                            <td><input type="text" name="n4_p5" class="form-control" value="${valor.n4}"></td>
                                            <td><input type="text" name="n5_p5" class="form-control" value="${valor.n5}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <div class="row" style="text-align:center;">
                                <div class="col-sm-4">
                                    <label>Promedio, HR%: <input type="text" name="promedio_p5" class="form-control" value="${valor.promedio}"></label>  
                                </div>
                                <div class="col-sm-4">
                                    <label>Especificación Cliente ,HR%: <input type="text" name="especificacion_p5" class="form-control" value=""></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>Cumple: <input type="text" name="cumple_p5" class="form-control" value="${valor.cumple}"></label>
                                </div>
                            </div>
                            </div>

                        `;
                    }

                    else if(valor.categoria == 3){
                        template3+=
                        `
                            <div class="col-sm-12">
                                <table class="table">
                                    <thead>
                                        <th>Muestras</th>
                                        <th>N°1</th>
                                        <th>N°2</th>
                                        <th>N°3</th>
                                        <th>N°4</th>
                                        <th>N°5</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Resultado, Lux<input type="hidden" name="id_prueba_6" value="${valor.id_prueba}"></td>
                                            <td><input type="text" name="n1_p6" class="form-control" value="${valor.n1}"></td>
                                            <td><input type="text" name="n2_p6" class="form-control" value="${valor.n2}"></td>
                                            <td><input type="text" name="n3_p6" class="form-control" value="${valor.n3}"></td>
                                            <td><input type="text" name="n4_p6" class="form-control" value="${valor.n4}"></td>
                                            <td><input type="text" name="n5_p6" class="form-control" value="${valor.n5}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row" style="text-align:center;">
                                    <div class="col-sm-4">
                                        <label>Promedio, Lux: <input type="text" name="promedio_p6" class="form-control" value="${valor.promedio}"></label>  
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Especificación Cliente ,Lux: <input type="text" name="especificacion_p6" class="form-control" value=""></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Cumple: <input type="text" name="cumple_p6" class="form-control" value="${valor.cumple}"></label>
                                    </div>
                                </div>
                            </div>

                        `;
                    }

                    else if(valor.categoria == 4){
                        template4+=
                        `
                            <div class="col-sm-12">
                                <table class="table">
                                    <thead>
                                        <th>Muestras</th>
                                        <th>N°1</th>
                                        <th>N°2</th>
                                        <th>N°3</th>
                                        <th>N°4</th>
                                        <th>N°5</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Resultado, dBA<input type="hidden" name="id_prueba_7" value="${valor.id_prueba}"></td>
                                            <td><input type="text" name="n1_p7" class="form-control" value="${valor.n1}"></td>
                                            <td><input type="text" name="n2_p7" class="form-control" value="${valor.n2}"></td>
                                            <td><input type="text" name="n3_p7" class="form-control" value="${valor.n3}"></td>
                                            <td><input type="text" name="n4_p7" class="form-control" value="${valor.n4}"></td>
                                            <td><input type="text" name="n5_p7" class="form-control" value="${valor.n5}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <div class="row" style="text-align:center;">
                                <div class="col-sm-4">
                                    <label>Promedio, dBA: <input type="text" name="promedio_p7" class="form-control" value="${valor.promedio}"></label>  
                                </div>
                                <div class="col-sm-4">
                                    <label>Especificación Cliente ,dBA: <input type="text" name="especificacion_p7" class="form-control" value=""></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>Cumple: <input type="text" name="cumple_p7" class="form-control" value="${valor.cumple}"></label>
                                </div>
                            </div>
                            </div>

                        `;
                    }

                    contador++;
                });

                $("#medicion_temp").html(template1);
                $("#medicion_hr").html(template2);
                $("#medicion_lux").html(template3);
                $("#medicion_dba").html(template4);

            }
        })
    }


    else if(orden == 4){

        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
              
                let traer = JSON.parse(response);
                let template = "";
                let template2 = "";
                let contador = 0;
                let contador1 = 0;
                let enunciados = ['N°1','N°2','N°3','Promedio'];


                
              
            
                traer.forEach((valor)=>{
                    
                    if(valor.categoria == 1){
                        template+= 
                            `
                            <tr>
                                <td>${enunciados[contador]}<input type="hidden" name="id_prueba_8[]" value="${valor.id_prueba}"></td>
                                <td><input type="text" name="n1[]" class="form-control" value="${valor.n1}"></td>
                                <td><input type="text" name="n2[]" class="form-control" value="${valor.n2}"></td>
                                <td><input type="text" name="n3[]" class="form-control" value="${valor.n3}"></td>
                                <td><input type="text" name="n4[]" class="form-control" value="${valor.n4}"></td>
                                <td><input type="text" name="n5[]" class="form-control" value="${valor.n5}"></td>
                                <td><input type="text" name="n6[]" class="form-control" value="${valor.n6}"></td>
                                <td><input type="text" name="n7[]" class="form-control" value="${valor.n7}"></td>
                                <td><input type="text" name="n8[]" class="form-control" value="${valor.n8}"></td>
                                <td><input type="text" name="n9[]" class="form-control" value="${valor.n9}"></td>
                                <td><input type="text" name="n10[]" class="form-control" value="${valor.n10}"></td>
                                <td><input type="text" name="n11[]" class="form-control" value="${valor.n11}"></td>
                                <td><input type="text" name="n12[]" class="form-control" value="${valor.n12}"></td>
                                <td><input type="text" name="n13[]" class="form-control" value="${valor.n13}"></td>
                                <td><input type="text" name="n14[]" class="form-control" value="${valor.n14}"></td>
                                <td><input type="text" name="n15[]" class="form-control" value="${valor.n15}"></td>
                            </tr>
                            `;

                        contador++;
                    }

                    else{
                        template2+= 
                            `
                            <tr>
                                <td>${enunciados[contador1]}<input type="hidden" name="id_prueba_8[]" value="${valor.id_prueba}"></td>
                                <td><input type="text" name="n1[]" class="form-control" value="${valor.n1}"></td>
                                <td><input type="text" name="n2[]" class="form-control" value="${valor.n2}"></td>
                                <td><input type="text" name="n3[]" class="form-control" value="${valor.n3}"></td>
                                <td><input type="text" name="n4[]" class="form-control" value="${valor.n4}"></td>
                                <td><input type="text" name="n5[]" class="form-control" value="${valor.n5}"></td>
                                <td><input type="text" name="n6[]" class="form-control" value="${valor.n6}"></td>
                                <td><input type="text" name="n7[]" class="form-control" value="${valor.n7}"></td>
                                <td><input type="text" name="n8[]" class="form-control" value="${valor.n8}"></td>
                                <td><input type="text" name="n9[]" class="form-control" value="${valor.n9}"></td>
                                <td><input type="text" name="n10[]" class="form-control" value="${valor.n10}"></td>
                                <td><input type="text" name="n11[]" class="form-control" value="${valor.n11}"></td>
                                <td><input type="text" name="n12[]" class="form-control" value="${valor.n12}"></td>
                                <td><input type="text" name="n13[]" class="form-control" value="${valor.n13}"></td>
                                <td><input type="text" name="n14[]" class="form-control" value="${valor.n14}"></td>
                                <td><input type="text" name="n15[]" class="form-control" value="${valor.n15}"></td>
                            </tr>
                            `;

                        contador1++;
                    }
                   
                    
                    
                });  
               


               $("#inyeccion_listar").html(template);
               $("#extraccion_listar").html(template2);
            }
        });
    }
    
    
    else if(orden == 5){


        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
           
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;
                
                traer.forEach((valor)=>{
                  template +=
                  ` 
                    <tr>
                        
                        <td><input type="text" name="medicion_1_p9" class="form-control" value="${valor.medicion_1}">
                        <input type="hidden" name="id_prueba_9" value="${valor.id_prueba}"></td>
                        <td><input type="text" name="medicion_2_p9" class="form-control" value="${valor.medicion_2}"></td>
                        <td><input type="text" name="medicion_3_p9" class="form-control" value="${valor.medicion_3}"></td>
                        <td><input type="text" name="medicion_4_p9" class="form-control" value="${valor.medicion_4}"></td>
                    <tr>
                  `;
                  contador++;
                });

                $("#renovaciones").html(template);
                
            }
        })
    }

    else if(orden == 6){


        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                console.log(response);
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;
                
                traer.forEach((valor)=>{
                    $("#id_ensayo_p11").val(valor.id_ensayo);
                    $("#ensayo_p11").val(valor.metodo_ensayo);
                    $("#ensayo_p12").val(valor.puntos_x_medicion);
                    $("#ensayo_p13").val(valor.muestra_x_punto);
                    $("#ensayo_p14").val(valor.volumen_muestra);
                    $("#ensayo_p15").val(valor.altura_muestras);
                });
            }
        })
    }

    else if(orden == 7){


        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                console.log(response);
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;
                
                traer.forEach((valor)=>{
                    $("#id_ensayo_p21").val(valor.id_ensayo);
                    $("#ensayo_p21").val(valor.metodo_ensayo);
                    $("#ensayo_p22").val(valor.especificacion);
                });
            }
        })
    }

    else if(orden == 8){


        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                console.log(response);
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;
                
                traer.forEach((valor)=>{
                    if(valor.categoria == 1){
                        $("#id_ensayo_p31").val(valor.id_ensayo);
                        $("#ensayo_p31").val(valor.metodo_ensayo);
                        $("#ensayo_p32").val(valor.n_muestras);
                        $("#ensayo_p33").val(valor.altura_muestra);
                    }else{
                        $("#id_ensayo_p41").val(valor.id_ensayo);
                        $("#ensayo_p41").val(valor.metodo_ensayo);
                        $("#ensayo_p42").val(valor.n_muestras);
                        $("#ensayo_p43").val(valor.altura_muestra);
                    }
                   
                });
            }
        })
    }

    else if(orden == 9){


        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                console.log(response);
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;
                
                traer.forEach((valor)=>{
                   
                    $("#id_ensayo_p51").val(valor.id_ensayo);
                    $("#ensayo_p51").val(valor.metodo_ensayo);
                    $("#ensayo_p52").val(valor.n_rejillas);
                    $("#ensayo_p53").val(valor.n_extractores);
                         
                });
            }
        })
    }

    else if(orden == 10){


        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                console.log(response);
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;
                
                traer.forEach((valor)=>{
                    $("#id_informe").val(valor.id_informe);
                    $("#conclusion_informe").val(valor.nombre_informe);
                    $("#solicitante").val(valor.solicitante);
                    $("#nombre_informe").val(valor.nombre_informe);
                         
                });
            }
        })
    }

}


function validacion_salas_limpias(orden){

    if(orden == 100){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                listar_resultados_prueba(1);
            }

        })
    }
    else if(orden == 200){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                listar_resultados_prueba(2);
            }
        });
    }

    else if(orden == 300){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){;
                listar_resultados_prueba(3);
            }
        });
    }
    else if(orden == 400){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
               
                listar_resultados_prueba(4);
            }
        });
    }
    else if(orden == 500){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                
                listar_resultados_prueba(5);
            }
        });
    }

    else if(orden == 600){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                
                listar_resultados_prueba(6);
            }
        });
    }

    else if(orden == 700){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                
                listar_resultados_prueba(7);
            }
        });
    }

    else if(orden == 800){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                
                listar_resultados_prueba(8);
            }
        });
    }

    else if(orden == 900){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                
                listar_resultados_prueba(9);
            }
        });
    }

    else if(orden == 1000){
        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                
                listar_resultados_prueba(10);
            }
        });
    }
}




/////////// ENVIANDO INFORMACIÓN DEL FORMULARIO
$("#formulario_salas").submit(function(e){

    e.preventDefault();

    var formData = new FormData(document.getElementById("formulario_salas"));
  
    $.ajax({
      url: 'templates/sala_limpia/guarda_informacion.php',
      type: 'POST',
      dataType: 'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(response) {
        console.log(response);
        Swal.fire({
            title:'Mensaje',
            text:'Se ha modificado la información de la Sala limpia',
            icon:'success',
            timer:1700
        });
        listar_resultados_prueba(1);
        listar_resultados_prueba(2);
        listar_resultados_prueba(3);
        listar_resultados_prueba(4);
        listar_resultados_prueba(5);
        listar_resultados_prueba(6);
        listar_resultados_prueba(7);
        listar_resultados_prueba(8);
        listar_resultados_prueba(9);
        listar_resultados_prueba(10);
        
      }
    });  

});


//////////////CONTROL DE EVIDENCIAS GRAFICAS 
listar_imagenes();

function listar_imagenes(){

  let movimiento = "Leer";

  $.ajax({
    type:'POST',
    data:{id_asignado, movimiento},
    url:'templates/sala_limpia/controlador_imagenes.php',
    success:function(response){
      console.log(response);

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
              <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 56%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/sala_limpia/${valor.url}${valor.nombre}" style="width: 100%;">
            </div>
          `;
        }/*
        else if(valor.tipo == 2){

          template2 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 56%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/sala_limpia/${valor.url}${valor.nombre}" style="width: 100%;">
            </div>
          `;
        }
        else if(valor.tipo == 3){

          template3 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 56%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/sala_limpia/${valor.url}${valor.nombre}" style="width: 100%;">
            </div>
          `;
        }
        else if(valor.tipo == 4){

          template4 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 56%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/sala_limpia/${valor.url}${valor.nombre}" style="width: 100%;">
            </div>
          `;
        }*/
        
      });

      $("#Listar_img_c1").html(template1);
      $("#Listar_img_c2").html(template2);
      $("#Listar_img_c3").html(template3);
      $("#Listar_img_c4").html(template4);
    }

  });
}

$("#formulario_evidencias_graficas_sala_limpia").submit(function(e){

    e.preventDefault();
    var formData = new FormData(document.getElementById("formulario_evidencias_graficas_sala_limpia"));
  
    $.ajax({
      url: 'templates/sala_limpia/guardar_evidencia_grafica.php',
      type: 'POST',
      dataType: 'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(response) {
        console.log(response);
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


$(document).on('click','#eliminar_imagen',function(){

let id_imagen = $(this).attr('data-id'  );
let movimiento = "Eliminar";

$.ajax({
    type:'POST',
    data:{id_imagen, movimiento},
    url:'templates/sala_limpia/controlador_imagenes.php',
    success:function(response){
        console.log(response);
        if(response == "listo"){
            Swal.fire({
                title:'Mensaje',
                text:'Se ha eliminado correctamente la imagen',
                icon:'success',
                timer:1700
            });
            listar_imagenes();
        }
    }
})


});

///////////// VER INFORME
$("#ver_informe_salas_limpias").click(function(){
    let encrypt = "LF456DS4G5DS4F5SD21G4DFSGF14DS2vDF2bfg56f1d56sf15ds6f4g534G564g56f4g56df4g561G6F4D5G6DF4G564FG5DG"+id_asignado;
    window.open('templates/sala_limpia/informes/informe/inspeccion_de_salas.php?clave='+encrypt); 
});







  


