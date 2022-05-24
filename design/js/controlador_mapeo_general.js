//// ELEMENTOS OCULTOS
$("#btn_edita_altura_bandeja").hide();
$("#btn_editar_mapeo_general").hide();
$("#btn_atras_altura_bandeja").hide();
$("#btn_atras_mapeo_general").hide();
$("#cargado_archivo_dc").hide();
$("#cargar_archivo_dc").hide();
$("#banner_cargando").hide();
$("#edicion_informe").hide();
$("#edicion_informe_base").hide();
$("#asignacion_sensores").hide();
$("#lista_de_bandejas").hide();
$("#datos_crudos_card").hide();
$("#mostrar_dato_crudo").hide();

///////////// VARIABLES GLOBALES
var id_asignado = $("#id_asignado").val();
var id_usuario  = $("#id_valida").val();
var id_type = $("#id_type").val();


if(id_type==12){
  $("#from_termocupla").hide();
  $("#from_sensores").show();
  $("#datos_crudos_termocupla").hide();
  $("#datos_crudos_sensores").show();
}else{
   $("#from_termocupla").show();
  $("#from_sensores").hide();
  $("#datos_crudos_sensores").hide();
  $("#datos_crudos_termocupla").show();
}


/////// FUNCIONES
listar_bandejas();
listar_mapeos();

$(document).ready(function(){
   $("#id_mapeo_configurar").val('');
    $("#id_bandeja_configurar").val('');
    $("#id_mapeo_informe").val('');
})



/////////// CREACI�N DE BANDEJAS
$("#btn_nueva_altura_bandeja").click(function(){

    let nombre_bandeja = $("#bandeja_general").val();
    let movimiento = "Crear";
    
    const datos = {
        nombre_bandeja,
        id_asignado,
        movimiento,
        id_usuario
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_bandeja.php',
        success:function(response){
          
            if(response == "Listo"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha creado la bandeja con exito',
                    icon:'success',
                    timer:1700
                });

                $("#bandeja_general").val("");
                listar_bandejas();
            }
        }

    })

});


function listar_bandejas(){

    let movimiento = "Listar";

    const datos = {
        id_asignado,
        movimiento
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_bandeja.php',
        success:function(response){

            let traer = JSON.parse(response);
            let template = "";
            let template2 = "";

            traer.forEach((valor)=>{

                template+=
                `
                    <tr>
                        <td>${valor.nombre}</td>
                        <td><button class="btn btn-info" data-id="${valor.id_bandeja}"  data-name = "${valor.nombre}" id="btn_modificar_bandeja">Modificar</button>
                        <button class="btn btn-danger" data-id="${valor.id_bandeja}" id="btn_eliminar_bandeja">Eliminar</button></td>
                    </tr>
                `;

                template2 +=
                `
                <tr>
                    <td>${valor.nombre}</td>
                    <td><button class="btn btn-info" data-id="${valor.id_bandeja}"  data-name = "${valor.nombre}" id="btn_utilizar_bandeja"><i class="pe-7s-check"></i></button>
                    </td>
                </tr>
                
                `;
            });

            $("#traer_bandejas").html(template);
            $("#traer_bandejas_asignacion").html(template2);
        }
    });

}


//////////// ELIMINAR BANDEJA

$(document).on('click','#btn_eliminar_bandeja',function(){

    let id_bandeja = $(this).attr('data-id');
    let movimiento = "Eliminar";

    const datos = {
        id_bandeja,
        movimiento
    }

    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Deseas eliminar la bandeja ?',
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: 'Si!',
        cancelButtonText: 'No!',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type:'POST',
                    data:datos,
                    url:'templates/mapeos_generales/controlador_bandeja.php',
                    success:function(response){
                  
                        if(response == "Si"){
                            Swal.fire({
                                title:'Mensaje',
                                text:'Se ha eliminado la bandeja con exito',
                                icon:'success',
                                timer:1700
                            });
            
                            listar_bandejas();
                        }
                    }
            
                })

            }
        });
});

//// MODIFICAR BANDEJA
$(document).on('click','#btn_modificar_bandeja',function(){

    let nombre_bandeja = $(this).attr('data-name');
    let id_bandeja = $(this).attr('data-id');
    $("#id_bandeja").val(id_bandeja);
    $("#bandeja_general").val(nombre_bandeja);

    $("#btn_edita_altura_bandeja").show();
    $("#btn_nueva_altura_bandeja").hide();
    $("#btn_atras_altura_bandeja").show();

    
});


$("#btn_edita_altura_bandeja").click(function(){
    let nuevo_nombre = $("#bandeja_general").val();
    let id_bandeja = $("#id_bandeja").val();
    let movimiento = "Actualizar";
    const datos = {
        nuevo_nombre,
        id_bandeja,
        movimiento
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_bandeja.php',
        success:function(response){
            if(response == "Listo"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha modificado correctamente',
                    icon:'success',
                    timer:1700
                });
                $("#bandeja_general").val("");
                $("#btn_edita_altura_bandeja").hide();
                $("#btn_nueva_altura_bandeja").show();
                $("#btn_atras_altura_bandeja").hide();
                listar_bandejas();
            }
        }
    })

});

///////// BOTON ATRAS
$("#btn_atras_altura_bandeja").click(function(){
    $("#bandeja_general").val("");
    $("#btn_edita_altura_bandeja").hide();
    $("#btn_nueva_altura_bandeja").show();
    $("#btn_atras_altura_bandeja").hide();

});


//////////////// EVENTOS PARA MAPEOS

$("#btn_nuevo_mapeo_general").click(function(){

    let movimiento = "Crear";
    let nombre_prueba = $("#nombre_prueba").val();
    let fecha_inicio_mapeo_general = $("#fecha_inicio_mapeo_general").val();
    let hora_inicio_mapeo_general = $("#hora_inicio_mapeo_general").val();
    let minuto_inicio_mapeo_general = $("#minuto_inicio_mapeo_general").val();
    let segundo_inicio_mapeo_general = $("#segundo_inicio_mapeo_general").val();
    let fecha_fin_mapeo_general = $("#fecha_fin_mapeo_general").val();
    let hora_fin_mapeo_general = $("#hora_fin_mapeo_general").val();
    let minuto_fin_mapeo_general = $("#minuto_fin_mapeo_general").val();
    let segundo_fin_mapeo_general = $("#segundo_fin_mapeo_general").val();
    let intervalo = $("#intervalo_mapeo").val();
    let porcentaje_carga = $("#porcentaje_carga").val();


    const datos = {
        movimiento,
        nombre_prueba,
        fecha_inicio_mapeo_general,
        hora_inicio_mapeo_general,
        minuto_inicio_mapeo_general,
        segundo_inicio_mapeo_general,
        fecha_fin_mapeo_general,
        hora_fin_mapeo_general,
        minuto_fin_mapeo_general,
        segundo_fin_mapeo_general,
        id_asignado,
        id_usuario,
        intervalo,
        porcentaje_carga
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_mapeo.php',
        success:function(response){
            if(response == "Listo"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha creado el mapeo con exito',
                    icon:'success',
                    timer:1700
                });
                listar_mapeos();
            }
        }

    })

});

////7 LISTAR MAPEOS

