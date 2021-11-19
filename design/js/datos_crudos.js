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

            alert(contador_errores);
        }
    });
        
  
})


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


///////////////// función que muestra el  backtrack de los datos crudos.
function cargar_backtrack_dc(){
    
}

