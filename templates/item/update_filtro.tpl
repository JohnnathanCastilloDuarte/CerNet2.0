<input type="hidden" id="id_item_filtro" value="{$id_item_filtro}">
<input type="hidden" id="id_tipo_filtro" value="{$id_tipo_filtro}">


<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h6>
					Configuración Filtro
				</h6>
			</div>
    </div><!--CIERRE DEL CARD-->  
  </div><!--CIERRE DEL COL-SM-12-->
</div><!--CIERRE DEL ROW--> 

<br>

<div class="card">
  <div class="card-body">
    <div id="smartwizard2" class="forms-wizard-alt">
        <ul class="forms-wizard">
            <li>
                <a href="#step-12">
                    <em>1</em><span>Identificación</span>
                </a>
            </li>
          <!--
            <li>
                <a href="#step-22">
                    <em>2</em><span>Infraestructura</span>
                </a>
            </li>
            <li>
                <a href="#step-32">
                    <em>3</em><span>Equipos</span>
                </a>
            </li>
          <li id="si_envia">
                <a href="#step-42">
                    <em>4</em><span>Evidencia</span>
                </a>
            </li>-->

      </ul>
      
      <div class="form-wizard-content">
       {foreach from=$array_filtro item=filtro}
        <input type="hidden" id="id_filtro" value = "{$filtro.id_filtro}">
        <div id="step-12">
					<div class="form-row">
           <div class="col-sm-6">
              <div class="position-relative form-group">               
                <label>Descripción: </label>
                <select class="form-control" id="nombre_filtro">
                   <option value="{$nombre_item}">{$nombre_item}</option>
                   <option value="Filtro Absoluto ULPA (H14)">Filtro Absoluto ULPA H14</option> 
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="position-relative form-group">
                <label>Empresa:</label>
                <select id="empresa_filtro" class="form-control">
                  <option value="{$filtro.id_empresa}">{$filtro.nombre_empresa}</option>
                  {foreach from=$array_empresa item=empresa}
                  <option value="{$empresa.id_empresa}">{$empresa.nombre_empresa}</option>
                  {/foreach}
                </select>
              </div>
            </div>
          </div>
          
          <div class="form-row">
            <div class="col-sm-6">
              <label>Marca: </label>
              <input type="text" class="form-control" id="marca_filtro" value="{$filtro.marca}">
            </div>
            <div class="col-sm-6">
              <label>Modelo: </label>
              <input type="text" class="form-control" id="modelo_filtro" value="{$filtro.modelo}">
            </div>
          </div>
          
          <br>
          
          <div class="form-row">
            <div class="col-sm-6">
              <label>Serie: </label>
              <input type="text" class="form-control" id="serie_filtro" value="{$filtro.serie}">
            </div>
            <div class="col-sm-6">
              <label>Cantidad Filtros HEPA: </label>
              <input type="number" class="form-control" id="cantidad_filtros_filtro" value="{$filtro.cantidad_filtros}">
            </div>
          </div>
          
          <br>
          
          <div class="form-row">
            <div class="col-sm-4">
              <label>Dirección: </label>
              <input type="text" class="form-control" id="ubicacion_filtro" value="{$filtro.ubicacion}">
            </div>
            <div class="col-sm-4">
              <label>Ubicado en: </label>
              <select class="form-control" id="ubicado_en_filtro">
                <option value="{$filtro.ubicado_en}">{$filtro.ubicado_en}</option>
                <option value="UMA">UMA</option>
                <option value="Sala">Sala</option>
                <option value="VEX">VEX</option>
                <option value="VIN">VIN</option>
                <option value="COP">COP</option>
              </select> 
             </div>
             <div class="col-sm-4">
              <label>Lugar: </label>
               <input type="text" class="form-control" id="lugar_filtro" value="{$filtro.ubicacion}">
             </div>
          </div>
          
          <br>
          
          <div class="form-row">
            <div class="col-sm-6">
              <label>Dimensiones: </label>
              <input type="text" class="form-control" id="tipo_filtro" value="{$filtro.tipo}">
            </div>
            <div class="col-sm-6">
              <label>Limite de penetración: </label>
              <input type="text" class="form-control" id="penetracion_filtro" value="{$filtro.tipo}">
            </div>
          </div>
          {/foreach}
          <br>
          
          <div class="form-row">
            <div class="col-sm-12" style="text-align:center;" id="tipo_botton_filtros">
              <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_filtro">Actualizar</button>
              <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_crear_item_filtro">Crear</button>
            </div>
          </div>
          
        </div><!--CIERRE DE LA PRIMERA TARJETA--> 
        
      </div><!--CIERRE DEL CONTENIDO DEL WIZARD-->  
        
    </div><!--TITULOS DEL WIZARD-->
  </div><!--CIERRE DEL CARDBODY--> 
 </div><!--CIERRE DEL CARD--> 
<script src="design/js/filtros.js"></script>