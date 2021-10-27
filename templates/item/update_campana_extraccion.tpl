<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5 id="text_enunciado_campana">
         
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
                <label>Nombre:</label>
                <input type="text" id="nombre_campana" class="form-control" required>
              </div>
              <div class="col-sm-6">
                <label id="empresa_label">Empresa</label>
                <select class="form-control" id="empresa_campana" required>
                  <option value="{$bodega.id_empresa}">{$bodega.nombre_empresa}</option>
                    {foreach from=$array_empresa item=empresa}
                  <option value="{$empresa.id_empresa}">{$empresa.nombre_empresa}</option>
                  {/foreach}
                </select>
              </div>

            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-6">
                <label>Ubicación del equipo:</label>
                <input type="text" id="ubicacion_campana" class="form-control" placeholder="ubicacion del equipo en el lugar empresa" >
              </div>
              <div class="col-sm-6">
                <label>Dirección:</label>
                <input type="text" id="direccion_campana" class="form-control" placeholder="Direccion campana" >
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-4">
                <label>Tipo de campana:</label>
                <input type="text" class="form-control" id="tipo_campana" >
              </div>
              <div class="col-sm-4">
                <label>Marca:</label>
                <input type="text" class="form-control" id="marca_campana" >
              </div>
              <div class="col-sm-4">
                <label>Modelo:</label>
                <input type="text" class="form-control" id="modelo_campana" >
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-4">
                <label>Codigo interno:</label>
                <input type="text" id="codigo_interno_campana" class="form-control" placeholder="Codigo interno" >
              </div>
              <div class="col-sm-4">
                <label>Serie</label>
                <input type="text" id="serie_campana" class="form-control" placeholder="N° Serie" >
              </div>
              <div class="col-sm-4">
                <label>Año fabricación</label>
                <input type="date" id="fecha_fabricacion_campana" class="form-control" placeholder="" >
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-4">
                <label>Requisito velocidad de aire</label>
                <input class="form-control" type="text" id="velocidad_aire_campana" placeholder="Velocidad aire" >
              </div>
            </div>
          </div>
        </div>
        <!---Cierre del content-->
      </div>
      <!--Cierre del wizard-->
      <div class="divider"></div>

  
  </div>
  <div class="row" style="text-align:center;">
    <div class="col-sm-12">
      <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_campana">Actualizar</button>
      <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_campana">Crear</button>
    </div>
  </div>

  </div>
</div>
</div>
<script type="text/javascript" src="design/js/campana.js"></script>