function listar_mapeos(){

    let movimiento = "Leer";
    $.ajax({
        type:'POST',
        data:{id_asignado, movimiento},
        url:'templates/mapeos_generales/controlador_mapeo.php',
        success:function(response){
       

            let traer = JSON.parse(response);
            let template = "";
            let template2 = "";
            let template3 = "";

            traer.forEach((valor)=>{
                
                

                template +=
                `
                    <tr>
                        <td>${valor.nombre}</td>
                        <td>${valor.fecha_inicio}</td>
                        <td>${valor.fecha_fin}</td>
                        <td><button class="btn btn-primary" data-id="${valor.id_mapeo}" id="editar_mapeo">Editar</button>
                        <button class="btn btn-danger" data-id="${valor.id_mapeo}" id="eliminar_mapeo">Eliminar</button></td>
                    </tr>
                `;

                template2 += 
                `
                    <tr>
                        <td>${valor.nombre}</td>
                        <td>${valor.fecha_inicio}</td>
                        <td>${valor.fecha_fin}</td>
                        <td><button class="btn btn-primary" data-id="${valor.id_mapeo}" id="configurar_mapeo" data-name="${valor.nombre}"><i class="lnr-pencil btn-icon-wrapper"></i></button></td>
                    </tr>
                
                `;

                template3 += 
                `
                    <tr>
                        <td>${valor.nombre}</td>
                        <td>${valor.fecha_inicio}</td>
                        <td>${valor.fecha_fin}</td>
                        <td><button class="btn btn-primary" data-id="${valor.id_mapeo}" id="configurar_informes" data-name="${valor.nombre}">Informes</button></td>
                    </tr>
                
                `;
            });
            $("#traer_mapeos").html(template);
            $("#traer_mapeos_asignacion").html(template2);
            $("#traer_mapeos_informe").html(template3);
        }

    })
}


////////// EDITAR MAPEO 
$(document).on('click','#editar_mapeo',function(){

    let id_mapeo = $(this).attr('data-id');
    $("#id_mapeo").val(id_mapeo);
    let movimiento = "traer";
    $.ajax({
        type:'POST',
        data:{id_mapeo, movimiento},
        url:'templates/mapeos_generales/controlador_mapeo.php',
        success:function(response){
           
            let traer = JSON.parse(response);

          
            
                $("#nombre_prueba").val(traer.nombre);
                $("#fecha_inicio_mapeo_general").val(traer.fecha_inicio);
                $("#hora_inicio_mapeo_general").val(traer.hora_inicio);
                $("#minuto_inicio_mapeo_general").val(traer.minuto_inicio);
                $("#segundo_inicio_mapeo_general").val(traer.segundo_inicio);
                $("#fecha_fin_mapeo_general").val(traer.fecha_fin);
                $("#hora_fin_mapeo_general").val(traer.hora_fin);
                $("#minuto_fin_mapeo_general").val(traer.minuto_fin);
                $("#segundo_fin_mapeo_general").val(traer.segundo_fin);
                $("#intervalo_mapeo").val(traer.intervalo);
                $("#porcentaje_carga").val(traer.porcentaje_carga);
                

                Swal.fire({
                    title:'Mensaje',
                    text:'Revisa la pestaña de mapeo, para actualizar tus datos',
                    icon:'info',
                    timer:2000
                });

                $("#btn_nuevo_mapeo_general").hide();
                $("#btn_editar_mapeo_general").show();
                $("#btn_atras_mapeo_general").show();
            
        }

    });    
});

$("#btn_atras_mapeo_general").click(function(){

    $("#btn_nuevo_mapeo_general").show();
    $("#btn_editar_mapeo_general").hide();
    $("#btn_atras_mapeo_general").hide();
    $("#nombre_prueba").val("");
    $("#fecha_inicio_mapeo_general").val("");
    $("#hora_inicio_mapeo_general").val("");
    $("#minuto_inicio_mapeo_general").val("");
    $("#segundo_inicio_mapeo_general").val("");
    $("#fecha_fin_mapeo_general").val("");
    $("#hora_fin_mapeo_general").val("");
    $("#minuto_fin_mapeo_general").val("");
    $("#segundo_fin_mapeo_general").val("");
    $("#id_mapeo").val("");
    $("#intervalo_mapeo").val("");
    $("#porcentaje_carga").val("");

    
});


$("#btn_editar_mapeo_general").click(function(){

    let movimiento = "actualiza";
    let nombre_prueba = $("#nombre_prueba").val();
    let fecha_inicio_mapeo_general = $("#fecha_inicio_mapeo_general").val();
    let hora_inicio_mapeo_general = $("#hora_inicio_mapeo_general").val();
    let minuto_inicio_mapeo_general = $("#minuto_inicio_mapeo_general").val();
    let segundo_inicio_mapeo_general = $("#segundo_inicio_mapeo_general").val();
    let fecha_fin_mapeo_general = $("#fecha_fin_mapeo_general").val();
    let hora_fin_mapeo_general = $("#hora_fin_mapeo_general").val();
    let minuto_fin_mapeo_general = $("#minuto_fin_mapeo_general").val();
    let segundo_fin_mapeo_general = $("#segundo_fin_mapeo_general").val();
    let id_mapeo = $("#id_mapeo").val();
    let intervalo = $("#intervalo_mapeo").val();
    let porcentaje_carga = $("#porcentaje_carga").val();

    const datos = {
        movimiento,
        nombre_prueba,
        fecha_inicio_mapeo_general,
        hora_inicio_mapeo_general,
        minuto_inicio_mapeo_general,
        segundo_inicio_mapeo_general,
        fecha_fin_mapeo_general,
        hora_fin_mapeo_general,
        minuto_fin_mapeo_general,
        segundo_fin_mapeo_general,
        id_mapeo,
        intervalo,
        porcentaje_carga
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_mapeo.php',
        success:function(response){
       

            if(response == "Si"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha actualizado correctamente',
                    icon:'success',
                    timer:1700
                });
                listar_mapeos();
                $("#btn_nuevo_mapeo_general").show();
                $("#btn_editar_mapeo_general").hide();
                $("#btn_atras_mapeo_general").hide();

            }
        }
    })

});    


///////// ELIMINAR MAPEO 
$(document).on('click','#eliminar_mapeo',function(){

    let id_mapeo = $(this).attr('data-id');
    let movimiento = "Eliminar";

    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Deseas eliminar el mapeo?',
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: 'Si!',
        cancelButtonText: 'No!',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type:'POST',
                    data:{id_mapeo, movimiento},
                    url:'templates/mapeos_generales/controlador_mapeo.php',
                    success:function(response){
                    

                        if(response == "Si"){
                            Swal.fire({
                                title:'Mensaje',
                                text:'Se ha eliminado, el mapeo exitosamente',
                                icon:'sucess',
                                timer:1700
                            });

                            listar_mapeos();
                        }
                    }
                })
            }
        });
});


/////////////////////////// BOTONES DE CONFIGURACIÓN

$(document).on('click','#configurar_mapeo',function(){
    let id_mapeo = $(this).attr('data-id');
    let nombre_mapeo = $(this).attr('data-name');

    $("#nombre_mapeo_configurar").html("<span class='text-primary'>"+nombre_mapeo+"</span>");
    $("#id_mapeo_configurar").val(id_mapeo);
    $("#id_mapeo_datos_crudos").val(id_mapeo);

    $("#lista_de_bandejas").show();


});

$(document).on('click','#btn_utilizar_bandeja',function(){

    let id_bandeja = $(this).attr('data-id');
    let nombre_bandeja = $(this).attr('data-name');

    $("#nombre_bandeja_configurar").html("<span class='text-primary'>"+nombre_bandeja+"</span>");
    $("#id_bandeja_configurar").val(id_bandeja);

    let id_mapeo = $("#id_mapeo_configurar").val();

    validar_datos_crudos(id_mapeo, 'validar_archivo');
    validar_datos_crudos(id_mapeo, 'validar_carga_db');

    listar_sensor_asignados(id_mapeo, id_bandeja);

    $("#asignacion_sensores").show();
    $("#datos_crudos_card").show();
    
});


