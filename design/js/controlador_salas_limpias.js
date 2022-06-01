$("#alerta_1").hide();



//INFORMACION DE DATOS DEL ITEM 
var id_asignado = $("#id_asignado_sala_limpia").val();
var presion_sala_pa = $("#presion_sala_pa").val();
var especificacion_1_temp = $("#especificacion_1_temp").val();
var especificacion_2_temp = $("#especificacion_2_temp").val();
var especificacion_1_hum = $("#especificacion_1_hum").val();
var especificacion_2_hum = $("#especificacion_2_hum").val();
var n_rejillas = $("#ensayo_p52").val();
var n_extractores = $("#ensayo_p53").val();
var lux = Number($("#lux").val());
var ruido_dba = Number($("#ruido_dba").val());
var ren_hr = Number($("#ren_hr").val());

//Validar usuario responsable 

$("#responsable").blur(function(){
   let usuario = $("#responsable").val();
   $.ajax({
    type:'POST',
    data:{usuario},
    url:'templates/usuario/validar_usuario.php',
    success:function(e){
      //console.log(e)
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
                      <td>${array_nombres[contador]}<input required="" type="hidden" name="id_prueba_1[]" value="${valor.id_prueba}"></td>
                      <td><input required="" type="text" name="media_promedios_p1[]" placeholder="Media de promedios" value="${valor.medida_promedio}" class="form-control"></td>
                      <td><input required="" type="text" name="desviacion_estandar_p1[]" placeholder="Desviación estandar" value="${valor.desviacion_estandar}" class="form-control"></td>
                      <td><input required="" type="text" name="maximo_p1[]" value="${valor.maximo}" placeholder="Máximo" class="form-control"></td>
                      </tr>
                      
                      `;
                  }else{
                      template2 += 
                      `
                      <tr>
                      <td>${array_nombres[contador]}<input required="" type="hidden" name="id_prueba_1[]" value="${valor.id_prueba}"></td>
                      <td><input required="" type="text" name="promedios_p1[]" value="${valor.promedios}" class="form-control"></td>
                      <td><input required="" type="text" name="cumple_p1[]" value="${valor.cumple}" class="form-control"></td>
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

        let array_nombres = ['Lugar Medicion','Medición Realizada en', 'Resultado (Pa)', 'Tipo de Presión'];


        $.ajax({
            type:'POST',
            data:{id_asignado, orden},
            url:'templates/sala_limpia/controlador_sala_limpia.php',
            success:function(response){
                      console.log(response);
                      let traer = JSON.parse(response);
                      let template1 = "";
                      let contador = 0;
      
                      traer.forEach((valor)=>{
                        
                         if(valor.campo_1 == null || valor.campo_1 == ""){
                            valor.campo_1 = "Sin Registro";
                          }
                        
                          if(contador == 3){
                                                        
                            template1+= 
                             `
                               <input type="hidden" value="${valor.id_prueba_3_individual}" name="campo_id[]">
                               <div class="col-sm-3">
                                  <label>${array_nombres[contador]}</label>
                                  <select class="form-control col-sm-12" name="campo_1[]" >
                                        <option>${valor.campo_1}</option>
                                        <option value"Positiva">Positiva</option>
                                        <option value"Negativa">Negativa</option>
                                        <option value="Informativa">Informativa</option>
                                  </select>
                               </div>
                             
                                 <div class="col-sm-12" style="text-align: center;">
                                        <br>
                                       <button class="btn btn-danger" style="margin-bottom: 20px;" id="eliminar_prueba" data-id="${valor.id}" data-reel = "${valor.id_prueba_3}">Eliminar</button> 
                                  </div>
                                
                              `;
                              contador=0;
                           }else{
                             template1+= 
                               `
                                <input type="hidden" value="${valor.id_prueba_3_individual}" name="campo_id[]">
                                 <div class="col-sm-3">
                                    <label>${array_nombres[contador]}</label>
                                    <input type="text" name="campo_1[]" id="" class="form-control" value="${valor.campo_1}">
                                 </div>
                                `;
                             contador=contador + 1;   
                           }
                        
                        
                        
             
                            
                            });

                      $("#tabla").html(template1);


                    }//response
                }); //ajax

    }//if

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
                        <td>Resultado, °C <input required="" type="hidden" name="id_prueba_4" value="${valor.id_prueba}"></td>
                        <td><input required="" type="text" name="n1_p4" id="n1_p4" class="form-control" value="${valor.n1}"></td>
                        <td><input required="" type="text" name="n2_p4" id="n2_p4" class="form-control" value="${valor.n2}"></td>
                        <td><input required="" type="text" name="n3_p4" id="n3_p4" class="form-control" value="${valor.n3}"></td>
                        <td><input required="" type="text" name="n4_p4" id="n4_p4" class="form-control" value="${valor.n4}"></td>
                        <td><input required="" type="text" name="n5_p4" id="n5_p4" class="form-control" value="${valor.n5}"></td>
                        </tr>
                        </tbody>
                        </table>
                        <hr>
                        <div class="row"> 
                        <div class="col-sm-4">
                        <td>Promedio, C°:</td>
                        <td><input required="" readonly type="text" name="promedio_p4" id="promedio_p4" class="form-control" value="${valor.promedio}"></td>
                        </div>
                        <div class="col-sm-4">
                        <td><label>Estado</label></td>
                        <br>
                        <td><span id="estado_temp" style="font-size: 19px;"> </span></td>
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
                        <td>Resultado, HR%<input required="" type="hidden" name="id_prueba_5" value="${valor.id_prueba}"></td>
                        <td><input required="" required="" id="n1_p5" type="text" name="n1_p5" class="form-control" value="${valor.n1}"></td>
                        <td><input required="" required="" id="n2_p5" type="text" name="n2_p5" class="form-control" value="${valor.n2}"></td>
                        <td><input required="" required="" id="n3_p5" type="text" name="n3_p5" class="form-control" value="${valor.n3}"></td>
                        <td><input required="" required="" id="n4_p5" type="text" name="n4_p5" class="form-control" value="${valor.n4}"></td>
                        <td><input required="" required="" id="n5_p5" type="text" name="n5_p5" class="form-control" value="${valor.n5}"></td>
                        </tr>
                        </tbody>
                        </table>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                        <td>Promedio, HR%:
                        <td><input required="" readonly id="promedio_p5" type="text" name="promedio_p5" class="form-control" value="${valor.promedio}">
                        </div>
                        <div class="col-sm-4">
                        <td><label>Estado</label></td>
                        <br>
                        <td><span id="estado_hum" style="font-size: 19px;"> </span></td>
                       
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
                        <td>Resultado, Lux<input required="" type="hidden" name="id_prueba_6" value="${valor.id_prueba}"></td>
                        <td><input required="" id="n1_p6" type="text" name="n1_p6" class="form-control" value="${valor.n1}"></td>
                        <td><input required="" id="n2_p6" type="text" name="n2_p6" class="form-control" value="${valor.n2}"></td>
                        <td><input required="" id="n3_p6" type="text" name="n3_p6" class="form-control" value="${valor.n3}"></td>
                        <td><input required="" id="n4_p6" type="text" name="n4_p6" class="form-control" value="${valor.n4}"></td>
                        <td><input required="" id="n5_p6" type="text" name="n5_p6" class="form-control" value="${valor.n5}"></td>
                        </tr>
                        </tbody>
                        </table>  
                        <hr>  
                        <div class="row">
                        <div class="col-sm-4">
                        <td>Promedio, Lux:
                        <td><input required="" readonly id="promedio_p6" type="text" name="promedio_p6" class="form-control" value="${valor.promedio}">

                        </div>
                        <div class="col-sm-4">
                        <td><label>Estado</label></td>
                        <br>
                        <td><span id="estado_lux" style="font-size: 19px;"> </span></td>
                        </div>
                        </div>
                        </tbody>
                        </table>


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
                    <td>Resultado, dBA<input required="" type="hidden" name="id_prueba_7[]" value="${valor.id_prueba}"></td>
                    <td><input required="" id="n1_p7" type="text" name="n1_p7[]" class="form-control" value="${valor.n1}"></td>
                    <td><input required="" id="n2_p7" type="text" name="n2_p7[]" class="form-control" value="${valor.n2}"></td>
                    <td><input required="" id="n3_p7" type="text" name="n3_p7[]" class="form-control" value="${valor.n3}"></td>
                    <td><input required="" id="n4_p7" type="text" name="n4_p7[]" class="form-control" value="${valor.n4}"></td>
                    <td><input required="" id="n5_p7" type="text" name="n5_p7[]" class="form-control" value="${valor.n5}"></td>
                    </tr>
                    </tbody>
                    </table>
                    <hr>    
                    <div class="row">
                    <div class="col-sm-4">
                    Promedio, dBA
                    <input required="" readonly  id="promedio_p7" type="text" name="promedio_p7[]" class="form-control" value="${valor.promedio}">
                    </div>
                    <div class="col-sm-4">
                    <td><label>Estado</label></td>
                    <br>
                    <td>
                    <span id="estado_dba" style="font-size: 19px;"></span></td>
                    </div>
                    </div> 
                    </tbody>
                    </table>

                    </div>

                    `;
                }

                contador++;
            });

          $("#medicion_temp").html(template1);
          $("#medicion_hr").html(template2);
          $("#medicion_lux").html(template3);
          $("#medicion_dba").html(template4);
          calcular_promedio_1();
          calcular_promedio_2();
          calcular_promedio_3();
          calcular_promedio_4();

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

                    if (contador < 3){


                       
                        let bl1 = "readonly";
                        let bl2 = "readonly";
                        let bl3 = "readonly";
                        let bl4 = "readonly";
                        let bl5 = "readonly";
                        let bl6 = "readonly";
                        let bl7 = "readonly";
                        let bl8 = "readonly";
                        let bl9 = "readonly";
                        let bl10 = "readonly";
                        let bl11 = "readonly";
                        let bl12 = "readonly";
                        let bl13 = "readonly";
                        let bl14 = "readonly";
                        let bl15 = "readonly";

                        bloquedo = [

                          bl1,
                          bl2,
                          bl3,
                          bl4,
                          bl5,
                          bl6,
                          bl7,
                          bl8,
                          bl9,
                          bl10,
                          bl11,
                          bl12,
                          bl13,
                          bl14,
                          bl15
                        ]

                         

                        for(i = 0; i < n_rejillas; i++){

                           bloquedo[i] = ""

                        }


                        template+= 
                        `
                        <tr>
                        <td>${enunciados[contador]}<input type="hidden" name="id_prueba_8[]" value="${valor.id_prueba}"></td>
                        <td><input type="text" name="n1[]" id="n1${contador}" class="form-control" value="${valor.n1}" ${bloquedo[0]}></td>
                        <td><input type="text" name="n2[]" class="form-control" value="${valor.n2}" ${bloquedo[1]}></td>
                        <td><input type="text" name="n3[]" class="form-control" value="${valor.n3}" ${bloquedo[2]}></td>
                        <td><input type="text" name="n4[]" class="form-control" value="${valor.n4}" ${bloquedo[3]}></td>
                        <td><input type="text" name="n5[]" class="form-control" value="${valor.n5}" ${bloquedo[4]}></td>
                        <td><input type="text" name="n6[]" class="form-control" value="${valor.n6}" ${bloquedo[5]}></td>
                        <td><input type="text" name="n7[]" class="form-control" value="${valor.n7}" ${bloquedo[6]}></td>
                        <td><input type="text" name="n8[]" class="form-control" value="${valor.n8}" ${bloquedo[7]}></td>
                        <td><input type="text" name="n9[]" class="form-control" value="${valor.n9}" ${bloquedo[8]}></td>
                        <td><input type="text" name="n10[]" class="form-control" value="${valor.n10}" ${bloquedo[9]}></td>
                        <td><input type="text" name="n11[]" class="form-control" value="${valor.n11}" ${bloquedo[10]}></td>
                        <td><input type="text" name="n12[]" class="form-control" value="${valor.n12}" ${bloquedo[11]}></td>
                        <td><input type="text" name="n13[]" class="form-control" value="${valor.n13}" ${bloquedo[12]}></td>
                        <td><input type="text" name="n14[]" class="form-control" value="${valor.n14}" ${bloquedo[13]}></td>
                        <td><input type="text" name="n15[]" class="form-control" value="${valor.n15}" ${bloquedo[14]}></td>
                        </tr>
                        `;
                    }else if (contador == 3){
                        template+= 
                        `
                        <tr>
                        <td><input type="hidden" name="id_prueba_8[]" value="${valor.id_prueba}"></td>
                        <td><input type="hidden" name="n1[]" id="n1${contador}" class="form-control" value="${valor.n1}"></td>
                        <td><input type="hidden" name="n2[]" class="form-control" value="${valor.n2}"></td>
                        <td><input type="hidden" name="n3[]" class="form-control" value="${valor.n3}"></td>
                        <td><input type="hidden" name="n4[]" class="form-control" value="${valor.n4}"></td>
                        <td><input type="hidden" name="n5[]" class="form-control" value="${valor.n5}"></td>
                        <td><input type="hidden" name="n6[]" class="form-control" value="${valor.n6}"></td>
                        <td><input type="hidden" name="n7[]" class="form-control" value="${valor.n7}"></td>
                        <td><input type="hidden" name="n8[]" class="form-control" value="${valor.n8}"></td>
                        <td><input type="hidden" name="n9[]" class="form-control" value="${valor.n9}"></td>
                        <td><input type="hidden" name="n10[]" class="form-control" value="${valor.n10}"></td>
                        <td><input type="hidden" name="n11[]" class="form-control" value="${valor.n11}"></td>
                        <td><input type="hidden" name="n12[]" class="form-control" value="${valor.n12}"></td>
                        <td><input type="hidden" name="n13[]" class="form-control" value="${valor.n13}"></td>
                        <td><input type="hidden" name="n14[]" class="form-control" value="${valor.n14}"></td>
                        <td><input type="hidden" name="n15[]" class="form-control" value="${valor.n15}"></td>
                        </tr>
                        `;

                    }

                    contador++;
                }

                else{

                    if (contador1 < 3){

                        let bl1 = "readonly";
                        let bl2 = "readonly";
                        let bl3 = "readonly";
                        let bl4 = "readonly";
                        let bl5 = "readonly";
                        let bl6 = "readonly";
                        let bl7 = "readonly";
                        let bl8 = "readonly";
                        let bl9 = "readonly";
                        let bl10 = "readonly";
                        let bl11 = "readonly";
                        let bl12 = "readonly";
                        let bl13 = "readonly";
                        let bl14 = "readonly";
                        let bl15 = "readonly";

                        bloquedo = [

                          bl1,
                          bl2,
                          bl3,
                          bl4,
                          bl5,
                          bl6,
                          bl7,
                          bl8,
                          bl9,
                          bl10,
                          bl11,
                          bl12,
                          bl13,
                          bl14,
                          bl15
                        ]

                         

                        for(i = 0; i < n_extractores; i++){

                           bloquedo[i] = ""

                        }

                    template2+= 
                    `
                    <tr>
                    <td>${enunciados[contador1]}<input type="hidden" name="id_prueba_8[]" value="${valor.id_prueba}"></td>
                    <td><input type="text" name="n1[]" class="form-control" value="${valor.n1}" ${bloquedo[0]}></td>
                    <td><input type="text" name="n2[]" class="form-control" value="${valor.n2}" ${bloquedo[1]}></td>
                    <td><input type="text" name="n3[]" class="form-control" value="${valor.n3}" ${bloquedo[2]}></td>
                    <td><input type="text" name="n4[]" class="form-control" value="${valor.n4}" ${bloquedo[3]}></td>
                    <td><input type="text" name="n5[]" class="form-control" value="${valor.n5}" ${bloquedo[4]}></td>
                    <td><input type="text" name="n6[]" class="form-control" value="${valor.n6}" ${bloquedo[5]}></td>
                    <td><input type="text" name="n7[]" class="form-control" value="${valor.n7}" ${bloquedo[6]}></td>
                    <td><input type="text" name="n8[]" class="form-control" value="${valor.n8}" ${bloquedo[7]}></td>
                    <td><input type="text" name="n9[]" class="form-control" value="${valor.n9}" ${bloquedo[8]}></td>
                    <td><input type="text" name="n10[]" class="form-control" value="${valor.n10}" ${bloquedo[9]}></td>
                    <td><input type="text" name="n11[]" class="form-control" value="${valor.n11}" ${bloquedo[10]}></td>
                    <td><input type="text" name="n12[]" class="form-control" value="${valor.n12}" ${bloquedo[11]}></td>
                    <td><input type="text" name="n13[]" class="form-control" value="${valor.n13}" ${bloquedo[12]}></td>
                    <td><input type="text" name="n14[]" class="form-control" value="${valor.n14}" ${bloquedo[13]}></td>
                    <td><input type="text" name="n15[]" class="form-control" value="${valor.n15}" ${bloquedo[14]}></td>
                    </tr>
                    `;
                    }else if (contador1 == 3){
                      template2+= 
                    `
                    <tr>
                    <td><input type="hidden" name="id_prueba_8[]" value="${valor.id_prueba}"></td>
                    <td><input type="hidden" name="n1[]" class="form-control" value="${valor.n1}"></td>
                    <td><input type="hidden" name="n2[]" class="form-control" value="${valor.n2}"></td>
                    <td><input type="hidden" name="n3[]" class="form-control" value="${valor.n3}"></td>
                    <td><input type="hidden" name="n4[]" class="form-control" value="${valor.n4}"></td>
                    <td><input type="hidden" name="n5[]" class="form-control" value="${valor.n5}"></td>
                    <td><input type="hidden" name="n6[]" class="form-control" value="${valor.n6}"></td>
                    <td><input type="hidden" name="n7[]" class="form-control" value="${valor.n7}"></td>
                    <td><input type="hidden" name="n8[]" class="form-control" value="${valor.n8}"></td>
                    <td><input type="hidden" name="n9[]" class="form-control" value="${valor.n9}"></td>
                    <td><input type="hidden" name="n10[]" class="form-control" value="${valor.n10}"></td>
                    <td><input type="hidden" name="n11[]" class="form-control" value="${valor.n11}"></td>
                    <td><input type="hidden" name="n12[]" class="form-control" value="${valor.n12}"></td>
                    <td><input type="hidden" name="n13[]" class="form-control" value="${valor.n13}"></td>
                    <td><input type="hidden" name="n14[]" class="form-control" value="${valor.n14}"></td>
                    <td><input type="hidden" name="n15[]" class="form-control" value="${valor.n15}"></td>
                    </tr>
                    `;
                    }

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


              <td><input required="" type="hidden" name="id_prueba_9[]" value="${valor.id_prueba}">
              <input required="" type="text" name="medicion_1_p9[]" class="form-control" value="${valor.medicion_1}"></td>
              <td><input required="" type="text" name="medicion_2_p9[]" class="form-control" value="${ren_hr}"></td>
              <td><input required="" type="text" name="medicion_3_p9[]" class="form-control" value="${valor.medicion_3}"></td>
              <td><input required="" type="text" name="medicion_4_p9[]" class="form-control" value="${valor.medicion_4}"></td>
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
                //console.log(response);
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;
                
                traer.forEach((valor)=>{
                    $("#id_ensayo_p11").val(valor.id_ensayo);
                    //$("#ensayo_p11").val(valor.metodo_ensayo);
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
                //console.log(response);
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
                //console.log(response);
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;
                
                traer.forEach((valor)=>{
                    if(valor.categoria == 1){
                        $("#id_ensayo_p31").val(valor.id_ensayo);
                        $("#ensayo_p31").val(valor.metodo_ensayo);
                        $("#ensayo_p32").val(valor.n_muestras);
                        //$("#ensayo_p33").val(valor.altura_muestra);
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
                //console.log(response);
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;
                
                traer.forEach((valor)=>{

                    $("#id_ensayo_p51").val(valor.id_ensayo);
                    $("#ensayo_p51").val(valor.metodo_ensayo);
                    //$("#ensayo_p52").val(valor.n_rejillas);
                   // $("#ensayo_p53").val(valor.n_extractores);

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
                //console.log(response);
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;
                
                traer.forEach((valor)=>{
                    $("#id_informe").val(valor.id_informe);
                    $("#conclusion_informe").val(valor.conclusion);
                    $("#solicitante").val(valor.solicitante);
                    $("#responsable").val(valor.responsable);
                    $("#nombre_informe").val(valor.nombre_informe);
                    $("#fecha_medicion").val(valor.fecha_medicion);

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
                //console.log(response);
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
          <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 80%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
          <img src="templates/sala_limpia/${valor.url}${valor.nombre}" style="width: 100%;">
          </div>
          `;
      }
      else if(valor.tipo == 2){

          template2 += 
          `
          <div class="col-sm-4">
          <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 80%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
          <img src="templates/sala_limpia/${valor.url}${valor.nombre}" style="width: 100%;">
          </div>
          `;
      }
      else if(valor.tipo == 3){

          template3 += 
          `
          <div class="col-sm-4">
          <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 80%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
          <img src="templates/sala_limpia/${valor.url}${valor.nombre}" style="width: 100%;">
          </div>
          `;
      }
      else if(valor.tipo == 4){

          template4 += 
          `
          <div class="col-sm-4">
          <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 80%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
          <img src="templates/sala_limpia/${valor.url}${valor.nombre}" style="width: 100%;">
          </div>
          `;
      }
      else if (valor.tipo == 5){
          template5 += 
          `
          <div class="col-sm-4">
          <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 80%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
          <img src="templates/sala_limpia/${valor.url}${valor.nombre}" style="width: 100%;">
          </div>
          `;
      }

  });

      $("#Listar_img_c1").html(template1);
      $("#Listar_img_c2").html(template2);
      $("#Listar_img_c3").html(template3);
      $("#Listar_img_c4").html(template4);
      $("#Listar_img_c5").html(template5);
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
       // console.log(response);
        if(response == "Movido"){
          Swal.fire({
            title:'Mensaje',
            text:'Se ha configurado la imagen correctamente',
            icon:'success',
            timer:1700
        });
          listar_imagenes();
      }else{
        Swal.fire({
            title:'Error',
            text:'Solo puede subir imagenes',
            icon:'error',
            timer:2000
        });
      }
  }
}); 
});

