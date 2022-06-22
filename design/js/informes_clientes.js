var id_valida = $("#id_valida").val();

buscarOT();

function buscarOT(){
	let accion = 'buscarot';
	$.ajax({
		type:'POST',
		data: {id_valida,accion},
		url:'templates/informes/buscarinforme.php',
		success:function(e){

			
			let traer = JSON.parse(e);
			let template = "";

				template += 
				`
				   <option value="0" id="seleccionar_ot" data-id="0">Seleccione...</option>
				`;

			traer.forEach(result =>{
				template +=
				`
					<option value="${result.id_numot}" id="seleccionar_ot" data-id="${result.id_numot}" >${result.numot}</option>	
				
				`;
			});

			$("#mostrar_ot").html(template);
		}
	});

}
//Seleccionar el servicio
$(document).on('click','#seleccionar_ot',function(){

  let id_numot = $(this).attr('data-id');
  let accion = 'buscarservicio';
  let template = "";
	 
  if (id_numot == 0) {
  		template +=
				`
				 <option value="0" id="seleccionar_servicio" data-id="0" >Seleccione...</option>	
				
				`;
		$("#mostrar_servicio").html(template);

  }else{ 
  $.ajax({
		type:'POST',
		data: {id_numot,accion},
		url:'templates/informes/buscarinforme.php',
		success:function(e){
		if (e.length == 4) {
		 	$("#mostrar_informes").hide();
  		template +=
				`
				 <option value="0" id="seleccionar_servicio" data-id="0" >Sin servicios asignados...</option>	
				
				`;
		$("#mostrar_servicio").html(template);
		}else{
			
			let traer = JSON.parse(e);

				template +=
				`
					<option value="0" id="seleccionar_servicio" data-id="0" >Seleccione...</option>	
				
				`;
			traer.forEach(result =>{
				template +=
				`
					<option value="${result.id_servicio}" id="seleccionar_servicio" data-id="${result.id_servicio}" >${result.servicio}</option>	
				
				`;
			});

			$("#mostrar_servicio").html(template);
		 }
		}
	});
  }
});

$(document).on('click','#seleccionar_servicio',function(){
	
  let id_servicio = $("#mostrar_servicio").val();
  let id_ot = $("#mostrar_ot").val();
  let accion = 'buscarinforme';

  if (id_servicio == 0){
  	$("#mostrar_informes").hide();
  }

  $.ajax({
		type:'POST',
		data: {id_servicio,id_ot,accion},
		url:'templates/informes/buscarinforme.php',
		success:function(e){
			
			let template = "";
			if (e.length == 0 || e == 'null') {

				template += 
					`
					<div class="col-sm-12" style="text-align: center;">
						<h2 class="text-danger">Sin informes disponibles</h2>
					</div>
					`;
				$("#mostrar_informes").html(template);	
			}else{
				$("#mostrar_informes").show();

				
				let traer = JSON.parse(e);
				

				traer.forEach(result =>{
					template +=
					`
					<div class="col-sm-4" style="text-align: center;">
						<div class="card">
							<div class="card-header">
								<h5 style="text-align: center;">Informe:&nbsp; ${result.nombre}</h5>
							</div>
							<div class="card-body">
								<button class="btn btn-success" id="ver_informe" data-id="${result.id_informe}">Ver</button>
							</div>
						</div>
					</div>
					`;
				});

				$("#mostrar_informes").html(template);
			}
			      
		}
	});
});

/////////////////// VER INFORME
$(document).on('click','#ver_informe',function(){

    let id_informe = $(this).attr('data-id');
    let movimiento = "redireccion_informes";
  
    $.ajax({
      type: 'POST',
      data: {
        id_informe,
        movimiento
      },
      url: 'templates/mapeos_generales/controlador_informes.php',
      success: function(response) {
        if (response == "TEMP") {
          window.open('templates/mapeos_generales/informes/pdf/informe_mapeo_temp.php?informe=' + id_informe);
          //window.open('templates/mapeos_generales/API_GRAFICOS_TODOS.php?id_mapeo='+id_mapeo+'&type='+tipo_informe);
        } else if (response == "HUM") {
          window.open('templates/mapeos_generales/informes/pdf/informe_mapeo_hr.php?informe=' + id_informe);
        } else if (response == "info Base") {
          window.open('templates/mapeos_generales/informes/pdf/informe_mapeo_base.php?informe=' + id_informe);
        }
      }
    });
  });