///////////////// BUSCAR SENSORES

$("#buscador_sensores").keyup(function(){

    let buscar = $(this).val();
    let movimiento = "buscar";
   let id_mapeo = $("#id_mapeo_configurar").val();

    if(buscar.length != 0){
        $("#titulo_predeterminado_sensor").hide();
    }else{
        $("#titulo_predeterminado_sensor").show();
    }

    $.ajax({
        type:'POST',
        data:{buscar,movimiento,id_mapeo},
        url:'templates/mapeos_generales/controlador_sensor.php',
        success:function(response){
            
            let traer = JSON.parse(response);
            let template = "";

            traer.forEach((valor)=>{
                template += 
                
                    `
                        <tr>
                            <td>${valor.nombre}</td>
                            <td>${valor.certificado}</td>
                            <td>${valor.fecha_vencimiento}</td>
                            <td><button class="btn btn-primary" id="agregar_sensor" data-id="${valor.id_sensor}">Agregar</button></td>
                        </tr>
                
                    `;  
            });

            $("#resultado_sensores").html(template);
        }

    })
});


////////// EVENTO SENSOR

$(document).on('click','#agregar_sensor',function(){

    let id_sensor = $(this).attr('data-id');
    let id_mapeo_actual = $("#id_mapeo_configurar").val();
    let id_bandeja_actual = $("#id_bandeja_configurar").val();
    let movimiento = "agregar";

    const datos = {
        id_sensor,
        id_mapeo_actual,
        id_bandeja_actual,
        movimiento
    }

    if(id_mapeo_actual.length == 0 || id_bandeja_actual == 0){
        Swal.fire({
            title:'Mensaje',
            text:'Debes seleccionar una mapeo y una bandeja para continuar',
            icon:'warning',
            timer:1700
        });
    }else{
        $.ajax({
            type:'POST',
            data:datos,
            url:'templates/mapeos_generales/controlador_sensor.php',
            success:function(response){
     
                if(response == "Existe"){
                    Swal.fire({
                        title:'Mensaje',
                        text:'EL sensor ya se encuentra asignado',
                        icon:'warning',
                        timer:1700
                    });
                }else{
                    Swal.fire({
                        title:'Mensaje',
                        text:'El sensor ha sido asignado correctamente',
                        icon:'success',
                        timer:1700
                    });
                    listar_sensor_asignados(id_mapeo_actual, id_bandeja_actual);
                }
            }
        });

    }

});


function listar_sensor_asignados(id_mapeo, id_bandeja){

    let movimiento = "Listar_asignados"; 

    const datos = {
        id_mapeo,
        id_bandeja,
        movimiento
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_sensor.php',
        success:function(response){
          
            let traer = JSON.parse(response);
            let template = "";
            let template2 = "";
            let temp = "";
            let hum = "";
            let val_temp = "";
            let val_hum = "";
            let template3 = "";

            traer.forEach((valor)=>{

                if(valor.posicion_tem == "no aplica"){
                    temp = "no aplica";
                    val_temp = "no aplica";
                }else{
                    temp = valor.posicion_tem - 1;
                    val_temp = valor.posicion_tem++;
                }

                if(valor.posicion_hum == "no aplica"){
                    hum = "no aplica";
                    val_hum = "no aplica";
                }else{
                    hum = valor.posicion_hum - 1;
                    val_hum = valor.posicion_hum++;
                }

                template += 
                `
                    <tr>
                        <td>${valor.nombre}</td>
                        <td><select class="form-control" data-id="${valor.id_sensor_mapeo}"  data-type='${id_mapeo}' data-bandeja='${id_bandeja}' id="cambiar_posicion">
                                <option value="${valor.posicion}">${valor.posicion}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                            </select></td>
                        <td><button class="btn btn-danger" id="remover_sensor" data-id="${valor.id_sensor_mapeo}">X</button></td>    
                    </tr>
                    
                `;
              
              template3 += 
                `
                    <tr>
                        <td>${valor.nombre}</td>
                        <td><select class="form-control" data-id="${valor.id_sensor_mapeo}" data-type='${id_mapeo}'  data-bandeja='${id_bandeja}'id="cambiar_posicion">
                                <option value="${valor.posicion}">${valor.posicion}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                            </select></td>     
                       
                        <td>Registros: ${valor.registros}</td> 
                        <td>
                             <button class="btn btn-danger" id="remover_sensor" data-id="${valor.id_sensor_mapeo}">X</button>    
                             <button class="btn btn-primary" id="configurar_sensor" data-id="${valor.id_sensor_mapeo}" data-name="${valor.nombre}" data-position ="${valor.posicion}">Asignar</button>
                        </td>
                        
                    </tr>
                    
                `;

                template2 += 
                ` 
                    <input type="hidden" name="id_valor_sensor[]" value="${valor.id_sensor_mapeo}">
                    <tr>
                        <td>${valor.nombre}</td>
                        <td><select class="form-control" data-id="${valor.id_sensor_mapeo}" id="cambiar_posicion_temp" name="cambiar_posicion_temp[]">
                            <option value="${val_temp}">${temp}</option>
                            <option value="no aplica">no aplica</option>
                            <option value="2">1</option>
                            <option value="3">2</option>
                            <option value="4">3</option>
                            <option value="5">4</option>
                            <option value="6">5</option>
                            <option value="7">6</option>
                            <option value="8">7</option>
                            <option value="9">8</option>
                            <option value="10">9</option>
                            <option value="11">10</option>
                            <option value="12">11</option>
                            <option value="13">12</option>
                            <option value="14">13</option>
                            <option value="15">14</option>
                            <option value="16">15</option>
                            <option value="17">16</option>
                            <option value="18">17</option>
                            <option value="19">18</option>
                            <option value="20">19</option>
                            <option value="21">20</option>
                        </select></td>
                        <td><select class="form-control" data-id="${valor.id_sensor_mapeo}" id="cambiar_posicion_hum" name="cambiar_posicion_hum[]">
                            <option value="${val_hum}">${hum}</option>
                            <option value="no aplica">no aplica</option>
                            <option value="2">1</option>
                            <option value="3">2</option>
                            <option value="4">3</option>
                            <option value="5">4</option>
                            <option value="6">5</option>
                            <option value="7">6</option>
                            <option value="8">7</option>
                            <option value="9">8</option>
                            <option value="10">9</option>
                            <option value="11">10</option>
                            <option value="12">11</option>
                            <option value="13">12</option>
                            <option value="14">13</option>
                            <option value="15">14</option>
                            <option value="16">15</option>
                            <option value="17">16</option>
                            <option value="18">17</option>
                            <option value="19">18</option>
                            <option value="20">19</option>
                            <option value="21">20</option>
                        </select></td>
                    </tr>    
                `;

            });

            $("#listar_sensores_asignados_termocupla").html(template);
            $("#listar_sensores_asignados_sensores").html(template3);
            $("#sensores_asignado_dc").html(template2);
        }
    }); 
    
}


