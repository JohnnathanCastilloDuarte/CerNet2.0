//// ELEMENTOS OCULTOS
$("#btn_edita_altura_bandeja").hide();
$("#btn_editar_mapeo_general").hide();
$("#btn_atras_altura_bandeja").hide();
$("#btn_atras_mapeo_general").hide();

///////////// VARIABLES GLOBALES
var id_asignado = $("#id_asignado").val();
var id_usuario  = $("#id_valida").val();


/////// FUNCIONES
listar_bandejas();
listar_mapeos();



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

            traer.forEach((valor)=>{

                template+=
                `
                    <tr>
                        <td>${valor.nombre}</td>
                        <td><button class="btn btn-info" data-id="${valor.id_bandeja}"  data-name = "${valor.nombre}" id="btn_modificar_bandeja">Modificar</button>
                        <button class="btn btn-danger" data-id="${valor.id_bandeja}" id="btn_eliminar_bandeja">Eliminar</button></td>
                    </tr>
                `;
            });

            $("#traer_bandejas").html(template);
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
        id_usuario
    }

    $.ajax({
        type:'POST',
        data:datos,
        url:'templates/mapeos_generales/controlador_mapeo.php',
        success:function(response){
            console.log(response);
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
            });
            $("#traer_mapeos").html(template);
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
        id_mapeo
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



