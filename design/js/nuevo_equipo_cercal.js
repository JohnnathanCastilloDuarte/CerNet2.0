
$("#crear_nuevo_equipo").click(function(){
    window.open("templates/equipos_cercal/creacion_equipos.php");
});



//////////// BOTON PARA CREAR EL NUEVO EQUIPO
$("#btn_crear_equipo_cercal").click(function(){

    alert("Click");

    let nombre_equipo_cercal = $("#nombre_equipo_cercal").val();
    let marca_equipo_cercal = $("#marca_equipo_cercal").val();
    let n_serie_equipo_cercal = $("#n_serie_equipo_cercal").val();
    let modelo_equipo_cercal = $("#modelo_equipo_cercal").val();
    let certificado_calibracion_equipo_cercal = $("#certificado_calibracion_equipo_cercal").val();
    let ultima_fecha_calibracion_equipo_cercal = $("#ultima_fecha_calibracion_equipo_cercal").val();
    let trazabilidad_equipo_cercal = $("#trazabilidad_equipo_cercal").val();
    let pais_certificado_equipo_cercal = $("#pais_certificado_equipo_cercal").val();
    let proceso = 1;

    const datos = {
        nombre_equipo_cercal,
        marca_equipo_cercal,
        n_serie_equipo_cercal,
        modelo_equipo_cercal,
        certificado_calibracion_equipo_cercal,
        ultima_fecha_calibracion_equipo_cercal,
        trazabilidad_equipo_cercal,
        pais_certificado_equipo_cercal,
        proceso
    }

    $.ajax({
        type:'POST',
        data: datos,
        url:'controlador_equipos.php',
        success:function(response){
            Swal.fire({
                title:'Mensaje',
                text:'Se ha creado el equipo correctamente',
                icon:'success',
                timer:2000
            });
        }
    })
});


/////////// boton para recargar los equipos de cercal

$("#recargar_equipos").click(function(){

    trayendo_equipo()

});



trayendo_equipo();

function trayendo_equipo(){
  
    let proceso = 2;

    $.ajax({
        type:'POST',
        data:{proceso},
        url:'templates/equipos_cercal/controlador_equipos.php',
        success:function(response){
            let traer = JSON.parse(response);
            let template = '';

            traer.forEach((x)=>{
                template +=
                `
                    <tr>
                        <td>${x.id_equipo}</td>
                        <td>${x.nombre}</td>
                        <td>${x.certificado}</td>
                        <td>${x.fecha_emision}</td>
                        <td>${x.fecha_vencimiento}</td>
                        <td><button class="btn btn-success" class="form-control" data-id="${x.id_equipo}">+</button></td>
                    </tr>
                `;

            });

            $("#listar_equipos_filtros").html(template);
        }
    })
}