////// cambiar posición
$(document).on('change','#cambiar_posicion', function(){

    let id_mapeo = $(this).attr('data-id');
    let  id_maping = $(this).attr('data-type');
  let id_bandeja = $(this).attr('data-bandeja');
    let posicion = $(this).val();
    let movimiento = "cambiar_posicion";
    
    const datos = {
        id_mapeo,
        posicion,
        movimiento,
        id_maping,
      id_bandeja
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_sensor.php',
        success:function(response){
            let id_mapeo_actual = $("#id_mapeo_configurar").val();
            let id_bandeja_actual = $("#id_bandeja_configurar").val();
            
            if(response == "Si"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha actualizado la posición',
                    icon:'success',
                    timer:1700
                });
               
            }else if( response == "ya esta la posicion"){
              Swal.fire({
                title:'Mensaje',
                text:'No puedes utilizar esta posición, ya se encuentra ocuapda',
                icon:'warning',
                timer:1800
              });
            }
           listar_sensor_asignados(id_mapeo_actual, id_bandeja_actual);
        }
    });

});

///////////// REMOVER SENSOR 

$(document).on('click','#remover_sensor',function(response){

        let id_mapeo = $(this).attr('data-id');
        let movimiento = "remover";

        $.ajax({
            type:'POST',
            data:{id_mapeo, movimiento},
            url:'templates/mapeos_generales/controlador_sensor.php',
            success:function(response){
                let id_mapeo_actual = $("#id_mapeo_configurar").val();
                let id_bandeja_actual = $("#id_bandeja_configurar").val();
    
                if(response == "Si"){
                    Swal.fire({
                        title:'Mensaje',
                        text:'Se ha removido el sensor',
                        icon:'success',
                        timer:1700
                    });
                    listar_sensor_asignados(id_mapeo_actual, id_bandeja_actual);
                }
            }
        });
});


///////////// CARGAR DATOS CRUDOS
$("#cargar_archivo_dc").click(function(){

    var URLactual = $("#es_local").val();
    let id_mapeo = $("#id_mapeo_configurar").val();

	if(URLactual == "Si"){
		window.open(`https://localhost/CerNet2.0/templates/datoscrudos/vistadatoscrudos.php?id_valida=${id_usuario}&id_asignado=${id_asignado}&id_mapeo=${id_mapeo}`, "Datos Crudos", "width=1693px, height=1693px")


	}else{
		window.open(`https://cercal.net/CerNet2.0/templates/datoscrudos/vistadatoscrudos.php?id_valida=${id_usuario}&id_asignado=${id_asignado}&id_mapeo=${id_mapeo}`, "Datos Crudos", "width=1693px, height=1693px");
	}
});

$("#cargado_archivo_dc").click(function(){

    var URLactual = $("#es_local").val();
    let id_mapeo = $("#id_mapeo_configurar").val();

	if(URLactual == "Si"){
		window.open(`https://localhost/CerNet2.0/templates/datoscrudos/vistadatoscrudos.php?id_valida=${id_usuario}&id_asignado=${id_asignado}&id_mapeo=${id_mapeo}`, "Datos Crudos", "width=1693px, height=1693px")


	}else{
		window.open(`https://cercal.net/CerNet2.0/templates/datoscrudos/vistadatoscrudos.php?id_valida=${id_usuario}&id_asignado=${id_asignado}&id_mapeo=${id_mapeo}`, "Datos Crudos", "width=1693px, height=1693px");
	}
});



//////////// ASIGNAR LA POSICIÓN DEL ARCHIVO 

$(document).on('change','#cambiar_posicion_temp',function(){

    let id_sensor_mapeo = $(this).attr('data-id');
    let col = $(this).val();
    let movimiento = "posicion_tem";

    const datos = {
        id_sensor_mapeo,
        col,
        movimiento
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_sensor.php',
        success:function(response){
            let id_mapeo_actual = $("#id_mapeo_configurar").val();
            let id_bandeja_actual = $("#id_bandeja_configurar").val();

            if(response == "Si"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha asignado la posición correctamente',
                    icon:'success',
                    timer:1700
                });
                listar_sensor_asignados(id_mapeo_actual, id_bandeja_actual);
            }
        }
    });
});

$(document).on('change','#cambiar_posicion_hum',function(){

    let id_sensor_mapeo = $(this).attr('data-id');
    let col = $(this).val();
    let movimiento = "posicion_hum";

    const datos = {
        id_sensor_mapeo,
        col,
        movimiento
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_sensor.php',
        success:function(response){
            let id_mapeo_actual = $("#id_mapeo_configurar").val();
            let id_bandeja_actual = $("#id_bandeja_configurar").val();

            if(response == "Si"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha asignado la posición correctamente',
                    icon:'success',
                    timer:1700
                });
                listar_sensor_asignados(id_mapeo_actual, id_bandeja_actual);
            }
        }
    });
});

////////// VALIDAR DATOS CRUDOS
function validar_datos_crudos(id_mapeo, movimiento){

    $.ajax({
        type:'POST',
        data:{id_mapeo,movimiento},
        url:'templates/mapeos_generales/controlador_datos_crudos.php',
        success:function(response){
            console.log(response);
            if(movimiento == "validar_archivo"){
                if(response == "Cargado"){
                    $("#cargado_archivo_dc").show();
                    $("#cargar_archivo_dc").hide();
                }else{
                    $("#cargado_archivo_dc").hide();
                    $("#cargar_archivo_dc").show();
                }
            }else if(movimiento == "validar_carga_db"){
                if(response == "0"){
                    $("#configuracion_datos_crudos").hide();
                    $("#eliminar_datos_crudos").show();
                }else{
                    $("#configuracion_datos_crudos").show();
                    $("#eliminar_datos_crudos").hide();
                }
                
            }

        }
    })
}



//////////// FORMULARIO DE ENVIO DE DATOS
$(document).on('submit', '#formulario_sensores_generales',function(e){
    e.preventDefault();
    //$('#fechas').show();

    var formData = new FormData(document.getElementById("formulario_sensores_generales"));


    $.ajax({
        type: 'POST',
        dataType: 'html',
        data: formData,
        url: 'templates/mapeos_generales/controlador_datos_crudos.php',
        cache: false,
        contentType: false,
        processData: false,
        success:function(response) {

            $("#banner_cargando").show();
            $("#configuracion_datos_crudos").hide();

            if(response == "Terminado"){
           
               
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha cargado correctamente los datos crudos',
                    icon:'success',
                    timer:1700
                });

                let id_mapeo = $("#id_mapeo_datos_crudos").val();
                let movimiento = "validar_carga_db";
                validar_datos_crudos(id_mapeo, movimiento)
                $("#banner_cargando").hide();
            }
        }
    });

});


/////////// ELIMINAR DATOS CRUDOS 

$("#eliminar_datos_crudos").click(function(){

        let id_mapeo = $("#id_mapeo_datos_crudos").val();
        let movimiento = "Eliminar_dc";

        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Deseas eliminar los datos crudos para esta prueba?',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Si!',
            cancelButtonText: 'No!',
            }).then((result) => {
                $.ajax({
                    type:'POST',
                    data:{id_mapeo,movimiento},
                    url:'templates/mapeos_generales/controlador_datos_crudos.php',
                    success:function(response){
                        if(response == "Listo"){
                            Swal.fire({
                                title:'Mensaje',
                                text:'Se ha eliminado con exito los datos crudos',
                                icon:'success',
                                timer:1700
                            });
                            validar_datos_crudos(id_mapeo, "validar_carga_db");
                        }
                        
                    }
                });    
            });
});

//////////////////////////////////////////////////////////////// EVENTOS PARA LOS INFORMES  
traer_correlativo();

function traer_correlativo(){

    let movimiento = "Traer";

    $.ajax({
        type:'POST',
        data:{id_asignado, movimiento},
        url:'templates/mapeos_generales/controlador_consecutivo.php',
        success:function(response){
          let traer = JSON.parse(response);
            traer.forEach((valor)=>{
                $("#correlativo").val(valor.correlativo);
                $("#responsable_informe").val(valor.usuario);
            })
            
        }

    });    
}


