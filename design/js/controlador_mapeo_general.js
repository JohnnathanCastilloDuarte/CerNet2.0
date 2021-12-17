//// ELEMENTOS OCULTOS
$("#btn_edita_altura_bandeja").hide();
$("#btn_editar_mapeo_general").hide();
$("#btn_atras_altura_bandeja").hide();
$("#btn_atras_mapeo_general").hide();
$("#cargado_archivo_dc").hide();
$("#cargar_archivo_dc").hide();
$("#banner_cargando").hide();
$("#edicion_informe").hide();

///////////// VARIABLES GLOBALES
var id_asignado = $("#id_asignado").val();
var id_usuario  = $("#id_valida").val();


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
            console.log(response);
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
            console.log(response);

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
                    <td><button class="btn btn-info" data-id="${valor.id_bandeja}"  data-name = "${valor.nombre}" id="btn_utilizar_bandeja">Utilizar</button>
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
                        console.log(response);
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
        intervalo
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
            console.log(response);

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
                        <td><button class="btn btn-primary" data-id="${valor.id_mapeo}" id="configurar_mapeo" data-name="${valor.nombre}">Configurar</button></td>
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
            console.log(response);
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
        intervalo
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_mapeo.php',
        success:function(response){
            console.log(response);

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
                        console.log(response);

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

    $("#nombre_mapeo_configurar").html(nombre_mapeo);
    $("#id_mapeo_configurar").val(id_mapeo);
    $("#id_mapeo_datos_crudos").val(id_mapeo);


});

$(document).on('click','#btn_utilizar_bandeja',function(){

    let id_bandeja = $(this).attr('data-id');
    let nombre_bandeja = $(this).attr('data-name');

    $("#nombre_bandeja_configurar").html(nombre_bandeja);
    $("#id_bandeja_configurar").val(id_bandeja);

    let id_mapeo = $("#id_mapeo_configurar").val();

    validar_datos_crudos(id_mapeo, 'validar_archivo');
    validar_datos_crudos(id_mapeo, 'validar_carga_db');

    listar_sensor_asignados(id_mapeo, id_bandeja);
});


///////////////// BUSCAR SENSORES

$("#buscador_sensores").keyup(function(){

    let buscar = $(this).val();
    let movimiento = "buscar";

    if(buscar.length != 0){
        $("#titulo_predeterminado_sensor").hide();
    }else{
        $("#titulo_predeterminado_sensor").show();
    }

    $.ajax({
        type:'POST',
        data:{buscar,movimiento},
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
            console.log(response);
            let traer = JSON.parse(response);
            let template = "";
            let template2 = "";
            let temp = "";
            let hum = "";
            let val_temp = "";
            let val_hum = "";

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
                        <td><select class="form-control" data-id="${valor.id_sensor_mapeo}" id="cambiar_posicion">
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
                            </select></td>
                        <td><button class="btn btn-danger" id="remover_sensor" data-id="${valor.id_sensor_mapeo}">X</button></td>    
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

            $("#listar_sensores_asignados").html(template);
            $("#sensores_asignado_dc").html(template2);
        }
    }); 
    

}


////// cambiar posición
$(document).on('change','#cambiar_posicion', function(){

    let id_mapeo = $(this).attr('data-id');
    let posicion = $(this).val();
    let movimiento = "cambiar_posicion";
    
    const datos = {
        id_mapeo,
        posicion,
        movimiento
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_sensor.php',
        success:function(response){
            let id_mapeo_actual = $("#id_mapeo_configurar").val();
            let id_bandeja_actual = $("#id_bandeja_configurar").val();
            console.log(response);

            if(response == "Si"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha actualizado la posición',
                    icon:'success',
                    timer:1700
                });
                listar_sensor_asignados(id_mapeo_actual, id_bandeja_actual);
            }
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
                console.log(response);
    
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
            console.log(response);

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
            console.log(response);

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
                        console.log(response);
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
            console.log(response);
            $("#correlativo").val(response);
        }

    });    
}


$("#asignar_correlativo").click(function(){

    let correlativo = $("#correlativo").val();
    let movimiento = "guardar";
    const datos = {
        id_asignado,
        correlativo,
        movimiento
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_consecutivo.php',
        success:function(response){
            console.log(response);

            if(response == "Si"){
                Swal.fire({
                    title:'Mensaje',
                    text:'Se ha creado el correlativo con exito',
                    icon:'success',
                    timer:1700
                });
                traer_correlativo();
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
                                <button class="btn btn-info" id="editar_informe" data-id="${valor.id_informe}">Editar</button>
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
        $("#edicion_informe").show();
        $("#card_informes").hide();
});

$("#close_edicion").click(function(){
    $("#edicion_informe").hide();
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
                            console.log(response);
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



function listar_info_temp(id_informe){

    let movimiento = "Consultar_temp";

    $.ajax({
        type:'POST',
        data:{id_informe},
        url:'templates/mapeos_generales/controlador_informes.php',
        success:function(response){
            console.log(response);
        }
    })
}