$("#agregar_prueba").click(function(e){
   e.preventDefault();
   let orden = 200;
   let accion = 'agregar';

   let quien = id_valida;
    let movimiento = "Edita en el modulo";
    let modulo = "Item y freezer";

    const data = {
      quien,
      movimiento,
      modulo
    }

   $.ajax({
    type:'POST',
    data:{orden, accion, id_asignado},
    url:'templates/sala_limpia/controlador_sala_limpia.php',
    success:function(response){
        console.log(response);
        if(response == "Si"){
            Swal.fire({
                title:'Mensaje',
                text:'Se ha Creado correctamente el campo de prueba',
                icon:'success',
                timer:1700
            });
        }
        listar_resultados_prueba(2);
    }
})

});

$(document).on('click','#eliminar_prueba',function(e){
   e.preventDefault();
   let orden = 200;
   let accion = 'borrar';
   let id_prueba_3 = $(this).attr('data-id');
   let  id_prueba_padre = $(this).attr('data-reel');

   $.ajax({
    type:'POST',
    data:{orden, accion, id_asignado, id_prueba_3,id_prueba_padre},
    url:'templates/sala_limpia/controlador_sala_limpia.php',
    success:function(response){
        console.log(response);
        if(response == "Si"){
            Swal.fire({
                title:'Mensaje',
                text:'Se ha eliminado correctamente el campo de prueba',
                icon:'success',
                timer:1700
            });
        }
        listar_resultados_prueba(2);
    }
})

});


