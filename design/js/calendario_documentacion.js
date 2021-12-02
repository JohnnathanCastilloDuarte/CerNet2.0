
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
            let fecha_firma = "";
            let tipo = "";

            traer.forEach((x)=>{
                
                if(x.fecha_firma == null){
                    console.log('Aqui');
                    fecha_firma = 'Sin firma';
                }else{
                    fecha_firma = x.fecha_firma;
                }

                if(x.tipo == null){
                    console.log('Aqui');
                    tipo = 'Sin aprobar';
                }else{
                    tipo = x.tipo;
                }

                template += `
                    <tr>
                        <td>${x.rol}</td>
                        <td>${x.usuario}</td>
                        <td>${x.fecha_registro}</td>
                        <td>${fecha_firma}</td>
                        <td>${x.diferencia}</td>
                        <td>${tipo}</td>
                    </tr>
                
                `;

                
            });
            $("#traer_calendario").html(template);
        }
    })
}