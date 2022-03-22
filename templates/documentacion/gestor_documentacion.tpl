
<style>
   
   #algo{
     max-width:100%;
     height:auto;
   } 
   
  .estiloCuadro {
  width: 10em; 
  border: white; 
  position: absolute; 
  top: 337px;
  left: 336px;
  width: 400px;
  height: 70px;  
  cursor: pointer;
  /*Deshabilitar selección de texto*/
  -moz-user-select: none;     /* Mozilla */
  -khtml-user-select: none;   /* Chrome */    
  -o-user-select: none;       /* Opera */
  }
 </style>
<script type="text/javascript">
    var xInic, yInic;
    var estaPulsado = false;

    function ratonPulsado(evt) { 
        //Obtener la posición de inicio
        xInic = evt.clientX;
        yInic = evt.clientY;    
        estaPulsado = true;
        //Para Internet Explorer: Contenido no seleccionable
        document.getElementById("cuadro").unselectable = true;
    }

    function ratonMovido(evt) {
        if(estaPulsado) {
            //Calcular la diferencia de posición
            var xActual = evt.clientX;
            var yActual = evt.clientY;    
            var xInc = xActual-xInic;
            var yInc = yActual-yInic;
            xInic = xActual;
            yInic = yActual;

            //Establecer la nueva posición
            var elemento = document.getElementById("cuadro");
            var position = getPosicion(elemento);
            elemento.style.top = (position[0] + yInc) + "px";
            elemento.style.left = (position[1] + xInc) + "px";
        }
    }

    function ratonSoltado(evt) {
        estaPulsado = false;
    }

    /*
     * Función para obtener la posición en la que se encuentra el
     * elemento indicado como parámetro.
     * Retorna un array con las coordenadas x e y de la posición
     */
    function getPosicion(elemento) {
        var posicion = new Array(2);
        if(document.defaultView && document.defaultView.getComputedStyle) {
            posicion[0] = parseInt(document.defaultView.getComputedStyle(elemento, null).getPropertyValue("top"))
            posicion[1] = parseInt(document.defaultView.getComputedStyle(elemento, null).getPropertyValue("left"));
        } else {
            //Para Internet Explorer
            posicion[0] = parseInt(elemento.currentStyle.top);             
            posicion[1] = parseInt(elemento.currentStyle.left);               
        }      
        return posicion;
    }
</script>

<style type="text/css">
  $body-bg :  #eee;
$canvas-bg: #fff;
$font1 : Arial, sans-serif;

body{
  background-color: $body-bg;
  font-family:$font1;
}

#canvas_f {
  display: block;
  margin: 0 auto;
  margin: calc(50vh - 150px) auto 0;
  background: $canvas-bg;
  border-radius: 3px;
  box-shadow: 0px 0px 15px 3px #ccc;
  cursor:pointer;
  margin-top:20px;
}
p{
  text-align:center;
  cursor:pointer;
}
  
#upload-button {
	width: 150px;
	display: block;
	margin: 20px auto;
}

#file-to-upload {
	display: none;
}

#pdf-main-container {
	width: 400px;
}

#pdf-loader {
	display: none;
	text-align: center;
	color: #999999;
	font-size: 13px;
	line-height: 100px;
	height: 100px;
}

#pdf-contents {
	display: none;
}

#pdf-meta {
	overflow: hidden;
	margin: 0 0 20px 0;
}

#pdf-buttons {
	float: left;
}

#page-count-container {
	float: right;
}

#pdf-current-page {
	display: inline;
}

#pdf-total-pages {
	display: inline;
}

#pdf-canvas {
	border: 1px solid rgba(0,0,0,0.2);
	box-sizing: border-box;
  width:760;
  height:776;
}

#page-loader {
	height: 100px;
	line-height: 100px;
	text-align: center;
	display: none;
	color: #999999;
	font-size: 13px;
}