$(document).on('click','#eliminar_imagen',function(){

    let id_imagen = $(this).attr('data-id'  );
    let movimiento = "Eliminar";

    $.ajax({
        type:'POST',
        data:{id_imagen, movimiento},
        url:'templates/sala_limpia/controlador_imagenes.php',
        success:function(response){
        //console.log(response);
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

  ///////////////// EVENTOS PARA PROMEDIOS
  
  $(document).on('keyup','#n1_p4',function(){
    calcular_promedio_1();
  });
  $(document).on('keyup','#n2_p4',function(){
    calcular_promedio_1();
  });
  $(document).on('keyup','#n3_p4',function(){
    calcular_promedio_1();
  });
  $(document).on('keyup','#n4_p4',function(){
    calcular_promedio_1();
  });
  $(document).on('keyup','#n5_p4',function(){
    calcular_promedio_1();
  });


  $(document).on('keyup','#n1_p5',function(){
    calcular_promedio_2();
  });
  $(document).on('keyup','#n2_p5',function(){
    calcular_promedio_2();
  });
  $(document).on('keyup','#n3_p5',function(){
    calcular_promedio_2();
  });
  $(document).on('keyup','#n4_p5',function(){
    calcular_promedio_2();
  });
  $(document).on('keyup','#n5_p5',function(){
    calcular_promedio_2();
  });


  $(document).on('keyup','#n1_p6',function(){
    calcular_promedio_3();
  });
  $(document).on('keyup','#n2_p6',function(){
    calcular_promedio_3();
  });
  $(document).on('keyup','#n3_p6',function(){
    calcular_promedio_3();
  });
  $(document).on('keyup','#n4_p6',function(){
    calcular_promedio_3();
  });
  $(document).on('keyup','#n5_p6',function(){
    calcular_promedio_3();
  });

  $(document).on('keyup','#n1_p7',function(){
    calcular_promedio_4();
  });
  $(document).on('keyup','#n2_p7',function(){
    calcular_promedio_4();
  });
  $(document).on('keyup','#n3_p7',function(){
    calcular_promedio_4();
  });
  $(document).on('keyup','#n4_p7',function(){
    calcular_promedio_4();
  });
  $(document).on('keyup','#n5_p7',function(){
    calcular_promedio_4();
  });



function calcular_promedio_1(){

     let punto_1 = $("#n1_p4").val();
     let punto_2 = $("#n2_p4").val();
     let punto_3 = $("#n3_p4").val();
     let punto_4 = $("#n4_p4").val();
     let punto_5 = $("#n5_p4").val();
        
     let calculo = (parseFloat(punto_1) + parseFloat(punto_2) + parseFloat(punto_3) + parseFloat(punto_4) + parseFloat(punto_5))/5;
     let estado = '';
     if (calculo >= especificacion_2_temp && calculo <= especificacion_1_temp){
        estado = 'Cumple';
     }else{
        estado = 'No Cumple';
     }
     $("#promedio_p4").val(calculo.toFixed(2)); 
     $("#estado_temp").html(estado);

  }

  function calcular_promedio_2(){

     let punto_1 = $("#n1_p5").val();
     let punto_2= $("#n2_p5").val();
     let punto_3 = $("#n3_p5").val();
     let punto_4 = $("#n4_p5").val();
     let punto_5= $("#n5_p5").val();
        
     let calculo = (parseFloat(punto_1) + parseFloat(punto_2) + parseFloat(punto_3) + parseFloat(punto_4) + parseFloat(punto_5))/5;
     let estado = '';
     if (calculo >= especificacion_2_hum && calculo <= especificacion_1_hum){
        estado = 'Cumple';
     }else{
        estado = 'No Cumple';
     }
     $("#promedio_p5").val(calculo.toFixed(2)); 
     $("#estado_hum").html(estado);
  }

  function calcular_promedio_3(){

     let punto_1 = $("#n1_p6").val();
     let punto_2= $("#n2_p6").val();
     let punto_3 = $("#n3_p6").val();
     let punto_4 = $("#n4_p6").val();
     let punto_5= $("#n5_p6").val();
        
     let calculo = (parseFloat(punto_1) + parseFloat(punto_2) + parseFloat(punto_3) + parseFloat(punto_4) + parseFloat(punto_5))/5;

     let estado = '';
        if(calculo >= lux){
             estado = 'Cumple';
        }else if (calculo < lux){
             estado = 'No Cumple';
        }else{
             estado = 'Error';
        }   
     $("#promedio_p6").val(calculo.toFixed(2)); 
     $("#estado_lux").html(estado);
  }

  function calcular_promedio_4(){

     let punto_1 = $("#n1_p7").val();
     let punto_2 = $("#n2_p7").val();
     let punto_3 = $("#n3_p7").val();
     let punto_4 = $("#n4_p7").val();
     let punto_5= $("#n5_p7").val();
        
     let calculo = (parseFloat(punto_1) + parseFloat(punto_2) + parseFloat(punto_3) + parseFloat(punto_4) + parseFloat(punto_5))/5;

     let estado = '';
        if(calculo <= ruido_dba){
             estado = 'Cumple';
        }else if (calculo > ruido_dba){
             estado = 'No Cumple';
        }else{
             estado = 'Error';
        }   
        console.log(ruido_dba);
     $("#promedio_p7").val(calculo.toFixed(2)); 
     $("#estado_dba").html(estado);

   //  alert(punto_5);
  }






///////////// VER INFORME
$("#ver_informe_salas_limpias").click(function(e){
    e.preventDefault();
    let encrypt = "LF456DS4G5DS4F5SD21G4DFSGF14DS2vDF2bfg56f1d56sf15ds6f4g534G564g56f4g56df4g561G6F4D5G6DF4G564FG5DG"+id_asignado;
    window.open('templates/sala_limpia/informes/informe/inspeccion_de_salas.php?clave='+encrypt); 
});










