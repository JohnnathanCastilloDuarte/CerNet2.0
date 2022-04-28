//////////// FUNCION PARA VALIDAR CAMPOS VACIOS
function campos_vacios(x){

	let vacio = 0;
	let valores = Object.values(x);

	for(let i=0; i< valores.length; i++){
		if(valores[i] == ""){
			vacio++;
		}
	}

    if(vacio > 0){
        Swal.fire({
            title:'Mensaje',
            text:'Ningun campo puede ir vacio, verifica la información',
            icon:'warning',
            //timer:2000
        });
        return false;
        //console.log("mal");
    }else{
        return true;
       // console.log("bien");
    }

}