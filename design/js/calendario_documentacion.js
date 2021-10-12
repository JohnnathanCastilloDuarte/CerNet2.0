
var id_documentacion = $("#doc").val();

traer_calendario();

function traer_calendario(){

    $.ajax({
        type:'POST',
        data:{id_documentacion},
        url:'traer_calendario.php',
        success:function(response){
            console.log(response);
            let traer = JSON.parse(response);
            let template = "";
            let rol = "";

            traer.forEach((x)=>{
                if(x.rol == 10){
                    rol = '<span class="text-mute">Gerente</span>';
                }else if(x.rol == 2){
                    rol = '<span class="text-mute">HEAD SPOT</span>';
                }else if(x.rol == 3){
                    rol = '<span class="text-mute">Operaciones SPOT</span>';
                }
                else if(x.rol == 4){
                    rol = '<span class="text-mute">HEAD GEP</span>';
                }else if(x.rol == 5){
                    rol = '<span class="text-mute">Operaciones GEP</span>';
                }else if(x.rol == 6){
                    rol = '<span class="text-mute">HEAD CSV</span>';
                }else if(x.rol == 7){
                    rol = '<span class="text-mute">Operaciones CSV</span>';
                }else if(x.rol == 8){
                    rol = '<span class="text-mute">Documental</span>';
                }else if(x.rol == 9){
                    rol = '<span class="text-mute">Calidad</span>';
                }


                template += `
                    <tr>
                        <td>${rol}</td>
                        <td>${x.usuario}</td>
                        <td>${x.fecha_registro}</td>
                        <td>${x.fecha_firma}</td>
                        <td>${x.tipo}</td>
                    </tr>
                
                `;

                
            });
            $("#traer_calendario").html(template);
        }
    })
}