
<div class="row">
  <div class="col-sm-12">
    <div class="card-header">
      Gestion de documentaciòn para procesos GEP
    </div>
    <div class="card">
      
      <div class="row-form">
        <div class="col-sm-12"><br></div>
      </div>   
      
      <div class="row-form">
        <div class="col-sm-6">
         <!-- <label>Selecciona la empresa:</label>
          <select class="form-control" id="empresa_documentacion">
            <option value="0">Seleccione...</option>
            {foreach from=$array_empresa item=empresa}
            <option value="{$empresa.id_empresa}">{$empresa.nombre_empresa}</option>
            {/foreach}
          </select>-->
          <label>Empresa:</label>
            <input type="hidden" id="id_empresa">
            <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$filtro.nombre_empresa}">
            <div >
              <table class="table" id="aqui_resultados_empresa">
              </table>
            </div>
        </div>
        <br>
      </div>
      
      <div class="row">
        
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              Ordenes de trabajo
            </div>
            <div class="card-body">
              <table class="table" style="text-align:center;">
                <thead>
                  <th># OT</th>
                  <th>Fecha creación</th>
                  <th>Acciones</th>
                </thead>
                <tbody id="traer_ot_documentacion">
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header"> 
              En proceso de documentación
            </div>
            
            <div class="card-body">
              <table class="table" style="text-align:center;">
                <thead>
                  <th>#</th>
                  <th>OT</th>
                  <th>Fecha creación</th>
                  <th>Acciones</th>
                </thead>
                <tbody id="despues_documentacion">
                </tbody>
              </table>
            </div>
          </div>
        
        </div>
      </div>     
    </div>
  </div>
</div>
<script type="text/javascript" src="design/js/funciones_documentacion.js"></script>