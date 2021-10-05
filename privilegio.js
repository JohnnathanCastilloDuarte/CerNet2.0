////////////OCULTAR MODULOS////////////////////
$("#modulo_1").hide();
$("#modulo_2").hide();
$("#modulo_3").hide();
$("#modulo_4").hide();
$('#modulo_4_usuario_externo').hide();
$("#modulo_5").hide();
$("#modulo_6").hide();
$("#modulo_7").hide();
$("#modulo_8").hide();
$("#modulo_9").hide();
$("#modulo_3_externo").hide();


(function(){
	let valida = $("#id_valida").val();
		//realizo una petición ajax para saber el rol y recuperar un Json
			
		$.ajax({
			type:"POST",
			data:{valida},
			url:'privilegio.php',
			success:function(r1){
				let traer = JSON.parse(r1);
				
						
					traer.forEach(result => {
						  
           if(result.modulo_1 == 1){
             $("#modulo_1").show();
           }else{
             $("#modulo_1").hide();
           }
            
            if(result.modulo_2 == 1){
             $("#modulo_2").show();
           }else{
             $("#modulo_2").hide();
           }
            
            if(result.modulo_3 == 1){
             $("#modulo_3").show();
             $("#modulo_3_externo").hide(); 
           }else{
             $("#modulo_3").hide();
             $("#modulo_3_externo").show();
           }
            
            if(result.modulo_4 == 1){
             $("#modulo_4").show();
           }else{
             $("#modulo_4").hide();
           }
            
            if(result.modulo_5 == 1){
             $("#modulo_5").show();
           }else{
             $("#modulo_5").hide();
           }
            
            if(result.modulo_6 == 1){
             $("#modulo_6").show();
           }else{
             $("#modulo_6").hide();
           }
            
            if(result.modulo_7 == 1){
             $("#modulo_7").show();
           }else{
             $("#modulo_7").hide();
           }
            
            
           if(result.modulo_8 == 1){
             $("#modulo_8").show();
           }else{
             $("#modulo_8").hide();
           } 
            
          if(result.modulo_9 == 1){
             $("#modulo_9").show();
           }else{
             $("#modulo_9").hide();
           }  
            
            
            
            
          });
      }
    });

	
	
	//consultar rol 
	
		$.ajax({
			type:"POST",
			data:{valida},
			url:'rol.php',
			success:function(resp){
				let traer = JSON.parse(resp);
					
					traer.forEach(resul => {
					
					});
      }
		});

}());

	
		
				