#download-image {
  text-align:center;
	width: 100%;
	display: block;
	margin: 20px auto 0 auto;
	font-size: 13px;
	text-align: center;
}

</style>

<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
  <li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-1" data-toggle="tab" href="#config">
			<span>Config</span>
		</a>
	</li>
	<li class="nav-item">
		<a role="tab" class="nav-link active subir" id="tab-1" data-toggle="tab" href="#subir">
			<span>Subir</span>
		</a>
	</li>
  <li class="nav-item">
		<a role="tab" class="nav-link active subir1" id="tab-1" data-toggle="tab" href="#subir1">
			<span>Subir</span>
		</a>
	</li>
   <li class="nav-item">
		<a role="tab" class="nav-link active subir1" id="tab-1" data-toggle="tab" href="#Hoja_firmas">
			<span>Hoja firmas</span>
		</a>
	</li>
  <!--
  <li class="nav-item">
     <a role="tab" class="nav-link active" id="tab-1" data-toggle="tab" href="#listar_subidas">
			<span>Documentación</span>
		</a>
  </li>-->
</ul>

<!--Comienza el contenido de las tabs-->
<div class="tab-content">
  
  <div class="tab-pane tabs-animation fade show active" id="config" role="tabpanel">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h6>Configuración del proceso documental</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <label>Nombre del proceso</label>
                <p style="text-align:justify;">
                  Escoge un nombre para el proceso de documentación, el cual ayudara a identificar el proposito del mismo.
                </p>
                <input type="text" class="form-control" id="nombre_documental" placeholder = "Ingresa el nombre del proceso">
              </div>  
              <div class="col-sm-6">
                <label>Tipo de proceso</label>
                <p style="text-align:justify;">
                  En esta configuración se decide la forma como se cargaran la documentación:
                  <br>
                  1-Pagina x pagina
                  <br>
                  2-Documento completo
                </p>
                <select id="tipo_documentacional" class="form-control">
                  <option value="0">Seleccione</option>
                  <option value="1">Hoja x Hoja</option>
                  <option value="2">Pdf completo</option>
                </select>
              </div>
            </div>
          </div>
          <br>
            <div class="row">
              <div class="col-sm-12" style="text-align:center;">
                <button class="btn btn-success" id="guardar_config_documentacion">
                  Aceptar
                </button>
              </div>
            </div>
          
          <br>
         <br>  
          <div class="row">
            <div class="col-sm-6" style="text-align:center;">
              <label>Nombre:</label>
              <span id="nombre_config" class="text-danger"></span>
            </div>
            <div class="col-sm-6">
              <label>Tipo:</label>
              <span id="tipo_config" class="text-danger"></span>
            </div>
          </div>
        </div>

      </div>
    </div>
    
  </div><!--Cierre del tab config-->
  
  <div class="tab-pane tabs-animation fade show" id="subir" role="tabpanel">
    
    <div class="row" style="text-align:center;">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <button id="upload-button">Selecciona el pdf</button> 
                <input type="file" id="file-to-upload" name="file-to-upload" accept="application/pdf" />

                <div id="pdf-main-container">
                  <div id="pdf-loader">Cargando documento</div>
                  <div id="pdf-contents">
                    <div id="pdf-meta">
                      <div id="pdf-buttons">
                        <button id="pdf-prev">Anterior</button>
                        <button id="pdf-next">Siguiente</button>
                      </div>
                      <div id="page-count-container">Pagina <div id="pdf-current-page"></div> de <div id="pdf-total-pages"></div></div>
                    </div>
                    <canvas id="pdf-canvas" width="1140"></canvas>
                    <div id="page-loader">Cargando documento</div>
                      <a id="download-image" href="#" class="btn btn-primary">Añadir pagina</a>
                  </div>
                </div>
              </div>
            </div><!--Cierre del row-->
          </div>
        </div> <!--Cierre del card-->
      </div>  
     </div>
    
    <div class="row">
      <div class="col-sm-12">
         <input type="hidden" name="id_documentacion" id="id_documentacion_d" value="{$id_documentacion_d}">
         <div id="traer_imagen">
          </div>
       </div> 
     </div>  
      <br>
    
      <!--
      <div class="card" id="informacion_de_mas">
        <div class="card-body">
          <div class="row" style="text-align:center;">
            <div class="col-sm-4">
              <label>Nombre del archivo:</label>
              <input type="text" name="nombre_imagen_pdf" class="form-control" id="nombre_imagen_pdf" placeholder="Ingresa el nombre del archivo">
            </div>
            <div class="col-sm-4">
              <label>Firmar:</label>
              
              <select id="documento_firma" class="form-control">
                <option>Seleccione...</option>
                <option value="0">No</option>
                <option value="1">Si</option>
              </select>
            </div>
            <textarea id="traer_base_64"></textarea>
            <div class="col-sm-4">
              <button class="btn btn-success" id="subir_img">
                Añadir
              </button>
            </div>
          </div>
        </div>
      </div> -->
    
      <br>
    
      <div class="row" style="text-align:center;">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h6>Gestor de archivos</h6></div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <th>#</th>
                  <th>Fecha creación</th>
                  <th>Nombre</th>
                  <th>Pagina</th>
                  <th>Acciones</th>
                </thead>
                <tbody id="traer_gestor_archivos">
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div><!--Cierre del primer tab subir--> 
  
  
  <div class="tab-pane tabs-animation fade show" id="subir1" role="tabpanel">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body" style="text-align:center;">
            <div id="primer_set">
              <form id="formulario_pdf"  enctype="multipart/form-data" method="post">
                <input type="hidden" name="id_documentacion" id="id_documentacion_d" value="{$id_documentacion_d}">
                <input type="file" id="pdf_subiendo" name="pdf_subiendo">
                <br>
                <br>
                <input type="text" class="form_control" name="nombre_pdf_full"  placeholder="Asigna un nombre al archivo"
                  style="width: 310px;border-radius:7px;" required>
                <br>
                <br>
                <button class="btn btn-success" id="subir_pdf_full">
                Cargar
                </button>
              </form> 
            </div>
            <div id="segundo_set">
              <input type="hidden" name="id_documentacion" id="id_documentacion_d" value="{$id_documentacion_d}">
              <button class="btn btn-danger" id="eliminar_documento_cargado">
                Eliminar Documento
              </button>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body" id="gif_loading" style="text-align: center;">
            <img src="design/images/cargando.gif">
          </div>
          <div class="card-body" id="pdf_grande">
            
          </div>
        </div>
      </div>
    </div>
    <br>
    <!--
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body" id="pdf_grande">
            <div id="aqui_iframe" >
            </div>
          </div>
        </div>
      </div>
    </div>-->
  </div>
  
  
  <div class="tab-pane tabs-animation fade show" id="Hoja_firmas" role="tabpanel">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body" style="text-align:center;">
            <div class="row">
              <div class="col-sm-6">
                <label>Encabezado 1</label>
                <input type="text" id="encabezado_1" class="form-control">
              </div>
              <div class="col-sm-3">
                <label>Protocolo:</label>
                <input type="text" id="protocolo" class="form-control">
              </div>
              <div class="col-sm-3">
                <label>Versión:</label>
                <input type="text" id="version" class="form-control">
              </div>
            </div> 
            <hr>
            <div class="row">
              <div class="col-sm-8">
                <label>Encabezado 2</label>
                <input type="text" name="" id="encabezado_2" class="form-control">
              </div>
              <div class="col-sm-4">
                <label>Paginación</label>
                <input type="text" name="" id="paginacion" class="form-control">
              </div>
            </div> 
            <br>
            <div class="row">
              <div class="col-sm-4">
              <label for="">Leyenda</label>
              <input type="text" name="" id="leyenda" class="form-control">
              </div>
            </div>
            <hr>
            <button class="btn btn-success" id="actualizar">Actualizar</button>
            <button class="btn btn-primary" id="vista_previa">Vista previa</button>    
          </div>
        </div>
      </div>
    </div>
  </div><!--Cierre del segundo tab listar_subidas-->
