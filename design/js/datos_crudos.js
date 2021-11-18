///////////// ELEMENTOS OCULTOS
//$("#tipo_termocupla").hide();
//$("#tipo_sensor").hide();



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

            traer.forEach((valor)=>{

                let v1 = "";
                let v2 = "";

                if(valor.v1 < rango_menor_igual || valor.v1 > rango_mayor_igual){
                    v1 = `<span class="text-danger">${valor.v1}</span>`;
                }else{
                    v1 = `<span class="text-success">${valor.v1}</span>`;
                }
                if(valor.v2 < rango_menor_igual || valor.v2 > rango_mayor_igual){
                    v2 = `<span class="text-danger">${valor.v2}</span>`;
                }else{
                    v2 = `<span class="text-success">${valor.v2}</span>`;
                }

                template += 
                `
                    <tr>
                        <td>${contador}</td>
                        <td>${valor.fecha_hora}</td>
                        <td>${v1}</td>
                        <td>${v2}</td>
                    </tr>


                `;

                contador++;

            });

            $("#mostrar_dc_1").html(template);
        }
    });
        
  
})


///// EVENTO QUE CONTROLA QUE CARD MOSTRARA 

$("#tipo_archivo_dc").change(function(){

    let valor = $(this).val();

    if(valor == 0){
        $("#tipo_termocupla").hide();
        $("#tipo_sensor").hide();
    }else if(valor == 1){
        $("#tipo_termocupla").hide();
        $("#tipo_sensor").show();
      
    }else{
        $("#tipo_termocupla").show();
        $("#tipo_sensor").hide();
    }
});