$("#asignar_correlativo").click(function(){

    let correlativo = $("#correlativo").val();
    let responsable = $("#responsable_informe").val();
    let movimiento = "guardar";
    const datos = {
        id_asignado,
        correlativo,
        movimiento,
        responsable
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_consecutivo.php',
        success:function(response){

            if(response == "Si"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha creado el correlativo con exito',
                    icon:'success',
                    timer:1700
                });
                traer_correlativo();
            }else{
              Swal.fire({
                    title:'Mensaje',
                    text:'El nombre del usuario no es correcto',
                    icon:'warning',
                    timer:1700
                });
            }
        }
    })
}); 









/////////////// CONFIGURACIÓN DE INFORMES

$(document).on('click','#configurar_informes',function(){

    let id_mapeo = $(this).attr('data-id');
    $("#id_mapeo_informe").val(id_mapeo);
    listar_informes_x_prueba(id_mapeo);

});


function listar_informes_x_prueba(id_mapeo){
    
    let movimiento = "Leer";

    const datos = {
        id_mapeo,
        id_asignado,
        movimiento
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_informes.php',
        success:function(response){
            let template = "";
            if(response.length==2){
                template += 
                `
                <tr>
                    <td colspan="4" class="text-warning">No existen informes</td>
                </tr>
                `;
            }else{
                
                let traer = JSON.parse(response);
                
                traer.forEach((valor)=>{

                    template += 
                    `
                        <tr>
                            <td>${valor.nombre}</td>
                            <td>${valor.tipo}</td>
                            <td>${valor.fecha_registro}</td>
                            <td>
                                <button class="btn btn-info" id="editar_informe" data-id="${valor.id_informe}" data-name="${valor.tipo}">Editar</button>
                                <button class="btn btn-info" id="ver_informe" data-id="${valor.id_informe}">Ver</button>
                                <button class="btn btn-danger" id="eliminar_informe" data-id="${valor.id_informe}">Eliminar</button>
                            </td>
                        </tr>
                    `;
                });

            }

            $("#listar_informe").html(template);
        }
    });
}


//////////// CREACIÓN DE INFORMES

$("#creacion_temp").click(function(){

    let id_mapeo = $("#id_mapeo_informe").val();
    let movimiento = "crear_temp";

    if(id_mapeo.length == 0){
        Swal.fire({
            title:'Mensaje',
            text:'Debes seleccionar una prueba',
            icon:'info',
            timer:1500
        });
    
    }else{

        const datos = {
            id_mapeo,
            movimiento,
            id_asignado,
            id_usuario
        }

        $.ajax({
            type:'POST',
            data:datos,
            url:'templates/mapeos_generales/controlador_informes.php',
            success:function(response){

                if(response == "Existe"){
                    Swal.fire({
                        title:'Mensaje',
                        text:'ya existe un informe para esta prueba',
                        icon:'warning',
                        timer:1500
                    });
                  listar_informes_x_prueba(id_mapeo);
                }else if(response == "Primero correlativo"){
                    Swal.fire({
                        title:'Mensaje',
                        text:'Primero debes crear un correlativo',
                        icon:'error',
                        timer:1700
                    });
                }
              else{
                    Swal.fire({
                        title:'Mensaje',
                        text:'Se ha creado el informe correctamente',
                        icon:'success',
                        timer:1700
                    });
                listar_informes_x_prueba(id_mapeo);
                }
                
            }

            
        });
    }    
   
});


$("#creacion_hum").click(function(){

    let id_mapeo = $("#id_mapeo_informe").val();

    if(id_mapeo.length == 0){
        Swal.fire({
            title:'Mensaje',
            text:'Debes seleccionar una prueba',
            icon:'info',
            timer:1500
        });
    }else{

    
        let movimiento = "crear_hum";

        const datos = {
            id_mapeo,
            movimiento,
            id_asignado,
            id_usuario
        }

        $.ajax({
            type:'POST',
            data:datos,
            url:'templates/mapeos_generales/controlador_informes.php',
            success:function(response){

                if(response == "Existe"){
                    Swal.fire({
                        title:'Mensaje',
                        text:'ya existe un informe para esta prueba',
                        icon:'warning',
                        timer:1500
                    });
                }else{
                    Swal.fire({
                        title:'Mensaje',
                        text:'Se ha creado el informe correctamente',
                        icon:'success',
                        timer:1700
                    });
                }
                listar_informes_x_prueba(id_mapeo);
            }

            
        });
    }    
});

$("#creacion_ar").click(function(){

    let id_mapeo = $("#id_mapeo_informe").val();
    let movimiento = "crear_ar";

    if(id_mapeo.length == 0){
        Swal.fire({
            title:'Mensaje',
            text:'Debes seleccionar una prueba',
            icon:'info',
            timer:1500
        });
    
    }else{

        const datos = {
            id_mapeo,
            movimiento,
            id_asignado,
            id_usuario
        }

        $.ajax({
            type:'POST',
            data:datos,
            url:'templates/mapeos_generales/controlador_informes.php',
            success:function(response){
                console.log(response);
                if(response == "Existe"){
                    Swal.fire({
                        title:'Mensaje',
                        text:'ya existe un informe para esta prueba',
                        icon:'warning',
                        timer:1500
                    });
                }else{
                    Swal.fire({
                        title:'Mensaje',
                        text:'Se ha creado el informe correctamente',
                        icon:'success',
                        timer:1700
                    });
                }
                listar_informes_x_prueba(id_mapeo);
            }

            
        });
    }    
   
});

$("#creacion_base").click(function(){

    let id_mapeo = $("#id_mapeo_informe").val();
    let movimiento = "crear_base";

    if(id_mapeo.length == 0){
        Swal.fire({
            title:'Mensaje',
            text:'Debes seleccionar una prueba',
            icon:'info',
            timer:1500
        });
    
    }else{

        const datos = {
            id_mapeo,
            movimiento,
            id_asignado,
            id_usuario
        }

        $.ajax({
            type:'POST',
            data:datos,
            url:'templates/mapeos_generales/controlador_informes.php',
            success:function(response){
                console.log(response);
                if(response == "Existe"){
                    Swal.fire({
                        title:'Mensaje',
                        text:'ya existe un informe para esta prueba',
                        icon:'warning',
                        timer:1500
                    });
                }else{
                    Swal.fire({
                        title:'Mensaje',
                        text:'Se ha creado el informe correctamente',
                        icon:'success',
                        timer:1700
                    });
                }
                listar_informes_x_prueba(id_mapeo);
            }

            
        });
    }    
   
});


$(document).on('click','#editar_informe',function(){

        let id_informe = $(this).attr('data-id');
        $("#id_informe_imagenes").val(id_informe);
        let nombre = $(this).attr('data-name');
        if(nombre == "TEMP" || nombre == "HUM"){
           $("#edicion_imagenes").show();
           $("#edicion_informe").show();
           $("#card_informes").hide();
           $("#edicion_informe").hide();
           listar_info_temp(id_informe, 'TEMP');
          
        }else if(nombre == 'AR'){
            $("#edicion_imagenes").hide();
            $("#edicion_informe").show();
            $("#card_informes").hide();
            $("#edicion_informe").hide();
            $("#editar_informe_row").show();
            listar_info_temp(id_informe, 'AR');

        }else if(nombre == 'BASE'){
          $("#edicion_informe_base").show();  
          $("#edicion_imagenes").hide();
          $("#edicion_informe").show();
          $("#editar_informe_row").hide();
          $("#card_informes").hide();
          listar_info_temp(id_informe, 'BASE');
        }
       
});