</div><!--Cierre del tab content-->
<!--SCRIPT PARA CONTROLAR LA VISTA PREVIA DEL DOCUMENTO QUE SE SUBE-->

<script>
var __PDF_DOC,
	__CURRENT_PAGE,
	__TOTAL_PAGES,
	__PAGE_RENDERING_IN_PROGRESS = 0,
	__CANVAS = $('#pdf-canvas').get(0),
	__CANVAS_CTX = __CANVAS.getContext('2d');

function showPDF(pdf_url) {
	$("#pdf-loader").show();

	PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
		__PDF_DOC = pdf_doc;
		__TOTAL_PAGES = __PDF_DOC.numPages;
		
		// Hide the pdf loader and show pdf container in HTML
		$("#pdf-loader").hide();
		$("#pdf-contents").show();
		$("#pdf-total-pages").text(__TOTAL_PAGES);

		// Show the first page
		showPage(1);
	}).catch(function(error) {
		// If error re-show the upload button
		$("#pdf-loader").hide();
		$("#upload-button").show();
		
		alert(error.message);
	});;
}

function showPage(page_no) {
	__PAGE_RENDERING_IN_PROGRESS = 1;
	__CURRENT_PAGE = page_no;

	// Disable Prev & Next buttons while page is being loaded
	$("#pdf-next, #pdf-prev").attr('disabled', 'disabled');

	// While page is being rendered hide the canvas and show a loading message
	$("#pdf-canvas").show();
	$("#page-loader").show();
	$("#download-image").hide();

	// Update current page in HTML
	$("#pdf-current-page").text(page_no);
	
	// Fetch the page
	__PDF_DOC.getPage(page_no).then(function(page) {
		// As the canvas is of a fixed width we need to set the scale of the viewport accordingly
		var scale_required = __CANVAS.width / page.getViewport(1).width;

		// Get viewport of the page at required scale
		var viewport = page.getViewport(scale_required);

		// Set canvas height
		__CANVAS.height = viewport.height;

		var renderContext = {
			canvasContext: __CANVAS_CTX,
			viewport: viewport
		};
		
		// Render the page contents in the canvas
		page.render(renderContext).then(function() {
			__PAGE_RENDERING_IN_PROGRESS = 0;

			// Re-enable Prev & Next buttons
			$("#pdf-next, #pdf-prev").removeAttr('disabled');

			// Show the canvas and hide the page loader
			$("#pdf-canvas").show();
			$("#page-loader").hide();
			$("#download-image").show();
		});
	});
}

// Upon click this should should trigger click on the #file-to-upload file input element
// This is better than showing the not-good-looking file input element
$("#upload-button").on('click', function() {
	$("#file-to-upload").trigger('click');
});

// When user chooses a PDF file
$("#file-to-upload").on('change', function() {
	// Validate whether PDF
    if(['application/pdf'].indexOf($("#file-to-upload").get(0).files[0].type) == -1) {
        alert('Error : Not a PDF');
        return;
    }

	$("#upload-button").show();

	// Send the object url of the pdf
	showPDF(URL.createObjectURL($("#file-to-upload").get(0).files[0]));
});

// Previous page of the PDF
$("#pdf-prev").on('click', function() {
	if(__CURRENT_PAGE != 1)
		showPage(--__CURRENT_PAGE);
});

// Next page of the PDF
$("#pdf-next").on('click', function() {
	if(__CURRENT_PAGE != __TOTAL_PAGES)
		showPage(++__CURRENT_PAGE);
});
</script>
  
<script type="text/javascript" src="design/js/funciones_documentacion.js"></script>