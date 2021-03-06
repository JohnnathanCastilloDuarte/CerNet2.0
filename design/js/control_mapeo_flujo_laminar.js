 $("#alerta_1").hide();
var id_asignado = $("#id_asignado_flujo_laminar").val();

//Validar usuario responsable 
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

listar_inspeccion_visual(8);
listar_inspeccion_visual(9);
validador(1);
validador(2);
validador(3);
validador(4);
validador(5);
validador(6);
validador(7);
validador(8);
validador(9);
validador(10);
validador(11);//info_ot
 


//Actualizar datos del informe-luis
$("#actualizar_mapeo").click(function(){
    
  let id_informe = $("#id_informe").val();  
  let nombre_informe = $("#nombre_informe").val();  
  let solicitante =  $("#solicitante").val();
  let responsable = $("#responsable").val();
  let conclusion =  $("#conclusion").val();
  let accion = ("actualizar_informe");
   $.ajax({
     type:'POST',
     data:{nombre_informe, solicitante, responsable, conclusion, id_informe, accion},
     url:'templates/flujo_laminar/almacena_informacion_1.php',

     success:function(response){
       // console.log(response);
        if (response == ''){
            Swal.fire({
                    position:'center',
                    icon:'success',
                    title:'Datos de informe modificados correctamente',
                    showConfirmButton: false,
                    timer:1000
                });
        }else{
           console.log("error");
        }
         listar_inspeccion_visual(8);
     }

   });

});

