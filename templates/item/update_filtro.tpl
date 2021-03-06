<input type="hidden" id="id_item_filtro" value="{$id_item_filtro}">
<input type="hidden" id="id_tipo_filtro" value="{$id_tipo_filtro}">


<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h6>
          {if $id_item_filtro == ''}
					Crear Filtro
          {else}
          Configurar Filtro
          {/if}
				</h6>
			</div>
    </div><!--CIERRE DEL CARD-->  
  </div><!--CIERRE DEL COL-SM-12-->
</div><!--CIERRE DEL ROW--> 

<br>

<div class="card">
  <div class="card-body">      

       {foreach from=$array_filtro item=filtro}
        <input type="hidden" id="id_filtro" value = "{$filtro.id_filtro}">
        <div id="step-12">
					<div class="form-row">
           <div class="col-sm-6">
              <div class="position-relative form-group">               
                <label>Nombre: </label>
                <select class="form-control" id="nombre_filtro">
                  {if $filtro.nombre_item == ""}
                   <option value="0" selected>Seleccione...</option>
                   <option value="Filtro Absoluto HEPA H13 ">Filtro Absoluto HEPA H13</option>
                   <option value="Filtro Absoluto ULPA H14">Filtro Absoluto ULPA H14</option> 
                  {else}
                   <option value="{$filtro.nombre_item}" selected="">{$filtro.nombre_item}</option>
                   <option value="Filtro Absoluto HEPA H13">Filtro Absoluto HEPA H13</option>
                   <option value="Filtro Absoluto ULPA H14">Filtro Absoluto ULPA H14</option> 
                  {/if}
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="position-relative form-group">
               <label>Empresa:</label>
                    <input type="hidden" id="id_empresa" value="{$filtro.id_empresa}">
                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$filtro.nombre_empresa}">
                    <div >
                      <table class="table" id="aqui_resultados_empresa">
                      </table>
                    </div>
              </div>
            </div>
          </div>
          
          <div class="form-row">
            <div class="col-sm-6">
              <label>Marca: </label>
              <input type="text" class="form-control" id="marca_filtro" value="{$filtro.marca}" placeholder="Marca filtro">
            </div>
            <div class="col-sm-6">
              <label>Modelo: </label>
              <input type="text" class="form-control" id="modelo_filtro" value="{$filtro.modelo}" required="" placeholder="Modelo filtro">
            </div>
          </div>
          
          <br>
          
          <div class="form-row">
            <div class="col-sm-6">
              <label>Serie: </label>
              <input type="text" class="form-control" id="serie_filtro" value="{$filtro.serie}" required="" placeholder="Serie filtro">
            </div>
            <div class="col-sm-3">
              <label>Cantidad Filtros HEPA: </label>
              <input type="number" class="form-control" id="cantidad_filtros_filtro" value="{$filtro.cantidad_filtros}" required="" placeholder="Cantidad de filtros">
            </div>
            <div class="col-sm-3">
              <label>Tipo Filtro </label>
              <input type="text" class="form-control" id="tipo_filtro" value="{$filtro.tipo_filtro}" required="" placeholder="Tipo de Filtro">
            </div>
          </div>
          
          <br>
          
          <div class="form-row">
            <div class="col-sm-4">
              <label>Direcci??n: </label>
              <input type="text" class="form-control" id="ubicacion_filtro" value="{$filtro.direccion}" required="" placeholder="Direcci??n de filtro">
            </div>
            <div class="col-sm-4">
              <label>Ubicado en: </label>      
              <select class="form-control" id="ubicado_en_filtro">
              {if $filtro.ubicacion_interna ==''}
                <option value="0">Seleccione...</option>
                <option value="UMA">UMA</option>
                <option value="Sala">Sala</option>
                <option value="VEX">VEX</option>
                <option value="VIN">VIN</option>
                <option value="COP">COP</option>
              {else}
                <option value="{$filtro.ubicacion_interna}">{$filtro.ubicacion_interna}</option>
                <option value="UMA">UMA</option>
                <option value="Sala">Sala</option>
                <option value="VEX">VEX</option>
                <option value="VIN">VIN</option>
                <option value="COP">COP</option>
              {/if}
              </select> 
             </div>
             <div class="col-sm-4">
              <label>Lugar: </label>
               <input type="text" class="form-control" id="lugar_filtro" value="{$filtro.area_interna}" required="" placeholder="Lugar filtro">
             </div>
          </div>
          
          <br>
          
          <div class="form-row">
            <div class="col-sm-6">
              <label>Dimensiones: </label>
              <input type="text" class="form-control" id="dimenciones_filtro" value="{$filtro.filtro_dimension}" required="" placeholder="Dimensiones del filtro">
            </div>
            <div class="col-sm-3">
              <label>Limite de penetraci??n: </label>
              <input type="text" class="form-control" id="penetracion_filtro" {if $filtro.penetracion_filtro == "" } value="0,001" {else} value="{$filtro.penetracion_filtro}" {/if} placeholder=" limite de penetraci??n">
            </div>
            <div class="col-sm-3">
              <label>Eficiencia: </label>
              <input type="text" class="form-control" id="eficiencia" {if $filtro.eficiencia == ""} value="99,99 % (0,3um)" {else} value="{$filtro.eficiencia}" {/if} placeholder="Eficiencia">
            </div>

          </div>
          {/foreach}
          </div>
          <br>
          
          <div class="form-row"> 
            <div class="col-sm-12" style="text-align:center;" id="tipo_botton_filtros">
              <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_filtro">Actualizar</button>
              <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_crear_item_filtro">Crear</button>
            </div>
          </div>
          
        

        
    </div><!--TITULOS DEL WIZARD-->
  </div><!--CIERRE DEL CARDBODY--> 
 </div><!--CIERRE DEL CARD--> 
<script src="design/js/filtros.js"></script>
<script type="text/javascript" src="design/js/validar_campos_vacios.js"></script>
