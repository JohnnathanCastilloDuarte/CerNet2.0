(function(){
  
  let usuario_actual = $("#id_valida").val();
  
    $.ajax({
      
        type:'POST',
        url:'nombres_usuarios.php',
        data:{usuario_actual},
        success:function(response){
          if(response == "No"){
            Swal.fire({
              text:'Recuerda actualizar tu información personal en el modulo de perfil',
              title:'Actualizar Datos',
              icon:'warning',
              timer:2000
            })
          }
        }
           });
  
  
}());