function listar_inspeccion_visual(numeral){

   
    let movimiento = "opcion_"+numeral;
    let contador = 0;

    if(numeral == 1){
        $.ajax({
            type:'POST',
            data:{id_asignado, movimiento},
            url:'templates/flujo_laminar/controlador_pruebas.php',
            success:function(response){
                let traer = JSON.parse(response);
                let template = "";

                traer.forEach((valor)=>{
                    template += 
                    `   
                        <input type="hidden" name="id_inspeccion"  value="${valor.id_inspeccion}">
                        <tr>
                            <td>Equipo en buenas condiciones de operaci??n:</td>
                            <td>
                                <select class="form-control" name="valor_inspeccion_visual1">
                                    <option value="${valor.insp_1}">${valor.insp_1}</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                            </td>
                        </tr>
                        <tr>
                            <td>Conexi??n el??ctrica en buenas condiciones:</td>
                            <td>
                                <select class="form-control" name="valor_inspeccion_visual2">
                                    <option value="${valor.insp_2}">${valor.insp_2}</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                            </td>
                        </tr>
                        <tr>
                            <td>Presenta Filtros en buenas condiciones:</td>
                            <td>
                                <select class="form-control" name="valor_inspeccion_visual3">
                                    <option value="${valor.insp_3}">${valor.insp_3}</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                            </td>
                        </tr>
                        <tr>
                            <td>Equipo L??mpio y sin elementos externos:</td>
                            <td>
                                <select class="form-control" name="valor_inspeccion_visual4">
                                    <option value="${valor.insp_4}">${valor.insp_4}</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                            </td>
                        </tr>
                        <tr>
                            <td>Posee identificaci??n:</td>
                            <td>
                                <select class="form-control" name="valor_inspeccion_visual5">
                                    <option value="${valor.insp_5}">${valor.insp_5}</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                            </td>
                        </tr>
                        <tr>
                            <td>Presenta todas sus partes y accesorios:</td>
                            <td>
                                <select class="form-control" name="valor_inspeccion_visual6">
                                    <option value="${valor.insp_6}">${valor.insp_6}</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                            </td>
                        </tr>
                    `;
                });

                $("#resultados_inspeccion_visual").html(template);
            }
        });
    
    
    
    }

    else if(numeral == 2){
        let array_nombre = ['Prueba de Integridad de Filtro', 'Velocidad de Aire (m/s)', 'Part??culas por m3; >0.5 ??m', 'Part??culas por m3; >5.0 ??m', 'Part??culas por m3; >0.5 ??m', 'Part??culas por m3; >0.5 ??m'];

        $.ajax({
            type:'POST',
            data:{id_asignado, movimiento},
            url:'templates/flujo_laminar/controlador_pruebas.php',
            success:function(response){
                
                
                let traer = JSON.parse(response);
                let template = "";
                let contador = 0;

                traer.forEach((valor)=>{

                    template += 
                    `
                        <tr>
                            <td>${array_nombre[contador]}
                                <input type="hidden" name="id_prueba_1[]" value="${valor.id_prueba}">
                            </td>
                           
                            <td><input type="text" name="requisito_p1[]" value="${valor.requisito}" class="form-control"></td>
                            <td><input type="text" name="valor_obtenido_p1[]" value="${valor.valor_obtenido}" class="form-control"></td>
                            <td><input type="text" name="veredicto_p1[]" value="${valor.veredicto}" class="form-control"></td>
                        </tr>
                    `;


                    contador++;
                });
                $("#aqui_prueba_1").html(template);
            }
        });

    
    }

    else if(numeral == 3){

        $.ajax({
            type:'POST',
            data:{id_asignado, movimiento},
            url:'templates/flujo_laminar/controlador_pruebas.php',
            success:function(response){
               
                
                let traer = JSON.parse(response);
                let template = "";
                let numero = 1;

                traer.forEach((f)=>{
            
        
                    template += 
                    `
                    
                    <tr>
                      <td>
                        <input type="hidden" name="id_prueba_2[]" value="${f.id_prueba}">
                        Filtro N?? ${numero}
                      </td>
                      <td>
                        <input type="text" class="form-control" name="cumplimiento_filtro_a[]" value="${f.zonaA}">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="cumplimiento_filtro_aa[]" value="${f.zonaAA}">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="cumplimiento_filtro_b[]" value="${f.zonaB}">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="cumplimiento_filtro_bb[]" value="${f.zonaBB}">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="cumplimiento_filtro_c[]" value="${f.zonaC}">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="cumplimiento_filtro_cc[]" value="${f.zonaCC}">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="cumplimiento_filtro_d[]" value="${f.zonaD}">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="cumplimiento_filtro_dd[]" value="${f.zonaDD}">
                      </td>
                    </tr>
                    
                    `;
                    numero++;
                  });
        
                  $("#aqui_prueba_2").append(template);
            }
        });

    }

    else if(numeral == 4){
        

        $.ajax({
            type:'POST',
            data:{id_asignado, movimiento},
            url:'templates/flujo_laminar/controlador_pruebas.php',
            success:function(response){
               
                
                let traer = JSON.parse(response);
                let template = "";
                let contador = 1;

                traer.forEach((valor)=>{

                    template += 
                    `
                       <tr>
                            <td>Filtro N?? ${contador}
                                <input type="hidden" name="id_prueba_3[]" value="${valor.id_prueba}">
                            </td>
                            
                            <td><input type="text" name="medicion1_p3[]" class="form-control" value="${valor.medicion_1}"></td>
                            <td><input type="text" name="medicion2_p3[]" class="form-control" value="${valor.medicion_2}"></td>
                            <td><input type="text" name="medicion3_p3[]" class="form-control" value="${valor.medicion_3}"></td>
                            <td><input type="text" name="medicion4_p3[]" class="form-control" value="${valor.medicion_4}"></td>
                            <td><input type="text" name="medicion5_p3[]" class="form-control" value="${valor.medicion_5}"></td>
                            <td><input type="text" name="medicion6_p3[]" class="form-control" value="${valor.medicion_6}"></td>
                       </tr>
                    `;


                    contador++;
                });
                $("#aqui_prueba_3").html(template);
            }
        });

    
    }

    else if(numeral == 5){
        
        let array_nombres1 = ['Temperatura,??C', 'Humedad Relativa, %'];
        let array_nombres2 = ['Equipo (dB-A Lento)', 'Sala (dB-A Lento)'];
        $.ajax({
            type:'POST',
            data:{id_asignado, movimiento},
            url:'templates/flujo_laminar/controlador_pruebas.php',
            success:function(response){
             
                
                let traer = JSON.parse(response);
                let template1 = "";
                let template2 = "";
                let contador1 = 0;
                let contador2 = 0;

                traer.forEach((valor)=>{

                    if(valor.categoria == 1){
                        template1 += 
                        `
                        <tr>
                                <td>${array_nombres1[contador1]}</td>
                                <input type="hidden" name="id_prueba_4[]" value="${valor.id_prueba}">
                                <td><input type="text" name="punto_1_p4[]" id="punto_1_p4${contador1}" class="form-control" value="${valor.punto_1}"></td>
                                <td><input type="text" name="punto_2_p4[]"  id="punto_2_p4${contador1}" class="form-control" value="${valor.punto_2}"></td>
                                <td><input type="text" name="punto_3_p4[]"  id="punto_3_p4${contador1}" class="form-control" value="${valor.punto_3}"></td>
                                <td><input type="text" name="promedio_p4[]" id="punto_4_p4${contador1}" class="form-control" value="${valor.promedio}"></td>
                               
                        </tr>
                        `;


                        contador1++;
                    }
                    else{
                        template2 += 
                        `
                        <tr>
                                <td>${array_nombres2[contador2]}</td>
                                <input type="hidden" name="id_prueba_4[]" value="${valor.id_prueba}">
                                <td><input type="text" name="punto_1_p4[]" id="punto_1_p42${contador2}" class="form-control" value="${valor.punto_1}"></td>
                                <td><input type="text" name="punto_2_p4[]" id="punto_2_p42${contador2}" class="form-control" value="${valor.punto_2}"></td>
                                <td><input type="text" name="punto_3_p4[]" id="punto_3_p42${contador2}" class="form-control" value="${valor.punto_3}"></td>
                                <td><input type="text" name="promedio_p4[]" id="punto_4_p42${contador2}" class="form-control" value="${valor.promedio}"></td>
                               
                        </tr>
                        `;
                        contador2++;
                    }
                });
                $("#aqui_prueba_4").html(template1);
                $("#aqui_prueba_5").html(template2);
            }
        });

    
    }


    else if(numeral == 6){
        
        let array_nombres1 = ['Ubicaci??n de Prueba', 'Direcci??n del Flujo Especificado', 'Visualizaci??n de Flujo Reverso', 'Visualizaci??n de V??rtices', 'Visualizaci??n de V??rtices'];
        let array_nombres2 = ['Ubicaci??n de Prueba', 'Visualizaci??n de Flujo Unidireccional', 'Visualizaci??n de Flujo Reverso', 'Visualizaci??n de Puntos Muertos', 'Visualizaci??n de V??rtices', 'Cumple Especificaciones', 'Cumple Prueba de Humo'];

        $.ajax({
            type:'POST',
            data:{id_asignado, movimiento},
            url:'templates/flujo_laminar/controlador_pruebas.php',
            success:function(response){
                ///console.log(response);            
                let traer = JSON.parse(response);
                let template1 = "";
                let template2 = "";
                let contador1 = 0;
                let contador2 = 0;

                traer.forEach((valor)=>{

                    if(valor.categoria == 1){

                        if(contador1 < 2){
                            template1 += 
                                `
                                <tr>
                                    <td>${array_nombres1[contador1]}</td>
                                    <input type="hidden" name="id_prueba_5[]" value="${valor.id_prueba}">
                                    <td><input type="text" name="resultado_P5[]" class="form-control" value="${valor.resultado}"></td>
                                </tr>
                                `;
                        }else if(contador1 > 1 && contador1< 4){
                            template1 += 
                                `
                                <tr>
                                    <td>${array_nombres1[contador1]}</td>
                                    <input type="hidden" name="id_prueba_5[]" value="${valor.id_prueba}">
                                    <td><select name="resultado_P5[]" class="form-control">
                                      <option>${valor.resultado}</option>
                                      <option>Si</option>
                                      <option>No</option>
                                    </select></td>
                                    <!-- <td colspan="2"><input type="text" name="cumple_P5a[]" class="form-control" value="${valor.resultado}"></td>  -->
                                </tr>
                                `;
                        }
                        
                        contador1++;
                    }
                    else{
                        if(contador2 < 1){

                              template2 += 
                            `
                                <tr>
                                    <td>${array_nombres2[contador2]}</td>
                                    <input type="hidden" name="id_prueba_5[]" value="${valor.id_prueba}">
                                    <td>
                                          <input class="form-control" name="resultado_P5[]" value="${valor.resultado}">
                                      </td>
                                </tr>

                            `;

                        }else if(contador2 >= 1 && contador2 < 5){

                               template2 += 
                              `
                                  <tr>
                                      <td>${array_nombres2[contador2]}</td>
                                      <input type="hidden" name="id_prueba_5[]" value="${valor.id_prueba}">
                                      <td>
                                        <select class="form-control" name="resultado_P5[]">
                                            <option value="${valor.resultado}">${valor.resultado}</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select></td>
                                     
                                  </tr>

                              `;

                        }else{
                             template2 += 
                            `
                               <!-- <tr>
                                    <td>${array_nombres2[contador2]}</td>
                                    <input type="text" name="id_prueba_5[]" value="${valor.id_prueba}">
                                    <td colspan="2"><input type="text" name="resultado_P5[]" class="form-control" value="${valor.cumple}"></td> 
                                </tr>-->

                            `;
                        }    
                        contador2++;
                    }
                });
                $("#aqui_prueba_6").html(template1);
                $("#aqui_prueba_7").html(template2);
            }
        });

    
    }

    else if(numeral == 7){
        
     
        $.ajax({
            type:'POST',
            data:{id_asignado, movimiento},
            url:'templates/flujo_laminar/controlador_pruebas.php',
            success:function(response){
                ///console.log(response);
                
                let traer = JSON.parse(response);
                let template1 = "";
                
                traer.forEach((valor)=>{

                    template1 += 
                    `
                        <tr>
                            <td>Lux<input type="hidden" name="id_prueba_p6" value="${valor.id_prueba}"></td>
                            <td><input type="text" name="punto_1_p6" class="form-control"  id="punto_1_p6" value="${valor.punto_1}"></td>
                            <td><input type="text" name="punto_2_p6" class="form-control"  id="punto_2_p6" value="${valor.punto_2}"></td>
                            <td><input type="text" name="punto_3_p6" class="form-control"  id="punto_3_p6" value="${valor.punto_3}"></td>
                            <td><input type="text" name="punto_4_p6" class="form-control"  id="punto_4_p6" value="${valor.punto_4}"></td>
                            <td><input type="text" name="punto_5_p6" class="form-control"  id="punto_5_p6" value="${valor.punto_5}"></td>
                            <td><input type="text" name="promedio_p6" class="form-control" Promedio=""  id="promedio_p6" value="${valor.promedio}"></td>
                        </tr>
                    `;

            
                });
                $("#aqui_prueba_8").html(template1);
            }
        });

    
    }

    else if (numeral == 8){

         $.ajax({
            type:'POST',
            data:{id_asignado, movimiento},
            url:'templates/flujo_laminar/controlador_pruebas.php',
            success:function(response){
                ///console.log(response);
                
                let traer = JSON.parse(response);
                let template1 = "";
                
                traer.forEach((valor)=>{


                    if (valor.nombre_informe != '') {

                    $("#nombre_informe").val(`${valor.nombre_informe}`);
                    }
                    $("#id_informe").val(`${valor.id_informe}`);
                    $("#solicitante").val(`${valor.solicitante}`);
                    $("#conclusion").val(`${valor.conclusion}`);
                    $("#responsable").val(`${valor.usuario_responsable}`);
                
                  
                });
                
            }
        });
    }

    else if (numeral == 9){

         $.ajax({
            type:'POST',
            data:{id_asignado, movimiento},
            url:'templates/flujo_laminar/controlador_pruebas.php',
            success:function(response){
                ///console.log(response);
                
                let traer = JSON.parse(response);
                
                traer.forEach((valor)=>{

                    $("#nombre_informe").val(`${valor.sigla_pais}-${valor.numero_ot}-${valor.sigla_empresa}-2022-TEMP-00`);
                           
                
                });
                
            }
        });
    }

    else if (numeral == 10){

        $.ajax({
            type:'POST',
            data:{id_asignado, movimiento},
            url:'templates/flujo_laminar/controlador_pruebas.php',
            success:function(response){
               console.log(response);
                
                let traer = JSON.parse(response);
                let template = "";
                let contador = 1;

                traer.forEach((valor)=>{

                    if (valor.tipo_um == 1){

                        template += 
                    `
                              <input type="hidden" name="id_medicion_p9[]" value="${valor.id}">  
                       <tr> 
                            <td> >=0,5 </td>
                            <td><input type="text" name="medicion1_p9[]" class="form-control" value="${valor.media_promedios}"></td>
                            <td><input type="text" name="medicion2_p9[]" class="form-control" value="${valor.desviacion_estandar}"></td>
                            <td><input type="text" name="medicion3_p9[]" class="form-control" value="${valor.maximo}"></td>
                       </tr>
                    `;

                    }else if (valor.tipo_um == 2){
                         template += 
                    `
                              <input type="hidden" name="id_medicion_p9[]" value="${valor.id}">  
                       <tr> 
                            <td> >=5,0 </td>
                            <td><input type="text" name="medicion1_p9[]" class="form-control" value="${valor.media_promedios}"></td>
                            <td><input type="text" name="medicion2_p9[]" class="form-control" value="${valor.desviacion_estandar}"></td>
                            <td><input type="text" name="medicion3_p9[]" class="form-control" value="${valor.maximo}"></td>
                       </tr>
                    `; 

                    }

                    


                    contador++;
                });
                $("#aqui_prueba_9").html(template);
            }
        });
    }

    
}

