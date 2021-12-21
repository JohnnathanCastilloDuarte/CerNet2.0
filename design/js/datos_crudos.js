///////////// ELEMENTOS OCULTOS
$("#tipo_termocupla").hide();
$("#resultados_tipo_termocupla").hide();
$("#tipo_sensor").hide();





////////// CREACIÓN DE VARIABLES

var id_valida = $("#id_valida").val();
var id_asignado = $("#id_asignado").val();
var id_mapeo = $("#id_mapeo").val();




////////// CONTROLA EL ENVIO DEL FORMULARIO
$("#form_datos_crudos").submit(function(e){
    e.preventDefault();

        let rango_mayor_igual = $("#rango_mayor_igual").val();
        let rango_menor_igual = $("#rango_menor_igual").val();

    	
		$.ajax({
        url: 'controlador_datos_crudos.php',
        type: 'POST',
        dataType: 'html',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success:function(response){

            console.log(response);
          
            /*
            let traer = JSON.parse(response);
            let template = "";
            let contador = 1;
            let contador_errores = 0;

            traer.forEach((valor)=>{

                let v1 = "";
                let v2 = "";
                let v3 = "";
                let v4 = "";
                let v5 = "";
                let v6 = "";
                let v7 = "";
                let v8 = "";
                let v9 = "";
                let v10 = "";

                if(valor.v1 < rango_menor_igual || valor.v1 > rango_mayor_igual){
                    v1 = `<span class="text-danger">${valor.v1}</span>`;
                    contador_errores++;
                }else{
                    v1 = `<span class="text-success">${valor.v1}</span>`;   
                }
                if(valor.v2 < rango_menor_igual || valor.v2 > rango_mayor_igual){
                    v2 = `<span class="text-danger">${valor.v2}</span>`;
                    contador_errores++;
                }else{
                    v2 = `<span class="text-success">${valor.v2}</span>`;
                }
                if(valor.v3 < rango_menor_igual || valor.v3 > rango_mayor_igual){
                    v3 = `<span class="text-danger">${valor.v3}</span>`;
                    contador_errores++;
                }else{
                    v3 = `<span class="text-success">${valor.v3}</span>`;
                }
                if(valor.v4 < rango_menor_igual || valor.v4 > rango_mayor_igual){
                    v4 = `<span class="text-danger">${valor.v4}</span>`;
                    contador_errores++;
                }else{
                    v4 = `<span class="text-success">${valor.v4}</span>`;
                }
                if(valor.v5 < rango_menor_igual || valor.v5 > rango_mayor_igual){
                    v5 = `<span class="text-danger">${valor.v5}</span>`;
                    contador_errores++;
                }else{
                    v5 = `<span class="text-success">${valor.v5}</span>`;
                }
                if(valor.v6 < rango_menor_igual || valor.v6 > rango_mayor_igual){
                    v6 = `<span class="text-danger">${valor.v6}</span>`;
                    contador_errores++;
                }else{
                    v6 = `<span class="text-success">${valor.v6}</span>`;
                }
                if(valor.v7 < rango_menor_igual || valor.v7 > rango_mayor_igual){
                    v7 = `<span class="text-danger">${valor.v7}</span>`;
                    contador_errores++;
                }else{
                    v7 = `<span class="text-success">${valor.v7}</span>`;
                }
                if(valor.v8 < rango_menor_igual || valor.v8 > rango_mayor_igual){
                    v8 = `<span class="text-danger">${valor.v8}</span>`;
                    contador_errores++;
                }else{
                    v8 = `<span class="text-success">${valor.v8}</span>`;
                }
                if(valor.v9 < rango_menor_igual || valor.v9 > rango_mayor_igual){
                    v9 = `<span class="text-danger">${valor.v9}</span>`;
                    contador_errores++;
                }else{
                    v9 = `<span class="text-success">${valor.v9}</span>`;
                }
                if(valor.v10 < rango_menor_igual || valor.v10 > rango_mayor_igual){
                    v10 = `<span class="text-danger">${valor.v10}</span>`;
                    contador_errores++;
                }else{
                    v10 = `<span class="text-success">${valor.v10}</span>`;
                }

                template += 
                `
                    <tr>
                        <td>${contador}</td>
                        <td>${valor.fecha_hora}</td>
                        <td>${v1}</td>
                        <td>${v2}</td>
                        <td>${v3}</td>
                        <td>${v4}</td>
                        <td>${v5}</td>
                        <td>${v6}</td>
                        <td>${v7}</td>
                        <td>${v8}</td>
                        <td>${v9}</td>
                        <td>${v10}</td>
                    </tr>


                `;

                contador++;

            });

            $("#mostrar_dc_1").html(template);
            
          
            if(contador_errores > 0){
                Swal.fire({
                    title:'Mensaje',
                    text:'Revisa tu archivo de DC, estos presentan errores',
                    icon:'warning',
                    timer:1500
                });
                $("#btn_carga_dc").show(); 
                
            }else{
                Swal.fire({
                    title:'Mensaje',
                    text:'Los datos crudos, no presentan ningun error',
                    icon:'success',
                    timer:1500
                });
                $("#btn_carga_dc").hide();
            }*/
            Swal.fire({
                title:'Mensaje',
                text:'Se ha cargado el archivo de datos crudos con exito',
                icon:'success',
                timer:1500
            });
            cargar_backtrack_dc();
        }   
    });
        
  
});