$("#close_edicion").click(function(){
    $("#edicion_informe").hide();
    $("#card_informes").show();
});

$("#close_edicion_base").click(function(){
    $("#edicion_informe_base").hide();
    $("#card_informes").show();
});


///////// ELIMINAR INFORME
$(document).on('click','#eliminar_informe',function(){

        let id_informe = $(this).attr('data-id');
        let movimiento = "eliminar_informe";
        let id_mapeo = $("#id_mapeo_informe").val();

        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Deseas eliminar el informe?',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Si!',
            cancelButtonText: 'No!',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type:'POST',
                        data:{id_informe, movimiento},
                        url:'templates/mapeos_generales/controlador_informes.php',
                        success:function(response){

                            if(response == "Si"){
                                Swal.fire({
                                    title:'Mensaje',
                                    text:'Se ha eliminado el informe correctamente',
                                    icon:'success',
                                    timer:1700
                                });
                                listar_informes_x_prueba(id_mapeo);
                            }
                        }

                    })
                }
            });    
});



function listar_info_temp(id_informe, extra){
  
    let movimiento = "";
    mostrar_imagenes(id_informe);
    if(extra == "AR"){
       $("#edicion_informe").show();
       $("#edicion_informe_base").hide();
       movimiento = "Consultar_ar";
     }else if(extra == 'TEMP' || extra == 'HUM'){
       $("#edicion_informe").show();
       $("#edicion_informe_base").hide();
       movimiento = "Consultar_temp";
     }else if(extra == 'BASE'){
       $("#edicion_informe").show();
       $("#editar_informe_row").hide();
       $("#edicion_informe_base").show();
       movimiento = "Consultar_base";
     }
  
 
    $.ajax({
        type:'POST',
        data:{id_informe,movimiento},
        url:'templates/mapeos_generales/controlador_informes.php',
        success:function(response){
          
            let traer = JSON.parse(response);
            let template = "";
            let url_imagen_1 = "";
            let url_imagen_2 = "";
            let url_imagen_3 = "";
            let btn_file_1 = "";
            let btn_file_2 = "";
            let btn_file_3 = "";
            let templatear = "";
            let contador = 1;
            let template2 = "";
            let template3 = "";

            traer.forEach((valor)=>{
              $("#tipo_informe").val(valor.tipo_informe);
               if(valor.tipo_informe == "AR"){
                    
                 
                  if(contador == 1){
                    template += 
                      
                      `
                       <form id="formulario_informe" enctype="multipart/form-data" method="post">
                         <select class="form-control" name="tipo_protocolo">
                            <option value="0">Seleccione...</option>
                            <option value="GMP">GMP</option>
                            <option value="GLP">GLP</option>
                            <option value="GSP">GSP</option>
                         </select>
                        <input type="hidden" value="AR" name="AR">
                        <input type="hidden" value="${id_informe}" name="id_informe">
                        <table class="table">
                        <thead>
                          <th>Etapa/SubEtapa bajo análisis</th>
                          <th>Relevancia</th>
                          <th>Descripción del Riesgo Identificado</th>
                          <th>Probabilidad (A,M,B)</th>
                          <th>Impacto (A,M,B)</th>
                          <th>Clase</th>
                          <th>Probabilidad de detección (A,M,B)</th>
                          <th>Prioridad (A,M,B)</th>
                          <th>Medidas / Accionesa tomar</th>
                        </thead>
                        <tbody>
                          <tr>
                              <td><input type="text" name="valor_etapa[]" value="${valor.etapa}" class="form-control">
                                <input type="hidden" name="id_informe_actual[]" value="${valor.id_riesgo}"></td>
                              <td><input type="text" name="valor_relevancia[]" value="${valor.relevancia}" class="form-control"></td>
                              <td><input type="text" name="valor_descripcion[]" value="${valor.descripcion}" class="form-control"></td>
                              <td><input type="text" name="valor_probabilidad[]" value="${valor.probabilidad}" class="form-control"></td>
                              <td><input type="text" name="valor_impacto[]" value="${valor.impacto}" class="form-control"></td>
                              <td><input type="text" name="valor_clase[]" value="${valor.clase}" class="form-control"></td>
                              <td><input type="text" name="valor_deteccion[]" value="${valor.deteccion}" class="form-control"></td>
                              <td><input type="text" name="valor_prioridad[]" value="${valor.prioridad}" class="form-control"></td>
                              <td><input type="text" name="valor_medidas[]" value="${valor.medidas}" class="form-control"></td>
                          </tr>

                      `;
                  }else if(contador <= 9){
                      template2 += `
                          <tr>
                              <td><input type="text" name="valor_etapa[]" value="${valor.etapa}" class="form-control">
                              <input type="hidden" name="id_informe_actual[]" value="${valor.id_riesgo}"></td>
                              <td><input type="text" name="valor_relevancia[]" value="${valor.relevancia}" class="form-control"></td>
                              <td><input type="text" name="valor_descripcion[]" value="${valor.descripcion}" class="form-control"></td>
                              <td><input type="text" name="valor_probabilidad[]" value="${valor.probabilidad}" class="form-control"></td>
                              <td><input type="text" name="valor_impacto[]" value="${valor.impacto}" class="form-control"></td>
                              <td><input type="text" name="valor_clase[]" value="${valor.clase}" class="form-control"></td>
                              <td><input type="text" name="valor_deteccion[]" value="${valor.deteccion}" class="form-control"></td>
                              <td><input type="text" name="valor_prioridad[]" value="${valor.prioridad}" class="form-control"></td>
                              <td><input type="text" name="valor_medidas[]" value="${valor.medidas}" class="form-control"></td>
                          </tr>
                          
                       `; 
                  }else{
                    template3 += `
                          <tr>
                              <td><input type="text" name="valor_etapa[]" value="${valor.etapa}" class="form-control"> 
                              <input type="hidden" name="id_informe_actual[]" value="${valor.id_riesgo}"></td>
                              <td><input type="text" name="valor_relevancia[]" value="${valor.relevancia}" class="form-control"></td>
                              <td><input type="text" name="valor_descripcion[]" value="${valor.descripcion}" class="form-control"></td>
                              <td><input type="text" name="valor_probabilidad[]" value="${valor.probabilidad}" class="form-control"></td>
                              <td><input type="text" name="valor_impacto[]" value="${valor.impacto}" class="form-control"></td>
                              <td><input type="text" name="valor_clase[]" value="${valor.clase}" class="form-control"></td>
                              <td><input type="text" name="valor_deteccion[]" value="${valor.deteccion}" class="form-control"></td>
                              <td><input type="text" name="valor_prioridad[]" value="${valor.prioridad}" class="form-control"></td>
                              <td><input type="text" name="valor_medidas[]" value="${valor.medidas}" class="form-control"></td>
                          </tr>
                          </tbody>
                          </table>
                          <div class="row" style="text-align:center;">
                              <div class="col-sm-12">
                                  <button class="btn btn-info" id="actualizar_informe">Actualizar</button>
                              </div>
                          </div>
                        </form>
                       `; 
                    
                  }
                  contador++;
                 
                }else if(valor.tipo_informe == "TEMP" || valor.tipo_informe == "HUM"){
                                 
                if(valor.url1 == null){
                    url_imagen_1 = "design/images/no_imagen.png";
                    btn_file_1 = "<input type='file' name='imagen_tipo_1' class='form-control'>";
                }else{
                    url_imagen_1 = "templates/mapeos_generales/"+valor.url1;
                    btn_file_1 = "<span class='text-success'>Imagen Cargada</span>";
                }
                if(valor.url2 == null){
                    url_imagen_2 = "design/images/no_imagen.png";
                    btn_file_2 = "<input type='file' name='imagen_tipo_2' class='form-control'>";
                }else{
                    url_imagen_2 = "templates/mapeos_generales/"+valor.url2;
                    btn_file_2 = "<span class='text-success'>Imagen Cargada</span>";
                }
                if(valor.url3 == null){
                    url_imagen_3 = "design/images/no_imagen.png";
                    btn_file_3 = "<input type='file' name='imagen_tipo_3' class='form-control'>";
                }else{
                    url_imagen_3 = "templates/mapeos_generales/"+valor.url3;
                    btn_file_3 = "<span class='text-success'>Imagen Cargada</span>";
                }
                
              
               
                  
                template += 
                `
                <div class="row">
                  <div class="col-sm-5">
                      <button class="btn btn-info" id="ver_dc_todos" data-id="${valor.id_informe}" data-name="${valor.tipo_informe}">Datos crudos (Todos los sensores)</button>
              
                  </div>
                  <div class="col-sm-5">
                      <button class="btn btn-info" id="ver_dc_todos_promedio" data-id="${valor.id_informe}" data-name="${valor.tipo_informe}">Datos crudos promedio (Todos los sensores)</button>
                  </div>
                </div>
                <hr>
                <form id="formulario_informe" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id_informe_actual" value="${valor.id_informe}">
                    <div class="row">
                      <div class="col-sm-6">
                          <label>Solicitante: </label>
                          <input type="text" class="form-control" placeholder="Solicitante" value="${valor.solicitante}" name="solicitante">  
                      </div>
  
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Comentarios:</label>
                            <textarea class="form-control" value="${valor.comentario}" id="comentario_informe_temp" name="comentario_informe_temp">${valor.comentario}</textarea>
                        </div>
                        <div class="col-sm-6">
                            <label>Observación:</label>
                            <textarea class="form-control" value="${valor.observacion}" id="observacion_informe_temp" name="observacion_informe_temp">${valor.observacion}</textarea>
                        </div>
                    </div>    
                    
                    <hr>
                    <!--
                    <div class="row" style="text-align: center;">

                        <div class="col-sm-4">
                            <label>Ubicación de sensores</label><br>
                            <a class="btn btn-danger" data-id="${valor.id_informe}" data-url="${valor.url1}" id="eliminar_imagen" data-name="${valor.tipo_informe}"><span style="color: white;">X</span></a>
                            <img src="${url_imagen_1}" style="width: 100%;">
                            ${btn_file_1}
                        </div>

                        <div class="col-sm-4">
                            <label>Valores promedio, mínima y maxíma</label><br>
                            <a class="btn btn-danger" data-id="${valor.id_informe}" data-url="${valor.url2}" id="eliminar_imagen" data-name="${valor.tipo_informe}"><span style="color: white;">X</span></a>
                            <button id="ver_grafico_todos_promedio" class="btn btn-success" style="width: 10%;padding: 0;" data-type="${valor.tipo_informe}">
                            <img src="design/images/grafico.jpg" style="width: 100%;"></button>
                            <img src="${url_imagen_2}" style="width: 100%;">
                            ${btn_file_2}
                        </div>

                        <div class="col-sm-4">
                            <label>Periodo representativo</label><br>
                            <a class="btn btn-danger" data-id="${valor.id_informe}" data-url="${valor.url3}" id="eliminar_imagen" data-name="${valor.tipo_informe}"><span style="color: white;">X</span></a>
                            <button id="ver_grafico_todos_todos" class="btn btn-success" style="width: 10%;padding: 0;"  data-type="${valor.tipo_informe}">
                            <img src="design/images/grafico.jpg" style="width: 100%;"></button>
                            <img src="${url_imagen_3}" style="width: 100%;">
                            ${btn_file_3}
                        </div>
                    </div> -->
                    
                
                     
                    <div class="row" style="text-align:center;">
                      <div class="col-sm-12">
                          <button class="btn btn-info" id="actualizar_informe">Actualizar</button>
                      </div>
                    </div>

                </form>
                   
                `;
                 
              }
              //Muestra informe Base
              else{
                $("#acta_inspeccion").val(valor.acta_inspeccion);
                $("#conclusiones_informe_base").val(valor.comentario);
                template += 
                  `
                   <div class="row">
                      <div class="col-sm-12">
                        <input type="hidden" value="BASE" name="BASE" >
                        <input type="hidden" name="id_informe_actual" value="${valor.id_informe}" id="id_base">
                        <button class="btn btn-info" id="actualizar_informe">Actualizar</button>
                     </div>
                   </div>

                  `;
                listar_imagenes_base(valor.id_informe);
                listar_observaciones_inb(valor.id_informe);
              }
            });

            $("#editar_informe_row").html(template+template2+template3);
           $("#btn_informe_base").html(template);
        }
    })
}