function validador(numeral){

    let movimiento = "Validador_"+numeral;

   
    let nombre_informe = $("#nombre_informe").val();
    let solicitante = $("#solicitante").val();
    let conclusion = $("#conclusion").val();
    
    $.ajax({
        type:'POST',
        data:{id_asignado, movimiento, nombre_informe, solicitante, conclusion},
        url:'templates/flujo_laminar/controlador_pruebas.php',
        success:function(response){
            console.log(response);
            if(response == "Listo1"){
                listar_inspeccion_visual(1);
                
            }else if(response == "Listo2"){
                listar_inspeccion_visual(2);

            }else if(response == "Listo3"){
                listar_inspeccion_visual(3);

            }else if(response == "Listo4"){
                listar_inspeccion_visual(4);

            }else if(response == "Listo5"){
                listar_inspeccion_visual(5);

            }else if(response == "Listo8"){
                listar_inspeccion_visual(6);

            }else if(response == "Listo9"){
                listar_inspeccion_visual(7);

            }else if (response == 'Listo10'){
                listar_inspeccion_visual(8);

            }else if (response == 'Listo11'){
                listar_inspeccion_visual(10);
            }
        }
    });
}





$(document).on('change','#select_filtro', function(){

    let quien = $(this).val();
    if(quien == "si"){
      $(this).removeClass('text-danger');
      $(this).addClass('text-success');
    }else if(quien == "no"){
      $(this).removeClass('text-success');
      $(this).addClass('text-danger');
    }else{
      $(this).removeClass('text-success');
      $(this).removeClass('text-danger');
    }
    
  });


  ///////////////// EVENTOS PARA PROMEDIOS
  
  $(document).on('keyup','#punto_1_p40',function(){
    calcular_promedio_1();
  });
  $(document).on('keyup','#punto_1_p41',function(){
    calcular_promedio_2();
  });
  $(document).on('keyup','#punto_2_p40',function(){
    calcular_promedio_1();
  });
  $(document).on('keyup','#punto_2_p41',function(){
    calcular_promedio_2();
  });
  $(document).on('keyup','#punto_3_p40',function(){
    calcular_promedio_1();
  });
  $(document).on('keyup','#punto_3_p41',function(){
    calcular_promedio_2();
  });


  $(document).on('keyup','#punto_1_p420',function(){
    calcular_promedio_3();
  });
  $(document).on('keyup','#punto_1_p421',function(){
    calcular_promedio_4();
  });
  $(document).on('keyup','#punto_2_p420',function(){
    calcular_promedio_3();
  });
  $(document).on('keyup','#punto_2_p421',function(){
    calcular_promedio_4();
  });
  $(document).on('keyup','#punto_3_p420',function(){
    calcular_promedio_3();
  });
  $(document).on('keyup','#punto_3_p421',function(){
    calcular_promedio_4();
  });


  $(document).on('keyup','#punto_1_p6',function(){
    calcular_promedio_5();
  });
  $(document).on('keyup','#punto_2_p6',function(){
    calcular_promedio_5();
  });
  $(document).on('keyup','#punto_3_p6',function(){
    calcular_promedio_5();
  });
  $(document).on('keyup','#punto_4_p6',function(){
    calcular_promedio_5();
  });
  $(document).on('keyup','#punto_4_p6',function(){
    calcular_promedio_5();
  });
  $(document).on('keyup','#punto_5_p6',function(){
    calcular_promedio_5();
  });


 



  function calcular_promedio_1(){

     let punto_1 = $("#punto_1_p40").val();
     let punto_2= $("#punto_2_p40").val();
     let punto_3 = $("#punto_3_p40").val();
        
     let calculo = (parseFloat(punto_1) + parseFloat(punto_2) + parseFloat(punto_3))/3;
    
     $("#punto_4_p40").val(calculo.toFixed(2)); 
  }

  function calcular_promedio_2(){

    let punto_1 = $("#punto_1_p41").val();
    let punto_2= $("#punto_2_p41").val();
    let punto_3 = $("#punto_3_p41").val();
       
    let calculo = (parseFloat(punto_1) + parseFloat(punto_2) + parseFloat(punto_3))/3;
   
    $("#punto_4_p41").val(calculo.toFixed(2)); 
 }

 function calcular_promedio_3(){

    let punto_1 = $("#punto_1_p420").val();
    let punto_2= $("#punto_2_p420").val();
    let punto_3 = $("#punto_3_p420").val();
       
    let calculo = (parseFloat(punto_1) + parseFloat(punto_2) + parseFloat(punto_3))/3;
   
    $("#punto_4_p420").val(calculo.toFixed(2)); 
 }

 function calcular_promedio_4(){

   let punto_1 = $("#punto_1_p421").val();
   let punto_2= $("#punto_2_p421").val();
   let punto_3 = $("#punto_3_p421").val();
      
   let calculo = (parseFloat(punto_1) + parseFloat(punto_2) + parseFloat(punto_3))/3;
  
   $("#punto_4_p421").val(calculo.toFixed(2)); 
}


