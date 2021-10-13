///////////////////// OCULTANDO URL

$(document).ready(function(){
    window.history.replaceState({},'','index.php');
  })


///////// script para validar con que privilegios cuenta el usuario actual
$(document).ready(function(){

    let id_valida = $("#id_valida").val();

    $.ajax({
        type:'POST',
        data:{id_valida},
        url:'validador_vistas.php',
        success:function(response){
            let traer = JSON.parse(response);

           traer.forEach((x)=>{

            if(x.modulo == 1){
                $("#modulo_1").show();
            }else{
                $("#modulo_1").hide();
            }

            if(x.usuario == 1){
                $("#modulo_3").show();
            }else{
                $("#modulo_3").hide();
            }

            if(x.cliente == 1){
                $("#modulo_4").show();
            }else{
                $("#modulo_4").hide();
            }

            if(x.item == 1){
                $("#modulo_5").show();
            }else{
                $("#modulo_5").hide();
            }
            
            if(x.orden_trabajo == 1){
                $("#modulo_6").show();
            }else{
                $("#modulo_6").hide();
            }

            if(x.servicio == 1){
                $("#modulo_7").show();
            }else{
                $("#modulo_7").hide();
            }

            if(x.informe == 1){
                $("#modulo_8").show();
            }else{
                $("#modulo_8").hide();
            }

            if(x.documentacion == 1){
                $("#modulo_9").show();
            }else{
                $("#modulo_9").hide();
            }

            if(x.cargo == 1){
                $("#modulo_10").show();
            }else{
                $("#modulo_10").hide();
            }


           });
        }
    })

});