function mostrar_imagenes(id_informe){
    let movimiento = "mostrar_imagenes";

    $.ajax({
        type:'POST',
        data:{id_informe,movimiento},
        url:'templates/mapeos_generales/controlador_informes.php',
        success:function(response){
  
            let traer = JSON.parse(response);
            let template = "";
            let enunciado = "";
            let template2 = "";
          
            traer.forEach((valor)=>{
              
              if(valor.tipo < 11){
             
                if(valor.tipo == 1){
                    enunciado = "Ubicación de sensores";
                }else if(valor.tipo == 2){
                    enunciado = "Valores promedio, mínima y maxíma";
                }else{
                    enunciado = "Periodo representativo";
                }
                template += 
                `
                <div class="col-sm-4">
                    <label>${enunciado}</label><br>
                    <a class="btn btn-danger" data-id="${valor.id_informe}" data-url="${valor.url}" id="eliminar_imagen" data-name="${valor.tipo}"><span style="color: white;">X</span></a>
                    <img src="templates/mapeos_generales/${valor.url}" style="width: 100%;">
                </div>
                
                `;
              }else{
                template2 += 
                  `
                     <div class="col-sm-4">
                      <a class="btn btn-danger" data-id="${valor.id_informe}" data-url="${valor.url}" id="eliminar_imagen" data-name="${valor.tipo}"><span style="color: white;">X</span></a>
                      <img src="templates/mapeos_generales/${valor.url}" style="width: 100%;">
                     </div>

                  `;
              }

            });

            $("#aqui_imagenes_informe").html(template);
           $("#traer_imagenes_base").html(template2);
        }
    });
}



///////// VER GRAFICOS DE CERNET 
$(document).on('click','#ver_grafico_todos_promedio',function(){
    let id_mapeo = $("#id_mapeo_informe").val();
    let tipo_informe = $("#tipo_informe").val();
    //window.open('templates/mapeos_generales/API_GRAFICOS_PROMEDIOS.php?id_mapeo='+id_mapeo+'&type='+tipo_informe);
    window.open('templates/API_Graficos/graficos.php?id_mapeo='+id_mapeo+'&type='+tipo_informe+'&promedio=FDSJHGBJKDSHGKJASDBGSHF7283589320483798ghjvdsygvdfbshkjfhsdui8y8394hBJVJFYEG7G3');
});

$(document).on('click','#ver_grafico_todos_todos',function(){
    let id_mapeo = $("#id_mapeo_informe").val();
    let tipo_informe = $("#tipo_informe").val();
    window.open('templates/API_Graficos/graficos.php?id_mapeo='+id_mapeo+'&type='+tipo_informe);

});