function calcular_promedio_5(){
    let punto_1 = $("#punto_1_p6").val();
    let punto_2= $("#punto_2_p6").val();
    let punto_3 = $("#punto_3_p6").val();
    let punto_4 = $("#punto_4_p6").val();
    let punto_5 = $("#punto_5_p6").val();
       
    let calculo = (parseFloat(punto_1) + parseFloat(punto_2) + parseFloat(punto_3) + parseFloat(punto_4) + parseFloat(punto_5))/5;
   
    $("#promedio_p6").val(calculo.toFixed(2)); 
}


/////////////////// CONTROLA FORMULARIO

$("#formulario_flujo_laminar").submit(function(e){

    e.preventDefault();

    var formData = new FormData(document.getElementById("formulario_flujo_laminar"));
    

    $.ajax({
      url: 'templates/flujo_laminar/almacena_informacion_1.php',
      type: 'POST',
      dataType: 'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(response) {
        console.log(response);

        if (response == ''){
            Swal.fire({
                    position:'center',
                    icon:'success',
                    title:'Inspecciones guardadas correctamente',
                    showConfirmButton: false,
                    timer:1000
                });
        }else{
            Swal.fire({
                    position:'center',
                    icon:'error',
                    title:'Error al actualizar',
                    showConfirmButton: false,
                    timer:1000
                });
        }
        
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
    url:'templates/flujo_laminar/controlador_imagenes.php',
    success:function(response){
      ///console.log(response);

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
              <img src="templates/flujo_laminar/${valor.url}${valor.nombre}" style="width: 100%;">
            </div>
          `;
        }
        else if(valor.tipo == 2){

          template2 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 56%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/flujo_laminar/${valor.url}${valor.nombre}" style="width: 100%;">
            </div>
          `;
        }
        else if(valor.tipo == 3){

          template3 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 56%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/flujo_laminar/${valor.url}${valor.nombre}" style="width: 100%;">
            </div>
          `;
        }
        else if(valor.tipo == 4){

          template4 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 56%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/flujo_laminar/${valor.url}${valor.nombre}" style="width: 100%;">
            </div>
          `;
        }
        else if(valor.tipo == 5){

          template5 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 56%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/flujo_laminar/${valor.url}${valor.nombre}" style="width: 100%;">
            </div>
          `;
        }
        else if(valor.tipo == 6){

          template6 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 56%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/flujo_laminar/${valor.url}${valor.nombre}" style="width: 100%;">
            </div>
          `;
        }
        else if(valor.tipo == 7){

          template7 += 
          `
            <div class="col-sm-4">
            <a class="btn btn-danger" id="eliminar_imagen" data-id="${valor.id_imagen}" style="color: white;margin-left: 56%;border-radius: 25px;margin-top: 5%;position: absolute;">X</a>
              <img src="templates/flujo_laminar/${valor.url}${valor.nombre}" style="width: 100%;">
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

$("#formulario_evidencias_graficas_flujo_laminar").submit(function(e){

    e.preventDefault();
    var formData = new FormData(document.getElementById("formulario_evidencias_graficas_flujo_laminar"));
  
    $.ajax({
      url: 'templates/flujo_laminar/guardar_evidencia_grafica.php',
      type: 'POST',
      dataType: 'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(response) {
        ///console.log(response);
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
        url:'templates/flujo_laminar/controlador_imagenes.php',
        success:function(response){
            ///console.log(response);
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

///////////// btn de informes:
  $("#abrir_informe").click(function(){
  
   let encrypt = "LF456DS4G5DS4F5SD21G4DFSGF14DS2vDF2bfg56f1d56sf15ds6f4g534G564g56f4g56df4g561G6F4D5G6DF4G564FG5DG"+id_asignado;
   //window.open("templates/filtros/informes/informe/inspeccion_de_filtros.php");
    window.open('templates/flujo_laminar/informe/informe/inspeccion_de_flujo_laminar.php?clave='+encrypt); 
})

 