///// EVENTO QUE CONTROLA QUE CARD MOSTRARA 

$("#tipo_archivo_dc").change(function(){

    let valor = $(this).val();

    if(valor == 0){
        $("#tipo_termocupla").hide();
        $("#tipo_sensor").hide();
        $("#resultados_tipo_termocupla").hide();
    }else if(valor == 1){
        $("#tipo_termocupla").hide();
        $("#tipo_sensor").show();
        $("#resultados_tipo_termocupla").hide();
      
    }else{
        $("#tipo_termocupla").show();
        $("#tipo_sensor").hide();
        $("#resultados_tipo_termocupla").show();
    }
});


cargar_backtrack_dc();

///////////////// función que muestra el  backtrack de los datos crudos.
function cargar_backtrack_dc(){


    const datos = {
        id_asignado,
        id_mapeo
    }
   


    $.ajax({
        type:'POST',
        data:datos,
        url:'leer_datos_crudos.php',
        success:function(response){
            let traer = JSON.parse(response);
            let template = "";
            let contador_bad = "";

            traer.forEach((resultado)=>{
                if(resultado.estado == 1){
                    contador_bad = 1;

                    template +=
                    `
                        <div class="col-sm-4" style="text-align: center;">
                            <div class="card">
                                <div class="card-header">${resultado.nombres}  ${resultado.apellidos} <br> ${resultado.fecha_registro}</div>
                            </div>
                            <a href="${resultado.url_archivo}"><img src="../../design/images/excel.png" style="width: 25%;"></img></a>
                            
                        </div>
                    
                    `;
                }else if(resultado.estado == 3){
                    contador_bad = 0;
                   
                    template +=
                    `
                        <div class="col-sm-4" style="text-align: center;">
                            <div class="card">
                                <div class="card-header">${resultado.nombres}  ${resultado.apellidos} <br> ${resultado.fecha_registro}</div>
                            </div>
                           
                            <a href="${resultado.url_archivo}"><img src="../../design/images/excel.png" style="width: 25%;"></img></a><br>
                            <span class="text-danger">Eliminado</span>
                           

                            
                        </div>
                    
                    `;
                }else{
                    contador_bad = 0;
                    
                    template +=
                    `
                        <div class="col-sm-4" style="text-align: center;">
                            <div class="card">
                                <div class="card-header">${resultado.nombres}  ${resultado.apellidos} <br> ${resultado.fecha_registro}</div>
                            </div>
                           
                            <a href="${resultado.url_archivo}"><img src="../../design/images/excel.png" style="width: 25%;"></img></a><br>
                            <button class="btn btn-danger" data-id="${resultado.id_registro}" id="elimar_registro_dc">Eliminar</button>

                            
                        </div>
                    
                    `;
                }
               



            });

          

            $("#resultados_historial_dc").html(template);
        }
    })
}




$(document).on('click','#elimar_registro_dc',function(){

    let id_registro = $(this).attr('data-id');


    Swal.fire({
		position:'center',
		icon:'error',
		title:'Deseas eliminar el archivo ?',
		showConfirmButton:true,
		showCancelButton:true,
		confirmButtonText:'Si!',
		cancelButtonText:'No!',
	}).then((result)=>{
		if(result.value){

            $.ajax({
                type:'POST',
                data:{id_registro},
                url:'eliminar_dc.php',
                success:function(response){
                   
                    if(response == "Si"){
                        Swal.fire({
                            title:'Mensaje',
                            text:'Se ha eliminado correctamente, el archivo',
                            icon:'success',
                            timer:1500
                        });
                        cargar_backtrack_dc();
                    }


                }
            });
        }
    });        
});