///// ENVIO FORMULARIO
$(document).on('submit','#formulario_informe',function(e){
    e.preventDefault();

    $.ajax({
        url: 'templates/mapeos_generales/cargar_data_informes.php',
        type: 'POST',
        dataType: 'html',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success:function(response){
          console.log(response)
            Swal.fire({
              title:'Mensaje',
              text:'Se ha actualizado correctamentes',
              icon:'success',
              timer:1700
            });
            $("#edicion_informe").hide();
            $("#edicion_informe_base").hide();
            $("#card_informes").show();
             //listar_observaciones_inb(response);
 
        }
    });
    
});



/////////////////// FORMULARIO QUE SE ENCARGA DE SUBIR LAS IMAGENES
$("#formulario_para_imagenes").submit(function(evt){

    evt.preventDefault();
    $.ajax({
        url: 'templates/mapeos_generales/cargar_data_imagenes.php',
        type: 'POST',
        dataType: 'html',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success:function(response){
          mostrar_imagenes(response);
          $("#imagen_tipo_1").val('');
           $("#imagen_tipo_2").val('');
           $("#imagen_tipo_3").val('');
        }
    });


});



/////////////////// VER INFORME
$(document).on('click','#ver_informe',function(){

    let id_informe = $(this).attr('data-id');
    let movimiento = "redireccion_informes";
  
    $.ajax({
      type: 'POST',
      data: {
        id_informe,
        movimiento
      },
      url: 'templates/mapeos_generales/controlador_informes.php',
      success: function(response) {
     
        if (response == "TEMP") {
          window.open('templates/mapeos_generales/informes/pdf/informe_mapeo_temp.php?informe=' + id_informe);
          //window.open('templates/mapeos_generales/API_GRAFICOS_TODOS.php?id_mapeo='+id_mapeo+'&type='+tipo_informe);
        } else if (response == "HUM") {
          window.open('templates/mapeos_generales/informes/pdf/informe_mapeo_hr.php?informe=' + id_informe);
        } else if (response == "BASE") {
          window.open('templates/mapeos_generales/informes/pdf/informe_inb.php?informe=' + id_informe);
        
        } else if (response == "AR"){
          window.open('templates/mapeos_generales/informes/pdf/informe_ar.php?informe=' + id_informe);
        }
      }
    });


});

/////////// ELIMINAR IMAGEN

$(document).on('click','#eliminar_imagen',function(){

        let id = $(this).attr('data-id');
        let url = $(this).attr('data-url');
        let tipo = $(this).attr('data-name');

        $.ajax({
            type:'POST',
            data:{id, url},
            url:'templates/mapeos_generales/eliminar_imagenes.php',
            success:function(response){

                listar_info_temp(id,tipo);
                mostrar_imagenes(id);
            }
        })
});


$(document).on('click','#configurar_sensor',function(){
    
  let id_sensor_mapeo = $(this).attr('data-id');
  let template = "";
  let sensor = $(this).attr('data-name');
  
  $("#mostrar_dato_crudo").show();
  
  template +=
  `
  <div class="col-sm-6">
     <b>Sensor : ${sensor}</b>
     <input type="hidden" name="id_mapeo_sensor" value="${id_sensor_mapeo}">
  </div>
  <div class="col-sm-6">
     archivo : <input type="file" name="archivo_sensor" class="form-control">
  </div>
  `;
  $("#configurar_sensor_aqui").html(template);  
});

/////ocultar template

$("#cerrar_dato").click(function(){
   $("#mostrar_dato_crudo").hide();
});


//////////////////////////envio_ejemplo
$(document).on('click','#envio_ejemplo',function(){
    
  let id_sensor_mapeo = $(this).attr('data-id');
  let template = "";
  let sensor = $(this).attr('data-name');
  
   $("#boton").click();
  //$("#mostrar_sensores").hide();
  //$("#mostrar_dato_crudo").show();
  
  template +=
  `
     1
  `;
  $("#dropdown").html(template);  
});


$("#form_cargar_archivos").submit(function(e){
    e.preventDefault();
    let id_mapeo_actual = $("#id_mapeo_configurar").val();
    let id_bandeja_actual = $("#id_bandeja_configurar").val();
  
  $.ajax({
        url: 'templates/mapeos_generales/cargar_data_cruda_sensor.php',
        type: 'POST',
        dataType: 'html',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success:function(response){
         console.log(response)
         if(response == "fecha"){
           Swal.fire({
             title:'Mensaje',
             text:'Formato de fecha incorrecto, formato de fecha correcto debe ser yyyy-mm-dd HH:mm:ss, valida tu archivo y vuelve a intentarlo',
             icon:'warning',
             timer:2200
           });
         }else{

         listar_sensor_asignados(id_mapeo_actual, id_bandeja_actual);
          Swal.fire({
            title:'Mensaje',
            icon:'success',
            text:'Se ha configurado correctamente el sensor.',
            timer:1700
          });
          $("#mostrar_dato_crudo").hide();
                      
         }
        }
    });
    
});



function listar_imagenes_base(id_informe){
    let movimiento = "Listar_imagenes";
  $.ajax({
    type:'POST',
    url:'templates/mapeos_generales/controlador_inb.php',
    data:{movimiento, id_informe},
    success:function(response){
        
      
        
    }
  });
  
}

function listar_observaciones_inb(id_informe){
  let movimiento = "Listar_observaciones";
  $.ajax({
    type:'POST',
    url:'templates/mapeos_generales/controlador_inb.php',
    data:{movimiento, id_informe},
    success:function(response){
      
      
      let traer = JSON.parse(response);
      let template = "";
      let contador = 5;
      
      traer.forEach((valor)=>{
        
          template += 
            
            `
              <tr>
                  <td>7.${contador}</td>
                  <td>${valor.observacion}</td>
                  <td><button class="btn btn-danger" id="eliminar_observacion" data-id="${valor.id_observacion}" data-name="${id_informe}"">X</button> </td>
              </tr>
            `;
          contador++;
      });
      
      $("#lista_observaciones_informe_base").html(template);
    }
  })
}

$(document).on('click','#eliminar_observacion', function(){
    
  let id_observacion = $(this).attr('data-id');
  let movimiento = "Eliminar_observacion";
  let id_informe = $(this).attr('data-name');
  
  $.ajax({
    type:'POST',
    url:'templates/mapeos_generales/controlador_inb.php',
    data:{movimiento, id_observacion},
    success:function(response){
      
      listar_observaciones_inb(id_informe);
    }
  });
});




//////////////////// CODIGO LOGICA PARA BOTONES DE DATOS CRUDOS
$(document).on('click','#ver_dc_todos', function(){
    let id_informe  = $(this).attr('data-id');
    let complemento = "FJANFNFIAOFNASLJNGJNSANFLSGGG5G4S84SSDGASIHGJLSFGD484512FSGFSGDG";
    let tipo = $(this).attr('data-name');
    window.open('templates/mapeos_generales/datos_crudos_excel.php?key='+complemento+id_informe+'&tipo='+tipo);
});

$(document).on('click', '#ver_dc_todos_promedio', function(){
    let id_informe  = $(this).attr('data-id');
    let complemento = "FJANFNFIAOFNASLJNGJNSANFLSGGG5G4S84SSDGASIHGJLSFGD484512FSGFSGDG";
    let tipo = $(this).attr('data-name');
    window.open('templates/mapeos_generales/datos_crudos_excel.php?key='+complemento+id_informe+'&tipo='+tipo+'PROM');
})


