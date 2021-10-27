<div class="row">
  <div class="col-sm-12">
    {}
    <div class="card">
      <div class="card-header">
        <h5>
          Edición del equipo <span>{}</span>
        </h5>
      </div>
      <div class="card-body">
        <div id="smartwizard2" class="forms-wizard-alt">
          <ul class="forms-wizard">
            <li>
              <a href="#step-12">
               <em>1</em><span>Identificación del equipo</span>
             </a>
           </li>
         </ul>
         <div class="form-wizard-content">
          <div id="step-12">
            <div class="form-row">
              <div class="col-sm-6">
                <input type="hidden" id="id_item_ultrafreezer" value="$ultrafreezer.id_ultrafreezer}">
                <input type="hidden" id="id_item_2_ultrafreezer" value="$ultrafreezer.id_item}">
                <label>Nombre:</label>
                <input type="text" id="nombre_campana" class="form-control" value="{}">
              </div>
              <div class="col-sm-6">
                <label>Empresa</label>
                <select class="form-control" id="empresa_ultrafreezer">
                  <option value="0">Seleccione</option>

                  <option value="{}">{}</option>
                </select>
              </div>

            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-6">
                <label>Ubicación del equipo:</label>
                <input type="text" id="fabricante_ultrafreezer" class="form-control" placeholder="ubicacion del equipo en el lugar empresa" value="{}">
              </div>
              <div class="col-sm-6">
                <label>Dirección:</label>
                <input type="text" id="direccion_campana" class="form-control" placeholder="Direccion campana" value="{}">
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-4">
                <label>Tipo de campana:</label>
                <input type="text" class="form-control" id="tipo_campana" value="{}">
              </div>
              <div class="col-sm-4">
                <label>Marca/fabricante:</label>
                <input type="text" class="form-control" id="marca_campana" value="{}">
              </div>
              <div class="col-sm-4">
                <label>Modelo:</label>
                <input type="text" class="form-control" id="modelo_campana" value="{}">
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-4">
                <label>Codigo interno:</label>
                <input type="text" id="codigo_interno_campana" class="form-control" placeholder="N° Serie" value="{}">
              </div>
              <div class="col-sm-4">
                <label>Serie</label>
                <input type="text" id="serie_campana" class="form-control" placeholder="Codigo interno" value="{}">
              </div>
              <div class="col-sm-4">
                <label>Año fabricación</label>
                <input type="date" id="fecha_fabricacion_campana" class="form-control" placeholder="" value="{}">
              </div>
            </div>
            <div class="form-row">
              <div class="col-sm-4">
                <label>R.Velocidad de aire</label>
                <input class="form-control" type="text" id="velocidad_aire" placeholder="velocidad aire" value="{}">
              </div>
            </div>
          </div>
        </div>
        <!---Cierre del content-->
      </div>
      <!--Cierre del wizard-->
      <div class="divider"></div>
      <center>
       <button class="btn btn-outline-success">Enviar</button>
     </center>
   </div>
 </div>
 {}
</div>
</div>
<script type="text/javascript" src="design/js/update_ultrafreezer.js"></script>